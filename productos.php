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
            <h2 class="text-center mt-3">Productos</h2>
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addCategoryModal">
                Agregar producto
                <i class="bi bi-plus-lg"></i>
            </button>
            <div class="input-group mb-3 mt-3">
            <input type="text" class="form-control" placeholder="Buscar producto" aria-label="Recipient's username" aria-describedby="button-addon2">
            <button class="btn btn-outline-secondary" type="button" id="button-addon2">
            <i class="bi bi-search"></i>
            </button>
            </div>

            <table class="table">
  <thead>
    <tr>
      <th scope="col">Código</th>
      <th scope="col">Nombre producto</th>
      <th scope="col">Categoria</th>
      <th scope="col">Precio</th>
      <th scope="col">Exixtencia</th>
    </tr>
  </thead>
  <tbody class="table-group-divider">
    <tr>
      <th scope="row">1</th>
      <td>Mark</td>
      <td>Otto</td>
      <td>@mdo</td>
      <td>@mdo</td>
    </tr>
    <tr>
      <th scope="row">2</th>
      <td>Jacob</td>
      <td>Thornton</td>
      <td>@fat</td>
      <td>@fat</td>
    </tr>
    <tr>
      <th scope="row">3</th>
      <td colspan="2">Larry the Bird</td>
      <td>@twitter</td>
      <td>@twitter</td>
    </tr>
  </tbody>
</table>


    
        </div>
    </div>
</div>   

<div class="modal fade" id="addCategoryModal" data-bs-backdrop="static">
            <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Nueva Categoria</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="categoryController.php" method="post">
                    <div class="form-group">
                            <label for="categoryName" class="control-label">
                                Código 
                            </label>
                            <input type="text" name="categoryName" class="form-control" id="categoryName">
                        </div>
                        <div class="form-group mt-3">
                            <label for="categoryName" class="control-label">
                                Nombre del producto
                            </label>
                            <input type="text" name="categoryName" class="form-control" id="categoryName">
                        </div>
                        <label for="categoryName" class="control-label mt-3">
                        Seleccione categoria
                            </label>
                        <select class="form-select " aria-label="Default select example">
                        <option selected>Seleccione categoria</option>
                        <option value="1">Medicamentos</option>
                        <option value="2">Cuidado personal</option>
                        <option value="3">Cuidado de la piel</option>
                        </select>
                        <div class="form-group mt-3">
                            <label for="categoryName" class="control-label">
                                Precio
                            </label>
                            <input type="text" name="categoryName" class="form-control" id="categoryName">
                        </div>
                        <div class="form-group mt-3">
                            <label for="categoryName" class="control-label">
                                Existencia
                            </label>
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