<?php
include 'php/connectToDatabase.php';

// Retrieving form data
$firstName = $_POST['firstName'];
$lastName = $_POST['lastName'];
$phoneNumber = $_POST['phoneNumber'];
$password = $_POST['password'];
$address = $_POST['address'];
// Creating the SQL query
$query = "INSERT INTO register (firstName, lastName, phoneNumber, password, address, roleId) 
              VALUES ('$firstName', '$lastName', '$phoneNumber', '$password', '$address', 2)";

// Executing the query
if ($connection->query($query) === true) {
  // Signup successful, redirect to another page
  header('Location: loginsuccessful.html');
  exit;
} else {
  echo "Error inserting record: " . $connection->error;
}

// Closing the database connection
$connection->close();
?>