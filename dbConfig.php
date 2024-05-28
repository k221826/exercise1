<?php 
	//Database configuration
$dbHost = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbName = "image_upload";

    //Create database connection
$db = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);

	//Check Connection
if ($db->connect_error){
	die("Connection failed:" . $db->connect_error);
}
?>