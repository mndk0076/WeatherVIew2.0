<?php
require_once 'database.php';

class Favourite{   
    public function addCity($dbcon, $city, $user_id){
        $sql = "INSERT INTO favourite_city (city, userid) values (:city, :user_id)";
    
        $pdostm = $dbcon->prepare($sql);
        $pdostm->bindParam(':city', $city);
        $pdostm->bindParam(':user_id', $user_id);
        $count = $pdostm->execute();
    }
}   