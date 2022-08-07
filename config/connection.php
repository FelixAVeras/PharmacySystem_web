<?php

$connection = new mysql_connect('localhost', 'root', '', 'pharmacysystemdb');

if ($connection->connect_eror) {
	die('Conexion fallida: '. $connection->connect_eror);
}

?>