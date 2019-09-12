/*=============================================
EDITAR INSTRUMENTOS
=============================================*/
$(document).on("click", ".btnEditarInstrumentos", function(){ 

	var idInstrumentos = $(this).attr("idInstrumentos");
	
	// console.log("idInstrumentos",idInstrumentos);
	var datos = new FormData();
	datos.append("idInstrumentos", idInstrumentos); 

	$.ajax({

		url:"ajax/instrumentostrabajos.ajax.php",
		method: "POST",
		data: datos,
		cache: false,
		contentType: false,
		processData: false,
		dataType: "json",
		success: function(respuesta){
			
			$("#editarInstrumentosid").val(respuesta["id_instrumentos"]);
			$("#editarNombre").val(respuesta["nombre"]);


		}

	}); 

})

/*=============================================
ELIMINAR INSTRUMENTOS
=============================================*/
$(document).on("click", ".btnEliminarInstrumentos", function(){

  var idInstrumentos = $(this).attr("idInstrumentos");

  //var fotoUsuario = $(this).attr("fotoUsuario");
  var idNombre = $(this).attr("idNombre");

  swal({
    title: '¿Deseas Eliminar Este instrumento?',
  	text: "¡No podrás revertir esto!",
  	type: 'warning',
  	showCancelButton: true,
  	confirmButtonColor: '#3085d6',
  	cancelButtonColor: '#d33',
  	confirmButtonText: '¡Sí, Borrarlo!'
  }).then(function(result){

    if(result.value){

      window.location = "index.php?ruta=instrumentos&idInstrumentos="+idInstrumentos+"&idNombre="+idNombre;

    }

  })

})


/*=============================================
EDITAR TRABAJOS
=============================================*/
$(document).on("click", ".btnEditarTrabajos", function(){ 

	var idTrabajos = $(this).attr("idTrabajos");
	
	// console.log("idInstrumentos",idInstrumentos);
	var datos = new FormData();
	datos.append("idTrabajos", idTrabajos); 

	$.ajax({

		url:"ajax/instrumentostrabajos.ajax.php",
		method: "POST",
		data: datos,
		cache: false,
		contentType: false,
		processData: false,
		dataType: "json",
		success: function(respuesta){
			
			$("#editarTrabajosId").val(respuesta["id_trabajo"]);
			$("#editarNombre").val(respuesta["nombre"]);


		}

	}); 

})


/*=============================================
ELIMINAR TRABAJOS
=============================================*/
$(document).on("click", ".btnEliminarTrabajos", function(){

  var idTrabajos = $(this).attr("idTrabajos");

  //var fotoUsuario = $(this).attr("fotoUsuario");
  var idNombre = $(this).attr("idNombre");

  swal({
    title: '¿Deseas Eliminar Este trabajo?',
  	text: "¡No podrás revertir esto!",
  	type: 'warning',
  	showCancelButton: true,
  	confirmButtonColor: '#3085d6',
  	cancelButtonColor: '#d33',
  	confirmButtonText: '¡Sí, Borrarlo!'
  }).then(function(result){

    if(result.value){

      window.location = "index.php?ruta=trabajos&idTrabajos="+idTrabajos+"&idNombre="+idNombre;

    }

  })

})