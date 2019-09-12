<?php

session_start();

?>

<!DOCTYPE html>
<html>
<head> 

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">

  <title>Ingenieria BioServicios</title>

  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

  <link rel="icon" href="vistas/img/plantilla/icono-negro.png">

   <!--=====================================
  PLUGINS DE CSS
  ======================================-->

  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="vistas/bower_components/bootstrap/dist/css/bootstrap.min.css">


  <!-- Font Awesome -->
  <link rel="stylesheet" href="vistas/bower_components/font-awesome/css/font-awesome.min.css">

  <!-- Ionicons -->
  <link rel="stylesheet" href="vistas/bower_components/Ionicons/css/ionicons.min.css">

  <!-- Theme style -->
  <link rel="stylesheet" href="vistas/dist/css/AdminLTE.css">
  
  <!-- AdminLTE Skins -->
  <link rel="stylesheet" href="vistas/dist/css/skins/_all-skins.min.css">

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

   <!-- DataTables -->
  <link rel="stylesheet" href="vistas/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
  <link rel="stylesheet" href="vistas/bower_components/datatables.net-bs/css/responsive.bootstrap.min.css">

  <!-- iCheck for checkboxes and radio inputs -->
  <link rel="stylesheet" href="vistas/plugins/iCheck/all.css">
  <!-- Select2 --> 
  <link rel="stylesheet" href="vistas/bower_components/select2/dist/css/select2.min.css">
  <!-- daterange picker -->
  <link rel="stylesheet" href="vistas/bower_components/bootstrap-daterangepicker/daterangepicker.css">
    <!-- Morris charts -->
  <link rel="stylesheet" href="vistas/bower_components/morris.js/morris.css">
  <!-- Firma para enviarlo sin descargar la firma -->
  <link rel="stylesheet" href="extensiones/firma/assets/jquery.signaturepad.css">
  <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.6.3/css/bootstrap-select.min.css" />

  <!--=====================================
  PLUGINS DE JAVASCRIPT
  ======================================-->

  <!-- jQuery 3 -->
  <script src="vistas/bower_components/jquery/dist/jquery.min.js"></script>
  
  <!-- Bootstrap 3.3.7 -->
  <script src="vistas/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

  <!-- FastClick -->
  <script src="vistas/bower_components/fastclick/lib/fastclick.js"></script>
  
  <!-- AdminLTE App -->
  <script src="vistas/dist/js/adminlte.min.js"></script>

  <!-- DataTables -->
  <script src="vistas/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
  <script src="vistas/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
  <script src="vistas/bower_components/datatables.net-bs/js/dataTables.responsive.min.js"></script>
  <script src="vistas/bower_components/datatables.net-bs/js/responsive.bootstrap.min.js"></script>

  <!-- SweetAlert 2 --> 
  <script src="vistas/plugins/sweetalert2/sweetalert2.all.js"></script>
  <!-- By default SweetAlert2 doesn't support IE. To enable IE 11 support, include Promise polyfill:-->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/core-js/2.4.1/core.js"></script>
  <!-- iCheck 1.0.1 -->
  <script src="vistas/plugins/iCheck/icheck.min.js"></script>
  <!-- Select2 -->
  <script src="vistas/bower_components/select2/dist/js/select2.full.min.js"></script>
  <!-- date-range-picker -->
  <script src="vistas/bower_components/moment/min/moment.min.js"></script>
  <script src="vistas/bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
  <!-- bootstrap datepicker -->
  <!-- <script src="vistas/bower_components/bootstrap-datepicker/dist/js/ bootstrap-datepicker.min.js"></script>
   -->
   <!-- Codigo fuente de la firma -->
   <script src="vistas/js/signature_pad.min.js"></script>
   <!-- Morris.js charts -->
   <script src="vistas/bower_components/raphael/raphael.min.js"></script>
   <script src="vistas/bower_components/morris.js/morris.min.js"></script>
   <!-- ChartJS -->
   <script src="vistas/bower_components/chart.js/Chart.js"></script>
   <!-- Highchart -->
   <script src="https://code.highcharts.com/highcharts.js"></script>
   <script src="https://code.highcharts.com/modules/exporting.js"></script>
   <script src="https://code.highcharts.com/modules/export-data.js"></script>
   <!-- Firma para enviarlo sin descargar la firma -->
   <script src="extensiones/firma/jquery.signaturepad.min.js"></script>
   <script src="extensiones/firma/assets/json2.min.js"></script>
<!--    <script src='https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js'></script>-->
<script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.6.3/js/bootstrap-select.min.js"></script>
</head>

<!--=====================================
CUERPO DOCUMENTO
======================================-->

<body class="hold-transition skin-blue sidebar-mini">
 
  <?php

  if(isset($_SESSION["iniciarSesion"]) && $_SESSION["iniciarSesion"] == "ok"){ 

   echo '<div class="wrapper">';  

    /*=============================================
    CABEZOTE
    =============================================*/

    include "modulos/cabezote.php";

    /*=============================================
    MENU
    =============================================*/

    include "modulos/menu.php";

    /*=============================================
    CONTENIDO
    =============================================*/

    if(isset($_GET["ruta"])){

      if($_GET["ruta"] == "inicio" ||
         $_GET["ruta"] == "usuarios" ||
         $_GET["ruta"] == "cliente" ||
         $_GET["ruta"] == "cronograma" ||
         $_GET["ruta"] == "mantenimiento" ||
         $_GET["ruta"] == "crear-mantenimiento" ||
         $_GET["ruta"] == "parametrizacion" ||
         $_GET["ruta"] == "visualizacion" ||
         $_GET["ruta"] == "reportes" ||
         $_GET["ruta"] == "reportes-cronograma" ||
         $_GET["ruta"] == "reportes-cronogramano" ||
         $_GET["ruta"] == "editar-mantenimiento" ||
         $_GET["ruta"] == "equipos" ||
         $_GET["ruta"] == "reporte-clientes" ||
         $_GET["ruta"] == "cronograma-sin-reportes" ||
         $_GET["ruta"] == "instrumentos" ||
         $_GET["ruta"] == "trabajos" ||
         $_GET["ruta"] == "no-preventivo" ||
         $_GET["ruta"] == "cronograma-2020" ||
         $_GET["ruta"] == "cronograma-2021" ||
         $_GET["ruta"] == "calibracion" ||
         $_GET["ruta"] == "salir"){

        include "modulos/".$_GET["ruta"].".php";

      }else{

        include "modulos/404.php";

      }

    }
    else
    {

      include "modulos/inicio.php";

    }

    /*=============================================
    FOOTER
    =============================================*/

    include "modulos/footer.php";

    echo '</div>';

  }
  else
  {

    include "modulos/login.php";

  }

  ?>


<script src="vistas/js/plantilla.js"></script>
<script src="vistas/js/usuarios.js"></script>
<script src="vistas/js/clientes.js"></script>
<script src="vistas/js/graficas-cliente.js"></script>
<script src="vistas/js/mantenimiento.js"></script>
<script src="vistas/js/firma.js"></script>
<script src="vistas/js/reportes-cronograma.js"></script>
<script src="vistas/js/equipo.js"></script>
<script src="vistas/js/graficas.js"></script>
<script src="vistas/js/cronograma.js"></script>
<script src="vistas/js/instrumentostrabajos.js"></script>
<script src="vistas/js/calibracion.js"></script>
</body>
</html>
