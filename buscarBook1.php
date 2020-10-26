<?PHP
	include 'conexion.php';

	$salida = "";
	$query =  "SELECT idLibro, titulo, materia, num_ejemplar, num_paginas,  edicion, anno, disponible, nom_autor, nom_editorial FROM (LIBRO INNER JOIN AUTOR ON libro.idAutor= autor.idAutor) INNER JOIN EDITORIAL ON libro.idEditorial= editorial.idEditorial ORDER BY IdLibro";

	if (isset($_POST['libro'])) {
		$q = $conexion->real_escape_string($_POST['libro']);
		$query = "SELECT idLibro, titulo, materia, num_ejemplar, num_paginas,  edicion, anno, disponible, nom_autor, nom_editorial FROM (LIBRO INNER JOIN AUTOR ON libro.idAutor= autor.idAutor) INNER JOIN EDITORIAL ON libro.idEditorial= editorial.idEditorial
		WHERE titulo LIKE '%".$q."%' OR materia LIKE '%".$q."%' OR anno LIKE '%".$q."%' OR nom_autor LIKE '%".$q."%' OR nom_editorial LIKE '%".$q."%'";
	}

	$resul = $conexion->query($query) or die(mysql_error());

	if ($resul->num_rows > 0) {
		$salida.='
		<div class="table-responsive">
			<table class="table table-bordered table-condensed" style="color:black; font-size: 13px;">
				<tr class="info">
					<th class="text-center">#</th>
					<th class="text-center">Titulo</th>
					<th class="text-center">Materia</th>
					<th class="text-center">Ej.</th>
					<th class="text-center">Págs</th>
					<th class="text-center">Ed.</th>
					<th class="text-center">Año</th>
					<th class="text-center">Disponible</th>
					<th class="text-center">Autor</th>
					<th class="text-center">Editorial</th>
					<th class="text-center" colspan="3">Opciones</th>
				</tr>';

		while ($fila = $resul->fetch_assoc()) {

			$prestar = '<a onClick="return confirmPrestamo('.$fila['idLibro'].');" href="#prestamoModal" data-toggle="modal" data-toggle="tooltip" title="Realizar Prestamo"><i class="glyphicon glyphicon-list-alt"></i></a>';
			$ver = '<a onClick="return devolverImagen('.$fila['idLibro'].');" href="#myModal" data-toggle="modal" data-toggle="tooltip" title="Ver Imagen"><i class="glyphicon glyphicon-picture"></i></a>';
			$descargar = '<a href="abrirArchivo.php?id='.$fila['idLibro'].'" data-toggle="tooltip" title="Descargar"><i class="glyphicon glyphicon-save"></i></a>';

			$salida.='<tr align="center" style="color:yellow; font-size:12px;">
						<td>'.$fila['idLibro'].'</td>
						<td>'.$fila['titulo'].'</td>
						<td>'.$fila['materia'].'</td>
						<td>'.$fila['num_ejemplar'].'</td>
						<td>'.$fila['num_paginas'].'</td>
						<td>'.$fila['edicion'].'</td>
						<td>'.$fila['anno'].'</td>
						<td>'.$fila['disponible'].'</td>
						<td>'.$fila['nom_autor'].'</td>
						<td>'.$fila['nom_editorial'].'</td>
						<td>'.$prestar.'</td>
						<td>'.$ver.'</td>
						<td>'.$descargar.'</td>
					</tr>';
		}

		$salida.="</table></div>";
	}else{
		$salida.='<div style="color:yellow;">No hay Registros ....</div>';
	}

	echo $salida;
	$conexion->close();
?>

<script>
	function devolverImagen(imagen){
  		$.ajax({
		url: 'buscarImagen.php',
		type: 'GET',
		datatype: 'html',
		data: {imagen: imagen},
		})
		.done(function(resultado) {
			$("#myModal").html(resultado);
		})
	}
	function confirmPrestamo(prestamo){
  		$.ajax({
		url: 'datosPrestamo.php',
		type: 'GET',
		datatype: 'html',
		data: {prestamo: prestamo},
		})
		.done(function(resultado) {
			$("#prestamoModal").html(resultado);
		})
	}
</script>
<div class="modal overlay" id="myModal" role="dialog">
</div>
<div class="modal overlay" id="prestamoModal" role="dialog">
</div>
