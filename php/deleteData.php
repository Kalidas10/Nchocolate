<?php
// Connect to the database (You may need to adjust the database connection settings)
include 'connectToDatabase.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $deleteQuery = "DELETE FROM register WHERE id='$id'";

    if (mysqli_query($connection, $deleteQuery)) {
        // Redirect back to the admin panel after successful deletion
        header("Location: adminPanel.php");
        exit;
    } else {
        echo "Error deleting record: " . mysqli_error($connection);
    }
}

// Close the database connection
mysqli_close($connection);
?>
