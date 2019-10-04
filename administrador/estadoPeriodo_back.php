<?php

include ('../DB/conexion.php');
$base=conectar();

if(isset($_POST['estado'])){


	$query = "SELECT estado FROM periodo";

	$resultado = $base->prepare($query);

	$resultado->execute();

	$estadoActual = $resultado->fetch()[0];

	 
	
	if($estadoActual == 1){
		//si esta activado lo desactivamos
		$estado = 2;
		$query = "UPDATE periodo SET estado=:estado WHERE idPeriodo=1";
		$resultado = $base->prepare($query);
		$resultado->execute(array(":estado"=>$estado)); 
		echo "Perido desactivado";
	}else{
		//si no esta activado lo activamos
		$estado = 1;
		$query = "UPDATE periodo SET estado=:estado WHERE idPeriodo=1";
		$resultado = $base->prepare($query);
		$resultado->execute(array(":estado"=>$estado)); 
		echo "Periodo activado";
	}
}



?>