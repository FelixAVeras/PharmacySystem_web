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
</head>
<body>
<div class="d-flex" id="wrapper">
    <?php include('sidenav.php') ?>
    <div id="page-content-wrapper">
        <?php include ("navbar.php"); ?>
        <div class="container-fluid">
            <h2 class="text-center">Categorias</h2>
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addCategoryModal">Agregar Nueva <i class="bi bi-plus-lg"></i></button>

            <hr>
            <div class="row mt-3 categorias">
            <?php
            
            $query = "SELECT * FROM categoria";

            $statement = $connection->query($query);

            if ($statement->num_rows > 0) {
                while($row = $statement->fetch_array()) {

            ?>
                    
            <div class="col-sm-4 mb-3">
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
            }

            ?>
            </div>
        </div>
    </div>
</div>   


        <div class="modal fade" id="addCategoryModal" data-bs-backdrop="static">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Nueva Categoria</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="categoryController.php" method="post">
                        <div class="form-group">
                            <label for="categoryName" class="control-label">Nombre Categoria</label>
                            <input type="text" name="categoryName" class="form-control" id="categoryName">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-success">Guardar Cambios</button>
                    </form>
                </div>
                </div>
            </div>
        </div>

<?php include ("footerLinks.php"); ?>

</body>
</html>