<?php 

class LogInContr extends LogIn{

    private $email;
    private $psw;

    public function __construct($email, $psw) {

    $this->email = $email;
    $this->psw= $psw;

    }

    public function logInUser() {
        if(!$this->emptySignUp()==false) {
            header("location: ../home.php?error=emptyInput");
            exit();
        }

        $this->getUser($this->email, $this->psw);
        
    }

    private function emptySignUp(){
        $result = null;

        if(empty($this->email) || empty($this->name) || empty($this->psw)) {
            $result = false;
        } else {
            $result = true;
        }

        return $result; 
    }

}