<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Browse Listings | SafeTrade SA</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body class="bg-light">

<div class="container mt-4">
    <div class="d-flex justify-content-between align-items-center border-bottom pb-3 mb-4">
        <h2 class="fw-bold mb-0">SafeTrade SA</h2>
        <div>
            <a href="SafeTradeSA/listing.php" class="text-dark text-decoration-none fw-bold me-3">Browse</a>
            <a href="dashboard.php" class="btn btn-outline-dark btn-sm">Dashboard</a>
        </div>
    </div>

    <div class="d-flex justify-content-between align-items-end mb-3">
        <h3 class="fw-bold mb-0">Latest Items</h3>
        <span class="text-muted small">5 Items Available</span>
    </div>

    <div class="row">
        <?php 
        // 1. Connect to database
        include 'config/db.php'; 
        
        // 2. Get all info for the cards
        $sql = "SELECT id, name, price, description, image_path FROM products";
        $result = mysqli_query($conn, $sql);

        // 3. Loop through each product to build the cards
        while($row = mysqli_fetch_assoc($result)) { ?>
            
            <div class="col-md-4 mb-4">
                <div class="card h-100 shadow-sm border-0">
                    
                    <img src="<?php echo $row['image_path']; ?>" class="card-img-top" alt="<?php echo $row['name']; ?>" style="height: 220px; object-fit: cover; background-color: #f8f9fa;">
                    
                    <div class="card-body">
                        <span class="badge bg-success mb-2 px-2 py-1" style="font-size: 0.75rem;">Escrow Protected</span>
                        
                        <h5 class="card-title fw-bold mb-1"><?php echo $row['name']; ?></h5>
                        
                        <h6 class="card-subtitle mb-3 text-dark fw-bold">R <?php echo $row['price']; ?></h6>
                        
                        <p class="card-text text-muted" style="font-size: 0.85rem;">
                            <?php echo $row['description']; ?>
                        </p>
                    </div>
                    
                    <div class="card-footer bg-white border-0 pt-0 pb-3">
                        <a href="product.php?id=<?php echo $row['id']; ?>" class="btn btn-primary w-100 fw-bold">View Details</a>
                    </div>
                </div>
            </div>

        <?php } ?>
    </div>
</div>

</body>
</html>