<link rel="stylesheet" href="css/style.css">


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
<?php
include ("headerLinks.php"); 
?>
 <div class="d-flex" id="wrapper">
        <?php include('sidenav.php') ?>
        <div id="page-content-wrapper">
            <?php include ("navbar.php"); ?>
            <div class="container-fluid">
            <div class="row mt-3 categorias">
            <div class="col-sm-4">
               <a class="text-decoration-none" href="">
               <div class="card">
                <div class="card-body">
                    <h5 class="card-title text-center text-white">MEDICAMENTOS</h5>
                </div>
                </div>
               </a>
            </div>
            <div class="col-sm-4">
               <a class="text-decoration-none" href="">
               <div class="card ">
                <div class="card-body">
                    <h5 class="card-title text-center text-white">CUIDADO PERSONAL</h5>
                </div>
                </div>
               </a>
            </div>
            <div class="col-sm-4">
               <a class="text-decoration-none" href="">
               <div class="card ">
                <div class="card-body">
                    <h5 class="card-title text-center text-white">SALUD Y NUTRICIÓN</h5>
                </div>
                </div>
               </a>
            </div>
            </div>           
         </div>
        </div>
        </div>   

    <?php
    include ("footerLinks.php"); 
    ?>

