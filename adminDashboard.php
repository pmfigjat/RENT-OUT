<?php

session_start();

require_once 'classes/dbh.classes.php';
require_once 'classes/product.classes.php';


$productObj = new Product();
$products = $productObj->getAllProducts();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
</head>
<body>
<head>
    <meta charset="UTF-8">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Baloo+2:wght@400;800&display=swap" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css" 
    integrity="sha512-5Hs3dF2AEPkpNAR7UiOHba+lRSJNeM2ECkwxUIxC1Q/FLycGTbNapWXB4tP889k5T5Ju8fs4b1P5z/iB4nMfSQ==" 
    crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="style/adminDashboard.css">
    <title>RENT OUT | More Products</title>
</head>
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
                                        if($_SESSION["is_admin"]) {
                                            echo "<a href='adminDashboard.php'>Dashboard</a><br>";
                                        }
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
    <div class="container-1">
        <button>Users</button>
        <button>Products</button>
    </div>

    <div class="container2">
        <div class="users">

        </div>
        <div class="products">
            <?php
            if (!empty($products)) {
                foreach ($products as $product) {
                    ?>
            <div class="product">
                <div class="p_info">
                    
                    <h3><?php echo $product['product_name']; ?></h3>
                    <h5>Product Publisher</h5>
                    <h5><?php echo htmlspecialchars($product['location']); ?>/h5>
            
                </div>

                <div class="buttons">
                <a href="product_details+.php?id=<?php echo $product['productID']; ?>" class="btn-view">View</a>
                        <form action="" method="post">
                            <div class="delete1">
                                <?php 
                                    if($_SESSION["is_admin"]) {
                                    echo "<button type='submit' class='delete' name='delete'>Delete product</button>";
                                    }
                                ?>
                            </div>
                        </form>
                </div>
                

            </div>
            <?php
                }}
            ?>
        </div>
    </>
 </main>
</body>
</html>