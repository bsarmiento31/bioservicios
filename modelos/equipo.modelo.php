<?php

require_once "conexion.php";  
 
class ModeloEquipos{  
 
	/*=============================================
	CREAR EQUIPO 
	=============================================*/ 

	static public function mdlIngresarEquipo($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(id_usuario,equipo, modelo, serie,	marcaText, baja,instr_utilizados, traba_realizados,mediciones,codigo) VALUES (:id_usuario, :equipo, :modelo, :serie, :marcaText, :baja, :instr_utilizados, :traba_realizados,:mediciones,:codigo)");

		//var_dump($stmt);

		$stmt->bindParam(":id_usuario", $datos["id_usuario"], PDO::PARAM_STR);
		$stmt->bindParam(":equipo", $datos["equipo"], PDO::PARAM_STR);
		$stmt->bindParam(":modelo", $datos["modelo"], PDO::PARAM_STR);
		$stmt->bindParam(":serie", $datos["serie"], PDO::PARAM_STR);
		$stmt->bindParam(":marcaText", $datos["marcaText"], PDO::PARAM_STR);
		$stmt->bindParam(":baja", $datos["baja"], PDO::PARAM_STR);
		$stmt->bindParam(":instr_utilizados", $datos["instr_utilizados"], PDO::PARAM_STR);
		$stmt->bindParam(":traba_realizados", $datos["traba_realizados"], PDO::PARAM_STR);
		$stmt->bindParam(":mediciones", $datos["mediciones"], PDO::PARAM_STR);
		$stmt->bindParam(":codigo", $datos["codigo"], PDO::PARAM_STR);



		if($stmt->execute()){

			return "ok";

		}else{

			return "error";
		
		}

		$stmt->close();
		$stmt = null;

	}



	/*=============================================
	MOSTRAR EQUIPOS CUANDO ESTE REPETIDO A LA HORA DE HACER UN MANTENIMIENTO
=============================================*/

	// static public function mdlMostrarEquiposRepetido($tabla, $item, $valor){

	// 	if($item != null){

	// 		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

	// 		$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

	// 		$stmt -> execute();

	// 		return $stmt -> fetch();
	// 	}

	// 	if($stmt->execute() != ""){
	// 		return "ok";
	// 	}else{
	// 		return "error";
	// 	}


	// 	$stmt -> close();
 
	// 	$stmt = null;
 
	// }

/*=============================================
	MOSTRAR EQUIPOS 
=============================================*/

	static public function mdlMostrarEquipos($tabla, $item, $valor,$orden,$select){

		if($item != null){

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();
 
			return $stmt -> fetch();

		}else if ($select != null) 
		{
			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $select = :$select");

			$stmt -> bindParam(":".$select, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetchAll();
		}
		else
		{

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla ORDER BY $orden DESC");

			$stmt -> execute();

			return $stmt -> fetchAll();

		}

		$stmt -> close();
 
		$stmt = null;

	}


		/*=============================================
	EDITAR EQUIPO
	=============================================*/

	static public function mdlEditarEquipo($tabla, $datos){
 
		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET id_usuario = :id_usuario, equipo = :equipo, modelo = :modelo, serie = :serie ,  marcaText = :marcaText, observaciones = :observaciones, mediciones = :mediciones, codigo = :codigo  WHERE id_equipo = :id_equipo");

		$stmt->bindParam(":id_usuario", $datos["id_usuario"], PDO::PARAM_INT);
		$stmt->bindParam(":id_equipo", $datos["id_equipo"], PDO::PARAM_INT);
		$stmt->bindParam(":equipo", $datos["equipo"], PDO::PARAM_STR);
		$stmt->bindParam(":modelo", $datos["modelo"], PDO::PARAM_STR);
		$stmt->bindParam(":serie", $datos["serie"], PDO::PARAM_STR);
		$stmt->bindParam(":marcaText", $datos["marcaText"], PDO::PARAM_STR);
		$stmt->bindParam(":observaciones", $datos["observaciones"], PDO::PARAM_STR);
		$stmt->bindParam(":mediciones", $datos["mediciones"], PDO::PARAM_STR);
		$stmt->bindParam(":codigo", $datos["codigo"], PDO::PARAM_STR);


		if($stmt->execute()){

			return "ok";

		}else{

			return "error";
		
		}

		$stmt->close();
		$stmt = null;

	}


		/*=============================================
	ELIMINAR EQUIPO
	=============================================*/

	static public function mdlEliminarEquipo($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id_equipo = :id_equipo");

		$stmt -> bindParam(":id_equipo", $datos, PDO::PARAM_INT);

		if($stmt -> execute()){

			return "ok";
		
		}else{

			return "error";	

		}

		$stmt -> close();

		$stmt = null;

	}

	
	/*=============================================
	ACTUALIZAR EQUIPO CON OBSERVACIONES
	=============================================*/

	static public function mdlActualizarEquipo($tabla, $item1, $valor1, $item2, $valor2){

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET $item1 = :$item1 WHERE $item2 = :$item2");

		$stmt -> bindParam(":".$item1, $valor1, PDO::PARAM_STR);
		$stmt -> bindParam(":".$item2, $valor2, PDO::PARAM_STR);

		if($stmt -> execute()){

			return "ok";
		
		}else{

			return "error";	

		}

		$stmt -> close();

		$stmt = null;

	}

	/*=============================================
	INSERTAR CRONOGRAMA Y ACTUALIZAR TRABAJOS REALIZADOS E INSTRUMENTOS
	=============================================*/

	static public function mdlActualizarEquipoCronograma($tabla, $item1, $valor1, $item2, $valor2,$item3, $valor3){

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET $item1 = :$item1 , $item3 = :$item3 WHERE $item2 = :$item2");

		$stmt -> bindParam(":".$item1, $valor1, PDO::PARAM_STR);
		$stmt -> bindParam(":".$item2, $valor2, PDO::PARAM_STR);
		$stmt -> bindParam(":".$item3, $valor3, PDO::PARAM_STR);

		if($stmt -> execute()){

			return "ok";
		
		}else{

			return "error";	

		}

		$stmt -> close();

		$stmt = null;

	}

	/*=============================================
	INSERTAR NUMERO DE REPORTES EN LA TABLA EQUIPOS DEL CRONOGRAMA
	=============================================*/

	static public function mdlActualizarEquipoReporte($tabla, $item1, $valor1, $item2, $valor2,$item3, $valor3){

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET $item1 = :$item1 , $item3 = :$item3 WHERE $item2 = :$item2");

		$stmt -> bindParam(":".$item1, $valor1, PDO::PARAM_STR);
		$stmt -> bindParam(":".$item2, $valor2, PDO::PARAM_STR);
		$stmt -> bindParam(":".$item3, $valor3, PDO::PARAM_STR);

		if($stmt -> execute()){

			return "ok";
		
		}else{

			return "error";	

		}

		$stmt -> close();

		$stmt = null;

	}

	/*=============================================
	ACTUALIZAR EL NUMERO DE REPORTE A 0 CUANDO SE ELIMINE EL MANTENIMIENTO EN EL CRONOGRAMA
	=============================================*/

	static public function mdlActualizarCeroCronograma($tabla, $item1, $valor1, $item2, $valor2,$item3,$valor3){

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET $item1 = :$item1, $item2 = :$item2 WHERE $item3 = :$item3");

		$stmt -> bindParam(":".$item1, $valor1, PDO::PARAM_STR);
		$stmt -> bindParam(":".$item2, $valor2, PDO::PARAM_STR);
		$stmt -> bindParam(":".$item3, $valor3, PDO::PARAM_STR);


		if($stmt -> execute()){

			return "ok";
		
		}else{

			return "error";	

		}

		$stmt -> close();

		$stmt = null;

	}


}

