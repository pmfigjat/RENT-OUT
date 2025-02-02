<?php 

class SignInContr extends SignIn{

    private $email;
    private $name;
    private $psw;

    public function __construct($email, $name, $psw) {

    $this->email = $email;
    $this->name = $name;
    $this->psw= $psw;

    }

    public function signUp(){
        if($this->emptySignUp() == false){
            header("location: ../home.php?error=emptySignUp");
            exit();
        }

        if(!$this->invalidName() == false){
            header("location: ../home.php?error=invalidName");
            exit();
        }

        if(!$this->invalidEmail() == false){
            header("location: ../home.php?error=invalidEmail");
            exit();
        }

        $this->setUser($this->email, $this->name, $this->psw);


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

    function invalidName(): bool {
        if (!preg_match("/^[a-zA-Z]*$/", $this->name)) {
            return true; 
        } else {
            return false; 
        }
    }

    private function invalidEmail(): bool {
        if (!filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
            return true; 
        } else {
            return false; 
        }
    }

    private function emailExist(){
        if($this->checkUser($this->email)){
            return false;
        }
        else {
            return true;
        }
    }

    

    
}