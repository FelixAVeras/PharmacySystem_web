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

<h3 class="my-5">Hola, <?php echo $_SESSION['username'] ?></h3>

<form method='post' action="">
    <input type="submit" value="Cerrar Sesion" name="btn_logout">
</form>