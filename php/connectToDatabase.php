<?php
$servername = "localhost";
$username = "root";
$password = "kali";
$databaseName = "chocolate";

$connection = mysqli_connect($servername, $username, $password, $databaseName);

if (!$connection) {
          echo "Error while Connecting to " . $databaseName;
}

?>        