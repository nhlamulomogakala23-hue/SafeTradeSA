<?php
session_start();
require_once 'config/db.php';

// Capture the product_id and form details coming from checkout.php
$product_id = isset($_POST['product_id']) ? intval($_POST['product_id']) : (isset($_GET['product_id']) ? intval($_GET['product_id']) : 0);

// Fetch product details for the summary
$sql = "SELECT * FROM products WHERE id = $product_id";
$result = mysqli_query($conn, $sql);
$product = ($result && mysqli_num_rows($result) > 0) ? mysqli_fetch_assoc($result) : null;

$item_price = $product ? (float)$product['price'] : 0.00;
$delivery_fee = 75.00;
$total_price = $item_price + $delivery_fee;

// Save checkout data temporarily in session so we don't lose it on the next page
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $_SESSION['checkout_data'] = $_POST;
}
$checkout = $_SESSION['checkout_data'] ?? [];
$payment_method = $checkout['payment_method'] ?? 'credit_card';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Gateway | SafeTrade SA</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
</head>
<body class="checkout-page">

    <!-- Header -->
    <header class="checkout-header sticky-top">
        <div class="container d-flex justify-content-between align-items-center">
            <a href="index.php" class="fw-bold text-dark text-decoration-none fs-4">SafeTrade <span style="color: #008060;">SA</span></a>
            <div class="text-muted small fw-medium">
                <i class="bi bi-lock-fill text-success"></i> Secure Payment Gateway
            </div>
        </div>
    </header>

    <div class="container py-4">
        <a href="checkout.php?product_id=<?php echo $product_id; ?>" class="text-decoration-none text-muted small mb-3 d-inline-block">&larr; Back to Checkout</a>
        
        <h2 class="fw-bold mb-4" style="font-size: 1.7rem; color: #333;">Complete Your Payment</h2>

        <form action="process_order.php" method="POST">
            <input type="hidden" name="product_id" value="<?php echo $product_id; ?>">
            
            <div class="row g-4">
                <!-- LEFT COLUMN: Dynamic Payment Form based on selection -->
                <div class="col-lg-8">
                    
                    <?php if ($payment_method == 'credit_card'): ?>
                    <!-- Credit Card Form -->
                    <div class="tk-card">
                        <div class="tk-card-header">
                            <span>Credit & Debit Card Details</span>
                            <div>
                                <i class="bi bi-credit-card fs-5 text-secondary"></i>
                            </div>
                        </div>
                        <div class="tk-card-body">
                            <div class="row g-3">
                                <div class="col-12">
                                    <label class="form-label text-muted small mb-1">Cardholder Name</label>
                                    <input type="text" name="card_name" class="form-control tk-form-control" placeholder="e.g. John Doe" required>
                                </div>
                                <div class="col-12">
                                    <label class="form-label text-muted small mb-1">Card Number</label>
                                    <input type="text" name="card_number" class="form-control tk-form-control" placeholder="4000 1234 5678 9010" maxlength="19" required>
                                </div>
                                <div class="col-sm-6">
                                    <label class="form-label text-muted small mb-1">Expiry Date (MM/YY)</label>
                                    <input type="text" name="card_expiry" class="form-control tk-form-control" placeholder="MM/YY" maxlength="5" required>
                                </div>
                                <div class="col-sm-6">
                                    <label class="form-label text-muted small mb-1">CVV / Security Code</label>
                                    <input type="password" name="card_cvv" class="form-control tk-form-control" placeholder="123" maxlength="4" required>
                                </div>
                            </div>
                        </div>
                    </div>

                    <?php elseif ($payment_method == 'instant_eft'): ?>
                    <!-- Instant EFT Box -->
                    <div class="tk-card">
                        <div class="tk-card-header">Instant EFT (Ozow / PayFast)</div>
                        <div class="tk-card-body text-center py-5">
                            <i class="bi bi-bank fs-1 text-success mb-3"></i>
                            <h5 class="fw-bold">Ready to connect to your bank</h5>
                            <p class="text-muted small">You will be securely redirected to authorize your instant electronic funds transfer.</p>
                        </div>
                    </div>

                    <?php else: ?>
                    <!-- PayPal Box -->
                    <div class="tk-card">
                        <div class="tk-card-header">PayPal Secure Checkout</div>
                        <div class="tk-card-body text-center py-5">
                            <i class="bi bi-paypal fs-1 text-primary mb-3"></i>
                            <h5 class="fw-bold">Connect your PayPal account</h5>
                            <p class="text-muted small">Clicking pay below will process your secure escrow allocation through PayPal.</p>
                        </div>
                    </div>
                    <?php endif; ?>

                </div>

                <!-- RIGHT COLUMN: Summary & Final Button -->
                <div class="col-lg-4">
                    <div class="tk-card sticky-top" style="top: 80px;">
                        <div class="tk-card-header">Order Summary</div>
                        <div class="tk-card-body">
                            <div class="summary-row">
                                <span class="text-muted">Item Price</span>
                                <span>R <?php echo number_format($item_price, 2); ?></span>
                            </div>
                            <div class="summary-row">
                                <span class="text-muted">Delivery Fee</span>
                                <span>R <?php echo number_format($delivery_fee, 2); ?></span>
                            </div>
                            <div class="summary-row summary-total">
                                <span>TOTAL</span>
                                <span>R <?php echo number_format($total_price, 2); ?></span>
                            </div>

                            <button type="submit" class="tk-btn-green mt-3 mb-3">
                                <i class="bi bi-lock-fill me-1"></i> Authorize & Pay R <?php echo number_format($total_price, 2); ?>
                            </button>
                            <div class="text-center text-muted small">
                                <i class="bi bi-shield-check text-success"></i> Protected by SafeTrade Escrow
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </form>
    </div>

</body>
</html>