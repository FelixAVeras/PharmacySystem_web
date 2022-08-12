
        <link rel="stylesheet" href="./css/style.css">
        <link rel="stylesheet" href="./css/custom.css">


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
        <?php
        include ("./headerLinks.php"); 
        ?>



        <div class="d-flex" id="wrapper">
            <!-- Sidebar-->
            <div class="border-end bg-white" id="sidebar-wrapper">
                <div class="sidebar-heading border-bottom ">Pharmacy System</div>
                <div class="list-group list-group-flush">
                    <a class="list-group-item list-group-item-action list-group-item-light p-3" href="#!">Inicio</a>
                    <a class="list-group-item list-group-item-action list-group-item-light p-3" data-bs-toggle="collapse" href="#collapseInventario" role="button" aria-expanded="false" aria-controls="collapseExample">
                    Inventario <i class="bi bi-chevron-down float-end"></i>
                   </a>
                   <div class="collapse" id="collapseInventario">
                      <div class="list-group">
                        <a href="./inventario/categorias.php" class="list-group-item list-group-item-action">Categorias</a>
                        <a href="" class="list-group-item list-group-item-action">Productos</a>
                        <a href="" class="list-group-item list-group-item-action">Proveedores</a>
                      </div>
                    </div>
                    <a class="list-group-item list-group-item-action list-group-item-light p-3" data-bs-toggle="collapse" href="#collapseTienda">
                    <i class="bi bi-shop"></i>
                        Tienda <i class="bi bi-chevron-down float-end"></i></a>
                    <div class="collapse" id="collapseTienda">
                      <div class="list-group">
                        <a href="" class="list-group-item list-group-item-action">Ventas</a>
                        <a href="" class="list-group-item list-group-item-action">Punto de Ventas</a>
                      </div>
                    </div>
                    <a class="list-group-item list-group-item-action list-group-item-light p-3" href="#!">
                        Reportes
                    </a>
                    <a class="list-group-item list-group-item-action list-group-item-light p-3" href="#!">
                    <i class="bi bi-people-fill"></i>
                        Empleados
                    </a>
                </div>
            </div>
            <!-- Page content wrapper-->
            <div id="page-content-wrapper">
                <!-- Top navigation-->
                <nav class="navbar navbar-expand-lg navbar-light  border-bottom">
                    <div class="container-fluid">
                        <button class="btn btn-light" id="sidebarToggle"><i class="bi bi-list"></i></button>
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav ms-auto mt-2 mt-lg-0">
                                <li class="nav-item active"><a class="nav-link" href="#!">Home</a></li>
                                <li class="nav-item"><a class="nav-link" href="#!">Link</a></li>
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Dropdown</a>
                                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="#!">Action</a>
                                        <a class="dropdown-item" href="#!">Another action</a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="#!">
                                        <form method='post' action="">
                                        <input class=" border-0 bg-body" type="submit" value="Cerrar Sesion" name="btn_logout">
                                    </form>  
                                        </a>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </nav>
                <!-- Page content-->
                <div class="container-fluid">
               
                </div>
            </div>
          </div>


    <script>

    window.addEventListener('DOMContentLoaded', event => {

    // Toggle the side navigation
    const sidebarToggle = document.body.querySelector('#sidebarToggle');
    if (sidebarToggle) {
        // Uncomment Below to persist sidebar toggle between refreshes
        // if (localStorage.getItem('sb|sidebar-toggle') === 'true') {
        //     document.body.classList.toggle('sb-sidenav-toggled');
        // }
        sidebarToggle.addEventListener('click', event => {
            event.preventDefault();
            document.body.classList.toggle('sb-sidenav-toggled');
            localStorage.setItem('sb|sidebar-toggle', document.body.classList.contains('sb-sidenav-toggled'));
        });
    }

    });

    </script>

<?php
include ("./footerLinks.php"); 
?>