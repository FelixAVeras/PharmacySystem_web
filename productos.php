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
                <input type="text" class="form-control" placeholder="Buscar producto"
                 aria-label="Recipient's username" aria-describedby="button-addon2">
                <button class="btn btn-outline-secondary btn-buscar border-0 text-white" type="button" id="button-addon2">
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
                <button class="btn-detalles mx-2 border-0">
                        <i class="bi bi-pencil-fill"></i>
                    </button>
                    <button class="btn-editar mx-2 border-0">
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
                <h4 class="modal-title titulo-modalDetalles fw-bold" id="exampleModalLabel">Nuevo Producto</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            
            <div class="modal-body">
                <form action="" method="post" class="formProductos">
                    <div class="row">
                        <div class="col-12 col-md-3">
                            <div class="form-group">
                                <label for="productCode" class="control-label">
                                    Código 
                                </label>
                                <input type="text" name="productCode" class="form-control" id="productCode">
                            </div>
                        </div>
                        <div class="col-12 col-md-9">
                            <div class="form-group">
                                <label for="productName" class="control-label">
                                    Nombre del producto
                                </label>
                                <input type="text" name="productName" class="form-control" id="productName">
                            </div>
                        </div>
                    </div>
                    <div class="row mt-3 mb-3">
                        <div class="col-12 col-md-6">
                            <div class="form-group">
                                <label for="" class="control-label">Imagen del Producto</label>
                                <input type="file" name="" id="fileInput" class="form-control" onchange="imagePreview(event)">
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <img src="" alt="" id="preview" class="imagePrev">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="productCategory" class="control-label mt-3">Seleccione categoria</label>

                        <select class="form-select" name="productCategory" id="productCategory">
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
                        <label for="productDescription" class="control-label">Descripción (Opcional)</label>
                        <textarea name="productDescription" id="productDescription" class="form-control custom-textarea"></textarea>
                    </div>

                    <div class="row">
                        <div class="col-12 col-md-6">
                            <div class="form-group mt-3">
                                <label for="productPrice" class="control-label">
                                    Precio
                                </label>
                                <input type="text" name="productPrice" class="form-control" id="productPrice">
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="form-group mt-3">
                                <label for="productStock" class="control-label">
                                    Existencia
                                </label>
                                <input type="text" name="productStock" class="form-control" id="productStock">
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="modal-footer">
                    <button type="button" class="btn btn-cancelarProductos" id="btnCancel" data-bs-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-guardarProductos" id="btnSubmit">Guardar Cambios</button>
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

<script type="text/javascript">
function imagePreview(e) {
    const reader = new FileReader();

    reader.readAsDataURL(e.target.files[0]);
    reader.onload = () => {
        const preview = document.getElementById('preview');
        preview.src = reader.result;
    }
}

document.getElementById('btnSubmit').addEventListener('click', function(e) {
    e.preventDefault();

    let productCode = document.getElementById('productCode').value;
    let productName = document.getElementById('productName').value;
    let productCategory = document.getElementById('productCategory');
    let productPrice = document.getElementById('productPrice').value;
    let productStock = document.getElementById('productStock').value;

    let modalAddProduct = document.getElementById('addCategoryModal');

    
    if (isNaN(productCode) || isNaN(productPrice) || isNaN(productStock)) {
        alert('Este campo solo admite valores numericos.');
        return false;
    }
    
    if (productCode == '' || productCode == null || productCode.length == 0) {
        alert('Debe asignar un codigo de producto.');
        return false;
    } 

    if (productName == '' || productName == null || productName.length == 0) {
        alert('El campo nombre de Producto esta vacio o es invalido.');
        return false;
    }
    
    if (productCategory.value == '' || productCategory.value == null) {
        alert('Debe elegir una categoria para este producto');
        return false;
    }

    if (productPrice == '' || productPrice == null || productPrice.length == 0) {
        alert('Debe asignar precio de venta a este producto.');
        return false;
    }

    if (productStock == '' || productStock == null || productStock.length == 0) {
        alert('Debe asignar una cantidad en almacen');
        return false;
    } 
});

</script>

</body>
</html>