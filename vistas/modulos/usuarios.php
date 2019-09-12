<?php

if($_SESSION["perfil"] == "ingeniero" || $_SESSION["perfil"] == "cliente"){

  echo '<script>
 
    window.location = "inicio";  

  </script>'; 

  return;   
 
}

?>

<div class="content-wrapper">

  <section class="content-header">
    
    <h1>
       
      Administrar usuarios
    
    </h1>

    <ol class="breadcrumb">
       
      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
      
      <li class="active">Administrar usuarios</li>
    
    </ol>

  </section>

  <section class="content">

    <div class="box">



      <div class="box-header with-border">
  
        <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarUsuario">
          
          Agregar usuario

        </button>

        <a href="vistas/modulos/descargar-reporte.php?usuarios=usuarios"><button class="btn btn-success pull-right">Descargar reporte en Excel</button></a>

      </div>

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
        
       <table class="table table-bordered table-striped dt-responsive tablas" width="100%">
         
        <thead>
         
         <tr>
           
           <th style="width:10px">#</th>
           <th>Nombre</th>
           <th>Usuario</th>
           <th>Foto</th>
           <th>Perfil</th>
           <th>Estado</th>
           <th>Último login</th>
           <th>Acciones</th>

         </tr> 

        </thead>

        <tbody>

        <?php

        $item = null;
        $valor = null;
        $perfil = null;

        $usuarios = ControladorUsuarios::ctrMostrarUsuarios($item, $valor, $perfil);

       foreach ($usuarios as $key => $value){
         
          echo ' <tr>
                  <td>'.($key+1).'</td>
                  <td>'.$value["nombre"].'</td>
                  <td>'.$value["usuario"].'</td>';

                  if($value["foto"] != ""){

                    echo '<td><img src="'.$value["foto"].'" class="img-thumbnail" width="40px"></td>';

                  }else{

                    echo '<td><img src="vistas/img/usuarios/default/anonymous.png" class="img-thumbnail" width="40px"></td>';

                  }

                  echo '<td>'.$value["perfil"].'</td>';

                  if($value["estado"] != 0){ 

                    echo '<td><button class="btn btn-success btn-xs btnActivar" idUsuario="'.$value["id"].'" estadoUsuario="0">Activado</button></td>';

                  }else{

                    echo '<td><button class="btn btn-danger btn-xs btnActivar" idUsuario="'.$value["id"].'" estadoUsuario="1">Desactivado</button></td>';

                  }             

                  echo '<td>'.$value["ultimo_login"].'</td>
                  <td>

                    <div class="btn-group">
                        
                      <button class="btn btn-warning btnEditarUsuario" idUsuario="'.$value["id"].'" data-toggle="modal" data-target="#modalEditarUsuario"><i class="fa fa-pencil"></i></button>';
                      
                      if ($value["id"]== $_SESSION["id"]) {
                          echo'
                      <button class="btn btn-danger disabled" idUsuario="'.$value["id"].'" fotoUsuario="'.$value["foto"].'" firmaUsuario="'.$value["firma"].'" usuario="'.$value["usuario"].'"><i class="fa fa-times"></i></button>';
                      }else{
                          
                        echo '
                      <button class="btn btn-danger btnEliminarUsuario" idUsuario="'.$value["id"].'" fotoUsuario="'.$value["foto"].'" firmaUsuario="'.$value["firma"].'" usuario="'.$value["usuario"].'"><i class="fa fa-times"></i></button>';
                        }
                        
                        echo'
                    </div>  

                  </td>

                </tr>';
        }


        ?> 

        </tbody>

       </table> 

        <!--    Start Pagination -->
   <!--    <div class='pagination-container' >
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
MODAL AGREGAR USUARIO
======================================-->

<div id="modalAgregarUsuario" class="modal fade" role="dialog">
  
  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="post" enctype="multipart/form-data">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#3c8dbc; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Agregar usuario</h4>

        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">

          <div class="box-body">

            <!-- ENTRADA PARA EL NOMBRE -->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-user"></i></span> 

                <input type="text" class="form-control input-lg" name="nuevoNombre" placeholder="Ingresar nombre" required>

              </div>

            </div>

            <!-- ENTRADA PARA EL USUARIO -->

             <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-key"></i></span> 

                <input type="text" class="form-control input-lg" name="nuevoUsuario" placeholder="Ingresar usuario" id="nuevoUsuario" required>

              </div>

            </div>

            <!-- ENTRADA PARA LA CONTRASEÑA -->

             <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-lock"></i></span> 

                <input type="password" class="form-control input-lg" name="nuevoPassword" placeholder="Ingresar contraseña" required>

              </div>

            </div>

            <!-- ENTRADA PARA SELECCIONAR SU PERFIL -->

            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-users"></i></span> 

                <select class="form-control input-lg" name="nuevoPerfil" id="subir" onchange="cambiarfirma()">
                  
                  <option value="">Selecionar perfil</option>

                  <option value="Administrador">Administrador</option>

                  <option value="Ingeniero">Ingeniero</option>

                  <option value="cliente">Cliente</option>

                </select>

              </div>

            </div>
            
              <!-- ENTRADA PARA SELECCIONAR LA OPCIONES -->

            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-users"></i></span> 

                <select class="form-control input-lg" name="nuevoOpciones">
                  
                  <option value="">Seleccionar las vistas</option>

                  <option value="MantenimientoCalibracion">Mantenimiento + Calibración</option>

                  <option value="Mantenimiento">Mantenimiento</option>

                  <option value="Calibracion">Calibración</option>

                </select>

              </div>

            </div>

            <script>
            function cambiarfirma() 
              {
                if (document.getElementById('subir').value === "Ingeniero") 
              {
              document.getElementById('campoFirma').style.display = 'block';
              } 
              else 
              {
              document.getElementById('campoFirma').style.display = 'none';
              }
              return true;
              }
            </script>

            <!-- ENTRADA PARA SUBIR FOTO -->

             <div class="form-group">
              
              <div class="panel">SUBIR FOTO</div>

              <input type="file" class="nuevaFoto" name="nuevaFoto">

              <p class="help-block">Peso máximo de la foto 2MB</p>

              <img src="vistas/img/usuarios/default/anonymous.png" class="img-thumbnail previsualizar" width="100px">
 
            </div>

             <!-- ENTRADA PARA SUBIR LA FIRMA -->

             <div class="form-group" style="display: none" id="campoFirma">
              
              <div class="panel">SUBIR FIRMA</div>

              <input type="file" class="nuevaFirma" name="nuevaFirma">

              <p class="help-block">Peso máximo de la firma 2MB</p>

              <img src="vistas/img/firmas/defectousuario/defecto.png" class="img-thumbnail previsualizarFirma" width="100px">
              
               <input type="hidden" name="cargarFirma" value="vistas/img/firmas/defectousuario/defecto.png">

            </div>

          </div>

        </div>

        <a data-toggle="modal" data-target="#modal-firma" class="btn btn-app"><i class="fa fa-edit"></i> firma</a>

        <!--=====================================
        PIE DEL MODAL
        ======================================-->

        <div class="modal-footer">

          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

          <button type="submit" class="btn btn-primary">Guardar usuario</button>

        </div>

        <?php

          $crearUsuario = new ControladorUsuarios();
          $crearUsuario -> ctrCrearUsuario();

        ?>

      </form>

    </div>

  </div>

</div>

<!--=====================================
MODAL EDITAR USUARIO
======================================-->

<div id="modalEditarUsuario" class="modal fade" role="dialog">
  
  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="post" enctype="multipart/form-data">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#3c8dbc; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Editar usuario</h4>

        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">

          <div class="box-body">

            <!-- ENTRADA PARA EL NOMBRE -->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-user"></i></span> 

                <input type="text" class="form-control input-lg" id="editarNombre" name="editarNombre" value="" required>

              </div>

            </div>

            <!-- ENTRADA PARA EL USUARIO -->

             <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-key"></i></span> 

                <input type="text" class="form-control input-lg" id="editarUsuario" name="editarUsuario" value="" readonly>

              </div>

            </div>

            <!-- ENTRADA PARA LA CONTRASEÑA -->

             <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-lock"></i></span> 

                <input type="password" class="form-control input-lg" name="editarPassword" placeholder="Escriba la nueva contraseña">

                <input type="hidden" id="passwordActual" name="passwordActual">

              </div>

            </div>

            <!-- ENTRADA PARA SELECCIONAR SU PERFIL -->

            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-users"></i></span> 

                <select class="form-control input-lg" name="editarPerfil" id="subirEditada" onchange="cambiarfirmaEditada()">
                  
                  <option value="" id="editarPerfil"></option>

                  <option value="Administrador">Administrador</option>

                  <option value="Ingeniero">Ingeniero</option>

                  <option value="Cliente">Cliente</option>

                </select>

              </div>

            </div>
            
            <!-- ENTRADA PARA SELECCIONAR LA OPCIONES -->

            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-users"></i></span> 

                <select class="form-control input-lg" name="editarOpciones" id="editarOpciones">
                  
                  <option value="">Seleccionar las vistas</option>

                  <option value="MantenimientoCalibracion">Mantenimiento + Calibración</option>

                  <option value="Mantenimiento">Mantenimiento</option>

                  <option value="Calibracion">Calibración</option>

                </select>

              </div>

            </div>

            <script>
            function cambiarfirmaEditada() 
              {
                if (document.getElementById('subirEditada').value === "Ingeniero") 
              {
              document.getElementById('campoFirmaEditar').style.display = 'block';
              } 
              else 
              {
              document.getElementById('campoFirmaEditar').style.display = 'none';
              }
              return true;
              }
            </script>

            <!-- ENTRADA PARA SUBIR FOTO -->

             <div class="form-group">
              
              <div class="panel">SUBIR FOTO</div>

              <input type="file" class="nuevaFoto" name="editarFoto">

              <p class="help-block">Peso máximo de la foto 2MB</p>

              <img src="vistas/img/usuarios/default/anonymous.png" class="img-thumbnail previsualizar" width="100px">

              <input type="hidden" name="fotoActual" id="fotoActual">

            </div>

            <!-- ENTRADA PARA SUBIR LA FIRMA -->

             <div class="form-group" style="display: none" id="campoFirmaEditar">
              
              <div class="panel">SUBIR FIRMA</div>

              <input type="file" class="nuevaFirma" name="editarFirma">

              <p class="help-block">Peso máximo de la firma 2MB</p>

              <img src="vistas/img/firmas/brayan/firma.png" class="img-thumbnail previsualizarFirma" width="100px">

              <input type="hidden" name="firmaActual" id="firmaActual">

            </div>

          </div>

        </div>

        <!--=====================================
        PIE DEL MODAL
        ======================================-->

        <div class="modal-footer">

          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

          <button type="submit" class="btn btn-primary">Modificar usuario</button>

        </div>

     <?php

          $editarUsuario = new ControladorUsuarios();
          $editarUsuario -> ctrEditarUsuario();

        ?> 

      </form>

    </div>

  </div>

</div>

<?php

  $borrarUsuario = new ControladorUsuarios();
  $borrarUsuario -> ctrBorrarUsuario();

?> 

<!-- Modal para crear la firma-->

<!--Modal de la firma-->

<div class="modal fade" id="modal-firma">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Crear La firma</h4>
      </div>

      <div class="modal-body">
        <canvas id="signature-pad" class="signature-pad" width=400 height=200></canvas>
      </div>

      <div class="modal-footer">
        <button id="save-png" class="btn btn-primary">Guardar</button>
        <button id="clear" class="btn btn-secondary">Borrar</button> 
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>


