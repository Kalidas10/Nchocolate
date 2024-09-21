<style>
    .product-list {
        display: flex;
        flex-wrap: wrap;
        list-style-type: none;
        padding: 0;
        margin: 0;
        justify-content: flex-start;
    }

    .product-item {
        flex-basis: calc(33.33% - 20px);
        padding: 10px;
        border-radius: 5px;
        box-sizing: border-box;
        border-radius: 20px;
    }

    .product-image {
        width: 70%;
        height: auto;
        margin-left: 300px;
        border-radius: 20px;


    }

    .product-name {
        margin-top: 10px;
        font-weight: bold;
        width: 70%;
        height: auto;
        margin-left: 300px;
        margin-left: 360px;
    }

    .product-price {
        margin-top: 5px;
        color: green;
        width: 70%;
        height: auto;
        margin-left: 300px;
        margin-left: 360px;
    }

    /* .................... */
    * {
        margin: 0;
        padding: 0;

    }

    header {
        background-image: url("photo/backgroundf.png");
        background-size: 1200px;
        height: 600px;
        background-repeat: no-repeat;
        background-position: top right;
        border-left: #ff0000 500px;
    }


    .navbackground img {
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


    .logo img {
        position: fixed;
        float: left;
        margin-top: 40px;
        margin-left: 60px;
        width: 200px;
        height: auto;
    }

    .logo2 img {
        position: absolute;
        float: left;
        margin-top: -50px;
        margin-left: 786px;
        width: 200px;
        height: auto;
    }

    .search input {
        position: fixed;
        float: left;
        margin-top: 180px;
        margin-left: 48px;
        width: 220px;
        height: 30px;
        background-color: rgb(251, 204, 232);
        border-color: rgb(255, 114, 137);

    }

    .menuu {
        font-family: Georgia, serif;
        list-style-type: none;
        font-size: 50px;
        position: fixed;
        top: 230px;
        left: 70px;
        text-align: center;
    }

    ul li a {

        text-decoration: none;
        color: #000000;
    }

    ul li a p {
        margin: 25px;
        font-size: 80%;
        color: white;
    }

    .shop {
        height: 50px;
        width: 210px;
        background-color: rgb(253, 93, 194);
        border-radius: 50px;
        margin-left: -15px;

    }

    .best h1 {
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
    .containerChocolate{
        margin-left: 20px;
        
    }
    .containerChocolate img{
        background-color: pink;
        background-size: 200px;
        transition: 0.3s;
    }

    /* ............................ */
    footer p{
    font-size: 20px;
    font-style: italic;
    color: white;
    height: 100px;
    position: absolute;
    left: 27.5%;
    margin-top: 40px;

}

    
footer .vl {
    border-left: 4px solid white;
    height: 200px;
    position: absolute;
    left: 59%;
    margin-top: 50px;

}

footer .p1 img {
    height: 80px;
    position: absolute;
    left: 27%;
    margin-top: 163px;
}
footer .p2 img {
    height: 80px;
    position: absolute;
    left: 42%;
    margin-top: 163px;
  
}
footer .p3 img {
    height: 80px;
    position: absolute;
    left: 49%;
    margin-top: 163px;
  
}

footer h3{
    color: white;
    font-size: 35px;
    position: absolute;
    left: 27.5%;
    margin-top: 115px;


}

.flocation p {
    font-size: 20px;
    font-style: italic;
    color: white;
    height: 100px;
    position: absolute;
    left: 65%;
    margin-top: 120px;


}
.flogo img{
    width: 120px;
    position: absolute;
    left: 64%;
    margin-top: 40px;

}

footer{

    height: 300px;
    background-color:rgb(253, 93, 194) ;
}
</style>

<header>
    <div class="navbackground"><img src="photo/flower.jpg"></div>

    <!-- social media icon -->
    <div class="fb"> <a href="https://www.facebook.com/" target="_main"> <img src="photo/fb.png"> </a></div>
    <div class="twitter"> <a href="https://www.twitter.com/" target="_main"> <img src="photo/twitter.png"> </a>
    </div>
    <div class="insta"> <a href="https://www.instagram.com/" target="_main"> <img src="photo/insta.png"> </a></div>
    <div class="yt"> <a href="https://www.youtube.com/" target="_main"> <img src="photo/yt.png"> </a></div>


    <div class="logo"> <img src="photo/logooo.png"> </div>

    <!-- <div class="searchh"><input type="text" placeholder="Search.."></div> -->

    <div class="menu">

        <ul class="menuu">
            <li> <a href="index.html"> Home </a></li>
            <li> <a href="#"> Product </a></li>
            <li> <a href="#"> Shop </a></li>
            <li> <a href="#"> About </a></li>
            <li> <a href="#"> Contact </a></li>
            <li class="shop"> <a href="#">
                    <P> Shop</P>
                </a></li>

        </ul>
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
</header>




<div class="containerChocolate" style="margin-top: 0px; width: 89%;">
    <ul class="product-list">
        <?php
        $connection = mysqli_connect("localhost", "root", "kali", "chocolate");

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

            echo "<li class='product-item'>";
            echo "<img src='$image' alt='$name' class='product-image'><br>";
            echo "<h3 class='product-name'>$name</h3>";
            echo "<p class='product-price'>$price</p>";
            echo "</li>";
        }

        // Close the database connection
        mysqli_close($connection);
        ?>
    </ul>
</div>

<footer id="footer">
    <!-- <div> <h4>About</h4> </div> -->
    <div> <p>"We are one of the best online <br> &nbsp&nbsp&nbsp &nbsp &nbsp &nbsp&nbsp&nbsp&nbsp platform to deliver chocolate." </p> </div>

    <div class="flogo"> <img src="photo/logo2.png" alt=""></div>

    <div><h3>Our Partners</h3> </div>
    
    <div class="p1"> <img src="photo/achs.png" alt=""></div>
    <div class="p2"> <img src="photo/ach.png" alt=""></div>
    <div class="p3"> <img src="photo/tu.png" alt=""></div>
     
    <div class="flocation">
            <p> Address: Balaju-16, Kathmandu, Nepal <br>
                e-mail: sujalchoco@gmail.com <br>
                Contact: +977-01458792 <br>
                &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp +977-9803124578<br>
                </p>
           
    </div>            


    
<div class="vl"></div>



</footer>

