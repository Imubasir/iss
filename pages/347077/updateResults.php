<?php
session_start();
require("../../php/connect.php");
$username = $_SESSION['username'];

$studentid = $_POST['stud_id'];
$session = $_POST['session'];
$level = $_POST['level'];
$term = $_POST['term'];
$code = $_POST['code'];
$mark = $_POST['mark'];
$grade = $_POST['grade'];
$credits = $_POST['credits'];
$old_mark = $_POST['old_mark'];
$old_grade = $_POST['old_grade'];

if ($grade=="A+"){
	$gp=5*($credits);
}elseif ($grade=="A") {
	$gp=4.5*($credits);
}elseif ($grade=="B+"){
	$gp=4*($credits);
}elseif ($grade=="B"){
	$gp=3.5*($credits);
}elseif ($grade=="C+"){
	$gp=3*($credits);
}elseif ($grade=="C"){
	$gp=2.5*($credits);
}elseif ($grade=="D+"){
	$gp=2*($credits);
}elseif ($grade=="D"){
	$gp=1.5*($credits);
}else {
	$gp=0*($credits);
}

$w=($credits)*($mark);

$today = date('Y-m-d h:i:s');
$sql_update = "UPDATE results SET res_mark = '$mark', res_grade = '$grade', res_gp = '$gp', res_weighted = '$w', res_modified_by = '$username', res_date_modified = '$today' WHERE res_student_id = '$studentid' and res_level = '$level' and res_term = '$term' and res_session = '$session'"; 

$update_rs = mysqli_query($link, $sql_update);
if($update_rs) {
	$activity = "Results Updated - From: ".$old_mark.'-'.$old_grade.' To: '.$mark.'-'.$grade;
	$insert = "INSERT INTO iss_logs (log_activity, log_user) VALUES ('$activity', '$username')";
	$insert_rs = mysqli_query($link, $insert);
	echo 1;
} else {
	echo $link->error;
}
?>