<?php include '../estructura/headerAlumno.php' ?>

<?php 
	include("../DB/conexion.php");
	$base=conectar();

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

		<div class="container mt-5">
	        <div class="row">
	            <div class="col-md-11">
	                <h1 class="h1 text-center">Solicitud De Exámenes Extemporáneos</h1>
	                <form method="POST" action="guardarExamen_back.php">
	                    <div class="card mt-4">
	                        <div class="card card-body">
	                            <label for="" class="text-secondary mt-3">Materia:</label>
	                            <select name="idMateria" id="" class="form-control" required>
	                            	<?php foreach ($materias as $materia) { ?>
					
									<option value="<?php echo $materia['idMateria'] ?>"><?php echo $materia['nombreMateria'] ?></option>

									<?php } ?>

	                            </select>
	                        </div>
	                        
	                    </div>
	                    <div class="alert alert-warning mt-4" role="alert">
	                        <img src="../img/alerta.png" width="25">
	                        A partir de la tercera solicitud seran sometidas a revisión para su autorización.
	                    </div>
	                    <input type="submit" name="" class="btn btn-primary btn-block" value="Enviar">
	                </form>
	                
	            </div>
	        </div>
	    </div>
		

	</div>
       


    </div><!-- Main Col END -->
    
</div><!-- body-row END -->
  
  
</div><!-- container -->


<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script type="text/javascript" src="../js/sidebar.js"></script>
