<?php
session_start();
 
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
     header("location: login.php");
     exit;
}

// if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
//      header("location: login_test.php");
//      exit;
// }

?>

<?php
include ("headerLinks.php"); 
?>
    <div class="d-flex" id="wrapper">
        <?php include('sidenav.php') ?>
        <div id="page-content-wrapper">
            <?php include ("navbar.php"); ?>
            <div class="container-fluid">
            
                <h3 class=" mt-3">Nuevo Empleado</h3>

            </div>

        </div>
        </div>
    </div>       

      
    

<?php
include ("footerLinks.php"); 
?>