<?PHP
	$slautor = $_POST['autorsl'];
	$sleditorial = $_POST['editorialsl'];

	include 'conexion.php'; 

	#captando datos de imagen
	$nomImagen = $_FILES["imagensl"]["name"];
	$tipoImagen = $_FILES["imagensl"]["type"];
 	$tamImagen = $_FILES["imagensl"]["size"];
 	$rutaImagen = $_FILES["imagensl"]["tmp_name"];

 	#captando datos de archivo
 	$nomArchivo = $_FILES["archivosl"]["name"];
	$tipoArchivo = $_FILES["archivosl"]["type"];
 	$tamaArchivo = $_FILES["archivosl"]["size"];
 	$rutaArchivo = $_FILES["archivosl"]["tmp_name"];

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

	#Restringiendo algunos tipos que accepta la archivo
	if ($_FILES["imagensl"]["error"] > 0) {
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
	if ($_FILES["archivosl"]["error"] > 0) {
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
	$actualizar = "UPDATE LIBRO SET titulo='$_POST[titulosl]', materia='$_POST[materiasl]', num_ejemplar='$_POST[ejemplarsl]', num_paginas='$_POST[paginasl]', edicion='$_POST[n_edicionsl]', anno='$_POST[anno_edicionsl]', disponible='$_POST[disponiblesl]', descripcion='$_POST[descripcionsl]', imagen='$imagen', tipoimg='$tipoImagen', archivo='$archivo', tipoarchivo='$tipoArchivo', idAutor='$id_autor', idEditorial='$id_editorial' WHERE idLibro='$_POST[idsl]' ";
	
	$resul2 = $conexion->query($actualizar) or die (mysql_error());

	if ($resul2) {
		echo'<script>alert("Libro Actualizado con Exito")</script>';
		echo"<script>location.href = 'gestionarDB.php'</script>";
	}else{
		echo'<script>alert("Hubo un Error en la Actualizacion")</script>';
	}
	
?>