<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Seller Dashboard | SafeTrade SA</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body class="bg-light">

    <div class="container py-5">
        <h2 class="fw-bold">Seller Dashboard</h2>
        <p>Welcome back! Manage your trades below.</p>
        
        <div class="row mt-4">
            <div class="col-md-6">
                <div class="card p-4 border-0 shadow-sm">
                    <h4>Active Trades</h4>
                    <p>You have 0 active escrow trades.</p>
                    <a href="../pages/sell-item.php" class="btn btn-primary">Create New Listing</a>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>