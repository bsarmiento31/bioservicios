<?php

class controladorTrabajos{ 

	/*=============================================
	MOSTRAR EQUIPOS
	=============================================*/  

	static public function ctrMostrarTrabajos($item, $valor,$orden){

		$tabla = "trabajos";

		$respuesta = ModeloTrabajos::mdlMostrarTrabajos($tabla, $item, $valor,$orden);

		return $respuesta;

	}


	/*============================================= 
	CREAR TRABAJOS
	=============================================*/ 


	static public function ctrCrearTrabajos(){
		if(isset($_POST["nuevoTrabajo"])){

				$tabla = "trabajos";


				$datos = array("nombre" => $_POST["nuevoTrabajo"],);

				$respuesta = ModeloTrabajos::mdlIngresarTrabajos($tabla, $datos);

				if($respuesta == "ok"){

					echo '<script>

					swal({

						type: "success",
						title: "¡El trabajo ha sido guardado correctamente!",
						showConfirmButton: true,
						confirmButtonText: "Cerrar"

					}).then(function(result){

						if(result.value){
						
							 
							 window.location = "trabajos";

						}

					});
				

					</script>';


				}

		}
	}

	/*============================================= 
	EDITAR TRABAJOS
	=============================================*/ 


	static public function ctrEditarTrabajos(){

		if(isset($_POST["editarTrabajosId"])){

				$tabla = "trabajos";


				$datos = array( "id_trabajo" => $_POST["editarTrabajosId"],
								"nombre" => $_POST["editarNombre"]);

				$respuesta = ModeloTrabajos::mdlEditarTrabajos($tabla, $datos);

				if($respuesta == "ok"){

					echo '<script>

					swal({

						type: "success",
						title: "¡El trabajo ha sido editado correctamente!",
						showConfirmButton: true,
						confirmButtonText: "Cerrar"

					}).then(function(result){

						if(result.value){
						
							 
							 window.location = "trabajos";

						}

					});
				

					</script>';


				}

		}
	}

		/*=============================================
	BORRAR TRABAJOS
	=============================================*/

	static public function ctrBorrarTrabajos(){

		if(isset($_GET["idTrabajos"])){

			$tabla ="trabajos";
			$datos = $_GET["idTrabajos"];

			

			$respuesta = ModeloTrabajos::mdlBorrarTrabajos($tabla, $datos);

			if($respuesta == "ok"){

				echo'<script>

				swal({
					  type: "success",
					  title: "El usuario ha sido borrado correctamente",
					  showConfirmButton: true,
					  confirmButtonText: "Cerrar"
					  }).then(function(result){
								if (result.value) {

								window.location = "trabajos";

								}
							})

				</script>';

			}		

		}

	}

}