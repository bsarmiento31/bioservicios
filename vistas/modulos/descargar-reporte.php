<?php
 
require_once "../../controladores/mantenimiento.controlador.php";
require_once "../../modelos/mantenimiento.modelo.php";
require_once "../../controladores/clientes.controlador.php";
require_once "../../modelos/clientes.modelo.php";
require_once "../../controladores/usuarios.controlador.php";
require_once "../../modelos/usuarios.modelo.php";
require_once "../../controladores/equipos.controlador.php";
require_once "../../modelos/equipo.modelo.php";
require_once "../../controladores/cronograma.controlador.php";
require_once "../../modelos/cronograma.modelo.php";

 
  
 

$reporte = new ControladorMantenimiento();
$reporte -> ctrDescargarReporte();

$reportePreventivo = new ControladorMantenimiento();
$reportePreventivo -> ctrDescargarReporteNopreventivo();

$reporteUsuarios = new ControladorUsuarios();
$reporteUsuarios -> ctrDescargarReporteUsuarios();

$reporteEquipos = new controladorEquipos();
$reporteEquipos -> ctrDescargarReporteEquipos();

$reporteClientes = new ControladorClientes();
$reporteClientes -> ctrDescargarReporteClientes();

$reporteCronograma = new ControladorCronograma();
$reporteCronograma -> ctrDescargarReporteCronograma();

$reporteCronograma2020 = new ControladorCronograma();
$reporteCronograma2020 -> ctrDescargarReporteCronograma2020();

$reporteCronograma2021 = new ControladorCronograma();
$reporteCronograma2021 -> ctrDescargarReporteCronograma2021();