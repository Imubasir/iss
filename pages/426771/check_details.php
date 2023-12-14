<?php
session_start();
require("../../php/connect.php");
$username = $_SESSION['username'];
$json = array();

$stud_id = $_POST['id'];

$select = "SELECT CONCAT_WS(' ', firstname, middlename, lastname) AS name, prog_name FROM iss_enrollment LEFT JOIN iss_programmes ON prog_id = prog_fk WHERE student_id = '$stud_id'";
$select_result = mysqli_query($link, $select);

if($select_result) {
	while($result_row = mysqli_fetch_assoc($select_result)) {
		$json[] = $result_row;
	}
}

echo json_encode($json);
?>