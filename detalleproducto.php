<?php
require_once "./config/connection.php";

// $productName = trim($_POST['productName']);
// $productDescription = trim($_POST['productDescription']);
// $productCode = trim($_POST['productCode']);
// $productCategory = trim($_POST['productCategory']);
// $productPrice = trim($_POST['productPrice']);
$productId = trim($_POST['idProducto']);

$query = "SELECT *, categoria.categoryName
FROM producto 
INNER JOIN categoria 
ON producto.productCategory = categoria.idCategoria
WHERE producto.idProducto = $productId";

if ($connection->query($query)) { 
  echo "Funciona";
} else {
  echo "Oops! Something went wrong. Please try again later.";
}

?>