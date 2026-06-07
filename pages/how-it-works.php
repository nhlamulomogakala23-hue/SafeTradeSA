
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>How It Works | SafeTrade SA</title>
    <!-- Bootstrap and Google Fonts matching your video layout -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../assets/css/style.css">
    <style>
        .navbar-brand-custom {
            font-weight: 700;
            color: #fff !important;
        }
        .nav-link-custom {
            color: rgba(255,255,255,0.8) !important;
            font-weight: 500;
            margin-right: 15px;
        }
        .nav-link-custom:hover {
            color: #fff !important;
        }
        .step-number {
            font-size: 2.5rem;
            font-weight: 800;
            color: #212529;
            opacity: 0.15;
            line-height: 1;
        }
    </style>
</head>
<body class="bg-light">

<!-- 1. HEADER NAVIGATION - Exact same dark theme layout as index.php -->
<?php include '../includes/header.php'; ?>
        <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item"><a class="nav-link nav-link-custom" href="../index.php">Home</a></li>
                <li class="nav-item"><a class="nav-link nav-link-custom" href="../listing.php">Browse Trades</a></li>
                <li class="nav-item"><a class="nav-link nav-link-custom fw-bold text-white" href="how-it-works.php">How It Works</a></li>
                <li class="nav-item"><a class="nav-link nav-link-custom" href="help.php">Help & Support</a></li>
            </ul>
        </div>
    </div>
</nav>

<!-- 2. PAGE HEADER -->
<div class="bg-dark text-white text-center py-5 border-top border-secondary">
    <?php include '../includes/header.php'; ?>
    <div class="container py-3">
        <h1 class="display-5 fw-bold">Guarding South African Informal Trades</h1>
        <p class="lead text-muted mx-auto" style="max-width: 600px;">Discover how our verified community and secure escrow systems take the risk out of peer-to-peer trading.</p>
    </div>
</div>

<!-- 3. HOW IT WORKS STEPS -->
<div class="container my-5 py-4">
    <div class="row g-4 justify-content-center">
        
        <!-- Step 1: Verification -->
        <div class="col-md-4">
            <div class="card h-100 border-0 shadow-sm p-4 bg-white position-relative">
                <div class="position-absolute top-0 end-0 pe-4 pt-3 step-number">01</div>
                <h4 class="fw-bold text-dark mt-2 mb-3">Verify Your Profile</h4>
                <p class="text-muted small">To reduce fraud and protect our community, every trader completes a secure South African ID and phone validation check before listing items.</p>
                <span class="badge bg-secondary align-self-start px-2 py-1 mt-auto" style="font-size: 0.75rem;">100% Verified Only</span>
            </div>
        </div>

        <!-- Step 2: Escrow Listing -->
        <div class="col-md-4">
            <div class="card h-100 border-0 shadow-sm p-4 bg-white position-relative">
                <div class="position-absolute top-0 end-0 pe-4 pt-3 step-number">02</div>
                <h4 class="fw-bold text-dark mt-2 mb-3">Secure with Escrow</h4>
                <p class="text-muted small">When a buyer wants an item, their payment is safely held in our secure escrow protection vault. Money is never handed directly to strangers upfront.</p>
                <span class="badge bg-success align-self-start px-2 py-1 mt-auto" style="font-size: 0.75rem;">Escrow Protected</span>
            </div>
        </div>

        <!-- Step 3: Safe Collection -->
        <div class="col-md-4">
            <div class="card h-100 border-0 shadow-sm p-4 bg-white position-relative">
                <div class="position-absolute top-0 end-0 pe-4 pt-3 step-number">03</div>
                <h4 class="fw-bold text-dark mt-2 mb-3">Inspect & Release</h4>
                <p class="text-muted small">Meet up safely or arrange delivery to verify the item. Once the buyer is completely satisfied with the product, the funds are instantly released to the seller.</p>
                <span class="badge bg-primary align-self-start px-2 py-1 mt-auto" style="font-size: 0.75rem;">Fair & Honest Trade</span>
            </div>
        </div>

    </div>

    <!-- Call to Action Section -->
    <div class="text-center mt-5 pt-4">
        <a href="login.php" class="btn btn-dark btn-lg fw-bold px-5 py-3 shadow-sm">Start Safe Trading Now</a>
    </div>
</div>

<!-- 4. FOOTER -->
<?php include '../includes/footer.php'; ?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>