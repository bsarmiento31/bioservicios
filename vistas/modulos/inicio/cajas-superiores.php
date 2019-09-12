<?php
$item = null;
$valor = null;
$orden = "id_reporte";
$orden2 = "id_equipo";
$perfil = null;
$perfil1 = null;
$select2 = null;
$usuarios = ControladorUsuarios::ctrMostrarUsuarios($item, $valor, $perfil);
$totalUsuarios = count($usuarios);
$clientes = ControladorClientes::ctrMostrarClientes($item, $valor);
$totalClientes = count($clientes);
// $cronogramas = ControladorCronograma::ctrMostrarCronogramas($item, $valor);
// $totalCronogramas = count($cronogramas);
$equipos = controladorEquipos::ctrMostrarEquipos($item, $valor, $orden2,$select2);
$totalEquipos = count($equipos);
$mantenimientos = ControladorMantenimiento::ctrMostrarModelos($item, $valor,$orden, $perfil1);
$totalMantenimientos = count($mantenimientos);
?>
<div class="box box-danger">
  <div class="box-header with-border">
    <div class="col-lg-3 col-xs-6">
      <div class="small-box bg-aqua">
        
        <div class="inner">
          
          <h3><?php echo $totalUsuarios ?></h3>
          <p>Usuarios</p>
          
        </div>
        
        <div class="icon">
          
          <i class="fa fa-users"></i>
          
        </div>
        
        <a href="usuarios" class="small-box-footer">
          
          Más info <i class="fa fa-arrow-circle-right"></i>
          
        </a>
      </div>
    </div>
    <div class="col-lg-3 col-xs-6">
      <div class="small-box bg-green">
        
        <div class="inner">
          
          <h3><?php echo $totalClientes ?></h3>
          <p>Clientes</p>
          
        </div>
        
        <div class="icon">
          
          <i class="ion ion-person-add"></i>
          
        </div>
        
        <a href="cliente" class="small-box-footer">
          
          Más info <i class="fa fa-arrow-circle-right"></i>
          
        </a>
      </div>
    </div>
    <div class="col-lg-3 col-xs-6">
      <div class="small-box bg-yellow">
        
        <div class="inner">
          
          <h3><?php echo $totalEquipos?></h3>
          <p>Equipos</p>
          
        </div>
        
        <div class="icon">
          
          <i class="ion ion-clipboard"></i>
          
        </div>
        
        <a href="equipos" class="small-box-footer">
          Más info <i class="fa fa-arrow-circle-right"></i>
        </a>
      </div>
    </div>
    <div class="col-lg-3 col-xs-6">
      <div class="small-box bg-red">
        
        <div class="inner">
          
          <h3><?php echo $totalMantenimientos?></h3>
          <p>Mantenimientos</p>
          
        </div>
        
        <div class="icon">
          
          <i class="fa fa-calendar"></i>
          
        </div>
        
        <a href="mantenimiento" class="small-box-footer">
          
          Más info <i class="fa fa-arrow-circle-right"></i>
          
        </a>
      </div>
    </div>
  </div>
</div>