// SafeTrade SA Custom Scripts

document.addEventListener("DOMContentLoaded", function() {
    
    // 1. Splash Screen Redirect Logic
    // Checks if the user is currently looking at splash.php
    if (window.location.pathname.includes("splash.php")) {
        // Wait 3 seconds (3000 milliseconds), then redirect to the homepage
        setTimeout(function() {
            window.location.href = "index.html"; 
        }, 3000);
    }

});

// 2. Product Page Button Logic
// This function runs when the "Buy with Escrow" button is clicked on product.php
function initiateEscrow() {
    alert("Secure Escrow Initiated! Your funds will be held safely until you receive the item.");
    
    // Note: Later on, you can change this function to redirect to a real checkout page
    // window.location.href = "checkout.php";
}