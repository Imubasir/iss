<?php
session_start();
require("../../php/connect.php");
$username = $_SESSION['username'];

$id = trim($_POST['stud_id']);

$json = array();

$select = "SELECT * FROM iss_enrollment WHERE (student_id = '$id' OR index_no = '$id')";
$select_result = mysqli_query($link, $select);

if($select_result) {
	while($result_row = mysqli_fetch_assoc($select_result)) {
		$json[] = $result_row;
	}
}

echo json_encode($json);
?>