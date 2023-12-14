<?php
session_start();
require("../../php/connect.php");
$username = $_SESSION['username'];

$name = $_POST['dept_name'];
$faculty_fk = isset($_POST['dept_faculty'])? $_POST['dept_faculty'] : 0;
$hod = $_POST['dept_hod'];

$query = "SELECT * FROM iss_department where dept_name = '$name' AND faculty_fk = '$faculty_fk' ";
$output = mysqli_query($link, $query);

if($output->num_rows < 1){
	$sql = "INSERT INTO iss_department (dept_name, hod, faculty_fk, dept_added_by) VALUES ('$name', '$hod', '$faculty_fk', '$username')";
	$result = mysqli_query($link, $sql);

	if($result){
		echo 1;

		$activity = " Department Added - ".$name;
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