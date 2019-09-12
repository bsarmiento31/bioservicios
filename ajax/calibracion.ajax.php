<?php
 
require_once "../controladores/calibracion.controlador.php";
require_once "../modelos/calibracion.modelo.php"; 

class AjaxCalibracion{

	/*=============================================
	EDITAR CALIBRACION
	=============================================*/	

	public $idCalibracion;

	public function ajaxEditarCalibracion(){

		$item = "id";
		$valor = $this->idCalibracion;
		$perfil = null;


		$respuesta = ControladorCalibracion::ctrMostrarCalibraciones($item, $valor,$perfil);

		echo json_encode($respuesta);

	}


}



/*=============================================
EDITAR CALIBRACION
=============================================*/
if(isset($_POST["idCalibracion"])){

	$editar = new AjaxCalibracion();
	$editar -> idCalibracion = $_POST["idCalibracion"];
	$editar -> ajaxEditarCalibracion();

}

