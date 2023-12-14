<?php
session_start();
require("../../php/connect.php");
$username = $_SESSION['username'];

$progid = $_POST['id'];
$title = $_POST['edit_prog_title'];
$duration = $_POST['edit_prog_duration'];
$department = isset($_POST['edit_prog_department']) ? $_POST['edit_prog_department'] : 0;
$today = date('d-m-Y h:i:s');

$insert = "UPDATE iss_programmes SET prog_name = '$title', dept_fk = '$department', duration = '$duration', prog_modified_by = '$username', prog_date_modified = '$today' WHERE prog_id = '$progid'";

$insert_rs = mysqli_query($link, $insert);
if($insert_rs) {
	echo 1;

	$activity = "Programme Edited - ".$progid;
	$insert = "INSERT INTO iss_logs (log_activity, log_user) VALUES ('$activity', '$username')";
	$insert_rs = mysqli_query($link, $insert);

	if($insert_rs) {

	}
} else {
	echo $link->error;
}
