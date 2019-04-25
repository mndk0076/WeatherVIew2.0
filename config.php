<?php 

session_start();
require_once 'google-api/vendor/autoload.php';

//GOOGLE CLIENT AUTHENTICATION GOT FROM GOOGLE CLOUD CONSOLE
$g_client = new Google_Client();
$g_client->setCLientId("385172737165-51rt4v0jgh73t9ilvkhs084oqc1b0s27.apps.googleusercontent.com");
$g_client->setClientSecret("0_qh0CqWA_-dFsS4C6InKK6y");
$g_client->setApplicationName("WeatherApp");

//AUTHORIZED REDIRECT URI
$g_client->setRedirectUri("http://localhost:8888/WeatherView/library/gcallback.php");
//SCOPE GOOGLE PLUS
$g_client->addScope("https://www.googleapis.com/auth/plus.login https://www.googleapis.com/auth/userinfo.email");

