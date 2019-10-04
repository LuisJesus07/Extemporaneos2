<?php 
	
	include("../DB/conexion.php");
	$base=conectar();
	
	
	if (isset($_POST['idMateria'] )){

			//inicializar la hora de acuerdo a la zona
			ini_set('date.timezone', 'America/Mazatlan');

			session_start();
			$idUsuario = $_SESSION['datosUsuario']['idUsuario'];
			$idMateria = $_POST['idMateria'];
			$fecha = date('Y:m:d', time());

			//ver si el periodo de solicitudes estan activo
			$queryPeriodo = "SELECT estado FROM periodo";

			$resultado = $base->prepare($queryPeriodo);

		
		    $resultado->execute();

			$periodo = $resultado->fetch()[0];

			//si el periodo se encuentra activo relizamos la solicitud
			if($periodo == 1){

				// Ver cuantos examenes tiene el alumno
				$query = "SELECT COUNT(USU.idUsuario)
				FROM usuarios AS USU 
				INNER JOIN planesDeEstudio AS PLAN ON PLAN.idPlanDeEstudio=USU.idPlanDeEstudio
				INNER JOIN carreras AS CARR ON CARR.idCarrera=PLAN.idCarrera
				INNER JOIN solicitudesExamenes AS SOLI ON USU.idUsuario=SOLI.idUsuario
				INNER JOIN materias AS MAT ON MAT.idMateria=SOLI.idMateria
				WHERE USU.idUsuario = :idUsuario";

				$resultado = $base->prepare($query);

			
			    $resultado->execute(array(":idUsuario"=>$idUsuario));

				$examenes = $resultado->fetch();

				if($examenes[0] >=2 ){
					$estado = 2;
				}else{
					$estado = 1;
				}


				
				try{

					
			    	$query = "INSERT INTO solicitudesExamenes(estado,idUsuario,idMateria,fechaRegistro) VALUES(:estado,:idUsuario,:idMateria,:fechaRegistro)";

					$resultado = $base->prepare($query);

			
			    	$resultado->execute(array(":estado"=>$estado, ":idUsuario"=>$idUsuario, ":idMateria"=>$idMateria, ":fechaRegistro"=>$fecha));


			    	$resultado->closeCursor();


				    //En caso de que no ocurra un error redirecciona al login del la pagina para que inicie sesion
				   	header('location:solicitudExitosa_view.php');

				}catch(Exception $e){
					//En caso de error redirecciona de nuevo al formulario de registro y muestra un error
					echo $e;
					//header('location:error.html');
				}

			}else{
				//madar a vista de periodo inactivo
				header('location:periodoInactivo_view.php');
			}
			
		    


	}
	
		
?>