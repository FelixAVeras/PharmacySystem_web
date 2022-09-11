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
            
            <h4 class=" mt-5 ms-5 nuevoEmpleado">Nuevo Empleado</h4>
                <div class="container mt-5 d-flex justify-content-center shadow-sm w-75 rounded-3">
                

                <form action="">
                    <div class="row mb-3">
                        <div class="col-12 col-md-4">
                            <div class="form-group">
                                <label for="" class="control-label">
                                Numero de empleado
                                </label>
                                <input type="text" class="form-control">
                            </div>
                        </div>
                        <div class="col-12 col-md-4">
                            <div class="form-group">
                                <label for="" class="control-label">
                                Nombre
                                </label>
                                <input type="text" class="form-control">
                            </div>
                        </div>
                        <div class="col-12 col-md-4">
                            <div class="form-group">
                                <label for="" class="control-label">
                                    Apellido
                                </label>
                                <input type="text" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-12 col-md-4">
                            <div class="form-group">
                                <label for="" class="control-label">
                                Telefono
                                </label>
                                <input type="text" class="form-control">
                            </div>
                        </div>
                        <div class="col-12 col-md-4">
                            <div class="form-group">
                                <label for="" class="control-label">
                                Dirección
                                </label>
                                <input type="text" class="form-control">
                            </div>
                        </div>
                        <div class="col-12 col-md-4">
                            <div class="form-group">
                                <label for="" class="control-label">
                                    Correo
                                </label>
                                <input type="text" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-12 col-md-4">
                            <div class="form-group">
                                <label for="" class="control-label">
                                Permisos
                                </label>
                                <select class="form-select" aria-label="Default select example">
                                <option selected>Administrador</option>
                                <option value="1">Cajero</option>
                                <option value="2">Vendedor</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-12 col-md-4">
                            <div class="form-group">
                                <label for="" class="control-label">
                                Usuario
                                </label>
                                <input type="text" class="form-control">
                            </div>
                        </div>
                        <div class="col-12 col-md-4">
                            <div class="form-group">
                                <label for="" class="control-label">
                                    Clave
                                </label>
                                <input type="text" class="form-control">
                            </div>
                        </div>
                    </div>
                </form>
                </div>


            </div>

        </div>
    </div>       

      
    

<?php
include ("footerLinks.php"); 
?>