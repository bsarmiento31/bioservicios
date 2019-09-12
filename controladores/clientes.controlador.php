<?php

/**
 * 
 */ 
class ControladorClientes
{
	
	static public function ctrCrearCliente(){
		if(isset($_POST["nuevoCliente"])){

				$tabla = "clientes";


				$datos = array("nombre" => $_POST["nuevoCliente"],
					           "nit" => $_POST["nuevoNit"],
					           "descripcion" => $_POST["nuevoDescripcion"]);

				$respuesta = ModeloClientes::mdlIngresarCientes($tabla, $datos);

				if($respuesta == "ok"){

					echo '<script>

					swal({

						type: "success",
						title: "¡El usuario ha sido guardado correctamente!",
						showConfirmButton: true,
						confirmButtonText: "Cerrar"

					}).then(function(result){

						if(result.value){
						
							 window.location = "cliente";

						}

					});
				

					</script>';


				}

		}
	}

	/*=============================================
	MOSTRAR CLIENTES
	=============================================*/
		static public function ctrMostrarClientes($item, $valor){

		$tabla = "clientes";

		$respuesta = ModeloClientes::mdlMostrarCientes($tabla, $item, $valor);

		return $respuesta;
	}


		/*=============================================
	EDITAR CLIENTE
	=============================================*/
static public function ctrEditarCliente(){
		if(isset($_POST["editarCliente"])){

				$tabla = "clientes";


				$datos = array( "id_cliente" => $_POST["editarID"],
								"nombre" => $_POST["editarCliente"],
					           	"nit" => $_POST["editarNit"],
					           	"descripcion" => $_POST["editarDescripcion"]);

				$respuesta = ModeloClientes::mdlEditarCliente($tabla, $datos);

				if($respuesta == "ok"){

					echo '<script>

					swal({

						type: "success",
						title: "¡El usuario ha sido guardado correctamente!",
						showConfirmButton: true,
						confirmButtonText: "Cerrar"

					}).then(function(result){

						if(result.value){
						
							window.location = "cliente";

						}

					});
				

					</script>';


				}

		}
	}

	/*=============================================
	BORRAR CLIENTE
	=============================================*/

	static public function ctrBorrarCliente(){

		if(isset($_GET["idCliente"])){

			$tabla ="clientes";
			$datos = $_GET["idCliente"];

			

			$respuesta = ModeloClientes::mdlBorrarCliente($tabla, $datos);

			if($respuesta == "ok"){

				echo'<script>

				swal({
					  type: "success",
					  title: "El usuario ha sido borrado correctamente",
					  showConfirmButton: true,
					  confirmButtonText: "Cerrar"
					  }).then(function(result){
								if (result.value) {

								window.location = "cliente";

								}
							})

				</script>';

			}		

		}

	}

	/*============================================= 
	DESCARGAR EXCEL CLIENTES
	=============================================*/
 
	public function ctrDescargarReporteClientes(){

		if(isset($_GET["cliente"])){
 
			$tabla = "clientes";
		
				$item = null; 
				$valor = null;
				$reporteCliente = ModeloClientes::mdlMostrarCientes($tabla, $item, $valor);		
			/*=============================================
			CREAMOS EL ARCHIVO DE EXCEL
			=============================================*/

			$Name = 'Clientes.xls';

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
					<td style='font-weight:bold; border:1px solid #eee;'>CLIENTE</td> 
					<td style='font-weight:bold; border:1px solid #eee;'>NIT</td>
					<td style='font-weight:bold; border:1px solid #eee;'>DESCRIPCION</td>		
					</tr>");

			foreach ($reporteCliente as $row => $value){

	
				$item = "id"; 
				$valor = $value["nombre"];
				$perfil = null;
				$reportesUsuario = ControladorUsuarios::ctrMostrarUsuarios($item, $valor,$perfil);

			 echo utf8_decode("<tr>
			 			<td style='border:1px solid #eee;'>".$reportesUsuario["nombre"]."</td> 
			 			<td style='border:1px solid #eee;'>".$value["nit"]."</td>
			 			<td style='border:1px solid #eee;'>".$value["descripcion"]."</td> 
		 			</tr>"); 


			}


			echo "</table>";

		}

	}
}

