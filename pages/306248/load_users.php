<?php
session_start();
require("../../php/connect.php");
$username = $_SESSION['username'];
$json = array();

$select = "SELECT * FROM iss_login LEFT JOIN iss_department ON department = dept_id";
$select_result = mysqli_query($link, $select);

if($select_result) {
	while($result_row = mysqli_fetch_assoc($select_result)) {
		$json[] = $result_row;
	}
}

echo json_encode($json);
?>