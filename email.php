<?php

    // Server name, Username, Password, Database name //
    $db = mysqli_connect("localhost", "root", "", "email");

    // Check if the database is working
    if(!$db)
    {
        die("Connection failed: " . mysqli_connect_error());
    }

    echo "Connection successfuly."
?>