<?php
if ($_SERVER["REQUEST_METHOD"] === "GET") {
    echo "<h2>Form Submitted via POST</h2>";
    echo "<pre>";
    print_r($_GET);
    echo "</pre>";
} else {
    echo "<h2>Form was NOT submitted via POST</h2>";
    echo "Request method: " . $_SERVER["REQUEST_METHOD"];
}
// if(isset($_POST["submit"])) {
//     $email = $_POST["email"];
//     $name = $_POST["name"];
//     $psw = $_POST["password"];

//     require_once 'dbh.inc.php';
//     require_once 'functions.inc.php';


//     if (emptyInputSignup($email, $name, $psw) != false) {
//         header("location: ../SignIn.php?error=emptyinput");
//         exit();
//     }
//     // if (invalidname() != false) {
//     //     header("location: ../SignIn.php?error=invalidname");
//     //     exit();
//     // }
//     // if (invalidemail() != false) {
//     //     header("location: ../SignIn.php?error=invalidname");
//     //     exit();
//     // }

//     createUser($conn, $email, $name, $psw);

// } 



// else {
//     header(("location: ../SignIn.php"));
// }
