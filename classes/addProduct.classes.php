<?php 

class AddProduct extends Dbh {

    protected function setProduct($userID, $p_name, $p_loc, $description, $priceH, $priceD, $condition, $image) {
        
        if (is_array($condition)) {
            $condition = implode(", ", $condition);
        }
        if (is_array($image)) {
            $image = $image['name']; 
        }
    
        $stmt = $this->connect()->prepare('INSERT INTO products (creator_id, product_name, location, description, price_per_hour, price_per_day, conditions, image) VALUES (?, ?, ?, ?, ?, ?, ?, ?);');
    
        if (!$stmt->execute(array($userID, $p_name, $p_loc, $description, $priceH, $priceD, $condition, $image))) {
            $stmt = null;
            header("location: ../home.php?error=stmtFailed");
            exit();
        }
    }
    
}