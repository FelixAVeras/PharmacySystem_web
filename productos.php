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
            <button type="button" class="btn btnAgregar text-white" data-bs-toggle="modal" data-bs-target="#addProductModal">
                Agregar producto
                <i class="bi bi-plus-lg"></i>
            </button>
            <div class="input-group mb-3 mt-3">
                <input type="text" class="form-control" placeholder="Buscar producto"
                 aria-label="Recipient's username" aria-describedby="button-addon2">
                <button class="btn btn-outline-secondary btn-buscar border-0 text-white" type="button" id="button-addon2">
                    <i class="bi bi-search"></i>
                </button>
            </div>

            <?php 

            $query = "SELECT *, categoria.categoryName
                      FROM producto 
                      INNER JOIN categoria 
                      ON producto.productCategory = categoria.idCategoria";

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
                <th scope="row"><?php echo $row['productCode']; ?></th>
                <td><?php echo $row['productName']; ?></td>
                <td><?php echo $row['categoryName']; ?></td>
                <td>$<?php echo $row['productPrice']; ?></td>
                <td><?php echo $row['productStock']; ?></td>
                <td>
                    
                    <button onclick="detailProduct(<?php echo $row['idProducto']; ?>)" class="btn-detalles mx-2 border-0">
                        <i class="bi bi-eye-fill"></i>
                    </button>
                    <button onclick="editProduct(<?php echo $row['idProducto']; ?>)" class="btn-editar mx-2 border-0">
                        <i class="bi bi-pencil-fill"></i>
                    </button>
                    <button id="btnDelete" data-id="<?php echo $row['idProducto']; ?>" class="btn-delete border-0">
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

<?php include('Modals/ProductoModal/DetailsProductoModal.php'); ?>
<?php include('Modals/ProductoModal/AddProductoModal.php'); ?>
<?php include('Modals/ProductoModal/EditProductoModal.php'); ?>

<?php include ("footerLinks.php"); ?>

<script src="js/productos.js"></script>

</body>
</html>