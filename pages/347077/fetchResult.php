<?php
session_start();
require("../../php/connect.php");
$username = $_SESSION['username'];

$id = $_POST['search_id'];
$search_level = $_POST['search_level'];
$search_term = $_POST['search_term'];

$json = array();

$select = "SELECT * FROM results WHERE res_student_id = '$id' AND res_level = '$search_level' AND res_term = '$search_term'";
$select_result = mysqli_query($link, $select);

if($select_result) {
	while($result_row = mysqli_fetch_assoc($select_result)) {
		$json[] = $result_row;
	}
}

echo json_encode($json);
?>