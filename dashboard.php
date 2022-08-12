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
               <h1 class="text-center">Este es el Dashboard</h1>
            </div>
        </div>
    </div>       

      
    

<?php
include ("footerLinks.php"); 
?>