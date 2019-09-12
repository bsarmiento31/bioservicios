<?php
require_once "../controladores/cronograma.controlador.php";
require_once "../modelos/cronograma.modelo.php";

require_once "../controladores/clientes.controlador.php";
require_once "../modelos/clientes.modelo.php";
 

//en esta parte llamamos con json los datos de la tabla cronograma
class TablaCronograma{

 	/*=============================================
 	 MOSTRAR LA TABLA DE CRONOGRAMA
  	=============================================*/ 

	public function mostrarTablaCronograma(){

		$item = null;
    	$valor = null;
    	$select = null;

  		$cronograma = ControladorCronograma::ctrMostrarCronogramas($item, $valor,$select);
		
  		if(count($cronograma) == 0){

  			echo '{"data": []}';

		  	return;
  		}	
		
  		$datosJson = '{
		  "data": [';

		  for($i = 0; $i < count($cronograma); $i++){

		

		  	/*=============================================
 	 		TRAEMOS LOS CLIENTES
  			=============================================*/ 

		  	$item = "id_cliente";
		  	$valor = $cronograma[$i]["cliente"];

		  	$clientes = ControladorClientes::ctrMostrarClientes($item, $valor);




		  	$datosJson .='[
			      "'.($i+1).'",
			      "'.$clientes["nombre"].'",
			      "'.$cronograma[$i]["equipo"].'",
			      "'.$cronograma[$i]["marca"].'",
			      "'.$cronograma[$i]["modelo"].'",
			      "'.$cronograma[$i]["serie1"].'"
			    ],';

		  }

		  $datosJson = substr($datosJson, 0, -1);

		 $datosJson .=   '] 

		 }';
		
		echo $datosJson;


	}


}

/*=============================================
ACTIVAR TABLA DE CRONOGRAMAS
=============================================*/ 
$activarCronograma = new TablaCronograma();
$activarCronograma -> mostrarTablaCronograma();