<?php
require_once "../model/database.php";
require_once "../model/user.php";


$email = "";
$password =  "";
 
if(isset($_POST['signin'])){
   
   $user = $_POST['email'];
   $pass = $_POST['password'];
   $msg = "";
    
    if(empty($_POST["email"]) || empty($_POST["password"]))  
    {  
         $msg = "Incorrect email or password! Please try again.";
    }  
	
    $sql= "SELECT id, email, password FROM users WHERE email ='$user' AND  password='$pass' ";

    $dbcon = Database::getDb();
    $query = $dbcon->prepare($sql);
    $query->execute(array($user,$pass));
    $euser = $query->fetch(PDO::FETCH_OBJ);
   
    if($query->rowCount() >= 1) {
        $_SESSION['email'] = $user;
        $_SESSION['uid'] = $euser->id;
        $_SESSION['time_start_login'] = time();
        echo 'success'; 
     }else {
        echo 'fail';
    }

}