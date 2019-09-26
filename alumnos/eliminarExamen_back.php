<?php


include ('../DB/conexion.php');
$base=conectar();

if(isset($_POST['idSolicitudExamen'])){

	$idSolicitudExamen = $_POST['idSolicitudExamen'];

	$query = "DELETE FROM solicitudesExamenes WHERE idSolicitudExamen=:idSolicitudExamen";

	$resultado = $base->prepare($query);
	
	if($resultado->execute(array(":idSolicitudExamen"=>$idSolicitudExamen))){
		echo "Examen eliminado";
	}else{
		echo "Ocurrio un error";
	}
}



?>