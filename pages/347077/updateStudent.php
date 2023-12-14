<?php
session_start();
require("../../php/connect.php");
$username = $_SESSION['username'];

$student_id = $_POST['student_id'];
$index_no = $_POST['index_no'];
$firstname = $_POST['firstname'];
$middlename = $_POST['middlename'];
$lastname = $_POST['lastname'];
$gender = $_POST['gender'];
$dateofbirth = $_POST['dateofbirth'];
$placeofbirth = $_POST['placeofbirth'];
$nationality = isset($_POST['nationality']) ? $_POST['nationality'] : '';
$hometown = $_POST['hometown'];
$homeregion = isset($_POST['homeregion']) ? $_POST['homeregion'] : 0;
$postaladdress = $_POST['postaladdress'];
$entrylevel = isset($_POST['entrylevel']) ? $_POST['entrylevel'] : '';
$entryyear = isset($_POST['entryyear']) ? $_POST['entryyear'] : '';
$guardianname = $_POST['guardianname'];
$guardianaddress = $_POST['guardianaddress'];
$guardiancontact = $_POST['guardiancontact'];
$admissioncategory = isset($_POST['admissioncategory']) ? $_POST['admissioncategory'] : '';
$course_programme = isset($_POST['course_programme']) ? $_POST['course_programme'] : '';
$studystatus = isset($_POST['studystatus']) ? $_POST['studystatus'] : '';
$today = date('Y-m-d h:i:s');

$update = "UPDATE iss_enrollment SET firstname = '$firstname', middlename = '$middlename', lastname = '$lastname', gender = '$gender', dateofbirth = '$dateofbirth', placeofbirth = '$placeofbirth', nationality = '$nationality', hometown = '$hometown', homeregion = '$homeregion', postal_address = '$postaladdress', entrylevel = '$entrylevel', entryyear = '$entryyear', guardianname = '$guardianname', guardianaddress = '$guardianaddress', guardiancontact = '$guardiancontact', admission_category = '$admissioncategory', prog_fk = '$course_programme', study_status = '$studystatus', enroll_modified_by = '$username', enroll_date_modified = '$today' WHERE student_id = '$student_id' AND index_no = '$index_no' ";

$update_rs = mysqli_query($link, $update);
if($update_rs) {
	$activity = "Student Updated - ".$student_id;
	$insert = "INSERT INTO iss_logs (log_activity, log_user) VALUES ('$activity', '$username')";
	$insert_rs = mysqli_query($link, $insert);
	echo 1;
} else {
	echo $link->error;
}
?>