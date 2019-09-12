<div class="content-wrapper">
  <section class="content-header">
      
    <h1>   
       
    Equipos  
           
    </h1> 
    <ol class="breadcrumb">
       
      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
      
      <li class="active">Equipos</li>
       
    </ol>
  </section>
  <section class="content">
    <div class="box">      
      <div class="box-header with-border">
          
    <?php

          if($_SESSION["perfil"] == "Administrador" || $_SESSION["perfil"] == "Ingeniero"){

            echo '
                <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarEquipo">
          
                  Agregar Equipo

                </button>
            ';

          }

        ?>

       
        <a href="vistas/modulos/descargar-reporte.php?equipos=equipos"><button class="btn btn-success pull-right" style="margin-top:5px">Descargar reporte en Excel</button></a>

      </div>

      <?php

      $eliminarEquipo = new controladorEquipos();
      $eliminarEquipo -> ctrEliminarEquipo();

      ?>
      <div class="box-body">

        <!-- <div class="row" style="margin-top: 10px;">
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
      </div> -->
<?php
   if($_SESSION["perfil"] == "Administrador" || $_SESSION["perfil"] == "Ingeniero"){
       
   
 ?>   
        
        <table class="table table-bordered table-striped dt-responsive tablas">
          
          <thead>       
            <tr>        
              <th style="width:10px">#</th>
              <th>Cliente</th>
              <th>Codigo</th>
              <th>Equipo</th>
              <th>Marca</th>
              <th>Modelo</th>
              <th>Serie</th>
              <!--<th>Instrumentos Utilizados</th>
              <th>Trabajos Realizados</th>-->
              <th>Mediciones</th>
              <th>Editar Instrumentos y Trabajo</th>
              <th>Estado</th>
              <th>Observaciones</th>
              <th>Acciones</th>    
            

            </tr>
          </thead> 
          <tbody>

        <?php

          $item = null;
          $valor = null;
          $orden = "id_equipo";
          $select =null;

          $equipos = controladorEquipos::ctrMostrarEquipos($item, $valor, $orden,$select);

          foreach ($equipos as $key => $value) {

            echo '<tr>';

              $item = "id";
              $valor = $value["id_usuario"];
              $perfil = null;

              $usuarios = ControladorUsuarios::ctrMostrarUsuarios( $item, $valor, $perfil );
              echo '
              <td>'.($key+1).'</td>
              <td>'.$usuarios["nombre"].'</td>
              <td>'.$value["codigo"].'</td>
              <td>'.$value["equipo"].'</td>
              <td>'.$value["marcaText"].'</td>
              <td>'.$value["modelo"].'</td>
              <td>'.$value["serie"].'</td>
              <td><button class="btn btn-warning mostrarMediciones" data-toggle="modal" idEquipoMediciones="'.$value["id_equipo"].'" data-target="#modalMostrarMediciones">Mostrar</button></td>';
              
              if($_SESSION["perfil"] == "Administrador" || $_SESSION["perfil"] == "Ingeniero"){
                   echo '
              <td><button class="btn btn-info btnEditarTrabajosInstrumentos" data-toggle="modal" idEquipoTr="'.$value["id_equipo"].'" data-target="#modalEditarEquiTrabajo"><i class="fa fa-pencil-square-o"></i> Editar</button></td>';

              if($value["baja"] != 0)
                  { 

                    echo '<div class="btn-group" role="group" aria-label="Basic example">
                    <td><button class="btn btn-success btn-xs btnDadoBaja" id="mostrar" idEquipo="'.$value["id_equipo"].'" estadoUsuario="0">Activado</button></td>
                    </div>';

                  }
                  else
                  {
                   echo '<td><button class="btn btn-danger btn-xs btnDadoBaja" id="ocultar" idEquipo="'.$value["id_equipo"].'" estadoUsuario="1">Dado de baja</button></td>';
                  }

              if ($value["observaciones"] != "") 
              {
                echo '<td>'.$value["observaciones"].'</td>';
              }
              else
              {
                echo '<td><button class="btn btn-primary btn-xs btnObservacion" data-toggle="modal" data-target="#Observaciones" idEquipoObservacion="'.$value["id_equipo"].'" >Observación</button></td>';
              }

              // $item = null;
              //  $valor = $this->instrumentos;
      //  $orden = "id_instrumentos";

              echo '


              <td>
                <div class="btn-group">
                  <button class="btn btn-warning btnEditarEquipo" data-toggle="modal" data-target="#modalEditarEquipo" idEquipoE="'.$value["id_equipo"].'"><i class="fa fa-pencil"></i></button>
                  <button class="btn btn-danger btnEliminarEquipo" idEquipo="'.$value["id_equipo"].'"><i class="fa fa-times"></i></button>
                </div>
              </td>';
              }
              echo'
             
            </tr>';

          }
          ?>

          </tbody>
        </table>
        
        <?php
   }else{
       ?>
       
       <table class="table table-bordered table-striped dt-responsive tablas">
          
          <thead>       
            <tr>        
              <th style="width:10px">#</th>
              <th>Cliente</th>
              <th>Codigo</th>
              <th>Equipo</th>
              <th>Marca</th>
              <th>Modelo</th>
              <th>Serie</th>
              <!--<th>Mediciones</th>-->
            </tr>
          </thead> 
          <tbody>

        <?php

          $item = null;
          $valor = $_SESSION["id"];
          $orden = null;
          $select ="id_usuario";

          $equipos = controladorEquipos::ctrMostrarEquipos($item, $valor, $orden,$select);

          foreach ($equipos as $key => $value) {

            echo '<tr>';

              $item = "id";
              $valor = $value["id_usuario"];
              $perfil = null;

              $usuarios = ControladorUsuarios::ctrMostrarUsuarios( $item, $valor, $perfil );
              echo '
              <td>'.($key+1).'</td>
              <td>'.$usuarios["nombre"].'</td>
              <td>'.$value["codigo"].'</td>
              <td>'.$value["equipo"].'</td>
              <td>'.$value["marcaText"].'</td>
              <td>'.$value["modelo"].'</td>
              <td>'.$value["serie"].'</td>';


              echo'
             
            </tr>';

          }
          ?>

          </tbody>
        </table>
       
       <?php
   }
        
        ?>
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
      </div>

    </div>
  </section>
</div>





<!--=====================================
MODAL AGREGAR EQUIPO
======================================-->

<div id="modalAgregarEquipo" class="modal fade" role="dialog">
   
  <div class="modal-dialog modal-lg">

    <div class="modal-content">

      <form role="form" method="post">
 
        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#3c8dbc; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Agregar equipo</h4>

        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">

          <div class="box-body">

             <!-- ENTRADA PARA LA CLINICA --> 
                
          <div class="form-group">

            <div class="input-group">

              <span class="input-group-addon"><i class="fa fa-users"></i></span>
              <select class="form-control input-lg select2" style="width: 100%;" name="nuevoUsuario" required>

                <?php
                   $item = null;
                   $valor = "cliente";
                   $perfil = "perfil";

                   $cliente = ControladorUsuarios::ctrMostrarUsuarios($item, $valor, $perfil);
                   echo '<option value="">Escoje el cliente</option>';
                   foreach ($cliente as $key => $value1) {
                     echo '<option value="'.$value1["id"].'">'.$value1["nombre"].'</option>';
                   }
                
                
                ?>

              </select>

            </div> 

          </div>

          <!-- ENTRADA PARA EL ESTADO -->
            
      

          <input type="hidden" class="form-control input-lg" name="nuevoEstado" value="1" placeholder="Ingresar nombre del equipo" required>

          <!-- ENTRADA PARA EL CODIGO -->

            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-heartbeat"></i></span> 

                <input type="text" class="form-control input-lg" name="nuevoCodigo" id="codigoEstado" placeholder="Ingresar el codigo del equipo" required>

              </div>

            </div>

             

            <!-- ENTRADA PARA EL EQUIPO -->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-heartbeat"></i></span> 

                <input type="text" class="form-control input-lg" name="nuevoEquipo" placeholder="Ingresar nombre del equipo" required>

              </div>

            </div>


             <!-- ENTRADA PARA LA MARCA ORIGINAL -->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-align-justify"></i></span> 

                <input type="text" class="form-control input-lg" name="nuevoMarcaText" placeholder="Ingresar la marca del equipo" required>

              </div>

            </div>

            <!-- ENTRADA PARA EL MODELO-->

             <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-align-justify"></i></span> 

                <input type="text" class="form-control input-lg" name="nuevoModelo" placeholder="Ingresar el modelo del equipo">

              </div>

            </div>

                <!-- ENTRADA PARA LA SERIE-->

             <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-align-justify"></i></span> 

                <input type="text" class="form-control input-lg" name="nuevoSerie" id="nuevoSerieE" placeholder="Ingresar la Serie del equipo">

              </div>

            </div>

            <!-- <div class="form-group">
              <div class="row">
                <div class="col-md-6 text-center">
                  <button type="button" class="btn btn-secondary btnAddInstrumentos">Agregar Instrumentos</button>
                </div>
                <div class="col-md-6 text-center">
                  <button type="button" class="btn btn-secondary">Secondary</button>
                </div>
              </div> 
            </div>


            <div class="form-group row nuevoInstrumento">
                
                <div class="opcion">
                  
                </div>

            </div> -->

            <div class="form-group">

              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-wrench"></i></span>
                <select class="form-control select2" id="instrumentos" name="nuevoInstrumentoE[]" multiple="multiple" data-placeholder="Instrumentos utilizados" style="width: 100%;">

                <?php

                   $item5 = null;
                   $valor5 = null;
                   $orden5 = "id_instrumentos";

                   $instrumentos = controladorInstrumentos::ctrMostrarInstrumentos($item5, $valor5, $orden5);

                   foreach ($instrumentos as $key => $value5) {
                     echo '<option value="'.$value5["nombre"].'">'.$value5["nombre"].'</option>';

                   }

                
                ?>

               
                </select>

              </div>


              </div>


          <div class="form-group"> 
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-wrench"></i></span>
                <select class="form-control select2" name="nuevoTrabajosE[]" multiple="multiple" data-placeholder="Trabajos Realizados"
                        style="width: 100%;">

                  <?php

                   $item = null;
                   $valor = null;
                   $orden = "id_trabajo";

                   $trabajos = controladorTrabajos::ctrMostrarTrabajos($item, $valor, $orden);

                   foreach ($trabajos as $key => $value) {
                     echo '<option value="'.$value["nombre"].'">'.$value["nombre"].'</option>';
                   }
                
                ?>

  
                </select>

                </div>


              </div>


              <!--Mediciones -->

              <div class="form-group">

                <div class="input-group">

                  <span class="input-group-addon"><i class="fa fa-crop"></i></span>

                  <select name="nuevoMedicion" class="form-control">

                    <option value="">Mediciones</option>
                    <option value="Autoclave">Autoclave</option>
                    <option value="Audiómetro">Audiómetro</option>
                    <option value="Bascula pesa personas / bascula pesa bebes / gramera">Bascula pesa personas / bascula pesa bebes / gramera</option>
                    <option value="Bomba de Infusion">Bomba de Infusion</option>
                    <option value="Centrifuga / Agitador de Mazzini / Agitador de tubos/Vortex">Centrifuga / Agitador de Mazzini / Agitador de tubos/Vortex</option>
                    <option value="Cabina de Audiometría">Cabina de Audiometría</option>
                    <option value="Concentrador de oxigeno">Concentrador de oxigeno</option>
                    <option value="Desfibrilador">Desfibrilador</option>
                    <option value="Doppler Fetal / Monitor Fetal">Doppler Fetal / Monitor Fetal</option>
                    <option value="Electrocardiografo / Holter / Prueba de Esfuerzo">Electrocardiografo / Holter / Prueba de Esfuerzo</option>
                    <option value="Espirometro">Espirometro</option>
                    <option value="Flujometro">Flujometro</option>
                    <option value="Incubadora neonatal / Servocuna / Sistema de normotermia / Incubadora de muestras / Baño serologico / Termometro de nevera / Termometro de punzón">Incubadora neonatal / Servocuna / Sistema de normotermia / Incubadora de muestras / Baño serologico / Termometro de nevera / Termometro de punzón</option>
                    <option value="Lampara de Fotocurado">Lampara de Fotocurado</option>
                    <option value="Monitor Multiparametros">Monitor Multiparametros</option>
                    <option value="Monitor NIBP">Monitor NIBP</option>
                    <option value="Pipeta">Pipeta</option>
                    <option value="Pulsioximetro">Pulsioximetro</option>
                    <option value="Succionador / Vacuometro">Succionador / Vacuometro</option>
                    <option value="Tensiometro Analogo">Tensiometro Analogo</option>
                    <option value="Tensiometro Digital">Tensiometro Digital</option>
                    <option value="Termohigrometros">Termohigrometros</option>
                    <option value="Ventilador">Ventilador</option>
                    <!-- <option value="Tensiometro Analogo">Tensiometro Analogo</option>
                    <option value="Tensiometro Digital">Tensiometro Digital</option>
                    <option value="Succionador / Vacuometro">Succionador / Vacuometro</option>
                    <option value="Monitor Multiparametros">Monitor Multiparametros</option>
                    <option value="Lampara de Fotocurado">Lampara de Fotocurado</option>
                    <option value="Autoclave">Autoclave</option>
                    <option value="Bomba de Infusion">Bomba de Infusion</option>
                    <option value="Centrifuga / Agitador de Mazzini / Agitador de tubos/Vortex">Centrifuga / Agitador de Mazzini / Agitador de tubos/Vortex</option>
                    <option value="Audiómetro">Audiómetro</option>
                    <option value="Bascula pesa personas / bascula pesa bebes / gramera">Bascula pesa personas / bascula pesa bebes / gramera</option>
                    <option value="Cabina de Audiometría">Cabina de Audiometría</option>
                    <option value="Concentrador de oxigeno">Concentrador de oxigeno</option>
                    <option value="Desfibrilador">Desfibrilador</option>
                    <option value="Doppler Fetal / Monitor Fetal">Doppler Fetal / Monitor Fetal</option>
                    <option value="Electrocardiografo / Holter / Prueba de Esfuerzo">Electrocardiografo / Holter / Prueba de Esfuerzo</option>
                    <option value="Espirometro">Espirometro</option>
                    <option value="Flujometro">Flujometro</option>
                    <option value="Tensiometro Digital">Tensiometro Digital</option>
                    <option value="Incubadora neonatal / Servocuna / Sistema de normotermia / Incubadora de muestras / Baño serologico / Termometro de nevera / Termometro de punzón">Incubadora neonatal / Servocuna / Sistema de normotermia / Incubadora de muestras / Baño serologico / Termometro de nevera / Termometro de punzón</option>
                    <option value="Monitor NIBP">Monitor NIBP</option>
                    <option value="Pipeta">Pipeta</option>
                    <option value="Pulsioximetro">Pulsioximetro</option>
                    <option value="Ventilador">Ventilador</option>
                    <option value="Termohigrometros">Termohigrometros</option> -->

                  </select>

                  </div>

                </div>



          </div>

        </div>

        <!--=====================================
        PIE DEL MODAL
        ======================================-->

        <div class="modal-footer">

          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

          <button type="submit" class="btn btn-primary">Guardar Equipo</button>

        </div>

         <?php
          $crearEquipo = new controladorEquipos();
          $crearEquipo -> ctrCrearEquipo();

          ?>

      </form>

    </div>

  </div>

</div>


<!--=====================================
MODAL EDITAR EQUIPO
======================================-->

<div id="modalEditarEquipo" class="modal fade" role="dialog">
  
  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="post">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#3c8dbc; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Editar equipo</h4>

        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">

          <div class="box-body">

            <!-- ENTRADA PARA EL EQUIPO -->

             <div class="form-group">

            <div class="input-group"> 

              <span class="input-group-addon"><i class="fa fa-users"></i></span>
              <select class="form-control input-lg" style="width: 100%;" id="editarUsuario" name="editarUsuario" required>
         

                <?php
                   $item = null; 
                   $valor = "cliente";
                   $perfil = "perfil";

                   $cliente = ControladorUsuarios::ctrMostrarUsuarios($item, $valor, $perfil);
                   
                   foreach ($cliente as $key => $value) {
                     echo '<option value="'.$value["id"].'">'.$value["nombre"].'</option>';
                   }
                
                
                ?>

              </select>

            </div>

          </div>

          <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-heartbeat"></i></span> 

                <input type="text" class="form-control input-lg codigoEstadoEditar" name="editarCodigo" id="editarCodigo" placeholder="Ingresar el codigo del equipo" required>

              </div>

            </div>
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-heartbeat"></i></span> 

                <input type="text" class="form-control input-lg" id="editarEquipo" name="editarEquipo" placeholder="Ingresar nombre del equipo" required>
                <input type="hidden" id="idEquipo" name="idEquipo">

              </div>

            </div>

             <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-align-justify"></i></span> 

                <input type="text" class="form-control input-lg" id="editarMarcaText" name="editarMarcaText" placeholder="ingrsar la marca del equipo">

              </div>

            </div>



            <!-- ENTRADA PARA EL MODELO-->

             <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-align-justify"></i></span> 

                <input type="text" class="form-control input-lg" id="editarModelo" name="editarModelo" placeholder="Ingresar el modelo del equipo">

              </div>

            </div>

           <!-- ENTRADA PARA LA SERIE-->

             <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-align-justify"></i></span> 

                <input type="text" class="form-control input-lg" id="editarSerie" name="editarSerie" placeholder="Ingresar la Serie del equipo" readonly>

              </div>

            </div>

            <!--Mediciones -->

              <div class="form-group">

                <div class="input-group">

                  <span class="input-group-addon"><i class="fa fa-crop"></i></span>

                  <select name="editarMedicion" id="editarMedicion" class="form-control">

                    <option value="">Mediciones</option>
                    <option value="Autoclave">Autoclave</option>
                    <option value="Audiómetro">Audiómetro</option>
                    <option value="Bascula pesa personas / bascula pesa bebes / gramera">Bascula pesa personas / bascula pesa bebes / gramera</option>
                    <option value="Bomba de Infusion">Bomba de Infusion</option>
                    <option value="Centrifuga / Agitador de Mazzini / Agitador de tubos/Vortex">Centrifuga / Agitador de Mazzini / Agitador de tubos/Vortex</option>
                    <option value="Cabina de Audiometría">Cabina de Audiometría</option>
                    <option value="Concentrador de oxigeno">Concentrador de oxigeno</option>
                    <option value="Desfibrilador">Desfibrilador</option>
                    <option value="Doppler Fetal / Monitor Fetal">Doppler Fetal / Monitor Fetal</option>
                    <option value="Electrocardiografo / Holter / Prueba de Esfuerzo">Electrocardiografo / Holter / Prueba de Esfuerzo</option>
                    <option value="Espirometro">Espirometro</option>
                    <option value="Flujometro">Flujometro</option>
                    <option value="Incubadora neonatal / Servocuna / Sistema de normotermia / Incubadora de muestras / Baño serologico / Termometro de nevera / Termometro de punzón">Incubadora neonatal / Servocuna / Sistema de normotermia / Incubadora de muestras / Baño serologico / Termometro de nevera / Termometro de punzón</option>
                    <option value="Lampara de Fotocurado">Lampara de Fotocurado</option>
                    <option value="Monitor Multiparametros">Monitor Multiparametros</option>
                    <option value="Monitor NIBP">Monitor NIBP</option>
                    <option value="Pipeta">Pipeta</option>
                    <option value="Pulsioximetro">Pulsioximetro</option>
                    <option value="Succionador / Vacuometro">Succionador / Vacuometro</option>
                    <option value="Tensiometro Analogo">Tensiometro Analogo</option>
                    <option value="Tensiometro Digital">Tensiometro Digital</option>
                    <option value="Termohigrometros">Termohigrometros</option>
                    <option value="Ventilador">Ventilador</option>
                    <!-- <option value="">Mediciones</option>
                    <option value="Tensiometro Analogo">Tensiometro Analogo</option>
                    <option value="Tensiometro Digital">Tensiometro Digital</option>
                    <option value="Succionador / Vacuometro">Succionador / Vacuometro</option>
                    <option value="Monitor Multiparametros">Monitor Multiparametros</option>
                    <option value="Lampara de Fotocurado">Lampara de Fotocurado</option>
                    <option value="Autoclave">Autoclave</option>
                    <option value="Bomba de Infusion">Bomba de Infusion</option>
                    <option value="Centrifuga / Agitador de Mazzini / Agitador de tubos/Vortex">Centrifuga / Agitador de Mazzini / Agitador de tubos/Vortex</option>
                    <option value="Audiómetro">Audiómetro</option>
                    <option value="Bascula pesa personas / bascula pesa bebes / gramera">Bascula pesa personas / bascula pesa bebes / gramera</option>
                    <option value="Cabina de Audiometría">Cabina de Audiometría</option>
                    <option value="Concentrador de oxigeno">Concentrador de oxigeno</option>
                    <option value="Desfibrilador">Desfibrilador</option>
                    <option value="Doppler Fetal / Monitor Fetal">Doppler Fetal / Monitor Fetal</option>
                    <option value="Electrocardiografo / Holter / Prueba de Esfuerzo">Electrocardiografo / Holter / Prueba de Esfuerzo</option>
                    <option value="Espirometro">Espirometro</option>
                    <option value="Flujometro">Flujometro</option>
                    <option value="Tensiometro Digital">Tensiometro Digital</option>
                    <option value="Incubadora neonatal / Servocuna / Sistema de normotermia / Incubadora de muestras / Baño serologico / Termometro de nevera / Termometro de punzón">Incubadora neonatal / Servocuna / Sistema de normotermia / Incubadora de muestras / Baño serologico / Termometro de nevera / Termometro de punzón</option>
                    <option value="Monitor NIBP">Monitor NIBP</option>
                    <option value="Pipeta">Pipeta</option>
                    <option value="Pulsioximetro">Pulsioximetro</option>
                    <option value="Ventilador">Ventilador</option> -->
                  </select>

                  </div>

                </div>
          

             <!-- ENTRADA PARA LA OBSERVACION -->

            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-heartbeat"></i></span> 

                <input type="text" class="form-control input-lg" id="editarObservacion" name="editarObservacion" placeholder="Editar o agregar una nueva observación">

              </div>

            </div>


          </div>

        </div>

        <!--=====================================
        PIE DEL MODAL
        ======================================-->

        <div class="modal-footer">

          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

          <button type="submit" class="btn btn-primary">Editar Equipo</button>

        </div>

         <?php
          $editarEquipo = new controladorEquipos();
          $editarEquipo -> ctrEditarEquipo();

          ?>

      </form>

    </div>

  </div>

</div>

<!-- Modal para la observacion -->

<div id="Observaciones" class="modal fade" role="dialog">
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

                <input type="text" class="form-control input-lg" id="nuevoObservacion" name="nuevoObservacion" placeholder="Escriba la observación del equipo" required>

                <input type="hidden" id="idEquipoObservacion" name="idEquipoObservacion">


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
          $CrearObservacion = new controladorEquipos();
          $CrearObservacion -> ctrCrearObservacion();

          ?>

      </form>

    </div>



  </div>
</div>

<!-- Modal Editar Instrumentos y Trabajos -->

<!-- Modal para la observacion -->

<div id="modalEditarEquiTrabajo" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">

    <div class="modal-content">

      <form role="form" method="post">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#3c8dbc; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Editar instrumentos y Trabajos Realizados</h4>

        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">

          <div class="box-body">

           

            <p class="condicion">Instrumentos Escogidos Anterior Mente:<br> <label id="instrumentosMostrar" style="font-size: 14px;"></label></p>
            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-wrench"></i></span>
                <select class="form-control select2" name="editarInstrumentoE[]" multiple="multiple" data-placeholder="Instrumentos utilizados" id="editarInstrumentoE" style="width: 100%;">

                  <?php

                   $item5 = null;
                   $valor5 = null;
                   $orden5 = "id_instrumentos";

                   $instrumentos = controladorInstrumentos::ctrMostrarInstrumentos($item5, $valor5, $orden5);

                   foreach ($instrumentos as $key => $value5) {
                     echo '<option value="'.$value5["nombre"].'">'.$value5["nombre"].'</option>';

                   }

                
                ?>

               
                </select>

              </div>


              </div>
              <p class="condicion">Trabajos Escogidos Anterior Mente:<br> <label id="trabajosMostrar" style="font-size: 14px;"></label></p>
              <div class="form-group"> 
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-wrench"></i></span>
                <select class="form-control select2" name="editarTrabajosE[]" id="editarTrabajosE" multiple="multiple" data-placeholder="Trabajos Realizados"
                        style="width: 100%;">

                  <?php

                   $item = null;
                   $valor = null;
                   $orden = "id_trabajo";

                   $trabajos = controladorTrabajos::ctrMostrarTrabajos($item, $valor, $orden);

                   foreach ($trabajos as $key => $value) {
                     echo '<option value="'.$value["nombre"].'">'.$value["nombre"].'</option>';
                   }
                
                ?>

  
                </select>

                </div>


              </div>

                <input type="hidden" id="EquipoInstrTra" name="EquipoInstrTra">

          </div>

        </div>

        <!--=====================================
        PIE DEL MODAL
        ======================================-->

        <div class="modal-footer">

          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

          <button type="submit" class="btn btn-primary">Editar</button>

        </div>

         <?php
         
          $EditarTrabajoInstrumentos = new controladorEquipos();
          $EditarTrabajoInstrumentos -> ctrAgregarTrabajoInstrumentos();

          ?>

      </form>

    </div>

  </div>
</div>


  <div class="modal fade" id="modalMostrarMediciones">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header" style="background:#3c8dbc; color:white">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Mediciones</h4>
              </div>
              <div class="modal-body">
                <p><label id="medicionesMostrar" style="font-size: 16px;"></label></p>
              </div>
              <div class="modal-footer">
              
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->
