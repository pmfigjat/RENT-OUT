<?php 

class SignIn extends Dbh {

    protected function setUser($email, $name, $psw) {
        $stmt = $this->connect()->prepare('INSERT INTO users (name, email, password) VALUES  (?, ?, ?);');

        $hashedPsw = password_hash($psw, PASSWORD_DEFAULT);

        if(!($stmt->execute(array($email,$name, $hashedPsw)))) {
            $stmt = null;
            header("location: ../home.php?error=stmtFailed");
            exit();
        }
    }

    protected function checkUser($email) {
        $stmt = $this->connect()->prepare('SELECT email FROM users WHERE email = ?;');

        if(!($stmt->execute(array($email)))){
            $stmt = null;
            header("location: ../home.php?error=stmtFailed");
            exit();
        }

        
        if($stmt->rowCount() > 0) {
            return false;
        } else {
            return true;
        }

    }

}