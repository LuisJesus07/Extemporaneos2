const btnEstadoPeriodo = document.querySelector('.btn-estado-periodo');


btnEstadoPeriodo.addEventListener("click", function(){
	//alert("Cambiar Estado periodo");
	httpRequestPeriodo("estadoPeriodo_back.php",2,function(){

		document.querySelector("#response").innerHTML = this.responseText;
		
	})
})







function httpRequestPeriodo(url,estado, callback){
	//crear el objeto http
	http = new XMLHttpRequest();

	//se define el metodo de envio y la url que se va a cargar
	http.open("POST", url);

	http.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

	//mandamos la solicitud
	http.send('estado='+estado);

	// validar que la solicitud http funciono correctamete 
	http.onreadystatechange = function(){

		if(this.readyState == 4 && this.status == 200){
			//mandamos la respuesta atravez de la variable callback con el parametro
			callback.apply(http);
		}


	}

}
