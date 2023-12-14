<?php
session_start();
require("../../php/connect.php");
$username = $_SESSION['username'];

$sig_name = $_POST['signatory_name'];
$sig_desig = $_POST['signatory_desig'];

$query = "SELECT * FROM iss_signatory WHERE sig_name = '$sig_name'";
$output = mysqli_query($link, $query);

if($output->num_rows < 1){
	$sql = "INSERT INTO iss_signatory (sig_name, sig_designation, last_active, sig_status, sig_added_by) VALUES ('$sig_name', '$sig_desig', '', '0', '$username')";
	$result = mysqli_query($link, $sql);

	if($result){
		echo 1;

		$activity = " Signatory Added - ".$sig_name;
		$insert = "INSERT INTO iss_logs (log_activity, log_user) VALUES ('$activity', '$username')";
		$insert_rs = mysqli_query($link, $insert);

		if($insert_rs) {

		}
	}else{
		echo $link->error;
	}
} else {
	echo 2;
}


?>