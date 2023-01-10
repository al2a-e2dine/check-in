<?php
session_start();
include_once 'connect.php';

if(!isset($_SESSION['user_id'])){
    header('location:login.php');
    }else{
        $user_id = $_SESSION['user_id'];
    } 

    if (isset($_GET['id'])) {
        $get_id=$_GET['id'];

        $q="UPDATE `users` SET `actif`= 0 WHERE id=$get_id";
        $r= mysqli_query($dbc,$q);
        header('location:g_emp.php?done');
    }else {
        header('location:g_emp.php?error');
    }
?>