<div class="content-wrapper">

  <section class="content-header">
    
    <h1>
       
      Administrar Clientes 
     
    </h1>

    <ol class="breadcrumb">
      
      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
      
      <li class="active">Administrar Clientes</li>
    
    </ol>

  </section>

  <section class="content">

    <div class="box">

      <div class="box-header with-border">
  
        <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarCliente">
          
          Agregar cliente

        </button>

        <a href="vistas/modulos/descargar-reporte.php?cliente=cliente"><button class="btn btn-success pull-right" style="margin-top:5px">Descargar reporte en Excel</button></a>

      </div>
<?php
$borrarCliente = new ControladorClientes();
$borrarCliente -> ctrBorrarCliente();
?>
      <div class="box-body">

       <!--  <div class="row" style="margin-top: 10px;">
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
        
       <table class="table table-bordered table-striped dt-responsive tablas">
         
        <thead>
         
         <tr>
           
           <th style="width:10px">#</th>
           <th>Nombre</th>
           <th>Nit</th>
           <th>Descripción</th>
           <th>Acciones</th>

         </tr> 

        </thead>

        <tbody>
          
          <?php
            $item = null;
            $valor = null;
            $clientes = ControladorClientes::ctrMostrarClientes($item, $valor);
            foreach ($clientes as $key => $value){
              echo'<tr>';

                $item = "id";
                $valor = $value["nombre"]; 
                $perfil = null;

                $usuarios = ControladorUsuarios::ctrMostrarUsuarios($item, $valor, $perfil);
              echo '
              <td>'.($key+1).'</td>
              <td>'.$usuarios["nombre"].'</td>
              <td>'.$value["nit"].'</td>
              <td>'.$value["descripcion"].'</td>
              <td>
                <div class="btn-group">
                  
                  <button class="btn btn-warning btnEditarCliente" idCliente="'.$value["id_cliente"].'" data-toggle="modal" data-target="#modalEditarCliente"><i class="fa fa-pencil"></i></button>
                  <button class="btn btn-danger btnEliminarCliente" idCliente="'.$value["id_cliente"].'" cliente="'.$value["nombre"].'"><i class="fa fa-times"></i></button>
                </div>
              </td>
            </tr>';
            }
            
            ?>

        </tbody>

       </table>

    <!--    Start Pagination -->
<!--       <div class='pagination-container' >
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
MODAL AGREGAR CLIENTE
======================================-->

<div id="modalAgregarCliente" class="modal fade" role="dialog">
  
  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="post">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#3c8dbc; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Agregar cliente</h4>

        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">

          <div class="box-body">

            <!-- ENTRADA PARA EL NOMBRE -->
<!--             
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-user"></i></span> 

                <input type="text" class="form-control input-lg" name="nuevoCliente" placeholder="Ingresar nombre de la empresa" required>

              </div> 

            </div> -->
<!-- ENTRADA PARA EL NOMBRE -->
              <!-- /.col-lg-6 -->
                
                    <div class="form-group">
                      <div class="input-group">
                        
                        <span class="input-group-addon"><i class="fa fa fa-user"></i></span>
                        <select class="form-control input-lg" name="nuevoCliente">
                         
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
                    
                    <!-- /input-group -->
                

            <!-- ENTRADA PARA EL  NIT-->

             <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-align-justify"></i></span> 

                <input type="text" class="form-control input-lg" name="nuevoNit" placeholder="Ingresar el Nit de la empresa" required>

              </div>

            </div>

            <!-- ENTRADA PARA LA DESCRIPCION-->

             <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-comment"></i></span> 

                <input type="text" class="form-control input-lg" name="nuevoDescripcion" placeholder="Ingresar la Descripción">

              </div>

            </div>


          

          

          </div>

        </div>

        <!--=====================================
        PIE DEL MODAL
        ======================================-->

        <div class="modal-footer">

          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

          <button type="submit" class="btn btn-primary">Guardar Cliente</button>

        </div>

         <?php
          $crearCliente = new ControladorClientes();
          $crearCliente -> ctrCrearCliente();
          ?>

      </form>

    </div>

  </div>

</div>


<!--=====================================
MODAL EDITAR CLIENTE
======================================-->

<div id="modalEditarCliente" class="modal fade" role="dialog">
  
  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="post">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#3c8dbc; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Editar cliente</h4>

        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">

          <div class="box-body">

            <!-- ENTRADA PARA EL CLIENTE -->

            <input type="hidden" class="form-control input-lg"  name="editarID" placeholder="Ingresar nombre de la empresa" value="" id="editarID" required>
<!-- 
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-user"></i></span> 

                <input type="text" class="form-control input-lg"  name="editarCliente" placeholder="Ingresar nombre de la empresa" value="" id="editarCliente" required>

              </div>

            </div> -->
              <div class="form-group">
                      <div class="input-group">
                        
                        <span class="input-group-addon"><i class="fa fa fa-user"></i></span>
                        <select class="form-control input-lg" name="editarCliente" id="editarCliente" required>
                         
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

            <!-- ENTRADA PARA EL  NIT-->

             <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-align-justify"></i></span> 

                <input type="text" class="form-control input-lg" name="editarNit" placeholder="Ingresar el Nit de la empresa" value="" id="editarNit" required>

              </div>

            </div>

            <!-- ENTRADA PARA LA DESCRIPCION-->

             <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-comment"></i></span> 

                <input type="text" class="form-control input-lg" name="editarDescripcion" placeholder="Ingresar la Descripción" id="editarDescripcion" value="">

              </div>

            </div>


          

          

          </div>

        </div>

        <!--=====================================
        PIE DEL MODAL
        ======================================-->

        <div class="modal-footer">

          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

          <button type="submit" class="btn btn-primary">Editar cliente</button>

        </div>

         <?php
          $editarCliente = new ControladorClientes();
          $editarCliente -> ctrEditarCliente();
          ?>

      </form>

    </div>

  </div>

</div>


