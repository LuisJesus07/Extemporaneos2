<?php

	include ('../DB/conexion.php');
	$base=conectar();


	$query = "TRUNCATE TABLE solicitudesExamenes";

	$resultado = $base->prepare($query);

	if($resultado->execute()){
		//ciclo reiniciado con exito
		echo "1";
	}else{
		//ocurrio un problema en el servidor
		echo "2";
	}


?>