<?php
session_start();
require("connect.php");
$username = $_SESSION['username'];
$json = array();

$select = "SELECT * FROM iss_faculty";
$select_result = mysqli_query($link, $select);

if($select_result) {
	while($result_row = mysqli_fetch_assoc($select_result)) {
		$json[] = $result_row;
	}
}

echo json_encode($json);
?>