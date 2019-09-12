<!-- TABLE: LATEST ORDERS -->
<div class="box box-warning">
  <div class="box-header with-border">
    <h3 class="box-title">Mantenimientos agregados recientemente</h3>
  </div>
  <!-- /.box-header -->
  <div class="box-body">
    <div class="table-responsive">
      <table class="table no-margin">
        <thead>
          <tr>
            <th>Reporte</th> 
            <th>Clinica</th>
            <th>Tipo de mantenimiento</th>
            <th>Fecha</th>
          </tr>
        </thead>
        <tbody>
          <?php 
          $item = null;
          $valor = null;
          $orden = "id_reporte";
          $perfil = null;
          $reportes = ControladorMantenimiento::ctrMostrarModelos($item, $valor,$orden,$perfil);
          $i = 0;
          foreach ($reportes as $key => $value) {
            if (++$i == 6) break;
          echo '<tr>
            <td><button class="btn btn-primary btn-xs btnMostrarReporte" idReporte="'.$value["num_reporte"].'">'.$value["num_reporte"].'</button></td>';

              $item = "id";
              $valor = $value["id_clinica"];
              $perfil = null;

              $usuarios = ControladorUsuarios::ctrMostrarUsuarios($item, $valor, $perfil);
              
            echo '
            <td>'.$usuarios["nombre"].'</td>';
            if ($value["tipo_manteniemiento"] == "Evaluacion") {
            echo'
            <td><span class="label label-warning">'.$value["tipo_manteniemiento"].'</span></td>';
            }else if ($value["tipo_manteniemiento"] == "Instalacion") {
            echo'
            <td><span class="label label-info">'.$value["tipo_manteniemiento"].'</span></td>';
            }else if ($value["tipo_manteniemiento"] == "Correctivo") {
            echo'
            <td><span class="label label-danger">'.$value["tipo_manteniemiento"].'</span></td>';
            }else if ($value["tipo_manteniemiento"] == "Preventivo") {
            echo'
            <td><span class="label label-success">'.$value["tipo_manteniemiento"].'</span></td>';
            }
             
            echo '<td>'.$value["fecha_inicio"].'</td>
          </tr>';
          }
          ?>
        </tbody>
      </table>
    </div>
    <br>
    <div class="box-footer clearfix">
      <a href="crear-mantenimiento" class="btn btn-sm btn-info btn-flat pull-left">Agregar</a>
      <a href="mantenimiento" class="btn btn-sm btn-default btn-flat pull-right">Ver todos</a>
    </div>
    <!-- /.table-responsive -->
  </div>