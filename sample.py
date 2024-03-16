import random
import nltk
from nltk.tokenize import word_tokenize

# Sample responses for each question
responses = {
    "What is your current course?": "BS Chemistry",
    "Would you recommend the current course that you have?": "Yes",
    "Why would you/would you not recommend your current course, in at least three sentences.": "I would highly recommend the BS Chemistry program for those fascinated by the intricacies of matter and chemical processes. The curriculum offers a deep dive into theoretical concepts and practical experiments, fostering a comprehensive understanding of the field. The program's emphasis on research and its applications in various industries makes it an excellent choice for those passionate about chemistry.",
    "What was your strand in Senior High School (SHS)?": "STEM",
    "What is your college course at present?": "BS Chemistry",
    "Are your strand related to your current course?": "Yes",
    "From a scale of 1-100, how related is your SHS strand to your current course. (Please refer to question 5)": "95",
    "What factors did you consider when you chose your current course? (Elaborate each factor if needed, as shown in the example below: -Financial (then you need to elaborate if the course is expensive, a budget course, or an affordable course) - Passion (then you need to identify what passion you have) - Knowledge (then you need to identify what knowledge you have) - Absence of math (answers like this does not need to be elaborated) etc...)": "Passion for chemistry and scientific exploration",
    "From a scale of 1-100, how much did these factors affect your decision? (Please refer to question 7, rate each factors you have listed)": "90",
    "What skill/s is/are needed in your current course? (Exp: Writing, Problem solving, Drawing, etc)": "Analytical skills, Laboratory techniques, Research abilities",
    "From a scale of 1-100, how important is this/these skill/s in your current course? (Please refer to question 9, rate each factors you have listed )": "Analytical skills: 95 Laboratory techniques: 90  Research abilities: 75",
    "Did your current course meet your expectation/s?": "Yes",
    "Why/ why not it did/didn’t meet your expectation/s, in at least three sentences.": "My course exceeded expectations by offering a well-structured curriculum that combines theoretical knowledge with hands-on experiences in state-of-the-art laboratories. The research opportunities provided have been instrumental in developing a deeper understanding of my chosen field. The supportive faculty and collaborative research environment contribute to a fulfilling academic journey.",
    "From a scale of 1-100, how much your current course meet/did not meet your expectation. (Please refer to question 12)": "93",
    "Are you satisfied with your current course?": "Yes",
    "Why/why not are you satisfied with your current course, in at least three sentences.": "I am satisfied with my course as it has equipped me with a profound understanding of chemistry, from molecular structures to complex reactions. The research projects and internships have allowed me to apply theoretical knowledge to real-world scenarios. The program's flexibility in allowing specialization further enhances the learning experience.",
    "From a scale of 1-100, how satisfied are you from your current course. (Please refer to question 14)": "94",
    "Would you still recommend your current course considering your answers above, if you're given another chance?": "Yes",
    "Why/why not would you recommend your current course considering your answers above, in at least three sentences.": "I would recommend the BS Chemistry program because it provides a comprehensive and dynamic education in the field. The faculty's dedication to nurturing future chemists and the program's alignment with industry needs make it an excellent choice. The wide range of career opportunities, from pharmaceuticals to environmental science, showcases the versatility of a chemistry degree.",
    "From a scale of 1-100, how likely you would recommend your current course? (Please refer to question 18)": "96"
}

# Function to augment a response
def augment_response(response):
    tokens = word_tokenize(response)
    random.shuffle(tokens)
    augmented_response = ' '.join(tokens)
    return augmented_response

# Augment responses
augmented_responses = {question: augment_response(response) for question, response in responses.items()}

# Print questions and augmented responses
for question, augmented_response in augmented_responses.items():
    print(question + "\t" + augmented_response)
