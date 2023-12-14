<?php
session_start();
require("../../php/connect.php");
$username = $_SESSION['username'];
$id = $_POST['id'];

$sql = "SELECT DISTINCT res_level from results where res_student_id = '$id'";
$rs = mysqli_query($link, $sql);
$data = array();

if($rs) {
    while($row = mysqli_fetch_assoc($rs)) {
        $data[] = $row['res_level'];
    }
} else {
    echo $link->error;
}

echo json_encode($data);
 ?>