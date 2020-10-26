<?PHP
	include 'conexion.php';

	$query = "SELECT cod_matricula, dni, nombre, apellido, rol, email, fech_nacimiento, sexo, direccion, celular FROM USUARIO WHERE rol='Usuario'";
	$resul = $conexion->query($query);

	while ($reg = $resul->fetch_array()) {
		echo "<tr align='center' style='color:yellow; font-size:12px;'><td>".$reg['cod_matricula']."</td>";
		echo "<td>".$reg['dni']."</td>";
		echo "<td>".$reg['nombre']."</td>";
		echo "<td>".$reg['apellido']."</td>";
		echo "<td>".$reg['rol']."</td>";
		echo "<td>".$reg['email']."</td>";
		echo "<td>".$reg['fech_nacimiento']."</td>";
		echo "<td>".$reg['sexo']."</td>";
		echo "<td>".$reg['direccion']."</td>";
		echo "<td>".$reg['celular']."</td>";
		echo "<td><a href='#'><i class='glyphicon glyphicon-pencil'></i></a></td>
			<td><a href='#'><i class='glyphicon glyphicon-remove'></i></a></td></tr>";
	}
	
?>