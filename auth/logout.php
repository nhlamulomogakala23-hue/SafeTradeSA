<?php
// Start the session and destroy it (this is the actual logout logic for later)
session_start();
session_destroy();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="refresh" content="2;url=index.html">
    <title>Logging Out | SafeTrade SA</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body style="background-color: #f4f6f8; display: flex; align-items: center; justify-content: center; min-height: 100vh;">

    <div class="text-center">
        <img src="assets/img/logo.png" alt="SafeTrade SA Logo" style="height: 45px; object-fit: contain; margin-bottom: 20px;">
        <h4 class="fw-bold text-dark">You have been successfully logged out.</h4>
        <p class="text-secondary">Redirecting you back to the homepage safely...</p>
    </div>

</body>
</html>