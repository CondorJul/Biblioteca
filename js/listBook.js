$(buscar_libros());

function buscar_libros(libro) {
	$.ajax({
		url: 'buscarBook1.php',
		type: 'POST',
		datatype: 'html',
		data: {libro: libro},
	})
	.done(function(resultado) {
		$("#resultado_libros").html(resultado);
	})
}

$(document).on('keyup', '#busqueda_libro', function(){
	var valor = $(this).val();
	if (valor != "") {
		buscar_libros(valor);
	} else {
		buscar_libros();
	}
});