/*=============================================
EDITAR CLIENTE
=============================================*/
$(document).on("click", ".btnEditarCliente", function(){ 

	var idCliente = $(this).attr("idCliente");
	
	//console.log("idCliente",idCliente);
	var datos = new FormData();
	datos.append("idCliente", idCliente); 

	$.ajax({

		url:"ajax/clientes.ajax.php",
		method: "POST",
		data: datos,
		cache: false,
		contentType: false,
		processData: false,
		dataType: "json",
		success: function(respuesta){
			
			//console.log("respuesta",respuesta);
			$("#editarID").val(respuesta["id_cliente"]);
			$("#editarCliente").val(respuesta["nombre"]);
			$("#editarNit").val(respuesta["nit"]);
			$("#editarDescripcion").val(respuesta["descripcion"]);



		}

	}); 

})

/*=============================================
ELIMINAR CLIENTE
=============================================*/
$(document).on("click", ".btnEliminarCliente", function(){

  var idCliente = $(this).attr("idCliente");

  //var fotoUsuario = $(this).attr("fotoUsuario");
  var cliente = $(this).attr("cliente");

  swal({
    title: '¿Deseas Eliminar Este Cliente?',
  	text: "¡No podrás revertir esto!",
  	type: 'warning',
  	showCancelButton: true,
  	confirmButtonColor: '#3085d6',
  	cancelButtonColor: '#d33',
  	confirmButtonText: '¡Sí, Borrarlo!'
  }).then(function(result){

    if(result.value){

      window.location = "index.php?ruta=cliente&idCliente="+idCliente+"&cliente="+cliente;

    }

  })

})