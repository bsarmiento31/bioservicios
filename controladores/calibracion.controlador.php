<?php


class ControladorCalibracion{ 

	/*=============================================
	REGISTRO DE CALIBRACIÓN 
	=============================================*/

	static public function ctrIngresoCalibracion(){

		if(isset($_POST["nuevoCliente"])){

			/*=============================================
			SUBIR ARCHIVO
			=============================================*/

			$ruta = "";

			

			if(isset($_FILES["nuevoArchivo"]["tmp_name"])){

				/*=============================================
				CREAMOS EL DIRECTORIO DONDE VAMOS A GUARDAR EL ARCHIVO
				=============================================*/

				$directorio = "vistas/img/calibracion/".$_POST["nuevoCliente"];

				mkdir($directorio, 0755);
				

				if($_FILES["nuevoArchivo"]["type"] == "image/jpeg"){

					list($ancho, $alto) = getimagesize($_FILES["nuevoArchivo"]["tmp_name"]);

					$nuevoAncho = 500;
					$nuevoAlto = 500;


					/*=============================================
						GUARDAMOS LA IMAGEN EN EL DIRECTORIO
						=============================================*/

						$aleatorio = mt_rand(100,999);

						$ruta = "vistas/img/calibracion/".$_POST["nuevoCliente"]."/".$aleatorio.".jpg";

						$origen = imagecreatefromjpeg($_FILES["nuevoArchivo"]["tmp_name"]);						

						$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

						imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

						imagejpeg($destino, $ruta);




				}


				if($_FILES["nuevoArchivo"]["type"] == "image/png"){


					list($ancho, $alto) = getimagesize($_FILES["nuevoArchivo"]["tmp_name"]);

					$nuevoAncho = 500;
					$nuevoAlto = 500;

						/*=============================================
						GUARDAMOS LA IMAGEN EN EL DIRECTORIO
						=============================================*/

						$aleatorio = mt_rand(100,999);

						$ruta = "vistas/img/calibracion/".$_POST["nuevoCliente"]."/".$aleatorio.".png";

						$origen = imagecreatefrompng($_FILES["nuevoArchivo"]["tmp_name"]);						

						$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

						imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

						imagepng($destino, $ruta);

					}

					if($_FILES["nuevoArchivo"]["type"] == "application/pdf"){

						$nombre = $_FILES["nuevoArchivo"]["tmp_name"];

						$ruta = "vistas/img/calibracion/".$_POST["nuevoCliente"]."/".$_FILES["nuevoArchivo"]["name"];

						move_uploaded_file($nombre,$ruta);

					}

					

			}


			$tabla = "calibracion";

			$datos = array("cliente" => $_POST["nuevoCliente"],
							"equipo" => $_POST["nuevoEquipo"],
							"marca" => $_POST["nuevoMarca"],
							"serie" => $_POST["nuevoModelo"],
							"codigo" => $_POST["nuevoCodigoM"],
							"modelo" => $_POST["nuevoSerie"],
					        "archivo" => $ruta,
					        "fechacarga" => $_POST["fechaServicio"]);

			$respuesta = ModeloCalibracion::mdlIngresarCalibracion($tabla, $datos);


			if($respuesta == "ok"){

					echo '<script>

					swal({
 
						type: "success",
						title: "¡La calibracion ha sido guardado correctamente!",
						showConfirmButton: true,
						confirmButtonText: "Cerrar"

					}).then(function(result){

						if(result.value){
						
							window.location = "calibracion";

						}

					});
				

					</script>';


				}	



		}

	}






	/*=============================================
	EDITAR CALIBRACIÓN
	=============================================*/

	static public function ctrEditarCalibracion(){

		if(isset($_POST["editarCliente"])){

			/*=============================================
			SUBIR ARCHIVO
			=============================================*/

			$ruta = $_POST["archivoActual"];

			if(isset($_FILES["editarArchivo"]["tmp_name"]) && !empty($_FILES["editarArchivo"]["tmp_name"])){

				/*=============================================
				CREAMOS EL DIRECTORIO DONDE VAMOS A GUARDAR EL ARCHIVO
				=============================================*/

				$directorio = "vistas/img/calibracion/".$_POST["editarCliente"];

				// mkdir($directorio, 0755);
				if(!empty($_POST["archivoActual"])){

						unlink($_POST["archivoActual"]);

					}else{

						mkdir($directorio, 0755);

					}	

				if($_FILES["editarArchivo"]["type"] == "image/jpeg"){

					list($ancho, $alto) = getimagesize($_FILES["editarArchivo"]["tmp_name"]);

					$nuevoAncho = 500;
					$nuevoAlto = 500;


					/*=============================================
						GUARDAMOS LA IMAGEN EN EL DIRECTORIO
						=============================================*/

						$aleatorio = mt_rand(100,999);

						$ruta = "vistas/img/calibracion/".$_POST["editarCliente"]."/".$aleatorio.".jpg";

						$origen = imagecreatefromjpeg($_FILES["editarArchivo"]["tmp_name"]);						

						$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

						imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

						imagejpeg($destino, $ruta);




				}


				if($_FILES["editarArchivo"]["type"] == "image/png"){


					list($ancho, $alto) = getimagesize($_FILES["editarArchivo"]["tmp_name"]);

					$nuevoAncho = 500;
					$nuevoAlto = 500;

						/*=============================================
						GUARDAMOS LA IMAGEN EN EL DIRECTORIO
						=============================================*/

						$aleatorio = mt_rand(100,999);

						$ruta = "vistas/img/calibracion/".$_POST["editarCliente"]."/".$aleatorio.".png";

						$origen = imagecreatefrompng($_FILES["editarArchivo"]["tmp_name"]);						

						$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

						imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

						imagepng($destino, $ruta);

					}

					if($_FILES["editarArchivo"]["type"] == "application/pdf"){


						$nombre = $_FILES["editarArchivo"]["tmp_name"];

						$ruta = "vistas/img/calibracion/".$_POST["editarCliente"]."/".$_FILES["editarArchivo"]["name"];

						move_uploaded_file($nombre,$ruta);

					}

					

			}


			$tabla = "calibracion";

			$datos = array(	"cliente" => $_POST["editarCliente"],
					        "archivo" => $ruta,
					        "fechacarga" => $_POST["editarServicio"]);

			$respuesta = ModeloCalibracion::mdlEditarCalibracion($tabla, $datos);


			if($respuesta == "ok"){

					echo '<script>

					swal({
 
						type: "success",
						title: "¡La calibracion ha sido Editada correctamente!",
						showConfirmButton: true,
						confirmButtonText: "Cerrar"

					}).then(function(result){

						if(result.value){
						
							window.location = "calibracion";

						}

					});
				

					</script>';


				}	



		}

	}




	/*=============================================
	MOSTRAR CALIBRACIONES
	=============================================*/

	static public function ctrMostrarCalibraciones($item, $valor,$perfil){

		$tabla = "calibracion";

		$respuesta = ModeloCalibracion::MdlMostrarCalibracion($tabla, $item, $valor,$perfil);

		return $respuesta;
	}


	/*=============================================
	BORRAR CALIBRACION
	=============================================*/

	static public function ctrBorrarCalibracion(){

		if(isset($_GET["idCalibracion"])){

			$tabla ="calibracion";
			$datos = $_GET["idCalibracion"];

			if($_GET["fotoUsuario"] != ""){

				unlink($_GET["fotoUsuario"]);
				rmdir('vistas/img/calibracion/'.$_GET["idCalibracion"]);

			}

			$respuesta = ModeloCalibracion::mdlBorrarCalibracion($tabla, $datos);

			if($respuesta == "ok"){ 

				echo'<script>

				swal({
					  type: "success",
					  title: "La calibracion ha sido borrada correctamente",
					  showConfirmButton: true,
					  confirmButtonText: "Cerrar",
					  closeOnConfirm: false
					  }).then(function(result) {
								if (result.value) {

								window.location = "calibracion";

								}
							})

				</script>';

			}		

		}

	}



}