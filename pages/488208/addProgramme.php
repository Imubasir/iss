<?php
session_start();
require("../../php/connect.php");
$username = $_SESSION['username'];

$title = $_POST['prog_title'];
$duration = $_POST['prog_duration'];
$dept = isset($_POST['prog_department']) ? $_POST['prog_department'] : 0;

$query = "SELECT * FROM iss_programmes where prog_name = '$title' AND duration = '$duration' AND dept_fk = '$dept' ";
$output = mysqli_query($link, $query);

if($output->num_rows < 1){
	$sql = "INSERT INTO iss_programmes (prog_name, dept_fk, duration, prog_added_by) VALUES ('$title', '$dept', '$duration', '$username')";
	$result = mysqli_query($link, $sql);

	if($result){
		echo 1;

		$activity = "Programme Added - ".$title;
		$insert = "INSERT INTO iss_logs (log_activity, log_user) VALUES ('$activity', '$username')";
		$insert_rs = mysqli_query($link, $insert);

		if($insert_rs) {

		}
	}else{
		echo $link->error;
	}
} else {
	echo 2;
}


?>