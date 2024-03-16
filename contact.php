<?php
    include "email.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Career Guidance Web App</title>
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
    
    
    <p style = "font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif; font-size: 20px; text-align: center; border: 1px;"> Have queries? Feel free to contact us.</p> 
        <div class="formtable">
            <form name="Input" action="" method="POST"> 
                <!--Strand -->
                <label for="contactsection">Name:</label>
                <input class="form-control" type="text" name="uName" rows="1"><br>

                <!--Factor percentage -->
                <label for="contactsection">Email:</label>
                <input class="form-control" type="text" name="uEmail" rows="1"><br>

                <!-- Skill percentage-->
                <label for="contactsection">Message:</label>
                <input class="form-control" type="text" name="uMessage" rows="1"><br>
                            
                <!-- Course recommender button -->
                <input type="submit" name="submit" value="Send">
            </form>
        </div>

        <?php
    error_reporting(E_ALL);
    ini_set('display_errors', 1);

    // Create the USEREMAIL table if it doesn't exist
    $db = mysqli_connect("localhost", "root", "", "email");

    if(!$db) {
        die("Connection failed: " . mysqli_connect_error());
    }

        // Form submission
    if(isset($_POST['submit'])) {
        $uName = mysqli_real_escape_string($db, $_POST['uName']);
        $uEmail = mysqli_real_escape_string($db, $_POST['uEmail']);
        $uMessage = mysqli_real_escape_string($db, $_POST['uMessage']);

        $insertQuery = "INSERT INTO `USEREMAIL` (uName, uEmail, uMessage) 
                        VALUES ('$uName', '$uEmail', '$uMessage')";

        if(mysqli_query($db, $insertQuery)) {
            echo "Data inserted successfully!";
        } else {
            echo "Error: " . $insertQuery . "<br>" . mysqli_error($db);
        }
    }

    mysqli_close($db);
?>





</body>
</html>