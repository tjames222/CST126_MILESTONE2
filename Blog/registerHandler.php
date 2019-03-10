<?php
// Project Name: Food For Thought Blog
// Version: 1.1
// Module: Milestone 2 v1.1
// Programmer Name: Tim James
// Date: March 9, 2019
// Synopsis: This is the registration handler for the blog that will be about Food
// in the local area. CSS will be used for styling, HTML for layout, and PHP
// for database management.

$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "blog";

// Declaring Variables from posted user info
$firstName = $_POST["FirstName"];
$lastName = $_POST["LastName"];
$email = $_POST["Email"];
$date = $_POST["Date"];
$user = $_POST["UserName"];
$pass = $_POST["Password"];

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    
    die("Connection failed: " . $conn->connect_error);
}

// Insert values into the SQL database
$sql = "INSERT INTO users (FIRST_NAME, LAST_NAME, EMAIL, DOB, USERNAME, PASSWORD)
VALUES ('$firstName', '$lastName', '$email', '$date', '$user', '$pass')";

// Check that information is not NULL
if ($firstName == NULL) {
    
    echo nl2br("- The First Name is a required field and cannot be blank\n\n");
}

if ($lastName == NULL) {
    
    echo nl2br("- The Last Name is a required field and cannot be blank\n\n");
}

if ($email == NULL) {
    
    echo nl2br("- The Email is a required field and cannot be blank\n\n");
}

if ($date == NULL) {
    
    echo nl2br("- The Date of Birth is a required field and cannot be blank\n\n");
}

if ($user == NULL) {
    
    echo nl2br("- The User Name is a required field and cannot be blank\n\n");
}

if ($pass == NULL) {
    
    echo nl2br("- The Password is a required field and cannot be blank\n\n");
}

// Check for error
if (!($firstName == NULL || $lastName == NULL || 
    $email == NULL || $date == NULL || $user == NULL || 
    $pass == NULL) && $conn->query($sql) === TRUE) {
    
    echo "New record created successfully";
} else {
    
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>