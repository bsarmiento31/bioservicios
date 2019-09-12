<?php
if($_SESSION["perfil"] == "ingeniero" || $_SESSION["perfil"] == "Administrador"){
echo '<script>
window.location = "reportes";
</script>';
return;
} 
?>
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
    <!--   <div class="box"> -->
    <div class="box-header with-border">

          <button type="button" class="btn btn-default" id="daterange-btn3">
           
            <span>
              <i class="fa fa-calendar"></i> Rango de fecha
            </span> 

            <i class="fa fa-caret-down"></i>

          </button>
<!-- 
          <button type="button" class="btn btn-default" id="daterange-btnProximoReporteCliente">
           
           <span>
             <i class="fa fa-calendar"></i> Fecha de proximo mantenimiento
           </span> 

           <i class="fa fa-caret-down"></i>

         </button> -->

         <button type="button" class="btn btn-warning cancelarGraficaCliente" style="margin-left: 15px;><i class="fa fa-times"></i> Cancelar</button>
       
          <div class="box-tools pull-right">
            <?php

          //   if(isset($_GET["fechaInicial"])){

          //     echo '<a href="vistas/modulos/descargar-reporte.php?reporte=reporte&fechaInicial='.$_GET["fechaInicial"].'&fechaFinal='.$_GET["fechaFinal"].'">';


 
          //   }else{

          //       echo '<a href="vistas/modulos/descargar-reporte.php?reporte=reporte">';

          // }  

            ?>
           <!--  <button class="btn btn-success" style="margin-top:5px">Descargar reporte en Excel</button> -->
          </div>
      
      
    </div>
    <div class="box-body">
      
      <div class="row">
        <div class="col-xs-12">
          
          <?php

          include "reportesClientes/grafica-mantenimientoClientes.php";

          ?>
        </div>
        <div class="col-md-6 col-xs-12">
          
          <?php

          include "reportesClientes/tipos-mantenimientoClientes.php";

          ?>
        </div>
        <div class="col-md-6 col-xs-12">
          
          <?php

          include "reportesClientes/equiposCliente.php";

          ?>
        </div>
        
      </div>
    </div>
    
  </div>
</section>

<!-- </div> -->