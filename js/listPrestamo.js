$(listar_prestamo_libros());

function listar_prestamo_libros(prestamo) {
	$.ajax({
		url: 'LibrosPrestados.php',
		type: 'POST',
		datatype: 'html',
		data: {prestamo: prestamo},
	})
	.done(function(resultado) {
		$("#resultado_libros_prestados").html(resultado);
	})
}