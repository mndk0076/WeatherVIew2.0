<?php
require_once '../config.php';

//users that are logged in
/*
if ($g_client->isAccessTokenExpired()) {
   session_destroy();
   header('Location: index.php');
}
*/
if(isset($_SESSION['access_token'])){
	$g_client->setAccessToken($_SESSION['access_token']);
}
else if(isset($_GET['code'])){
	$token = $g_client->fetchAccessTokenWithAuthCode($_GET['code']);
	$_SESSION['access_token']= $token;
	
}else{
	//user that are not authorized
	header("Location:../index.php");
}

$oAuth = new Google_Service_Oauth2($g_client);
$userdata = $oAuth->userinfo_v2_me->get();

//google user data
$_SESSION['email'] = $userdata['email'];
$_SESSION['givenname'] = $userdata['givenName'];
$_SESSION['familyname'] = $userdata['familyName'];

//redirect when user log in
header("Location: ../views/weatherapp.php");
exit();
?>