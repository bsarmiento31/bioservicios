//En este archivo creamos el js para obtener el id del reporte para imprimirlo


$(document).on("click", ".btnGenerarPdf", function(){
 
	var codigoReporteNuevo = $(this).attr("codigoReporteNuevo");

	window.open("extensiones/tcpdf/pdf/reportePdf.php?num_reporte="+codigoReporteNuevo, "_blank");

})



$(document).on("click", ".btnGenerarPdfno", function(){

	var codigoReporteNuevo = $(this).attr("codigoReporteNuevo");

	window.open("extensiones/tcpdf/pdf/reportePdfno.php?num_reporte="+codigoReporteNuevo, "_blank");

})
