/*=============================================
VARIABLE LOCAL STORAGE
=============================================*/

if(localStorage.getItem("capturarRango2") != null){

	$("#daterange-btn2 span").html(localStorage.getItem("capturarRango2"));


}else{

	$("#daterange-btn2 span").html('<i class="fa fa-calendar"></i> Fecha de servicio')

}

if(localStorage.getItem("capturarRango11") != null){

	$("#daterange-btnProximoReporte").html(localStorage.getItem("capturarRango11"));


}else{

	$("#daterange-btnProximoReporte").html('<i class="fa fa-calendar"></i> Fecha de proximo mantenimiento')

}



/*=============================================
RANGO DE FECHAS 
=============================================*/
$('#daterange-btn2').daterangepicker(
  {
    ranges   : { 
      'Hoy'       : [moment(), moment()],
      'Ayer'   : [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
      'Últimos 7 días' : [moment().subtract(6, 'days'), moment()],
      'Últimos 30 días': [moment().subtract(29, 'days'), moment()],
      'Este mes'  : [moment().startOf('month'), moment().endOf('month')],
      'Último mes'  : [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
    },
    startDate: moment(),
    endDate  : moment()
  },
  function (start, end) {
    $('#daterange-btn2 span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));

    var fechaInicial = start.format('YYYY-MM-DD');

    var fechaFinal = end.format('YYYY-MM-DD');

    var capturarRango = $("#daterange-btn2 span").html();
   
   	localStorage.setItem("capturarRango2", capturarRango);

   	window.location = "index.php?ruta=reportes&fechaInicial="+fechaInicial+"&fechaFinal="+fechaFinal;

  }

)


/*=============================================
RANGO DE FECHAS PARA PROXIMO MANTENIMIENTO
=============================================*/

$('#daterange-btnProximoReporte').daterangepicker(
  {
    ranges   : {
      'Mañana'   : [moment().add(1, 'days'), moment().add(1, 'days')],
      'Despues de 7 días' : [moment().add(6, 'days'), moment()],
      'Mes Proximo'  : [moment().add(1, 'month').startOf('month'), moment().add(1, 'month').endOf('month')]
    },
    startDate: moment().add(29, 'days'),
    endDate  : moment()
  },
  function (start, end) {
    $('#daterange-btnProximoReporte span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
    var fechaInicialp = start.format('YYYY-MM-DD');
    var fechaFinalp = end.format('YYYY-MM-DD');
    var capturarRango11 = $("#daterange-btnProximoReporte").html();

    //console.log("capturarRango5",capturarRango5);

    localStorage.setItem("daterange-btnProximoReporte", capturarRango11);
    window.location = "index.php?ruta=reportes&fechaInicialp="+fechaInicialp+"&fechaFinalp="+fechaFinalp;
  
  }
)

/*=============================================
CANCELAR RANGO DE FECHAS
=============================================*/

$(".cancelarGrafica").on("click", function(){

	localStorage.removeItem("capturarRango2");
	localStorage.clear();
	window.location = "reporte-clientes";
})

/*============================================= 
CAPTURAR HOY
=============================================*/

$(".daterangepicker.opensright .ranges li").on("click", function(){

	var textoHoy = $(this).attr("data-range-key");

	if(textoHoy == "Hoy"){

    var d = new Date();
    
    var dia = d.getDate();
    var mes = d.getMonth()+1;
    var año = d.getFullYear();

    if(mes < 10){

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

$(document).on('change', '#clientesValor', function(event) {
     // $('#servicioSelecionado').val($("#servicio option:selected").text());
     var idcliente = $("#clientesValor option:selected").val();
     var nombreCliente = $("#clientesValor option:selected").text();
    

     window.location = "index.php?ruta=reportes&idcliente="+idcliente+"&nombreCliente="+nombreCliente;
});



