<?php

require_once "./config/connection.php";

if (isset($_POST['query'])) {
  $query = "SELECT * FROM producto 
            WHERE productName 
            LIKE '%{$_POST['query']}%' LIMIT 100";

  $result = mysqli_query($connection, $query);
  $output = "<ul class='searchBox'>";
  if (mysqli_num_rows($result) > 0) {
    while ($res = mysqli_fetch_array($result)) {
      echo "<li class='productOption' id='".$res['idProducto']."'>". $res['productName'] ."</li>";
    }
  } else {
    echo "<div class='alert alert-danger mt-3 text-center' role='alert'>Sin Resultados</div>";
  }
  $output .= '</ul>';

  echo $output;
}

?>