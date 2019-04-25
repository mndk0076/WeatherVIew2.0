<?php
require_once '../model/user.php';

if(isset($_POST['add_user'])){
    $dbcon = Database::getDb();

    //get data from the form
    $name = $_POST['fullname'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    
    echo $name;
    echo $email;
    echo $password;

  
    $user = new User();
    $user->addUser($dbcon, $name, $email, $password);

    //once added go back to login page
    if($name !='' && $email !='' && $password !=''){
        header("Location: ../index.php");
    }
    
}