<?php
session_start();
require_once '../config/db.php'; // Make sure this path to your db connection is correct

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = trim($_POST['email']); 
    $password = $_POST['password'];

    // 1. Fetch user by email from the 'users' table
    $stmt = $conn->prepare("SELECT * FROM users WHERE email = ? LIMIT 1");
    
    // Safety check to catch any future SQL errors
    if (!$stmt) {
        die("SQL Prepare failed: " . $conn->error); 
    }

    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
        $row = $result->fetch_assoc();
        
        // 2. Verify the password against the stored hash
        if (password_verify($password, $row['password'])) {
            // Success! Set session variables
            $_SESSION['seller_id'] = $row['id'];
            $_SESSION['seller_email'] = $row['email'];
            
            // Redirect to the dashboard
            header("Location: dashboard.php"); 
            exit();
        } else {
            // Incorrect password
            echo "Incorrect password. <a href='seller/login.php'>Go back</a>";
        }
    } else {
        // User not found
        echo "No account found with that email. <a href='seller/login.php'>Go back</a>";
    }
}
?>