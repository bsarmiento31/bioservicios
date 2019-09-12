<?php

require_once "../controladores/mantenimiento.controlador.php";
require_once "../modelos/mantenimiento.modelo.php"; 
require_once "../controladores/equipos.controlador.php";
require_once "../modelos/equipo.modelo.php"; 
require_once "../controladores/cronograma.controlador.php";
require_once "../modelos/cronograma.modelo.php";



 
class AjaxMantenimiento 
{   
  
	/*=============================================
	VALIDAR SERIE
	=============================================*/	

	public $validarSerieM;

	public function ajaxValidarSerieMantenimento(){

		$item = "serie";
		$valor = $this->validarSerieM;
		$orden = null;
		$perfil = null;

		$respuesta = controladorEquipos::ctrMostrarEquipos($item, $valor,$orden, $perfil);

		echo json_encode($respuesta);

	}


	/*=============================================
	AGREGAR LA FIRMA DESDE EL MANTENIMIENTO(TABLA)
	=============================================*/	

	public $idFirmaMant;

	public function ajaxTraerMantenimientoid(){

		$item = "id_reporte";
		$valor = $this->idFirmaMant;
		$orden = null;
		$perfil = null;

		$respuesta = ControladorMantenimiento::ctrMostrarModelos($item, $valor,$orden, $perfil);

		echo json_encode($respuesta);

	}

	/*=============================================
	VALIDAR SERIE QUE YA ESTE REGISTRADA AL EQUIPO
	=============================================*/	

	public $serie25;

	public function ajaxValidarSerieMantenimentoRegistrada(){

		$item = "serie";
		$valor = $this->serie25;
		$orden = null;
		$perfil = null;

		$respuesta1 = controladorEquipos::ctrMostrarEquipos($item, $valor,$orden, $perfil);

		echo json_encode($respuesta1);

	}


	/*=============================================
	AGREGAR INFORME NUEVO AL FORMULARIO
	=============================================*/	

	public $mirarReporte;

	public function ajaxAgregarInforme(){

		$item = "num_reporte";
		$valor = $this->mirarReporte;
		$orden = null;
		$perfil = null;

		$respuesta2 = ControladorMantenimiento::ctrMostrarModelos($item, $valor,$orden, $perfil);

		echo json_encode($respuesta2);

	}


	/*=============================================
	REVISAR INFORME ANTES DE ENVIAR LOS DATOS
	=============================================*/	

	// public $reporteNum;

	// public function ajaxRevisarInforme(){

	// 	$item = "num_reporte";
	// 	$valor = $this->reporteNum;
	// 	$orden = null;
	// 	$perfil = null;

	// 	$respuesta2 = ControladorMantenimiento::ctrMostrarModelos($item, $valor,$orden, $perfil);

	// 	echo json_encode($respuesta2);

	// }

	/*=============================================
	MIRAR SI EL EQUIPO ESTA DADO DE BAJA
	=============================================*/	

	// public $equipoBaja;

	// public function ajaxEquipoDadodeBaja(){

	// 	$item = "equipo";
	// 	$valor = $this->equipoBaja;
	// 	$orden = null;
	// 	$perfil = null;

	// 	$respuesta = controladorEquipos::ctrMostrarEquipos($item, $valor,$orden, $perfil);

	// 	echo json_encode($respuesta);

	// }

	/*=============================================
	EDITAR MANTENIMIENTOS POR EL ID
	=============================================*/	

	public $idMantenimiento;

	public function ajaxEditarMantenimiento(){

		$item = "num_reporte";
		$valor = $this->idMantenimiento;
		$orden = null;
		$perfil = null;


		$respuesta = ControladorMantenimiento::ctrMostrarModelos($item, $valor,$orden, $perfil);

		echo json_encode($respuesta);

	}


	/*=============================================
	TRAER EL CLIENTE DE LA TABLA CRONOGRAMA REPORTES NO
	=============================================*/	

	public $idReporteno;

	public function ajaxTraerMantenimientono(){

		$item = "num_reporte";
		$valor = $this->idReporteno;
		$orden = null;
		$perfil = null;


		$respuesta = ControladorMantenimiento::ctrMostrarModelosno($item, $valor,$orden, $perfil);

		echo json_encode($respuesta);

	}

	/*=============================================
	SELECCION DINAMICA PARA LA MARCA
	=============================================*/	
 
	public $idMarcaMantenimiento;
	public $periodo3;

	public function ajaxMarcaDinamico(){

		$item = "codigo2";
		$valor = $this->idMarcaMantenimiento;
		$item2 = "tiempo";
		$valor2 = $this->periodo3;

		$respuesta = ControladorCronograma::ctrMostrarCronogramaPeriodo($item, $valor,$item2,$valor2);

		echo $cadenaMarcaN = "<option value=''>Seleccione la marca</option>";
		
		//echo 
		// $cadena="<label>SELECT 2 (paises)</label> 
		// 	<select id='lista2' name='lista2'>";
		foreach ($respuesta as $key => $value)
		{
			if ($value["marca"] != "") 
			{

			$cadena = "<option value='".$value['marca']."'>".$value['marca']."</option>";

				echo  $cadena;

			}
			else
			{
				$cadena = json_encode($respuesta);
				echo  $cadena;
			}
		
		}


	}

	/*=============================================
	SELECCION DINAMICA PARA EL EQUIPO
	=============================================*/	
 
	public $idEquipoMantenimiento;
	public $periodo2;

	public function ajaxEquipoDinamico(){

		$item = "codigo2";
		$valor = $this->idEquipoMantenimiento;
		$item2 = "tiempo";
		$valor2 = $this->periodo2;

		$respuesta = ControladorCronograma::ctrMostrarCronogramaPeriodo($item, $valor,$item2,$valor2);

		echo $cadenaMarcaN = "<option value=''>Seleccione el equipo</option>";
		
		//echo 
		// $cadena="<label>SELECT 2 (paises)</label> 
		// 	<select id='lista2' name='lista2'>";
		foreach ($respuesta as $key => $value)
		{
			if ($value["equipo"] != "") 
			{

				$cadena = "<option value='".$value['equipo']."'>".$value['equipo']."</option>";
				echo  $cadena;

			}
			else
			{
				$cadena = json_encode($respuesta);
				echo  $cadena;
			}

		
		}


	}

	/*=============================================
	SELECCION DINAMICA PARA EL MODELO
	=============================================*/	
 
	public $idModeloMantenimiento;
	public $periodo4;

	public function ajaxModeloDinamico(){

		$item = "codigo2";
		$valor = $this->idModeloMantenimiento;
		$item2 = "tiempo";
		$valor2 = $this->periodo4;

		$respuesta = ControladorCronograma::ctrMostrarCronogramaPeriodo($item, $valor,$item2,$valor2);

		echo $cadenaMarcaN = "<option value=''>Seleccione el modelo</option>";
		
		//echo 
		// $cadena="<label>SELECT 2 (paises)</label> 
		// 	<select id='lista2' name='lista2'>";
		foreach ($respuesta as $key => $value)
		{
			if ($value["modelo"] != "") 
			{

				$cadena = "<option value='".$value['modelo']."'>".$value['modelo']."</option>";
				echo  $cadena;

			}
			else
			{
				$cadena = json_encode($respuesta);
				echo  $cadena;
			}

		
		}


	}

	/*=============================================
	SELECCION DINAMICA PARA EL CODIGO
	=============================================*/	
 
	public $idCodigoMantenimiento;
	public $periodo;

	public function ajaxCodigoDinamico(){

		$item = "cliente";
		$valor = $this->idCodigoMantenimiento;
		$item2 = "tiempo";
		$valor2 = $this->periodo;

		$respuesta = ControladorCronograma::ctrMostrarCronogramaPeriodo($item, $valor,$item2,$valor2);

		echo $cadenaMarcaN = "<option value=''>Seleccione el codigo</option>";
		
		//echo 
		// $cadena="<label>SELECT 2 (paises)</label> 
		// 	<select id='lista2' name='lista2'>";
		foreach ($respuesta as $key => $value)
		{
			if ($value["codigo2"] != "") 
			{

				$cadena = "<option value='".$value['codigo2']."'>".$value['codigo2']."</option>";
				echo  $cadena;

			}
			else
			{
				$cadena = json_encode($respuesta);
				echo  $cadena;
			}

		
		}


	}

	/*=============================================
	SELECCION DINAMICA PARA LA SERIE
	=============================================*/	
 
	public $idSerieMantenimiento;
	public $periodo5;

	public function ajaxSerieDinamico(){

		$item = "codigo2";
		$valor = $this->idSerieMantenimiento;
		$item2 = "tiempo";
		$valor2 = $this->periodo5;

		$respuesta = ControladorCronograma::ctrMostrarCronogramaPeriodo($item, $valor,$item2,$valor2);

		echo $cadenaMarcaN = "<option value=''>Seleccione la serie</option>";
		
		//echo 
		// $cadena="<label>SELECT 2 (paises)</label> 
		// 	<select id='lista2' name='lista2'>";
		foreach ($respuesta as $key => $value)
		{
			if ($value["serie1"] != "") 
			{

				$cadena = "<option value='".$value['serie1']."'>".$value['serie1']."</option>";
				echo  $cadena;

			}
			else
			{
				$cadena = json_encode($respuesta);
				echo  $cadena;
			}

		
		}


	}



}

//Validar serie
	if(isset($_POST["validarSerieM"])){

	$valSerieMa = new AjaxMantenimiento();
	$valSerieMa -> validarSerieM = $_POST["validarSerieM"];
	$valSerieMa -> ajaxValidarSerieMantenimento();

}


//Agregar informe nuevo al formulario
	if(isset($_POST["mirarReporte"])){

	$agregarInformeFormulario = new AjaxMantenimiento();
	$agregarInformeFormulario -> mirarReporte = $_POST["mirarReporte"];
	$agregarInformeFormulario -> ajaxAgregarInforme();

}

//Agregar informe nuevo al formulario
// 	if(isset($_POST["reporteNum"])){

// 	$revisarInformeFormulario = new AjaxMantenimiento();
// 	$revisarInformeFormulario -> reporteNum = $_POST["reporteNum"];
// 	$revisarInformeFormulario -> ajaxRevisarInforme();

// }


//TRAER MANTENIMIENTO LA FIRMA
	if(isset($_POST["idFirmaMant"])){

	$TraerFirma = new AjaxMantenimiento();
	$TraerFirma -> idFirmaMant = $_POST["idFirmaMant"];
	$TraerFirma -> ajaxTraerMantenimientoid();

}

//TRAER EL CODIGO DEL MANTENIMIENTO
	if(isset($_POST["idCodigoMantenimiento"])){

	$TraerCodigoMantenieento = new AjaxMantenimiento();
	$TraerCodigoMantenieento -> periodo = $_POST["periodo"];
	$TraerCodigoMantenieento -> idCodigoMantenimiento = $_POST["idCodigoMantenimiento"];
	$TraerCodigoMantenieento -> ajaxCodigoDinamico();

}

//Validar serie
	if(isset($_POST["idReporte"])){

	$editarMantenimiento = new AjaxMantenimiento();
	$editarMantenimiento -> idMantenimiento = $_POST["idReporte"];
	$editarMantenimiento -> ajaxEditarMantenimiento();

}

//VALIDAR SERIE QUE YA ESTE REGISTRADA AL EQUIPO
if(isset($_POST["serie25"])){

	$ValidarSerieRegistrada = new AjaxMantenimiento();
	$ValidarSerieRegistrada -> serie25 = $_POST["serie25"];
	$ValidarSerieRegistrada -> ajaxValidarSerieMantenimentoRegistrada();

}


//TRAER EL CLIENTE DE LA TABLA CRONOGRAMA REPORTES NO
if(isset($_POST["idReporteno"])){

	$ajaxTraerinfoCronograma = new AjaxMantenimiento();
	$ajaxTraerinfoCronograma -> idReporteno = $_POST["idReporteno"];
	$ajaxTraerinfoCronograma -> ajaxTraerMantenimientono();

}

// /*=============================================
// 	MIRAR SI EL EQUIPO ESTA DADO DE BAJA
// 	=============================================*/	

// 	if(isset($_POST["equipoBaja"])){

// 	$MirarEquipoDadodeBaja = new AjaxMantenimiento();
// 	$MirarEquipoDadodeBaja -> equipoBaja = $_POST["equipoBaja"];
// 	$MirarEquipoDadodeBaja -> ajaxEquipoDadodeBaja();

// }

//SELECCIONAR MARCA DINAMICA DE CREAR MANTENIMIENTO


if(isset($_POST["idMarcaMantenimiento"])){

$selectMarcaDinamico = new AjaxMantenimiento();
$selectMarcaDinamico -> periodo3 = $_POST["periodo3"];
$selectMarcaDinamico -> idMarcaMantenimiento = $_POST["idMarcaMantenimiento"];
$selectMarcaDinamico ->ajaxMarcaDinamico();

}

//SELECCIONAR EQUIPO DINAMICA DE CREAR MANTENIMIENTO

if(isset($_POST["idEquipoMantenimiento"])){

$selectEquipoDinamico = new AjaxMantenimiento();
$selectEquipoDinamico -> periodo2 = $_POST["periodo2"];
$selectEquipoDinamico -> idEquipoMantenimiento = $_POST["idEquipoMantenimiento"];
$selectEquipoDinamico ->ajaxEquipoDinamico();

}

//SELECCIONAR  MODELO para CREAR MANTENIMIENTO

if(isset($_POST["idModeloMantenimiento"])){ 

$selectModeloDinamico = new AjaxMantenimiento();
$selectModeloDinamico -> periodo4 = $_POST["periodo4"];
$selectModeloDinamico -> idModeloMantenimiento = $_POST["idModeloMantenimiento"];
$selectModeloDinamico ->ajaxModeloDinamico();

}

//SELECCIONAR SERIE PARA CREAR MANTENIMIENTO

if(isset($_POST["idSerieMantenimiento"])){

$selectDinamicoSerie = new AjaxMantenimiento();
$selectDinamicoSerie -> periodo5 = $_POST["periodo5"];
$selectDinamicoSerie -> idSerieMantenimiento = $_POST["idSerieMantenimiento"];
$selectDinamicoSerie ->ajaxSerieDinamico();

}