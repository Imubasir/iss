<?php
session_start();
require("../../php/connect.php");
$username = $_SESSION['username'];

$sel_cat = isset($_POST['sel_cat']) ? $_POST['sel_cat'] : '';
$course_programme = isset($_POST['course_programme']) ? $_POST['course_programme'] : '';
$studystatus = isset($_POST['studystatus']) ? $_POST['studystatus'] : '';
$entryyear = isset($_POST['entryyear']) ? $_POST['entryyear'] : '';

$datefrom = isset($_POST['datefrom']) ? $_POST['datefrom'] : '';;
$dateto = isset($_POST['dateto']) ? $_POST['dateto'] : '';;

$json = array();
$select = '';

if($sel_cat == '1') { //Fetch Enrollments
	if($course_programme != '' && $studystatus != '' && $entryyear != '') {
		$select .= "SELECT * FROM iss_enrollment LEFT JOIN countries ON nationality = countryid LEFT JOIN iss_programmes ON prog_fk = prog_id LEFT JOIN regions ON homeregion = regionid WHERE prog_fk = '$course_programme' AND study_status = '$studystatus' AND entryyear = '$entryyear'";
	} 

	else if ($course_programme != '' && $studystatus) {
		$select .= "SELECT * FROM iss_enrollment LEFT JOIN countries ON nationality = countryid LEFT JOIN iss_programmes ON prog_fk = prog_id LEFT JOIN regions ON homeregion = regionid WHERE prog_fk = '$course_programme' AND study_status = '$studystatus'";
	} 

	else if ($course_programme != '' && $entryyear != '') {
		$select .= "SELECT * FROM iss_enrollment LEFT JOIN countries ON nationality = countryid LEFT JOIN iss_programmes ON prog_fk = prog_id LEFT JOIN regions ON homeregion = regionid WHERE prog_fk = '$course_programme' AND entryyear = '$entryyear'";
	} 

	else if ($studystatus != '' && $entryyear != '') {
		$select .= "SELECT * FROM iss_enrollment LEFT JOIN countries ON nationality = countryid LEFT JOIN iss_programmes ON prog_fk = prog_id LEFT JOIN regions ON homeregion = regionid WHERE study_status = '$studystatus' AND entryyear = '$entryyear'";
	} 

	else if ($course_programme != '') {
		$select .= "SELECT * FROM iss_enrollment LEFT JOIN countries ON nationality = countryid LEFT JOIN iss_programmes ON prog_fk = prog_id LEFT JOIN regions ON homeregion = regionid WHERE prog_fk = '$course_programme'";
	} 

	else if ($studystatus != '') {
		$select .= "SELECT * FROM iss_enrollment LEFT JOIN countries ON nationality = countryid LEFT JOIN iss_programmes ON prog_fk = prog_id LEFT JOIN regions ON homeregion = regionid WHERE study_status = '$studystatus'";
	} 

	else if ($entryyear != '') {
		$select .= "SELECT * FROM iss_enrollment LEFT JOIN countries ON nationality = countryid LEFT JOIN iss_programmes ON prog_fk = prog_id LEFT JOIN regions ON homeregion = regionid WHERE entryyear = '$entryyear'";
	}

} else if ($sel_cat == '2') {
	$select .= "SELECT * FROM iss_trans_requests LEFT JOIN iss_scheduler ON iss_trans_requests.trans_id= iss_scheduler.trans_id LEFT JOIN iss_login ON iss_scheduler.assigned_user = iss_login.username LEFT JOIN iss_programmes ON stud_prog = prog_id LEFT JOIN iss_services ON iss_trans_requests.service = iss_services.service_code WHERE sched_date_added BETWEEN '$datefrom' AND '$dateto'";
}

	$select_result = mysqli_query($link, $select);
	if($select_result) {
		while($result_row = mysqli_fetch_assoc($select_result)) {
			$json[] = $result_row;
		}
	}
echo json_encode($json);
?>