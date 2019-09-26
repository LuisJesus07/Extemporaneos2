<?php
	
	include ('../DB/conexion.php');
    $base=conectar();

    if(isset($_POST['correo'])){

        $correo = $_POST['correo'];

        //evalua si ya exite el correo madado
        $sql = "SELECT password FROM usuarios WHERE correo='".$correo."'";
        $sqlResult = $base->prepare($sql);
        $sqlResult->execute();
        //obtener la contraseña 
        $password = $sqlResult->fetch()[0];
        $fila = $sqlResult->rowCount();//Contamos el numero de registros que sean igual ala sentencia



        if($fila==1 ){//Si no hay un correo igual hace el insert
            //enviar correo
            mail($correo, "DEPARTAMENTO ACADÉMICO DE CIENCIAS SOCIALES Y JURÍDICAS", "Tu contraseña es:".$password);
            echo 1;
        }else{
            //esa cuenta no esta registrada
            echo 0;
        }

    }else{//Si estan vacios los campos entonces:
        echo '<div class="alert alert-success alert-dismissible fade show text-center" role="alert">
                <span><b>¡Porfavor llena todos los campos.!</b></span>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>';
    }



?>