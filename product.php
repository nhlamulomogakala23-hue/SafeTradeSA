<?php
// Error reporting for debugging
error_reporting(E_ALL);
ini_set('display_errors', 1);

// A "mini-database" of your 5 items
$items = [
    'coat' => [
        'name' => 'Red Leather Coat',
        'price' => '500.00',
        'desc' => 'Beautiful vintage red leather coat. Made from genuine leather, tailored fit, deep pockets, and a classic button-up front. Perfect for staying stylish and warm.',
        'bg_color' => '#f8d7da',
        'text_color' => '#842029'
    ],
    'jeans' => [
        'name' => 'Classic Baggy Jeans',
        'price' => '500.00',
        'desc' => 'High-quality, comfortable baggy denim jeans. Perfect for a relaxed, everyday street-style look. Durable, gently used, and freshly washed.',
        'bg_color' => '#cfe2ff',
        'text_color' => '#084298'
    ],
    'hoodie' => [
        'name' => 'Emerald Green Hoodie',
        'price' => '450.00',
        'desc' => 'Thick, cozy emerald green hoodie featuring a spacious front pocket and adjustable drawstrings. Ideal for chilly evenings or casual indoor wear.',
        'bg_color' => '#d1e7dd',
        'text_color' => '#0f5132'
    ],
    'blanket' => [
        'name' => 'Ultra-Soft Brown Blanket',
        'price' => '400.00',
        'desc' => 'Extra-large, ultra-soft brown fleece blanket. Lightweight yet highly insulated, making it perfect for keeping warm during cold winter nights.',
        'bg_color' => '#e2d9d5',
        'text_color' => '#5c4134'
    ],
    'sneakers' => [
        'name' => 'Black Canvas Sneakers',
        'price' => '350.00',
        'desc' => 'Classic black lace-up canvas sneakers. Size 8, barely worn, and in excellent condition. A versatile shoe that pairs well with almost any casual outfit.',
        'bg_color' => '#e2e3e5',
        'text_color' => '#41464b'
    ]
];

// Check the URL to see which item was clicked. If none, default to the coat.
$selected_item = isset($_GET['item']) ? $_GET['item'] : 'coat';

// Make sure the item actually exists in our list
if (!array_key_exists($selected_item, $items)) {
    $selected_item = 'coat';
}

$product = $items[$selected_item];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $product['name']; ?> | SafeTrade SA</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <link rel="stylesheet" href="assets/css/style.css">
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
                <div class="rounded d-flex align-items-center justify-content-center shadow-sm" 
                     style="height: 400px; background-color: <?php echo $product['bg_color']; ?>; color: <?php echo $product['text_color']; ?>; border: 1px dashed <?php echo $product['text_color']; ?>;">
                    <span class="fw-bold">Image Placeholder: <?php echo $product['name']; ?></span>
                </div>
            </div>
            
            <div class="col-md-6">
                <span class="badge bg-success mb-2">Escrow Protected</span>
                <h2 class="fw-bold"><?php echo $product['name']; ?></h2>
                <h3 class="text-dark mb-3">R <?php echo $product['price']; ?></h3>
                
                <p class="text-muted mb-4">
                    <?php echo $product['desc']; ?>
                    <br><br>
                    <strong>Buy with confidence:</strong> This transaction is fully protected by our built-in escrow system, ensuring your funds are secure until you receive and inspect the item.
                </p>
                
                <div class="d-grid gap-2">
                    <button class="btn btn-primary btn-lg" onclick="initiateEscrow()">Buy with Escrow</button>
                    <a href="listing.php" class="btn btn-outline-secondary">Back to Listings</a>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    
    <script src="script.js"></script>
</body>
</html>