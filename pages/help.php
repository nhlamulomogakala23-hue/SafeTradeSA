<?php
// This stops the "Undefined variable" warning from breaking your input fields!
$name = "";
$issue = "";
$message_status = "";

// Check if the user clicked "Send Message"
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect the inputs safely
    $name = isset($_POST['name']) ? htmlspecialchars($_POST['name']) : '';
    $issue = isset($_POST['issue']) ? htmlspecialchars($_POST['issue']) : '';
    
    // Set our status indicator to show your notification text
    $message_status = "message sent";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Help & Support | SafeTrade SA</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

    <!-- YOUR CUSTOM CSS FILE CONNECTION -->
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body style="background-color: #f4f6f8;">

    <!-- Minimal Header -->
    <header class="bg-white border-bottom py-3 sticky-top">
        <div class="container d-flex justify-content-between align-items-center">
            <a href="../index.php">
                <img src="../assets/img/logo.png" alt="SafeTrade SA Logo" style="height: 40px; object-fit: contain;">
            </a>
            <a href="../index.php" class="text-secondary text-decoration-none fw-medium">Back to Home</a>
        </div>
    </header>

    <!-- Page Content -->
    <main class="container py-5" style="max-width: 600px;">
        <h2 class="fw-bold text-center mb-4" style="color: #121212;">How can we help?</h2>
        
        <div class="card border-0 shadow-sm mb-4" style="border-radius: 8px;">
            <div class="card-body p-4">
                <h5 class="fw-bold mb-3">Contact Support</h5>
                <form action="help.php" method="post">
                    <div class="mb-3">
                        <label class="form-label text-secondary fw-medium">Your Name</label>
                        <input type="text" class="form-control py-2" name="name" value="<?php echo $name; ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label text-secondary fw-medium">Issue Description</label>
                        <textarea class="form-control" rows="4" name="issue"><?php echo $issue; ?></textarea>
                    </div>
                    <button type="submit" class="btn w-100 py-2 fw-medium text-white" style="background-color: #121212; border-radius: 4px;">Send Message</button>
                </form>
            </div>
        </div>

        <div class="text-center">
            <p class="text-secondary">Or email us directly at <a href="mailto:support@safetrade.co.za" style="color: #008060; font-weight: 500;">support@safetrade.co.za</a></p>
        </div>
    </main>

</body>
</html>