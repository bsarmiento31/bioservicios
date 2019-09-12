

<div class="content-wrapper">

  <section class="content-header"> 
    
    <h1>
       
      Administrar Calibración 
     
    </h1> 

    <ol class="breadcrumb">
      
      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
      
      <li class="active">Administrar Calibración</li>
    
    </ol>

  </section>

  <section class="content">

    <div class="box">

      <?php
        if ($_SESSION["perfil"] =="Administrador" || $_SESSION["perfil"] =="Ingeniero") {
      ?>

      <div class="box-header with-border">
  
      <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarCalibracion">
          
          Agregar Calibración

        </button>

      </div>

      <?php
        }
      ?>

      <div class="box-body">

        <?php

          if ($_SESSION["perfil"] =="Administrador" || $_SESSION["perfil"] =="Ingeniero") {

        ?>
        
       <table class="table table-bordered table-striped dt-responsive tablas">
         
        <thead>
         
         <tr>
           
           <th style="width:10px">#</th>
           <th>Cliente</th>
           <th>Equipo</th>
           <th>Marca</th>
           <th>Modelo</th>
           <th>Codigo</th>
           <th>Serie</th>
           <th>Archivo</th>
           <th>Fecha de carga</th>
           <th>Acciones</th>
         
          

         </tr> 

        </thead>

        <tbody>
        <?php

        $item = null;
        $valor = null;
        $perfil =null;

        $calibracion = ControladorCalibracion::ctrMostrarCalibraciones($item, $valor,$perfil);


        foreach ($calibracion as $key => $value){

          echo '
            <tr>
            <td>'.($key+1).'</td>';

            $item = "id";
            $valor = $value["cliente"]; 
            $perfil = null;

            $usuarios = ControladorUsuarios::ctrMostrarUsuarios($item, $valor, $perfil);
            echo'
            <td>'.$usuarios["nombre"].'</td>
            <td>'.$value["equipo"].'</td>
            <td>'.$value["marca"].'</td>
            <td>'.$value["serie"].'</td>
            <td>'.$value["codigo"].'</td>
            <td>'.$value["modelo"].'</td>
            <td><a href="http://ingbioservicios.com.co/app/'.$value["archivo"].'" target="_blank">'.substr($value["archivo"],26).'</a></td>
            <td>'.$value["fechacarga"].'</td>';

              echo '<td>
                <div class="btn-group">
                  
                  <button class="btn btn-warning btnEditarCalibracion" idCalibracion="'.$value["id"].'" data-toggle="modal" data-target="#modalEditarCalibracion"><i class="fa fa-pencil"></i></button>
                  <button class="btn btn-danger btnEliminarCalibracion" idCalibracion="'.$value["cliente"].'" fotoUsuario="'.$value["archivo"].'"><i class="fa fa-times"></i></button>
                </div>
              </td>';

           
              echo'

            </tr>

          ';

        }



        ?>

          
            

        </tbody>

       </table>

       <?php
      }else if ($_SESSION["perfil"] == "cliente") {

       ?>

         <table class="table table-bordered table-striped dt-responsive tablas">
         
        <thead>
         
         <tr>
           
           <th style="width:10px">#</th>
           <th>Cliente</th>
           <th>Equipo</th>
           <th>Marca</th>
           <th>Modelo</th>
           <th>Codigo</th>
           <th>Serie</th>
           <th>Archivo</th>
           <th>Fecha de carga</th> 

         </tr> 

        </thead>

        <tbody>
        <?php

        $item = null;
        $valor = $_SESSION["id"];;
        $perfil = "cliente";

        $calibracion = ControladorCalibracion::ctrMostrarCalibraciones($item, $valor,$perfil);


        foreach ($calibracion as $key => $value){

          echo '
            <tr>
            <td>'.($key+1).'</td>';

            $item = "id";
            $valor = $value["cliente"]; 
            $perfil = null;

            $usuarios = ControladorUsuarios::ctrMostrarUsuarios($item, $valor, $perfil);
            echo'
            <td>'.$usuarios["nombre"].'</td>
            <td>'.$value["equipo"].'</td>
            <td>'.$value["marca"].'</td>
            <td>'.$value["serie"].'</td>
            <td>'.$value["codigo"].'</td>
            <td>'.$value["modelo"].'</td>
            <td><a href="http://ingbioservicios.com.co/app/'.$value["archivo"].'" target="_blank">'.substr($value["archivo"],26).'</a></td>
            <td>'.$value["fechacarga"].'</td>

            </tr>

          ';

        }



        ?>

          
            

        </tbody>

       </table>

       <?php
}
       ?>

      </div>

    </div>

  </section>

</div>



<!--=====================================
MODAL AGREGAR CALIBRACION
======================================-->

<div id="modalAgregarCalibracion" class="modal fade"  role="dialog">
  
  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="post" enctype="multipart/form-data">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#3c8dbc; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Agregar Calibración</h4>

        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">

          <div class="box-body">

              <!-- /.col-lg-6 -->
                
                    <div class="form-group">
                      <div class="input-group">
                        
                        <span class="input-group-addon"><i class="fa fa fa-user"></i></span>
                        <select class="form-control input-lg select2" style="width: 100%;" name="nuevoCliente" id="nuevoClienteM">
                         
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
              <span class="input-group-addon"><i class="fa fa-align-justify"></i></span>
              <select class="form-control input-lg select2" id="nuevoCodigoM" style="width: 100%;" name="nuevoCodigoM" required>
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

                    
              
            <div class="form-group">
                <label>Fecha de carga:</label> 
                    <div class="input-group date">
                      <div class="input-group-addon">
                          <i class="fa fa-calendar"></i>
                      </div>
                <input type="date" value="<?php echo date("Y-m-d");?>" class="form-control pull-right" name="fechaServicio" readonly>
                    </div>
                      
            </div>
                

            <!-- ENTRADA PARA EL ARCHIVO-->

             <div class="form-group">
              
              <div class="panel">SUBIR ARCHIVO</div>

              <input type="file" class="nuevoArchivo" name="nuevoArchivo">

              <p class="help-block">Peso máximo del archivo 10MB</p>

<!--               <img src="vistas/img/usuarios/default/anonymous.png" class="img-thumbnail previsualizar" width="100px">
 --> 
            </div>
          

          </div>

        </div>

        <!--=====================================
        PIE DEL MODAL
        ======================================-->

        <div class="modal-footer">

          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

          <button type="submit" class="btn btn-primary">Guardar Calibración</button>

        </div>

         <?php
          $crearCalibracion = new ControladorCalibracion();
          $crearCalibracion -> ctrIngresoCalibracion();
          ?>

      </form>

    </div>

  </div>

</div>




<!--=====================================
MODAL AGREGAR CALIBRACION
======================================-->

<div id="modalEditarCalibracion" class="modal fade"  role="dialog">
  
  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="post" enctype="multipart/form-data">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#3c8dbc; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Editar Calibración</h4>

        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">

          <div class="box-body">

              <!-- /.col-lg-6 -->
 
                    <div class="form-group">
                      <div class="input-group">
                        
                        <span class="input-group-addon"><i class="fa fa fa-user"></i></span>
                        <select class="form-control input-lg" name="editarCliente" id="editarCliente">
                         
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
                <label>Fecha de carga:</label> 
                    <div class="input-group date">
                      <div class="input-group-addon">
                          <i class="fa fa-calendar"></i>
                      </div>
                <input type="date" value="<?php echo date("Y-m-d");?>" class="form-control pull-right" id="editarServicio"  name="editarServicio" readonly>
                    </div>
                      
            </div>
                

            <!-- ENTRADA PARA EL ARCHIVO-->

             <div class="form-group">
              
              <div class="panel">SUBIR ARCHIVO</div>

              <input type="file" class="nuevoArchivo" name="editarArchivo">

              <p class="help-block">Peso máximo del archivo 64MB</p>

<!--               <img src="vistas/img/usuarios/default/anonymous.png" class="img-thumbnail previsualizarEditar" width="100px">
 -->
              <input type="hidden" name="archivoActual" id="archivoActual">
 
            </div>
          

          </div>

        </div>

        <!--=====================================
        PIE DEL MODAL
        ======================================-->

        <div class="modal-footer">

          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

          <button type="submit" class="btn btn-primary">Guardar Calibración</button>

        </div>

         <?php
          $editarCalibracion = new ControladorCalibracion();
          $editarCalibracion -> ctrEditarCalibracion();
          ?>

      </form>

    </div>

  </div>

</div>

<?php

  $borrarCalibracion = new ControladorCalibracion();
  $borrarCalibracion -> ctrBorrarCalibracion();

?> 