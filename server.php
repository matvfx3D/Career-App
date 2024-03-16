<?php

// Database configuration
$db_host = 'localhost'; // or your database host
$db_user = 'your_username'; // your database username
$db_pass = 'your_password'; // your database password
$db_name = 'contacts'; // your database name

// Create a database connection
$conn = new mysqli($db_host, $db_user, $db_pass, $db_name);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Validate form data
    $name = $conn->real_escape_string($_POST['name']);
    $email = $conn->real_escape_string($_POST['email']);
    $message = $conn->real_escape_string($_POST['message']);
    $user_ip = $conn->real_escape_string($_POST['user_ip']);

    if (!$name || !$email || !$message) {
        echo "Please fill out all required fields.";
        exit;
    }

    // Insert the data into the database
    $sql = "INSERT INTO contact_messages (name, email, message, user_ip) VALUES ('$name', '$email', '$message', '$user_ip')";

    if ($conn->query($sql) === TRUE) {
        echo "Your message has been sent successfully!";
    } else {
        echo "There was an error sending your message. Please try again later.";
    }
}

// Close the database connection
$conn->close();
?>
