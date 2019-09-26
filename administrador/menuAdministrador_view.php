<?php include '../estructura/headerAdmin.php' ?>

<div class="principal">
		
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
			

		</div>

<?php include '../estructura/sidebar.php' ?>