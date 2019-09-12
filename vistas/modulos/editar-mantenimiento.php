<div class="content-wrapper">
  <section class="content-header">
    
    <h1>
     
    Editar manteniemiento 
     
    </h1> 
    <ol class="breadcrumb">
      
      <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>
      
      <li class="active">Editar manteniemiento</li>
      
    </ol> 
  </section>
  <section class="content">
    <div class="row">
      <!--=====================================
      EL FORMULARIO
      ======================================-->
      
      <div class="col-lg-6 col-xs-12">
        
        <div class="box box-success">
          
          <div class="box-header with-border"></div>
          <form role="form" method="post" class="sigPad" enctype="multipart/form-data">
            
            <div class="box-body">
              <div class="box">
                
                <?php
                if ($_GET["idMantenimiento"] != "undefined") {
                  $item = "id_reporte";
                  $valor = $_GET["idMantenimiento"];
                  $orden = null;
                  $perfil1 = null;
                  $mantenimiento = ControladorMantenimiento::ctrMostrarModelos($item, $valor,$orden,$perfil1);
                  $trabajoRealizado = explode(" - ", $mantenimiento["trabajo"]);
                  $item1 = "id";
                  $valor1 = $mantenimiento["id_clinica"];
                  $perfil = null;
                  $clinica = ControladorUsuarios::ctrMostrarUsuarios($item1, $valor1, $perfil);
                  $item2 = "cliente";
                  $valor2 = $mantenimiento["id_clinica"];
                  $select2 = null;
                  $cronograma =  ControladorCronograma::ctrMostrarCronogramas($item2, $valor2, $select2);

                }else if ($_GET["idMantenimientoNo"] != "undefined") {

                  $item = "id_reporte";
                  $valor = $_GET["idMantenimientoNo"];
                  $orden = null;
                  $perfil1 = null;
                  $mantenimiento = ControladorMantenimiento::ctrMostrarModelosno($item, $valor,$orden,$perfil1);
                  $trabajoRealizado = explode(" - ", $mantenimiento["trabajo"]);
                  $item1 = "id";
                  $valor1 = $mantenimiento["id_clinica"];
                  $perfil = null;
                  $clinica = ControladorUsuarios::ctrMostrarUsuarios($item1, $valor1, $perfil);
                  $item2 = "cliente";
                  $valor2 = $mantenimiento["id_clinica"];
                  $select2 = null;
                  $cronograma =  ControladorCronograma::ctrMostrarCronogramas($item2, $valor2, $select2);
                }

              



                
                ?>
                <!-- Numero de reporte -->
                <div class="form-group">
                  
                  <div class="input-group"> 
                    
                    <span class="input-group-addon"><i class="fa fa-user"></i></span>
                    <input type="number" class="form-control input-lg" value="<?php echo $mantenimiento["num_reporte"] ?>" name="editarNumReporte" placeholder="Numero del reporte" readonly>
                    <input type="hidden" name="idMantenimiento" value="<?php echo $mantenimiento["id_reporte"]; ?>">
                  </div>
                </div>
                <!-- ENTRADA PARA SELECCIONAR LA CLINICA -->
                <div class="row">
                  <div class="col-lg-6">
                  <label>Clinica</label>
                    <div class="form-group">
                      <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-users"></i></span>
                        <select class="form-control input-lg select2" id="nuevoClienteM" style="width: 100%;" name="editarClienteM">
                          <option value="<?php echo $clinica["id"]; ?>"><?php echo $clinica["nombre"]; ?></option>
                          
                          <?php
                    

                              $item = null;
                              $valor = "cliente";
                              $perfil = "perfil";
      
                              $cliente = ControladorUsuarios::ctrMostrarUsuarios($item, $valor, $perfil)    ;
                              foreach ($cliente as $key => $value) {
                                echo '<option value="'.$value["id"].'">'.$value["nombre"].'</option>';
                         }
                          
                          ?>
                        </select>
                      </div>
                    </div>
                  </div>                                 
                <!-- ENTRADA PARA SELECCIONAR SU EQUIPO -->
                  <div class="col-lg-6"> 
                    <label>Equipo</label>
                    <div class="form-group">
                      
                      <div class="input-group">
                        
                        <span class="input-group-addon"><i class="fa fa-align-justify"></i></span>
                        <select class="form-control input-lg select2" id="nuevoEquipoM" style="width: 100%;" name="editarEquipoM">
                          <option value="<?php echo $mantenimiento["equipo_re"]; ?>"><?php echo $mantenimiento["equipo_re"]; ?></option>
                          <?php
                          
                          $itemE = null;
                          $valorE = null;
                          $ordenE = "id_equipo";
                          $selectE = null;

                          $equipos = controladorEquipos::ctrMostrarEquipos($itemE, $valorE,$ordenE,$selectE);
                          foreach ($equipos as $key => $value){
                          echo '<option value="'.$value["equipo"].'">'.$value["equipo"].'</option>';
                          }
                          ?>
                        </select>
                      </div>
                    </div>
                  </div>
                <!--   <script type="text/javascript">
                        $(document).ready(function(){
                              $('#nuevoClienteM').val();
                              recargarEquipoMantenimiento();
                                  
                              $('#nuevoClienteM').change(function(){
                              recargarEquipoMantenimiento();
                                  });
                            })
                  </script> -->
                </div>
                <div class="row">
                  <div class="col-lg-6">
                  
                    <label>Marca</label>
                    <div class="form-group">
                      <!-- ENTRADA PARA SELECCIONAR SU MARCA -->
                      <div class="input-group">
                        
                        <span class="input-group-addon"><i class="fa fa-align-justify"></i></span>
                        <select class="form-control input-lg select2" style="width: 100%;" id="nuevoMarcaM" name="editarMarcaM">
                          <option value="<?php echo $mantenimiento["marca_re"]; ?>"><?php echo $mantenimiento["marca_re"]; ?></option>

                          <?php
                          
                          $itemM = null;
                          $valorM = null;
                          $ordenM = "id_equipo";
                          $selectM = null;
                          $equiposM = controladorEquipos::ctrMostrarEquipos($itemM, $valorM,$ordenM,$selectM);
                          foreach ($equiposM as $key => $value)
                          {
                          echo '<option value="'.$value["marcaText"].'">'.$value["marcaText"].'</option>';
                          }

                          ?>
                        </select>
                      </div>
                    </div>
                  </div>

                  <!-- ENTRADA PARA SELECCIONAR SU MODELO -->
               <!--  <script type="text/javascript">
                          $(document).ready(function(){
                            $('#nuevoEquipoM').val();
                                recargarMarcaMantenimiento();
                                    
                            $('#nuevoEquipoM').change(function(){
                                recargarMarcaMantenimiento();
                                });
                              })
                    </script> -->
                  
                  <div class="col-lg-6">
                    <!-- ENTRADA PARA SELECCIONAR EL MODELO -->
                    <label>Modelo</label>
                    <div class="form-group">
                      
                      <div class="input-group">
                        
                        <span class="input-group-addon"><i class="fa fa-align-justify"></i></span>
                        <select class="form-control input-lg select2" style="width: 100%;" id="nuevoModeloM" name="editarModeloM">
                          <option value="<?php echo $mantenimiento["modelo_re"]; ?>"><?php echo $mantenimiento["modelo_re"]; ?></option>
                          <?php
                          
                          $itemMo = null;
                          $valorMo = null;
                          $ordenMo= "id_equipo";
                          $selectMo = null;

                          $equiposMo = controladorEquipos::ctrMostrarEquipos($itemMo, $valorMo,$ordenMo, $selectMo);
                          foreach ($equiposMo as $key => $value){

                            echo '<option value="'.$value["modelo"].'">'.$value["modelo"].'</option>';

                          }
                          
                          ?>
                        </select>
                        
                      </div>
                    </div>
                  </div>
                </div>
<!-- 
                <script type="text/javascript">
                          $(document).ready(function(){
                            $('#nuevoMarcaM').val();
                                recargarModeloMantenimiento();
                                    
                            $('#nuevoMarcaM').change(function(){
                                recargarModeloMantenimiento();
                                });
                             })
                </script>   -->      

                    <div class="form-group" style="display: none;">
                      <div class="input-group"> 
                        <span class="input-group-addon"><i class="fa fa-align-justify"></i></span>
                        <select class="form-control input-lg" onclick="cambiarSerie()" id="comboSerie">
                          <option value="">¿Desea agregar una nueva serie? </option>
                          <option value="Si">Si</option>
                          <option value="No">No</option>
                        </select>
                      </div>
                    </div>

            
                
                <script>
                    function cambiarSerie() {
                      if (document.getElementById('comboSerie').value =="Si") {
                        document.getElementById('campo_otroSerie').style.display = 'block'
                        document.getElementById('campo_otroSerie1').style.display = 'none';
                      } else {
                        document.getElementById('campo_otroSerie').style.display = 'none';
                        document.getElementById('campo_otroSerie1').style.display = 'block';
                      }
                      return true;
                    }
                </script>
                <!--Entrada para la serie nueva-->
                <div class="form-group" id="campo_otroSerie" style="display: none;">          
                  <div class="input-group">                   
                    <span class="input-group-addon"><i class="fa fa-align-justify"></i></span>
                    <input type="text" class="form-control input-lg" id="serieValida" name="editarSerieNuevo" placeholder="Escriba la nueva serie Serie">
                  </div>
                </div>


                <!-- ENTRADA PARA LA SERIE -->
              
                <label>Serie</label>                 

                   <div class="form-group" id="campo_otroSerie1" >
                      
                      <div class="input-group">
                        
                        <span class="input-group-addon"><i class="fa fa-align-justify"></i></span>
                        <select class="form-control input-lg select2 serieInstrumentoEditar serieMes" style="width: 100%;" name="editarSerie" id="serieEditar" required>
                          <option value="<?php echo $mantenimiento["serie"]; ?>"><?php echo $mantenimiento["serie"]; ?></option>
                          <?php
                          
                          // $itemS = null;
                          // $valorS = null;
                          // $ordenS ="id_equipo";
                          // $selectS = null;

                          // $equiposs = controladorEquipos::ctrMostrarEquipos($itemS, $valorS,$ordenS,$selectS);
                          // foreach ($equiposs as $key => $value){

                          // echo '<option value="'.$value["serie"].'">'.$value["serie"].'</option>';
                          
                          // }

                          ?>
                        </select>
                      </div>
                    </div> 

                      <!-- ENTRADA PARA SELECCIONAR EL CODIGO-->
                      <label>Codigo</label>
                 <div class="form-group">
                      
                   <div class="input-group">                       
                     <span class="input-group-addon"><i class="fa fa-align-justify"></i></span>
                        <select class="form-control input-lg select2" style="width: 100%;" name="editarCodigo" id="editarCodigo">
                          <option value="<?php echo $mantenimiento["codigo"]; ?>"><?php echo $mantenimiento["codigo"]; ?></option>
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

            

                    <!-- <script type="text/javascript">
                          $(document).ready(function(){
                            $('#nuevoModeloM').val();
                                recargarSerieMantenimiento();
                                    
                            $('#nuevoModeloM').change(function(){
                                recargarSerieMantenimiento();
                                });
                              })
                    </script> -->
                  <!-- SEDE -->
              <label>Sede</label>
                <div class="form-group">               
                  <div class="input-group">          
                    <span class="input-group-addon"><i class="fa fa-align-justify"></i></span>
                    <input type="text" class="form-control input-lg" value="<?php echo $mantenimiento["sede"]; ?>" name="editarSede" placeholder="Sede" required>
                  </div>
                </div>

                 <div class="form-group">
                  
                  <div class="input-group">
                    
                    <span class="input-group-addon"><i class="fa fa-align-justify"></i></span>
                    <select class="form-control input-lg" name="editarPeriodo" required>
                      
                      <option value="<?php echo $cronograma["tiempo"]; ?>"><?php echo $cronograma["tiempo"]; ?></option>
                    </select>
                  </div>
                </div> 

                 <div class="form-group" id="campo_otroMes">
                      <div class="input-group"> 
                        <span class="input-group-addon"><i class="fa fa-align-justify"></i></span>
                        <select class="form-control input-lg" name="EditarMes" required>
                            
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
                            
                          <!--<option value="">Escoja de nuevo el mes</option>
                          <option value="enerocr">Enero</option> 
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
                          <option value="diciembrecr">Diciembre</option>-->

                        </select>
                      </div>
                    </div>

                <!-- ENTRADA PARA EL TIPO DE MANTENIMIENTO -->
                <input type="hidden" name="editarNumero" value="<?php echo $mantenimiento["numero"]; ?>">
                <label>Tipo de mantenimiento</label>
                <div class="form-group">
                  <div class="input-group">
                    
                    <span class="input-group-addon"><i class="fa fa-align-justify"></i></span>
                    <select class="form-control input-lg" name="editarTipoMantenimiento" id="combop" onchange="cambiarPreventivo()">
                      
                      <option value="<?php echo $mantenimiento["tipo_manteniemiento"]; ?>"><?php echo $mantenimiento["tipo_manteniemiento"]; ?></option>
                      <option value="Correctivo">Correctivo</option>
                      <option value="Instalacion">Instalación</option>
                      <option value="Evaluacion">Evaluación</option>
                      <option value="Preventivo">Preventivo</option>
                    </select>
                  </div>
                </div>
                <script>
                    function cambiarPreventivo() 
                    {
                    //alert(document.getElementById('combo').value === "Otros");
                    if (document.getElementById('combop').value === "Preventivo") 
                    {
                    document.getElementById('campo_otroPr').style.display = 'block';
                    document.getElementById('prevconproblemas').style.display = 'block';
                    } else {
                    document.getElementById('campo_otroPr').style.display = 'none';
                    document.getElementById('prevconproblemas').style.display = 'none';
                    }
                    return true;
                    }
                </script>
                  
                    
                    <div class="form-group" style="display: none;" id="campo_otroPr">
                      <label>Preventivo</label>
                      <div class="input-group">
                        
                        <span class="input-group-addon"><i class="fa fa-align-justify"></i></span>
                        <select class="form-control input-lg" name="editarPreventivo">
                          
                          <option value="<?php echo $mantenimiento["preventivo"]; ?>"><?php echo $mantenimiento["preventivo"]; ?></option>
                          <option value="1">1</option>
                          <option value="2">2</option>
                          <option value="3">3</option>
                          <option value="4">4</option>
                        </select>
                      </div>
                    </div>
                    <!-- /input-group -->
                  
                  <!-- /.col-lg-6 -->
                 
                    
                    <div class="form-group" style="display: none;" id="prevconproblemas">
                      <label>Preventivo con problema</label>
                      <div class="input-group">
                        
                        <span class="input-group-addon"><i class="fa fa-align-justify"></i></span>
                        <select class="form-control input-lg" name="editarPreventivoProblemas">
                          
                          <option value="<?php echo $mantenimiento["preventivo_problema"]; ?>"><?php echo $mantenimiento["preventivo_problema"]; ?></option>
                          <option value="Si">Si</option>
                          <option value="No">No</option>
                        </select>
                      </div>
                    </div>
                    
                    <!-- /input-group -->
                  
                
                <div class="row">
                  <div class="col-lg-6">
                    <label>Reportado Por</label>
                    <div class="form-group">
                      <div class="input-group">
                        
                        <span class="input-group-addon"><i class="fa fa-user"></i></span>
                        <input type="text" class="form-control input-lg" name="editarReportadoPor" placeholder="Reportado Por" value="<?php echo $mantenimiento["reportado"]; ?>"  required>
                      </div>
                    </div>
                    <!-- /input-group -->
                  </div>
                  <!-- /.col-lg-6 -->
                  <div class="col-lg-6">
                    <label>Cargo</label>
                    <div class="form-group">
                      <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-user"></i></span>
                        <input type="text" class="form-control input-lg" name="editarCargo" placeholder="Cargo" value="<?php echo $mantenimiento["cargo"]; ?>" required>
                      </div>
                    </div>
                    
                    <!-- /input-group -->
                  </div>
                  <!-- /.col-lg-6 -->
                </div>
                <!-- SOLICITUD NUMERO -->
                <label>Nolicitud No</label>
                <div class="form-group">
                  
                  <div class="input-group">
                    
                    <span class="input-group-addon"><i class="fa fa-align-justify"></i></span>
                    <input type="text" class="form-control input-lg" name="editarSolicitud" placeholder="Solicitud No" value="<?php echo $mantenimiento["solicitud"]; ?>" required>
                  </div>
                </div>
                <label>Diagnostico</label>
                <div class="form-group">
                  <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-align-justify"></i></span>
                    <textarea class="form-control" rows="3" name="editarDiagnostico" placeholder="Diagnostico"><?php echo $mantenimiento["diagnostico"]; ?> </textarea>
                  </div>
                </div>
                <h4>Trabajo Realizado</h4> 
                    
                    <div class="form-group" id="trabajosCargadosEditar">

                    </div>
                <h4>Instrumentos Utilizados</h4>

                <div class="form-group" id="instrumentosCargadosEditar"> 

                </div>
                
                <script type="text/javascript">
                              $(document).ready(function(){
                                $('#serieEditar').val();
                                recargarInstrumentosEditar();
                                recargarTrabajosEditar();
                            
                                $('#serieEditar').change(function(){
                                  recargarInstrumentosEditar();
                                  recargarTrabajosEditar();
                                });
                              })
                      </script>
                <label>Recomendaciones</label>
                <div class="form-group">
                  <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-align-justify"></i></span>
                    <textarea class="form-control" value="<?php echo $mantenimiento["instrumentos"]; ?>" rows="3" name="editarRecomendaciones" placeholder="Recomendaciones"><?php echo $mantenimiento["recomendaciones"]; ?></textarea>
                  </div>
                </div>
                <label>Accesorios y repuestos instalados</label>
                <div class="form-group">
                  <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-align-justify"></i></span>
                    <textarea class="form-control" rows="3" name="editarAccesorios" placeholder="Accesorios y repuestos instalados" value="<?php echo $mantenimiento["accesorios"]; ?>"><?php echo $mantenimiento["accesorios"]; ?></textarea>
                  </div>
                </div>
                <label>Equipo fuera de servicio</label>
                <div class="form-group">
                  <div class="input-group">
                    
                    <span class="input-group-addon"><i class="fa fa-align-justify"></i></span>
                    <select class="form-control input-lg" id="combo" onchange="cambiar()" name="editarFueraServicio">
                      
                      <option value="<?php echo $mantenimiento["equipo_servicio"]; ?>"><?php echo $mantenimiento["equipo_servicio"]; ?></option>
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
                  
                  <div class="input-group" id="campo_otro" style="display: none;">
                    
                    <input type="text" value="<?php echo $mantenimiento["servicio_motivo"]; ?>" class="form-control input-lg" name="editarAfirmativo" placeholder="En caso de afirmativo cual es el motivo" style="margin-bottom :15px;">
                  </div>
                </div>
                <label>Equipo requiere ser retirado de De la instalación para ser</label>
                <div class="form-group">
                  <div class="input-group">
                    <select class="form-control input-lg" name="editarretirado">
                      <option value="<?php echo $mantenimiento["equipo_evaluado"]; ?>"><?php echo $mantenimiento["equipo_evaluado"]; ?></option>
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
                        <input type="date" class="form-control pull-right" name="editarfechaServicio"  value="<?php echo $mantenimiento["fecha_inicio"]; ?>" readonly >
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
                        <input type="date" class="form-control pull-right" min="<?php echo date("Y-m-d"); ?>" name="editarfechaProximo" value="<?php echo $mantenimiento["fecha_proximo"]; ?>">
                      </div>
                      
                    </div>
                    
                    
                  </div>
                  
                </div>
                <!-- ENTRADA PARA SUBIR FIRMA -->
          

                    <!-- ENTRADA PARA SUBIR FIRMA Y NO LO GUARDE O PUEDA DESCARGAR -->
     <!--        <div class="form-group">

            <div class="panel"><label>Firma de quien realiza</label></div>

              <p class="typeItDesc">Escribe tu firma</p>

                <p class="drawItDesc">Escribe tu firma</p>

                <ul class="sigNav">

                  <li class="drawIt"><a href="#draw-it">Activar Firma</a></li>

                  

                </ul>
            <div class="sig sigWrapper">

              <div class="typed"></div>

                <canvas class="pad" width="350" height="90"></canvas>

                <canvas id="signature-pad" class="signature-pad pad" width=400 height=80></canvas> 

              <input type="hidden" name="output" class="output">

            </div>
                <br>
            <button id="save-png" type="button" class="btn btn-primary">Guardar</button>
            <button id="clear" type="button" class="btn btn-secondary">Borrar</button>
              
          </div>

                <div class="form-group">
                
                <div class="panel"><label>Firma de quien realiza el mantenimiento</label></div>
  
                <input type="file" class="nuevaFirmaRealizada" name="editarFirmaRealizada">

                <input type="hidden" name="firmaActual" id="firmaActual">
  
                <p class="help-block">Peso máximo de la firma 2MB</p>

                <?php

        

                // if ($mantenimiento["firmarealizaMan"] == "") {
                //   echo '<img src="vistas/img/firmas/brayan/firma.png" class="img-thumbnail previsualizarFirma" width="100px">';
                //   }else{
                //   echo '<img src="'.$mantenimiento["firmarealizaMan"].'" class="img-thumbnail previsualizarFirma" width="100px">';
                //   }


                ?>
                              
              </div>  -->
      
              </div>
            </div>
            <!--=====================================
            PIE DEL MODAL
            ======================================-->
            <div class="modal-footer">
              <button type="submit" class="btn btn-primary">Editar Mantenimiento</button>
            </div>

            <?php
              if ($_GET["idMantenimiento"] != "undefined") {

                  $editarMantenimiento = new ControladorMantenimiento();
                  $editarMantenimiento -> ctrEditarMantenimiento();

              }else if ($_GET["idMantenimientoNo"] != "undefined") {
                  $editarMantenimientoNo = new ControladorMantenimiento();
                  $editarMantenimientoNo -> ctrEditarMantenimientoNo();              }

            ?>

            
          </form>
          
          
        </div>
        
      </div>
      <!--=====================================
      LA TABLA DE PRODUCTOS
      ======================================-->
      <div class="col-lg-6 hidden-md hidden-sm hidden-xs">
        
        <div class="box box-warning">
          <div class="box-header with-border"></div>
          <div class="box-body">

          
            
           <table class="table table-bordered table-striped dt-responsive tablas">
              
              <thead>
                <tr>
                  <!-- <th style="width: 0px">#</th> -->
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
          </div>
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
        <button id="save-png" class="btn btn-primary">Guardar en  PNG</button>
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