<?php  
  require('../config/connection.php');

  session_start();

  if(isset($_POST['email']) && isset($_POST['contrasenaad'])){

    $errorLogin = "";

    $username = $_POST['email'];
    $password   = $_POST['password'];
    
    $consulLogin = "SELECT * FROM usuario 
          WHERE email = :usuario 
          AND password = :password AND estado = 1";
    
    $db = $connection->prepare($consulLogin);
    $db->bindValue(":email", $username, PDO::PARAM_STR);
    $db->bindValue(":password", $password, PDO::PARAM_STR);
    $db->execute();

    $filas = $db->rowCount();
    $rs = $db->fetch(PDO::FETCH_OBJ); 

    if( $filas > 0 ){
      $_SESSION["email"]  = $rs->email;
      
      $_SESSION["idusuario"] = $rs->idusuario;
      $_SESSION["nombre"]    = $rs->nombre;
      $_SESSION["apellidos"] = $rs->apellidos;
      $_SESSION["idnivel"]   = $rs->idnivel;

      header("location: ../dashboard.php");
    } else { 
        header("location: ../login.php?m=1"); 
      }
    } else { 
      header("location: ../login.php"); 
    }
?>