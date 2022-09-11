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
            
                <h1 class="text-center mt-3">Empleados</h1>

                <a href="addEmployee.php" class="btn btn-agregar text-white">Agregar Empleado
                <i class="bi bi-plus-lg"></i>
                </a>
            
            </div>

            <div class="container mt-5">
            <table class="table">
  <thead>
    <tr>
      <th scope="col">N. de empleado</th>
      <th scope="col">Nombre</th>
      <th scope="col">Apellido</th>
      <th scope="col">Telefono</th>
      <th scope="col">Dirección</th>
      <th scope="col">Correo</th>
      <th scope="col">Puesto</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">1</th>
      <td>Mark</td>
      <td>Otto</td>
      <td>8093453421</td>
      <td>Santo Domingo</td>
      <td>mark.otto@gmail.com</td>
      <td>Administrador</td>
    </tr>
    <tr>
      <th scope="row">2</th>
      <td>Jacob</td>
      <td>Thornton</td>
      <td>8093453421</td>
      <td>Santo Domingo</td>
      <td>mark.otto@gmail.com</td>
      <td>Vendedor</td>
    </tr>
    <tr>
      <th scope="row">3</th>
      <td>Larry</td>
      <td>Lopez</td>
      <td>8093453421</td>
      <td>Santo Domingo</td>
      <td>mark.otto@gmail.com</td>
      <td>Cajero</td>
    </tr>
  </tbody>
</table>
            </div>

        </div>
        </div>
    </div>       

      
    

<?php
include ("footerLinks.php"); 
?>