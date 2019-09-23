<?php include '../estructura/headerAlumno.php' ?>

	<div class="opciones">

		<h1>Examenes a Solicitar</h1>
	

		<form method="POST" action="guardarExamen_back.php">

			<div class="panel">
				
				<h2>Extemporaneo</h2>

				<label>Materia :</label>
				<select name="idMateria">
					<?php 
					include("../DB/conexion.php");
					$base=conectar();

					/*
					$sentencia = $base->prepare("SELECT MAT.idMateria,MAT.nombreMateria,PLAN.nombrePlan
						FROM materias AS MAT
						INNER JOIN planesDeEstudio AS PLAN ON MAT.idPlanDeEstudio=PLAN.idPlanDeEstudio
						WHERE PLAN.nombrePlan = 'ComunicaciÃ³n 2000'
						ORDER BY MAT.nombreMateria ASC");
						
						$sentencia->execute();
						$materias = $sentencia-> fetchAll(PDO::FETCH_ASSOC);
					*/
					//id del usuario con la sesion abierta
					$plan = $_SESSION['datosUsuario']['idPlanDeEstudio'];


					//obtener examenes aceptados por carrera
					$query = "SELECT MAT.idMateria,MAT.nombreMateria,PLAN.idPlanDeEstudio
						FROM materias AS MAT
						INNER JOIN planesDeEstudio AS PLAN ON MAT.idPlanDeEstudio=PLAN.idPlanDeEstudio
						WHERE PLAN.idPlanDeEstudio = :idPlanDeEstudio
						ORDER BY MAT.nombreMateria ASC";

					$resultado = $base->prepare($query);

				
				    $resultado->execute(array(":idPlanDeEstudio"=>$plan));

					$materias = $resultado->fetchAll(PDO::FETCH_ASSOC);
					
					?>


					<?php foreach ($materias as $materia) { ?>
					
						<option value="<?php echo $materia['idMateria'] ?>"><?php echo $materia['nombreMateria'] ?></option>

					<?php } ?>
				</select>


			</div>


			<div class="panel alerta">
				<p>A partir de la tercera solicitud seran sometidas a revision para su autorizacion</p>

				<img src="../img/alerta.png">
			</div>


			<input type="submit" name="" class="btn-registrar">
			
		</form>

		
			
		
	</div>

<?php include '../estructura/sidebar.php' ?>