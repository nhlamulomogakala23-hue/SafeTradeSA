<?php
// Turn on error reporting to stop blank screens
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Capture the product ID from checkout.php
$product_id = isset($_GET['product_id']) ? intval($_GET['product_id']) : 1;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Secure Checkout Gateway | SafeTrade SA</title>
    <!-- Links to your updated style.css -->
    <link rel="stylesheet" href="style.css">
</head>
<body style="background-color: #f6f6f6;">

    <!-- Announcement Bar -->
    <div class="announcement-bar">
        <i>🔒</i> Secure Peer-to-Peer Escrow Platform — Buyer Protection Guaranteed
    </div>

    <!-- Header -->
    <header class="main-header">
        <div class="header-container">
            <div class="logo">
                SafeTrade<span class="logo-accent">SA</span>
                <span class="logo-subtext">SECURE C2C MARKETPLACE</span>
            </div>
            <div class="header-actions">
                <a href="listing.php" class="back-link">Exit to Marketplace</a>
            </div>
        </div>
    </header>

    <div class="gateway-wrapper">
        
        <div style="margin-bottom: 24px;">
            <h1 style="font-size: 1.8rem; font-weight: 700; color: #121212;">Select Payment & Fulfillment</h1>
            <p style="color: #6a6a6a;">Complete your preferences securely before processing your order.</p>
        </div>

        <form action="process_order.php?product_id=<?php echo $product_id; ?>" method="POST">
            
            <!-- SECTION 1: Delivery Options -->
            <div class="checkout-card">
                <h3>1. Delivery & Fulfillment Options</h3>
                
                <label class="option-label">
                    <input type="radio" name="delivery_method" value="courier" checked>
                    <div>
                        <strong>Standard Courier Delivery</strong>
                        <div style="font-size: 0.85rem; color: #6a6a6a;">Door-to-door tracked delivery straight to your address.</div>
                    </div>
                </label>

                <label class="option-label">
                    <input type="radio" name="delivery_method" value="safe_meetup">
                    <div>
                        <strong>Safe Trade Meeting Point</strong>
                        <div style="font-size: 0.85rem; color: #6a6a6a;">Meet at a verified local public exchange zone.</div>
                    </div>
                </label>
            </div>

            <!-- SECTION 2: Tracking Options -->
            <div class="checkout-card">
                <h3>2. Tracking & Notification Details</h3>
                <div class="form-group">
                    <label>Mobile Number for SMS / WhatsApp Tracking Updates:</label>
                    <input type="text" name="tracking_phone" placeholder="e.g., 082 000 0000" required>
                </div>
            </div>

            <!-- SECTION 3: Payment Options -->
            <div class="checkout-card">
                <h3>3. Choose Payment Method</h3>
                
                <div class="escrow-banner">
                    <span>🛡️</span>
                    <div><strong>Funds are locked securely!</strong> Your payment is held in our trusted escrow account and will not be paid to the seller until you receive and inspect the item.</div>
                </div>

                <label class="option-label">
                    <input type="radio" name="payment_gateway" value="card" checked>
                    <span>Credit / Debit Card (Visa / Mastercard)</span>
                </label>

                <label class="option-label">
                    <input type="radio" name="payment_gateway" value="paypal">
                    <span>PayPal Account</span>
                </label>

                <label class="option-label">
                    <input type="radio" name="payment_gateway" value="instant_eft">
                    <span>Instant EFT (Ozow / PayFast Secure)</span>
                </label>
            </div>

            <!-- Navigation Actions -->
            <div class="action-footer">
                <a href="checkout.php?product_id=<?php echo $product_id; ?>" class="back-link">&larr; Back to Details</a>
                <button type="submit" class="btn-primary" style="border: none; cursor: pointer; padding: 14px 28px; background-color: #008060; color: white; border-radius: 4px; font-weight: bold;">
                    Confirm & Pay Securely &rarr;
                </button>
            </div>

        </form>
    </div>

</body>
</html>