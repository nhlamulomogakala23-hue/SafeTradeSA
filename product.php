<?php
// Error reporting for debugging
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Connect to database
include 'config/db.php';

// Get the specific product ID sent from listing.php
$product_id = isset($_GET['id']) ? intval($_GET['id']) : 1;

// Fetch that specific product from the database
$sql = "SELECT * FROM products WHERE id = $product_id";
$result = mysqli_query($conn, $sql);

if ($result && mysqli_num_rows($result) > 0) {
    // We grab the real database row now!
    $product = mysqli_fetch_assoc($result);
} else {
    die("<div class='container mt-5'><h3 class='text-center'>Product not found in database.</h3></div>");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($product['name']); ?> | SafeTrade SA</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body class="bg-light">

    <header class="bg-white border-bottom sticky-top py-3">
        <div class="container d-flex justify-content-between align-items-center">
            <a href="index.php" class="fw-bold text-dark text-decoration-none h4 mb-0">SafeTrade SA</a>
            <nav>
                <a href="listing.php" class="text-dark text-decoration-none mx-2">Browse</a>
                <a href="seller/dashboard.php" class="btn btn-outline-dark btn-sm ms-2">Dashboard</a>
            </nav>
        </div>
    </header>

    <div class="container py-5">
        <div class="row">
            <div class="col-md-6 mb-4">
                <!-- Replaced the text placeholder with an actual image tag matching your design dimensions -->
                <img src="<?php echo htmlspecialchars($product['image_path']); ?>" 
                     alt="<?php echo htmlspecialchars($product['name']); ?>" 
                     class="rounded shadow-sm" 
                     style="height: 400px; width: 100%; object-fit: cover; background-color: #e2e3e5;">
            </div>
            
            <div class="col-md-6">
                <?php if(isset($product['is_verified']) && $product['is_verified'] == 1) { ?>
                    <span class="badge bg-success mb-2">Verified Seller</span>
                <?php } ?>
                <span class="badge bg-success mb-2">Escrow Protected</span>
                
                <h2 class="fw-bold"><?php echo htmlspecialchars($product['name']); ?></h2>
                <h3 class="text-dark mb-3">R <?php echo htmlspecialchars($product['price']); ?></h3>
                
                <p class="text-muted mb-4">
                    <?php echo htmlspecialchars($product['description']); ?>
                    <br><br>
                    <strong>Buy with confidence:</strong> This transaction is fully protected by our built-in escrow system, ensuring your funds are secure until you receive and inspect the item.
                </p>
                
                <div class="d-grid gap-2">
                    <a href="checkout.php?product_id=<?php echo $product['id']; ?>" class="btn btn-primary btn-lg">Buy with Escrow</a>
                    <a href="listing.php" class="btn btn-outline-secondary">Back to Listings</a>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>