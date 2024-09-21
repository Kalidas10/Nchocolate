<!-- update_quantity.php -->

<?php
session_start();

if (isset($_GET['id']) && isset($_GET['quantity']) && !empty($_GET['id']) && !empty($_GET['quantity'])) {
    $productId = $_GET['id'];
    $quantity = $_GET['quantity'];

    // Update the quantity in the cart
    if (isset($_SESSION['cart'][$productId])) {
        $_SESSION['cart'][$productId]['quantity'] = $quantity;
        echo "Quantity updated successfully!";
    } else {
        echo "Product not found in the cart!";
    }
}
?>