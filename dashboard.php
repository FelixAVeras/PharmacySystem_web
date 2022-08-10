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
include ("headerLinks.php"); 
?>
       
        <?php
    include ("navbar.php"); 
    ?>
      
    

<?php
include ("footerLinks.php"); 
?>