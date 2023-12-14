<?php
session_start();
require("../../php/connect.php");
$username = $_SESSION['username'];

$student_id = $_POST['student_id'];
$service_type = $_POST['service_type'];
$service_copies = $_POST['service_copies'];
$trans_id = time();
$verify_code = $code = rand(10000000, 100000000);
$today = date('Y-m-d');

$bio = "SELECT CONCAT_WS(' ', firstname, middlename, lastname) as name, prog_fk FROM iss_enrollment WHERE student_id = '$student_id'";
$bio_rs= mysqli_query($link, $bio);
if($bio_rs) {
	while($bio_row = mysqli_fetch_assoc($bio_rs)) {
		$stud_name = $bio_row['name'];
		$stud_prog = $bio_row['prog_fk'];
	}


	$sql = "INSERT INTO iss_trans_requests (trans_id, student_id, stud_name, stud_prog, service, copies, verify_code, req_added_by) VALUES ('$trans_id', '$student_id', '$stud_name', '$stud_prog', '$service_type', '$service_copies', '$verify_code', '$username')";
	$result = mysqli_query($link, $sql);

	if($result){
		$sql_assign="SELECT DISTINCT username from iss_login where transcript='1' and not exists (SELECT assigned_user from iss_scheduler where username=assigned_user and sched_date_added='$today')";
		$rs_assign=mysqli_query($link, $sql_assign);
		if(mysqli_num_rows($rs_assign)<=0){
			$sql="SELECT count(assignedto) as num, assignedto from iss_scheduler where date_added='$today' group by assignedto order by num DESC";
			$results = mysqli_query($link, $sql);
			if($results) {
				while($row1 = mysqli_fetch_assoc($results)) {
					$assign=$row1['assignedto'];
				}
			}
		}else{
			while($row2=mysqli_fetch_assoc($rs_assign)) {
				$assign=$row2['username'];
			}
		}
		$sql_add="INSERT INTO iss_scheduler(sched_date_added, sched_added_by, assigned_user, remark, indexnum, trans_id) values('$today', '$username', '$assign', 'Being processed','$student_id', '$trans_id')";
		$rs_add = mysqli_query($link, $sql_add);
		if($rs_add) {
			echo 1;
			$activity = " Request Added - ".$trans_id;
			$insert = "INSERT INTO iss_logs (log_activity, log_user) VALUES ('$activity', '$username')";
			$insert_rs = mysqli_query($link, $insert);

			if($insert_rs) {

			}
		} else {
			echo $link->error;
		}


	}else{
		echo $link->error;
	}
}

?>