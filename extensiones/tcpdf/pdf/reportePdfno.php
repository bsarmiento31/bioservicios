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

//TRAEMOS LA INFORMACIÓN DE LA VENTA

$itemReporte = "num_reporte";
$valorReporte = $this->reporte;
$orden = null;
$perfil = null;

$respuestaReporte = ControladorMantenimiento::ctrMostrarModelosno($itemReporte, $valorReporte,$orden, $perfil);

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


			<td style="border: 1px solid #666; color:#333; background-color:white; width:100px; text-align:center;">
				$valorReporte
			</td>

		</tr>

		<tr>
		<td style="border-bottom: 1px solid white; background-color:white; width:540px"></td>
		</tr>

		<tr>
		<td style="font-weight: bold; font-size:13px; color:#e51d1d; border-bottom: 1px solid white; background-color:white; text-align:center; width:540px">REPORTE DE SERVICIO DE MANTENIMIENTO DE EQUIPOS MEDICOS</td>
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
		<td style="background-color:white; border-top:1px solid #666;border-right: 1px solid #666; border-left: 1px solid #666;border-style: groove; width:540px">
				Cliente: $clientes1[nombre]
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

$bloque4 = <<<EOF

	<table style="font-size:10px; padding:5px 10px;">
		<tr>
		<td style="background-color:white; border-top:1px solid #666;border-right: 1px solid #666; border-left: 1px solid #666;border-style: groove; width:540px">
				TIPO DE MANTENIMIENTO: $respuestaReporte[tipo_manteniemiento]
		</td>
		</tr>
		<tr>
		<td style="background-color:white; border-left: 1px solid #666;border-top: 1px solid white;border-style: groove;width:270px">
				PREVENTIVO: $respuestaReporte[preventivo]
		</td>
		<td style="background-color:white; border-right: 1px solid #666;border-style: groove;width:270px;border-top: 1px solid white">
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
				EQUIPO REQUIERE SER RETIRADO DE LA ISNTITUCIÓN PARA SER : $respuestaReporte[equipo_evaluado] , en el laboratorio
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

// ---------------------------------------------------------
//SALIDA DEL ARCHIVO 

$pdf->Output('reportePdf.pdf', 'D');

}

}

$reporteNumero = new imprimirReporte();
$reporteNumero -> reporte = $_GET["num_reporte"];
$reporteNumero -> traerImpresionReporte();

 ?>