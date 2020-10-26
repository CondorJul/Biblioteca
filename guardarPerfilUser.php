<?php
	session_start();

	include 'conexion.php';

	$dni_se = $_SESSION['dni'];
	$fo = $_POST['nacimiento'];

	$fn = implode('-', array_reverse(explode('/', $fo)));

	$query = "UPDATE USUARIO SET nombre='$_POST[nombre]', apellido='$_POST[apellido]', email='$_POST[email]', fech_nacimiento='$fn', direccion='$_POST[direccion]', celular='$_POST[contacto]' WHERE dni='$dni_se'";
	$resul = $conexion->query($query) or die (mysql_error());

	if ($resul) {
		echo'<script>alert("Datos Actualizados")</script>';
	}else{
		echo'<script>alert("Hubo un Error en la Actualizacion")</script>';
	}
	echo "<script>window.location='gestionarBook.php'</script>";
?>