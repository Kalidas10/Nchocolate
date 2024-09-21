<!DOCTYPE html>
<html>
<head>
    <title>Delete Chocolate</title>
</head>
<body>

<?php
// Check if the chocolate ID is provided
if (isset($_GET['id'])) {
    $chocolateId = $_GET['id'];

    // Connect to the database
    $connection = mysqli_connect("localhost", "root", "kali", "chocolate");

    // Check if connection was successful
    if (mysqli_connect_errno()) {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
        exit();
    }

    // Fetch the chocolate record from the database
    $selectQuery = "SELECT chocolateImage, chocolateName, chocolatePrice FROM chocolateStore WHERE id = $chocolateId";
    $result = mysqli_query($connection, $selectQuery);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $image = $row['chocolateImage'];
        $name = $row['chocolateName'];
        $price = $row['chocolatePrice'];

        echo "<h2>Delete Chocolate</h2>";
        echo "<p>Are you sure you want to delete the following chocolate?</p>";
        echo "<div>";
        echo "<img src='$image' alt='$name' width='100'><br>";
        echo "Name: $name<br>";
        echo "Price: $price<br>";
        echo "</div>";

        // Display the delete confirmation form
        echo "<form action='' method='POST'>";
        echo "<input type='hidden' name='id' value='$chocolateId'>";
        echo "<input type='submit' name='confirmDelete' value='Delete'>";
        echo "</form>";

        // Handle the delete confirmation
        if (isset($_POST['confirmDelete'])) {
            $deleteQuery = "DELETE FROM chocolateStore WHERE id = $chocolateId";
            if (mysqli_query($connection, $deleteQuery)) {
                echo "Record deleted successfully.";
                header("Location: try.php");
            } else {
                echo "Error deleting record: " . mysqli_error($connection);
            }
        }
    } else {
        echo "No chocolate found with the provided ID.";
    }

    // Close the database connection
    mysqli_close($connection);
} else {
    echo "Invalid chocolate ID.";
}
?>

</body>
</html>
