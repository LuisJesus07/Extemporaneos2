<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<link rel="stylesheet" type="text/css" href="../css/style.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
	<link href='https://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
	<!--<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">-->
	<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
</head>
<body>
<!--
	<header class="header">

		<div class="main-header">

			
			<div class="menu-container login">
				<nav class="menu">
					<ul class="main-menu">
						<form method="POST" action="iniciarSesion_back.php">
							<label>Correo: </label>
							<input type="text" name="correo">

							<label>Contraseña: </label>
							<input type="text" name="password">
							
							<input type="submit" name="" value="Ingresar">
						</form>
					</ul>
				</nav>
			</div>

			<div class="logo">

				<a href=""><img src="../img/logouabcs1.png"></a>
				
			</div>
			
			
		</div>

	</header>

	<div class="login-principal">

		<div class="form-registro">
			<form method="POST" action="guardarUsuario_back.php" name="form-registro">

				<label>Numero de Control: </label>
				<input type="text" name="numControl">

				<label>Nombre: </label>
				<input type="text" name="nombre">

				<label>Apellido Paterno: </label>
				<input type="text" name="apellidoPaterno">

				<label>Apellido Materno: </label>
				<input type="text" name="apellidoMaterno">

				<label>Correo: </label>
				<input type="text" name="correo">

				<label>Contraseña: </label>
				<input type="text" name="password">

				<label>Plan de Estudios: </label>
				<input type="text" name="plan">

				<?php if(!empty($errors)): ?>
					<div class="alert alert-danger">
						<?php echo $errors ?>
					</div>
				<?php endif ?>


				<input type="submit" name="" value="Registrarme">
				
			</form>
		</div>	

	</div>

-->

	<section class="principal">
		<h1>DEPARTAMENTO ACADÉMICO DE CIENCIAS SOCIALES Y JURÍDICAS</h1>
		<h2>SOLICITUD DE EXÁMENES EXTEMPORANEOS</h2>
		<p>Regístrate en la plataforma para realizar tus solicitudes de exámenes extemporáneos, toma en cuenta que por reglamento se tiene derecho a dos exámenes por periodo, a partir de la tercera solicitud serán sujetas a aprobación. </p>
		<a href="#" class="bt-home" id="activarLogin"><i class="fas fa-sign-in-alt separar"></i></i>Ingresar</a>
		<a href="" class="bt-home" id="activarRegistro"><i class="fa fa-user-plus separar" aria-hidden="true"></i>
 		Registrarme</a>
	</section>
	<div class="login" id="login">
		<a href="" class="cerrar" id="cerrar"><i class="fa fa-times" aria-hidden="true"></i></a>
		<form method="POST" action="iniciarSesion_back.php">
			<input type="email" name="correo" required placeholder="Usuario">
			<input type="password" name="password" requered placeholder="********">
			<input type="submit" value="Entrar" >
		</form>
	</div>
	<div class="oscurecer" id="oscurecer"></div>

	<div class="registrar" id="registrar">
		<div class="cerrarRegistro" id="cerrarRegistro">
			x
		</div>
		<h1>Registro</h1>
		<form method="POST" action="guardarUsuario_back.php">
			<input type="text" name="numControl" placeholder="Numero de Control">
			<input type="text" name="nombre" placeholder="Nombre">
			<input type="text" name="apellidoPaterno" placeholder="Apellido Paterno">
			<input type="text" name="apellidoMaterno" placeholder="Apellido materno">
			<input type="email" name="correo" placeholder="Correo">
			<input type="password" name="password" placeholder="Contraseña">
			<label>Plan de Estudio: </label>
			<select name="plan">
				<option value="1">Comunicación 2000</option>
				<option value="2">Comunicación 2010</option>
				<option value="3">Derecho 1993</option>
				<option value="4">Derecho 2012</option>
				<option value="5">Criminología 2018</option>
				<option value="6">CP y AP 1978</option>
				<option value="7">CP y AP 1995</option>
			</select>


			<input type="submit" value="Crear">
		</form>
	</div>
	

</body>
	<!--<script type="text/javascript" src="js/jquery-1.12.3.min.js"></script>-->
	<script type="text/javascript" src="../js/buttons/jquery-3.3.1.js"></script>
	<script type="text/javascript" src="../js/acciones.js"></script>
</html>