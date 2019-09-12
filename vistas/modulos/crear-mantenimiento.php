<div class="content-wrapper">
  <section class="content-header">
     
    <h1>  
       
    Crear manteniemiento       
            
    </h1>     
    <ol class="breadcrumb">  
        
      <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>
      
      <li class="active">Crear mnteniemiento</li>   
      
    </ol>
  </section>
  <section class="content">
    <div class="row">
      <!--=====================================
      EL FORMULARIO
      ======================================--> 
      
      <div class="col-lg-6 col-xs-12">
        
        <div class="box box-success">
          
          <div class="box-header with-border">
            
            <h3 class="box-title">Formulario de registro de mantenimiento</h3>
            
          </div>
          <form role="form" method="post" class="sigPad" enctype="multipart/form-data">
            
            <!--=====================================
            CUERPO DEL MODAL
            ======================================-->
            <div class="box-body"> 
              <div class="box">

                <div class="form-group" style="display: none;"> 
                  <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-user"></i></span>
                      <input type="number" class="form-control input-lg" value="<?php echo $_SESSION['id'] ?>" name="idUsuarioNuevo" placeholder="Id del Usuario" readonly>
                  </div>
                </div>

               

                <!-- ENTRADA PARA LA CLINICA -->
                <div class="form-group">
                  <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-users"></i></span>
                    <select class="form-control input-lg select2" id="nuevoClienteM"  style="width: 100%;" name="nuevoClienteM" required>
                      <?php

                         $item = null;
                         $valor = "cliente";
                         $perfil = "perfil";

                         $cliente = ControladorUsuarios::ctrMostrarUsuarios($item, $valor, $perfil);
                         echo '<option value="">Escoje el cliente</option>';
                         foreach ($cliente as $key => $value) {
                           echo '<option value="'.$value["id"].'">'.$value["nombre"].'</option>';
                         }
                      
                      
                      ?>
                    </select>
                  </div>
                </div>
                
                      <!-- ENTRADA PARA SELECCIONAR EL CODIGO-->
                 <div class="form-group">
                      
                   <div class="input-group">                       
                     <span class="input-group-addon"><i class="fa fa-align-justify"></i></span>
                        <select class="form-control input-lg select2" style="width: 100%;" name="nuevoCodigo" id="nuevoCodigo">
                          <?php
                          
                          // $itemS = null;
                          // $valorS = null;
                          // $ordenS="id_equipo";
                          // $selectS = null;
                          // $equiposs = controladorEquipos::ctrMostrarEquipos($itemS, $valorS,$ordenS,$selectS);
                          // echo '<option value="">Escoje la serie</option>';
                          // foreach ($equiposs as $key => $value4){
                          // echo '<option value="'.$value4["serie"].'">'.$value4["serie"].'</option>';
                          // }
                          ?>
                        </select>
                      </div>
                    </div>
        
                <!-- ENTRADA PARA SELECCIONAR SU EQUIPO -->
                <div class="row">
                  <div class="col-lg-6">
                    <div class="form-group">
                       
                      <div class="input-group">
                        
                        <span class="input-group-addon"><i class="fa fa-align-justify"></i></span>
                        <select class="form-control input-lg select2" id="nuevoEquipoM" style="width: 100%;" name="nuevoEquipoM" required>
                          <?php
                          
                          // $itemE = null;
                          // $valorE = $value["id"];
                          // $ordenE = "id_equipo";
                          // $selectE = "id_usuario";
                          // $equipos = controladorEquipos::ctrMostrarEquipos($itemE, $valorE,$ordenE ,$selectE);
                          // echo '<option value="">Escoje el equipo</option>';
                          // foreach ($equipos as $key => $value1){
                          // echo '<option value="'.$value1["equipo"].'">'.$value1["equipo"].'</option>';
                          // }
                          ?>
                        </select>
                      </div> 
                    </div>
                  </div>

                    <!--  <script type="text/javascript">
                              $(document).ready(function(){
                                $('#nuevoClienteM').val();
                                recargarMarca();
                                recargarEquipo();
                                recargarModelo();
                                recargarSerie();
                             
                                $('#nuevoClienteM').change(function(){
                                  recargarMarca();
                                  recargarEquipo();
                                  recargarModelo();
                                  recargarSerie();
                                });
                              })
                      </script> -->
                  <script type="text/javascript">
                        $(document).ready(function(){
                              $('#nuevoCodigo').val();
                              recargarEquipoMantenimiento();
                                  
                              $('#nuevoCodigo').change(function(){
                              recargarEquipoMantenimiento();
                                  });
                            })
                  </script> 
                  <!-- ENTRADA PARA SELECCIONAR SU MARCA -->
                  <div class="col-lg-6">
                    <div class="form-group">
                      
                      <div class="input-group">
                        
                        <span class="input-group-addon"><i class="fa fa-align-justify"></i></span>
                        <select class="form-control input-lg select2" style="width: 100%;" name="nuevoMarcaM" id="nuevoMarcaM" required>
                       
                          <?php
                          
                          // $itemM = null;
                          // $valorM = null;
                          // $ordenM = "id_equipo";
                          // $selectM = null;
                          // $equiposM = controladorEquipos::ctrMostrarEquipos($itemM, $valorM,$ordenM,$selectM);
                          // echo '<option value="">Escoje la marca</option>';
                          // foreach ($equiposM as $key => $value2){
                          // echo '<option value="'.$value2["marcaText"].'">'.$value2["marcaText"].'</option>';
                          // }
                          ?>
                        </select>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- ENTRADA PARA SELECCIONAR SU MODELO -->
                <script type="text/javascript">
                          $(document).ready(function(){
                            $('#nuevoCodigo').val();
                                recargarMarcaMantenimiento();
                                    
                            $('#nuevoCodigo').change(function(){
                                recargarMarcaMantenimiento();
                                });
                              })
                    </script>
                 
                    <div class="form-group">                     
                      <div class="input-group">                       
                        <span class="input-group-addon"><i class="fa fa-align-justify"></i></span>
                        <select class="form-control input-lg select2" id="nuevoModeloM" style="width: 100%;" name="nuevoModeloM" required>
                          <?php
                          
                          // $itemMo = null;
                          // $valorMo = null;
                          // $ordenMo="id_equipo";
                          // $selectMo = null;
                          // $equiposMo = controladorEquipos::ctrMostrarEquipos($itemMo, $valorMo,$ordenMo,$selectMo);
                          // echo '<option value="">Escoje el modelo</option>';
                          // foreach ($equiposMo as $key => $value3){
                          // echo '<option value="'.$value3["modelo"].'">'.$value3["modelo"].'</option>';
                          // }
                          ?>
                        </select>
                        
                      </div>
                    </div>
                  
                <script type="text/javascript">
                          $(document).ready(function(){
                            $('#nuevoCodigo').val();
                                recargarModeloMantenimiento();
                                    
                            $('#nuevoCodigo').change(function(){
                                recargarModeloMantenimiento();
                                });
                             })
                </script>
                  
 
                <!-- ENTRADA PARA SELECCIONAR SU SERIE class= nuevoSerienuevo serieInstrumento, id= id="nuevoSerieM"-->
                 <div class="form-group">
                      
                   <div class="input-group">                       
                     <span class="input-group-addon"><i class="fa fa-align-justify"></i></span>
                        <select class="form-control input-lg select2 serieInstrumento serieMes" style="width: 100%;" name="nuevoSerie" id="nuevoSerieM">
                          <?php
                          
                          // $itemS = null;
                          // $valorS = null;
                          // $ordenS="id_equipo";
                          // $selectS = null;
                          // $equiposs = controladorEquipos::ctrMostrarEquipos($itemS, $valorS,$ordenS,$selectS);
                          // echo '<option value="">Escoje la serie</option>';
                          // foreach ($equiposs as $key => $value4){
                          // echo '<option value="'.$value4["serie"].'">'.$value4["serie"].'</option>';
                          // }
                          ?>
                        </select>
                      </div>
                    </div>

                    <script type="text/javascript">
                          $(document).ready(function(){
                            $('#nuevoCodigo').val();
                                recargarSerieMantenimiento();
                                    
                            $('#nuevoCodigo').change(function(){
                                recargarSerieMantenimiento();
                                });
                              })
                    </script>


               

                    <script type="text/javascript">
                          $(document).ready(function(){
                            $('#nuevoClienteM').val();
                                recargarCodigoMantenimiento();
                                    
                            $('#nuevoClienteM').change(function(){
                                recargarCodigoMantenimiento();
                                });
                              })
                    </script>

                    <div class="form-group" style="display: none;">
                    <div class="input-group"> 
                      <span class="input-group-addon"><i class="fa fa-align-justify"></i></span>
                      <select class="form-control input-lg" onclick="cambiarSerie()" name="nuevoSerieNuevo" id="comboSerie">
                        <option value="">¿Deseas Agregar un nuevo reporte? </option>
                        <option value="">No</option> 
                        <option value="Si">Si</option>
                      </select>
                      </div>
                    </div>


              <div class="form-group">
                  
                  <div class="input-group">
                    
                    <span class="input-group-addon"><i class="fa fa-align-justify"></i></span>
                    <select class="form-control input-lg" name="nuevoTipoMantenimiento" id="combop" onchange="cambiarPreventivo()" required>
                      
                      <option value="">Tipo de mantenimiento</option>
                      <option value="Instalacion">Instalación</option>
                      <option value="Correctivo">Correctivo</option>         
                      <option value="Evaluacion">Evaluación</option>
                      <option value="Preventivo">Preventivo</option>
                    </select>
                  </div>
                </div>

                <div class="form-group" style="display: none;" id="campo_otroPr">

                      <div class="input-group">
                        
                        <span class="input-group-addon"><i class="fa fa-align-justify"></i></span>

                        <select class="form-control input-lg" name="nuevoPreventivo">
                        
                          <option value="Preventivo-1">1</option>
                          <option value="Preventivo-2">2</option>
                          <option value="Preventivo-3">3</option>
                          <option value="Preventivo-4">4</option>
                        </select>

                      </div>
                      
                    </div>

                <div class="form-group" style="display: none;">
                  
                  <div class="input-group">
                    
                    <span class="input-group-addon"><i class="fa fa-align-justify"></i></span>
                     <!-- <select class="form-control input-lg" name="nuevoperiodo">
                      
                      <option value="2019"> <?php //echo date("Y") ?></option>
                      <option value="2020">2020</option>
                      <option value="2021">2021</option>
                    </select> -->
                    <input type="text" class="form-control input-lg" name="nuevoperiodo" id="periodo" placeholder="tiempo" value="<?php echo date("Y")?>">
                  </div>
                </div>


              <script>

                function cambiarPreventivo() {
                //alert(document.getElementById('combo').value === "Otros");
                if (document.getElementById('combop').value === "Preventivo") {
                document.getElementById('campo_otroPr').style.display = 'block';
                document.getElementById('prevconproblemas').style.display = 'block';
                } else {
                document.getElementById('campo_otroPr').style.display = 'none';
                document.getElementById('prevconproblemas').style.display = 'none';
                }
                return true;
                }

              </script>
       
                    


                    <!-- Entrada para el mes id="Por ahora que no cargue el mes automaticamente"-->
                    <div class="form-group" id="campo_otroMes" style="display: none;">
                      <div class="input-group"> 
                        <span class="input-group-addon"><i class="fa fa-align-justify"></i></span>
                        <select class="form-control input-lg" id="mesesCargarlos" name="nuevoMes">

                          <!-- <option value="">Escoge el mes</option> -->

                          <?php 

                          if (date("F") == "January") {
                            echo '<option value="enerocr">enero</option>';
                          }else if(date("F") == "February"){
                            echo ' <option value="febrerocr">Febrero</option>';
                          }else if (date("F") == "March") {
                             echo ' <option value="marzocr">Marzo</option>';
                          }else if (date("F") == "May") {
                            echo '<option value="mayocr">mayo</option>';
                          }else if (date("F") == "June") {
                            echo '<option value="juniocr">Junio</option>';
                          }else if (date("F") == "July") {
                            echo '<option value="juliocr">julio</option>';
                          }else if (date("F") == "August") {
                            echo '<option value="agostocr">agosto</option>';
                          }else if (date("F") == "September") {
                            echo '<option value="septiembrecr">septiembre</option>';
                          }else if (date("F") == "October") {
                            echo '<option value="octubrecr">octubre</option>';
                          }else if (date("F") == "November") {
                             echo '<option value="noviembrecr">noviembre</option>';
                          }else if (date("F") == "December") {
                            echo '<option value="diciembrecr">diciembre</option>';
                          }

                          ?>
                        <!--   <option value="enerocr"><?php //echo date("F"); ?></option> 
                          <option value="febrerocr">Febrero</option>
                          <option value="marzocr">Marzo</option> 
                          <option value="abrilcr">Abril</option>
                          <option value="mayocr">Mayo</option> 
                          <option value="juniocr">Junio</option>
                          <option value="juliocr">Julio</option> 
                          <option value="agostocr">Agosto</option>
                          <option value="septiembrecr">Septiembre</option> 
                          <option value="octubrecr">Octubre</option>
                          <option value="noviembrecr">Noviembre</option> 
                          <option value="diciembrecr">Diciembre</option> -->

                        </select>
                      </div>
                    </div>

                    <div class="form-group" style="display: none;">
                      <div class="input-group"> 
                        <span class="input-group-addon"><i class="fa fa-align-justify"></i></span>
                        <input type="text" class="form-control input-lg" name="nuevoTiempo" placeholder="tiempo" value="<?php echo date("Y")  ?>">
                      </div>
                    </div>



                    <script>

                function cambiarSerie() {
                //alert(document.getElementById('combo').value === "Otros");
                if (document.getElementById('comboSerie').value === "") {
                document.getElementById('campo_otroSerie').style.display = 'none';
                } else if(document.getElementById('comboSerie').value === "Si"){
                document.getElementById('campo_otroSerie').style.display = 'block';
                }
                return true;
                }

              </script>
                <!-- ENTRADA PARA EL TIPO DE MANTENIMIENTO -->

                 <input type="hidden" name="nuevoNumero" value="1">

                <!--  <script type="text/javascript">
                              $(document).ready(function(){
                                $('#nuevoSerieM').val();
                                recargarInstrumentos();
                                recargarTrabajos();
                            
                                $('#nuevoSerieM').change(function(){
                                  recargarInstrumentos();
                                  recargarTrabajos();
                                });
                              })
                      </script> -->
                      <script type="text/javascript">
                              $(document).ready(function(){
                                $('#nuevoSerieM').val();
                                recargarMeses();
                            
                                $('#nuevoSerieM').change(function(){
                                  recargarMeses();
                                });
                              })
                      </script>
                      
                <!-- SEDE -->
                <div class="form-group">
                  
                  <div class="input-group">
                    
                    <span class="input-group-addon"><i class="fa fa-align-justify"></i></span>
                    <input type="text" class="form-control input-lg" name="nuevoSede" placeholder="Sede" required>
                  </div>
                </div>               
               
                    <!-- /input-group -->
                
                  <!-- /.col-lg-6 -->
                  
                    <div class="form-group" style="display: none;" id="prevconproblemas">
                      <div class="input-group">
                        
                        <span class="input-group-addon"><i class="fa fa-align-justify"></i></span>
                        <select class="form-control input-lg" name="nuevoPreventivoProblemas">
                          
                          <option value="">Preventivo con Problema</option>
                          <option value="Si">Si</option>
                          <option value="No">No</option>
                        </select>
                      </div>
                    </div>
                    
                    <!-- /input-group -->
                  
                  <!-- /.col-lg-6 -->
               
                <div class="row">
                  <div class="col-lg-6">
                    <div class="form-group">
                      <div class="input-group">
                        
                        <span class="input-group-addon"><i class="fa fa-user"></i></span>
                        <input type="text" class="form-control input-lg" name="nuevoReportadoPor" placeholder="Reportado Por" required>
                      </div>
                    </div>
                    <!-- /input-group -->
                  </div>
                  <!-- /.col-lg-6 -->
                  <div class="col-lg-6">
                    <div class="form-group">
                      <div class="input-group">
                        
                        <span class="input-group-addon"><i class="fa fa-user"></i></span>
                        <input type="text" class="form-control input-lg" name="nuevoCargo" placeholder="Cargo" required>
                      </div>
                    </div>
                    
                    <!-- /input-group -->
                  </div>
                  <!-- /.col-lg-6 -->
                </div>
                <!-- SOLICITUD NUMERO -->
                <div class="form-group">
                  
                  <div class="input-group">
                     
                    <span class="input-group-addon"><i class="fa fa-align-justify"></i></span>
                    <input type="text" class="form-control input-lg" name="nuevoSolicitud" placeholder="Solicitud No" required>
                  </div>
                </div>
                <div class="form-group">
                  <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-align-justify"></i></span>
                    <textarea class="form-control" rows="3" name="nuevoDiagnostico" placeholder="Diagnostico" required></textarea>
                  </div>
                </div>
                <h4>Trabajos Realizados</h4>
          
                    <!-- <div class="form-group" id="trabajosCargados">      
                    
                    </div> -->



          <div class="form-group"> 
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-wrench"></i></span>
                <select class="form-control select2" name="trabajo[]" multiple="multiple" data-placeholder="Trabajos Realizados"
                        style="width: 100%;">

                  <?php

                   $item = null;
                   $valor = null;
                   $orden = "id_trabajo";

                   $trabajos = controladorTrabajos::ctrMostrarTrabajos($item, $valor, $orden);

                   foreach ($trabajos as $key => $value) {
                     echo '<option value="'.$value["nombre"].'">'.$value["nombre"].'</option>';
                   }
                
                ?>

  
                </select>

                </div>


              </div>

                <h4>Nuevos Instrumentos</h4>

                    <div class="form-group">

              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-wrench"></i></span>
                <select class="form-control select2" id="instrumentos" name="nuevoInstrumentos[]" multiple="multiple" data-placeholder="Instrumentos utilizados" style="width: 100%;">

                <?php

                   $item5 = null;
                   $valor5 = null;
                   $orden5 = "id_instrumentos";

                   $instrumentos = controladorInstrumentos::ctrMostrarInstrumentos($item5, $valor5, $orden5);

                   foreach ($instrumentos as $key => $value5) {
                     echo '<option value="'.$value5["nombre"].'">'.$value5["nombre"].'</option>';

                   }

                
                ?>

               
                </select>

              </div>


              </div>

                <!-- <div class="form-group" id="instrumentosCargados">      
                    
                </div> -->
                

                <h3 class="box-title">Mediciones</h3>

                <h4>Opciones de la tabla</h4>

                <div class="form-group" id="ventilador25" style="display: none;">      
                    <select name="value" id="ventilador">
                        <option value="">Seleccione la opción</option>
                      <option value="adulto">Adulto</option>
                      <option value="pediatrico">Pediatrico</option>
                      <option value="neonatal">Neonatal</option></select>
                </div>
                <div class="form-group" id="pipeta25" style="display: none;">      
                    <select name="value" id="pipeta">
                        <option value="">Seleccione la opción</option>
                      <option value="apto">Apto</option>
                      <option value="noapto">No Apto</option>
                    </select>
                </div>
                <div class="form-group" id="incubadora25" style="display: none;">      
                    <select name="value" id="incubadora">
                        <option value="">Seleccione la opción</option>
                      <option value="centigrado">Centigrado</option>
                      <option value="farenheit">Farenheit</option>
                    </select>
                </div>
                 <div class="form-group" id="vasculas25" style="display: none;">      
                    <select name="value" id="vasculas">
                        <option value="">Seleccione la opción</option>
                      <option value="kg">kg</option>
                      <option value="g">g</option>
                    </select>
                </div>

                <div class="form-group" id="monitor25" style="display: none;">      
                    <select name="value" id="monitor">
                        <option value="">Seleccione la opción</option>
                      <option value="adulto">Adulto</option>
                      <option value="pediatrico">Pediatrico</option>
                      <option value="neonatal">Neonatal</option></select>
                    </select>
                </div>

                <div class="form-group" id="succionador25" style="display: none;">      
                    <select name="value" id="succionador">
                        <option value="">Seleccione la opción</option>
                      <option value="mmHg">mmHg</option>
                      <option value="inHg">inHg</option>
                      <option value="Mpa">Mpa</option>
                      <option value="nueva">Nueva</option>
                    </select>
                    </select>
                </div>

                <div id="mediciones" class=" table-responsive no-padding">
                    
                </div>

                 <script type="text/javascript">
                          $(document).ready(function(){
                            $('#nuevoSerieM').val();
                                recargarMediciones();
                                    
                            $('#nuevoSerieM').change(function(){
                                recargarMediciones();
                                });
                              })
                    </script>
                
              
                <!-- <div class="form-group">
                  <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-align-justify"></i></span>
                    <textarea class="form-control" rows="3" name="nuevoInstrumentos" placeholder="Instrumentos Utilizados" required></textarea>
                  </div>
                </div> -->
                <div class="form-group">
                  <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-align-justify"></i></span>
                    <textarea class="form-control" rows="3" name="nuevoRecomendaciones" placeholder="Recomendaciones" required></textarea> 
                  </div>
                </div>
                <div class="form-group">
                  <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-align-justify"></i></span>
                    <textarea class="form-control" rows="3" name="nuevoAccesorios" placeholder="Accesorios y repuestos instalados" required></textarea>
                  </div>
                </div>
                <div class="form-group">
                  <div class="input-group"> 
                    
                    <span class="input-group-addon"><i class="fa fa-align-justify"></i></span>
                    <select class="form-control input-lg" id="combo" onchange="cambiar()" name="nuevoFueraServicio" required>
                      
                      <option value="">Equipo fuera de servicio</option>
                      <option value="Si">Si</option>
                      <option value="No">No</option>
                    </select>
                  </div>
                </div>
                
                <script>
                function cambiar() {
                //alert(document.getElementById('combo').value === "Otros");
                if (document.getElementById('combo').value === "Si") {
                document.getElementById('campo_otro').style.display = 'block';
                } else {
                document.getElementById('campo_otro').style.display = 'none';
                }
                return true;
                }
                </script>
                <div class="form-group">
                  
                  <div class="input-group" id="campo_otro" style="display: none">
                    
                    <input type="text" class="form-control input-lg" name="nuevoAfirmativo" placeholder="En caso de afirmativo cual es el motivo" style="margin-bottom: 15px;">
                  </div>
                </div>
                <div class="form-group">
                  <div class="input-group">
                    
                    
                    <select class="form-control input-lg" name="nuevoretirado">
                      
                      <option value="">Equipo requiere ser retirado de la institución para ser:</option>
                      <option value="no aplica">No aplica</option>
                      <option value="Evaluado">Evaluado</option>
                      <option value="Reparado">Reparado</option>
                    </select>
                  </div>
                </div>
                <div class="row">
                  <div class="col-lg-6">
                    <div class="form-group">
                      <label>Fecha de servicio:</label> 
                      <div class="input-group date">
                        <div class="input-group-addon">
                          <i class="fa fa-calendar"></i>
                        </div>
                        <input type="date" value="<?php echo date("Y-m-d");?>" class="form-control pull-right" name="fechaServicio" readonly>
                      </div>
                      
                    </div>
                  </div>

                  <div class="col-lg-6">
                    <div class="form-group">
                      <label>Fecha para el proximo mantenimiento:</label>
                      <div class="input-group date">
                        <div class="input-group-addon">
                          <i class="fa fa-calendar"></i>
                        </div>

                        <input type="date" class="form-control pull-right" min="<?php echo date("Y-m-d"); ?>" name="fechaProximo">

                      </div>
                      
                    </div>
                    
                    
                  </div>
                  
                </div>

            <!-- ENTRADA PARA SUBIR FIRMA -->

               <!-- <div class="form-group">
                
                <div class="panel"><label>Firma de Recibido</label></div>
  
                <input type="file" class="nuevaFirma" name="nuevaFirma">
  
                <p class="help-block">Peso máximo de la firma 2MB</p>
  
                <img src="vistas/img/firmas/brayan/firma.png" class="img-thumbnail previsualizarFirma"  width="100px">
  
              </div> -->

            <!-- ENTRADA PARA SUBIR FIRMA Y NO LO GUARDE O PUEDA DESCARGAR -->

            <!--<div class="form-group">

            <div class="panel"><label>Firma de quien realiza</label></div>

              <p class="typeItDesc">Escribe tu firma</p>

  					    <p class="drawItDesc">Escribe tu firma</p>

  					    <ul class="sigNav">

  					      <li class="drawIt"><a href="#draw-it">Activar Firma</a></li>

  					    </ul>
  					    <div class="sig sigWrapper">

  					  <div class="typed"></div>

  					    <canvas class="pad" width="350" height="90"></canvas>

               

  					  <input type="hidden" name="output" class="output">

  					</div>
                <br>
            <button id="save-png" type="button" class="btn btn-primary">Guardar</button>
            <button id="clear" type="button" class="btn btn-secondary">Borrar</button>
              
          </div>-->
          <input type="hidden" name="nuevoFirmaRealiza" value="vistas/img/firmas/defecto/defectoqr.png">

              <div class="form-group">
                
                <div class="panel"><label>Firma de quien realiza el mantenimiento</label></div>
  
                <input type="file" class="nuevaFirmaRealizada" name="nuevaFirmaRealizada">
  
                <p class="help-block">Peso máximo de la firma 2MB</p>

                <?php

                if ($_SESSION["perfil"] == "Ingeniero") 
                {
                  echo '<img src="'.$_SESSION["firma"].'"'; echo 'class="img-thumbnail previsualizarFirmaRealizada"  width="100px">  
                  <input type="hidden" name="cargarFirmaNueva" value="'.$_SESSION["firma"].'">';
                }
                else if ($_SESSION["perfil"] == "Administrador") 
                {
                  echo '<img src="vistas/img/firmas/defecto/defecto.png" class="img-thumbnail previsualizarFirmaRealizada"  width="100px"> 
                  <input type="hidden" name="cargarFirmaNueva" value="vistas/img/firmas/defecto/defecto.png">';
                }

                ?>
<!--                   <img src="vistas/img/firmas/brayan/firma.png" class="img-thumbnail previsualizarFirmaRealizada"  width="100px">
 -->
                              
              </div>


   
              </div>

              <?php

                $item = null;                    
                $valor = null;
                $orden = null; 
                $perfil = null;

                $mantenimiento = ControladorMantenimiento::ctrMostrarModelos($item, $valor,$orden,$perfil);

                if(!$mantenimiento){

                      echo '
                <label>Numero de reporte(Checkear antes de enviar el formulario)</label>
                <div class="form-group">                 
                  <div class="input-group margin">
                <input type="text" class="form-control" value="14501" name="nuevoNumReporte" readonly>
                    <span class="input-group-btn">
                      <button type="button" class="btn btn-info btn-flat btnmirarreporte">Click!</button>
                    </span>
              </div>
            </div>';
                  
                    }

                    else
                      
                    {

                      foreach ($mantenimiento as $key => $value) {                             

                    }

                      $reporte1 = $value["num_reporte"] + 1;



                      echo ' 
<label>Numero de reporte(Checkear antes de enviar el formulario)</label>
                      <div class="form-group">                 
                  <div class="input-group margin">
                <input type="text" class="form-control" value="'.$reporte1.'" id="informeCapturado"  name="nuevoNumReporte" readonly>
                    <span class="input-group-btn">
                      <button type="button" class="btn btn-info btn-flat btnmirarreporte" reporteNum="'.$reporte1.'">Check!</button>
                    </span>
              </div>
            </div>';

                      }

                ?>
            </div>
            <!--=====================================
            PIE DEL MODAL
            ======================================-->
            <div class="modal-footer">
              <button type="submit" class="btn btn-primary" id="boton">Guardar Mantenimiento</button>
            </div>
            <?php
            $crearMantenimiento = new ControladorMantenimiento();
            $crearMantenimiento -> ctrCrearMantenimiento();
            ?>
            <!-- <a data-toggle="modal" data-target="#modal-firma" class="btn btn-app"><i class="fa fa-edit"></i> firma</a> -->
          </form>
            
        </div>
        
      </div>

      <div class="col-lg-6 hidden-md hidden-sm hidden-xs">
        <div class="box box-warning">
          <div class="box-header with-border">
            <h3 class="box-title">Equipos Creados</h3> 
          </div>
           <div class="box-body">
            <!-- <div class="row" style="margin-top: 10px;">
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
            
            <table class="table table-bordered table-striped dt-responsive tablas" id="table-id">
              
              <thead>
                <tr>
                  <th style="width: 0px">#</th>
                  <th>Cliente</th>
                  <th>Equipo</th>
                  <th>Marca</th>
                  <th>Modelo</th>
                  <th>Serie</th>
                </tr>
              </thead>
              <tbody>
                   <?php

                    $item = null;
                    $valor = null;
                    $orden = "id_equipo";
                    $select = null;

                    $equipos = controladorEquipos::ctrMostrarEquipos($item, $valor, $orden,$select);
                     foreach ($equipos as $key => $value) {

                    echo '<tr>';

                      $item1 = "id";
                      $valor1 = $value["id_usuario"];
                      $perfil1 = null;

                      $cliente = ControladorUsuarios::ctrMostrarUsuarios($item1, $valor1, $perfil1);

                    echo '
                      <td>'.($key+1).'</td>
                      <td>'.$cliente["nombre"].'</td>
                      <td>'.$value["equipo"].'</td>
                      <td>'.$value["marcaText"].'</td>
                      <td>'.$value["modelo"].'</td>
                      <td>'.$value["serie"].'</td>
                    </tr>';

                   }

                    ?>
              </tbody>
            </table>
            <!--    Start Pagination -->
           <!--    <div class='pagination-container' >
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
    </div>

  </section>
</div>

<!--Modal de la firma-->

<div class="modal fade" id="modal-firma">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Crear La firma</h4>
      </div>

      <div class="modal-body">
        <canvas id="signature-pad" class="signature-pad" width=400 height=200></canvas>
      </div>

      <div class="modal-footer">
        <button id="save-png" class="btn btn-primary">Guardar</button>
        <button id="clear" class="btn btn-secondary">Borrar</button> 
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>

<script type="text/javascript">
	$(document).ready(function () {
  $('.sigPad').signaturePad();
});
</script>


