<?php
// Error reporting for debugging
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Connect to database
include 'config/db.php';

// Get the specific product_id sent from listing.php or product.php
$product_id = isset($_GET['product_id']) ? intval($_GET['product_id']) : 0;

// Fetch that specific product from the database
$sql = "SELECT * FROM products WHERE id = $product_id";
$result = mysqli_query($conn, $sql);

if ($result && mysqli_num_rows($result) > 0) {
    $product = mysqli_fetch_assoc($result);
} else {
    // If someone tries to visit checkout.php without selecting an item
    die("
    <!DOCTYPE html>
    <html lang='en'>
    <head>
        <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css' rel='stylesheet'>
        <title>Checkout Error | SafeTrade SA</title>
    </head>
    <body class='bg-light'>
        <div class='container mt-5 text-center'>
            <h3 class='fw-bold mb-3'>No item selected for checkout.</h3>
            <a href='listing.php' class='btn btn-primary'>Return to Marketplace</a>
        </div>
    </body>
    </html>
    ");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Secure Escrow Checkout | SafeTrade SA</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
</head>
<body class="bg-light">

    <!-- Matching your exact header design from product.php -->
    <header class="bg-white border-bottom sticky-top py-3 mb-4">
        <div class="container d-flex justify-content-between align-items-center">
            <a href="index.php" class="fw-bold text-dark text-decoration-none h4 mb-0">SafeTrade SA</a>
            <nav>
                <a href="listing.php" class="text-dark text-decoration-none mx-2">Browse</a>
                <a href="//seller/dashboard.php" class="btn btn-outline-dark btn-sm ms-2">Dashboard</a>
            </nav>
        </div>
    </header>

    <div class="container pb-5">
        <div class="row g-5">
            
            <!-- Left Column: Checkout Details -->
            <div class="col-md-7 col-lg-8">
                <div class="bg-white p-4 rounded shadow-sm border-0 mb-4">
                    <h4 class="mb-3 fw-bold">Delivery & Buyer Details</h4>
                    
                    <!-- UPDATED: Form action now redirects to payment_gateway.php and passes the product_id -->
                    <form action="payment_gateway.php?product_id=<?php echo $product_id; ?>" method="POST">
                        <div class="row g-3">
                            <div class="col-sm-6">
                                <label class="form-label fw-medium">First name</label>
                                <input type="text" name="first_name" class="form-control" required>
                            </div>
                            <div class="col-sm-6">
                                <label class="form-label fw-medium">Last name</label>
                                <input type="text" name="last_name" class="form-control" required>
                            </div>
                            <div class="col-12">
                                <label class="form-label fw-medium">Phone Number <span class="text-muted">(For verification)</span></label>
                                <input type="tel" name="phone_number" class="form-control" placeholder="082 000 0000" required>
                            </div>
                            <div class="col-12">
                                <label class="form-label fw-medium">Delivery Address or Meeting Point</label>
                                <input type="text" name="delivery_address" class="form-control" placeholder="Enter full address or agreed safe trade location" required>
                            </div>
                        </div>

                        <hr class="my-4">

                        <div class="alert alert-success bg-opacity-10 border-success mb-4">
                            <i class="bi bi-shield-lock-fill me-2 text-success"></i>
                            <strong>Next Step:</strong> You will be securely redirected to choose your payment and tracking options.
                        </div>

                        <!-- UPDATED: Removed the 'return false' javascript so the form can actually submit -->
                        <button class="btn btn-primary w-100 btn-lg fw-bold" type="submit">
                            Proceed to Payment Options &rarr;
                        </button>
                    </form>
                </div>
            </div>

            <!-- Right Column: Order Summary -->
            <div class="col-md-5 col-lg-4 order-md-last">
                <h4 class="d-flex justify-content-between align-items-center mb-3">
                    <span class="text-primary fw-bold">Order Summary</span>
                    <span class="badge bg-primary rounded-pill">1</span>
                </h4>
                <ul class="list-group mb-3 shadow-sm">
                    <li class="list-group-item d-flex justify-content-between lh-sm p-3">
                        <div class="d-flex align-items-center">
                            <!-- Make sure your image path handles empty data securely -->
                            <img src="<?php echo htmlspecialchars($product['image_path'] ?? ''); ?>" alt="Item Image" class="rounded me-3" style="width: 50px; height: 50px; object-fit: cover;">
                            <div>
                                <h6 class="my-0 fw-bold"><?php echo htmlspecialchars($product['name'] ?? 'Unknown Item'); ?></h6>
                                <small class="text-muted">Verified Seller</small>
                            </div>
                        </div>
                        <span class="text-dark fw-bold">R <?php echo htmlspecialchars($product['price'] ?? '0.00'); ?></span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between bg-light p-3">
                        <div class="text-success">
                            <h6 class="my-0"><i class="bi bi-shield-check"></i> Escrow Protection</h6>
                            <small>Full buyer protection included</small>
                        </div>
                        <span class="text-success">Free</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between p-3">
                        <span>Total (ZAR)</span>
                        <strong class="fs-5">R <?php echo htmlspecialchars($product['price'] ?? '0.00'); ?></strong>
                    </li>
                </ul>
            </div>

        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>