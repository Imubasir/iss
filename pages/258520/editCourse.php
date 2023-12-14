<?php
session_start();
require("../../php/connect.php");
$username = $_SESSION['username'];

$id = $_POST['id'];
$courseCode = $_POST['edit_course_code'];
$courseTitle = $_POST['edit_course_title'];
$courseCredit = $_POST['edit_course_credit'];
$courseLevel = isset($_POST['edit_course_level']) ? $_POST['edit_course_level'] : 0;
$courseProg = $_POST['edit_course_programme'];
$today = date('d-m-Y h:i:s');

$insert = "UPDATE iss_course SET course_code = '$courseCode', course_title = '$courseTitle', course_credit = '$courseCredit', course_level = '$courseLevel', course_prog_fk = '$courseProg', course_modified_by = '$username', course_date_modified = '$today' WHERE course_id = '$id'";

$insert_rs = mysqli_query($link, $insert);
if($insert_rs) {
	echo 1;

	$activity = "Course Edited - ".$courseCode;
	$insert = "INSERT INTO iss_logs (log_activity, log_user) VALUES ('$activity', '$username')";
	$insert_rs = mysqli_query($link, $insert);

	if($insert_rs) {

	}
} else {
	echo $link->error;
}
