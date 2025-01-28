<?php
 session_start();
 if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $userID = $_SESSION["userID"];
    $p_name = $_POST["p_name"];
    $p_loc = $_POST["p_loc"];
    $p_description = $_POST["p_description"];
    $priceH = $_POST["priceH"];
    $priceD = $_POST["priceD"];
    $condition = $_POST["condition"];

    // For file uploads
    if (isset($_FILES["image"])) {
        $imageName = $_FILES["image"]["name"];
        $imageTmpName = $_FILES["image"]["tmp_name"];
        $imagePath = "uploads/" . basename($imageName);

        move_uploaded_file($imageTmpName, $imagePath);
    }

    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';

    createProduct($conn, $p_name, $userID, $p_loc, $p_description, $priceH, $priceD, $condition);
 }

 else {
    header("location: ../add_products.php?error=post");
 }