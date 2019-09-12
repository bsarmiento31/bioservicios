 <div class="content-wrapper">

  <section class="content-header">
    
    <h1>
       
      Reportes de mantenimientos 
    
    </h1>
 
    <ol class="breadcrumb">
      
      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
      
      <li class="active">Reportes de mantenimientos</li> 
    
    </ol>

  </section> 

  <section class="content">

    <div class="box">

      <div class="box-header with-border">
        <div class="row">
          <div class="col-md-5">
            <button type="button" class="btn btn-default botones" id="daterange-btn2"> 
           
            <span>
              <i class="fa fa-calendar"></i> Fecha de servicio
            </span> 

            <i class="fa fa-caret-down"></i>

          </button>
          
           <div class="btn-group btnclientes">
            <select class="selectpicker" data-show-subtext="true" data-live-search="true" id="clientesValor">
    
        <option value="">Seleccione un cliente</option>';
        <?php
                   $item = null;
                   $valor = "cliente";
                   $perfil = "perfil";

                   $cliente = ControladorUsuarios::ctrMostrarUsuarios($item, $valor, $perfil);
                   foreach ($cliente as $key => $value1) {
                     echo '
                     <option value="'.$value1["id"].'">'.$value1["nombre"].'</option>';
                   }
                
                
                ?>
      </select>
    
        </div>
         
          <button type="button" class="btn btn-warning cancelarGrafica botones"><i class="fa fa-times"></i> Cancelar</button> 
        
       

          </div>
          <div class="col-md-5"></div>
          <div class="col-md-2">
            <div class="box-tools">
          <?php

        if(isset($_GET["fechaInicial"])){

          echo '<a href="vistas/modulos/descargar-reporte.php?reporte=reporte&fechaInicial='.$_GET["fechaInicial"].'&fechaFinal='.$_GET["fechaFinal"].'"><button class="btn btn-success botones">Descargar reporte en Excel</button></a>';
 
        }else{

           echo '<a href="vistas/modulos/descargar-reporte.php?reporte=reporte"><button class="btn btn-success botones">Descargar reporte en Excel</button></a>';

        }         

        ?>
        

        </div>
          </div>
        </div>
            

        

        
          
      </div> 


      <div class="box-body">
        
        <div class="row">

          <div class="col-xs-12">
            
            <?php

            include "reportes/graficas-mantenimiento.php";

            ?>
 
          </div>

     <!--      <div class="col-xs-12">
            
            <?php

            //include "reportes/mantenimientoxcliente.php";

            ?>
 
          </div> -->

           <div class="col-md-6 col-xs-12">

            <?php

            include "reportes/tipos-de-mantenimiento.php";

            ?>

           </div>

            <div class="col-md-6 col-xs-12">
             
            <?php

            include "reportes/equipos.php";

            ?>

           </div>
          
        </div>

      </div>
      
    </div>

  </section>
 
 </div>

