<?php

session_start();

require_once 'classes/dbh.classes.php';
require_once 'classes/product.classes.php';
require_once 'classes/users.classes.php';






$productObj = new Product();
$products = $productObj->getAllProducts();

$userObj = new User();
$users = $userObj->getAllUsers();



if(isset($_POST["delete"])) {
    $userID = $_POST["delete"];
    $userObj->deleteUser($userID);
    $productObj->deleteByUserID($userID);
}

if(isset($_POST["deleteProduct"])) {
    $pID = $_POST["deleteProduct"];
    $productObj->deleteProduct($pID);
}

if(isset($_POST["update"])) {
    $id = $_POST["update"];
    $name = $_POST["name"];
    $email = $_POST["email"];
    $role = $_POST["roles"] === "Admin" ? "1" : "0";

    $userObj->editUser($id, $name, $email, $role);
}

$showProducts = isset($_GET["products"]);
$showusers = isset($_GET["users"])

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
        <form action="" method="get" class="first-form">
            <button type="submit" name="users"  class="users-btn">Users</button>
            <button type="submit" name="products"  class="products-btn">Products</button>
        </form>
    </div>

    <div class="container2">
        <div class="users" style="display: <?= $showusers ? 'flex' : 'none' ?>;">
            <?php 
            if(!empty($users)) {
                foreach($users as $user) {
                    ?>
                    <div class="user">
                        <h3>Creator ID: <?php echo $user["userID"]?></h3>
                        <h3>Role: <?php echo $user["is_admin"] ?  "Admin" : "User" ?></h3>
                        <div class="inputs">
                        <form action="" method="post" class="crud-form">
                            <input type="text" name="name"  placeholder="<?php echo $user["name"] ?>">
                            <input type="text" name="email" id="email" placeholder="<?php echo $user["email"] ?>">
                            <select name="roles" id="">

                            <option  value="User" <?= $user["is_admin"] ? "" : "selected" ?>>User</option>
                            <option value="Admin" <?= $user["is_admin"] ? "selected" : "" ?>>Admin</option>
                            </select>
                        </div>
                            <div class="btns">
                                <button type="submit" class="update" value="<?php echo $user["userID"]?>" name="update" >Update</button>
                                <button type="submit" class="delete" value="<?php echo $user["userID"]?>" name="delete">Delete</button>
                            </div>
                        </form>
                    </div>
                <?php } } ?>
                
        </div>
        <div class="products" style="display: <?= $showProducts ? 'flex' : 'none' ?>;">
            <?php
            if (!empty($products)) {
                foreach ($products as $product) {
                    ?>
            <div class="product">
                <div class="p_info">
                    
                    <h3><?php echo $product['product_name']; ?></h3>
                    <h5><?php echo $product['creator_id']; ?></h5>
                    <h5><?php echo htmlspecialchars($product['location']); ?></h5>
            
                </div>

                <div class="buttons">
                    <div class="view">
                        <a href="product_details+.php?id=<?php echo $product['productID']; ?>" class="btn-view">View</a>
                    </div>
                        <form action="" method="post">
                            <div class="delete1">
                                <button type='submit' class='delete' name='deleteProduct' value="<?php echo $product['productID']; ?>" >Delete product</button>
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