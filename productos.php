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
            <button class="btn btn-outline-secondary btn-buscar border-0 text-white" type="button" id="button-addon2">
            <i class="bi bi-search"></i>
            </button>
            </div>

            <table class="table">
  <thead>
    <tr class="tittulo-table">
      <th scope="col">Código</th>
      <th scope="col">Nombre producto</th>
      <th scope="col">Categoria</th>
      <th scope="col">Precio</th>
      <th scope="col">Exixtencia</th>
    </tr>
  </thead>
  <tbody class="table-group-divider">
    <tr>
      <th scope="row">1223</th>
      <td>Dramidon</td>
      <td>Medicamentos</td>
      <td>123.33</td>
      <td class="">50</td>
      <td>
      <button class="btn-detalles border-0" data-bs-toggle="modal" data-bs-target="#modalDetalles">
      <i class="bi bi-eye"></i>
        </button>
      <button class="btn-editar mx-2 border-0">
      <i class="bi bi-pencil-fill"></i>
      </button>
      <button class="btn-delete border-0">
      <i class="bi bi-trash3"></i>
      </button>
      </td>
    </tr>
    <tr>
      <th scope="row">2202</th>
      <td>Nosotras Buenas Noches</td>
      <td>Cuidado intimo</td>
      <td>100.00</td>
      <td>12</td>
      <td>
      <button class="btn-detalles border-0">
      <i class="bi bi-eye"></i> 
    </button>
      <button class="btn-editar mx-2 border-0">
      <i class="bi bi-pencil-fill"></i>
      </button>
      <button class="btn-delete border-0">
      <i class="bi bi-trash3"></i>
      </button>
      </td>
    </tr>
    <tr>
      <th scope="row">3345</th>
      <td>Huggies Ultra Comfort</td>
      <td>Cuidado bebe</td>
      <td>355.00</td>
      <td>12</td>
      <td>
      <button class="btn-detalles border-0">
      <i class="bi bi-eye"></i>
        </button>
      <button class="btn-editar mx-2 border-0">
      <i class="bi bi-pencil-fill"></i>
      </button>
      <button class="btn-delete border-0">
      <i class="bi bi-trash3"></i>
      </button>
      </td>
    </tr>
    <tr>
      <th scope="row">3346</th>
      <td>Johnsons Talco 200Gr</td>
      <td>Cuidado bebe</td>
      <td>261.00</td>
      <td>10</td>
      <td>
      <button class="btn-detalles border-0">
      <i class="bi bi-eye"></i>
        </button>
      <button class="btn-editar mx-2 border-0">
      <i class="bi bi-pencil-fill"></i>
      </button>
      <button class="btn-delete border-0">
      <i class="bi bi-trash3"></i>
      </button>
      </td>
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
         <!-- Modal -->
        <div class="modal fade" id="modalDetalles" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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