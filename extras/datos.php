<?php
	mysql_connect('localhost','root','');
	mysql_select_db('biblioteca');

	$Accion = $_REQUEST['Accion'];
	if(is_callable($Accion)){
		$Accion();
	}

	function GetPais(){
		header('Content-Type: application/json');
		$pais = array();
		$query = mysql_query("SELECT * FROM pais");
		
		while ($fila = mysql_fech_assoc($query)) {
			$pais[] = $fila;
		}
		echo json_encode($pais);
	}

	function GetDepartamento(){
		header('Content-Type: application/json');
		$departamento = array();
		$query = mysql_query("SELECT * FROM departamento WHERE idp = ".$_REQUEST['idp']);
		
		while ($fila = mysql_fech_assoc()) {
			$departamento[] = $fila;
		}
		echo json_encode($departamento);
	}

	function GetProvincia(){
		header('Content-Type: application/json');
		$provincia = array();
		$query = mysql_query("SELECT * FROM provincia WHERE idd = ".$_REQUEST['idd']);
	
		while ($fila = mysql_fech_assoc()) {
			$provincia[] = $fila;
		}
		echo json_encode($provincia);
	}

	function GetDistrito(){
		header('Content-Type: application/json');
		$distrito = array();
		$query = mysql_query("SELECT * FROM distrito WHERE idpr = ".$_REQUEST['idpr']);
		
		while ($fila = mysql_fech_assoc()) {
			$distrito[] = $fila;
		}
		echo json_encode($distrito);
	}
?>