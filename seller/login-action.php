<?php
session_start();
include '../config/db.php'; 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = $_POST['password'];

    $sql = "SELECT id, name, password FROM users WHERE email = '$email'";
    $result = mysqli_query($conn, $sql);

    if ($user = mysqli_fetch_assoc($result)) {
        if (password_verify($password, $user['password'])) {
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['user_name'] = $user['name'];
            header("Location: /SafeTradeSA/seller/sell_item.php"); // Go to your store
            exit();
        } else {
            die("Incorrect password. <a href='/SafeTradeSA/pages/login.php'>Go back</a>");
        }
    } else {
        die("Email not found. <a href='/SafeTradeSA/pages/register.php'>Register here</a>");
    }
}
?>