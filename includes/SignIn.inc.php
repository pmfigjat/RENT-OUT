<?php 

if(isset($_POST["submit"])){

    $email = $_POST["email"];
    $name = $_POST["name"];
    $psw = $_POST["password"];

    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';

    createUser($conn, $name, $email, $psw);

} else {
    header("location: //SignIn.php");
    exit();
}