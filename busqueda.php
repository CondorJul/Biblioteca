<?PHP
	include 'conexion.php';

	$query =  "SELECT titulo, materia, num_paginas,  edicion, anno, descripcion, imagen, nom_autor, nom_editorial FROM (LIBRO INNER JOIN AUTOR ON libro.idAutor= autor.idAutor) INNER JOIN EDITORIAL ON libro.idEditorial= editorial.idEditorial";

	if (isset($_POST['general'])) {
		$q = $conexion->real_escape_string($_POST['general']);
		$query = "SELECT titulo, materia, num_paginas,  edicion, anno, descripcion, imagen, nom_autor, nom_editorial FROM (LIBRO INNER JOIN AUTOR ON libro.idAutor= autor.idAutor) INNER JOIN EDITORIAL ON libro.idEditorial= editorial.idEditorial WHERE titulo LIKE '%".$q."%' OR nom_autor LIKE '%".$q."%' OR nom_editorial LIKE '%".$q."%'";
	}

	$resul = $conexion->query($query) or die(mysql_error());

	if ($resul->num_rows > 0) {

		while ($fila = $resul->fetch_assoc()) { 

			$verdetalle = '<a onClick="return devolverDetalle();" href="#myModal" data-toggle="modal" data-toggle="tooltip" title="Ver Detalle"><i class="glyphicon glyphicon-picture"></i>Ver Detalle</a>';
			?>	
				<div class="cuadro_intro_hover " style="background-color:#cccccc;">
					<p style="text-align:center; margin-top:10px;">
						<img src="data:image/png;base64,<?php echo base64_encode($fila['imagen']); ?>" class="img-responsive" alt="" width="150" height="200"/>
					</p>
					<div class="caption">
						<div class="blur"></div>
						<div class="caption-text">
							<h4 style="border-top:1px solid white; border-bottom:1px solid white; padding:0px; font-size: 13px; color: yellow;"><?php echo $fila['titulo']; ?></h4>
							<p style="font-size: 12px; text-align: left; padding: 3px">
								Materia: <?php echo $fila['materia']; ?><br>
								Paginas: <?php echo $fila['num_paginas']; ?><br>
								N° de edicion: <?php echo $fila['edicion']; ?><br>
								Año de Edicion: <?php echo $fila['anno']; ?><br>
								Autor: <?php echo $fila['nom_autor']; ?><br>
								Editorial: <?php echo $fila['nom_editorial']; ?><br>
							</p>
							<a class=" btn btn-warning" href=""><span class="glyphicon glyphicon-save"></span></a>
						</div>
					</div>
				</div>
			<?php		
		}
	}else{
		?><div style="color:yellow;">El libro que busca no existe.....</div><?php
	}
	$conexion->close();
?>