<?php 

class User extends Dbh {
    public function getAllUsers() {
        $sql = "SELECT * FROM users";

        $stmt = $this->connect()->prepare($sql);

        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function deleteUser($userID) {
        $stmt = $this->connect()->prepare("DELETE From users where userID = ?");

        if($stmt->execute([$userID])) {
            return true;
        }
        else {
            return false;
        }
    }
}