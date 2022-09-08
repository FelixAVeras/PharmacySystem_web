<?php
require_once "./config/connection.php";
 
$categoryName = "";
$categoryName_err = "";
 
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $input_name = trim($_POST["categoryName"]);
    
    if (empty($input_name)) {
        $categoryName_err = "Por favor ingrese un nombre";
    } else{
        $categoryName = $input_name;
    }
    
    if (empty($categoryName_err)) {
        $sql = "INSERT INTO categoria (categoryName) VALUES (:categoryName)";

        if($stmt = $connection->prepare($sql)){

            $stmt->bindParam(":categoryName", $param_name);
            
            $param_name = $categoryName;

            if($stmt->execute()){
                header("location: categorias.php");
                exit();
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }
        }
        
        unset($stmt);
    }

    unset($connection);
}
?>