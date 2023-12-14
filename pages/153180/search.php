<?php
session_start();
require("../../php/connect.php");
$username = $_SESSION['username'];

$course_programme = isset($_POST['course_programme']) ? $_POST['course_programme'] : '';
$studystatus = isset($_POST['studystatus']) ? $_POST['studystatus'] : '';
$entryyear = isset($_POST['entryyear']) ? $_POST['entryyear'] : '';

$json = array();
$select = '';

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

$select_result = mysqli_query($link, $select);
if($select_result) {
	while($result_row = mysqli_fetch_assoc($select_result)) {
		$json[] = $result_row;
	}
}

echo json_encode($json);
?>