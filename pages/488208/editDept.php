<?php
session_start();
require("../../php/connect.php");
$username = $_SESSION['username'];

$id = $_POST['id'];
$dept = $_POST['edit_dept_name'];
$faculty = isset($_POST['edit_dept_faculty']) ? $_POST['edit_dept_faculty'] : 0;
$hod = $_POST['edit_dept_hod'];
$today = date('d-m-Y h:i:s');

$insert = "UPDATE iss_department SET dept_name = '$dept', hod = '$hod', faculty_fk = '$faculty', dept_modified_by = '$username', dept_date_modified = '$today' WHERE dept_id = '$id'";

$insert_rs = mysqli_query($link, $insert);
if($insert_rs) {
	echo 1;

	$activity = "Department Updated - ".$id;
	$insert = "INSERT INTO iss_logs (log_activity, log_user) VALUES ('$activity', '$username')";
	$insert_rs = mysqli_query($link, $insert);

	if($insert_rs) {

	}
} else {
	echo $link->error;
}
