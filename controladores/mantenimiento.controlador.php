<?php
include('./extensiones/firma/firmaimg/signature-to-image.php');




//Termina aca

class ControladorMantenimiento  
{  
 
	//Insertar Mantenimiento

	static public function ctrCrearMantenimiento(){

		$formatos = "";

		if(isset($_POST["nuevoClienteM"])){

			//Cuando la serie viene con algo(si) se registra en reportes 2

			 	
		if ($_POST["nuevoTipoMantenimiento"] == "Preventivo" || $_POST["nuevoTipoMantenimiento"] == "Correctivo" || $_POST["nuevoTipoMantenimiento"] == "Instalacion" || $_POST["nuevoTipoMantenimiento"] == "Evaluacion") 
				{



				// 	$ruta = "";

				// if(isset($_POST['output'])){

				// 	$directorio = "vistas/img/firmas/".$_POST["nuevoNumReporte"];

				// 	mkdir($directorio, 0755);

				// 	$json = $_POST['output'];
				// 	$img = sigJsonToImage($json);


				// 	$filename = mt_rand(100,999);
				// 	$ruta = "vistas/img/firmas/".$_POST["nuevoNumReporte"]."/".$filename.".png";
					
				// 	// Save to file
				// 	imagepng($img, $ruta);
				
				// 	imagedestroy($img);

				// }

				
			
				/*=============================================
				VALIDAR FIRMA DE QUIEN REALIZA EL MANTENIMIENTO
				=============================================*/

				$firma = $_POST["cargarFirmaNueva"];

				if(isset($_FILES["nuevaFirmaRealizada"]["tmp_name"])){

					list($ancho, $alto) = getimagesize($_FILES["nuevaFirmaRealizada"]["tmp_name"]);

					$nuevoAncho = 500;
					$nuevoAlto = 500;

					// $aleatorio = mt_rand(100,9999);

					/*=============================================
					CREAMOS EL DIRECTORIO DONDE VAMOS A GUARDAR LA FIRMA
					=============================================*/

					$directorio = "vistas/img/firmasIngeniero/".$_POST["nuevoNumReporte"];

					mkdir($directorio, 0755);

					/*=============================================
					DE ACUERDO AL TIPO DE IMAGEN APLICAMOS LAS FUNCIONES POR DEFECTO DE PHP
					=============================================*/ 

					if($_FILES["nuevaFirmaRealizada"]["type"] == "image/jpeg"){

						/*=============================================
						GUARDAMOS LA IMAGEN EN EL DIRECTORIO
						=============================================*/

						$aleatorio = mt_rand(100,9999);

						$firma = "vistas/img/firmasIngeniero/".$_POST["nuevoNumReporte"]."/".$aleatorio.".jpg";

						$origen = imagecreatefromjpeg($_FILES["nuevaFirmaRealizada"]["tmp_name"]);						

						$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

						imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

						imagejpeg($destino, $firma);

					}

					if($_FILES["nuevaFirmaRealizada"]["type"] == "image/png"){

						/*=============================================
						GUARDAMOS LA IMAGEN EN EL DIRECTORIO
						=============================================*/

						$aleatorio = mt_rand(100,9999);

						$firma = "vistas/img/firmasIngeniero/".$_POST["nuevoNumReporte"]."/".$aleatorio.".png";

						$origen = imagecreatefrompng($_FILES["nuevaFirmaRealizada"]["tmp_name"]);						
 
						$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

						imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

						imagepng($destino, $firma);

					}

				} 

				$tabla1 = "cronograma";

				$item2 = "serie1";		
								
				$valor2 = $_POST["nuevoSerie"];

				$item3 = "tiempo";		
								
				$valor3 = $_POST["nuevoperiodo"];

				if ($_POST["nuevoMes"] == "enerocr") {

					$item4 = "enero";
					$valor4 = $_POST["nuevoMes"];
				}else if ($_POST["nuevoMes"] == "febrerocr") {
					$item4 = "febrero";
					$valor4 = $_POST["nuevoMes"];
				}
				else if ($_POST["nuevoMes"] == "marzocr") {
					$item4 = "marzo";
					$valor4 = $_POST["nuevoMes"];
				}
				else if ($_POST["nuevoMes"] == "abrilcr") {
					$item4 = "abril";
					$valor4 = $_POST["nuevoMes"];
				}
				else if ($_POST["nuevoMes"] == "mayocr") {
					$item4 = "mayo";
					$valor4 = $_POST["nuevoMes"];
				}
				else if ($_POST["nuevoMes"] == "juniocr") {
					$item4 = "junio";
					$valor4 = $_POST["nuevoMes"];
				}
				else if ($_POST["nuevoMes"] == "juliocr") {
					$item4 = "julio";
					$valor4 = $_POST["nuevoMes"];
				}
				else if ($_POST["nuevoMes"] == "agostocr") {
					$item4 = "agosto";
					$valor4 = $_POST["nuevoMes"];
				}
				else if ($_POST["nuevoMes"] == "septiembrecr") {
					$item4 = "septiembre";
					$valor4 = $_POST["nuevoMes"];
				}
				else if ($_POST["nuevoMes"] == "octubrecr") {
					$item4 = "octubre";
					$valor4 = $_POST["nuevoMes"];
				}
				else if ($_POST["nuevoMes"] == "noviembrecr") {
					$item4 = "noviembre";
					$valor4 = $_POST["nuevoMes"];
				}
				else if ($_POST["nuevoMes"] == "diciembrecr") {
					$item4 = "noviembre";
					$valor4 = $_POST["diciembre"];
				}


				// $item3 = "tiempo";		
								
				// $valor3 = $_POST["nuevoperiodo"];

				$respuesta25 = ModeloCronograma::mdlActualizarReporteCronogramaPeriodo($tabla1, $item2, $valor2,$item3, $valor3,$item4, $valor4);

							$formatos = implode(' - ', $_POST["trabajo"]);

							$formatos2 = implode(' - ', $_POST["nuevoInstrumentos"]);

							$mediciones = array("principalana"=>$_POST["tensiometroAnalogo"],
												"tenPatron1"=>$_POST["tenPatron1"],
												"tenPatron2"=>$_POST["tenPatron2"],
												"tenPatron3"=>$_POST["tenPatron3"],
												"tenPatron4"=>$_POST["tenPatron4"],
												"tenPatron5"=>$_POST["tenPatron5"],
												"principaldigi"=>$_POST["tensiometroDigital"],
												"tenSistolica1"=>$_POST["tenSistolica1"],
												"tenDiastolica1"=>$_POST["tenDiastolica1"],
												"tenSistolica2"=>$_POST["tenSistolica2"],
												"tenDiastolica2"=>$_POST["tenDiastolica2"],
												"tenSistolica3"=>$_POST["tenSistolica3"],
												"tenDiastolica3"=>$_POST["tenDiastolica3"],
												"tenSistolica4"=>$_POST["tenSistolica4"],
												"tenDiastolica4"=>$_POST["tenDiastolica4"],
												"principalvacu"=>$_POST["succionadorVacuometro"],
												"mmHg"=>$_POST["mmHg"],
												"inHg"=>$_POST["inHg"],
												"Mpa"=>$_POST["Mpa"],
												"nueva"=>$_POST["nueva"],
												"succvacuPatronUnNew1"=>$_POST["succvacuPatronUnNew1"],
												"succvacuPatronUnNew2"=>$_POST["succvacuPatronUnNew2"],
												"succvacuPatronUnNew3"=>$_POST["succvacuPatronUnNew3"],
												"succvacuPatronUnNew4"=>$_POST["succvacuPatronUnNew4"],
												"succvacuEquipo1"=>$_POST["succvacuEquipo1"],
												"succvacuPatron1"=>$_POST["succvacuPatron1"],
												"succvacuEquipo2"=>$_POST["succvacuEquipo2"],
												"succvacuPatron2"=>$_POST["succvacuPatron2"],
												"succvacuEquipo3"=>$_POST["succvacuEquipo3"],
												"succvacuPatron3"=>$_POST["succvacuPatron3"],
												"succvacuEquipo4"=>$_POST["succvacuEquipo4"],
												"succvacuPatron4"=>$_POST["succvacuPatron4"],
												"principalmon"=>$_POST["monitorMultiparametros"],
												"neonatalmonitor"=>$_POST["neonatalmonitor"],
												"pediatricomonitor"=>$_POST["pediatricomonitor"],
												"adultomonitor"=>$_POST["adultomonitor"],
												"monitMultEquipo1"=>$_POST["monitMultEquipo1"],
												"monitMultEquipo6"=>$_POST["monitMultEquipo6"],
												"monitMultEquipo2"=>$_POST["monitMultEquipo2"],
												"monitMultEquipo7"=>$_POST["monitMultEquipo7"],
												"monitMultSistolica1"=>$_POST["monitMultSistolica1"],
												"monitMultDiastolica1"=>$_POST["monitMultDiastolica1"],
												"monitMultEquipo3"=>$_POST["monitMultEquipo3"],
												"monitMultEquipo8"=>$_POST["monitMultEquipo8"],
												"monitMultSistolica2"=>$_POST["monitMultSistolica2"],
												"monitMultDiastolica2"=>$_POST["monitMultDiastolica2"],
												"monitMultEquipo4"=>$_POST["monitMultEquipo4"],
												"monitMultEquipo9"=>$_POST["monitMultEquipo9"],
												"monitMultSistolica3"=>$_POST["monitMultSistolica3"],
												"monitMultDiastolica3"=>$_POST["monitMultDiastolica3"],
												"monitMultEquipo5"=>$_POST["monitMultEquipo5"],
												"monitMultEquipo10"=>$_POST["monitMultEquipo10"],
												"monitMultSistolica4"=>$_POST["monitMultSistolica4"],
												"monitMultDiastolica4"=>$_POST["monitMultDiastolica4"],
												"principallam"=>$_POST["lamparaFotocurado"],
												"lamparaFotoPatron1"=>$_POST["lamparaFotoPatron1"],
												"lamparaFotoPatron2"=>$_POST["lamparaFotoPatron2"],
												"lamparaFotoPatron3"=>$_POST["lamparaFotoPatron3"],
												"lamparaFotoPatron4"=>$_POST["lamparaFotoPatron4"],
												"principalauto"=>$_POST["autoclave"],
												"unidadAutoclave"=>$_POST["unidadAutoclave"],
												"gradosAutoclave"=>$_POST["gradosAutoclave"],
												"unidad2Autoclave"=>$_POST["unidad2Autoclave"],
												"unidad22Autoclave"=>$_POST["unidad22Autoclave"],
												"gradosAutoclave22"=>$_POST["gradosAutoclave22"],
												"unidad222Autoclave"=>$_POST["unidad222Autoclave"],
												"autoclaveEquipo1"=>$_POST["autoclaveEquipo1"],
												"autoclavePatron1"=>$_POST["autoclavePatron1"],
												"autoclaveEquipo3"=>$_POST["autoclaveEquipo3"],
												"autoclavePatron3"=>$_POST["autoclavePatron3"],
												"autoclaveEquipo5"=>$_POST["autoclaveEquipo5"],
												"autoclavePatron5"=>$_POST["autoclavePatron5"],
												"autoclaveEquipo2"=>$_POST["autoclaveEquipo2"],
												"autoclavePatron2"=>$_POST["autoclavePatron2"],
												"autoclaveEquipo4"=>$_POST["autoclaveEquipo4"],
												"autoclavePatron4"=>$_POST["autoclavePatron4"],
												"autoclaveEquipo6"=>$_POST["autoclaveEquipo6"],
												"autoclavePatron6"=>$_POST["autoclavePatron6"],
												"principalbomba"=>$_POST["bombaInfusion"],
												"bombaInfuPatron1"=>$_POST["bombaInfuPatron1"],
												"bombaInfuPatron3"=>$_POST["bombaInfuPatron3"],
												"bombaInfuPatron2"=>$_POST["bombaInfuPatron2"],
												"bombaInfuPatron4"=>$_POST["bombaInfuPatron4"],
												"principalcen"=>$_POST["centrifuga"],
												"centrifugaEquipo1"=>$_POST["centrifugaEquipo1"],
												"centrifugaPatron1"=>$_POST["centrifugaPatron1"],
												"centrifugaEquipo2"=>$_POST["centrifugaEquipo2"],
												"centrifugaPatron2"=>$_POST["centrifugaPatron2"],
												"centrifugaEquipo3"=>$_POST["centrifugaEquipo3"],
												"centrifugaPatron3"=>$_POST["centrifugaPatron3"],
												"principalaudio"=>$_POST["audiometro"],
												"audiometroEquipo1"=>$_POST["audiometroEquipo1"],
												"audiometroAurIz1"=>$_POST["audiometroAurIz1"],
												"audiometroAurDer1"=>$_POST["audiometroAurDer1"],
												"audiometroEquipo3"=>$_POST["audiometroEquipo3"],
												"audiometroAurIz3"=>$_POST["audiometroAurIz3"],
												"audiometroAurDer3"=>$_POST["audiometroAurDer3"],
												"audiometroEquipo2"=>$_POST["audiometroEquipo2"],
												"audiometroAurIz2"=>$_POST["audiometroAurIz2"],
												"audiometroAurDer2"=>$_POST["audiometroAurDer2"],
												"audiometroEquipo24"=>$_POST["audiometroEquipo24"], 
												"audiometroAurIz24"=>$_POST["audiometroAurIz24"],
												"audiometroAurDer24"=>$_POST["audiometroAurDer24"],
												"audiometroEquipo8"=>$_POST["audiometroEquipo8"],
												"audiometroAurIz8"=>$_POST["audiometroAurIz8"],
												"audiometroAurDer8"=>$_POST["audiometroAurDer8"],
												"audiometroEquipo5"=>$_POST["audiometroEquipo5"],
												"audiometroEquipo25"=>$_POST["audiometroEquipo25"],
												"audiometroAurIz25"=>$_POST["audiometroAurIz25"],
												"audiometroEquipo4"=>$_POST["audiometroEquipo4"],
												"audiometroAurIz4"=>$_POST["audiometroAurIz4"],
												"audiometroAurDer4"=>$_POST["audiometroAurDer4"],
												"audiometroEquipo6"=>$_POST["audiometroEquipo6"],
												"audiometroAurIz6"=>$_POST["audiometroAurIz6"],
												"audiometroAurDer6"=>$_POST["audiometroAurDer6"],
												"audiometroAurIz5"=>$_POST["audiometroAurIz5"],
												"audiometroAurDer5"=>$_POST["audiometroAurDer5"],
												"audiometroAurDer25"=>$_POST["audiometroAurDer25"],
												"audiometroEquipo7"=>$_POST["audiometroEquipo7"],
												"audiometroAurIz7"=>$_POST["audiometroAurIz7"],
												"audiometroAurDer7"=>$_POST["audiometroAurDer7"],
												"principalbasculas"=>$_POST["basculas"],
												"g"=>$_POST["g"],
												"kg"=>$_POST["kg"],
												"basculasPatron1"=>$_POST["basculasPatron1"],
												"basculasEquipo1"=>$_POST["basculasEquipo1"],
												"basculasPatron2"=>$_POST["basculasPatron2"],
												"basculasEquipo2"=>$_POST["basculasEquipo2"],
												"basculasPatron3"=>$_POST["basculasPatron3"],
												"basculasEquipo3"=>$_POST["basculasEquipo3"],
												"basculasPatron4"=>$_POST["basculasPatron4"],
												"basculasEquipo4"=>$_POST["basculasEquipo4"],
												"basculasPatron5"=>$_POST["basculasPatron5"],
												"basculasEquipo5"=>$_POST["basculasEquipo5"],
												"principalaudiometria"=>$_POST["audiometria"],
												"audiometriaAtenuacion1"=>$_POST["audiometriaAtenuacion1"],
												"principaloxigeno"=>$_POST["concentradorOxigeno"],
												"concentradorOxEquipo1"=>$_POST["concentradorOxEquipo1"],
												"concentradorOxPatron1"=>$_POST["concentradorOxPatron1"],
												"concentradorOxEquipo4"=>$_POST["concentradorOxEquipo4"],
												"concentradorOxPatron4"=>$_POST["concentradorOxPatron4"],
												"concentradorOxEquipo2"=>$_POST["concentradorOxEquipo2"],
												"concentradorOxPatron2"=>$_POST["concentradorOxPatron2"],
												"concentradorOxEquipo5"=>$_POST["concentradorOxEquipo5"],
												"concentradorOxPatron5"=>$_POST["concentradorOxPatron5"],
												"concentradorOxEquipo3"=>$_POST["concentradorOxEquipo3"],
												"concentradorOxPatron3"=>$_POST["concentradorOxPatron3"],
												"concentradorOxEquipo6"=>$_POST["concentradorOxEquipo6"],
												"concentradorOxPatron6"=>$_POST["concentradorOxPatron6"],
												"principaldesfibrilador"=>$_POST["desfibrilador"],
												"desfibriladorEquipo1"=>$_POST["desfibriladorEquipo1"],
												"desfibriladorPatron1"=>$_POST["desfibriladorPatron1"],
												"desfibriladorEquipo2"=>$_POST["desfibriladorEquipo2"],
												"desfibriladorPatron2"=>$_POST["desfibriladorPatron2"],
												"desfibriladorEquipo3"=>$_POST["desfibriladorEquipo3"],
												"desfibriladorPatron3"=>$_POST["desfibriladorPatron3"],
												"desfibriladorEquipo4"=>$_POST["desfibriladorEquipo4"],
												"desfibriladorPatron4"=>$_POST["desfibriladorPatron4"],
												"desfibriladorEquipo5"=>$_POST["desfibriladorEquipo5"],
												"desfibriladorPatron5"=>$_POST["desfibriladorPatron5"],
												"principaldoppler"=>$_POST["doppler"],
												"dopplerEquipo1"=>$_POST["dopplerEquipo1"],
												"dopplerEquipo2"=>$_POST["dopplerEquipo2"],
												"dopplerEquipo3"=>$_POST["dopplerEquipo3"],
												"dopplerEquipo4"=>$_POST["dopplerEquipo4"],
												"dopplerEquipo5"=>$_POST["dopplerEquipo5"],
												"dopplerEquipo6"=>$_POST["dopplerEquipo6"],
												"principalholter"=>$_POST["holter"],
												"holterEquipo1"=>$_POST["holterEquipo1"],
												"holterEquipo2"=>$_POST["holterEquipo2"],
												"holterEquipo3"=>$_POST["holterEquipo3"],
												"holterEquipo4"=>$_POST["holterEquipo4"],
												"holterEquipo5"=>$_POST["holterEquipo5"],
												"principalespio"=>$_POST["espirometro"],
												"espirometroPatron1"=>$_POST["espirometroPatron1"],
												"espirometroPatron2"=>$_POST["espirometroPatron2"],
												"espirometroPatron3"=>$_POST["espirometroPatron3"],
												"principalflujo"=>$_POST["flujometro"],
												"flujometroEquipo1"=>$_POST["flujometroEquipo1"],
												"flujometroPatron1"=>$_POST["flujometroPatron1"],
												"flujometroEquipo2"=>$_POST["flujometroEquipo2"],
												"flujometroPatron2"=>$_POST["flujometroPatron2"],
												"flujometroEquipo3"=>$_POST["flujometroEquipo3"],
												"flujometroPatron3"=>$_POST["flujometroPatron3"],
												"flujometroEquipo4"=>$_POST["flujometroEquipo4"],
												"flujometroPatron4"=>$_POST["flujometroPatron4"],
												"principalincu"=>$_POST["incubadora"],
												"incubadoraEquipo1"=>$_POST["incubadoraEquipo1"],
												"incubadoraPatron1"=>$_POST["incubadoraPatron1"],
												"incubadoraEquipo2"=>$_POST["incubadoraEquipo2"],
												"incubadoraPatron2"=>$_POST["incubadoraPatron2"],
												"incubadoraEquipo3"=>$_POST["incubadoraEquipo3"],
												"incubadoraPatron3"=>$_POST["incubadoraPatron3"],
												"principalmoni"=>$_POST["monitor"],
												"monitorEquipo1"=>$_POST["monitorEquipo1"],
												"monitorSistolica1"=>$_POST["monitorSistolica1"],
												"monitorDiastolica1"=>$_POST["monitorDiastolica1"],
												"monitorEquipo2"=>$_POST["monitorEquipo2"],
												"monitorSistolica2"=>$_POST["monitorSistolica2"],
												"monitorDiastolica2"=>$_POST["monitorDiastolica2"],
												"monitorEquipo3"=>$_POST["monitorEquipo3"],
												"monitorSistolica3"=>$_POST["monitorSistolica3"],
												"monitorDiastolica3"=>$_POST["monitorDiastolica3"],
												"monitorEquipo4"=>$_POST["monitorEquipo4"],
												"monitorSistolica4"=>$_POST["monitorSistolica4"],
												"monitorDiastolica4"=>$_POST["monitorDiastolica4"],
												"monitorEquipo5"=>$_POST["monitorEquipo5"],
												"principalpipeta"=>$_POST["pipeta"],
												"apto" => $_POST["apto"],
												"noapto" => $_POST["noapto"],
												"centigrado" => $_POST["centigrado"],
												"farenheit" => $_POST["farenheit"],
												"pipetaFugas1"=>$_POST["pipetaFugas1"],
												"principalpulsiom"=>$_POST["pulsioximetro"],
												"pulsioximetroEquipo1"=>$_POST["pulsioximetroEquipo1"],
												"pulsioximetroEquipo2"=>$_POST["pulsioximetroEquipo2"],
												"pulsioximetroEquipo3"=>$_POST["pulsioximetroEquipo3"],
												"pulsioximetroEquipo4"=>$_POST["pulsioximetroEquipo4"],
												"pulsioximetroEquipo5"=>$_POST["pulsioximetroEquipo5"],
												"principalventilador"=>$_POST["ventilador"],
												"adulto"=>$_POST["adulto"],
												"pediatrico"=>$_POST["pediatrico"],
												"neonatal"=>$_POST["neonatal"],
												"ventiladorPatron1"=>$_POST["ventiladorPatron1"],
												"ventiladorPatron6"=>$_POST["ventiladorPatron6"],
												"ventiladorPatron2"=>$_POST["ventiladorPatron2"],
												"ventiladorPatron7"=>$_POST["ventiladorPatron7"],
												"ventiladorPatron3"=>$_POST["ventiladorPatron3"],
												"ventiladorPatron8"=>$_POST["ventiladorPatron8"],
												"ventiladorUnidad1"=>$_POST["ventiladorUnidad1"],
												"ventiladorPatron4"=>$_POST["ventiladorPatron4"],
												"ventiladorPatron9"=>$_POST["ventiladorPatron9"],
												"ventiladorPatron5"=>$_POST["ventiladorPatron5"],
												"Termohigrometros"=>$_POST["Termohigrometros"],
												"Termohigrometrospatron1"=>$_POST["Termohigrometrospatron1"],
												"Termohigrometrosin1"=>$_POST["Termohigrometrosin1"],
												"Termohigrometrosou1"=>$_POST["Termohigrometrosou1"],
												"Termohigrometrospatron2"=>$_POST["Termohigrometrospatron2"],
												"Termohigrometrosequipo1"=>$_POST["Termohigrometrosequipo1"],
												"Termohigrometrospatron5"=>$_POST["Termohigrometrospatron5"],
												"Termohigrometrosin2"=>$_POST["Termohigrometrosin2"],
												"Termohigrometrosou2"=>$_POST["Termohigrometrosou2"],
												"Termohigrometrospatron3"=>$_POST["Termohigrometrospatron3"],
												"Termohigrometrosequipo2"=>$_POST["Termohigrometrosequipo2"],
												"ventiladorPatron10"=>$_POST["ventiladorPatron10"]);
												



							$medicionesJSON = json_encode($mediciones);
						
							$tabla = "reportes";

							$datos = array("num_reporte" =>$_POST["nuevoNumReporte"],
										   "id_clinica" => $_POST["nuevoClienteM"],
										   "id_usuarios" => $_POST["idUsuarioNuevo"],
								           "equipo_re" => $_POST["nuevoEquipoM"],
								           "marca_re" => $_POST["nuevoMarcaM"],
								       	   "modelo_re" => $_POST["nuevoModeloM"],
								       	   "sede" => $_POST["nuevoSede"],
								           "serie" => $_POST["nuevoSerie"],
								           "serieNueva" => $_POST["nuevoSerieNuevo"],
								           "codigo" => $_POST["nuevoCodigo"],
								           "numero" => $_POST["nuevoNumero"],
								           "tipo_manteniemiento" => $_POST["nuevoTipoMantenimiento"],
								           "preventivo_problema" => $_POST["nuevoPreventivoProblemas"],
								           "preventivo" => $_POST["nuevoPreventivo"],
								           "reportado" => $_POST["nuevoReportadoPor"],
								           "cargo" => $_POST["nuevoCargo"],
								           "solicitud" => $_POST["nuevoSolicitud"],
								           "diagnostico" => $_POST["nuevoDiagnostico"],
								           "trabajo" => $formatos,
								           "instrumentos" => $formatos2,
								           "recomendaciones" => $_POST["nuevoRecomendaciones"],
								           "accesorios" => $_POST["nuevoAccesorios"],
								       	   "equipo_servicio" => $_POST["nuevoFueraServicio"], 
								           "servicio_motivo" => $_POST["nuevoAfirmativo"],
								       	   "equipo_evaluado" => $_POST["nuevoretirado"],
								           "fecha_inicio" => $_POST["fechaServicio"],
								       	   "fecha_proximo" => $_POST["fechaProximo"],
								       	   "firma" => $_POST["nuevoFirmaRealiza"],
								       	   "firmarealizaMan" => $firma,
								       	   "mediciones"=>$medicionesJSON,
								       	   "mes" => $_POST["nuevoMes"],
								       	   "tiempo" =>$_POST["nuevoTiempo"]);


							$respuesta = ModeloMantenimiento::mdlIngresarMantenimiento($tabla, $datos);

							//var_dump($respuesta);
			
							if($respuesta == "ok"){
			
								echo '<script>
			
								swal({
			
									type: "success",
									title: "¡El mantenimiento ha sido guardado correctamente!",
									showConfirmButton: true,
									confirmButtonText: "Cerrar"
			
								}).then(function(result){
			
									if(result.value){
									
										window.location = "mantenimiento";
			
									}
			
								});
							
			
								</script>';
			
			
							}

					
		

				}	
    	
    					
    				
		}
	}



	//Editar Mantenimiento no

	static public function ctrEditarMantenimiento(){

		$formatosEditar = "";

		if(isset($_POST["idMantenimiento"])){

			/*=============================================
				VALIDAR FIRMA DE QUIEN REALIZA EL MANTENIMIENTO
				=============================================*/

				$firma = "";

				if(isset($_FILES["editarFirmaRealizada"]["tmp_name"])){

					list($ancho, $alto) = getimagesize($_FILES["editarFirmaRealizada"]["tmp_name"]);

					$nuevoAncho = 500;
					$nuevoAlto = 500;

					$aleatorio = mt_rand(100,9999);

					/*=============================================
					CREAMOS EL DIRECTORIO DONDE VAMOS A GUARDAR LA FIRMA
					=============================================*/

					$directorio = "vistas/img/firmasIngeniero/".$aleatorio;

					mkdir($directorio, 0755);

					/*=============================================
					DE ACUERDO AL TIPO DE IMAGEN APLICAMOS LAS FUNCIONES POR DEFECTO DE PHP
					=============================================*/

					if($_FILES["editarFirmaRealizada"]["type"] == "image/jpeg"){

						/*=============================================
						GUARDAMOS LA IMAGEN EN EL DIRECTORIO
						=============================================*/

						$aleatorio = mt_rand(100,9999);

						$firma = "vistas/img/firmasIngeniero/".$_POST["aleatorio"]."/".$aleatorio.".jpg";

						$origen = imagecreatefromjpeg($_FILES["editarFirmaRealizada"]["tmp_name"]);						

						$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

						imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

						imagejpeg($destino, $firma);

					}

					if($_FILES["editarFirmaRealizada"]["type"] == "image/png"){

						/*=============================================
						GUARDAMOS LA IMAGEN EN EL DIRECTORIO
						=============================================*/

						$aleatorio = mt_rand(100,9999);

						$firma = "vistas/img/firmasIngeniero/".$aleatorio."/".$aleatorio.".png";

						$origen = imagecreatefrompng($_FILES["editarFirmaRealizada"]["tmp_name"]);						

						$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

						imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

						imagepng($destino, $firma);

					}

				}

			// =============================================
			// 	VALIDAR IMAGEN
			// 	=============================================

				$ruta = "";

				if(isset($_FILES["editarFirma"]["tmp_name"])){

					list($ancho, $alto) = getimagesize($_FILES["editarFirma"]["tmp_name"]);

					$nuevoAncho = 600;
					$nuevoAlto = 600;

					/*=============================================
					CREAMOS EL DIRECTORIO DONDE VAMOS A GUARDAR LA FIRMA
					=============================================*/

					$directorio = "vistas/img/firmas/".$_POST["editarNumReporte"];

					mkdir($directorio, 0755);

					/*=============================================
					DE ACUERDO AL TIPO DE IMAGEN APLICAMOS LAS FUNCIONES POR DEFECTO DE PHP
					=============================================*/

					if($_FILES["editarFirma"]["type"] == "image/jpeg"){

						/*=============================================
						GUARDAMOS LA IMAGEN EN EL DIRECTORIO
						=============================================*/

						$aleatorio = mt_rand(100,999);

						$ruta = "vistas/img/firmas/".$_POST["editarNumReporte"]."/".$aleatorio.".jpg";

						$origen = imagecreatefromjpeg($_FILES["editarFirma"]["tmp_name"]);						

						$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

						imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

						imagejpeg($destino, $ruta);

					}

					if($_FILES["editarFirma"]["type"] == "image/png"){

						/*=============================================
						GUARDAMOS LA IMAGEN EN EL DIRECTORIO
						=============================================*/

						$aleatorio = mt_rand(100,999);

						$ruta = "vistas/img/firmas/".$_POST["editarNumReporte"]."/".$aleatorio.".png";

						$origen = imagecreatefrompng($_FILES["editarFirma"]["tmp_name"]);						

						$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

						imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

						imagepng($destino, $ruta);

					}

				}

				$tabla1 = "cronograma";

				$item2 = "serie1";		
								
				$valor2 = $_POST["serieEditar"];

				$item3 = "tiempo";		
								
				$valor3 = $_POST["editarPeriodo"];

				if ($_POST["editarMes"] == "enerocr") {

					$item4 = "enero";
					$valor4 = $_POST["editarMes"];

				}else if ($_POST["editarMes"] == "febrerocr") {
					$item4 = "febrero";
					$valor4 = $_POST["editarMes"];
				}
				else if ($_POST["editarMes"] == "marzocr") {
					$item4 = "marzo";
					$valor4 = $_POST["editarMes"];
				}
				else if ($_POST["editarMes"] == "abrilcr") {
					$item4 = "abril";
					$valor4 = $_POST["editarMes"];
				}
				else if ($_POST["editarMes"] == "mayocr") {
					$item4 = "mayo";
					$valor4 = $_POST["editarMes"];
				}
				else if ($_POST["editarMes"] == "juniocr") {
					$item4 = "junio";
					$valor4 = $_POST["editarMes"];
				}
				else if ($_POST["editarMes"] == "juliocr") {
					$item4 = "julio";
					$valor4 = $_POST["editarMes"];
				}
				else if ($_POST["editarMes"] == "agostocr") {
					$item4 = "agosto";
					$valor4 = $_POST["editarMes"];
				}
				else if ($_POST["editarMes"] == "septiembrecr") {
					$item4 = "septiembre";
					$valor4 = $_POST["editarMes"];
				}
				else if ($_POST["editarMes"] == "octubrecr") {
					$item4 = "octubre";
					$valor4 = $_POST["editarMes"];
				}
				else if ($_POST["editarMes"] == "noviembrecr") {
					$item4 = "noviembre";
					$valor4 = $_POST["editarMes"];
				}
				else if ($_POST["editarMes"] == "diciembrecr") {
					$item4 = "noviembre";
					$valor4 = $_POST["editarMes"];
				}


				// $item3 = "tiempo";		
								
				// $valor3 = $_POST["nuevoperiodo"];

				$respuesta25 = ModeloCronograma::mdlActualizarReporteCronogramaPeriodo($tabla1, $item2, $valor2,$item3, $valor3,$item4, $valor4);


				$formatosEditar = implode(' - ', $_POST["editartrabajo"]);
				$formatosEditarInstrumentos = implode(' - ', $_POST["editarInstrumentos"]);
			
				$tabla = "reportes";

				$datos = array("id_reporte" =>$_POST["idMantenimiento"],
							   "num_reporte" =>$_POST["editarNumReporte"],
							   "id_clinica" => $_POST["editarClienteM"],
					           "equipo_re" => $_POST["editarEquipoM"],
					           "marca_re" => $_POST["editarMarcaM"],
					       	   "modelo_re" => $_POST["editarModeloM"],
					       	   "sede" => $_POST["editarSede"],
					           "serie" => $_POST["editarSerie"],
					           "serieNueva" => $_POST["editarSerieNuevo"],
					           "numero" => $_POST["editarNumero"],
					           "tipo_manteniemiento" => $_POST["editarTipoMantenimiento"],
					           "preventivo_problema" => $_POST["editarPreventivoProblemas"],
					           "preventivo" => $_POST["editarPreventivo"],
					           "reportado" => $_POST["editarReportadoPor"],
					           "cargo" => $_POST["editarCargo"],
					           "solicitud" => $_POST["editarSolicitud"],
					           "diagnostico" => $_POST["editarDiagnostico"],
					           "trabajo" => $formatosEditar,
					           "instrumentos" => $formatosEditarInstrumentos,
					           "recomendaciones" => $_POST["editarRecomendaciones"],
					           "accesorios" => $_POST["editarAccesorios"],
					       	   "equipo_servicio" => $_POST["editarFueraServicio"], 
					           "servicio_motivo" => $_POST["editarAfirmativo"],
					       	   "equipo_evaluado" => $_POST["editarretirado"],
					           "fecha_inicio" => $_POST["editarfechaServicio"],
					       	   "fecha_proximo" => $_POST["editarfechaProximo"],
					       	   "codigo" => $_POST["editarCodigo"]);

				$respuesta = ModeloMantenimiento::mdlEditarMantenimiento($tabla, $datos);

				//var_dump($respuesta);

				if($respuesta == "ok"){

					echo '<script>

					swal({

						type: "success",
						title: "¡El mantenimiento ha sido editado correctamente!",
						showConfirmButton: true,
						confirmButtonText: "Cerrar"

					}).then(function(result){

						if(result.value){
						
							window.location = "mantenimiento";

						}

					});
				

					</script>'; 


				}

		}
	}


	//Editar Mantenimiento Si

	static public function ctrEditarMantenimientoNo(){

		$formatosEditar = "";

		if(isset($_POST["idMantenimiento"])){

			/*=============================================
				VALIDAR FIRMA DE QUIEN REALIZA EL MANTENIMIENTO
				=============================================*/

				$firma = "";

				if(isset($_FILES["editarFirmaRealizada"]["tmp_name"])){

					list($ancho, $alto) = getimagesize($_FILES["editarFirmaRealizada"]["tmp_name"]);

					$nuevoAncho = 500;
					$nuevoAlto = 500;

					$aleatorio = mt_rand(100,9999);

					/*=============================================
					CREAMOS EL DIRECTORIO DONDE VAMOS A GUARDAR LA FIRMA
					=============================================*/

					$directorio = "vistas/img/firmasIngeniero/".$aleatorio;

					mkdir($directorio, 0755);

					/*=============================================
					DE ACUERDO AL TIPO DE IMAGEN APLICAMOS LAS FUNCIONES POR DEFECTO DE PHP
					=============================================*/

					if($_FILES["editarFirmaRealizada"]["type"] == "image/jpeg"){

						/*=============================================
						GUARDAMOS LA IMAGEN EN EL DIRECTORIO
						=============================================*/

						$aleatorio = mt_rand(100,9999);

						$firma = "vistas/img/firmasIngeniero/".$_POST["aleatorio"]."/".$aleatorio.".jpg";

						$origen = imagecreatefromjpeg($_FILES["editarFirmaRealizada"]["tmp_name"]);						

						$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

						imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

						imagejpeg($destino, $firma);

					}

					if($_FILES["editarFirmaRealizada"]["type"] == "image/png"){

						/*=============================================
						GUARDAMOS LA IMAGEN EN EL DIRECTORIO
						=============================================*/

						$aleatorio = mt_rand(100,9999);

						$firma = "vistas/img/firmasIngeniero/".$aleatorio."/".$aleatorio.".png";

						$origen = imagecreatefrompng($_FILES["editarFirmaRealizada"]["tmp_name"]);						

						$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

						imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

						imagepng($destino, $firma);

					}

				}

			// =============================================
			// 	VALIDAR IMAGEN
			// 	=============================================

				$ruta = "";

				if(isset($_FILES["editarFirma"]["tmp_name"])){

					list($ancho, $alto) = getimagesize($_FILES["editarFirma"]["tmp_name"]);

					$nuevoAncho = 600;
					$nuevoAlto = 600;

					/*=============================================
					CREAMOS EL DIRECTORIO DONDE VAMOS A GUARDAR LA FIRMA
					=============================================*/

					$directorio = "vistas/img/firmas/".$_POST["editarNumReporte"];

					mkdir($directorio, 0755);

					/*=============================================
					DE ACUERDO AL TIPO DE IMAGEN APLICAMOS LAS FUNCIONES POR DEFECTO DE PHP
					=============================================*/

					if($_FILES["editarFirma"]["type"] == "image/jpeg"){

						/*=============================================
						GUARDAMOS LA IMAGEN EN EL DIRECTORIO
						=============================================*/

						$aleatorio = mt_rand(100,999);

						$ruta = "vistas/img/firmas/".$_POST["editarNumReporte"]."/".$aleatorio.".jpg";

						$origen = imagecreatefromjpeg($_FILES["editarFirma"]["tmp_name"]);						

						$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

						imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

						imagejpeg($destino, $ruta);

					}

					if($_FILES["editarFirma"]["type"] == "image/png"){

						/*=============================================
						GUARDAMOS LA IMAGEN EN EL DIRECTORIO
						=============================================*/

						$aleatorio = mt_rand(100,999);

						$ruta = "vistas/img/firmas/".$_POST["editarNumReporte"]."/".$aleatorio.".png";

						$origen = imagecreatefrompng($_FILES["editarFirma"]["tmp_name"]);						

						$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

						imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

						imagepng($destino, $ruta);

					}

				}


				$formatosEditar = implode(' - ', $_POST["editartrabajo"]);
				$formatosEditarInstrumentos = implode(' - ', $_POST["editarInstrumentos"]);
			
				$tabla = "reportesno";

				$datos = array("id_reporte" =>$_POST["idMantenimiento"],
							   "num_reporte" =>$_POST["editarNumReporte"],
							   "id_clinica" => $_POST["editarClienteM"],
					           "equipo_re" => $_POST["editarEquipoM"],
					           "marca_re" => $_POST["editarMarcaM"],
					       	   "modelo_re" => $_POST["editarModeloM"],
					       	   "sede" => $_POST["editarSede"],
					           "serie" => $_POST["editarSerie"],
					           "serieNueva" => $_POST["editarSerieNuevo"],
					           "numero" => $_POST["editarNumero"],
					           "tipo_manteniemiento" => $_POST["editarTipoMantenimiento"],
					           "preventivo_problema" => $_POST["editarPreventivoProblemas"],
					           "preventivo" => $_POST["editarPreventivo"],
					           "reportado" => $_POST["editarReportadoPor"],
					           "cargo" => $_POST["editarCargo"],
					           "solicitud" => $_POST["editarSolicitud"],
					           "diagnostico" => $_POST["editarDiagnostico"],
					           "trabajo" => $formatosEditar,
					           "instrumentos" => $formatosEditarInstrumentos,
					           "recomendaciones" => $_POST["editarRecomendaciones"],
					           "accesorios" => $_POST["editarAccesorios"],
					       	   "equipo_servicio" => $_POST["editarFueraServicio"], 
					           "servicio_motivo" => $_POST["editarAfirmativo"],
					       	   "equipo_evaluado" => $_POST["editarretirado"],
					           "fecha_inicio" => $_POST["editarfechaServicio"],
					       	   "fecha_proximo" => $_POST["editarfechaProximo"]);

				$respuesta = ModeloMantenimiento::mdlEditarMantenimientono($tabla, $datos);

				//var_dump($respuesta);

				if($respuesta == "ok"){

					echo '<script>

					swal({

						type: "success",
						title: "¡El mantenimiento ha sido editado correctamente!",
						showConfirmButton: true,
						confirmButtonText: "Cerrar"

					}).then(function(result){

						if(result.value){
						
							window.location = "no-preventivo";

						}

					});
				

					</script>'; 


				}

		}
	}







		/*=============================================
	MOSTRAR REPORTES CON EL SI
	=============================================*/

	static public function ctrMostrarModelos($item, $valor,$orden,$perfil){

		$tabla = "reportes";

		$respuesta = ModeloMantenimiento::mdlMostrarMantenimiento($tabla, $item, $valor, $orden,$perfil);

		return $respuesta;

	}


		/*=============================================
	CREAR FIRMA DESDE LA TABLA MANTENIMIENTO
	=============================================*/

	static public function ctrCrearFirmaMantenimiento(){

			if(isset($_POST["idreporte"])){



					$ruta = $_POST["firmaactual"];

				if(isset($_POST['output'])){

					$directorio = "vistas/img/firmas/".$_POST["reportetraer"];

					/*=============================================
					PRIMERO PREGUNTAMOS SI EXISTE OTRA IMAGEN EN LA BD
					=============================================*/

					if(!empty($_POST["firmaactual"])){

						unlink($_POST["firmaactual"]);

					}else{

						mkdir($directorio, 0755);

					}

					$json = $_POST['output'];
					$img = sigJsonToImage($json);


					$filename = mt_rand(100,999);
					$ruta = "vistas/img/firmas/".$_POST["reportetraer"]."/".$filename.".png";
					
					// Save to file
					imagepng($img, $ruta);
				
					imagedestroy($img);

				}

 
						$tabla = "reportes";

						$item1 = "firma";
						$valor1 = $ruta;

						$item2 = "id_reporte";		
						$valor2 = $_POST["idreporte"];

						$respuesta = ModeloMantenimiento::mdlActualizarFirmaMantenimiento($tabla, $item1, $valor1, $item2, $valor2);

						if ($respuesta == "ok") {
							echo'<script>
		
							swal({
								  type: "success",
								  title: "La firma se ha guardado",
								  showConfirmButton: true,
								  confirmButtonText: "Cerrar"
								  }).then(function(result){
											if (result.value) {
		
											window.location = "mantenimiento";
		
											}
										})
		
							</script>';
						}		

		}

	}

		/*=============================================
	MOSTRAR REPORTES CON EL NO
	=============================================*/

	static public function ctrMostrarModelosno($item, $valor,$orden,$perfil){

		$tabla = "reportesno";

		$respuesta = ModeloMantenimiento::mdlMostrarMantenimientono($tabla, $item, $valor, $orden,$perfil);

		return $respuesta;

	}

	/*=============================================
	ELIMINAR REPORTES
	=============================================*/

	static public function ctrEliminarMantenimiento(){

		if(isset($_GET["idMantenimiento"])){

			$tabla ="reportes";
			$datos = $_GET["idMantenimiento"];

// 			if($_GET["fotoFirma"] != "" || $_GET["fotoFirma"] == "")
// 			{

// 				unlink($_GET["fotoFirma"]); 
// 				rmdir('vistas/img/firmas/'.$_GET["numeroReporte"]);

// 			}
			//if($_GET["fotoFirmaRecibido"] != "" || $_GET["fotoFirmaRecibido"] == "")
			//{

				//unlink($_GET["fotoFirmaRecibido"]);
				//rmdir('vistas/img/firmasIngeniero/'.$_GET["numeroReporte"]);

			//}

			$tabla1 = "cronograma";
								
			$item1 = "reporte";
								
			$valor1 = 0;

			$item2 = "fecha_programacion";	

			$valor2 = "0000-00-00";
				
			$item3 = "cliente";		
								
			$valor3 = $_GET["idUsuariosEli"];
			
			$respuesta5 = ModeloEquipos::mdlActualizarCeroCronograma($tabla1, $item1, $valor1, $item2, $valor2, $item3, $valor3);


			$respuesta = ModeloMantenimiento::mdlEliminarMantenimiento($tabla, $datos);

			if($respuesta == "ok"){

				echo'<script>

				swal({
					  type: "success",
					  title: "El mantenimiento ha sido borrado correctamente",
					  showConfirmButton: true,
					  confirmButtonText: "Cerrar"
					  }).then(function(result){
								if (result.value) {

								window.location = "mantenimiento";

								} 
							})

				</script>';

			}		

		}

	}	


	/*=============================================
	ELIMINAR REPORTES NO
	=============================================*/

	static public function ctrEliminarMantenimientono(){

		if(isset($_GET["idMantenimiento"])){

			$tabla ="reportesno";
			$datos = $_GET["idMantenimiento"];

			if($_GET["fotoFirma"] != "" || $_GET["fotoFirma"] == "")
			{

				unlink($_GET["fotoFirma"]); 
				rmdir('vistas/img/firmas/'.$_GET["numeroReporte"]);

			}
			if($_GET["fotoFirmaRecibido"] != "" || $_GET["fotoFirmaRecibido"] == "")
			{

				unlink($_GET["fotoFirmaRecibido"]);
				rmdir('vistas/img/firmasIngeniero/'.$_GET["numeroReporte"]);

			}

			$tabla1 = "cronograma";
								
			$item1 = "reporte";
								
			$valor1 = 0;

			$item2 = "fecha_programacion";	

			$valor2 = "0000-00-00";
				
			$item3 = "cliente";		
								
			$valor3 = $_GET["idUsuariosEli"];
			
			$respuesta5 = ModeloEquipos::mdlActualizarCeroCronograma($tabla1, $item1, $valor1, $item2, $valor2, $item3, $valor3);


			$respuesta = ModeloMantenimiento::mdlEliminarMantenimientono($tabla, $datos);

			if($respuesta == "ok"){

				echo'<script>

				swal({
					  type: "success",
					  title: "El mantenimiento ha sido borrado correctamente",
					  showConfirmButton: true,
					  confirmButtonText: "Cerrar"
					  }).then(function(result){
								if (result.value) {

								window.location = "no-preventivo";

								} 
							})

				</script>';

			}		

		}

	}	


	//Rango de fecha de servicio

	static public function ctrRangoFechasMantenimiento($fechaInicial, $fechaFinal,$perfil,$valor){ 
		
		$tabla = "reportes";

		$respuesta = ModeloMantenimiento::mdlRangoFechasMantenimiento($tabla, $fechaInicial, $fechaFinal, $perfil, $valor);

		return $respuesta;
	}

	//Rango de fecha de servicio no preventivo

	// static public function ctrRangoFechasMantenimientonopreventivo($fechaInicial, $fechaFinal,$perfil,$valor){
		
	// 	$tabla = "reportesno";

	// 	$respuesta = ModeloMantenimiento::mdlRangoFechasMantenimientonopreventivo($tabla, $fechaInicial, $fechaFinal, $perfil, $valor);

	// 	return $respuesta;
	// }


	//Rango de fecha de servicio

	static public function ctrRangoFechasMantenimientoProximo($fechaInicial, $fechaFinal,$perfil,$valor){
		
		$tabla = "reportes";

		$respuesta = ModeloMantenimiento::mdlRangoFechasMantenimientoProximo($tabla, $fechaInicial, $fechaFinal, $perfil, $valor);

		return $respuesta;
	}

	//Rango de fecha de servicio no preventivo proximo

	static public function ctrRangoFechasMantenimientoProximonopreventivo($fechaInicial, $fechaFinal,$perfil,$valor){
		
		$tabla = "reportesno";

		$respuesta = ModeloMantenimiento::mdlRangoFechasMantenimientoProximonopreventivo($tabla, $fechaInicial, $fechaFinal, $perfil, $valor);

		return $respuesta;
	}
 
	//Contar mantenimientos

	static public function ctrContarTiposMantenimiento($perfil,$valor){
		
		$tabla = "reportes";

		$respuesta = ModeloMantenimiento::mdlContarTiposMantenimiento($tabla,$perfil,$valor);

		return $respuesta;
	}

	//Contar Equipos

	static public function ctrContarEquiposMantenimiento($perfil,$valor){
		
		$tabla = "reportes";

		$respuesta = ModeloMantenimiento::mdlContarEquiposMantenimiento($tabla,$perfil,$valor);

		return $respuesta;
	}

	static public function ctrContarMantenimientosxcliente($item1,$valor1){
		
		$tabla = "reportes";

		$respuesta = ModeloMantenimiento::mdlContarMantenimientosxcliente($tabla,$item1,$valor1);

		return $respuesta;
	}

	/*=============================================
	DESCARGAR EXCEL
	=============================================*/ 
 
	public function ctrDescargarReporte(){
 
		if(isset($_GET["reporte"])){
 
			$tabla = "reportes";
		 

			if(isset($_GET["fechaInicial"]) && isset($_GET["fechaFinal"])){


				$perfil = null;
				$valor = null;
				$reportes = ModeloMantenimiento::mdlRangoFechasMantenimiento($tabla, $_GET["fechaInicial"], $_GET["fechaFinal"],$perfil, $valor);

			}else{

				$item = null;
				$valor = null;
				$perfil = null;
				$valor = null;
				$reportes = ModeloMantenimiento::mdlRangoFechasMantenimiento($tabla, $item, $valor,$perfil,$valor);

			}


			/*=============================================
			CREAMOS EL ARCHIVO DE EXCEL
			=============================================*/

			$Name = $_GET["reporte"].'.xls';

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
					<td style='font-weight:bold; border:1px solid #eee;'>REPORTE</td> 
					<td style='font-weight:bold; border:1px solid #eee;'>CLINICA</td>
					<td style='font-weight:bold; border:1px solid #eee;'>EQUIPO</td>
					<td style='font-weight:bold; border:1px solid #eee;'>MARCA</td>
					<td style='font-weight:bold; border:1px solid #eee;'>MODELO</td>
					<td style='font-weight:bold; border:1px solid #eee;'>SERIE</td>
					<td style='font-weight:bold; border:1px solid #eee;'>TIPO DE MANTENIMIENTO</td>		
					<td style='font-weight:bold; border:1px solid #eee;'>PREVENTIVO</td>		
					<td style='font-weight:bold; border:1px solid #eee;'>PREVENTIVO CON PROBLEMA</td>	
					<td style='font-weight:bold; border:1px solid #eee;'>REPORTADO POR</td>
					<td style='font-weight:bold; border:1px solid #eee;'>CARGO</td>		
					<td style='font-weight:bold; border:1px solid #eee;'>SOLICITUD</td>		
					<td style='font-weight:bold; border:1px solid #eee;'>DIAGNOSTICO</td>
					<td style='font-weight:bold; border:1px solid #eee;'>TRABAJO REALIZADO</td>		
					<td style='font-weight:bold; border:1px solid #eee;'>INSTRUMENTOS</td>		
					<td style='font-weight:bold; border:1px solid #eee;'>RECOMENDACIONES</td>
					<td style='font-weight:bold; border:1px solid #eee;'>ACCESORIOS</td>		
					<td style='font-weight:bold; border:1px solid #eee;'>EQUIPO FUERA DE SERVICIO</td>
					<td style='font-weight:bold; border:1px solid #eee;'>RAZON</td>		
					<td style='font-weight:bold; border:1px solid #eee;'>EQUIPO REQUIERE SER RETIRADO</td>		
					<td style='font-weight:bold; border:1px solid #eee;'>FECHA DE SERVICIO</td>
					<td style='font-weight:bold; border:1px solid #eee;'>FECHA DE PROXIMO MANTENIMENTO</td>						
					</tr>");

			foreach ($reportes as $row => $item){

				$perfil = null;

				$cliente = ControladorUsuarios::ctrMostrarUsuarios("id", $item["id_clinica"],$perfil);

			 echo utf8_decode("<tr>
			 			<td style='border:1px solid #eee;'>".$item["num_reporte"]."</td> 
			 			<td style='border:1px solid #eee;'>".$cliente["nombre"]."</td>
			 			<td style='border:1px solid #eee;'>".$item["equipo_re"]."</td>
			 			<td style='border:1px solid #eee;'>".$item["marca_re"]."</td> 
			 			<td style='border:1px solid #eee;'>".$item["modelo_re"]."</td>
			 			<td style='border:1px solid #eee;'>".$item["serie"]."</td>
			 			<td style='border:1px solid #eee;'>".$item["tipo_manteniemiento"]."</td> 
			 			<td style='border:1px solid #eee;'>".$item["preventivo"]."</td>
			 			<td style='border:1px solid #eee;'>".$item["preventivo_problema"]."</td>
			 			<td style='border:1px solid #eee;'>".$item["reportado"]."</td> 
			 			<td style='border:1px solid #eee;'>".$item["cargo"]."</td>
			 			<td style='border:1px solid #eee;'>".$item["solicitud"]."</td>
			 			<td style='border:1px solid #eee;'>".$item["diagnostico"]."</td> 
			 			<td style='border:1px solid #eee;'>".$item["trabajo"]."</td>
			 			<td style='border:1px solid #eee;'>".$item["instrumentos"]."</td>
			 			<td style='border:1px solid #eee;'>".$item["recomendaciones"]."</td>
			 			<td style='border:1px solid #eee;'>".$item["accesorios"]."</td>
			 			<td style='border:1px solid #eee;'>".$item["equipo_servicio"]."</td> 
			 			<td style='border:1px solid #eee;'>".$item["servicio_motivo"]."</td>
			 			<td style='border:1px solid #eee;'>".$item["equipo_evaluado"]."</td>
			 			<td style='border:1px solid #eee;'>".$item["fecha_inicio"]."</td>
			 			<td style='border:1px solid #eee;'>".$item["fecha_proximo"]."</td> 
		 					</tr>");


			}


			echo "</table>";

		}

	}




	/*=============================================
	DESCARGAR EXCEL NO PREVENIVO
	=============================================*/ 
 
	public function ctrDescargarReporteNopreventivo(){
 
		if(isset($_GET["no-reporte"])){
 
			$tabla = "reportesno";
		 

			if(isset($_GET["fechaInicial"]) && isset($_GET["fechaFinal"])){


				$perfil = null;
				$valor = null;
				$reportes = ModeloMantenimiento::mdlRangoFechasMantenimientonopreventivo($tabla, $_GET["fechaInicial"], $_GET["fechaFinal"],$perfil, $valor);

			}else{

				$item = null;
				$valor = null;
				$perfil = null;
				$valor = null;
				$reportes = ModeloMantenimiento::mdlRangoFechasMantenimientonopreventivo($tabla, $item, $valor,$perfil,$valor);

			}


			/*=============================================
			CREAMOS EL ARCHIVO DE EXCEL
			=============================================*/

			$Name = $_GET["no-reporte"].'.xls';

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
					<td style='font-weight:bold; border:1px solid #eee;'>REPORTE</td> 
					<td style='font-weight:bold; border:1px solid #eee;'>CLINICA</td>
					<td style='font-weight:bold; border:1px solid #eee;'>EQUIPO</td>
					<td style='font-weight:bold; border:1px solid #eee;'>MARCA</td>
					<td style='font-weight:bold; border:1px solid #eee;'>MODELO</td>
					<td style='font-weight:bold; border:1px solid #eee;'>SERIE</td>
					<td style='font-weight:bold; border:1px solid #eee;'>TIPO DE MANTENIMIENTO</td>		
					<td style='font-weight:bold; border:1px solid #eee;'>PREVENTIVO</td>		
					<td style='font-weight:bold; border:1px solid #eee;'>PREVENTIVO CON PROBLEMA</td>	
					<td style='font-weight:bold; border:1px solid #eee;'>REPORTADO POR</td>
					<td style='font-weight:bold; border:1px solid #eee;'>CARGO</td>		
					<td style='font-weight:bold; border:1px solid #eee;'>SOLICITUD</td>		
					<td style='font-weight:bold; border:1px solid #eee;'>DIAGNOSTICO</td>
					<td style='font-weight:bold; border:1px solid #eee;'>TRABAJO REALIZADO</td>		
					<td style='font-weight:bold; border:1px solid #eee;'>INSTRUMENTOS</td>		
					<td style='font-weight:bold; border:1px solid #eee;'>RECOMENDACIONES</td>
					<td style='font-weight:bold; border:1px solid #eee;'>ACCESORIOS</td>		
					<td style='font-weight:bold; border:1px solid #eee;'>EQUIPO FUERA DE SERVICIO</td>
					<td style='font-weight:bold; border:1px solid #eee;'>RAZON</td>		
					<td style='font-weight:bold; border:1px solid #eee;'>EQUIPO REQUIERE SER RETIRADO</td>		
					<td style='font-weight:bold; border:1px solid #eee;'>FECHA DE SERVICIO</td>
					<td style='font-weight:bold; border:1px solid #eee;'>FECHA DE PROXIMO MANTENIMENTO</td>						
					</tr>");

			foreach ($reportes as $row => $item){

				$perfil = null;

				$cliente = ControladorUsuarios::ctrMostrarUsuarios("id", $item["id_clinica"],$perfil);

			 echo utf8_decode("<tr>
			 			<td style='border:1px solid #eee;'>".$item["num_reporte"]."</td> 
			 			<td style='border:1px solid #eee;'>".$cliente["nombre"]."</td>
			 			<td style='border:1px solid #eee;'>".$item["equipo_re"]."</td>
			 			<td style='border:1px solid #eee;'>".$item["marca_re"]."</td> 
			 			<td style='border:1px solid #eee;'>".$item["modelo_re"]."</td>
			 			<td style='border:1px solid #eee;'>".$item["serie"]."</td>
			 			<td style='border:1px solid #eee;'>".$item["tipo_manteniemiento"]."</td> 
			 			<td style='border:1px solid #eee;'>".$item["preventivo"]."</td>
			 			<td style='border:1px solid #eee;'>".$item["preventivo_problema"]."</td>
			 			<td style='border:1px solid #eee;'>".$item["reportado"]."</td> 
			 			<td style='border:1px solid #eee;'>".$item["cargo"]."</td>
			 			<td style='border:1px solid #eee;'>".$item["solicitud"]."</td>
			 			<td style='border:1px solid #eee;'>".$item["diagnostico"]."</td> 
			 			<td style='border:1px solid #eee;'>".$item["trabajo"]."</td>
			 			<td style='border:1px solid #eee;'>".$item["instrumentos"]."</td>
			 			<td style='border:1px solid #eee;'>".$item["recomendaciones"]."</td>
			 			<td style='border:1px solid #eee;'>".$item["accesorios"]."</td>
			 			<td style='border:1px solid #eee;'>".$item["equipo_servicio"]."</td> 
			 			<td style='border:1px solid #eee;'>".$item["servicio_motivo"]."</td>
			 			<td style='border:1px solid #eee;'>".$item["equipo_evaluado"]."</td>
			 			<td style='border:1px solid #eee;'>".$item["fecha_inicio"]."</td>
			 			<td style='border:1px solid #eee;'>".$item["fecha_proximo"]."</td> 
		 					</tr>");


			}


			echo "</table>";

		}

	}
	
	
					/*=============================================
	MOSTRAR REPORTES EN EL AÑO 2019
	=============================================*/

	static public function ctrMostrarModelos2019($item, $valor,$orden,$perfil,$tiempo,$valortiempo){

		$tabla = "reportes";

		$respuesta = ModeloMantenimiento::mdlMostrarMantenimiento2019($tabla, $item, $valor, $orden,$perfil,$tiempo,$valortiempo);

		return $respuesta;

	}


			/*=============================================
	MOSTRAR REPORTES EN EL AÑO 2020
	=============================================*/

	static public function ctrMostrarModelos2020($item, $valor,$orden,$perfil,$tiempo,$valortiempo){

		$tabla = "reportes";

		$respuesta = ModeloMantenimiento::mdlMostrarMantenimiento2020($tabla, $item, $valor, $orden,$perfil,$tiempo,$valortiempo);

		return $respuesta;

	}

			/*=============================================
	MOSTRAR REPORTES EN EL AÑO 2021
	=============================================*/

	static public function ctrMostrarModelos2021($item, $valor,$orden,$perfil,$tiempo,$valortiempo){

		$tabla = "reportes";

		$respuesta = ModeloMantenimiento::mdlMostrarMantenimiento2021($tabla, $item, $valor, $orden,$perfil,$tiempo,$valortiempo);

		return $respuesta;

	}


}