
//VARIABLE LOCAL STORAGE, esto quiere decir que si la variable no viene vacia que quede con el rango
//que selecciono el usuario, si no que quede cuando carga la primera vez
  
if (localStorage.getItem("capturarRango") != null) {  
  
	$("#daterange-btn span").html(localStorage.getItem("capturarRango")); 

}else{

	$("#daterange-btn span").html('<i class="fa fa-calendar"></i> Fecha del servicio');
} 

if (localStorage.getItem("capturarRango5") != null) {
 
  $("#daterangeproximo-btn span").html(localStorage.getItem("capturarRango5"));

}else{

  $("#daterangeproximo-btn span").html('<i class="fa fa-calendar"></i> Fecha del proximo mantenimiento');
} 


//VARIABLE LOCAL STORAGE, esto quiere decir que si la variable no viene vacia que quede con el rango
//que selecciono el usuario, si no que quede cuando carga la primera vez
 
if (localStorage.getItem("capturarRangonopreventivo") != null) {  
 
  $("#daterange-btnpreventivo span").html(localStorage.getItem("capturarRangonopreventivo")); 

}else{

  $("#daterange-btnpreventivo span").html('<i class="fa fa-calendar"></i> Fecha del servicio');
} 

if (localStorage.getItem("capturarRangoproximopreventivo") != null) {
 
  $("#daterangeproximo-btnpreventivo span").html(localStorage.getItem("capturarRangoproximopreventivo"));

}else{

  $("#daterangeproximo-btnpreventivo span").html('<i class="fa fa-calendar"></i> Fecha del proximo mantenimiento');
} 


/*=============================================
CARGAR LA TABLA DINÁMICA DE CRONOGRAMA EN CREAR MANTENIMIENTO
=============================================*/

$('.tablaCronograma').DataTable( {
    "ajax": "ajax/datatable-cronograma.ajax.php",

  
    "deferRender": true,
	"retrieve": true, 
	"processing": true,
	 "language": {

			"sProcessing":     "Procesando...",
			"sLengthMenu":     "Mostrar _MENU_ registros",
			"sZeroRecords":    "No se encontraron resultados",
			"sEmptyTable":     "Ningún dato disponible en esta tabla",
			"sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_",
			"sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0",
			"sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
			"sInfoPostFix":    "",
			"sSearch":         "Buscar:",
			"sUrl":            "",
			"sInfoThousands":  ",",
			"sLoadingRecords": "Cargando...",
			"oPaginate": {
			"sFirst":    "Primero",
			"sLast":     "Último",
			"sNext":     "Siguiente",
			"sPrevious": "Anterior"
			},
			"oAria": {
				"sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
				"sSortDescending": ": Activar para ordenar la columna de manera descendente"
			}

	}

} );


//VALIDAR SERIE SI ES ENVIADA NUEVA DESDE EL CREAR MANTENIMIENTO
$("#serieValida").change(function(){

	$(".alert").remove();

	var serie = $(this).val();

  // console.log("serie",serie);

	var datos = new FormData();
	datos.append("validarSerieM", serie);

	 $.ajax({
	    url:"ajax/mantenimiento.ajax.php",
	    method:"POST",
	    data: datos,
	    cache: false,
	    contentType: false,
	    processData: false,
	    dataType: "json",
	    success:function(respuesta){
	    	// console.log("respuesta",respuesta);
	    	if(respuesta){

	    	 	$("#serieValida").parent().after('<div class="alert alert-warning">Esta serie ya existe en la base de datos</div>');

	    	 	$("#serieValida").val("");

	    	} 

	    }

	})
})

//VALIDAR SERIE SI ES ENVIADA LA MISMA DEL EQUIPO DESDE EL CREAR MANTENIMIENTO
$(".nuevoSerienuevo").change(function(){

  $(".alert").remove();

  var serie25 = $(this).val();

  // console.log("serie25",serie25);

  var datos = new FormData();
  datos.append("serie25", serie25);

   $.ajax({
      url:"ajax/mantenimiento.ajax.php",
      method:"POST",
      data: datos,
      cache: false,
      contentType: false,
      processData: false,
      dataType: "json",
      success:function(respuesta){

        // console.log(respuesta);
        
        if(respuesta["reporte"] != 0) {

          $(".nuevoSerienuevo").parent().after('<div class="alert alert-warning">Esta serie ya se realizo un mantenimiento</div>');

          $(".nuevoSerienuevo").val("");

        }

        // console.log("respuesta",respuesta);
        if (respuesta["baja"] == 0) {

          $(".nuevoSerienuevo").parent().after('<div class="alert alert-danger">El equipo de esta serie fue dado de baja</div>');

          $(".nuevoSerienuevo").val("");
        }



      }

  })
})





/*=============================================
BOTON EDITAR MANTENIMIENTO
=============================================*/
$(".tablas").on("click", ".btnEditarMantenimiento", function(){

	var idMantenimiento = $(this).attr("idMantenimiento");
  var idMantenimientoNo = $(this).attr("idMantenimientoNo");

  console.log("idMantenimiento",idMantenimiento);
  console.log("idMantenimientoNo",idMantenimientoNo);


	window.location = "index.php?ruta=editar-mantenimiento&idMantenimiento="+idMantenimiento+"&idMantenimientoNo="+idMantenimientoNo;


})

// /*=============================================
// BOTON EDITAR MANTENIMIENTO NO PREVENTIVO
// =============================================*/
// $(".tablas").on("click", ".btnEditarMantenimientoNoPreventivo", function(){

//   var idMantenimiento = $(this).attr("idMantenimiento");

//   // console.log("idMantenimiento",idMantenimiento);

//   window.location = "index.php?ruta=editar-mantenimiento&idMantenimiento="+idMantenimiento;


// })

/*=============================================
SUBIENDO LA FOTO DE LA FIRMA DE RECIBIDO
=============================================*/
$(".nuevaFirma").change(function(){

	var imagen = this.files[0]; 

	//console.log("imagen",imagen);
	
	/*=============================================
  	VALIDAMOS EL FORMATO DE LA IMAGEN SEA JPG O PNG
  	=============================================*/ 

  	if(imagen["type"] != "image/jpeg" && imagen["type"] != "image/png"){

  		$(".nuevaFirma").val("");

  		 swal({
		      title: "Error al subir la imagen",
		      text: "¡La imagen debe estar en formato JPG o PNG!",
		      type: "error",
		      confirmButtonText: "¡Cerrar!" 
		    });
 
  	}else if(imagen["size"] > 2000000){

  		$(".nuevaFirma").val("");

  		 swal({
		      title: "Error al subir la imagen",
		      text: "¡La imagen no debe pesar más de 2MB!",
		      type: "error",
		      confirmButtonText: "¡Cerrar!"
		    });

  	}else{

  		var datosImagen = new FileReader;
  		datosImagen.readAsDataURL(imagen);

  		$(datosImagen).on("load", function(event){

  			var rutaImagen = event.target.result;

  			$(".previsualizarFirma").attr("src", rutaImagen);

  		})

  	}
})


//ACTUALIZAR INFORME DEL CAMPO INFORME

$(".btnmirarreporte").click(function (){

  var mirarReporte = $(this).attr("reporteNum");
  // console.log("mirarReporte",mirarReporte);

    var datos = new FormData();  
    datos.append("mirarReporte", mirarReporte);

    $.ajax({
 
      url:"ajax/mantenimiento.ajax.php",
      method: "POST",
      data: datos,
      cache: false,
      contentType: false, 
      processData: false,
      dataType:"json",
      success:function(respuesta){

      // console.log("respuesta",respuesta);

       if (respuesta == false) {

         swal({

            type: "success",
            title: "No hay reportes con este numero",
            showConfirmButton: true,
            confirmButtonText: "Cerrar"

          });

       $('#boton').attr("disabled", false);

       
      }
      else{

     

        var capturarInforme = respuesta["num_reporte"];

        var InformeFinal = parseInt(capturarInforme) + parseInt(1);

          $("#informeCapturado").val(InformeFinal);

          $('#boton').attr("disabled", false);

      }
      
         
    }

    })


});
//NO ENVIAR EL CAMPO INFORME A LA BASE DE DATOS

// $(".mirarReporteFinal").click(function (){

//   var reporteNum = $(this).attr("reporteNum");
//   console.log("reporteNum",reporteNum);

//     var datos = new FormData();  
//     datos.append("reporteNum", reporteNum);

//     $.ajax({
 
//       url:"ajax/mantenimiento.ajax.php",
//       method: "POST",
//       data: datos,
//       cache: false,
//       contentType: false, 
//       processData: false,
//       dataType:"json",
//       success:function(respuesta){

//       // console.log("respuesta",respuesta);

//        if (respuesta == false) {

//          swal({

//             type: "success",
//             title: "No hay reportes con este numero, puede enviar los datos",
//             showConfirmButton: true,
//             confirmButtonText: "Cerrar"

//           });

//          $('#boton').attr("disabled", false);

   
//       }
//       else{

      

//         swal({

//             type: "success",
//             title: "Ya hay reportes con este numero, favor cambiar el numerro e intenter nuevamente",
//             showConfirmButton: true,
//             confirmButtonText: "Cerrar"

//           });
      
//         $('#boton').attr("disabled", true);


//       }
      
         
//     }

//     })


// });



//Editar Equipo
$(".tablas").on("click", ".btnFirmaMant", function(){

  var idFirmaMant = $(this).attr("idMantenimientoFirma");
  
  // console.log("idFirmaMant",idFirmaMant);

    var datos = new FormData();  
    datos.append("idFirmaMant", idFirmaMant); 
  
 
    $.ajax({
 
      url:"ajax/mantenimiento.ajax.php",
      method: "POST",
      data: datos,
      cache: false,
      contentType: false, 
      processData: false,
      dataType:"json",
      success:function(respuesta){

      // console.log("respuesta",respuesta);

      $("#idreporte").val(respuesta["id_reporte"]);
      $("#firmaactual").val(respuesta["firma"]);
      $("#reportetraer").val(respuesta["num_reporte"]);
         
    }

    })

 })


/*=============================================
SUBIENDO LA FOTO DE LA FIRMA DE QUIEN REALIZA EL MANTENIMIENTO
=============================================*/
$(".nuevaFirmaRealizada").change(function(){

  var imagen = this.files[0]; 

  //console.log("imagen",imagen);
  
  /*=============================================
    VALIDAMOS EL FORMATO DE LA IMAGEN SEA JPG O PNG
    =============================================*/ 

    if(imagen["type"] != "image/jpeg" && imagen["type"] != "image/png"){

      $(".nuevaFirmaRealizada").val("");

       swal({
          title: "Error al subir la imagen",
          text: "¡La imagen debe estar en formato JPG o PNG!",
          type: "error",
          confirmButtonText: "¡Cerrar!" 
        });

    }else if(imagen["size"] > 2000000){

      $(".nuevaFirmaRealizada").val("");

       swal({
          title: "Error al subir la imagen",
          text: "¡La imagen no debe pesar más de 2MB!",
          type: "error",
          confirmButtonText: "¡Cerrar!"
        });

    }else{

      var datosImagen = new FileReader;
      datosImagen.readAsDataURL(imagen);

      $(datosImagen).on("load", function(event){

        var rutaImagen = event.target.result;

        $(".previsualizarFirmaRealizada").attr("src", rutaImagen);

      })

    }
})

/*=============================================
ELIMINAR MANTENIMIENTO
=============================================*/
$(".tablas").on("click", ".btnEliminarMantenimiento", function(){

	var idMantenimiento = $(this).attr("idMantenimiento");
  var fotoFirma = $(this).attr("fotoFirma");
  var fotoFirmaRecibido = $(this).attr("fotoFirmaRecibido");
  var numeroReporte = $(this).attr("numeroReporte"); 
  var idUsuariosEli = $(this).attr("idUsuariosEli");
  // console.log("idUsuariosEli",idUsuariosEli);
	
	swal({
        title: '¿Está seguro de borrar el mantenimiento?',
        text: "¡Si no lo está puede cancelar la acción!",
        type: 'warning',
        showCancelButton: true, 
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        cancelButtonText: 'Cancelar',
        confirmButtonText: 'Si, borrar Mantenimiento!'
      }).then(function(result){
        if (result.value) {
          
            window.location = "index.php?ruta=mantenimiento&idMantenimiento="+idMantenimiento+"&fotoFirma="+fotoFirma+"&fotoFirmaRecibido="+fotoFirmaRecibido+"&numeroReporte="+numeroReporte+"&idUsuariosEli="+idUsuariosEli;
        }

  })

})



/*=============================================
ELIMINAR MANTENIMIENTO NO
=============================================*/
$(".tablas").on("click", ".btnEliminarMantenimientono", function(){

  var idMantenimiento = $(this).attr("idMantenimiento");
  var fotoFirma = $(this).attr("fotoFirma");
  //var fotoFirmaRecibido = $(this).attr("fotoFirmaRecibido");
  var numeroReporte = $(this).attr("numeroReporte"); 
  var idUsuariosEli = $(this).attr("idUsuariosEli");
  // console.log("idUsuariosEli",idUsuariosEli);
  
  swal({
        title: '¿Está seguro de borrar el mantenimiento?',
        text: "¡Si no lo está puede cancelar la acción!",
        type: 'warning',
        showCancelButton: true, 
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        cancelButtonText: 'Cancelar',
        confirmButtonText: 'Si, borrar Mantenimiento!'
      }).then(function(result){
        if (result.value) {
          
            window.location = "index.php?ruta=no-preventivo&idMantenimiento="+idMantenimiento+"&fotoFirma="+fotoFirma+"&numeroReporte="+numeroReporte+"&idUsuariosEli="+idUsuariosEli;
        }

  })

})

//Rango de fechas para preventivos

 $('#daterange-btn').daterangepicker(
      {
        ranges   : {
          'Hoy'       : [moment(), moment()],
          'Ayer'   : [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
          'Hace 7 días' : [moment().subtract(6, 'days'), moment()],
          'Hace 30 días': [moment().subtract(29, 'days'), moment()],
          'Este Mes'  : [moment().startOf('month'), moment().endOf('month')],
          'Mes pasado'  : [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
        },
        startDate: moment().subtract(29, 'days'),
        endDate  : moment()
      },
      function (start, end) {
        $('#daterange-btn span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
      	var fechaInicial = start.format('YYYY-MM-DD');
      	//console.log("fechaInicial",fechaInicial);
      	var fechaFinal = end.format('YYYY-MM-DD');
      	//console.log("fechaFinal",fechaFinal);
      	var capturarRango = $("#daterange-btn span").html();
      	//console.log("capturarRango",capturarRango);
      	//esto es para cuando se recargue la pagina, aparezca siempre con el rango de fecha que
      	//se ha elegido. no aparezca vacio al recargar la pagina
      	localStorage.setItem("capturarRango", capturarRango);
      	//aca le pasamos las variables get para que lo reciba mantenimiento.php
      	 window.location = "index.php?ruta=mantenimiento&fechaInicial="+fechaInicial+"&fechaFinal="+fechaFinal;

      }
    )


 //Rango de fechas para preventivos

 $('#daterange-btnpreventivo').daterangepicker(
      {
        ranges   : {
          'Hoy'       : [moment(), moment()],
          'Ayer'   : [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
          'Hace 7 días' : [moment().subtract(6, 'days'), moment()],
          'Hace 30 días': [moment().subtract(29, 'days'), moment()],
          'Este Mes'  : [moment().startOf('month'), moment().endOf('month')],
          'Mes pasado'  : [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
        },
        startDate: moment().subtract(29, 'days'),
        endDate  : moment()
      },
      function (start, end) {
        $('#daterange-btnpreventivo span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
        var fechaInicial = start.format('YYYY-MM-DD');
        //console.log("fechaInicial",fechaInicial);
        var fechaFinal = end.format('YYYY-MM-DD');
        //console.log("fechaFinal",fechaFinal);
        var capturarRangonopreventivo = $("#daterange-btnpreventivo span").html();
        //console.log("capturarRango",capturarRango);
        //esto es para cuando se recargue la pagina, aparezca siempre con el rango de fecha que
        //se ha elegido. no aparezca vacio al recargar la pagina
        localStorage.setItem("capturarRangonopreventivo", capturarRangonopreventivo);
        //aca le pasamos las variables get para que lo reciba mantenimiento.php
         window.location = "index.php?ruta=no-preventivo&fechaInicial="+fechaInicial+"&fechaFinal="+fechaFinal;

      }
    )

 /*=============================================
CANCELAR RANGO DE FECHAS 
=============================================*/
$(".cancelar").on("click", function(){

	localStorage.removeItem("capturarRango");
	localStorage.clear();

	window.location = "mantenimiento";
})


 /*=============================================
CANCELAR RANGO DE FECHAS NO PREVENTIVOS
=============================================*/
$(".cancelarnopreventivo").on("click", function(){

  localStorage.removeItem("capturarRango");
  localStorage.clear();

  window.location = "no-preventivo";
})

/*============================================= 
CAPTURAR HOY
=============================================*/

$(".daterangepicker.opensright .ranges li").on("click", function(){ 

	var textoHoy = $(this).attr("data-range-key");

	//console.log($(this).attr("data-range-key"));



	if(textoHoy == "Hoy"){

    var d = new Date();

    //estas propiedades son para crear las fechas en java script(es como un date de php)
    //getMonth()+1= es porque lo tira en mes 0, hay que ponerlo en 1
    
    var dia = d.getDate();
    var mes = d.getMonth()+1; 
    var año = d.getFullYear();

//ESTO SIGNIFICA QUE ES UN NUMERO DE UN SOLO DIGITO(MES DE 1 AL 9)
    if(mes < 10){

    	//esto es porque en el get mes me tire el mes con dos digitos(ejemplo septiembre lo tira 
    	//en 9 ahora lo tira en 09)
      var fechaInicial = año+"-0"+mes+"-"+dia;
      var fechaFinal = año+"-0"+mes+"-"+dia;

    }else if(dia < 10){

      var fechaInicial = año+"-"+mes+"-0"+dia;
      var fechaFinal = año+"-"+mes+"-0"+dia;

    }else if(mes < 10 && dia < 10){

      var fechaInicial = año+"-0"+mes+"-0"+dia;
      var fechaFinal = año+"-0"+mes+"-0"+dia;

    }else{

      var fechaInicial = año+"-"+mes+"-"+dia;
       var fechaFinal = año+"-"+mes+"-"+dia;

    } 

    	localStorage.setItem("capturarRango2", "Hoy");

    	window.location = "index.php?ruta=reportes&fechaInicial="+fechaInicial+"&fechaFinal="+fechaFinal;

	}

})

/*=============================================
OBTENER EL NUMERO DEL REPORTE CON LA TABLA REPORTES(DESDE EL CRONOGRAMA)
=============================================*/
$(document).on("click", ".btnMostrarReporte", function(){

  var idReporte = $(this).attr("idReporte");

  //console.log("idReporte",idReporte);

  var datos = new FormData();
    datos.append("idReporte", idReporte);

      $.ajax({

      url:"ajax/mantenimiento.ajax.php",
      method: "POST",
      data: datos,
      cache: false, 
      contentType: false,
      processData: false,
      dataType:"json",
      success:function(respuesta){

        window.location = "index.php?ruta=reportes-cronograma&idReporte="+idReporte;

        // console.log("respuesta",respuesta);
  

    }



})

})

/*=============================================
OBTENER EL NUMERO DEL REPORTE CON LA TABLA REPORTES(DESDE EL MANTENIMIENTO)
=============================================*/
$(document).on("click", ".btnMostrarReporteCronograma", function(){

  var idReporte = $(this).attr("idReporte");

  // console.log("idReporte",idReporte);

  var datos = new FormData();
    datos.append("idReporte", idReporte);

      $.ajax({

      url:"ajax/mantenimiento.ajax.php",
      method: "POST",
      data: datos,
      cache: false, 
      contentType: false,
      processData: false,
      dataType:"json",
      success:function(respuesta){

        window.location = "index.php?ruta=reportes-cronograma&idReporte="+idReporte;

        // console.log("respuesta",respuesta);
  

    }



})

})


// /*=============================================
// OBTENER EL NUMERO DEL REPORTE CON LA TABLA REPORTESNO
// =============================================*/
// $(document).on("click", ".btnMostrarReporteno", function(){

//   var idReporteno = $(this).attr("idReporte");

//   // console.log("idReporteno",idReporteno);

//   var datos = new FormData();
//     datos.append("idReporteno", idReporteno);

//       $.ajax({

//       url:"ajax/mantenimiento.ajax.php",
//       method: "POST",
//       data: datos,
//       cache: false,
//       contentType: false,
//       processData: false,
//       dataType:"json",
//       success:function(respuesta){

//         window.location = "index.php?ruta=reportes-cronogramano&idReporteno="+idReporteno;

//         // console.log("respuesta",respuesta);
  

//     }



// })

// })


// Rango de fecha para proximos mantenimientos

 $('#daterangeproximo-btn').daterangepicker(
      {
        ranges   : {
          'Mañana'   : [moment().add(1, 'days'), moment().add(1, 'days')],
          'Despues de 7 días' : [moment().add(6, 'days'), moment()],
          'Despues de 30 días': [moment().add(29, 'days'), moment()],
          'Mes Proximo'  : [moment().add(1, 'month').startOf('month'), moment().add(1, 'month').endOf('month')]
        },
        startDate: moment().add(29, 'days'),
        endDate  : moment()
      },
      function (start, end) {
        $('#daterangeproximo-btn span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
        var fechaInicialp = start.format('YYYY-MM-DD');
        var fechaFinalp = end.format('YYYY-MM-DD');
        var capturarRango5 = $("#daterangeproximo-btn span").html();

        //console.log("capturarRango5",capturarRango5);


        localStorage.setItem("daterangeproximo-btn", capturarRango5);
        window.location = "index.php?ruta=mantenimiento&fechaInicialp="+fechaInicialp+"&fechaFinalp="+fechaFinalp;

      }
    )


 // Rango de fecha para proximos mantenimientos no preventivo

 $('#daterangeproximo-btnpreventivo').daterangepicker(
      {
        ranges   : {
          'Mañana'   : [moment().add(1, 'days'), moment().add(1, 'days')],
          'Despues de 7 días' : [moment().add(6, 'days'), moment()],
          'Despues de 30 días': [moment().add(29, 'days'), moment()],
          'Mes Proximo'  : [moment().add(1, 'month').startOf('month'), moment().add(1, 'month').endOf('month')]
        },
        startDate: moment().add(29, 'days'),
        endDate  : moment()
      },
      function (start, end) {
        $('#daterangeproximo-btnpreventivo span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
        var fechaInicialp = start.format('YYYY-MM-DD');
        var fechaFinalp = end.format('YYYY-MM-DD');
        var capturarRangoproximopreventivo = $("#daterangeproximo-btnpreventivo span").html();

        //console.log("capturarRango5",capturarRango5);


        localStorage.setItem("capturarRangoproximopreventivo", capturarRangoproximopreventivo);
        window.location = "index.php?ruta=no-preventivo&fechaInicialp="+fechaInicialp+"&fechaFinalp="+fechaFinalp;

      }
    )



 function recargarMarcaMantenimiento(){
  var valor1 =  $('#nuevoCodigo').val();
  var valor2 = $('#periodo').val();
  $.ajax({
    type: "POST",
    url:"ajax/mantenimiento.ajax.php",
    data: {idMarcaMantenimiento : valor1, periodo3 :valor2},
    success : function(respuesta){
      // console.log(respuesta);
      if (respuesta == "") 
      {
        // console.log("El cliente no tiene equipos");
        $('#nuevoMarcaM').html("<option value=''>El equipo no tiene marca</option>");
      }
      else
      {
       $('#nuevoMarcaM').html(respuesta);
       // console.log("respuesta",respuesta);
      }    
    }
  })

};

 function recargarEquipoMantenimiento(){
  var valor1 =  $('#nuevoCodigo').val();
  var valor2 = $('#periodo').val();
  $.ajax({ 
    type: "POST",
    url:"ajax/mantenimiento.ajax.php",
    data: {idEquipoMantenimiento : valor1, periodo2 :valor2},
    success : function(respuesta){
      if (respuesta == "") 
      {
         $('#nuevoEquipoM').html("<option value=''>El Cliente no tiene equipo</option>");
      }
      else
      {
        $('#nuevoEquipoM').html(respuesta);
        // console.log("respuesta",respuesta);
      }
      
    }
  })

}; 


 function recargarModeloMantenimiento(){
  var valor1 =  $('#nuevoCodigo').val();
  var valor2 = $('#periodo').val();
  $.ajax({
    type: "POST",
    url:"ajax/mantenimiento.ajax.php",
    data: {idModeloMantenimiento : valor1, periodo4 :valor2},
    success : function(respuesta){

      if (respuesta == "") 
      {
         $('#nuevoModeloM').html("<option value=''>La marca no tiene modelo</option>");
      }
      else
      {
        $('#nuevoModeloM').html(respuesta);
        // console.log("respuesta",respuesta);
      }
    }
  }) 

};


 function recargarCodigoMantenimiento(){
  var valor1 =  $('#nuevoClienteM').val();
  var valor2 = $('#periodo').val();
  $.ajax({
    type: "POST",
    url:"ajax/mantenimiento.ajax.php",
    data: {idCodigoMantenimiento : valor1, periodo :valor2},
    success : function(respuesta){

      // console.log("respuesta",respuesta);

      if (respuesta == "") 
      {
         $('#nuevoCodigo').html("<option value=''>La marca no tiene modelo</option>");
      }
      else
      {
        $('#nuevoCodigo').html(respuesta);
        // console.log("respuesta",respuesta);
      }
    }
  })

};

 function recargarSerieMantenimiento(){
  var valor1 =  $('#nuevoCodigo').val();
  var valor2 = $('#periodo').val();
  $.ajax({
    type: "POST",
    url:"ajax/mantenimiento.ajax.php",
    data: {idSerieMantenimiento : valor1, periodo5 :valor2},
    success : function(respuesta){

      if (respuesta == "") 
      {
         $('#nuevoSerieM').html("<option value=''>El Cliente no tiene serie</option>");
      }
      else
      {
        $('#nuevoSerieM').html(respuesta);
        // console.log("respuesta",respuesta);
      }
    }
  })
 
};

function recargarInstrumentos(){
$.ajax({
    type: "POST",
    url:"ajax/equipos.ajax.php",
    data: "idInstrumentos="+ $('.serieInstrumento').val(),
    success : function(respuesta){
        // console.log("respuesta",respuesta);
        if (respuesta == 0) 
        {
          $('#instrumentosCargados').html("<div class='alert alert-success alert-dismissible' role='alert'>No se ha seleccionado un equipo con su serie</div>");
        }
        else
        {
          $('#instrumentosCargados').html(respuesta);
        }
    } 
  })


 };




function recargarTrabajos(){
 $.ajax({
    type: "POST",
    url:"ajax/equipos.ajax.php",
    data: "idTrabajos="+ $('.serieInstrumento').val(),
    success : function(respuesta){
        // console.log("respuesta",respuesta);
        if (respuesta == 0) 
        {
          $('#trabajosCargados').html("<div class='alert alert-success alert-dismissible' role='alert'>No se ha seleccionado un equipo con su serie</div>");
        }
        else
        {
          $('#trabajosCargados').html(respuesta);
        }
    }
  })


 };

//Mostrar los meses de la serie
 function recargarMeses(){
 $.ajax({
    type: "POST",
    url:"ajax/cronograma.ajax.php",
    data: "idMeses="+ $('.serieMes').val(),
    success : function(respuesta){
        // console.log("respuesta",respuesta);
        if (respuesta == 0) 
        {
          $('#mesCargado').html("<div class='alert alert-success alert-dismissible' role='alert'>No se encontrado los meses</div>");
        }
        else
        {
          $('#mesCargado').html(respuesta);
        }
    }
  })

 };



//es para cargar los instrumentos y trabajos a la hora de editar el manteniemiento
 function recargarInstrumentosEditar(){
$.ajax({
    type: "POST",
    url:"ajax/equipos.ajax.php",
    data: "idInstrumentosEditar="+ $('.serieInstrumentoEditar').val(),
    success : function(respuesta){
        console.log("respuesta",respuesta);
        if (respuesta == 0) 
        {
          $('#instrumentosCargadosEditar').html("<div class='alert alert-success alert-dismissible' role='alert'>No se ha seleccionado un equipo con su serie</div>");
        }
        else
        {
          $('#instrumentosCargadosEditar').html(respuesta);
        }
    } 
  })


 };

function recargarTrabajosEditar(){
 $.ajax({
    type: "POST",
    url:"ajax/equipos.ajax.php",
    data: "idTrabajosEditar="+ $('.serieInstrumentoEditar').val(),
    success : function(respuesta){
        console.log("respuesta",respuesta);
        if (respuesta == 0) 
        {
          $('#trabajosCargadosEditar').html("<div class='alert alert-success alert-dismissible' role='alert'>No se ha seleccionado un equipo con su serie</div>");
        }
        else
        {
          $('#trabajosCargadosEditar').html(respuesta);
        }
    } 
  })


 };


 /* Aca comienza el trabajo de mediciones*/
  /* Traer Tensiometro analogo*/
 function recargarMediciones(){ 
 $.ajax({
    type: "POST",
    url:"ajax/equipos.ajax.php",
    data: "idTensiometro="+ $('.serieInstrumento').val(),
    dataType: "json",
    success : function(respuesta){
        console.log("respuesta",respuesta);
        if (respuesta == "") 
        {
          $('#mediciones').html("<div class='alert alert-success alert-dismissible' role='alert'>No se ha seleccionado las opciones de la tabla</div>");
        }else{
      
          for (var i=0; i < respuesta.length; i++) {

              if (respuesta[i]["mediciones"] == "Tensiometro Analogo") {
                
                  $('#mediciones').html(
                    '<h4>Tensiometro Analogo</h4>'+
                    '<input type="hidden" class="form-control col-xs-4" name="tensiometroAnalogo" value="tensiometro Analogo">'+
                    '<table class="table table-hover">'+

                          '<tr>'+
                            '<th style="text-align:center;">Equipo</th>'+
                            '<th style="text-align:center;">Patron</th>'+
                            '<th style="text-align:center;">Unidad</th>'+
                          '</tr>'+
                          '<tr>'+
                            '<td style="text-align:center;">40</td>'+
                            '<td style="text-align:center;"><input type="text" name="tenPatron1" class="form-control col-xs-4"></td>'+
                            '<td style="text-align:center;">mmHg</td>'+
                          '</tr>'+
                          '<tr>'+
                             '<td style="text-align:center;">80</td>'+
                             '<td style="text-align:center;"><input type="text" name="tenPatron2" class="form-control col-xs-4"></td>'+
                             '<td style="text-align:center;">mmHg</td>'+
                          '</tr>'+
                          '<tr>'+
                            '<td style="text-align:center;">120</td>'+
                            '<td style="text-align:center;"><input type="text" name="tenPatron3" class="form-control col-xs-4"></td>'+
                            '<td style="text-align:center;">mmHg</td>'+
                          '</tr>'+
                          '<tr>'+
                            '<td style="text-align:center;">160</td>'+
                            '<td style="text-align:center;"><input type="text" name="tenPatron4" class="form-control col-xs-4"></td>'+
                            '<td style="text-align:center;">mmHg</td>'+
                          '</tr>'+
                          '<tr>'+
                            '<td style="text-align:center;">200</td>'+
                            '<td style="text-align:center;"><input type="text" name="tenPatron5" class="form-control col-xs-4"></td>'+
                            '<td style="text-align:center;">mmHg</td>'+
                          '</tr>'+
                    '</table>'
                  );
              }else if(respuesta[i]["mediciones"] == "Tensiometro Digital"){

                  $('#mediciones').html(
                    '<input type="hidden" class="form-control col-xs-4" name="tensiometroDigital" value="Tensiometro digital">'+
                    '<h4>Tensiometro Digital</h4>'+
                    '<table class="table table-hover">'+

                          '<tr>'+
                            '<th colspan="2" style="text-align:center;">Patrón</th>'+
                            '<th colspan="2" style="text-align:center;">Equipo</th>'+
                            '<th>Unidad</th>'+
                          '</tr>'+
                          '<tr>'+
                            '<td style="text-align:center;">Sistólica</td>'+
                            '<td style="text-align:center;">Diastólica</td>'+
                            '<td style="text-align:center;">Sistólica</td>'+
                            '<td style="text-align:center;">Diastólica</td>'+
                            '<td style="text-align:center;">mmHg</td>'+
                          '</tr>'+
                          '<tr>'+
                             '<td style="text-align:center;">60</td>'+
                             '<td style="text-align:center;">30</td>'+
                             '<td style="text-align:center;"><input type="text" name="tenSistolica1" class="form-control col-xs-4"></td>'+
                             '<td style="text-align:center;"><input type="text" name="tenDiastolica1" class="form-control col-xs-4"></td>'+
                             '<td style="text-align:center;">mmHg</td>'+
                          '</tr>'+
                          '<tr>'+
                             '<td style="text-align:center;">120</td>'+
                             '<td style="text-align:center;">80</td>'+
                             '<td style="text-align:center;"><input type="text" name="tenSistolica2" class="form-control col-xs-4"></td>'+
                             '<td style="text-align:center;"><input type="text" name="tenDiastolica2" class="form-control col-xs-4"></td>'+
                             '<td style="text-align:center;">mmHg</td>'+
                          '</tr>'+
                          '<tr>'+
                             '<td style="text-align:center;">150</td>'+
                             '<td style="text-align:center;">200</td>'+
                             '<td style="text-align:center;"><input type="text" name="tenSistolica3" class="form-control col-xs-4"></td>'+
                             '<td style="text-align:center;"><input type="text" name="tenDiastolica3" class="form-control col-xs-4"></td>'+
                             '<td style="text-align:center;">mmHg</td>'+
                          '</tr>'+
                          '<tr>'+
                             '<td style="text-align:center;">200</td>'+
                             '<td style="text-align:center;">150</td>'+
                             '<td style="text-align:center;"><input type="text" name="tenSistolica4" class="form-control col-xs-4"></td>'+
                             '<td style="text-align:center;"><input type="text" name="tenDiastolica4" class="form-control col-xs-4"></td>'+
                             '<td style="text-align:center;">mmHg</td>'+
                          '</tr>'+
                    '</table>'
                  );


              }else if(respuesta[i]["mediciones"] == "Succionador / Vacuometro") {

                $('#succionador25').css("display", "block");

                $('#succionador').change(function(){

                    var succionador = $(this).val();

                    if (succionador == "mmHg") {

                  $('#mediciones').html(
                  '<input type="hidden" class="form-control col-xs-4" name="mmHg" value="mmHg">'+
                  '<input type="hidden" class="form-control col-xs-4" name="succionadorVacuometro" value="Succionador Vacuometro">'+
                    '<h4>Succionador / Vacuometro</h4>'+
                    '<table class="table table-hover">'+

                          '<tr>'+
                            '<th style="text-align:center;">Equipo</th>'+
                            '<th style="text-align:center;">Patron</th>'+
                            '<th style="text-align:center;">Unidad</th>'+
                          '</tr>'+
                          '<tr>'+
                            '<td style="text-align:center;"><input type="text" name="succvacuEquipo1" class="form-control col-xs-4"></td>'+
                            '<td style="text-align:center;"><input type="text" name="succvacuPatron1" class="form-control col-xs-4"></td>'+
                            '<td style="text-align:center;">mmHg</td>'+
                          '</tr>'+
                          '<tr>'+
                             '<td style="text-align:center;"><input type="text" name="succvacuEquipo2" class="form-control col-xs-4"></td>'+
                             '<td style="text-align:center;"><input type="text" name="succvacuPatron2" class="form-control col-xs-4"></td>'+
                             '<td style="text-align:center;">mmHg</td>'+
                          '</tr>'+
                          '<tr>'+
                            '<td style="text-align:center;"><input type="text" name="succvacuEquipo3" class="form-control col-xs-4"></td>'+
                            '<td style="text-align:center;"><input type="text" name="succvacuPatron3" class="form-control col-xs-4"></td>'+
                            '<td style="text-align:center;">mmHg</td>'+
                          '</tr>'+
                          '<tr>'+
                            '<td style="text-align:center;"><input type="text" name="succvacuEquipo4" class="form-control col-xs-4"></td>'+
                            '<td style="text-align:center;"><input type="text" name="succvacuPatron4" class="form-control col-xs-4"></td>'+
                            '<td style="text-align:center;">mmHg</td>'+
                          '</tr>'+
                    '</table>'
                  );
                    }else if (succionador == "inHg") {
                       $('#mediciones').html(
                  '<input type="hidden" class="form-control col-xs-4" name="inHg" value="inHg">'+
                  '<input type="hidden" class="form-control col-xs-4" name="succionadorVacuometro" value="Succionador Vacuometro">'+
                    '<h4>Succionador / Vacuometro</h4>'+
                    '<table class="table table-hover">'+

                          '<tr>'+
                            '<th style="text-align:center;">Equipo</th>'+
                            '<th style="text-align:center;">Patron</th>'+
                            '<th style="text-align:center;">Unidad</th>'+
                          '</tr>'+
                          '<tr>'+
                            '<td style="text-align:center;"><input type="text" name="succvacuEquipo1" class="form-control col-xs-4"></td>'+
                            '<td style="text-align:center;"><input type="text" name="succvacuPatron1" class="form-control col-xs-4"></td>'+
                            '<td style="text-align:center;">inHg</td>'+
                          '</tr>'+
                          '<tr>'+
                             '<td style="text-align:center;"><input type="text" name="succvacuEquipo2" class="form-control col-xs-4"></td>'+
                             '<td style="text-align:center;"><input type="text" name="succvacuPatron2" class="form-control col-xs-4"></td>'+
                             '<td style="text-align:center;">inHg</td>'+
                          '</tr>'+
                          '<tr>'+
                            '<td style="text-align:center;"><input type="text" name="succvacuEquipo3" class="form-control col-xs-4"></td>'+
                            '<td style="text-align:center;"><input type="text" name="succvacuPatron3" class="form-control col-xs-4"></td>'+
                            '<td style="text-align:center;">inHg</td>'+
                          '</tr>'+
                          '<tr>'+
                            '<td style="text-align:center;"><input type="text" name="succvacuEquipo4" class="form-control col-xs-4"></td>'+
                            '<td style="text-align:center;"><input type="text" name="succvacuPatron4" class="form-control col-xs-4"></td>'+
                            '<td style="text-align:center;">inHg</td>'+
                          '</tr>'+
                    '</table>'
                  );
                    }else if (succionador == "Mpa") {

                        $('#mediciones').html(
                  '<input type="hidden" class="form-control col-xs-4" name="Mpa" value="Mpa">'+
                  '<input type="hidden" class="form-control col-xs-4" name="succionadorVacuometro" value="Succionador Vacuometro">'+
                    '<h4>Succionador / Vacuometro</h4>'+
                    '<table class="table table-hover">'+

                          '<tr>'+
                            '<th style="text-align:center;">Equipo</th>'+
                            '<th style="text-align:center;">Patron</th>'+
                            '<th style="text-align:center;">Unidad</th>'+
                          '</tr>'+
                          '<tr>'+
                            '<td style="text-align:center;"><input type="text" name="succvacuEquipo1" class="form-control col-xs-4"></td>'+
                            '<td style="text-align:center;"><input type="text" name="succvacuPatron1" class="form-control col-xs-4"></td>'+
                            '<td style="text-align:center;">Mpa</td>'+
                          '</tr>'+
                          '<tr>'+
                             '<td style="text-align:center;"><input type="text" name="succvacuEquipo2" class="form-control col-xs-4"></td>'+
                             '<td style="text-align:center;"><input type="text" name="succvacuPatron2" class="form-control col-xs-4"></td>'+
                             '<td style="text-align:center;">Mpa</td>'+
                          '</tr>'+
                          '<tr>'+
                            '<td style="text-align:center;"><input type="text" name="succvacuEquipo3" class="form-control col-xs-4"></td>'+
                            '<td style="text-align:center;"><input type="text" name="succvacuPatron3" class="form-control col-xs-4"></td>'+
                            '<td style="text-align:center;">Mpa</td>'+
                          '</tr>'+
                          '<tr>'+
                            '<td style="text-align:center;"><input type="text" name="succvacuEquipo4" class="form-control col-xs-4"></td>'+
                            '<td style="text-align:center;"><input type="text" name="succvacuPatron4" class="form-control col-xs-4"></td>'+
                            '<td style="text-align:center;">Mpa</td>'+
                          '</tr>'+
                    '</table>'
                  );
                    }else if (succionador == "nueva") {
                  $('#mediciones').html(
                  '<input type="hidden" class="form-control col-xs-4" name="nueva" value="nueva">'+
                  '<input type="hidden" class="form-control col-xs-4" name="succionadorVacuometro" value="Succionador Vacuometro">'+
                    '<h4>Succionador / Vacuometro</h4>'+
                    '<table class="table table-hover">'+

                          '<tr>'+
                            '<th style="text-align:center;">Equipo</th>'+
                            '<th style="text-align:center;">Patron</th>'+
                            '<th style="text-align:center;">Unidad</th>'+
                          '</tr>'+
                          '<tr>'+
                            '<td style="text-align:center;"><input type="text" name="succvacuEquipo1" class="form-control col-xs-4"></td>'+
                            '<td style="text-align:center;"><input type="text" name="succvacuPatron1" class="form-control col-xs-4"></td>'+
                            '<td style="text-align:center;"><input type="text" name="succvacuPatronUnNew1" class="form-control col-xs-4"></td>'+
                          '</tr>'+
                          '<tr>'+
                             '<td style="text-align:center;"><input type="text" name="succvacuEquipo2" class="form-control col-xs-4"></td>'+
                             '<td style="text-align:center;"><input type="text" name="succvacuPatron2" class="form-control col-xs-4"></td>'+
                             '<td style="text-align:center;"><input type="text" name="succvacuPatronUnNew2" class="form-control col-xs-4"></td>'+
                          '</tr>'+
                          '<tr>'+
                            '<td style="text-align:center;"><input type="text" name="succvacuEquipo3" class="form-control col-xs-4"></td>'+
                            '<td style="text-align:center;"><input type="text" name="succvacuPatron3" class="form-control col-xs-4"></td>'+
                            '<td style="text-align:center;"><input type="text" name="succvacuPatronUnNew3" class="form-control col-xs-4"></td>'+
                          '</tr>'+
                          '<tr>'+
                            '<td style="text-align:center;"><input type="text" name="succvacuEquipo4" class="form-control col-xs-4"></td>'+
                            '<td style="text-align:center;"><input type="text" name="succvacuPatron4" class="form-control col-xs-4"></td>'+
                            '<td style="text-align:center;"><input type="text" name="succvacuPatronUnNew4" class="form-control col-xs-4"></td>'+
                          '</tr>'+
                    '</table>'
                  );
                    }
                });

                
              }else if(respuesta[i]["mediciones"] == "Monitor Multiparametros"){

                 $('#monitor25').css("display", "block");

                    

                  $('#monitor').change(function(){

                     var monitor = $(this).val();

              if (monitor == "neonatal") {


                $('#mediciones').html(
                  '<input type="hidden" class="form-control col-xs-4" name="neonatalmonitor" value="neonatalmonitor">'+
                  '<input type="hidden" class="form-control col-xs-4" name="monitorMultiparametros" value="Monitor Multiparametros">'+
                    '<h4>Monitor Multiparametros</h4>'+
                    '<table class="table table-hover table-bordered">'+

                          '<tr>'+
                            '<th colspan="3" style="text-align:center;">ECG</th>'+
                            '<th colspan="3" style="text-align:center;">SPO2</th>'+
                            '<th colspan="5" style="text-align:center;">NIBP</th>'+
                          '</tr>'+
                          '<tr>'+
                            '<td style="text-align:center;">Patrón</td>'+
                            '<td style="text-align:center;">Equipo</td>'+
                            '<td style="text-align:center;">Unidad</td>'+
                            '<td style="text-align:center;">Patrón</td>'+
                            '<td style="text-align:center;">Equipo</td>'+
                            '<td style="text-align:center;">Unidad</td>'+
                            '<td colspan="2" style="text-align:center;">Patrón</td>'+
                            '<td colspan="2" style="text-align:center;">Equipo</td>'+
                            '<td style="text-align:center;">Neonatal</td>'+
                          '</tr>'+
                          '<tr>'+
                            '<td style="text-align:center;">60</td>'+
                            '<td style="text-align:center;"><input type="text" name="monitMultEquipo1" class="form-control col-xs-4"></td>'+
                            '<td style="text-align:center;">BPM</td>'+
                            '<td style="text-align:center;">85</td>'+
                            '<td style="text-align:center;"><input type="text" name="monitMultEquipo6" class="form-control col-xs-4"></td>'+
                            '<td style="text-align:center;">%</td>'+
                            '<td style="text-align:center;">Sistólica</td>'+
                            '<td style="text-align:center;">Diastólica</td>'+
                            '<td style="text-align:center;">Sistólica</td>'+
                            '<td style="text-align:center;">Diastólica</td>'+
                            '<td style="text-align:center;">Unidad</td>'+
                          '</tr>'+
                          '<tr>'+
                            '<td style="text-align:center;">90</td>'+
                            '<td style="text-align:center;"><input type="text" name="monitMultEquipo2" class="form-control col-xs-4"></td>'+
                            '<td style="text-align:center;">BPM</td>'+
                            '<td style="text-align:center;">90</td>'+
                            '<td style="text-align:center;"><input type="text" name="monitMultEquipo7" class="form-control col-xs-4"></td>'+
                            '<td style="text-align:center;">%</td>'+
                            '<td style="text-align:center;">35</td>'+
                            '<td style="text-align:center;">15</td>'+
                            '<td style="text-align:center;"><input type="text" name="monitMultSistolica1" class="form-control col-xs-4"></td>'+
                            '<td style="text-align:center;"><input type="text" name="monitMultDiastolica1" class="form-control col-xs-4"></td>'+
                            '<td style="text-align:center;">mmHg</td>'+
                          '</tr>'+
                          '<tr>'+
                            '<td style="text-align:center;">120</td>'+
                            '<td style="text-align:center;"><input type="text" name="monitMultEquipo3" class="form-control col-xs-4"></td>'+
                            '<td style="text-align:center;">BPM</td>'+
                            '<td style="text-align:center;">95</td>'+
                            '<td style="text-align:center;"><input type="text" name="monitMultEquipo8" class="form-control col-xs-4"></td>'+
                            '<td style="text-align:center;">%</td>'+
                            '<td style="text-align:center;">60</td>'+
                            '<td style="text-align:center;">30</td>'+
                            '<td style="text-align:center;"><input type="text" name="monitMultSistolica2" class="form-control col-xs-4"></td>'+
                            '<td style="text-align:center;"><input type="text" name="monitMultDiastolica2" class="form-control col-xs-4"></td>'+
                            '<td style="text-align:center;">mmHg</td>'+
                          '</tr>'+
                          '<tr>'+
                            '<td style="text-align:center;">150</td>'+
                            '<td style="text-align:center;"><input type="text" name="monitMultEquipo4" class="form-control col-xs-4"></td>'+
                            '<td style="text-align:center;">BPM</td>'+
                            '<td style="text-align:center;">97</td>'+
                            '<td style="text-align:center;"><input type="text" name="monitMultEquipo9" class="form-control col-xs-4"></td>'+
                            '<td style="text-align:center;">%</td>'+
                            '<td style="text-align:center;">70</td>'+
                            '<td style="text-align:center;">40</td>'+
                            '<td style="text-align:center;"><input type="text" name="monitMultSistolica3" class="form-control col-xs-4"></td>'+
                            '<td style="text-align:center;"><input type="text" name="monitMultDiastolica3" class="form-control col-xs-4"></td>'+
                            '<td style="text-align:center;">mmHg</td>'+
                          '</tr>'+
                          '<tr>'+
                            '<td style="text-align:center;">180</td>'+
                            '<td style="text-align:center;"><input type="text" name="monitMultEquipo5" class="form-control col-xs-4"></td>'+
                            '<td style="text-align:center;">BPM</td>'+
                            '<td style="text-align:center;">99</td>'+
                            '<td style="text-align:center;"><input type="text" name="monitMultEquipo10" class="form-control col-xs-4"></td>'+
                            '<td style="text-align:center;">%</td>'+
                            '<td style="text-align:center;">120</td>'+
                            '<td style="text-align:center;">80</td>'+
                            '<td style="text-align:center;"><input type="text" name="monitMultSistolica4" class="form-control col-xs-4"></td>'+
                            '<td style="text-align:center;"><input type="text" name="monitMultDiastolica4" class="form-control col-xs-4"></td>'+
                            '<td style="text-align:center;">mmHg</td>'+
                          '</tr>'+
                    '</table>'
                  );

                     }else if (monitor == "pediatrico") {

                $('#mediciones').html(
                  '<input type="hidden" class="form-control col-xs-4" name="pediatricomonitor" value="pediatricomonitor">'+
                  '<input type="hidden" class="form-control col-xs-4" name="monitorMultiparametros" value="Monitor Multiparametros">'+
                    '<h4>Monitor Multiparametros</h4>'+
                    '<table class="table table-hover table-bordered">'+

                          '<tr>'+
                            '<th colspan="3" style="text-align:center;">ECG</th>'+
                            '<th colspan="3" style="text-align:center;">SPO2</th>'+
                            '<th colspan="5" style="text-align:center;">NIBP</th>'+
                          '</tr>'+
                          '<tr>'+
                            '<td style="text-align:center;">Patrón</td>'+
                            '<td style="text-align:center;">Equipo</td>'+
                            '<td style="text-align:center;">Unidad</td>'+
                            '<td style="text-align:center;">Patrón</td>'+
                            '<td style="text-align:center;">Equipo</td>'+
                            '<td style="text-align:center;">Unidad</td>'+
                            '<td colspan="2" style="text-align:center;">Patrón</td>'+
                            '<td colspan="2" style="text-align:center;">Equipo</td>'+
                            '<td style="text-align:center;">Neonatal</td>'+
                          '</tr>'+
                          '<tr>'+
                            '<td style="text-align:center;">60</td>'+
                            '<td style="text-align:center;"><input type="text" name="monitMultEquipo1" class="form-control col-xs-4"></td>'+
                            '<td style="text-align:center;">BPM</td>'+
                            '<td style="text-align:center;">85</td>'+
                            '<td style="text-align:center;"><input type="text" name="monitMultEquipo6" class="form-control col-xs-4"></td>'+
                            '<td style="text-align:center;">%</td>'+
                            '<td style="text-align:center;">Sistólica</td>'+
                            '<td style="text-align:center;">Diastólica</td>'+
                            '<td style="text-align:center;">Sistólica</td>'+
                            '<td style="text-align:center;">Diastólica</td>'+
                            '<td style="text-align:center;">Unidad</td>'+
                          '</tr>'+
                          '<tr>'+
                            '<td style="text-align:center;">90</td>'+
                            '<td style="text-align:center;"><input type="text" name="monitMultEquipo2" class="form-control col-xs-4"></td>'+
                            '<td style="text-align:center;">BPM</td>'+
                            '<td style="text-align:center;">90</td>'+
                            '<td style="text-align:center;"><input type="text" name="monitMultEquipo7" class="form-control col-xs-4"></td>'+
                            '<td style="text-align:center;">%</td>'+
                            '<td style="text-align:center;">60</td>'+
                            '<td style="text-align:center;">30</td>'+
                            '<td style="text-align:center;"><input type="text" name="monitMultSistolica1" class="form-control col-xs-4"></td>'+
                            '<td style="text-align:center;"><input type="text" name="monitMultDiastolica1" class="form-control col-xs-4"></td>'+
                            '<td style="text-align:center;">mmHg</td>'+
                          '</tr>'+
                          '<tr>'+
                            '<td style="text-align:center;">120</td>'+
                            '<td style="text-align:center;"><input type="text" name="monitMultEquipo3" class="form-control col-xs-4"></td>'+
                            '<td style="text-align:center;">BPM</td>'+
                            '<td style="text-align:center;">95</td>'+
                            '<td style="text-align:center;"><input type="text" name="monitMultEquipo8" class="form-control col-xs-4"></td>'+
                            '<td style="text-align:center;">%</td>'+
                            '<td style="text-align:center;">70</td>'+
                            '<td style="text-align:center;">40</td>'+
                            '<td style="text-align:center;"><input type="text" name="monitMultSistolica2" class="form-control col-xs-4"></td>'+
                            '<td style="text-align:center;"><input type="text" name="monitMultDiastolica2" class="form-control col-xs-4"></td>'+
                            '<td style="text-align:center;">mmHg</td>'+
                          '</tr>'+
                          '<tr>'+
                            '<td style="text-align:center;">150</td>'+
                            '<td style="text-align:center;"><input type="text" name="monitMultEquipo4" class="form-control col-xs-4"></td>'+
                            '<td style="text-align:center;">BPM</td>'+
                            '<td style="text-align:center;">97</td>'+
                            '<td style="text-align:center;"><input type="text" name="monitMultEquipo9" class="form-control col-xs-4"></td>'+
                            '<td style="text-align:center;">%</td>'+
                            '<td style="text-align:center;">120</td>'+
                            '<td style="text-align:center;">80</td>'+
                            '<td style="text-align:center;"><input type="text" name="monitMultSistolica3" class="form-control col-xs-4"></td>'+
                            '<td style="text-align:center;"><input type="text" name="monitMultDiastolica3" class="form-control col-xs-4"></td>'+
                            '<td style="text-align:center;">mmHg</td>'+
                          '</tr>'+
                          '<tr>'+
                            '<td style="text-align:center;">180</td>'+
                            '<td style="text-align:center;"><input type="text" name="monitMultEquipo5" class="form-control col-xs-4"></td>'+
                            '<td style="text-align:center;">BPM</td>'+
                            '<td style="text-align:center;">99</td>'+
                            '<td style="text-align:center;"><input type="text" name="monitMultEquipo10" class="form-control col-xs-4"></td>'+
                            '<td style="text-align:center;">%</td>'+
                            '<td style="text-align:center;">150</td>'+
                            '<td style="text-align:center;">100</td>'+
                            '<td style="text-align:center;"><input type="text" name="monitMultSistolica4" class="form-control col-xs-4"></td>'+
                            '<td style="text-align:center;"><input type="text" name="monitMultDiastolica4" class="form-control col-xs-4"></td>'+
                            '<td style="text-align:center;">mmHg</td>'+
                          '</tr>'+
                    '</table>'
                  );
                     }else if (monitor == "adulto") {

                      $('#mediciones').html(
                  '<input type="hidden" class="form-control col-xs-4" name="adultomonitor" value="adultomonitor">'+
                  '<input type="hidden" class="form-control col-xs-4" name="monitorMultiparametros" value="Monitor Multiparametros">'+
                    '<h4>Monitor Multiparametros</h4>'+
                    '<table class="table table-hover table-bordered">'+

                          '<tr>'+
                            '<th colspan="3" style="text-align:center;">ECG</th>'+
                            '<th colspan="3" style="text-align:center;">SPO2</th>'+
                            '<th colspan="5" style="text-align:center;">NIBP</th>'+
                          '</tr>'+
                          '<tr>'+
                            '<td style="text-align:center;">Patrón</td>'+
                            '<td style="text-align:center;">Equipo</td>'+
                            '<td style="text-align:center;">Unidad</td>'+
                            '<td style="text-align:center;">Patrón</td>'+
                            '<td style="text-align:center;">Equipo</td>'+
                            '<td style="text-align:center;">Unidad</td>'+
                            '<td colspan="2" style="text-align:center;">Patrón</td>'+
                            '<td colspan="2" style="text-align:center;">Equipo</td>'+
                            '<td style="text-align:center;">Neonatal</td>'+
                          '</tr>'+
                          '<tr>'+
                            '<td style="text-align:center;">60</td>'+
                            '<td style="text-align:center;"><input type="text" name="monitMultEquipo1" class="form-control col-xs-4"></td>'+
                            '<td style="text-align:center;">BPM</td>'+
                            '<td style="text-align:center;">85</td>'+
                            '<td style="text-align:center;"><input type="text" name="monitMultEquipo6" class="form-control col-xs-4"></td>'+
                            '<td style="text-align:center;">%</td>'+
                            '<td style="text-align:center;">Sistólica</td>'+
                            '<td style="text-align:center;">Diastólica</td>'+
                            '<td style="text-align:center;">Sistólica</td>'+
                            '<td style="text-align:center;">Diastólica</td>'+
                            '<td style="text-align:center;">Unidad</td>'+
                          '</tr>'+
                          '<tr>'+
                            '<td style="text-align:center;">90</td>'+
                            '<td style="text-align:center;"><input type="text" name="monitMultEquipo2" class="form-control col-xs-4"></td>'+
                            '<td style="text-align:center;">BPM</td>'+
                            '<td style="text-align:center;">90</td>'+
                            '<td style="text-align:center;"><input type="text" name="monitMultEquipo7" class="form-control col-xs-4"></td>'+
                            '<td style="text-align:center;">%</td>'+
                            '<td style="text-align:center;">60</td>'+
                            '<td style="text-align:center;">30</td>'+
                            '<td style="text-align:center;"><input type="text" name="monitMultSistolica1" class="form-control col-xs-4"></td>'+
                            '<td style="text-align:center;"><input type="text" name="monitMultDiastolica1" class="form-control col-xs-4"></td>'+
                            '<td style="text-align:center;">mmHg</td>'+
                          '</tr>'+
                          '<tr>'+
                            '<td style="text-align:center;">120</td>'+
                            '<td style="text-align:center;"><input type="text" name="monitMultEquipo3" class="form-control col-xs-4"></td>'+
                            '<td style="text-align:center;">BPM</td>'+
                            '<td style="text-align:center;">95</td>'+
                            '<td style="text-align:center;"><input type="text" name="monitMultEquipo8" class="form-control col-xs-4"></td>'+
                            '<td style="text-align:center;">%</td>'+
                            '<td style="text-align:center;">120</td>'+
                            '<td style="text-align:center;">80</td>'+
                            '<td style="text-align:center;"><input type="text" name="monitMultSistolica2" class="form-control col-xs-4"></td>'+
                            '<td style="text-align:center;"><input type="text" name="monitMultDiastolica2" class="form-control col-xs-4"></td>'+
                            '<td style="text-align:center;">mmHg</td>'+
                          '</tr>'+
                          '<tr>'+
                            '<td style="text-align:center;">150</td>'+
                            '<td style="text-align:center;"><input type="text" name="monitMultEquipo4" class="form-control col-xs-4"></td>'+
                            '<td style="text-align:center;">BPM</td>'+
                            '<td style="text-align:center;">97</td>'+
                            '<td style="text-align:center;"><input type="text" name="monitMultEquipo9" class="form-control col-xs-4"></td>'+
                            '<td style="text-align:center;">%</td>'+
                            '<td style="text-align:center;">150</td>'+
                            '<td style="text-align:center;">100</td>'+
                            '<td style="text-align:center;"><input type="text" name="monitMultSistolica3" class="form-control col-xs-4"></td>'+
                            '<td style="text-align:center;"><input type="text" name="monitMultDiastolica3" class="form-control col-xs-4"></td>'+
                            '<td style="text-align:center;">mmHg</td>'+
                          '</tr>'+
                          '<tr>'+
                            '<td style="text-align:center;">180</td>'+
                            '<td style="text-align:center;"><input type="text" name="monitMultEquipo5" class="form-control col-xs-4"></td>'+
                            '<td style="text-align:center;">BPM</td>'+
                            '<td style="text-align:center;">99</td>'+
                            '<td style="text-align:center;"><input type="text" name="monitMultEquipo10" class="form-control col-xs-4"></td>'+
                            '<td style="text-align:center;">%</td>'+
                            '<td style="text-align:center;">200</td>'+
                            '<td style="text-align:center;">150</td>'+
                            '<td style="text-align:center;"><input type="text" name="monitMultSistolica4" class="form-control col-xs-4"></td>'+
                            '<td style="text-align:center;"><input type="text" name="monitMultDiastolica4" class="form-control col-xs-4"></td>'+
                            '<td style="text-align:center;">mmHg</td>'+
                          '</tr>'+
                    '</table>'
                  );

                     }

                  });




              }else if(respuesta[i]["mediciones"] == "Lampara de Fotocurado"){
                $('#mediciones').html(
                  '<input type="hidden" class="form-control col-xs-4" name="lamparaFotocurado" value="Lampara de Fotocurado">'+
                    '<h4>Lampara de Fotocurado</h4>'+
                    '<table class="table table-hover">'+

                          '<tr>'+
                            '<th style="text-align:center;">Equipo</th>'+
                            '<th style="text-align:center;">Patron</th>'+
                            '<th style="text-align:center;">Unidad</th>'+
                          '</tr>'+
                          '<tr>'+
                            '<td style="text-align:center;">Fijo</td>'+
                            '<td style="text-align:center;"><input type="text" name="lamparaFotoPatron1" class="form-control col-xs-4"></td>'+
                            '<td style="text-align:center;">mW/cm^2</td>'+
                          '</tr>'+
                          '<tr>'+
                             '<td style="text-align:center;">Bajo</td>'+
                             '<td style="text-align:center;"><input type="text" name="lamparaFotoPatron2" class="form-control col-xs-4"></td>'+
                             '<td style="text-align:center;">mW/cm^2</td>'+
                          '</tr>'+
                          '<tr>'+
                            '<td style="text-align:center;">Medio</td>'+
                            '<td style="text-align:center;"><input type="text" name="lamparaFotoPatron3" class="form-control col-xs-4"></td>'+
                            '<td style="text-align:center;">mW/cm^2</td>'+
                          '</tr>'+
                          '<tr>'+
                            '<td style="text-align:center;">Alto</td>'+
                            '<td style="text-align:center;"><input type="text" name="lamparaFotoPatron4" class="form-control col-xs-4"></td>'+
                            '<td style="text-align:center;">mW/cm^2</td>'+
                          '</tr>'+
                    '</table>'
                  );
              }else if(respuesta[i]["mediciones"] == "Autoclave"){
                $('#mediciones').html(
                  '<input type="hidden" class="form-control col-xs-4" name="autoclave" value="Autoclave">'+
                    '<h4>Autoclave</h4>'+
                    '<table class="table table-hover table-bordered">'+

                          '<tr>'+
                            '<th colspan="3" style="text-align:center;">Tiempo</th>'+
                            '<th colspan="3" style="text-align:center;">Temperatura</th>'+
                            '<th colspan="3" style="text-align:center;">Presión</th>'+
                          '</tr>'+
                          '<tr>'+
                            '<td style="text-align:center;">Fijoss</td>'+
                            '<td style="text-align:center;">Patron</td>'+
                            '<td style="text-align:center;">Unidad</td>'+
                            '<td style="text-align:center;">Fijoss</td>'+
                            '<td style="text-align:center;">Patron</td>'+
                            '<td style="text-align:center;">Unidad</td>'+
                            '<td style="text-align:center;">Fijoss</td>'+
                            '<td style="text-align:center;">Patron</td>'+
                            '<td style="text-align:center;">Unidad</td>'+
                          '</tr>'+
                          '<tr>'+
                             '<td style="text-align:center;"><input type="text" name="autoclaveEquipo1" class="form-control col-xs-4"></td>'+
                             '<td style="text-align:center;"><input type="text" name="autoclavePatron1" class="form-control col-xs-4"></td>'+
                             '<td style="text-align:center;"><select name="unidadAutoclave"><option value="s">s</option><option value="min">min</option><option value="h">h</option></select></td>'+
                             '<td style="text-align:center;"><input type="text" name="autoclaveEquipo3" class="form-control col-xs-4"></td>'+
                             '<td style="text-align:center;"><input type="text" name="autoclavePatron3"  class="form-control col-xs-4"></td>'+
                             '<td style="text-align:center;"><select name="gradosAutoclave"><option value="°C">°C</option><option value="°F">°F</option></select></td>'+
                             '<td style="text-align:center;"><input type="text" name="autoclaveEquipo5" class="form-control col-xs-4"></td>'+
                             '<td style="text-align:center;"><input type="text" name="autoclavePatron5"  class="form-control col-xs-4"></td>'+
                             '<td style="text-align:center;"><select name="unidad2Autoclave"><option value="psi">psi</option><option value="Kpa">Kpa</option><option value="Mpa">Mpa</option><option value="mmHg">mmHg</option><option value="inHg">inHg</option></select></td>'+
                          '</tr>'+
                          '<tr>'+
                             '<td style="text-align:center;"><input type="text" name="autoclaveEquipo2" class="form-control col-xs-4"></td>'+
                             '<td style="text-align:center;"><input type="text" name="autoclavePatron2" class="form-control col-xs-4"></td>'+
                             '<td style="text-align:center;"><select name="unidad22Autoclave"><option value="s">s</option><option value="min">min</option><option value="h">h</option></select></td>'+
                             '<td style="text-align:center;"><input type="text" name="autoclaveEquipo4" class="form-control col-xs-4"></td>'+
                             '<td style="text-align:center;"><input type="text" name="autoclavePatron4" class="form-control col-xs-4"></td>'+
                             '<td style="text-align:center;"><select name="gradosAutoclave22"><option value="°C">°C</option><option value="°F">°F</option></select></td>'+
                             '<td style="text-align:center;"><input type="text" name="autoclaveEquipo6" class="form-control col-xs-4"></td>'+
                             '<td style="text-align:center;"><input type="text" name="autoclavePatron6" class="form-control col-xs-4"></td>'+
                             '<td style="text-align:center;"><select name="unidad222Autoclave"><option value="psi">psi</option><option value="Kpa">Kpa</option><option value="Mpa">Mpa</option><option value="mmHg">mmHg</option><option value="inHg">inHg</option></select></td>'+
                          '</tr>'+
                    '</table>'
                  );
              }else if(respuesta[i]["mediciones"] == "Bomba de Infusion"){

                $('#mediciones').html(
                  '<input type="hidden" class="form-control col-xs-4" name="bombaInfusion" value="Bomba de infusion">'+
                    '<h4>Bomba de infusión</h4>'+
                    '<table class="table table-hover table-bordered">'+

                          '<tr>'+
                            '<th colspan="4" style="text-align:center;">Flujo</th>'+
                            '<th colspan="3" style="text-align:center;">Volumen</th>'+
                          '</tr>'+
                          '<tr>'+
                            '<td style="text-align:center;">Canal</td>'+
                            '<td style="text-align:center;">Equipo</td>'+
                            '<td style="text-align:center;">Patrón</td>'+
                            '<td style="text-align:center;">Unidad</td>'+
                            '<td style="text-align:center;">equipo</td>'+
                            '<td style="text-align:center;">Patrón</td>'+
                            '<td style="text-align:center;">Unidad</td>'+
                          '</tr>'+
                          '<tr>'+
                             '<td style="text-align:center;">Canal 1</td>'+
                             '<td style="text-align:center;">200</td>'+
                             '<td style="text-align:center;"><input type="text" name="bombaInfuPatron1" class="form-control col-xs-4"></td>'+
                             '<td style="text-align:center;">ml/h</td>'+
                             '<td style="text-align:center;">10</td>'+
                             '<td style="text-align:center;"><input type="text" name="bombaInfuPatron3" class="form-control col-xs-4"></td>'+
                             '<td style="text-align:center;">ml</td>'+
                          '</tr>'+
                          '<tr>'+
                             '<td style="text-align:center;">Canal 2</td>'+
                             '<td style="text-align:center;">200</td>'+
                             '<td style="text-align:center;"><input type="text" name="bombaInfuPatron2" class="form-control col-xs-4"></td>'+
                             '<td style="text-align:center;">ml/h</td>'+
                             '<td style="text-align:center;">10</td>'+
                             '<td style="text-align:center;"><input type="text" name="bombaInfuPatron4" class="form-control col-xs-4"></td>'+
                             '<td style="text-align:center;">ml</td>'+
                          '</tr>'+
                    '</table>'
                  );

              }else if(respuesta[i]["mediciones"] == "Centrifuga / Agitador de Mazzini / Agitador de tubos/Vortex"){
                $('#mediciones').html(
                  '<input type="hidden" class="form-control col-xs-4" name="centrifuga" value="centrifuga">'+
                    '<h4>Centrifuga / Agitador de Mazzini / Agitador de tubos/Vortex</h4>'+
                    '<table class="table table-hover table-bordered">'+

                          '<tr>'+
                            '<th style="text-align:center;">Equipo</th>'+
                            '<th style="text-align:center;">Patrón</th>'+
                            '<th style="text-align:center;">Unidad</th>'+
                          '</tr>'+
                          '<tr>'+
                            '<td><input type="text" name="centrifugaEquipo1" class="form-control col-xs-4"></td>'+
                            '<td><input type="text" name="centrifugaPatron1" class="form-control col-xs-4"></td>'+
                            '<td style="text-align:center;">RPM</td>'+
                          '</tr>'+
                          '<tr>'+
                            '<td><input type="text" name="centrifugaEquipo2" class="form-control col-xs-4"></td>'+
                            '<td><input type="text" name="centrifugaPatron2" class="form-control col-xs-4"></td>'+
                            '<td style="text-align:center;">RPM</td>'+
                          '</tr>'+
                          '<tr>'+
                            '<td style="text-align:center;"><input type="text" name="centrifugaEquipo3" class="form-control col-xs-4"></td>'+
                            '<td style="text-align:center;"><input type="text" name="centrifugaPatron3" class="form-control col-xs-4"></td>'+
                            '<td style="text-align:center;">RPM</td>'+
                          '</tr>'+
                    '</table>'
                  );
              }else if(respuesta[i]["mediciones"] == "Audiómetro"){
                 $('#mediciones').html(
                   '<input type="hidden" class="form-control col-xs-4" name="audiometro" value="Audiometro">'+
                    '<h4>Audiómetro</h4>'+
                    '<table class="table table-hover table-bordered">'+

                          '<tr>'+
                            '<th colspan="4" style="text-align:center;">Frecuencia</th>'+
                            '<th colspan="4" style="text-align:center;">Nivel audicion</th>'+
                          '</tr>'+
                          '<tr>'+
                            '<td style="text-align:center;">Equipo</td>'+
                            '<td style="text-align:center;">Auricular Izq.(Patrón)</td>'+
                            '<td style="text-align:center;">Auricular Der.(Patrón)</td>'+
                            '<td style="text-align:center;">Unidad</td>'+
                            '<td style="text-align:center;">Equipo</td>'+
                            '<td style="text-align:center;">Auricular Izq.(Patrón)</td>'+
                            '<td style="text-align:center;">Auricular Der.(Patrón)</td>'+
                            '<td style="text-align:center;">Unidad</td>'+
                          '</tr>'+
                          '<tr>'+
                            '<td style="text-align:center;"><input type="text" name="audiometroEquipo1" class="form-control col-xs-4"></td>'+
                            '<td style="text-align:center;"><input type="text" name="audiometroAurIz1" class="form-control col-xs-4"></td>'+
                            '<td style="text-align:center;"><input type="text" name="audiometroAurDer1" class="form-control col-xs-4"></td>'+
                            '<td style="text-align:center;">Hz</td>'+
                            '<td style="text-align:center;"><input type="text" name="audiometroEquipo3" class="form-control col-xs-4"></td>'+
                            '<td style="text-align:center;"><input type="text" name="audiometroAurIz3" class="form-control col-xs-4"></td>'+
                            '<td style="text-align:center;"><input type="text" name="audiometroAurDer3" class="form-control col-xs-4"></td>'+
                            '<td style="text-align:center;">dB</td>'+
                          '</tr>'+
                          '<tr>'+
                            '<td style="text-align:center;"><input type="text" name="audiometroEquipo2" class="form-control col-xs-4"></td>'+
                            '<td style="text-align:center;"><input type="text" name="audiometroAurIz2" class="form-control col-xs-4"></td>'+
                            '<td style="text-align:center;"><input type="text" name="audiometroAurDer2" class="form-control col-xs-4"></td>'+
                            '<td style="text-align:center;">Hz</td>'+
                            '<td style="text-align:center;"><input type="text" name="audiometroEquipo24" class="form-control col-xs-4"></td>'+
                            '<td style="text-align:center;"><input type="text" name="audiometroAurIz24" class="form-control col-xs-4"></td>'+
                            '<td style="text-align:center;"><input type="text" name="audiometroAurDer24" class="form-control col-xs-4"></td>'+
                            '<td style="text-align:center;">dB</td>'+
                          '</tr>'+
                          '<tr>'+
                            '<td style="text-align:center;"><input type="text" name="audiometroEquipo8" class="form-control col-xs-4"></td>'+
                            '<td style="text-align:center;"><input type="text" name="audiometroAurIz8" class="form-control col-xs-4"></td>'+
                            '<td style="text-align:center;"><input type="text" name="audiometroAurDer8" class="form-control col-xs-4"></td>'+
                            '<td style="text-align:center;">Hz</td>'+
                            '<td style="text-align:center;"><input type="text" name="audiometroEquipo25" class="form-control col-xs-4"></td>'+
                            '<td style="text-align:center;"><input type="text" name="audiometroAurIz25" class="form-control col-xs-4"></td>'+
                            '<td style="text-align:center;"><input type="text" name="audiometroAurDer25" class="form-control col-xs-4"></td>'+
                            '<td style="text-align:center;">dB</td>'+
                          '</tr>'+
                          '<tr>'+
                            '<td style="text-align:center;"><input type="text" name="audiometroEquipo4" class="form-control col-xs-4"></td>'+
                            '<td style="text-align:center;"><input type="text" name="audiometroAurIz4" class="form-control col-xs-4"></td>'+
                            '<td style="text-align:center;"><input type="text" name="audiometroAurDer4" class="form-control col-xs-4"></td>'+
                            '<td style="text-align:center;">Hz</td>'+
                            '<td style="text-align:center;"><input type="text" name="audiometroEquipo6" class="form-control col-xs-4"></td>'+
                            '<td style="text-align:center;"><input type="text" name="audiometroAurIz6" class="form-control col-xs-4"></td>'+
                            '<td style="text-align:center;"><input type="text" name="audiometroAurDer6" class="form-control col-xs-4"></td>'+
                            '<td style="text-align:center;">dB</td>'+
                          '</tr>'+
                          '<tr>'+
                            '<td style="text-align:center;"><input type="text" name="audiometroEquipo5" class="form-control col-xs-4"></td>'+
                            '<td style="text-align:center;"><input type="text" name="audiometroAurIz5" class="form-control col-xs-4"></td>'+
                            '<td style="text-align:center;"><input type="text" name="audiometroAurDer5" class="form-control col-xs-4"></td>'+
                            '<td style="text-align:center;">Hz</td>'+
                            '<td style="text-align:center;"><input type="text" name="audiometroEquipo7" class="form-control col-xs-4"></td>'+
                            '<td style="text-align:center;"><input type="text" name="audiometroAurIz7" class="form-control col-xs-4"></td>'+
                            '<td style="text-align:center;"><input type="text" name="audiometroAurDer7" class="form-control col-xs-4"></td>'+
                            '<td style="text-align:center;">dB</td>'+
                          '</tr>'+
                    '</table>'
                  );
              }else if(respuesta[i]["mediciones"] == "Bascula pesa personas / bascula pesa bebes / gramera"){

                $('#vasculas25').css("display", "block");

                $('#vasculas').change(function(){

                  var vasculas = $(this).val();

                  if (vasculas == "kg") {
                    $('#mediciones').html(
                  '<input type="hidden" class="form-control col-xs-4" name="kg" value="kg">'+
                  '<input type="hidden" class="form-control col-xs-4" name="basculas" value="basculas">'+
                    '<h4>Bascula pesa personas / bascula pesa bebes / gramera</h4>'+
                    '<table class="table table-hover table-bordered">'+

                          '<tr>'+
                            '<th style="text-align:center;">Patrón</th>'+
                            '<th style="text-align:center;">Equipo</th>'+
                            '<th style="text-align:center;">Unidad</th>'+
                          '</tr>'+
                          '<tr>'+
                            '<td style="text-align:center;"><input type="text" name="basculasPatron1" class="form-control col-xs-4"></td>'+
                            '<td style="text-align:center;"><input type="text" name="basculasEquipo1" class="form-control col-xs-4"></td>'+
                            '<td style="text-align:center;">Kg</td>'+
                          '</tr>'+
                          '<tr>'+
                            '<td style="text-align:center;"><input type="text" name="basculasPatron2" class="form-control col-xs-4"></td>'+
                            '<td style="text-align:center;"><input type="text" name="basculasEquipo2" class="form-control col-xs-4"></td>'+
                            '<td style="text-align:center;">Kg</td>'+
                          '</tr>'+
                          '<tr>'+
                            '<td style="text-align:center;"><input type="text" name="basculasPatron3" class="form-control col-xs-4"></td>'+
                            '<td style="text-align:center;"><input type="text" name="basculasEquipo3" class="form-control col-xs-4"></td>'+
                            '<td style="text-align:center;">Kg</td>'+
                          '</tr>'+
                          '<tr>'+
                            '<td style="text-align:center;"><input type="text" name="basculasPatron4" class="form-control col-xs-4"></td>'+
                            '<td style="text-align:center;"><input type="text" name="basculasEquipo4" class="form-control col-xs-4"></td>'+
                            '<td style="text-align:center;">Kg</td>'+
                          '</tr>'+
                          '<tr>'+
                            '<td style="text-align:center;"><input type="text" name="basculasPatron5" class="form-control col-xs-4"></td>'+
                            '<td style="text-align:center;"><input type="text" name="basculasEquipo5" class="form-control col-xs-4"></td>'+
                            '<td style="text-align:center;">Kg</td>'+
                          '</tr>'+
                    '</table>'
                  );
                  }else if (vasculas == "g") {
                     $('#mediciones').html(
                  '<input type="hidden" class="form-control col-xs-4" name="g" value="g">'+
                  '<input type="hidden" class="form-control col-xs-4" name="basculas" value="basculas">'+
                    '<h4>Bascula pesa personas / bascula pesa bebes / gramera</h4>'+
                    '<table class="table table-hover table-bordered">'+

                          '<tr>'+
                            '<th style="text-align:center;">Patrón</th>'+
                            '<th style="text-align:center;">Equipo</th>'+
                            '<th style="text-align:center;">Unidad</th>'+
                          '</tr>'+
                          '<tr>'+
                            '<td style="text-align:center;"><input type="text" name="basculasPatron1" class="form-control col-xs-4"></td>'+
                            '<td style="text-align:center;"><input type="text" name="basculasEquipo1" class="form-control col-xs-4"></td>'+
                            '<td style="text-align:center;">g</td>'+
                          '</tr>'+
                          '<tr>'+
                            '<td style="text-align:center;"><input type="text" name="basculasPatron2" class="form-control col-xs-4"></td>'+
                            '<td style="text-align:center;"><input type="text" name="basculasEquipo2" class="form-control col-xs-4"></td>'+
                            '<td style="text-align:center;">g</td>'+
                          '</tr>'+
                          '<tr>'+
                            '<td style="text-align:center;"><input type="text" name="basculasPatron3" class="form-control col-xs-4"></td>'+
                            '<td style="text-align:center;"><input type="text" name="basculasEquipo3" class="form-control col-xs-4"></td>'+
                            '<td style="text-align:center;">g</td>'+
                          '</tr>'+
                          '<tr>'+
                            '<td style="text-align:center;"><input type="text" name="basculasPatron4" class="form-control col-xs-4"></td>'+
                            '<td style="text-align:center;"><input type="text" name="basculasEquipo4" class="form-control col-xs-4"></td>'+
                            '<td style="text-align:center;">g</td>'+
                          '</tr>'+
                          '<tr>'+
                            '<td style="text-align:center;"><input type="text" name="basculasPatron5" class="form-control col-xs-4"></td>'+
                            '<td style="text-align:center;"><input type="text" name="basculasEquipo5" class="form-control col-xs-4"></td>'+
                            '<td style="text-align:center;">g</td>'+
                          '</tr>'+
                    '</table>'
                  );
                  }

                });


                
              }else if(respuesta[i]["mediciones"] == "Cabina de Audiometría"){
                $('#mediciones').html(
                  '<input type="hidden" class="form-control col-xs-4" name="audiometria" value="Audiometria">'+
                    '<h4>Cabina de Audiometría</h4>'+
                    '<table class="table table-hover">'+

                          '<tr>'+
                            '<th>Atenuación</th>'+
                            '<th><input name="audiometriaAtenuacion1" type="text" class="form-control col-xs-4"></th>'+
                            '<th>dB</th>'+
                          '</tr>'+
 
                    '</table>'
                  );
              }else if(respuesta[i]["mediciones"] == "Concentrador de oxigeno"){
                $('#mediciones').html(
                  '<input type="hidden" class="form-control col-xs-4" name="concentradorOxigeno" value="Concentrador de oxigeno">'+
                    '<h4>Concentrador de oxigeno</h4>'+
                    '<table class="table table-hover table-bordered">'+

                          '<tr>'+
                            '<th colspan="3" style="text-align:center;">Flujo</th>'+
                            '<th colspan="3" style="text-align:center;">Concentración de oxígeno</th>'+
                          '</tr>'+
                          '<tr>'+
                            '<td style="text-align:center;">Equipo</td>'+
                            '<td style="text-align:center;">Patrón</td>'+
                            '<td style="text-align:center;">Unidad</td>'+
                            '<td style="text-align:center;">Equipo</td>'+
                            '<td style="text-align:center;">Patrón</td>'+
                            '<td style="text-align:center;">Unidad</td>'+
                          '</tr>'+
                         '<tr>'+
                            '<td style="text-align:center;"><input type="text" name="concentradorOxEquipo1" class="form-control col-xs-4"></td>'+
                            '<td style="text-align:center;"><input type="text" name="concentradorOxPatron1" class="form-control col-xs-4"></td>'+
                            '<td style="text-align:center;">LPM</td>'+
                            '<td style="text-align:center;"><input type="text" name="concentradorOxEquipo4" class="form-control col-xs-4"></td>'+
                            '<td style="text-align:center;"><input type="text" name="concentradorOxPatron4" class="form-control col-xs-4"></td>'+
                            '<td style="text-align:center;">%</td>'+
                          '</tr>'+
                          '<tr>'+
                            '<td style="text-align:center;"><input type="text" name="concentradorOxEquipo2" class="form-control col-xs-4"></td>'+
                            '<td style="text-align:center;"><input type="text" name="concentradorOxPatron2" class="form-control col-xs-4"></td>'+
                            '<td style="text-align:center;">LPM</td>'+
                            '<td style="text-align:center;"><input type="text" name="concentradorOxEquipo5" class="form-control col-xs-4"></td>'+
                            '<td style="text-align:center;"><input type="text" name="concentradorOxPatron5" class="form-control col-xs-4"></td>'+
                            '<td style="text-align:center;">%</td>'+
                          '<tr>'+
                            '<td style="text-align:center;"><input type="text" name="concentradorOxEquipo3" class="form-control col-xs-4"></td>'+
                            '<td style="text-align:center;"><input type="text" name="concentradorOxPatron3" class="form-control col-xs-4"></td>'+
                            '<td style="text-align:center;">LPM</td>'+
                            '<td style="text-align:center;"><input type="text" name="concentradorOxEquipo6" class="form-control col-xs-4"></td>'+
                            '<td style="text-align:center;"><input type="text" name="concentradorOxPatron6" class="form-control col-xs-4"></td>'+
                            '<td style="text-align:center;">%</td>'+
                          '</tr>'+
                    '</table>'
                  );
              }else if(respuesta[i]["mediciones"] == "Desfibrilador"){
                $('#mediciones').html(
                  '<input type="hidden" class="form-control col-xs-4" name="desfibrilador" value="Desfibrilador">'+
                    '<h4>Desfibrilador</h4>'+
                    '<table class="table table-hover table-bordered">'+

                          '<tr>'+
                            '<th style="text-align:center;">Equipo</th>'+
                            '<th style="text-align:center;">Patrón</th>'+
                            '<th style="text-align:center;">Unidad</th>'+
                          '</tr>'+
                          '<tr>'+
                            '<td style="text-align:center;"><input type="text" name="desfibriladorEquipo1" class="form-control col-xs-4"></td>'+
                            '<td style="text-align:center;"><input type="text" name="desfibriladorPatron1" class="form-control col-xs-4"></td>'+
                            '<td style="text-align:center;">J</td>'+
                          '</tr>'+
                          '<tr>'+
                            '<td style="text-align:center;"><input type="text" name="desfibriladorEquipo2" class="form-control col-xs-4"></td>'+
                            '<td style="text-align:center;"><input type="text" name="desfibriladorPatron2" class="form-control col-xs-4"></td>'+
                            '<td style="text-align:center;">J</td>'+
                          '</tr>'+
                          '<tr>'+
                            '<td style="text-align:center;"><input type="text" name="desfibriladorEquipo3" class="form-control col-xs-4"></td>'+
                            '<td style="text-align:center;"><input type="text" name="desfibriladorPatron3" class="form-control col-xs-4"></td>'+
                            '<td style="text-align:center;">J</td>'+
                          '</tr>'+
                          '<tr>'+
                            '<td style="text-align:center;"><input type="text" name="desfibriladorEquipo4" class="form-control col-xs-4"></td>'+
                            '<td style="text-align:center;"><input type="text" name="desfibriladorPatron4" class="form-control col-xs-4"></td>'+
                            '<td style="text-align:center;">J</td>'+
                          '</tr>'+
                          '<tr>'+
                            '<td style="text-align:center;"><input type="text" name="desfibriladorEquipo5" class="form-control col-xs-4"></td>'+
                            '<td style="text-align:center;"><input type="text" name="desfibriladorPatron5" class="form-control col-xs-4"></td>'+
                            '<td style="text-align:center;">j</td>'+
                          '</tr>'+
                  
                    '</table>'
                  );
              }else if(respuesta[i]["mediciones"] == "Doppler Fetal / Monitor Fetal"){
                $('#mediciones').html(
                  '<input type="hidden" class="form-control col-xs-4" name="doppler" value="Doppler">'+
                    '<h4>Doppler Fetal / Monitor Fetal</h4>'+
                    '<table class="table table-hover table-bordered">'+
                          '<tr>'+
                            '<th style="text-align:center;">Patrón</th>'+
                            '<th style="text-align:center;">Equipo</th>'+
                            '<th style="text-align:center;">Unidad</th>'+
                          '</tr>'+
                          '<tr>'+
                            '<td style="text-align:center;">60</td>'+
                            '<td style="text-align:center;"><input type="text" name="dopplerEquipo1" class="form-control col-xs-4"></td>'+
                            '<td style="text-align:center;">BPM</td>'+
                          '</tr>'+
                          '<tr>'+
                            '<td style="text-align:center;">90</td>'+
                            '<td style="text-align:center;"><input type="text" name="dopplerEquipo2" class="form-control col-xs-4"></td>'+
                            '<td style="text-align:center;">BPM</td>'+
                          '</tr>'+
                          '<tr>'+
                            '<td style="text-align:center;">120</td>'+
                            '<td style="text-align:center;"><input type="text" name="dopplerEquipo3" class="form-control col-xs-4"></td>'+
                            '<td style="text-align:center;">BPM</td>'+
                          '</tr>'+
                          '<tr>'+
                            '<td style="text-align:center;">150</td>'+
                            '<td style="text-align:center;"><input type="text" name="dopplerEquipo4" class="form-control col-xs-4"></td>'+
                            '<td style="text-align:center;">BPM</td>'+
                          '</tr>'+
                          '<tr>'+
                            '<td style="text-align:center;">180</td>'+
                            '<td style="text-align:center;"><input type="text" name="dopplerEquipo5" class="form-control col-xs-4"></td>'+
                            '<td style="text-align:center;">BPM</td>'+
                          '</tr>'+
                          '<tr>'+
                            '<td style="text-align:center;">210</td>'+
                            '<td style="text-align:center;"><input type="text" name="dopplerEquipo6" class="form-control col-xs-4"></td>'+
                            '<td style="text-align:center;">BPM</td>'+
                          '</tr>'+
                  
                    '</table>'
                  );
              }else if(respuesta[i]["mediciones"] == "Electrocardiografo / Holter / Prueba de Esfuerzo"){
                $('#mediciones').html(
                  '<input type="hidden" class="form-control col-xs-4" name="holter" value="Holter">'+
                    '<h4>Electrocardiografo / Holter / Prueba de Esfuerzo</h4>'+
                    '<table class="table table-hover table-bordered">'+
                          '<tr>'+
                            '<th style="text-align:center;">Patrón</th>'+
                            '<th style="text-align:center;">Equipo</th>'+
                            '<th style="text-align:center;">Unidad</th>'+
                          '</tr>'+
                          '<tr>'+
                            '<td style="text-align:center;">60</td>'+
                            '<td style="text-align:center;"><input type="text" name="holterEquipo1" class="form-control col-xs-4"></td>'+
                            '<td style="text-align:center;">BPM</td>'+
                          '</tr>'+
                          '<tr>'+
                            '<td style="text-align:center;">90</td>'+
                            '<td style="text-align:center;"><input type="text" name="holterEquipo2" class="form-control col-xs-4"></td>'+
                            '<td style="text-align:center;">BPM</td>'+
                          '</tr>'+
                          '<tr>'+
                            '<td style="text-align:center;">120</td>'+
                            '<td style="text-align:center;"><input type="text" name="holterEquipo3" class="form-control col-xs-4"></td>'+
                            '<td style="text-align:center;">BPM</td>'+
                          '</tr>'+
                          '<tr>'+
                            '<td style="text-align:center;">150</td>'+
                            '<td style="text-align:center;"><input type="text" name="holterEquipo4" class="form-control col-xs-4"></td>'+
                            '<td style="text-align:center;">BPM</td>'+
                          '</tr>'+
                          '<tr>'+
                            '<td style="text-align:center;">180</td>'+
                            '<td style="text-align:center;"><input type="text" name="holterEquipo5" class="form-control col-xs-4"></td>'+
                            '<td style="text-align:center;">BPM</td>'+
                          '</tr>'+
                  
                    '</table>'
                  );
              }else if(respuesta[i]["mediciones"] == "Espirometro"){
                $('#mediciones').html(
                  '<input type="hidden" class="form-control col-xs-4" name="espirometro" value="Espirometro">'+
                    '<h4>Espirometro</h4>'+
                    '<table class="table table-hover table-bordered">'+
                          '<tr>'+
                            '<th style="text-align:center;">Equipo</th>'+
                            '<th style="text-align:center;">Patrón</th>'+
                            '<th style="text-align:center;">Unidad</th>'+
                          '</tr>'+
                          '<tr>'+
                            '<td style="text-align:center;">500</td>'+
                            '<td style="text-align:center;"><input type="text" name="espirometroPatron1" class="form-control col-xs-4"></td>'+
                            '<td style="text-align:center;">ml</td>'+
                          '</tr>'+
                          '<tr>'+
                            '<td style="text-align:center;">1000</td>'+
                            '<td style="text-align:center;"><input type="text" name="espirometroPatron2" class="form-control col-xs-4"></td>'+
                            '<td style="text-align:center;">ml</td>'+
                          '</tr>'+
                          '<tr>'+
                            '<td style="text-align:center;">3000</td>'+
                            '<td style="text-align:center;"><input type="text" name="espirometroPatron3" class="form-control col-xs-4"></td>'+
                            '<td style="text-align:center;">ml</td>'+
                          '</tr>'+
    
                    '</table>'
                  );
              }else if(respuesta[i]["mediciones"] == "Flujometro"){

                 $('#mediciones').html(
                   '<input type="hidden" class="form-control col-xs-4" name="flujometro" value="Flujometro">'+
                    '<h4>Flujometo</h4>'+
                    '<table class="table table-hover table-bordered">'+
                          '<tr>'+
                            '<th style="text-align:center;">Equipo</th>'+
                            '<th style="text-align:center;">Patrón</th>'+
                            '<th style="text-align:center;">Unidad</th>'+
                          '</tr>'+
                          '<tr>'+
                            '<td style="text-align:center;"><input type="text" name="flujometroEquipo1" class="form-control col-xs-4"></td>'+
                            '<td style="text-align:center;"><input type="text" name="flujometroPatron1" class="form-control col-xs-4"></td>'+
                            '<td style="text-align:center;">LPM</td>'+
                          '</tr>'+
                          '<tr>'+
                            '<td style="text-align:center;"><input type="text" name="flujometroEquipo2" class="form-control col-xs-4"></td>'+
                            '<td style="text-align:center;"><input type="text" name="flujometroPatron2" class="form-control col-xs-4"></td>'+
                            '<td style="text-align:center;">LPM</td>'+
                          '</tr>'+
                          '<tr>'+
                            '<td style="text-align:center;"><input type="text" name="flujometroEquipo3" class="form-control col-xs-4"></td>'+
                            '<td style="text-align:center;"><input type="text" name="flujometroPatron3" class="form-control col-xs-4"></td>'+
                            '<td style="text-align:center;">LPM</td>'+
                          '</tr>'+
                          '<tr>'+
                            '<td style="text-align:center;"><input type="text" name="flujometroEquipo4" class="form-control col-xs-4"></td>'+
                            '<td style="text-align:center;"><input type="text" name="flujometroPatron4" class="form-control col-xs-4"></td>'+
                            '<td style="text-align:center;">LPM</td>'+
                          '</tr>'+
    
                    '</table>'
                  );
              }else if(respuesta[i]["mediciones"] == "Termohigrometros"){

                 $('#mediciones').html(
                   '<input type="hidden" class="form-control col-xs-4" name="Termohigrometros" value="Termohigrometros">'+
                    '<h4>Termohigrometros</h4>'+
                    '<table class="table table-hover table-bordered">'+
                          '<tr>'+
                            '<th colspan="4" style="text-align:center;">Temperatura</th>'+
                            '<th colspan="3" style="text-align:center;">Humedad Relativa</th>'+
                          '</tr>'+
                          '<tr>'+
                            '<td style="text-align:center;">Patrón</td>'+
                            '<td style="text-align:center;">In</td>'+
                            '<td style="text-align:center;">Out</td>'+
                            '<td style="text-align:center;">Unidad</td>'+
                            '<td style="text-align:center;">Patrón</td>'+
                            '<td style="text-align:center;">Equipo</td>'+
                            '<td style="text-align:center;">Unidad</td>'+
                          '</tr>'+
                          '<tr>'+
                            '<td style="text-align:center;"><input type="text" name="Termohigrometrospatron1" class="form-control col-xs-4"></td>'+
                            '<td style="text-align:center;"><input type="text" name="Termohigrometrosin1" class="form-control col-xs-4"></td>'+
                            '<td style="text-align:center;"><input type="text" name="Termohigrometrosou1" class="form-control col-xs-4"></td>'+
                            '<td style="text-align:center;">°C</td>'+
                            '<td style="text-align:center;"><input type="text" name="Termohigrometrospatron2" class="form-control col-xs-4"></td>'+
                            '<td style="text-align:center;"><input type="text" name="Termohigrometrosequipo1" class="form-control col-xs-4"></td>'+
                            '<td style="text-align:center;">%</td>'+
                          '</tr>'+
                          '<tr>'+
                            '<td style="text-align:center;"><input type="text" name="Termohigrometrospatron5" class="form-control col-xs-4"></td>'+
                            '<td style="text-align:center;"><input type="text" name="Termohigrometrosin2" class="form-control col-xs-4"></td>'+
                            '<td style="text-align:center;"><input type="text" name="Termohigrometrosou2" class="form-control col-xs-4"></td>'+
                            '<td style="text-align:center;">°C</td>'+
                            '<td style="text-align:center;"><input type="text" name="Termohigrometrospatron3" class="form-control col-xs-4"></td>'+
                            '<td style="text-align:center;"><input type="text" name="Termohigrometrosequipo2" class="form-control col-xs-4"></td>'+
                            '<td style="text-align:center;">%</td>'+
                          '</tr>'+
    
                    '</table>'
                  );
              }

              else if(respuesta[i]["mediciones"] == "Incubadora neonatal / Servocuna / Sistema de normotermia / Incubadora de muestras / Baño serologico / Termometro de nevera / Termometro de punzón"){

                $('#incubadora25').css("display", "block");

                $('#incubadora').change(function(){

                  var incubadora = $(this).val();

                  if (incubadora == "centigrado") {

                    $('#mediciones').html(
                  '<input type="hidden" class="form-control col-xs-4" name="centigrado" value="centigrado">'+
                  '<input type="hidden" class="form-control col-xs-4" name="incubadora" value="Incubadora">'+
                    '<h4>Incubadora neonatal / Servocuna / Sistema de normotermia / Incubadora de muestras / Baño serologico / Termometro de nevera / Termometro de punzón</h4>'+
                    '<table class="table table-hover table-bordered">'+
                          '<tr>'+
                            '<th style="text-align:center;">Equipo</th>'+
                            '<th style="text-align:center;">Patrón</th>'+
                            '<th style="text-align:center;">Unidad</th>'+
                          '</tr>'+
                          '<tr>'+
                            '<td><input type="text" name="incubadoraEquipo1" class="form-control col-xs-4"></td>'+
                            '<td><input type="text" name="incubadoraPatron1" class="form-control col-xs-4"></td>'+
                            '<td>°C</td>'+
                          '</tr>'+
                          '<tr>'+
                            '<td><input type="text" name="incubadoraEquipo2" class="form-control col-xs-4"></td>'+
                            '<td><input type="text" name="incubadoraPatron2" class="form-control col-xs-4"></td>'+
                            '<td>°C</td>'+
                          '</tr>'+
                          '<tr>'+
                            '<td><input type="text" name="incubadoraEquipo3" class="form-control col-xs-4"></td>'+
                            '<td><input type="text" name="incubadoraPatron3" class="form-control col-xs-4"></td>'+
                            '<td>°C</td>'+
                          '</tr>'+
    
                    '</table>'
                  );

                  }else if (incubadora == "farenheit") {
                    $('#mediciones').html(
                  '<input type="hidden" class="form-control col-xs-4" name="farenheit" value="farenheit">'+
                  '<input type="hidden" class="form-control col-xs-4" name="incubadora" value="Incubadora">'+
                    '<h4>Incubadora neonatal / Servocuna / Sistema de normotermia / Incubadora de muestras / Baño serologico / Termometro de nevera / Termometro de punzón</h4>'+
                    '<table class="table table-hover table-bordered">'+
                          '<tr>'+
                            '<th style="text-align:center;">Equipo</th>'+
                            '<th style="text-align:center;">Patrón</th>'+
                            '<th style="text-align:center;">Unidad</th>'+
                          '</tr>'+
                          '<tr>'+
                            '<td><input type="text" name="incubadoraEquipo1" class="form-control col-xs-4"></td>'+
                            '<td><input type="text" name="incubadoraPatron1" class="form-control col-xs-4"></td>'+
                            '<td>°F</td>'+
                          '</tr>'+
                          '<tr>'+
                            '<td><input type="text" name="incubadoraEquipo2" class="form-control col-xs-4"></td>'+
                            '<td><input type="text" name="incubadoraPatron2" class="form-control col-xs-4"></td>'+
                            '<td>°F</td>'+
                          '</tr>'+
                          '<tr>'+
                            '<td><input type="text" name="incubadoraEquipo3" class="form-control col-xs-4"></td>'+
                            '<td><input type="text" name="incubadoraPatron3" class="form-control col-xs-4"></td>'+
                            '<td>°F</td>'+
                          '</tr>'+
    
                    '</table>'
                  );

                  }
       
                });
              }else if(respuesta[i]["mediciones"] == "Monitor NIBP"){

                $('#mediciones').html(
                  '<input type="hidden" class="form-control col-xs-4" name="monitor" value="Monitor">'+
                    '<h4>Monitor NIBP</h4>'+
                    '<table class="table table-hover table-bordered">'+
                          '<tr>'+
                            '<th colspan="4" style="text-align:center;">NIBP</th>'+
                            '<th colspan="4" style="text-align:center;">SPO2</th>'+
                          '</tr>'+
                          '<tr>'+
                            '<td colspan="2" style="text-align:center;">Patrón</td>'+
                            '<td colspan="3" style="text-align:center;">Equipo</td>'+
                            '<td style="text-align:center;">Patrón</td>'+
                            '<td style="text-align:center;">Equipo</td>'+
                            '<td style="text-align:center;">Unidad</td>'+
                          '</tr>'+
                          '<tr>'+
                            '<td style="text-align:center;">Sistólica</td>'+
                            '<td style="text-align:center;">Diastólica</td>'+
                            '<td style="text-align:center;">Sistólica</td>'+
                            '<td style="text-align:center;">Diastólica</td>'+
                            '<td style="text-align:center;">Unidad</td>'+
                            '<td style="text-align:center;">85</td>'+
                            '<td style="text-align:center;"><input type="text" name="monitorEquipo1" class="form-control col-xs-4"></td>'+
                            '<td style="text-align:center;">%</td>'+
                          '</tr>'+
                          '<tr>'+
                            '<td style="text-align:center;">60</td>'+
                            '<td style="text-align:center;">30</td>'+
                            '<td style="text-align:center;"><input type="text" name="monitorSistolica1" class="form-control col-xs-4"></td>'+
                            '<td style="text-align:center;"><input type="text" name="monitorDiastolica1" class="form-control col-xs-4"></td>'+
                            '<td style="text-align:center;">mmHg</td>'+
                            '<td style="text-align:center;">90</td>'+
                            '<td style="text-align:center;"><input type="text" name="monitorEquipo2" class="form-control col-xs-4"></td>'+
                            '<td style="text-align:center;">%</td>'+
                          '</tr>'+
                          '<tr>'+
                            '<td style="text-align:center;">120</td>'+
                            '<td style="text-align:center;">80</td>'+
                            '<td style="text-align:center;"><input type="text" name="monitorSistolica2" class="form-control col-xs-4"></td>'+
                            '<td style="text-align:center;"><input type="text" name="monitorDiastolica2" class="form-control col-xs-4"></td>'+
                            '<td style="text-align:center;">mmHg</td>'+
                            '<td style="text-align:center;">95</td>'+
                            '<td style="text-align:center;"><input type="text" name="monitorEquipo3" class="form-control col-xs-4"></td>'+
                            '<td style="text-align:center;">%</td>'+
                          '</tr>'+
                          '<tr>'+
                            '<td style="text-align:center;">150</td>'+
                            '<td style="text-align:center;">100</td>'+
                            '<td style="text-align:center;"><input type="text" name="monitorSistolica3" class="form-control col-xs-4"></td>'+
                            '<td style="text-align:center;"><input type="text" name="monitorDiastolica3" class="form-control col-xs-4"></td>'+
                            '<td style="text-align:center;">mmHg</td>'+
                            '<td style="text-align:center;">97</td>'+
                            '<td style="text-align:center;"><input type="text" name="monitorEquipo4" class="form-control col-xs-4"></td>'+
                            '<td style="text-align:center;">%</td>'+
                          '</tr>'+
                          '<tr>'+
                            '<td style="text-align:center;">200</td>'+
                            '<td style="text-align:center;">150</td>'+
                            '<td style="text-align:center;"><input type="text" name="monitorSistolica4" class="form-control col-xs-4"></td>'+
                            '<td style="text-align:center;"><input type="text" name="monitorDiastolica4" class="form-control col-xs-4"></td>'+
                            '<td style="text-align:center;">mmHg</td>'+
                            '<td style="text-align:center;">99</td>'+
                            '<td style="text-align:center;"><input type="text" name="monitorEquipo5" class="form-control col-xs-4"></td>'+
                            '<td style="text-align:center;">%</td>'+
                          '</tr>'+
    
                    '</table>'
                  );
              }else if(respuesta[i]["mediciones"] == "Pipeta"){

                $('#pipeta25').css("display", "block");

                $('#pipeta').change(function(){

                  var pipetaespacio = $(this).val();

                  // console.log("pipetaespacio",pipetaespacio);

                if (pipetaespacio == "noapto") {
                  $('#mediciones').html(
                  '<input type="hidden" class="form-control col-xs-4" name="noapto" value="noapto">'+
                  '<input type="hidden" class="form-control col-xs-4" name="pipeta" value="Pipeta">'+
                    '<h4>Pipeta</h4>'+
                    '<table class="table table-hover table-bordered">'+
                          '<tr>'+
                            '<th style="text-align:center;">Estado</th>'+
                            '<th style="text-align:center;">Fugas (QL)</th>'+
                            '<th style="text-align:center;">Unidad</th>'+
                          '</tr>'+
                          '<tr>'+
                            '<td>No apto</td>'+
                            '<td><input type="text" name="pipetaFugas1" class="form-control col-xs-4"></td>'+
                            '<td>hPa*ml/s</td>'+
                          '</tr>'+
   
                    '</table>'
                  );
                  }else if (pipetaespacio == "apto") {
                    $('#mediciones').html(
                  '<input type="hidden" class="form-control col-xs-4" name="apto" value="apto">'+
                  '<input type="hidden" class="form-control col-xs-4" name="pipeta" value="Pipeta">'+
                    '<h4>Pipeta</h4>'+
                    '<table class="table table-hover table-bordered">'+
                          '<tr>'+
                            '<th style="text-align:center;">Estado</th>'+
                            '<th style="text-align:center;">Fugas (QL)</th>'+
                            '<th style="text-align:center;">Unidad</th>'+
                          '</tr>'+
                          '<tr>'+
                            '<td>Apto</td>'+
                            '<td><input type="text" name="pipetaFugas1" class="form-control col-xs-4"></td>'+
                            '<td>hPa*ml/s</td>'+
                          '</tr>'+
   
                    '</table>'
                  );
                  }
                });

                
              }else if(respuesta[i]["mediciones"] == "Pulsioximetro"){

                $('#mediciones').html(
                  '<input type="hidden" class="form-control col-xs-4" name="pulsioximetro" value="Pulsioximetro">'+
                    '<h4>Pulsioximetro</h4>'+
                    '<table class="table table-hover table-bordered">'+
                          '<tr>'+
                            '<th style="text-align:center;">Patrón</th>'+
                            '<th style="text-align:center;">Equipo</th>'+
                            '<th style="text-align:center;">Unidad</th>'+
                          '</tr>'+
                          '<tr>'+
                            '<td style="text-align:center;">85</td>'+
                            '<td><input type="text" name="pulsioximetroEquipo1" class="form-control col-xs-4"></td>'+
                            '<td style="text-align:center;">%</td>'+
                          '</tr>'+
                          '<tr>'+
                            '<td style="text-align:center;">90</td>'+
                            '<td><input type="text" name="pulsioximetroEquipo2" class="form-control col-xs-4"></td>'+
                            '<td style="text-align:center;">%</td>'+
                          '</tr>'+
                          '<tr>'+
                            '<td style="text-align:center;">95</td>'+
                            '<td><input type="text" name="pulsioximetroEquipo3" class="form-control col-xs-4"></td>'+
                            '<td style="text-align:center;">%</td>'+
                          '</tr>'+
                          '<tr>'+
                            '<td style="text-align:center;">97</td>'+
                            '<td><input type="text" name="pulsioximetroEquipo4" class="form-control col-xs-4"></td>'+
                            '<td style="text-align:center;">%</td>'+
                          '</tr>'+
                          '<tr>'+
                            '<td style="text-align:center;">99</td>'+
                            '<td><input type="text" name="pulsioximetroEquipo5" class="form-control col-xs-4"></td>'+
                            '<td style="text-align:center;">%</td>'+
                          '</tr>'+
   
                    '</table>'
                  );
              }else if(respuesta[i]["mediciones"] == "Ventilador"){


                $('#ventilador25').css("display", "block");


                $('#ventilador').change(function(){

                  var espacio = $(this).val();

                  // console.log("espacio",espacio);

                  if (espacio == "adulto") {

                    $('#mediciones').html(
                    '<h4>Ventilador</h4>'+
                    '<input type="hidden" class="form-control col-xs-4" name="adulto" value="adulto">'+
                    '<input type="hidden" class="form-control col-xs-4" name="ventilador" value="Ventilador">'+
                    '<table class="table table-hover table-bordered">'+
                          '<tr>'+
                            '<th style="text-align:center;">Adulto</th>'+
                            '<th style="text-align:center;">Equipo</th>'+
                            '<th style="text-align:center;">Patrón</th>'+
                            '<th style="text-align:center;">Equipo</th>'+
                            '<th style="text-align:center;">Patrón</th>'+
                            '<th style="text-align:center;">Unidad</th>'+
                          '</tr>'+
                          '<tr>'+
                            '<td style="text-align:center;">VC</td>'+
                            '<td style="text-align:center;">300</td>'+
                            '<td style="text-align:center;"><input name="ventiladorPatron1" type="text" class="form-control col-xs-4 patron"></td>'+
                            '<td style="text-align:center;">500</td>'+
                            '<td style="text-align:center;"><input name="ventiladorPatron6" type="text" class="form-control col-xs-4 patron1"></td>'+
                            '<td style="text-align:center;">ml</td>'+
                          '</tr>'+
                          '<tr>'+
                            '<td style="text-align:center;">FR</td>'+
                            '<td style="text-align:center;">16</td>'+
                            '<td style="text-align:center;"><input name="ventiladorPatron2" type="text" class="form-control col-xs-4 patron2"></td>'+
                            '<td style="text-align:center;">20</td>'+
                            '<td style="text-align:center;"><input name="ventiladorPatron7" type="text" class="form-control col-xs-4 patron3"></td>'+
                            '<td style="text-align:center;">RPM</td>'+
                          '<tr>'+
                            '<td style="text-align:center;">I:E</td>'+
                            '<td style="text-align:center;">1:2</td>'+
                            '<td style="text-align:center;"><input name="ventiladorPatron3" type="text" class="form-control col-xs-4 patron4"></td>'+
                            '<td style="text-align:center;">1:2</td>'+
                            '<td style="text-align:center;"><input name="ventiladorPatron8" type="text" class="form-control col-xs-4 patron5"></td>'+
                            '<td style="text-align:center;"><input name="ventiladorUnidad1" type="text" class="form-control col-xs-4 patron6"></td>'+
                          '</tr>'+
                          '<tr>'+
                            '<td style="text-align:center;">Ti</td>'+
                            '<td style="text-align:center;">0,8</td>'+
                            '<td style="text-align:center;"><input name="ventiladorPatron4" type="text" class="form-control col-xs-4 patron7"></td>'+
                            '<td style="text-align:center;">1</td>'+
                            '<td style="text-align:center;"><input name="ventiladorPatron9" type="text" class="form-control col-xs-4 patron8"></td>'+
                            '<td style="text-align:center;">s</td>'+
                          '</tr>'+
                          '<tr>'+
                            '<td style="text-align:center;">PEEP</td>'+
                            '<td style="text-align:center;">5</td>'+
                            '<td style="text-align:center;"><input name="ventiladorPatron5" type="text" class="form-control col-xs-4 patron9"></td>'+
                            '<td style="text-align:center;">10</td>'+
                            '<td style="text-align:center;"><input name="ventiladorPatron10" type="text" class="form-control col-xs-4 patron10"></td>'+
                            '<td style="text-align:center;">mmHg</td>'+
                          '</tr>'+

                    '</table>');

                  }else if (espacio == "pediatrico"){

                    $('#mediciones').html(
                    '<h4>Ventilador Pediatrico</h4>'+
                    '<input type="hidden" class="form-control col-xs-4" name="pediatrico" value="pediatrico">'+
                    '<input type="hidden" class="form-control col-xs-4" name="ventilador" value="Ventilador">'+
                    '<table class="table table-hover table-bordered">'+
                          '<tr>'+
                            '<th style="text-align:center;">Pediatrico</th>'+
                            '<th style="text-align:center;">Equipo</th>'+
                            '<th style="text-align:center;">Patrón</th>'+
                            '<th style="text-align:center;">Equipo</th>'+
                            '<th style="text-align:center;">Patrón</th>'+
                            '<th style="text-align:center;">Unidad</th>'+
                          '</tr>'+
                          '<tr>'+
                            '<td style="text-align:center;">VC</td>'+
                            '<td style="text-align:center;">80</td>'+
                            '<td style="text-align:center;"><input name="ventiladorPatron1" type="text" class="form-control col-xs-4 patron"></td>'+
                            '<td style="text-align:center;">140</td>'+
                            '<td style="text-align:center;"><input name="ventiladorPatron6" type="text" class="form-control col-xs-4 patron1"></td>'+
                            '<td style="text-align:center;">ml</td>'+
                          '</tr>'+
                          '<tr>'+
                            '<td style="text-align:center;">FR</td>'+
                            '<td style="text-align:center;">30</td>'+
                            '<td style="text-align:center;"><input name="ventiladorPatron2" type="text" class="form-control col-xs-4 patron2"></td>'+
                            '<td style="text-align:center;">25</td>'+
                            '<td style="text-align:center;"><input name="ventiladorPatron7" type="text" class="form-control col-xs-4 patron3"></td>'+
                            '<td style="text-align:center;">RPM</td>'+
                          '<tr>'+
                            '<td style="text-align:center;">I:E</td>'+
                            '<td style="text-align:center;">1:2</td>'+
                            '<td style="text-align:center;"><input name="ventiladorPatron3" type="text" class="form-control col-xs-4 patron4"></td>'+
                            '<td style="text-align:center;">1:2</td>'+
                            '<td style="text-align:center;"><input name="ventiladorPatron8" type="text" class="form-control col-xs-4 patron5"></td>'+
                            '<td style="text-align:center;"><input name="ventiladorUnidad1" type="text" class="form-control col-xs-4 patron6"></td>'+
                          '</tr>'+
                          '<tr>'+
                            '<td style="text-align:center;">Ti</td>'+
                            '<td style="text-align:center;">0,4</td>'+
                            '<td style="text-align:center;"><input name="ventiladorPatron4" type="text" class="form-control col-xs-4 patron7"></td>'+
                            '<td style="text-align:center;">0,6</td>'+
                            '<td style="text-align:center;"><input name="ventiladorPatron9" type="text" class="form-control col-xs-4 patron8"></td>'+
                            '<td style="text-align:center;">s</td>'+
                          '</tr>'+
                          '<tr>'+
                            '<td style="text-align:center;">PEEP</td>'+
                            '<td style="text-align:center;">5</td>'+
                            '<td style="text-align:center;"><input name="ventiladorPatron5" type="text" class="form-control col-xs-4 patron9"></td>'+
                            '<td style="text-align:center;">10</td>'+
                            '<td style="text-align:center;"><input name="ventiladorPatron10" type="text" class="form-control col-xs-4 patron10"></td>'+
                            '<td style="text-align:center;">mmHg</td>'+
                          '</tr>'+

                    '</table>'
              
                  );
                  }else if(espacio == "neonatal"){
                    $('#mediciones').html(
                    '<h4>Ventilador neonatal</h4>'+
                    '<input type="hidden" class="form-control col-xs-4" name="neonatal" value="neonatal">'+
                    '<input type="hidden" class="form-control col-xs-4" name="ventilador" value="Ventilador">'+
                    '<table class="table table-hover table-bordered">'+
                          '<tr>'+
                            '<th style="text-align:center;">Neonatal</th>'+
                            '<th style="text-align:center;">Equipo</th>'+
                            '<th style="text-align:center;">Patrón</th>'+
                            '<th style="text-align:center;">Equipo</th>'+
                            '<th style="text-align:center;">Patrón</th>'+
                            '<th style="text-align:center;">Unidad</th>'+
                          '</tr>'+
                          '<tr>'+
                            '<td style="text-align:center;">VC</td>'+
                            '<td style="text-align:center;">5</td>'+
                            '<td style="text-align:center;"><input name="ventiladorPatron1" type="text" class="form-control col-xs-4 patron"></td>'+
                            '<td style="text-align:center;">20</td>'+
                            '<td style="text-align:center;"><input name="ventiladorPatron6" type="text" class="form-control col-xs-4 patron1"></td>'+
                            '<td style="text-align:center;">ml</td>'+
                          '</tr>'+
                          '<tr>'+
                            '<td style="text-align:center;">FR</td>'+
                            '<td style="text-align:center;">30</td>'+
                            '<td style="text-align:center;"><input name="ventiladorPatron2" type="text" class="form-control col-xs-4 patron2"></td>'+
                            '<td style="text-align:center;">25</td>'+
                            '<td style="text-align:center;"><input name="ventiladorPatron7" type="text" class="form-control col-xs-4 patron3"></td>'+
                            '<td style="text-align:center;">RPM</td>'+
                          '<tr>'+
                            '<td style="text-align:center;">I:E</td>'+
                            '<td style="text-align:center;">1:2</td>'+
                            '<td style="text-align:center;"><input name="ventiladorPatron3" type="text" class="form-control col-xs-4 patron4"></td>'+
                            '<td style="text-align:center;">1:2</td>'+
                            '<td style="text-align:center;"><input name="ventiladorPatron8" type="text" class="form-control col-xs-4 patron5"></td>'+
                            '<td style="text-align:center;"><input name="ventiladorUnidad1" type="text" class="form-control col-xs-4 patron6"></td>'+
                          '</tr>'+
                          '<tr>'+
                            '<td style="text-align:center;">Ti</td>'+
                            '<td style="text-align:center;">0,3</td>'+
                            '<td style="text-align:center;"><input name="ventiladorPatron4" type="text" class="form-control col-xs-4 patron7"></td>'+
                            '<td style="text-align:center;">0,5</td>'+
                            '<td style="text-align:center;"><input name="ventiladorPatron9" type="text" class="form-control col-xs-4 patron8"></td>'+
                            '<td style="text-align:center;">s</td>'+
                          '</tr>'+
                          '<tr>'+
                            '<td style="text-align:center;">PEEP</td>'+
                            '<td style="text-align:center;">2</td>'+
                            '<td style="text-align:center;"><input name="ventiladorPatron5" type="text" class="form-control col-xs-4 patron9"></td>'+
                            '<td style="text-align:center;">8</td>'+
                            '<td style="text-align:center;"><input name="ventiladorPatron10" type="text" class="form-control col-xs-4 patron10"></td>'+
                            '<td style="text-align:center;">mmHg</td>'+
                          '</tr>'+

                    '</table>'
              
                  );

}

 
                }
                );


                
              }
          
          }

        }
        
    }
  })
 };


//cargar los meeses

 // $('#mesesCargarlos').change(function(){

 //   var meses = $(this).val();

 //   console.log("mes",meses);


 // });

                   



/*=============================================
ENVIAR LOS DATOS DE LA TABLA VENTILADOR
=============================================*/

// function listarVentilador(){

//   var listaVentilador = [];

//   var patron = $(".patron");
//   var patron1 = $(".patron1");
//   var patron2 = $(".patron2");
//   var patron3 = $(".patron3");
//   var patron4 = $(".patron4");
//   var patron5 = $(".patron5");
//   var patron6 = $(".patron6");
//   var patron7 = $(".patron7");
//   var patron8 = $(".patron8");
//   var patron9 = $(".patron9");
//   var patron10 = $(".patron10");

 

// }
