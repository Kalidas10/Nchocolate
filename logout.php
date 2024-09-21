<?php
session_start(); // Start the session

// Clear all session variables
$_SESSION = array();

// Destroy the session
session_destroy();

// Redirect to the login page or any other page you want after logout
header("Location: login.html"); // Change "login.php" to your login page URL
exit();
?>
