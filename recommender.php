<?php
    include "inputconnection.php";
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
    
    
    <p style = "font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif; font-size: 20px; text-align: center; border: 1px;"> Find the perfect balance between your interests, skills, and future goals. Our personalized recommendation system will match you with the ideal college course!</p> 
        <div class="formtable">
            <form name="Input" action="" method="POST"> 
                <!--Strand -->
                <label for="tracksection">What is your Strand?:</label>
                <input class="form-control" type="text" name="sTrack" placeholder="e.g (STEM,ABM)"><br>

                <!--Factor percentage -->
                <!-- Factor 1 -->
                <label for="factorsection">Please put the factors and their respective percentages. If there are no other factors, please put a '-' and '0' for the rating. </label>
                <input  class="form-control" type="text" name="sFactor1" rows="1" placeholder="(ex: Job availability)" required><br>
                <input  class="form-control" type="text" name="sFactorRate1" rows="1" placeholder="(ex: 100)" required><br>
                <!-- Factor 2 -->
                <input  class="form-control" type="text" name="sFactor2" rows="1" placeholder="(ex: Financial)" required><br>
                <input  class="form-control" type="text" name="sFactorRate2" rows="1" placeholder="(ex: 60)" required><br>
                <!-- Factor 3 -->
                <input  class="form-control" type="text" name="sFactor3" rows="1" placeholder="(ex: Science interest)" required><br>
                <input  class="form-control" type="text" name="sFactorRate3" rows="1" placeholder="(ex: 75)" required><br>
                
                <!-- Skill percentage-->
                <label for="skillsection">Please put the skils and their respective percentages. If there are no other skills, please put a '-' and '0' for the rating.</label>
                <!-- Skill 1 -->
                <input  class="form-control" type="text" name="sSkill1" rows="1" placeholder="(ex: Programming)" required><br>
                <input  class="form-control" type="text" name="sSkillRate1" rows="1" placeholder="(ex: 75)" required><br>
                <!-- Skill 2 -->
                <input  class="form-control" type="text" name="sSkill2" rows="1" placeholder="(ex: Writing)" required><br>
                <input  class="form-control" type="text" name="sSkillRate2" rows="1" placeholder="(ex: 75)" required><br>    
                <!-- Skill 3 -->
                <input  class="form-control" type="text" name="sSkill3" rows="1" placeholder="(ex: Analysis)" required><br>
                <input  class="form-control" type="text" name="sSkillRate3" rows="1" placeholder="(ex: 75)" required><br>
                <!-- Skill 4 -->
                <input  class="form-control" type="text" name="sSkill4" rows="1" placeholder="(ex: Reading comprehension)" required><br>
                <input  class="form-control" type="text" name="sSkillRate4" rows="1" placeholder="(ex: 75)" required><br>
                <p style="font-size; 12px; font-weight: bold"> Our recommendation are based on our limited dataset and the results are not accurate. </p>
                <!-- Course recommender button -->
                <input type="submit" name="submit" value="Recommend My Course">
            </form>
        </div>

        <?php
            error_reporting(E_ALL);
            ini_set('display_errors', 1);

            if(isset($_POST['submit'])) {
                $db = mysqli_connect("localhost", "root", "", "inputconnection");

                if(!$db) {
                    die("Connection failed: " . mysqli_connect_error());
                }

                $sTrack = mysqli_real_escape_string($db, $_POST['sTrack']);
                $sFactor1 = mysqli_real_escape_string($db, $_POST['sFactor1']);
                $sFactorRate1 = mysqli_real_escape_string($db, $_POST['sFactorRate1']);
                $sFactor2 = mysqli_real_escape_string($db, $_POST['sFactor2']);
                $sFactorRate2 = mysqli_real_escape_string($db, $_POST['sFactorRate2']);
                $sFactor3 = mysqli_real_escape_string($db, $_POST['sFactor3']);
                $sFactorRate3 = mysqli_real_escape_string($db, $_POST['sFactorRate3']);
                $sSkill1 = mysqli_real_escape_string($db, $_POST['sSkill1']);
                $sSkillRate1 = mysqli_real_escape_string($db, $_POST['sSkillRate1']);
                $sSkill2 = mysqli_real_escape_string($db, $_POST['sSkill2']);
                $sSkillRate2 = mysqli_real_escape_string($db, $_POST['sSkillRate2']);
                $sSkill3 = mysqli_real_escape_string($db, $_POST['sSkill3']);
                $sSkillRate3 = mysqli_real_escape_string($db, $_POST['sSkillRate3']);
                $sSkill4 = mysqli_real_escape_string($db, $_POST['sSkill4']);
                $sSkillRate4 = mysqli_real_escape_string($db, $_POST['sSkillRate4']);

                $query = "INSERT INTO `MINPUT` (sTrack, sFactor1, sFactorRate1, sFactor2, sFactorRate2, sFactor3, sFactorRate3, sSkill1, sSkillRate1, sSkill2, sSkillRate2, sSkill3, sSkillRate3, sSkill4, sSkillRate4) 
                            VALUES ('$sTrack', '$sFactor1', '$sFactorRate1', '$sFactor2', '$sFactorRate2', '$sFactor3', '$sFactorRate3', '$sSkill1', '$sSkillRate1', '$sSkill2', '$sSkillRate2', '$sSkill3', '$sSkillRate3', '$sSkill4', '$sSkillRate4')";

                if(mysqli_query($db, $query)) {
                    // Execute the Python script
                    exec('python "C:\xampp\htdocs\Career App\sqlreaderwriter.py"');

                    // Redirect to results.php
                    header("Location: results.php");
                    exit();
                } else {
                    echo "Error: " . $query . "<br>" . mysqli_error($db);
                }

                mysqli_close($db);
            }
        ?>





</body>
</html>