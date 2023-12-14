<?php
session_start();
require("../../php/connect.php");
$username = $_SESSION['username'];

$staffname = $_POST['staff_name'];
$staffUsername = $_POST['username'];
$email = $_POST['email'];
$department = isset($_POST['prog_department']) ? $_POST['prog_department'] : 0;
$role = isset($_POST['role']) ? $_POST['role'] : '';
$transcript = isset($_POST['transcript']) ? $_POST['transcript'] : 0;
$password = md5("123456");

$insert = "INSERT INTO iss_login (name, department, username, email, password, role, transcript, added_by) VALUES ('$staffname', '$department', '$staffUsername', '$email', '$password', '$role', '$transcript', '$username')";

$insert_rs = mysqli_query($link, $insert);
if($insert_rs) {
	echo 1;

	$activity = "New User Added - ".$staffUsername;
	$insert = "INSERT INTO iss_logs (log_activity, log_user) VALUES ('$activity', '$username')";
	$insert_rs = mysqli_query($link, $insert);

	if($insert_rs) {

	}
} else {
	echo $link->error;
}