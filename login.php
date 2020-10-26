<?php 
	session_start();

	$usuario = $_POST['usuario'];
	$pass=strip_tags(sha1($_POST['pw']));

	include 'conexion.php';

	$query = "SELECT cod_matricula, dni, rol, contrasena FROM USUARIO WHERE cod_matricula='$usuario' OR dni='$usuario'";
	$resul = $conexion->query($query) or die(mysql_error());

	if($existe = $resul->fetch_array()){
		if($usuario == $existe['dni'] AND $existe['rol'] == "Administrador" AND $pass == $existe['contrasena']){

			$_SESSION['logged'] = "yes";
			$m = "SELECT * FROM USUARIO WHERE dni='$usuario'";
			$mostrar = $conexion->query($m) or die(mysql_error());
			if($reg=$mostrar->fetch_array()){
				$_SESSION['user'] = "".$reg['nombre']." ".$reg['apellido']."";
				$_SESSION['rol'] = $reg['rol'];
				$_SESSION['dni'] = $reg['dni'];
			}
			
			echo'<script>alert("Esta es tu Perfil Administrador")</script>';
			echo"<script>window.location = 'windowAdmin.php'</script>";
		}
		elseif ($usuario == $existe['cod_matricula'] AND $existe['rol'] == "Usuario" AND $pass == $existe['contrasena']) {
			$_SESSION['logged'] = "yes";
			$m="SELECT * FROM USUARIO WHERE cod_matricula='$usuario'";
			$mostrar = $conexion->query($m) or die(mysql_error());
			if($reg=$mostrar->fetch_array()){
				$_SESSION['user'] = "".$reg['nombre']."  ".$reg['apellido']."";
				$_SESSION['rol'] = $reg['rol'];
				$_SESSION['cod'] = $reg['cod_matricula'];
				$_SESSION['dni'] = $reg['dni'];
			}
			echo'<script>alert("Esta es tu Perfil Usuario")</script>';
			echo "<script>window.location='windowAlum.php'</script>";
		}
		else{
			echo'<script>alert("Usuario y Contraseña Incorrecta")</script>';
			echo "<script>window.location = 'index.php'</script>";
		}
	}
	else{
		echo'<script>alert("Usuario y Contraseña no Exite")</script>';
		echo "<script>window.location = 'index.php'</script>";
	}
	mysql_close($conexion);
 ?>