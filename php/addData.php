<?php
$connection = new mysqli('localhost', 'root', '', 'chocolate');
if ($connection->connect_error) {
  echo "$connection->connect_error";
  die("Connection Failed: " . $connection->connect_error);
}

// Retrieving form data
$firstName = $_POST['firstName'];
$lastName = $_POST['lastName'];
$phoneNumber = $_POST['phoneNumber'];
$password = $_POST['password'];
$address = $_POST['address'];

// Creating the SQL query
$query = "INSERT INTO register (firstName, lastName, phoneNumber, password, address) 
          VALUES ('$firstName', '$lastName', '$phoneNumber', '$password', '$address')";

// Executing the query
if ($connection->query($query) === TRUE) {
  // Signup successful, redirect to another page
  header('Location: loginsuccessful.html');
  exit;
} else {
  echo "Error inserting record: " . $connection->error;
}

// Closing the database connection
$connection->close();
?>
