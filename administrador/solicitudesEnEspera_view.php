<?php include '../estructura/headerAdmin.php' ?>

<!DOCTYPE html>
<html>
<head>
	<title>Solicitudes En Espera</title>
	<script type="text/javascript" src="../js/buttons/jquery-3.3.1.js"></script>
	<script type="text/javascript" src="../js/buttons/jquery.dataTables.min.js"></script>
	<script type="text/javascript" src="../js/buttons/dataTables.buttons.min.js"></script>
	<script type="text/javascript" src="../js/buttons/jszip.min.js"></script>
	<script type="text/javascript" src="../js/buttons/pdfmake.min.js"></script>
	<script type="text/javascript" src="../js/buttons/vfs_fonts.js"></script>
	<script type="text/javascript" src="../js/buttons/buttons.print.min.js"></script>
	<script type="text/javascript" src="../js/buttons/buttons.html5.min.js"></script>

	<script type="text/javascript" src="../js/generarExcel.js"></script>
</head>
<body>

	

	<div class="opciones datos-tabla">

		<div class="panel">

			<div id="respuesta"></div>

			<h2>Extemporaneos</h2>

			<?php  
			include("../DB/conexion.php");
			$base=conectar();

			
			$sentencia = $base->prepare("SELECT SOLI.idSolicitudExamen,USU.numControl,USU.nombre,USU.apellidoPaterno,USU.apellidoMaterno,PLAN.nombrePlan,CARR.nombreCarrera,
				MAT.nombreMateria,SOLI.estado
				FROM usuarios AS USU 
				INNER JOIN planesDeEstudio AS PLAN ON PLAN.idPlanDeEstudio=USU.idPlanDeEstudio
				INNER JOIN carreras AS CARR ON CARR.idCarrera=PLAN.idCarrera
				INNER JOIN solicitudesExamenes AS SOLI ON USU.idUsuario=SOLI.idUsuario
				INNER JOIN materias AS MAT ON MAT.idMateria=SOLI.idMateria
				WHERE SOLI.estado = 2");
				
				$sentencia->execute();
				$examenes = $sentencia-> fetchAll(PDO::FETCH_ASSOC);

			

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
						<th>Aceptar</th>

					</tr>
				</thead>
				
				<tbody id="tbody-examenes">

				<?php foreach ($examenes as $examen) { ?>
					<tr class="estado-2" id="fila-<?php echo $examen['idSolicitudExamen']  ?>">
						<td><?php echo $examen['numControl'] ?></td>
						<td><?php echo $examen['nombre'] ?></td>
						<td><?php echo $examen['apellidoPaterno'] ?></td>
						<td><?php echo $examen['apellidoMaterno'] ?></td>
						<td><?php echo $examen['nombrePlan'] ?></td>
						<td><?php echo $examen['nombreCarrera'] ?></td>
						<td><?php echo $examen['nombreMateria'] ?></td>
						<td>Espera</td>
						<td><button class="btn-eliminar" data-idSolicitud="<?php echo $examen['idSolicitudExamen'] ?>">Aceptar</button></td>

					</tr>
					
				<?php } ?>
					
					
				</tbody>

			</table>
			
		</div>
		
	</div>



</body>
<script type="text/javascript" src="../js/aceptarSolicitud.js"></script>
</html>