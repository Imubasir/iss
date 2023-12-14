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

if(in_array($_FILES['grad_file']['type'], $allowedFileType)) {
 $targetPath = '../../uploads/'.$_FILES['grad_file']['name'];
 if(move_uploaded_file($_FILES['grad_file']['tmp_name'], $targetPath)) {

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

  $studentid = trim($Row[0]);
  if($studentid == '') {
     echo "Student ID Not Found \n";
  } else {
     $grad_date = strtoupper(trim($Row[1]));
     $grad_class = strtoupper(trim($Row[2]));
     $grad_name = strtoupper(trim($Row[3]));
     $certno = strtoupper($Row[4]);

     /** Checking for existence **/
     $sql_check = "SELECT * FROM iss_graduates where grad_student_id = '$studentid' ";
     $rs_check = mysqli_query($link, $sql_check);

     if($rs_check->num_rows <= 0) {
        $sql_insert = "INSERT INTO iss_graduates (grad_student_id, grad_date, grad_class, grad_cert_no, grad_name, grad_added_by) VALUES ('$studentid', '$grad_date', '$grad_class', '$certno', '$grad_name', '$username')";

        $rs_insert = mysqli_query($link, $sql_insert);
        if($rs_insert) {
         $activity = "Graduand Added - ".$studentid;
         $insert = "INSERT INTO iss_logs (log_activity, log_user) VALUES ('$activity', '$username')";
         $insert_rs = mysqli_query($link, $insert);

         if($insert_rs) {
            $bioupdate = "UPDATE iss_enrollment SET study_status = 'GRADUATED' WHERE student_id = '$studentid'";
            $bio_rs = mysqli_query($link, $bioupdate);
            if($bio_rs) {
               $inserted++;
            } else {
               echo $link->error;
            }
         } else {
            echo $link->error;
         }
      } else {
         echo $link->error;
      }
   } else {
      $today = date('Y-m-d h:i:s');

      $sql_update = "UPDATE iss_graduates SET grad_date = '$grad_date', grad_class = '$grad_class', grad_cert_no = '$certno', grad_name = '$grad_name' WHERE grad_student_id = '$studentid'"; 

      $sql_rs = mysqli_query($link, $sql_update);

      if($sql_rs) {
         $event = "Graduate Updated: ".$studentid.". Class: ".$grad_class;
         $insert = "INSERT INTO iss_logs (log_activity, log_user) VALUES ('$event', '$username')";
         $insert_rs = mysqli_query($link, $insert);

         if($insert_rs) {
          $bioupdate = "UPDATE iss_enrollment SET study_status = 'GRADUATED' WHERE student_id = '$studentid'";
            $bio_rs = mysqli_query($link, $bioupdate);
            if($bio_rs) {
               $updated++;
            } else {
               echo $link->error;
            }
       } else {
          echo $link->error;
       }
    } else {
      echo $link->error;
   }
}
}
}
echo nl2br($inserted." Graduands Uploaded. \n".$updated. " Graduands Updated \n");
}
}

} else {
 echo "Wrong File Format \n";
}

?>