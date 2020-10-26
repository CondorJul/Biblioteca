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

			$consulta = "SELECT * FROM LIBRO WHERE idLibro = '$_POST[id]'";
			$resul2 = $conexion->query($consulta) or die(mysql_error());

			if ($existe2 = $resul2->fetch_array()) {
				if ($existe2['disponible'] == "Fisico" AND $existe2['num_ejemplar'] > 0 OR $existe2['disponible'] == "Fisico/Virtual"){

					$prestar = "INSERT INTO PRESTAMOLIBRO(fecha_fin, idUsuario, idLibro) values(date_add(curdate(), interval 5 day),'$existe[idUsuario]' , '$_POST[id]')";
					$prestamoexito = $conexion->query($prestar) or die(mysql_error());

					if ($prestamoexito) {
						echo '<script>alert("Prestamo realizado con Exito")</script>';
						echo "<script>window.location = 'gestionarBook.php'</script>";
					}else{
						echo'<script>alert("No puede Realizar Prestamo")</script>';
						echo "<script>window.location = 'windowAlum.php'</script>";
					}
				}else{
					echo'<script>alert("No hay ejemplares del Libro o El Libro disponible solo Virtual")</script>';
					echo "<script>window.location = 'gestionarBook.php'</script>";
				}
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