<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Details | SafeTrade SA</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body class="bg-light">

    <header class="bg-white border-bottom sticky-top py-3">
        <div class="container d-flex justify-content-between align-items-center">
            <a href="index.html" class="fw-bold text-dark text-decoration-none h4 mb-0">SafeTrade SA</a>
            <nav>
                <a href="listing.php" class="text-dark text-decoration-none mx-2">Browse</a>
                <a href="seller/dashboard.php" class="btn btn-outline-dark btn-sm ms-2">Dashboard</a>
            </nav>
        </div>
    </header>

    <div class="container py-5">
        <div class="row">
            <div class="col-md-6 mb-4">
                <div class="bg-secondary bg-opacity-25 rounded d-flex align-items-center justify-content-center" style="height: 400px;">
                    <span class="text-muted">Product Image Placeholder</span>
                </div>
            </div>
            
            <div class="col-md-6">
                <span class="badge bg-success mb-2">Escrow Protected</span>
                <h2 class="fw-bold">Example Item Name</h2>
                <h3 class="text-dark mb-3">R 500.00</h3>
                <p class="text-muted mb-4">This is a detailed description of the item. It is protected by the built-in escrow system, ensuring that both the buyer and seller are secure during the transaction.</p>
                
                <div class="d-grid gap-2">
                    <button class="btn btn-primary btn-lg" onclick="initiateEscrow()">Buy with Escrow</button>
                    <a href="listing.php" class="btn btn-outline-secondary">Back to Listings</a>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    
    <script src="../assets/js/script.js"></script>
</body>
</html>