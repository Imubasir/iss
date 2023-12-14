<?php
session_start();
require("../../php/connect.php");
$username = $_SESSION['username'];
$schid = $_POST['id'];

$select = "SELECT * FROM iss_scheduler LEFT JOIN iss_login ON assigned_user = username WHERE sch_id = '$schid'";
$select_result = mysqli_query($link, $select);

if($select_result) {
	while ($result_row = mysqli_fetch_assoc($select_result)) {
		echo $result_row['name'];
	}
} else {
	echo $link->error;
}
?>