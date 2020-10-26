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
		<link rel="stylesheet" href="css/estiloadmin.css">
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
							<a href="windowAdmin.php" class="navbar-brand">Biblioteca Virtual 2.0</a>
						</div>

						<div class="collapse navbar-collapse" id="navbar-1">
							<ul class="nav navbar-nav navbar-left">
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
			<div class="main row">
				<article class="col-md-3 col-lg-3 hidden-xs hidden-sm">	
					<div class="panel">
					    <div class="panel-heading">
					        <a data-toggle="collapse" href="#collapse1" style="color: white;">Noticia</a>
					    </div>
					    <div id="collapse1" class="panel-collapse collapse">
					        <div class="panel-body text-justify" style="color: black;">Muy pronto en la escuela de sistemas y computacion contara con una biblioteca virtual que estara implementado con todos los libros de actualidad para un aprendizaje excelente asi ampliar nuestros conocimientos y manejo de la documentacion.</div>
					    </div>
					</div>
					<div class="panel">
					    <div class="panel-heading">
					        <a data-toggle="collapse" href="#collapse2" style="color: white;">Consultas</a>
					    </div>
					    <div id="collapse2" class="panel-collapse collapse">
					        <div class="panel-body text-justify" style="color: black;">Toda consulta se realizara previamente con el Administrador o comunicarse al telefono 923313696, 
                        o al correo jc.condor.sistemas@gmail.com.</div>
					    </div>
					</div>
					<div class="panel">
					    <div class="panel-heading">
					        <a data-toggle="collapse" href="#collapse3" style="color: white;">Reclamos</a>
					    </div>
					    <div id="collapse3" class="panel-collapse collapse">
					        <div class="panel-body text-justify" style="color: black;">Todo tipo de reclamos se realizara previamente con el Administrador o comunicarse al telefono 923313696, 
                        o al correo jc.condor.sistemas@gmail.com</div>
					    </div>
					</div>
					<div class="panel">
					    <div class="panel-heading">
					        <a data-toggle="collapse" href="#collapse4" style="color: white;">Privacidad</a>
					    </div>
					    <div id="collapse4" class="panel-collapse collapse">
					        <div class="panel-body text-justify" style="color: black;">Todo documento que se comparte son de Derechos Reservados por los administradores. Ingenieria de Sistemas-Biblioteca Virtual.</div>
					    </div>
					</div>
				</article>
				<aside class="col-xs-12 col-sm-12 col-md-9 col-lg-9">
					Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quos quas suscipit nihil excepturi architecto itaque cumque necessitatibus enim aperiam iusto. Vel, voluptatibus ipsam ullam. Itaque, magni? Vero omnis, veritatis nemo!
				</aside>

			</div>
		</div>
	
		<script src="js/jquery-3.2.1.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
	</body>
</html>