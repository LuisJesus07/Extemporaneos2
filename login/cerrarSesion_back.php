<?php 
	
	session_start();//Se reanuda la sesion iniciada
	session_destroy();//Se destruye la sesion iniciada
	header("location:login_view.php");//Se redirige al login al cerrar sesion


 ?>