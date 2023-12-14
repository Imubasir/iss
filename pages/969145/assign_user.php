<?php
session_start();
require("../../php/connect.php");
$username = $_SESSION['username'];
$schid = $_POST['id'];
$user = $_POST['user'];

$select = "UPDATE iss_scheduler SET assigned_user = '$user' WHERE sch_id = '$schid'";
$select_result = mysqli_query($link, $select);

if($select_result) {
	echo 1;
} else {
	echo $link->error;
}
?>