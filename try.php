<style>
    body {
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 20px;
    }

    h1 {
        text-align: center;
        margin-bottom: 20px;
        text-decoration: underline wavy hotpink;
    }

    h2 {
        text-align: center;
        text-underline-offset: 8px;
        text-decoration: underline overline wavy hotpink;
    }

    form {
        margin-bottom: 20px;
    }

    form label {
        display: block;
        margin-bottom: 5px;
    }

    form input[type="file"],
    form input[type="text"],
    form input[type="number"] {
        width: 100%;
        padding: 5px;
        margin-bottom: 10px;
    }

    form input[type="submit"] {
        padding: 10px 20px;
        background-color: hotpink;
        color: white;
        border: none;
        cursor: pointer;
        border-radius: 20px;
    }

    .chocolate-list {
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
    }

    .chocolate-item {
        width: 250px;
        padding: 10px;
        margin: 10px;
        text-align: center;
        background-color: #f9f9f9;
        border: 1px solid #ddd;
        border-radius: 5px;
    }

    .chocolate-image {
        width: 100%;
        height: auto;
        margin-bottom: 10px;
    }

    .chocolate-name {
        font-weight: bold;
        margin-bottom: 5px;
    }

    .chocolate-price {
        color: green;
        margin-bottom: 5px;
    }

    .form {
        width: 100%;
        height: 40%;
        display: flex;
        justify-content: center;
    }

    form {
        margin: 10px;
        width: 20%;
    }

    .table {
        display: flex;
        justify-content: center;
        align-items: center;
        width: 100%;
    }

    table {
        border-collapse: collapse;
        width: 70%;
    }

    .button a {
        text-decoration: none;
    }
</style>
<!DOCTYPE html>
<html>

<head>
    <title>Chocolate Store</title>
</head>

<body>

    <h1>Chocolate Store</h1>
    <div class="form">

        <!-- Form to add new chocolate -->
        <form action="" method="POST" enctype="multipart/form-data">
            <label for="image">Image:</label>
            <input type="file" name="image" id="image" required><br>
            <label for="name">Name:</label>
            <input type="text" name="name" id="name" required><br>
            <label for="price">Price:</label>
            <input type="number" step="0.01" name="price" id="price" required><br>
            <label for="quantity">Quantity:</label>
            <input type="number" name="quantity" id="quantity" required><br>
            <input type="submit" name="submit" value="Add Chocolate">
        </form>
    </div>

    <!-- Display existing chocolates from database -->
    <h2>Existing Chocolates</h2>
    <div class="table">
        <?php
        // Connect to the database
        $connection = mysqli_connect("localhost", "root", "kali", "chocolate");

        // Check if connection was successful
        if (mysqli_connect_errno()) {
            echo "Failed to connect to MySQL: " . mysqli_connect_error();
            exit();
        }

        // Insert new chocolate into database when form is submitted
        if (isset($_POST['submit'])) {
            $name = $_POST['name'];
            $price = $_POST['price'];
            $quantity = $_POST['quantity'];

            // File upload handling
            $image = $_FILES['image']['name'];
            $image_tmp = $_FILES['image']['tmp_name'];
            $image_path = "photo/" . $image; // Specify the directory where images are stored

            // Move the uploaded image to the specified directory
            if (move_uploaded_file($image_tmp, $image_path)) {
                // Insert the data into the database, including quantity
                $query = "INSERT INTO chocolatestore (chocolateImage, chocolateName, chocolatePrice, quantity) VALUES ('$image_path', '$name', '$price', '$quantity')";
                if (mysqli_query($connection, $query)) {
                    echo "Chocolate added successfully!";
                } else {
                    echo "Error inserting record: " . mysqli_error($connection);
                }
            } else {
                echo "Image upload failed.";
            }
        }

        // Handle selling of chocolate when "Sell" button is clicked
        if (isset($_GET['sell_id'])) {
            $id = $_GET['sell_id'];
            $sellQuantity = 1; // The number of items sold in one click
            // Update the sold item count and reduce quantity
            $updateQuery = "UPDATE chocolatestore 
                            SET quantity = quantity - $sellQuantity, 
                                sold_item = sold_item + $sellQuantity, 
                                sold_date = CURDATE() 
                            WHERE id = $id AND quantity >= $sellQuantity";
            if (mysqli_query($connection, $updateQuery)) {
                echo "Item sold successfully!";
            } else {
                echo "Error updating record: " . mysqli_error($connection);
            }
        }

        // Delete chocolate from the database when delete link is clicked
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $deleteQuery = "DELETE FROM chocolatestore WHERE id = $id";
            if (mysqli_query($connection, $deleteQuery)) {
                echo "Chocolate deleted successfully!";
            } else {
                echo "Error deleting record: " . mysqli_error($connection);
            }
        }

        // Fetch existing chocolates from the database
        $selectQuery = "SELECT * FROM chocolatestore";
        $result = mysqli_query($connection, $selectQuery);

        // Display the chocolates in a table
        echo "<table border='1px' cellpadding='10px'>";
        echo "<tr><th>Image</th><th>Name</th><th>Price</th><th>Quantity</th><th>Sold Items</th><th>Sold Date</th><th>Actions</th></tr>";
        while ($row = mysqli_fetch_assoc($result)) {
            $id = $row['id'];
            $image = $row['chocolateImage'];
            $name = $row['chocolateName'];
            $price = $row['chocolatePrice'];
            $quantity = $row['quantity'];
            $sold_item = $row['sold_item'];
            $sold_date = $row['sold_date'];

            echo "<tr>";
            echo "<td><img src='$image' alt='$name' width='100'></td>";
            echo "<td>$name</td>";
            echo "<td>$price</td>";
            echo "<td>$quantity</td>";
            echo "<td>$sold_item</td>";
            echo "<td>$sold_date</td>";
            echo "<td>
                <button class='button'><a href='edit.php?id=$id'>Edit</a></button> |
                <button class='button'><a href='?id=$id'>Delete</a></button> |
                <button class='button'><a href='?sell_id=$id'>Sell</a></button>
            </td>";
            echo "</tr>";
        }
        echo "</table>";

        // Close the database connection
        mysqli_close($connection);
        ?>
    </div>

</body>



</html>