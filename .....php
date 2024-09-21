<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />

    <style>
        * {
            margin: 0px;
            padding: 0px;
            box-sizing: border-box;
        }

        .sidebar {
            position: fixed;
            top: 0;
            left: 0;
            background: url(photo/flower.jpg);
            background-size: cover;
            height: 100vh;
            width: 20vw;
            background-position: center;
            background-repeat: no-repeat;
        }

        .logo {
            height: 30%;
        }

        .image {
            width: 80%;
            height: 55%;
            margin: 10px 0 0 10px;
        }

        .fa {
            padding: 15px;
            font-size: 20px;
            width: 55px;
            text-align: center;
            text-decoration: none;
            margin: 5px 2px;
            border-radius: 50%;
        }

        .fa:hover {
            opacity: 0.7;
        }

        .fa-facebook {
            background: #3B5998;
            color: white;
        }

        .fa-twitter {
            background: #55ACEE;
            color: white;
        }

        .fa-google {
            background: #dd4b39;
            color: white;
        }

        .fa-linkedin {
            background: #007bb5;
            color: white;
        }

        .fa-youtube {
            background: #bb0000;
            color: white;
        }

        .fa-instagram {
            background: #125688;
            color: white;
        }

        ul li {
            margin: 0px 10px 34px 10px;
            list-style-type: none;
        }

        ul li a {
            text-decoration: none;
            font-size: 25px;
            font-weight: 600;
            color: #333;
        }

        .menu {
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .social-icons {
            margin: 45px 0 0 26px;

        }

        .righttop {
            background: url(photo/backgroundf.png);
            background-size: cover;
            height: 580px;
            background-position: initial;
            background-repeat: no-repeat;
            width: 100%;
        }

        .container {
            display: flex;
            justify-content: center;

        }

        .rightsection {
            width: 80%;
            margin-left: 307px;
            overflow-y: auto;
            height: 100vh;
        }

        .best{
            position: relative;
            top: 183px;
        }
        .best h1 {
            
            margin-left: 26px;
            text-align: center;
            font-size: 70px;
            color: white;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .address {
            position: relative;
            top: 200px;
            margin-left: 466px;
            color: white;
            font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
            font-size: 30px;

        }

        .shopp {
            position: relative;
            margin-left: 539px;
            color: white;
            font-size: 30px;
            top: 244px;
            background-color: rgb(253, 93, 194);
            width: 150px;
            text-align: center;
            border-radius: 50px;
            height: 40px;

        }

        .rightlower {
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            margin: 25px;
        }

        .rightlower li img {
            width: 90%;
        }
        .rightlower {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            /* Three columns */
            grid-gap: 20px;
            /* Gap between grid items */
            list-style-type: none;
            /* Remove bullet points */
        }

        .product-item {
            text-align: center;
            background-color: #E4E4E4;
            /* Set background color */
            border: 1px solid #ccc;
            /* Add border */
            padding: 10px;
            /* Add padding */
            border-radius: 40px;
            box-shadow: 0px 2px 8px 1px rgb(253, 93, 194);
            height: 329px;
        }


        .product-image {
            width: 100%;
            height: auto;
            height: 200px;
            /* Adjust the height to your desired value */
            object-fit: cover;
            background-color: #f1f1f1;
            /* Add desired background color */
            border: 1px solid #ccc;
            /* Add desired border style */
            border-radius: 5px;
            /* Add border radius for rounded corners */
            box-shadow: 0px 2px 8px 1px #007bb5;
            transition: transform 0.3s ease;
            cursor: pointer;
        }

        .product-image:hover {
            transform: scale(1.1);
        }

        .product-name {
            margin-top: 10px;
            font-weight: bold;
        }

        .product-price {
            margin-top: 5px;
            color: green;
        }

.buy-button, .cart-button {
  display: inline-block;
  padding: 10px 20px;
  background-color: hotpink;
  color: white;
  border: none;
  cursor: pointer;
  border-radius: 5px;
  margin-top: 10px;
}

.buy-button:hover, .cart-button:hover {
  background-color: deeppink;
}

.buy-button {
  margin-right: 10px;
}

.cart-button {
  background-color: royalblue;
}

.cart-button:hover {
  background-color: dodgerblue;
}
.fa-shopping-cart:before {
    content: "\f07a";
    color: white;
    margin-left: 87%;
}
.material-symbols-outlined {
    font-family: 'Material Symbols Outlined';
    font-weight: normal;
    font-style: normal;
    font-size: 24px;
    line-height: 1;
    letter-spacing: normal;
    text-transform: none;
    display: inline-block;
    white-space: nowrap;
    word-wrap: normal;
    direction: ltr;
    -webkit-font-feature-settings: 'liga';
    -webkit-font-smoothing: antialiased;
    color: white;
    float: right;
    margin: 10px 51px 0px 0px;
}
    </style>
</head>

<body>
    <!-- siderbar  -->
    <section class="container">
        <section class="sidebar">
            <div class="logo">
                <img src="photo/logooo.png" alt="Logo" class="image">
            </div>
            <div class="menu">
                <ul class="menu-items">
                    <li> <a href="index.html"> Home </a></li>
                    <li> <a href="#"> Product </a></li>
                    <li> <a href="#"> Shop </a></li>
                    <li> <a href="#"> About </a></li>
                    <li> <a href="#"> Contact </a></li>
                    <li> <a href="#">Shop</a></li>
                </ul>
            </div>
            <div class="social-icons">
                <a href="#" class="fa fa-facebook"></a>
                <a href="#" class="fa fa-instagram"></a>
                <a href="#" class="fa fa-google"></a>
                <a href="#" class="fa fa-twitter"></a>
            </div>
        </section>
        <!-- siderbar ends -->
        <!-- right sections begins -->
        <section class="rightsection">
            <section class="righttop">
                <div class="cart">
                <a href="#"><span class="material-symbols-outlined">
                    shopping_cart
                    </span>
                    </a>
                </div>
                <div class="best">
                    <h1> <b>Best Chocolate in Town</b></h1>
                </div>
                <div class="address">
                    <p> <b>Balaju-16, Kathmandu</b></p>
                </div>
                <div class="shopp">
                    <p> <b>Shop Now</b></p>
                </div>
            </section>
            <section class="rightlower">
                <?php
                $connection = mysqli_connect("localhost", "root", "", "chocolate");

                // Check if connection was successful
                if (mysqli_connect_errno()) {
                    echo "Failed to connect to MySQL: " . mysqli_connect_error();
                    exit();
                }

                // Fetch existing chocolates from the database
                $selectQuery = "SELECT chocolateImage, chocolateName, chocolatePrice FROM chocolateStore";
                $result = mysqli_query($connection, $selectQuery);

                // Display the chocolates on the webpage
                while ($row = mysqli_fetch_assoc($result)) {
                    $image = $row['chocolateImage'];
                    $name = $row['chocolateName'];
                    $price = "Rs  &nbsp" . $row['chocolatePrice'] . "/-";

                    echo "<li class='product-item'>";
                    echo "<img src='$image' alt='$name' class='product-image'><br>";
                    echo "<h3 class='product-name'>$name</h3>";
                    echo "<p class='product-price'>$price</p>";
                    echo "<button class='buy-button'>Buy Now</button>";
        echo "<button class='cart-button'>Add to Cart</button>";
                    echo "</li>";
                }

                // Close the database connection
                mysqli_close($connection);
                ?>
            </section>
        </section>
        
        <!-- right sections ends -->
    </section>

</body>

</html>