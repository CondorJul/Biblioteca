$(busqueda());

function busqueda(general) {
	$.ajax({
		url: 'busqueda.php',
		type: 'POST',
		datatype: 'html',
		data: {general: general},
	})
	.done(function(resultado) {
		$("#resultado_libros").html(resultado);
	})
}

$(document).on('keyup', '#busqueda_general', function(){
	var valor = $(this).val();
	if (valor != "") {
		busqueda(valor);
	} else {
		busqueda();
	}
});