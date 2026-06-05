<?php
// Include the database connection
// We use '../' to step out of the seller folder to reach the config folder
include '../config/db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $item_name = $_POST['item_name'];
    $price = $_POST['price'];
    $description = $_POST['description'];

    // SQL Query to insert the item
    $sql = "INSERT INTO listings (item_name, price, description) VALUES ('$item_name', '$price', '$description')";

    if (mysqli_query($conn, $sql)) {
        echo "Item listed successfully! <a href='../seller/dashboard.php'>Go back to dashboard</a>";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}