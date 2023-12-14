<?php
session_start();
require("../../php/connect.php");
$username = $_SESSION['username'];

$user = $_POST['id'];

$delete = "DELETE FROM iss_signatory WHERE sig_id = '$user'";
$delete_result = mysqli_query($link, $delete);

if($delete_result) {
	echo 1;

	$activity = $user." Deleted";
	$insert = "INSERT INTO iss_logs (log_activity, log_user) VALUES ('$activity', '$username')";
	$insert_rs = mysqli_query($link, $insert);

	if($insert_rs) {

	}
} else {
	echo $link->error;
}


?>