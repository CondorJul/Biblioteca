<?php
	include 'conexion.php';
 	$query = "SELECT archivo, tipoarchivo FROM LIBRO WHERE idLibro=".$_GET['id']."";
 	$resul = $conexion->query($query) or die(mysql_error());

 	if ($row = $resul->fetch_array()) {
		$contenido = $row['archivo'];
		$tipo = $row['tipoarchivo'];
	}

 	header("Content-type: $tipo");
 	echo $contenido;
?>