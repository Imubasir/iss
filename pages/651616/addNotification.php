<?php
session_start();
require("../../php/connect.php");
$username = $_SESSION['username'];

$title = $_POST['notification_title'];
$notification = $_POST['notification'];

$insert = "INSERT INTO iss_notification (not_title, not_message, not_added_by) VALUES ('$title', '$notification', '$username')";

$insert_rs = mysqli_query($link, $insert);
if($insert_rs) {
	echo 1;

	$activity = "New Notification Added - ".$title;
	$insert = "INSERT INTO iss_logs (log_activity, log_user) VALUES ('$activity', '$username')";
	$insert_rs = mysqli_query($link, $insert);

	if($insert_rs) {

	}
} else {
	echo $link->error;
}