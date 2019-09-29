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
		<h1 class="display-4 mt-3">Filtrar Busqueda</h1>
	    <div class="row principal mx-auto">

	    	<div class="col-md-6">
	    		<div class="pricing-container">
	    			<div class="plans">
	    				<h3>Por Carrera</h3>
	    				<form method="POST" action="examenesPorCarrera_view.php">

							<select class="form-control" name="carrera">
								<option>Licenciatura en Comunicación</option>
								<option>Licenciatura en Derecho</option>
								<option>Licenciatura en Criminología</option>
								<option>Licenciatura en Ciencias Políticas y Administración Pública</option>
							</select><br>

							<input class="btn btn-success" type="submit" name="" value="Buscar">
						
					</form>
	    			</div>
	    		</div>
	    	</div>

	    	<div class="col-md-6">
	    		<div class="pricing-container">
	    			<div class="plans">
	    				<h3>Por Plan</h3>

	    				<form method="POST" action="examenesPorPlan_view.php">

							<select class="form-control" name="plan">
								<option>Comunicación 2000</option>
								<option>Comunicación 2010</option>
								<option>Derecho 1993</option>
								<option>Derecho 2012</option>
								<option>Criminología 2018</option>
								<option>CP y AP 1978</option>
								<option>CP y AP 1995</option>
							</select><br>

							<input class="btn btn-success" type="submit" name="" value="Buscar">
						
						</form>
	    			</div>
	    		</div>
	    	</div>

	    	<div class="col-md-6">
	    		<div class="pricing-container">
	    			<div class="plans">
	    				<h3>Por Materia</h3>
	    				<form method="POST" action="examenesPorMateria_view.php">

	    					<label class="display-5">Plan:</label>
							<select class="form-control" id="plan" name="plan">
								<option value="1">Comunicación 2000</option>
								<option value="2">Comunicación 2010</option>
								<option value="3">Derecho 1993</option>
								<option value="4">Derecho 2012</option>
								<option value="5">Criminología 2018</option>
								<option value="6">CP y AP 1978</option>
								<option value="7">CP y AP 1995</option>
							</select>

							
							<label>Materia: </label>
							<div id="materia"></div>
							<!--<input class="form-control" type="text" name="materia">--><br>
							

							<input class="btn btn-success" type="submit" name="" value="Buscar">
						
						</form>
	    			</div>
	    		</div>
	    	</div>

	    </div>
	</div>



<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script type="text/javascript" src="../js/sidebar.js"></script>
<script type="text/javascript" src="../js/selectMaterias.js"></script>

<!--<div class="opciones">

		<div class="panel">

			<h2>Filtrar Busqueda</h2>

			<div class="panel filtro">
				<div class="por-carrera">
					<form method="POST" action="examenesPorCarrera_view.php">

						<h4>Por Carrera</h4>

						<select name="carrera">
							<option>Licenciatura en Comunicación</option>
							<option>Licenciatura en Derecho</option>
							<option>Licenciatura en Criminología</option>
							<option>Licenciatura en Ciencias Políticas y Administración Pública</option>
						</select><br>

						<input type="submit" name="" value="Buscar">
						
					</form>
				</div>
			</div>

			<div class="panel filtro">
				<div class="por-plan">
					<form method="POST" action="examenesPorPlan_view.php">

						<h4>Por Plan</h4>
						<input type="text" name="plan"><br>

						<select name="plan">
							<option>Comunicación 2000</option>
							<option>Comunicación 2010</option>
							<option>Derecho 1993</option>
							<option>Derecho 2012</option>
							<option>Criminología 2018</option>
							<option>CP y AP 1978</option>
							<option>CP y AP 1995</option>
						</select><br>

						<input type="submit" name="" value="Buscar">
						
					</form>
				</div>
			</div>

			<div class="panel filtro">
				<div class="por-materia" >
					<form method="POST" action="examenesPorMateria_view.php">

						<h4>Por Materia:</h4><br>

						<label>Plan: </label>
						<input type="text" name="plan">
						<select name="plan">
							<option>Comunicación 2000</option>
							<option>Comunicación 2010</option>
							<option>Derecho 1993</option>
							<option>Derecho 2012</option>
							<option>Criminología 2018</option>
							<option>CP y AP 1978</option>
							<option>CP y AP 1995</option>
						</select><br>

						<div class="input-materia">
							<label>Materia: </label>
							<input type="text" name="materia">
						</div>

						<input type="submit" name="" value="Buscar">
						
					</form>
				</div>
			</div>
			
		</div>
		
	</div> -->
