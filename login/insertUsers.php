<?php
	
	include ('../DB/conexion.php');
    $base=conectar();

    if(isset($_POST['numControl']) && isset($_POST['nombre']) && isset($_POST['apellidoP']) && isset($_POST['apellidoM']) && isset($_POST['email']) && isset($_POST['password']) && isset($_POST['plan'])){

        $numControl = $_POST['numControl'];
        $nombre = $_POST['nombre'];
        $apellidoP = $_POST['apellidoP'];
        $apellidoM = $_POST['apellidoM'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $privilegioUsuario = 2;
        $plan = $_POST['plan'];

        //evalua si ya exite el correo madado
        $sql = "SELECT * FROM usuarios WHERE correo = '".$email."'";
        $sqlResult = $base->prepare($sql);
        $sqlResult->execute();
        $fila = $sqlResult->rowCount();//Contamos el numero de registros que sean igual ala sentencia

        //evaluar si el numero de control ya existe
        $sqlNumControl = "SELECT * FROM usuarios WHERE numControl = '".$numControl."'";
        $sqlResultNumcontrol = $base->prepare($sqlNumControl); 
        $sqlResultNumcontrol->execute();
        $existeNumControl = $sqlResultNumcontrol->rowCount();


        if($fila==0 && $existeNumControl==0){//Si no hay un correo igual hace el insert
            $query = "INSERT INTO usuarios(numControl,nombre,apellidoPaterno,apellidoMaterno,correo,password,privilegios,idPlanDeEstudio) VALUES('$numControl','$nombre','$apellidoP','$apellidoM','$email','$password','$privilegioUsuario','$plan')";
            $result = $base->prepare($query);
            $result->execute();
            echo 1;
        }else{
            //si existe el numero de control mandar un 2
            if($existeNumControl == 1){
                echo 2;
            }else{
                echo 0;
            }
            
        }

        /*if(!$result){
            die("Query Failed!");
        }else{
            echo '<div class="alert alert-success alert-dismissible fade show text-center" role="alert">
                    <span><b> ¡ Registro Exitoso !</b></span>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>';
        }*/

    }else{//Si estan vacios los campos entonces:
        echo '<div class="alert alert-success alert-dismissible fade show text-center" role="alert">
                <span><b>¡Porfavor llena todos los campos.!</b></span>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>';
    }



?>