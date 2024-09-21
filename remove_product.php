<?php
session_start();

if (isset($_GET['id']) && !empty($_GET['id'])) {
    $productId = $_GET['id'];

    // Check if the product exists in the cart
    if (isset($_SESSION['cart'][$productId])) {
        unset($_SESSION['cart'][$productId]);
        echo "Product removed from the cart!";
    } else {
        echo "Product not found in the cart!";
    }
}
?>
