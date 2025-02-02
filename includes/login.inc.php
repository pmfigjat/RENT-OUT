<?php 

if(isset($_POST["submit"])){

    $email = $_POST["email"];
    $psw = $_POST["password"];

    include '../classes/dbh.classes.php';
    include '../classes/logIn.classes.php';
    include '../classes/login-controll.classes.php';

    $logIn = new LogInContr($email, $psw);

    $logIn -> logInUser();

    header("location: ../home.php?error=none");

    
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
