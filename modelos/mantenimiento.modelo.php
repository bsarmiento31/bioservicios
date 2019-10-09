<?php
 
require_once "conexion.php"; 

/**  
 *     
 */  
class ModeloMantenimiento 
{ 

	//Registrar Mantenimiento cuando es un si en el reporte

	static public function mdlIngresarMantenimiento($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(id_clinica, id_usuarios, equipo_re, num_reporte, marca_re, modelo_re, sede ,serie,serieNueva,numero,tipo_manteniemiento,preventivo_problema, preventivo, reportado, cargo, solicitud, diagnostico, trabajo, instrumentos, recomendaciones, accesorios, equipo_servicio, servicio_motivo, equipo_evaluado, fecha_inicio, fecha_proximo,firma,firmarealizaMan,mediciones,mes,tiempo,codigo) VALUES (:id_clinica, :id_usuarios, :equipo_re,:num_reporte, :marca_re, :modelo_re, :sede ,:serie , :serieNueva, :numero, :tipo_manteniemiento, :preventivo_problema, :preventivo, :reportado, :cargo, :solicitud, :diagnostico, :trabajo, :instrumentos, :recomendaciones, :accesorios , :equipo_servicio, :servicio_motivo, :equipo_evaluado, :fecha_inicio, :fecha_proximo,:firma,:firmarealizaMan,:mediciones,:mes,:tiempo, :codigo)");

		$stmt->bindParam(":id_clinica", $datos["id_clinica"], PDO::PARAM_STR);
		$stmt->bindParam(":id_usuarios", $datos["id_usuarios"], PDO::PARAM_STR);
		$stmt->bindParam(":equipo_re", $datos["equipo_re"], PDO::PARAM_STR);
		$stmt->bindParam(":num_reporte", $datos["num_reporte"], PDO::PARAM_STR);
		$stmt->bindParam(":marca_re", $datos["marca_re"], PDO::PARAM_STR);
		$stmt->bindParam(":modelo_re", $datos["modelo_re"], PDO::PARAM_STR);
		$stmt->bindParam(":serie", $datos["serie"], PDO::PARAM_STR);
		$stmt->bindParam(":serieNueva", $datos["serieNueva"], PDO::PARAM_STR);
		$stmt->bindParam(":sede", $datos["sede"], PDO::PARAM_STR);

		$stmt->bindParam(":numero", $datos["numero"], PDO::PARAM_STR);
		$stmt->bindParam(":tipo_manteniemiento", $datos["tipo_manteniemiento"], PDO::PARAM_STR);
		$stmt->bindParam(":preventivo_problema", $datos["preventivo_problema"], PDO::PARAM_STR);
		$stmt->bindParam(":preventivo", $datos["preventivo"], PDO::PARAM_STR);
		$stmt->bindParam(":reportado", $datos["reportado"], PDO::PARAM_STR);
		$stmt->bindParam(":cargo", $datos["cargo"], PDO::PARAM_STR);

		$stmt->bindParam(":solicitud", $datos["solicitud"], PDO::PARAM_STR);
		$stmt->bindParam(":diagnostico", $datos["diagnostico"], PDO::PARAM_STR);
		$stmt->bindParam(":trabajo", $datos["trabajo"], PDO::PARAM_STR);
		$stmt->bindParam(":instrumentos", $datos["instrumentos"], PDO::PARAM_STR);
		$stmt->bindParam(":recomendaciones", $datos["recomendaciones"], PDO::PARAM_STR);
		$stmt->bindParam(":accesorios", $datos["accesorios"], PDO::PARAM_STR);

		$stmt->bindParam(":equipo_servicio", $datos["equipo_servicio"], PDO::PARAM_STR);
		$stmt->bindParam(":servicio_motivo", $datos["servicio_motivo"], PDO::PARAM_STR);
		$stmt->bindParam(":equipo_evaluado", $datos["equipo_evaluado"], PDO::PARAM_STR);
		$stmt->bindParam(":fecha_inicio", $datos["fecha_inicio"], PDO::PARAM_STR);
		$stmt->bindParam(":fecha_proximo", $datos["fecha_proximo"], PDO::PARAM_STR);
		$stmt->bindParam(":firma", $datos["firma"], PDO::PARAM_STR);
		$stmt->bindParam(":firmarealizaMan", $datos["firmarealizaMan"], PDO::PARAM_STR);
		$stmt->bindParam(":mediciones", $datos["mediciones"], PDO::PARAM_STR);
		$stmt->bindParam(":mes", $datos["mes"], PDO::PARAM_STR);
		$stmt->bindParam(":tiempo", $datos["tiempo"], PDO::PARAM_STR);
		$stmt->bindParam(":codigo", $datos["codigo"], PDO::PARAM_STR);

		if($stmt->execute()){
 
			return "ok";	

		}else{ 

			return "error";
		
		}

		$stmt->close();
		
		$stmt = null;

	}


    	//Esta Funcion es para crear el excel al usuario x año
static public function mdlMostrarMantenimientoExcelUsuarios($tabla, $item, $valor, $orden,$perfil,$select52,$valor52){

		if($item != null){ 

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);
 
			$stmt -> execute();

			return $stmt -> fetch();

		}else if ($perfil != null) {

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $perfil = :$perfil AND $select52 = :$select52");

			$stmt -> bindParam(":".$perfil, $valor, PDO::PARAM_STR);
			$stmt -> bindParam(":".$select52, $valor52, PDO::PARAM_STR);
 
			$stmt -> execute();

			return $stmt -> fetchAll();
		}
		else if($orden != null){

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla ORDER BY $orden DESC");

			$stmt -> execute();

			return $stmt -> fetchAll();

		}
		else
		{
			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");

			$stmt -> execute();

			return $stmt -> fetchAll();
		}

		$stmt -> close();

		$stmt = null;

}



	//Registrar Mantenimiento cuando es un no en el reporte

	static public function mdlIngresarMantenimientono($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(id_clinica, id_usuarios, equipo_re, num_reporte, marca_re, modelo_re, sede ,serie,serieNueva,numero,tipo_manteniemiento,preventivo_problema, preventivo, reportado, cargo, solicitud, diagnostico, trabajo, instrumentos, recomendaciones, accesorios, equipo_servicio, servicio_motivo, equipo_evaluado, fecha_inicio, fecha_proximo,firma,firmarealizaMan,mediciones,mes) VALUES (:id_clinica, :id_usuarios, :equipo_re,:num_reporte, :marca_re, :modelo_re, :sede ,:serie , :serieNueva, :numero, :tipo_manteniemiento, :preventivo_problema, :preventivo, :reportado, :cargo, :solicitud, :diagnostico, :trabajo, :instrumentos, :recomendaciones, :accesorios , :equipo_servicio, :servicio_motivo, :equipo_evaluado, :fecha_inicio, :fecha_proximo,:firma,:firmarealizaMan,:mediciones,:mes)");

		$stmt->bindParam(":id_clinica", $datos["id_clinica"], PDO::PARAM_STR);
		$stmt->bindParam(":id_usuarios", $datos["id_usuarios"], PDO::PARAM_STR);
		$stmt->bindParam(":equipo_re", $datos["equipo_re"], PDO::PARAM_STR);
		$stmt->bindParam(":num_reporte", $datos["num_reporte"], PDO::PARAM_STR);
		$stmt->bindParam(":marca_re", $datos["marca_re"], PDO::PARAM_STR);
		$stmt->bindParam(":modelo_re", $datos["modelo_re"], PDO::PARAM_STR);
		$stmt->bindParam(":serie", $datos["serie"], PDO::PARAM_STR);
		$stmt->bindParam(":serieNueva", $datos["serieNueva"], PDO::PARAM_STR);
		$stmt->bindParam(":sede", $datos["sede"], PDO::PARAM_STR);

		$stmt->bindParam(":numero", $datos["numero"], PDO::PARAM_STR);
		$stmt->bindParam(":tipo_manteniemiento", $datos["tipo_manteniemiento"], PDO::PARAM_STR);
		$stmt->bindParam(":preventivo_problema", $datos["preventivo_problema"], PDO::PARAM_STR);
		$stmt->bindParam(":preventivo", $datos["preventivo"], PDO::PARAM_STR);
		$stmt->bindParam(":reportado", $datos["reportado"], PDO::PARAM_STR);
		$stmt->bindParam(":cargo", $datos["cargo"], PDO::PARAM_STR);

		$stmt->bindParam(":solicitud", $datos["solicitud"], PDO::PARAM_STR);
		$stmt->bindParam(":diagnostico", $datos["diagnostico"], PDO::PARAM_STR);
		$stmt->bindParam(":trabajo", $datos["trabajo"], PDO::PARAM_STR);
		$stmt->bindParam(":instrumentos", $datos["instrumentos"], PDO::PARAM_STR);
		$stmt->bindParam(":recomendaciones", $datos["recomendaciones"], PDO::PARAM_STR);
		$stmt->bindParam(":accesorios", $datos["accesorios"], PDO::PARAM_STR);

		$stmt->bindParam(":equipo_servicio", $datos["equipo_servicio"], PDO::PARAM_STR);
		$stmt->bindParam(":servicio_motivo", $datos["servicio_motivo"], PDO::PARAM_STR);
		$stmt->bindParam(":equipo_evaluado", $datos["equipo_evaluado"], PDO::PARAM_STR);
		$stmt->bindParam(":fecha_inicio", $datos["fecha_inicio"], PDO::PARAM_STR);
		$stmt->bindParam(":fecha_proximo", $datos["fecha_proximo"], PDO::PARAM_STR);
		$stmt->bindParam(":firma", $datos["firma"], PDO::PARAM_STR);
		$stmt->bindParam(":firmarealizaMan", $datos["firmarealizaMan"], PDO::PARAM_STR);
		$stmt->bindParam(":mediciones", $datos["mediciones"], PDO::PARAM_STR);
		$stmt->bindParam(":mes", $datos["mes"], PDO::PARAM_STR);

		if($stmt->execute()){
 
			return "ok";	

		}else{ 

			return "error";
		
		}

		$stmt->close();
		
		$stmt = null;

	}


		//Registrar solo el mes, numero de reporte y la serie del mantenimiento en la tabla reportesiserie(Si es preventivo)

	// static public function mdlIngresarMantenimientoserie($tabla, $datos){

	// 	$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(serie, num_reporte, mes) VALUES  (:serie, :num_reporte,:mes)");

	// 	$stmt->bindParam(":serie", $datos["serie"], PDO::PARAM_STR);
	// 	$stmt->bindParam(":num_reporte", $datos["num_reporte"], PDO::PARAM_STR);
	// 	$stmt->bindParam(":mes", $datos["mes"], PDO::PARAM_STR);

	// 	if($stmt->execute()){
 
	// 		return "ok";	

	// 	}else{ 

	// 		return "error";
		
	// 	}

	// 	$stmt->close();
		
	// 	$stmt = null;

	// }

	/*=============================================
	MOSTRAR MANTENINIMIENTOS CON EL SI
	=============================================*/


	

	static public function mdlMostrarMantenimiento($tabla, $item, $valor, $orden,$perfil){

		if($item != null){ 

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);
 
			$stmt -> execute();

			return $stmt -> fetch();

		}else if ($perfil != null) {

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $perfil = :$perfil");

			$stmt -> bindParam(":".$perfil, $valor, PDO::PARAM_STR);
 
			$stmt -> execute();

			return $stmt -> fetchAll();
		}
		else if($orden != null){

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla ORDER BY $orden DESC");

			$stmt -> execute();

			return $stmt -> fetchAll();

		}
		else
		{
			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");

			$stmt -> execute();

			return $stmt -> fetchAll();
		}

		$stmt -> close();

		$stmt = null;

}


/*=============================================
	MOSTRAR MANTENIMIENTOS CON EL NO
	=============================================*/

	static public function mdlMostrarMantenimientono($tabla, $item, $valor, $orden,$perfil){

		if($item != null){ 

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);
 
			$stmt -> execute();

			return $stmt -> fetch();

		}else if ($perfil != null) {

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $perfil = :$perfil");

			$stmt -> bindParam(":".$perfil, $valor, PDO::PARAM_STR);
 
			$stmt -> execute();

			return $stmt -> fetchAll();
		}
		else if($orden != null){

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla ORDER BY $orden DESC");

			$stmt -> execute();

			return $stmt -> fetchAll();

		}
		else
		{
			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");

			$stmt -> execute();

			return $stmt -> fetchAll();
		}

		$stmt -> close();

		$stmt = null;

}

static public function mdlEditarMantenimiento($tabla, $datos){
	
		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET id_clinica = :id_clinica, equipo_re = :equipo_re, num_reporte = :num_reporte, marca_re = :marca_re, modelo_re = :modelo_re, sede = :sede, serie = :serie, serieNueva = :serieNueva, numero = :numero, tipo_manteniemiento = :tipo_manteniemiento, preventivo_problema = :preventivo_problema, preventivo = :preventivo, reportado = :reportado, cargo = :cargo, solicitud = :solicitud, diagnostico = :diagnostico, trabajo = :trabajo, instrumentos = :instrumentos, recomendaciones = :recomendaciones, accesorios = :accesorios, equipo_servicio = :equipo_servicio, servicio_motivo = :servicio_motivo, equipo_evaluado = :equipo_evaluado, fecha_inicio = :fecha_inicio, fecha_proximo = :fecha_proximo, firma =:firma, firmarealizaMan = :firmarealizaMan, codigo = :codigo WHERE id_reporte = :id_reporte");

		$stmt->bindParam(":id_reporte", $datos["id_reporte"], PDO::PARAM_STR);
		$stmt->bindParam(":id_clinica", $datos["id_clinica"], PDO::PARAM_STR);
		$stmt->bindParam(":equipo_re", $datos["equipo_re"], PDO::PARAM_STR);
		$stmt->bindParam(":num_reporte", $datos["num_reporte"], PDO::PARAM_STR);
		$stmt->bindParam(":marca_re", $datos["marca_re"], PDO::PARAM_STR);
		$stmt->bindParam(":modelo_re", $datos["modelo_re"], PDO::PARAM_STR);
		$stmt->bindParam(":serie", $datos["serie"], PDO::PARAM_STR);
		$stmt->bindParam(":serieNueva", $datos["serieNueva"], PDO::PARAM_STR);
		$stmt->bindParam(":sede", $datos["sede"], PDO::PARAM_STR);  

		$stmt->bindParam(":numero", $datos["numero"], PDO::PARAM_STR); 
		$stmt->bindParam(":tipo_manteniemiento", $datos["tipo_manteniemiento"], PDO::PARAM_STR);
		$stmt->bindParam(":preventivo_problema", $datos["preventivo_problema"], PDO::PARAM_STR);
		$stmt->bindParam(":preventivo", $datos["preventivo"], PDO::PARAM_STR);
		$stmt->bindParam(":reportado", $datos["reportado"], PDO::PARAM_STR);
		$stmt->bindParam(":cargo", $datos["cargo"], PDO::PARAM_STR);

		$stmt->bindParam(":solicitud", $datos["solicitud"], PDO::PARAM_STR);
		$stmt->bindParam(":diagnostico", $datos["diagnostico"], PDO::PARAM_STR);
		$stmt->bindParam(":trabajo", $datos["trabajo"], PDO::PARAM_STR);
		$stmt->bindParam(":instrumentos", $datos["instrumentos"], PDO::PARAM_STR);
		$stmt->bindParam(":recomendaciones", $datos["recomendaciones"], PDO::PARAM_STR);
		$stmt->bindParam(":accesorios", $datos["accesorios"], PDO::PARAM_STR);

		$stmt->bindParam(":equipo_servicio", $datos["equipo_servicio"], PDO::PARAM_STR);
		$stmt->bindParam(":servicio_motivo", $datos["servicio_motivo"], PDO::PARAM_STR);
		$stmt->bindParam(":equipo_evaluado", $datos["equipo_evaluado"], PDO::PARAM_STR);
		$stmt->bindParam(":fecha_inicio", $datos["fecha_inicio"], PDO::PARAM_STR);
		$stmt->bindParam(":fecha_proximo", $datos["fecha_proximo"], PDO::PARAM_STR);
		$stmt->bindParam(":firma", $datos["firma"], PDO::PARAM_STR);
		$stmt->bindParam(":firmarealizaMan", $datos["firmarealizaMan"], PDO::PARAM_STR);
		$stmt->bindParam(":codigo", $datos["codigo"], PDO::PARAM_STR);
		

		if($stmt -> execute()){

			return "ok";
		
		}else{

			return "error";	

		}

		$stmt -> close();

		$stmt = null;

	}


	static public function mdlEditarMantenimientono($tabla, $datos){
	
		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET id_clinica = :id_clinica, equipo_re = :equipo_re, num_reporte = :num_reporte, marca_re = :marca_re, modelo_re = :modelo_re, sede = :sede, serie = :serie, serieNueva = :serieNueva, numero = :numero, tipo_manteniemiento = :tipo_manteniemiento, preventivo_problema = :preventivo_problema, preventivo = :preventivo, reportado = :reportado, cargo = :cargo, solicitud = :solicitud, diagnostico = :diagnostico, trabajo = :trabajo, instrumentos = :instrumentos, recomendaciones = :recomendaciones, accesorios = :accesorios, equipo_servicio = :equipo_servicio, servicio_motivo = :servicio_motivo, equipo_evaluado = :equipo_evaluado, fecha_inicio = :fecha_inicio, fecha_proximo = :fecha_proximo, firma =:firma, firmarealizaMan = :firmarealizaMan WHERE id_reporte = :id_reporte");

		$stmt->bindParam(":id_reporte", $datos["id_reporte"], PDO::PARAM_STR);
		$stmt->bindParam(":id_clinica", $datos["id_clinica"], PDO::PARAM_STR);
		$stmt->bindParam(":equipo_re", $datos["equipo_re"], PDO::PARAM_STR);
		$stmt->bindParam(":num_reporte", $datos["num_reporte"], PDO::PARAM_STR);
		$stmt->bindParam(":marca_re", $datos["marca_re"], PDO::PARAM_STR);
		$stmt->bindParam(":modelo_re", $datos["modelo_re"], PDO::PARAM_STR);
		$stmt->bindParam(":serie", $datos["serie"], PDO::PARAM_STR);
		$stmt->bindParam(":serieNueva", $datos["serieNueva"], PDO::PARAM_STR);
		$stmt->bindParam(":sede", $datos["sede"], PDO::PARAM_STR);  

		$stmt->bindParam(":numero", $datos["numero"], PDO::PARAM_STR); 
		$stmt->bindParam(":tipo_manteniemiento", $datos["tipo_manteniemiento"], PDO::PARAM_STR);
		$stmt->bindParam(":preventivo_problema", $datos["preventivo_problema"], PDO::PARAM_STR);
		$stmt->bindParam(":preventivo", $datos["preventivo"], PDO::PARAM_STR);
		$stmt->bindParam(":reportado", $datos["reportado"], PDO::PARAM_STR);
		$stmt->bindParam(":cargo", $datos["cargo"], PDO::PARAM_STR);

		$stmt->bindParam(":solicitud", $datos["solicitud"], PDO::PARAM_STR);
		$stmt->bindParam(":diagnostico", $datos["diagnostico"], PDO::PARAM_STR);
		$stmt->bindParam(":trabajo", $datos["trabajo"], PDO::PARAM_STR);
		$stmt->bindParam(":instrumentos", $datos["instrumentos"], PDO::PARAM_STR);
		$stmt->bindParam(":recomendaciones", $datos["recomendaciones"], PDO::PARAM_STR);
		$stmt->bindParam(":accesorios", $datos["accesorios"], PDO::PARAM_STR);

		$stmt->bindParam(":equipo_servicio", $datos["equipo_servicio"], PDO::PARAM_STR);
		$stmt->bindParam(":servicio_motivo", $datos["servicio_motivo"], PDO::PARAM_STR);
		$stmt->bindParam(":equipo_evaluado", $datos["equipo_evaluado"], PDO::PARAM_STR);
		$stmt->bindParam(":fecha_inicio", $datos["fecha_inicio"], PDO::PARAM_STR);
		$stmt->bindParam(":fecha_proximo", $datos["fecha_proximo"], PDO::PARAM_STR);
		$stmt->bindParam(":firma", $datos["firma"], PDO::PARAM_STR);
		$stmt->bindParam(":firmarealizaMan", $datos["firmarealizaMan"], PDO::PARAM_STR);
		

		if($stmt -> execute()){

			return "ok";
		
		}else{

			return "error";	

		}

		$stmt -> close();

		$stmt = null;

	}


	/*=============================================
	ACTUALIZAR FIRMA CON EL SI
	=============================================*/

	static public function mdlActualizarFirmaMantenimiento($tabla, $item1, $valor1, $item2, $valor2){

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
	ELIMINAR MANTENIMIENO SI
	=============================================*/

	static public function mdlEliminarMantenimiento($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id_reporte = :id_reporte");

		$stmt -> bindParam(":id_reporte", $datos, PDO::PARAM_INT);

		if($stmt -> execute()){

			return "ok";
		
		}else{

			return "error";	

		}

		$stmt -> close();

		$stmt = null; 

	} 


	/*=============================================
	ELIMINAR MANTENIMIENO NO
	=============================================*/

	static public function mdlEliminarMantenimientono($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id_reporte = :id_reporte");

		$stmt -> bindParam(":id_reporte", $datos, PDO::PARAM_INT);

		if($stmt -> execute()){

			return "ok";
		
		}else{

			return "error";	

		}

		$stmt -> close();

		$stmt = null; 

	}
 

	/*=============================================
	RANGO DE FECHA
	=============================================*/

	static public function mdlRangoFechasMantenimiento($tabla, $fechaInicial, $fechaFinal,$perfil,$valor){
 
	if ($perfil != null) {

		if($fechaInicial == null){

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $perfil = :perfil ORDER BY id_reporte DESC");

			$stmt -> bindParam(":perfil", $valor, PDO::PARAM_STR);
 
			$stmt -> execute();

			return $stmt -> fetchAll();
 

		}
		else if($fechaInicial == $fechaFinal){

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $perfil = :perfil AND fecha_inicio like '%$fechaFinal%' ORDER BY id_reporte DESC");

			//$stmt -> bindParam(":fecha_inicio", $fechaFinal, PDO::PARAM_STR);
			$stmt -> bindParam(":perfil", $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetchAll();
		}
		else{

			$fechaActual = new DateTime();
			$fechaActual ->add(new DateInterval("P1D"));
			$fechaActualMasUno = $fechaActual->format("Y-m-d");

			$fechaFinal2 = new DateTime($fechaFinal);
			$fechaFinal2 ->add(new DateInterval("P1D"));
			$fechaFinalMasUno = $fechaFinal2->format("Y-m-d");

			if($fechaFinalMasUno == $fechaActualMasUno){

				$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $perfil = :perfil AND fecha_inicio BETWEEN '$fechaInicial' AND '$fechaFinalMasUno' ORDER BY id_reporte DESC");

					$stmt -> bindParam(":perfil", $valor, PDO::PARAM_STR);
 		
					$stmt -> execute();
		
					return $stmt -> fetchAll();

			}else{


				$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $perfil = :perfil AND fecha_inicio BETWEEN '$fechaInicial' AND '$fechaFinal' ORDER BY id_reporte DESC");

					$stmt -> bindParam(":perfil", $valor, PDO::PARAM_STR);
 		
					$stmt -> execute();
		
					return $stmt -> fetchAll();

			}
		}
			
		} 

		else {

		if($fechaInicial == null){

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla ORDER BY id_reporte DESC");
 
			$stmt -> execute();

			return $stmt -> fetchAll();


		}
		else if($fechaInicial == $fechaFinal){

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE fecha_inicio like '%$fechaFinal%' ORDER BY id_reporte DESC");

			$stmt -> bindParam(":fecha_inicio", $fechaFinal, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetchAll();
		}
		else{

			$fechaActual = new DateTime();
			$fechaActual ->add(new DateInterval("P1D"));
			$fechaActualMasUno = $fechaActual->format("Y-m-d");

			$fechaFinal2 = new DateTime($fechaFinal);
			$fechaFinal2 ->add(new DateInterval("P1D"));
			$fechaFinalMasUno = $fechaFinal2->format("Y-m-d");

			if($fechaFinalMasUno == $fechaActualMasUno){

				$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE fecha_inicio BETWEEN '$fechaInicial' AND '$fechaFinalMasUno' ORDER BY id_reporte DESC");

			}else{

				$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE fecha_inicio BETWEEN '$fechaInicial' AND '$fechaFinal' ORDER BY id_reporte DESC");

			}
		}

	}

		
		$stmt -> execute();

		return $stmt -> fetchAll();
	}


	/*=============================================
	RANGO DE FECHA NO PREVENTIVO
	=============================================*/

	static public function mdlRangoFechasMantenimientonopreventivo($tabla, $fechaInicial, $fechaFinal,$perfil,$valor){
 
	if ($perfil != null) {

		if($fechaInicial == null){

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $perfil = :perfil ORDER BY id_reporte DESC");

			$stmt -> bindParam(":perfil", $valor, PDO::PARAM_STR);
 
			$stmt -> execute();

			return $stmt -> fetchAll();
 

		}
		else if($fechaInicial == $fechaFinal){

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $perfil = :perfil AND fecha_inicio like '%$fechaFinal%' ORDER BY id_reporte DESC");

			//$stmt -> bindParam(":fecha_inicio", $fechaFinal, PDO::PARAM_STR);
			$stmt -> bindParam(":perfil", $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetchAll();
		}
		else{

			$fechaActual = new DateTime();
			$fechaActual ->add(new DateInterval("P1D"));
			$fechaActualMasUno = $fechaActual->format("Y-m-d");

			$fechaFinal2 = new DateTime($fechaFinal);
			$fechaFinal2 ->add(new DateInterval("P1D"));
			$fechaFinalMasUno = $fechaFinal2->format("Y-m-d");

			if($fechaFinalMasUno == $fechaActualMasUno){

				$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $perfil = :perfil AND fecha_inicio BETWEEN '$fechaInicial' AND '$fechaFinalMasUno' ORDER BY id_reporte DESC");

					$stmt -> bindParam(":perfil", $valor, PDO::PARAM_STR);
 		
					$stmt -> execute();
		
					return $stmt -> fetchAll();

			}else{


				$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $perfil = :perfil AND fecha_inicio BETWEEN '$fechaInicial' AND '$fechaFinal' ORDER BY id_reporte DESC");

					$stmt -> bindParam(":perfil", $valor, PDO::PARAM_STR);
 		
					$stmt -> execute();
		
					return $stmt -> fetchAll();

			}
		}
			
		} 

		else {

		if($fechaInicial == null){

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla ORDER BY id_reporte DESC");
 
			$stmt -> execute();

		}
		else if($fechaInicial == $fechaFinal){

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE fecha_inicio like '%$fechaFinal%' ORDER BY id_reporte DESC");

			$stmt -> bindParam(":fecha_inicio", $fechaFinal, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetchAll();
		}
		else{

			$fechaActual = new DateTime();
			$fechaActual ->add(new DateInterval("P1D"));
			$fechaActualMasUno = $fechaActual->format("Y-m-d");

			$fechaFinal2 = new DateTime($fechaFinal);
			$fechaFinal2 ->add(new DateInterval("P1D"));
			$fechaFinalMasUno = $fechaFinal2->format("Y-m-d");

			if($fechaFinalMasUno == $fechaActualMasUno){

				$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE fecha_inicio BETWEEN '$fechaInicial' AND '$fechaFinalMasUno' ORDER BY id_reporte DESC");

			}else{

				$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE fecha_inicio BETWEEN '$fechaInicial' AND '$fechaFinal' ORDER BY id_reporte DESC");

			}
		}

	}

		
		$stmt -> execute();

		return $stmt -> fetchAll();
	}



	/*=============================================
	RANGO DE FECHA PARA PROXIMO MANTENIMIENTO
	=============================================*/

	static public function mdlRangoFechasMantenimientoProximo($tabla, $fechaInicial, $fechaFinal,$perfil,$valor){
 
	if ($perfil != null) {

		if($fechaInicial == null){

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $perfil = :perfil ORDER BY id_reporte ASC");

			$stmt -> bindParam(":perfil", $valor, PDO::PARAM_STR);
 
			$stmt -> execute();

			return $stmt -> fetchAll();
 

		}
		else if($fechaInicial == $fechaFinal){

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $perfil = :perfil AND fecha_proximo like '%$fechaFinal%' ORDER BY id_reporte DESC");

			//$stmt -> bindParam(":fecha_inicio", $fechaFinal, PDO::PARAM_STR);
			$stmt -> bindParam(":perfil", $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetchAll();
		}
		else{

			$fechaActual = new DateTime();
			$fechaActual ->add(new DateInterval("P1D"));
			$fechaActualMasUno = $fechaActual->format("Y-m-d");

			$fechaFinal2 = new DateTime($fechaFinal);
			$fechaFinal2 ->add(new DateInterval("P1D"));
			$fechaFinalMasUno = $fechaFinal2->format("Y-m-d");

			if($fechaFinalMasUno == $fechaActualMasUno){

				$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $perfil = :perfil AND fecha_proximo BETWEEN '$fechaInicial' AND '$fechaFinalMasUno' ORDER BY id_reporte DESC");

					$stmt -> bindParam(":perfil", $valor, PDO::PARAM_STR);
 		
					$stmt -> execute();
		
					return $stmt -> fetchAll();

			}else{


				$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $perfil = :perfil AND fecha_proximo BETWEEN '$fechaInicial' AND '$fechaFinal' ORDER BY id_reporte DESC");

					$stmt -> bindParam(":perfil", $valor, PDO::PARAM_STR);
 		
					$stmt -> execute();
		
					return $stmt -> fetchAll();

			}
		}
			
		} 

		else {

		if($fechaInicial == null){

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla ORDER BY id_reporte DESC");
 
			$stmt -> execute();

		}
		else if($fechaInicial == $fechaFinal){

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE fecha_proximo like '%$fechaFinal%' ORDER BY id_reporte DESC");

			$stmt -> bindParam(":fecha_proximo", $fechaFinal, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetchAll();
		}
		else{

			$fechaActual = new DateTime();
			$fechaActual ->add(new DateInterval("P1D"));
			$fechaActualMasUno = $fechaActual->format("Y-m-d");

			$fechaFinal2 = new DateTime($fechaFinal);
			$fechaFinal2 ->add(new DateInterval("P1D"));
			$fechaFinalMasUno = $fechaFinal2->format("Y-m-d");

			if($fechaFinalMasUno == $fechaActualMasUno){

				$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE fecha_proximo BETWEEN '$fechaInicial' AND '$fechaFinalMasUno' ORDER BY id_reporte DESC");

			}else{

				$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE fecha_proximo BETWEEN '$fechaInicial' AND '$fechaFinal' ORDER BY id_reporte DESC");

			}
		}

	}

		
		$stmt -> execute();

		return $stmt -> fetchAll();
	}


	/*=============================================
	RANGO DE FECHA PARA PROXIMO MANTENIMIENTO NO PREVENTIVO
	=============================================*/

	static public function mdlRangoFechasMantenimientoProximonopreventivo($tabla, $fechaInicial, $fechaFinal,$perfil,$valor){
 
	if ($perfil != null) {

		if($fechaInicial == null){

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $perfil = :perfil ORDER BY id_reporte DESC");

			$stmt -> bindParam(":perfil", $valor, PDO::PARAM_STR);
 
			$stmt -> execute();

			return $stmt -> fetchAll();
 

		}
		else if($fechaInicial == $fechaFinal){

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $perfil = :perfil AND fecha_proximo like '%$fechaFinal%' ORDER BY id_reporte DESC");

			//$stmt -> bindParam(":fecha_inicio", $fechaFinal, PDO::PARAM_STR);
			$stmt -> bindParam(":perfil", $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetchAll();
		}
		else{

			$fechaActual = new DateTime();
			$fechaActual ->add(new DateInterval("P1D"));
			$fechaActualMasUno = $fechaActual->format("Y-m-d");

			$fechaFinal2 = new DateTime($fechaFinal);
			$fechaFinal2 ->add(new DateInterval("P1D"));
			$fechaFinalMasUno = $fechaFinal2->format("Y-m-d");

			if($fechaFinalMasUno == $fechaActualMasUno){

				$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $perfil = :perfil AND fecha_proximo BETWEEN '$fechaInicial' AND '$fechaFinalMasUno' ORDER BY id_reporte DESC");

					$stmt -> bindParam(":perfil", $valor, PDO::PARAM_STR);
 		
					$stmt -> execute();
		
					return $stmt -> fetchAll();

			}else{


				$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $perfil = :perfil AND fecha_proximo BETWEEN '$fechaInicial' AND '$fechaFinal' ORDER BY id_reporte DESC");

					$stmt -> bindParam(":perfil", $valor, PDO::PARAM_STR);
 		
					$stmt -> execute();
		
					return $stmt -> fetchAll();

			}
		}
			
		} 

		else {

		if($fechaInicial == null){

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla ORDER BY id_reporte DESC");
 
			$stmt -> execute();

		}
		else if($fechaInicial == $fechaFinal){

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE fecha_proximo like '%$fechaFinal%' ORDER BY id_reporte DESC");

			$stmt -> bindParam(":fecha_proximo", $fechaFinal, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetchAll();
		}
		else{

			$fechaActual = new DateTime();
			$fechaActual ->add(new DateInterval("P1D"));
			$fechaActualMasUno = $fechaActual->format("Y-m-d");

			$fechaFinal2 = new DateTime($fechaFinal);
			$fechaFinal2 ->add(new DateInterval("P1D"));
			$fechaFinalMasUno = $fechaFinal2->format("Y-m-d");

			if($fechaFinalMasUno == $fechaActualMasUno){

				$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE fecha_proximo BETWEEN '$fechaInicial' AND '$fechaFinalMasUno' ORDER BY id_reporte DESC");

			}else{

				$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE fecha_proximo BETWEEN '$fechaInicial' AND '$fechaFinal' ORDER BY id_reporte DESC");

			}
		}

	}

		
		$stmt -> execute();

		return $stmt -> fetchAll();
	}


	/*=============================================
	CONTAR TIPOS DE MANTENIMIENTOS
	=============================================*/	

	static public function mdlContarTiposMantenimiento($tabla,$perfil,$valor){ 

		if ($perfil != null) {

			$stmt = Conexion::conectar()->prepare("SELECT COUNT(numero) AS cantidad, tipo_manteniemiento  FROM $tabla WHERE numero=1 AND $perfil = :perfil GROUP BY tipo_manteniemiento");

			$stmt -> bindParam(":perfil", $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetchAll();

		}else{		

			$stmt = Conexion::conectar()->prepare("SELECT COUNT(numero) AS cantidad, tipo_manteniemiento  FROM $tabla WHERE numero=1 GROUP BY tipo_manteniemiento");
	
			$stmt -> execute();
	
			return $stmt -> fetchAll();

		}

		$stmt -> close();

		$stmt = null;
	} 

	/*=============================================
	CONTAR EQUIPOS DE MANTENIMIENTO
	=============================================*/	

	static public function mdlContarEquiposMantenimiento($tabla,$perfil,$valor){

		if ($perfil != null) {

			$stmt = Conexion::conectar()->prepare("SELECT COUNT(numero) AS cantidad, equipo_re  FROM $tabla WHERE numero=1 AND $perfil = :perfil GROUP BY equipo_re");

			$stmt -> bindParam(":perfil", $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetchAll();
		}else{

			$stmt = Conexion::conectar()->prepare("SELECT COUNT(numero) AS cantidad, equipo_re  FROM $tabla WHERE numero=1 GROUP BY equipo_re");

			$stmt -> execute();

			return $stmt -> fetchAll();

		}

		$stmt -> close();

		$stmt = null;
	}

	/*=============================================
	CONTAR TIPOS DE MANTENIMIENTO X CLIENTE
	=============================================*/	

	static public function mdlContarMantenimientosxcliente($tabla,$perfil,$valor){

			$stmt = Conexion::conectar()->prepare("SELECT id_clinica, tipo_manteniemiento ,COUNT(numero) AS cantidad FROM $tabla WHERE numero=1 GROUP BY tipo_manteniemiento
");

			$stmt -> execute();

			return $stmt -> fetchAll();
	

		$stmt -> close();

		$stmt = null;
	}
	
	
	static public function mdlMostrarMantenimiento2019($tabla, $item, $valor, $orden,$perfil,$tiempo,$valortiempo){

		if($item != null){ 

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);
 
			$stmt -> execute();

			return $stmt -> fetch();

		}else if ($perfil != null) {

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $perfil = :$perfil AND $tiempo = :$tiempo");

			$stmt -> bindParam(":".$perfil, $valor, PDO::PARAM_STR);
			$stmt -> bindParam(":".$tiempo, $valortiempo, PDO::PARAM_STR);
 
			$stmt -> execute();

			return $stmt -> fetchAll();
		}
		else if($orden != null){

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla ORDER BY $orden DESC");

			$stmt -> execute();

			return $stmt -> fetchAll();

		}
		else
		{
			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");

			$stmt -> execute();

			return $stmt -> fetchAll();
		}

		$stmt -> close();

		$stmt = null;

}


	static public function mdlMostrarMantenimiento2020($tabla, $item, $valor, $orden,$perfil,$tiempo,$valortiempo){

		if($item != null){ 

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);
 
			$stmt -> execute();

			return $stmt -> fetch();

		}else if ($perfil != null) {

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $perfil = :$perfil AND $tiempo = :$tiempo");

			$stmt -> bindParam(":".$perfil, $valor, PDO::PARAM_STR);
			$stmt -> bindParam(":".$tiempo, $valortiempo, PDO::PARAM_STR);
 
			$stmt -> execute();

			return $stmt -> fetchAll();
		}
		else if($orden != null){

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla ORDER BY $orden DESC");

			$stmt -> execute();

			return $stmt -> fetchAll();

		}
		else
		{
			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");

			$stmt -> execute();

			return $stmt -> fetchAll();
		}

		$stmt -> close();

		$stmt = null;

}


	static public function mdlMostrarMantenimiento2021($tabla, $item, $valor, $orden,$perfil,$tiempo,$valortiempo){

		if($item != null){ 

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);
 
			$stmt -> execute();

			return $stmt -> fetch();

		}else if ($perfil != null) {

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $perfil = :$perfil AND $tiempo = :$tiempo");

			$stmt -> bindParam(":".$perfil, $valor, PDO::PARAM_STR);
			$stmt -> bindParam(":".$tiempo, $valortiempo, PDO::PARAM_STR);
 
			$stmt -> execute();

			return $stmt -> fetchAll();
		}
		else if($orden != null){

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla ORDER BY $orden DESC");

			$stmt -> execute();

			return $stmt -> fetchAll();

		}
		else
		{
			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");

			$stmt -> execute();

			return $stmt -> fetchAll();
		}

		$stmt -> close();

		$stmt = null;

}

}