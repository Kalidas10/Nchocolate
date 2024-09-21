<!DOCTYPE html>
<html>
<style>
    /* CSS for the "Order Now" button */
    .order-button-container {
        text-align: center;
        margin-top: 20px;
    }

    .order-button {
        padding: 10px 20px;
        font-size: 16px;
        background-color: #ff30e7;
        color: white;
        border: none;
        cursor: pointer;
        border-radius: 5px;
    }

    .order-button:hover {
        background-color: #991189;
    }

    body {
        font-family: Arial, sans-serif;
        display: flex;
        /* Display flex to create a horizontal layout */
    }

    .left-column {
        width: 60%;
        /* Set the width for the left column */
        padding: 20px;
    }

    .right-column {
        width: 40%;
        padding: 20px;
        background-color: #f2f2f2;
        margin-top: 172px;
        border-radius: 10px;
        /* Rounded corners for a cute look */
        box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.2);
        /* Add a subtle shadow */
    }

    h1 {
        text-align: center;
        margin-bottom: 20px;
    }

    a {
        display: block;
        text-align: center;
        margin-bottom: 20px;
        text-decoration: none;
    }

    table {
        width: 100%;
        border-collapse: collapse;
    }

    th,
    td {
        padding: 10px;
        border: 1px solid #ddd;
        text-align: center;
    }

    th {
        background-color: #f2f2f2;
    }

    img {
        max-width: 100px;
        max-height: 100px;
    }

    .total-container {
        text-align: right;
        margin-top: 20px;
        font-size: 18px;
        font-weight: bold;
    }

    .total-label {
        display: inline-block;
        margin-right: 50px;
    }

    .total-value {
        display: inline-block;
        padding: 5px 10px;
        border: 1px solid #ddd;
        border-radius: 5px;
        background-color: #f2f2f2;
        margin-right: 216px;
    }

    /* Styles for the order form */
    .order-form {
        text-align: left;
    }

    .form-label {
        font-size: 16px;
        font-weight: bold;
        margin-bottom: 5px;
        display: block;
    }

    .form-input {
        width: 100%;
        padding: 10px;
        margin-bottom: 20px;
        border: 1px solid #ddd;
        border-radius: 5px;
        font-size: 16px;
    }

    .form-input:focus {
        border-color: #ff30e7;
    }

    .order-button {
        width: 100%;
    }
</style>

<head>
    <title>Shopping Cart</title>
</head>

<body>
    <div class="left-column">
        <h1>Shopping Cart</h1>
        <a href="trytwo1.php">Continue Shopping</a>
        <br><br>

        <!-- Shopping cart details -->
        <?php
        session_start();
        if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
            echo "<table border='1'>";
            echo "<tr><th>Product Image</th><th>Product Name</th><th>Price</th><th>Quantity</th><th>Total</th><th>Action</th></tr>";

            $finalTotal = 0;

            foreach ($_SESSION['cart'] as $productId => $product) {
                echo "<tr>";
                echo "<td><img src='" . $product['chocolateImage'] . "' alt='" . $product['chocolateName'] . "' width='100'></td>";
                echo "<td>" . (isset($product['chocolateName']) ? $product['chocolateName'] : '') . "</td>";
                echo "<td>Rs." . (isset($product['chocolatePrice']) ? $product['chocolatePrice'] : '') . "</td>";
                echo "<td><input type='number' value='" . $product['quantity'] . "' onchange=\"updateQuantity($productId, this.value)\"></td>";
                $productTotal = (isset($product['chocolatePrice']) ? $product['chocolatePrice'] : 0) * $product['quantity'];
                echo "<td>Rs." . $productTotal . "</td>";
                $finalTotal += $productTotal;
                echo "<td><button onclick=\"removeProduct($productId)\">Remove</button></td>";
                echo "</tr>";
            }

            echo "</table>";

            echo "<div class='total-container'>";
            echo "<span class='total-label'>Total:</span>";
            echo "<span class='total-value'>Rs. " . $finalTotal . "</span>";
            echo "</div>";
        } else {
            echo "Your cart is empty.";
        }
        ?>

        <script>
            function updateQuantity(productId, quantity) {
                var xhttp = new XMLHttpRequest();
                xhttp.onreadystatechange = function () {
                    if (this.readyState == 4 && this.status == 200) {
                        location.reload();
                    }
                };
                xhttp.open("GET", "update_quantity.php?id=" + productId + "&quantity=" + quantity, true);
                xhttp.send();
            }

            function removeProduct(productId) {
                var xhttp = new XMLHttpRequest();
                xhttp.onreadystatechange = function () {
                    if (this.readyState == 4 && this.status == 200) {
                        alert(this.responseText);
                        location.reload();
                    }
                };
                xhttp.open("GET", "remove_product.php?id=" + productId, true);
                xhttp.send();
            }
        </script>
    </div>

    <div class="right-column">
        <h2>Order Details</h2>
        <form class="order-form" action="" method="POST">
            <div>
                <label class="form-label" for="fullName">Full Name:</label>
                <input class="form-input" type="text" id="fullName" name="fullName" required>
            </div>
            <div>
                <label class="form-label" for="phoneNumber">Phone Number:</label>
                <input class="form-input" type="tel" id="phoneNumber" name="phoneNumber" required>
            </div>
            <div>
                <label class="form-label" for="address">Address:</label>
                <textarea class="form-input" id="address" name="address" rows="4" required></textarea>
            </div>
            <button class="order-button" type="submit" name="submitOrder">Place Order</button>
        </form>
    </div>

    <?php
    if (isset($_POST['submitOrder'])) {
        $fullName = $_POST['fullName'];
        $phoneNumber = $_POST['phoneNumber'];
        $address = $_POST['address'];

        $mysqli = new mysqli("localhost", "root", "kali", "chocolate");

        if ($mysqli->connect_error) {
            die("Connection failed: " . $mysqli->connect_error);
        }

        $finalTotal = 0;
        $isStockAvailable = true; // Flag to check stock availability

        if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
            // Check stock availability
            foreach ($_SESSION['cart'] as $productId => $product) {
                $quantityRequested = $product['quantity'];
                $stockCheckQuery = "SELECT quantity FROM chocolatestore WHERE id = $productId";
                $stockResult = $mysqli->query($stockCheckQuery);
                if ($stockResult && $stockResult->num_rows > 0) {
                    $stockRow = $stockResult->fetch_assoc();
                    if ($stockRow['quantity'] < $quantityRequested) {
                        $isStockAvailable = false;
                        break;
                    }
                }
            }
            
            if ($isStockAvailable) {
                // Insert order details
                $query = "INSERT INTO orders (full_name, phone_number, address, total_price) VALUES (?, ?, ?, ?)";
                $stmt = $mysqli->prepare($query);

                foreach ($_SESSION['cart'] as $productId => $product) {
                    $productTotal = (isset($product['chocolatePrice']) ? $product['chocolatePrice'] : 0) * $product['quantity'];
                    $finalTotal += $productTotal;
                }

                $stmt->bind_param("sssd", $fullName, $phoneNumber, $address, $finalTotal);
                if ($stmt->execute()) {
                    $orderId = $mysqli->insert_id;  // Get the ID of the newly inserted order

                    // Insert each product in the order_items table and update inventory
                    foreach ($_SESSION['cart'] as $productId => $product) {
                        $quantity = $product['quantity'];
                        $productTotal = (isset($product['chocolatePrice']) ? $product['chocolatePrice'] : 0) * $quantity;

                        // Insert the product into the order_items table
                        $insertQuery = "INSERT INTO order_items (order_id, product_id, product_name, quantity, price) VALUES (?, ?, ?, ?, ?)";
                        $insertStmt = $mysqli->prepare($insertQuery);
                        $insertStmt->bind_param("iisdd", $orderId, $productId, $product['chocolateName'], $quantity, $productTotal);
                        $insertStmt->execute();
                        $insertStmt->close();

                        // Update the quantity in chocolatestore
                        $updateQuery = "UPDATE chocolatestore SET quantity = quantity - $quantity WHERE id = $productId";
                        $mysqli->query($updateQuery);
                    }

                    $_SESSION['cart'] = array();
                    session_destroy();
                    echo "<script>window.location.href = 'php/orderConfirmation.php';</script>";
                } else {
                    echo "Error: " . $stmt->error;
                }
            } else {
                echo "Sorry, some items in your cart are out of stock.";
            }
        }

        $stmt->close();
        $mysqli->close();
    }
    ?>

</body>


</html>