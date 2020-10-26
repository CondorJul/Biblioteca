<?php
	session_start();
	$cod_se = $_SESSION['cod'];
	$dni_se = $_SESSION['dni'];
	include 'conexion.php';
	#capturado id de usuario que inicia sesion
	$consultar_user = "SELECT idUsuario FROM USUARIO WHERE cod_matricula='$cod_se' AND dni='$dni_se'";
	$resultado = $conexion->query($consultar_user) or die(mysql_error());

	if($row = $resultado->fetch_array()){
		$idU = $row['idUsuario'];
	}

	$salida = "";
	$query = "SELECT idPrestamoL, titulo, materia, num_paginas,  edicion, anno, fecha_inicio, fecha_fin, fecha_devolucion FROM LIBRO INNER JOIN PRESTAMOLIBRO ON libro.idLibro = prestamolibro.idLibro WHERE prestamolibro.idUsuario='$idU' ORDER BY idPrestamoL";

	$resul = $conexion->query($query) or die(mysql_error());

	if ($resul->num_rows > 0) {
		$salida.='
		<div class="table-responsive">
			<table class="table table-bordered table-condensed" style="color:black; font-size: 13px;">
				<tr class="info">
					<th class="text-center">Id Prestamo</th>
					<th class="text-center">Titulo</th>
					<th class="text-center">Materia</th>
					<th class="text-center">Págs</th>
					<th class="text-center">Ed.</th>
					<th class="text-center">Año</th>
					<th class="text-center">Fecha Prestamo</th>
					<th class="text-center">Fecha Fin Prestamo</th>
					<th class="text-center">Fecha de Devolucion</th>
					<th class="text-center" colspan="2">Opciones</th>
				</tr>';

		while ($fila = $resul->fetch_assoc()) {

			$devolver = '<a onClick="return confirmDevolucion('.$fila['idPrestamoL'].');" href="#devolucionModal" data-toggle="modal" data-toggle="tooltip" title="Devolver Libro"><i class="glyphicon glyphicon-list-alt"></i></a>';

			$salida.='<tr align="center" style="color:yellow; font-size:12px;">
						<td>'.$fila['idPrestamoL'].'</td>
						<td>'.$fila['titulo'].'</td>
						<td>'.$fila['materia'].'</td>
						<td>'.$fila['num_paginas'].'</td>
						<td>'.$fila['edicion'].'</td>
						<td>'.$fila['anno'].'</td>
						<td>'.$fila['fecha_inicio'].'</td>
						<td>'.$fila['fecha_fin'].'</td>
						<td>'.$fila['fecha_devolucion'].'</td>
						<td>'.$devolver.'</td>
					</tr>';
		}

		$salida.="</table></div>";
	}else{
		$salida.='<div style="color:yellow;">No ha realizado ningun Prestamo de Libro...</div>';
	}

	echo $salida;
	$conexion->close();
?>
<script>
	function confirmDevolucion(devolucion){
  		$.ajax({
		url: 'datosDevolucion.php',
		type: 'GET',
		datatype: 'html',
		data: {devolucion: devolucion},
		})
		.done(function(resultado) {
			$("#devolucionModal").html(resultado);
		})
	}
</script>
<div class="modal overlay" id="devolucionModal" role="dialog">
</div>