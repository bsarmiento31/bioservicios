<?php

require_once "conexion.php"; 
 
/**
 * 
 */
class ModeloTrabajos{ 


	/*=============================================
	MOSTRAR TRABAJOS 
=============================================*/

	static public function mdlMostrarTrabajos($tabla, $item, $valor,$orden){

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


	 //Registrar Trabajos

	static public function mdlIngresarTrabajos($tabla, $datos){
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

	//Editar trabajos

	static public function mdlEditarTrabajos($tabla, $datos){
	
		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET nombre = :nombre WHERE id_trabajo = :id_trabajo");

		$stmt -> bindParam(":id_trabajo", $datos["id_trabajo"], PDO::PARAM_STR);
		$stmt -> bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
		

		if($stmt -> execute()){

			return "ok";
		
		}else{

			return "error";	

		}

		$stmt -> close();

		$stmt = null;

	}

		//Eliminar trabajo

	static public function mdlBorrarTrabajos($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id_trabajo = :id_trabajo");

		$stmt -> bindParam(":id_trabajo", $datos, PDO::PARAM_INT);

		if($stmt -> execute()){

			return "ok";
		
		}else{

			return "error";	

		}

		$stmt -> close();

		$stmt = null;


	}

}