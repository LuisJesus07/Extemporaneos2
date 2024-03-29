<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<link rel="stylesheet" type="text/css" href="../css/style.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
	<link href='https://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
	<meta http-equiv="Content-type" content="text/html; charset=utf-8" />

</head>
<body>

	<section class="principal">
		<h1>DEPARTAMENTO ACADÉMICO DE CIENCIAS SOCIALES Y JURÍDICAS</h1>
		<h2>SOLICITUD DE EXÁMENES EXTEMPORANEOS</h2>
		<p>Regístrate en la plataforma para realizar tus solicitudes de exámenes extemporáneos, toma en cuenta que por reglamento se tiene derecho a dos exámenes por periodo, a partir de la tercera solicitud serán sujetas a aprobación. </p>
		<a href="" class="bt-home" id="activarLogin"><i class="fas fa-sign-in-alt separar"></i></i>Ingresar</a>
		<a href="" class="bt-home" id="activarRegistro"><i class="fa fa-user-plus separar" aria-hidden="true"></i>
 		Registrarme</a>
	</section>

	<div class="login" id="login">
		<a href="" class="cerrar" id="cerrar"><i class="fa fa-times" aria-hidden="true"></i></a>
		<form method="POST" action="iniciarSesion_back.php">
			<input type="text" name="correo" required placeholder="Usuario">
			<input type="password" name="password" requered placeholder="********">
			<input type="submit" value="Entrar" >
		</form>
		<a href="#" onclick="aparecerRecuperarPassword()">Olvide mi contrseña</a>
	</div>
	<div class="oscurecer" id="oscurecer"></div>

	<div class="registro-exitoso">
		<img src="../img/correcto.png">
		<label>¡Te haz registrado correctamente!</p></label>
		<button onclick="desparecerExito()">Aceptar</button>
	</div>

	<div class="recuperar-password">
		<div class="cerrarRegistro" onclick="desaparecerRecuperarPassword()">
			x
		</div>
		<img src="../img/icono-password.png">
		<form id="form-recuperar-password">
			<label>Ingresa tu correo electronico para recuperar tu contrseña.</label>
			<input type="email" id="correo">

			<input type="submit" name="" value="Enviar">
			<div id="response-password"></div>
		</form>
	</div>

	<div class="registrar" id="registrar">
		<div class="cerrarRegistro" id="cerrarRegistro">
			x
		</div>
		<h1>Registro</h1>
		<form id="form-register" autocomplete="off">
			
			<input type="text" name="numControl" id="numControl" placeholder="Numero de Control" required>
			<input type="text" name="nombre" id="nombre" placeholder="Nombre" required>
			<input type="text" name="apellidoPaterno" id="apellidoP" placeholder="Apellido Paterno" required>
			<input type="text" name="apellidoMaterno" id="apellidoM" placeholder="Apellido materno" required>
			<input type="email" name="correo" id="email" placeholder="Correo">
			<input type="password" name="password" id="password" placeholder="Contraseña" required>
			<label>Plan de Estudio: </label>
			<select name="plan" id="plan" required>
				<option value="1">Comunicación 2000</option>
				<option value="2">Comunicación 2010</option>
				<option value="3">Derecho 1993</option>
				<option value="4">Derecho 2012</option>
				<option value="5">Criminología 2018</option>
				<option value="6">CP y AP 1978</option>
				<option value="7">CP y AP 1995</option>
			</select>
			<div id="response"></div>

			<input type="submit" value="Registrarse">
			
		</form>
	</div>
	

</body>
	<!--<script type="text/javascript" src="js/jquery-1.12.3.min.js"></script>-->
	<script src="https://code.jquery.com/jquery-3.4.1.min.js"
    integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
    crossorigin="anonymous"></script>
	<script type="text/javascript" src="../js/acciones.js"></script>
	<script type="text/javascript" src="../js/registro.js"></script>
	<script type="text/javascript" src="../js/recuperarPassword.js"></script>
</html>