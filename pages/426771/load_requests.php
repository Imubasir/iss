<?php
session_start();
require("../../php/connect.php");
$username = $_SESSION['username'];
$json = array();

$select = "SELECT * FROM iss_trans_requests LEFT JOIN iss_scheduler ON iss_trans_requests.trans_id= iss_scheduler.trans_id LEFT JOIN iss_login ON iss_scheduler.assigned_user = iss_login.username LEFT JOIN iss_services ON iss_trans_requests.service = iss_services.service_code";
$select_result = mysqli_query($link, $select);

if($select_result) {
	while($result_row = mysqli_fetch_assoc($select_result)) {
		$json[] = $result_row;
	}
}

echo json_encode($json);
?>