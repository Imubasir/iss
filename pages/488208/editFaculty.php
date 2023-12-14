<?php
session_start();
require("../../php/connect.php");
$username = $_SESSION['username'];

$id = $_POST['id'];
$facultyName = $_POST['edit_faculty_name'];
$facultyDean = $_POST['edit_faculty_dean'];
$today = date('d-m-Y h:i:s');

$insert = "UPDATE iss_faculty SET faculty_name = '$facultyName', faculty_dean = '$facultyDean', modified_by = '$username', date_modified = '$today' WHERE faculty_id = '$id'";

$insert_rs = mysqli_query($link, $insert);
if($insert_rs) {
	echo 1;

	$activity = "Faculty Updated - ".$id;
	$insert = "INSERT INTO iss_logs (log_activity, log_user) VALUES ('$activity', '$username')";
	$insert_rs = mysqli_query($link, $insert);

	if($insert_rs) {

	}
} else {
	echo $link->error;
}
