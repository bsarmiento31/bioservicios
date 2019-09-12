<?php

require_once "../controladores/instrumentos.controlador.php"; 
require_once "../modelos/instrumentos.modelo.php";

require_once "../controladores/trabajos.controlador.php"; 
require_once "../modelos/trabajos.modelo.php";

class AjaxInstrumentosTrabajos{ 

	/*=============================================
	EDITAR LOS INSTRUMENTOS
	=============================================*/	

	public $idInstrumentos;

	public function ajaxEditarInstrumentos(){

		$item = "id_instrumentos";
		$valor = $this->idInstrumentos;
		$orden = null;

		$respuesta = controladorInstrumentos::ctrMostrarInstrumentos($item, $valor,$orden);

		echo json_encode($respuesta);

	}

	/*=============================================
	EDITAR LOS TRABAJOS
	=============================================*/	

	public $idTrabajos;

	public function ajaxEditarTrabajos(){

		$item = "id_trabajo";
		$valor = $this->idTrabajos;
		$orden = null;

		$respuesta = controladorTrabajos::ctrMostrarTrabajos($item, $valor,$orden);

		echo json_encode($respuesta);

	}


}

//Editar Instrumentos
	if(isset($_POST["idInstrumentos"])){

	$editar = new AjaxInstrumentosTrabajos();
	$editar -> idInstrumentos = $_POST["idInstrumentos"];
	$editar -> ajaxEditarInstrumentos();

}

//Editar Trabajos
	if(isset($_POST["idTrabajos"])){

	$editarTrabajos = new AjaxInstrumentosTrabajos();
	$editarTrabajos -> idTrabajos = $_POST["idTrabajos"];
	$editarTrabajos -> ajaxEditarTrabajos();

}

