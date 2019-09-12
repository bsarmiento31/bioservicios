  <?php

    // $perfil = null;
    // $valor = null;
    // $equipos = ControladorMantenimiento::ctrContarEquiposMantenimiento($perfil,$valor);

     if (isset($_GET["idcliente"])) {

  $perfil = "id_clinica";
  $valor = $_GET["idcliente"];
  $equipos = ControladorMantenimiento::ctrContarEquiposMantenimiento($perfil,$valor);

}else{
  $perfil = null;
  $valor = null;
  $equipos = ControladorMantenimiento::ctrContarEquiposMantenimiento($perfil,$valor);
}

  ?>

    <div class="box box-success"> 
       <div class="box-header with-border"> 
         <h3 class="box-title">Equipos con mantenimiento <?php echo '<span style="font-weight:bold;">' .$_GET["nombreCliente"] .'</span>'?></h3>
       </div>
       <div class="box-body chart-responsive">
         <div class="chart" id="bar-chart" style="height: 300px;"></div>
       </div>
      <!-- /.box-body -->
    </div>
  <!-- /.box -->
   <script> 
   //BAR CHART
    var bar = new Morris.Bar({
      element: 'bar-chart',
      resize: true,
      data: [
      <?php
      foreach ($equipos as $value) {
         echo "
            {y: '".$value["equipo_re"]."', a: '".$value["cantidad"]."'},";
      }
       
    
      ?>
      ],
      barColors: ['#728ec9'],
      xkey: 'y',
      ykeys: ['a'],
      labels: ['Cantidad'],
      hideHover: 'auto'
    });

  </script>


