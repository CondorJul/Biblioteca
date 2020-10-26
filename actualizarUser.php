<?PHP
	$fo = $_POST['nacimientosele'];

	$fn = implode('-', array_reverse(explode('/', $fo)));

	include 'conexion.php';

	$query = "UPDATE USUARIO SET cod_matricula='$_POST[codigosele]', dni='$_POST[dnisele]', nombre='$_POST[nombresele]', apellido='$_POST[apellidosele]', rol='$_POST[rolsele]', email='$_POST[emailsele]', fech_nacimiento='$fn', sexo='$_POST[sexosele]', direccion='$_POST[direccionsele]', celular='$_POST[contactosele]' WHERE idUsuario='$_POST[idsele]'";
	$resul = $conexion->query($query) or die (mysql_error());

	if ($resul) {
		echo'<script>alert("Registro Actualizado con Exito")</script>';
	}else{
		echo'<script>alert("Hubo un Error en la Actualizacion")</script>';
	}
	echo "<script>window.location='gestionarDB.php'</script>";
?>