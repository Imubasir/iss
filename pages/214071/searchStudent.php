<?php
session_start();
require("../../php/connect.php");
$username = $_SESSION['username'];

$id = trim($_POST['id']);

$json = array();

$select = "SELECT CONCAT_WS(' ', firstname, middlename, lastname) as name, student_id, prog_fk, prog_name, current_level FROM iss_enrollment LEFT JOIN iss_programmes ON prog_fk = prog_id WHERE (student_id = '$id' OR index_no = '$id')";
$select_result = mysqli_query($link, $select);

if($select_result) {
	while($result_row = mysqli_fetch_assoc($select_result)) {
		$json[] = $result_row;
	}
}

echo json_encode($json);
?>