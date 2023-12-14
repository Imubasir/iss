<?php
session_start();
require("../../php/connect.php");
$username = $_SESSION['username'];

$staffname = $_POST['edit_staff_name'];
$staffUsername = $_POST['edit_username'];
$email = $_POST['edit_email'];
$department = isset($_POST['edit_prog_department']) ? $_POST['edit_prog_department'] : 0;
$role = isset($_POST['edit_role']) ? $_POST['edit_role'] : '';
$transcript = isset($_POST['edit_transcript']) ? $_POST['edit_transcript'] : 0;

$insert = "UPDATE iss_login SET name = '$staffname', email = '$email', department = '$department', role = '$role', transcript = '$transcript', modified_by = '$username' WHERE username = '$staffUsername'";

$insert_rs = mysqli_query($link, $insert);
if($insert_rs) {
	echo 1;

	$activity = "User Profile Edited - ".$staffUsername;
	$insert = "INSERT INTO iss_logs (log_activity, log_user) VALUES ('$activity', '$username')";
	$insert_rs = mysqli_query($link, $insert);

	if($insert_rs) {

	}
} else {
	echo $link->error;
}
