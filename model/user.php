<?php
require_once 'database.php';

class User{   
    public function addUser($dbcon, $name, $email, $password){
        $sql = "INSERT INTO users (name, email, password) values (:name, :email, :password)";
    
        $pdostm = $dbcon->prepare($sql);
        $pdostm->bindParam(':name', $name);
        $pdostm->bindParam(':email', $email);
        $pdostm->bindParam(':password', $password);
        $count = $pdostm->execute();
    }
}   