<?php
// Debugging: show errors
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Force the path to be absolute or double-check the path
// If your folder is C:\xampp\htdocs\SafeTradeSA, then this path should work:
include __DIR__ . '/../config/db.php';

// Check if connection was successful
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
// ... rest of your code

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
        echo "Registration successful! <a href='/SafeTradeSA/seller/login.php'>Login here</a>";
    } else {
        // This will print the specific MySQL error if the insert fails
        echo "Database Error: " . mysqli_error($conn);
    }
} else {
    echo "Form was not submitted properly.";
}
?>