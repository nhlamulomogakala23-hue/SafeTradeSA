<?php 
// 1. Connect to database
include 'config/db.php'; 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Browse Listings | SafeTrade SA</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body class="bg-light">

<div class="container mt-4">
    <div class="d-flex justify-content-between align-items-center border-bottom pb-3 mb-4">
        <h2 class="fw-bold mb-0">SafeTrade SA</h2>
        <div>
            <ul class="navbar-nav ms-auto flex-row">
                <li class="nav-item px-2"><a class="nav-link" href="index.php">Home</a></li>
                <li class="nav-item px-2"><a class="nav-link" href="seller/dashboard.php">Trader Dashboard</a></li>
            </ul>
        </div>
    </div>

    <div class="d-flex justify-content-between align-items-end mb-3">
        <h3 class="fw-bold mb-0">Latest Items</h3>
        <span class="text-muted small">Items Available</span>
    </div>

    <div class="row g-4"> <?php 
        // 2. Updated query to include 'is_verified' and 'phone' (Ensure these columns exist in your products/users table)
        $sql = "SELECT id, name, price, description, image_path, is_verified, seller_phone FROM products";
        $result = mysqli_query($conn, $sql);

        // 3. Loop through each product
        while($row = mysqli_fetch_assoc($result)) { ?>
            
            <div class="col-12 col-md-6 col-lg-4">
                <div class="card h-100 shadow-sm border-0">
                    
                    <img src="<?php echo $row['image_path']; ?>" class="card-img-top" alt="<?php echo $row['name']; ?>" style="height: 220px; object-fit: cover; background-color: #f8f9fa;">
                    
                    <div class="card-body">
                        <div class="d-flex justify-content-between mb-2">
                            <span class="badge bg-success px-2 py-1" style="font-size: 0.75rem;">Escrow Protected</span>
                            <?php if($row['is_verified'] == 1) { ?>
                                <span class="badge bg-primary px-2 py-1" style="font-size: 0.75rem;"><i class="bi bi-shield-check"></i> Verified</span>
                            <?php } else { ?>
                                <span class="badge bg-secondary px-2 py-1" style="font-size: 0.75rem;">Unverified</span>
                            <?php } ?>
                        </div>
                        
                        <h5 class="card-title fw-bold mb-1"><?php echo $row['name']; ?></h5>
                        <h6 class="card-subtitle mb-3 text-dark fw-bold">R <?php echo $row['price']; ?></h6>
                        
                        <p class="card-text text-muted" style="font-size: 0.85rem;">
                            <?php echo $row['description']; ?>
                        </p>
                    </div>
                    
                    <div class="card-footer bg-white border-0 pt-0 pb-3 d-grid gap-2">
                        <a href="product.php?id=<?php echo $row['id']; ?>" class="btn btn-outline-primary btn-sm fw-bold">View Details</a>
                        
                        <a href="checkout.php?product_id=<?php echo $row['id']; ?>" class="btn btn-primary btn-sm fw-bold">Buy with Escrow</a>
                        
                        <a href="https://wa.me/<?php echo $row['seller_phone']; ?>?text=Hi, I am interested in <?php echo urlencode($row['name']); ?>" target="_blank" class="btn btn-success btn-sm fw-bold">
                            <i class="bi bi-whatsapp"></i> Chat on WhatsApp
                        </a>
                    </div>
                </div>
            </div>

        <?php } ?>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>