<?PHP
	$nom_aut = $_POST['nom_autor'];
	$nacio = $_POST['nacionalidad'];

	include 'conexion.php';

	$query = "SELECT * FROM AUTOR WHERE nom_autor='$nom_aut' AND nacionalidad='$nacio'";
	$resul = $conexion->query($query) or die ("Error en la consulta");

	if($existe = $resul->fetch_object()){
		echo '<script>alert("El Autor ya Existe")</script>';
		echo"<script>location.href = 'gestionarDB.php'</script>";
	}
	else{
		$insertar = "INSERT INTO AUTOR(nom_autor, nacionalidad) VALUES('$nom_aut', '$nacio')";
		$resul = $conexion->query($insertar);

		if($resul){
			echo'<script>alert("Autor Registrado con Exito")</script>';
			echo"<script>location.href = 'gestionarDB.php'</script>";
		}else{
			echo'<script>alert("Hubo un Error en el Regitro")</script>';
		}
	}
	mysql_close($conexion);
?>