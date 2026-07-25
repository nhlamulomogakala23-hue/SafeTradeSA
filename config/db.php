<?php
/* ==========================================
   DATABASE CONFIGURATION
   This file securely connects your app to the database.
   ========================================== */

// 1. Database Credentials
$host     = 'sql208.infinityfree.com';       // Usually '127.0.0.1' if running on XAMPP/MAMP/WAMP
$dbname   = 'if0_42491490_XXX';    // The name of your database (change this if different)
$username = 'if0_42491490';            // Default local username
$password = '';                // Default local password (leave empty for XAMPP, use 'root' for MAMP)

$conn = mysqli_connect("sql208.infinityfree.com", "if0_42491490", "", "if0_42491490_XXX");

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// 2. Create the Connection
try {
    // We use PDO (PHP Data Objects) because it is the most secure way to prevent hackers (SQL Injection)
    $pdo = new PDO("mysql:host=sql208.infinityfree.com;dbname=if0_42491490_XXX;charset=utf8mb4", "if0_42491490", "");

    // 3. Set Error Modes
    // This tells the database to show us exact error messages if something goes wrong
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    // This fetches our data as clean, simple arrays
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

} catch (PDOException $e) {
    // If the database fails to connect, stop everything and show the error gracefully
    die("Database Connection Failed. Please check your credentials: " . $e->getMessage());
}
?>