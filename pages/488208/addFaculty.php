<?php
session_start();
require("../../php/connect.php");
$username = $_SESSION['username'];

$facultyName = $_POST['faculty_name'];
$facultyDean = $_POST['faculty_dean'];

$query = "SELECT * FROM iss_faculty WHERE faculty_name = '$facultyName'";
$output = mysqli_query($link, $query);

if($output->num_rows < 1){
	$sql = "INSERT INTO iss_faculty (faculty_name, faculty_dean, dept_added_by) VALUES ('$facultyName', '$facultyDean', '$username')";
	$result = mysqli_query($link, $sql);

	if($result){
		echo 1;

		$activity = " Faculty Added - ".$facultyName;
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