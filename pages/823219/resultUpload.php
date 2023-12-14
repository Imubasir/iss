<?php
session_start();
set_time_limit(0);
require("../../php/connect.php");
require_once("../../plugins/spreadsheet-reader-master/php-excel-reader/excel_reader2.php");
require_once("../../plugins/spreadsheet-reader-master/SpreadsheetReader.php");
$username = $_SESSION['username'];;

$inserted = 0;
$updated = 0;

$allowedFileType = ['application/vnd.ms-excel','text/xls','text/xlsx','application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'];

if(in_array($_FILES['results_file']['type'], $allowedFileType)) {
 $targetPath = '../../uploads/'.$_FILES['results_file']['name'];
 if(move_uploaded_file($_FILES['results_file']['tmp_name'], $targetPath)) {

  $Reader = new SpreadsheetReader($targetPath);
  $sheetCount = count($Reader->sheets());

  $counter = 0;
  for($i=0;$i<$sheetCount;$i++){
   $Reader->ChangeSheet($i);

   foreach ($Reader as $Row){
    if($counter == 0){
     $counter++;
     continue;
  };

  $session = $Row[0];
  $studentid = $Row[1];
  if($session == '') {
     echo "Session Not Found \n";
  } else if($studentid == '') {
     echo "Student ID Not Found \n";
  } else {
     $level = mysqli_real_escape_string($link, $Row[2]);
     $term = mysqli_real_escape_string($link, $Row[3]);
     $code = mysqli_real_escape_string($link, $Row[4]);
     $title = mysqli_real_escape_string($link, strtoupper($Row[5]));
     $mark = mysqli_real_escape_string($link, $Row[6]);
     $grade = mysqli_real_escape_string($link, $Row[7]);
     $credits = mysqli_real_escape_string($link, $Row[8]);

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

     /** Checking for existence **/
     $sql_check = "SELECT * FROM results where res_student_id = '$studentid' AND res_session = '$session' AND res_code = '$code'";
     $rs_check = mysqli_query($link, $sql_check);

     if($rs_check->num_rows <= 0) {
      $sql_course="SELECT * from iss_course where course_code='$code'";
      $rscourse=mysqli_query($link, $sql_course);

      if ($rscourse->num_rows < 1) { //If no course, insert course
         $updatecourse="INSERT INTO iss_course(course_code, course_title, course_credit, course_added_by) VALUES ('$code', '$title', '$credits', '$username')";
         $rep=mysqli_query($link, $updatecourse);
         if($rep) { //insert results
            $insert = "INSERT INTO results (res_session, res_student_id, res_level, res_term, res_code, res_title, res_mark, res_grade, res_credit, res_gp, res_weighted, res_added_by) VALUES ('$session', '$studentid', '$level', '$term', '$code', '$title', '$mark', '$grade', '$credits', '$gp', '$w', '$username')";
            $insert_rs = mysqli_query($link, $insert);
            if($insert_rs) {
               $inserted++;

               $activity = "Result Uploaded - ".$studentid."-".$code."-".$mark;
               $insert = "INSERT INTO iss_logs (log_activity, log_user) VALUES ('$activity', '$username')";
               $insert_rs = mysqli_query($link, $insert);
            }
         } else {
            echo $link->error;
         }
      } else { //if course, insert results
         $insert = "INSERT INTO results (res_session, res_student_id, res_level, res_term, res_code, res_title, res_mark, res_grade, res_credit, res_gp, res_weighted, res_added_by) VALUES ('$session', '$studentid', '$level', '$term', '$code', '$title', '$mark', '$grade', '$credits', '$gp', '$w', '$username')";
         $insert_rs = mysqli_query($link, $insert);
         if($insert_rs) {
            $inserted++;

            $activity = "Result Uploaded - ".$studentid."-".$code."-".$mark;
            $insert = "INSERT INTO iss_logs (log_activity, log_user) VALUES ('$activity', '$username')";
            $insert_rs = mysqli_query($link, $insert);
         } else {
            echo $link->error;
         }
      }
   } else {
      $today = date('Y-m-d h:i:s');
      $sql_update = "UPDATE results SET res_code = '$code', res_title = '$title', res_mark = '$mark', res_grade = '$grade', res_credit = '$credits', res_gp = '$gp', res_weighted = '$w', res_modified_by = '$username', res_date_modified = '$today' WHERE res_student_id = '$studentid' and res_level = '$level' and res_term = '$term' and res_session = '$session'"; 

      $sql_rs = mysqli_query($link, $sql_update);

      if($sql_rs) {
         $updated++;

         $activity = "Result Updated - ".$studentid."-".$code."-".$mark;
         $insert = "INSERT INTO iss_logs (log_activity, log_user) VALUES ('$activity', '$username')";
         $insert_rs = mysqli_query($link, $insert);

      } else {
         echo $link->error;
      }
   }
}
}
echo nl2br($inserted." Results Uploaded. \n".$updated. " Results Updated \n");
}
}

} else {
 echo "Wrong File Format \n";
}

?>