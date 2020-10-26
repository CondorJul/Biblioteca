<?php 
    session_start();

	$consulta = ConsultarUsuario($_SESSION['dni']);
	
	function ConsultarUsuario($dni){
		include 'conexion.php';
		$query = "SELECT * FROM USUARIO WHERE dni='".$dni."'";
		$resul = $conexion->query($query) or die (mysql_error());

		$fila = $resul->fetch_assoc();

		return [
			$fila['cod_matricula'],
			$fila['dni'],
			$fila['nombre'],
			$fila['apellido'],
			$fila['rol'],
			$fila['email'],
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
		<link rel="stylesheet" href="css/estylealumno.css">
		<link rel="stylesheet" type="text/css" href="engine1/style.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
		<script src="js/listBook.js"></script>
	</head>
	<body>
		<div class="container hidden-xs hidden-sm">
			<br>
			<div id="wowslider-container1">
		        <div class="ws_images">
		            <ul>
		                <li><img src="img/portada/porta1.jpg" alt="1" title="1" id="wows1_0"/></li>
		                <li><img src="img/portada/porta2.jpg" alt="2" title="2" id="wows1_1"/></li>
		            </ul>
		        </div>
		    </div>
		</div>
		<br>
		<div class="container">
			<header class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
				<nav class="navbar navbar-default">
					<div class="container-fluid">
						<div class="navbar-header">
							<button type="button" class="navbar-toggle collapsed collapsed-md" data-toggle="collapse" data-target="#navbar-1">
								<span class="sr-only">Menu</span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>
							<a href="windowAlum.php"><i style="border-radius: 50px; margin-left: -15px; "><img src="img/logovirtual.jpg"></i></a>
						</div>

						<div class="collapse navbar-collapse" id="navbar-1">
							<ul class="nav navbar-nav navbar-left">
								<li><a href="#">Quienes Somos</a></li>
								<li><a href="gestionarBook.php">Libros</a></li>
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
										<li><a href="myPerfilUser.php">Mi Perfil</a></li>
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
					<form action="guardarPerfilUser.php" name="formulario" class="form-horizontal col-md-8 col-md-offset-2" method="POST" style="border-style: double; border-color: white; border-radius: 15px; color: #49c7fc;">
						<br>
						<div class="form-group">
							<div class="col-md-11">
								<h4 class="modal-title" class="col-md-7"><i class='glyphicon glyphicon-user'></i> Edite su Perfil</h4>
							</div>
							<span class="group-btn">
								<input type="checkbox" onclick="activar()" name="box" data-toogle="tooltip" title="Editar Datos">
									<span class="glyphicon glyphicon-pencil"></span>
								</input>
							</span>
						</div>
						<hr>						
						<div class="form-group">
							<label for="Codigo" class="control-label col-md-3 col-md-offset-1"><p class="text-left">Codigo de Matricula:</p></label>
							<div class="col-md-8">
								<input type="text" class="form-control" name="codigo" placeholder="Codigo de Matricula" maxlength="10" minlength="10" value="<?php echo $consulta[0]?>" disabled>
							</div>
						</div>
						<div class="form-group">
							<label for="dni" class="control-label col-md-3 col-md-offset-1"><p class="text-left">DNI:</p></label>
							<div class="col-md-8">
								<input type="text" class="form-control" name="dni" maxlength="8" minlength="8" required value="<?php echo $consulta[1];?>" disabled>
							</div>
						</div>
						<div class="form-group">
							<label for="nombres" class="control-label col-md-3 col-md-offset-1"><p class="text-left">Nombres:</p></label>
							<div class="col-md-8">
								<input type="text" class="form-control" name="nombre" value="<?php echo $consulta[2]?>" readonly>
							</div>
						</div>
						<div class="form-group">
							<label for="apellidos" class="control-label col-md-3 col-md-offset-1"><p class="text-left">Apellidos:</p></label>
							<div class="col-md-8">
								<input type="text" class="form-control" name="apellido" value="<?php echo $consulta[3]?>" readonly>
							</div>
						</div>
						<div class="form-group">
							<label for="rol" class="control-label col-md-3 col-md-offset-1"><p class="text-left">Rol:</p></label>
							<div class="col-md-8">
								<input type="text" class="form-control" name="rol" value="<?php echo $consulta[4]?>" disabled>
							</div>
						</div>
						<div class="form-group">
							<label for="email" class="control-label col-md-3 col-md-offset-1"><p class="text-left">E-mail:</p></label>
							<div class="col-md-8">
								<input type="email" class="form-control" name="email" value="<?php echo $consulta[5]?>" readonly>
							</div>
						</div>
						<div class="form-group">
							<label for="nacimiento" class="control-label col-md-3 col-md-offset-1"><p class="text-left">Fecha de Nacimiento:</p></label>
							<div class="col-md-8">
								<input type="date" class="form-control" name="nacimiento" value="<?php echo $consulta[6]?>" readonly>
							</div>
						</div>
						<div class="form-group">
							<label for="sexo" class="control-label col-md-3 col-md-offset-1"><p class="text-left">Sexo:</p></label>
							<div class="col-md-8">
								<input type="text" class="form-control" name="sexo" value="<?php echo $consulta[7]?>" readonly>
							</div>
						</div>
						<div class="form-group">
							<label for="direccion" class="control-label col-md-3 col-md-offset-1"><p class="text-left">Direccion:</p></label>
							<div class="col-md-8">
								<input type="text" class="form-control" name="direccion" value="<?php echo $consulta[8]?>" readonly="readonly">
							</div>
						</div>
						<div class="form-group">
							<label for="contacto" class="control-label col-md-3 col-md-offset-1"><p class="text-left">Contacto:</p></label>
							<div class="col-md-8">
								<input type="number" class="form-control" name="contacto" value="<?php echo $consulta[9]?>" readonly>
							</div>
						</div>
						<hr>
						<div class="text-center">
							<div class="form-group">
								<button type="button" class="btn btn-danger btn-responsive btninter" data-dismiss="" onclick ="location='gestionarDB.php'">Cancelar</button>
								<button type="submit" class="btn btn-success btn-responsive btninter right" id="editar_usuario">Guardar</button>
							</div>
						</div>
					</form>
				</div>
			</aside>
		</div>
		
		<script src="js/jquery-3.2.1.min.js" type="text/javascript"></script>
		<script src="js/bootstrap.min.js"></script>
		<script type="text/javascript">
			function activar(){
				if(document.formulario.box.checked == true) { 
					document.formulario.nombre.readOnly = false;
					document.formulario.apellido.readOnly = false;
					document.formulario.email.readOnly = false;
					document.formulario.nacimiento.readOnly = false;
					document.formulario.direccion.readOnly = false;
					document.formulario.contacto.readOnly = false;
				} else { 
					document.formulario.nombre.readOnly = true;
					document.formulario.apellido.readOnly = true;
					document.formulario.email.readOnly = true;
					document.formulario.nacimiento.readOnly = true;
					document.formulario.direccion.readOnly = true;
					document.formulario.contacto.readOnly = true;
				}  
			}
		</script>
	</body>
</html>