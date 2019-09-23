
<?php include '../estructura/headerAdmin.php' ?>

<div class="opciones">

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
						<!--<input type="text" name="plan"><br>-->

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
						<!--<input type="text" name="plan">-->
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
		
	</div>


<?php include '../estructura/sidebar.php' ?>