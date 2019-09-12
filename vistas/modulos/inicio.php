

<div class="content-wrapper">
  <section class="content-header">
    
    <h1>
      
    Tablero
    
    <small>Panel de Control</small> 
      
    </h1>
    <ol class="breadcrumb">
      
      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
      
      <li class="active">Tablero</li>
      
    </ol>
  </section>
  <section class="content">
    <div class="box-body">
      <div class="row">
            
            <?php
              if($_SESSION["perfil"] =="Administrador"){
                include "inicio/cajas-superiores.php";
              }
            ?>
      
      </div>
      <div class="row">       
        <div class="col-lg-12">

              <?php
              if($_SESSION["perfil"] =="Administrador"){          
                include "reportes/graficas-mantenimiento.php";
              }
              ?>
        </div>
        <div class="col-lg-6">        
            <?php
              if($_SESSION["perfil"] =="Administrador"){
                include "inicio/equipos-add.php";
              }    
            
              ?>
        </div>
        <div class="col-lg-6">
          <?php
          if($_SESSION["perfil"] =="Administrador"){
            include "reportes/tipos-de-mantenimiento.php";
          }  
          
          ?>
        </div>
          <div class="col-lg-6">
          <?php
          if($_SESSION["perfil"] =="Administrador"){
              include "inicio/mantenimiento-mini.php";
            }
          
          ?>
        </div>
      </div>

      <div class="col-lg-12">
           
          <?php

          if($_SESSION["perfil"] =="Ingeniero" || $_SESSION["perfil"] =="cliente"){

             echo '<div class="box box-success">

             <div class="box-header">

             <h1>Bienvenid@ ' .$_SESSION["nombre"].'</h1>

             </div>

             </div>';

          }

          ?>

         </div>

    <?php

      if($_SESSION["perfil"] =="cliente"){
    ?>
  
      <div class="row">       
        <div class="col-lg-12">

              <?php
           
                include "reportesClientes/grafica-mantenimientoClientes.php";
          
              ?>
        </div>
        <div class="col-lg-6">        
            <?php
    
                include "reportesClientes/tipos-mantenimientoClientes.php";
                
            
              ?>
        </div>
        <div class="col-lg-6">
          <?php
         
            include "reportesClientes/equiposCliente.php";
            
          
          ?>
        </div>
      </div>
    <?php
      }
    ?>
    </div>
  </section>
  
</div>