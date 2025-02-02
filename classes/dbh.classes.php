<?php

class Dbh {
    protected function connect(){
        try {
            $dBUsername = "root";
            $dBPassword = "";
            $dbh = new PDO('mysql:host=localhost; dbname=rent-out', $dBUsername, $dBPassword);
            return $dbh;
        }

        catch(PDOException $e){
            print "Error!:". $e->getMessage(). "</br>";
            die();
        }
    }
}