const botones = document.querySelectorAll('.btn-eliminar');



botones.forEach(boton => {

	boton.addEventListener("click", function(){

		const idSolicitudExamen = this.dataset.idsolicitud;

		//console.log(matricula);

		const confirm = window.confirm("Desea aceptar el examen: "+ idSolicitudExamen);

		if(confirm){
			//ejecutamos AJAX

			httpRequest("aceptarSolicitud_back.php/aceptarSolicitud/"+ idSolicitudExamen, function(){

				document.querySelector("#respuesta").innerHTML = this.responseText;
				
				const tbody = document.querySelector('#tbody-examenes');
				const fila = document.querySelector('#fila-'+idSolicitudExamen);

				tbody.removeChild(fila); 

			});
		}


	});


});


function httpRequest(url, callback){
	//crear el objeto http
	http = new XMLHttpRequest();

	//se define el metodo de envio y la url que se va a cargar
	http.open("GET", url);

	//mandamos la solicitud
	http.send();

	// validar que la solicitud http funciono correctamete 
	http.onreadystatechange = function(){

		if(this.readyState == 4 && this.status == 200){
			//mandamos la respuesta atravez de la variable callback con el parametro
			callback.apply(http);
		}


	}


}