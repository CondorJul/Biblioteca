<?php 
    session_start();

	$consulta = Consultarlibro($_GET['id']);
	
	function ConsultarLibro($id){
		include 'conexion.php';
		$query = "SELECT * FROM (LIBRO INNER JOIN AUTOR ON LIBRO.idAutor=AUTOR.idAutor) INNER JOIN EDITORIAL ON LIBRO.idEditorial=EDITORIAL.idEditorial WHERE idLibro='".$id."'";
		$resul = $conexion->query($query) or die (mysql_error());

		$fila = $resul->fetch_assoc();

		return [
			$fila['idLibro'],
			$fila['titulo'],
			$fila['materia'],
			$fila['num_ejemplar'],
			$fila['num_paginas'],
			$fila['edicion'],
			$fila['anno'],
			$fila['disponible'],
			$fila['descripcion'],
			$fila['imagen'],
			$fila['archivo'],
			$fila['idAutor'],
			$fila['nom_autor'],
			$fila['nacionalidad'],
			$fila['idEditorial'],
			$fila['nom_editorial'],
			$fila['ciudad']	
		];
	}
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Biblioteca de sistemas</title>
		<link href="img/logotipo.ico" type="image/x-icon" rel="shortcut icon"/>
		<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
		<link rel="stylesheet" href="css/bootstrap.min.css">
		<link rel="stylesheet" href="css/estiloadmingestionDb.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
		<script src="js/mainUser.js"></script>
		<script src="js/mainBook.js"></script>
	</head>
	<body>
		<div class="container">
			<figure class="col-sm-12 col-md-12 col-lg-12 hidden-xs">
				<img src="img/portada.jpg" class="img-responsive center-block img-rounded">
			</figure>
		</div>
		<br>
		<div class="container">
			<header class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
				<nav class="navbar navbar-default">
					<div class="container-fluid">
						<div class="navbar-header">
							<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-1">
								<span class="sr-only">Menu</span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>
							<a href="windowadmin.php" class="navbar-brand">Biblioteca Virtual 2.0</a>
						</div>

						<div class="collapse navbar-collapse" id="navbar-1">
							<ul class="nav navbar-nav">
								<li><a href="gestionarDB.php">Gestionar Datos</a></li>
								<li><a href="myPerfil.php">Mi Perfil</a></li>
								<li><a href="#">Mensaje</a></li>
								<li><a href="#">Notificaciones</a></li>
							</ul>
							<ul class="nav navbar-nav navbar-right">
								<li class="dropdown">
									<a href="" class="dropdown-toggle" data-toggle="dropdown">
										<strong>
											<?php
							                    if($_SESSION['logged'] == "yes"){
							                    	echo "<font color='blue'>";
							                        echo $_SESSION['user'];
							                        echo "</font>";
							                    }
							                ?>
										</strong>
						            	<span class="caret"></span>
									</a>
									<ul class="dropdown-menu">
										<li><a href="#"><?php echo $_SESSION['rol']; ?></a></li>
										<li><a href="#">Cambiar Contraseña</a></li>
										<li><a href="index.php">Salir</a></li>
									</ul>
								</li>
							</ul>
						</div>
					</div>
				</nav>
			</header>
		</div>
		<br>
		<!--Editar datos de libro-->
		<div class="container">
			<aside class="col-sm-12 col-md-12 col-lg-12">
				<br>
				<div class="container-fluid" style="border-style: double; border-color: white; border-radius: 15px; color: yellow;">
					<br>
					<form class="form-horizontal" action="actualizarBook.php" method="POST" enctype="multipart/form-data">
						<h4 class="modal-title" style="text-align: center;"><i class='glyphicon glyphicon-book'></i> Editar Datos de Libro</h4>
						<hr>
						<div class="row">
							<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6" style="color: #ffae00">
								<h4><i class='glyphicon glyphicon-book'></i> Datos de Libro</h4>
								<hr>
								<div class="form-group">
									<label for="id" class="control-label col-md-4">Id:</label>
									<div class="col-md-8">
										<input type="number" class="form-control" name="idsl" placeholder="Identificador" value="<?php echo $consulta[0]?>" readonly>
									</div>
								</div>
								<div class="form-group">
									<label for="titulo" class="control-label col-md-4">Titulo:</label>
									<div class="col-md-8">
										<input type="text" class="form-control" name="titulosl" placeholder="Titulo" value="<?php echo $consulta[1]?>">
									</div>
								</div>
								<div class="form-group">
									<label for="materia" class="control-label col-md-4">Materia:</label>
									<div class="col-md-8">
										<input type="text" class="form-control" name="materiasl" placeholder="Materia" value="<?php echo $consulta[2]?>">
									</div>
								</div>
								<div class="form-group">
									<label for="ejemplares" class="control-label col-md-4">N° de Ejemplares:</label>
									<div class="col-md-8">
										<input type="number" class="form-control" name="ejemplarsl" placeholder="Numero de Ejemplares" value="<?php echo $consulta[3]?>">
									</div>
								</div>
								<div class="form-group">
									<label for="paginas" class="control-label col-md-4">N° de Paginas:</label>
									<div class="col-md-8">
										<input type="number" class="form-control" name="paginasl" placeholder="Numero de Paginas" value="<?php echo $consulta[4]?>">
									</div>
								</div>
								<div class="form-group">
									<label for="edicion" class="control-label col-md-4">N° de Edicion:</label>
									<div class="col-md-8">
										<input type="text" class="form-control" name="n_edicionsl" placeholder="N° de Edicion" value="<?php echo $consulta[5]?>">
									</div>
								</div>
								<div class="form-group">
									<label for="anno_edicion" class="control-label col-md-4">Año de la Edicion:</label>
									<div class="col-md-8">
										<input type="number" class="form-control" name="anno_edicionsl" placeholder="Año de la Edicion" value="<?php echo $consulta[6]?>">
									</div>
								</div>
								<div class="form-group">
									<label for="Dispobible" class="control-label col-md-4">Disponible:</label>
									<div class="col-md-8">
										<select class="form-control" name="disponiblesl">
											<option selected="selected"><?php echo $consulta[7]?></option>
								        	<option>Fisico</option>
								        	<option>Virtual</option>
								        	<option>Fisico/Virtual</option>
										</select>
									</div>
								</div>
								<div class="form-group">
									<label for="descripcion" class="control-label col-md-4">Descripcion:</label>
									<div class="col-md-8">
										<textarea class="form-control" name="descripcionsl" placeholder="Descripcion del Libro"><?php echo $consulta[8]?></textarea>
									</div>
								</div>
							</div>
							<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
								<div style="color: #49c7fc">
									<h4><i class='glyphicon glyphicon-user'></i> Datos de Autor</h4>
									<hr>
									<div class="form-group">
										<label for="id_autor" class="control-label col-md-4">Id:</label>
										<div class="col-md-8">
											<input type="number" class="form-control" name="id_autorsl" placeholder="Identificador" value="<?php echo $consulta[11]?>" disabled>
										</div>
									</div>
									<div class="form-group">
										<label for="Autor" class="control-label col-md-4">Nombre de Autor:</label>
										<div class="col-md-8">
											<div class="input-group">
												<select class="form-control" name="autorsl">
									            	<option selected="selected"><?php echo $consulta[12]?></option>
									            	<?php include 'listAutor.php'; ?>
												</select>
												<span class="input-group-btn">
													<button type="button" class="btn btn" id="Agregar_Autor">
														<span class="glyphicon glyphicon-plus"></span>
													</button>
												</span>
											</div>			
										</div>
									</div>
									<div class="form-group">
										<label for="nacionalidad" class="control-label col-md-4">Nacionalidad:</label>
										<div class="col-md-8">
											<input type="text" class="form-control" name="nacionalidadsl" placeholder="Nacionalidad" value="<?php echo $consulta[13]?>" disabled>
										</div>
									</div>
								</div>
								<br>
								<br>
								<br>
								<div style="color: #f60729">
									<h4><i class='glyphicon glyphicon-eur'></i> Datos de la Editorial</h4>
									<hr>
									<div class="form-group">
										<label for="id_edit" class="control-label col-md-4">Id:</label>
										<div class="col-md-8">
											<input type="number" class="form-control" name="id_editsl" placeholder="Identificador" value="<?php echo $consulta[14]?>" disabled>
										</div>
									</div>
									<div class="form-group">
										<label for="Editorial" class="control-label col-md-4">Nombre de Editorial:</label>
										<div class="col-md-8">
											<div class="input-group">
												<select class="form-control" name="editorialsl">
									            	<option selected="selected"><?php echo $consulta[15]?></option>
									            	<?php include 'listEditorial.php'; ?> 
												</select>
												<span class="input-group-btn">
													<button type="button" class="btn btn" id="Agregar_Editorial">
														<span class="glyphicon glyphicon-plus"></span>
													</button>
												</span>
											</div>			
										</div>
									</div>
									<div class="form-group">
										<label for="ciudad_edicion" class="control-label col-md-4">Ciudad de Edicion:</label>
										<div class="col-md-8">
											<input type="text" class="form-control" name="ciudad_edicionsl" placeholder="Ciudad de Edicion" value="<?php echo $consulta[16]?>" disabled>
										</div>
									</div>
								</div>
							</div>
						</div>
						<br><br>
						<div class="row" style="color: #07f607">
							<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
								<h4><i class='glyphicon glyphicon-picture'></i> Modificar Imagen</h4>
								<hr>
								<div class="form-group col-md-12">
									<input type="file" class="form-control" name="imagensl" id="imagen" accept="image/*">
								</div>
								<div class="" style="margin-left: 35%;">
									<img src="data:image/png;base64,<?php echo base64_encode($consulta[9]); ?>" width="150" height="200"/>
								</div>
							</div>
							<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
								<h4><i class='glyphicon glyphicon-folder-open'></i> Modificar Archivo</h4>
								<hr>
								<div class="form-group col-md-12">
									<input type="file" class="form-control" name="archivosl" id="archivo" accept="application/pdf">
								</div>
								<div class="form-group col-md-12">
									<iframe class="col-xs-12 col-sm-12 col-md-12 col-lg-12" src="data:application/pdf;base64,<?php echo base64_encode($consulta[10]); ?>" frameborder="0" width="490" height="200"></iframe>
								</div>
							</div>
						</div>
						<hr>
						<div class="text-center">
							<div class="form-group">
								<button type="button" class="btn btn-danger btn-responsive btninter" data-dismiss="" onclick ="location='gestionarDB.php'">Cancelar</button>
								<button type="submit" class="btn btn-success btn-responsive btninter right" id="editar_libro">Guardar</button>
							</div>
						</div>
						<br>
						<br>
					</form>
				</div>
				<br>
			</aside>
		</div>
		
		<!--Agregar un nuevo autor-->
		<div class="modal fade" id="AgregarNuevoAutor" role="dialog">
			<div class="modal-dialog modal-sm">
				<div class="modal-content col-ms-12">
					<div class="modal-header">
						<h4 class="modal-title"><i class='glyphicon glyphicon-user'></i> Nuevo Autor</h4>
					</div>
					<div class="modal-body">
						<form action="registerAutor.php" class="form-horizontal" method="POST">
							<div class="form-group">
								<label for="mon_autor" class="control-label col-sm-4">Nombre:</label>
								<div class="col-sm-8">
									<input type="text" class="form-control" name="nom_autor" placeholder="Nombre del Autor" required>
								</div>
							</div>
							<div class="form-group">
								<label for="nacionalidad" class="control-label col-sm-4">Nacionalidad:</label>
								<div class="col-sm-8">
									<input type="text" class="form-control" name="nacionalidad" placeholder="Nacionalidad" required>
								</div>
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
								<button type="submit" class="btn btn-primary" id="Ingresar_Autor">Guardar</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>

		<!--Agregar nuevo Editorial-->
		<div class="modal fade" id="AgregarNuevoEditorial" role="dialog">
			<div class="modal-dialog modal-md">
				<div class="modal-content col-md-12">
					<div class="modal-header">
						<h4 class="modal-title"><i class='glyphicon glyphicon-eur'></i> Nuevo Editorial</h4>
					</div>
					<div class="modal-body">
						<form class="form-horizontal" action="registerEditorial.php" method="POST">
							<div class="form-group">
								<label for="nom_edit" class="control-label col-md-4">Nombre de Editorial:</label>
								<div class="col-md-8">
									<input type="text" class="form-control" name="nom_editorial" placeholder="Nombre del Editorial" required>
								</div>
							</div>
							<div class="form-group">
								<label for="ciudad_edicion" class="control-label col-md-4">Ciudad de Edicion:</label>
								<div class="col-md-8">
									<input type="text" class="form-control" name="ciudad_edicion" placeholder="Ciudad de Edicion" required>
								</div>
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
								<button type="submit" class="btn btn-primary" id="Ingresar_editorial">Guardar</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>

		<script src="js/jquery-3.2.1.min.js" type="text/javascript"></script>
		<script src="js/bootstrap.min.js"></script>
		
		<script type="text/javascript">
			$(document).on('click', '#Agregar_Autor', function() {
			    $('#AgregarNuevoAutor').modal('show');
			});

			$(document).on('click', '#Agregar_Editorial', function() {
			    $('#AgregarNuevoEditorial').modal('show');
			});
		</script>
	</body>
</html>