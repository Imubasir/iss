<?php
session_start();
require("../../php/connect.php");
$username = $_SESSION['username'];

$id = $_POST['id'];
$username = $_POST['user'];

$select = "SELECT * FROM iss_page_users WHERE fpage = '$id' and username = '$username' ";
$result = mysqli_query($link, $select);

if($result->num_rows > 0){
	while($row = mysqli_fetch_assoc($result)){
		echo $row['fpage'];
	}
}else{
	echo 0;
}
?>