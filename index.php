<?php
session_start();
require_once 'config/db.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SafeTrade SA | Secure C2C Marketplace & Escrow</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <style>
        .shopify-header {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            border-bottom: 1px solid #e5e5e5;
            padding: 15px 0;
            position: sticky;
            top: 0;
            z-index: 1000;
        }
        .shopify-nav-links a {
            color: #333;
            text-decoration: none;
            font-weight: 500;
            transition: color 0.2s;
        }
        .shopify-nav-links a:hover {
            color: #008060;
        }
    </style>
</head>
<body>

    <!-- Header Navigation -->
    <header class="shopify-header">
        <div class="container d-flex justify-content-between align-items-center">
            <div class="fw-bold fs-4 text-dark">
                SafeTrade<span style="color: #008060;">SA</span>
            </div>
            
            <nav class="d-none d-md-flex align-items-center gap-4 shopify-nav-links">
                <a href="index.php">Home</a>
                <a href="listing.php">Marketplace</a>
                <a href="#">How Escrow Works</a>
            </nav>

            <div class="d-flex align-items-center gap-3">
                <a href="login.php" class="text-dark text-decoration-none fw-medium px-2">Log in</a>
                <a href="seller/register.php" class="btn text-white px-4 py-2 rounded-pill fw-semibold" style="background-color: #008060;">Start for free</a>
            </div>
        </div>
    </header>

    <!-- Hero Section -->
    <section class="hero-section" style="background-color: #0d1b1e; color: #ffffff; min-height: 80vh; display: flex; align-items: center; position: relative; overflow: hidden; padding-bottom: 80px;">
        <div style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; background: linear-gradient(135deg, #0d1b1e 0%, #1a3a32 100%); opacity: 0.9; z-index: 1;"></div>
        
        <div class="container py-5" style="position: relative; z-index: 2;">
            <div class="row align-items-center">
                <div class="col-lg-8 hero-content">
                    <div class="hero-badge d-inline-flex align-items-center bg-white bg-opacity-10 border border-white border-opacity-20 px-3 py-1 rounded-pill small mb-4">
                        <i class="bi bi-shield-check text-success me-2"></i> South Africa’s #1 Secure C2C Platform
                    </div>
                    
                    <h1 class="hero-title fw-bold lh-1 mb-4" style="font-size: 3.5rem; letter-spacing: -0.03em; min-height: 140px;">
                        Be the next <span id="rotating-text" style="color: #008060;">all-star</span>.
                    </h1>
                    
                    <p class="hero-subtitle text-muted fs-5 mb-4" style="color: #d1d5db !important;">
                        Transact buyers safely, and grow your business with zero hassle.
                    </p>
                    
                    <div class="hero-cta-group d-flex gap-3 mt-4">
                        <a href="listing.php" class="btn text-white px-4 py-3 rounded-pill fw-semibold" style="background-color: #ff6600;">Browse Listings</a>
                        <a href="seller/register.php" class="btn btn-outline-light px-4 py-3 rounded-pill fw-semibold">Sell an Item</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Stats Counter Section with Animated Numbers -->
    <div class="container mb-5">
        <div class="stats-container">
            <div class="row text-center g-4">
                <div class="col-6 col-md-3">
                    <div class="stat-number" data-target="4821">0</div>
                    <div class="stat-label">Active Listings</div>
                </div>
                <div class="col-6 col-md-3">
                    <div class="stat-number" data-target="1340">0</div>
                    <div class="stat-label">Verified Sellers</div>
                </div>
                <div class="col-6 col-md-3">
                    <div class="stat-number" data-target="28600" data-suffix="+">0</div>
                    <div class="stat-label">Successful Trades</div>
                </div>
                <div class="col-6 col-md-3">
                    <div class="stat-number" data-target="52">0</div>
                    <div class="stat-label">Cities Covered</div>
                </div>
            </div>
        </div>
    </div>

    <!-- Value Proposition Section -->
    <section class="py-5 bg-light">
        <div class="container py-4">
            <div class="text-center mb-5">
                <h2 class="fw-bold display-6">Buy everywhere people shop. Online and in person.</h2>
                <p class="text-muted">SafeTrade SA powers secure commerce across South Africa locally and globally.</p>
            </div>
            
            <div class="row g-4">
                <div class="col-md-4">
                    <div class="p-4 bg-white rounded-4 border h-100 shadow-sm">
                        <div class="mb-3 text-success fs-2"><i class="bi bi-shield-lock"></i></div>
                        <h4 class="fw-bold mb-2">Escrow Protected</h4>
                        <p class="text-muted mb-0">Funds are held safely in escrow until the buyer confirms safe delivery of the item.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="p-4 bg-white rounded-4 border h-100 shadow-sm">
                        <div class="mb-3 text-success fs-2"><i class="bi bi-person-check"></i></div>
                        <h4 class="fw-bold mb-2">Verified Members</h4>
                        <p class="text-muted mb-0">Trade with absolute peace of mind knowing buyer and seller profiles are authenticated.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="p-4 bg-white rounded-4 border h-100 shadow-sm">
                        <div class="mb-3 text-success fs-2"><i class="bi bi-lightning-charge"></i></div>
                        <h4 class="fw-bold mb-2">Instant Payouts</h4>
                        <p class="text-muted mb-0">Fast, streamlined releases straight to your bank account once transactions conclude.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- JavaScript for Rotating Text & Number Counting Animation -->
    <script>
        // Hero Slogan Rotator
        const phrases = ["all-star.", "household name.", "solo-preneur.", "unstoppable.", "market leader."];
        let currentIndex = 0;
        const textElement = document.getElementById("rotating-text");

        function rotateText() {
            currentIndex = (currentIndex + 1) % phrases.length;
            textElement.style.opacity = 0;
            setTimeout(() => {
                textElement.textContent = phrases[currentIndex];
                textElement.style.opacity = 1;
            }, 200);
        }
        textElement.style.transition = "opacity 0.2s ease-in-out";
        setInterval(rotateText, 3000);

        // Number Counter Animation Effect
        const counters = document.querySelectorAll('.stat-number');
        counters.forEach(counter => {
            const target = +counter.getAttribute('data-target');
            const suffix = counter.getAttribute('data-suffix') || '';
            let count = 0;
            const speed = target / 50; // Adjust speed of counting

            const updateCount = () => {
                count += speed;
                if (count < target) {
                    counter.innerText = Math.ceil(count).toLocaleString() + suffix;
                    setTimeout(updateCount, 30);
                } else {
                    counter.innerText = target.toLocaleString() + suffix;
                }
            };
            updateCount();
        });
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>