import pandas as pd
import joblib
import mysql.connector
from sklearn.metrics import f1_score
("", "", "", "");
# MySQL Connection Details
input_db_config = {
    'host': 'localhost',
    'user': 'root',
    'password': '',
    'database': 'inputconnection'
}

output_db_config = {
    'host': 'localhost',
    'user': 'root',
    'password': '',
    'database': 'inputconnection'
}

# Load the model
model_file = r"C:\Users\Klein\Documents\;Programs\Python\Thesis\Model\random_forest_model.pkl"

try:
    model = joblib.load(model_file)
except Exception as e:
    print(f"Error loading the model: {e}")
    exit()

# Connect to input and output databases
try:
    input_connection = mysql.connector.connect(**input_db_config)
    output_connection = mysql.connector.connect(**output_db_config)
except mysql.connector.Error as e:
    print(f"Error connecting to the database: {e}")
    exit()

# Create empty dataframe for input data
input_data = pd.DataFrame(columns=['sTrack', 'sFactor1', 'sFactorRate1', 'sFactor2', 'sFactorRate2',
                                   'sFactor3', 'sFactorRate3', 'sSkill1', 'sSkillRate1',
                                   'sSkill2', 'sSkillRate2', 'sSkill3', 'sSkillRate3',
                                   'sSkill4', 'sSkillRate4'])

# Read the latest input data from MySQL table 'MINPUT' into input_data
try:
    input_query = "SELECT * FROM MINPUT ORDER BY Date DESC LIMIT 1"
    input_data = pd.read_sql(input_query, input_connection)
except mysql.connector.Error as e:
    print(f"Error reading input data from the database: {e}")
    exit()

# Check if input data is empty
if input_data.empty:
    print("No input data found in 'MINPUT' table. Please provide input data.")
    exit()

# Make predictions
try:
    predictions = model.predict(input_data)
    proba = model.predict_proba(input_data)
except Exception as e:
    print(f"Error making predictions: {e}")
    exit()

# Get list of all courses
all_courses = model.classes_

# Create a dataframe for predictions
results_df = pd.DataFrame(predictions, columns=['sCourse'])

# Get the indices of the top 5 probabilities for each prediction
top5_indices = proba.argsort(axis=1)[:, -5:][:, ::-1]

# Fill 'Similar_Courses' column with top 5 similar courses
for i, indices in enumerate(top5_indices):
    similar_courses = ", ".join([all_courses[idx] for idx in indices])
    results_df.at[i, 'Similar_Courses'] = similar_courses

# Calculate accuracy
accuracy = model.score(input_data, predictions)

# Calculate F1-score for each class and compute weighted average
f1_scores = f1_score(predictions, model.predict(input_data), average=None)
weighted_f1_score = f1_score(predictions, model.predict(input_data), average='weighted')

# Add accuracy and F1-score to the output
results_df['Accuracy'] = accuracy
results_df['F1-Score'] = weighted_f1_score

# Write results to MySQL table 'MOUTPUT' in output database
output_cursor = output_connection.cursor()

try:
    output_cursor.execute("CREATE TABLE IF NOT EXISTS MOUTPUT (sCourse VARCHAR(255), Similar_Courses TEXT, Accuracy FLOAT, `F1-Score` FLOAT)")
except mysql.connector.Error as e:
    print(f"Error creating 'MOUTPUT' table: {e}")
    exit()

for index, row in results_df.iterrows():
    sCourse = row['sCourse']
    similar_courses = row['Similar_Courses']
    acc = row['Accuracy']
    f1 = row['F1-Score']
    
    sql = "INSERT INTO MOUTPUT (sCourse, Similar_Courses, Accuracy, `F1-Score`) VALUES (%s, %s, %s, %s)"
    val = (sCourse, similar_courses, acc, f1)
    
    try:
        output_cursor.execute(sql, val)
    except mysql.connector.Error as e:
        print(f"Error inserting data into 'MOUTPUT' table: {e}")
        exit()

output_connection.commit()
output_cursor.close()
output_connection.close()

print("Results saved to 'MOUTPUT' table in the output database.")

# Close input connection
input_connection.close()
