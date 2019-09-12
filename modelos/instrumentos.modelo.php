<?php

require_once "conexion.php"; 
 
/**
 * 
 */
class ModeloInstrumentos{ 
 
 //Registrar Instrumentos

	static public function mdlIngresarInstrumentos($tabla, $datos){
		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(nombre) VALUES (:nombre)");

		$stmt->bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);

		if($stmt->execute()){

			return "ok";	
 
		}else{

			return "error";
		
		}

		$stmt->close();
		
		$stmt = null;
	}

	/*=============================================
	MOSTRAR TRABAJOS 
=============================================*/

	static public function mdlMostrarInstrumentos($tabla, $item, $valor,$orden){

		if($item != null){

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();

		}
		else
		{

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla ORDER BY $orden ASC");

			$stmt -> execute();

			return $stmt -> fetchAll();

		}

		$stmt -> close();
 
		$stmt = null;

	}

	//Editar Instrumentos

	static public function mdlEditarInstrumentos($tabla, $datos){
	
		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET nombre = :nombre WHERE id_instrumentos = :id_instrumentos");

		$stmt -> bindParam(":id_instrumentos", $datos["id_instrumentos"], PDO::PARAM_STR);
		$stmt -> bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
		

		if($stmt -> execute()){

			return "ok";
		
		}else{

			return "error";	

		}

		$stmt -> close();

		$stmt = null;

	}

	//Eliminar Instrumentos

	static public function mdlBorrarInstrumentos($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id_instrumentos = :id_instrumentos");

		$stmt -> bindParam(":id_instrumentos", $datos, PDO::PARAM_INT);

		if($stmt -> execute()){

			return "ok";
		
		}else{

			return "error";	

		}

		$stmt -> close();

		$stmt = null;


	}

}