<div class="content-wrapper">
  <section class="content-header"> 
    
    <h1>
     
    Administrar manteniemientos 
       
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
        <a href="crear-mantenimiento"><button class="btn btn-primary botones">
          Agregar mantenimiento
        </button></a>
        <a href="vistas/modulos/descargar-reporte.php?reporte=reporte"><button class="btn btn-success botones">Descargar reporte en Excel</button></a>

        
        
        
      </div>
      <?php
      }
      ?>
      
      <div class="box-body">
        <?php
        if ($_SESSION["perfil"] =="Administrador" || $_SESSION["perfil"] =="Ingeniero") {
        ?>

         <div class="row" style="margin-top: 10px;">
        <!--   <div class="col-md-4">
        
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
          </div> -->
         <div class="col-md-10">
           <button type="button" class="btn btn-default botones" id="daterange-btn">
        <span>
          <i class="fa fa-calendar"></i>Rango de fecha 
        </span>
        <i class="fa fa-caret-down"></i>
        </button>
        <button type="button" class="btn btn-default botones" id="daterangeproximo-btn">
        <span>
          <i class="fa fa-calendar"></i> Fecha del proximo mantenimiento
        </span>
        <i class="fa fa-caret-down"></i>
        </button>
         </div>
         <div class="col-md-2">
              <button type="button" class="btn btn-warning cancelar botones"><i class="fa fa-times"></i> Cancelar</button>
         </div>
      

      </div>

      <br>
        
        <table class="table table-bordered table-striped dt-responsive tablas">
          
          <thead>
            
            <tr>
        
              <th style="width:10px;">#</th>
              <th>No Reporte</th>
              <th>Clinica</th>
              <th>Sede</th>
              <th>Equipo</th>
              <th>Marca</th>
              <th>Modelo</th>
              <th>Serie</th>
              <th>Codigo</th>
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
            $reportes = ControladorMantenimiento::ctrRangoFechasMantenimiento($fechaInicial, $fechaFinal,$perfil,$valor);
            }
            else if (isset($_GET["fechaInicialp"]))
            {
            $fechaInicial = $_GET["fechaInicialp"];
            $fechaFinal = $_GET["fechaFinalp"];
            $perfil = null;
            $valor = null;
            $reportes = ControladorMantenimiento::ctrRangoFechasMantenimientoProximo($fechaInicial, $fechaFinal,$perfil,$valor);
            }
            else
            {
            $fechaInicial = null;
            $fechaFinal = null;
            $perfil = null; 
            $valor = null;
            $reportes = ControladorMantenimiento::ctrRangoFechasMantenimiento($fechaInicial, $fechaFinal,$perfil,$valor);
            }

            
            // $reportes = ControladorMantenimiento::ctrRangoFechasMantenimiento($fechaInicial, $fechaFinal,$perfil,$valor);
            //var_dump($reportes);
            foreach ($reportes as $key => $value)
            {
            echo '<tr>
                <td>'.($key+1).'</td>
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
              
              echo '<td>'.$value["codigo"].'</td>';

              if ($value["tipo_manteniemiento"] == "Evaluacion") {
                echo'
                <td><span class="label label-primary">'.$value["tipo_manteniemiento"].'</span></td>';
              }else if ($value["tipo_manteniemiento"] == "Instalacion") {
                echo'
                <td><span class="label label-warning">'.$value["tipo_manteniemiento"].'</span></td>';
                }else if ($value["tipo_manteniemiento"] == "Correctivo") {
                echo'
                <td><span class="label label-danger">'.$value["tipo_manteniemiento"].'</span></td>';
                }else if($value["tipo_manteniemiento"] == "Preventivo"){
                  echo'
                <td><span class="label label-success">'.$value["preventivo"].'</span></td>';
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
                 <td>'.$value["fecha_proximo"].'</td>';
              if($_SESSION["perfil"] == "Administrador")
              {
              echo '<td>
                <div class="btn-group">
                  
                  <button class="btn btn-warning btnEditarMantenimiento" idMantenimiento="'.$value["id_reporte"].'"><i class="fa fa-pencil"></i></button>
                  <button class="btn btn-danger btnEliminarMantenimiento" idMantenimiento="'.$value["id_reporte"].'" fotoFirma="'.$value["firma"].'" fotoFirmaRecibido="'.$value["firmarealizaMan"].'" numeroReporte="'.$value["num_reporte"].'" idUsuariosEli="'.$value["id_clinica"].'"><i class="fa fa-times"></i></button>
                  <button data-toggle="modal" data-target="#FirmaIngeniero" class="btn btn-info btnFirmaMant" idMantenimientoFirma="'.$value["id_reporte"].'"><i class="fa fa-external-link"></i></button>
                  <button class="btn btn-success btnMostrarReporteCronograma" idReporte="'.$value["num_reporte"].'">Ver Detalles</button>
                </div>
              </td>';
              }
              else if ($_SESSION["perfil"] == "Ingeniero")
              {
              echo
              '<td><div class="btn-group">
              <button data-toggle="modal" data-target="#FirmaIngeniero" class="btn btn-info btnFirmaMant" idMantenimientoFirma="'.$value["id_reporte"].'"><i class="fa fa-external-link"></i></button>
              <button class="btn btn-success btnMostrarReporteCronograma" idReporte="'.$value["num_reporte"].'">Ver Detalles</button>
              </div>
              </td>';
              }
              echo '
            </tr>';
            }
            ?>
            
          </tbody>
        </table>
        <!--    Start Pagination -->
    <!--   <div class='pagination-container' >
        <nav>
          <ul class="pagination">
            
            <li data-page="prev" >
              <span> < <span class="sr-only">(current)</span></span>
            </li>
            <li data-page="next" id="prev">
              <span> > <span class="sr-only">(current)</span></span>
            </li>
          </ul>
        </nav>
      </div> -->

        <?php
        }else if ($_SESSION["perfil"] == "cliente") {
        
        ?>
        <div class="box-header with-border">
          <!--<a href="crear-mantenimiento"><button class="btn btn-primary">
            Agregar mantenimiento
          </button></a>-->
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
        <!-- <div class="form-group">
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
          
          </div> -->
          </div>
         <div class="col-md-8"></div>
      </div>
        <table class="table table-bordered table-striped dt-responsive tablas">
          
          <thead>
            
            <tr>
              
              <th style="width:10px;">#</th>
              <th>No Reporte</th>
              <th>Clinica</th>
              <th>Sede</th>
              <th>Equipo</th>
              <th>Marca</th>
              <th>Modelo</th>
              <th>Serie</th>
              <th>Codigo</th>
              <th>Tipo de mantenimiento</th>
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
              <th>Fecha de proximo mantenimiento</th>

            </tr>
          </thead>
          <tbody>
            
            <?php
            //aca en esta seccion solo traemos el id del cliente y mostrar solo su informacion correspondiente
            if (isset($_GET["fechaInicial"]))
            {
            $fechaInicial = $_GET["fechaInicial"];
            $fechaFinal = $_GET["fechaFinal"];
            $perfil = "id_clinica";
            $valor = $_SESSION["id"];
            $reportes1 = ControladorMantenimiento::ctrRangoFechasMantenimiento($fechaInicial, $fechaFinal,$perfil,$valor);
            }
            else if(isset($_GET["fechaInicialp"]))
            {
            $fechaInicial = $_GET["fechaInicialp"];
            $fechaFinal = $_GET["fechaFinalp"];
            $perfil = "id_clinica";
            $valor = $_SESSION["id"];
            $reportes1 = ControladorMantenimiento::ctrRangoFechasMantenimientoProximo($fechaInicial, $fechaFinal,$perfil,$valor);
            }
            else
            {
            $fechaInicial = null;
            $fechaFinal = null;
            $perfil = "id_clinica";
            $valor = $_SESSION["id"];
            $reportes1 = ControladorMantenimiento::ctrRangoFechasMantenimiento($fechaInicial, $fechaFinal,$perfil,$valor);
            }
            
            
            foreach ($reportes1 as $key => $value)
            {
          
              echo '<tr>
              <td>'.($key+1).'</td>
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
              
              echo '<td>'.$value["codigo2"].'</td>';

              if ($value["tipo_manteniemiento"] == "Evaluacion") {
                echo'
                <td><span class="label label-primary">'.$value["tipo_manteniemiento"].'</span></td>';
              }else if ($value["tipo_manteniemiento"] == "Instalacion") {
                echo'
                <td><span class="label label-warning">'.$value["tipo_manteniemiento"].'</span></td>';
                }else if ($value["tipo_manteniemiento"] == "Correctivo") {
                echo'
                <td><span class="label label-danger">'.$value["tipo_manteniemiento"].'</span></td>';
                }else if($value["tipo_manteniemiento"] == "Preventivo"){
                  echo'
                <td><span class="label label-success">'.$value["tipo_manteniemiento"].'</span>'. ' - ' .$value["preventivo"].'</td>';
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
     <!--  <div class='pagination-container' >
        <nav>
          <ul class="pagination">
            
            <li data-page="prev" >
              <span> < <span class="sr-only">(current)</span></span>
            </li>
            <li data-page="next" id="prev">
              <span> > <span class="sr-only">(current)</span></span>
            </li>
          </ul>
        </nav>
      </div> -->
        <?php
        }
        ?>
      </div>
    </div>
    <?php
    $eliminarMantenimiento = new ControladorMantenimiento();
    $eliminarMantenimiento -> ctrEliminarMantenimiento();
    ?>
  </section>
</div>


<div id="FirmaIngeniero" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="post" class="sigPad" enctype="multipart/form-data">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#3c8dbc; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Escribir Firma</h4>

        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">

          <div class="box-body">

            <!-- ENTRADA PARA EL EQUIPO -->

            <!-- ENTRADA PARA SUBIR FIRMA Y NO LO GUARDE O PUEDA DESCARGAR -->
            <div class="form-group">

            <div class="panel"><label>Firma de quien recibe el mantenimiento</label></div>

                <p class="drawItDesc">Escribe tu firma</p>

                <ul class="sigNav">

                  <li class="drawIt"><a href="#draw-it">Activar Firma</a></li>

                </ul>
                <div class="sig sigWrapper">

              <div class="typed"></div>

                <canvas class="pad" width="350" height="90"></canvas>

               

              <input type="hidden" name="output" class="output">

            </div>
                <br>
            <button id="save-png" type="button" class="btn btn-primary">Guardar</button>
            <button id="clear" type="button" class="btn btn-secondary">Borrar</button>
              
          </div>

            <div class="form-group">
              
              <div class="input-group">
              

                <input type="hidden" class="form-control input-lg" id="firmaactual" name="nuevoObservacionReporte" placeholder="Escriba la observación del reporte" required>

                <input type="hidden" id="idreporte" name="idreporte">

                <input type="hidden" id="reportetraer" name="reportetraer">
              </div>

            </div>
   

          </div>

        </div>

        <!--=====================================
        PIE DEL MODAL
        ======================================-->

        <div class="modal-footer">

          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

          <button type="submit" class="btn btn-primary">Guardar Firma</button>

        </div>

         <?php
          $crearFirma = new ControladorMantenimiento();
          $crearFirma -> ctrCrearFirmaMantenimiento();

          ?>

      </form>

    </div>



  </div>
</div>

<script type="text/javascript">
  $(document).ready(function () {
  $('.sigPad').signaturePad();
});
</script>