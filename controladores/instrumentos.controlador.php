<?php

class controladorInstrumentos{ 

	/*============================================= 
	CREAR INSTRUMENTOS
	=============================================*/ 


	static public function ctrCrearInstrumentos(){
		if(isset($_POST["nuevoInstrumentos"])){

				$tabla = "instrumentos";


				$datos = array("nombre" => $_POST["nuevoInstrumentos"],);

				$respuesta = ModeloInstrumentos::mdlIngresarInstrumentos($tabla, $datos);

				if($respuesta == "ok"){

					echo '<script>

					swal({

						type: "success",
						title: "¡El instrumento ha sido guardado correctamente!",
						showConfirmButton: true,
						confirmButtonText: "Cerrar"

					}).then(function(result){

						if(result.value){
						
							 
							 window.location = "instrumentos";

						}

					});
				

					</script>';


				}

		}
	}

	/*============================================= 
	EDITAR INSTRUMENTOS
	=============================================*/ 


	static public function ctrEditarInstrumentos(){

		if(isset($_POST["editarInstrumentosId"])){

				$tabla = "instrumentos";


				$datos = array( "id_instrumentos" => $_POST["editarInstrumentosId"],
								"nombre" => $_POST["editarNombre"]);

				$respuesta = ModeloInstrumentos::mdlEditarInstrumentos($tabla, $datos);

				if($respuesta == "ok"){

					echo '<script>

					swal({

						type: "success",
						title: "¡El instrumento ha sido editado correctamente!",
						showConfirmButton: true,
						confirmButtonText: "Cerrar"

					}).then(function(result){

						if(result.value){
						
							 
							 window.location = "instrumentos";

						}

					});
				

					</script>';


				}

		}
	}

	/*============================================= 
	MOSTRAR EQUIPOS
	=============================================*/ 

	static public function ctrMostrarInstrumentos($item, $valor,$orden){

		$tabla = "instrumentos";

		$respuesta = ModeloInstrumentos::mdlMostrarInstrumentos($tabla, $item, $valor,$orden);

		return $respuesta;

	}


	/*=============================================
	BORRAR INSTRUMENTOS
	=============================================*/

	static public function ctrBorrarInstrumentos(){

		if(isset($_GET["idInstrumentos"])){

			$tabla ="instrumentos";
			$datos = $_GET["idInstrumentos"];

			

			$respuesta = ModeloInstrumentos::mdlBorrarInstrumentos($tabla, $datos);

			if($respuesta == "ok"){

				echo'<script>

				swal({
					  type: "success",
					  title: "El usuario ha sido borrado correctamente",
					  showConfirmButton: true,
					  confirmButtonText: "Cerrar"
					  }).then(function(result){
								if (result.value) {

								window.location = "instrumentos";

								}
							})

				</script>';

			}		

		}

	}

}