<?php


// $productName = trim($_POST['productName']);
// $productDescription = trim($_POST['productDescription']);
// $productCode = trim($_POST['productCode']);
// $productCategory = trim($_POST['productCategory']);
// $productPrice = trim($_POST['productPrice']);
// $productId = trim($_POST['idProducto']);

// var_dump($productId);

// $query = "SELECT *, categoria.categoryName
// FROM producto 
// INNER JOIN categoria 
// ON producto.productCategory = categoria.idCategoria
// WHERE producto.idProducto = $productId";

// if ($connection->query($query)) { 
//   echo "Funciona";
// } else {
//   echo "Oops! Something went wrong. Please try again later.";
// }

if (isset($_GET['idProducto'])) {
  require_once "./config/connection.php";

  $query = "SELECT *, categoria.categoryName
            FROM producto 
            INNER JOIN categoria 
            ON producto.productCategory = categoria.idCategoria
            WHERE producto.idProducto = ?";

  if ($stmt = $connection->prepare($query)) {
    $stmt->bind_param("i", $param_id);
    $param_id = trim($_GET["idProducto"]);

    if ($stmt->execute()) {
      if ($result->num_rows == 1) {
        $row = $result->fetch_array(MYSQLI_ASSOC);
        $name = $row["productName"];
      } else {
        exit();
      }
    } else {
      echo "Oops! Something went wrong. Please try again later.";
    }
  }

  $stmt->close();
  $connection->close();
} else {
  echo "Something wrong.";
  exit();
}

?>