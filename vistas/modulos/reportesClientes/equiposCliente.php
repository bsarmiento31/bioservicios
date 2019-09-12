  <?php

    $perfil = "id_clinica";
    $valor = $_SESSION["id"];

    $equipos = ControladorMantenimiento::ctrContarEquiposMantenimiento($perfil,$valor); 
  ?>

          <div class="box box-success">
            <div class="box-header with-border">
              <h3 class="box-title">Equipos con mantenimiento</h3>
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