<?php
$username = "root";
$password = "";
$server = "localhost";
$database = "iss";

$link = new mysqli($server, $username, $password, $database);

if($link->connect_error){
	die("Connection Failed: ". $link->connect_error);
}

?>