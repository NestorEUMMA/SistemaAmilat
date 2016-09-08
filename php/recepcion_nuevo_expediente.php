  <?php

include '../include/dbconnect.php';
session_start();

if (!empty($_SESSION['user']))
{

  $querydepartamentos = "SELECT IdGeografia,Nombre from geografia where Nivel='1' order by Nombre";
  $resultadodepartamentos = $mysqli->query($querydepartamentos);

  $queryestadocivil = "SELECT * from estadocivil ";
  $resultadoestadocivil = $mysqli->query($queryestadocivil);

?>

<!DOCTYPE html>
<html>

   <?php  include '../include/asset.php'; ?>
    <link rel="stylesheet" href="../web/dist/parsley.css">
   <script src="../web/dist/parsley.min.js"></script>
   <script src="../web/dist/i18n/es.js"></script>

   <style type="text/css">
    .box-solid .box-body{ min-height: 300px;}
    li.active a{ background-color: red; }
   
   </style>

   <body class="hold-transition skin-blue sidebar-mini sidebar-collapse">

    <div class="wrapper">


     <?php include '../include/header.php'; ?>
      <?php include '../include/aside.php'; ?>


      <div class="content-wrapper">

        <section class="content-header">
          <h1>
            Ingreso de Expedientes
            <small></small>
          </h1>
        </section>

         <section class="content">
            <div class="row">            
              <div class="col-xs-12">
                
                <div class="box">
                    <div class="box-header with-border">
                      <h3 class="box-title"><i class="fa fa-user"></i> Expedientes</h3>
                    </div>
                    <div class="box-body">
                      <form  action="recepcion_guardar_expediente.php" method="post" id="demo-form" data-parsley-validate="">
                        <div class="form-horizontal" role="form">

                          <div class="nav-tabs-custom">
                            <ul class="nav nav-tabs">
                              <li><a href="#tab_1" data-toggle="tab"><i class="fa fa-user"></i> Datos generales</a></li>
                              <li><a href="#tab_2" data-toggle="tab"><i class="fa fa-users"></i> Responsable</a></li>
                              <li><a href="#tab_3" data-toggle="tab"><i class="fa fa-heartbeat"></i> Datos médicos</a></li>
                              <li><a href="#tab_4" data-toggle="tab"><i class="fa fa-money"></i> Socioeconómico</a></li>

                              <li class="pull-right">
                                <button type="submit" class="btn btn-success" name="guardarPaciente">Guardar</button>

                              </li>
                            </ul>
                            <div class="tab-content">
                              <div class="tab-pane active" id="tab_1">
                                
                                <div class="box box-success box-solid">                              
                                    <div class="box-header">
                                        <h3 class="box-title"><i class="fa fa-user"></i> Datos Generales:</h3>
                                    </div>
                                    <div class="box-body">
                                  <div class="form-group">
                                    
                                    <label for="txtNombres" class="col-sm-1 control-label">Nombres</label>
                                    <div class="col-sm-5">
                                      <div class="input-group">
                                        <div class="input-group-addon"><i class="fa fa-user"></i></div>
                                        <input type="text" class="form-control" id="txtNombres" name="txtNombres" required="">
                                      </div>
                                    </div>

                                    <label for="txtApellidos" class="col-sm-1 control-label">Apellidos</label>
                                    <div class="col-sm-5">
                                      <div class="input-group">
                                        <div class="input-group-addon"><i class="fa fa-user"></i></div>
                                        <input type="text" class="form-control" id="txtApellidos" name="txtApellidos" required="" >
                                      </div>
                                    </div>
                                  </div>
                                  
                                  <div class="form-group">

                                    
                                    
                                    <label for="txtFechaNacimiento" class="col-sm-1 control-label">Nacimiento</label>
                                    <div class="col-sm-2">
                                      <div class="input-group">
                                        <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                                        <input type="text" class="form-control" data-inputmask="'alias': 'yyyy/mm/dd'" data-mask name="txtFechaNacimiento" id="txtFechaNacimiento" required="">
                                      </div>
                                    </div>

                                    <label for="txtDui" class="col-sm-1 control-label">Dui</label>
                                    <div class="col-sm-2">
                                      <div class="input-group">
                                        <div class="input-group-addon"><i class="fa fa-credit-card"></i></div>
                                        <input type="text" class="form-control" data-inputmask='"mask": "99999999-9"' data-mask name="txtDui" id="txtDui"  >
                                      </div>
                                    </div>
                                    
                                    <label for="txtGenero" class="col-sm-1 control-label">Genero</label>
                                    <div class="col-sm-2">
                                      <div class="input-group">
                                        <div class="input-group-addon"><i class="fa fa-genderless"></i></div>
                                        <select class="form-control select2" style="width: 100%;" name="txtGenero" id="txtGenero" required="">
                                          <option>Seleccione..</option>
                                          <option>Masculino</option>
                                          <option>Femenino</option>
                                        </select>
                                      </div>
                                    </div>

                                    <label for="txtIdEstadoCivil" class="col-sm-1 control-label">Estado Civil</label>
                                    <div class="col-sm-2">
                                      <div class="input-group">
                                        <div class="input-group-addon"><i class="fa fa-circle-o"></i></div>
                                          <select class="form-control select2" style="width: 100%;" id="txtIdEstadoCivil" name="txtIdEstadoCivil" required="">
                                            <?php
                                              while ($row = $resultadoestadocivil->fetch_assoc()) {
                                                echo "<option value = '".$row['IdEstadoCivil']."'>".$row['Nombre']."</option>";
                                              }
                                            ?>
                                          </select>
                                      </div>
                                    </div>
                                  </div>
                                  
                                  <div class="form-group">

                                    <label for="txtDepartamento" class="col-sm-1 control-label">Departamento</label>
                                    <div class="col-sm-2">
                                      <div class="input-group">
                                        <div class="input-group-addon"><i class="fa fa-flag"></i></div>
                                        <select class="form-control select2" style="width: 100%;" id="txtDepartamento" name="txtDepartamento" >
                                          <option value=""></option>
                                          <?php
                                            while ($row = $resultadodepartamentos->fetch_assoc()) {
                                              echo "<option value = '".$row['IdGeografia']."'>".$row['Nombre']."</option>";
                                            }
                                          ?>
                                        </select>
                                      </div>
                                    </div>


                                    <label for="txtMunicipio" class="col-sm-1 control-label">Municipio</label>
                                    <div class="col-sm-2">
                                      <div class="input-group">
                                        <div class="input-group-addon"><i class="fa fa-flag"></i></div>
                                        <select class="form-control select2" style="width: 100%;" id="txtMunicipio" name="txtMunicipio" required=""></select>
                                      </div>
                                    </div>

                                    <label for="txtCanton" class="col-sm-1 control-label">Cantón</label>
                                    <div class="col-sm-2">
                                      <div class="input-group">
                                        <div class="input-group-addon"><i class="fa fa-flag"></i></div>
                                        <select class="form-control select2" style="width: 100%;" name="txtCanton" id="txtCanton"></select>
                                      </div>
                                    </div>
                                  </div> 

                                  <div class="form-group">
                                    
                                    <label for="txtDireccion" class="col-sm-1 control-label">Dirección</label>
                                    <div class="col-sm-11">
                                      <div class="input-group">
                                        <div class="input-group-addon"><i class="fa fa-arrows"></i></div>
                                        <input type="text" class="form-control" id="txtDireccion" name="txtDireccion" required="">
                                      </div>
                                    </div>
                                  </div>

                                  <div class="form-group">
                                    
                                    <label for="txtTelefono" class="col-sm-1 control-label">Teléfono</label>
                                    <div class="col-sm-2">
                                      <div class="input-group">
                                        <div class="input-group-addon"><i class="fa fa-phone-square"></i></div>
                                        <input type="text" class="form-control"  data-inputmask='"mask": "9999-9999"' data-mask id="txtTelefono" name="txtTelefono" />
                                      </div>
                                    </div>

                                    <label for="txtCelular" class="col-sm-1 control-label">Celular</label>
                                    <div class="col-sm-2">
                                      <div class="input-group">
                                        <div class="input-group-addon"><i class="fa fa-mobile"></i></div>
                                        <input type="text" class="form-control" data-inputmask='"mask": "9999-9999"' data-mask id="txtCelular" name="txtCelular" />
                                      </div>
                                    </div>


                                    <label for="txtCorreo" class="col-sm-1 control-label">Correo</label>
                                    <div class="col-sm-5">
                                      <div class="input-group">
                                        <div class="input-group-addon"><i class="fa fa-envelope"></i></div>
                                        <input type="text" class="form-control" id="txtCorreo" name="txtCorreo"  data-parsley-trigger="change">
                                      </div>
                                    </div>
                                  </div>    
                                  </div>
                                </div>
                              </div>
                              <div class="tab-pane" id="tab_2">
                                
                                <div class="box box-warning box-solid">                              
                                    <div class="box-header">
                                        <h3 class="box-title"><i class="fa fa-users"></i> Responsable:</h3>
                                    </div>
                                    <div class="box-body">


                                <div class="form-group">
                                  
                                  <label for="txtNombresResponsable" class="col-sm-1 control-label">Nombres</label>
                                  <div class="col-sm-5">
                                    <div class="input-group">
                                      <div class="input-group-addon"><i class="fa fa-user"></i></div>
                                      <input type="text" class="form-control" id="txtNombresResponsable"  name="txtNombresResponsable"/>
                                    </div>
                                  </div>

                                  <label for="txtApellidosResponsable" class="col-sm-1 control-label">Apellidos</label>
                                  <div class="col-sm-5">
                                    <div class="input-group">
                                      <div class="input-group-addon"><i class="fa fa-user"></i></div>
                                      <input type="text" class="form-control" id="txtApellidosResponsable"  name="txtApellidosResponsable"/>
                                    </div>
                                  </div>
                                </div>

                                <div class="form-group">
                                    <label for="txtParentesco" class="col-sm-1 control-label">Parentesco</label>
                                    <div class="col-sm-2">
                                      <div class="input-group">
                                        <div class="input-group-addon"><i class="fa fa-users"></i></div>
                                        <select class="form-control" id="txtParentesco" name="txtParentesco">
                                            <option value=""></option>
                                            <option value="MADRE">MADRE</option>
                                            <option value="PADRE">PADRE</option>
                                            <option value="ABUELO">ABUELO</option>
                                            <option value="ABUELA">ABUELA</option>
                                            <option value="TIO">TIO</option>
                                            <option value="TIA">TIA</option>
                                            <option value="HERMANO">HERMANO</option>
                                            <option value="HERMANA">HERMANA</option>
                                            <option value="PRIMO">PRIMO</option>
                                            <option value="PRIMA">PRIMA</option>
                                            <option value="NINGUNO">NINGUNO</option>
                                        </select>
                                      </div>
                                    </div>
                                

                                    <label for="txtDuiResponsable" class="col-sm-1 control-label">DUI</label>
                                    <label for="txtDuiResponsable" class="col-sm-1 control-label">Dui Responsable</label>
                                    <div class="col-sm-2">
                                      <div class="input-group">
                                        <div class="input-group-addon"><i class="fa fa-credit-card"></i></div>
                                        <input type="text" class="form-control" data-inputmask='"mask": "99999999-9"' data-mask name="txtDuiResponsable" id="txtDuiResponsable" >
                                      </div>
                                    </div>


                                    <label for="txtTelefonoResponsable" class="col-sm-1 control-label">Telefono</label>
                                    <div class="col-sm-2">
                                      <div class="input-group">
                                        <div class="input-group-addon"><i class="fa fa-phone-square"></i></div>
                                        <input type="text" class="form-control"  data-inputmask='"mask": "9999-9999"' data-mask id="txtTelefonoResponsable" name="txtTelefonoResponsable" />
                                      </div>
                                    </div>

                                </div>
                              </div>

                              </div>
                            </div>
                              <div class="tab-pane" id="tab_3">
                                <div class="box box-danger box-solid">                              
                                    <div class="box-header">
                                        <h3 class="box-title"><i class="fa fa-heartbeat"></i> Datos médicos:</h3>
                                    </div>
                                    <div class="box-body">


                                      <div class="form-group">
                                        <label for="txtEnfermedad" class="col-sm-1 control-label">Enfermedades:</label>
                                          <div class="col-sm-10">
                                            <div class="input-group">
                                              <div class="input-group-addon"><i class="fa fa-check"></i></div>
                                              <textarea type="text" rows="3" class="form-control" id="txtEnfermedad" name="txtEnfermedad" data-parsley-maxlength="100"></textarea>
                                            </div>
                                          </div>
                                      </div>
                                      
                                      <div class="form-group">
                                          <label for="txtAlergias" class="col-sm-1 control-label">Alergias:</label>
                                          <div class="col-sm-10">
                                            <div class="input-group">
                                              <div class="input-group-addon"><i class="fa fa-check"></i></div>
                                              <textarea type="text" rows="3" class="form-control" id="txtAlergias" name="txtAlergias" data-parsley-maxlength="100"></textarea>
                                            </div>
                                          </div>
                                      </div>
                                      
                                      <div class="form-group">
                                          <label for="txtMedicamentos" class="col-sm-1 control-label">Medicamentos:</label>
                                          <div class="col-sm-10">
                                            <div class="input-group">
                                              <div class="input-group-addon"><i class="fa fa-check"></i></div>
                                              <textarea type="text" rows="3" class="form-control" id="txtMedicamentos"  name="txtMedicamentos" data-parsley-maxlength="100"></textarea>
                                            </div>
                                          </div>
                                      </div>


                                    </div> 
                                </div>
                              </div>

                              <div class="tab-pane " id="tab_4">


                                <div class="box box-warning box-solid">                              
                                    <div class="box-header">
                                        <h3 class="box-title"><i class="fa fa-credit-card"></i> Socioeconómico:</h3>

                                        <div class="pull-right">
                                          <label for="txtCategoria" class="col-sm-6 control-label">Categoría:</label>
                                          <div class="col-sm-6">
                                          <select class="form-control" id="txtCategoria" name="txtCategoria" required="">
                                            <option>Seleccione..</option>
                                            <option>A</option>
                                            <option>B</option>
                                            <option>C</option>
                                            <option>D</option>
                                          </select>
                                            </div>
                                      </div>


                                    </div>
                                    <div class="box-body">
                                        <div class="col-sm-10 col-sm-offset-1">
                                        <?php //include 'test.php' ?>
                                        <div id="test"></div>
                                        </div>
                                    </div>
                                  </div>
                              </div>              
                            </div>            
                          </div>
                        </div>

                      </form>
                    </div>
                  </div>
              </div>

                                    

              
            </div>        
         </section>

      </div>

    <?php include '../include/footer.php'; ?>

  </body>

<script type="text/javascript">
  $(function () {
    $('#demo-form').parsley().on('field:validated', function() {
      var ok = $('.parsley-error').length === 0;
      $('.bs-callout-info').toggleClass('hidden', !ok);
      $('.bs-callout-warning').toggleClass('hidden', ok);
    })
    .on('form:submit', function() {
      return true;
    });
  });


  function inFocus(e)
  {
    $(e).closest("tr").css("backgroundColor","#F0F0F0");
  }

  function outFocus(e)
  {
    $(e).closest("tr").css("backgroundColor","#FFFFFF"); 
  }


  $(document).ready(function(){

    
    
    $.post( "test.php", { IdFactor: 2})
      .done(function( data ) {
        $("#test").html(data);        
        $(".select3").select2();
    });








      $("#txtDepartamento").change(function(){

        //alert($("#cboGeografia").val());
        var id = '';
        id = $("#txtDepartamento").val();

        $.ajax({
          url: 'Municipios.php',
          type: 'POST',
          dataType: 'json',
          data: { 'IdGeografia': id },
          beforeSend: function() { },
          success: function(data) {
              
              $("#txtMunicipio").empty();
              
              var opcs = "<option value=''></option>";              
              $.each(data, function(i,v){
                  opcs += "<option value='" + v.IdGeografia + "'>" + v.Nombre + "</option>";
              });             
              $("#txtMunicipio").html(opcs).select2().val(null);

          },
          error: function(xhr, textStatus, errorThrown) {
            
          }
        });

      });


      $("#txtMunicipio").change(function(){

        //alert($("#cboGeografia").val());
        var id = '';
        id = $("#txtMunicipio").val();

        $.ajax({
          url: 'Municipios.php',
          type: 'POST',
          dataType: 'json',
          data: { 'IdGeografia': id },
          beforeSend: function() { },
          success: function(data) {
              
              $("#txtCanton").empty();
              $("#txtCanton span.select2-selection__rendered").html("");
              var opcs = "";              
              $.each(data, function(i,v){
                  opcs += "<option value='" + v.IdGeografia + "'>" + v.Nombre + "</option>";
              });             
              $("#txtCanton").html(opcs);

          },
          error: function(xhr, textStatus, errorThrown) {
            
          }
        });

      });
  });



</script>

</html>

<?php
}
else{
  echo "
  <script>
    alert('No ha iniciado sesion');
    document.location='../index.php';
  </script>
  ";
}
?>
