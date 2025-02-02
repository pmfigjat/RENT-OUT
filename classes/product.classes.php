<?php
class Product extends Dbh {
    
    
    public function getAllProducts($search = "") {
        $sql = "SELECT * FROM products";
        
        if (!empty($search)) {
            $sql .= " WHERE product_name LIKE ? OR location LIKE ?";
        }

        $stmt = $this->connect()->prepare($sql);

        if (!empty($search)) {
            $searchTerm = "%$search%";
            $stmt->execute([$searchTerm, $searchTerm]);
        } else {
            $stmt->execute();
        }

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getLimitedProducts($limit = 10) {
        $stmt = $this->connect()->prepare("SELECT * FROM products LIMIT ?");
        $stmt->bindParam(1, $limit, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    
    // Fetch single product by ID
    public function getProductById($id) {
        $stmt = $this->connect()->prepare("SELECT * FROM products WHERE productID = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function searchProducts($productName, $location) {
        $stmt = $this->connect()->prepare('SELECT * from products where product_name = ? or location = ?;');

        if(!$stmt->execute(array($productName, $location))) {
            $stmt = null;
            header("location: ../home.php?error=stmtFailed");
            exit();
        }

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}

