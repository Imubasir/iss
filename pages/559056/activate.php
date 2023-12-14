<?php
session_start();
require("../../php/connect.php");
$username = $_SESSION['username'];

$input = $_POST['val'];
$val = explode("*", $input);
$sig_id = $val[0];
$status = $val[1];
$today = date("Y-m-d h:i:s");

$update_all = "UPDATE iss_signatory SET sig_status = '0'";
$rs_update_all = mysqli_query($link, $update_all);

if($rs_update_all) {
	if($status == 0) {
		$update = "UPDATE iss_signatory SET sig_status = '0' WHERE sig_id = '$sig_id'";
		$rs_update = mysqli_query($link, $update);
	} else if ($status == 1) {
		$update = "UPDATE iss_signatory SET sig_status = '1', last_active = '$today' WHERE sig_id = '$sig_id'";
		$rs_update = mysqli_query($link, $update);
	}

	if($rs_update) {
		echo 1;
	} else {
		echo $link->error;
	}
}
?>