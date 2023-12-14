<?php
session_start();
require("connect.php");

$username = mysqli_real_escape_string($link, $_POST['issUsername']);
$password = mysqli_real_escape_string($link, md5($_POST['issPassword']));

$login_query = $link->prepare( 'SELECT * FROM iss_login WHERE username = ? and password = ?' );

$login_query->bind_param( 'ss', $username, $password );
$r = $login_query->execute();
$result = $login_query->get_result();

if ($result->num_rows == 1) {
	while($row = mysqli_fetch_assoc($result)) {
		$name = $row['name'];
		$username = $row['username'];
		$role = $row['role'];
		$login_status = $row['login_status'];
		$image = $row['image'];

		$img = explode("/", $image);


		$_SESSION['name'] = $name;
		$_SESSION['image'] = end($img);
		$_SESSION['username'] = $username;
		$_SESSION['role'] = $role;
		$_SESSION['log_status'] = $login_status;

		echo 52189;

		//Update Login Status
		login_update($username);
	}
} else if ($result->num_rows < 1) {
	echo 74190;
} else {
	echo 19594;
}

function login_update ($user) {
	require("connect.php");
	$today = date("d-M-Y H:i:s");

	$query = "UPDATE iss_login SET last_login = '$today', login_status = '1' WHERE username = '$user'";
	$result_ = mysqli_query($link, $query);
	if($result_) {
		// echo 1;
	} else {
		// echo 0;
		echo $link->error;
	}

	$activity = "Login Successful";
	$insert = "INSERT INTO iss_logs (log_activity, log_user) VALUES ('$activity', '$user')";
	$insert_rs = mysqli_query($link, $insert);

	if($insert_rs) {

	}
}
?>