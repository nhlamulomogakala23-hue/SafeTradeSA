<?php
// Error reporting for debugging
error_reporting(E_ALL);
ini_set('display_errors', 1);

// 1. Connect to database (stepping out of the seller folder into config)
include '../config/db.php'; 

$message = "";

// 2. Handle Form Submission
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $price = mysqli_real_escape_string($conn, $_POST['price']);
    $description = mysqli_real_escape_string($conn, $_POST['description']);
    
    // Default image path in case no file is uploaded
    $image_path = 'assets/img/coat.png'; 
    
    // 3. Handle File Upload (Forces .png format)
    if (isset($_FILES['product_image']) && $_FILES['product_image']['error'] == 0) {
        $target_dir = "../assets/img/";
        $file_name = basename($_FILES["product_image"]["name"]);
        $target_file = $target_dir . $file_name;
        $file_type = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
        
        // Ensure it matches your updated .png format
        if ($file_type == "png") {
            if (move_uploaded_file($_FILES["product_image"]["tmp_name"], $target_file)) {
                // Save relative path for front-end visibility
                $image_path = "assets/img/" . $file_name; 
            } else {
                $message = "<div class='alert alert-danger'>Failed to upload image file.</div>";
            }
        } else {
            $message = "<div class='alert alert-danger'>Please upload a valid PNG image.</div>";
        }
    }

    // 4. Insert into database if no errors yet
    if (empty($message)) {
        // trader_id defaults to 1 for now; is_verified defaults to 1
        $sql = "INSERT INTO products (name, price, description, image_path, is_verified, trader_id) 
                VALUES ('$name', '$price', '$description', '$image_path', 1, 1)";
        
        if (mysqli_query($conn, $sql)) {
            header("Location: dashboard.php?success=item_added");
            exit();
        } else {
            $message = "<div class='alert alert-danger'>Database Error: " . mysqli_error($conn) . "</div>";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Post a New Item | SafeTrade SA</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
</head>
<body class="bg-light">

    <header class="bg-white border-bottom sticky-top py-3 mb-4">
        <div class="container d-flex justify-content-between align-items-center">
            <a href="../index.php" class="fw-bold text-dark text-decoration-none h4 mb-0">SafeTrade SA</a>
            <nav>
                <a href="../listing.php" class="text-dark text-decoration-none mx-2">Browse</a>
                <a href="dashboard.php" class="btn btn-outline-dark btn-sm ms-2">Dashboard</a>
            </nav>
        </div>
    </header>

    <div class="container py-4" style="max-width: 600px;">
        <div class="bg-white p-4 rounded shadow-sm border-0">
            <h2 class="fw-bold mb-1">List an Item</h2>
            <p class="text-muted mb-4">Fill in the details to list your item securely with built-in Escrow protection.</p>
            
            <?php echo $message; ?>

            <form action="sell_item.php" method="POST" enctype="multipart/form-data">
                <div class="mb-3">
                    <label class="form-label fw-medium">Product / Item Name</label>
                    <input type="text" name="name" class="form-control" placeholder="e.g. Vintage Denim Jacket" required>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-medium">Price (ZAR)</label>
                    <div class="input-group">
                        <span class="input-group-text">R</span>
                        <input type="number" step="0.01" name="price" class="form-control" placeholder="0.00" required>
                    </div>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-medium">Description</label>
                    <textarea name="description" class="form-control" rows="4" placeholder="Describe the item condition, size, or meeting options..." required></textarea>
                </div>

                <div class="mb-4">
                    <label class="form-label fw-medium">Product Image <span class="text-muted">(.png only)</span></label>
                    <input type="file" name="product_image" class="form-control" accept=".png" required>
                </div>

                <div class="d-grid gap-2">
                    <button type="submit" class="btn btn-primary btn-lg fw-bold">Publish Listing</button>
                    <a href="dashboard.php" class="btn btn-outline-secondary">Cancel</a>
                </div>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>