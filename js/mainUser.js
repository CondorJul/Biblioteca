$(buscar_usuarios());

function buscar_usuarios(usuario) {
	$.ajax({
		url: 'buscarUser.php',
		type: 'POST',
		datatype: 'html',
		data: {usuario: usuario},
	})
	.done(function(resultado) {
		$("#resultado_usuario").html(resultado);
	})
}

$(document).on('keyup', '#busqueda_usuario', function(){
	var valor = $(this).val();
	if (valor != "") {
		buscar_usuarios(valor);
	} else {
		buscar_usuarios();
	}
});

