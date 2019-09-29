<?php

include ('../DB/conexion.php');
$base=conectar();

if(isset($_POST['idPlan'])){

	$idPlan = $_POST['idPlan'];

	$query = "SELECT nombreMateria FROM materias AS MAT
				INNER JOIN planesDeEstudio AS PLAN ON MAT.idPlanDeEstudio=PLAN.idPlanDeEstudio
				WHERE PLAN.idPlanDeEstudio=:idPlan
				ORDER BY MAT.nombreMateria ASC";

	$resultado = $base->prepare($query);

	if($resultado->execute(array(":idPlan"=>$idPlan))){
		//select que se manda al front
		$html = "<select class='form-control' name='materia'>";
		
		//obtener todas las materias
		$materias = $resultado->fetchAll(PDO::FETCH_ASSOC);

		foreach($materias as $materia){
			$html.="<option>".$materia['nombreMateria']."</option>";
		}

		
		$html.="</select>";

	    echo $html;
	}
}



?>