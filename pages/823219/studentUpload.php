<?php
session_start();
set_time_limit(0);
require("../../php/connect.php");
require_once("../../plugins/spreadsheet-reader-master/php-excel-reader/excel_reader2.php");
require_once("../../plugins/spreadsheet-reader-master/SpreadsheetReader.php");
$username = $_SESSION['username'];;

$programme = isset($_POST['course_programme']) ? $_POST['course_programme'] : 0;

$inserted = 0;
$updated = 0;
$allowedFileType = ['application/vnd.ms-excel','text/xls','text/xlsx','application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'];

if(in_array($_FILES['student_file']['type'], $allowedFileType)) {
  $targetPath = '../../uploads/'.$_FILES['student_file']['name'];
  if(move_uploaded_file($_FILES['student_file']['tmp_name'], $targetPath)) {

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
       $indexno = trim($Row[1]);
       if($studentid == '') {
          echo "Student ID Not Found \n";
       } else if($indexno == '') {
          echo "Index Number Not Found \n";
       } else {
          $firstname = strtoupper(trim($Row[2]));
          $middlename = strtoupper(trim($Row[3]));
          $lastname = strtoupper(trim($Row[4]));
          $gender = strtoupper($Row[5]);
          $dateofbirth = date('Y-m-d', strtotime($Row[6]));
          $entrylevel = strtoupper($Row[7]);
          $entryyear = strtoupper($Row[8]);
          $admission_category = strtoupper($Row[9]);

          /** Checking for existence **/
          $sql_check = "SELECT * FROM iss_enrollment where student_id = '$studentid' ";
          $rs_check = mysqli_query($link, $sql_check);

          if($rs_check->num_rows <= 0) {
             $sql_insert = "INSERT INTO iss_enrollment (student_id, index_no, firstname, middlename, lastname, gender, dateofbirth, entrylevel, entryyear, admission_category, prog_fk, enroll_added_by) VALUES ('$studentid', '$indexno', '$firstname', '$middlename', '$lastname', '$gender', '$dateofbirth', '$entrylevel', '$entryyear', '$admission_category', '$programme', '$username')";

             $rs_insert = mysqli_query($link, $sql_insert);
             if($rs_insert) {
               $activity = "Student Added - ".$studentid;
               $insert = "INSERT INTO iss_logs (log_activity, log_user) VALUES ('$activity', '$username')";
               $insert_rs = mysqli_query($link, $insert);

               if($insert_rs) {
                  $inserted++;
               }
            } else {
               echo $link->error;
            }
         } else {
            $today = date('Y-m-d h:i:s');
            $sql_update = "UPDATE iss_enrollment SET firstname='$firstname', middlename='$middlename', lastname='$lastname',   gender='$gender', dateofbirth='$dateofbirth', entrylevel = '$entrylevel', entryyear = '$entryyear', admission_category= '$admission_category', enroll_date_modified = '$today', enroll_modified_by = '$username' WHERE index_no = '$indexno' AND student_id = '$studentid'"; 

            $sql_rs = mysqli_query($link, $sql_update);

            if($sql_rs) {
               $event = "Student UIN: ".$studentid.". Index No. ".$indexno." updated";
               $insert = "INSERT INTO iss_logs (log_activity, log_user) VALUES ('$event', '$username')";
               $insert_rs = mysqli_query($link, $insert);

               if($insert_rs) {
                 $updated++;
              } else {
                 echo $link->error;
              }
           } else {
            echo $link->error;
         }
      }
   }
}
   echo nl2br($inserted." Student(s) Uploaded. \n".$updated. " Student(s) Updated \n");
}
}

} else {
  echo "Wrong File Format \n";
}

?>