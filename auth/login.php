<?php
require_once 'config/database.php';
// Now the page is securely connected to the database!
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | SafeTrade SA</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body style="background-color: #f4f6f8; display: flex; align-items: center; justify-content: center; min-height: 100vh;">

    <div class="container" style="max-width: 450px;">
        <div class="text-center mb-4">
            <a href="../index.html">
                <img src="assets/img/logo.png" alt="SafeTrade SA Logo" style="height: 50px; object-fit: contain;">
            </a>
        </div>

        <div class="card border-0 shadow-sm" style="border-radius: 8px;">
            <div class="card-body p-4 p-md-5">
                <h3 class="text-center mb-4 fw-bold" style="color: #121212;">Welcome Back</h3>
                
                <form action="login.php" method="POST">
                    <div class="mb-3">
                        <label class="form-label text-secondary fw-medium">Email Address</label>
                        <input type="email" name="email" class="form-control py-2" required>
                    </div>

                    <div class="mb-3">
                        <div class="d-flex justify-content-between">
                            <label class="form-label text-secondary fw-medium">Password</label>
                            <a href="#" style="color: #008060; text-decoration: none; font-size: 14px;">Forgot?</a>
                        </div>
                        <input type="password" name="password" class="form-control py-2" required>
                    </div>

                    <button type="submit" class="btn w-100 py-2 fw-medium text-white mt-3" style="background-color: #008060; border-radius: 4px;">Log In</button>
                </form>

                <div class="text-center mt-4">
                    <p class="text-secondary mb-0">New to SafeTrade? <a href="register.php" style="color: #008060; text-decoration: none; font-weight: 500;">Create an account</a></p>
                </div>
            </div>
        </div>
    </div>

</body>
</html>