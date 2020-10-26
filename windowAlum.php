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
		<link rel="stylesheet" href="css/est.css">
		<link rel="stylesheet" type="text/css" href="engine1/style.css" />
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
		<script src="js/bus.js"></script>
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
								<form action="" class="navbar-form navbar-left" role="search">
									<div class="form-group">
										<input type="text" class="form-control" name="busqueda_general" id="busqueda_general" placeholder="Buscar Libros">
									</div>
								</form>
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

		<div class="container">
			<aside class="container-fluid">
				<br>
				<div class="row">
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
					<div class="container-fluid">
						<article class="col-xs-12 col-sm-12 col-md-9 col-lg-9" style="background-color: #7a7777;">
							<div id="resultado_libros">

							</div>	
						</article>
					</div>
				</div>
			</aside>
		</div>
	
		<script src="js/jquery-3.2.1.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
	</body>
</html>