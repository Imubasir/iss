<?php
session_start();
require("../../php/connect.php");
$username = $_SESSION['username'];

$session = $_POST['search_session'];
$course = $_POST['search_course'];

$delete = "DELETE FROM results WHERE res_session = '$session' AND res_code = '$course'";
$delete_result = mysqli_query($link, $delete);

if($delete_result) {
	

	$activity = "Group Result Deleted - ".$session.' - '.$course;
	$insert = "INSERT INTO iss_logs (log_activity, log_user) VALUES ('$activity', '$username')";
	$insert_rs = mysqli_query($link, $insert);

	if($insert_rs) {
		echo 1;
	}
} else {
	echo $link->error;
}


?>