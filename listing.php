<?php
// 1. Include your configuration
include 'config/db.php'; 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Browse Listings | SafeTrade SA</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
</head>
<body class="bg-light">

    <!-- Header -->
    <?php include 'includes/header.php'; ?>

    <div class="container py-4">
        <h2 class="fw-bold mb-4">Marketplace Listings</h2>

        <div class="row">
            <?php
            // 2. Query your products
            $sql = "SELECT * FROM products";
            $result = mysqli_query($conn, $sql);

            // 3. Loop through products to display them
            if (mysqli_num_rows($result) > 0) {
                while ($product = mysqli_fetch_assoc($result)) {
                    ?>
                    
                    <div class="col-md-4 mb-4">
                        <div class="card h-100 shadow-sm border-0">
                            <!-- Image path is correctly set here -->
                            <img src="<?php echo $product['image_path']; ?>" class="card-img-top" alt="<?php echo $product['name']; ?>" style="height: 200px; object-fit: cover;">
                            
                            <div class="card-body">
                                <span class="badge bg-success mb-2">Escrow Protected</span>
                                <span class="badge bg-info mb-2">Verified</span>
                                <h5 class="card-title fw-bold"><?php echo $product['name']; ?></h5>
                                <p class="text-primary fw-bold">R<?php echo number_format($product['price'], 2); ?></p>
                                <p class="card-text small text-muted"><?php echo substr($product['description'], 0, 100); ?>...</p>
                                
                               <div class="d-grid gap-2 mt-3">
                                    <!-- View Details: links to a dedicated product page -->
                                <a href="/SafeTradeSA/product.php?id=<?php echo $product['id']; ?>" class="btn btn-outline-primary">View Details</a>
    
                                <!-- Buy with Escrow: links to your checkout or escrow process -->
                                <a href="/SafeTradeSA/checkout.php?id=<?php echo $product['id']; ?>" class="btn btn-primary">Buy with Escrow</a>
    
                            <!-- Chat WhatsApp: opens WhatsApp with a pre-filled message -->
                            <a href="https://wa.me/YOUR_PHONE_NUMBER?text=I%20am%20interested%20in%20<?php echo urlencode($product['name']); ?>" target="_blank" class="btn btn-success">
                             <i class="bi bi-whatsapp"></i> Chat WhatsApp
                             </a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <?php
                }
            } else {
                echo "<p class='text-muted'>No items are currently listed in the marketplace.</p>";
            }
            ?>
        </div>
    </div>

    <!-- Footer -->
    <?php include 'includes/footer.php'; ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>