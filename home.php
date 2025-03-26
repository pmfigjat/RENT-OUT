<?php
    session_start();

    require_once 'classes/dbh.classes.php';
    require_once 'classes/product.classes.php';

    $productObj = new Product();
    $products = $productObj->getLimitedProducts(10);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Baloo+2:wght@400;800&display=swap" rel="stylesheet">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css" 
    integrity="sha512-5Hs3dF2AEPkpNAR7UiOHba+lRSJNeM2ECkwxUIxC1Q/FLycGTbNapWXB4tP889k5T5Ju8fs4b1P5z/iB4nMfSQ==" 
    crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="style/home.css">
    <title>RENT OUT | Home</title>
</head>
<body>

<div id="mySidebar" class="sidebar">
<a href="home.php">Home</a><br>
<a href="product_details.php">More Products</a><br>
<a href="how_it_works.php">How It Works</a><br>
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
    <header class="header">
        <div class="bg">
            <div class="try1">

                <nav class="second-nav">
                <h2>RENT OUT</h2>
                <i class="fa fa-bars" id="btn" aria-hidden="true"></i>
                </nav>
                <nav id="nav-bar" class="nav-bar">
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
            </div>

            <div class="hero"><h2>Find your, affordable equipment - available by the week, month or year</h2></div>
        </div>
        <form action="search.php" method="get">
            <div class="search-inputs">
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
                        <button type="submit" id="search" name="submit">Search</button>
                    </div>
                </div>
            </div>
        </form>
    </header>


    <main>
        <div class="container-1">
            <h1 class="pR">Products to rent</h1>
            <div class="product-section">
    <div id="arrow-left" class="arrow">
        <i class="fa fa-arrow-left" aria-hidden="true"></i>
    </div>
    <div class="products" id="product-container">
        <?php foreach ($products as $index => $product) { ?>
            <div class="product" id="product-<?php echo $index; ?>" style="display: <?php echo $index < 3 ? 'block' : 'none'; ?>;">
                <div class="product-image">
                    <img src="uploads/<?php echo htmlspecialchars($product['image']); ?>" alt="<?php echo htmlspecialchars($product['product_name']); ?>">
                </div>
                <div class="product-info">
                    <h3><?php echo htmlspecialchars($product['product_name']); ?></h3>
                    <p class="rented">Condition: <?php echo htmlspecialchars($product['conditions']); ?></p>
                    <hr />
                    <div class="lastpart">
                        <p class="product-price">$<?php echo $product['price_per_hour']; ?> / hour</p>
                        <a href="product_details+.php?id=<?php echo $product['productID']; ?>" class="btn-view">View</a>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>

    <div id="arrow-right" class="arrow">
        <i class="fa fa-arrow-right" aria-hidden="true"></i>
    </div>
</div>
    </div>

        <div class="container-2">
            <div class="background1">
                <h2>Fill out a membership application</h2>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Pariatur illo ipsa, 
                    fugit aut non maxime quod aspernatur voluptatum cupiditate corrupti asperiores odit nam officia minus, 
                    expedita in quas laborum dignissimos.
                </p>
            </div>
            <div class="picture">
                <img src="img/1.jpg" alt="img" width="300px" height="550px">
            </div>
            <div class="form">
                <h3>Subscribe</h3>
                <form id="form">
                    <input id="email" type="email" placeholder="Email" ><br>
                    <input id="password" type="password" placeholder="Password" ><br>
                    <button type="submit">Subscribe</button>
                </form>
            </div>

        </div>
    </main>
</body>
<script src="js/home.js"></script>
</html>