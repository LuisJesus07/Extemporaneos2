<?php include '../estructura/headerAdmin.php' ?>

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
		<h1 class="display-4 mt-3">Administrador</h1>
	    <div class="row principal mx-auto">

	    	<div class="col-md-6">
	    		<div class="pricing-container">
	    			<div class="plans">
	    				<h3>Ver Solicitudes</h3>
	    				<img class="d-block mx-auto img" src="../img/consultarExamenes.png">
	    				<a href="filtradoBusquedaAdmin_view.php" class="btn mx-auto mt-3 btn-primary btn-lg">Ver</a>
	    			</div>
	    		</div>
	    	</div>

	    	<div class="col-md-6">
	    		<div class="pricing-container">
	    			<div class="plans">
	    				<h3>Aceptar Solicitudes</h3>
	    				<img class="d-block mx-auto img" src="../img/solicitar.png">
	    				<a href="solicitudesEnEspera_view.php" class="btn mx-auto mt-3 btn-primary btn-lg">Ver</a>
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







<!--<div class="principal">
		
		<div class="opciones">

			<h1>Administrador</h1>

			<div class="opciones-btn">

				<div class="opcion">
					<img src="../img/consultar.png">

					<a href="filtradoBusquedaAdmin_view.php"><input type="button" name="" value="Ver Solicitudes" ></a>
				</div>

				<div class="opcion">
					<img src="../img/inscribir.png">

					<a href="solicitudesEnEspera_view.php"><input type="button" name="" value="Aceptar Solicitudes"></a>
					
				</div>

				
			</div>
			

		</div>-->
