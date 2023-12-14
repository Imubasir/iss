<?php
require("connect.php");
$sql = "SELECT DISTINCT entryyear, COUNT(*) as value FROM `iss_enrollment` group BY entryyear";
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