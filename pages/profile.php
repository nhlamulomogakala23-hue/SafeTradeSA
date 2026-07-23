<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Profile | SafeTrade SA</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

    <!-- YOUR CUSTOM CSS FILE CONNECTION -->
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body style="background-color: #f4f6f8;">

    <!-- Dashboard Navbar -->
    <header class="bg-white border-bottom py-3 sticky-top">
        <div class="container d-flex justify-content-between align-items-center">
            <a href="../index.php">
                <img src="../assets/img/logo.png" alt="SafeTrade SA Logo" style="height: 40px; object-fit: contain;">
            </a>
            <div class="d-flex align-items-center gap-3">
                <a href="../index.php" class="text-secondary text-decoration-none fw-medium d-none d-sm-block">Marketplace</a>
                <a href="/SafeTradeSA/seller/logout-action.php" class="btn btn-outline-dark btn-sm fw-medium" style="border-radius: 4px;">Logout</a>
            </div>
        </div>
    </header>

    <!-- Profile Dashboard Content -->
    <main class="container py-5">
        <div class="row g-4">
            
            <!-- Left Sidebar (User Info) -->
            <div class="col-lg-4">
                <div class="card border-0 shadow-sm" style="border-radius: 8px;">
                    <div class="card-body p-4 text-center">
                        <div class="rounded-circle d-flex align-items-center justify-content-center text-white fw-bold mx-auto mb-3" style="width: 80px; height: 80px; background-color: #008060; font-size: 28px;">
                            JD
                        </div>
                        <h4 class="fw-bold mb-1">John Doe</h4>
                        <p class="text-secondary mb-3">johndoe@email.com</p>
                        <span class="badge bg-success bg-opacity-10 text-success border border-success px-3 py-2 rounded-pill">
                            <i class="bi bi-patch-check-fill me-1"></i> ID Verified
                        </span>
                        
                        <hr class="my-4">
                        
                        <div class="text-start">
                            <p class="text-secondary mb-2"><i class="bi bi-star-fill text-warning me-2"></i> 4.9 Rating</p>
                            <p class="text-secondary mb-0"><i class="bi bi-bag-check-fill text-dark me-2"></i> 12 Completed Trades</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Right Area (Active Trades) -->
            <div class="col-lg-8">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h4 class="fw-bold mb-0">Active Transactions</h4>
                    <button class="btn fw-medium text-white px-3" style="background-color: #121212; border-radius: 4px;">+ New Trade</button>
                </div>
                
                <div class="card border-0 shadow-sm" style="border-radius: 8px;">
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table class="table table-borderless mb-0 align-middle">
                                <thead class="bg-light border-bottom text-secondary">
                                    <tr>
                                        <th class="py-3 px-4 fw-medium">Item</th>
                                        <th class="py-3 fw-medium">Role</th>
                                        <th class="py-3 fw-medium">Amount</th>
                                        <th class="py-3 px-4 fw-medium text-end">Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class="border-bottom">
                                        <td class="py-3 px-4 fw-bold">iPhone 13 Pro Max</td>
                                        <td class="py-3 text-secondary">Buyer</td>
                                        <td class="py-3 fw-bold">R 12,500</td>
                                        <td class="py-3 px-4 text-end">
                                            <span class="badge bg-warning text-dark px-3 py-2" style="border-radius: 4px;">Awaiting Delivery</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="py-3 px-4 fw-bold">Sony PlayStation 5</td>
                                        <td class="py-3 text-secondary">Seller</td>
                                        <td class="py-3 fw-bold">R 9,000</td>
                                        <td class="py-3 px-4 text-end">
                                            <span class="badge bg-primary px-3 py-2" style="border-radius: 4px;">Funds Secured</span>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </main>

</body>
</html>