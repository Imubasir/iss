<?php
session_start();
require("../../php/connect.php");
$username = $_SESSION['username'];
$json = array();

$select = "SELECT CONCAT_WS(' ', firstname, middlename, lastname) as name, iss_enrollment.*, iss_programmes.prog_name FROM iss_enrollment LEFT JOIN iss_programmes ON prog_fk = prog_id";
$select_result = mysqli_query($link, $select);

if($select_result) {
	while($result_row = mysqli_fetch_assoc($select_result)) {
		$json[] = $result_row;
	}
}

echo json_encode($json);
?>