<?php
//error_reporting(0);
ob_start();
session_start();
$siteName = "demo.com";

//DEFINE("BASE_URL","http://cipetbhopal.com/");
DEFINE("BASE_URL","http://localhost/portal/");

DEFINE('DB_USER', 'root');
DEFINE('DB_PSWD', ''); // No password
DEFINE('DB_HOST', 'localhost'); 
DEFINE('DB_NAME', 'mibcs_system_charles'); 

date_default_timezone_set('Asia/Calcutta'); 

$conn = new mysqli(DB_HOST, DB_USER, DB_PSWD, DB_NAME);

if($conn->connect_error) {
    die("Failed to connect database " . $conn->connect_error);
}
