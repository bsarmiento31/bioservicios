
<?php

require_once "../controladores/equipos.controlador.php";
require_once "../modelos/equipo.modelo.php";  

require_once "../controladores/instrumentos.controlador.php";
require_once "../modelos/instrumentos.modelo.php";
 
 
 
class AjaxEquipos { 

	/*=============================================
	EDITAR EQUIPO
	=============================================*/	
 
	public $idEquipoE;

	public function ajaxEditarEquipo(){

		$item = "id_equipo";
		$valor = $this->idEquipoE;
		$select = null;
		$orden = null;

		$respuesta = controladorEquipos::ctrMostrarEquipos($item, $valor,$orden,$select);

		echo json_encode($respuesta);

	}
	
	
	/*=============================================
	VALIDAR NO REPETIR CODIGO
	=============================================*/	

	public $codigo;

	public function ajaxValidarCodigo(){

		$item = "codigo";
		$select = null;
		$valor = $this->codigo;
		$orden = null;

		$respuesta = controladorEquipos::ctrMostrarEquipos($item, $valor,$orden,$select);

		echo json_encode($respuesta);

	}

	/*=============================================
	EDITAR INSTRUMENTOS Y TRABJAJOS
	=============================================*/	
 
	public $idEquipoTr;

	public function ajaxEditarInstrumentoTrabajo(){

		$item = "id_equipo";
		$valor = $this->idEquipoTr;
		$select = null;
		$orden = null;

		$respuesta = controladorEquipos::ctrMostrarEquipos($item, $valor,$orden,$select);

		echo json_encode($respuesta);

	}

	/*=============================================
	TRAERNOS LOS INSTRUMENTOS DE LA TABLA INSTRUMENTOS
	=============================================*/	
 
	public $idInstrumentos;

	public function ajaxTraerInstrumentos(){

		$item = null;
		$select = "serie";
		$valor = $this->idInstrumentos;
		$orden = null;

		$respuesta = controladorEquipos::ctrMostrarEquipos($item, $valor,$orden,$select);

		$cadenaChekboxes = '<div class="checkbox">';
		$MensajeErrorInstrumentos = '<div class="alert alert-success alert-dismissible" role="alert">Este equipo no tiene instrumentos</div>';

		foreach ($respuesta as $key => $value)
		{

		$array_ph = explode("#",$value["instr_utilizados"]);

			foreach ($array_ph as $key) {

				if ($key == "0") 
				{
					
					echo $MensajeErrorInstrumentos;
				}
				else if ($key != "")
				{
					$cadena = $cadenaChekboxes.'<label><input type="checkbox" name="nuevoInstrumentos[]" class="minimal" value="'.$key.'">'.$key.'</label></div>';
					echo  $cadena;
				}
				// echo $key;
				
			}
		}

		

	}

	/*=============================================
	TRAERNOS LOS INSTRUMENTOS DE LA TABLA INSTRUMENTOS CUANDO EDITEMOS EL MANTENIMIENTO
	=============================================*/	
 
	public $idInstrumentosEditar;

	public function ajaxTraerInstrumentosEditar(){
 
		$item = null;
		$select = "serie";
		$valor = $this->idInstrumentosEditar;
		$orden = null;

		$respuesta = controladorEquipos::ctrMostrarEquipos($item, $valor,$orden,$select);

		$cadenaChekboxes = '<div class="checkbox">';
		$MensajeErrorInstrumentos = '<div class="alert alert-success alert-dismissible" role="alert">Este equipo no tiene instrumentos</div>';

		foreach ($respuesta as $key => $value)
		{

		$array_ph = explode("#",$value["instr_utilizados"]);

			foreach ($array_ph as $key) {

				if ($key == "0") 
				{
					
					echo $MensajeErrorInstrumentos;
				}
				else if ($key != "")
				{
					$cadena = $cadenaChekboxes.'<label><input type="checkbox" name="editarInstrumentos[]" class="minimal" value="'.$key.'">'.$key.'</label></div>';
					echo  $cadena;
				}
				// echo $key;
				
			}
		}

		

	}


	/*=============================================
	TRAERNOS LOS TRABAJOS DEL EQUIPO DE LA TABLA TRABAJO
	=============================================*/	
 
	public $idTrabajos;

	public function ajaxTraerTrabajos(){

		$item = null;
		$select = "serie";
		$valor = $this->idTrabajos;
		$orden = null;

		$respuesta = controladorEquipos::ctrMostrarEquipos($item, $valor,$orden,$select);

		$cadenaChekboxes = '<div class="checkbox">';
		$MensajeErrorTrabajo = '<div class="alert alert-success alert-dismissible" role="alert">Este equipo no tiene trabajos</div>';

		foreach ($respuesta as $key => $value)
		{

		$array_ph = explode("-",$value["traba_realizados"]);

			foreach ($array_ph as $key) {
				
				if ($key == "0") 
				{	
					// echo json_encode($key);
					echo $MensajeErrorTrabajo;
				}
				else if($key != "") 
				{
					$cadena = $cadenaChekboxes.'<label><input type="checkbox" name="trabajo[]" class="minimal" value="'.$key.'">'.$key.'</label></div>';
					echo  $cadena;
				}
				// echo $key;
				
			}
		}

		

	}

	/*=============================================
	TRAERNOS LOS TRABAJOS DEL EQUIPO DE LA TABLA TRABAJO AL EDITAR EL MANTENIMIENTO
	=============================================*/	
 
	public $idTrabajosEditar;

	public function ajaxTraerTrabajosEditar(){

		$item = null;
		$select = "serie";
		$valor = $this->idTrabajosEditar;
		$orden = null;

		$respuesta = controladorEquipos::ctrMostrarEquipos($item, $valor,$orden,$select);

		$cadenaChekboxes = '<div class="checkbox">';
		$MensajeErrorTrabajo = '<div class="alert alert-success alert-dismissible" role="alert">Este equipo no tiene trabajos</div>';

		foreach ($respuesta as $key => $value)
		{

		$array_ph = explode("-",$value["traba_realizados"]);

			foreach ($array_ph as $key) {
				
				if ($key == "0") 
				{	
					// echo json_encode($key);
					echo $MensajeErrorTrabajo;
				}
				else if($key != "") 
				{
					$cadena = $cadenaChekboxes.'<label><input type="checkbox" name="editartrabajo[]" class="minimal" value="'.$key.'">'.$key.'</label></div>';
					echo  $cadena;
				}
				// echo $key;
				
			}
		}

		

	}


	/*=============================================
	SELECCION DINAMICA PARA LA MARCA
	=============================================*/	
 
	public $idMarca;

	public function ajaxSelectDinamico(){

		$item = null;
		$select = "codigo";
		$valor = $this->idMarca;
		$orden = null;

		$respuesta = controladorEquipos::ctrMostrarEquipos($item, $valor,$orden,$select);

		echo $cadenaMarcaN = "<option value=''>Seleccione la marca</option>";
		
		//echo 
		// $cadena="<label>SELECT 2 (paises)</label> 
		// 	<select id='lista2' name='lista2'>";

		foreach ($respuesta as $key => $value)
		{


			if ($value["marcaText"] != "") 
			{
				
				$cadena = "<option value='".$value['marcaText']."'>".$value['marcaText']."</option>";
				echo $cadena;

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

	public $idEquipoM;

	public function ajaxSelectDinamico1(){

		$item = null;
		$select = "codigo";
		$valor = $this->idEquipoM;
		$orden = null;

		$respuesta = controladorEquipos::ctrMostrarEquipos($item, $valor,$orden,$select);

		//echo json_encode($respuesta);
		echo $cadenaEquipoN = "<option value=''>Seleccione el equipo</option>";

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
	public $idModelo;

	public function ajaxSelectDinamico2(){

		$item = null;
		$select = "codigo";
		$valor = $this->idModelo;
		$orden = null;

		$respuesta = controladorEquipos::ctrMostrarEquipos($item, $valor,$orden,$select);

		//echo json_encode($respuesta);
		echo $cadenaModeloN = "<option value=''>Seleccione el modelo</option>";
		foreach ($respuesta as $key => $value)
		{
		if ($value["modelo"] != "") {
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
	public $idCodigo;

	public function ajaxCodigoDinamico2(){

		$item = null;
		$select = "id_usuario";
		$valor = $this->idCodigo;
		$orden = null;

		$respuesta = controladorEquipos::ctrMostrarEquipos($item, $valor,$orden,$select);

		//echo json_encode($respuesta);
		echo $cadenaModeloN = "<option value=''>Seleccione el codigo</option>";
		foreach ($respuesta as $key => $value)
		{
		if ($value["codigo"] != "") {

			$cadena = "<option value='".$value['codigo']."'>".$value['codigo']."</option>";
			
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
	public $idSerieM;

	public function ajaxSelectDinamico3(){

		$item = null;
		$select = "codigo";
		$valor = $this->idSerieM;
		$orden = null;

		$respuesta = controladorEquipos::ctrMostrarEquipos($item, $valor,$orden,$select);

		// echo json_encode($respuesta);
		echo $cadenaSerieN = "<option value=''>Seleccione la serie</option>";
		foreach ($respuesta as $key => $value)
		{
		if ($value["serie"] != "") {
			$cadena = "<option value='".$value['serie']."'>".$value['serie']."</option>";
			echo  $cadena;
		}
		else
		{
			$cadena = json_encode($respuesta);
			echo $cadena;
		}
		
		}
		

	}

	/*=============================================
	VALIDAR SERIE
	=============================================*/	
 
	public $validarSerieE;

	public function ajaxValidarEquipo(){

		$item = "serie";
		$valor = $this->validarSerieE;
		$orden = null;
		$select = null;

		$respuesta = controladorEquipos::ctrMostrarEquipos($item, $valor,$orden,$select);

		echo json_encode($respuesta);

	}

	
 /*=============================================
	ACTIVAR DADO DE BAJA
	=============================================*/	

	public $idEquipos;
	public $estadoUsuario;
 

	public function ajaxActivarDadoBaja(){

		$tabla = "equipos";

		$item1 = "baja";
		$valor1 = $this->estadoUsuario;

		$item2 = "id_equipo";
		$valor2 = $this->idEquipos;

		$respuesta = ModeloEquipos::mdlActualizarEquipo($tabla, $item1, $valor1, $item2, $valor2);

		echo $respuesta; 

	}


 /*=============================================
	AGREGAR OBSERVACION
	=============================================*/	
 
	public $idEquipoObservacion;

	public function ajaxEquipoObservacion(){

		$item = "id_equipo";
		$valor = $this->idEquipoObservacion;
		$select = null;
		$orden = null;

		$respuesta = controladorEquipos::ctrMostrarEquipos($item, $valor,$orden,$select);

		echo json_encode($respuesta);

	}

	/*=============================================
	AGREGAR CRONOGRAMA
	=============================================*/	
 
	public $idEquipoCronograma;

	public function ajaxEquipoCronograma(){

		$item = "id_equipo";
		$valor = $this->idEquipoCronograma;
		$select = null;
		$orden = null;

		$respuesta = controladorEquipos::ctrMostrarEquipos($item, $valor,$orden,$select);

		echo json_encode($respuesta);

	}


	/*=============================================
	ACA COMIENZA LAS MEDICIONES
	=============================================*/	

	/*=============================================
	TRAER TENSIOMETRO
	=============================================*/	


	public $idTensiometro;

	public function ajaxTraerTensiometro(){

		$item = null;
		$select = "serie";
		$valor = $this->idTensiometro;
		$orden = null;

		$respuesta = controladorEquipos::ctrMostrarEquipos($item, $valor,$orden,$select);

		echo json_encode($respuesta);
		
	}
}

	




/*=============================================
EDITAR EQUIPO
=============================================*/	

if(isset($_POST["idEquipoE"])){

$idEquipoRes = new AjaxEquipos();
$idEquipoRes -> idEquipoE = $_POST["idEquipoE"];
$idEquipoRes ->ajaxEditarEquipo();

}


/*=============================================
EDITAR EQUIPO
=============================================*/	

if(isset($_POST["idCodigo"])){

$idCodigoInterno = new AjaxEquipos();
$idCodigoInterno -> idCodigo = $_POST["idCodigo"];
$idCodigoInterno ->ajaxCodigoDinamico2();

}

/*=============================================
VALIDAR SERIE
=============================================*/	

if(isset($_POST["validarSerieE"])){

$validarSerieEquipo = new AjaxEquipos();
$validarSerieEquipo -> validarSerieE = $_POST["validarSerieE"];
$validarSerieEquipo ->ajaxValidarEquipo();

}

/*=============================================
MOSTRAR USUARIO EN EL SELECT MARCA
=============================================*/	

if(isset($_POST["idMarca"])){

$mostrarClienteDinamico = new AjaxEquipos();
$mostrarClienteDinamico -> idMarca = $_POST["idMarca"];
$mostrarClienteDinamico ->ajaxSelectDinamico();

}

/*=============================================
VALIDAR CODIGO
=============================================*/	

if(isset($_POST["codigo"])){

$idValidarCodigo = new AjaxEquipos();
$idValidarCodigo -> codigo = $_POST["codigo"];
$idValidarCodigo ->ajaxValidarCodigo();

}

/*=============================================
MOSTRAR USUARIO EN EL SELECT EQUIPO
=============================================*/	

if(isset($_POST["idEquipoM"])){

$mostrarClienteDinamico1 = new AjaxEquipos();
$mostrarClienteDinamico1 -> idEquipoM = $_POST["idEquipoM"];
$mostrarClienteDinamico1 ->ajaxSelectDinamico1();

}

/*=============================================
MOSTRAR USUARIO EN EL SELECT MODELO
=============================================*/	

if(isset($_POST["idModelo"])){

$mostrarClienteDinamico2 = new AjaxEquipos();
$mostrarClienteDinamico2 -> idModelo = $_POST["idModelo"];
$mostrarClienteDinamico2 ->ajaxSelectDinamico2();

}

/*=============================================
MOSTRAR USUARIO EN EL SELECT SERIE
=============================================*/	

if(isset($_POST["idSerieM"])){

$mostrarClienteDinamico3 = new AjaxEquipos();
$mostrarClienteDinamico3 -> idSerieM = $_POST["idSerieM"];
$mostrarClienteDinamico3 ->ajaxSelectDinamico3();

}


/*=============================================
BOTON DADO DE BAJA
=============================================*/	

if(isset($_POST["idEquipo"])){

$activarDadodeBaja = new AjaxEquipos();
$activarDadodeBaja -> estadoUsuario = $_POST["estadoUsuario"];
$activarDadodeBaja -> idEquipos = $_POST["idEquipo"];
$activarDadodeBaja -> ajaxActivarDadoBaja();

}


/*=============================================
AGREGAR OBSERVACION
=============================================*/	

if(isset($_POST["idEquipoObservacion"])){

$addEquipoObservacion = new AjaxEquipos();
$addEquipoObservacion -> idEquipoObservacion = $_POST["idEquipoObservacion"];
$addEquipoObservacion -> ajaxEquipoObservacion();

}

/*=============================================
AGREGAR CRONOGRAMA
=============================================*/	

if(isset($_POST["idEquipoCronograma"])){

$addCronogramaObservacion = new AjaxEquipos();
$addCronogramaObservacion -> idEquipoCronograma = $_POST["idEquipoCronograma"];
$addCronogramaObservacion -> ajaxEquipoCronograma();

}

/*=============================================
TRAERNOS LOS INSTRUMENTOS DE LA TABLA INSTRUMENTOS
=============================================*/	

if(isset($_POST["idInstrumentos"])){

$addInstrumentosAgregar = new AjaxEquipos();
$addInstrumentosAgregar -> idInstrumentos = $_POST["idInstrumentos"];
$addInstrumentosAgregar -> ajaxTraerInstrumentos();

}

/*=============================================
TRAERNOS LOS TRABAJOS DE LA TABLA TRABAJO
=============================================*/	

if(isset($_POST["idTrabajos"])){

$addTrabajos = new AjaxEquipos();
$addTrabajos -> idTrabajos = $_POST["idTrabajos"];
$addTrabajos -> ajaxTraerTrabajos();

}

/*=============================================
EDITAR INSTRUMENTOS Y TRABAJOS EN EL EQUIPO
=============================================*/	

if(isset($_POST["idEquipoTr"])){

$addTrabajoInstrumentos = new AjaxEquipos();
$addTrabajoInstrumentos -> idEquipoTr = $_POST["idEquipoTr"];
$addTrabajoInstrumentos -> ajaxEditarInstrumentoTrabajo();

}


/*=============================================
TRAERNOS LOS INSTRUMENTOS DE LA TABLA TRABAJO CUANDO EDITEMOS EL MANTENIMIENTO
=============================================*/	

if(isset($_POST["idInstrumentosEditar"])){

$editarInstrumentos = new AjaxEquipos();
$editarInstrumentos -> idInstrumentosEditar = $_POST["idInstrumentosEditar"];
$editarInstrumentos -> ajaxTraerInstrumentosEditar();

}

/*=============================================
EDITAR LOS TRABAJOS DE LA TABLA CUANDO LO EDITEMOS EN EL MANTENIMIENTO
=============================================*/	

if(isset($_POST["idTrabajosEditar"])){

$editarInstrumentos = new AjaxEquipos();
$editarInstrumentos -> idTrabajosEditar = $_POST["idTrabajosEditar"];
$editarInstrumentos -> ajaxTraerTrabajosEditar();

}

/*=============================================
TRAER TENSIOMETRO
=============================================*/	

if(isset($_POST["idTensiometro"])){

$traerTensiometro = new AjaxEquipos();
$traerTensiometro -> idTensiometro = $_POST["idTensiometro"];
$traerTensiometro -> ajaxTraerTensiometro();

}
