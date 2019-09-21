<!DOCTYPE html>
<html>
<head>
	<title>Examenes Por Plan</title>
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

	<?php include '../estructura/header.php' ?>

	<div class="opciones datos-tabla">

		<div class="panel">

			<h2>Extemporaneos</h2>

			<?php  
			include("../DB/conexion.php");
			$base=conectar();

			$plan = $_POST['plan'];

	
			//obtener examenes aceptados por plan
			$query = "SELECT USU.numControl,USU.nombre,USU.apellidoPaterno,USU.apellidoMaterno,PLAN.nombrePlan,CARR.nombreCarrera,
				MAT.nombreMateria,SOLI.estado
				FROM usuarios AS USU 
				INNER JOIN planesDeEstudio AS PLAN ON PLAN.idPlanDeEstudio=USU.idPlanDeEstudio
				INNER JOIN carreras AS CARR ON CARR.idCarrera=PLAN.idCarrera
				INNER JOIN solicitudesExamenes AS SOLI ON USU.idUsuario=SOLI.idUsuario
				INNER JOIN materias AS MAT ON MAT.idMateria=SOLI.idMateria
				WHERE PLAN.nombrePlan = :nombrePlan AND SOLI.estado = 1";

			$resultado = $base->prepare($query);

		
		    $resultado->execute(array(":nombrePlan"=>$plan));

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
					</tr>
				</thead>
				
				<tbody>

				<?php foreach ($examenes as $examen) { ?>
					<tr>
						<td><?php echo $examen['numControl'] ?></td>
						<td><?php echo $examen['nombre'] ?></td>
						<td><?php echo $examen['apellidoPaterno'] ?></td>
						<td><?php echo $examen['apellidoMaterno'] ?></td>
						<td><?php echo $examen['nombrePlan'] ?></td>
						<td><?php echo $examen['nombreCarrera'] ?></td>
						<td><?php echo $examen['nombreMateria'] ?></td>

					</tr>
					
				<?php } ?>
					
					
				</tbody>

			</table>
			
		</div>
		
	</div>



</body>

</html>