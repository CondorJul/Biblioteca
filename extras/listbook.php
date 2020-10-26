<?PHP
	include 'conexion.php';

	$query = "SELECT idLibro, titulo, materia, num_ejemplar, num_paginas,  edicion, anno, nom_autor, nom_editorial FROM (LIBRO INNER JOIN AUTOR ON libro.idAutor= autor.idAutor) INNER JOIN EDITORIAL ON libro.idEditorial= editorial.idEditorial";
	$resul = $conexion->query($query);

	while ($reg = $resul->fetch_array()) {
		echo "<tr align='center' style='color:yellow'><td>".$reg['idLibro']."</td>";
		echo "<td>".$reg['titulo']."</td>";
		echo "<td>".$reg['materia']."</td>";
		echo "<td>".$reg['num_ejemplar']."</td>";
		echo "<td>".$reg['num_paginas']."</td>";
		echo "<td>".$reg['edicion']."</td>";
		echo "<td>".$reg['anno']."</td>";
		echo "<td>".$reg['nom_autor']."</td>";
		echo "<td>".$reg['nom_editorial']."</td>";
		echo "<td><a href='#'><i class='glyphicon glyphicon-pencil'></i></a></td>
			<td><a href='#'><i class='glyphicon glyphicon-remove'></i></a></td>
			<td><a href='#'><i class='glyphicon glyphicon-eye-open'></i></a></td></tr>";
	}
?>