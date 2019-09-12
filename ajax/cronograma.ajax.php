<?php
 
require_once "../controladores/cronograma.controlador.php";
require_once "../modelos/cronograma.modelo.php";

class AjaxCronogramas{   

	/*=============================================
	EDITAR CLIENTES  
	=============================================*/	

	public $idCronograma;

	public function ajaxEditarCronograma(){

		$item = "id";
		$valor = $this->idCronograma;
		$select = null;

		$respuesta = ControladorCronograma::ctrMostrarCronogramas($item, $valor,$select);

		echo json_encode($respuesta);

	}
	
		/*============================================= 
	VALIDAR NO REPETIR SERIE POR AÑO
	=============================================*/	

	public $periodo35;
	public $serie;


	public function ajaxValidarSeriePeriodo(){


		$item1 = "codigo2";
		$valor1 = $this->serie;

		$item2 = "tiempo";
		$valor2 = $this->periodo35;

		$respuesta = ControladorCronograma::ctrMostrarCronogramaPeriodoSerie($item1, $valor1, $item2, $valor2);

		echo json_encode($respuesta);

	}


	/*=============================================
	AGREGAR OBSERVACION AJAX
	=============================================*/	
 
	public $idReporteObservacion;

	public function ajaxReporteObservacion(){

		$item = "id";
		$valor = $this->idReporteObservacion;
		$select = null;
		$orden = null;

		$respuesta = ControladorCronograma::ctrMostrarCronogramas($item, $valor,$orden,$select);

		echo json_encode($respuesta);

	}

	/*=============================================
	VALIDAR NO REPETIR SERIE
	=============================================*/	

	public $validarSerie;

	public function ajaxValidarSerie(){

		$item = "codigo2";
		$valor = $this->validarSerie;
		$select = null;

		$respuesta =  ControladorCronograma::ctrMostrarCronogramas($item, $valor,$select);

		echo json_encode($respuesta);

	}

	/*=============================================
	RECARGAR LOS MESES PARA MOSTRARLOS EN EL MANTENIMIENTO POR MEDIO DE LA SERIE
	=============================================*/	

	public $idMeses;

	public function ajaxSelectDinamicoMeses(){

		$item = null;
		$valor = $this->idMeses;
		$select = "serie1";

		$respuesta = ControladorCronograma::ctrMostrarCronogramas($item, $valor, $select);

		foreach ($respuesta as $key => $value)
		{
			if ($value["mes_servicio"] != "") 
			{

				$cadena='<option value="'.$value["mes_servicio"].'">'.$value["mes_servicio"].'</option>';
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

//editar Usuario
	if(isset($_POST["idCronograma"])){

	$editar = new AjaxCronogramas();
	$editar -> idCronograma = $_POST["idCronograma"];
	$editar -> ajaxEditarCronograma();

}

//VALIDAR NO REPETIR SERIE POR AÑO

if(isset($_POST["periodo35"])){

	$validarSeriePeriodo = new AjaxCronogramas();
	$validarSeriePeriodo -> periodo35 = $_POST["periodo35"];
	$validarSeriePeriodo -> serie = $_POST["serie"];
	$validarSeriePeriodo -> ajaxValidarSeriePeriodo();

}

//Validar serie
	if(isset($_POST["validarSerie"])){

	$valSerie = new AjaxCronogramas();
	$valSerie -> validarSerie = $_POST["validarSerie"];
	$valSerie -> ajaxValidarSerie();

}

//RECARGAR LOS MESES PARA MOSTRARLOS EN EL MANTENIMIENTO POR MEDIO DE LA SERIE
	if(isset($_POST["idMeses"])){

	$idMesesTraerlos = new AjaxCronogramas();
	$idMesesTraerlos -> idMeses = $_POST["idMeses"];
	$idMesesTraerlos -> ajaxSelectDinamicoMeses();

}


//AGREGAR OBSERVACION
	if(isset($_POST["idReporteObservacion"])){

	$idReporteObservacion = new AjaxCronogramas();
	$idReporteObservacion -> idReporteObservacion = $_POST["idReporteObservacion"];
	$idReporteObservacion -> ajaxReporteObservacion();

}