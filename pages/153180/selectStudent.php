<?php
session_start();
require("../../php/connect.php");
$username = $_SESSION['username'];

$id = $_POST['id'];

$json = array();

$select = "SELECT * FROM iss_enrollment LEFT JOIN countries ON nationality = countryid LEFT JOIN iss_programmes ON prog_fk = prog_id LEFT JOIN regions ON homeregion = regionid WHERE student_id = '$id'";
$select_result = mysqli_query($link, $select);

if($select_result) {
	while($result_row = mysqli_fetch_assoc($select_result)) {
		$json[] = $result_row;
	}
}

echo json_encode($json);
?>