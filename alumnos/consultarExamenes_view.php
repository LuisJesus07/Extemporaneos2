<?php include '../estructura/headerAlumno.php' ?>

<!DOCTYPE html>
<html>
<head>
	<title>Mis Examenes</title>
</head>
<body>


	<div class="opciones datos-tabla">

		<div class="panel">

			<div id="respuesta"></div>

			<h2>Extemporaneos</h2>

			<?php  
			include("../DB/conexion.php");
			$base=conectar();

			//id del usuario con la sesion abierta
			$idUsuario = $_SESSION['datosUsuario']['idUsuario'];

			//obtener examenes aceptados por carrera
			$query = "SELECT USU.idUsuario,USU.numControl,USU.nombre,USU.apellidoPaterno,USU.apellidoMaterno,PLAN.nombrePlan,CARR.nombreCarrera,
				MAT.nombreMateria,SOLI.estado,SOLI.idSolicitudExamen
				FROM usuarios AS USU 
				INNER JOIN planesDeEstudio AS PLAN ON PLAN.idPlanDeEstudio=USU.idPlanDeEstudio
				INNER JOIN carreras AS CARR ON CARR.idCarrera=PLAN.idCarrera
				INNER JOIN solicitudesExamenes AS SOLI ON USU.idUsuario=SOLI.idUsuario
				INNER JOIN materias AS MAT ON MAT.idMateria=SOLI.idMateria
				WHERE USU.idUsuario = :idUsuario";

			$resultado = $base->prepare($query);

		
		    $resultado->execute(array(":idUsuario"=>$idUsuario));

			$examenes = $resultado->fetchAll(PDO::FETCH_ASSOC);

			

			?>

			<table class="tabla" id="tabla" class="display nowrap">
				<thead>
					<tr>
						<th>Numero Control</th>
						<th>Nombre</th>
						<th>Apellido Paterno</th>
						<th>Apellido Materno</th>
						<th>Plan</th>
						<th>Carrera</th>
						<th>Materia</th>
						<th>Estado</th>
						<th>Eliminar</th>

					</tr>
				</thead>
				
				<tbody id="tbody-examenes">

				<?php foreach ($examenes as $examen) { ?>
					<tr class="estado-<?php echo $examen['estado'] ?>" id="fila-<?php echo $examen['idSolicitudExamen']  ?>">
						<td><?php echo $examen['numControl'] ?></td>
						<td><?php echo $examen['nombre'] ?></td>
						<td><?php echo $examen['apellidoPaterno'] ?></td>
						<td><?php echo $examen['apellidoMaterno'] ?></td>
						<td><?php echo $examen['nombrePlan'] ?></td>
						<td><?php echo $examen['nombreCarrera'] ?></td>
						<td><?php echo $examen['nombreMateria'] ?></td>
						<td><?php if($examen['estado'] == 1){echo "Aceptado";}else{echo "Espera";} ?></td>
						<td><a class="btn-eliminar" data-idSolicitud="<?php echo $examen['idSolicitudExamen'] ?>"><i class="fas fa-trash-alt"></i></a></td>

					</tr>
					
				<?php } ?>
					
					
				</tbody>

			</table>
			
		</div>
		
	</div>



</body>
<script type="text/javascript" src="../js/eliminarExamen.js"></script>
</html>