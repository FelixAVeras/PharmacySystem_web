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
    <title>Pharmacy System - Productos</title>
    <?php include ("headerLinks.php"); ?>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/productos.css">
</head>
<body>
<div class="d-flex" id="wrapper">
    <?php include('sidenav.php') ?>
    <div id="page-content-wrapper">
        <?php include ("navbar.php"); ?>
        <div class="container-fluid">
            <h1 class="text-center mt-3">Productos</h1>
            <button type="button" class="btn btnAgregar text-white" data-bs-toggle="modal" data-bs-target="#addCategoryModal">
                Agregar producto
                <i class="bi bi-plus-lg"></i>
            </button>
            <div class="input-group mb-3 mt-3">
                <input type="text" class="form-control" placeholder="Buscar producto" aria-label="Recipient's username" aria-describedby="button-addon2">
                <button class="btn btn-outline-secondary" type="button" id="button-addon2">
                    <i class="bi bi-search"></i>
                </button>
            </div>

            <?php 

            $query = "SELECT * FROM producto";

            $statement = $connection->query($query);

            if ($statement->num_rows > 0) {
            ?>
            <table class="table table-hover table-stripped">
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

            <?php
                while($row = $statement->fetch_array()) {
            ?>
            <tr>
                <th scope="row">1</th>
                <td>Mark</td>
                <td>Otto</td>
                <td>@mdo</td>
                <td>@mdo</td>
                <td>
                    <button class="btn-editar mx-3 border-0">
                        <i class="bi bi-pencil-fill"></i>
                    </button>
                    <button class="btn-delete border-0">
                        <i class="bi bi-trash3"></i>
                    </button>
                </td>
            </tr>
            <?php
                }
            ?>
                </tbody>
            </table>
            <?php
            } else {
                echo '<h3 class="text-center text-danger">No hay <strong>Productos</strong> que mostrar</h3>';
            }

            ?>
        </div>
    </div>
</div>   

<div class="modal fade" id="addCategoryModal" data-bs-backdrop="static">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Nuevo Producto</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            
            <div class="modal-body">
                <form action="categoryController.php" method="post">
                    <div class="row">
                        <div class="col-12 col-md-3">
                            <div class="form-group">
                                <label for="productCode" class="control-label">
                                    Código 
                                </label>
                                <input type="text" name="productCode" class="form-control" id="categoryName">
                            </div>
                        </div>
                        <div class="col-12 col-md-9">
                            <div class="form-group">
                                <label for="productName" class="control-label">
                                    Nombre del producto
                                </label>
                                <input type="text" name="productName" class="form-control" id="categoryName">
                            </div>
                        </div>
                    </div>
                    

                    <div class="row mt-3 mb-3">
                        <div class="col-12 col-md-6">
                            <div class="form-group">
                                <label for="" class="control-label">Imagen del Producto</label>
                                <input type="file" name="" id="" class="form-control">
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <p class="text-muted text-center"><em>Preview de la imagen</em></p>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="categoryName" class="control-label mt-3">Seleccione categoria</label>

                        <select class="form-select" name="productCategory" aria-label="Default select example">
                            <option value="">--Seleccione categoria--</option>
                            <?php
                               $query = "SELECT * FROM categoria";

                                $statement = $connection->query($query);

                                if ($statement->num_rows > 0) {
                                    while($row = $statement->fetch_array()) {
                            ?>
                            
                            <option value="<?php echo $row['idCategoria']; ?>">
                                <?php echo $row['categoryName']; ?>
                            </option>
                                
                            <?php
                                }
                            }
                            ?>
                        </select>
                    </div> 
                    
                    <div class="form-group mt-3">
                        <label for="productDescription" class="control-label">Descripción</label>
                        <textarea name="productDescription" id="productDescription" class="form-control custom-textarea"></textarea>
                    </div>

                    <div class="row">
                        <div class="col-12 col-md-6">
                            <div class="form-group mt-3">
                                <label for="productPrice" class="control-label">
                                    Precio
                                </label>
                                <input type="text" name="productPrice" class="form-control" id="categoryName">
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="form-group mt-3">
                                <label for="productStock" class="control-label">
                                    Existencia
                                </label>
                                <input type="text" name="productStock" class="form-control" id="categoryName">
                            </div>
                        </div>
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
</div>

<div class="modal fade" id="modalDetalles" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title titulo-modalDetalles fw-bold" id="exampleModalLabel">Detalle productos</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="card border-0 m-auto" style="width: 18rem;">
                    <img src="img/dramidom.jpg" class="card-img-top" alt="...">
                </div>
                
                <div class="container mt-5">
                    <h5 class="titulo-producto fw-normal">Dramidom pastillas</h5>
                    <p class="fw-normal">
                    Some quick example text to build on the card title and make up the bulk of the card's content.
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Quia quisquam rem, 
                    sit fugit aperiam doloribus ut assumenda accusantium architecto est vitae natus soluta similique,
                     necessitatibus quibusdam, itaque perspiciatis rerum ab!
                    </p>
                </div>
            </div>
            <div class="modal-footer footer-detalles">
                <button type="button" class="btn" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<?php include ("footerLinks.php"); ?>

</body>
</html>