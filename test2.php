<?php
include 'connect.php';
if (isset($_GET['idc'])) {
    $idc=$_GET['idc'];

$q="INSERT INTO `test`(`idc`) VALUES ('$idc')";
$r=mysqli_query($dbc,$q);
}


?>