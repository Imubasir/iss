<?php
session_start();
require("../../php/connect.php");
$username = $_SESSION['username'];

$pageid = $_POST['id'];
$user = $_POST['user'];

$query = "SELECT * FROM iss_page_users where fpage = '$pageid' AND username = '$user' ";
$output = mysqli_query($link, $query);

if($output->num_rows < 1){
	$sql = "INSERT INTO iss_page_users (fpage, username, added_by) VALUES ('$pageid', '$user', '$username')";
	$result = mysqli_query($link, $sql);

	if($result){
		echo 1;

		$activity = $user." Access Added";
		$insert = "INSERT INTO iss_logs (log_activity, log_user) VALUES ('$activity', '$username')";
		$insert_rs = mysqli_query($link, $insert);

		if($insert_rs) {

		}
	}else{
		echo $link->error;
	}
}


?>