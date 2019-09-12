<?php
require_once "../../../controladores/mantenimiento.controlador.php";
require_once "../../../modelos/mantenimiento.modelo.php";

require_once "../../../controladores/clientes.controlador.php";
require_once "../../../modelos/clientes.modelo.php";
 

require_once "../../../controladores/usuarios.controlador.php";
require_once "../../../modelos/usuarios.modelo.php";

error_reporting(0);
 
class imprimirReporte{

public $reporte;

public function traerImpresionReporte(){


$itemReporte = "num_reporte";
$valorReporte = $this->reporte;
$orden = null;
$perfil = null;

$respuestaReporte = ControladorMantenimiento::ctrMostrarModelos($itemReporte, $valorReporte,$orden, $perfil);
$mediciones = json_decode($respuestaReporte["mediciones"],true);

//TRAEMOS LA INFORMACIÓN DEL CLIENTE

$item1 = "id";
$valor1 = $respuestaReporte["id_clinica"];
$perfil1 = null;

$clientes1 = ControladorUsuarios::ctrMostrarUsuarios($item1, $valor1, $perfil1);



//REQUERIMOS LA CLASE TCPDF

require_once('tcpdf_include.php');

$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

$pdf->startPageGroup();

$pdf->AddPage();

$bloque1 = <<<EOF

	<table>
		
		<tr>
			
			<td style="width:240px"><img src="images/logo.png"></td>

			<td style="background-color:white; width:300px;border-top: 0px white;">
				
				<div style="font-size:8.5px; text-align:right; line-height:12px;">
					
					<br>
					Venta <strong>mantenimiento</strong> y <strong>asesoría</strong> de equipos médicos

					<br>
					Soluciones <strong>Diseñadas</strong>

				</div>

			</td>


		</tr>

	</table>

EOF;

$pdf->writeHTML($bloque1, false, false, false, false, '');

$bloque2 = <<<EOF

	<table style="font-size:10px; padding:5px 10px;">

		<tr>

			<td style="color:#333; background-color:white; width:340px; text-align:center"></td>

			<td style="border-bottom: 1px solid white; background-color:white; width:100px; text-align:center"></td>

			<td style="border-bottom: 1px solid #666; color:#333; background-color:white; width:100px; text-align:center"></td>

		</tr>
		
		<tr>
		
			<td style="border-right: 1px solid #666; border-top: 1px solid white; color:#333; background-color:white; width:440px; text-align:center"></td>


			<td style="border: 1px solid #666; color:#333; background-color:white; width:100px; text-align:center;">No 
				$valorReporte
			</td>

		</tr>

		<tr>
		<td style="border-bottom: 1px solid white; background-color:white; width:540px"></td>
		</tr>

		<tr>
		<td style="font-weight: bold; font-size:13px; color:#e51d1d; border-bottom: 1px solid white; background-color:white; text-align:center; width:540px">REPORTE DE SERVICIO DE MANTENIMIENTO DE EQUIPOS MÉDICOS</td>
		</tr>
		<tr>
		<td style="background-color:white; width:540px"></td>
		</tr>
	</table>

EOF;

$pdf->writeHTML($bloque2, false, false, false, false, '');

$bloque3 = <<<EOF
 
	<table style="font-size:10px; padding:5px 10px;">
		<tr>
		<td style="background-color:white; border-top:1px solid #666;border-right: 1px solid white; border-left: 1px solid #666;border-style: groove; width:270px">
				Cliente: $clientes1[nombre]
		</td>
		<td style="background-color:white; border-top:1px solid #666;border-right: 1px solid #666; border-left: 1px solid white;border-style: groove; width:270px">
				Código: $respuestaReporte[codigo]
		</td>
		</tr>
		<tr>
		<td style="background-color:white; border-left: 1px solid #666;border-top: 1px solid white;border-style: groove;width:270px">
				Equipo: $respuestaReporte[equipo_re]
		</td>
		<td style="background-color:white; border-right: 1px solid #666;border-style: groove;width:270px;border-top: 1px solid white">
				Marca: $respuestaReporte[marca_re]
		</td>
		</tr>
		<tr>
		<td style="background-color:white; width:270px;border-left: 1px solid #666;border-top: 1px solid white;border-bottom: 1px solid #666;border-style: groove">
				Modelo: $respuestaReporte[modelo_re]
		</td>
		<td style="background-color:white; width:270px;border-right: 1px solid #666;border-top: 1px solid white;border-bottom: 1px solid #666;border-style: groove">
				Serie: $respuestaReporte[serie]
		</td>
		</tr>
		<tr>
		<td style="background-color:white; width:540px"></td>
		</tr>
	</table>
EOF;

$pdf->writeHTML($bloque3, false, false, false, false, '');

if ($respuestaReporte["tipo_manteniemiento"] == "Preventivo") {
	$tipoMantenimiento = $respuestaReporte["preventivo"];
}else{
	$tipoMantenimiento = $respuestaReporte["tipo_manteniemiento"];
}

$bloque4 = <<<EOF

	<table style="font-size:10px; padding:5px 10px;">
		<tr>
		<td style="background-color:white; border-top:1px solid #666;border-right: 1px solid #666; border-left: 1px solid #666;border-style: groove; width:540px">
				TIPO DE MANTENIMIENTO: $tipoMantenimiento 
		</td>
		</tr>
		<tr>
		<td style="background-color:white; border-left: 1px solid #666;border-top: 1px solid white;border-style: groove;border-right: 1px solid #666;width:540px">
				PREVENTIVO CON PROBLEMA: $respuestaReporte[preventivo_problema]
		</td>
		</tr>
		<tr>
		<td style="background-color:white; border-left: 1px solid #666;border-top: 1px solid white; border-style: groove;width:270px; text-transform: uppercase">
				REPORTADO POR: $respuestaReporte[reportado]
		</td>
		<td style="background-color:white; border-right: 1px solid #666;border-style: groove;width:270px;border-top: 1px solid white">
				CARGO: $respuestaReporte[cargo]
		</td>
		</tr>
		<tr>
		<td style="background-color:white; border-bottom:1px solid #666;border-right: 1px solid #666; border-left: 1px solid #666; border-top: 1px solid white;border-style: groove; width:540px">
				SOLICITUD DE SERVICIO No: $respuestaReporte[solicitud]
		</td>
		</tr>
		<tr>
		<td style="background-color:white; width:540px"></td>
		</tr>
	</table>

EOF;

$pdf->writeHTML($bloque4, false, false, false, false, '');
	
$bloque5 = <<<EOF
	<table style="font-size:10px; padding:5px 10px;">
		<tr>
		<td style="background-color:white; border-top:1px solid #666;border-right: 1px solid #666; border-left: 1px solid #666;border-style: groove; width:540px">
				DIAGNÓSTICO: $respuestaReporte[diagnostico]
		</td>
		</tr>
		<tr>
		<td style="background-color:white; border-top:1px solid white;border-right: 1px solid #666; border-left: 1px solid #666;border-style: groove; width:540px">
				TRABAJO REALIZADO: $respuestaReporte[trabajo]
			</td>
		</tr>
		<tr>
		<td style="background-color:white; border-top:1px solid white;border-right: 1px solid #666; border-left: 1px solid #666;border-style: groove; width:540px">
				INSTRUMENTOS UTILIZADOS: $respuestaReporte[instrumentos] 
			</td>
		</tr>
		<tr>
		<td style="background-color:white; border-top:1px solid white;border-right: 1px solid #666; border-left: 1px solid #666;border-style: groove; width:540px">
				RECOMENDACIONES: $respuestaReporte[recomendaciones]
			</td>
		</tr>
		<tr>
		<td style="background-color:white; border-top:1px solid white;border-bottom:1px solid #666;border-right: 1px solid #666; border-left: 1px solid #666;border-style: groove; width:540px">
				ACCESORIOS Y REPUESTOS INSTALADOS: $respuestaReporte[accesorios]
			</td>
		</tr>
		
		<tr>
		<td style="background-color:white; width:540px"></td>
		</tr>				               				
	</table>
EOF;



$pdf->writeHTML($bloque5, false, false, false, false, '');

$bloque6 = <<<EOF

	<table style="font-size:10px; padding:5px 10px;">
		<tr>
		<td style="background-color:white;border-right: 1px solid #666; border-left: 1px solid #666; border-top: 1px solid #666;border-style: groove; width:540px">
				EQUIPO FUERA DE SERVICIO: $respuestaReporte[equipo_servicio]
		</td>
		</tr>
		<tr>
		<td style="background-color:white;border-right: 1px solid #666; border-left: 1px solid #666; border-top: 1px solid white;border-style: groove; width:540px">
				EN CASO DE AFIRMATIVO CUAL ES EL MOTIVO: $respuestaReporte[servicio_motivo]
		</td>
		</tr>
		<tr>
		<td style="background-color:white; border-right: 1px solid #666; border-left: 1px solid #666; border-top: 1px solid white;border-style: groove; width:540px">
				EQUIPO REQUIERE SER RETIRADO DE LA INSTITUCIÓN PARA SER : $respuestaReporte[equipo_evaluado] , en el laboratorio
		</td>
		</tr>
		<tr>
		<td style="background-color:white; border-left: 1px solid #666;border-top: 1px solid white;border-style: groove;width:270px;border-bottom: 1px solid #666">
				FECHA DE SERVICIO: $respuestaReporte[fecha_inicio]
		</td>
		<td style="background-color:white; border-right: 1px solid #666;border-style: groove;width:270px;border-top: 1px solid white;border-bottom: 1px solid #666">
				FECHA PRÓXIMO MANTENIMIENTO: $respuestaReporte[fecha_proximo]
		</td>
		</tr>
		<tr>
		<td style="background-color:white; width:540px"></td>
		</tr>
		
		
	</table>

EOF;



$pdf->writeHTML($bloque6, false, false, false, false, '');

$pdf->AddPage();

if ($mediciones["principalventilador"] == "Ventilador" && $mediciones["adulto"] == "adulto") {

	 $tablaventilador = '

	 <h5>Ventilador</h5>
	 	<tr>
            <th style="text-align:center;">Adulto</th>
            <th style="text-align:center;">Equipo</th>
            <th style="text-align:center;">Patrón</th>
            <th style="text-align:center;">Equipo</th>
            <th style="text-align:center;">Patrón</th>
            <th style="text-align:center;">Unidad</th>
          </tr>
          <tr>
            <td style="text-align:center;">VC</td>
            <td style="text-align:center;">300</td>
            <td style="text-align:center;">'.$mediciones["ventiladorPatron1"].'</td>
            <td style="text-align:center;">500</td>
            <td style="text-align:center;">'.$mediciones["ventiladorPatron6"].'</td>
            <td style="text-align:center;">ml</td>
          </tr>
          <tr>
            <td style="text-align:center;">FR</td>
            <td style="text-align:center;">16</td>
            <td style="text-align:center;">'.$mediciones["ventiladorPatron2"].'</td>
            <td style="text-align:center;">20</td>
            <td style="text-align:center;">'.$mediciones["ventiladorPatron7"].'</td>
            <td style="text-align:center;">RPM</td>
          </tr>
          <tr>
            <td style="text-align:center;">I:E</td>
            <td style="text-align:center;">1:2</td>
            <td style="text-align:center;">'.$mediciones["ventiladorPatron3"].'</td>
            <td style="text-align:center;">1:2</td>
            <td style="text-align:center;">'.$mediciones["ventiladorPatron8"].'</td>
            <td style="text-align:center;">'.$mediciones["ventiladorUnidad1"].'</td>
          </tr>
          <tr>
            <td style="text-align:center;">Ti</td>
            <td style="text-align:center;">0,8</td>
            <td style="text-align:center;">'.$mediciones["ventiladorPatron4"].'</td>
            <td style="text-align:center;">1</td>
            <td style="text-align:center;">'.$mediciones["ventiladorPatron9"].'</td>
            <td style="text-align:center;">s</td>
          </tr>
          <tr>
            <td style="text-align:center;">PEEP</td>
            <td style="text-align:center;">5</td>
            <td style="text-align:center;">'.$mediciones["ventiladorPatron5"].'</td>
            <td style="text-align:center;">10</td>
            <td style="text-align:center;">'.$mediciones["ventiladorPatron10"].'</td>
            <td style="text-align:center;">mmHg</td>
          </tr>';

			}else {
					$tablaventilador ="";
				}



	$bloque7 = <<<EOF

	<table>

		$tablaventilador

		
	</table>

EOF;




$pdf->writeHTML($bloque7, false, false, false, false, '');


if ($mediciones["principalana"] == "tensiometro Analogo") {

	 $tablatensiometro = '
	 <h4>Tensiómetro Análogo</h4>          

             <tr>
               <th style="text-align:center;">Equipo</th>
               <th style="text-align:center;">Patron</th>
               <th style="text-align:center;">Unidad</th>
             </tr>
             <tr>
               <td style="text-align:center;">40</td>
               <td style="text-align:center;">'.$mediciones["tenPatron1"].'</td>
               <td style="text-align:center;">mmHg</td>
             </tr>
             <tr>
                <td style="text-align:center;">80</td>
                <td style="text-align:center;">'.$mediciones["tenPatron2"].'</td>
                <td style="text-align:center;">mmHg</td>
             </tr>
             <tr>
               <td style="text-align:center;">120</td>
               <td style="text-align:center;">'.$mediciones["tenPatron3"].'</td>
               <td style="text-align:center;">mmHg</td>
             </tr>
             <tr>
               <td style="text-align:center;">160</td>
               <td style="text-align:center;">'.$mediciones["tenPatron4"].'</td>
               <td style="text-align:center;">mmHg</td>
             </tr>
             <tr>
               <td style="text-align:center;">200</td>
               <td style="text-align:center;">'.$mediciones["tenPatron5"].'</td>
               <td style="text-align:center;">mmHg</td>
             </tr>
                   ';

}else{
	$tablatensiometro ="";
}

	$bloque8 = <<<EOF

	<table>

		$tablatensiometro

		
	</table>

EOF;




$pdf->writeHTML($bloque8, false, false, false, false, '');

 if ($mediciones["principalventilador"] == "Ventilador" && $mediciones["pediatrico"] == "pediatrico") {

              $tablatensiometro81 ='
                  <h4>Ventilador</h4>
                    <table class="table table-hover table-bordered">
                          <tr>
                            <th style="text-align:center;">pediatrico</th>
                            <th style="text-align:center;">Equipo</th>
                            <th style="text-align:center;">Patrón</th>
                            <th style="text-align:center;">Equipo</th>
                            <th style="text-align:center;">Patrón</th>
                            <th style="text-align:center;">Unidad</th>
                          </tr>
                          <tr>
                            <td style="text-align:center;">VC</td>
                            <td style="text-align:center;">80</td>
                            <td style="text-align:center;">'.$mediciones["ventiladorPatron1"].'</td>
                            <td style="text-align:center;">140</td>
                            <td style="text-align:center;">'.$mediciones["ventiladorPatron6"].'</td>
                            <td style="text-align:center;">ml</td>
                          </tr>
                          <tr>
                            <td style="text-align:center;">FR</td>
                            <td style="text-align:center;">30</td>
                            <td style="text-align:center;">'.$mediciones["ventiladorPatron2"].'</td>
                            <td style="text-align:center;">25</td>
                            <td style="text-align:center;">'.$mediciones["ventiladorPatron7"].'</td>
                            <td style="text-align:center;">RPM</td>
                          </tr>
                          <tr>
                            <td style="text-align:center;">I:E</td>
                            <td style="text-align:center;">1:2</td>
                            <td style="text-align:center;">'.$mediciones["ventiladorPatron3"].'</td>
                            <td style="text-align:center;">1:2</td>
                            <td style="text-align:center;">'.$mediciones["ventiladorPatron8"].'</td>
                            <td style="text-align:center;">'.$mediciones["ventiladorUnidad1"].'</td>
                          </tr>
                          <tr>
                            <td style="text-align:center;">Ti</td>
                            <td style="text-align:center;">0,4</td>
                            <td style="text-align:center;">'.$mediciones["ventiladorPatron4"].'</td>
                            <td style="text-align:center;">0,6</td>
                            <td style="text-align:center;">'.$mediciones["ventiladorPatron9"].'</td>
                            <td style="text-align:center;">s</td>
                          </tr>
                          <tr>
                            <td style="text-align:center;">PEEP</td>
                            <td style="text-align:center;">5</td>
                            <td style="text-align:center;">'.$mediciones["ventiladorPatron5"].'</td>
                            <td style="text-align:center;">10</td>
                            <td style="text-align:center;">'.$mediciones["ventiladorPatron10"].'</td>
                            <td style="text-align:center;">mmHg</td>
                          </tr>

                    </table>';

              
              

}else{
	$tablatensiometro81 ="";
}

	$bloque81 = <<<EOF

	<table>

		$tablatensiometro81
	
		
	</table>

EOF;




$pdf->writeHTML($bloque81, false, false, false, false, '');


 if ($mediciones["principalventilador"] == "Ventilador" && $mediciones["neonatal"] == "neonatal") {

            $tablaneonatal82 =
                '
                  <h4>Ventilador</h4>
                    <table class="table table-hover table-bordered">
                          <tr>
                            <th style="text-align:center;">Neonatal</th>
                            <th style="text-align:center;">Equipo</th>
                            <th style="text-align:center;">Patrón</th>
                            <th style="text-align:center;">Equipo</th>
                            <th style="text-align:center;">Patrón</th>
                            <th style="text-align:center;">Unidad</th>
                          </tr>
                          <tr>
                            <td style="text-align:center;">VC</td>
                            <td style="text-align:center;">5</td>
                            <td style="text-align:center;">'.$mediciones["ventiladorPatron1"].'</td>
                            <td style="text-align:center;">20</td>
                            <td style="text-align:center;">'.$mediciones["ventiladorPatron6"].'</td>
                            <td style="text-align:center;">ml</td>
                          </tr>
                          <tr>
                            <td style="text-align:center;">FR</td>
                            <td style="text-align:center;">30</td>
                            <td style="text-align:center;">'.$mediciones["ventiladorPatron2"].'</td>
                            <td style="text-align:center;">25</td>
                            <td style="text-align:center;">'.$mediciones["ventiladorPatron7"].'</td>
                            <td style="text-align:center;">RPM</td>
                          </tr>
                          <tr>
                            <td style="text-align:center;">I:E</td>
                            <td style="text-align:center;">1:2</td>
                            <td style="text-align:center;">'.$mediciones["ventiladorPatron3"].'</td>
                            <td style="text-align:center;">1:2</td>
                            <td style="text-align:center;">'.$mediciones["ventiladorPatron8"].'</td>
                            <td style="text-align:center;">'.$mediciones["ventiladorUnidad1"].'</td>
                          </tr>
                          <tr>
                            <td style="text-align:center;">Ti</td>
                            <td style="text-align:center;">0,3</td>
                            <td style="text-align:center;">'.$mediciones["ventiladorPatron4"].'</td>
                            <td style="text-align:center;">0,5</td>
                            <td style="text-align:center;">'.$mediciones["ventiladorPatron9"].'</td>
                            <td style="text-align:center;">s</td>
                          </tr>
                          <tr>
                            <td style="text-align:center;">PEEP</td>
                            <td style="text-align:center;">2</td>
                            <td style="text-align:center;">'.$mediciones["ventiladorPatron5"].'</td>
                            <td style="text-align:center;">8</td>
                            <td style="text-align:center;">'.$mediciones["ventiladorPatron10"].'</td>
                            <td style="text-align:center;">mmHg</td>
                          </tr>

                    </table>';

              
              

}else{
	$tablaneonatal82 ="";
}

	$bloque82 = <<<EOF

	<table>

		$tablaneonatal82

		
	</table>

EOF;




$pdf->writeHTML($bloque82, false, false, false, false, '');




if ($mediciones["principaldigi"] == "Tensiometro digital") {

	 $tablatensiometrodigital = '
	 <h4>Tensiómetro Digital</h4>          

             <tr>
                  <th colspan="2" style="text-align:center;">Patrón</th>
                  <th colspan="2" style="text-align:center;">Equipo</th>
                  <th>Unidad</th>
                </tr>
                <tr>
                  <td style="text-align:center;">Sistólica</td>
                  <td style="text-align:center;">Diastólica</td>
                  <td style="text-align:center;">Sistólica</td>
                  <td style="text-align:center;">Diastólica</td>
                  <td style="text-align:center;">mmHg</td>
                </tr>
                <tr>
                   <td style="text-align:center;">60</td>
                   <td style="text-align:center;">30</td>
                   <td style="text-align:center;">'.$mediciones["tenSistolica1"].'</td>
                   <td style="text-align:center;">'.$mediciones["tenDiastolica1"].'</td>
                   <td style="text-align:center;">mmHg</td>
                </tr>
                <tr>
                   <td style="text-align:center;">120</td>
                   <td style="text-align:center;">80</td>
                   <td style="text-align:center;">'.$mediciones["tenSistolica2"].'</td>
                   <td style="text-align:center;">'.$mediciones["tenDiastolica2"].'</td>
                   <td style="text-align:center;">mmHg</td>
                </tr>
                <tr>
                   <td style="text-align:center;">150</td>
                   <td style="text-align:center;">200</td>
                   <td style="text-align:center;">'.$mediciones["tenSistolica3"].'</td>
                   <td style="text-align:center;">'.$mediciones["tenDiastolica3"].'</td>
                   <td style="text-align:center;">mmHg</td>
                </tr>
                <tr>
                   <td style="text-align:center;">200</td>
                   <td style="text-align:center;">150</td>
                   <td style="text-align:center;">'.$mediciones["tenSistolica4"].'</td>
                   <td style="text-align:center;">'.$mediciones["tenDiastolica4"].'</td>
                   <td style="text-align:center;">mmHg</td>
                </tr>';

}else{
	$tablatensiometrodigital ="";
}

	$bloque9 = <<<EOF

	<table>

		$tablatensiometrodigital

		
	</table>

EOF;




$pdf->writeHTML($bloque9, false, false, false, false, '');


if ($mediciones["principalvacu"] == "Succionador Vacuometro" && $mediciones["mmHg"] == "mmHg") {

	 $tablasuccionador = '
	 <h4>Tabla de Resultados</h4>          

             <tr>
               <th style="text-align:center;">Equipo</th>
               <th style="text-align:center;">Patron</th>
               <th style="text-align:center;">Unidad</th>
             </tr>
             <tr>
               <td style="text-align:center;">'.$mediciones["succvacuEquipo1"].'</td>
               <td style="text-align:center;">'.$mediciones["succvacuPatron1"].'</td>
               <td style="text-align:center;">mmHg</td>
             </tr>
             <tr>
                <td style="text-align:center;">'.$mediciones["succvacuEquipo2"].'</td>
                <td style="text-align:center;">'.$mediciones["succvacuPatron2"].'</td>
                <td style="text-align:center;">mmHg</td>
             </tr>
             <tr>
               <td style="text-align:center;">'.$mediciones["succvacuEquipo3"].'</td>
               <td style="text-align:center;">'.$mediciones["succvacuPatron3"].'</td>
               <td style="text-align:center;">mmHg</td>
             </tr>
             <tr>
               <td style="text-align:center;">'.$mediciones["succvacuEquipo4"].'</td>
               <td style="text-align:center;">'.$mediciones["succvacuPatron4"].'</td>
               <td style="text-align:center;">mmHg</td>
             </tr>';

}else{
	$tablasuccionador ="";
}

	$bloque10 = <<<EOF

	<table>

		$tablasuccionador

	</table>

EOF;


$pdf->writeHTML($bloque10, false, false, false, false, '');

if ($mediciones["principalvacu"] == "Succionador Vacuometro" &&  $mediciones["inHg"] == "inHg") {

	 $tablasuccionadoringh = '
	 <h4>Tabla de Resultados</h4>          

             <tr>
                            <th style="text-align:center;">Equipo</th>
                            <th style="text-align:center;">Patron</th>
                            <th style="text-align:center;">Unidad</th>
                          </tr>
                          <tr>
                            <td style="text-align:center;">'.$mediciones["succvacuEquipo1"].'</td>
                            <td style="text-align:center;">'.$mediciones["succvacuPatron1"].'</td>
                            <td style="text-align:center;">inHg</td>
                          </tr>
                          <tr>
                             <td style="text-align:center;">'.$mediciones["succvacuEquipo2"].'</td>
                             <td style="text-align:center;">'.$mediciones["succvacuPatron2"].'</td>
                             <td style="text-align:center;">inHg</td>
                          </tr>
                          <tr>
                            <td style="text-align:center;">'.$mediciones["succvacuEquipo3"].'</td>
                            <td style="text-align:center;">'.$mediciones["succvacuPatron3"].'</td>
                            <td style="text-align:center;">inHg</td>
                          </tr>
                          <tr>
                            <td style="text-align:center;">'.$mediciones["succvacuEquipo4"].'</td>
                            <td style="text-align:center;">'.$mediciones["succvacuPatron4"].'</td>
                            <td style="text-align:center;">inHg</td>
                          </tr>';

}else{
	$tablasuccionadoringh ="";
}

	$bloque1025 = <<<EOF

	<table>

		$tablasuccionadoringh

	</table>

EOF;


$pdf->writeHTML($bloque1025, false, false, false, false, '');

if ($mediciones["principalvacu"] == "Succionador Vacuometro" &&  $mediciones["Mpa"] == "Mpa") {

	 $tablasuccionadormpa = '
	 <h4>Tabla de Resultados</h4>          

             <tr>
                            <th style="text-align:center;">Equipo</th>
                            <th style="text-align:center;">Patron</th>
                            <th style="text-align:center;">Unidad</th>
                          </tr>
                          <tr>
                            <td style="text-align:center;">'.$mediciones["succvacuEquipo1"].'</td>
                            <td style="text-align:center;">'.$mediciones["succvacuPatron1"].'</td>
                            <td style="text-align:center;">Mpa</td>
                          </tr>
                          <tr>
                             <td style="text-align:center;">'.$mediciones["succvacuEquipo2"].'</td>
                             <td style="text-align:center;">'.$mediciones["succvacuPatron2"].'</td>
                             <td style="text-align:center;">Mpa</td>
                          </tr>
                          <tr>
                            <td style="text-align:center;">'.$mediciones["succvacuEquipo3"].'</td>
                            <td style="text-align:center;">'.$mediciones["succvacuPatron3"].'</td>
                            <td style="text-align:center;">Mpa</td>
                          </tr>
                          <tr>
                            <td style="text-align:center;">'.$mediciones["succvacuEquipo4"].'</td>
                            <td style="text-align:center;">'.$mediciones["succvacuPatron4"].'</td>
                            <td style="text-align:center;">Mpa</td>
                          </tr>';

}else{
	$tablasuccionadormpa ="";
}

	$bloque1028 = <<<EOF

	<table>

		$tablasuccionadormpa

	</table>

EOF;


$pdf->writeHTML($bloque1028, false, false, false, false, '');


if ($mediciones["principalvacu"] == "Succionador Vacuometro" &&  $mediciones["nueva"] == "nueva") {

	 $tablasuccionadornueva = '
	 <h4>Tabla de Resultados</h4>          

             			<tr>
                            <th style="text-align:center;">Equipo</th>
                            <th style="text-align:center;">Patron</th>
                            <th style="text-align:center;">Unidad</th>
                          </tr>
                          <tr>
                            <td style="text-align:center;">'.$mediciones["succvacuEquipo1"].'</td>
                            <td style="text-align:center;">'.$mediciones["succvacuPatron1"].'</td>
                            <td style="text-align:center;">'.$mediciones["succvacuPatronUnNew1"].'</td>
                          </tr>
                          <tr>
                             <td style="text-align:center;">'.$mediciones["succvacuEquipo2"].'</td>
                             <td style="text-align:center;">'.$mediciones["succvacuPatron2"].'</td>
                             <td style="text-align:center;">'.$mediciones["succvacuPatronUnNew2"].'</td>
                          </tr>
                          <tr>
                            <td style="text-align:center;">'.$mediciones["succvacuEquipo3"].'</td>
                            <td style="text-align:center;">'.$mediciones["succvacuPatron3"].'</td>
                            <td style="text-align:center;">'.$mediciones["succvacuPatronUnNew3"].'</td>
                          </tr>
                          <tr>
                            <td style="text-align:center;">'.$mediciones["succvacuEquipo4"].'</td>
                            <td style="text-align:center;">'.$mediciones["succvacuPatron4"].'</td>
                            <td style="text-align:center;">'.$mediciones["succvacuPatronUnNew4"].'</td>
                          </tr>';

}else{
	$tablasuccionadornueva ="";
}

	$bloque10285 = <<<EOF

	<table>

		$tablasuccionadornueva

	</table>

EOF;


$pdf->writeHTML($bloque10285, false, false, false, false, '');


if ($mediciones["principalmon"] == "Monitor Multiparametros"  && $mediciones["neonatalmonitor"] == "neonatalmonitor") {

	 $tablamonitor = '
	 <h4>Monitor Multiparámetros</h4>          

             <tr>
                <th colspan="3" style="text-align:center;">ECG</th>
                <th colspan="3" style="text-align:center;">SPO2</th>
                <th colspan="5" style="text-align:center;">NIBP</th>
              </tr>
              <tr>
                <td style="text-align:center;">Patrón</td>
                <td style="text-align:center;">Equipo</td>
                <td style="text-align:center;">Unidad</td>
                <td style="text-align:center;">Patrón</td>
                <td style="text-align:center;">Equipo</td>
                <td style="text-align:center;">Unidad</td>
                <td colspan="2">Patrón</td>
                <td colspan="2">Equipo</td>
                <td style="text-align:center;">Neonatal</td>
              </tr>
              <tr>
                <td style="text-align:center;">60</td>
                <td style="text-align:center;">'.$mediciones["monitMultEquipo1"].'</td>
                <td style="text-align:center;">BPM</td>
                <td style="text-align:center;">85</td>
                <td style="text-align:center;">'.$mediciones["monitMultEquipo6"].'</td>
                <td style="text-align:center;">%</td>
                <td style="text-align:center;">Sistólica</td>
                <td style="text-align:center;">Diastólica</td>
                <td style="text-align:center;">Sistólica</td>
                <td style="text-align:center;">Diastólica</td>
                <td style="text-align:center;">Unidad</td>
              </tr>
              <tr>
                <td style="text-align:center;">90</td>
                <td style="text-align:center;">'.$mediciones["monitMultEquipo2"].'</td>
                <td style="text-align:center;">BPM</td>
                <td style="text-align:center;">90</td>
                <td style="text-align:center;">'.$mediciones["monitMultEquipo7"].'</td>
                <td style="text-align:center;">%</td>
                <td style="text-align:center;">35</td>
                <td style="text-align:center;">15</td>
                <td style="text-align:center;">'.$mediciones["monitMultSistolica1"].'</td>
                <td style="text-align:center;">'.$mediciones["monitMultDiastolica1"].'</td>
                <td style="text-align:center;">mmHg</td>
              </tr>
              <tr>
                <td style="text-align:center;">120</td>
                <td style="text-align:center;">'.$mediciones["monitMultEquipo3"].'</td>
                <td style="text-align:center;">BPM</td>
                <td style="text-align:center;">95</td>
                <td style="text-align:center;">'.$mediciones["monitMultEquipo8"].'</td>
                <td style="text-align:center;">%</td>
                <td style="text-align:center;">60</td>
                <td style="text-align:center;">30</td>
                <td style="text-align:center;">'.$mediciones["monitMultSistolica2"].'</td>
                <td style="text-align:center;">'.$mediciones["monitMultDiastolica2"].'</td>
                <td style="text-align:center;">mmHg</td>
              </tr>
              <tr>
                <td style="text-align:center;">150</td>
                <td style="text-align:center;">'.$mediciones["monitMultEquipo4"].'</td>
                <td style="text-align:center;">BPM</td>
                <td style="text-align:center;">97</td>
                <td style="text-align:center;">'.$mediciones["monitMultEquipo9"].'</td>
                <td style="text-align:center;">%</td>
                <td style="text-align:center;">70</td>
                <td style="text-align:center;">40</td>
                <td style="text-align:center;">'.$mediciones["monitMultSistolica3"].'</td>
                <td style="text-align:center;">'.$mediciones["monitMultDiastolica3"].'</td>
                <td style="text-align:center;">mmHg</td>
              </tr>
              <tr>
                <td style="text-align:center;">180</td>
                <td style="text-align:center;">'.$mediciones["monitMultEquipo5"].'</td>
                <td style="text-align:center;">BPM</td>
                <td style="text-align:center;">99</td>
                <td style="text-align:center;">'.$mediciones["monitMultEquipo10"].'</td>
                <td style="text-align:center;">%</td>
                <td style="text-align:center;">120</td>
                <td style="text-align:center;">80</td>
                <td style="text-align:center;">'.$mediciones["monitMultSistolica4"].'</td>
                <td style="text-align:center;">'.$mediciones["monitMultDiastolica4"].'</td>
                <td style="text-align:center;">mmHg</td>
              </tr>';

}else{
	$tablamonitor ="";
}

	$bloque11 = <<<EOF

	<table>

		$tablamonitor

		
	</table>

EOF;




$pdf->writeHTML($bloque11, false, false, false, false, '');


if ($mediciones["principalmon"] == "Monitor Multiparametros" && $mediciones["pediatricomonitor"] == "pediatricomonitor") {

	 $tablamonitorpediatrico = '
	 <h4>Monitor Multiparámetros</h4>          

             			<tr>
                            <th colspan="3" style="text-align:center;">ECG</th>
                            <th colspan="3" style="text-align:center;">SPO2</th>
                            <th colspan="5" style="text-align:center;">NIBP</th>
                          </tr>
                          <tr>
                            <td style="text-align:center;">Patrón</td>
                            <td style="text-align:center;">Equipo</td>
                            <td style="text-align:center;">Unidad</td>
                            <td style="text-align:center;">Patrón</td>
                            <td style="text-align:center;">Equipo</td>
                            <td style="text-align:center;">Unidad</td>
                            <td colspan="2">Patrón</td>
                            <td colspan="2">Equipo</td>
                            <td style="text-align:center;">Pediatrico</td>
                          </tr>
                          <tr>
                            <td style="text-align:center;">60</td>
                            <td style="text-align:center;">'.$mediciones["monitMultEquipo1"].'</td>
                            <td style="text-align:center;">BPM</td>
                            <td style="text-align:center;">85</td>
                            <td style="text-align:center;">'.$mediciones["monitMultEquipo6"].'</td>
                            <td style="text-align:center;">%</td>
                            <td style="text-align:center;">Sistólica</td>
                            <td style="text-align:center;">Diastólica</td>
                            <td style="text-align:center;">Sistólica</td>
                            <td style="text-align:center;">Diastólica</td>
                            <td style="text-align:center;">Unidad</td>
                          </tr>
                          <tr>
                            <td style="text-align:center;">90</td>
                            <td style="text-align:center;">'.$mediciones["monitMultEquipo2"].'</td>
                            <td style="text-align:center;">BPM</td>
                            <td style="text-align:center;">90</td>
                            <td style="text-align:center;">'.$mediciones["monitMultEquipo7"].'</td>
                            <td style="text-align:center;">%</td>
                            <td style="text-align:center;">60</td>
                            <td style="text-align:center;">30</td>
                            <td style="text-align:center;">'.$mediciones["monitMultSistolica1"].'</td>
                            <td style="text-align:center;">'.$mediciones["monitMultDiastolica1"].'</td>
                            <td style="text-align:center;">mmHg</td>
                          </tr>
                          <tr>
                            <td style="text-align:center;">120</td>
                            <td style="text-align:center;">'.$mediciones["monitMultEquipo3"].'</td>
                            <td style="text-align:center;">BPM</td>
                            <td style="text-align:center;">95</td>
                            <td style="text-align:center;">'.$mediciones["monitMultEquipo8"].'</td>
                            <td style="text-align:center;">%</td>
                            <td style="text-align:center;">70</td>
                            <td style="text-align:center;">40</td>
                            <td style="text-align:center;">'.$mediciones["monitMultSistolica2"].'</td>
                            <td style="text-align:center;">'.$mediciones["monitMultDiastolica2"].'</td>
                            <td style="text-align:center;">mmHg</td>
                          </tr>
                          <tr>
                            <td style="text-align:center;">150</td>
                            <td style="text-align:center;">'.$mediciones["monitMultEquipo4"].'</td>
                            <td style="text-align:center;">BPM</td>
                            <td style="text-align:center;">97</td>
                            <td style="text-align:center;">'.$mediciones["monitMultEquipo9"].'</td>
                            <td style="text-align:center;">%</td>
                            <td style="text-align:center;">120</td>
                            <td style="text-align:center;">80</td>
                            <td style="text-align:center;">'.$mediciones["monitMultSistolica3"].'</td>
                            <td style="text-align:center;">'.$mediciones["monitMultDiastolica3"].'</td>
                            <td style="text-align:center;">mmHg</td>
                          </tr>
                          <tr>
                            <td style="text-align:center;">180</td>
                            <td style="text-align:center;">'.$mediciones["monitMultEquipo5"].'</td>
                            <td style="text-align:center;">BPM</td>
                            <td style="text-align:center;">99</td>
                            <td style="text-align:center;">'.$mediciones["monitMultEquipo10"].'</td>
                            <td style="text-align:center;">%</td>
                            <td style="text-align:center;">150</td>
                            <td style="text-align:center;">100</td>
                            <td style="text-align:center;">'.$mediciones["monitMultSistolica4"].'</td>
                            <td style="text-align:center;">'.$mediciones["monitMultDiastolica4"].'</td>
                            <td style="text-align:center;">mmHg</td>
                          </tr>';

}else{
	$tablamonitorpediatrico ="";
}

	$bloque1115 = <<<EOF

	<table>

		$tablamonitorpediatrico

		
	</table>

EOF;




$pdf->writeHTML($bloque1115, false, false, false, false, '');


if ($mediciones["principalmon"] == "Monitor Multiparametros" && $mediciones["adultomonitor"] == "adultomonitor") {

	 $tablamonitoradulto = '
	 <h4>Monitor Multiparámetros</h4>          

             			<tr>
                            <th colspan="3" style="text-align:center;">ECG</th>
                            <th colspan="3" style="text-align:center;">SPO2</th>
                            <th colspan="5" style="text-align:center;">NIBP</th>
                          </tr>
                          <tr>
                            <td style="text-align:center;">Patrón</td>
                            <td style="text-align:center;">Equipo</td>
                            <td style="text-align:center;">Unidad</td>
                            <td style="text-align:center;">Patrón</td>
                            <td style="text-align:center;">Equipo</td>
                            <td style="text-align:center;">Unidad</td>
                            <td colspan="2">Patrón</td>
                            <td colspan="2">Equipo</td>
                            <td style="text-align:center;">Adulto</td>
                          </tr>
                          <tr>
                            <td style="text-align:center;">60</td>
                            <td style="text-align:center;">'.$mediciones["monitMultEquipo1"].'</td>
                            <td style="text-align:center;">BPM</td>
                            <td style="text-align:center;">85</td>
                            <td style="text-align:center;">'.$mediciones["monitMultEquipo6"].'</td>
                            <td style="text-align:center;">%</td>
                            <td style="text-align:center;">Sistólica</td>
                            <td style="text-align:center;">Diastólica</td>
                            <td style="text-align:center;">Sistólica</td>
                            <td style="text-align:center;">Diastólica</td>
                            <td style="text-align:center;">Unidad</td>
                          </tr>
                          <tr>
                            <td style="text-align:center;">90</td>
                            <td style="text-align:center;">'.$mediciones["monitMultEquipo2"].'</td>
                            <td style="text-align:center;">BPM</td>
                            <td style="text-align:center;">90</td>
                            <td style="text-align:center;">'.$mediciones["monitMultEquipo7"].'</td>
                            <td style="text-align:center;">%</td>
                            <td style="text-align:center;">60</td>
                            <td style="text-align:center;">30</td>
                            <td style="text-align:center;">'.$mediciones["monitMultSistolica1"].'</td>
                            <td style="text-align:center;">'.$mediciones["monitMultDiastolica1"].'</td>
                            <td style="text-align:center;">mmHg</td>
                          </tr>
                          <tr>
                            <td style="text-align:center;">120</td>
                            <td style="text-align:center;">'.$mediciones["monitMultEquipo3"].'</td>
                            <td style="text-align:center;">BPM</td>
                            <td style="text-align:center;">95</td>
                            <td style="text-align:center;">'.$mediciones["monitMultEquipo8"].'</td>
                            <td style="text-align:center;">%</td>
                            <td style="text-align:center;">120</td>
                            <td style="text-align:center;">80</td>
                            <td style="text-align:center;">'.$mediciones["monitMultSistolica2"].'</td>
                            <td style="text-align:center;">'.$mediciones["monitMultDiastolica2"].'</td>
                            <td style="text-align:center;">mmHg</td>
                          </tr>
                          <tr>
                            <td style="text-align:center;">150</td>
                            <td style="text-align:center;">'.$mediciones["monitMultEquipo4"].'</td>
                            <td style="text-align:center;">BPM</td>
                            <td style="text-align:center;">97</td>
                            <td style="text-align:center;">'.$mediciones["monitMultEquipo9"].'</td>
                            <td style="text-align:center;">%</td>
                            <td style="text-align:center;">150</td>
                            <td style="text-align:center;">100</td>
                            <td style="text-align:center;">'.$mediciones["monitMultSistolica3"].'</td>
                            <td style="text-align:center;">'.$mediciones["monitMultDiastolica3"].'</td>
                            <td style="text-align:center;">mmHg</td>
                          </tr>
                          <tr>
                            <td style="text-align:center;">180</td>
                            <td style="text-align:center;">'.$mediciones["monitMultEquipo5"].'</td>
                            <td style="text-align:center;">BPM</td>
                            <td style="text-align:center;">99</td>
                            <td style="text-align:center;">'.$mediciones["monitMultEquipo10"].'</td>
                            <td style="text-align:center;">%</td>
                            <td style="text-align:center;">200</td>
                            <td style="text-align:center;">150</td>
                            <td style="text-align:center;">'.$mediciones["monitMultSistolica4"].'</td>
                            <td style="text-align:center;">'.$mediciones["monitMultDiastolica4"].'</td>
                            <td style="text-align:center;">mmHg</td>
                          </tr>';

}else{
	$tablamonitoradulto ="";
}

	$bloque1118 = <<<EOF

	<table>

		$tablamonitoradulto

		
	</table>

EOF;




$pdf->writeHTML($bloque1118, false, false, false, false, '');

if ($mediciones["principallam"] == "Lampara de Fotocurado") {

	 $tablalampara = '
	 <h4>Lámpara de Fotocurado</h4>          

				<tr>
                   <th style="text-align:center;">Equipo</th>
                   <th style="text-align:center;">Patron</th>
                   <th style="text-align:center;">Unidad</th>
                 </tr>
                 <tr>
                   <td style="text-align:center;">Fijo</td>
                   <td style="text-align:center;">'.$mediciones["lamparaFotoPatron1"].'</td>
                   <td style="text-align:center;">mW/cm^2</td>
                 </tr>
                 <tr>
                    <td style="text-align:center;">Bajo</td>
                    <td style="text-align:center;">'.$mediciones["lamparaFotoPatron2"].'</td>
                    <td style="text-align:center;">mW/cm^2</td>
                 </tr>
                 <tr>
                   <td style="text-align:center;">Medio</td>
                   <td style="text-align:center;">'.$mediciones["lamparaFotoPatron3"].'</td>
                   <td style="text-align:center;">mW/cm^2</td>
                 </tr>
                 <tr>
                   <td style="text-align:center;">Alto</td>
                   <td style="text-align:center;">'.$mediciones["lamparaFotoPatron4"].'</td>
                   <td style="text-align:center;">mW/cm^2</td>
                 </tr>';

}else{
	$tablalampara ="";
}

	$bloque12 = <<<EOF

	<table>

		$tablalampara

		
	</table>

EOF;


$pdf->writeHTML($bloque12, false, false, false, false, '');


if ($mediciones["principalauto"] == "Autoclave") {

	 $tablaautoclave = '
	 <h4>Autoclave</h4>          

				<tr>
                            <th colspan="3" style="text-align:center;">Tiempo</th>
                            <th colspan="3" style="text-align:center;">Temperatura</th>
                            <th colspan="3" style="text-align:center;">Presión</th>
                          </tr>
                          <tr>
                            <td style="text-align:center;">Fijo</td>
                            <td style="text-align:center;">Patron</td>
                            <td style="text-align:center;">Unidad</td>
                            <td style="text-align:center;">Fijo</td>
                            <td style="text-align:center;">Patron</td>
                            <td style="text-align:center;">Unidad</td>
                            <td style="text-align:center;">Fijo</td>
                            <td style="text-align:center;">Patron</td>
                            <td style="text-align:center;">Unidad</td>
                          </tr>
                          <tr>
                             <td style="text-align:center;">'.$mediciones["autoclaveEquipo1"].'</td>
                             <td style="text-align:center;">'.$mediciones["autoclavePatron1"].'</td>
                             <td style="text-align:center;">'.$mediciones["unidadAutoclave"].'</td>
                             <td style="text-align:center;">'.$mediciones["autoclaveEquipo3"].'</td>
                             <td style="text-align:center;">'.$mediciones["autoclavePatron3"].'</td>
                             <td style="text-align:center;">'.$mediciones["gradosAutoclave"].'</td>
                             <td style="text-align:center;">'.$mediciones["autoclaveEquipo5"].'</td>
                             <td style="text-align:center;">'.$mediciones["autoclavePatron5"].'</td>
                             <td style="text-align:center;">'.$mediciones["unidad2Autoclave"].'</td>
                          </tr>
                          <tr>
                             <td style="text-align:center;">'.$mediciones["autoclaveEquipo2"].'</td>
                             <td style="text-align:center;">'.$mediciones["autoclavePatron2"].'</td>
                             <td style="text-align:center;">'.$mediciones["unidad22Autoclave"].'</td>
                             <td style="text-align:center;">'.$mediciones["autoclaveEquipo4"].'</td>
                             <td style="text-align:center;">'.$mediciones["autoclavePatron4"].'</td>
                             <td style="text-align:center;">'.$mediciones["gradosAutoclave22"].'</td>
                             <td style="text-align:center;">'.$mediciones["autoclaveEquipo6"].'</td>
                             <td style="text-align:center;">'.$mediciones["autoclavePatron6"].'</td>
                             <td style="text-align:center;">'.$mediciones["unidad222Autoclave"].'</td>
                          </tr>';

}else{
	$tablaautoclave ="";
}

	$bloque13 = <<<EOF

	<table>

		$tablaautoclave

	</table>

EOF;


$pdf->writeHTML($bloque13, false, false, false, false, '');


if ($mediciones["principalbomba"] == "Bomba de infusion") {

	 $tablabombainfusion = '
	 <h4>Bomba de infusión</h4>          

				<tr>
                    <th colspan="4" style="text-align:center;">Flujo</th>
                    <th colspan="3" style="text-align:center;">Volumen</th>
                     </tr>
                     <tr>
                       <td style="text-align:center;">Canal</td>
                       <td style="text-align:center;">Equipo</td>
                       <td style="text-align:center;">Patrón</td>
                       <td style="text-align:center;">Unidad</td>
                       <td style="text-align:center;">equipo</td>
                       <td style="text-align:center;">Patrón</td>
                       <td style="text-align:center;">Unidad</td>
                     </tr>
                     <tr>
                        <td style="text-align:center;">Canal 1</td>
                        <td style="text-align:center;">200</td>
                        <td style="text-align:center;">'.$mediciones["bombaInfuPatron1"].'</td>
                        <td style="text-align:center;">ml/h</td>
                        <td style="text-align:center;">10</td>
                        <td style="text-align:center;">'.$mediciones["bombaInfuPatron3"].'</td>
                        <td style="text-align:center;">ml</td>
                     </tr>
                     <tr>
                        <td style="text-align:center;">Canal 2</td>
                        <td style="text-align:center;">200</td>
                        <td style="text-align:center;">'.$mediciones["bombaInfuPatron2"].'</td>
                        <td style="text-align:center;">ml/h</td>
                        <td style="text-align:center;">10</td>
                        <td style="text-align:center;">'.$mediciones["bombaInfuPatron4"].'</td>
                        <td style="text-align:center;">ml</td>
                     </tr>';
}else{
	$tablabombainfusion ="";
}

	$bloque14 = <<<EOF

	<table>

		$tablabombainfusion

		
	</table>

EOF;


$pdf->writeHTML($bloque14, false, false, false, false, '');


if ($mediciones["principalcen"] == "centrifuga") {

	 $tablacentrifuga = '
	 <h4>Tabla de Resultados</h4>
	 <tr>
       <th style="text-align:center;">Equipo</th>
       <th style="text-align:center;">Patrón</th>
       <th style="text-align:center;">Unidad</th>
     </tr>
     <tr>
       <td style="text-align:center;">'.$mediciones["centrifugaEquipo1"].'</td>
       <td style="text-align:center;">'.$mediciones["centrifugaPatron1"].'</td>
       <td style="text-align:center;">RPM</td>
     </tr>
     <tr>
       <td style="text-align:center;">'.$mediciones["centrifugaEquipo2"].'</td>
       <td style="text-align:center;">'.$mediciones["centrifugaPatron2"].'</td>
       <td style="text-align:center;">RPM</td>
     </tr>
     <tr>
       <td style="text-align:center;">'.$mediciones["centrifugaEquipo3"].'</td>
       <td style="text-align:center;">'.$mediciones["centrifugaPatron3"].'</td>
       <td style="text-align:center;">RPM</td>
     </tr>
		';
}else{
	$tablacentrifuga ="";
}

	$bloque15 = <<<EOF

	<table>

		$tablacentrifuga
	
		
	</table>

EOF;


$pdf->writeHTML($bloque15, false, false, false, false, '');


if ($mediciones["principalaudio"] == "Audiometro") {

	 $tablaaudiometro = '
	 <h4>Audiómetro</h4>
	  <tr>
                            <th colspan="4" style="text-align:center;">Frecuencia</th>
                            <th colspan="4" style="text-align:center;">Nivel audicion</th>
                          </tr>
                          <tr>
                            <td>Equipo</td>
                            <td>Auricular Izq.(Patrón)</td>
                            <td>Auricular Der.(Patrón)</td>
                            <td>Unidad</td>
                            <td>Equipo</td>
                            <td>Auricular Izq.(Patrón)</td>
                            <td>Auricular Der.(Patrón)</td>
                            <td>Unidad</td>
                          </tr>
                          <tr>
                            <td style="text-align:center;">'.$mediciones["audiometroEquipo1"].'</td>
                            <td style="text-align:center;">'.$mediciones["audiometroAurIz1"].'</td>
                            <td style="text-align:center;">'.$mediciones["audiometroAurDer1"].'</td>
                            <td style="text-align:center;">Hz</td>
                            <td style="text-align:center;">'.$mediciones["audiometroEquipo3"].'</td>
                            <td style="text-align:center;">'.$mediciones["audiometroAurIz3"].'</td>
                            <td style="text-align:center;">'.$mediciones["audiometroAurDer3"].'</td>
                            <td style="text-align:center;">dB</td>
                          </tr>
                          <tr>
                            <td style="text-align:center;">'.$mediciones["audiometroEquipo2"].'</td>
                            <td style="text-align:center;">'.$mediciones["audiometroAurIz2"].'</td>
                            <td style="text-align:center;">'.$mediciones["audiometroAurDer2"].'</td>
                            <td style="text-align:center;">Hz</td>
                            <td style="text-align:center;">'.$mediciones["audiometroEquipo24"].'</td>
                            <td style="text-align:center;">'.$mediciones["audiometroAurIz24"].'</td>
                            <td style="text-align:center;">'.$mediciones["audiometroAurDer24"].'</td>
                            <td style="text-align:center;">dB</td>
                          </tr>
                           <tr>
                            <td style="text-align:center;">'.$mediciones["audiometroEquipo8"].'</td>
                            <td style="text-align:center;">'.$mediciones["audiometroAurIz8"].'</td>
                            <td style="text-align:center;">'.$mediciones["audiometroAurDer8"].'</td>
                            <td style="text-align:center;">Hz</td>
                            <td style="text-align:center;">'.$mediciones["audiometroEquipo25"].'</td>
                            <td style="text-align:center;">'.$mediciones["audiometroAurIz25"].'</td>
                            <td style="text-align:center;">'.$mediciones["audiometroAurDer25"].'</td>
                            <td style="text-align:center;">dB</td>
                          </tr>
                          <tr>
                            <td style="text-align:center;">'.$mediciones["audiometroEquipo4"].'</td>
                            <td style="text-align:center;">'.$mediciones["audiometroAurIz4"].'</td>
                            <td style="text-align:center;">'.$mediciones["audiometroAurDer4"].'</td>
                            <td style="text-align:center;">Hz</td>
                            <td style="text-align:center;">'.$mediciones["audiometroEquipo6"].'</td>
                            <td style="text-align:center;">'.$mediciones["audiometroAurIz6"].'</td>
                            <td style="text-align:center;">'.$mediciones["audiometroAurDer6"].'</td>
                            <td style="text-align:center;">dB</td>
                          </tr>
                          <tr>
                            <td style="text-align:center;">'.$mediciones["audiometroEquipo5"].'</td>
                            <td style="text-align:center;">'.$mediciones["audiometroAurIz5"].'</td>
                            <td style="text-align:center;">'.$mediciones["audiometroAurDer5"].'</td>
                            <td style="text-align:center;">Hz</td>
                            <td style="text-align:center;">'.$mediciones["audiometroEquipo7"].'</td>
                            <td style="text-align:center;">'.$mediciones["audiometroAurIz7"].'</td>
                            <td style="text-align:center;">'.$mediciones["audiometroAurDer7"].'</td>
                            <td style="text-align:center;">dB</td>
                          </tr>
                         
		';
}else{
	$tablaaudiometro ="";
}

	$bloque16 = <<<EOF

	<table>

		$tablaaudiometro

		
	</table>

EOF;


$pdf->writeHTML($bloque16, false, false, false, false, '');

if ($mediciones["principalbasculas"] == "basculas" && $mediciones["kg"] == "kg") {

	 $tablabasculas = '
	 <h4>Tabla de Resultados</h4>
	  <tr>
                            <th style="text-align:center;">Patrón</th>
                            <th style="text-align:center;">Equipo</th>
                            <th style="text-align:center;">Unidad</th>
                          </tr>
                          <tr>
                            <td style="text-align:center;">'.$mediciones["basculasPatron1"].'</td>
                            <td style="text-align:center;">'.$mediciones["basculasEquipo1"].'</td>
                            <td style="text-align:center;">Kg</td>
                          </tr>
                          <tr>
                            <td style="text-align:center;">'.$mediciones["basculasPatron2"].'</td>
                            <td style="text-align:center;">'.$mediciones["basculasEquipo2"].'</td>
                            <td style="text-align:center;">Kg</td>
                          </tr>
                          <tr>
                            <td style="text-align:center;">'.$mediciones["basculasPatron3"].'</td>
                            <td style="text-align:center;">'.$mediciones["basculasEquipo3"].'</td>
                            <td style="text-align:center;">Kg</td>
                          </tr>
                          <tr>
                            <td style="text-align:center;">'.$mediciones["basculasPatron4"].'</td>
                            <td style="text-align:center;">'.$mediciones["basculasEquipo4"].'</td>
                            <td style="text-align:center;">Kg</td>
                          </tr>
                          <tr>
                            <td style="text-align:center;">'.$mediciones["basculasPatron5"].'</td>
                            <td style="text-align:center;">'.$mediciones["basculasEquipo5"].'</td>
                            <td style="text-align:center;">Kg</td>
                          </tr>
		';
}else{
	$tablabasculas ="";
}

	$bloque17 = <<<EOF

	<table>

		$tablabasculas

		
	</table>

EOF;


$pdf->writeHTML($bloque17, false, false, false, false, '');


if ($mediciones["principalbasculas"] == "basculas" && $mediciones["g"] == "g") {

	 $tablabasculaskg = '
	 <h4>Tabla de Resultados</h4>
	  <tr>
                            <th style="text-align:center;">Patrón</th>
                            <th style="text-align:center;">Equipo</th>
                            <th style="text-align:center;">Unidad</th>
                          </tr>
                          <tr>
                            <td style="text-align:center;">'.$mediciones["basculasPatron1"].'</td>
                            <td style="text-align:center;">'.$mediciones["basculasEquipo1"].'</td>
                            <td style="text-align:center;">g</td>
                          </tr>
                          <tr>
                            <td style="text-align:center;">'.$mediciones["basculasPatron2"].'</td>
                            <td style="text-align:center;">'.$mediciones["basculasEquipo2"].'</td>
                            <td style="text-align:center;">g</td>
                          </tr>
                          <tr>
                            <td style="text-align:center;">'.$mediciones["basculasPatron3"].'</td>
                            <td style="text-align:center;">'.$mediciones["basculasEquipo3"].'</td>
                            <td style="text-align:center;">g</td>
                          </tr>
                          <tr>
                            <td style="text-align:center;">'.$mediciones["basculasPatron4"].'</td>
                            <td style="text-align:center;">'.$mediciones["basculasEquipo4"].'</td>
                            <td style="text-align:center;">g</td>
                          </tr>
                          <tr>
                            <td style="text-align:center;">'.$mediciones["basculasPatron5"].'</td>
                            <td style="text-align:center;">'.$mediciones["basculasEquipo5"].'</td>
                            <td style="text-align:center;">g</td>
                          </tr>
		';
}else{
	$tablabasculaskg ="";
}

	$bloque178 = <<<EOF

	<table>

		$tablabasculaskg

		
	</table>

EOF;


$pdf->writeHTML($bloque178, false, false, false, false, '');



if ($mediciones["principalaudiometria"] == "Audiometria") {

	 $tablabaudiometria = '
	 <h4>Cabina de Audiometría</h4>
	 <tr>
        <th style="text-align:center;">Atenuación</th>
        <th style="text-align:center;">'.$mediciones["audiometriaAtenuacion1"].'</th>
        <th style="text-align:center;">dB</th>
      </tr>
		';
}else{
	$tablabaudiometria ="";
}

	$bloque18 = <<<EOF

	<table>

		$tablabaudiometria

		
	</table>

EOF;


$pdf->writeHTML($bloque18, false, false, false, false, '');

if ($mediciones["principaloxigeno"] == "Concentrador de oxigeno") {

	 $tablabconcentrador = '
	 <h4>Concentrador de oxígeno</h4>

						 <tr>
                            <th colspan="3" style="text-align:center;">Flujo</th>
                            <th colspan="3" style="text-align:center;">Concentración de oxígeno</th>
                          </tr>
                          <tr>
                            <td style="text-align:center;">Equipo</td>
                            <td style="text-align:center;">Patrón</td>
                            <td style="text-align:center;">Unidad</td>
                            <td style="text-align:center;">Equipo</td>
                            <td style="text-align:center;">Patrón</td>
                            <td style="text-align:center;">Unidad</td>
                          </tr>
                         <tr>
                            <td style="text-align:center;">'.$mediciones["concentradorOxEquipo1"].'</td>
                            <td style="text-align:center;">'.$mediciones["concentradorOxPatron1"].'</td>
                            <td style="text-align:center;">LPM</td>
                            <td style="text-align:center;">'.$mediciones["concentradorOxEquipo4"].'</td>
                            <td style="text-align:center;">'.$mediciones["concentradorOxPatron4"].'</td>
                            <td style="text-align:center;">%</td>
                          </tr>
                          <tr>
                            <td style="text-align:center;">'.$mediciones["concentradorOxEquipo2"].'</td>
                            <td style="text-align:center;">'.$mediciones["concentradorOxPatron2"].'</td>
                            <td style="text-align:center;">LPM</td>
                            <td style="text-align:center;">'.$mediciones["concentradorOxEquipo5"].'</td>
                            <td style="text-align:center;">'.$mediciones["concentradorOxPatron5"].'</td>
                            <td style="text-align:center;">%</td>
                           </tr>
                          <tr>
                            <td style="text-align:center;">'.$mediciones["concentradorOxEquipo3"].'</td>
                            <td style="text-align:center;">'.$mediciones["concentradorOxPatron3"].'</td>
                            <td style="text-align:center;">LPM</td>
                            <td style="text-align:center;">'.$mediciones["concentradorOxEquipo6"].'</td>
                            <td style="text-align:center;">'.$mediciones["concentradorOxPatron6"].'</td>
                            <td style="text-align:center;">%</td>
                          </tr>';
}else{
	$tablabconcentrador ="";
}

	$bloque19 = <<<EOF

	<table>

		$tablabconcentrador

		
	</table>

EOF;


$pdf->writeHTML($bloque19, false, false, false, false, '');


if ($mediciones["principaldesfibrilador"] == "Desfibrilador") {

	 $tablabDesfibrilador = '
	 <h4>Desfibrilador</h4>
	 <tr>
                            <th style="text-align:center;">Equipo</th>
                            <th style="text-align:center;">Patrón</th>
                            <th style="text-align:center;">Unidad</th>
                          </tr>
                          <tr>
                            <td style="text-align:center;">'.$mediciones["desfibriladorEquipo1"].'</td>
                            <td style="text-align:center;">'.$mediciones["desfibriladorPatron1"].'</td>
                            <td style="text-align:center;">j</td>
                          </tr>
                          <tr>
                            <td style="text-align:center;">'.$mediciones["desfibriladorEquipo2"].'</td>
                            <td style="text-align:center;">'.$mediciones["desfibriladorPatron2"].'</td>
                            <td style="text-align:center;">j</td>
                          </tr>
                          <tr>
                            <td style="text-align:center;">'.$mediciones["desfibriladorEquipo3"].'</td>
                            <td style="text-align:center;">'.$mediciones["desfibriladorPatron3"].'</td>
                            <td style="text-align:center;">j</td>
                          </tr>
                           <tr>
                            <td style="text-align:center;">'.$mediciones["desfibriladorEquipo4"].'</td>
                            <td style="text-align:center;">'.$mediciones["desfibriladorPatron4"].'</td>
                            <td style="text-align:center;">j</td>
                          </tr>
                          <tr>
                            <td style="text-align:center;">'.$mediciones["desfibriladorEquipo5"].'</td>
                            <td style="text-align:center;">'.$mediciones["desfibriladorPatron5"].'</td>
                            <td style="text-align:center;">j</td>
                          </tr>
		';
}else{
	$tablabDesfibrilador ="";
}

	$bloque20 = <<<EOF

	<table>

		$tablabDesfibrilador

		
	</table>

EOF;


$pdf->writeHTML($bloque20, false, false, false, false, '');


if ($mediciones["principaldoppler"] == "Doppler") {

	 $tablabDoppler = 
	 '<h4>Tabla de Resultados</h4>
	 <tr>
                            <th style="text-align:center;">Patrón</th>
                            <th style="text-align:center;">Equipo</th>
                            <th style="text-align:center;">Unidad</th>
                          </tr>
                          <tr>
                            <td style="text-align:center;">60</td>
                            <td style="text-align:center;">'.$mediciones["dopplerEquipo1"].'</td>
                            <td style="text-align:center;">BPM</td>
                          </tr>
                          <tr>
                            <td style="text-align:center;">90</td>
                            <td style="text-align:center;">'.$mediciones["dopplerEquipo2"].'</td>
                            <td style="text-align:center;">BPM</td>
                          </tr>
                          <tr>
                            <td style="text-align:center;">120</td>
                            <td style="text-align:center;">'.$mediciones["dopplerEquipo3"].'</td>
                            <td style="text-align:center;">BPM</td>
                          </tr>
                          <tr>
                            <td style="text-align:center;">150</td>
                            <td style="text-align:center;">'.$mediciones["dopplerEquipo4"].'</td>
                            <td style="text-align:center;">BPM</td>
                          </tr>
                          <tr>
                            <td style="text-align:center;">180</td>
                            <td style="text-align:center;">'.$mediciones["dopplerEquipo5"].'</td>
                            <td style="text-align:center;">BPM</td>
                          </tr>
                          <tr>
                            <td style="text-align:center;">210</td>
                            <td style="text-align:center;">'.$mediciones["dopplerEquipo6"].'</td>
                            <td style="text-align:center;">BPM</td>
                          </tr>
		';
}else{
	$tablabDoppler ="";
}

	$bloque21 = <<<EOF

	<table>

		$tablabDoppler

		
	</table>

EOF;


$pdf->writeHTML($bloque21, false, false, false, false, '');


if ($mediciones["principalholter"] == "Holter") {

	 $tablabHolter = 
	 '<h4>Tabla de Resultados</h4>
	 <tr>
                            <th style="text-align:center;">Patrón</th>
                            <th style="text-align:center;">Equipo</th>
                            <th style="text-align:center;">Unidad</th>
                          </tr>
                          <tr>
                            <td style="text-align:center;">60</td>
                            <td style="text-align:center;">'.$mediciones["holterEquipo1"].'</td>
                            <td style="text-align:center;">BPM</td>
                          </tr>
                          <tr>
                            <td style="text-align:center;">90</td>
                            <td style="text-align:center;">'.$mediciones["holterEquipo2"].'</td>
                            <td style="text-align:center;">BPM</td>
                          </tr>
                          <tr>
                            <td style="text-align:center;">120</td>
                            <td style="text-align:center;">'.$mediciones["holterEquipo3"].'</td>
                            <td style="text-align:center;">BPM</td>
                          </tr>
                          <tr>
                            <td style="text-align:center;">150</td>
                            <td style="text-align:center;">'.$mediciones["holterEquipo4"].'</td>
                            <td style="text-align:center;">BPM</td>
                          </tr>
                          <tr>
                            <td style="text-align:center;">180</td>
                            <td style="text-align:center;">'.$mediciones["holterEquipo5"].'</td>
                            <td style="text-align:center;">BPM</td>
                          </tr>
		';
}else{
	$tablabHolter ="";
}

	$bloque22 = <<<EOF

	<table>

		$tablabHolter
	
		
	</table>

EOF;


$pdf->writeHTML($bloque22, false, false, false, false, '');


if ($mediciones["principalespio"] == "Espirometro") {

	 $tablabEspirometro = 
	 '<h4>Espirómetro</h4>
	 <tr>
                            <th style="text-align:center;">Equipo</th>
                            <th style="text-align:center;">Patrón</th>
                            <th style="text-align:center;">Unidad</th>
                          </tr>
                          <tr>
                            <td style="text-align:center;">500</td>
                            <td style="text-align:center;">'.$mediciones["espirometroPatron1"].'</td>
                            <td style="text-align:center;">ml</td>
                          </tr>
                          <tr>
                            <td style="text-align:center;">1000</td>
                            <td style="text-align:center;">'.$mediciones["espirometroPatron2"].'</td>
                            <td style="text-align:center;">ml</td>
                          </tr>
                          <tr>
                            <td style="text-align:center;">3000</td>
                            <td style="text-align:center;">'.$mediciones["espirometroPatron3"].'</td>
                            <td style="text-align:center;">ml</td>
                          </tr>
		';
}else{
	$tablabEspirometro = "";
}

	$bloque23 = <<<EOF

	<table>

		$tablabEspirometro

		
	</table>

EOF;


$pdf->writeHTML($bloque23, false, false, false, false, '');

if ($mediciones["principalflujo"] == "Flujometro") {

	 $tablabFlujometro = 
	 '<h4>Flujometro</h4>
	<tr>
                            <th style="text-align:center;">Equipo</th>
                            <th style="text-align:center;">Patrón</th>
                            <th style="text-align:center;">Unidad</th>
                          </tr>
                          <tr>
                            <td style="text-align:center;">'.$mediciones["flujometroEquipo1"].'</td>
                            <td style="text-align:center;">'.$mediciones["flujometroPatron1"].'</td>
                            <td style="text-align:center;">LPM</td>
                          </tr>
                          <tr>
                            <td style="text-align:center;">'.$mediciones["flujometroEquipo2"].'</td>
                            <td style="text-align:center;">'.$mediciones["flujometroPatron2"].'</td>
                            <td style="text-align:center;">LPM</td>
                          </tr>
                          <tr>
                            <td style="text-align:center;">'.$mediciones["flujometroEquipo3"].'</td>
                            <td style="text-align:center;">'.$mediciones["flujometroPatron3"].'</td>
                            <td style="text-align:center;">LPM</td>
                          </tr>
                          <tr>
                            <td style="text-align:center;">'.$mediciones["flujometroEquipo4"].'</td>
                            <td style="text-align:center;">'.$mediciones["flujometroPatron4"].'</td>
                            <td style="text-align:center;">LPM</td>
                          </tr>
		';
}else{
	$tablabFlujometro = "";
}

	$bloque24 = <<<EOF

	<table>

		$tablabFlujometro
	
		
	</table>

EOF;


$pdf->writeHTML($bloque24, false, false, false, false, '');

if ($mediciones["principalincu"] == "Incubadora" && $mediciones["centigrado"] == "centigrado") {

	 $tablabincubadora = 
	 '<h4>Tabla de Resultados</h4>
	<tr>
                            <th style="text-align:center;">Equipo</th>
                            <th style="text-align:center;">Patrón</th>
                            <th style="text-align:center;">Unidad</th>
                          </tr>
                          <tr>
                            <td style="text-align:center;">'.$mediciones["incubadoraEquipo1"].'</td>
                            <td style="text-align:center;">'.$mediciones["incubadoraPatron1"].'</td>
                            <td style="text-align:center;">°C</td>
                          </tr>
                          <tr>
                            <td style="text-align:center;">'.$mediciones["incubadoraEquipo2"].'</td>
                            <td style="text-align:center;">'.$mediciones["incubadoraPatron2"].'</td>
                            <td style="text-align:center;">°C</td>
                          </tr>
                          <tr>
                            <td style="text-align:center;">'.$mediciones["incubadoraEquipo3"].'</td>
                            <td style="text-align:center;">'.$mediciones["incubadoraPatron3"].'</td>
                            <td style="text-align:center;">°C</td>
                          </tr>
		';
}else{
	$tablabincubadora = "";
}

	$bloque25 = <<<EOF

	<table>

		$tablabincubadora

		
	</table>

EOF;


$pdf->writeHTML($bloque25, false, false, false, false, '');



if ($mediciones["principalincu"] == "Incubadora" && $mediciones["farenheit"] == "farenheit") {

	 $tablabincubadoraFarenheit = 
	 '<h4>Tabla de Resultados</h4>
	<tr>
                            <th style="text-align:center;">Equipo</th>
                            <th style="text-align:center;">Patrón</th>
                            <th style="text-align:center;">Unidad</th>
                          </tr>
                          <tr>
                            <td style="text-align:center;">'.$mediciones["incubadoraEquipo1"].'</td>
                            <td style="text-align:center;">'.$mediciones["incubadoraPatron1"].'</td>
                            <td style="text-align:center;">°F</td>
                          </tr>
                          <tr>
                            <td style="text-align:center;">'.$mediciones["incubadoraEquipo2"].'</td>
                            <td style="text-align:center;">'.$mediciones["incubadoraPatron2"].'</td>
                            <td style="text-align:center;">°F</td>
                          </tr>
                          <tr>
                            <td style="text-align:center;">'.$mediciones["incubadoraEquipo3"].'</td>
                            <td style="text-align:center;">'.$mediciones["incubadoraPatron3"].'</td>
                            <td style="text-align:center;">°F</td>
                          </tr>
		';
}else{
	$tablabincubadoraFarenheit = "";
}

	$bloque255 = <<<EOF

	<table>

		$tablabincubadoraFarenheit

		
	</table>

EOF;


$pdf->writeHTML($bloque255, false, false, false, false, '');

if ($mediciones["principalmoni"] == "Monitor") {

	 $tablabMonitor = 
	 '<h4>Monitor NIBP</h4>
	<tr>
                            <th colspan="4" style="text-align:center;">NIBP</th>
                            <th colspan="4" style="text-align:center;">SPO2</th>
                          </tr>
                          <tr>
                            <td colspan="2" style="text-align:center;">Patrón</td>
                            <td colspan="3" style="text-align:center;">Equipo</td>
                            <td>Patrón</td>
                            <td>Equipo</td>
                            <td>Unidad</td>
                          </tr>
                          <tr>
                            <td>Sistólica</td>
                            <td>Diastólica</td>
                            <td>Sistólica</td>
                            <td>Diastólica</td>
                            <td style="text-align:center;">Unidad</td>
                            <td style="text-align:center;">85</td>
                            <td style="text-align:center;">'.$mediciones["monitorEquipo1"].'</td>
                            <td style="text-align:center;">%</td>
                          </tr>
                          <tr>
                            <td style="text-align:center;">60</td>
                            <td style="text-align:center;">30</td>
                            <td style="text-align:center;">'.$mediciones["monitorSistolica1"].'</td>
                            <td style="text-align:center;">'.$mediciones["monitorDiastolica1"].'</td>
                            <td style="text-align:center;">mmHg</td>
                            <td style="text-align:center;">90</td>
                            <td style="text-align:center;">'.$mediciones["monitorEquipo2"].'</td>
                            <td style="text-align:center;">%</td>
                          </tr>
                          <tr>
                            <td style="text-align:center;">120</td>
                            <td style="text-align:center;">80</td>
                            <td style="text-align:center;">'.$mediciones["monitorSistolica2"].'</td>
                            <td style="text-align:center;">'.$mediciones["monitorDiastolica2"].'</td>
                            <td style="text-align:center;">mmHg</td>
                            <td style="text-align:center;">95</td>
                            <td style="text-align:center;">'.$mediciones["monitorEquipo3"].'</td>
                            <td style="text-align:center;">%</td>
                          </tr>
                          <tr>
                            <td style="text-align:center;">150</td>
                            <td style="text-align:center;">100</td>
                            <td style="text-align:center;">'.$mediciones["monitorSistolica3"].'</td>
                            <td style="text-align:center;">'.$mediciones["monitorDiastolica3"].'</td>
                            <td style="text-align:center;">mmHg</td>
                            <td style="text-align:center;">97</td>
                            <td style="text-align:center;">'.$mediciones["monitorEquipo4"].'</td>
                            <td style="text-align:center;">%</td>
                          </tr>
                          <tr>
                            <td style="text-align:center;">200</td>
                            <td style="text-align:center;">150</td>
                            <td style="text-align:center;">'.$mediciones["monitorSistolica4"].'</td>
                            <td style="text-align:center;">'.$mediciones["monitorDiastolica4"].'</td>
                            <td style="text-align:center;">mmHg</td>
                            <td style="text-align:center;">99</td>
                            <td style="text-align:center;">'.$mediciones["monitorEquipo5"].'</td>
                            <td style="text-align:center;">%</td>
                          </tr>
		';
}else{
	$tablabMonitor = "";
}

	$bloque26 = <<<EOF

	<table>

		$tablabMonitor
	
		
	</table>

EOF;


$pdf->writeHTML($bloque26, false, false, false, false, '');

if ($mediciones["principalpipeta"] == "Pipeta" && $mediciones["noapto"] == "noapto") {

	 $tablapipeta = 
	 '<h4>Pipeta</h4>
	<tr>
                            <th style="text-align:center;">Estado</th>
                            <th style="text-align:center;">Fugas (QL)</th>
                            <th style="text-align:center;">Unidad</th>
                          </tr>
                          <tr>
                            <td style="text-align:center;">No apto</td>
                            <td style="text-align:center;">'.$mediciones["pipetaFugas1"].'</td>
                            <td style="text-align:center;">hPa*ml/s</td>
                          </tr>
		';
}else{
	$tablapipeta = "";
}

	$bloque27 = <<<EOF

	<table>

		$tablapipeta
	
		
	</table>

EOF;


$pdf->writeHTML($bloque27, false, false, false, false, '');


if ($mediciones["principalpipeta"] == "Pipeta" && $mediciones["apto"] == "apto") {

	 $tablapipetaapto = 
	 '<h4>Pipeta</h4>
	<tr>
                            <th style="text-align:center;">Estado</th>
                            <th style="text-align:center;">Fugas (QL)</th>
                            <th style="text-align:center;">Unidad</th>
                          </tr>
                          <tr>
                            <td style="text-align:center;">Apto</td>
                            <td style="text-align:center;">'.$mediciones["pipetaFugas1"].'</td>
                            <td style="text-align:center;">hPa*ml/s</td>
                          </tr>
		';
}else{
	$tablapipetaapto = "";
}

	$bloque272 = <<<EOF

	<table>

		$tablapipetaapto
	
		
	</table>

EOF;


$pdf->writeHTML($bloque272, false, false, false, false, '');

if ($mediciones["principalpulsiom"] == "Pulsioximetro") {

	 $tablPulsioximetro = 
	 '<h4>Pulsioximetro</h4>
	<tr>
                            <th style="text-align:center;">Patrón</th>
                            <th style="text-align:center;">Equipo</th>
                            <th style="text-align:center;">Unidad</th>
                          </tr>
                          <tr>
                            <td style="text-align:center;">85</td>
                            <td style="text-align:center;">'.$mediciones["pulsioximetroEquipo1"].'</td>
                            <td style="text-align:center;">%</td>
                          </tr>
                          <tr>
                            <td style="text-align:center;">90</td>
                            <td style="text-align:center;">'.$mediciones["pulsioximetroEquipo2"].'</td>
                            <td style="text-align:center;">%</td>
                          </tr>
                          <tr>
                            <td style="text-align:center;">95</td>
                            <td style="text-align:center;">'.$mediciones["pulsioximetroEquipo3"].'</td>
                            <td style="text-align:center;">%</td>
                          </tr>
                          <tr>
                            <td style="text-align:center;">97</td>
                            <td style="text-align:center;">'.$mediciones["pulsioximetroEquipo4"].'</td>
                            <td style="text-align:center;">%</td>
                          </tr>
                          <tr>
                            <td style="text-align:center;">99</td>
                            <td style="text-align:center;">'.$mediciones["pulsioximetroEquipo5"].'</td>
                            <td style="text-align:center;">%</td>
                          </tr>
		';
}else{
	$tablPulsioximetro = "";
}

	$bloque28 = <<<EOF

	<table>

		$tablPulsioximetro

		
		
	</table>

EOF;


$pdf->writeHTML($bloque28, false, false, false, false, '');

if ($mediciones["Termohigrometros"] == "Termohigrometros") {

	 $Termohigrometros = 
	 '<h4>Termohigrometros</h4>
      
                          <tr>
                            <th colspan="4" style="text-align:center;">Temperatura</th>
                            <th colspan="3" style="text-align:center;">Humedad Relativa</th>
                          </tr>
                          <tr>
                            <td style="text-align:center;">Patrón</td>
                            <td style="text-align:center;">In</td>
                            <td style="text-align:center;">Out</td>
                            <td style="text-align:center;">Unidad</td>
                            <td style="text-align:center;">Patrón</td>
                            <td style="text-align:center;">Equipo</td>
                            <td style="text-align:center;">Unidad</td>
                          </tr>
                          <tr>
                            <td style="text-align:center;">'.$mediciones["Termohigrometrospatron1"].'</td>
                            <td style="text-align:center;">'.$mediciones["Termohigrometrosin1"].'</td>
                            <td style="text-align:center;">'.$mediciones["Termohigrometrosou1"].'</td>
                            <td style="text-align:center;">°C</td>
                            <td style="text-align:center;">'.$mediciones["Termohigrometrospatron5"].'</td>
                            <td style="text-align:center;">'.$mediciones["Termohigrometrosequipo1"].'</td>
                            <td style="text-align:center;">%</td>
                          </tr>
                          <tr>
                            <td style="text-align:center;">'.$mediciones["Termohigrometrospatron2"].'</td>
                            <td style="text-align:center;">'.$mediciones["Termohigrometrosin2"].'</td>
                            <td style="text-align:center;">'.$mediciones["Termohigrometrosou2"].'</td>
                            <td style="text-align:center;">°C</td>
                            <td style="text-align:center;">'.$mediciones["Termohigrometrospatron3"].'</td>
                            <td style="text-align:center;">'.$mediciones["Termohigrometrosequipo2"].'</td>
                            <td style="text-align:center;">%</td>
                          </tr>
                  
		';
}else{
	$Termohigrometros = "";
}

	$bloque2858 = <<<EOF

	<table>

		$Termohigrometros

		
		
	</table>

EOF;





$pdf->writeHTML($bloque2858, false, false, false, false, '');


$bloque29 = <<<EOF

	<table style="font-size:10px; padding:5px 10px;">	
		
		<tr>
		<td style="background-color:white; width:540px"></td>
		</tr>
		<tr>
		<td style="background-color:white; width:270px;">
				FIRMA DE RECIBIDO: <img style="width:120px" src="../../../$respuestaReporte[firma]">
		</td>
		<td style="background-color:white; width:270px;">
				FIRMA : <img style="width:120px" src="../../../$respuestaReporte[firmarealizaMan]">
		</td>
		</tr>
		
	</table>

EOF;

$pdf->writeHTML($bloque29, false, false, false, false, '');





// ---------------------------------------------------------
//SALIDA DEL ARCHIVO 

$pdf->Output('reportePdf.pdf');

}

}

$reporteNumero = new imprimirReporte();
$reporteNumero -> reporte = $_GET["num_reporte"];
$reporteNumero -> traerImpresionReporte();

 ?>