<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sell an Item | SafeTrade SA</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body class="bg-light">

    <div class="container py-5">
        <div class="card p-4 border-0 shadow-sm" style="max-width: 600px; margin: auto;">
            <h2 class="fw-bold mb-4">List New Item</h2>
            <form action="process-sale.php" method="POST">
                <div class="mb-3">
                    <label class="form-label">Item Name</label>
                    <input type="text" class="form-control" name="item_name" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Price (ZAR)</label>
                    <input type="number" class="form-control" name="price" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Description</label>
                    <textarea class="form-control" name="description" rows="4"></textarea>
                </div>
                <button type="submit" class="btn btn-dark w-100">Confirm Listing</button>
            </form>
        </div>
        <div class="text-center mt-3">
            <a href="../seller/dashboard.php">Back to Dashboard</a>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>