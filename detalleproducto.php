<?php

include('config/connection.php');

$request = $_REQUEST;
$idProducto = $request['idProducto'];

$query = "SELECT *, categoria.categoryName
          FROM producto 
          INNER JOIN categoria 
          ON producto.productCategory = categoria.idCategoria
          WHERE producto.idProducto ='".$idProducto."'";
	
$results = $connection->query($query);
$row = $results->fetch_assoc();
$results->free_result();

echo json_encode($row);

function UpdateProduct() {
  $request = $_REQUEST;
	$id = $request['id'];
	$email = $request['email'];
	$first_name = $request['first_name'];
	$last_name = $request['last_name'];
	$address = $request['address'];

	$query = "UPDATE producto 
            SET email='".$email."', 
            first_name='".$first_name."', 
            last_name='".$last_name."', 
            address='".$address."' 
            WHERE id='".$id."'";

	if ($connection->query($query)) {
	  echo "Employee has been sucessfully updated.";
	} else {
	  return "Error: " . $query . "<br>" . $connection->error;
	}
}

// if (isset($_GET['idProducto'])) {
//   require_once "./config/connection.php";

//   $query = "SELECT *, categoria.categoryName
//             FROM producto 
//             INNER JOIN categoria 
//             ON producto.productCategory = categoria.idCategoria
//             WHERE producto.idProducto = '.$param_id.'";

//   if ($stmt = $connection->prepare($query)) {
//     $stmt->bind_param("i", $param_id);
//     $param_id = trim($_GET["idProducto"]);

//     if ($stmt->execute()) {
//       if ($stmt->num_rows == 1) {
//         $row = $result->fetch_array(MYSQLI_ASSOC);
//         json_encode($row);
//         $name = $row["productName"];
//       } else {
//         exit();
//       }
//     } else {
//       echo "Oops! Something went wrong. Please try again later.";
//     }
//   }

//   $stmt->close();
//   $connection->close();
// } else {
//   echo "Something wrong.";
//   exit();
// }

?>