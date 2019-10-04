<?php include '../estructura/headerAdmin.php' ?>

<?php  
include("../DB/conexion.php");
$base=conectar();


//obtener examenes aceptados por carrera
$query = "SELECT estado FROM periodo;";

$resultado = $base->prepare($query);


$resultado->execute();

$periodo = $resultado->fetch()[0];



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
            <a href="filtradoBusquedaAdmin_view.php" class="bg-dark list-group-item list-group-item-action">
                <div class="d-flex w-100 justify-content-start align-items-center">
                    <span class="fa fa-clipboard-list fa-fw mr-3"></span>
                    <span class="menu-collapsed">Ver Solicitudes</span>
                </div>
            </a>
            <a href="solicitudesEnEspera_view.php" class="bg-dark list-group-item list-group-item-action">
                <div class="d-flex w-100 justify-content-start align-items-center">
                    <span class="fa fa-clipboard fa-fw mr-3"></span>
                    <span class="menu-collapsed">Aceptar Solicitudes</span>
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
    
	<div class="col text-center">
		<h1 class="display-4 mt-3">Configuraciones</h1>
		<div class="row principal mx-auto">
		    <div class="col-md-6">

		    	<div class="card card-config">
		    		<div class="card-header" style="background-color: #132644;">
		    			<h3>Periodo de solicitudes</h3>
		    		</div>
		    		<div class="card-body">
		    			<p>Cuando el periodo este activo, los alumnos podran realizar las solicitudes de examenes, en caso de no estarlo, las solicitudes no seran registradas.</p>
		    			<?php if($periodo==1){ ?>
		    				<h4 class="alert alert-success">Estado Actual : Activo</h4>

		    				<a class="btn mx-auto mt-3 btn-outline-danger btn-lg btn-estado-periodo">Desactivar</a>
		    			<?php }else{ ?>
		    				<h4 class="alert alert-warning">Estado Actual : Inactivo</h4>

		    				<a class="btn mx-auto mt-3 btn-outline-success btn-lg btn-estado-periodo">Activar</a>
		    			<?php } ?>

		    			<div id="response"></div>
		    		
		    		</div>
		    	</div>
		    </div>

		    <div class="col-md-6">

		    	<div class="card card-config">
		    		<div class="card-header" style="background-color: #f8d7da; color: #721c24;">
		    			<h3>Reiniciar ciclo de extemporaneos</h3>
		    		</div>
		    		<div class="card-body">
		    			<p>Al reiniciar el ciclo de extemporaneos se borraran todos los registros de examenes actuales, por lo que solo se debe de reiniciar una vez concluido el periodo de solicitudes.</p>

		    			<a href="#" class="btn mx-auto mt-3 btn-outline-danger btn-lg">Reiniciar</a>
		    		</div>
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
<script type="text/javascript" src="../js/estadoPeriodo.js"></script>