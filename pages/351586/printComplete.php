<?php
session_start();
require("../../php/connect.php");
$username = $_SESSION['username'];
$id = $_POST['id'];

$remark = "Ready - ".date("d-M-Y h:i:s");

$sql = "UPDATE iss_scheduler SET remark = '$remark' WHERE trans_id = '$id'";
$rs = mysqli_query($link, $sql);


if($rs) {
    $sql2 = "UPDATE iss_trans_requests SET state = '1' WHERE trans_id = '$id'";
    $rs2 = mysqli_query($link, $sql2);
    if($rs2) {
        $activity = "Transcript Printed - ".$id;
        $insert = "INSERT INTO iss_logs (log_activity, log_user) VALUES ('$activity', '$username')";
        $insert_rs = mysqli_query($link, $insert);

        if($insert_rs) {
            echo 1;
        }
    } else {
        echo $link->error;
    }
} else {
    echo $link->error;
}

?>