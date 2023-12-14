<?php
session_start();
require("../../php/connect.php");
$username = $_SESSION['username'];

$courseCode = $_POST['course_code'];
$courseTitle = $_POST['course_title'];
$courseCredit = $_POST['course_credit'];
$courseLevel = isset($_POST['course_level']) ? $_POST['course_level'] : 0;
$courseProg = $_POST['course_programme'];

$query = "SELECT * FROM iss_course WHERE course_code = '$courseCode'";
$output = mysqli_query($link, $query);

if($output->num_rows < 1){
	$sql = "INSERT INTO iss_course (course_code, course_title, course_credit, course_level, course_prog_fk, course_added_by) VALUES ('$courseCode', '$courseTitle', '$courseCredit', '$courseLevel', '$courseProg', '$username')";
	$result = mysqli_query($link, $sql);

	if($result){
		echo 1;

		$activity = " Course Added - ".$courseCode;
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