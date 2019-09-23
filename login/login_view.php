<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<link rel="stylesheet" type="text/css" href="../css/style.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
</head>
<body>

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

</body>
</html>