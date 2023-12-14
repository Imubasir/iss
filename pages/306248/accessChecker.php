<?php
session_start();
require("../../php/connect.php");
$username = $_SESSION['username'];

	$query = "SELECT * FROM iss_pages";
	$result = mysqli_query($link, $query);
	$data = array();
	if($result){
		while($row = $result->fetch_assoc()){
		$data[] = $row;
	}
}else{
	echo "Error:".$link->error;
}
	
	echo json_encode($data);

?>