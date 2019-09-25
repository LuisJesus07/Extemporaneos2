$(function(){//Código JQUERY:

    $('#form-register').submit(function(e){//Función para guardar los datos de los inputs y mandar la solicitud a php
        e.preventDefault();//Evita que el navegador se refresque
        const postData = {//Objeto con clave valor de los datos recibidos desde el formulario
            numControl: $("#numControl").val(),
            nombre: $('#nombre').val(),
            apellidoP: $('#apellidoP').val(),
            apellidoM: $('#apellidoM').val(),
            plan: $('#plan').val(),
            email: $('#email').val(),
            password: $('#password').val()
        };
        let url = '../login/insertUsers.php';//Url al archivo de php que haremos el insert
        $.post(url, postData, function(response){//Método POST de Jquery para mandar los datos y la url
            console.log(response);
            if(response==1){
                $('#response').html("<p>¡Te haz registrado correctamente!</p>");
                $('#form-register').trigger("reset");//Limpiamos el formulario
            }else{

                if(response == 2){
                    $('#response').html("<p>Ese numero de control ya exite.</p>");
                    $('#email').val("");
                }else{
                    $('#response').html("<p>Email inválido, intenta con otro.</p>");
                    $('#email').val("");
                }
                
            }

            
        });
        
    });
});