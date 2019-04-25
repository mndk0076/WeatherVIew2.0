<?php
require_once '../model/favourite.php';

if(isset($_POST['add_city'])){
    $dbcon = Database::getDb();

    //get data from the form
    $city = $_POST['city'];
    $userid = 1;
    

    $fav = new Favourite();
    $fav->addCity($dbcon, $city, $userid);    
}