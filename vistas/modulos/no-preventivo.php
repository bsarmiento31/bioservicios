<div class="content-wrapper">
  <section class="content-header"> 
    
    <h1>
     
    Administrar mantenimientos no preventivos
     
    </h1> 
    <ol class="breadcrumb">
      
      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
      
      <li class="active">Administrar mantenimientos</li>
      
    </ol>
  </section>
  <section class="content">
    <div class="box">
      <?php
      if ($_SESSION["perfil"] =="Administrador" || $_SESSION["perfil"] =="Ingeniero") {
      ?>
      <div class="box-header with-border">
        <a href="crear-mantenimiento"><button class="btn btn-primary">
          Agregar mantenimiento
        </button></a>
        <a href="vistas/modulos/descargar-reporte.php?no-reporte=no-reporte"><button class="btn btn-success">Descargar reporte en Excel</button></a>

        <button type="button" class="btn btn-warning cancelar pull-right"><i class="fa fa-times"></i> Cancelar</button>
        <button type="button" class="btn btn-default" id="daterange-btnpreventivo">
        <span>
          <i class="fa fa-calendar"></i>Rango de fecha 
        </span>
        <i class="fa fa-caret-down"></i>
        </button>
        <button type="button" class="btn btn-default" id="daterangeproximo-btnpreventivo">
        <span>
          <i class="fa fa-calendar"></i> Fecha del proximo mantenimiento
        </span>
        <i class="fa fa-caret-down"></i>
        </button>
      </div>
      <?php
      }
      ?>
      
      <div class="box-body">
        <?php
        if ($_SESSION["perfil"] =="Administrador" || $_SESSION["perfil"] =="Ingeniero") {
        ?>

         <div class="row" style="margin-top: 10px;">
          <div class="col-md-4">
        <h4>Número de filas</h4>
        <div class="form-group">
          <select class="form-control" name="state" id="maxRows">
             <option value="5000">Mostrar todos</option>
             <option value="5">5</option>
             <option value="10">10</option>
             <option value="15">15</option>
             <option value="20">20</option>
             <option value="50">50</option>
             <option value="70">70</option>
             <option value="100">100</option>
            </select>
          
          </div>
          </div>
         <div class="col-md-8"></div>
      </div>
        
        <table class="table table-bordered table-striped dt-responsive tablas" id="table-id">
          
          <thead>
            
            <tr>
        
              <!-- <th style="width:10px;">#</th> -->
              <th>No Reporte</th>
              <th>Clinica</th>
              <th>Sede</th>
              <th>Equipo</th>
              <th>Marca</th>
              <th>Modelo</th>
              <th>Serie</th>
              <th>Tipos de mantenimiento</th>
              <!-- <th>Preventivo con problema</th> -->
              <th>Reportado</th>
              <th>Cargo</th>
              <th>Solicitud de servicio</th>
              <th>Diagnostico</th>
              <th>Trabajo Realizado</th> 
              <th>Instrumentos Utilizados</th>
              <th>Recomendaciones</th>
              <th>Accesorios</th>
              <th>Equipo fuera de servicio</th>
              <th>Equipo retirado</th>
              <th>Fecha de servicio</th>
              <th>Fecha de próximo mantenimiento</th>
              <th>Acciones</th> 
            </tr>
          </thead>
          <tbody>
            
            <?php
            //esto quiere decir que si trae fechas del archivo js por get realice la consulta, si no que me muestre toddos los resultados
            if (isset($_GET["fechaInicial"]))
            {
            $fechaInicial = $_GET["fechaInicial"];
            $fechaFinal = $_GET["fechaFinal"];
            $perfil = null;
            $valor = null;
            $reportes = ControladorMantenimiento::ctrRangoFechasMantenimientonopreventivo($fechaInicial, $fechaFinal,$perfil,$valor);
            }
            else if (isset($_GET["fechaInicialp"]))
            {
            $fechaInicial = $_GET["fechaInicialp"];
            $fechaFinal = $_GET["fechaFinalp"];
            $perfil = null;
            $valor = null;
            $reportes = ControladorMantenimiento::ctrRangoFechasMantenimientoProximonopreventivo($fechaInicial, $fechaFinal,$perfil,$valor);
            }
            else
            {
            $fechaInicial = null;
            $fechaFinal = null;
            $perfil = null; 
            $valor = null;
            $reportes = ControladorMantenimiento::ctrRangoFechasMantenimientonopreventivo($fechaInicial, $fechaFinal,$perfil,$valor);
            }
            // $reportes = ControladorMantenimiento::ctrRangoFechasMantenimiento($fechaInicial, $fechaFinal,$perfil,$valor);
            //var_dump($reportes);
            foreach ($reportes as $key => $value)
            {
            echo '<tr>
                <td>'.$value["num_reporte"].'</td>';
              $item = "id";
              $valor = $value["id_clinica"];
              $perfil = null;
              $usuarios = ControladorUsuarios::ctrMostrarUsuarios($item, $valor, $perfil);
              echo '
                 <td>'.$usuarios["nombre"].'</td>
                 <td>'.$value["sede"].'</td>
                 <td>'.$value["equipo_re"].'</td>
                 <td>'.$value["marca_re"].'</td>
                 <td>'.$value["modelo_re"].'</td>';
              if ($value["serieNueva"] != null) 
              {
                echo '<td>'.$value["serieNueva"].'</td>';
              }
              else if ($value["serieNueva"] != null && $value["serie"] != null) {
                echo '<td>'.$value["serieNueva"].' - '.$value["serie"].'</td>';
              }
              else
              {
                echo '<td>'.$value["serie"].'</td>';
              }

              if ($value["tipo_manteniemiento"] == "Evaluacion") {
                echo'
                <td><span class="label label-success">'.$value["tipo_manteniemiento"].'</span></td>';
              }else if ($value["tipo_manteniemiento"] == "Instalacion") {
                echo'
                <td><span class="label label-info">'.$value["tipo_manteniemiento"].'</span></td>';
                }else if ($value["tipo_manteniemiento"] == "Correctivo") {
                echo'
                <td><span class="label label-danger">'.$value["tipo_manteniemiento"].'</span></td>';
                }else if($value["tipo_manteniemiento"] == "Preventivo"){
                  echo'
                <td><span class="label label-warning">'.$value["tipo_manteniemiento"].'</span>'. ' - ' .$value["preventivo"].'</td>';
                }
                                  // <td>'.$value["preventivo_problema"].'</td>
              echo '    

                  <td>'.$value["reportado"].'</td>
                  <td>'.$value["cargo"].'</td>
                  <td>'.$value["solicitud"].'</td>
                  <td>'.$value["diagnostico"].'</td>';
           
                echo'
                 <td>'.$value["trabajo"].'</td> 
                 <td>'.$value["instrumentos"].'</td> 
                 <td>'.$value["recomendaciones"].'</td>
                 <td>'.$value["accesorios"].'</td>';

                if ($value["equipo_servicio"] == "Si")
                  {
                    echo '<td>'.$value["equipo_servicio"].' - '.$value["servicio_motivo"].'</td>';
                  }
                  else
                  {
                    echo '<td>'.$value["equipo_servicio"].'</td>';
                  }

                 echo'
                 <td>'.$value["equipo_evaluado"].'</td>
                 <td>'.$value["fecha_inicio"].'</td>
                 <td>'.$value["fecha_proximo"].'</td>';
              if($_SESSION["perfil"] == "Administrador")
              {
              echo '<td>
                <div class="btn-group">
                  
                  <button class="btn btn-warning btnEditarMantenimiento" idMantenimientoNo="'.$value["id_reporte"].'"><i class="fa fa-pencil"></i></button>
                  <button class="btn btn-danger btnEliminarMantenimientono" idMantenimiento="'.$value["id_reporte"].'" fotoFirma="'.$value["firma"].'" fotoFirmaRecibido="'.$value["firmarealizaMan"].'" numeroReporte="'.$value["num_reporte"].'" idUsuariosEli="'.$value["id_clinica"].'"><i class="fa fa-times"></i></button>
                </div>
              </td>';
              }
              else if ($_SESSION["perfil"] == "Ingeniero")
              {
              echo
              '<td>No se encuentran disponibles</td>';
              }
              echo '
            </tr>';
            }
            ?>
            
          </tbody>
        </table>
        <!--    Start Pagination -->
      <div class='pagination-container' >
        <nav>
          <ul class="pagination">
            
            <li data-page="prev" >
              <span> < <span class="sr-only">(current)</span></span>
            </li>
            <!-- Here the JS Function Will Add the Rows -->
            <li data-page="next" id="prev">
              <span> > <span class="sr-only">(current)</span></span>
            </li>
          </ul>
        </nav>
      </div>
        <?php
        }else if ($_SESSION["perfil"] == "cliente") {
        
        ?>
        <div class="box-header with-border">
          
          <button type="button" class="btn btn-warning cancelar pull-right"><i class="fa fa-times"></i> Cancelar</button>
          <button type="button" class="btn btn-default" id="daterange-btn">
          <span>
            <i class="fa fa-calendar"></i>Rango de fecha
          </span>
          <i class="fa fa-caret-down"></i>
          </button>
          <button type="button" class="btn btn-default" id="daterangeproximo-btn">
          <span>
            <i class="fa fa-calendar"></i> Fecha del proximo mantenimiento
          </span>
          <i class="fa fa-caret-down"></i>
          </button>
        </div>
        <div class="row" style="margin-top: 10px;">
          <div class="col-md-4">
        <h4>Número de filas</h4>
        <div class="form-group">
          <select class="form-control" name="state" id="maxRows">
             <option value="5000">Mostrar todos</option>
             <option value="5">5</option>
             <option value="10">10</option>
             <option value="15">15</option>
             <option value="20">20</option>
             <option value="50">50</option>
             <option value="70">70</option>
             <option value="100">100</option>
            </select>
          
          </div>
          </div>
         <div class="col-md-8"></div>
      </div>
        

       <table class="table table-bordered table-striped dt-responsive tablas" id="table-id">
          
          <thead>
            
            <tr>
        
              <!-- <th style="width:10px;">#</th> -->
              <th>No Reporte</th>
              <th>Clinica</th>
              <th>Sede</th>
              <th>Equipo</th>
              <th>Marca</th>
              <th>Modelo</th>
              <th>Serie</th>
              <th>Tipos de mantenimiento</th>
              <th>Preventivo con problema</th>
              <th>Reportado</th>
              <th>Cargo</th>
              <th>Solicitud de servicio</th>
              <th>Diagnostico</th>
              <th>Trabajo Realizado</th> 
              <th>Instrumentos Utilizados</th>
              <th>Recomendaciones</th>
              <th>Accesorios</th>
              <th>Equipo fuera de servicio</th>
              <th>Equipo retirado</th>
              <th>Fecha de servicio</th>
              <th>Fecha de próximo mantenimiento</th>
            </tr>
          </thead>
          <tbody>
            
            <?php
            //esto quiere decir que si trae fechas del archivo js por get realice la consulta, si no que me muestre toddos los resultados
            if (isset($_GET["fechaInicial"]))
            {
            $fechaInicial = $_GET["fechaInicial"];
            $fechaFinal = $_GET["fechaFinal"];
            $perfil = "id_clinica";
            $valor = $_SESSION["id"];
            $reportes = ControladorMantenimiento::ctrRangoFechasMantenimientonopreventivo($fechaInicial, $fechaFinal,$perfil,$valor);
            }
            else if (isset($_GET["fechaInicialp"]))
            {
            $fechaInicial = $_GET["fechaInicialp"];
            $fechaFinal = $_GET["fechaFinalp"];
            $perfil = "id_clinica";
            $valor = $_SESSION["id"];
            $reportes = ControladorMantenimiento::ctrRangoFechasMantenimientoProximonopreventivo($fechaInicial, $fechaFinal,$perfil,$valor);
            }
            else
            {
            $fechaInicial = null;
            $fechaFinal = null;
            $perfil = "id_clinica";
            $valor = $_SESSION["id"];
            $reportes = ControladorMantenimiento::ctrRangoFechasMantenimientonopreventivo($fechaInicial, $fechaFinal,$perfil,$valor);
            }
            // $reportes = ControladorMantenimiento::ctrRangoFechasMantenimiento($fechaInicial, $fechaFinal,$perfil,$valor);
            //var_dump($reportes);
            foreach ($reportes as $key => $value)
            {
            echo '<tr>
                <td>'.$value["num_reporte"].'</td>';
              $item = "id";
              $valor = $value["id_clinica"];
              $perfil = null;
              $usuarios = ControladorUsuarios::ctrMostrarUsuarios($item, $valor, $perfil);
              echo '
                 <td>'.$usuarios["nombre"].'</td>
                 <td>'.$value["sede"].'</td>
                 <td>'.$value["equipo_re"].'</td>
                 <td>'.$value["marca_re"].'</td>
                 <td>'.$value["modelo_re"].'</td>';
              if ($value["serieNueva"] != null) 
              {
                echo '<td>'.$value["serieNueva"].'</td>';
              }
              else if ($value["serieNueva"] != null && $value["serie"] != null) {
                echo '<td>'.$value["serieNueva"].' - '.$value["serie"].'</td>';
              }
              else
              {
                echo '<td>'.$value["serie"].'</td>';
              }

              if ($value["tipo_manteniemiento"] == "Evaluacion") {
                echo'
                <td><span class="label label-success">'.$value["tipo_manteniemiento"].'</span></td>';
              }else if ($value["tipo_manteniemiento"] == "Instalacion") {
                echo'
                <td><span class="label label-info">'.$value["tipo_manteniemiento"].'</span></td>';
                }else if ($value["tipo_manteniemiento"] == "Correctivo") {
                echo'
                <td><span class="label label-danger">'.$value["tipo_manteniemiento"].'</span></td>';
                }else if($value["tipo_manteniemiento"] == "Preventivo"){
                  echo'
                <td><span class="label label-warning">'.$value["tipo_manteniemiento"].'</span>'. ' - ' .$value["preventivo"].'</td>';
                }
              echo '    
                  <td>'.$value["preventivo_problema"].'</td>
                  <td>'.$value["reportado"].'</td>
                  <td>'.$value["cargo"].'</td>
                  <td>'.$value["solicitud"].'</td>
                  <td>'.$value["diagnostico"].'</td>';
           
                echo'
                 <td>'.$value["trabajo"].'</td> 
                 <td>'.$value["instrumentos"].'</td> 
                 <td>'.$value["recomendaciones"].'</td>
                 <td>'.$value["accesorios"].'</td>';

                if ($value["equipo_servicio"] == "Si")
                  {
                    echo '<td>'.$value["equipo_servicio"].' - '.$value["servicio_motivo"].'</td>';
                  }
                  else
                  {
                    echo '<td>'.$value["equipo_servicio"].'</td>';
                  }

                 echo'
                 <td>'.$value["equipo_evaluado"].'</td>
                 <td>'.$value["fecha_inicio"].'</td>
                 <td>'.$value["fecha_proximo"].'</td>
                 </tr>';
            }
            ?>
            
          </tbody>
        </table>

        <!--    Start Pagination -->
      <div class='pagination-container' >
        <nav>
          <ul class="pagination">
            
            <li data-page="prev" >
              <span> < <span class="sr-only">(current)</span></span>
            </li>
            <!-- Here the JS Function Will Add the Rows -->
            <li data-page="next" id="prev">
              <span> > <span class="sr-only">(current)</span></span>
            </li>
          </ul>
        </nav>
      </div>
        <?php
        }
        ?>
      </div>
    </div>
    <?php
    $eliminarMantenimientono = new ControladorMantenimiento();
    $eliminarMantenimientono -> ctrEliminarMantenimientono();
    ?>
  </section>
</div>