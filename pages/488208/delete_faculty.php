<?php
session_start();
require("../../php/connect.php");
$username = $_SESSION['username'];

$id = $_POST['id'];

$delete = "DELETE FROM iss_faculty WHERE faculty_id = '$id'";
$delete_result = mysqli_query($link, $delete);

if($delete_result) {
	echo 1;

	$activity = "Faculty Deleted - ".$id;
	$insert = "INSERT INTO iss_logs (log_activity, log_user) VALUES ('$activity', '$username')";
	$insert_rs = mysqli_query($link, $insert);

	if($insert_rs) {

	}
} else {
	echo $link->error;
}


?>