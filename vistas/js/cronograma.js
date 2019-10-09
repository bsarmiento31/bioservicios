 //Local storage de la fecha del servicio
 if (localStorage.getItem("capturarRango7") != null) {

  $("#daterange-btncronograma span").html(localStorage.getItem("capturarRango7")); 

}else{  
 
  $("#daterange-btncronograma span").html('<i class="fa fa-calendar"></i> Fecha del servicio');
} 

//  //Local storage de la fecha del proximo servicio
//  if (localStorage.getItem("capturarRango6") != null) {

//   $("#daterange-btncronogramaproximo span").html(localStorage.getItem("capturarRango6"));

// }else{

//   $("#daterange-btncronogramaproximo span").html('<i class="fa fa-calendar"></i> Fecha del proximo mantenimiento');
// } 
 

 /*=============================================
CANCELAR RANGO DE FECHAS
=============================================*/
$(".cancelarCronograma").on("click", function(){

  localStorage.removeItem("capturarRango");
  localStorage.clear();

  window.location = "cronograma";
})




 $('#daterange-btncronograma').daterangepicker(
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
        $('#daterange-btncronograma span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
         var fechaInicial = start.format('YYYY-MM-DD');
      	 var fechaFinal = end.format('YYYY-MM-DD');
      	 var capturarRango7 = $("#daterange-btncronograma span").html();
  
      	 localStorage.setItem("capturarRango7", capturarRango7);
    
      	 window.location = "index.php?ruta=cronograma&fechaInicial="+fechaInicial+"&fechaFinal="+fechaFinal;
      }
    )

  // $('#daterange-btncronogramaproximo').daterangepicker(
  //     {
  //       ranges   : {
  //         'Mañana'   : [moment().add(1, 'days'), moment().add(1, 'days')],
  //         'Despues de 7 días' : [moment().add(6, 'days'), moment()],
  //         'Mes Proximo'  : [moment().add(1, 'month').startOf('month'), moment().add(1, 'month').endOf('month')]
  //       },
  //       startDate: moment().add(29, 'days'),
  //       endDate  : moment()
  //     },
  //     function (start, end) {
  //       $('#daterange-btncronogramaproximo').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
  //        var fechaInicialp = start.format('YYYY-MM-DD');
  //        var fechaFinalp = end.format('YYYY-MM-DD');
  //        var capturarRango6 = $("#daterange-btncronogramaproximo").html();

  //        // console.log("capturarRango6",capturarRango6);
  
  //        localStorage.setItem("capturarRango6", capturarRango6);
    
  //        window.location = "index.php?ruta=cronograma&fechaInicialp="+fechaInicialp+"&fechaFinalp="+fechaFinalp;
  //     }
  //   )

/*=============================================
EDITAR CRONOGRAMA(OBTENER EL ID)
=============================================*/
$(document).on("click", ".btnEditarCronograma", function(){

  var idCronograma = $(this).attr("idCronograma");
  
  //console.log("idUsuario",idUsuario);
  var datos = new FormData();
  datos.append("idCronograma", idCronograma); 

  $.ajax({

    url:"ajax/cronograma.ajax.php",
    method: "POST",
    data: datos,
    cache: false,
    contentType: false,
    processData: false,
    dataType: "json",
    success: function(respuesta){
      
      //console.log("respuesta",respuesta);
      $("#idCronogramaEditar").val(respuesta["id"]);
      $("#clienteCronogramaEditar").val(respuesta["cliente"]);
      $("#editarEquipo").val(respuesta["equipo"]);
      $("#editarMarca").val(respuesta["marca"]);
      $("#editarModelo").val(respuesta["modelo"]);
      $("#editarSerie").val(respuesta["serie1"]);
       $("#editarPeriodo").val(respuesta["tiempo"]);

     if (respuesta["enero"] == "enero") {

        $("#eneroEditar").prop("checked",true);
        $("#eneroEditar").val("enero");

      }else if (respuesta["enero"] == "enerocr") {
        $("#eneroEditar").prop("checked",true);
        $("#eneroEditar").val("enerocr");
        $("#labelEnero").css("display","none");

      }else if (respuesta["enero"] == "") {
        $("#eneroEditar").val("enero");
      }

      if (respuesta["febrero"] == "febrero" ) {

        $("#febreroEditar").prop("checked",true);
        $("#febreroEditar").val("febrero");

      }else if (respuesta["febrero"] == "febrerocr") {
        $("#febreroEditar").prop("checked",true);
        $("#febreroEditar").val("febrerocr");
        $("#labelFebrero").css("display","none");

      }else if (respuesta["febrero"] == "") {
        $("#febreroEditar").val("febrero");
      }

      if (respuesta["marzo"] == "marzo") {

        $("#marzoEditar").prop("checked",true);
        $("#marzoEditar").val("marzo");

      }else if (respuesta["marzo"] == "marzocr") {
         $("#marzoEditar").prop("checked",true);
         $("#marzoEditar").val("marzocr");
         $("#labelMarzo").css("display","none");

      }else if (respuesta["marzo"] == "") {
        $("#marzoEditar").val("marzo");
      }

      if (respuesta["abril"] == "abril") {

        $("#abrilEditar").prop("checked",true);
        $("#abrilEditar").val("abril");

      }else if (respuesta["abril"] == "abrilcr") {
        $("#abrilEditar").prop("checked",true);
        $("#abrilEditar").val("abrilcr");
        $("#labelAbril").css("display","none");

      }else if (respuesta["abril"] == "") {
        $("#abrilEditar").val("abril");
      }

      if (respuesta["mayo"] == "mayo") {

        $("#mayoEditar").prop("checked",true);
        $("#mayoEditar").val("mayo");

      }else if(respuesta["mayo"] == "mayocr"){
        $("#mayoEditar").prop("checked",true);
        $("#mayoEditar").val("mayocr");
        $("#labelMayo").css("display","none");

      }else if (respuesta["mayo"] == "") {
        $("#mayoEditar").val("mayo");
      }

      if (respuesta["junio"] == "junio") {

        $("#junioEditar").prop("checked",true);
        $("#junioEditar").val("junio");

      }else if (respuesta["junio"] == "juniocr") {
        $("#junioEditar").prop("checked",true);
        $("#junioEditar").val("juniocr");
        $("#labelJunio").css("display","none");

      }else if (respuesta["junio"] == "") {
        $("#junioEditar").val("junio");
      }

      if (respuesta["julio"] == "julio") {

        $("#julioEditar").prop("checked",true);
        $("#julioEditar").val("julio");

      }else if (respuesta["julio"] == "juliocr") {
         $("#julioEditar").prop("checked",true);
         $("#julioEditar").val("juliocr");
         $("#labelJulio").css("display","none");

      }else if (respuesta["julio"] == "") {
         $("#julioEditar").val("julio");
      }
      if (respuesta["agosto"] == "agosto") {

        $("#agostoEditar").prop("checked",true);
        $("#agostoEditar").val("agosto");

      }else if (respuesta["agosto"] == "agostocr") {
        $("#agostoEditar").prop("checked",true);
        $("#agostoEditar").val("agostocr");
        $("#labelAgosto").css("display","none");

      }else if (respuesta["agosto"] == "") {
         $("#agostoEditar").val("agosto");
      }

      if (respuesta["septiembre"] == "septiembre") {

        $("#septiembreEditar").prop("checked",true);
        $("#septiembreEditar").val("septiembre");

      }else if (respuesta["septiembre"] == "septiembrecr") {
        $("#septiembreEditar").prop("checked",true);
        $("#septiembreEditar").val("septiembrecr");
        $("#labelSeptiembre").css("display","none");

      }else if (respuesta["septiembre"] == "") {
         $("#septiembreEditar").val("septiembre");
      }

      if (respuesta["octubre"] == "octubre") {

        $("#octubreEditar").prop("checked",true);
        $("#octubreEditar").val("octubre");

      }else if (respuesta["octubre"] == "octubrecr") {

        $("#octubreEditar").prop("checked",true);
        $("#octubreEditar").val("octubrecr");
        $("#labelOctubre").css("display","none");

      }else if (respuesta["octubre"] == "") {
         $("#octubreEditar").val("octubre");
      }

      if (respuesta["noviembre"] == "noviembre") {

        $("#noviembreEditar").prop("checked",true);
        $("#noviembreEditar").val("noviembre");

      }else if (respuesta["noviembre"] == "noviembrecr") {
        $("#noviembreEditar").prop("checked",true);
        $("#noviembreEditar").val("noviembrecr");
        $("#labelNoviembre").css("display","none");

      }else if (respuesta["noviembre"] == "") {
         $("#noviembreEditar").val("noviembre");
      }

      if (respuesta["diciembre"] == "diciembre") {

        $("#diciembreEditar").prop("checked",true);
        $("#diciembreEditar").val("diciembre");

      }else if (respuesta["diciembre"] == "diciembrecr") {
        $("#diciembreEditar").prop("checked",true);
        $("#diciembreEditar").val("diciembrecr");
        $("#labelDiciembre").css("display","none");

      }else if (respuesta["diciembre"] == "") {
         $("#diciembreEditar").val("diciembre");
      }

      // $("#editarMes").val(respuesta["mes_servicio"]);
      $("#editarObservacion").val(respuesta["observacion"]);
      $("#editarPeriodo").val(respuesta["tiempo"]);       

    }

  });

})
/*=============================================
ASIGNAR CRONOGRAMA POR PERIODO
=============================================*/
$(document).on("click", ".btnAsignarCronogramaPeriodo", function(){

  var idCronograma = $(this).attr("idCronograma");
  
  // console.log("idCronograma",idCronograma);
  var datos = new FormData();
  datos.append("idCronograma", idCronograma); 

  $.ajax({

    url:"ajax/cronograma.ajax.php",
    method: "POST",
    data: datos,
    cache: false,
    contentType: false,
    processData: false,
    dataType: "json",
    success: function(respuesta){
      
      $("#idCronogramaperiodo").val(respuesta["id"]);
      $("#clienteCronogramaperiodo").val(respuesta["cliente"]);
      $("#periodoEquipo").val(respuesta["equipo"]);
      $("#periodoMarca").val(respuesta["marca"]);
      $("#periodoModelo").val(respuesta["modelo"]);
      $("#periodoSerie").val(respuesta["serie1"]);
      $("#periodoCodigo").val(respuesta["codigo2"]);

    }

  });

})

//Validar la serie del periodo del asignar cronograma

$(".asignarPeriodoAno").change(function(){

$(".alert").remove();

  var periodo = $(this).val();
  var serie = $(".validarSerie2").val();

  console.log("año",periodo);
  console.log("serie",serie);

  var datos = new FormData();
  datos.append("periodo35", periodo);
  datos.append("serie", serie);

    $.ajax({

    url:"ajax/cronograma.ajax.php", 
    method: "POST",
    data: datos,
    cache: false,
    contentType: false,
    processData: false,
    dataType: "json",
    success: function(respuesta){

        console.log("respuesta",respuesta);
        if(respuesta){

          $(".asignarPeriodoAno").parent().after('<div class="alert alert-warning">Esta serie ya existe en el año. Intenta otro año</div>');
          $(".agregarDisabled").attr("disabled", true);
        }else{
          $(".agregarDisabled").attr("disabled",false);
        }

      }

    })





})


//VALIDAR SERIE
$(".validarSerie").change(function(){

  $(".alert").remove();

  var serie = $(this).val();

  // console.log("validar serie",serie);

  var datos = new FormData();
  datos.append("validarSerie", serie);

   $.ajax({
      url:"ajax/cronograma.ajax.php",
      method:"POST",
      data: datos,
      cache: false,
      contentType: false,
      processData: false,
      dataType: "json",
      success : function(respuesta){

        console.log("respuesta",respuesta);
        if(respuesta){

          $(".validarSerie").parent().after('<div class="alert alert-warning">Esta serie ya existe en la base de datos.</div>');

         $(".agregarDisabled").attr("disabled", true);

          $(".nuevoSerieE").val("");

        }else{
          $(".agregarDisabled").attr("disabled",false);
        }

      }

  })
})

$(".validarSeriePeriodo").change(function(){

$(".alert").remove();

  var periodo = $(this).val();
  var serie = $(".validarSerie").val();

  // console.log("año",periodo);
  // console.log("serie",serie);

  var datos = new FormData();
  datos.append("periodo35", periodo);
  datos.append("serie", serie);

    $.ajax({

    url:"ajax/cronograma.ajax.php",
    method: "POST",
    data: datos,
    cache: false,
    contentType: false,
    processData: false,
    dataType: "json",
    success: function(respuesta){

        console.log(respuesta);
        if(respuesta){

          $(".validarSeriePeriodo").parent().after('<div class="alert alert-warning">Esta serie ya existe en el año. Intenta otro año</div>');
          $(".agregarDisabled").attr("disabled", true);
        }else{
          $(".agregarDisabled").attr("disabled",false);
        }

      }

    })





})

/*=============================================
ELIMINAR CRONOGRAMA
=============================================*/
$(document).on("click", ".btnEliminarCronograma", function(){

  var idCronograma = $(this).attr("idCronograma");

  //var fotoUsuario = $(this).attr("fotoUsuario");
  var idEquipo = $(this).attr("idEquipo");

  swal({
    title: '¿Deseas borrar el cronograma?',
    text: "¡No podrás revertir esto!",
    type: 'warning',
     showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: 'Si, Borrarlo!'
  }).then(function(result){

    if(result.value){

      window.location = "index.php?ruta=cronograma&idCronograma="+idCronograma+"&idEquipo="+idEquipo;

    }

  })

})


/*=============================================
REVISAR SI EL USUARIO YA ESTÁ REGISTRADO
=============================================*/

$("#nuevoSerie").change(function(){

  var cronograma = $(this).val();
  //console.log("usuario",usuario);
  //el alert es para borrarlo y que no quede estatico
   $(".alert").remove();

  // var usuario = $(this).val();

  var datos = new FormData();
  datos.append("validarSerie", cronograma);

   $.ajax({
    url:"ajax/cronograma.ajax.php",
      method:"POST",
      data: datos,
      cache: false,
      contentType: false,
      processData: false,
      dataType: "json",
      success:function(respuesta){
        //console.log("respuesta",respuesta);
          if(respuesta){

          $("#nuevoSerie").parent().after('<div class="alert alert-warning">Esta serie ya existe en la base de datos</div>');

          $("#nuevoSerie").val("");

        }
      }
   })

})


 function recargarMarca(){

  $.ajax({
    type: "POST",
    url:"ajax/equipos.ajax.php", 
    data: "idMarca="+ $('#nuevoCodigoM').val(),
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
      console.log("respuesta",respuesta);
      }    
    }
  })

};

 function recargarEquipo(){
  $.ajax({ 
    type: "POST",
    url:"ajax/equipos.ajax.php",
    data: "idEquipoM="+ $('#nuevoCodigoM').val(),
    success : function(respuesta){
      if (respuesta == "") 
      {
         $('#nuevoEquipoM').html("<option value=''>El Cliente no tiene equipo</option>");
      }
      else
      {
        $('#nuevoEquipoM').html(respuesta);
        console.log("respuesta",respuesta);
      }
      
    }
  })

}; 

 
 function recargarModelo(){
  $.ajax({
    type: "POST",
    url:"ajax/equipos.ajax.php",
    data: "idModelo="+ $('#nuevoCodigoM').val(),
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


function recargarCodigo(){
  $.ajax({
    type: "POST",
    url:"ajax/equipos.ajax.php",
    data: "idCodigo="+ $('#nuevoClienteM').val(),
    success : function(respuesta){

      // console.log("respuesta",respuesta);

      if (respuesta == "") 
      {
         $('#nuevoCodigoM').html("<option value=''>La marca no tiene codigo</option>");
      }
      else
      {
        $('#nuevoCodigoM').html(respuesta);
        // console.log("respuesta",respuesta);
      }
    }
  })

}; 

 function recargarSerie(){
  $.ajax({
    type: "POST",
    url:"ajax/equipos.ajax.php",
    data: "idSerieM="+ $('#nuevoCodigoM').val(),
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
 
//Agregar Observacion
$(".tablasCronograma").on("click", ".btnObservacionReporte", function(){

  var idReporteObservacion = $(this).attr("idReporteObservacion");

  // console.log("idReporteObservacion",idReporteObservacion);

    var datos = new FormData();
    datos.append("idReporteObservacion", idReporteObservacion); 
 
 
    $.ajax({

      url:"ajax/cronograma.ajax.php",
      method: "POST",
      data: datos,
      cache: false,
      contentType: false,
      processData: false,
      dataType:"json",
      success:function(respuesta){

       $("#idReporteObservacion").val(respuesta["id"]);
       $("#nuevoObservacionReporte").val(respuesta["observacion"]);   

       // console.log("respuesta",respuesta);   
 
    }

    })

 })


/*=============================================
OBTENER EL NUMERO DEL REPORTE EN EL BOTON
=============================================*/
// $(document).on("click", ".btnReporte", function(){

//   var idCronogramaReporte = $(this).attr("idCronogramaReporte");

//   console.log("idCronogramaReporte",idCronogramaReporte);

//   var datos = new FormData();
//     datos.append("idReporte", idReporte);

//       $.ajax({

//       url:"ajax/mantenimiento.ajax.php",
//       method: "POST",
//       data: datos,
//       cache: false,
//       contentType: false,
//       processData: false,
//       dataType:"json",
//       success:function(respuesta){

//         window.location = "index.php?ruta=reportes-cronograma&idReporte="+idReporte;

//         // console.log("respuesta",respuesta);
  

//     }

// })

// })



          getPagination('#table-id');
          //getPagination('.table-class');
          //getPagination('table');

      /*PAGINATION 
      - on change max rows select options fade out all rows gt option value mx = 5
      - append pagination list as per numbers of rows / max rows option (20row/5= 4pages )
      - each pagination li on click -> fade out all tr gt max rows * li num and (5*pagenum 2 = 10 rows)
      - fade out all tr lt max rows * li num - max rows ((5*pagenum 2 = 10) - 5)
      - fade in all tr between (maxRows*PageNum) and (maxRows*pageNum)- MaxRows 
      */
     
  function getPagination (table){

            var lastPage = 1 ; 

      $('#maxRows').on('change',function(evt){
        //$('.paginationprev').html('');            // reset pagination 


    lastPage = 1 ; 
         $('.pagination').find("li").slice(1, -1).remove();
        var trnum = 0 ;                  // reset tr counter 
        var maxRows = parseInt($(this).val());      // get Max Rows from select option

        if(maxRows == 5000 ){

          $('.pagination').hide();
        }else {
          
          $('.pagination').show();
        }

        var totalRows = $(table+' tbody tr').length;    // numbers of rows 
       $(table+' tr:gt(0)').each(function(){      // each TR in  table and not the header
         trnum++;                  // Start Counter 
         if (trnum > maxRows ){            // if tr number gt maxRows
           
           $(this).hide();              // fade it out 
         }if (trnum <= maxRows ){$(this).show();}// else fade in Important in case if it ..
       });                      //  was fade out to fade it in 
       if (totalRows > maxRows){            // if tr total rows gt max rows option
         var pagenum = Math.ceil(totalRows/maxRows);  // ceil total(rows/maxrows) to get ..  
                               //  numbers of pages 
         for (var i = 1; i <= pagenum ;){      // for each page append pagination li 
         $('.pagination #prev').before('<li data-page="'+i+'">\
                      <span>'+ i++ +'<span class="sr-only">(current)</span></span>\
                    </li>').show();
         }                      // end for i 
      }                         // end if row count > max rows
      $('.pagination [data-page="1"]').addClass('active'); // add active class to the first li 
      $('.pagination li').on('click',function(evt){    // on click each page
        evt.stopImmediatePropagation();
        evt.preventDefault();
        var pageNum = $(this).attr('data-page');  // get it's number

        var maxRows = parseInt($('#maxRows').val());      // get Max Rows from select option

        if(pageNum == "prev" ){
          if(lastPage == 1 ){return;}
          pageNum  = --lastPage ; 
        }
        if(pageNum == "next" ){
          if(lastPage == ($('.pagination li').length -2) ){return;}
          pageNum  = ++lastPage ; 
        }

        lastPage = pageNum ;
        var trIndex = 0 ;              // reset tr counter
        $('.pagination li').removeClass('active');  // remove active class from all li 
        $('.pagination [data-page="'+lastPage+'"]').addClass('active');// add active class to the clicked 
        // $(this).addClass('active');          // add active class to the clicked 
         $(table+' tr:gt(0)').each(function(){    // each tr in table not the header
           trIndex++;                // tr index counter 
           // if tr index gt maxRows*pageNum or lt maxRows*pageNum-maxRows fade if out
           if (trIndex > (maxRows*pageNum) || trIndex <= ((maxRows*pageNum)-maxRows)){
             $(this).hide();    
           }else {$(this).show();}         //else fade in 
         });                     // end of for each tr in table
          });                    // end of on click pagination list

    }).val(10).change();

                        // end of on select change 
     
    
  
                // END OF PAGINATION 
  }  


// $(function(){
//   // Just to append id number for each row  
//           $('table tr:eq(0)').prepend('<th> ID </th>')

//           var id = 0;

//           $('table tr:gt(0)').each(function(){  
//             id++
//             $(this).prepend('<td>'+id+'</td>');
//           });
// })


