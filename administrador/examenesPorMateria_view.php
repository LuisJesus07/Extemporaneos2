<?php include '../estructura/headerAdmin.php' ?>

<?php  
include("../DB/conexion.php");
$base=conectar();

$plan = $_POST['plan'];
$materia = $_POST['materia'];


//obtener examenes aceptados por materia
$query = "SELECT USU.numControl,USU.nombre,USU.apellidoPaterno,USU.apellidoMaterno,PLAN.nombrePlan,CARR.nombreCarrera,
	MAT.nombreMateria,SOLI.estado
	FROM usuarios AS USU 
	INNER JOIN planesDeEstudio AS PLAN ON PLAN.idPlanDeEstudio=USU.idPlanDeEstudio
	INNER JOIN carreras AS CARR ON CARR.idCarrera=PLAN.idCarrera
	INNER JOIN solicitudesExamenes AS SOLI ON USU.idUsuario=SOLI.idUsuario
	INNER JOIN materias AS MAT ON MAT.idMateria=SOLI.idMateria
	WHERE PLAN.nombrePLAN = :nombrePlan AND MAT.nombreMateria = :nombreMateria";


$resultado = $base->prepare($query);


$resultado->execute(array(":nombrePlan"=>$plan, ":nombreMateria"=>$materia));

$examenes = $resultado->fetchAll(PDO::FETCH_ASSOC);



?>

<!DOCTYPE html>
<html>
<head>
	<title>Examenes Por Materia</title>
	<script type="text/javascript" src="../js/buttons/jquery-3.3.1.js"></script>
	<script type="text/javascript" src="../js/buttons/jquery.dataTables.min.js"></script>
	<script type="text/javascript" src="../js/buttons/dataTables.buttons.min.js"></script>
	<script type="text/javascript" src="../js/buttons/jszip.min.js"></script>
	<script type="text/javascript" src="../js/buttons/vfs_fonts.js"></script>
	<script type="text/javascript" src="../js/buttons/buttons.print.min.js"></script>
	<script type="text/javascript" src="../js/buttons/buttons.html5.min.js"></script>

	<script type="text/javascript" src="../js/generarExcel.js"></script>
</head>
<body>

	<!-- MAIN -->

	<div class="col">
		<div class="card">
			<div class="card-header text-center" style="background-color: #132644;">
				<h2 class="display-4">Examenes Por Materia</h2>
			</div>
			<div class="card-body">
				<div id="respuesta"></div>
				<table class="table table-hover table-bordered mt-2" id="tabla">
		            <thead class="thead-light">
		                <tr class="">
		                    <th class="text-secondary">Número de control</th>
		                    <th class="text-secondary">Nombre</th>
		                    <th class="text-secondary">Apellido Paterno</th>
		                    <th class="text-secondary">Apellido Materno</th>
		                    <th class="text-secondary">Carrera</th>
		                    <th class="text-secondary">Plan</th>
		                    <th class="text-secondary">Materia</th>
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
						</tr>
						
					<?php } ?>
		            </tbody>
		        </table>
	        </div>
        </div>

	</div>
       


    </div><!-- Main Col END -->
    
</div><!-- body-row END -->
  
  
</div><!-- container -->



<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script type="text/javascript" src="../js/sidebar.js"></script>

	<!--<div class="opciones datos-tabla">

		<div class="panel">

			<h2>Extemporaneos</h2>

			<?php  
			include("../DB/conexion.php");
			$base=conectar();

			$plan = $_POST['plan'];
			$materia = $_POST['materia'];


			//obtener examenes aceptados por materia
			$query = "SELECT USU.numControl,USU.nombre,USU.apellidoPaterno,USU.apellidoMaterno,PLAN.nombrePlan,CARR.nombreCarrera,
				MAT.nombreMateria,SOLI.estado
				FROM usuarios AS USU 
				INNER JOIN planesDeEstudio AS PLAN ON PLAN.idPlanDeEstudio=USU.idPlanDeEstudio
				INNER JOIN carreras AS CARR ON CARR.idCarrera=PLAN.idCarrera
				INNER JOIN solicitudesExamenes AS SOLI ON USU.idUsuario=SOLI.idUsuario
				INNER JOIN materias AS MAT ON MAT.idMateria=SOLI.idMateria
				WHERE PLAN.nombrePLAN = :nombrePlan AND MAT.nombreMateria = :nombreMateria";


			$resultado = $base->prepare($query);

		
		    $resultado->execute(array(":nombrePlan"=>$plan, ":nombreMateria"=>$materia));

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
		
	</div>-->



</body>

</html>