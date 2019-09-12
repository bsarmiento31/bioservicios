<?php

  $item = null;
  $valor = null;
  $orden = "id_reporte";
  $perfil = null;
  $mantenimientos = ControladorMantenimiento::ctrMostrarModelos($item, $valor,$orden,$perfil);
  $usuarios = ControladorUsuarios::ctrMostrarUsuarios($item, $valor, $perfil);
  $totalTipos = ControladorMantenimiento::ctrContarMantenimientosxcliente($item,$valor);

  // var_dump($totalTipos);
  $usuariosTotal= array(); 
  $usuariosContados = array();
  foreach ($mantenimientos  as $key => $valueMantenimiento) {
    foreach ($usuarios as $key => $valueUsuarios) {
      if ($valueMantenimiento["id_clinica"] == $valueUsuarios["id"]) {

        array_push($usuariosTotal, $valueUsuarios["nombre"]);

            // $usuariosContados = array($valueUsuarios["nombre"] => $totalTipos["tipo_manteniemiento"]); 

        if ($valueMantenimiento["tipo_manteniemiento"]=="Instalacion") {
          $usuariosContados = array($valueMantenimiento["tipo_manteniemiento"]); 
            $int = count($usuariosContados);
        }
         if ($valueMantenimiento["tipo_manteniemiento"]=="Evaluacion") {
          $usuariosEvaluacion = array($valueMantenimiento["tipo_manteniemiento"]);
            $eva = count($usuariosEvaluacion);
            //var_dump($eva);
            
        }
        if ($valueMantenimiento["tipo_manteniemiento"]=="Correctivo") {
          $usuariosCorrectivo = array($valueMantenimiento["tipo_manteniemiento"]);
            $cor = count($usuariosCorrectivo);
            //var_dump($cor);
           
        }



      } 
    }
  }
  #Evitamos repetir nombre
  $noRepetirNombres = array_unique($usuariosTotal);
      foreach ($noRepetirNombres as $valuen) {
      
      var_dump($valuen);
    }

  

?>
  <div class="box box-success">
    <div class="box-header with-border">
      <div id="container" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
    </div>
  </div> 
<script>
Highcharts.chart('container', {
  chart: { 
    type: 'column' 
  },
  title: {
    text: 'Tipos de mantenimiento x cliente'
  },
  xAxis: {
    categories: ['Instalación', 'Evaluación', 'Correctiva']
  },
  yAxis: {
    min: 0, 
    max : 10,
    title: {
      text: 'Cantidad total'
    }
  },
  tooltip: {
    pointFormat: '<span style="color:{series.color}">{series.name}</span>: <b>{point.y}</b><br/>',
    shared: true
  },
  plotOptions: {
    column: {
      stacking: 'percent'
    }
  },
  series: [{
  <?php

    // foreach ($noRepetirNombres as $valuen) {
    //   echo "
    //     name: '".$valuen."',
    //     data: [".$int.",".$eva.",".$cor."]
    //       },{";
    // }
    //  data: [<?php echo join($contarTotalUsuarios,',');

  ?>
  }]
 
});
</script>




<?php

  // $item = null;
  // $valor = null;
  // $orden = "id_reporte";
  // $perfil = null;
  // $mantenimientos = ControladorMantenimiento::ctrMostrarModelos($item, $valor,$orden,$perfil);
  // $usuarios = ControladorUsuarios::ctrMostrarUsuarios($item, $valor, $perfil);
  // $totalTipos = ControladorMantenimiento::ctrContarTiposMantenimiento($perfil,$valor);

  // // var_dump($totalTipos);
  // $usuariosTotal= array(); 
  // $usuariosContados = array();
  // $usuariosEvaluacion = array();
  // $usuariosCorrectivo = array();
  // foreach ($mantenimientos  as $key => $valueMantenimiento) {
  //   foreach ($usuarios as $key => $valueUsuarios) {
  //     if ($valueMantenimiento["id_clinica"] == $valueUsuarios["id"]) {

  //       array_push($usuariosTotal, $valueUsuarios["nombre"]);

  //       if ($valueMantenimiento["tipo_manteniemiento"]=="Instalacion") {
  //         $usuariosContados = array($valueUsuarios["nombre"] => $valueMantenimiento["tipo_manteniemiento"]); 
  //           // $int = count($usuariosContados);
  //           //var_dump($int);
        
  //       }
  //       if ($valueMantenimiento["tipo_manteniemiento"]=="Evaluacion") {
  //         $usuariosEvaluacion = array($valueUsuarios["nombre"] =>$valueMantenimiento["tipo_manteniemiento"]);
  //           // $eva = count($usuariosEvaluacion);
  //           //var_dump($eva);
            
  //       }
  //       if ($valueMantenimiento["tipo_manteniemiento"]=="Correctivo") {
  //         $usuariosCorrectivo = array($valueUsuarios["nombre"] =>$valueMantenimiento["tipo_manteniemiento"]);
  //           // $cor = count($usuariosCorrectivo);
  //           //var_dump($cor);
            
           
  //       }

  //       // foreach ($usuariosContados as $key => $value)
  //       // {
          
  //       //   $usuariosContadosIntalacion[$key] += $value;

  //       // }

  //       // foreach ($usuariosEvaluacion as $key => $value) 
  //       // {

  //       //  $usuariosContadosEvaluacion = count($usuariosEvaluacion[$key]); 
          
  //       // }
  
  //       // foreach ($usuariosCorrectivo as $key => $value) 
  //       // {

  //       //   $usuariosContadosCorrectivos = count($usuariosCorrectivo[$key]);

  //       // }
  //     } 
  //   }
  // }
  #Evitamos repetir nombre
  // $noRepetirNombres = array_unique($usuariosTotal);

  //    foreach ($noRepetirNombres as $valuen) {
  //     // $eva[$valuen];
  //     // var_dump($valuen);
  //   }

?>
 <!--  <div class="box box-success">
    <div class="box-header with-border">
      <div id="container" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
    </div>
  </div>  -->
<script>
// Highcharts.chart('container', {
//   chart: { 
//     type: 'column' 
//   },
//   title: {
//     text: 'Tipos de mantenimiento x cliente'
//   },
//   xAxis: {
//     categories: ['Instalación', 'Evaluación', 'Correctiva']
//   },
//   yAxis: {
//     min: 0,
//     max : 10,
//     title: {
//       text: 'Cantidad total'
//     }
//   },
//   tooltip: {
//     pointFormat: '<span style="color:{series.color}">{series.name}</span>: <b>{point.y}</b><br/>',
//     shared: true
//   },
//   plotOptions: {
//     column: {
//       stacking: 'percent'
//     }
//   },
//   series: [{
//   <?php

//     // foreach ($noRepetirNombres as $valuen) {
//     //   echo "
//     //     name: '".$valuen."',
//     //     data: [".$int.",".$eva.",".$cor."]
//     //       },{";
//     // }
//     //  data: [<?php echo join($contarTotalUsuarios,',');

//   ?>
//   }]
 
// });
</script>









