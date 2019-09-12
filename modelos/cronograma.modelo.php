<?php

require_once "conexion.php"; 

class ModeloCronograma   
{ 
	static public function mdlCrearCronograma($tabla, $datos)
	{
		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(cliente,equipo,marca,modelo,serie1,reporte,fecha_programacion,observacion,enero,febrero,marzo,abril,mayo,junio,julio,agosto,septiembre,octubre,noviembre,diciembre,tiempo,codigo2) VALUES (:cliente, :equipo, :marca, :modelo,:serie1, :reporte, :fecha_programacion,:observacion,:enero, :febrero, :marzo,:abril,:mayo,:junio,:julio,:agosto,:septiembre,:octubre,:noviembre,:diciembre,:tiempo,:codigo2)");

		$stmt->bindParam(":cliente", $datos["cliente"], PDO::PARAM_STR);
		$stmt->bindParam(":equipo", $datos["equipo"], PDO::PARAM_STR);
		$stmt->bindParam(":marca", $datos["marca"], PDO::PARAM_STR);
		$stmt->bindParam(":modelo", $datos["modelo"], PDO::PARAM_STR);
		$stmt->bindParam(":serie1", $datos["serie1"], PDO::PARAM_STR);
		$stmt->bindParam(":reporte", $datos["reporte"], PDO::PARAM_STR);
		$stmt->bindParam(":fecha_programacion", $datos["fecha_programacion"], PDO::PARAM_STR);
		$stmt->bindParam(":observacion", $datos["observacion"], PDO::PARAM_STR);
		$stmt->bindParam(":enero", $datos["enero"], PDO::PARAM_STR);
		$stmt->bindParam(":febrero", $datos["febrero"], PDO::PARAM_STR);
		$stmt->bindParam(":marzo", $datos["marzo"], PDO::PARAM_STR);
		$stmt->bindParam(":abril", $datos["abril"], PDO::PARAM_STR);
		$stmt->bindParam(":mayo", $datos["mayo"], PDO::PARAM_STR);
		$stmt->bindParam(":junio", $datos["junio"], PDO::PARAM_STR);
		$stmt->bindParam(":julio", $datos["julio"], PDO::PARAM_STR);
		$stmt->bindParam(":agosto", $datos["agosto"], PDO::PARAM_STR);
		$stmt->bindParam(":septiembre", $datos["septiembre"], PDO::PARAM_STR);
		$stmt->bindParam(":octubre", $datos["octubre"], PDO::PARAM_STR);
		$stmt->bindParam(":noviembre", $datos["noviembre"], PDO::PARAM_STR);
		$stmt->bindParam(":diciembre", $datos["diciembre"], PDO::PARAM_STR);
		$stmt->bindParam(":tiempo", $datos["tiempo"], PDO::PARAM_STR);
		$stmt->bindParam(":codigo2", $datos["codigo2"], PDO::PARAM_STR);
		

		if($stmt->execute()){

			return "ok";	

		}else{

			return "error";
		
		}
 
		$stmt->close();
		 
		$stmt = null;
	}
	
	static public function mdlCrearCronogramaPeriodo($tabla, $datos)
	{
		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(cliente,equipo,marca,modelo,serie1,observacion,enero,febrero,marzo,abril,mayo,junio,julio,agosto,septiembre,octubre,noviembre,diciembre,tiempo,codigo2) VALUES (:cliente, :equipo, :marca, :modelo,:serie1,:observacion,:enero, :febrero, :marzo,:abril,:mayo,:junio,:julio,:agosto,:septiembre,:octubre,:noviembre,:diciembre,:tiempo,:codigo2)");

		$stmt->bindParam(":cliente", $datos["cliente"], PDO::PARAM_STR);
		$stmt->bindParam(":equipo", $datos["equipo"], PDO::PARAM_STR);
		$stmt->bindParam(":marca", $datos["marca"], PDO::PARAM_STR);
		$stmt->bindParam(":modelo", $datos["modelo"], PDO::PARAM_STR);
		$stmt->bindParam(":serie1", $datos["serie1"], PDO::PARAM_STR);
		$stmt->bindParam(":observacion", $datos["observacion"], PDO::PARAM_STR);
		$stmt->bindParam(":enero", $datos["enero"], PDO::PARAM_STR);
		$stmt->bindParam(":febrero", $datos["febrero"], PDO::PARAM_STR);
		$stmt->bindParam(":marzo", $datos["marzo"], PDO::PARAM_STR);
		$stmt->bindParam(":abril", $datos["abril"], PDO::PARAM_STR);
		$stmt->bindParam(":mayo", $datos["mayo"], PDO::PARAM_STR);
		$stmt->bindParam(":junio", $datos["junio"], PDO::PARAM_STR);
		$stmt->bindParam(":julio", $datos["julio"], PDO::PARAM_STR);
		$stmt->bindParam(":agosto", $datos["agosto"], PDO::PARAM_STR);
		$stmt->bindParam(":septiembre", $datos["septiembre"], PDO::PARAM_STR);
		$stmt->bindParam(":octubre", $datos["octubre"], PDO::PARAM_STR);
		$stmt->bindParam(":noviembre", $datos["noviembre"], PDO::PARAM_STR);
		$stmt->bindParam(":diciembre", $datos["diciembre"], PDO::PARAM_STR);
		$stmt->bindParam(":tiempo", $datos["tiempo"], PDO::PARAM_STR);
		$stmt->bindParam(":codigo2", $datos["codigo2"], PDO::PARAM_STR);
		

		if($stmt->execute()){

			return "ok";	

		}else{

			return "error";
		
		}
 
		$stmt->close();
		 
		$stmt = null;
	}

//Crear el cronograma cuando se envia desde un mantenimiento
	static public function mdlCrearCronogramaMantenimiento($tabla, $datos)
	{
		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(cliente,equipo,marca,modelo,serie1,reporte,fecha_programacion,mes_servicio,mantenimiento) VALUES (:cliente, :equipo, :marca, :modelo,:serie1, :reporte, :fecha_programacion,:mes_servicio,:mantenimiento)");

		$stmt->bindParam(":cliente", $datos["cliente"], PDO::PARAM_STR);
		$stmt->bindParam(":equipo", $datos["equipo"], PDO::PARAM_STR);
		$stmt->bindParam(":marca", $datos["marca"], PDO::PARAM_STR);
		$stmt->bindParam(":modelo", $datos["modelo"], PDO::PARAM_STR);
		$stmt->bindParam(":serie1", $datos["serie1"], PDO::PARAM_STR);
		$stmt->bindParam(":reporte", $datos["reporte"], PDO::PARAM_STR);
		$stmt->bindParam(":fecha_programacion", $datos["fecha_programacion"], PDO::PARAM_STR);
		$stmt->bindParam(":mes_servicio", $datos["mes_servicio"], PDO::PARAM_STR);
		$stmt->bindParam(":mantenimiento", $datos["mantenimiento"], PDO::PARAM_STR);
		
	

		if($stmt->execute()){

			return "ok";	

		}else{

			return "error";
		
		}
 
		$stmt->close();
		 
		$stmt = null;
	}
	///MOSTRAMOS EL CRONOGRAMA INSERTAR LOS DATOS AL MANTENIMIENTO
	static public function mdlMostrarCronogramaPeriodo($tabla, $item, $valor,$item2,$valor2){
		

	if($item != null){

		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item AND $item2 = :$item2");
		$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);
		$stmt -> bindParam(":".$item2, $valor2, PDO::PARAM_STR);

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
	
	
	///MOSTRAMOS EL CRONOGRAMA PARA VALIDAR EL AÑO(CAMPO AÑO EN AGREGAR CRONOGRAMA)
	static public function mdlMostrarCronogramaPeriodoSerie($tabla, $item, $valor,$item2,$valor2){
		

	if($item != null){

		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item AND $item2 = :$item2");
		$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);
		$stmt -> bindParam(":".$item2, $valor2, PDO::PARAM_STR);

		$stmt -> execute();

		return $stmt -> fetch();

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

	static public function mdlMostrarCronograma($tabla, $item, $valor,$select){

	if($item != null){

		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");
		$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

		$stmt -> execute();

		return $stmt -> fetch();

	}else if($select != null){

		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $select = :$select");

		$stmt -> bindParam(":".$select, $valor, PDO::PARAM_STR);

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


	//Esta Funcion es para crear el excel al usuario x año

	static public function mdlMostrarCronogramaExcelUsuarios($tabla, $item, $valor,$select,$select51,$valor51){

	if($item != null){

		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");
		$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

		$stmt -> execute();

		return $stmt -> fetch();

	}else if($select != null){

		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $select = :$select AND $select51 = :$select51");

		$stmt -> bindParam(":".$select, $valor, PDO::PARAM_STR);
		$stmt -> bindParam(":".$select51, $valor51, PDO::PARAM_STR);

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


	// static public function mdlMostrarCronogramaClientes($tabla){
	// 	$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla ORDER BY id_cliente");
	// 	$stmt -> execute();
		
	// 	return $stmt;
	// 	$stmt -> close();
	// 	$stmt = null;
	// }
	


	static public function mdlEditarCronograma($tabla, $datos){
	
		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET cliente = :cliente, equipo = :equipo, marca = :marca, modelo = :modelo, serie1 = :serie1 , observacion = :observacion, enero = :enero, febrero = :febrero, marzo = :marzo, abril = :abril, mayo = :mayo, junio = :junio, julio = :julio, agosto = :agosto, septiembre = :septiembre, octubre = :octubre, noviembre = :noviembre, diciembre = :diciembre, tiempo = :tiempo  WHERE id = :id");

		$stmt -> bindParam(":id", $datos["id"], PDO::PARAM_STR);
		$stmt -> bindParam(":cliente", $datos["cliente"], PDO::PARAM_STR);
		$stmt -> bindParam(":equipo", $datos["equipo"], PDO::PARAM_STR);
		$stmt -> bindParam(":marca", $datos["marca"], PDO::PARAM_STR);
		$stmt -> bindParam(":modelo", $datos["modelo"], PDO::PARAM_STR);
		$stmt -> bindParam(":serie1", $datos["serie1"], PDO::PARAM_STR);
		// $stmt -> bindParam(":mes_servicio", $datos["mes_servicio"], PDO::PARAM_STR);
		$stmt -> bindParam(":observacion", $datos["observacion"], PDO::PARAM_STR);
		$stmt -> bindParam(":enero", $datos["enero"], PDO::PARAM_STR);
		$stmt -> bindParam(":febrero", $datos["febrero"], PDO::PARAM_STR);
		$stmt -> bindParam(":marzo", $datos["marzo"], PDO::PARAM_STR);
		$stmt -> bindParam(":abril", $datos["abril"], PDO::PARAM_STR);
		$stmt -> bindParam(":mayo", $datos["mayo"], PDO::PARAM_STR);
		$stmt -> bindParam(":junio", $datos["junio"], PDO::PARAM_STR);
		$stmt -> bindParam(":julio", $datos["julio"], PDO::PARAM_STR);
		$stmt -> bindParam(":agosto", $datos["agosto"], PDO::PARAM_STR);
		$stmt -> bindParam(":septiembre", $datos["septiembre"], PDO::PARAM_STR);
		$stmt -> bindParam(":octubre", $datos["octubre"], PDO::PARAM_STR);
		$stmt -> bindParam(":noviembre", $datos["noviembre"], PDO::PARAM_STR);
		$stmt -> bindParam(":diciembre", $datos["diciembre"], PDO::PARAM_STR);
		$stmt -> bindParam(":tiempo", $datos["tiempo"], PDO::PARAM_STR);


		if($stmt -> execute()){

			return "ok";
		
		}else{

			return "error";	

		}

		$stmt -> close();

		$stmt = null;

	}

	static public function mdlBorrarCronograma($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id = :id");

		$stmt -> bindParam(":id", $datos, PDO::PARAM_INT);

		if($stmt -> execute()){

			return "ok";
		
		}else{

			return "error";	

		}

		$stmt -> close();

		$stmt = null;


	}


	/*=============================================
	ACTUALIZAR REPORTE CRONOGRAMA
	=============================================*/

	static public function mdlActualizarCronograma($tabla, $item1, $valor1, $valor){

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET $item1 = :$item1 WHERE  serie1 = :serie1");

		$stmt -> bindParam(":".$item1, $valor1, PDO::PARAM_STR);
		$stmt -> bindParam(":serie1", $valor, PDO::PARAM_STR);

		if($stmt -> execute()){

			return "ok";
		
		}else{

			return "error";	

		}

		$stmt -> close();

		$stmt = null;

	}


	/*=============================================
	INSERTAR EL REPORTE Y MES EN EL CRONOGRAMA(NO SE ESTA USANDO)
	=============================================*/

	static public function mdlActualizarReporteCronograma($tabla, $item1, $valor1, $item2, $valor2,$item3, $valor3,$item4,$valor4,$item5,$valor5){

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET $item1 = :$item1 , $item3 = :$item3 ,
			$item5 = :$item5, $item4 = :$item4 WHERE $item2 = :$item2");

		$stmt -> bindParam(":".$item1, $valor1, PDO::PARAM_STR);
		$stmt -> bindParam(":".$item2, $valor2, PDO::PARAM_STR);
		$stmt -> bindParam(":".$item3, $valor3, PDO::PARAM_STR);
		$stmt -> bindParam(":".$item4, $valor4, PDO::PARAM_STR);
		$stmt -> bindParam(":".$item5, $valor5, PDO::PARAM_STR);

		if($stmt -> execute()){

			return "ok";
		
		}else{

			return "error";	

		}

		$stmt -> close();

		$stmt = null;

	}


	/*=============================================
	INSERTAR EL Aﾃ前 DEL MANTENIMIENTO EN EL CRONOGRAMA
	=============================================*/

	static public function mdlActualizarReporteCronogramaPeriodo($tabla, $item2, $valor2, $item3, $valor3,$item4, $valor4){

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET $item4 = :$item4  WHERE $item2 = :$item2 AND $item3 = :$item3");

		$stmt -> bindParam(":".$item2, $valor2, PDO::PARAM_STR);
		$stmt -> bindParam(":".$item3, $valor3, PDO::PARAM_STR);
		$stmt -> bindParam(":".$item4, $valor4, PDO::PARAM_STR);

		if($stmt -> execute()){

			return "ok";
		
		}else{

			return "error";	

		}

		$stmt -> close();

		$stmt = null;

	}


	/*=============================================
	ACTUALIZAR CRONOGRAMA CON OBSERVACIONES
	=============================================*/

	static public function mdlActualizarCronogramaObservacion($tabla, $item1, $valor1, $item2, $valor2){

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
	INSERTAR EQUIPO,MARCA,MODELO Y SERIE CUANDO SE ACTUALICE EL EQUIPO DESDE LA VISTA EQUIPOS
	=============================================*/

	static public function mdlActualizarCronogramaEquipos($tabla2, $item2, $valor2,$item3,$valor3,$item4,$valor4,$item5,$valor5){

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla2 SET $item3 = :$item3 , $item4 = :$item4,
			$item5 = :$item5 WHERE $item2 = :$item2");

		$stmt -> bindParam(":".$item2, $valor2, PDO::PARAM_STR);
		$stmt -> bindParam(":".$item3, $valor3, PDO::PARAM_STR);
		$stmt -> bindParam(":".$item4, $valor4, PDO::PARAM_STR);
		$stmt -> bindParam(":".$item5, $valor5, PDO::PARAM_STR);

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

	static public function mdlRangoFechasCronograma($tabla, $fechaInicial, $fechaFinal,$perfil,$valor,$tiempo,$periodo){
 
	if ($perfil != null && $tiempo != null) {

		if($fechaInicial == null){

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $perfil = :perfil AND $tiempo = :tiempo ORDER BY cliente ASC");

			$stmt -> bindParam(":perfil", $valor, PDO::PARAM_STR);
			$stmt -> bindParam(":tiempo", $periodo, PDO::PARAM_STR);
 
			$stmt -> execute();

			return $stmt -> fetchAll();
 

		}
		else if($fechaInicial == $fechaFinal){

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $perfil = :perfil AND $tiempo = :tiempo  AND fecha_programacion like '%$fechaFinal%'");

			//$stmt -> bindParam(":fecha_inicio", $fechaFinal, PDO::PARAM_STR);
			$stmt -> bindParam(":perfil", $valor, PDO::PARAM_STR);
			$stmt -> bindParam(":tiempo", $periodo, PDO::PARAM_STR);

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

				$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $perfil = :perfil AND $tiempo = :tiempo AND fecha_programacion BETWEEN '$fechaInicial' AND '$fechaFinalMasUno' ");

					$stmt -> bindParam(":perfil", $valor, PDO::PARAM_STR);
					$stmt -> bindParam(":tiempo", $periodo, PDO::PARAM_STR);
 		
					$stmt -> execute();
		
					return $stmt -> fetchAll();

			}else{


				$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $perfil = :perfil AND $tiempo = :tiempo AND fecha_programacion BETWEEN '$fechaInicial' AND '$fechaFinal'");

					$stmt -> bindParam(":perfil", $valor, PDO::PARAM_STR);
					$stmt -> bindParam(":tiempo", $periodo, PDO::PARAM_STR);
 		
					$stmt -> execute();
		
					return $stmt -> fetchAll();

			}
		}
			
		}else if ($tiempo != "") {

		if($fechaInicial == null){

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $tiempo = :tiempo ORDER BY cliente ASC");

			$stmt -> bindParam(":tiempo", $periodo, PDO::PARAM_STR);
 
			$stmt -> execute();

			return $stmt -> fetchAll();
 

		}
		else if($fechaInicial == $fechaFinal){

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $tiempo = :tiempo AND fecha_programacion like '%$fechaFinal%'");

			//$stmt -> bindParam(":fecha_inicio", $fechaFinal, PDO::PARAM_STR);
			$stmt -> bindParam(":tiempo", $periodo, PDO::PARAM_STR);

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

				$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $tiempo = :tiempo AND fecha_programacion BETWEEN '$fechaInicial' AND '$fechaFinalMasUno' ");

					$stmt -> bindParam(":tiempo", $periodo, PDO::PARAM_STR);
 		
					$stmt -> execute();
		
					return $stmt -> fetchAll();

			}else{


				$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $tiempo = :tiempo AND fecha_programacion BETWEEN '$fechaInicial' AND '$fechaFinal'");

					$stmt -> bindParam(":tiempo", $periodo, PDO::PARAM_STR);
 		
					$stmt -> execute();
		
					return $stmt -> fetchAll();

			}
		}
		}else {

		if($fechaInicial == null){

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla ORDER BY cliente ASC");
 
			$stmt -> execute();

		}
		else if($fechaInicial == $fechaFinal){

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE fecha_programacion like '%$fechaFinal%'");

			$stmt -> bindParam(":fecha_programacion", $fechaFinal, PDO::PARAM_STR);

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

				$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE fecha_programacion BETWEEN '$fechaInicial' AND '$fechaFinalMasUno'");

			}else{

				$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE fecha_programacion BETWEEN '$fechaInicial' AND '$fechaFinal'");

			}
		}

	}

		
		$stmt -> execute();

		return $stmt -> fetchAll();
	}


}