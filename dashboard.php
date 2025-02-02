<?php
    session_start();

    $userID = $_SESSION["userID"];

    require_once 'classes/dbh.classes.php';
    require_once 'classes/product.classes.php';

    $product = new Product();

    $userID = $_SESSION["userID"];
    $products = $product->getUserProducts($userID);
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
    <link rel="stylesheet" href="style/dashboard.css">
    <title>RENT OUT | Dashboard</title>
</head>
<body>
    <header class="header">
        <div class="bg">
                <nav class="nav-bar">
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
        </div>
    </header>
    <main>
    <div class="topcontent">
        <?php
            if (isset($_SESSION["userID"])) {
                echo "<h2>" . htmlspecialchars($_SESSION["name"]) . "</h2>";
            }
        ?>
        <a href="add_product.php"><i class="fa-regular fa-plus"></i> Add a product</a>
    </div>

    <div class="products">
        <?php if (!empty($products)): ?>
            <?php foreach ($products as $product): ?>
                <div class="product">
                    <div class="product-image">
                        <img src="uploads/<?php echo htmlspecialchars($product['image']); ?>" alt="<?php echo htmlspecialchars($product['product_name']); ?>">
                    </div>
                    <div class="product-info">
                        <h3><?php echo htmlspecialchars($product['product_name']); ?></h3>
                        <p class="rented">Condition: <?php echo htmlspecialchars($product['conditions']); ?></p>
                        <hr>
                        <div class="lastpart">
                            <p class="product-price">Price: $<?php echo number_format($product['price_per_day'], 2); ?></p>
                            <a href="product_details.php?id=<?php echo $product['productID']; ?>" class="btn-view">View</a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <p>No products uploaded yet. <a href="add_product.php">Add a product</a>.</p>
        <?php endif; ?>
    </div>
    </main>
</body>
</html>