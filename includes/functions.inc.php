<?php

function emptyInputSignup($username, $email, $password,) {
    if (empty($username) || empty($email) || empty($password)) {
        return true; // Returns true if any field is empty
    } else {
        return false; // Returns false if all fields are filled
    }
}
function invalidName($username): bool {
    if (!preg_match("/^[a-zA-Z]*$/", $username)) {
        return true; 
    } else {
        return false; 
    }
}

function invalidEmail($email): bool {
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        return true; 
    } else {
        return false; 
    }
}

function emailExist($conn, $email): array|bool|null {
    $sql = "SELECT * FROM users WHERE email = ?;";
    $stmt = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("Location: ../SignIn.php?error=stmtfailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "s", $email);
    mysqli_stmt_execute($stmt);

    $resultData = mysqli_stmt_get_result($stmt);

    if (($row = mysqli_fetch_assoc($resultData)) !== null) {
        mysqli_stmt_close($stmt); // Close before returning
        return $row;  // Email exists, return user data
    } else {
        mysqli_stmt_close($stmt); // Close before returning
        return false; // Email doesn't exist
    }
}






function createUser($conn, $name, $email, $psw) {
    $sql = "INSERT INTO users (name, email, password) VALUES  (?, ?, ?);";
    $stmt = mysqli_stmt_init($conn);

    if(!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../SignIn.php?error=stmtfailed");
        exit();
    }

    $hashedpsw = password_hash($psw, PASSWORD_DEFAULT);
    mysqli_stmt_bind_param($stmt, "sss", $name, $email, $hashedpsw);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header("location: ../home.php?error=none");
        exit();
}


function emptyInputLogIn($email, $password,) {
    if (empty($email) || empty($password)) {
        return true; // Returns true if any field is empty
    } else {
        return false; // Returns false if all fields are filled
    }
}

function logInUser($conn, $email, $psw) {
    $emailexist = emailExist($conn, $email);

    if (!$emailexist) {
        header("Location: ../login.php?error=wrongLogIn1");
        exit();
    }
    
    $pswH = $emailexist["password"];


    
    if (!password_verify($psw, $pswH)) {
        header("Location: ../login.php?error=wrongLogIn2");
        exit();
    }

    session_start();
    $_SESSION["userID"] = $emailexist["userID"];
    $_SESSION["name"] = $emailexist["name"];
    header("Location: ../home.php");
    exit();
}

function createProduct($conn, $p_name, $userID, $p_loc, $p_description, $priceH, $priceD, $condition, $image) {
    $targetDir = "../uploads/";

   
    if (!is_dir($targetDir)) {
        mkdir($targetDir, 0777, true);
    }

    $imageFileType = strtolower(pathinfo($image['name'], PATHINFO_EXTENSION));
    $imageName = uniqid() . "." . $imageFileType;
    $target_file = $targetDir . $imageName;

    
    $check = getimagesize($image["tmp_name"]);
    if ($check === false) {
        header("location: ../add_product.php?error=invalidImage");
        exit();
    }

   
    if ($image["size"] > 5000000) {
        header("location: ../add_product.php?error=fileTooLarge");
        exit();
    }

  
    if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
        header("location: ../add_product.php?error=invalidFileType");
        exit();
    }

 
    if (!move_uploaded_file($image["tmp_name"], $target_file)) {
        header("Location: ../add_product.php?error=uploadFailed");
        exit();
    }


    $sql = "INSERT INTO products (product_name, creator_id, location, description, price_per_hour, price_per_day, conditions, image) VALUES (?, ?, ?, ?, ?, ?, ?, ?);";
    $stmt = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../add_product.php?error=stmtFailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "ssssssss", $p_name, $userID, $p_loc, $p_description, $priceH, $priceD, $condition, $target_file);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

    header("location: ../home.php?error=none");
    exit();
}


function getProducts($conn) {
    $sql = "SELECT * From products";
    $result = mysqli_query($conn, $sql);

    if(!$result) {
        die("Query failed: ". mysqli_error($conn));
    }

    $products = [];

    while($row = mysqli_fetch_assoc($result)) {
        $products[] = $row;
    }

    return $products;
}

function getUserProduct($conn, $userID) {
    $sql = "SELECT * from products where creator_id = ?;";
    $stmt = mysqli_stmt_init($conn);

    if(!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../home.php?error=getUserProducts");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "s", $userID);
    mysqli_stmt_execute($stmt);

    $result = mysqli_stmt_get_result($stmt);
    $products = mysqli_fetch_all($result, MYSQLI_ASSOC);

    mysqli_stmt_close($stmt);

    return $products;
}

function getProductById($conn, $productID) {
    
    if (!is_numeric($productID) || $productID <= 0) {
        header("location: ../product_details.php?error=invalidProductID");
        exit();
    }

    
    $sql = "SELECT * FROM products WHERE productID = ?;";
    $stmt = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../product_details.php?error=stmtFailed");
        exit();
    }

    
    mysqli_stmt_bind_param($stmt, "s", $productID);
    mysqli_stmt_execute($stmt);

    
    $result = mysqli_stmt_get_result($stmt);

    
    if ($row = mysqli_fetch_assoc($result)) {
        mysqli_stmt_close($stmt);
        return $row; 
    } else {
        mysqli_stmt_close($stmt);
        return null; 
    }
}

function searchProduct($conn, $p_name, $p_location): array {
    $sql = "SELECT * FROM products WHERE product_name = ? or location = ?;";
    $stmt = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmt, $sql)) {
        die("SQL Error: " . mysqli_error($conn)); // Display SQL error
    }

    mysqli_stmt_bind_param($stmt, "ss", $p_name, $p_location);
    mysqli_stmt_execute($stmt);

    $result = mysqli_stmt_get_result($stmt);
    if (!$result) {
        die("Query Execution Error: " . mysqli_error($conn)); // Show execution error
    }

    $products = mysqli_fetch_all($result, MYSQLI_ASSOC);

    mysqli_stmt_close($stmt);


    return $products;
}





