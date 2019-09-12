<?php
$item= null;
$valor = null;
$orden = "id_equipo";
$select = null;

$equipos = controladorEquipos::ctrMostrarEquipos($item,$valor,$orden,$select);

//var_dump($equipos);

?>

 <div class="box box-success"> 
            <div class="box-header with-border">
<h3 class="box-title">Equipos Agregados Recientemente</h3>

<!-- /.box-header -->
<div class="box-body">
  <ul class="products-list product-list-in-box"> 
    <?php
   // $length = count($equipos);
   for ($i=0; $i < 3 ; $i++) {

     echo '<li class="item">
      <div class="product-info">
        <a href="javascript:void(0)" class="product-title">Equipo: '.$equipos[$i]["equipo"].'
          <span class="product-description">
            Marca: '.$equipos[$i]["carga12"].'
          </span>
          <span class="product-description">
            Modelo: '.$equipos[$i]["modelo"].'
          </span>
          <span class="product-description">
             Serie: '.$equipos[$i]["serie"].'
          </span>
        </div>
      </li>';
   }



    ?>

    <div class="box-footer clearfix">
      <a href="equipos" class="btn btn-sm btn-info btn-flat pull-left">Ver todos</a>
    </div>

        </ul>
      </div>
    </div>
  </div>
      <!-- /.box-footer -->