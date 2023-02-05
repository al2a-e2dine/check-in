<?php
session_start();
include_once 'connect.php';
include 'function_inc.php';

if(!isset($_SESSION['user_id'])){
header('location:login.php');
}else{
    $user_id = $_SESSION['user_id'];
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

    <title>Historique</title>

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
                    <h1 class="h3 mb-2 text-gray-800">Historique</h1>
                    <?php
                                        if(isset($msg)){ ?>
                                        <div class="alert alert-info">
                                        <strong>Info!</strong> <?= $msg ?>
                                        </div>
                                        <?php } ?>
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Historique</h6>

                             

                        </div>

                        <?php
                        
                        $q="SELECT * FROM `history` order by id DESC";
                        $r=mysqli_query($dbc,$q);

                        ?>

                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Nom complet</th>
                                            <th>Date et heure</th>
                                            <th>Statut</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>ID</th>
                                            <th>Nom complet</th>
                                            <th>Date et heure</th>
                                            <th>Statut</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>

                                        <?php
                                        while ($row=mysqli_fetch_assoc($r)) {
                                            $uid=$row['user_id'];
                                            $userInfo=getInfoById('users', $uid);
                                            ?>
                                            
                                        <tr>
                                        <td><?= $row['id'] ?></td>
                                        <td><?= $userInfo['fullname'] ?></td>
                                        <td><?= $row['date'] ?></td>

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