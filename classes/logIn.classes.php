<?php 

class LogIn extends Dbh {

    protected function getUser($email, $psw) {
        
        $stmt = $this->connect()->prepare('SELECT password FROM users WHERE email = ?;');
    
        if(!$stmt->execute(array($email))){
            $stmt = null;
            header("location: ../home.php?error=stmtFailed");
            exit();
        }
    
        if($stmt->rowCount() == 0){
            $stmt = null;
            header("location: ../home.php?error=userNotFound");
            exit();
        }
    
        $psw_hashed = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $checkPsw = password_verify($psw, $psw_hashed[0]["password"]);
    
        if($checkPsw == false){
            $stmt = null;
            header("location: ../home.php?error=wrongPassword");
            exit();
        } else if($checkPsw == true) {
            $stmt = $this->connect()->prepare('SELECT * FROM users WHERE email = ? AND password = ?;');
            if(!$stmt->execute(array($email, $psw_hashed[0]["password"]))){
                $stmt = null;
                header("location: ../home.php?error=stmtFailed2");
                exit();
            }
            session_start();
    
            $user = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $_SESSION["userID"] = $user[0]["userID"];
            $_SESSION["name"] = $user[0]["name"];
            $_SESSION["is_admin"] = $user[0]["is_admin"];
    
            
        }
    }
}


