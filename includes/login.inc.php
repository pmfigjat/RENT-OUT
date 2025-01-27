<?php 

if(isset($_POST["submit"])) {
    $email = $_POST["email"];
    $psw = $_POST["password"];

    require_once 'functions.inc.php';
    require_once 'dbh.inc.php';

    if (emptyInputLogIn($email, $psw) !== false) {
        header("location: ../login.php?error=emptyinput");
        exit();
    }

    logInUser($conn, $email, $psw);
}
else {
    header("Location: ../login.php");
    exit();
}