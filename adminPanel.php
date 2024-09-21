<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
    <style>
        /* Overall page styles */
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
        }

        /* Sidebar styles */
        .sidebar {
            width: 200px;
            height: 100vh;
            background-color: #f1f1f1;
            position: fixed;
            top: 0;
            left: 0;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .sidebar ul {
            list-style-type: none;
            padding: 0;
            margin: 0;
            text-align: center;
        }

        .sidebar li {
            padding: 10px;
            border-bottom: 1px solid #ccc;
        }

        .sidebar li:hover{
            background: #ffffff ;
        }

        /* Right section styles */
        .right-section {
            margin-left: 200px; /* Set margin to accommodate the width of the sidebar */
            padding: 20px;
            overflow-y: auto; /* Enable vertical scrolling if needed */
        }

        /* Content styles */
        .content {
            background-color: #fff;
            padding: 20px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
    </style>
</head>
<body>

<!-- Sidebar -->
<div class="sidebar">
    <ul>
        <li>Dashboard</li>
        <li>Orders</li>
        <li>Products</li>
        <li>Customers</li>
        <li>Reports</li>
    </ul>
</div>

<!-- Right section -->
<div class="right-section">
    <h1>Welcome to the Dashboard</h1>

    <div class="content">
        <h2>Recent Orders</h2>
        <p>Order 1 details...</p>
        <p>Order 2 details...</p>
        <p>Order 3 details...</p>
        <!-- More content here -->
    </div>

    <div class="content">
        <h2>Product Statistics</h2>
        <p>Product statistics here...</p>
        <!-- More content here -->
    </div>

    <!-- More sections and content here -->
</div>

</body>
</html>
