<?php
    include "inputconnection.php";

    // Fetch latest input from MINPUT table
    $latestInputQuery = "SELECT * FROM MINPUT ORDER BY Date DESC LIMIT 1";
    $resultInput = mysqli_query($db, $latestInputQuery);
    $latestInput = mysqli_fetch_assoc($resultInput);

    // Fetch latest output from MOUTPUT table
    $latestOutputQuery = "SELECT * FROM MOUTPUT ORDER BY Date DESC LIMIT 1";
    $resultOutput = mysqli_query($db, $latestOutputQuery);
    $latestOutput = mysqli_fetch_assoc($resultOutput);
?>


<!DOCTYPE html>
<html lang="en">
<head>  
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Career Guidance Web App</title>
    <style>
        /* Style for Left Div */
        .left-div {
            width: 50%;
            float: left;
            padding: 20px;
            box-sizing: border-box;
        }
        /* Style for Right Div */
        .right-div {
            width: 50%;
            padding: 20px;
            box-sizing: border-box;
            margin: auto;
        }
        /* Style for form */
        .formtable {
            margin: auto;
            width: 60%;
            padding: 10px;
        }
        /* Style for form elements */
        .formtable input[type="text"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            box-sizing: border-box;
        }
        /* Style for label */
        .formtable label {
            display: block;
            font-size: 16px;
            margin-bottom: 5px;
        }
    </style>
    <link rel="stylesheet" href="style.css">
    <script src="script.js"></script>

</head>
<body>
    <div class = "title">
        <h1> Career Guidance Web App</h1>
    </div>
    
    <ul>
        <li><a href="home.php">Home</a></li>
        <li><a href="about.php">About Us</a></li>
        <li><a href="contact.php">Contact Us</a></li>
    </ul>
    
    
    <p style="font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif; font-size: 30px; text-align: center; border: 1px;">Alright! Lets see what courses are suited for you.</p>

    <div class="right-div">
        <!-- Right Div Content -->
        <div class="formtable">
            <form name="Output" action="" method="POST"> 
                <!-- Possible course -->
                <label for="tracksection">Possible course:</label>
                <input class="form-control" type="text" name="sCourse" value="<?php echo isset($latestOutput['sCourse']) ? $latestOutput['sCourse'] : ''; ?>" readonly><br>
                <!-- Similar course -->
                <label for="tracksection">Similar course:</label>
                <input class="form-control" type="text" name="Similar_Courses" value="<?php echo isset($latestOutput['Similar_Courses']) ? $latestOutput['Similar_Courses'] : ''; ?>" readonly><br>
                 <!-- Accuracy -->
                 <label for="tracksection">Accuracy</label>
                <input class="form-control" type="text" name="Accuracy" value="<?php echo isset($latestOutput['Accuracy']) ? $latestOutput['Accuracy'] : ''; ?>" readonly><br>
                 <!-- F1-score -->
                 <label for="tracksection">F1-Score:</label>
                <input class="form-control" type="text" name="F1-Score" value="<?php echo isset($latestOutput['F1-Score']) ? $latestOutput['F1-Score'] : ''; ?>" readonly><br>
                 <!-- Back to recommender -->
                <li><a href="recommender.php">Back to Recommender</a></li>
            </form>
        </div>
    </div>

</body>
</html>
