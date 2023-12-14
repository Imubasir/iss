<?php
session_start();
require("../../php/connect.php");
$username = $_SESSION['username'];

$not_id = $_POST['id'];
$title = $_POST['edit_notification_title'];
$notification = $_POST['edit_notification'];

$insert = "UPDATE iss_notification SET not_title = '$title', not_message = '$notification' WHERE not_id = '$not_id'";

$insert_rs = mysqli_query($link, $insert);
if($insert_rs) {
	echo 1;

	$activity = "Notification Updated - ".$not_id;
	$insert = "INSERT INTO iss_logs (log_activity, log_user) VALUES ('$activity', '$username')";
	$insert_rs = mysqli_query($link, $insert);

	if($insert_rs) {

	}
} else {
	echo $link->error;
}
