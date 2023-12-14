<?php
session_start();
require("../../php/connect.php");
$username = $_SESSION['username'];

$sql = "SELECT * FROM iss_signatory WHERE sig_status = '1'";
$rs = mysqli_query($link, $sql);
$data = array();

if($rs) {
    while($row = mysqli_fetch_assoc($rs)) {
        $data[] = $row;
    }
} else {
    echo $link->error;
}

echo json_encode($data);
 ?>