<?php
	session_start();
	$cod_se = $_SESSION['cod'];
	$dni_se = $_SESSION['dni'];

	$pass=strip_tags(sha1($_POST['pw']));
	include 'conexion.php';

	$query = "SELECT * FROM USUARIO WHERE cod_matricula = '$_POST[codigo]' AND dni = '$_POST[dni]' AND contrasena='$pass'";
	$resul = $conexion->query($query) or die(mysql_error());

	if ($existe = $resul->fetch_array()) {
		if ($cod_se == $existe['cod_matricula'] AND $dni_se == $existe['dni'] AND $pass == $existe['contrasena']) {

			$devolver = "UPDATE PRESTAMOLIBRO SET fecha_devolucion = now() WHERE idPrestamoL = '$_POST[id]'";
			$devolverexito = $conexion->query($devolver) or die(mysql_error());

			if ($devolverexito) {
				echo '<script>alert("Devolucion de Libro con Exito")</script>';
				echo "<script>window.location = 'gestionarBook.php'</script>";
			}else{
				echo'<script>alert("No puede Devolver Libro")</script>';
				echo "<script>window.location = 'windowAlum.php'</script>";
			}
		}else{
			echo'<script>alert("Usted no es el usuario que Inicio Sesion")</script>';
			echo "<script>window.location = 'index.php'</script>";
		}
	}else{
		echo'<script>alert("El Usuario no Exite: verifique su cuenta")</script>';
		echo "<script>window.location = 'index.php'</script>";
	}
?>