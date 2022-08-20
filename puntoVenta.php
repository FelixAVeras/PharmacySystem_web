<?php
include "config/connection.php";

if(!isset($_SESSION['username']) && !empty($_SESSION['username'])){    
    header('Location: login.php');
}

if(isset($_POST['btn_logout'])){
    session_destroy();
    header('Location: login.php');
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pharmacy System - Categorias</title>
    <?php include ("headerLinks.php"); ?>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/custom.css">
    
</head>
<body>
<div class="d-flex" id="wrapper">
    <?php include('sidenav.php') ?>
    <div id="page-content-wrapper">
        <?php include ("navbar.php"); ?>
        <div class="container-fluid">
            <h1 class="text-center fw-bold mb-3 mt-3">
               Ventas
            </h1>
            <button type="button" class="btn btnAgregar text-white " data-bs-toggle="modal" data-bs-target="#addCategoryModal">
                Nueva factura
                <i class="bi bi-plus-lg"></i>
            </button>

            <hr>
            <div class="row  p-3 categorias">
        
                    
      
            </div>
        </div>
    </div>
</div>   




<?php include ("footerLinks.php"); ?>

</body>
</html>