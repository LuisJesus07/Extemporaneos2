<?php


include ('../DB/conexion.php');
$base=conectar();

if(isset($_POST['idSolicitudExamen'])){

	$idSolicitudExamen = $_POST['idSolicitudExamen'];

	$query = "UPDATE solicitudesExamenes SET estado= 1  WHERE idSolicitudExamen =:idSolicitudExamen";

	$resultado = $base->prepare($query);
	
	if($resultado->execute(array(":idSolicitudExamen"=>$idSolicitudExamen))){
		echo "Examen Aceptado";
	}else{
		echo "Ocurrio un error";
	}
}



?>