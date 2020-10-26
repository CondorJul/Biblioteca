<script type="text/javascript">
	$(document).ready(function(){
		$.ajax({
			url:'datos.php?Accion=GetPais',
			success:function(Datos){
				for (x=0; x<Datos.length; x++){
					$("#slPais").append(new Option(Datos[x].pais, Datos[x].idp));
				}
			}
		})
		$('#slPais').change(function(){
			$('#slDepartamento, #slProvincia, #slDistrito').empty();
			$.getJSON('datos.php',{Accion:'GetDepartamento',idp:$('#slPais option:selected').val()}, function(Datos){
				for (x=0; x<Datos.length; x++){
					$("#slDepartamento").append(new Option(Datos[x].departamento, Datos[x].idd));
				}
			})
		});	

		$('#slDepartamento').change(function(){
			$('#slProvincia, #slDistrito').empty();
			$.getJSON('datos.php',{Accion:'GetProvincia',idd:$('#slDepartamento option:selected').val()}, function(Datos){
				for (x=0; x<Datos.length; x++){
					$("#slProvincia").append(new Option(Datos[x].provincia, Datos[x].idpr));
				}
			})
		});

		$('#slProvincia').change(function(){
			$('#slDistrito').empty();
			$.getJSON('datos.php',{Accion:'GetDistrito',idpr:$('#slProvincia option:selected').val()}, function(Datos){
				for (x=0; x<Datos.length; x++){
					$("#slDistrito").append(new Option(Datos[x].distrito, Datos[x].iddi));
				}
			})
		});
	})
</script>