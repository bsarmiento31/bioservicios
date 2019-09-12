<div class="content-wrapper">
  <section class="content-header">
     
    <h1>
     
    Cronogramas 2019
      
    </h1>  
    <ol class="breadcrumb">  
      
      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li> 
      
      <li class="active">Cronogramas 2019</li> 
      
    </ol>
  </section>
  <section class="content">
    <div class="box">
      <div class="box-body">
        <?php
        if ($_SESSION["perfil"] == "Administrador" || $_SESSION["perfil"] == "Ingeniero") {
        ?>
             <div class="box-header with-border">
        
       <!--  <a href="vistas/modulos/descargar-reporte.php?reporte=reporte"><button class="btn btn-success"> Descargar reporte en Excel</button></a> -->
       <?php

            $session = null;
            echo '<div class="col-md-5">
              <a href="vistas/modulos/descargar-reporte.php?reporte12=reporte12&session='.$session.'"><button class="btn btn-success botones">Descargar reporte en Excel</button></a>
            </div>';
            ?>
        
        
        <button type="button" class="btn btn-default" id="daterange-btncronograma">
        <span>
          <i class="fa fa-calendar"></i>Rango de fecha
        </span>
        <i class="fa fa-caret-down"></i>
        </button> 
        
        <button type="button" class="btn btn-warning cancelarCronograma"><i class="fa fa-times"></i>  Cancelar</button>
        <div class="pull-right">
          <span class="badge bg-red">Correctivo</span>
          <span class="badge bg-yellow">Instalación</span>
          <span class="badge bg-light-blue">Evaluación</span>
          <span class="badge bg-green">Preventivo</span>
        </div>
      </div>

       <style type="text/css">
             th:first-child, td:first-child
                {
                position:sticky;
                left:0px;
                z-index: 99;
 
            }

             td:first-child
 {
  background-color:#3c8dbc;
  color: white;
 }
           </style>
        
  <!--   <h4>Número de filas</h4>
        <div class="row" style="margin-top: 10px;">
          <div class="col-md-4">
        
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
          <div class="col-md-8">
            <button type="button" class="btn btn-default botones" id="daterange-btncronograma">
          <span>
            <i class="fa fa-calendar"></i>Rango de fecha
          </span>
          <i class="fa fa-caret-down"></i>
          </button>
          <button type="button" class="btn btn-warning cancelarCronograma botones"><i class="fa fa-times"></i> Cancelar</button>
          </div>
        </div> -->
        <div class="table-responsive" style="margin-top: 10px;">
        <table class="table table-bordered table-striped tablasCronograma" style="width: 100%;" id="table-id">
          
          <thead>
            
            <tr>
              
              <!-- <th style="width:10px">#</th> -->
              <th>Cliente</th>
              <th>Equipo</th>
              <th>Marca</th>
              <th>Modelo</th>
              <th>Serie</th>
              <th>Codigo</th>
              <th>Enero</th>
              <th>Febrero</th>
              <th>Marzo</th>
              <th>Abril</th>
              <th>Mayo</th>
              <th>Junio</th>
              <th>Julio</th>
              <th>Agosto</th>
              <th>Septiembre</th>
              <th>Octubre</th>
              <th>Noviembre</th>
              <th>Diciembre</th>
              <th>Configuraciones</th>
            </tr>
          </thead>
          <tbody>
            <?php
            if (isset($_GET["fechaInicial"]))
            {
            $fechaInicial = $_GET["fechaInicial"];
            $fechaFinal = $_GET["fechaFinal"];
            $perfil = null;
            $valor = null;
            $tiempo = "tiempo";
            $periodo = "2019";
            $mantenimiento = ControladorCronograma::ctrRangoFechasCronograma($fechaInicial, $fechaFinal,$perfil,$valor,$tiempo,$periodo);
            }
            else
            {
            $fechaInicial = null;
            $fechaFinal = null;
            $perfil = null;
            $valor = null;
            $tiempo = "tiempo";
            $periodo = "2019";
            $mantenimiento = ControladorCronograma::ctrRangoFechasCronograma($fechaInicial, $fechaFinal,$perfil,$valor,$tiempo,$periodo);
            }
            foreach ($mantenimiento as $key => $value)
            {
            echo '<tr>';
              
              $item = "id";
              $valor = $value["cliente"];
              $perfil = null;
              $usuarios = ControladorUsuarios::ctrMostrarUsuarios($item, $valor, $perfil);
              echo '
              <td>'.$usuarios["nombre"].'</td>
              <td>'.$value["equipo"].'</td>
              <td>'.$value["marca"].'</td>
              <td>'.$value["modelo"].'</td>
              <td>'.$value["serie1"].'</td>
              <td>'.$value["codigo2"].'</td>
              <td>
              <div class="popover_parent">';
                $item = null;
                $valor = $value["codigo2"];
                $orden = null;
                $perfil = "codigo";
                $tiempo = "tiempo";
                $valortiempo = "2019";
                $reportessi = ControladorMantenimiento::ctrMostrarModelos2019($item, $valor,$orden,$perfil,$tiempo,$valortiempo);

                $item = null;
                $valor = $value["abril"];
                $orden = null;
                $perfil = "mes";
                $reportesenero = ControladorMantenimiento::ctrMostrarModelos($item, $valor,$orden,$perfil);

                // var_dump($reportesenero);

                

              if ($value["enero"] == "enerocr") {
       
                  echo 
                  '
                    <a href="javascript:void(0);" class="btn"><button type="button" class="btn bg-navy">Ver Reportes</button></a>
                       <div class="popover">
                       <button class="iconosnew btnObservacionReporte" data-toggle="modal" data-target="#modalAgregarCronograma" idReporteObservacion="'.$value["id"].'"><i class="fa fa-fw fa-info-circle"></i></button>
                            <h4>Reportes</h4>
                         <hr>';
                
        
     
                }else if ($value["enero"] == "enero") {
                  echo
                       '<button type="button" class="btn bg-purple btnnuevo">Programado</button>';

                }else {
                  echo '<button type="button" class="btn btn-block btn-default disabled">No hay reportes</button>';
                }

                  foreach($reportessi as $key => $item2){


                    if ($item2["tipo_manteniemiento"] == "Preventivo"  && $item2["mes"] == "enerocr") {
                      echo
                        '<button type="button" class="btn btn-block btn-success btnMostrarReporte" idReporte="'.$item2["num_reporte"].'">'.$item2["num_reporte"].'</button>';
                    }

                    if ($item2["tipo_manteniemiento"] == "Correctivo" && $item2["mes"] == "enerocr" ) {
                      echo
                        '<button type="button" class="btn btn-block btn-danger btnMostrarReporte" idReporte="'.$item2["num_reporte"].'">'.$item2["num_reporte"].'</button>';
                    }

                     if ($item2["tipo_manteniemiento"] == "Instalacion"  && $item2["mes"] == "enerocr") {
                      echo
                        '<button type="button" class="btn btn-block btn-warning btnMostrarReporte" idReporte="'.$item2["num_reporte"].'">'.$item2["num_reporte"].'</button>';
                    }

                    if ($item2["tipo_manteniemiento"] == "Evaluacion"  && $item2["mes"] == "enerocr") {
                      echo
                        '<button type="button" class="btn btn-block btn-primary btnMostrarReporte" idReporte="'.$item2["num_reporte"].'">'.$item2["num_reporte"].'</button>';
                    }


                  }

                
                  echo'
                </div>
              </div>
            </td>';
     
            echo'
            <td>
              <div class="popover_parent">';
              if ($value["febrero"] == "febrerocr") {
       
                  echo 
                  '
                    <a href="javascript:void(0);" class="btn"><button type="button" class="btn bg-navy">Ver Reportes</button></a>
                       <div class="popover">
                       <button class="iconosnew btnObservacionReporte" data-toggle="modal" data-target="#Observacionesreportes" idReporteObservacion="'.$value["id"].'"><i class="fa fa-fw fa-info-circle"></i></button>
                            <h4>Reportes</h4>
                         <hr>';
                
        
    
                }else if ($value["febrero"] == "febrero") {
                  echo
                       '<button type="button" class="btn bg-purple btnnuevo">Programado</button>';

                }else {
                  echo '<button type="button" class="btn btn-block btn-default disabled">No hay reportes</button>';
                }
            
                  
                  foreach($reportessi as $key => $item2) {

                    if ($item2["tipo_manteniemiento"] == "Preventivo"  && $item2["mes"] == "febrerocr") {
                      echo
                        '<button type="button" class="btn btn-block btn-success btnMostrarReporte" idReporte="'.$item2["num_reporte"].'">'.$item2["num_reporte"].'</button>';
                    }

                    if ($item2["tipo_manteniemiento"] == "Correctivo" && $item2["mes"] == "febrerocr" ) {
                      echo
                        '<button type="button" class="btn btn-block btn-danger btnMostrarReporte" idReporte="'.$item2["num_reporte"].'">'.$item2["num_reporte"].'</button>';
                    }

                     if ($item2["tipo_manteniemiento"] == "Instalacion"  && $item2["mes"] == "febrerocr") {
                      echo
                        '<button type="button" class="btn btn-block btn-warning btnMostrarReporte" idReporte="'.$item2["num_reporte"].'">'.$item2["num_reporte"].'</button>';
                    }

                    if ($item2["tipo_manteniemiento"] == "Evaluacion"  && $item2["mes"] == "febrerocr") {
                      echo
                        '<button type="button" class="btn btn-block btn-primary btnMostrarReporte" idReporte="'.$item2["num_reporte"].'">'.$item2["num_reporte"].'</button>';
                    }


                  }

                  echo'
                </div>
              </div>
            </td>';


          echo'
            <td>
              <div class="popover_parent">';
              if ($value["marzo"] == "marzocr") {
       
                  echo 
                  '
                    <a href="javascript:void(0);" class="btn"><button type="button" class="btn bg-navy">Ver Reportes</button></a>
                       <div class="popover">
                       <button class="iconosnew btnObservacionReporte" data-toggle="modal" data-target="#Observacionesreportes" idReporteObservacion="'.$value["id"].'"><i class="fa fa-fw fa-info-circle"></i></button>
                            <h4>Reportes</h4>
                         <hr>';
                
        
    
                }else if ($value["marzo"] == "marzo") {
                  echo
                       '<button type="button" class="btn bg-purple btnnuevo">Programado</button>';

                }else {
                  echo '<button type="button" class="btn btn-block btn-default disabled">No hay reportes</button>';
                }


                foreach($reportessi as $key => $item2) {

                    if ($item2["tipo_manteniemiento"] == "Preventivo"  && $item2["mes"] == "marzocr") {
                      echo
                        '<button type="button" class="btn btn-block btn-success btnMostrarReporte" idReporte="'.$item2["num_reporte"].'">'.$item2["num_reporte"].'</button>';
                    }

                     if ($item2["tipo_manteniemiento"] == "Correctivo" && $item2["mes"] == "marzocr" ) {
                      echo
                        '<button type="button" class="btn btn-block btn-danger btnMostrarReporte" idReporte="'.$item2["num_reporte"].'">'.$item2["num_reporte"].'</button>';
                    }

                     if ($item2["tipo_manteniemiento"] == "Instalacion"  && $item2["mes"] == "marzocr") {
                      echo
                        '<button type="button" class="btn btn-block btn-warning btnMostrarReporte" idReporte="'.$item2["num_reporte"].'">'.$item2["num_reporte"].'</button>';
                    }

                    if ($item2["tipo_manteniemiento"] == "Evaluacion"  && $item2["mes"] == "marzocr") {
                      echo
                        '<button type="button" class="btn btn-block btn-primary btnMostrarReporte" idReporte="'.$item2["num_reporte"].'">'.$item2["num_reporte"].'</button>';
                    }


                  }

                
                  echo'
                </div>
              </div>
            </td>';

            echo'
            <td>
              <div class="popover_parent">';
              if ($value["abril"] == "abrilcr") {
       
                  echo 
                  '
                    <a href="javascript:void(0);" class="btn"><button type="button" class="btn bg-navy">Ver Reportes</button></a>
                       <div class="popover">
                       <button class="iconosnew btnObservacionReporte" data-toggle="modal" data-target="#Observacionesreportes" idReporteObservacion="'.$value["id"].'"><i class="fa fa-fw fa-info-circle"></i></button>
                            <h4>Reportes</h4>
                         <hr>';
                
        
    
                }else if ($value["abril"] == "abril") {
                  echo
                       '<button type="button" class="btn bg-purple btnnuevo">Programado</button>';

                }else {
                  echo '<button type="button" class="btn btn-block btn-default disabled">No hay reportes</button>';
                }
            
                  
                  foreach($reportessi as $key => $item2) {

                    if ($item2["tipo_manteniemiento"] == "Preventivo"  && $item2["mes"] == "abrilcr") {
                      echo
                        '<button type="button" class="btn btn-block btn-success verde btnMostrarReporte" idReporte="'.$item2["num_reporte"].'">'.$item2["num_reporte"].'</button>';
                    }

                     if ($item2["tipo_manteniemiento"] == "Correctivo" && $item2["mes"] == "abrilcr" ) {
                      echo
                        '<button type="button" class="btn btn-block btn-danger btnMostrarReporte" idReporte="'.$item2["num_reporte"].'">'.$item2["num_reporte"].'</button>';
                    }

                     if ($item2["tipo_manteniemiento"] == "Instalacion"  && $item2["mes"] == "abrilcr") {
                      echo
                        '<button type="button" class="btn btn-block btn-warning btnMostrarReporte" idReporte="'.$item2["num_reporte"].'">'.$item2["num_reporte"].'</button>';
                    }

                    if ($item2["tipo_manteniemiento"] == "Evaluacion"  && $item2["mes"] == "abrilcr") {
                      echo
                        '<button type="button" class="btn btn-block btn-primary btnMostrarReporte" idReporte="'.$item2["num_reporte"].'">'.$item2["num_reporte"].'</button>';
                    }


                  }

                
                  echo'
                </div>
              </div>
            </td>';

            echo'
            <td>
              <div class="popover_parent">';
              if ($value["mayo"] == "mayocr") {
       
                  echo 
                  '
                    <a href="javascript:void(0);" class="btn"><button type="button" class="btn bg-navy">Ver Reportes</button></a>
                       <div class="popover">
                       <button class="iconosnew btnObservacionReporte" data-toggle="modal" data-target="#Observacionesreportes" idReporteObservacion="'.$value["id"].'"><i class="fa fa-fw fa-info-circle"></i></button>
                            <h4>Reportes</h4>
                         <hr>';
                
        
    
                }else if ($value["mayo"] == "mayo") {
                  echo
                       '<button type="button" class="btn bg-purple btnnuevo">Programado</button>';

                }else {
                  echo '<button type="button" class="btn btn-block btn-default disabled">No hay reportes</button>';
                }
            
                  
                  foreach($reportessi as $key => $item2) {

                    if ($item2["tipo_manteniemiento"] == "Preventivo"  && $item2["mes"] == "mayocr") {
                      echo
                        '<button type="button" class="btn btn-block btn-success btnMostrarReporte" idReporte="'.$item2["num_reporte"].'">'.$item2["num_reporte"].'</button>';
                    }

                    if ($item2["tipo_manteniemiento"] == "Correctivo" && $item2["mes"] == "mayocr" ) {
                      echo
                        '<button type="button" class="btn btn-block btn-danger btnMostrarReporte" idReporte="'.$item2["num_reporte"].'">'.$item2["num_reporte"].'</button>';
                    }

                     if ($item2["tipo_manteniemiento"] == "Instalacion"  && $item2["mes"] == "mayocr") {
                      echo
                        '<button type="button" class="btn btn-block btn-warning btnMostrarReporte" idReporte="'.$item2["num_reporte"].'">'.$item2["num_reporte"].'</button>';
                    }

                    if ($item2["tipo_manteniemiento"] == "Evaluacion"  && $item2["mes"] == "mayocr") {
                      echo
                        '<button type="button" class="btn btn-block btn-primary btnMostrarReporte" idReporte="'.$item2["num_reporte"].'">'.$item2["num_reporte"].'</button>';
                    }


                  }
                
                  echo'
                </div>
              </div>
            </td>';


            echo'
            <td>
              <div class="popover_parent">';
              if ($value["junio"] == "juniocr") {
       
                  echo 
                  '
                    <a href="javascript:void(0);" class="btn"><button type="button" class="btn bg-navy">Ver Reportes</button></a>
                       <div class="popover">
                       <button class="iconosnew btnObservacionReporte" data-toggle="modal" data-target="#Observacionesreportes" idReporteObservacion="'.$value["id"].'"><i class="fa fa-fw fa-info-circle"></i></button>
                            <h4>Reportes</h4>
                         <hr>';
                
        
    
                }else if ($value["junio"] == "junio") {
                  echo
                       '<button type="button" class="btn bg-purple btnnuevo">Programado</button>';

                }else {
                  echo '<button type="button" class="btn btn-block btn-default disabled">No hay reportes</button>';
                }            
                  
                  foreach($reportessi as $key => $item2) {

                    if ($item2["tipo_manteniemiento"] == "Preventivo"  && $item2["mes"] == "juniocr") {
                      echo
                        '<button type="button" class="btn btn-block btn-success btnMostrarReporte" idReporte="'.$item2["num_reporte"].'">'.$item2["num_reporte"].'</button>';
                    }

                     if ($item2["tipo_manteniemiento"] == "Correctivo" && $item2["mes"] == "juniocr" ) {
                      echo
                        '<button type="button" class="btn btn-block btn-danger btnMostrarReporte" idReporte="'.$item2["num_reporte"].'">'.$item2["num_reporte"].'</button>';
                    }

                     if ($item2["tipo_manteniemiento"] == "Instalacion"  && $item2["mes"] == "juniocr") {
                      echo
                        '<button type="button" class="btn btn-block btn-warning btnMostrarReporte" idReporte="'.$item2["num_reporte"].'">'.$item2["num_reporte"].'</button>';
                    }

                    if ($item2["tipo_manteniemiento"] == "Evaluacion"  && $item2["mes"] == "juniocr") {
                      echo
                        '<button type="button" class="btn btn-block btn-primary btnMostrarReporte" idReporte="'.$item2["num_reporte"].'">'.$item2["num_reporte"].'</button>';
                    }


                  }

                  echo'
                </div>
              </div>
            </td>';

            echo'
            <td>
              <div class="popover_parent">';
              if ($value["julio"] == "juliocr") {
       
                  echo 
                  '
                    <a href="javascript:void(0);" class="btn"><button type="button" class="btn bg-navy">Ver Reportes</button></a>
                       <div class="popover">
                       <button class="iconosnew btnObservacionReporte" data-toggle="modal" data-target="#Observacionesreportes" idReporteObservacion="'.$value["id"].'"><i class="fa fa-fw fa-info-circle"></i></button>
                            <h4>Reportes</h4>
                         <hr>';
                
        
    
                }else if ($value["julio"] == "julio") {
                  echo
                       '<button type="button" class="btn bg-purple btnnuevo">Programado</button>';

                }else {
                  echo '<button type="button" class="btn btn-block btn-default disabled">No hay reportes</button>';
                }
            
                  
                  foreach($reportessi as $key => $item2) {

                    if ($item2["tipo_manteniemiento"] == "Preventivo"  && $item2["mes"] == "juliocr") {
                      echo
                        '<button type="button" class="btn btn-block btn-success btnMostrarReporte" idReporte="'.$item2["num_reporte"].'">'.$item2["num_reporte"].'</button>';
                    }

                     if ($item2["tipo_manteniemiento"] == "Correctivo" && $item2["mes"] == "juliocr" ) {
                      echo
                        '<button type="button" class="btn btn-block btn-danger btnMostrarReporte" idReporte="'.$item2["num_reporte"].'">'.$item2["num_reporte"].'</button>';
                    }

                     if ($item2["tipo_manteniemiento"] == "Instalacion"  && $item2["mes"] == "juliocr") {
                      echo
                        '<button type="button" class="btn btn-block btn-warning btnMostrarReporte" idReporte="'.$item2["num_reporte"].'">'.$item2["num_reporte"].'</button>';
                    }

                    if ($item2["tipo_manteniemiento"] == "Evaluacion"  && $item2["mes"] == "juliocr") {
                      echo
                        '<button type="button" class="btn btn-block btn-primary btnMostrarReporte" idReporte="'.$item2["num_reporte"].'">'.$item2["num_reporte"].'</button>';
                    }


                  }

                
                  echo'
                </div>
              </div>
            </td>';

            echo'
            <td>
              <div class="popover_parent">';
              if ($value["agosto"] == "agostocr") {
       
                  echo 
                  '
                    <a href="javascript:void(0);" class="btn"><button type="button" class="btn bg-navy">Ver Reportes</button></a>
                       <div class="popover">
                       <button class="iconosnew btnObservacionReporte" data-toggle="modal" data-target="#Observacionesreportes" idReporteObservacion="'.$value["id"].'"><i class="fa fa-fw fa-info-circle"></i></button>
                            <h4>Reportes</h4>
                         <hr>';
                
        
    
                }else if ($value["agosto"] == "agosto") {
                  echo
                       '<button type="button" class="btn bg-purple btnnuevo">Programado</button>';

                }else {
                  echo '<button type="button" class="btn btn-block btn-default disabled">No hay reportes</button>';
                }
            
                  
                  foreach($reportessi as $key => $item2) {

                    if ($item2["tipo_manteniemiento"] == "Preventivo"  && $item2["mes"] == "agostocr") {
                      echo
                        '<button type="button" class="btn btn-block btn-success btnMostrarReporte" idReporte="'.$item2["num_reporte"].'">'.$item2["num_reporte"].'</button>';
                    }

                     if ($item2["tipo_manteniemiento"] == "Correctivo" && $item2["mes"] == "agostocr" ) {
                      echo
                        '<button type="button" class="btn btn-block btn-danger btnMostrarReporte" idReporte="'.$item2["num_reporte"].'">'.$item2["num_reporte"].'</button>';
                    }

                     if ($item2["tipo_manteniemiento"] == "Instalacion"  && $item2["mes"] == "agostocr") {
                      echo
                        '<button type="button" class="btn btn-block btn-warning btnMostrarReporte" idReporte="'.$item2["num_reporte"].'">'.$item2["num_reporte"].'</button>';
                    }

                    if ($item2["tipo_manteniemiento"] == "Evaluacion"  && $item2["mes"] == "agostocr") {
                      echo
                        '<button type="button" class="btn btn-block btn-primary btnMostrarReporte" idReporte="'.$item2["num_reporte"].'">'.$item2["num_reporte"].'</button>';
                    }


                  }
                
                  echo'
                </div>
              </div>
            </td>';


            echo'
            <td>
              <div class="popover_parent">';
              if ($value["septiembre"] == "septiembrecr") {
       
                  echo 
                  '
                    <a href="javascript:void(0);" class="btn"><button type="button" class="btn bg-navy">Ver Reportes</button></a>
                       <div class="popover">
                       <button class="iconosnew btnObservacionReporte" data-toggle="modal" data-target="#Observacionesreportes" idReporteObservacion="'.$value["id"].'"><i class="fa fa-fw fa-info-circle"></i></button>
                            <h4>Reportes</h4>
                         <hr>';
                
        
    
                }else if ($value["septiembre"] == "septiembre") {
                  echo
                       '<button type="button" class="btn bg-purple btnnuevo">Programado</button>';

                }else {
                  echo '<button type="button" class="btn btn-block btn-default disabled">No hay reportes</button>';
                }
            
                  
                  foreach($reportessi as $key => $item2) {

                    if ($item2["tipo_manteniemiento"] == "Preventivo"  && $item2["mes"] == "septiembrecr") {
                      echo
                        '<button type="button" class="btn btn-block btn-success btnMostrarReporte" idReporte="'.$item2["num_reporte"].'">'.$item2["num_reporte"].'</button>';
                    }

                     if ($item2["tipo_manteniemiento"] == "Correctivo" && $item2["mes"] == "septiembrecr" ) {
                      echo
                        '<button type="button" class="btn btn-block btn-danger btnMostrarReporte" idReporte="'.$item2["num_reporte"].'">'.$item2["num_reporte"].'</button>';
                    }

                     if ($item2["tipo_manteniemiento"] == "Instalacion"  && $item2["mes"] == "septiembrecr") {
                      echo
                        '<button type="button" class="btn btn-block btn-warning btnMostrarReporte" idReporte="'.$item2["num_reporte"].'">'.$item2["num_reporte"].'</button>';
                    }

                    if ($item2["tipo_manteniemiento"] == "Evaluacion"  && $item2["mes"] == "septiembrecr") {
                      echo
                        '<button type="button" class="btn btn-block btn-primary btnMostrarReporte" idReporte="'.$item2["num_reporte"].'">'.$item2["num_reporte"].'</button>';
                    }


                  }


                
                  echo'
                </div>
              </div>
            </td>';

            echo'
            <td>
              <div class="popover_parent">';
              if ($value["octubre"] == "octubrecr") {
       
                  echo 
                  '
                    <a href="javascript:void(0);" class="btn"><button type="button" class="btn bg-navy">Ver Reportes</button></a>
                       <div class="popover">
                       <button class="iconosnew btnObservacionReporte" data-toggle="modal" data-target="#Observacionesreportes" idReporteObservacion="'.$value["id"].'"><i class="fa fa-fw fa-info-circle"></i></button>
                            <h4>Reportes</h4>
                         <hr>';
                
        
    
                }else if ($value["octubre"] == "octubre") {
                  echo
                       '<button type="button" class="btn bg-purple btnnuevo">Programado</button>';

                }else {
                  echo '<button type="button" class="btn btn-block btn-default disabled">No hay reportes</button>';
                }
            
                  
                  foreach($reportessi as $key => $item2) {

                    if ($item2["tipo_manteniemiento"] == "Preventivo"  && $item2["mes"] == "octubrecr") {
                      echo
                        '<button type="button" class="btn btn-block btn-success btnMostrarReporte" idReporte="'.$item2["num_reporte"].'">'.$item2["num_reporte"].'</button>';
                    }

                     if ($item2["tipo_manteniemiento"] == "Correctivo" && $item2["mes"] == "octubrecr" ) {
                      echo
                        '<button type="button" class="btn btn-block btn-danger btnMostrarReporte" idReporte="'.$item2["num_reporte"].'">'.$item2["num_reporte"].'</button>';
                    }

                     if ($item2["tipo_manteniemiento"] == "Instalacion"  && $item2["mes"] == "octubrecr") {
                      echo
                        '<button type="button" class="btn btn-block btn-warning btnMostrarReporte" idReporte="'.$item2["num_reporte"].'">'.$item2["num_reporte"].'</button>';
                    }

                    if ($item2["tipo_manteniemiento"] == "Evaluacion"  && $item2["mes"] == "octubrecr") {
                      echo
                        '<button type="button" class="btn btn-block btn-primary btnMostrarReporte" idReporte="'.$item2["num_reporte"].'">'.$item2["num_reporte"].'</button>';
                    }


                  }

                
                  echo'
                </div>
              </div>
            </td>';

            echo'
            <td>
              <div class="popover_parent">';
              if ($value["noviembre"] == "noviembrecr") {
       
                  echo 
                  '
                    <a href="javascript:void(0);" class="btn"><button type="button" class="btn bg-navy">Ver Reportes</button></a>
                       <div class="popover">
                       <button class="iconosnew btnObservacionReporte" data-toggle="modal" data-target="#Observacionesreportes" idReporteObservacion="'.$value["id"].'"><i class="fa fa-fw fa-info-circle"></i></button>
                            <h4>Reportes</h4>
                         <hr>';
                
        
    
                }else if ($value["noviembre"] == "noviembre") {
                  echo
                       '<button type="button" class="btn bg-purple btnnuevo">Programado</button>';

                }else {
                  echo '<button type="button" class="btn btn-block btn-default disabled">No hay reportes</button>';
                }
            
                  
                  foreach($reportessi as $key => $item2) {

                    if ($item2["tipo_manteniemiento"] == "Preventivo"  && $item2["mes"] == "noviembrecr") {
                      echo
                        '<button type="button" class="btn btn-block btn-success btnMostrarReporte" idReporte="'.$item2["num_reporte"].'">'.$item2["num_reporte"].'</button>';
                    }

                     if ($item2["tipo_manteniemiento"] == "Correctivo" && $item2["mes"] == "noviembrecr" ) {
                      echo
                        '<button type="button" class="btn btn-block btn-danger btnMostrarReporte" idReporte="'.$item2["num_reporte"].'">'.$item2["num_reporte"].'</button>';
                    }

                     if ($item2["tipo_manteniemiento"] == "Instalacion"  && $item2["mes"] == "noviembrecr") {
                      echo
                        '<button type="button" class="btn btn-block btn-warning btnMostrarReporte" idReporte="'.$item2["num_reporte"].'">'.$item2["num_reporte"].'</button>';
                    }

                    if ($item2["tipo_manteniemiento"] == "Evaluacion"  && $item2["mes"] == "noviembrecr") {
                      echo
                        '<button type="button" class="btn btn-block btn-primary btnMostrarReporte" idReporte="'.$item2["num_reporte"].'">'.$item2["num_reporte"].'</button>';
                    }


                  }

                
                  echo'
                </div>
              </div>
            </td>';

            echo'
            <td>
              <div class="popover_parent">';
              if ($value["diciembre"] == "diciembrecr") {
       
                  echo 
                  '
                    <a href="javascript:void(0);" class="btn"><button type="button" class="btn bg-navy">Ver Reportes</button></a>
                       <div class="popover">
                       <button class="iconosnew btnObservacionReporte " data-toggle="modal" data-target="#Observacionesreportes" idReporteObservacion="'.$value["id"].'"><i class="fa fa-fw fa-info-circle"></i></button>
                            <h4>Reportes</h4>
                         <hr>';
                
        
    
                }else if ($value["diciembre"] == "diciembre") {
                  echo
                       '<button type="button" class="btn bg-purple btnnuevo">Programado</button>';

                }else {
                  echo '<button type="button" class="btn btn-block btn-default disabled">No hay reportes</button>';
                }
            
                  
                  foreach($reportessi as $key => $item2) {

                    if ($item2["tipo_manteniemiento"] == "Preventivo"  && $item2["mes"] == "diciembrecr") {
                      echo
                        '<button type="button" class="btn btn-block btn-success btnMostrarReporte" idReporte="'.$item2["num_reporte"].'">'.$item2["num_reporte"].'</button>';
                    }

                     if ($item["tipo_manteniemiento"] == "Correctivo" && $item["mes"] == "diciembrecr" ) {
                      echo
                        '<button type="button" class="btn btn-block btn-danger btnMostrarReporte" idReporte="'.$item["num_reporte"].'">'.$item["num_reporte"].'</button>';
                    }

                     if ($item["tipo_manteniemiento"] == "Instalacion"  && $item["mes"] == "diciembrecr") {
                      echo
                        '<button type="button" class="btn btn-block btn-warning btnMostrarReporte" idReporte="'.$item["num_reporte"].'">'.$item["num_reporte"].'</button>';
                    }

                    if ($item["tipo_manteniemiento"] == "Evaluacion"  && $item["mes"] == "diciembrecr") {
                      echo
                        '<button type="button" class="btn btn-block btn-primary btnMostrarReporte" idReporte="'.$item["num_reporte"].'">'.$item["num_reporte"].'</button>';
                    }


                  }

                
                  echo'
                </div>
              </div>
            </td>';
            
            echo'
            <td>
              <div class="btn-group">
                
                <button class="btn btn-warning btnEditarCronograma" idCronograma="'.$value["id"].'" data-toggle="modal" data-target="#modalEditarCronograma"><i class="fa fa-pencil"></i></button>
                <button class="btn btn-success btnAsignarCronogramaPeriodo" idCronograma="'.$value["id"].'" data-toggle="modal" data-target="#modalAsignarCronogramasPeriodos"><i class="fa fa-paper-plane"></i></button>
                <button class="btn btn-danger btnEliminarCronograma" idCronograma="'.$value["id"].'" idEquipo="'.$value["equipo"].'"><i class="fa fa-times"></i></button>
              </div>
            </td>
          </tr>';
          // <td><button type="button" data-toggle="modal" data-target="#myModal" class="btn btn-block btn-default">Ver Reportes</button></td>
          //   echo'
          
          }
          ?>
        </tbody>
      </table>
      </div>
      <!--    Start Pagination -->
      <!-- <div class='pagination-container' >
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

    
        
        <!--<h4 style="text-align: center;margin-bottom: 10px;">Año</h4>-->

        <!--<div class="row">-->
        <!--  <div class="col-md-5"></div>-->
        <!--  <div class="col-md-2">-->
        <!--    <div id="myCarousel" data-interval="false" class="carousel slide text-center" data-ride="carousel" style="margin-bottom: 25px;">-->
        <!--      <div class="carousel-inner" role="listbox">-->
        <!--        <div class="item active">-->
        <!--            <a href="http://ingbioservicios.com.co/app/cronograma"><button type="button" style="margin-left: 10px;" class="btn btn-default btn-lg">2019</button></a>-->
        <!--       </div>-->
        <!--       <div class="item">-->
        <!--            <a href="http://ingbioservicios.com.co/app/cronograma-2020"><button type="button" class="btn btn-default btn-lg" style="margin-left: 10px;">2020</button></a>-->
        <!--       </div>-->
        <!--       <div class="item">-->
        <!--            <a href="http://ingbioservicios.com.co/app/cronograma-2021"><button type="button" class="btn btn-default btn-lg" style="margin-left: 10px;">2021</button></a>-->
        <!--       </div>-->
        <!--      </div>-->
        <!--      <a class="carousel-control left carousel-control-prev" href="#myCarousel" data-slide="prev">-->
        <!--        <i class="fa fa-angle-left"></i>-->
        <!--      </a>-->
        <!--      <a class="carousel-control right carousel-control-next" href="#myCarousel" data-slide="next">-->
        <!--      <i class="fa fa-angle-right"></i>-->
        <!--</a>-->
        <!--    </div>-->
        <!--  </div>-->
        <!--  <div class="col-md-5"></div>-->
        <!--</div>-->
        
        <div class="box-footer clearfix no-border">
              <a href="http://ingbioservicios.com.co/app/cronograma-2020"><button type="button" class="btn btn-default pull-right">2020 <i class="fa fa-chevron-right"></i></button></a>
              <!--<a href="http://ingbioservicios.com.co/app/cronograma-2021"><button type="button" class="btn btn-default"><i class="fa fa-chevron-left"></i> 2021</button></a>-->
        </div>
   
      
      <?php
      }
      else if ($_SESSION["perfil"] == "cliente")
      {
      ?>
      <div class="box-header with-border">
        
       <!--  <a href="vistas/modulos/descargar-reporte.php?reporte=reporte"><button class="btn btn-success"> Descargar reporte en Excel</button></a> -->
       <?php
       $session = $_SESSION["id"];
        echo ' <a href="vistas/modulos/descargar-reporte.php?reporte12=reporte12&session='.$session.'"><button class="btn btn-success botones">Descargar reporte en Excel</button></a>'
       ?>
        
        
        <button type="button" class="btn btn-default" id="daterange-btncronograma">
        <span>
          <i class="fa fa-calendar"></i>Rango de fecha
        </span>
        <i class="fa fa-caret-down"></i>
        </button> 
        
        <button type="button" class="btn btn-warning cancelarCronograma"><i class="fa fa-times"></i>  Cancelar</button>
        <div class="pull-right">
          <span class="badge bg-red">Correctivo</span>
          <span class="badge bg-yellow">Instalación</span>
          <span class="badge bg-light-blue">Evaluación</span>
          <span class="badge bg-green">Preventivo</span>
        </div>
      </div>

      <!--<div class="row" style="margin-top: 10px;">-->
      <!--    <div class="col-md-4">-->
      <!--  <h4>Número de filas</h4>-->
      <!--  <div class="form-group">-->
      <!--    <select class="form-control" name="state" id="maxRows">-->
      <!--       <option value="5000">Mostrar todos</option>-->
      <!--       <option value="5">5</option>-->
      <!--       <option value="10">10</option>-->
      <!--       <option value="15">15</option>-->
      <!--       <option value="20">20</option>-->
      <!--       <option value="50">50</option>-->
      <!--       <option value="70">70</option>-->
      <!--       <option value="100">100</option>-->
      <!--      </select>-->
          
      <!--    </div>-->
      <!--    </div>-->
      <!--    <div class="col-md-8"></div>-->
      <!--  </div>-->
      
         <style type="text/css">
             th:first-child, td:first-child
                {
                position:sticky;
                left:0px;
                z-index: 99;
 
            }

             td:first-child
 {
  background-color:#3c8dbc;
  color: white;
 }
           </style>
     <div class="table-responsive" style="margin-top: 10px;">
        <table class="table table-bordered table-striped tablasCronograma" style="width: 100%;" id="table-id">
          
          <thead>
            
            <tr>
              
              <!-- <th style="width:10px">#</th> -->
              <th>Cliente</th>
              <th>Equipo</th>
              <th>Marca</th>
              <th>Modelo</th>
              <th>Serie</th>
              <th>Codigo</th>
              <th>Enero</th>
              <th>Febrero</th>
              <th>Marzo</th>
              <th>Abril</th>
              <th>Mayo</th>
              <th>Junio</th>
              <th>Julio</th>
              <th>Agosto</th>
              <th>Septiembre</th>
              <th>Octubre</th>
              <th>Noviembre</th>
              <th>Diciembre</th>
  
            </tr>
          </thead>
          <tbody>
            <?php
            if (isset($_GET["fechaInicial"]))
            {
            $fechaInicial = $_GET["fechaInicial"];
            $fechaFinal = $_GET["fechaFinal"];
            $perfil = "cliente";
            $valor = $_SESSION["id"];
            $tiempo = "tiempo";
            $periodo = "2019";
            $mantenimiento = ControladorCronograma::ctrRangoFechasCronograma($fechaInicial, $fechaFinal,$perfil,$valor,$tiempo,$periodo);
            }
            else
            {
            $fechaInicial = null;
            $fechaFinal = null;
            $perfil = "cliente";
            $valor = $_SESSION["id"];
            $tiempo = "tiempo";
            $periodo = "2019";
            $mantenimiento = ControladorCronograma::ctrRangoFechasCronograma($fechaInicial, $fechaFinal,$perfil,$valor,$tiempo,$periodo);
            }
            foreach ($mantenimiento as $key => $value)
            {
           echo '<tr>';
              
              $item = "id";
              $valor = $value["cliente"];
              $perfil = null;
              $usuarios = ControladorUsuarios::ctrMostrarUsuarios($item, $valor, $perfil);
              echo '
              <td>'.$usuarios["nombre"].'</td>
              <td>'.$value["equipo"].'</td>
              <td>'.$value["marca"].'</td>
              <td>'.$value["modelo"].'</td>
              <td>'.$value["serie1"].'</td>
              <td>'.$value["codigo2"].'</td>
              <td>
              <div class="popover_parent">';
                $item = null;
                $valor = $value["codigo2"];
                $orden = null;
                $perfil = "codigo";
                $tiempo = "tiempo";
                $valortiempo = "2019";
                $reportessi = ControladorMantenimiento::ctrMostrarModelos2019($item, $valor,$orden,$perfil,$tiempo,$valortiempo);

                $item = null;
                $valor = $value["abril"];
                $orden = null;
                $perfil = "mes";
                $reportesenero = ControladorMantenimiento::ctrMostrarModelos($item, $valor,$orden,$perfil);

                // var_dump($reportesenero);

                

              if ($value["enero"] == "enerocr") {
       
                  echo 
                  '
                    <a href="javascript:void(0);" class="btn"><button type="button" class="btn bg-navy">Ver Reportes</button></a>
                       <div class="popover">
                       <button class="iconosnew btnObservacionReporte" data-toggle="modal" data-target="#Observacionesreportes" idReporteObservacion="'.$value["id"].'"><i class="fa fa-fw fa-info-circle"></i></button>
                            <h4>Reportes</h4>
                         <hr>';
                
        
    
                }else if ($value["enero"] == "enero") {
                  echo
                       '<button type="button" class="btn bg-purple">Programado</button>';

                }else {
                  echo '<button type="button" class="btn btn-block btn-default disabled">No hay reportes</button>';
                }

                  foreach($reportessi as $key => $item2){


                    if ($item2["tipo_manteniemiento"] == "Preventivo"  && $item2["mes"] == "enerocr") {
                      echo
                        '<button type="button" class="btn btn-block btn-success btnMostrarReporte" idReporte="'.$item2["num_reporte"].'">'.$item2["num_reporte"].'</button>';
                    }

                    if ($item2["tipo_manteniemiento"] == "Correctivo" && $item2["mes"] == "enerocr" ) {
                      echo
                        '<button type="button" class="btn btn-block btn-danger btnMostrarReporte" idReporte="'.$item2["num_reporte"].'">'.$item2["num_reporte"].'</button>';
                    }

                     if ($item2["tipo_manteniemiento"] == "Instalacion"  && $item2["mes"] == "enerocr") {
                      echo
                        '<button type="button" class="btn btn-block btn-warning btnMostrarReporte" idReporte="'.$item2["num_reporte"].'">'.$item2["num_reporte"].'</button>';
                    }

                    if ($item2["tipo_manteniemiento"] == "Evaluacion"  && $item2["mes"] == "enerocr") {
                      echo
                        '<button type="button" class="btn btn-block btn-primary btnMostrarReporte" idReporte="'.$item2["num_reporte"].'">'.$item2["num_reporte"].'</button>';
                    }


                  }

                
                  echo'
                </div>
              </div>
            </td>';
     
            echo'
            <td>
              <div class="popover_parent">';
              if ($value["febrero"] == "febrerocr") {
       
                  echo 
                  '
                    <a href="javascript:void(0);" class="btn"><button type="button" class="btn bg-navy">Ver Reportes</button></a>
                       <div class="popover">
                       <button class="iconosnew btnObservacionReporte" data-toggle="modal" data-target="#Observacionesreportes" idReporteObservacion="'.$value["id"].'"><i class="fa fa-fw fa-info-circle"></i></button>
                            <h4>Reportes</h4>
                         <hr>';
                
        
    
                }else if ($value["febrero"] == "febrero") {
                  echo
                       '<button type="button" class="btn bg-purple">Programado</button>';

                }else {
                  echo '<button type="button" class="btn btn-block btn-default disabled">No hay reportes</button>';
                }
            
                  
                  foreach($reportessi as $key => $item2) {

                    if ($item2["tipo_manteniemiento"] == "Preventivo"  && $item2["mes"] == "febrerocr") {
                      echo
                        '<button type="button" class="btn btn-block btn-success btnMostrarReporte" idReporte="'.$item2["num_reporte"].'">'.$item2["num_reporte"].'</button>';
                    }

                    if ($item2["tipo_manteniemiento"] == "Correctivo" && $item2["mes"] == "febrerocr" ) {
                      echo
                        '<button type="button" class="btn btn-block btn-danger btnMostrarReporte" idReporte="'.$item2["num_reporte"].'">'.$item2["num_reporte"].'</button>';
                    }

                     if ($item2["tipo_manteniemiento"] == "Instalacion"  && $item2["mes"] == "febrerocr") {
                      echo
                        '<button type="button" class="btn btn-block btn-warning btnMostrarReporte" idReporte="'.$item2["num_reporte"].'">'.$item2["num_reporte"].'</button>';
                    }

                    if ($item2["tipo_manteniemiento"] == "Evaluacion"  && $item2["mes"] == "febrerocr") {
                      echo
                        '<button type="button" class="btn btn-block btn-primary btnMostrarReporte" idReporte="'.$item2["num_reporte"].'">'.$item2["num_reporte"].'</button>';
                    }


                  }

                  echo'
                </div>
              </div>
            </td>';


          echo'
            <td>
              <div class="popover_parent">';
              if ($value["marzo"] == "marzocr") {
       
                  echo 
                  '
                    <a href="javascript:void(0);" class="btn"><button type="button" class="btn bg-navy">Ver Reportes</button></a>
                       <div class="popover">
                       <button class="iconosnew btnObservacionReporte" data-toggle="modal" data-target="#Observacionesreportes" idReporteObservacion="'.$value["id"].'"><i class="fa fa-fw fa-info-circle"></i></button>
                            <h4>Reportes</h4>
                         <hr>';
                
        
    
                }else if ($value["marzo"] == "marzo") {
                  echo
                       '<button type="button" class="btn bg-purple">Programado</button>';

                }else {
                  echo '<button type="button" class="btn btn-block btn-default disabled">No hay reportes</button>';
                }


                foreach($reportessi as $key => $item2) {

                    if ($item2["tipo_manteniemiento"] == "Preventivo"  && $item2["mes"] == "marzocr") {
                      echo
                        '<button type="button" class="btn btn-block btn-success btnMostrarReporte" idReporte="'.$item2["num_reporte"].'">'.$item2["num_reporte"].'</button>';
                    }

                     if ($item2["tipo_manteniemiento"] == "Correctivo" && $item2["mes"] == "marzocr" ) {
                      echo
                        '<button type="button" class="btn btn-block btn-danger btnMostrarReporte" idReporte="'.$item2["num_reporte"].'">'.$item2["num_reporte"].'</button>';
                    }

                     if ($item2["tipo_manteniemiento"] == "Instalacion"  && $item2["mes"] == "marzocr") {
                      echo
                        '<button type="button" class="btn btn-block btn-warning btnMostrarReporte" idReporte="'.$item2["num_reporte"].'">'.$item2["num_reporte"].'</button>';
                    }

                    if ($item2["tipo_manteniemiento"] == "Evaluacion"  && $item2["mes"] == "marzocr") {
                      echo
                        '<button type="button" class="btn btn-block btn-primary btnMostrarReporte" idReporte="'.$item2["num_reporte"].'">'.$item2["num_reporte"].'</button>';
                    }


                  }

                
                  echo'
                </div>
              </div>
            </td>';

            echo'
            <td>
              <div class="popover_parent">';
              if ($value["abril"] == "abrilcr") {
       
                  echo 
                  '
                    <a href="javascript:void(0);" class="btn"><button type="button" class="btn bg-navy">Ver Reportes</button></a>
                       <div class="popover">
                       <button class="iconosnew btnObservacionReporte" data-toggle="modal" data-target="#Observacionesreportes" idReporteObservacion="'.$value["id"].'"><i class="fa fa-fw fa-info-circle"></i></button>
                            <h4>Reportes</h4>
                         <hr>';
                
        
    
                }else if ($value["abril"] == "abril") {
                  echo
                       '<button type="button" class="btn bg-purple">Programado</button>';

                }else {
                  echo '<button type="button" class="btn btn-block btn-default disabled">No hay reportes</button>';
                }
            
                  
                  foreach($reportessi as $key => $item2) {

                    if ($item2["tipo_manteniemiento"] == "Preventivo"  && $item2["mes"] == "abrilcr") {
                      echo
                        '<button type="button" class="btn btn-block btn-success verde btnMostrarReporte" idReporte="'.$item2["num_reporte"].'">'.$item2["num_reporte"].'</button>';
                    }

                     if ($item2["tipo_manteniemiento"] == "Correctivo" && $item2["mes"] == "abrilcr" ) {
                      echo
                        '<button type="button" class="btn btn-block btn-danger btnMostrarReporte" idReporte="'.$item2["num_reporte"].'">'.$item2["num_reporte"].'</button>';
                    }

                     if ($item2["tipo_manteniemiento"] == "Instalacion"  && $item2["mes"] == "abrilcr") {
                      echo
                        '<button type="button" class="btn btn-block btn-warning btnMostrarReporte" idReporte="'.$item2["num_reporte"].'">'.$item2["num_reporte"].'</button>';
                    }

                    if ($item2["tipo_manteniemiento"] == "Evaluacion"  && $item2["mes"] == "abrilcr") {
                      echo
                        '<button type="button" class="btn btn-block btn-primary btnMostrarReporte" idReporte="'.$item2["num_reporte"].'">'.$item2["num_reporte"].'</button>';
                    }


                  }

                
                  echo'
                </div>
              </div>
            </td>';

            echo'
            <td>
              <div class="popover_parent">';
              if ($value["mayo"] == "mayocr") {
       
                  echo 
                  '
                    <a href="javascript:void(0);" class="btn"><button type="button" class="btn bg-navy">Ver Reportes</button></a>
                       <div class="popover">
                       <button class="iconosnew btnObservacionReporte" data-toggle="modal" data-target="#Observacionesreportes" idReporteObservacion="'.$value["id"].'"><i class="fa fa-fw fa-info-circle"></i></button>
                            <h4>Reportes</h4>
                         <hr>';
                
        
    
                }else if ($value["mayo"] == "mayo") {
                  echo
                       '<button type="button" class="btn bg-purple">Programado</button>';

                }else {
                  echo '<button type="button" class="btn btn-block btn-default disabled">No hay reportes</button>';
                }
            
                  
                  foreach($reportessi as $key => $item2) {

                    if ($item2["tipo_manteniemiento"] == "Preventivo"  && $item2["mes"] == "mayocr") {
                      echo
                        '<button type="button" class="btn btn-block btn-success btnMostrarReporte" idReporte="'.$item2["num_reporte"].'">'.$item2["num_reporte"].'</button>';
                    }

                    if ($item2["tipo_manteniemiento"] == "Correctivo" && $item2["mes"] == "mayocr" ) {
                      echo
                        '<button type="button" class="btn btn-block btn-danger btnMostrarReporte" idReporte="'.$item2["num_reporte"].'">'.$item2["num_reporte"].'</button>';
                    }

                     if ($item2["tipo_manteniemiento"] == "Instalacion"  && $item2["mes"] == "mayocr") {
                      echo
                        '<button type="button" class="btn btn-block btn-warning btnMostrarReporte" idReporte="'.$item2["num_reporte"].'">'.$item2["num_reporte"].'</button>';
                    }

                    if ($item2["tipo_manteniemiento"] == "Evaluacion"  && $item2["mes"] == "mayocr") {
                      echo
                        '<button type="button" class="btn btn-block btn-primary btnMostrarReporte" idReporte="'.$item2["num_reporte"].'">'.$item2["num_reporte"].'</button>';
                    }


                  }
                
                  echo'
                </div>
              </div>
            </td>';


            echo'
            <td>
              <div class="popover_parent">';
              if ($value["junio"] == "juniocr") {
       
                  echo 
                  '
                    <a href="javascript:void(0);" class="btn"><button type="button" class="btn bg-navy">Ver Reportes</button></a>
                       <div class="popover">
                       <button class="iconosnew btnObservacionReporte" data-toggle="modal" data-target="#Observacionesreportes" idReporteObservacion="'.$value["id"].'"><i class="fa fa-fw fa-info-circle"></i></button>
                            <h4>Reportes</h4>
                         <hr>';
                
        
    
                }else if ($value["junio"] == "junio") {
                  echo
                       '<button type="button" class="btn bg-purple">Programado</button>';

                }else {
                  echo '<button type="button" class="btn btn-block btn-default disabled">No hay reportes</button>';
                }            
                  
                  foreach($reportessi as $key => $item2) {

                    if ($item2["tipo_manteniemiento"] == "Preventivo"  && $item2["mes"] == "juniocr") {
                      echo
                        '<button type="button" class="btn btn-block btn-success btnMostrarReporte" idReporte="'.$item2["num_reporte"].'">'.$item2["num_reporte"].'</button>';
                    }

                     if ($item2["tipo_manteniemiento"] == "Correctivo" && $item2["mes"] == "juniocr" ) {
                      echo
                        '<button type="button" class="btn btn-block btn-danger btnMostrarReporte" idReporte="'.$item2["num_reporte"].'">'.$item2["num_reporte"].'</button>';
                    }

                     if ($item2["tipo_manteniemiento"] == "Instalacion"  && $item2["mes"] == "juniocr") {
                      echo
                        '<button type="button" class="btn btn-block btn-warning btnMostrarReporte" idReporte="'.$item2["num_reporte"].'">'.$item2["num_reporte"].'</button>';
                    }

                    if ($item2["tipo_manteniemiento"] == "Evaluacion"  && $item2["mes"] == "juniocr") {
                      echo
                        '<button type="button" class="btn btn-block btn-primary btnMostrarReporte" idReporte="'.$item2["num_reporte"].'">'.$item2["num_reporte"].'</button>';
                    }


                  }

                  echo'
                </div>
              </div>
            </td>';

            echo'
            <td>
              <div class="popover_parent">';
              if ($value["julio"] == "juliocr") {
       
                  echo 
                  '
                    <a href="javascript:void(0);" class="btn"><button type="button" class="btn bg-navy">Ver Reportes</button></a>
                       <div class="popover">
                       <button class="iconosnew btnObservacionReporte" data-toggle="modal" data-target="#Observacionesreportes" idReporteObservacion="'.$value["id"].'"><i class="fa fa-fw fa-info-circle"></i></button>
                            <h4>Reportes</h4>
                         <hr>';
                
        
    
                }else if ($value["julio"] == "julio") {
                  echo
                       '<button type="button" class="btn bg-purple">Programado</button>';

                }else {
                  echo '<button type="button" class="btn btn-block btn-default disabled">No hay reportes</button>';
                }
            
                  
                  foreach($reportessi as $key => $item2) {

                    if ($item2["tipo_manteniemiento"] == "Preventivo"  && $item2["mes"] == "juliocr") {
                      echo
                        '<button type="button" class="btn btn-block btn-success btnMostrarReporte" idReporte="'.$item2["num_reporte"].'">'.$item2["num_reporte"].'</button>';
                    }

                     if ($item2["tipo_manteniemiento"] == "Correctivo" && $item2["mes"] == "juliocr" ) {
                      echo
                        '<button type="button" class="btn btn-block btn-danger btnMostrarReporte" idReporte="'.$item2["num_reporte"].'">'.$item2["num_reporte"].'</button>';
                    }

                     if ($item2["tipo_manteniemiento"] == "Instalacion"  && $item2["mes"] == "juliocr") {
                      echo
                        '<button type="button" class="btn btn-block btn-warning btnMostrarReporte" idReporte="'.$item2["num_reporte"].'">'.$item2["num_reporte"].'</button>';
                    }

                    if ($item2["tipo_manteniemiento"] == "Evaluacion"  && $item2["mes"] == "juliocr") {
                      echo
                        '<button type="button" class="btn btn-block btn-primary btnMostrarReporte" idReporte="'.$item2["num_reporte"].'">'.$item2["num_reporte"].'</button>';
                    }


                  }

                
                  echo'
                </div>
              </div>
            </td>';

            echo'
            <td>
              <div class="popover_parent">';
              if ($value["agosto"] == "agostocr") {
       
                  echo 
                  '
                    <a href="javascript:void(0);" class="btn"><button type="button" class="btn bg-navy">Ver Reportes</button></a>
                       <div class="popover">
                       <button class="iconosnew btnObservacionReporte" data-toggle="modal" data-target="#Observacionesreportes" idReporteObservacion="'.$value["id"].'"><i class="fa fa-fw fa-info-circle"></i></button>
                            <h4>Reportes</h4>
                         <hr>';
                
        
    
                }else if ($value["agosto"] == "agosto") {
                  echo
                       '<button type="button" class="btn bg-purple">Programado</button>';

                }else {
                  echo '<button type="button" class="btn btn-block btn-default disabled">No hay reportes</button>';
                }
            
                  
                  foreach($reportessi as $key => $item2) {

                    if ($item2["tipo_manteniemiento"] == "Preventivo"  && $item2["mes"] == "agostocr") {
                      echo
                        '<button type="button" class="btn btn-block btn-success btnMostrarReporte" idReporte="'.$item2["num_reporte"].'">'.$item2["num_reporte"].'</button>';
                    }

                     if ($item2["tipo_manteniemiento"] == "Correctivo" && $item2["mes"] == "agostocr" ) {
                      echo
                        '<button type="button" class="btn btn-block btn-danger btnMostrarReporte" idReporte="'.$item2["num_reporte"].'">'.$item2["num_reporte"].'</button>';
                    }

                     if ($item2["tipo_manteniemiento"] == "Instalacion"  && $item2["mes"] == "agostocr") {
                      echo
                        '<button type="button" class="btn btn-block btn-warning btnMostrarReporte" idReporte="'.$item2["num_reporte"].'">'.$item2["num_reporte"].'</button>';
                    }

                    if ($item2["tipo_manteniemiento"] == "Evaluacion"  && $item2["mes"] == "agostocr") {
                      echo
                        '<button type="button" class="btn btn-block btn-primary btnMostrarReporte" idReporte="'.$item2["num_reporte"].'">'.$item2["num_reporte"].'</button>';
                    }


                  }
                
                  echo'
                </div>
              </div>
            </td>';


            echo'
            <td>
              <div class="popover_parent">';
              if ($value["septiembre"] == "septiembrecr") {
       
                  echo 
                  '
                    <a href="javascript:void(0);" class="btn"><button type="button" class="btn bg-navy">Ver Reportes</button></a>
                       <div class="popover">
                       <button class="iconosnew btnObservacionReporte" data-toggle="modal" data-target="#Observacionesreportes" idReporteObservacion="'.$value["id"].'"><i class="fa fa-fw fa-info-circle"></i></button>
                            <h4>Reportes</h4>
                         <hr>';
                
        
    
                }else if ($value["septiembre"] == "septiembre") {
                  echo
                       '<button type="button" class="btn bg-purple">Programado</button>';

                }else {
                  echo '<button type="button" class="btn btn-block btn-default disabled">No hay reportes</button>';
                }
            
                  
                  foreach($reportessi as $key => $item2) {

                    if ($item2["tipo_manteniemiento"] == "Preventivo"  && $item2["mes"] == "septiembrecr") {
                      echo
                        '<button type="button" class="btn btn-block btn-success btnMostrarReporte" idReporte="'.$item2["num_reporte"].'">'.$item2["num_reporte"].'</button>';
                    }

                     if ($item2["tipo_manteniemiento"] == "Correctivo" && $item2["mes"] == "septiembrecr" ) {
                      echo
                        '<button type="button" class="btn btn-block btn-danger btnMostrarReporte" idReporte="'.$item2["num_reporte"].'">'.$item2["num_reporte"].'</button>';
                    }

                     if ($item2["tipo_manteniemiento"] == "Instalacion"  && $item2["mes"] == "septiembrecr") {
                      echo
                        '<button type="button" class="btn btn-block btn-warning btnMostrarReporte" idReporte="'.$item2["num_reporte"].'">'.$item2["num_reporte"].'</button>';
                    }

                    if ($item2["tipo_manteniemiento"] == "Evaluacion"  && $item2["mes"] == "septiembrecr") {
                      echo
                        '<button type="button" class="btn btn-block btn-primary btnMostrarReporte" idReporte="'.$item2["num_reporte"].'">'.$item2["num_reporte"].'</button>';
                    }


                  }


                
                  echo'
                </div>
              </div>
            </td>';

            echo'
            <td>
              <div class="popover_parent">';
              if ($value["octubre"] == "octubrecr") {
       
                  echo 
                  '
                    <a href="javascript:void(0);" class="btn"><button type="button" class="btn bg-navy">Ver Reportes</button></a>
                       <div class="popover">
                       <button class="iconosnew btnObservacionReporte" data-toggle="modal" data-target="#Observacionesreportes" idReporteObservacion="'.$value["id"].'"><i class="fa fa-fw fa-info-circle"></i></button>
                            <h4>Reportes</h4>
                         <hr>';
                
        
    
                }else if ($value["octubre"] == "octubre") {
                  echo
                       '<button type="button" class="btn bg-purple">Programado</button>';

                }else {
                  echo '<button type="button" class="btn btn-block btn-default disabled">No hay reportes</button>';
                }
            
                  
                  foreach($reportessi as $key => $item2) {

                    if ($item2["tipo_manteniemiento"] == "Preventivo"  && $item2["mes"] == "octubrecr") {
                      echo
                        '<button type="button" class="btn btn-block btn-success btnMostrarReporte" idReporte="'.$item2["num_reporte"].'">'.$item2["num_reporte"].'</button>';
                    }

                     if ($item2["tipo_manteniemiento"] == "Correctivo" && $item2["mes"] == "octubrecr" ) {
                      echo
                        '<button type="button" class="btn btn-block btn-danger btnMostrarReporte" idReporte="'.$item2["num_reporte"].'">'.$item2["num_reporte"].'</button>';
                    }

                     if ($item2["tipo_manteniemiento"] == "Instalacion"  && $item2["mes"] == "octubrecr") {
                      echo
                        '<button type="button" class="btn btn-block btn-warning btnMostrarReporte" idReporte="'.$item2["num_reporte"].'">'.$item2["num_reporte"].'</button>';
                    }

                    if ($item2["tipo_manteniemiento"] == "Evaluacion"  && $item2["mes"] == "octubrecr") {
                      echo
                        '<button type="button" class="btn btn-block btn-primary btnMostrarReporte" idReporte="'.$item2["num_reporte"].'">'.$item2["num_reporte"].'</button>';
                    }


                  }

                
                  echo'
                </div>
              </div>
            </td>';

            echo'
            <td>
              <div class="popover_parent">';
              if ($value["noviembre"] == "noviembrecr") {
       
                  echo 
                  '
                    <a href="javascript:void(0);" class="btn"><button type="button" class="btn bg-navy">Ver Reportes</button></a>
                       <div class="popover">
                       <button class="iconosnew btnObservacionReporte" data-toggle="modal" data-target="#Observacionesreportes" idReporteObservacion="'.$value["id"].'"><i class="fa fa-fw fa-info-circle"></i></button>
                            <h4>Reportes</h4>
                         <hr>';
                
        
    
                }else if ($value["noviembre"] == "noviembre") {
                  echo
                       '<button type="button" class="btn bg-purple">Programado</button>';

                }else {
                  echo '<button type="button" class="btn btn-block btn-default disabled">No hay reportes</button>';
                }
            
                  
                  foreach($reportessi as $key => $item2) {

                    if ($item2["tipo_manteniemiento"] == "Preventivo"  && $item2["mes"] == "noviembrecr") {
                      echo
                        '<button type="button" class="btn btn-block btn-success btnMostrarReporte" idReporte="'.$item2["num_reporte"].'">'.$item2["num_reporte"].'</button>';
                    }

                     if ($item2["tipo_manteniemiento"] == "Correctivo" && $item2["mes"] == "noviembrecr" ) {
                      echo
                        '<button type="button" class="btn btn-block btn-danger btnMostrarReporte" idReporte="'.$item2["num_reporte"].'">'.$item2["num_reporte"].'</button>';
                    }

                     if ($item2["tipo_manteniemiento"] == "Instalacion"  && $item2["mes"] == "noviembrecr") {
                      echo
                        '<button type="button" class="btn btn-block btn-warning btnMostrarReporte" idReporte="'.$item2["num_reporte"].'">'.$item2["num_reporte"].'</button>';
                    }

                    if ($item2["tipo_manteniemiento"] == "Evaluacion"  && $item2["mes"] == "noviembrecr") {
                      echo
                        '<button type="button" class="btn btn-block btn-primary btnMostrarReporte" idReporte="'.$item2["num_reporte"].'">'.$item2["num_reporte"].'</button>';
                    }


                  }

                
                  echo'
                </div>
              </div>
            </td>';

            echo'
            <td>
              <div class="popover_parent">';
              if ($value["diciembre"] == "diciembrecr") {
       
                  echo 
                  '
                    <a href="javascript:void(0);" class="btn"><button type="button" class="btn bg-navy">Ver Reportes</button></a>
                       <div class="popover">
                       <button class="iconosnew btnObservacionReporte" data-toggle="modal" data-target="#Observacionesreportes" idReporteObservacion="'.$value["id"].'"><i class="fa fa-fw fa-info-circle"></i></button>
                            <h4>Reportes</h4>
                         <hr>';
                
        
    
                }else if ($value["diciembre"] == "diciembre") {
                  echo
                       '<button type="button" class="btn bg-purple">Programado</button>';

                }else {
                  echo '<button type="button" class="btn btn-block btn-default disabled">No hay reportes</button>';
                }
            
                  
                  foreach($reportessi as $key => $item2) {

                    if ($item2["tipo_manteniemiento"] == "Preventivo"  && $item2["mes"] == "diciembrecr") {
                      echo
                        '<button type="button" class="btn btn-block btn-success btnMostrarReporte" idReporte="'.$item2["num_reporte"].'">'.$item2["num_reporte"].'</button>';
                    }

                     if ($item["tipo_manteniemiento"] == "Correctivo" && $item["mes"] == "diciembrecr" ) {
                      echo
                        '<button type="button" class="btn btn-block btn-danger btnMostrarReporte" idReporte="'.$item["num_reporte"].'">'.$item["num_reporte"].'</button>';
                    }

                     if ($item["tipo_manteniemiento"] == "Instalacion"  && $item["mes"] == "diciembrecr") {
                      echo
                        '<button type="button" class="btn btn-block btn-warning btnMostrarReporte" idReporte="'.$item["num_reporte"].'">'.$item["num_reporte"].'</button>';
                    }

                    if ($item["tipo_manteniemiento"] == "Evaluacion"  && $item["mes"] == "diciembrecr") {
                      echo
                        '<button type="button" class="btn btn-block btn-primary btnMostrarReporte" idReporte="'.$item["num_reporte"].'">'.$item["num_reporte"].'</button>';
                    }


                  }

                
                  echo'
                </div>
              </div>
            </td>
          </tr>';
          
          }
          ?>
        </tbody>
      </table>
</div>


      <!--    Start Pagination -->
      <!--<div class='pagination-container' >-->
      <!--  <nav>-->
      <!--    <ul class="pagination">-->
            
      <!--      <li data-page="prev" >-->
      <!--        <span> < <span class="sr-only">(current)</span></span>-->
      <!--      </li>-->
      <!--      <li data-page="next" id="prev">-->
      <!--        <span> > <span class="sr-only">(current)</span></span>-->
      <!--      </li>-->
      <!--    </ul>-->
      <!--  </nav>-->
      <!--</div>-->

      <!--<h4 style="text-align: center;margin-bottom: 10px;">Año</h4>-->

      <!--  <div class="row">-->
      <!--    <div class="col-md-5"></div>-->
      <!--    <div class="col-md-2">-->
      <!--      <div id="myCarousel" data-interval="false" class="carousel slide text-center" data-ride="carousel" style="margin-bottom: 25px;">-->
      <!--        <div class="carousel-inner" role="listbox">-->
      <!--          <div class="item active">-->
      <!--              <a href="http://ingbioservicios.com.co/app/cronograma"><button type="button" style="margin-left: 10px;" class="btn btn-default btn-lg">2019</button></a>-->
      <!--         </div>-->
      <!--         <div class="item">-->
      <!--              <a href="http://ingbioservicios.com.co/app/cronograma-2020"><button type="button" class="btn btn-default btn-lg" style="margin-left: 10px;">2020</button></a>-->
      <!--         </div>-->
      <!--         <div class="item">-->
      <!--              <a href="http://ingbioservicios.com.co/app/cronograma-2021"><button type="button" class="btn btn-default btn-lg" style="margin-left: 10px;">2021</button></a>-->
      <!--         </div>-->
      <!--        </div>-->
      <!--        <a class="carousel-control left carousel-control-prev" href="#myCarousel" data-slide="prev">-->
      <!--          <i class="fa fa-angle-left"></i>-->
      <!--        </a>-->
      <!--        <a class="carousel-control right carousel-control-next" href="#myCarousel" data-slide="next">-->
      <!--        <i class="fa fa-angle-right"></i>-->
      <!--  </a>-->
      <!--      </div>-->
      <!--    </div>-->
      <!--    <div class="col-md-5"></div>-->
      <!--  </div>-->
      
      <div class="box-footer clearfix no-border">
              <a href="http://ingbioservicios.com.co/app/cronograma-2020"><button type="button" class="btn btn-default pull-right">2020 <i class="fa fa-chevron-right"></i></button></a>
              <!--<a href="http://ingbioservicios.com.co/app/cronograma-2021"><button type="button" class="btn btn-default"><i class="fa fa-chevron-left"></i> 2021</button></a>-->
        </div>
      <?php
      }
      ?>
    </div>
  </div>
</section>
</div>
<!--=====================================
MODAL AGREGAR CRONOGRAMA
======================================-->
<div id="modalAgregarCronograma" class="modal fade" role="dialog">

<div class="modal-dialog">
  <div class="modal-content">
    <form role="form" method="post">
      <!--=====================================
      CABEZA DEL MODAL
      ======================================-->
      <div class="modal-header" style="background:#3c8dbc; color:white">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Agregar cronograma</h4>
      </div>
      <!--=====================================
      CUERPO DEL MODAL
      ======================================-->
      <div class="modal-body">
        <div class="box-body">
          <!-- ENTRADA PARA EL CLIENTE -->
          <div class="form-group">
            <div class="input-group">
              
              <span class="input-group-addon"><i class="fa fa-users"></i></span>
              <select class="form-control input-lg select2" style="width: 100%;" name="clienteCronograma" id="nuevoClienteM">
                <?php
                $item = null;
                $valor = "cliente";
                $perfil = "perfil";
                $cliente = ControladorUsuarios::ctrMostrarUsuarios($item, $valor, $perfil);
                echo '<option value="">Escoje el cliente</option>';
                foreach ($cliente as $key => $value) {
                echo '<option value="'.$value["id"].'">'.$value["nombre"].'</option>';
                }
                
                ?>
                
              </select>
            </div>
          </div>
          
             <div class="form-group">
            <div class="input-group">
              <span class="input-group-addon"><i class="fa fa-align-justify"></i></span>
              <select class="form-control input-lg select2 validarSerie" id="nuevoCodigoM" style="width: 100%;" name="nuevoCodigoM" required>
                <?php
                

                // $itemMo = null;
                // $valorMo = null;
                // $ordenMo="id_equipo";
                // $selectMo = null;
                // $equiposMo = controladorEquipos::ctrMostrarEquipos($itemMo, $valorMo,$ordenMo,$selectMo);
                // echo '<option value="">Escoje el modelo</option>';
                // foreach ($equiposMo as $key => $value3){
                // echo '<option value="'.$value3["modelo"].'">'.$value3["modelo"].'</option>';
                // }
                ?>
              </select>
              
            </div>
          </div>
          
          <!-- ENTRADA PARA SELECCIONAR SU EQUIPO -->
          <script type="text/javascript">
          $(document).ready(function(){
          $('#nuevoCodigoM').val();
          recargarEquipo();
          
          $('#nuevoCodigoM').change(function(){
          recargarEquipo();
          });
          })
          </script>
          
          <div class="form-group">
            
            <div class="input-group">
              
              <span class="input-group-addon"><i class="fa fa-align-justify"></i></span>
              <select class="form-control input-lg select2" id="nuevoEquipoM" style="width: 100%;" name="nuevoEquipo" required>
                
                <?php
                
                // $itemE = null;
                // $valorE = $value["id"];
                // $ordenE = "id_equipo";
                // $selectE = null;
                // $equipos = controladorEquipos::ctrMostrarEquipos($itemE, $valorE,$ordenE ,$selectE);
                // echo '<option value="">Escoje el equipo</option>';
                // foreach ($equipos as $key => $value1){
                // echo '<option value="'.$value1["equipo"].'">'.$value1["equipo"].'</option>';
                // }
                ?>
              </select>
            </div>
          </div>
          <script type="text/javascript">
          $(document).ready(function(){
          $('#nuevoCodigoM').val();
          recargarMarca();
          
          $('#nuevoCodigoM').change(function(){
          recargarMarca();
          });
          })
          </script>
          
          <!-- ENTRADA PARA SELECCIONAR SU MARCA -->
          
          <div class="form-group">
            
            <div class="input-group">
              
              <span class="input-group-addon"><i class="fa fa-align-justify"></i></span>
              <select class="form-control input-lg select2" style="width: 100%;" name="nuevoMarca" id="nuevoMarcaM" required>
                
                <?php
                
                // $itemM = null; 
                // $valorM = null;
                // $ordenM = "id_equipo";
                // $selectM = null;
                // $equiposM = controladorEquipos::ctrMostrarEquipos($itemM, $valorM,$ordenM,$selectM);
                // echo '<option value="">Escoje la marca</option>';
                // foreach ($equiposM as $key => $value2){
                // echo '<option value="'.$value2["marcaText"].'">'.$value2["marcaText"].'</option>';
                // }
                ?>
              </select>
            </div>
          </div>
          
          
          <!-- ENTRADA PARA SELECCIONAR SU MODELO -->
          <script type="text/javascript">
          $(document).ready(function(){
          $('#nuevoCodigoM').val();
          recargarModelo();
          
          $('#nuevoCodigoM').change(function(){
          recargarModelo();
          });
          })
          </script>
          
          
          <div class="form-group">
            <div class="input-group">
              <span class="input-group-addon"><i class="fa fa-align-justify"></i></span>
              <select class="form-control input-lg select2" id="nuevoModeloM" style="width: 100%;" name="nuevoModelo" required>
                <?php
                
                // $itemMo = null;
                // $valorMo = null;
                // $ordenMo="id_equipo";
                // $selectMo = null;
                // $equiposMo = controladorEquipos::ctrMostrarEquipos($itemMo, $valorMo,$ordenMo,$selectMo);
                // echo '<option value="">Escoje el modelo</option>';
                // foreach ($equiposMo as $key => $value3){
                // echo '<option value="'.$value3["modelo"].'">'.$value3["modelo"].'</option>';
                // }
                ?>
              </select>
              
            </div>
          </div>
          <script type="text/javascript">
          $(document).ready(function(){
          $('#nuevoCodigoM').val();
          recargarSerie();
          
          $('#nuevoCodigoM').change(function(){
          recargarSerie();
          });
          })
          </script>

       
          <script type="text/javascript">
          $(document).ready(function(){
          $('#nuevoClienteM').val();
          recargarCodigo();
          
          $('#nuevoClienteM').change(function(){
          recargarCodigo();
          });
          })
          </script>

          <!-- ENTRADA PARA SELECCIONAR SU SERIE  id="nuevoSerieM"=>para validar la serie ,nuevoSerienuevo serieInstrumento clases-->
          <div class="form-group">
            <div class="input-group">
              <span class="input-group-addon"><i class="fa fa-align-justify"></i></span>
              <select class="form-control input-lg select2" style="width: 100%;" name="nuevoSerie" id="nuevoSerieM">
                <?php
                
                // $itemS = null;
                // $valorS = null;
                // $ordenS="id_equipo";
                // $selectS = null;
                // $equiposs = controladorEquipos::ctrMostrarEquipos($itemS, $valorS,$ordenS,$selectS);
                // echo '<option value="">Escoje la serie</option>';
                // foreach ($equiposs as $key => $value4){
                // echo '<option value="'.$value4["serie"].'">'.$value4["serie"].'</option>';
                // }
                ?>
              </select>
            </div>
          </div>


          <h4>Meses</h4>
          <div class="row">
            <div class="col-md-3">

              <div class="form-group">
                    <label>
                      <input type="checkbox" name="enero" value="enero" class="minimal">  Enero
                    </label>
                    <label>
                      <input type="checkbox" name="febrero" value="febrero" class="minimal">  Febrero
                    </label>
                    <label>
                      <input type="checkbox" name="marzo" value="marzo" class="minimal">  Marzo
                    </label>       
                  </div>
              </div>

              <div class="col-md-3" style="margin-bottom: 10px;">

                    <label>
                      <input type="checkbox" name="abril" value="abril" class="minimal">  Abril
                    </label>
                    <label>
                      <input type="checkbox" name="mayo" value="mayo" class="minimal">  Mayo  
                    </label>
                    <label>
                      <input type="checkbox" name="junio" value="junio" class="minimal">  Junio
                    </label>

              </div>

              <div class="col-md-3" style="margin-bottom: 10px;">
                <label>
                      <input type="checkbox" name="julio" value="julio" class="minimal">  Julio
                    </label>
                    <label>
                      <input type="checkbox" name="agosto" value="agosto" class="minimal">  Agosto
                    </label>
                    <label>
                      <input type="checkbox" name="septiembre" value="septiembre" class="minimal">  Septiembre
                </label>     
              </div>

              <div class="col-md-3" style="margin-bottom: 10px;">
                    
                    <label>
                      <input type="checkbox" name="octubre" value="octubre" class="minimal">  Octubre
                    </label>
                    <label>
                      <input type="checkbox" name="noviembre" value="noviembre" class="minimal">  Noviembre
                    </label>
                    <label>
                      <input type="checkbox" name="diciembre" value="diciembre" class="minimal">  Diciembre
                    </label>
              </div>
          </div>

          <div class="form-group">
                  
                  <div class="input-group">
                    
                    <span class="input-group-addon"><i class="fa fa-align-justify"></i></span>
                    <select class="form-control input-lg validarSeriePeriodo" name="nuevoPeriodo" required>
                      
                      <option value="">Año</option>
                      <option value="2019">2019</option>
                      <option value="2020">2020</option>
                      <option value="2021">2021</option>
                    </select>
                  </div>
                </div>


          <div class="form-group">
            
            <div class="input-group">
              
              <span class="input-group-addon"><i class="fa fa-heartbeat"></i></span>
              <input type="text" class="form-control input-lg" id="nuevoObservacion" name="nuevoObservacion" placeholder="Escriba la observación">
            </div>
          </div>
          <input type="hidden" value="0" class="form-control input-lg" id="reporte" name="nuevoReporte" placeholder="Escriba el Reporte">
          <input type="hidden" class="form-control input-lg" name="fechaProximo">
        </div>
      </div>
      <!--=====================================
      PIE DEL MODAL
      ======================================-->
      <div class="modal-footer">
        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>
        <button type="submit" class="btn btn-primary agregarDisabled">Guardar cronograma</button>
      </div>
      <?php
      $crearCronograma = new ControladorCronograma();
      $crearCronograma -> ctrCrearCronograma();
      ?>
    </form>
  </div>
</div>
</div>
<?php
$borrarCronograma = new ControladorCronograma();
$borrarCronograma -> ctrBorrarCronograma();
?>
<!--=====================================
MODAL EDITAR CRONOGRAMA
======================================-->
<div id="modalEditarCronograma" class="modal fade" role="dialog">

<div class="modal-dialog">
  <div class="modal-content">
    <form role="form" method="post">
      <!--=====================================
      CABEZA DEL MODAL
      ======================================-->
      <div class="modal-header" style="background:#3c8dbc; color:white">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Editar cronograma</h4>
      </div>
      <!--=====================================
      CUERPO DEL MODAL
      ======================================-->
      <div class="modal-body">
        <div class="box-body">
          <!-- ENTRADA PARA EL CLIENTE -->
          <input type="hidden" class="form-control input-lg"  name="idCronogramaEditar" placeholder="Ingresar nombre de la empresa"  id="idCronogramaEditar">
          <div class="form-group" style="display: none;">
            <div class="input-group">
              
              <span class="input-group-addon"><i class="fa fa-users"></i></span>
              <select class="form-control input-lg" id="clienteCronogramaEditar" name="clienteCronogramaEditar">
                
                <?php
                
                $item = null;
                $valor = 1;
                $perfil = "vistados";
                $cliente = ControladorUsuarios::ctrMostrarUsuarios($item, $valor, $perfil);
                foreach ($cliente as $key => $value) {
                echo '<option  value="'.$value["id"].'">'.$value["nombre"].'</option>';
                }
                ?>
              </select>
            </div>
          </div>
          <!-- ENTRADA PARA EL EQUIPO -->
          
          <div class="form-group">
            
            <div class="input-group">
              
              <span class="input-group-addon"><i class="fa fa-user"></i></span>
              <input type="text" class="form-control input-lg" name="editarEquipo" id="editarEquipo" placeholder="Ingresar el equipo"  readonly>
            </div>
          </div>
          <!-- ENTRADA PARA LA MARCA-->
          <div class="form-group">
            
            <div class="input-group">
              
              <span class="input-group-addon"><i class="fa fa-key"></i></span>
              <input type="text" class="form-control input-lg" id="editarMarca"  name="editarMarca" placeholder="Ingresar la marca" readonly>
            </div>
          </div>
          <!-- ENTRADA PARA EL MODELO-->
          <div class="form-group">
            
            <div class="input-group">
              
              <span class="input-group-addon"><i class="fa fa-comment"></i></span>
              <input type="text" class="form-control input-lg" id="editarModelo" name="editarModelo" placeholder="Ingresar el modelo" readonly>
            </div>
          </div>
          <!-- ENTRADA PARA LA SERIE-->
          <div class="form-group">
            
            <div class="input-group">
              
              <span class="input-group-addon"><i class="fa fa-comment"></i></span>
              <input type="text" class="form-control input-lg" id="editarSerie" name="editarSerie" placeholder="Ingresar la serie" readonly>
            </div>
          </div>

          <h4>Meses</h4>
          <div class="row">
            <div class="col-md-3">

              <div class="form-group">
             
                    <label id="labelEnero">
                      <input type="checkbox" name="eneroEditar" id="eneroEditar">  Enero
                    </label>
                    <label id="labelFebrero">
                      <input type="checkbox" name="febreroEditar" id="febreroEditar">  Febrero
                    </label>
                    <label id="labelMarzo">
                      <input type="checkbox" name="marzoEditar" id="marzoEditar">  Marzo
                    </label>       
                  </div>
              </div>

              <div class="col-md-3">

             
                    <label id="labelAbril">
                      <input type="checkbox" name="abrilEditar" id="abrilEditar">  Abril
                    </label>
                    <label id="labelMayo">
                      <input type="checkbox" name="mayoEditar" id="mayoEditar">  Mayo  
                    </label>
                    <label id="labelJunio">
                      <input type="checkbox" name="junioEditar" id="junioEditar">  Junio
                    </label>

              </div>

              <div class="col-md-3">

                   <label id="labelJulio">
                      <input type="checkbox" name="julioEditar" id="julioEditar">  Julio
                    </label>
                    <label id="labelAgosto">
                      <input type="checkbox" name="agostoEditar" id="agostoEditar"> Agosto
                    </label>
                    <label id="labelSeptiembre">
                      <input type="checkbox" name="septiembreEditar" id="septiembreEditar">  Septiembre
                </label>     
              </div>

              <div class="col-md-3">
                    
                    <label id="labelOctubre">
                      <input type="checkbox" name="octubreEditar" id="octubreEditar">  Octubre
                    </label>
                    <label id="labelNoviembre">
                      <input type="checkbox" name="noviembreEditar" id="noviembreEditar">  Noviembre
                    </label>
                    <label id="labelDiciembre">
                      <input type="checkbox" name="diciembreEditar" id="diciembreEditar">  Diciembre
                    </label>
              </div>
          </div>

          <div class="form-group" style="display:none;">
                  
                  <div class="input-group">
                    
                    <span class="input-group-addon"><i class="fa fa-align-justify"></i></span>
                    <select class="form-control input-lg" name="editarPeriodo" id="editarPeriodo" required>
                      
                      <option value="">Año</option>
                      <option value="2019">2019</option>
                      <option value="2020">2020</option>
                      <option value="2021">2021</option>
                    </select>
                  </div>
                </div>


          <div class="form-group">
            
            <div class="input-group">
              
              <span class="input-group-addon"><i class="fa fa-heartbeat"></i></span>
              <input type="text" class="form-control input-lg" id="editarObservacion" name="editarObservacion" placeholder="Escriba la observación">
            </div>
          </div>
          
          
        </div>
      </div>
      <!--=====================================
      PIE DEL MODAL
      ======================================-->
      <div class="modal-footer">
        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>
        <button type="submit" class="btn btn-primary">Guardar cronograma</button>
      </div>
      <?php
      $editarCronograma = new ControladorCronograma();
      $editarCronograma -> ctrEditarCronograma();
      ?>
    </form>
  </div>
</div>
</div>


<div id="Observacionesreportes" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="post">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#3c8dbc; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Escribir Observación</h4>

        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">

          <div class="box-body">

            <!-- ENTRADA PARA EL EQUIPO -->

            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-heartbeat"></i></span> 

                <input type="text" class="form-control input-lg" id="nuevoObservacionReporte" name="nuevoObservacionReporte" placeholder="Escriba la observación del reporte" required>

                <input type="hidden" id="idReporteObservacion" name="idReporteObservacion">


              </div>

            </div>
   

          </div>

        </div>

        <!--=====================================
        PIE DEL MODAL
        ======================================-->

        <div class="modal-footer">

          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

          <button type="submit" class="btn btn-primary">Guardar Observación</button>

        </div>

         <?php
          $CrearObservacion2 = new ControladorCronograma();
          $CrearObservacion2 -> ctrCrearObservacionCronograma();

          ?>

      </form>

    </div>



  </div>
</div>

<!--=====================================
MODAL ASIGNAR CRONOGRAMAS POR PERIODO
======================================-->
<div id="modalAsignarCronogramasPeriodos" class="modal fade" role="dialog">

<div class="modal-dialog">
  <div class="modal-content">
    <form role="form" method="post">
      <!--=====================================
      CABEZA DEL MODAL
      ======================================-->
      <div class="modal-header" style="background:#3c8dbc; color:white">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Asignar cronogramas</h4>
      </div>
      <!--=====================================
      CUERPO DEL MODAL
      ======================================-->
      <div class="modal-body">
        <div class="box-body">
          <!-- ENTRADA PARA EL CLIENTE -->
          <div class="form-group" style="display:none;">
            <div class="input-group">
              
              <span class="input-group-addon"><i class="fa fa-users"></i></span>
              <select class="form-control input-lg" id="clienteCronogramaperiodo" name="clienteCronogramaperiodo">
                
                <?php
                
                $item = null;
                $valor = 1;
                $perfil = "vistados";
                $cliente = ControladorUsuarios::ctrMostrarUsuarios($item, $valor, $perfil);
                foreach ($cliente as $key => $value) {
                echo '<option  value="'.$value["id"].'">'.$value["nombre"].'</option>';
                }
                ?>
              </select>

            </div>
          </div>
          <!-- ENTRADA PARA EL CODIGO -->
          
          <div class="form-group">
            
            <div class="input-group">
              
              <span class="input-group-addon"><i class="fa fa-user"></i></span>
              <input type="text" class="form-control input-lg validarSerie2" name="periodoCodigo" id="periodoCodigo" placeholder="Ingresar el codigo"  readonly>
            </div>
          </div>
          <!-- ENTRADA PARA EL EQUIPO -->
          
          <div class="form-group">
            
            <div class="input-group">
              
              <span class="input-group-addon"><i class="fa fa-user"></i></span>
              <input type="text" class="form-control input-lg" name="periodoEquipo" id="periodoEquipo" placeholder="Ingresar el equipo"  readonly>
            </div>
          </div>
          <!-- ENTRADA PARA LA MARCA-->
          <div class="form-group">
            
            <div class="input-group">
              
              <span class="input-group-addon"><i class="fa fa-key"></i></span>
              <input type="text" class="form-control input-lg" id="periodoMarca"  name="periodoMarca" placeholder="Ingresar la marca" readonly>
            </div>
          </div>
          <!-- ENTRADA PARA EL MODELO-->
          <div class="form-group">
            
            <div class="input-group">
              
              <span class="input-group-addon"><i class="fa fa-comment"></i></span>
              <input type="text" class="form-control input-lg" id="periodoModelo" name="periodoModelo" placeholder="Ingresar el modelo" readonly>
            </div>
          </div>
          <!-- ENTRADA PARA LA SERIE-->
          <div class="form-group">
            
            <div class="input-group">
              
              <span class="input-group-addon"><i class="fa fa-comment"></i></span>
              <input type="text" class="form-control input-lg" id="periodoSerie" name="periodoSerie" placeholder="Ingresar la serie" readonly>
            </div>
          </div>

          <h4>Meses</h4>
          <div class="row">
            <div class="col-md-3">

              <div class="form-group">
             
                    <label id="labelEnero">
                      <input type="checkbox" name="enero" value="enero">  Enero
                    </label>
                    <label id="labelFebrero">
                      <input type="checkbox" name="febrero" value="febrero">  Febrero
                    </label>
                    <label id="labelMarzo">
                      <input type="checkbox" name="marzo" value="marzo">  Marzo
                    </label>       
                  </div>
              </div>

              <div class="col-md-3">

             
                    <label id="labelAbril">
                      <input type="checkbox" name="abril" value="abril">  Abril
                    </label>
                    <label id="labelMayo">
                      <input type="checkbox" name="mayo" value="mayo">  Mayo  
                    </label>
                    <label id="labelJunio">
                      <input type="checkbox" name="junio" value="junio">  Junio
                    </label>

              </div>

              <div class="col-md-3">

                   <label id="labelJulio">
                      <input type="checkbox" name="julio" value="julio">  Julio
                    </label>
                    <label id="labelAgosto">
                      <input type="checkbox" name="agosto" value="agosto"> Agosto
                    </label>
                    <label id="labelSeptiembre">
                      <input type="checkbox" name="septiembre" value="septiembre">  Septiembre
                </label>     
              </div>

              <div class="col-md-3">
                    
                    <label id="labelOctubre">
                      <input type="checkbox" name="octubre" value="octubre">  Octubre
                    </label>
                    <label id="labelNoviembre">
                      <input type="checkbox" name="noviembre" value="noviembre">  Noviembre
                    </label>
                    <label id="labelDiciembre">
                      <input type="checkbox" name="diciembre" value="diciembre">  Diciembre
                    </label>
              </div>
          </div>

          <div class="form-group">
                  
                  <div class="input-group">
                    
                    <span class="input-group-addon"><i class="fa fa-align-justify"></i></span>
                    <select class="form-control input-lg asignarPeriodoAno" name="periodoPeriodo" required>
                      
                      <option value="">Año</option>
                      <option value="2019">2019</option>
                      <option value="2020">2020</option>
                      <option value="2021">2021</option>
                    </select>
                  </div>
                </div>


          <div class="form-group">
            
            <div class="input-group">
              
              <span class="input-group-addon"><i class="fa fa-heartbeat"></i></span>
              <input type="text" class="form-control input-lg" name="periodoObservacion" placeholder="Escriba la observación">
            </div>
          </div>
          
     
          
        </div>
      </div>
      <!--=====================================
      PIE DEL MODAL
      ======================================-->
      <div class="modal-footer">
        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>
        <button type="submit" class="btn btn-primary agregarDisabled">Guardar cronograma</button>
      </div>
      <?php
      $crearCronogramaPeriodo = new ControladorCronograma();
      $crearCronogramaPeriodo -> ctrCrearCronogramaAsignado();
      ?>
    </form>
  </div>
</div>
</div>

