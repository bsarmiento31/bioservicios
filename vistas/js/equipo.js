//Editar Equipo
$(".tablas").on("click", ".btnEditarEquipo", function(){

	var idEquipoE = $(this).attr("idEquipoE");
  
	// console.log("idEquipo",idEquipo);

	  var datos = new FormData();  
    datos.append("idEquipoE", idEquipoE); 
  
 
    $.ajax({
 
      url:"ajax/equipos.ajax.php",
      method: "POST",
      data: datos,
      cache: false,
      contentType: false, 
      processData: false,
      dataType:"json",
      success:function(respuesta){

      // console.log("respuesta",respuesta);

        
       $("#idEquipo").val(respuesta["id_equipo"]);
       $("#editarUsuario").val(respuesta["id_usuario"]);
	     $("#editarEquipo").val(respuesta["equipo"]);
	     $("#editarCarhh").val(respuesta["marca"]);
	     $("#editarModelo").val(respuesta["modelo"]);
	     $("#editarSerie").val(respuesta["serie"]);
       $("#editarMarcaText").val(respuesta["marcaText"]);
       $("#editarObservacion").val(respuesta["observaciones"]);
       $("#editarMes").val(respuesta["mes"]);
       $("#editarMedicion").val(respuesta["mediciones"]);
       $("#editarObservacionCronograma").val(respuesta["observacionesCro"]);
       $("#editarCodigo").val(respuesta["codigo"]);


       

         
	  }

  	})

 })
 
 
 //Mostrar Las Mediciones
$(".tablas").on("click", ".mostrarMediciones", function(){

  var idEquipoTr = $(this).attr("idEquipoMediciones");
 
 

    var datos = new FormData(); 
    datos.append("idEquipoTr", idEquipoTr); 
  
 
    $.ajax({

      url:"ajax/equipos.ajax.php",
      method: "POST",
      data: datos,
      cache: false,
      contentType: false, 
      processData: false,
      dataType:"json",
      success:function(respuesta){

        $("#medicionesMostrar").text(respuesta["mediciones"]);
       

      }

    })

 })



//Editar trabajos y Instrumentos
$(".tablas").on("click", ".btnEditarTrabajosInstrumentos", function(){

  var idEquipoTr = $(this).attr("idEquipoTr");
 
  // console.log("idEquipo",idEquipo);

    var datos = new FormData(); 
    datos.append("idEquipoTr", idEquipoTr); 
  
 
    $.ajax({

      url:"ajax/equipos.ajax.php",
      method: "POST",
      data: datos,
      cache: false,
      contentType: false, 
      processData: false,
      dataType:"json",
      success:function(respuesta){

        
        $("#EquipoInstrTra").val(respuesta["id_equipo"]);
       var instrumentos = respuesta["instr_utilizados"];
       var instrumentosSplit = instrumentos.split("#");
       $("#editarInstrumentoE").val(respuesta["instr_utilizados"]);

       $("#instrumentosMostrar").text(instrumentosSplit);

       var trabajos = respuesta["traba_realizados"];
       var trabajosSplit = trabajos.split("-");

       $("#trabajosMostrar").text(trabajosSplit);
       $("#editarTrabajosE").val(respuesta["traba_realizados"]);
         
    }

    })

 })

//Eliminar Equipo

$(".tablas").on("click", ".btnEliminarEquipo", function(){

  var idEquipo = $(this).attr("idEquipo");

      swal({
        title: '¿Está seguro de borrar el equipo?',
        text: "¡Si no lo está puede cancelar la acción!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        cancelButtonText: 'Cancelar',
        confirmButtonText: 'Si, borrar equipo!'
      }).then(function(result){
        if (result.value) {
          
            window.location = "index.php?ruta=equipos&idEquipo="+idEquipo;
        }

  })

 
})

//VALIDAR SERIE
$("#nuevoSerieE").change(function(){

  $(".alert").remove();

  var serie = $(this).val();

  var datos = new FormData(); 
  datos.append("validarSerieE", serie);

   $.ajax({
      url:"ajax/equipos.ajax.php",
      method:"POST",
      data: datos,
      cache: false,
      contentType: false,
      processData: false,
      dataType: "json",
      success : function(respuesta){

        console.log("respuesta",respuesta);
        if(respuesta){

          $("#nuevoSerieE").parent().after('<div class="alert alert-warning">Esta serie ya existe en la base de datos</div>');

          $("#nuevoSerieE").val("");

        }

      }

  })
})

/*=============================================
ACTIVAR DADO DE BAJA
=============================================*/
$(document).on("click", ".btnDadoBaja", function(){

  var idEquipo = $(this).attr("idEquipo");
  var estadoUsuario = $(this).attr("estadoUsuario");

  // console.log("idEquipo",idEquipo);
  // console.log("estadoUsuario",estadoUsuario);

  var datos = new FormData();

  datos.append("idEquipo", idEquipo);
  datos.append("estadoUsuario", estadoUsuario);

  $.ajax({
    url:"ajax/equipos.ajax.php",
    method: "POST",
    data: datos,
    cache: false,
    contentType: false,
    processData: false,
    success: function(respuesta){
      if(window.matchMedia("(max-width:767px)").matches){
    
           swal({
            title: "El equipo ha sido actualizado",
            type: "success",
            confirmButtonText: "¡Cerrar!"
          }).then(function(result) {
            
              if (result.value) {

              window.location = "equipo";

            }

          });


    }

    }
  })

  if(estadoUsuario == 0)
  {

      $(this).removeClass('btn-success');
      $(this).addClass('btn-danger');
      $(this).html('Desactivado');
      $(this).attr('estadoUsuario',1);

    }
    else
    {

      $(this).addClass('btn-success');
      $(this).removeClass('btn-danger');
      $(this).html('Activado');
      $(this).attr('estadoUsuario',0);
 
    }


})

//Agregar Observacion
$(".tablas").on("click", ".btnObservacion", function(){

  var idEquipoObservacion = $(this).attr("idEquipoObservacion");

  // console.log("idEquipo",idEquipo);

    var datos = new FormData();
    datos.append("idEquipoObservacion", idEquipoObservacion); 
 
 
    $.ajax({

      url:"ajax/equipos.ajax.php",
      method: "POST",
      data: datos,
      cache: false,
      contentType: false,
      processData: false,
      dataType:"json",
      success:function(respuesta){

       $("#idEquipoObservacion").val(respuesta["id_equipo"]);


 
    }

    })

 })


//Agregar Observacion
$(".tablas").on("click", ".btnLlenarCronograma", function(){

  var idEquipoCronograma = $(this).attr("idEquipoCronograma");

  // console.log("idEquipoCronograma",idEquipoCronograma);

   var datos = new FormData();
    datos.append("idEquipoCronograma", idEquipoCronograma); 

    $.ajax({

      url:"ajax/equipos.ajax.php",
      method: "POST",
      data: datos,
      cache: false,
      contentType: false,
      processData: false,
      dataType:"json",
      success:function(respuesta){

       $("#idEquipoCronogramaEnviado").val(respuesta["id_equipo"]); 
       $("#nuevoMes").val(respuesta["mes"]);
       $("#nuevoObservacion").val(respuesta["observacionesCro"]);  
 
    }

    })

 })

//Agregar Instrumentos 

// $(document).on("click", ".btnAddInstrumentos", function(){

//   var instrumentos = null;

//   var datos = new FormData();
//   datos.append("instrumentos",instrumentos);

//   $.ajax({
//     url:"ajax/equipos.ajax.php",
//         method: "POST",
//         data: datos,
//         cache: false,
//         contentType: false,
//         processData: false,
//         dataType:"json",
//         success:function(respuesta){
//           // console.log("respuesta",respuesta);

//           var id = respuesta["id"];
//           var nombre = respuesta["nombre"];
//           var recorrer = respuesta;


//           $(".nuevoInstrumento").append(
//               '<div class="input-group">'+
//                 '<span class="input-group-addon"><i class="fa fa-wrench"></i></span>'+
//                 '<select class="form-control select2" name="nuevoInstrumentoE[]" multiple="multiple" data-placeholder="Instrumentos utilizados" style="width: 100%;">'+
//                   '</div>')
//                 for(var i = 0; i < recorrer.length; i++) {
//                   $(".opcion").append(
//                     '<option value="i[id]">i[nombre]</option>')
//                 }

//         }

//   })

// })



/*=============================================
REVISAR SI EL CODIGO ESTA REGISTRADO
=============================================*/

$("#codigoEstado").change(function(){

  $(".alert").remove();

  var codigo = $(this).val(); 

  // console.log(codigo);

  var datos = new FormData();
  datos.append("codigo", codigo);

   $.ajax({
      url:"ajax/equipos.ajax.php",
      method:"POST",
      data: datos,
      cache: false,
      contentType: false,
      processData: false,
      dataType: "json",
      success:function(respuesta){

        console.log(respuesta);
        
        if(respuesta){

          $("#codigoEstado").parent().after('<div class="alert alert-warning">Este código ya existe en la base de datos</div>');

          $("#codigoEstado").val("");  
        }

      }

  })
})



/*=============================================
REVISAR SI EL CODIGO ESTA REGISTRADO CUANDO SE VA A EDITAR
=============================================*/

$(".codigoEstadoEditar").change(function(){

  $(".alert").remove();

  var codigo = $(this).val(); 

  var datos = new FormData();
  datos.append("codigo", codigo);

   $.ajax({
      url:"ajax/equipos.ajax.php",
      method:"POST",
      data: datos,
      cache: false,
      contentType: false,
      processData: false,
      dataType: "json",
      success:function(respuesta){

        console.log(respuesta);
        
        if(respuesta){

          $(".codigoEstadoEditar").parent().after('<div class="alert alert-warning">Este código ya existe en la base de datos</div>');

          $(".codigoEstadoEditar").val("");  
        }

      }

  })
})


  




