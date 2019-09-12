<div class="content-wrapper">
  <section class="content-header">
     
    <h1>  
     
    Trabajos  
          
    </h1> 
    <ol class="breadcrumb">
       
      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
      
      <li class="active">Trabajos</li>
       
    </ol>
  </section>
  <section class="content">
    <div class="box">      
      <div class="box-header with-border">
          <?php

        if($_SESSION["perfil"] == "Administrador" || $_SESSION["perfil"] == "Ingeniero"){
          echo 
          ' <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarInstrumentos">
          
          Agregar Trabajos

        </button>';
        }

        ?>
      

      </div>

      <?php

      $eliminarTrabajos = new controladorTrabajos();
      $eliminarTrabajos -> ctrBorrarTrabajos();

      ?>
      <div class="box-body">
<!-- 
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
      </div> -->
        
        <table class="table table-bordered table-striped dt-responsive tablas">
          
          <thead>       
            <tr>        
              <th style="width:10px">#</th>
              <th>Nombre</th>
              <?php

                if($_SESSION["perfil"] == "Administrador" || $_SESSION["perfil"] == "Ingeniero"){
                  echo '
                   <th>Acciones</th>
                  ';
                }

              ?>             
            </tr>
          </thead> 
          <tbody>

        <?php

          $item = null;
          $valor = null;
          $orden = "id_trabajo";

          $trabajos = controladorTrabajos::ctrMostrarTrabajos($item, $valor, $orden);

          

          foreach ($trabajos as $key => $value) {

          echo '<tr>
              <td>'.($key+1).'</td>
              <td>'.$value["nombre"].'</td>';
              if($_SESSION["perfil"] == "Administrador" || $_SESSION["perfil"] == "Ingeniero"){
                  echo'
              <td>
                <div class="btn-group">
                  <button class="btn btn-warning btnEditarTrabajos" data-toggle="modal" data-target="#modalEditarTrabajos" idTrabajos="'.$value["id_trabajo"].'"><i class="fa fa-pencil" ></i></button>
                  <button class="btn btn-danger btnEliminarTrabajos" idTrabajos="'.$value["id_trabajo"].'" idNombre="'.$value["nombre"].'"><i class="fa fa-times"></i></button>
                </div>
              </td>';
              }
              echo'
              </tr>';

          }
          ?>

          </tbody>
        </table>
           <!--    Start Pagination -->
  <!--     <div class='pagination-container' >
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

<div id="modalAgregarInstrumentos" class="modal fade" role="dialog">
   
  <div class="modal-dialog modal-lg">

    <div class="modal-content">

      <form role="form" method="post">
 
        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#3c8dbc; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Agregar Trabajo</h4>

        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">

          <div class="box-body">

             <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-heartbeat"></i></span> 

                <input type="text" class="form-control input-lg" name="nuevoTrabajo" placeholder="Ingresar el trabajo realizado" required>

              </div>

            </div>



          </div>

        </div>

        <!--=====================================
        PIE DEL MODAL
        ======================================-->

        <div class="modal-footer">

          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

          <button type="submit" class="btn btn-primary">Guardar Trabajo</button>

        </div>

         <?php
          $crearTrabajo = new controladorTrabajos();
          $crearTrabajo -> ctrCrearTrabajos();

          ?>

      </form>

    </div>

  </div>

</div>


<!--=====================================
MODAL EDITAR EQUIPO
======================================-->


<div id="modalEditarTrabajos" class="modal fade" role="dialog">
   
  <div class="modal-dialog modal-lg">

    <div class="modal-content">

      <form role="form" method="post">
 
        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#3c8dbc; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Agregar instrumentos</h4>

        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <input type="hidden" class="form-control input-lg" id="editarTrabajosId" name="editarTrabajosId" placeholder="Ingresar el instrumento" required>

        <div class="modal-body">

          <div class="box-body">

             <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-heartbeat"></i></span> 

                <input type="text" class="form-control input-lg" id="editarNombre" name="editarNombre" placeholder="Ingresar el instrumento" required>

              </div>

            </div>



          </div>

        </div>

        <!--=====================================
        PIE DEL MODAL
        ======================================-->

        <div class="modal-footer">

          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

          <button type="submit" class="btn btn-primary">Editar Instrumento</button>

        </div>

         
         <?php
          $editarTrabajos = new controladorTrabajos();
          $editarTrabajos -> ctrEditarTrabajos();

          ?>

      </form>

    </div>

  </div>

</div>