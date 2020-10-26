<?php
	$codigo = $_POST['codigo'];
	$dni = $_POST['dni'];
	$pass = strip_tags(sha1($_POST['pw']));
	$fo = $_POST['nacimiento'];
	
	$fn = implode('-', array_reverse(explode('/', $fo)));

	include 'conexion.php';

	$query = "SELECT cod_matricula, dni FROM USUARIO WHERE cod_matricula='$codigo' OR dni='$dni'";
	$resul = $conexion->query($query) or die ("error en la consulta");

	if($existe = $resul->fetch_object()){
		echo'<script>alert("El Usuario ya Existe")</script>';
		echo"<script>location.href = 'gestionarDB.php'</script>";
	}
	else{
		$insertar = "INSERT INTO USUARIO(cod_matricula, dni, nombre, apellido, rol, email, contrasena, fech_nacimiento, sexo, direccion, celular) VALUES('$codigo','$dni','$_POST[nombre]','$_POST[apellido]', '$_POST[op_rol]', '$_POST[email]', '$pass', '$fn','$_POST[op_sexo]', '$_POST[direccion]', '$_POST[contacto]')";
		$resul = $conexion->query($insertar);

		if($resul){
			echo'<script>alert("Usuario Registrado con Exito")</script>';
			echo"<script>location.href = 'gestionarDB.php'</script>";
		}else{
			echo'<script>alert("Hubo un Error en el Regitro")</script>';	
		}
	}
	mysql_close($conexion);
?>