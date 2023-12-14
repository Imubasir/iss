<?php
session_start();
require("../../php/connect.php");
$username = $_SESSION['username'];

$staff_name = mysqli_real_escape_string($link,$_POST['staff_name']);
$staff_email = mysqli_real_escape_string($link, $_POST['staff_email']);
$staff_username = $_POST['staff_username'];
$staff_password = md5($_POST['staff_password']);
$pswd_check = $_POST['pswd_check'];

if($pswd_check == 'true') {
	$select = "UPDATE iss_login SET name = '$staff_name', password = '$staff_password', email = '$staff_email' WHERE username = '$staff_username'";
} else {
	$select = "UPDATE iss_login SET name = '$staff_name', email = '$staff_email' WHERE username = '$staff_username'";
}

$select_result = mysqli_query($link, $select);

if($select_result) {
	echo 1;
} else {
	echo $link->error;
}

?>