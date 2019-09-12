<?php 
 
require_once "conexion.php";

class ModeloCalibracion{

	/*=============================================
	REGISTRO DE ACLIBRACION
	=============================================*/

	static public function mdlIngresarCalibracion($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(cliente,equipo,marca, serie,codigo,modelo, archivo, fechacarga) VALUES (:cliente,:equipo,:marca, :serie,:codigo,:modelo, :archivo, :fechacarga)");

	    $stmt->bindParam(":cliente", $datos["cliente"], PDO::PARAM_STR);
		$stmt->bindParam(":archivo", $datos["archivo"], PDO::PARAM_STR); 
		$stmt->bindParam(":equipo", $datos["equipo"], PDO::PARAM_STR);
		$stmt->bindParam(":marca", $datos["marca"], PDO::PARAM_STR);
		$stmt->bindParam(":serie", $datos["serie"], PDO::PARAM_STR);
		$stmt->bindParam(":codigo", $datos["codigo"], PDO::PARAM_STR);
		$stmt->bindParam(":modelo", $datos["modelo"], PDO::PARAM_STR);
		$stmt->bindParam(":fechacarga", $datos["fechacarga"], PDO::PARAM_STR);

		if($stmt->execute()){

			return "ok";	

		}else{

			return "error";
		
		}

		$stmt->close();
		
		$stmt = null;

	}


		/*=============================================
	MOSTRAR USUARIOS
	=============================================*/

	static public function MdlMostrarCalibracion($tabla, $item, $valor,$perfil){

		if($item != null){

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();

		}else if($perfil != null){

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $perfil = :$perfil");

			$stmt -> bindParam(":".$perfil, $valor, PDO::PARAM_STR);
 
			$stmt -> execute();

			return $stmt -> fetchAll();

		}else{

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");

			$stmt -> execute();

			return $stmt -> fetchAll();

		}
		

		$stmt -> close();

		$stmt = null;

	}


	/*=============================================
	EDITAR CALIBRACION
	=============================================*/

	static public function mdlEditarCalibracion($tabla, $datos){
	
		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET archivo = :archivo, cliente = :cliente, fechacarga = :fechacarga  WHERE cliente = :cliente");

		$stmt -> bindParam(":cliente", $datos["cliente"], PDO::PARAM_STR);
		$stmt -> bindParam(":archivo", $datos["archivo"], PDO::PARAM_STR);
		$stmt -> bindParam(":fechacarga", $datos["fechacarga"], PDO::PARAM_STR);
		
	

		if($stmt -> execute()){

			return "ok";
		
		}else{

			return "error";	

		}

		$stmt -> close();

		$stmt = null;

	}


	/*=============================================
	BORRAR CALIBRACION
	=============================================*/

	static public function mdlBorrarCalibracion($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE cliente = :cliente");

		$stmt -> bindParam(":cliente", $datos, PDO::PARAM_INT);

		if($stmt -> execute()){

			return "ok";
		
		}else{

			return "error";	

		}

		$stmt -> close();

		$stmt = null;


	}
}
