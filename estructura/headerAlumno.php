<?php
session_start(); 
if(empty($_SESSION['datosUsuario']['privilegios']) || $_SESSION['datosUsuario']['privilegios'] != 2){
	header("location:../login/login_view.php");
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Extemporaneos</title>
	<link rel="stylesheet" type="text/css" href="../css/style.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>

	<header class="header">

		<div class="main-header">

			

			<div class="menu-container">


				<nav class="menu">
					<ul class="main-menu">

						<li>
							<a href="solicitarExamen_view.php">Solicitar Examen</a>
						</li>

						<li>
							<a href="consultarExamenes_view.php">Mis Solicitudes</a>
						</li>

						<li>
							<a href="../login/cerrarSesion_back.php"><i class="fas fa-sign-out-alt salir"></i></a>
						</li>					

					</ul>

					
				</nav>

				

			</div>

			<div class="logo">

				<a href="<?php echo constant('URL') ?>main/main"><img src="../img/logouabcs1.png"></a>
				
			</div>
			
			
		</div>

	</header>

</body>
</html>