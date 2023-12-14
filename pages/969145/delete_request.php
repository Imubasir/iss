<?php
session_start();
require("../../php/connect.php");
$username = $_SESSION['username'];

$trans_id = $_POST['id'];

$delete_sched = "DELETE FROM iss_scheduler WHERE trans_id = '$trans_id'";
$delete_result = mysqli_query($link, $delete_sched);

if ($delete_result) {
	$delete_trans = "DELETE FROM iss_trans_requests WHERE trans_id = '$trans_id'";
	$delete_trans_rs = mysqli_query($link, $delete_trans);
	if ($delete_trans_rs) {
		echo 1;
	} else {
		echo $link->error;
	}

	$activity = "Request Deleted - ".$trans_id;
	$insert = "INSERT INTO iss_logs (log_activity, log_user) VALUES ('$activity', '$username')";
	$insert_rs = mysqli_query($link, $insert);

} else {
	echo $link->error;
}


?>