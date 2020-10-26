<?php 
    session_start();
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
	
		<div class="container">
			<aside>
				<div class="container-fluid row">
					<div class="col-md-12">
						<div role="tabpanel">
							<ul class="nav nav-tabs" role="tablist">
								<li role="presentation" class="active"><a href="#Usuarios" aria-controls="Usuarios" data-toggle="tab" role="tab">Usuarios</a></li>
								<li role="presentation"><a href="#Libros" aria-controls="Libros" data-toggle="tab" role="tab">Libros</a></li>
							</ul>
							<br>
							<div class="tab-content container-fluid" style="border-style: double; border-color: white; border-radius: 15px;">
								<!--Lista de usuarios-->
								<div class="tab-pane active" role="tabpanel" id="Usuarios">
									<form action="" class="navbar-form navbar-left" role="search">
										<div class="form-group">
											<div class="input-group">
												<input type="text" class="form-control" placeholder="Buscar Usuarios" name="busqueda_usuario" id="busqueda_usuario">
												<span class="input-group-btn">
											        <button class="btn btn-default" type="button"><i class="glyphicon glyphicon-search"></i></button>
											    </span>	
											</div>
										</div>	
									</form>
									<div class="navbar-form navbar-right">
										<div class="form-group">
											<button type="button" class="btn btn-info btn-block" id="Nuevo_Usuario" data-toggle="modal">Nuevo Usuario</button>	
										</div>
									</div>
									<br>
									<br><br>
									<div class="" id="resultado_usuario">
									</div>
								</div>

								<!--Lista de libros-->
								<div class="tab-pane" role="tabpanel" id="Libros">
									<form action="" class="navbar-form navbar-left" role="search">
										<div class="form-group">
											<div class="input-group">
												<input type="text" class="form-control" placeholder="Buscar Libros" name="busqueda_libros" id="busqueda_libros">
												<span class="input-group-btn">
											        <button class="btn btn-default" type="button"><i class="glyphicon glyphicon-search"></i></button>
											    </span>	
											</div>
										</div>
									</form>
									<div class="navbar-form navbar-right">
										<div class="form-group">
											<button type="button" class="btn btn-info btn-block" id="Nuevo_Libro" data-toggle="modal">Nuevo Libro</button>
										</div>
									</div>
									<br>
									<br><br>
									<div class="" id="resultado_libros">
									</div>		
								</div>
							</div>
							<br>
						</div>
					</div>
				</div>
			</aside>
		</div>

		<!--Agregar nuevo usuario-->
		<div class="modal fade" id="AgregarNuevoUsuario">
			<div class="modal-dialog modal-md">
				<div class="modal-content col-md-12">
					<div class="modal-header">
						<h4 class="modal-title"><i class='glyphicon glyphicon-user'></i> Nuevo Usuario</h4>
					</div>
					<div class="modal-body">
						<form action="registerUser.php" class="form-horizontal" method="POST">
							<div class="form-group">
								<label for="Codigo" class="control-label col-md-4">Codigo de Matricula:</label>
								<div class="col-md-8">
									<input type="text" class="form-control" name="codigo" placeholder="Codigo de Matricula" maxlength="10" minlength="10">
								</div>
							</div>
							<div class="form-group">
								<label for="dni" class="control-label col-md-4">DNI:</label>
								<div class="col-md-8">
									<input type="text" class="form-control" name="dni" placeholder="DNI" maxlength="8" minlength="8" required>
								</div>
							</div>
							<div class="form-group">
								<label for="nombres" class="control-label col-md-4">Nombres:</label>
								<div class="col-md-8">
									<input type="text" class="form-control" name="nombre" placeholder="Nombres" required>
								</div>
							</div>
							<div class="form-group">
								<label for="apellidos" class="control-label col-md-4">Apellidos:</label>
								<div class="col-md-8">
									<input type="text" class="form-control" name="apellido" placeholder="Apellidos" required>
								</div>
							</div>
							<div class="form-group">
								<label for="rol" class="control-label col-md-4">Rol:</label>
								<div class="col-md-8">
									<select class="form-control" name="op_rol" placeholder="Seleccione su Rol" required >
										<option value="" selected="selected">Seleccione su Rol</option>
				                    	<option>Usuario</option>
									</select>
								</div>
							</div>
							<div class="form-group">
								<label for="email" class="control-label col-md-4">Correo:</label>
								<div class="col-md-8">
									<input type="email" class="form-control" name="email" placeholder="Correo Electronico" required>
								</div>
							</div>
							<div class="form-group">
								<label for="contrasena" class="control-label col-md-4">Contraseña:</label>
								<div class="col-md-8">
									<input type="password" class="form-control" name="pw" placeholder="Contraseña" required>
								</div>
							</div>
							<div class="form-group">
								<label for="nacimiento" class="control-label col-md-4">Fecha de Nacimiento:</label>
								<div class="col-md-8">
									<input type="date" class="form-control" name="nacimiento" placeholder="Fecha de Nacimiento" required>
								</div>
							</div>
							<div class="form-group">
								<label for="sexo" class="control-label col-md-4">Sexo:</label>
								<div class="col-md-8">
									<select class="form-control" name="op_sexo" placeholder="Seleccione su Sexo" required >
										<option value="" selected="selected">Seleccione su Sexo</option>
				                    	<option>Masculino</option>
				                    	<option>Femenino</option>
									</select>
								</div>
							</div>
							<div class="form-group">
								<label for="direccion" class="control-label col-md-4">Dirección:</label>
								<div class="col-md-8">
									<input type="text" class="form-control" name="direccion" placeholder="Dirección" required>
								</div>
							</div>
							<div class="form-group">
								<label for="contacto" class="control-label col-md-4">Contacto:</label>
								<div class="col-md-8">
									<input type="number" class="form-control" name="contacto" placeholder="Numero de Celular" maxlength="9" minlength="9">
								</div>
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
								<button type="submit" class="btn btn-primary" id="Ingresar_Usuario">Registrar Usuario</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>

		<!--Agregar nuevo Libro-->
		<div class="modal fade" id="AgregarNuevoLibro" role="dialog">
			<div class="modal-dialog modal-md">
				<div class="modal-content col-md-12">
					<div class="modal-header">
						<h4 class="modal-title"><i class='glyphicon glyphicon-book'></i> Nuevo Libro</h4>
					</div>
					<div class="modal-body">
						<form class="form-horizontal" action="registerBook.php" method="POST" enctype="multipart/form-data">
							<div class="form-group">
								<label for="titulo" class="control-label col-md-4">Titulo:</label>
								<div class="col-md-8">
									<input type="text" class="form-control" name="titulo" placeholder="Titulo" required>
								</div>
							</div>
							<div class="form-group">
								<label for="materia" class="control-label col-md-4">Materia:</label>
								<div class="col-md-8">
									<input type="text" class="form-control" name="materia" placeholder="Materia">
								</div>
							</div>
							<div class="form-group">
								<label for="ejemplares" class="control-label col-md-4">N° de Ejemplares:</label>
								<div class="col-md-8">
									<input type="number" class="form-control" name="ejemplar" placeholder="Numero de Ejemplares" required>
								</div>
							</div>
							<div class="form-group">
								<label for="paginas" class="control-label col-md-4">N° de Paginas:</label>
								<div class="col-md-8">
									<input type="number" class="form-control" name="pagina" placeholder="Numero de Paginas" required>
								</div>
							</div>
							<div class="form-group">
								<label for="edicion" class="control-label col-md-4">N° de Edicion:</label>
								<div class="col-md-8">
									<input type="text" class="form-control" name="n_edicion" placeholder="N° de Edicion">
								</div>
							</div>
							<div class="form-group">
								<label for="anno_edicion" class="control-label col-md-4">Año de la Edicion:</label>
								<div class="col-md-8">
									<input type="number" class="form-control" name="anno_edicion" placeholder="Año de la Edicion" required>
								</div>
							</div>
							<div class="form-group">
								<label for="tipo_libro" class="control-label col-md-4">Tipo de Libro:</label>
								<div class="col-md-8">
									<select class="form-control" name="op_tipo_libro" placeholder="Seleccione el tipo de Libro" required>
										<option value="" selected="selected">Seleccione el Tipo de Libro</option>
				                    	<option>Fisico</option>
				                    	<option>Virtual</option>
				                    	<option>Fisico/Virtual</option>
									</select>
								</div>
							</div>
							<div class="form-group">
								<label for="descripcion" class="control-label col-md-4">Descripcion:</label>
								<div class="col-md-8">
									<textarea class="form-control" name="descripcion" placeholder="Descripcion del Libro"></textarea>
								</div>
							</div>
							<div class="form-group">
								<label for="Autor" class="control-label col-md-4">Autor:</label>
								<div class="col-md-8">
									<div class="input-group">
										<select class="form-control" name="op_autor" placeholder="Seleccione Autor" required>
				                        	<option value="" selected="selected">Seleccione Autor</option>
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
								<label for="editorial" class="control-label col-md-4">Editorial:</label>
								<div class="col-md-8">
									<div class="input-group">
										<select class="form-control" name="op_editorial" placeholder="Seleccione Editorial" required>
				                        	<option value="" selected="selected">Seleccione Editorial</option>
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
								<label for="imagen" class="control-label col-md-4">Imagen:</label>
								<div class="col-md-8">
									<input type="file" class="form-control" name="imagen" id="imagen" accept="image/*">
								</div>
							</div>
							<div class="form-group">
								<label for="archivo" class="control-label col-md-4">Archivo:</label>
								<div class="col-md-8">
									<input type="file" class="form-control" name="archivo" id="archivo" accept="application/pdf">
								</div>
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
								<button type="submit" class="btn btn-primary" id="Ingresar_Libro">Registrar Libro</button>
							</div>
						</form>
					</div>
				</div>
			</div>
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
			$(document).on('click', '#Nuevo_Usuario', function() {
			    $('#AgregarNuevoUsuario').modal('show');
			});

			$(document).on('click', '#Nuevo_Libro', function() {
			    $('#AgregarNuevoLibro').modal('show');
			});

			$(document).on('click', '#Agregar_Autor', function() {
			    $('#AgregarNuevoAutor').modal('show');
			});

			$(document).on('click', '#Agregar_Editorial', function() {
			    $('#AgregarNuevoEditorial').modal('show');
			});
		</script>	
	</body>
</html>