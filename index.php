<?php
include_once 'connect.php';
include 'function_inc.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap 5 Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>

<div class="container-fluid p-5 bg-primary text-white text-center">
  <h1>My First Bootstrap Page</h1>
  <p>Resize this responsive page to see the effect!</p> 
</div>
  
<div class="container mt-5">
<!-- <form action="index.php" method="post"> -->
  <div class="mb-3 mt-3">
    <input type="number" class="form-control" placeholder="user id" name="userid" id="input" value="" autofocus required>
  </div>

  
  
<!-- </form> -->

<table class="table table-hover text-center">
    <thead>
      <tr>
        <th>ID</th>
        <th>Full Name</th>
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
