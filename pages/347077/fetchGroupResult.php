<?php
session_start();
require("../../php/connect.php");
$username = $_SESSION['username'];

$session = $_POST['search_session'];
$course = $_POST['search_course'];
$json = array();

$select = "SELECT * FROM results WHERE res_session = '$session' AND res_code = '$course'";
$select_result = mysqli_query($link, $select);

if($select_result) {
	while($result_row = mysqli_fetch_assoc($select_result)) {
		$json[] = $result_row;
	}
}

echo json_encode($json);

?>