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
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Baloo+2:wght@400;800&display=swap" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css" 
    integrity="sha512-5Hs3dF2AEPkpNAR7UiOHba+lRSJNeM2ECkwxUIxC1Q/FLycGTbNapWXB4tP889k5T5Ju8fs4b1P5z/iB4nMfSQ==" 
    crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="style/product_details.css">
    <title>RENT OUT | More Products</title>
</head>
<body>
<div id="mySidebar" class="sidebar">
<a href="home.php">Home</a><br>
<a href="product_details.php">More Products</a><br>
<a href="how_it_works.php">How It Works</a><br>
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
    <header class="header">
       <nav>
        <h2>RENT OUT</h2>
        <i class="fa fa-bars" id="btn" aria-hidden="true"></i>
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
        <form action="search.php" method="get">
            <div class="search">
                <div class="inputs">
                    <div class="name_input">
                        <h3>Product Name</h3>
                        <input type="text" id="p_name" name="p_name" placeholder="Type here...">
                    </div>
                    <div class="location_input">
                        <h3>Location</h3>
                        <input type="text" id="p_location" name="p_location" placeholder="Type here...">
                    </div>
                </div>

                <div class="buttons-searcher">
                    <button type="submit" name="submit" id="search">Search</button>
                    <button type="submit" name="clear" id="clear">Clear</button>
                </div>
            </div>
        </form>

        
        <div class="products">
            <?php
            // Check if there are products
            if (!empty($products)) {
                foreach ($products as $product) {
                    ?>
                    <div class="product" id="product">
                        <div class="product-image">
                            <img src="img/<?php echo $product['image']; ?>" alt="<?php echo $product['product_name']; ?>">
                        </div>
                        <div class="product-info">
                            <h3><?php echo $product['product_name']; ?></h3>
                            <p class="rented">Condition: <?php echo $product['conditions']; ?> days</p>
                            <hr>
                            <div class="lastpart">
                                <p class="product-price">$<?php echo $product['price_per_day']; ?> per day</p>
                                <a href="product_details+.php?id=<?php echo $product['productID']; ?>" class="btn-view">View</a>
                            </div>
                        </div>
                    </div>
                    <?php
                }
            } else {
                echo "<p>No products available at the moment.</p>";
            }
            ?>
        </div>
        
    </main>
</body>
</html>


<script>

const btn = document.getElementById("btn");

btn.addEventListener('click', function() {
    // Check if the sidebar is open, and toggle accordingly
    const sidebar = document.getElementById("mySidebar");
    if (sidebar.style.width === "250px") {
        closeNav();  // If it's open, close it
    } else {
        openNav();  // If it's closed, open it
    }
});

// Function to open the sidebar
function openNav() {
    document.getElementById("mySidebar").style.width = "250px";  
}

// Function to close the sidebar
function closeNav() {
    document.getElementById("mySidebar").style.width = "0";  
}
</script>