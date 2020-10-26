<?PHP
	$nom_edit = $_POST['nom_editorial'];
	$ciu_edi = $_POST['ciudad_edicion'];

	include 'conexion.php';

	$query = "SELECT * FROM EDITORIAL WHERE nom_editorial='$nom_edit' AND ciudad='$ciu_edi'";
	$resul = $conexion->query($query) or die ("Error en la consulta");

	if($existe = $resul->fetch_object()){
		echo '<script>alert("El Editorial ya Existe")</script>';
		echo"<script>location.href = 'gestionarDB.php'</script>";
	}
	else{
		$insertar = "INSERT INTO EDITORIAL(nom_editorial, ciudad) VALUES('$nom_edit', '$ciu_edi')";
		$resul = $conexion->query($insertar);

		if($resul){
			echo'<script>alert("Editorial Registrado con Exito")</script>';
			echo"<script>location.href = 'gestionarDB.php'</script>";
		}else{
			echo'<script>alert("Hubo un Error en el Regitro")</script>';
		}
	}
	mysql_close($conexion);
?>