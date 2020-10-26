<?PHP
	$tit = $_POST['titulo'];
	$ejem = $_POST['ejemplar'];
	$pag = $_POST['pagina'];
	$edi = $_POST['n_edicion'];
	$anno = $_POST['anno_edicion'];

	$slautor = $_POST['op_autor'];
	$sleditorial = $_POST['op_editorial'];

	include 'conexion.php';

	#captando datos de imagen
	$nomImagen = $_FILES["imagen"]["name"];
	$tipoImagen = $_FILES["imagen"]["type"];
 	$tamImagen = $_FILES["imagen"]["size"];
 	$rutaImagen = $_FILES["imagen"]["tmp_name"];

 	#captando datos de archivo
 	$nomArchivo = $_FILES["archivo"]["name"];
	$tipoArchivo = $_FILES["archivo"]["type"];
 	$tamaArchivo = $_FILES["archivo"]["size"];
 	$rutaArchivo = $_FILES["archivo"]["tmp_name"]; 
 	
 	#capturando id de autor
	$cap_autor = "SELECT * FROM AUTOR WHERE nom_autor='$slautor'";
	$cap = $conexion->query($cap_autor) or die (mysql_error());
	if ($row = $cap->fetch_array()) {
		$id_autor = $row['idAutor'];
	}
	#capturando id de editorial
	$cap_editorial = "SELECT * FROM EDITORIAL WHERE nom_editorial='$sleditorial'";
	$cap2 = $conexion->query($cap_editorial) or die (mysql_error());
	if ($row = $cap2->fetch_array()) {
		$id_editorial = $row['idEditorial'];
	}

	#Restringiendo algunos tipos que accepta el imagen
	if ($_FILES["imagen"]["error"] > 0) {
		echo '<script>alert("Error al cargar la imagen")</script>';
		echo"<script>location.href = 'gestionarDB.php'</script>";
	}else{
		$permitido_img = array("image/jpeg","image/png","image/gif");
		$limite_img = 4194304;

		if (in_array($tipoImagen, $permitido_img) && $tamImagen <= $limite_img * 1024) {
			$imagen=mysql_real_escape_string(file_get_contents($rutaImagen));
		}else{
			
			echo '<script>alert("Imagen no permitido o excede el tamaño de 4GB""'.$tamImagen.'")</script>';
			echo"<script>location.href = 'gestionarDB.php'</script>";
		}
	}

	#Restringiendo algunos tipos que accepta la archivo
	if ($_FILES["archivo"]["error"] > 0) {
		echo '<script>alert("Error al cargar la archivo")</script>';
		echo"<script>location.href = 'gestionarDB.php'</script>";
	}else{
		$permitido_arch = array("application/pdf");
		$limite_arch = 4194304;

		if (in_array($tipoArchivo, $permitido_arch) && $tamaArchivo <= $limite_arch * 1024) {
			$fp = fopen($rutaArchivo, "r");
			$archivo1 = fread($fp, filesize($rutaArchivo));
			$archivo = mysql_real_escape_string($archivo1);
			fclose($fp); 
		}else{
			echo '<script>alert("Archivo no permitido o excede el tamaño de 4GB")</script>';
			echo"<script>location.href = 'gestionarDB.php'</script>";
		}
	}


	$query = "SELECT * FROM LIBRO WHERE titulo='$tit' AND num_ejemplar='$ejem' AND num_paginas='$pag' AND edicion='$edi' AND anno='$anno'";
	$resul = $conexion->query($query) or die(mysql_error());

	if ($existe = $resul->fetch_object()) {
		echo '<script>alert("El Libro ya Existe")</script>';
		echo"<script>location.href = 'gestionarDB.php'</script>";
	}else{
		$insertar = "INSERT INTO LIBRO(titulo, materia, num_ejemplar, num_paginas, edicion, anno, disponible, descripcion, imagen, tipoimg, archivo, tipoarchivo, idAutor, idEditorial) VALUES('$tit', '$_POST[materia]', '$ejem', '$pag', '$edi' ,'$anno', '$_POST[op_tipo_libro]', '$_POST[descripcion]', '$imagen', '$tipoImagen','$archivo', '$tipoArchivo', '$id_autor', '$id_editorial')";
		$resul2 = $conexion->query($insertar) or die(mysql_error());

		if($resul2){
			echo'<script>alert("Libro Registrado con Exito")</script>';
			echo"<script>location.href = 'gestionarDB.php'</script>";
		}else{
			echo'<script>alert("Hubo un Error en el Regitro")</script>';
		}
	}
?>