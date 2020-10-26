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
		<link rel="stylesheet" href="css/estylealumno.css">
		<link rel="stylesheet" type="text/css" href="engine1/style.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
		<script src="js/listBook.js"></script>
		<script src="js/listPrestamo.js"></script>
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
		<div class="container">
			<aside>
				<div class="container-fluid row">
					<div class="col-md-12">
						<div role="tabpanel">
							<ul class="nav nav-tabs" role="tablist">
								<li role="presentation" class="active"><a href="#Libros" aria-controls="Libros" data-toggle="tab" role="tab">Libros</a></li>
								<li role="presentation"><a href="#LibrosPrestados" aria-controls="LibrosPrestados" data-toggle="tab" role="tab">Libros Prestados</a></li>
							</ul>
							<br>
							<div class="tab-content container-fluid" style="border-style: double; border-color: white; border-radius: 15px;">
								<!--Lista de Libros-->
								<div class="tab-pane active" role="tabpanel" id="Libros">
									<form action="" class="navbar-form navbar-right" role="search">
										<div class="form-group">
											<div class="input-group">
												<input type="text" class="form-control" placeholder="Buscar Libros" name="busqueda_libro" id="busqueda_libro">
												<span class="input-group-btn">
											        <button class="btn btn-default" type="button"><i class="glyphicon glyphicon-search"></i></button>
											    </span>	
											</div>
										</div>	
									</form>
									<br>
									<br>
									<br>
									<div id="resultado_libros">
									</div>
								</div>

								<!--Lista de de libros prestados-->
								<div class="tab-pane" role="tabpanel" id="LibrosPrestados">
									<br>
									<div id="resultado_libros_prestados">
									</div>		
								</div>
							</div>
							<br>
						</div>
					</div>
				</div>
			</aside>
		</div>

		<script src="js/jquery-3.2.1.min.js" type="text/javascript"></script>
		<script src="js/bootstrap.min.js"></script>

	</body>
</html>