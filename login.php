<?php
$connection = new mysqli('localhost', 'root', 'kali', 'chocolate');
if ($connection->connect_error) {
    echo "$connection->connect_error";
    die("Connection Failed: " . $connection->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $phoneNumber = $_POST['phone_number'];
    $password = $_POST['password'];

    $query = "SELECT * FROM register WHERE phoneNumber='$phoneNumber' AND password='$password'";

    // Executing the query
    $result = mysqli_query($connection, $query);

    if ($result) {
        // Check the number of rows returned
        if (mysqli_num_rows($result) > 0) {
            // User exists in the database
            $row = mysqli_fetch_assoc($result);
            $roleId = $row['roleId'];

            if ($roleId == 1) {
                // Redirect to adminPanel.php for role 1
                header("Location: php/adminPanel.php");
                exit();
            } elseif ($roleId == 2) {
                // Redirect to trytwo1.php for role 2
                header("Location: trytwo1.php");
                exit();
            } else {
                // Invalid roleId, redirect to errorUserCheck.html
                header("Location: errorUserCheck.html");
                exit();
            }
        } else {
            // User does not exist or invalid login credentials
            header("Location: errorUserCheck.html");
            exit();
        }
    } else {
        // Error in executing the query
        echo "Error: " . mysqli_error($connection);
    }

    // Closing the database connection
    mysqli_close($connection);
}

?>