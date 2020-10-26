<?php
	include 'conexion.php';
	$query = "DELETE FROM LIBRO WHERE idLibro='$_GET[id]'";
	$resul = $conexion->query($query);

	if ($resul) {
		header("location: gestionarDB.php");
	}	
?>