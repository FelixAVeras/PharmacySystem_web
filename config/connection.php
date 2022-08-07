<?php

$connection = mysqli_connect('localhost', 'root', '', 'pharmacydb');

if ($connection->connect_error) {
	die('Conexion fallida: '. $connection->connect_error);
}
 
$connection->close();

?>