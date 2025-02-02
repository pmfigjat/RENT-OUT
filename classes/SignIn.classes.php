<?php 

class SignIn extends Dbh {

    protected function setUser($email, $name, $psw) {
        $stmt = $this->connect()->prepare('INSERT INTO users(email,name,password) values(?,?,?);');

        $hashedPsw = password_hash($psw, PASSWORD_DEFAULT);

        if(!$stmt->execute(array($email,$name,$hashedPsw))) {
            $stmt = null;
            header("location: ../home.php?error=stmtFailed");
            exit();
        }

        $stmt = null;
    }

    private function checkUser($email) {
        $stmt = $this->connect()->prepare('SELECT email FROM users WHERE email = ?;');

        if(!$stmt ->execute(array($email))){
            $stmt = null;
            header("location: ../home.php?error=stmtFailed");
            exit();
        }

        $resultCheck = null;
        if($stmt->rowCount() > 0) {
            $resultCheck = false;
        } else {
            $resultCheck = true;
        }

        return $resultCheck;
    }

}