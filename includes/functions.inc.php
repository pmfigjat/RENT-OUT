<?php

function emptyInputSignup($username, $email, $password,) {
    if (empty($username) || empty($email) || empty($password) || empty($passwordRepeat)) {
        return true; // Returns true if any field is empty
    } else {
        return false; // Returns false if all fields are filled
    }
}

function createUser($conn, $name, $email, $psw) {
    $sql = "INSERT INTO users (name, email, psw) VALUES  (?, ?, ?);";
    $stmt = mysqli_stmt_init($conn);

    if(!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../SignIn.php?error=stmtfailed");
        exit();
    }

    $hashedpsw = password_hash($psw, PASSWORD_DEFAULT);
    mysqli_stmt_bind_param($stmt, "sss", $email, $name, $hashedpsw);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header("location: ../home.php?error=none");
        exit();
}
