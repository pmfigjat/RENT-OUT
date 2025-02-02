<?php 

class LogIn extends Dbh {

    protected function getUser($email, $psw) {
        $stmt = $this->connect()->prepare('SELECT * FROM users WHERE email = ?;');
    
        if (!$stmt->execute([$email])) {
            $stmt = null;
            header("location: ../home.php?error=stmtFailed");
            exit();
        }
    
        if ($stmt->rowCount() == 0) {
            $stmt = null;
            header("location: ../index.php?error=userNotFound");
            exit();
        }
    
        $user = $stmt->fetch(PDO::FETCH_ASSOC); // Fetch a single row instead of fetchAll
        $pswHashed = $user["password"];
    
        if (!password_verify($psw, $pswHashed)) {
            $stmt = null;
            header("location: ../home.php?error=wrongPassword");
            exit();
        }
    
        // Start session and store user info
        session_start();
        $_SESSION["userID"] = $user["userID"];
        $_SESSION["name"] = $user["name"];
    
        $stmt = null;
    }
}


