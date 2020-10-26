<?php
	include 'conexion.php';
	$query = "DELETE FROM USUARIO WHERE cod_matricula='$_GET[codigo]' AND dni='$_GET[dni]'";
	$resul = $conexion->query($query) or die(mysql_error());

	if ($resul) {
		header("location: gestionarDB.php");
	}	
?>