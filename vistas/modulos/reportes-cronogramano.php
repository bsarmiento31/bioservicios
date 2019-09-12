<?php
$item = "num_reporte";
$valor = $_GET["idReporteno"];
$orden = null;
$perfil = null;
$reportes = ControladorMantenimiento::ctrMostrarModelosno($item, $valor,$orden,$perfil);
$mediciones = json_decode($reportes["mediciones"],true);

?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
    Reporte
    <small><strong>#<?php echo $reportes['num_reporte'];?></strong></small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="inicio"><i class="fa fa-dashboard"></i> inicio</a></li>
      <li><a href="cronograma">Cronogramas</a></li>
      <li class="active">Reportes</li>
    </ol>
  </section>
  <div class="pad margin no-print">
    <div class="callout callout-info" style="margin-bottom: 0!important;">
      <h4><i class="fa fa-info"></i> Nota</h4>
      En esta sección podemos vizualizar los mantenimientos creados hasta el momento
    </div>
  </div>
  <!-- Main content -->
  <section class="invoice">
    <!-- title row -->
    <div class="row">
      <div class="col-xs-12">
        <h2 class="page-header">
        <i class="fa fa-table"></i> Reporte de servicio de mantenimiento de equipos médicos
        <small class="pull-right">Fecha <?php echo date("d-m-Y")?></small>
        </h2>
      </div>
      <!-- /.col -->
    </div>
    <!-- info row -->
    <div class="row invoice-info">
      <div class="col-sm-4 invoice-col">
        
        <?php
        $item1 = "id";
        $valor1 = $reportes["id_clinica"];
        $perfil1 = null;
        $usuarios = ControladorUsuarios::ctrMostrarUsuarios($item1, $valor1, $perfil1);
        ?>
        <b>Informacion del cliente</b><br>
        <br>
        <b>Clinica:</b> <?php echo $usuarios['nombre'];?><br>
        <b>Equipo:</b> <?php echo $reportes['equipo_re'];?><br>
        <b>Marca:</b> <?php echo $reportes['marca_re'];?><br>
        <b>Modelo:</b> <?php echo $reportes['modelo_re'];?><br>
        <b>Serie:</b> <?php echo $reportes['serie'];?><br>
      </div>
      <!-- /.col -->
      <div class="col-sm-4 invoice-col">
        <b>Mantenimientos</b><br>
        <br>
        <b>Tipo de mantenimiento:</b> <?php echo $reportes['tipo_manteniemiento'];?><br>
        <b>Preventivo:</b> <?php echo $reportes['preventivo'];?><br>
        <b>Preventivo con problema:</b> <?php echo $reportes['preventivo_problema'];?><br>
        <b>Reportado por:</b> <?php echo $reportes['reportado'];?><br>
        <b>Cargo:</b> <?php echo $reportes['cargo'];?><br>
        <b>Solicitud de servicio No:</b> <?php echo $reportes['solicitud'];?><br>
      </div>
      <!-- /.col -->
      <div class="col-sm-4 invoice-col">
        <b>Fechas</b><br>
        <br>
        <b>Fecha del servicio:</b> <?php echo $reportes['fecha_inicio'];?><br>
        <b>Fecha del proximo mantenimiento:</b> <?php echo $reportes['fecha_proximo'];?><br>
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->
    <br>
    <!-- Table row -->
    <div class="row">
      <div class="col-md-6 table-responsive">
        <div class="box-header with-border">
          <h3 class="box-title">Información</h3>
        </div>
        <table class="table table-striped">
          <tbody>
            <tr>
              <th>Diagnostico</th>
              <td><?php echo $reportes['diagnostico'];?></td>
            </tr>
            <tr>
              <th>Trabajo realizado</th>
              <td><?php echo $reportes['trabajo'];?></td>
            </tr>
            <tr>
              <th>Instrumentos Utilizados</th>
              <td><?php echo $reportes['instrumentos'];?></td>
            </tr>
            <tr>
              <th>Recomendaciones</th>
              <td><?php echo $reportes['recomendaciones'];?></td>
            </tr>
            <tr>
              <th>Accesorios y repuestos instalados</th>
              <td><?php echo $reportes['accesorios'];?></td>
            </tr>
            <tr>
              <?php
              if ($reportes["equipo_servicio"] == "Si") {
              echo '<th>Equipo Fuera de servicio</th><td>'.$reportes["equipo_servicio"].' - '.$reportes["servicio_motivo"].'</td>';
              }else{
              echo '<th>Equipo Fuera de servicio</th><td>'.$reportes["equipo_servicio"].'</td>';
              }
              ?>
            </tr>
          </tbody>
        </table>
      </div>
      <div class="col-md-6 table-responsive">
       <!--  <div class="box-header with-border">
          <h3 class="box-title">Mediciones</h3>
        </div> -->
        
          <?php

            if ($mediciones["principalventilador"] == "Ventilador") {
              echo 
                '
                  <h4>Ventilador</h4>
                    <table class="table table-hover table-bordered">
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
                          </tr>

                    </table>';

              }else if ($mediciones["principalana"] == "tensiometro Analogo") {
                echo 
                '
                <h4>Tensiometro Analogo</h4>
                    <table class="table table-hover">

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
                    </table>';
              }else if($mediciones["principaldigi"] == "Tensiometro digital") {
                
                echo 
                '
                <h4>Tensiometro Digital</h4>
                    <table class="table table-hover">

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
                            <td>mmHg</td>
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
                          </tr>
                    </table>';

              }else if($mediciones["principalvacu"] == "Succionador Vacuometro"){
                echo 
                '
                  <h4>Succionador / Vacuometro</h4>
                    <table class="table table-hover">

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
                          </tr>
                    </table>';
              }else if($mediciones["principalmon"] == "Monitor Multiparametros"){

                echo 
                ' 
                  <h4>Monitor Multiparametros</h4>
                    <table class="table table-hover table-bordered">

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
                          </tr>
                    </table>';
              }else if($mediciones["principallam"] == "Lampara de Fotocurado"){

               echo 
                '
                  <h4>Lampara de Fotocurado</h4>
                    <table class="table table-hover">

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
                          </tr>
                    </table>';

              }else if($mediciones["principalauto"] == "Autoclave") {

                echo 
                '<h4>Autoclave</h4>
                    <table class="table table-hover table-bordered">

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
                             <td style="text-align:center;">min</td>
                             <td style="text-align:center;">'.$mediciones["autoclaveEquipo3"].'</td>
                             <td style="text-align:center;">'.$mediciones["autoclavePatron3"].'</td>
                             <td style="text-align:center;">°F</td>
                             <td style="text-align:center;">'.$mediciones["autoclaveEquipo5"].'</td>
                             <td style="text-align:center;">'.$mediciones["autoclavePatron5"].'</td>
                             <td style="text-align:center;">Mpa</td>
                          </tr>
                          <tr>
                             <td style="text-align:center;">'.$mediciones["autoclaveEquipo2"].'</td>
                             <td style="text-align:center;">'.$mediciones["autoclavePatron2"].'</td>
                             <td style="text-align:center;">min</td>
                             <td style="text-align:center;">'.$mediciones["autoclaveEquipo4"].'</td>
                             <td style="text-align:center;">'.$mediciones["autoclavePatron4"].'</td>
                             <td style="text-align:center;">°F</td>
                             <td style="text-align:center;">'.$mediciones["autoclaveEquipo6"].'</td>
                             <td style="text-align:center;">'.$mediciones["autoclavePatron6"].'</td>
                             <td style="text-align:center;">Mpa</td>
                          </tr>
                    </table>';

              }else if($mediciones["principalbomba"] == "Bomba de infusion"){

                echo 
                '
                <h4>Bomba de infusión</h4>
                    <table class="table table-hover table-bordered">

                          <tr>
                            <th colspan="4" style="text-align:center;">Flujo</th>
                            <th colspan="3" style="text-align:center;">Volumen</th>
                          </tr>
                          <tr>
                            <td style="text-align:center;">Canal</td>
                            <td style="text-align:center;">Equipo</td>
                            <td style="text-align:center;>Patrón</td>
                            <td style="text-align:center;">Unidad</td>
                            <td style="text-align:center;">equipo</td>
                            <td style="text-align:center;>Patrón</td>
                            <td style="text-align:center;">Unidad</td>
                          </tr>
                          <tr>
                             <td style="text-align:center;">Canal 1</td>
                             <td style="text-align:center;">200</td>
                             <td style="text-align:center;">'.$mediciones["bombaInfuPatron1"].'</td>
                             <td>ml/h</td>
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
                          </tr>
                    </table>';

              }else if ($mediciones["principalcen"] == "centrifuga") {
                echo 
                '<h4>Centrifuga / Agitador de Mazzini / Agitador de tubos/Vortex</h4>
                    <table class="table table-hover table-bordered">

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
                    </table>';
              }else if ($mediciones["principalaudio"] == "Audiometro") {

                echo 
                '<h4>Audiómetro</h4>
                    <table class="table table-hover table-bordered">

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
                            <td style="text-align:center;">'.$mediciones["audiometroEquipo4"].'</td>
                            <td style="text-align:center;">'.$mediciones["audiometroAurIz4"].'</td>
                            <td style="text-align:center;">'.$mediciones["audiometroAurDer4"].'</td>
                            <td style="text-align:center;">dB</td>
                          </tr>
                    </table>';
                
              }else if ($mediciones["principalbasculas"] == "basculas") {

                echo 
                '
                <h4>Bascula pesa personas / bascula pesa bebes / gramera</h4>
                    <table class="table table-hover table-bordered">

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
                 </table>';
                
              }else if ($mediciones["principalaudiometria"] == "Audiometria") {
               
                echo '
                <h4>Cabina de Audiometría</h4>
                    <table class="table table-hover">

                          <tr>
                            <th style="text-align:center;">Atenuación</th>
                            <th style="text-align:center;">'.$mediciones["audiometriaAtenuacion1"].'</th>
                            <th style="text-align:center;">dB</th>
                          </tr>
 
                    </table>';

              }else if ($mediciones["principaloxigeno"] == "Concentrador de oxigeno") {
                
                echo ' 
                  <h4>Concentrador de oxigeno</h4>
                    <table class="table table-hover table-bordered">

                          <tr>
                            <th colspan="3" style="text-align:center;">Flujo</th>
                            <th colspan="3" style="text-align:center;">Concentración de oxígeno</th>
                          </tr>
                          <tr>
                            <td>Equipo</td>
                            <td>Patrón</td>
                            <td>Unidad</td>
                            <td>Equipo</td>
                            <td>Patrón</td>
                            <td>Unidad</td>
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
                          <tr>
                            <td style="text-align:center;">'.$mediciones["concentradorOxEquipo3"].'</td>
                            <td style="text-align:center;">'.$mediciones["concentradorOxPatron3"].'</td>
                            <td style="text-align:center;">LPM</td>
                            <td style="text-align:center;">'.$mediciones["concentradorOxEquipo6"].'</td>
                            <td style="text-align:center;">'.$mediciones["concentradorOxPatron6"].'</td>
                            <td style="text-align:center;">%</td>
                          </tr>
                    </table>';

              }else if ($mediciones["principaldesfibrilador"] == "Desfibrilador") {
            
                echo '
                <h4>Desfibrilador</h4>
                    <table class="table table-hover table-bordered">

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
                  
                    </table>';

              }else if ($mediciones["principaldoppler"] == "Doppler") {
                
                echo '

                <h4>Doppler Fetal / Monitor Fetal</h4>
                    <table class="table table-hover table-bordered">
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
                  
                    </table>';

              }else if ($mediciones["principalholter"] == "Holter") {
                  
                echo '
                <h4>Electrocardiografo / Holter / Prueba de Esfuerzo</h4>
                    <table class="table table-hover table-bordered">
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
                  
                    </table>';

              }else if ($mediciones["principalespio"] == "Espirometro") {
                echo '
                  <h4>Espirometro</h4>
                    <table class="table table-hover table-bordered">
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
    
                    </table>';
              }else if ($mediciones["principalflujo"] == "Flujometro") {
                echo 
                '<h4>Flujometo</h4>
                    <table class="table table-hover table-bordered">
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
    
                    </table>';
              }else if ($mediciones["principalincu"] == "Incubadora") {
                echo 
              '<h4>Incubadora neonatal / Servocuna / Sistema de normotermia / Incubadora de muestras / Baño serologico / Termometro de nevera / Termometro de punzón</h4>
                <table class="table table-hover table-bordered">
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
                    </table>';
              }else if ($mediciones["principalmoni"] == "Monitor") {
                echo 
                '<h4>Monitor NIBP</h4>
                    <table class="table table-hover table-bordered">
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
                            <td>'.$mediciones["monitorSistolica1"].'</td>
                            <td>'.$mediciones["monitorDiastolica1"].'</td>
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
    
                    </table>';
              }else if ($mediciones["principalpipeta"] == "Pipeta") {
                echo 
                '<h4>Pipeta</h4>
                    <table class="table table-hover table-bordered">
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
   
                    </table>';
              }else if ($mediciones["principalpulsiom"] == "Pulsioximetro") {
                echo 
                '<h4>Pulsioximetro</h4>
                    <table class="table table-hover table-bordered">
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
   
                    </table>';
              }
              
         

          ?>


        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
      <br>
      <div class="row">
        <!-- accepted payments column -->
        <div class="col-xs-6">
          <b>Firma de quien recibe</b><br>
          <?php
          if($reportes["firma"] != ""){
          echo '<img src="'.$reportes["firma"].'"  width="30%"><br>
          ';
          }else{
          echo '<img src="vistas/img/firmas/brayan/firma.png" width="30%" alt="Firma"><br>';
          }
          ?>
        </div>
        <!-- /.col -->
        <div class="col-xs-6">
          <b>Firma de quien realiza el mantenimiento</b><br>
          <!-- <img src="vistas/img/firmas/brayan.png" width="30%" alt="Firma"><br> -->
          <?php
          if($reportes["firmarealizaMan"] != "")
          {
          echo '<img src="'.$reportes["firmarealizaMan"].'"  width="30%"><br>
          ';
          }
          else
          {
          echo '<img src="vistas/img/firmas/brayan/firma.png" width="30%" alt="Firma"><br>';
          }
          ?>
          
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
      <!-- this row will not appear when printing -->
      <br>
      <div class="row no-print">
        <div class="col-xs-12">
          <!--<a href="invoice-print.html" target="_blank" class="btn btn-default"><i class="fa fa-print"></i> Inprimir</a>--><!--
          <button type="button" class="btn btn-success pull-right"><i class="fa fa-print"></i> Imprimir
          </button> -->
          <button type="button" class="btn btn-primary pull-right btnGenerarPdfno" codigoReporteNuevo="<?php echo $reportes['num_reporte'] ?>" style="margin-right: 5px;">
          <i class="fa fa-download"></i> Generar PDF
          </button>
        </div>
      </div>
    </section>
    <!-- /.content -->
    <div class="clearfix"></div>
  </div>