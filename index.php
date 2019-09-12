<?php

require_once "controladores/plantilla.controlador.php";
require_once "controladores/usuarios.controlador.php";
require_once "controladores/clientes.controlador.php";
require_once "controladores/cronograma.controlador.php";
require_once "controladores/mantenimiento.controlador.php";
require_once "controladores/equipos.controlador.php";
require_once "controladores/trabajos.controlador.php";
require_once "controladores/instrumentos.controlador.php";
require_once "controladores/calibracion.controlador.php";


require_once "modelos/usuarios.modelo.php";
require_once "modelos/clientes.modelo.php";
require_once "modelos/cronograma.modelo.php";
require_once "modelos/mantenimiento.modelo.php";
require_once "modelos/equipo.modelo.php";
require_once "modelos/trabajos.modelo.php";
require_once "modelos/instrumentos.modelo.php";
require_once "modelos/calibracion.modelo.php";


$plantilla = new ControladorPlantilla();
$plantilla -> ctrPlantilla();