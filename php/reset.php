<?php
session_start();
require("connect.php");

$staff_username = $_POST['username'];
$staff_email = $_POST['email'];
$staff_password = md5($_POST['password']);

$select = "UPDATE iss_login SET password = '$staff_password' WHERE email = '$staff_email' AND username = '$staff_username'";
$select_result = mysqli_query($link, $select);

if($select_result) {
	echo 1;
} else {
	echo $link->error;
}

?>