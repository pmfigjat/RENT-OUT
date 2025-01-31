<?php

session_start();

require_once 'includes/dbh.inc.php';
require_once 'includes/functions.inc.php';

$productID = $_GET["id"];

$product = getProductById($conn, $productID);



?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Baloo+2:wght@400;800&display=swap" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css" 
    integrity="sha512-5Hs3dF2AEPkpNAR7UiOHba+lRSJNeM2ECkwxUIxC1Q/FLycGTbNapWXB4tP889k5T5Ju8fs4b1P5z/iB4nMfSQ==" 
    crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="style/product_details+.css">
    <title>RENT OUT | Product Details</title>
</head>
<body>
    <header class="header">
       <nav>
        <h2>RENT OUT</h2>
        <div class="links">
            <a href="home.php">Home</a>
            <a href="product_details.php">More Products</a>
            <a href="how_it_works.php">How It Works</a>
            <div class="dropdown">
                <button class="icon"><i class="fa-solid fa-user"></i></button><br>
                <div class="dropdown-content">
                                <?php
                                    if(isset($_SESSION["userID"])) {
                                        echo "<a href='dashboard.php'>Profile</a><br>";
                                        echo "<a href='includes/logout.inc.php'>Log Out!</a><br>";
                                    } else {
                                        echo "<a href='SignIn.php'>Sign In</a><br>";
                                        echo "<a href='login.php'>Log In</a><br>";
                                    }
                                ?>
                </div>
             </div>
        </div>
       </nav> 
    </header>

    <main>
        <div class="container1">
            <div class="firstHalf">
                <img src="img/<?php echo $product['image']; ?>" alt="<?php echo $product['product_name']; ?>">
            </div>
            <div class="secondHalf">
                <a href="product_details.php">Back</a>

                <h2><?php echo $product['product_name'];?></h2>

                <div class="description">
                    <h2>Description</h2>
                    <hr>
                    <p><?php echo $product['description'];?></p>
                </div>

                <div class="prices">
                    <button id="price_per_hour" class="btn"><?php echo $product['price_per_day'];?>/h</button>
                    <button id="price_per_day" class="btn"><?php echo $product['price_per_hour'];?>/d</button>
                </div>

                <h3>Pick Up and Return location</h3>
                <h4><?php echo $product['location'];?></h4>

                <button id="continue">Continue</button>
            </div>
        </div>
    </main>


</body>
</html>