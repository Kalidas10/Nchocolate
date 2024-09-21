<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- <link rel="stylesheet" type="text/css" href="style.css"> -->
    <style>
        ul li{
           text-decoration: none;
           
        }

        *{
    margin: 0;
    padding: 0;

 }
header{
    background-image: url("photo/backgroundf.png");
    background-size: 1200px;
    height: 600px;
    background-repeat: no-repeat;
    background-position: top right;
    border-left: #ff0000 500px;
}
.navbackground img{
    position: fixed;
    height: 753px;
    width: 320px;   
 }  

 .fb img {
    position: fixed;
    float: left;
    margin-top: 640px;
    margin-left: 49px;
    width: 56px;
    height: auto;
}
.twitter img {
    position: fixed;
    float: left;
    margin-top: 644px;
    margin-left: 110px;
    width: 48px;
    height: auto;
}
.insta img {
    position: fixed;
    float: left;
    margin-top: 644px;
    margin-left: 167px;
    width: 49px;
    height: auto;
}
.yt img {
    position: fixed;
    float: left;
    margin-top: 642px;
    margin-left: 220px;
    width: 55px;
    height: auto;
}


.logo img{
    position: fixed;
    float: left;
    margin-top: 40px;
    margin-left: 60px;
    width: 200px;
    height: auto;
}
.logo2 img{
    position: absolute;
    float: left;
    margin-top: -50px;
    margin-left: 786px;
    width: 200px;
    height: auto;
}

.search input{
    position: fixed;
    float: left;
    margin-top: 180px;
    margin-left: 48px;
    width: 220px;
    height: 30px;
    background-color: rgb(251, 204, 232);
    border-color: rgb(255, 114, 137);
    
}
.best h1{
    position: relative;
    top: 200px;
    margin-left: 337px;
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
   margin-left: 750px;
   color: white;
   font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
   font-size: 30px;

} 

.shopp {
    position: relative;
    margin-left: 812px;
    color: white;
    font-size: 30px;
    top: 244px;
    background-color: rgb(253, 93, 194);
    width: 150px;
    text-align: center;
    border-radius: 50px;
    height: 40px;

   
}

    

ul{
    font-family: Georgia, serif;
    list-style-type: none;
    font-size: 50px;
    position: fixed;
    top: 230px;
    left: 70px;
    text-align: center;
}
ul li a{

    text-decoration: none;
    color: #000000;
}
ul li a p{
    margin: 25px;
    font-size: 80%;
    color: white;
}

.shop{
    height: 50px;
    width: 210px;
    background-color: rgb(253, 93, 194);
    border-radius: 50px;
    margin-left: -15px;
    
} 
    </style>
</head>
<body>
<header>
        <!-- <div class="navbackground"><img src="photo/flower.jpg"></div> -->

        <!-- social media icon -->
        <!-- <div class="fb"> <a href="https://www.facebook.com/" target="_main"> <img src="photo/fb.png"> </a></div>
        <div class="twitter"> <a href="https://www.twitter.com/" target="_main"> <img src="photo/twitter.png"> </a>
        </div>
        <div class="insta"> <a href="https://www.instagram.com/" target="_main"> <img src="photo/insta.png"> </a></div>
        <div class="yt"> <a href="https://www.youtube.com/" target="_main"> <img src="photo/yt.png"> </a></div>


        <div class="logo"> <img src="photo/logooo.png"> </div> -->

        <!-- <div class="searchh"><input type="text" placeholder="Search.."></div> -->
       
        <div class="menu">

            <ul>
                <li> <a href="index.html"> Home </a></li>
                <li> <a href="#"> Product </a></li>
                <li> <a href="#"> Shop </a></li>
                <li> <a href="#"> About </a></li>
                <li> <a href="#"> Contact </a></li>
                <li class="shop"> <a href="#">
                        <P> Shop</P>
                    </a></li>

            </ul>

        </div>
        <div>
        <div class="best">
            <h1> <b>Best Chocolate in Town</b></h1>
        </div>
        <div class="address">
            <p> <b>Balaju-16, Kathmandu</b></p>
        </div>
        <div class="shopp">
            <p> <b>Shop Now</b></p>
        </div>


        <div class="logo2"> <img src="photo/logo3.png"> </div>
        </div>
    </header>
    <div class="container">
        <ul class="product">
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
                $price = $row['chocolatePrice'];


    
                echo "<li><img src='$image' alt=''></li><br>";
                echo "<li class='Name'>Name: $name</li>";
                echo "<li class='price'>Price: $price</li>";
            }
            
    
            // Close the database connection
            mysqli_close($connection);
            ?>
        </ul>
    </div>
    <style>
    .container{
        height: 200px;
        
    }
            

    </style>
    
</body>
</html>