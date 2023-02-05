<?php
include_once 'connect.php';
include 'function_inc.php';

session_start();
if(!isset($_SESSION['user_id'])){
  header('location:login.php');
}else{
  $uid=$_SESSION['user_id'];
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Clinique El Omarâa</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>

  <style>
a:link {
  text-decoration: none;
}

a:visited {
  text-decoration: none;
}

a:hover {
  text-decoration: underline;
}

a:active {
  text-decoration: underline;
}
</style>
</head>
<body>

<div class="container-fluid p-5 bg-primary text-white text-center">
  <?php if ($uid==1) { ?>
  <a href="g_emp.php" class="text-white"><h1>Clinique El Omarâa de chirurgie ambulatoire</h1></a>
  <?php }else{ ?>
    <a href="login_admin.php" class="btn btn-dark btn-block">Login Admin</a>
    <h1>Clinique El Omarâa de chirurgie ambulatoire</h1>
    <?php } ?>
  <p>المصحة الغير استشفائية : الأمراء</p> 
</div>
  
<div class="container mt-5">
<!-- <form action="index.php" method="post"> -->
  <div class="mb-3 mt-3">
    <input type="number" class="form-control" placeholder="user id" name="userid" id="input" value="" autofocus required>
  </div>

  <script src='js/jquery2.js'></script>
  
<!-- </form> -->

<table class="table table-hover text-center">
    <thead>
      <tr>
        <th>ID</th>
        <th>Full Name</th>
        <th>Date & Time</th>
        <th>La différence</th>
        <th>Status</th>
      </tr>
    </thead>
    <tbody>
      <?php
      $q="SELECT * FROM `history` order by id DESC";
      $r=mysqli_query($dbc,$q);
      while($row=mysqli_fetch_assoc($r)){
        $uid=$row['user_id'];
        $userInfo=getInfoById('users', $uid);
      ?>
      <tr>
        <td><?= $row['user_id'] ?></td>
        <td><?= $userInfo['fullname'] ?></td>
        <td><?= $row['date'] ?></td>
        <td><?= $row['diff'] ?> Min</td>

        <?php if($row['status']==0){ ?>
          <td><button class="btn btn-danger btn-block">OUT</button></td>
        <?php }else{ ?>
          <td><button class="btn btn-success btn-block">IN</button></td>
        <?php } ?>

        
      </tr>
      <?php } ?>
    </tbody>
  </table>
</div>

</body>
</html>

<script>
 var element = document.getElementById('input');
     element.addEventListener('input', function() {
     let id = document.getElementById("input");

     $.ajax({
      type:'GET',
      url:'checkin.php',
      data:'idc='+id.value,
      success:function (data) {
        top.document.location="index.php";
      }});
    });
 </script>
