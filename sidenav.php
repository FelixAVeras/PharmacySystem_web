

<div class="sidebar-custom border-end " id="sidebar-wrapper">
    <div class="sidebar-heading border-bottom fw-bold fs-5"> 
         Pharmacy System
         <i class="bi bi-heart-pulse-fill text-white-50"></i>
        </div>
    <div class="list-custom list-group list-group-flush">
        <a class="list-group-item   p-3 " href="dashboard.php">
        <i class="bi bi-house-door fs-5"></i>  
        Inicio
        </a>
        <a class="list-group-item   p-3" data-bs-toggle="collapse" href="#collapseInventario" role="button" aria-expanded="false" aria-controls="collapseExample">
        <i class="bi bi-card-list fs-5"></i>
        Inventario <i class="bi bi-chevron-down float-end"></i>
        </a>
        <div class="collapse" id="collapseInventario">
            <div class="list-group">
            <a href="categorias.php" class="list-group-item  submenu">Categorias</a>
            <a href="productos.php" class="list-group-item  submenu ">Productos</a>
            </div>
        </div>
        <a class="list-group-item   p-3" data-bs-toggle="collapse" href="#collapseTienda">
        <i class="bi bi-shop fs-5"></i>
            Tienda <i class="bi bi-chevron-down float-end"></i></a>
        <div class="collapse" id="collapseTienda">
            <div class="list-group">
            <a href="caja.php" class="list-group-item  submenu">Caja</a>
            <a href="puntoVenta.php" class="list-group-item  submenu">Ventas</a>
            </div>
        </div>
        <a class="list-group-item list-group-item-action  p-3" href="#!">
        <i class="bi bi-clipboard-data fs-5"></i>
            Reportes
        </a>
        <a class="list-group-item   p-3" href="#!">
        <i class="bi bi-people fs-5"></i>
        Empleados
        </a>
    </div>
</div>