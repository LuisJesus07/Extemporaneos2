<?php 
	
	$errors = '';
	$soloLetras = '/[a-zA-Z\s]/';
		
		if (isset($_POST['numControl'] )){

				$numControl = $_POST['numControl'];
				$nombre = $_POST['nombre'];
				$apellidoPaterno = $_POST['apellidoPaterno'];
				$apellidoMaterno = $_POST['apellidoMaterno'];
				$correo= $_POST['correo'];
				$password = $_POST['password'];
				$plan = $_POST['plan'];


				if(!empty($nombre)){
					$nombre = trim($nombre);
					$nombre = filter_var($nombre, FILTER_SANITIZE_STRING);
					if(!filter_var($nombre,FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>$soloLetras)))){
						$errors .='Ingresa un Nombre Valido <br />';
					}

				}else{
					$errors .='Ingresa tu Nombre <br />';
				}

				if(!empty($apellidoPaterno)){
					$apellidoPaterno = trim($apellidoPaterno);
					$apellidoPaterno = filter_var($apellidoPaterno, FILTER_SANITIZE_STRING);
					if(!filter_var($apellidoPaterno,FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>$soloLetras)))){
						$errors .='Ingresa un Apellido Valido <br />';
					}
				}else{
					$errors .='Ingresa tu Apellido <br />';
				}


				if (!empty($correo)){
					$correo = filter_var($correo, FILTER_SANITIZE_EMAIL);
					if(!filter_var($correo, FILTER_VALIDATE_EMAIL)){
						$errors .='Ingresa un correo Valido <br />';
					}
					
				} else{
					$errors .='Ingresa un Correo <br />';
				}


				if(!$errors) {

					try{
						include("../DB/conexion.php");

						$base=conectar();

						
				    	$query = "INSERT INTO usuarios (numControl,nombre,apellidoPaterno,apellidoMaterno,correo,password,privilegios,idPlanDeEstudio)
						VALUES(:numControl,:nombre,:apellidoPaterno,:apellidoMaterno,:correo,:password,:privilegios,:idPlanDeEstudio)";

						$resultado = $base->prepare($query);

				
				    	$resultado->execute(array(":numControl"=>$numControl, ":nombre"=>$nombre, ":apellidoPaterno"=>$apellidoPaterno, ":apellidoMaterno"=>$apellidoMaterno,  ":correo"=>$correo, ":password"=>$password,":privilegios"=>2,":idPlanDeEstudio"=>$plan));


				    	$resultado->closeCursor();


					    //En caso de que no ocurra un error redirecciona al login del la pagina para que inicie sesion
					   	header('location:registroExitoso_view.php');

					}catch(Exception $e){
						//En caso de error redirecciona de nuevo al formulario de registro y muestra un error
						echo $e;
						//header('location:error.html');
					}

			    }


		}
	
		require 'login_view.php';
?>