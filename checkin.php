<?php
include 'connect.php';
include 'function_inc.php';

if(isset($_GET['idc'])){
  $userid=$_GET['idc'];

  $q0="SELECT * FROM `history` WHERE `user_id`='$userid' order by id DESC limit 1";
  $r0=mysqli_query($dbc,$q0);
  $row0=mysqli_fetch_assoc($r0);
  if ($row0['status']==1){
    $status=0;
  }else{
    $status=1;
  }

  $q="INSERT INTO `history`(`user_id`, `status`) VALUES ('$userid','$status')";
  $r=mysqli_query($dbc,$q);
  header('location:index.php?done');
}
?>