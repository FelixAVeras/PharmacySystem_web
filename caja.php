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
    <link rel="stylesheet" href="./assets/css/caja.css">

    
</head>
<body>
<div class="d-flex" id="wrapper">
    <?php include('sidenav.php') ?>
    <div id="page-content-wrapper">
        <?php include ("navbar.php"); ?>
        <div class="container-fluid">
            <h1 class="text-center fw-bold mb-3 mt-3">
                Caja
            </h1>
            <hr>
            <h4 class="ms-3 mb-5 nuevaVenta fw-normal">Nueva venta</h4>
            <div class="container  shadow-sm">
                <div class="row">
                    <div class="col-3">
                <div class="mb-3">
                <label for="fechaVenta" class="form-label">Fecha de venta</label>
                <input type="date" class="form-control" id="fechaVenta">
                </div>
                    </div>
                    <div class="col-6">
                    <div class="mb-3">
                <label for="cliente" class="form-label">Cliente</label>
                <input type="text" class="form-control" id="cliente">
                </div>
                    </div>
                    <div class="col-3">
                    <div class="mb-3">
                <label for="telefono" class="form-label">Telefono</label>
                <input type="text" class="form-control" id="telefono">
                </div>
                    </div>
                </div>
                <div class="row">
               <div class="col-4">
                    <label for="buscarProducto" class="form-label">Buscar producto</label>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="Buscar producto" autocomplete="off" id="inputBuscarProducto" aria-label="Recipient's username" aria-describedby="button-addon2">
                        <button class="btn btn-outline-secondary border-0 btn-buscar" type="button" id="buscarProducto">
                            <i class="bi bi-search"></i>
                        </button>
                    </div>
                    <div id="search_result" class="suggestions"></div>
                </div>
                <div class="col-3">
                <div class="mb-3">
                <label for="precio" class="form-label">Precio</label>
                <input type="text" class="form-control" id="precio">
                </div>
                </div>
                <div class="col-3">
                <div class="mb-3">
                <label for="cantidad" class="form-label">Cant.</label>
                <input type="text" class="form-control" id="cantidad">
                </div>
                 </div>
                 <div class="col-2">
                <div class="mb-3">
                <button type="button" class=" btn-agregar border-0 p-2 rounded-3">
                    Agregar
                </button>
                </div>
                 </div>
                 <div class="col-3">
                <div class="mb-3">
                <label for="Vendedor" class="form-label">Vendedor</label>
                <input type="text" class="form-control" id="vendedor">
                </div>
                 </div>
                </div>
                
                    <div class="d-flex mt-4 pb-4">
                <button type="button" class=" btn-facturar border-0 p-2 rounded-3 mx-4">
                Facturar
                </button>
                <button type="button" class=" btn-borrar border-0 p-2 rounded-3 ">
                    Borrar factura
                </button>
                    </div>
            </div>
            <div class="container">
            <table class="table">
        <thead>
            <tr>
            <th scope="col">Código</th>
            <th scope="col">Cant.</th>
            <th scope="col">Descripción</th>
            <th scope="col">Precio unit.</th>
            <th scope="col">Descuento</th>
            <th scope="col">Precio total</th>
            </tr>
        </thead>
        <tbody>
            <tr>
            <th scope="row">112</th>
            <td>5</td>
            <td>Dramidom</td>
            <td>5.00</td>
            <td>5%</td>
            <td>25.00</td>
            <td class="eliminarProducto">
            <i class="bi bi-x-circle"></i>
            </td>
            </tr>
            <tr>
            <th scope="row">232</th>
            <td>3</td>
            <td>Fendramin</td>
            <td>10</td>
            <td>10%</td>
            <td>100</td>
            <td class="eliminarProducto">
            <i class="bi bi-x-circle"></i>
            </td>
            </tr>
        </tbody>
        </table>
            </div>
        
        </div>
    </div>
</div>   



<?php include ("footerLinks.php"); ?>
<script src="./assets/js/caja.js"></script>
</body>
</html>