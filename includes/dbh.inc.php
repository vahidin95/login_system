<?php

$dbServername = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbName = "loginsystem";


$conn = mysqli_connect($dbServername, $dbUsername, $dbPassword, $dbName);

if (!$conn) {
	die('error with database');
}else{
	//
}

?>