<?PHP 
	include 'conexion.php';

	$query =  "SELECT imagen FROM lIBRO WHERE idLibro=".$_GET['imagen']."";
	$resul = $conexion->query($query) or die(mysql_error());

	$fila= $resul->fetch_assoc();

	?><img style="margin-left: 45%; margin-top: 15%;" src="data:image/png;base64,<?php echo base64_encode($fila['imagen']); ?>" width="150" height="200" /><?php;
?>