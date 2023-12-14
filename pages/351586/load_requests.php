<?php
session_start();
require("../../php/connect.php");
$username = $_SESSION['username'];
$json = array();

$select = "SELECT * FROM iss_trans_requests LEFT JOIN iss_programmes ON stud_prog = prog_id LEFT JOIN iss_services ON iss_services.service_code = iss_trans_requests.service WHERE iss_trans_requests.state = '0'";
$select_result = mysqli_query($link, $select);

if($select_result) {
	while($result_row = mysqli_fetch_assoc($select_result)) {
		$json[] = $result_row;
	}
}

echo json_encode($json);
?>