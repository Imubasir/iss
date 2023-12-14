<?php
session_start();
require("connect.php");
$username = $_SESSION['username'];
$json = array();

$select = "SELECT * FROM iss_course LEFT JOIN iss_programmes ON iss_course.course_prog_fk = iss_programmes.prog_id";
$select_result = mysqli_query($link, $select);

if($select_result) {
	while($result_row = mysqli_fetch_assoc($select_result)) {
		$json[] = $result_row;
	}
}

echo json_encode($json);
?>