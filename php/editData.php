<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Process the form data and update the user record in the database
    $id = $_POST["id"];
    $firstName = $_POST["firstName"];
    $lastName = $_POST["lastName"];
    $phoneNumber = $_POST["phoneNumber"];
    $password = $_POST["password"];
    $address = $_POST["address"];

    // Connect to the database (You may need to adjust the database connection settings)
    include 'connectToDatabase.php';

    // Update the user record in the database
    $updateQuery = "UPDATE register SET firstName='$firstName', lastName='$lastName', phoneNumber='$phoneNumber', password='$password', address='$address' WHERE id='$id'";
    if (mysqli_query($connection, $updateQuery)) {
        // Redirect back to the admin panel after successful update
        header("Location: adminPanel.php");
        exit;
    } else {
        echo "Error updating record: " . mysqli_error($connection);
    }

    // Close the database connection
    mysqli_close($connection);
}
?>

<!-- HTML form to edit user data -->
<!DOCTYPE html>
<html>
<head>
    <title>Edit User Data</title>
</head>
<body>
    <h2>Edit User Data</h2>
    <?php
    // Retrieve the user data from the database based on the provided ID
    if (isset($_GET['id'])) {
        // Connect to the database (You may need to adjust the database connection settings)
        include 'connectToDatabase.php';

        $id = $_GET['id'];
        $selectQuery = "SELECT * FROM register WHERE id='$id'";
        $result = mysqli_query($connection, $selectQuery);

        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            ?>
            <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                <label>First Name:</label>
                <input type="text" name="firstName" value="<?php echo $row['firstName']; ?>" required><br>
                <label>Last Name:</label>
                <input type="text" name="lastName" value="<?php echo $row['lastName']; ?>" required><br>
                <label>Phone Number:</label>
                <input type="text" name="phoneNumber" value="<?php echo $row['phoneNumber']; ?>" required><br>
                <label>Password:</label>
                <input type="password" name="password" value="<?php echo $row['password']; ?>" required><br>
                <label>Address:</label>
                <input type="text" name="address" value="<?php echo $row['address']; ?>" required><br>
                <input type="submit" value="Update">
            </form>
            <?php
        } else {
            echo "User not found.";
        }

        // Close the database connection
        mysqli_close($connection);
    } else {
        echo "Invalid request.";
    }
    ?>
</body>
</html>
