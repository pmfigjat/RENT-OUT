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
    $sql = "INSERT INTO users (name, email, psw) VALUES  (?, ?, ?);";
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
    
    if(!(password_hash($psw, PASSWORD_DEFAULT) !== $emailexist["psw"])) {
        header("Location: ../login.php?error=wrongLogIn2");
        exit();
    }
    // if (!password_verify($psw, $pswHashed)) {
    //     header("Location: ../login.php?error=wrongLogIn2");
    //     exit();
    // }

    session_start();
    $_SESSION["userID"] = $emailexist["userID"];
    $_SESSION["name"] = $emailexist["name"];
    header("Location: ../home.php");
    exit();
}

