<?php
 
class controladorEquipos{ 

	/*=============================================  
	CREAR EQUIPOS  
	=============================================*/
  
	static public function ctrCrearEquipo(){ 

				if(isset($_POST["nuevoEquipo"])){
						if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevoEquipo"])){

						$tabla = "equipos";

						$instrumento = implode(' # ', $_POST["nuevoInstrumentoE"]);
						$trabajo = implode(' - ', $_POST["nuevoTrabajosE"]);

						$datos = array("equipo"=>$_POST["nuevoEquipo"],
									   "baja"=>$_POST["nuevoEstado"],
									   "id_usuario"=>$_POST["nuevoUsuario"],
							           "modelo"=>$_POST["nuevoModelo"],
							           "marcaText"=>$_POST["nuevoMarcaText"],    
							           "serie"=>$_POST["nuevoSerie"],
							       	   "instr_utilizados"=>$instrumento,
							       	   "traba_realizados"=>$trabajo,
							       	   "codigo"=>$_POST["nuevoCodigo"],
							       	   "mediciones"=>$_POST["nuevoMedicion"]);

						 	$respuesta = ModeloEquipos::mdlIngresarEquipo($tabla, $datos);

						 	//var_dump($respuesta); 

						if($respuesta == "ok"){

							echo'<script>
		
							swal({
								  type: "success",
								  title: "El equipo ha sido guardado correctamente",
								  showConfirmButton: true,
								  confirmButtonText: "Cerrar"
								  }).then(function(result){
											if (result.value) {
		
											window.location = "equipos";
		
											}
										})
		
							</script>';

						}

					}
					else{

				echo'<script>

					swal({
						  type: "error",
						  title: "¡El Equipo no puede ir vacío o llevar caracteres especiales!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "equipos";

							}
						})

			  	</script>';



			} 
		}

	}



/*============================================= 
	CREAR OBSERVACION 
	=============================================*/

	static public function ctrCrearObservacion(){

				if(isset($_POST["nuevoObservacion"])){
 
						$tabla = "equipos";

						$item1 = "observaciones";
						$valor1 = $_POST["nuevoObservacion"];

						$item2 = "id_equipo";		
						$valor2 = $_POST["idEquipoObservacion"];

						$respuesta = ModeloEquipos::mdlActualizarEquipo($tabla, $item1, $valor1, $item2, $valor2);

						if ($respuesta == "ok") {
							echo'<script>
		
							swal({
								  type: "success",
								  title: "La observación se ha guardado",
								  showConfirmButton: true,
								  confirmButtonText: "Cerrar"
								  }).then(function(result){
											if (result.value) {
		
											window.location = "equipos";
		
											}
										})
		
							</script>';
						}		

		}

	}

	/*=============================================
	MOSTRAR EQUIPOS
	=============================================*/ 

	static public function ctrMostrarEquipos($item, $valor,$orden,$select){ 

		$tabla = "equipos";

		$respuesta = ModeloEquipos::mdlMostrarEquipos($tabla, $item, $valor, $orden,$select);

		return $respuesta;

	}


	/*=============================================
	EDITAR EQUIPOS
	=============================================*/ 

	static public function ctrEditarEquipo(){

				if(isset($_POST["idEquipo"])){
						if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarEquipo"])){

						//para editar el cronograma tambien


						$item2 = "serie1";		
						$valor2 = $_POST["editarSerie"];

						$tabla2 = "cronograma";

						$item3 = "equipo";
						$valor3 = $_POST["editarEquipo"];

						$item4 = "marca";
						$valor4 = $_POST["editarMarcaText"];

						$item5 = "modelo";
						$valor5 = $_POST["editarModelo"];



						$respuesta1 = ModeloCronograma::mdlActualizarCronogramaEquipos($tabla2, $item2, $valor2,$item3,$valor3,$item4,$valor4,$item5,$valor5);
							


						$tabla = "equipos";

						$datos = array("id_equipo"=>$_POST["idEquipo"],
									   "id_usuario"=>$_POST["editarUsuario"],
									   "equipo"=>$_POST["editarEquipo"],
							           "modelo"=>$_POST["editarModelo"],
							           "marcaText"=>$_POST["editarMarcaText"],     
							           "serie"=>$_POST["editarSerie"],
							       	   "observaciones"=>$_POST["editarObservacion"],
							       	   "mediciones"=>$_POST["editarMedicion"],
							       	   "codigo"=>$_POST["editarCodigo"]);

						$respuesta = ModeloEquipos::mdlEditarEquipo($tabla, $datos);

						 	//var_dump($respuesta); 

						if($respuesta == "ok"){

							echo'<script>
		
							swal({
								  type: "success",
								  title: "El equipo ha sido editado correctamente",
								  showConfirmButton: true,
								  confirmButtonText: "Cerrar"
								  }).then(function(result){
											if (result.value) {
		
											window.location = "equipos";
		
											}
										})
		
							</script>';

						}

					}
					else{

				echo'<script>

					swal({
						  type: "error",
						  title: "¡El Equipo no puede ir vacío o llevar caracteres especiales!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "equipos";

							}
						})

			  	</script>';



			} 
		}

	}

		/*=============================================
	ELIMINAR CLIENTE
	=============================================*/

	static public function ctrEliminarEquipo(){

		if(isset($_GET["idEquipo"])){

			$tabla ="equipos";
			$datos = $_GET["idEquipo"];

			$respuesta = ModeloEquipos::mdlEliminarEquipo($tabla, $datos);

			if($respuesta == "ok"){

				echo'<script>

				swal({
					  type: "success",
					  title: "El equipo ha sido borrado correctamente",
					  showConfirmButton: true,
					  confirmButtonText: "Cerrar",
					  closeOnConfirm: false
					  }).then(function(result){
								if (result.value) {

								window.location = "equipos";

								}
							})

				</script>';

			}		

		}

	}

	/*============================================= 
	DESCARGAR EXCEL EQUIPOS
	=============================================*/
 
	public function ctrDescargarReporteEquipos(){

		if(isset($_GET["equipos"])){
 
			$tabla = "equipos";
		
				$item = null; 
				$valor = null;
				$orden = "id_equipo";
				$select = null;
				$reporteEquipos = ModeloEquipos::mdlMostrarEquipos($tabla, $item, $valor, $orden,$select);	
			/*=============================================
			CREAMOS EL ARCHIVO DE EXCEL
			=============================================*/

			$Name = 'Equipos.xls';
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
					<td style='font-weight:bold; border:1px solid #eee;'>CLINICA</td>  
					<td style='font-weight:bold; border:1px solid #eee;'>EQUIPO</td> 
					<td style='font-weight:bold; border:1px solid #eee;'>MARCA</td>
					<td style='font-weight:bold; border:1px solid #eee;'>MODELO</td>
					<td style='font-weight:bold; border:1px solid #eee;'>SERIE</td>		
					</tr>");

			foreach ($reporteEquipos as $row => $item){

					$item1 = "id";
              		$valor1 = $item["id_usuario"];
              		$perfil1 = null;

              		$usuarios = ControladorUsuarios::ctrMostrarUsuarios( $item1, $valor1, $perfil1 );

			 echo utf8_decode("<tr>
			 			<td style='border:1px solid #eee;'>".$usuarios["nombre"]."</td>
			 			<td style='border:1px solid #eee;'>".$item["equipo"]."</td> 
			 			<td style='border:1px solid #eee;'>".$item["modelo"]."</td>
			 			<td style='border:1px solid #eee;'>".$item["serie"]."</td> 
			 			<td style='border:1px solid #eee;'>".$item["marcaText"]."</td>
		 			</tr>"); 


			}


			echo "</table>";

		}

	}

	//Esta funcion es para agregar y actualizar el cronograma desde la tabla cronograma

	static public function ctrAgregarCronograma() {

		if(isset($_POST["idEquipoCronogramaEnviado"])){
			
					$tabla = "equipos";
						
					$item1 = "mes";
						
					$valor1 = $_POST["nuevoMes"];
		
					$item2 = "id_equipo";		
						
					$valor2 = $_POST["idEquipoCronogramaEnviado"];

					$item3 = "observacionesCro";

					$valor3 = $_POST["nuevoObservacion"];
	
						
					$respuesta = ModeloEquipos::mdlActualizarEquipoCronograma($tabla, $item1, $valor1, $item2, $valor2,$item3, $valor3);

						if ($respuesta == "ok") {

							echo'<script>
		
							swal({
								  type: "success",
								  title: "El cronograma se ha guardado correctamente",
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

//Es para editar los instrumentos y trabajos de la tabla equipo
	static public function ctrAgregarTrabajoInstrumentos() {

		if(isset($_POST["EquipoInstrTra"])){
		    
		            $instrumento = implode(' # ', $_POST["editarInstrumentoE"]);
					$trabajo = implode(' - ', $_POST["editarTrabajosE"]);
			
					$tabla = "equipos";
						
					$item1 = "instr_utilizados";
						
					$valor1 = $instrumento;
		
					$item2 = "id_equipo";		
						
					$valor2 = $_POST["EquipoInstrTra"];

					$item3 = "traba_realizados";

					$valor3 = $trabajo;
	
						
					$respuesta = ModeloEquipos::mdlActualizarEquipoCronograma($tabla, $item1, $valor1, $item2, $valor2,$item3, $valor3);

						if ($respuesta == "ok") {

							echo'<script>
		
							swal({
								  type: "success",
								  title: "El equipo se ha guardado correctamente",
								  showConfirmButton: true,
								  confirmButtonText: "Cerrar"
								  }).then(function(result){
											if (result.value) {
		
											window.location = "equipos";
		
											}
										})
		
							</script>';
						}	
		}
	}


}