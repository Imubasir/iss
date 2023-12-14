<?php
session_start();
require("../../php/connect.php");
$username = $_SESSION['username'];

$id = $_POST['id'];
$name = $_POST['user'];

$query = "SELECT * FROM iss_page_users where fpage = '$id' AND username = '$name' ";
$output = mysqli_query($link, $query);

if($output->num_rows > 0){
	$sql = "DELETE FROM iss_page_users WHERE username = '$name' and fpage = '$id' ";

	$result = mysqli_query($link, $sql);
	if($result){
		echo 1;

		$activity = $user." Access Revoked";
		$insert = "INSERT INTO iss_logs (log_activity, log_user) VALUES ('$activity', '$username')";
		$insert_rs = mysqli_query($link, $insert);

		if($insert_rs) {

		}
	}else {
		echo $link->error;
	}

} else {
	
}



?>