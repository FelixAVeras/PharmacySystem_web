<?php

require_once "./config/connection.php";

if (isset($_POST['query'])) {
  $query = "SELECT * FROM producto 
            WHERE productName 
            LIKE '%{$_POST['query']}%' LIMIT 100";

  $result = mysqli_query($connection, $query);
  if (mysqli_num_rows($result) > 0) {
    $output = "<ul class='searchBox'>";
    while ($res = mysqli_fetch_array($result)) {
      echo "<li class='productOption' id='".$res['productPrice']."'>". $res['productName'] ."</li>";
    }
    $output .= '</ul>';
  } else {
    echo "<div class='alert alert-danger mt-3 text-center' role='alert'>Sin Resultados</div>";
  }
  
  echo $output;
}

?>