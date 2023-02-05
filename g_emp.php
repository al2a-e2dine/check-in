<?php
session_start();
include_once 'connect.php';
include 'function_inc.php';

if(!isset($_SESSION['user_id'])){
header('location:login_admin.php');
}else{
    $user_id = $_SESSION['user_id'];
}

if(isset($_POST['submit'])){
   $fullname =  $_POST['fullname'];
   $phone =  $_POST['phone'];

   $q="INSERT INTO `users`(`fullname`, `phone`) VALUES ('$fullname','$phone')";
   //echo $q; exit();
   $r=mysqli_query($dbc,$q);
   $msg="insertion terminé";
}

if(isset($_POST['submit2'])){
    $fullname =  $_POST['fullname'];
    $phone =  $_POST['phone'];
    //echo $file_name; exit();
    $cid = $_POST['cid'];
    $q="UPDATE `users` SET `fullname`='$fullname',`phone`='$phone' WHERE id=$cid";
   
 
    
    $r=mysqli_query($dbc,$q);
    $msg="Modification terminé";
 }
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Gestion des employés</title>

    <!-- Custom fonts for this template -->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <?php include 'sidebar.html'; ?>

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

            <?php include 'topbar.html'; ?>

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Gestion des employés</h1>
                    <?php
                                        if(isset($msg)){ ?>
                                        <div class="alert alert-info">
                                        <strong>Info!</strong> <?= $msg ?>
                                        </div>
                                        <?php } ?>
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <a href="" data-toggle="modal" data-target="#addcow"><h6 class="m-0 font-weight-bold text-primary">Ajouter un nouvel employé</h6></a>

                             <!-- add cow Modal-->
  <div class="modal fade" id="addcow">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-fullname">Ajouter un nouvel employé</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
        <form action="g_emp.php" method="post" >
  <div class="form-group">
    <input type="text" class="form-control" placeholder="Nom complet" name="fullname" required>
  </div>
  <div class="form-group">
    <input type="number" class="form-control" placeholder="Numéro de téléphone" name="phone" required>
  </div>
  <input type="submit" class="btn btn-primary btn-block" name="submit" value="Ajouter">
</form>
        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
        </div>
        
      </div>
    </div>
  </div>

                        </div>

                        <?php
                        
                        $q="SELECT * FROM `users` WHERE `actif`=1";
                        $r=mysqli_query($dbc,$q);

                        ?>

                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Id</th>
                                            <th>Nom complet</th>
                                            <th>Numéro de téléphone</th>
                                            <th>Date</th>
                                            <th>Profil</th>
                                            <th>Modifier</th>
                                            <th>Supprimer</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                        <th>Id</th>
                                            <th>Nom complet</th>
                                            <th>Numéro de téléphone</th>
                                            <th>Date</th>
                                            <th>Profil</th>
                                            <th>Modifier</th>
                                            <th>Supprimer</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>

                                        <?php while ($row=mysqli_fetch_assoc($r)) {
                                            ?>
                                            
                                        <tr>
                                            <td><?= $row['id'] ?></td>
                                            <td><?= $row['fullname'] ?></td>
                                            <td><?= $row['phone'] ?></td>
                                            <td><?= $row['date'] ?></td>
                                            <td><a href="profile.php?id=<?= $row['id'] ?>"  class="btn btn-primary btn-block">Profil</a></td>
                                            <td>
                                                <a href="" data-toggle="modal" data-target="#updatecow<?= $row['id'] ?>" class="btn btn-success btn-block">Modifier</a>

                                                                           <!-- add cow Modal-->
  <div class="modal fade" id="updatecow<?= $row['id'] ?>">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-fullname">Modifer</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">

        <?php
        $userInfo=getInfoById('users',$row['id']);
        //echo $userInfo['fullname']; exit();
        ?>

        <form action="g_emp.php" method="post" >
  <div class="form-group">
    <input type="text" class="form-control" value="<?= $userInfo['fullname'] ?>" name="fullname" required>
  </div>
  <div class="form-group">
    <input type="number" class="form-control" value="<?= $userInfo['phone'] ?>" name="phone" required>
  </div>
  <input type="hidden" value="<?= $row['id'] ?>" name="cid">
  <input type="submit" class="btn btn-success btn-block" name="submit2" value="Modifier">
</form>
        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
        
      </div>
    </div>
  </div>

                                            </td>
                                            <td><a href="delete_emp.php?id=<?= $row['id'] ?>"  class="btn btn-danger btn-block">Supprimer</a></td>
                                        </tr>

                                        <?php } ?>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <?php include 'footer.html'; ?>

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/datatables-demo.js"></script>

</body>

</html>