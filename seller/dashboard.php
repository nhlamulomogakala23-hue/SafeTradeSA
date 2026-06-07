<?php
// 1. Turn on error tracking so we can catch any future typos instantly
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// 2. Connect to your database
include '../config/db.php'; 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trader Dashboard | SafeTrade SA</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body class="bg-light">

<div class="container mt-4">
    <div class="d-flex justify-content-between align-items-center border-bottom pb-3 mb-4">
        <h2 class="fw-bold mb-0">SafeTrade SA</h2>
        <div>
            <a href="listing.php" class="btn btn-outline-dark">Browse Items</a>
            <a href="dashboard.php" class="text-dark text-decoration-none fw-bold">Dashboard</a>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card shadow-sm border-0 p-4 mb-4 bg-white">
                <h3 class="fw-bold text-dark mb-2">Welcome to Your Dashboard</h3>
                <p class="text-muted">Manage your listings, track your escrow protected sales, and view your SafeTrade SA profile verification status here.</p>
            </div>
        </div>
    </div>

    <div class="row text-center">
        <div class="col-md-4 mb-3">
            <div class="card border-0 shadow-sm p-3 bg-white">
                <h4 class="fw-bold text-success">Active Listings</h4>
                <p class="fs-2 fw-bold text-dark mb-0">5</p>
            </div>
        </div>
        <div class="col-md-4 mb-3">
            <div class="card border-0 shadow-sm p-3 bg-white">
                <h4 class="fw-bold text-primary">Verification Status</h4>
                <p class="fs-5 fw-bold text-warning mb-0">Pending ID Approval</p>
            </div>
        </div>
        <div class="col-md-4 mb-3">
            <div class="card border-0 shadow-sm p-3 bg-white">
                <h4 class="fw-bold text-info">Escrow Balance</h4>
                <p class="fs-2 fw-bold text-dark mb-0">R 0.00</p>
            </div>
        </div>
    </div>
</div>

</body>
</html>