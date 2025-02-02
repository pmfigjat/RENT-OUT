<?php
 session_start();
 if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $userID = $_SESSION["userID"];
    $p_name = $_POST["p_name"];
    $p_loc = $_POST["p_loc"];
    $description = $_POST["p_description"];
    $priceH = $_POST["priceH"];
    $priceD = $_POST["priceD"];
    $condition = $_POST["condition"];
    $image = $_FILES["image"];
 
    // For file uploads
    if (isset($_FILES["image"])) {
        $imageName = $_FILES["image"]["name"];
        $imageTmpName = $_FILES["image"]["tmp_name"];
        $imagePath = "../uploads/" . basename($imageName);

        move_uploaded_file($imageTmpName, $imagePath);
    }

    include '../classes/dbh.classes.php';
    include '../classes/addProduct.classes.php';
    include '../classes/addProduct-controller.classes.php';

    $addProduct = new AddProductContr($p_name, $p_loc, $description, $priceH, $priceD, $condition, $image);

    $addProduct -> addProduct();

    header("location: ../home.php?error=none");
   //  createProduct($conn, $p_name, $userID, $p_loc, $p_description, $priceH, $priceD, $condition, $image);
 }

 else {
    header("location: ../add_products.php?error=post");
 }