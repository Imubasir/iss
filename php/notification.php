<?php
session_start();
require("connect.php");
$username = $_SESSION['username'];

$select = "SELECT * FROM iss_notification WHERE not_date_added > now() - INTERVAL 3 day";
$select_rs = mysqli_query($link, $select);
$data = array();

if($select_rs) {
	while($select_row = mysqli_fetch_assoc($select_rs)) {
		$data[] = $select_row;
	}
}
echo json_encode($data);
?>