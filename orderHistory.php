<!DOCTYPE html>
<html>
<head>
    <style>
        /* Style the table */
        table {
            width: 100%;
            border-collapse: collapse;
        }

        /* Style table header */
        th {
            background-color: hotpink;
        }

        /* Style table cells */
        td, th {
            border: 1px solid blue;
            text-align: left;
            padding: 8px;
        }

        /* Style the table header row */
        tr:nth-child(even) {
            background-color: pink;
        }

        /* Style the header */
        h2 {
            text-align: center;
            color: hotpink;
        }
    </style>
</head>
<body>
    
<?php
// Connect to the database
$mysqli = new mysqli("localhost", "root", "kali", "chocolate");

// Check connection
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

// SQL query to fetch data from the orders table
$query = "SELECT id, full_name, phone_number, address, total_price, order_date
          FROM orders";

// Execute the query
$result = $mysqli->query($query);

// Check for errors in the query execution
if (!$result) {
    // Error occurred, display the error message
    echo "Error: " . $mysqli->error;
} elseif ($result->num_rows > 0) {
    // If there are rows in the result set, display them in a table
    echo "<h2>Order History</h2>";
    echo "<table border='1'>";
    echo "<tr><th>Order ID</th><th>Full Name</th><th>Phone Number</th><th>Address</th><th>Total Price</th><th>Order Date</th></tr>";

    // Output data of each row
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["id"] . "</td>";
        echo "<td>" . $row["full_name"] . "</td>";
        echo "<td>" . $row["phone_number"] . "</td>";
        echo "<td>" . $row["address"] . "</td>";
        echo "<td>Rs. " . $row["total_price"] . "</td>";
        echo "<td>" . $row["order_date"] . "</td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    // No rows found
    echo "No orders found.";
}

// Close the database connection
$mysqli->close();
?>
</body>
</html>
