<?php 

if(isset($_POST["submit"])) {
    $email = $_POST["email"];
    $psw = $_POST["password"];

    require_once 'functions.inc.php';
    require_once 'dbh.inc.php';
}