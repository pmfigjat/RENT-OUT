<?php

class AddProductContr extends AddProduct  {
    private $userID;
    private $p_name;
    private $p_loc;  
    
    private $description;
    private $priceH ;
    private $priceD;
    private $condition ;
    private $image ;

    public function __construct($p_name, $p_loc, $description, $priceH, $priceD, $condition, $image) {
        session_start();  
        if (isset($_SESSION["userID"])) {
            $this->userID = $_SESSION["userID"]; 
        } else {
            header("location: ../index.php?error=notLoggedIn");
            exit();
        }

        $this->p_name = $p_name;
        $this->p_loc = $p_loc;
        $this->description = $description;
        $this->priceH = $priceH;
        $this->priceD = $priceD;
        $this->condition = $condition;
        $this->image = $image;
    }

    protected function addProduct() {
        if($this->emptyInputs() == false) {
            header("location: ../home.php?error=emptyInput");
            exit();
        }
    }

    private function emptyInputs() {
        if(empty($this->p_name) || empty($this->p_loc) || empty($this->description)
        || empty($this->priceH) || empty($this->priceD) || empty($this->condition) || empty($this->image)) {
            $result = false;
        } else {
            $result = true;
        }
    }


}

