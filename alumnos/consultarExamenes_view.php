<?php include '../estructura/headerAlumno.php' ?>

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
	WHERE USU.idUsuario = :idUsuario
	ORDER BY SOLI.estado ASC";

$resultado = $base->prepare($query);


$resultado->execute(array(":idUsuario"=>$idUsuario));

$examenes = $resultado->fetchAll(PDO::FETCH_ASSOC);



?>



<div class="container-fluid p-0">
  
<!-- Bootstrap row -->
<div class="row" id="body-row">
    <!-- Sidebar -->
    <div id="sidebar-container" class="sidebar-expanded d-none d-md-block"><!-- d-* hiddens the Sidebar in smaller devices. Its itens can be kept on the Navbar 'Menu' -->
        <!-- Bootstrap List Group -->
        <ul class="list-group">
            <!-- Separator with title -->
            <li class="list-group-item sidebar-separator-title text-muted d-flex align-items-center menu-collapsed">
                <small>TIPO CUENTA</small>
            </li>
            <!-- /END Separator -->
            <!-- Menu with submenu -->
            <a href="#submenu1" data-toggle="collapse" aria-expanded="false" class="bg-dark list-group-item list-group-item-action flex-column align-items-start">
                <div class="d-flex w-100 justify-content-start align-items-center">
                    <span class="fa fa-dashboard fa-fw mr-3"></span> 
                    <span class="menu-collapsed"><?php if($_SESSION['datosUsuario']['privilegios'] == 1){echo "Aministrador";}else{echo "Alumno";}  ?></span>
                    <span class="submenu-icon ml-auto"></span>
                </div>
            </a>
      
            <a href="#submenu2" data-toggle="collapse" aria-expanded="false" class="bg-dark list-group-item list-group-item-action flex-column align-items-start">
                <div class="d-flex w-100 justify-content-start align-items-center">
                    <span class="fa fa-user fa-fw mr-3"></span>
                    <span class="menu-collapsed">Mi informacion</span>
                    <span class="submenu-icon ml-auto"></span>
                </div>
            </a>
            <!-- Submenu content -->
            <div id='submenu2' class="collapse sidebar-submenu">
                <a href="#" class="list-group-item list-group-item-action bg-dark text-white">
                    <span class="menu-collapsed"><?php echo $_SESSION['datosUsuario']['nombre'] ?></span>
                </a>
                <a href="#" class="list-group-item list-group-item-action bg-dark text-white">
                    <span class="menu-collapsed"><?php echo $_SESSION['datosUsuario']['correo'] ?></span>
                </a>

            </div>            
           
            <!-- Separator with title -->
            <li class="list-group-item sidebar-separator-title text-muted d-flex align-items-center menu-collapsed">
                <small>OPCIONES</small>
            </li>
            <!-- /END Separator -->
            <a href="solicitarExamen_view.php" class="bg-dark list-group-item list-group-item-action">
                <div class="d-flex w-100 justify-content-start align-items-center">
                    <span class="fa fa-clipboard-list fa-fw mr-3"></span>
                    <span class="menu-collapsed">Solicitar Examen</span>
                </div>
            </a>
            <a href="consultarExamenes_view.php" class="bg-dark list-group-item list-group-item-action">
                <div class="d-flex w-100 justify-content-start align-items-center">
                    <span class="fa fa-clipboard fa-fw mr-3"></span>
                    <span class="menu-collapsed">Mis Examenes</span>
                </div>
            </a>
            <!-- Separator without title -->
            <li class="list-group-item sidebar-separator menu-collapsed"></li>            
            <!-- /END Separator -->
            <a href="#" data-toggle="sidebar-colapse" class="bg-dark list-group-item list-group-item-action d-flex align-items-center">
                <div class="d-flex w-100 justify-content-start align-items-center">
                    <span id="collapse-icon" class="fa fa-2x mr-3"></span>
                    <span id="collapse-text" class="menu-collapsed">Ocultar</span>
                </div>
            </a>
            <!-- Logo -->
            <li class="list-group-item logo-separator d-flex justify-content-center">
                <img src='https://upload.wikimedia.org/wikipedia/commons/thumb/2/2e/Facebook_Icon_%28Single_Path_-_Transparent_%22f%22%29.svg/259px-Facebook_Icon_%28Single_Path_-_Transparent_%22f%22%29.svg.png' width="30" height="30" />    
            </li>   
        </ul><!-- List Group END-->
    </div><!-- sidebar-container END -->

    <!-- MAIN -->

	<div class="col">
		<div class="card">
			<div class="card-header text-center" style="background-color: #132644;">
				<h2 class="display-4">Mis Examenes</h2>
			</div>
			<div class="card-body">
				<div id="respuesta"></div>
				<table class="table table-hover table-bordered mt-2" id="tabla">
		            <thead class="thead-light">
		                <tr class="">
		                    <th class="text-secondary">Número de control</th>
		                    <th class="text-secondary">Plan</th>
		                    <th class="text-secondary">Materia</th>
		                    <th class="text-secondary">Estado</th>
		                    <th class="text-secondary">Eliminar</th>
		                </tr> 
		            </thead>
		            <tbody id="tbody-examenes">
		            <?php foreach ($examenes as $examen) { ?>
						<tr class="estado-<?php echo $examen['estado'] ?>" id="fila-<?php echo $examen['idSolicitudExamen']  ?>">
							<td><?php echo $examen['numControl'] ?></td>
							<td><?php echo $examen['nombrePlan'] ?></td>
							<td><?php echo $examen['nombreMateria'] ?></td>
							<td><?php if($examen['estado'] == 1){echo "Aceptado";}else{echo "Espera";} ?></td>
							<td><a class="btn-eliminar" data-idSolicitud="<?php echo $examen['idSolicitudExamen'] ?>"><i class="fas fa-trash-alt"></i></a></td>

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


<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script type="text/javascript" src="../js/sidebar.js"></script>
<script type="text/javascript" src="../js/eliminarExamen.js"></script>








<!--
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
				WHERE USU.idUsuario = :idUsuario
				ORDER BY SOLI.estado ASC";

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
-->