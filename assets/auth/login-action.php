<?php
session_start();
include 'config/db.php'; // Make sure this path to your database connection is correct

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = $_POST['password'];

    $sql = "SELECT id, name, password FROM users WHERE email = '$email'";
    $result = mysqli_query($conn, $sql);
    $user = mysqli_fetch_assoc($result);

    // Verify the password matches the hashed version in the database
    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['user_name'] = $user['name'];
        header("Location: listing.php"); // Send them to the marketplace
    } else {
        echo "Invalid email or password. <a href='login.php'>Try again</a>";
    }
}
?>