/*=============================================
SUBIENDO LA FOTO DEL USUARIO
=============================================*/
$(".nuevoArchivo").change(function(){

	var imagen = this.files[0]; 
	
	/*============================================= 
  	VALIDAMOS EL FORMATO DE LA IMAGEN SEA JPG O PNG 
  	=============================================*/ 

  	if(imagen["type"] != "image/jpeg" && imagen["type"] != "image/png" && imagen["type"] != "application/pdf"){

  		$(".nuevoArchivo").val("");

  		 swal({
		      title: "Error al subir la imagen/archivo",
		      text: "¡La imagen debe estar en formato JPG/PNG/PDF!",
		      type: "error",
		      confirmButtonText: "¡Cerrar!"
		    });

  	}else if(imagen["size"] > 64000000){

  		$(".nuevaFoto").val("");

  		 swal({
		      title: "Error al subir la imagen",
		      text: "¡La imagen/pdf no debe pesar más de 64MB!",
		      type: "error",
		      confirmButtonText: "¡Cerrar!"
		    });

  	}else{

  		var datosImagen = new FileReader;
  		datosImagen.readAsDataURL(imagen);

  		$(datosImagen).on("load", function(event){

  			var rutaImagen = event.target.result;

  			$(".previsualizar").attr("src", rutaImagen);

  		})

  	}
})



/*=============================================
EDITAR CALIBRACION
=============================================*/
$(".tablas").on("click", ".btnEditarCalibracion", function(){

  var idCalibracion = $(this).attr("idCalibracion");
  
  var datos = new FormData();
  datos.append("idCalibracion", idCalibracion);

  $.ajax({

    url:"ajax/calibracion.ajax.php",
    method: "POST",
    data: datos,
    cache: false,
    contentType: false,
    processData: false,
    dataType: "json",
    success: function(respuesta){
      
      console.log(respuesta);
      $("#editarCliente").val(respuesta["cliente"]);
      $("#editarServicio").val(respuesta["fechacarga"]);
      $("#archivoActual").val(respuesta["archivo"]);
      // $("#editarId").val(respuesta["id"]);
      

      if(respuesta["archivo"] != ""){

        $(".previsualizarEditar").attr("src", respuesta["archivo"]);

      }else{

        $(".previsualizarEditar").attr("src", "vistas/img/usuarios/default/anonymous.png");

      }

    }

  });

})



/*=============================================
ELIMINAR CALIBRACION
=============================================*/
$(".tablas").on("click", ".btnEliminarCalibracion", function(){

  var idCalibracion = $(this).attr("idCalibracion");
  var fotoUsuario = $(this).attr("fotoUsuario");

  swal({
    title: '¿Está seguro de borrar la calibración?',
    text: "¡Si no lo está puede cancelar la accíón!",
    type: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      cancelButtonText: 'Cancelar',
      confirmButtonText: 'Si, borrar usuario!'
  }).then(function(result){

    if(result.value){

      window.location = "index.php?ruta=calibracion&idCalibracion="+idCalibracion+"&fotoUsuario="+fotoUsuario;

    }

  })

})