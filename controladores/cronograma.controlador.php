<?php

/**
 *  
 */  
 
class ControladorCronograma 
{ 
	//Insertar Cronograma
	static public function ctrCrearCronograma()
	{
		if(isset($_POST["nuevoEquipo"])){

				// $mes = implode(' - ', $_POST["nuevoMes"]);

				if(isset($_POST['enero'])){
    				$enero = $_POST['enero'];
				}else{
    				$enero = "";#default value
				}

				if(isset($_POST['febrero'])){
    				$febrero = $_POST['febrero'];
				}else{
    				$febrero = "";#default value
				}
				if(isset($_POST['marzo'])){
    				$marzo = $_POST['marzo'];
				}else{
    				$marzo = "";#default value
				}

				if(isset($_POST['abril'])){
    				$abril = $_POST['abril'];
				}else{
    				$abril = "";#default value
				}

				if(isset($_POST['mayo'])){
    				$mayo = $_POST['mayo'];
				}else{
    				$mayo = "";#default value
				}

				if(isset($_POST['junio'])){
    				$junio = $_POST['junio'];
				}else{
    				$junio = "";#default value
				}
				if(isset($_POST['julio'])){
    				$julio = $_POST['julio'];
				}else{
    				$julio = "";#default value
				}
				if(isset($_POST['agosto'])){
    				$agosto = $_POST['agosto'];
				}else{
    				$agosto = "";#default value
				}
				if(isset($_POST['septiembre'])){
    				$septiembre = $_POST['septiembre'];
				}else{
    				$septiembre = "";#default value
				}
				if(isset($_POST['octubre'])){
    				$octubre = $_POST['octubre'];
				}else{
    				$octubre = "";#default value
				}
				if(isset($_POST['noviembre'])){
    				$noviembre = $_POST['noviembre'];
				}else{
    				$noviembre = "";#default value
				}
				if(isset($_POST['diciembre'])){
    				$diciembre = $_POST['diciembre'];
				}else{
    				$diciembre = "";#default value 
				}
 
				$tabla = "cronograma";

				$datos = array("cliente" => $_POST["clienteCronograma"],
								"equipo" => $_POST["nuevoEquipo"],
					       		"marca" => $_POST["nuevoMarca"],
					       		"modelo" => $_POST["nuevoModelo"],
					       		"serie1" => $_POST["nuevoSerie"],
					       		"reporte"=>$_POST["nuevoReporte"],
					       		"tiempo" => $_POST["nuevoPeriodo"],
					       		"fecha_programacion"=>$_POST["fechaProximo"],
					       		"observacion"=> $_POST["nuevoObservacion"],  		
					       		"enero" => $enero,
					       		"febrero" => $febrero,
					       		"marzo" => $marzo,
					       		"abril" => $abril,
								"mayo" => $mayo,
								"junio" => $junio,
								"julio" => $julio,
								"agosto" => $agosto,
								"septiembre" => $septiembre,
								"octubre" => $octubre,
								"noviembre" => $noviembre,
								"diciembre" => $diciembre,
								"codigo2" => $_POST["nuevoCodigoM"]);

				$respuesta = ModeloCronograma::mdlCrearCronograma($tabla, $datos);

				if($respuesta == "ok"){

					echo '<script>

					swal({

						type: "success",
						title: "¡El Cronograma ha sido guardado correctamente!",
						showConfirmButton: true,
						confirmButtonText: "Cerrar"

					}).then(function(result){

						if(result.value){
						
							window.location = "cronograma";

						}

					});
				

					</script>';


				}

		}
	}
	
	
	//Insertar Cronograma asignado
	static public function ctrCrearCronogramaAsignado()
	{
		if(isset($_POST["clienteCronogramaperiodo"])){

				// $mes = implode(' - ', $_POST["nuevoMes"]);

				if(isset($_POST['enero'])){
    				$enero = $_POST['enero'];
				}else{
    				$enero = "";#default value
				}

				if(isset($_POST['febrero'])){
    				$febrero = $_POST['febrero'];
				}else{
    				$febrero = "";#default value
				}
				if(isset($_POST['marzo'])){
    				$marzo = $_POST['marzo'];
				}else{
    				$marzo = "";#default value
				}

				if(isset($_POST['abril'])){
    				$abril = $_POST['abril'];
				}else{
    				$abril = "";#default value
				}

				if(isset($_POST['mayo'])){
    				$mayo = $_POST['mayo'];
				}else{
    				$mayo = "";#default value
				}

				if(isset($_POST['junio'])){
    				$junio = $_POST['junio'];
				}else{
    				$junio = "";#default value
				}
				if(isset($_POST['julio'])){
    				$julio = $_POST['julio'];
				}else{
    				$julio = "";#default value
				}
				if(isset($_POST['agosto'])){
    				$agosto = $_POST['agosto'];
				}else{
    				$agosto = "";#default value
				}
				if(isset($_POST['septiembre'])){
    				$septiembre = $_POST['septiembre'];
				}else{
    				$septiembre = "";#default value
				}
				if(isset($_POST['octubre'])){
    				$octubre = $_POST['octubre'];
				}else{
    				$octubre = "";#default value
				}
				if(isset($_POST['noviembre'])){
    				$noviembre = $_POST['noviembre'];
				}else{
    				$noviembre = "";#default value
				}
				if(isset($_POST['diciembre'])){
    				$diciembre = $_POST['diciembre'];
				}else{
    				$diciembre = "";#default value 
				}
 
				$tabla = "cronograma";

				$datos = array("cliente" => $_POST["clienteCronogramaperiodo"],
								"equipo" => $_POST["periodoEquipo"],
					       		"marca" => $_POST["periodoMarca"],
					       		"modelo" => $_POST["periodoModelo"],
					       		"serie1" => $_POST["periodoSerie"],
					       		"tiempo" => $_POST["periodoPeriodo"],
					       		"observacion"=> $_POST["periodoObservacion"],  		
					       		"enero" => $enero,
					       		"febrero" => $febrero,
					       		"marzo" => $marzo,
					       		"abril" => $abril,
								"mayo" => $mayo,
								"junio" => $junio,
								"julio" => $julio,
								"agosto" => $agosto,
								"septiembre" => $septiembre,
								"octubre" => $octubre,
								"noviembre" => $noviembre,
								"diciembre" => $diciembre,
								"codigo2" => $_POST["periodoCodigo"]);

				$respuesta = ModeloCronograma::mdlCrearCronogramaPeriodo($tabla, $datos);

				if($respuesta == "ok"){

					echo '<script>

					swal({

						type: "success",
						title: "¡El Cronograma ha sido guardado correctamente!",
						showConfirmButton: true,
						confirmButtonText: "Cerrar"

					}).then(function(result){

						if(result.value){
						
							window.location = "cronograma";

						}

					});
				

					</script>';


				}

		}
	}

	


	/*=============================================
	EDITAR CRONOGRAMAS
	=============================================*/

	static public function ctrEditarCronograma()
	{
		if(isset($_POST["idCronogramaEditar"])){

				if(isset($_POST['eneroEditar'])){
    				$enero = $_POST['eneroEditar'];
				}else{
    				$enero = "";#default value
				}

				if(isset($_POST['febreroEditar'])){
    				$febrero = $_POST['febreroEditar'];
				}else{
    				$febrero = "";#default value
				}
				if(isset($_POST['marzoEditar'])){
    				$marzo = $_POST['marzoEditar'];
				}else{
    				$marzo = "";#default value
				}

				if(isset($_POST['abrilEditar'])){
    				$abril = $_POST['abrilEditar'];
				}else{
    				$abril = "";#default value
				}

				if(isset($_POST['mayoEditar'])){
    				$mayo = $_POST['mayoEditar'];
				}else{
    				$mayo = "";#default value
				}

				if(isset($_POST['junioEditar'])){
    				$junio = $_POST['junioEditar'];
				}else{
    				$junio = "";#default value
				}
				if(isset($_POST['julioEditar'])){
    				$julio = $_POST['julioEditar'];
				}else{
    				$julio = "";#default value
				}
				if(isset($_POST['agostoEditar'])){
    				$agosto = $_POST['agostoEditar'];
				}else{
    				$agosto = "";#default value
				}
				if(isset($_POST['septiembreEditar'])){
    				$septiembre = $_POST['septiembreEditar'];
				}else{
    				$septiembre = "";#default value
				}
				if(isset($_POST['octubreEditar'])){
    				$octubre = $_POST['octubreEditar'];
				}else{
    				$octubre = "";#default value
				}
				if(isset($_POST['noviembreEditar'])){
    				$noviembre = $_POST['noviembreEditar'];
				}else{
    				$noviembre = "";#default value
				}
				if(isset($_POST['diciembreEditar'])){
    				$diciembre = $_POST['diciembreEditar'];
				}else{
    				$diciembre = "";#default value
				}

				$tabla = "cronograma";

 
				$datos = array( "id" => $_POST["idCronogramaEditar"],
								"cliente" => $_POST["clienteCronogramaEditar"],
								"equipo" => $_POST["editarEquipo"],
					       		"marca" => $_POST["editarMarca"],
					       		"modelo" => $_POST["editarModelo"],
					       		"serie1" => $_POST["editarSerie"],
					       		// "mes_servicio" => $_POST["editarMes"],
					       		"observacion"=> $_POST["editarObservacion"],
					       		"enero" => $enero,
					       		"febrero" => $febrero,
					       		"marzo" => $marzo,
					       		"abril" => $abril,
								"mayo" => $mayo,
								"junio" => $junio,
								"julio" => $julio,
								"agosto" => $agosto,
								"septiembre" => $septiembre,
								"octubre" => $octubre,
								"noviembre" => $noviembre,
								"diciembre" => $diciembre,
								"tiempo" => $_POST["editarPeriodo"]);

				$respuesta = ModeloCronograma::mdlEditarCronograma($tabla, $datos);

				if($respuesta == "ok"){

					echo '<script>

					swal({

						type: "success",
						title: "¡El cronograma ha sido actualizado correctamente!",
						showConfirmButton: true,
						confirmButtonText: "Cerrar"

					}).then(function(result){

						if(result.value){
						
							window.location = "cronograma";

						}

					});
				

					</script>';


				}

		}
	}
	
	
	/*=============================================
	MOSTRAR CRONOGRAMAS CON EL PERIODO EN EL CREAR MANTENIMIENTO
	=============================================*/
	static public function ctrMostrarCronogramaPeriodo($item, $valor,$item2,$valor2){ 

		$tabla = "cronograma";

		$respuesta = ModeloCronograma::mdlMostrarCronogramaPeriodo($tabla, $item, $valor,$item2,$valor2);

		return $respuesta;
	}
	
		/*=============================================
	MOSTRAR CRONOGRAMAS CON EL PERIODO EN EL AGREGAR CRONOGRAMA
	=============================================*/
	static public function ctrMostrarCronogramaPeriodoSerie($item, $valor,$item2,$valor2){ 

		$tabla = "cronograma";

		$respuesta = ModeloCronograma::mdlMostrarCronogramaPeriodoSerie($tabla, $item, $valor,$item2,$valor2);

		return $respuesta;
	}


	/*=============================================
	MOSTRAR CRONOGRAMAS
	=============================================*/
	static public function ctrMostrarCronogramas($item, $valor,$select){

		$tabla = "cronograma";

		$respuesta = ModeloCronograma::mdlMostrarCronograma($tabla, $item, $valor,$select);

		return $respuesta;
	}


	

	/*=============================================
	BORRA CRONOGRAMAS
	=============================================*/

	static public function ctrBorrarCronograma(){

		if(isset($_GET["idCronograma"])){

			$tabla ="cronograma";
			$datos = $_GET["idCronograma"];

			

			$respuesta = ModeloCronograma::mdlBorrarCronograma($tabla, $datos);

			if($respuesta == "ok"){

				echo'<script>

				swal({
					  type: "success",
					  title: "El cronograma ha sido borrado correctamente",
					  showConfirmButton: true,
					  confirmButtonText: "Cerrar"
					  }).then(function(result){
								if (result.value) {

								window.location = "cronograma";

								}
							})

				</script>';

			}		

		}

	}



	//Rango de fecha de servicio

	static public function ctrRangoFechasCronograma($fechaInicial, $fechaFinal,$perfil,$valor,$tiempo,$periodo){
		
		$tabla = "cronograma";

		$respuesta = ModeloCronograma::mdlRangoFechasCronograma($tabla, $fechaInicial, $fechaFinal, $perfil, $valor, $tiempo,$periodo);

		return $respuesta;
	}


	/*=============================================
	DESCARGAR EXCEL
	=============================================*/ 
 
	static public function ctrDescargarReporteCronograma(){
 
		if(isset($_GET["reporte12"]) && $_GET["session"] == ""){
 
			
		    $tabla50 = "cronograma";

			$item50 = null;

			$valor50 = "2019"; 

			$select50 = "tiempo";

			$mantenimiento = ModeloCronograma::mdlMostrarCronograma($tabla50,$item50,$valor50,$select50);

			$tabla = "reportes";
			$item = null;
			$valor = "2019";
			$orden = null;
			$perfil = "tiempo";

			$cronograma = ModeloMantenimiento::mdlMostrarMantenimiento($tabla, $item, $valor, $orden,$perfil);


			/*=============================================
			CREAMOS EL ARCHIVO DE EXCEL
			=============================================*/

			$Name = $_GET["reporte12"].'.xls';

			header('Expires: 0');
			header('Cache-control: private');
			header("Content-type: application/vnd.ms-excel"); // Archivo de Excel
			header("Cache-Control: cache, must-revalidate"); 
			header('Content-Description: File Transfer');
			header('Last-Modified: '.date('D, d M Y H:i:s'));
			header("Pragma: public"); 
			header('Content-Disposition:; filename="'.$Name.'"');
			header("Content-Transfer-Encoding: binary");
			
			echo utf8_decode("<table border='0'> 
					<tr> 
					<td style='font-weight:bold; border:1px solid #eee; font-size:18px;'>AÑO  2019</td> 						
					</tr>");

			echo utf8_decode("<tr>
                        
                        <td style='border:1px solid #eee; font-size:18px;'></td>");
			echo"
		 				</tr>";

			echo utf8_decode("<table border='0'> 

					<tr> 
					
					<td style='font-weight:bold; border:1px solid #eee;'>CLIENTE</td> 
					<td style='font-weight:bold; border:1px solid #eee;'>CÓDIGO</td>
					<td style='font-weight:bold; border:1px solid #eee;'>EQUIPO</td>
					<td style='font-weight:bold; border:1px solid #eee;'>MARCA</td>
					<td style='font-weight:bold; border:1px solid #eee;'>MODELO</td>
					<td style='font-weight:bold; border:1px solid #eee;'>SERIE</td>			
					<td style='font-weight:bold; border:1px solid #eee;'>ENERO</td>						
					<td style='font-weight:bold; border:1px solid #eee;'>FEBRERO</td>
					<td style='font-weight:bold; border:1px solid #eee;'>MARZO</td>
					<td style='font-weight:bold; border:1px solid #eee;'>ABRIL</td>
					<td style='font-weight:bold; border:1px solid #eee;'>MAYO</td>
					<td style='font-weight:bold; border:1px solid #eee;'>JUNIO</td>
					<td style='font-weight:bold; border:1px solid #eee;'>JULIO</td>
					<td style='font-weight:bold; border:1px solid #eee;'>AGOSTO</td>
					<td style='font-weight:bold; border:1px solid #eee;'>SEPTIEMBRE</td>
					<td style='font-weight:bold; border:1px solid #eee;'>OCTUBRE</td>
					<td style='font-weight:bold; border:1px solid #eee;'>NOVIEMBRE</td>
					<td style='font-weight:bold; border:1px solid #eee;'>DICIEMBRE</td>							
					</tr>");
					
			
			foreach ($mantenimiento as $key => $item25) {

				$perfil = null;

				$cliente = ControladorUsuarios::ctrMostrarUsuarios("id", $item25["cliente"],$perfil);
				
				// $tabla1 = "cronograma";

				// $item1 = "codigo2";

				// $valor1 = $item["codigo"];

				// $select = null;


				// $cronogramaCodigo = ModeloCronograma::mdlMostrarCronograma($tabla1, $item1, $valor1,$select);
				echo utf8_decode("<tr>
                        
                        
			 			<td style='border:1px solid #eee;'>".$cliente["nombre"]."</td>
			 			<td style='border:1px solid #eee;'>".$item25["codigo2"]."</td>
			 			<td style='border:1px solid #eee;'>".$item25["equipo"]."</td>
			 			<td style='border:1px solid #eee;'>".$item25["marca"]."</td> 
			 			<td style='border:1px solid #eee;'>".$item25["modelo"]."</td>
			 			<td style='border:1px solid #eee;'>".$item25["serie1"]."</td>");

			 			if ($item25["enero"] == "enero") {
			 				echo "
			 				<td style='border:1px solid #eee;'>Programado</td>";
			 			}else {
			 				echo "
			 				<td style='border:1px solid #eee;'></td>";

			 			}
			 			if ($item25["febrero"] == "febrero") {
			 				echo "
			 				<td style='border:1px solid #eee;'>Programado</td>";
			 			}else {
			 				echo "
			 				<td style='border:1px solid #eee;'></td>";

			 			}
			 			if ($item25["marzo"] == "marzo") {
			 				echo "
			 				<td style='border:1px solid #eee;'>Programado</td>";
			 			}else {
			 				echo "
			 				<td style='border:1px solid #eee;'></td>";

			 			}
			 			if ($item25["abril"] == "abril") {
			 				echo "
			 				<td style='border:1px solid #eee;'>Programado</td>";
			 			}else {
			 				echo "
			 				<td style='border:1px solid #eee;'></td>";

			 			}
			 			if ($item25["mayo"] == "mayo") {
			 				echo "
			 				<td style='border:1px solid #eee;'>Programado</td>";
			 			}else {
			 				echo "
			 				<td style='border:1px solid #eee;'></td>";

			 			}
			 			if ($item25["junio"] == "junio") {
			 				echo "
			 				<td style='border:1px solid #eee;'>Programado</td>";
			 			}else {
			 				echo "
			 				<td style='border:1px solid #eee;'></td>";

			 			}
			 			if ($item25["julio"] == "julio") {
			 				echo "
			 				<td style='border:1px solid #eee;'>Programado</td>";
			 			}else {
			 				echo "
			 				<td style='border:1px solid #eee;'></td>";

			 			}
			 			if ($item25["agosto"] == "agosto") {
			 				echo "
			 				<td style='border:1px solid #eee;'>Programado</td>";
			 			}else {
			 				echo "
			 				<td style='border:1px solid #eee;'></td>";

			 			}
			 			if ($item25["septiembre"] == "septiembre") {
			 				echo "
			 				<td style='border:1px solid #eee;'>Programado</td>";
			 			}else {
			 				echo "
			 				<td style='border:1px solid #eee;'></td>";

			 			}
			 			if ($item25["octubre"] == "octubre") {
			 				echo "
			 				<td style='border:1px solid #eee;'>Programado</td>";
			 			}else {
			 				echo "
			 				<td style='border:1px solid #eee;'></td>";

			 			}
			 			if ($item25["noviembre"] == "noviembre") {
			 				echo "
			 				<td style='border:1px solid #eee;'>Programado</td>";
			 			}else {
			 				echo "
			 				<td style='border:1px solid #eee;'></td>";

			 			}
			 			if ($item25["diciembre"] == "diciembre") {
			 				echo "
			 				<td style='border:1px solid #eee;'>Programado</td>";
			 			}else {
			 				echo "
			 				<td style='border:1px solid #eee;'></td>";

			 			}
			 			
			 			echo"
		 				</tr>";
			}

			foreach ($cronograma as $row => $item){

				$perfil = null;

				$cliente = ControladorUsuarios::ctrMostrarUsuarios("id", $item["id_clinica"],$perfil);
				
				$tabla1 = "cronograma";

				$item1 = "codigo2";

				$valor1 = $item["codigo"];

				$select = null;


				$cronogramaCodigo = ModeloCronograma::mdlMostrarCronograma($tabla1, $item1, $valor1,$select);

				//$item2 = null;
                //$valor = $item["serie1"];
                //$orden = null;
                //$perfil2 = "serie";
                //$reportessi = ControladorMantenimiento::ctrMostrarModelos($item2, $valor,$orden,$perfil2);

			 echo utf8_decode("<tr>
                        
                        
			 			<td style='border:1px solid #eee;'>".$cliente["nombre"]."</td>
			 			<td style='border:1px solid #eee;'>".$item["codigo"]."</td>
			 			<td style='border:1px solid #eee;'>".$item["equipo_re"]."</td>
			 			<td style='border:1px solid #eee;'>".$item["marca_re"]."</td> 
			 			<td style='border:1px solid #eee;'>".$item["modelo_re"]."</td>
			 			<td style='border:1px solid #eee;'>".$item["serie"]."</td>");

			 			if ($item["mes"] == "enerocr") {
			 				echo "
			 				<td style='border:1px solid #eee;'>".$item["num_reporte"]."</td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>";
			 			}else if ($item["mes"] == "febrerocr") {
			 				echo "
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'>".$item["num_reporte"]."</td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>";
			 			}else if ($item["mes"] == "marzocr") {
			 				echo "
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'>".$item["num_reporte"]."</td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>";

			 			}else if ($item["mes"] == "abrilcr") {
			 				echo "
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'>".$item["num_reporte"]."</td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>";

			 			}else if ($item["mes"] == "mayocr") {
			 				echo "
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'>".$item["num_reporte"]."</td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>";

			 			}else if ($item["mes"] == "juniocr") {
			 				echo "
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'>".$item["num_reporte"]."</td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>";

			 			}else if ($item["mes"] == "juliocr") {
			 				echo "
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'>".$item["num_reporte"]."</td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>";

			 			}else if ($item["mes"] == "agostocr") {
			 				echo "
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'>".$item["num_reporte"]."</td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>";

			 			}else if ($item["mes"] == "septiembrecr") {
			 				echo "
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'>".$item["num_reporte"]."</td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>";

			 			}else if ($item["mes"] == "octubrecr") {
			 				echo "
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'>".$item["num_reporte"]."</td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>";

			 			}else if ($item["mes"] == "noviembrecr") {
			 				echo "
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'>".$item["num_reporte"]."</td>
			 				<td style='border:1px solid #eee;'></td>";

			 			}else if ($item["mes"] == "diciembrecr") {
			 				echo "
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'>".$item["num_reporte"]."</td>";

			 			}
			 			echo"
		 				</tr>";


			}


			echo "</table>";

		}else if(isset($_GET["reporte12"]) && $_GET["session"] != ""){

			$tabla50 = "cronograma";

			$item50 = null;

			$valor50 =  $_GET["session"]; 

			$select50 = "cliente";
			
			$select51 = "tiempo";

			$valor51 =  "2019";

			$mantenimiento = ModeloCronograma::mdlMostrarCronogramaExcelUsuarios($tabla50,$item50,$valor50,$select50,$select51,$valor51);
			
            $tabla = "reportes";
			$item = null;
			$valor = $_GET["session"]; 
			$orden = null;
			$perfil = "id_clinica";
			$perfil52 = "tiempo";
			$valor52 =  "2019";
			
			$cronograma = ModeloMantenimiento::mdlMostrarMantenimientoExcelUsuarios($tabla, $item, $valor, $orden,$perfil,$perfil52,$valor52);

			/*=============================================
			CREAMOS EL ARCHIVO DE EXCEL
			=============================================*/
			
			$Name = $_GET["reporte12"].'.xls';

			header('Expires: 0');
			header('Cache-control: private');
			header("Content-type: application/vnd.ms-excel"); // Archivo de Excel
			header("Cache-Control: cache, must-revalidate"); 
			header('Content-Description: File Transfer');
			header('Last-Modified: '.date('D, d M Y H:i:s'));
			header("Pragma: public"); 
			header('Content-Disposition:; filename="'.$Name.'"');
			header("Content-Transfer-Encoding: binary");
			
			echo utf8_decode("<table border='0'> 
					<tr> 
					<td style='font-weight:bold; border:1px solid #eee; font-size:18px;'>AÑO  2019</td> 						
					</tr>");

			echo utf8_decode("<tr>
                        
                        <td style='border:1px solid #eee; font-size:18px;'></td>");
			echo"
		 				</tr>";

			echo utf8_decode("<table border='0'> 
			
			<tr> 
					
					<td style='font-weight:bold; border:1px solid #eee;'>CÓDIGO</td>
					<td style='font-weight:bold; border:1px solid #eee;'>EQUIPO</td>
					<td style='font-weight:bold; border:1px solid #eee;'>MARCA</td>
					<td style='font-weight:bold; border:1px solid #eee;'>MODELO</td>
					<td style='font-weight:bold; border:1px solid #eee;'>SERIE</td>			
					<td style='font-weight:bold; border:1px solid #eee;'>ENERO</td>						
					<td style='font-weight:bold; border:1px solid #eee;'>FEBRERO</td>
					<td style='font-weight:bold; border:1px solid #eee;'>MARZO</td>
					<td style='font-weight:bold; border:1px solid #eee;'>ABRIL</td>
					<td style='font-weight:bold; border:1px solid #eee;'>MAYO</td>
					<td style='font-weight:bold; border:1px solid #eee;'>JUNIO</td>
					<td style='font-weight:bold; border:1px solid #eee;'>JULIO</td>
					<td style='font-weight:bold; border:1px solid #eee;'>AGOSTO</td>
					<td style='font-weight:bold; border:1px solid #eee;'>SEPTIEMBRE</td>
					<td style='font-weight:bold; border:1px solid #eee;'>OCTUBRE</td>
					<td style='font-weight:bold; border:1px solid #eee;'>NOVIEMBRE</td>
					<td style='font-weight:bold; border:1px solid #eee;'>DICIEMBRE</td>

					</tr>");
					
					
					foreach ($mantenimiento as $key => $item25) {

				$perfil = null;

				$cliente = ControladorUsuarios::ctrMostrarUsuarios("id", $item25["cliente"],$perfil);
				
				echo utf8_decode("<tr>
                        
                        
			 			<td style='border:1px solid #eee;'>".$item25["codigo2"]."</td>
			 			<td style='border:1px solid #eee;'>".$item25["equipo"]."</td>
			 			<td style='border:1px solid #eee;'>".$item25["marca"]."</td> 
			 			<td style='border:1px solid #eee;'>".$item25["modelo"]."</td>
			 			<td style='border:1px solid #eee;'>".$item25["serie1"]."</td>");

			 			if ($item25["enero"] == "enero") {
			 				echo "
			 				<td style='border:1px solid #eee;'>Programado</td>";
			 			}else {
			 				echo "
			 				<td style='border:1px solid #eee;'></td>";

			 			}
			 			if ($item25["febrero"] == "febrero") {
			 				echo "
			 				<td style='border:1px solid #eee;'>Programado</td>";
			 			}else {
			 				echo "
			 				<td style='border:1px solid #eee;'></td>";

			 			}
			 			if ($item25["marzo"] == "marzo") {
			 				echo "
			 				<td style='border:1px solid #eee;'>Programado</td>";
			 			}else {
			 				echo "
			 				<td style='border:1px solid #eee;'></td>";

			 			}
			 			if ($item25["abril"] == "abril") {
			 				echo "
			 				<td style='border:1px solid #eee;'>Programado</td>";
			 			}else {
			 				echo "
			 				<td style='border:1px solid #eee;'></td>";

			 			}
			 			if ($item25["mayo"] == "mayo") {
			 				echo "
			 				<td style='border:1px solid #eee;'>Programado</td>";
			 			}else {
			 				echo "
			 				<td style='border:1px solid #eee;'></td>";

			 			}
			 			if ($item25["junio"] == "junio") {
			 				echo "
			 				<td style='border:1px solid #eee;'>Programado</td>";
			 			}else {
			 				echo "
			 				<td style='border:1px solid #eee;'></td>";

			 			}
			 			if ($item25["julio"] == "julio") {
			 				echo "
			 				<td style='border:1px solid #eee;'>Programado</td>";
			 			}else {
			 				echo "
			 				<td style='border:1px solid #eee;'></td>";

			 			}
			 			if ($item25["agosto"] == "agosto") {
			 				echo "
			 				<td style='border:1px solid #eee;'>Programado</td>";
			 			}else {
			 				echo "
			 				<td style='border:1px solid #eee;'></td>";

			 			}
			 			if ($item25["septiembre"] == "septiembre") {
			 				echo "
			 				<td style='border:1px solid #eee;'>Programado</td>";
			 			}else {
			 				echo "
			 				<td style='border:1px solid #eee;'></td>";

			 			}
			 			if ($item25["octubre"] == "octubre") {
			 				echo "
			 				<td style='border:1px solid #eee;'>Programado</td>";
			 			}else {
			 				echo "
			 				<td style='border:1px solid #eee;'></td>";

			 			}
			 			if ($item25["noviembre"] == "noviembre") {
			 				echo "
			 				<td style='border:1px solid #eee;'>Programado</td>";
			 			}else {
			 				echo "
			 				<td style='border:1px solid #eee;'></td>";

			 			}
			 			if ($item25["diciembre"] == "diciembre") {
			 				echo "
			 				<td style='border:1px solid #eee;'>Programado</td>";
			 			}else {
			 				echo "
			 				<td style='border:1px solid #eee;'></td>";

			 			}
			 			
			 			echo"
		 				</tr>";
			}
					
					
					foreach ($cronograma as $row => $item){
					    
					    $perfil = null;

				        $cliente = ControladorUsuarios::ctrMostrarUsuarios("id", $item["id_clinica"],$perfil);
				        
				        $tabla1 = "cronograma";

						$item1 = "codigo2";

						$valor1 = $item["codigo"];

						$select = null;


						$cronogramaCodigo = ModeloCronograma::mdlMostrarCronograma($tabla1, $item1, $valor1,$select);
				        
				        echo utf8_decode("<tr>

			 			
			 			<td style='border:1px solid #eee;'>".$item["codigo"]."</td>
			 			<td style='border:1px solid #eee;'>".$item["equipo_re"]."</td>
			 			<td style='border:1px solid #eee;'>".$item["marca_re"]."</td> 
			 			<td style='border:1px solid #eee;'>".$item["modelo_re"]."</td>
			 			<td style='border:1px solid #eee;'>".$item["serie"]."</td>");
			 			
			 			
			 			if ($item["mes"] == "enerocr") {
			 				echo "
			 				<td style='border:1px solid #eee;'>".$item["num_reporte"]."</td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>";
			 			}else if ($item["mes"] == "febrerocr") {
			 				echo "
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'>".$item["num_reporte"]."</td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>";
			 			}else if ($item["mes"] == "marzocr") {
			 				echo "
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'>".$item["num_reporte"]."</td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>";

			 			}else if ($item["mes"] == "abrilcr") {
			 				echo "
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'>".$item["num_reporte"]."</td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>";

			 			}else if ($item["mes"] == "mayocr") {
			 				echo "
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'>".$item["num_reporte"]."</td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>";

			 			}else if ($item["mes"] == "juniocr") {
			 				echo "
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'>".$item["num_reporte"]."</td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>";

			 			}else if ($item["mes"] == "juliocr") {
			 				echo "
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'>".$item["num_reporte"]."</td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>";

			 			}else if ($item["mes"] == "agostocr") {
			 				echo "
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'>".$item["num_reporte"]."</td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>";

			 			}else if ($item["mes"] == "septiembrecr") {
			 				echo "
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'>".$item["num_reporte"]."</td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>";

			 			}else if ($item["mes"] == "octubrecr") {
			 				echo "
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'>".$item["num_reporte"]."</td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>";

			 			}else if ($item["mes"] == "noviembrecr") {
			 				echo "
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'>".$item["num_reporte"]."</td>
			 				<td style='border:1px solid #eee;'></td>";

			 			}else if ($item["mes"] == "diciembrecr") {
			 				echo "
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'>".$item["num_reporte"]."</td>";

			 			}
			 			
			 			echo"
		 				</tr>";
					}

								
			echo "</table>";


			
		}

	}




	/*============================================= 
	CREAR OBSERVACION 
	=============================================*/

	static public function ctrCrearObservacionCronograma(){

				if(isset($_POST["idReporteObservacion"])){
 
						$tabla = "cronograma";

						$item1 = "observacion";
						$valor1 = $_POST["nuevoObservacionReporte"];

						$item2 = "id";		
						$valor2 = $_POST["idReporteObservacion"];

						$respuesta = ModeloCronograma::mdlActualizarCronogramaObservacion($tabla, $item1, $valor1, $item2, $valor2);

						if ($respuesta == "ok") {
							echo'<script>
		
							swal({
								  type: "success",
								  title: "La observación se ha guardado",
								  showConfirmButton: true,
								  confirmButtonText: "Cerrar"
								  }).then(function(result){
											if (result.value) {
		
											window.location = "cronograma";
		
											}
										})
		
							</script>';
						}		

		}

	}
	
	
	
	/*=============================================
	DESCARGAR EXCEL 2020
	=============================================*/ 
 
	static public function ctrDescargarReporteCronograma2020(){
 
		if(isset($_GET["reporte13"]) && $_GET["session"] == ""){
 
			$tabla50 = "cronograma";

			$item50 = null;

			$valor50 = "2020"; 

			$select50 = "tiempo";

			$mantenimiento = ModeloCronograma::mdlMostrarCronograma($tabla50,$item50,$valor50,$select50);

			$tabla = "reportes";
			$item = null;
			$valor = "2020";
			$orden = null;
			$perfil = "tiempo";

			$cronograma = ModeloMantenimiento::mdlMostrarMantenimiento($tabla, $item, $valor, $orden,$perfil);


			/*=============================================
			CREAMOS EL ARCHIVO DE EXCEL
			=============================================*/

			$Name = $_GET["reporte13"].'.xls';

			header('Expires: 0');
			header('Cache-control: private');
			header("Content-type: application/vnd.ms-excel"); // Archivo de Excel
			header("Cache-Control: cache, must-revalidate"); 
			header('Content-Description: File Transfer');
			header('Last-Modified: '.date('D, d M Y H:i:s'));
			header("Pragma: public"); 
			header('Content-Disposition:; filename="'.$Name.'"');
			header("Content-Transfer-Encoding: binary");

			echo utf8_decode("<table border='0'> 
					<tr> 
					<td style='font-weight:bold; border:1px solid #eee; font-size:18px;'>AÑO  2020</td> 						
					</tr>");

			echo utf8_decode("<tr>
                        
                        <td style='border:1px solid #eee; font-size:18px;'></td>");
			echo"
		 				</tr>";

			echo utf8_decode("<table border='0'> 
					<tr> 
					<td style='font-weight:bold; border:1px solid #eee;'>CLIENTE</td> 
					<td style='font-weight:bold; border:1px solid #eee;'>CÓDIGO</td>
					<td style='font-weight:bold; border:1px solid #eee;'>EQUIPO</td>
					<td style='font-weight:bold; border:1px solid #eee;'>MARCA</td>
					<td style='font-weight:bold; border:1px solid #eee;'>MODELO</td>
					<td style='font-weight:bold; border:1px solid #eee;'>SERIE</td>			
					<td style='font-weight:bold; border:1px solid #eee;'>ENERO</td>						
					<td style='font-weight:bold; border:1px solid #eee;'>FEBRERO</td>
					<td style='font-weight:bold; border:1px solid #eee;'>MARZO</td>
					<td style='font-weight:bold; border:1px solid #eee;'>ABRIL</td>
					<td style='font-weight:bold; border:1px solid #eee;'>MAYO</td>
					<td style='font-weight:bold; border:1px solid #eee;'>JUNIO</td>
					<td style='font-weight:bold; border:1px solid #eee;'>JULIO</td>
					<td style='font-weight:bold; border:1px solid #eee;'>AGOSTO</td>
					<td style='font-weight:bold; border:1px solid #eee;'>SEPTIEMBRE</td>
					<td style='font-weight:bold; border:1px solid #eee;'>OCTUBRE</td>
					<td style='font-weight:bold; border:1px solid #eee;'>NOVIEMBRE</td>
					<td style='font-weight:bold; border:1px solid #eee;'>DICIEMBRE</td>							
					</tr>");


			foreach ($mantenimiento as $key => $item25) {

				$perfil = null;

				$cliente = ControladorUsuarios::ctrMostrarUsuarios("id", $item25["cliente"],$perfil);
				
				// $tabla1 = "cronograma";

				// $item1 = "codigo2";

				// $valor1 = $item["codigo"];

				// $select = null;


				// $cronogramaCodigo = ModeloCronograma::mdlMostrarCronograma($tabla1, $item1, $valor1,$select);
				echo utf8_decode("<tr>
                        
			 			<td style='border:1px solid #eee;'>".$cliente["nombre"]."</td>
			 			<td style='border:1px solid #eee;'>".$item25["codigo2"]."</td>
			 			<td style='border:1px solid #eee;'>".$item25["equipo"]."</td>
			 			<td style='border:1px solid #eee;'>".$item25["marca"]."</td> 
			 			<td style='border:1px solid #eee;'>".$item25["modelo"]."</td>
			 			<td style='border:1px solid #eee;'>".$item25["serie1"]."</td>");

			 			if ($item25["enero"] == "enero") {
			 				echo "
			 				<td style='border:1px solid #eee;'>Programado</td>";
			 			}else {
			 				echo "
			 				<td style='border:1px solid #eee;'></td>";

			 			}
			 			if ($item25["febrero"] == "febrero") {
			 				echo "
			 				<td style='border:1px solid #eee;'>Programado</td>";
			 			}else {
			 				echo "
			 				<td style='border:1px solid #eee;'></td>";

			 			}
			 			if ($item25["marzo"] == "marzo") {
			 				echo "
			 				<td style='border:1px solid #eee;'>Programado</td>";
			 			}else {
			 				echo "
			 				<td style='border:1px solid #eee;'></td>";

			 			}
			 			if ($item25["abril"] == "abril") {
			 				echo "
			 				<td style='border:1px solid #eee;'>Programado</td>";
			 			}else {
			 				echo "
			 				<td style='border:1px solid #eee;'></td>";

			 			}
			 			if ($item25["mayo"] == "mayo") {
			 				echo "
			 				<td style='border:1px solid #eee;'>Programado</td>";
			 			}else {
			 				echo "
			 				<td style='border:1px solid #eee;'></td>";

			 			}
			 			if ($item25["junio"] == "junio") {
			 				echo "
			 				<td style='border:1px solid #eee;'>Programado</td>";
			 			}else {
			 				echo "
			 				<td style='border:1px solid #eee;'></td>";

			 			}
			 			if ($item25["julio"] == "julio") {
			 				echo "
			 				<td style='border:1px solid #eee;'>Programado</td>";
			 			}else {
			 				echo "
			 				<td style='border:1px solid #eee;'></td>";

			 			}
			 			if ($item25["agosto"] == "agosto") {
			 				echo "
			 				<td style='border:1px solid #eee;'>Programado</td>";
			 			}else {
			 				echo "
			 				<td style='border:1px solid #eee;'></td>";

			 			}
			 			if ($item25["septiembre"] == "septiembre") {
			 				echo "
			 				<td style='border:1px solid #eee;'>Programado</td>";
			 			}else {
			 				echo "
			 				<td style='border:1px solid #eee;'></td>";

			 			}
			 			if ($item25["octubre"] == "octubre") {
			 				echo "
			 				<td style='border:1px solid #eee;'>Programado</td>";
			 			}else {
			 				echo "
			 				<td style='border:1px solid #eee;'></td>";

			 			}
			 			if ($item25["noviembre"] == "noviembre") {
			 				echo "
			 				<td style='border:1px solid #eee;'>Programado</td>";
			 			}else {
			 				echo "
			 				<td style='border:1px solid #eee;'></td>";

			 			}
			 			if ($item25["diciembre"] == "diciembre") {
			 				echo "
			 				<td style='border:1px solid #eee;'>Programado</td>";
			 			}else {
			 				echo "
			 				<td style='border:1px solid #eee;'></td>";

			 			}
			 			
			 			echo"
		 				</tr>";
			}

			foreach ($cronograma as $row => $item){

				$perfil = null;

				$cliente = ControladorUsuarios::ctrMostrarUsuarios("id", $item["id_clinica"],$perfil);
				
				$tabla1 = "cronograma";

				$item1 = "codigo2";

				$valor1 = $item["codigo"];

				$select = null;


				$cronogramaCodigo = ModeloCronograma::mdlMostrarCronograma($tabla1, $item1, $valor1,$select);

				//$item2 = null;
                //$valor = $item["serie1"];
                //$orden = null;
                //$perfil2 = "serie";
                //$reportessi = ControladorMantenimiento::ctrMostrarModelos($item2, $valor,$orden,$perfil2);


                

			 echo utf8_decode("<tr>
                        
			 			<td style='border:1px solid #eee;'>".$cliente["nombre"]."</td>
			 			<td style='border:1px solid #eee;'>".$item["codigo"]."</td>
			 			<td style='border:1px solid #eee;'>".$item["equipo_re"]."</td>
			 			<td style='border:1px solid #eee;'>".$item["marca_re"]."</td> 
			 			<td style='border:1px solid #eee;'>".$item["modelo_re"]."</td>
			 			<td style='border:1px solid #eee;'>".$item["serie"]."</td>");

			 			if ($item["mes"] == "enerocr") {
			 				echo "
			 				<td style='border:1px solid #eee;'>".$item["num_reporte"]."</td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>";
			 			}else if ($item["mes"] == "febrerocr") {
			 				echo "
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'>".$item["num_reporte"]."</td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>";
			 			}else if ($item["mes"] == "marzocr") {
			 				echo "
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'>".$item["num_reporte"]."</td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>";

			 			}else if ($item["mes"] == "abrilcr") {
			 				echo "
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'>".$item["num_reporte"]."</td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>";

			 			}else if ($item["mes"] == "mayocr") {
			 				echo "
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'>".$item["num_reporte"]."</td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>";

			 			}else if ($item["mes"] == "juniocr") {
			 				echo "
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'>".$item["num_reporte"]."</td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>";

			 			}else if ($item["mes"] == "juliocr") {
			 				echo "
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'>".$item["num_reporte"]."</td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>";

			 			}else if ($item["mes"] == "agostocr") {
			 				echo "
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'>".$item["num_reporte"]."</td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>";

			 			}else if ($item["mes"] == "septiembrecr") {
			 				echo "
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'>".$item["num_reporte"]."</td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>";

			 			}else if ($item["mes"] == "octubrecr") {
			 				echo "
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'>".$item["num_reporte"]."</td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>";

			 			}else if ($item["mes"] == "noviembrecr") {
			 				echo "
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'>".$item["num_reporte"]."</td>
			 				<td style='border:1px solid #eee;'></td>";

			 			}else if ($item["mes"] == "diciembrecr") {
			 				echo "
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'>".$item["num_reporte"]."</td>";

			 			}
			 			echo"
		 				</tr>";


			}


			echo "</table>";

		}else if(isset($_GET["reporte13"]) && $_GET["session"] != ""){


			$tabla50 = "cronograma";

			$item50 = null;

			$valor50 =  $_GET["session"]; 

			$select50 = "cliente";
			
			$select51 = "tiempo";

			$valor51 =  "2020";

			$mantenimiento = ModeloCronograma::mdlMostrarCronogramaExcelUsuarios($tabla50,$item50,$valor50,$select50,$select51,$valor51);
			
            $tabla = "reportes";
			$item = null;
			$valor = $_GET["session"]; 
			$orden = null;
			$perfil = "id_clinica";
			$perfil52 = "tiempo";
			$valor52 =  "2020";
			
			$cronograma = ModeloMantenimiento::mdlMostrarMantenimientoExcelUsuarios($tabla, $item, $valor, $orden,$perfil,$perfil52,$valor52);

			/*=============================================
			CREAMOS EL ARCHIVO DE EXCEL
			=============================================*/
			
			$Name = $_GET["reporte13"].'.xls';

			header('Expires: 0');
			header('Cache-control: private');
			header("Content-type: application/vnd.ms-excel"); // Archivo de Excel
			header("Cache-Control: cache, must-revalidate"); 
			header('Content-Description: File Transfer');
			header('Last-Modified: '.date('D, d M Y H:i:s'));
			header("Pragma: public"); 
			header('Content-Disposition:; filename="'.$Name.'"');
			header("Content-Transfer-Encoding: binary");

			echo utf8_decode("<table border='0'> 
					<tr> 
					<td style='font-weight:bold; border:1px solid #eee; font-size:18px;'>AÑO  2020</td> 						
					</tr>");

			echo utf8_decode("<tr>
                        
                        <td style='border:1px solid #eee; font-size:18px;'></td>");
			echo"
		 				</tr>";

			echo utf8_decode("<table border='0'> 
			
			<tr> 
					<td style='font-weight:bold; border:1px solid #eee;'>CÓDIGO</td>
					<td style='font-weight:bold; border:1px solid #eee;'>EQUIPO</td>
					<td style='font-weight:bold; border:1px solid #eee;'>MARCA</td>
					<td style='font-weight:bold; border:1px solid #eee;'>MODELO</td>
					<td style='font-weight:bold; border:1px solid #eee;'>SERIE</td>			
					<td style='font-weight:bold; border:1px solid #eee;'>ENERO</td>						
					<td style='font-weight:bold; border:1px solid #eee;'>FEBRERO</td>
					<td style='font-weight:bold; border:1px solid #eee;'>MARZO</td>
					<td style='font-weight:bold; border:1px solid #eee;'>ABRIL</td>
					<td style='font-weight:bold; border:1px solid #eee;'>MAYO</td>
					<td style='font-weight:bold; border:1px solid #eee;'>JUNIO</td>
					<td style='font-weight:bold; border:1px solid #eee;'>JULIO</td>
					<td style='font-weight:bold; border:1px solid #eee;'>AGOSTO</td>
					<td style='font-weight:bold; border:1px solid #eee;'>SEPTIEMBRE</td>
					<td style='font-weight:bold; border:1px solid #eee;'>OCTUBRE</td>
					<td style='font-weight:bold; border:1px solid #eee;'>NOVIEMBRE</td>
					<td style='font-weight:bold; border:1px solid #eee;'>DICIEMBRE</td>

					</tr>");

					foreach ($mantenimiento as $key => $item25) {

				$perfil = null;

				$cliente = ControladorUsuarios::ctrMostrarUsuarios("id", $item25["cliente"],$perfil);
				
				echo utf8_decode("<tr>
                        
			 			<td style='border:1px solid #eee;'>".$item25["codigo2"]."</td>
			 			<td style='border:1px solid #eee;'>".$item25["equipo"]."</td>
			 			<td style='border:1px solid #eee;'>".$item25["marca"]."</td> 
			 			<td style='border:1px solid #eee;'>".$item25["modelo"]."</td>
			 			<td style='border:1px solid #eee;'>".$item25["serie1"]."</td>");

			 			if ($item25["enero"] == "enero") {
			 				echo "
			 				<td style='border:1px solid #eee;'>Programado</td>";
			 			}else {
			 				echo "
			 				<td style='border:1px solid #eee;'></td>";

			 			}
			 			if ($item25["febrero"] == "febrero") {
			 				echo "
			 				<td style='border:1px solid #eee;'>Programado</td>";
			 			}else {
			 				echo "
			 				<td style='border:1px solid #eee;'></td>";

			 			}
			 			if ($item25["marzo"] == "marzo") {
			 				echo "
			 				<td style='border:1px solid #eee;'>Programado</td>";
			 			}else {
			 				echo "
			 				<td style='border:1px solid #eee;'></td>";

			 			}
			 			if ($item25["abril"] == "abril") {
			 				echo "
			 				<td style='border:1px solid #eee;'>Programado</td>";
			 			}else {
			 				echo "
			 				<td style='border:1px solid #eee;'></td>";

			 			}
			 			if ($item25["mayo"] == "mayo") {
			 				echo "
			 				<td style='border:1px solid #eee;'>Programado</td>";
			 			}else {
			 				echo "
			 				<td style='border:1px solid #eee;'></td>";

			 			}
			 			if ($item25["junio"] == "junio") {
			 				echo "
			 				<td style='border:1px solid #eee;'>Programado</td>";
			 			}else {
			 				echo "
			 				<td style='border:1px solid #eee;'></td>";

			 			}
			 			if ($item25["julio"] == "julio") {
			 				echo "
			 				<td style='border:1px solid #eee;'>Programado</td>";
			 			}else {
			 				echo "
			 				<td style='border:1px solid #eee;'></td>";

			 			}
			 			if ($item25["agosto"] == "agosto") {
			 				echo "
			 				<td style='border:1px solid #eee;'>Programado</td>";
			 			}else {
			 				echo "
			 				<td style='border:1px solid #eee;'></td>";

			 			}
			 			if ($item25["septiembre"] == "septiembre") {
			 				echo "
			 				<td style='border:1px solid #eee;'>Programado</td>";
			 			}else {
			 				echo "
			 				<td style='border:1px solid #eee;'></td>";

			 			}
			 			if ($item25["octubre"] == "octubre") {
			 				echo "
			 				<td style='border:1px solid #eee;'>Programado</td>";
			 			}else {
			 				echo "
			 				<td style='border:1px solid #eee;'></td>";

			 			}
			 			if ($item25["noviembre"] == "noviembre") {
			 				echo "
			 				<td style='border:1px solid #eee;'>Programado</td>";
			 			}else {
			 				echo "
			 				<td style='border:1px solid #eee;'></td>";

			 			}
			 			if ($item25["diciembre"] == "diciembre") {
			 				echo "
			 				<td style='border:1px solid #eee;'>Programado</td>";
			 			}else {
			 				echo "
			 				<td style='border:1px solid #eee;'></td>";

			 			}
			 			
			 			echo"
		 				</tr>";
			}
					
					foreach ($cronograma as $row => $item){
					    
					    $perfil = null;

				        $cliente = ControladorUsuarios::ctrMostrarUsuarios("id", $item["id_clinica"],$perfil);
				        
				        $tabla1 = "cronograma";

						$item1 = "codigo2";

						$valor1 = $item["codigo"];

						$select = null;


						$cronogramaCodigo = ModeloCronograma::mdlMostrarCronograma($tabla1, $item1, $valor1,$select);
				        
				        echo utf8_decode("<tr>

			 			<td style='border:1px solid #eee;'>".$item["codigo"]."</td>
			 			<td style='border:1px solid #eee;'>".$item["equipo_re"]."</td>
			 			<td style='border:1px solid #eee;'>".$item["marca_re"]."</td> 
			 			<td style='border:1px solid #eee;'>".$item["modelo_re"]."</td>
			 			<td style='border:1px solid #eee;'>".$item["serie"]."</td>");
			 			
			 			
			 			if ($item["mes"] == "enerocr") {
			 				echo "
			 				<td style='border:1px solid #eee;'>".$item["num_reporte"]."</td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>";
			 			}else if ($item["mes"] == "febrerocr") {
			 				echo "
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'>".$item["num_reporte"]."</td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>";
			 			}else if ($item["mes"] == "marzocr") {
			 				echo "
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'>".$item["num_reporte"]."</td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>";

			 			}else if ($item["mes"] == "abrilcr") {
			 				echo "
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'>".$item["num_reporte"]."</td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>";

			 			}else if ($item["mes"] == "mayocr") {
			 				echo "
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'>".$item["num_reporte"]."</td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>";

			 			}else if ($item["mes"] == "juniocr") {
			 				echo "
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'>".$item["num_reporte"]."</td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>";

			 			}else if ($item["mes"] == "juliocr") {
			 				echo "
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'>".$item["num_reporte"]."</td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>";

			 			}else if ($item["mes"] == "agostocr") {
			 				echo "
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'>".$item["num_reporte"]."</td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>";

			 			}else if ($item["mes"] == "septiembrecr") {
			 				echo "
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'>".$item["num_reporte"]."</td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>";

			 			}else if ($item["mes"] == "octubrecr") {
			 				echo "
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'>".$item["num_reporte"]."</td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>";

			 			}else if ($item["mes"] == "noviembrecr") {
			 				echo "
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'>".$item["num_reporte"]."</td>
			 				<td style='border:1px solid #eee;'></td>";

			 			}else if ($item["mes"] == "diciembrecr") {
			 				echo "
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'>".$item["num_reporte"]."</td>";

			 			}
			 			
			 			echo"
		 				</tr>";
					}

								
			echo "</table>";


			
		}

	}





/*=============================================
	DESCARGAR EXCEL 2021
	=============================================*/ 
 
	static public function ctrDescargarReporteCronograma2021(){
 
		if(isset($_GET["reporte14"]) && $_GET["session"] == ""){
 
			$tabla50 = "cronograma";

			$item50 = null;

			$valor50 = "2021"; 

			$select50 = "tiempo";

			$mantenimiento = ModeloCronograma::mdlMostrarCronograma($tabla50,$item50,$valor50,$select50);

			$tabla = "reportes";
			$item = null;
			$valor = "2021";
			$orden = null;
			$perfil = "tiempo";

			$cronograma = ModeloMantenimiento::mdlMostrarMantenimiento($tabla, $item, $valor, $orden,$perfil);


			/*=============================================
			CREAMOS EL ARCHIVO DE EXCEL
			=============================================*/

			$Name = $_GET["reporte14"].'.xls';

			header('Expires: 0');
			header('Cache-control: private');
			header("Content-type: application/vnd.ms-excel"); // Archivo de Excel
			header("Cache-Control: cache, must-revalidate"); 
			header('Content-Description: File Transfer');
			header('Last-Modified: '.date('D, d M Y H:i:s'));
			header("Pragma: public"); 
			header('Content-Disposition:; filename="'.$Name.'"');
			header("Content-Transfer-Encoding: binary");

			echo utf8_decode("<table border='0'> 
					<tr> 
					<td style='font-weight:bold; border:1px solid #eee; font-size:18px;'>AÑO  2021</td> 						
					</tr>");

			echo utf8_decode("<tr>
                        
                        <td style='border:1px solid #eee; font-size:18px;'></td>");
			echo"
		 				</tr>";

			echo utf8_decode("<table border='0'> 
					<tr> 
					<td style='font-weight:bold; border:1px solid #eee;'>CLIENTE</td> 
					<td style='font-weight:bold; border:1px solid #eee;'>CÓDIGO</td>
					<td style='font-weight:bold; border:1px solid #eee;'>EQUIPO</td>
					<td style='font-weight:bold; border:1px solid #eee;'>MARCA</td>
					<td style='font-weight:bold; border:1px solid #eee;'>MODELO</td>
					<td style='font-weight:bold; border:1px solid #eee;'>SERIE</td>			
					<td style='font-weight:bold; border:1px solid #eee;'>ENERO</td>						
					<td style='font-weight:bold; border:1px solid #eee;'>FEBRERO</td>
					<td style='font-weight:bold; border:1px solid #eee;'>MARZO</td>
					<td style='font-weight:bold; border:1px solid #eee;'>ABRIL</td>
					<td style='font-weight:bold; border:1px solid #eee;'>MAYO</td>
					<td style='font-weight:bold; border:1px solid #eee;'>JUNIO</td>
					<td style='font-weight:bold; border:1px solid #eee;'>JULIO</td>
					<td style='font-weight:bold; border:1px solid #eee;'>AGOSTO</td>
					<td style='font-weight:bold; border:1px solid #eee;'>SEPTIEMBRE</td>
					<td style='font-weight:bold; border:1px solid #eee;'>OCTUBRE</td>
					<td style='font-weight:bold; border:1px solid #eee;'>NOVIEMBRE</td>
					<td style='font-weight:bold; border:1px solid #eee;'>DICIEMBRE</td>							
					</tr>");


			foreach ($mantenimiento as $key => $item25) {

				$perfil = null;

				$cliente = ControladorUsuarios::ctrMostrarUsuarios("id", $item25["cliente"],$perfil);
				
				// $tabla1 = "cronograma";

				// $item1 = "codigo2";

				// $valor1 = $item["codigo"];

				// $select = null;


				// $cronogramaCodigo = ModeloCronograma::mdlMostrarCronograma($tabla1, $item1, $valor1,$select);
				echo utf8_decode("<tr>
                        
			 			<td style='border:1px solid #eee;'>".$cliente["nombre"]."</td>
			 			<td style='border:1px solid #eee;'>".$item25["codigo2"]."</td>
			 			<td style='border:1px solid #eee;'>".$item25["equipo"]."</td>
			 			<td style='border:1px solid #eee;'>".$item25["marca"]."</td> 
			 			<td style='border:1px solid #eee;'>".$item25["modelo"]."</td>
			 			<td style='border:1px solid #eee;'>".$item25["serie1"]."</td>");

			 			if ($item25["enero"] == "enero") {
			 				echo "
			 				<td style='border:1px solid #eee;'>Programado</td>";
			 			}else {
			 				echo "
			 				<td style='border:1px solid #eee;'></td>";

			 			}
			 			if ($item25["febrero"] == "febrero") {
			 				echo "
			 				<td style='border:1px solid #eee;'>Programado</td>";
			 			}else {
			 				echo "
			 				<td style='border:1px solid #eee;'></td>";

			 			}
			 			if ($item25["marzo"] == "marzo") {
			 				echo "
			 				<td style='border:1px solid #eee;'>Programado</td>";
			 			}else {
			 				echo "
			 				<td style='border:1px solid #eee;'></td>";

			 			}
			 			if ($item25["abril"] == "abril") {
			 				echo "
			 				<td style='border:1px solid #eee;'>Programado</td>";
			 			}else {
			 				echo "
			 				<td style='border:1px solid #eee;'></td>";

			 			}
			 			if ($item25["mayo"] == "mayo") {
			 				echo "
			 				<td style='border:1px solid #eee;'>Programado</td>";
			 			}else {
			 				echo "
			 				<td style='border:1px solid #eee;'></td>";

			 			}
			 			if ($item25["junio"] == "junio") {
			 				echo "
			 				<td style='border:1px solid #eee;'>Programado</td>";
			 			}else {
			 				echo "
			 				<td style='border:1px solid #eee;'></td>";

			 			}
			 			if ($item25["julio"] == "julio") {
			 				echo "
			 				<td style='border:1px solid #eee;'>Programado</td>";
			 			}else {
			 				echo "
			 				<td style='border:1px solid #eee;'></td>";

			 			}
			 			if ($item25["agosto"] == "agosto") {
			 				echo "
			 				<td style='border:1px solid #eee;'>Programado</td>";
			 			}else {
			 				echo "
			 				<td style='border:1px solid #eee;'></td>";

			 			}
			 			if ($item25["septiembre"] == "septiembre") {
			 				echo "
			 				<td style='border:1px solid #eee;'>Programado</td>";
			 			}else {
			 				echo "
			 				<td style='border:1px solid #eee;'></td>";

			 			}
			 			if ($item25["octubre"] == "octubre") {
			 				echo "
			 				<td style='border:1px solid #eee;'>Programado</td>";
			 			}else {
			 				echo "
			 				<td style='border:1px solid #eee;'></td>";

			 			}
			 			if ($item25["noviembre"] == "noviembre") {
			 				echo "
			 				<td style='border:1px solid #eee;'>Programado</td>";
			 			}else {
			 				echo "
			 				<td style='border:1px solid #eee;'></td>";

			 			}
			 			if ($item25["diciembre"] == "diciembre") {
			 				echo "
			 				<td style='border:1px solid #eee;'>Programado</td>";
			 			}else {
			 				echo "
			 				<td style='border:1px solid #eee;'></td>";

			 			}
			 			
			 			echo"
		 				</tr>";
			}

			foreach ($cronograma as $row => $item){

				$perfil = null;

				$cliente = ControladorUsuarios::ctrMostrarUsuarios("id", $item["id_clinica"],$perfil);
				
				$tabla1 = "cronograma";

				$item1 = "codigo2";

				$valor1 = $item["codigo"];

				$select = null;


				$cronogramaCodigo = ModeloCronograma::mdlMostrarCronograma($tabla1, $item1, $valor1,$select);

				//$item2 = null;
                //$valor = $item["serie1"];
                //$orden = null;
                //$perfil2 = "serie";
                //$reportessi = ControladorMantenimiento::ctrMostrarModelos($item2, $valor,$orden,$perfil2);


                

			 echo utf8_decode("<tr>
                        
			 			<td style='border:1px solid #eee;'>".$cliente["nombre"]."</td>
			 			<td style='border:1px solid #eee;'>".$item["codigo"]."</td>
			 			<td style='border:1px solid #eee;'>".$item["equipo_re"]."</td>
			 			<td style='border:1px solid #eee;'>".$item["marca_re"]."</td> 
			 			<td style='border:1px solid #eee;'>".$item["modelo_re"]."</td>
			 			<td style='border:1px solid #eee;'>".$item["serie"]."</td>");

			 			if ($item["mes"] == "enerocr") {
			 				echo "
			 				<td style='border:1px solid #eee;'>".$item["num_reporte"]."</td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>";
			 			}else if ($item["mes"] == "febrerocr") {
			 				echo "
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'>".$item["num_reporte"]."</td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>";
			 			}else if ($item["mes"] == "marzocr") {
			 				echo "
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'>".$item["num_reporte"]."</td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>";

			 			}else if ($item["mes"] == "abrilcr") {
			 				echo "
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'>".$item["num_reporte"]."</td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>";

			 			}else if ($item["mes"] == "mayocr") {
			 				echo "
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'>".$item["num_reporte"]."</td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>";

			 			}else if ($item["mes"] == "juniocr") {
			 				echo "
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'>".$item["num_reporte"]."</td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>";

			 			}else if ($item["mes"] == "juliocr") {
			 				echo "
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'>".$item["num_reporte"]."</td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>";

			 			}else if ($item["mes"] == "agostocr") {
			 				echo "
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'>".$item["num_reporte"]."</td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>";

			 			}else if ($item["mes"] == "septiembrecr") {
			 				echo "
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'>".$item["num_reporte"]."</td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>";

			 			}else if ($item["mes"] == "octubrecr") {
			 				echo "
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'>".$item["num_reporte"]."</td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>";

			 			}else if ($item["mes"] == "noviembrecr") {
			 				echo "
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'>".$item["num_reporte"]."</td>
			 				<td style='border:1px solid #eee;'></td>";

			 			}else if ($item["mes"] == "diciembrecr") {
			 				echo "
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'>".$item["num_reporte"]."</td>";

			 			}
			 			echo"
		 				</tr>";


			}


			echo "</table>";

		}else if(isset($_GET["reporte14"]) && $_GET["session"] != ""){


			$tabla50 = "cronograma";

			$item50 = null;

			$valor50 =  $_GET["session"]; 

			$select50 = "cliente";
			
			$select51 = "tiempo";

			$valor51 =  "2021";

			$mantenimiento = ModeloCronograma::mdlMostrarCronogramaExcelUsuarios($tabla50,$item50,$valor50,$select50,$select51,$valor51);
			
            $tabla = "reportes";
			$item = null;
			$valor = $_GET["session"]; 
			$orden = null;
			$perfil = "id_clinica";
			$perfil52 = "tiempo";
			$valor52 =  "2021";
			
			$cronograma = ModeloMantenimiento::mdlMostrarMantenimientoExcelUsuarios($tabla, $item, $valor, $orden,$perfil,$perfil52,$valor52);

			/*=============================================
			CREAMOS EL ARCHIVO DE EXCEL
			=============================================*/
			
			$Name = $_GET["reporte14"].'.xls';

			header('Expires: 0');
			header('Cache-control: private');
			header("Content-type: application/vnd.ms-excel"); // Archivo de Excel
			header("Cache-Control: cache, must-revalidate"); 
			header('Content-Description: File Transfer');
			header('Last-Modified: '.date('D, d M Y H:i:s'));
			header("Pragma: public"); 
			header('Content-Disposition:; filename="'.$Name.'"');
			header("Content-Transfer-Encoding: binary");

			echo utf8_decode("<table border='0'> 
					<tr> 
					<td style='font-weight:bold; border:1px solid #eee; font-size:18px;'>AÑO  2021</td> 						
					</tr>");

			echo utf8_decode("<tr>
                        
                        <td style='border:1px solid #eee; font-size:18px;'></td>");
			echo"
		 				</tr>";

			echo utf8_decode("<table border='0'> 
			
			<tr> 
					<td style='font-weight:bold; border:1px solid #eee;'>CÓDIGO</td>
					<td style='font-weight:bold; border:1px solid #eee;'>EQUIPO</td>
					<td style='font-weight:bold; border:1px solid #eee;'>MARCA</td>
					<td style='font-weight:bold; border:1px solid #eee;'>MODELO</td>
					<td style='font-weight:bold; border:1px solid #eee;'>SERIE</td>			
					<td style='font-weight:bold; border:1px solid #eee;'>ENERO</td>						
					<td style='font-weight:bold; border:1px solid #eee;'>FEBRERO</td>
					<td style='font-weight:bold; border:1px solid #eee;'>MARZO</td>
					<td style='font-weight:bold; border:1px solid #eee;'>ABRIL</td>
					<td style='font-weight:bold; border:1px solid #eee;'>MAYO</td>
					<td style='font-weight:bold; border:1px solid #eee;'>JUNIO</td>
					<td style='font-weight:bold; border:1px solid #eee;'>JULIO</td>
					<td style='font-weight:bold; border:1px solid #eee;'>AGOSTO</td>
					<td style='font-weight:bold; border:1px solid #eee;'>SEPTIEMBRE</td>
					<td style='font-weight:bold; border:1px solid #eee;'>OCTUBRE</td>
					<td style='font-weight:bold; border:1px solid #eee;'>NOVIEMBRE</td>
					<td style='font-weight:bold; border:1px solid #eee;'>DICIEMBRE</td>

					</tr>");

					foreach ($mantenimiento as $key => $item25) {

				$perfil = null;

				$cliente = ControladorUsuarios::ctrMostrarUsuarios("id", $item25["cliente"],$perfil);
				
				echo utf8_decode("<tr>
    
			 			<td style='border:1px solid #eee;'>".$item25["codigo2"]."</td>
			 			<td style='border:1px solid #eee;'>".$item25["equipo"]."</td>
			 			<td style='border:1px solid #eee;'>".$item25["marca"]."</td> 
			 			<td style='border:1px solid #eee;'>".$item25["modelo"]."</td>
			 			<td style='border:1px solid #eee;'>".$item25["serie1"]."</td>");

			 			if ($item25["enero"] == "enero") {
			 				echo "
			 				<td style='border:1px solid #eee;'>Programado</td>";
			 			}else {
			 				echo "
			 				<td style='border:1px solid #eee;'></td>";

			 			}
			 			if ($item25["febrero"] == "febrero") {
			 				echo "
			 				<td style='border:1px solid #eee;'>Programado</td>";
			 			}else {
			 				echo "
			 				<td style='border:1px solid #eee;'></td>";

			 			}
			 			if ($item25["marzo"] == "marzo") {
			 				echo "
			 				<td style='border:1px solid #eee;'>Programado</td>";
			 			}else {
			 				echo "
			 				<td style='border:1px solid #eee;'></td>";

			 			}
			 			if ($item25["abril"] == "abril") {
			 				echo "
			 				<td style='border:1px solid #eee;'>Programado</td>";
			 			}else {
			 				echo "
			 				<td style='border:1px solid #eee;'></td>";

			 			}
			 			if ($item25["mayo"] == "mayo") {
			 				echo "
			 				<td style='border:1px solid #eee;'>Programado</td>";
			 			}else {
			 				echo "
			 				<td style='border:1px solid #eee;'></td>";

			 			}
			 			if ($item25["junio"] == "junio") {
			 				echo "
			 				<td style='border:1px solid #eee;'>Programado</td>";
			 			}else {
			 				echo "
			 				<td style='border:1px solid #eee;'></td>";

			 			}
			 			if ($item25["julio"] == "julio") {
			 				echo "
			 				<td style='border:1px solid #eee;'>Programado</td>";
			 			}else {
			 				echo "
			 				<td style='border:1px solid #eee;'></td>";

			 			}
			 			if ($item25["agosto"] == "agosto") {
			 				echo "
			 				<td style='border:1px solid #eee;'>Programado</td>";
			 			}else {
			 				echo "
			 				<td style='border:1px solid #eee;'></td>";

			 			}
			 			if ($item25["septiembre"] == "septiembre") {
			 				echo "
			 				<td style='border:1px solid #eee;'>Programado</td>";
			 			}else {
			 				echo "
			 				<td style='border:1px solid #eee;'></td>";

			 			}
			 			if ($item25["octubre"] == "octubre") {
			 				echo "
			 				<td style='border:1px solid #eee;'>Programado</td>";
			 			}else {
			 				echo "
			 				<td style='border:1px solid #eee;'></td>";

			 			}
			 			if ($item25["noviembre"] == "noviembre") {
			 				echo "
			 				<td style='border:1px solid #eee;'>Programado</td>";
			 			}else {
			 				echo "
			 				<td style='border:1px solid #eee;'></td>";

			 			}
			 			if ($item25["diciembre"] == "diciembre") {
			 				echo "
			 				<td style='border:1px solid #eee;'>Programado</td>";
			 			}else {
			 				echo "
			 				<td style='border:1px solid #eee;'></td>";

			 			}
			 			
			 			echo"
		 				</tr>";
			}
					
					foreach ($cronograma as $row => $item){
					    
					    $perfil = null;

				        $cliente = ControladorUsuarios::ctrMostrarUsuarios("id", $item["id_clinica"],$perfil);
				        
				        $tabla1 = "cronograma";

						$item1 = "codigo2";

						$valor1 = $item["codigo"];

						$select = null;


						$cronogramaCodigo = ModeloCronograma::mdlMostrarCronograma($tabla1, $item1, $valor1,$select);
				        
				        echo utf8_decode("<tr>

			 			<td style='border:1px solid #eee;'>".$item["codigo"]."</td>
			 			<td style='border:1px solid #eee;'>".$item["equipo_re"]."</td>
			 			<td style='border:1px solid #eee;'>".$item["marca_re"]."</td> 
			 			<td style='border:1px solid #eee;'>".$item["modelo_re"]."</td>
			 			<td style='border:1px solid #eee;'>".$item["serie"]."</td>");
			 			
			 			
			 			if ($item["mes"] == "enerocr") {
			 				echo "
			 				<td style='border:1px solid #eee;'>".$item["num_reporte"]."</td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>";
			 			}else if ($item["mes"] == "febrerocr") {
			 				echo "
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'>".$item["num_reporte"]."</td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>";
			 			}else if ($item["mes"] == "marzocr") {
			 				echo "
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'>".$item["num_reporte"]."</td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>";

			 			}else if ($item["mes"] == "abrilcr") {
			 				echo "
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'>".$item["num_reporte"]."</td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>";

			 			}else if ($item["mes"] == "mayocr") {
			 				echo "
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'>".$item["num_reporte"]."</td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>";

			 			}else if ($item["mes"] == "juniocr") {
			 				echo "
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'>".$item["num_reporte"]."</td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>";

			 			}else if ($item["mes"] == "juliocr") {
			 				echo "
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'>".$item["num_reporte"]."</td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>";

			 			}else if ($item["mes"] == "agostocr") {
			 				echo "
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'>".$item["num_reporte"]."</td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>";

			 			}else if ($item["mes"] == "septiembrecr") {
			 				echo "
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'>".$item["num_reporte"]."</td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>";

			 			}else if ($item["mes"] == "octubrecr") {
			 				echo "
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'>".$item["num_reporte"]."</td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>";

			 			}else if ($item["mes"] == "noviembrecr") {
			 				echo "
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'>".$item["num_reporte"]."</td>
			 				<td style='border:1px solid #eee;'></td>";

			 			}else if ($item["mes"] == "diciembrecr") {
			 				echo "
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'></td>
			 				<td style='border:1px solid #eee;'>".$item["num_reporte"]."</td>";

			 			}
			 			
			 			echo"
		 				</tr>";
					}

								
			echo "</table>";


			
		}

	}





}