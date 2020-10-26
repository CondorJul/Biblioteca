<?php
	include 'servidor.php';
	$conexion = new mysqli($server, $username, $password, $database_name);
	if($conexion-> connect_error)
	{
		die('Error de Conexion'. $conexion-> connect_error);
	}
?>