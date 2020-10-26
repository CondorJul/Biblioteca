<?php 
    session_start();

	$consulta = ConsultarUsuario($_GET['codigo']);
	
	function ConsultarUsuario($codigo){
		include 'conexion.php';
		$query = "SELECT * FROM USUARIO WHERE cod_matricula='".$codigo."'";
		$resul = $conexion->query($query) or die (mysql_error());

		$fila = $resul->fetch_assoc();

		return [
			$fila['idUsuario'],
			$fila['cod_matricula'],
			$fila['dni'],
			$fila['nombre'],
			$fila['apellido'],
			$fila['rol'],
			$fila['email'],
			$fila['contrasena'],
			$fila['fech_nacimiento'],
			$fila['sexo'],
			$fila['direccion'],
			$fila['celular']	
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
								<li><a href="#">Mi Perfil</a></li>
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
			<aside class="col-sm-12 col-md-12 col-lg-12">
				<div class="container-fluid">
					<br>
					<form action="actualizarUser.php" class="form-horizontal col-md-8 col-md-offset-2" method="POST" style="border-style: double; border-color: white; border-radius: 15px; color: yellow;">
						<div class="modal-header">
							<h4 class="modal-title"><i class='glyphicon glyphicon-user'></i> Editar Usuario</h4>
						</div>
						<div class="modal-body">
							<div class="form-group">
								<label for="id" class="control-label col-md-4">ID</label>
								<div class="col-md-8">
									<input type="number" class="form-control" name="idsele" placeholder="Identificador" value="<?php echo $consulta[0]?>" readonly>
								</div>
							</div>
							<div class="form-group">
								<label for="Codigo" class="control-label col-md-4">Codigo de Matricula:</label>
								<div class="col-md-8">
									<input type="text" class="form-control" name="codigosele" placeholder="Codigo de Matricula" maxlength="10" minlength="10" value="<?php echo $consulta[1]?>">
								</div>
							</div>
							<div class="form-group">
								<label for="dni" class="control-label col-md-4">DNI:</label>
								<div class="col-md-8">
									<input type="text" class="form-control" name="dnisele" placeholder="DNI" maxlength="8" minlength="8" required value="<?php echo $consulta[2];?>">
								</div>
							</div>
							<div class="form-group">
								<label for="nombres" class="control-label col-md-4">Nombres:</label>
								<div class="col-md-8">
									<input type="text" class="form-control" name="nombresele" placeholder="Nombres" value="<?php echo $consulta[3]?>">
								</div>
							</div>
							<div class="form-group">
								<label for="apellidos" class="control-label col-md-4">Apellidos:</label>
								<div class="col-md-8">
									<input type="text" class="form-control" name="apellidosele" placeholder="Apellidos" value="<?php echo $consulta[4]?>">
								</div>
							</div>
							<div class="form-group">
								<label for="rol" class="control-label col-md-4">Rol:</label>
								<div class="col-md-8">
									<input type="text" class="form-control" name="rolsele" placeholder="Rol" value="<?php echo $consulta[5]?>" readonly>
								</div>
							</div>
							<div class="form-group">
								<label for="email" class="control-label col-md-4">Correo:</label>
								<div class="col-md-8">
									<input type="email" class="form-control" name="emailsele" placeholder="Correo Electronico" value="<?php echo $consulta[6]?>">
								</div>
							</div>
							<div class="form-group">
								<label for="contrasena" class="control-label col-md-4">Contraseña:</label>
								<div class="col-md-8">
									<input type="password" class="form-control" name="pwsele" placeholder="Contraseña" value="" disabled>
								</div>
							</div>
							<div class="form-group">
								<label for="nacimiento" class="control-label col-md-4">Fecha de Nacimiento:</label>
								<div class="col-md-8">
									<input type="date" class="form-control" name="nacimientosele" placeholder="Fecha de Nacimiento" value="<?php echo $consulta[8]?>">
								</div>
							</div>
							<div class="form-group">
								<label for="sexo" class="control-label col-md-4">Sexo:</label>
								<div class="col-md-8">
									<input type="text" class="form-control" name="sexosele" placeholder="sexo" value="<?php echo $consulta[9]?>" readonly>
								</div>
							</div>
							<div class="form-group">
								<label for="direccion" class="control-label col-md-4">Dirección:</label>
								<div class="col-md-8">
									<input type="text" class="form-control" name="direccionsele" placeholder="Dirección" value="<?php echo $consulta[10]?>">
								</div>
							</div>
							<div class="form-group">
								<label for="contacto" class="control-label col-md-4">Contacto:</label>
								<div class="col-md-8">
									<input type="number" class="form-control" name="contactosele" placeholder="Numero de Celular" maxlength="9" minlength="9" value="<?php echo $consulta[11]?>">
								</div>
							</div>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-danger" data-dismiss="" onclick ="location='gestionarDB.php'">Cancelar</button>
							<button type="submit" class="btn btn-success" id="editar_usuario">Guardar</button>
						</div>
					</form>
				</div>
			</aside>
		</div>
		
		<script src="js/jquery-3.2.1.min.js" type="text/javascript"></script>
		<script src="js/bootstrap.min.js"></script>
		
	</body>
</html>