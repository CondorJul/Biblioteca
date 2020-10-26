
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Biblioteca de Sistemas</title>
		<link href="img/logotipo.ico" type="image/x-icon" rel="shortcut icon"/>
		<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
		<link rel="stylesheet" href="css/bootstrap.min.css">
		<link rel="stylesheet" href="css/estiloboot.css">
	</head>
	<body>
		<header>
			<div class="container-fluid">
				<h1>INGENIERIA DE SISTEMAS Y COMPUTACION</h1>
			</div>
		</header>
		<div class="container-fluid">
			<section class="main row">
				<article class="col-md-9">
					<div id="carousel-1" class="carousel slide" data-ride="carousel">
						<ol class="carousel-indicators">
							<li data-target="#carousel-1" data-slide-to="0" class="active"></li>
							<li data-target="#carousel-1" data-slide-to="1"></li>
							<li data-target="#carousel-1" data-slide-to="2"></li>
							<li data-target="#carousel-1" data-slide-to="3"></li>
							<li data-target="#carousel-1" data-slide-to="4"></li>
							<li data-target="#carousel-1" data-slide-to="5"></li>
							<li data-target="#carousel-1" data-slide-to="6"></li>
							<li data-target="#carousel-1" data-slide-to="7"></li>
						</ol>

						<!--contenedor de los slide-->
						<div class="carousel-inner" role="listbox">
							<div class="item active">
								<img src="img/fondo/1.jpg" class="img-responsive" alt="">
							</div>
							<div class="item">
								<img src="img/fondo/2.jpg" class="img-responsive" alt="">
							</div>
							<div class="item">
								<img src="img/fondo/3.jpg" class="img-responsive" alt="">
							</div>
							<div class="item">
								<img src="img/fondo/4.jpg" class="img-responsive" alt="">
							</div>
							<div class="item">
								<img src="img/fondo/5.jpg" class="img-responsive" alt="">
							</div>
							<div class="item">
								<img src="img/fondo/6.jpg" class="img-responsive" alt="">
							</div>
							<div class="item">
								<img src="img/fondo/7.jpg" class="img-responsive" alt="">
							</div>
							<div class="item">
								<img src="img/fondo/8.jpg" class="img-responsive" alt="">
							</div>
						</div>	

						<a href="#carousel-1" class="left carousel-control" role="button" data-slide="prev">
							<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
							<span class="sr-only">Anterior</span>
						</a>
						<a href="#carousel-1" class="right carousel-control" role="button" data-slide="next">
							<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
							<span class="sr-only">Siguiente</span>
						</a>
					</div>
				</article>
				
				<aside class="col-md-3">
					<br>
					<h2>Biblioteca Virtual 2.0</h2>
    				<figure>
    					<img src="img/book.jpg" class="img-responsive center-block">

    				</figure>
    				<br>
        			<section class="bienvenida">
    					<p>BIENVENIDO</p>
    					<p>Iniciar Sesion</p>
        			</section>
        			<form action="login.php" method="POST">
                       	<div class="form-group">
                       		<div class="input-group">
                       			<label for="user" class="sr-only">Usuario: </label>
	                       		<div class="input-group-addon"><img src="img/icouser.jpg"></div>
	                       		<input class="form-control user-code" name="usuario" type="text" placeholder="Codigo de Matricula o DNI" rel="tooltip" maxlength="10"/>
	                       	</div>	     
	                    </div>
                       	<div class="form-group">
                       		<div class="input-group">
                       			<label for="password" class="sr-only">Contraseña: </label>
	                       		<div class="input-group-addon"><img src="img/icopass.jpg"></div>
	                       		<input class="form-control" name="pw" type="password" rel="tooltip" placeholder="Contraseña"/>
                       		</div>
                       	</div>
                       	<br>
                        <div class="form-group">
                        	<input type="submit" class="btn btn-info btn-block" id="enviar_sesion" name="sesion" value="Ingresar" />
						</div>	
                        <div class="form-group">
                       		<button type="button" class="btn btn-info btn-block" id="enviar_reg" data-dismiss="modal">Registrase</button>
                        </div>  
                        <br>                  	
					</form>
				</aside>
			</section>
			<br>
		</div>

		<!--Modal de Registro-->
		<div class="modal fade" id="Registrase" role="dialog">
			<div class="modal-dialog modal-md">
				<div class="modal-content col-md-12">
					<div class="modal-header">
						<h4 class="modal-title"><i class='glyphicon glyphicon-user'></i> Estimado Usuario</h4>
					</div>
					<div class="modal-body">
						<p>Estimado Usuario por favor acercarse en el Administrador para que le Registre</p>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
					</div>
				</div>
			</div>
		</div>

		<script src="js/jquery-3.2.1.min.js"></script>
		<script src="js/bootstrap.min.js"></script>

		<script type="text/javascript">
			$(document).on('click', '#enviar_reg', function() {
			    $('#Registrase').modal('show');
			});
		</script>

	</body>
</html>