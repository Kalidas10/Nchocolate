

<?php
session_start();

if (isset($_GET['id']) && !empty($_GET['id'])) {
    $productId = $_GET['id'];
    // print_r($productId);
    $connection = mysqli_connect("localhost", "root", "kali", "chocolate");

    // Check if connection was successful
    if (mysqli_connect_errno()) {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
        exit();
    }

    $sql = "SELECT * FROM chocolateStore WHERE id = '$productId'";
    $result = $connection->query($sql);

    if ($result->num_rows > 0) {
        $product = $result->fetch_assoc();

        // Add the product to the cart
        if (!isset($_SESSION['cart'])) {
            $_SESSION['cart'] = array();
        }

        if (array_key_exists($productId, $_SESSION['cart'])) {
            $_SESSION['cart'][$productId]['quantity']++;
        } else {
            $_SESSION['cart'][$productId] = array(
                'chocolateImage' => $product['chocolateImage'],
                'chocolateName' => $product['chocolateName'],
                'chocolatePrice' => $product['chocolatePrice'],
                'quantity' => 1,
            );
        }

        echo "Product added to cart successfully!";
    } else {
        echo "Product not found!";
    }

    $connection->close();
}
?>
