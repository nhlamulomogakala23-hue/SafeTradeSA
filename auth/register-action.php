<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Step 1: Include Database
include '../config/db.php'; 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Step 2: Check if fields are empty
    if(empty($_POST['name']) || empty($_POST['email']) || empty($_POST['password'])) {
        die("Error: All fields are required.");
    }

    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    // Step 3: Attempt to insert
    $sql = "INSERT INTO users (name, email, password) VALUES ('$name', '$email', '$password')";

    if (mysqli_query($conn, $sql)) {
        echo "Registration successful! <a href='login.php'>Login here</a>";
    } else {
        // This will print the specific MySQL error if the insert fails
        echo "Database Error: " . mysqli_error($conn);
    }
} else {
    echo "Form was not submitted properly.";
}
?>