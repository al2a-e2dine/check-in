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

$date_time_now=date("Y-m-d H:i:s");
$time_in=date("Y-m-d 08:00:00");
$time_out=date("Y-m-d 16:00:00");

$start_datetime = new DateTime($date_time_now); 
$diff_in = $start_datetime->diff(new DateTime($time_in));

$in = ($diff_in->days * 24 * 60); 
$in += ($diff_in->h * 60); 
$in += $diff_in->i;

if($date_time_now > $time_in){
$in=$in*(-1);
}

//echo 'Diff in: '.$in.'<br>';

$start_datetime = new DateTime($date_time_now); 
$diff_out = $start_datetime->diff(new DateTime($time_out));

$out = ($diff_out->days * 24 * 60); 
$out += ($diff_out->h * 60); 
$out += $diff_out->i;

if($date_time_now < $time_out){
$out=$out*(-1);
}

//echo 'Diff out: '.$out;

if($status==1){
  $la_diff=$in;
}else{
  $la_diff=$out;
}

  $q="INSERT INTO `history`(`user_id`, `status`, `diff`) VALUES ('$userid','$status','$la_diff')";
  $r=mysqli_query($dbc,$q);
  header('location:index.php?done');
}
?>