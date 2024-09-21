<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Placed Successfully</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }

        .container {
            text-align: center;
            padding: 20px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.2);
        }

        h1 {
            color: hotpink;
            font-size: 36px;
            margin: 0;
            padding: 10px 0;
        }

        p {
            font-size: 18px;
            color: #333;
        }

        .continue-button {
            display: inline-block;
            margin-top: 20px;
            padding: 10px 20px;
            background-color: hotpink;
            color: #fff;
            font-size: 18px;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        .continue-button:hover {
            background-color: pink;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Order Placed Successfully</h1>
        <p>Your order has been successfully placed. Thank you for shopping with us!</p><br>
        <p>Your Items will be delivered with in 24 hours!</p><br>
        <p>Our team will contact you on delivery time</p>
        <a class="continue-button" href="../trytwo1.php">Continue Shopping</a>
    </div>
</body>
</html>
