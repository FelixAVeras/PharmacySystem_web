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

                <form action="">
                    <div class="row mb-3">
                        <div class="col-12 col-md-4">
                            <div class="form-group">
                                <label for="" class="control-label"></label>
                                <input type="text" class="form-control">
                            </div>
                        </div>
                        <div class="col-12 col-md-4">
                            <div class="form-group"><label for="" class="control-label"></label><input type="text" class="form-control"></div>
                        </div>
                        <div class="col-12 col-md-4">
                            <div class="form-group"><label for="" class="control-label"></label><input type="text" class="form-control"></div>
                        </div>
                    </div>
                </form>

            </div>

        </div>
    </div>       

      
    

<?php
include ("footerLinks.php"); 
?>