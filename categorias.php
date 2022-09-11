<?php
session_start();
 
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
     header("location: login.php");
     exit;
}

$usuario = $_SESSION['username'];

if(!isset($usuario)){
    header("location: login.php");
}

include_once "./Config/connection.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pharmacy System - Categorias</title>
    <?php include ("headerLinks.php"); ?>
    <link rel="stylesheet" href="./Assets/css/style.css">
    <link rel="stylesheet" href="./Assets/css/custom.css">
    
</head>
<body>
<div class="d-flex" id="wrapper">
    <?php include('sidenav.php') ?>
    <div id="page-content-wrapper">
        <?php include ("navbar.php"); ?>
        <div class="container-fluid">
            <h1 class="text-center fw-bold mb-3 mt-3">
                Categorias
            </h1>
            <?php
            $query= "SELECT * FROM usuario INNER JOIN niveles ON usuario.idnivel = niveles.idnivel WHERE username='$usuario'";
            $result = $connection->query($query);

            if ($result->rowCount() > 0) {
                while ($row = $result->fetch()) {
                    if ($row['nivel']=='Administrador') {
                    ?>               
                    <button type="button" class="btn btnAgregar text-white " data-bs-toggle="modal" data-bs-target="#addCategoryModal">
                        Agregar Nueva 
                        <i class="bi bi-plus-lg"></i>
                    </button>
                    <?php            
                    }
                }
            } 
            ?>

            <hr>
            <div class="row  p-3 categorias">
            <?php
            
            $query = "SELECT * FROM categoria";

            $statement = $connection->query($query);

            if ($statement->rowCount() > 0) {
                while($row = $statement->fetch()) {

            ?>
                    
            <div class="col-sm-3 mb-3">
                <a class="text-decoration-none" href="">
                <div class="card ">
                    <div class="card-body">
                        <h5 class="card-title text-center text-white">
                            <?php echo $row['categoryName']; ?>
                        </h5>
                    </div>
                    </div>
                </a>
            </div>
            
            <?php
                } 
            } else {
                echo '<h3 class="text-center text-danger">No hay <strong>Categorias</strong> que mostrar</h3>';
            }
            ?>
            </div>
        </div>
    </div>
</div>   


        <div class="modal fade" id="addCategoryModal" data-bs-backdrop="static">
            <div class="modal-dialog">
                <div class="modal-content w-75">
                <div class="modal-header text-center">
                    <h5 class="modal-title titulo-modal fw-bold" id="exampleModalLabel">Nueva Categoria</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="categoryController.php" method="post">
                        <div class="form-group formCategoria">
                            <label for="categoryName" class="control-label mb-3">Nombre Categoria</label>
                            <input type="text" name="categoryName" class="form-control mb-3" id="categoryName">
                        </div>
                    </div>
                    <div class="modal-footer d-inline-flex justify-content-center ">
                        <button type="button" class="btn btn-cancelar" data-bs-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-guardarC">Guardar Cambios</button>
                    </form>
                </div>
                </div>
            </div>
        </div>

<?php include ("footerLinks.php"); ?>

</body>
</html>