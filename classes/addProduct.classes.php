<?php 

class AddProduct extends Dbh {

    protected function setProduct($userID, $p_name, $p_loc, $description, $priceH, $priceD, $condition, $image) {
        $stmt = $this->connect()->prepare('INSERT INTO products (product_name, creator_id, location, description, price_per_hour, price_per_day, conditions, image) VALUES (?, ?, ?, ?, ?, ?, ?, ?);');

        if(!$stmt->execute(array($userID, $p_name, $p_loc, $description, $priceH, $priceD, $condition, $image))) {
            $stmt = null;
            header("location: ../home.php?error=stmtFailed");
            exit();
        }
    }
}