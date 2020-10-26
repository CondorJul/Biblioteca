<?PHP
	$consulta = consultarLibro($_GET['prestamo']);

	function consultarLibro($prestamo){
		include 'conexion.php';

		$query =  "SELECT * FROM LIBRO WHERE idLibro=".$prestamo."";
		$resul = $conexion->query($query) or die(mysql_error());

		$row = $resul->fetch_assoc();
		return [
			$row['idLibro'],
			$row['titulo'],
			$row['num_ejemplar'],
			$row['edicion'],
			$row['disponible']
		];
	}
	?>
		<div class="modal-dialog modal-md">
			<div class="modal-content col-ms-12">
				<div class="modal-header">
					<h4 class="modal-title"><i class='glyphicon glyphicon-list-alt'></i> Confirmar datos para Realizar Prestamo de Libro</h4>
				</div>
				<div class="modal-body">
					<form action="confirmPrestamo.php" class="form-horizontal" method="POST">
						<div class="form-group">
							<label for="id" class="control-label col-md-4">ID Libro:</label>
							<div class="col-md-8">
								<input type="number" class="form-control" name="id" value="<?php echo $consulta[0]?>" readonly>
							</div>
						</div>
						<div class="form-group">
							<label for="titulo" class="control-label col-md-4">Titulo:</label>
							<div class="col-md-8">
								<input type="text" class="form-control" name="titulo" value="<?php echo $consulta[1]?>" readonly>
							</div>
						</div>
						<div class="form-group">
							<label for="ejemplares" class="control-label col-md-4">N° de Ejemplares:</label>
							<div class="col-md-8">
								<input type="number" class="form-control" name="ejemplar" value="<?php echo $consulta[2]?>" readonly>
							</div>
						</div>
						<div class="form-group">
							<label for="edicion" class="control-label col-md-4">N° de Edicion:</label>
							<div class="col-md-8">
								<input type="text" class="form-control" name="n_edicion" value="<?php echo $consulta[3]?>" readonly>
							</div>
						</div>
						<div class="form-group">
							<label for="disponible" class="control-label col-md-4">Disponible:</label>
							<div class="col-md-8">
								<input type="text" class="form-control" name="disponible" value="<?php echo $consulta[4]?>" readonly>
							</div>
						</div>
						<div class="form-group">
							<label for="codigo" class="control-label col-md-4">Codigo de Matricula:</label>
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
							<label for="contrasena" class="control-label col-md-4">Contraseña:</label>
							<div class="col-md-8">
								<input type="password" class="form-control" name="pw" placeholder="Contraseña" required>
							</div>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
							<button type="submit" class="btn btn-primary" id="Ingresar_Autor">Confirmar Prestamo</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	<?php;
?>