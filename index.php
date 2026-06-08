<?php
// Connect to your database safely
require_once 'config/db.php'; 
?>
<?php include 'includes/header.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SafeTrade SA | Secure C2C Marketplace</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>

<div class="text-center bg-dark text-light py-5">
    <div class="container py-5">
        <div class="mb-3">
            <span class="text-muted text-uppercase small tracking-widest bg-secondary bg-opacity-25 px-3 py-1 rounded">Secure. Verified. Transparent.</span>
        </div>
        <h1 class="display-4 fw-bold mb-3">The Safest Way to Trade & Buy</h1>
        <p class="lead text-secondary mx-auto mb-4" style="max-width: 650px;">
            Empowering informal traders and everyday buyers with foolproof escrow protection and fully verified user profiles.
        </p>
        <div class="pt-2 d-flex justify-content-center">
            <a href="listing.php" class="btn btn-emerald btn-lg px-4 fw-medium" style="background-color: #008060; color: white;">Explore Marketplace</a>
        </div>
    </div>
</div>

<?php include 'includes/footer.php'; ?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>