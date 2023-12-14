<?php
session_start();
require("../../php/connect.php");
$username = $_SESSION['username'];

$id = $_POST['id'];

$sql1 = "SELECT * FROM results, iss_course where res_code = course_code and res_student_id = '$id' and res_level = '100' and res_term = 1 and res_grade !='DF' order by res_code, res_session";
$sql2 = "SELECT * FROM results, iss_course where res_code = course_code and res_student_id = '$id' and res_level = '100' and res_term = 2 and res_grade !='DF' order by res_code, res_session";
$sql3 = "SELECT * FROM results, iss_course where res_code = course_code and res_student_id = '$id' and res_level = '100' and res_term = 3 and res_grade !='DF' order by res_code, res_session";

$sql4 = "SELECT * FROM results, iss_course where res_code = course_code and res_student_id = '$id' and res_level = '200' and res_term = 1 and res_grade !='DF' order by res_code, res_session";
$sql5 = "SELECT * FROM results, iss_course where res_code = course_code and res_student_id = '$id' and res_level = '200' and res_term = 2 and res_grade !='DF' order by res_code, res_session";
$sql6 = "SELECT * FROM results, iss_course where res_code = course_code and res_student_id = '$id' and res_level = '200' and res_term = 3 and res_grade !='DF' order by res_code, res_session";

$sql7 = "SELECT * FROM results, iss_course where res_code = course_code and res_student_id = '$id' and res_level = '300' and res_term = 1 and res_grade !='DF' order by res_code, res_session";
$sql8 = "SELECT * FROM results, iss_course where res_code = course_code and res_student_id = '$id' and res_level = '300' and res_term = 2 and res_grade !='DF' order by res_code, res_session";
$sql9 = "SELECT * FROM results, iss_course where res_code = course_code and res_student_id = '$id' and res_level = '300' and res_term = 3 and res_grade !='DF' order by res_code, res_session";

$sql10 = "SELECT * FROM results, iss_course where res_code = course_code and res_student_id = '$id' and res_level = '400' and res_term = 1 and res_grade !='DF' order by res_code, res_session";
$sql11 = "SELECT * FROM results, iss_course where res_code = course_code and res_student_id = '$id' and res_level = '400' and res_term = 2 and res_grade !='DF' order by res_code, res_session";
$sql12 = "SELECT * FROM results, iss_course where res_code = course_code and res_student_id = '$id' and res_level = '400' and res_term = 3 and res_grade !='DF' order by res_code, res_session";

$sql13 = "SELECT * FROM results, iss_course where res_code = course_code and res_student_id = '$id' and res_level = '500' and res_term = 1 and res_grade !='DF' order by res_code, res_session";
$sql14 = "SELECT * FROM results, iss_course where res_code = course_code and res_student_id = '$id' and res_level = '500' and res_term = 2 and res_grade !='DF' order by res_code, res_session";
$sql15 = "SELECT * FROM results, iss_course where res_code = course_code and res_student_id = '$id' and res_level = '500' and res_term = 3 and res_grade !='DF' order by res_code, res_session";

$sql16 = "SELECT * FROM results, iss_course where res_code = course_code and res_student_id = '$id' and res_level = '600' and res_term = 1 and res_grade !='DF' order by res_code, res_session";
$sql17 = "SELECT * FROM results, iss_course where res_code = course_code and res_student_id = '$id' and res_level = '600' and res_term = 2 and res_grade !='DF' order by res_code, res_session";
$sql18 = "SELECT * FROM results, iss_course where res_code = course_code and res_student_id = '$id' and res_level = '600' and res_term = 3 and res_grade !='DF' order by res_code, res_session";

$sql_dip = "SELECT * from iss_enrollment, iss_programmes WHERE prog_fk=prog_id AND student_id='$id'";

$overall = array();
$biodata = array();

$ff = array();
$fs = array();
$ft = array();

$sf = array();
$ss = array();
$st = array();

$tf = array();
$ts = array();
$tt = array();

$ftf = array();
$fts = array();
$ftt = array();

$fff = array();
$ffs = array();
$fft = array();

$stf = array();
$sts = array();
$stt = array();

$rs1 = mysqli_query($link, $sql1);
if($rs1) {
	while($row = mysqli_fetch_assoc($rs1)) {
		$ff[] = $row;
	}
} else {
	echo $link->error;
}

$rs2 = mysqli_query($link, $sql2);
if($rs2) {
	while($row = mysqli_fetch_assoc($rs2)) {
		$fs[] = $row;
	}
} else {
	echo $link->error;
}

$rs3 = mysqli_query($link, $sql3);
if($rs3) {
	while($row = mysqli_fetch_assoc($rs3)) {
		$ft[] = $row;
	}
} else {
	echo $link->error;
}

$rs4 = mysqli_query($link, $sql4);
if($rs4) {
	while($row = mysqli_fetch_assoc($rs4)) {
		$sf[] = $row;
	}
} else {
	echo $link->error;
}

$rs5 = mysqli_query($link, $sql5);
if($rs5) {
	while($row = mysqli_fetch_assoc($rs5)) {
		$ss[] = $row;
	}
} else {
	echo $link->error;
}

$rs6 = mysqli_query($link, $sql6);
if($rs6) {
	while($row = mysqli_fetch_assoc($rs6)) {
		$st[] = $row;
	}
} else {
	echo $link->error;
}

$rs7 = mysqli_query($link, $sql7);
if($rs7) {
	while($row = mysqli_fetch_assoc($rs7)) {
		$tf[] = $row;
	}
} else {
	echo $link->error;
}

$rs8 = mysqli_query($link, $sql8);
if($rs8) {
	while($row = mysqli_fetch_assoc($rs8)) {
		$ts[] = $row;
	}
} else {
	echo $link->error;
}

$rs9 = mysqli_query($link, $sql9);
if($rs9) {
	while($row = mysqli_fetch_assoc($rs9)) {
		$tt[] = $row;
	}
} else {
	echo $link->error;
}

$rs10 = mysqli_query($link, $sql10);
if($rs10) {
	while($row = mysqli_fetch_assoc($rs10)) {
		$ftf[] = $row;
	}
} else {
	echo $link->error;
}

$rs11 = mysqli_query($link, $sql11);
if($rs11) {
	while($row = mysqli_fetch_assoc($rs11)) {
		$fts[] = $row;
	}
} else {
	echo $link->error;
}

$rs12 = mysqli_query($link, $sql12);
if($rs12) {
	while($row = mysqli_fetch_assoc($rs12)) {
		$ftt[] = $row;
	}
} else {
	echo $link->error;
}

$rs13 = mysqli_query($link, $sql13);
if($rs13) {
	while($row = mysqli_fetch_assoc($rs13)) {
		$fff[] = $row;
	}
} else {
	echo $link->error;
}
$rs14 = mysqli_query($link, $sql14);
if($rs14) {
	while($row = mysqli_fetch_assoc($rs14)) {
		$ffs[] = $row;
	}
} else {
	echo $link->error;
}

$rs15 = mysqli_query($link, $sql15);
if($rs15) {
	while($row = mysqli_fetch_assoc($rs15)) {
		$fft[] = $row;
	}
} else {
	echo $link->error;
}

$rs16 = mysqli_query($link, $sql16);
if($rs16) {
	while($row = mysqli_fetch_assoc($rs16)) {
		$stf[] = $row;
	}
} else {
	echo $link->error;
}

$rs17 = mysqli_query($link, $sql17);
if($rs17) {
	while($row = mysqli_fetch_assoc($rs17)) {
		$sts[] = $row;
	}
} else {
	echo $link->error;
}

$rs18 = mysqli_query($link, $sql18);
if($rs18) {
	while($row = mysqli_fetch_assoc($rs18)) {
		$stt[] = $row;
	}
} else {
	echo $link->error;
}


$rs19 = mysqli_query($link, $sql_dip);
if($rs19) {
	while($row = mysqli_fetch_assoc($rs19)) {
		$biodata[] = $row;
	}
} else {
	echo $link->error;
}

$overall['first_first'] = $ff;
$overall['first_second'] = $fs;
$overall['first_third'] = $ft;
$overall['second_first'] = $sf;
$overall['second_second'] = $ss;
$overall['second_third'] = $st;
$overall['third_first'] = $tf;
$overall['third_second'] = $ts;
$overall['third_third'] = $tt;
$overall['fourth_first'] = $ftf;
$overall['fourth_second'] = $fts;
$overall['fourth_third'] = $ftt;
$overall['fifth_first'] = $fff;
$overall['fifth_second'] = $ffs;
$overall['fifth_third'] = $fft;
$overall['sixth_first'] = $stf;
$overall['sixth_second'] = $sts;
$overall['sixth_third'] = $stt;
$overall['biodata'] = $biodata;

echo json_encode($overall);
?>