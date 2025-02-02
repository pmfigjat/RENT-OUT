<?php 

if(isset($_POST["submit"])){

    $email = $_POST["email"];
    $name = $_POST["name"];
    $psw = $_POST["password"];

    include '../classes/dbh.classes.php';
    include '../classes/SignIn.classes.php';
    include '../classes/SignIn-controller.classes.php';

    $signup = new SignInContr($email, $name, $psw);

    
} else {
    header("location: //SignIn.php");
    exit();
}


// require_once 'dbh.inc.php';
    // require_once 'functions.inc.php';

    // if (emptyInputSignup($name, $email, $psw) !== false) {
    //     header("location: ../SignIn.php?error=emptyinput");
    //     exit();
    // }
    // if (invalidName($name)!== false) {
    //     header("location: ../SignIn.php?error=invalidName");
    //     exit();
    // }
    // if (invalidEmail($email) !== false) {
    //     header("location: ../SignIn.php?error=invalidEmail");
    //     exit();
    // }
    // if (emailExist($conn, $email)) {
    //     header("location: ../SignIn.php?error=emailExist");
    //     exit();
    // }

    // createUser($conn, $name, $email, $psw);
