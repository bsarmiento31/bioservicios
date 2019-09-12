<?php
	if($_SESSION["perfil"] == "cliente"){
		echo '<script>
			window.location = "inicio";
			</script>';
	return; 
}
//Esto quiere decir que el indice no tiene que ser una fecha si no un numero($sumaPagosMes[$key])
//es un error normal porque no puede sumar las fechas de esa manera

	// $perfil = null;
	// $valor = null; 
	error_reporting(0); 
	if(isset($_GET["fechaInicial"])) 
	{ 
		$fechaInicial = $_GET["fechaInicial"];
		$fechaFinal = $_GET["fechaFinal"]; 
		$perfil = null;
		$valor = null;
		$respuesta = ControladorMantenimiento::ctrRangoFechasMantenimiento($fechaInicial, $fechaFinal,$perfil,$valor);
	}
	else if(isset($_GET["fechaInicialp"]))
	{
		$fechaInicial = $_GET["fechaInicialp"];
		$fechaFinal = $_GET["fechaFinalp"];
		$perfil = null;
		$valor = null;
		$respuesta = ControladorMantenimiento::ctrRangoFechasMantenimientoProximo($fechaInicial, $fechaFinal,$perfil,$valor);
	}
	else if(isset($_GET["idcliente"]))
	{	
		$perfil = "id_clinica";
  		$valor = $_GET["idcliente"];
		$fechaInicial = null;
		$fechaFinal = null;
		$respuesta = ControladorMantenimiento::ctrRangoFechasMantenimiento($fechaInicial, $fechaFinal,$perfil,$valor);
	}else{
		$perfil = null;
		$valor = null;
		$fechaInicial = null;
		$fechaFinal = null;
		$respuesta = ControladorMantenimiento::ctrRangoFechasMantenimiento($fechaInicial, $fechaFinal,$perfil,$valor);
	}


$arrayFechas = array();
$arrayCantidad = array();
$sumaCantidad = array();
foreach ($respuesta as $key => $value) {
	//var_dump($value):Me trae todos los mantenimientos que se han generado en el sistema
	//var_dump($value["fecha"]):Me trae todos las fechas
	//var_dump($value["fecha"]);
	#Capturamos sólo el año y el mes
	$fecha = substr($value["fecha_inicio"],0,7); 
	//var_dump($fecha);
	#Introducir las fechas en arrayFechas(Capturamos las fechas y los dias en el array)
	array_push($arrayFechas, $fecha);
	#Capturamos la cantidad
	$contarReportes= count($value["id_reporte"]);
	$arrayCantidad = array($fecha => $contarReportes);
//var_dump($arrayCantidad);
	#Sumamos la cantidad que estan en el mismo mes
	 foreach ($arrayCantidad as $key => $value) {
		$sumaCantidad[$key] += $value;
	}
	//var_dump($sumaCantidad);
}
//Esto recorre las fechas y muestras sus indices, hay que igualar las fechas con la cantidad y eso se hace con el $noRepetirFechas = array_unique($arrayFechas) y todas las fechas quedan unificadas;
// foreach ($arrayFechas as $key => $value) {
	// 	var_dump($key);
// }
//var_dump($arrayFechas);
$noRepetirFechas = array_unique($arrayFechas);
	//var_dump($noRepetirFechas);
?>
<!-- Grafica de Mantenimiento -->

<div class="box-header with-border">
	<h3 class="box-title">Mantenimientos <?php echo '<span style="font-weight:bold;">' .$_GET["nombreCliente"] .'</span>'?></h3>
</div>
   <div class="box box-primary">
     <div class="box-header with-border">
<div class="box-body chart-responsive">
	<div class="chart" id="line-chart-mantenimiento" style="height: 300px;"></div>
</div>
</div>
</div>
<!-- /.box-body -->

<script type="text/javascript">
// LINE CHART
var line = new Morris.Line({
element: 'line-chart-mantenimiento',
resize: true,
data: [
<?php
if($noRepetirFechas != null){

	foreach($arrayFechas as $key) {
		echo "{y: '".$key."', mantenimientos: ".$sumaCantidad[$key]."},";
	}

	
		echo "{y: '".$key."', mantenimientos: ".$sumaCantidad[$key]."}";

	}else{

		echo "{ y: '0', mantenimientos: '0' }";
	}
?>

],
xkey: 'y',
ykeys: ['mantenimientos'],
labels: ['Mantenimientos'],
lineColors: ['#3c8dbc'],
hideHover: 'auto',
gridStrokeWidth  : 0.4,
pointSize        : 4,
gridTextFamily   : 'Open Sans',
gridTextSize     : 10

});
</script>

