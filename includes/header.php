<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
include_once 'db_config.php';
?>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
<link rel="stylesheet" href="assets/css/style.css">

<div class="py-2 text-center text-white small fw-medium tracking-wide" style="background-color: #121212; font-size: 13px; letter-spacing: 0.5px;">
    Empowering South African Informal Traders with 100% Secure Escrow Payments
</div>

<nav class="navbar navbar-expand-lg navbar-light bg-white border-bottom py-3 sticky-top">
    <div class="container">
        
        <a class="navbar-brand fw-bold text-dark fs-4 tracking-tight" href="index.php" style="font-family: 'Inter', sans-serif;">
            SafeTrade<span style="color: #008060;">SA</span>
        </a>

        <button class="navbar-toggler border-0 p-1" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon" style="font-size: 1.15rem;"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav mx-auto gap-1 gap-lg-4 my-3 my-lg-0">
                <li class="nav-item"><a class="nav-link text-secondary fw-medium px-0 active" style="color: #121212 !important;" href="index.php">Home</a></li>
                <li class="nav-item"><a class="nav-link text-secondary fw-medium px-0" href="#">How It Works</a></li>
                <li class="nav-item"><a class="nav-link text-secondary fw-medium px-0" href="#">Browse Marketplace</a></li>
                <li class="nav-item"><a class="nav-link text-secondary fw-medium px-0" href="#" data-bs-toggle="modal" data-bs-target="#aboutSystemModal">About Escrow</a></li>
                <li class="nav-item"><a class="nav-link text-secondary fw-medium px-0" href="#">Help & Support</a></li>
            </ul>

            <div class="d-flex align-items-center gap-3">
                
                <a href="#" class="text-dark fs-5"><i class="bi bi-search"></i></a>

                <div class="nav-item dropdown">
                    <a class="nav-link d-flex align-items-center gap-2 p-0 text-dark" href="#" id="userDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <div class="rounded-circle d-flex align-items-center justify-content-center fw-semibold text-white" style="width: 36px; height: 36px; font-size: 14px; background-color: #008060;">
                            <?php 
                                $name = $_SESSION['username'] ?? 'User';
                                $nameParts = explode(" ", $name);
                                $initials = "";
                                foreach ($nameParts as $w) { 
                                    if(!empty($w)) $initials .= $w[0]; 
                                }
                                echo strtoupper(substr($initials, 0, 1)); 
                            ?>
                        </div>
                        <span class="small fw-medium d-none d-sm-inline-block text-secondary">
                            Hi, <?php echo htmlspecialchars($_SESSION['username'] ?? 'Trader'); ?>
                        </span>
                        <i class="bi bi-chevron-down small text-muted" style="font-size: 10px;"></i>
                    </a>

                    <ul class="dropdown-menu dropdown-menu-end shadow-sm border border-light mt-3 p-2 rounded-2" aria-labelledby="userDropdown" style="width: 220px;">
                        <li><a class="dropdown-item rounded-1 py-2 text-secondary small" href="/pages/profile.php">
                            <i class="bi bi-person-gear me-2"></i>Profile Settings
                        </a></li> 
                        <li><a class="dropdown-item rounded-1 py-2 text-secondary small" href="sell.php">
                             <i class="bi bi-plus-circle me-2" style="color: #008060;"></i>List an Item
                        </a></li>
                        <li><a class="dropdown-item rounded-1 py-2 text-secondary small" href="auth/register.php">
                            <i class="bi bi-person-plus me-2"></i>Register Account
                        </a></li>
                        <li><hr class="dropdown-divider my-1" style="opacity: 0.08;"></li>
                        <li><a class="dropdown-item rounded-1 py-2 small fw-medium" href="auth/logout.php" style="color: #d93f3f; background-color: #fff5f5;">
                            <i class="bi bi-box-arrow-right me-2"></i>Log Out
                        </a></li>
                    </ul>
                </div>

                <a href="sell.php" class="btn btn-dark btn-sm px-3 py-2 fw-medium rounded-1" style="background-color: #121212; font-size: 13px;">Start Trading</a>

            </div>
        </div>
    </div>
</nav>

<div class="modal fade" id="aboutSystemModal" tabindex="-1" aria-labelledby="aboutSystemModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-0 shadow-lg rounded-3">
            <div class="modal-header border-0 pt-4 px-4 pb-2">
                <h5 class="modal-title fw-bold text-dark" id="aboutSystemModalLabel">
                    About SafeTradeSA
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body p-4 text-start">
                <p class="text-secondary mb-3" style="line-height: 1.6; font-size: 14px;">
                    <strong>SafeTradeSA</strong> is a secure C2C platform designed specifically to empower and protect South African informal traders and their customers. 
                </p>
                <p class="text-secondary mb-0" style="line-height: 1.6; font-size: 14px;">
                    Our platform integrates an ironclad digital escrow payment architecture. Buyers commit funds safely to the system, and money is only released to the seller once the items are checked and accepted face-to-face. This digital trust layout completely eliminates fraud, street scams, and bad trades, helping local businesses grow in the modern digital economy safely.
                </p>
            </div>
            <div class="modal-footer border-0 px-4 pb-4 pt-2">
                <button type="button" class="btn btn-light w-100 py-2 rounded-1 fw-medium" data-bs-with="100" data-bs-dismiss="modal" style="font-size: 14px;">Got it, thanks</button>
            </div>
        </div>
    </div>
</div>