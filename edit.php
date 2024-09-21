<?php
// Connect to the database
$connection = mysqli_connect("localhost", "root", "kali", "chocolate");

// Check if connection was successful
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    exit();
}

// Check if ID is provided in the URL
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Fetch the chocolate details from the database
    $selectQuery = "SELECT chocolateImage, chocolateName, chocolatePrice FROM chocolateStore WHERE id = $id";
    $result = mysqli_query($connection, $selectQuery);

    // Check if the query was successful
    if (!$result) {
        echo "Error in query: " . mysqli_error($connection);
        exit();
    }

    // Check if the chocolate exists
    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $image = $row['chocolateImage'];
        $name = $row['chocolateName'];
        $price = $row['chocolatePrice'];
    } else {
        echo "Chocolate not found.";
        exit();
    }
} else {
    echo "Invalid request.";
    exit();
}

// Handle update action when form is submitted
if (isset($_POST['update'])) {
    $name = $_POST['name'];
    $price = $_POST['price'];

    // File upload handling
    if ($_FILES['image']['size'] > 0) {
        $image = $_FILES['image']['name'];
        $image_tmp = $_FILES['image']['tmp_name'];
        $image_path = "photo/" . $image; // Specify the directory where images are stored

        // Move the uploaded image to the specified directory
        if (move_uploaded_file($image_tmp, $image_path)) {
            // Update the chocolate details in the database
            $updateQuery = "UPDATE chocolatestore SET chocolateImage = '$image_path', chocolateName = '$name', chocolatePrice = '$price' WHERE id = $id";
            if (mysqli_query($connection, $updateQuery)) {
                echo "Record updated successfully.";
                header("Location: try.php");
            } else {
                echo "Error updating record: " . mysqli_error($connection);
            }
        } else {
            echo "Image upload failed.";
        }
    } else {
        // Update the chocolate details in the database without changing the image
        $updateQuery = "UPDATE chocolateStore SET chocolateName = '$name', chocolatePrice = '$price' WHERE id = $id";
        if (mysqli_query($connection, $updateQuery)) {
            echo "Record updated successfully.";
            header("Location: try.php");
        } else {
            echo "Error updating record: " . mysqli_error($connection);
        }
    }
}

// Close the database connection
mysqli_close($connection);
?>

<!DOCTYPE html>
<html>

<head>
    <title>Edit Chocolate</title>
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

        form {
            width: 300px;
            margin: 0 auto;
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

        .current-image {
            width: 100%;
            height: auto;
            margin-bottom: 10px;
        }
    </style>
</head>

<body>
    <h1>Edit Chocolate</h1>

    <form action="" method="POST" enctype="multipart/form-data">
        <img src="<?php echo $image; ?>" alt="Current Image" class="current-image"><br>
        <input type="file" name="image" id="image"><br>
        <label for="name">Name:</label>
        <input type="text" name="name" id="name" value="<?php echo $name; ?>" required><br>
        <label for="price">Price:</label>
        <input type="number" name="price" id="price" value="<?php echo $price; ?>" step="0.01" required><br>
        <input type="submit" name="update" value="Update">
    </form>
</body>

</html>