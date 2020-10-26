<?PHP
	include 'conexion.php';

	$salida = "";
	$query =  "SELECT * FROM USUARIO WHERE rol='Usuario' ORDER BY cod_matricula";

	if (isset($_POST['usuario'])) {
		$q = $conexion->real_escape_string($_POST['usuario']);
		$query = "SELECT * FROM USUARIO
		WHERE rol='Usuario' AND (cod_matricula LIKE '%".$q."%' OR dni LIKE '%".$q."%' OR nombre LIKE '%".$q."%' OR apellido LIKE '%".$q."%')";
	}

	$resul = $conexion->query($query);

	if ($resul->num_rows > 0) {
		$salida.='
		<div class="table-responsive">
			<table class="table table-bordered table-condensed" style="color:black; font-size: 13px;">
				<tr class="info">
					<th class="text-center">Codigo</th>
					<th class="text-center">DNI</th>
					<th class="text-center">Nombres</th>
					<th class="text-center">Apellidos</th>
					<th class="text-center">Rol</th>
					<th class="text-center">Correo</th>
					<th class="text-center">Nacimiento</th>
					<th class="text-center">Sexo</th>
					<th class="text-center">Direccion</th>
					<th class="text-center">Contacto</th>
					<th class="text-center" colspan="2">Opciones</th>
				</tr>';

		while ($fila = $resul->fetch_assoc()) {

			$editar = '<a href="EditarUser.php?codigo='.$fila['cod_matricula'].'" data-toggle="tooltip" title="Editar Usuario"><i class="glyphicon glyphicon-edit"></i></a>';
			$eliminar = '<a onClick="return confirmDel();" href="eliminarUser.php?codigo='.$fila['cod_matricula'].'&dni='.$fila['dni'].'" data-toggle="tooltip" title="Eliminar"><i class="glyphicon glyphicon-remove"></i></a>';

			$salida.='<tr align="center" style="color:yellow; font-size:12px;">
						<td>'.$fila['cod_matricula'].'</td>
						<td>'.$fila['dni'].'</td>
						<td>'.$fila['nombre'].'</td>
						<td>'.$fila['apellido'].'</td>
						<td>'.$fila['rol'].'</td>
						<td>'.$fila['email'].'</td>
						<td>'.$fila['fech_nacimiento'].'</td>
						<td>'.$fila['sexo'].'</td>
						<td>'.$fila['direccion'].'</td>
						<td>'.$fila['celular'].'</td>
						<td>'.$editar.'</td>
						<td>'.$eliminar.'</td>
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
	function confirmDel(){
  		var del=confirm("¿Desea eliminar este registro? ");
  		if (del){
  			return true;
  		}else{
  			return false;
  		}
	}
</script>