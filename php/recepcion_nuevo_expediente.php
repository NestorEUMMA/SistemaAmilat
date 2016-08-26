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
                              <li class="active"><a href="#tab_4" data-toggle="tab"><i class="fa fa-money"></i> Socioeconómico</a></li>

                              <li class="pull-right">
                                <button type="submit" class="btn btn-success" name="guardarPaciente">Guardar</button>

                              </li>
                            </ul>
                            <div class="tab-content">
                              <div class="tab-pane" id="tab_1">
                                
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
                                        <input type="text" class="form-control" id="txtApellidos" name="txtApellidos" required="">
                                      </div>
                                    </div>
                                  </div>
                                  
                                  <div class="form-group">

                                    <label for="txtDui" class="col-sm-1 control-label">Dui</label>
                                    <div class="col-sm-2">
                                      <div class="input-group">
                                        <div class="input-group-addon"><i class="fa fa-credit-card"></i></div>
                                        <input type="text" class="form-control" data-inputmask='"mask": "99999999-9"' data-mask name="txtDui" id="txtDui" >
                                      </div>
                                    </div>
                                    
                                    <label for="txtFNacimiento" class="col-sm-1 control-label">Nacimiento</label>
                                    <div class="col-sm-2">
                                      <div class="input-group">
                                        <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                                        <input type="text" class="form-control" data-inputmask="'alias': 'yyyy/mm/dd'" data-mask name="txtFNacimiento" id="txtFNacimiento" required="">
                                      </div>
                                    </div>
                                    
                                    <label for="cboGenero" class="col-sm-1 control-label">Genero</label>
                                    <div class="col-sm-2">
                                      <div class="input-group">
                                        <div class="input-group-addon"><i class="fa fa-genderless"></i></div>
                                        <select class="form-control select2" style="width: 100%;" name="cboGenero" id="cboGenero" required="">
                                          <option>Seleccione..</option>
                                          <option>Masculino</option>
                                          <option>Femenino</option>
                                        </select>
                                      </div>
                                    </div>

                                    <label for="cboEstadoCivil" class="col-sm-1 control-label">Estado Civil</label>
                                    <div class="col-sm-2">
                                      <div class="input-group">
                                        <div class="input-group-addon"><i class="fa fa-circle-o"></i></div>
                                          <select class="form-control select2" style="width: 100%;" id="cboEstadoCivil" name="cboEstadoCivil" required="">
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

                                    <label for="cboGeografia" class="col-sm-1 control-label">Departamento</label>
                                    <div class="col-sm-2">
                                      <div class="input-group">
                                        <div class="input-group-addon"><i class="fa fa-flag"></i></div>
                                        <select class="form-control select2" style="width: 100%;" id="cboGeografia" name="cboGeografia" required="">
                                          <option value=""></option>
                                          <?php
                                            while ($row = $resultadodepartamentos->fetch_assoc()) {
                                              echo "<option value = '".$row['IdGeografia']."'>".$row['Nombre']."</option>";
                                            }
                                          ?>
                                        </select>
                                      </div>
                                    </div>


                                    <label for="cboMunicipio" class="col-sm-1 control-label">Municipio</label>
                                    <div class="col-sm-2">
                                      <div class="input-group">
                                        <div class="input-group-addon"><i class="fa fa-flag"></i></div>
                                        <select class="form-control select2" style="width: 100%;" id="cboMunicipio" name="cboMunicipio" required=""></select>
                                      </div>
                                    </div>

                                    <label for="cboCanton" class="col-sm-1 control-label">Cantón</label>
                                    <div class="col-sm-2">
                                      <div class="input-group">
                                        <div class="input-group-addon"><i class="fa fa-flag"></i></div>
                                        <select class="form-control select2" style="width: 100%;" name="cboCanton" id="cboCanton" required=""></select>
                                      </div>
                                    </div>
                                  </div> 

                                  <div class="form-group">
                                    
                                    <label for="inputEmail3" class="col-sm-1 control-label">Dirección</label>
                                    <div class="col-sm-11">
                                      <div class="input-group">
                                        <div class="input-group-addon"><i class="fa fa-arrows"></i></div>
                                        <input type="text" class="form-control" name="txtDireccion" required="">
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
                                        <input type="email" class="form-control" id="txtCorreo" name="txtCorreo"  data-parsley-trigger="change">
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
                                      <input type="text" class="form-control" id="txtNombresResponsable"  name="txtNombresResponsable" required=""/>
                                    </div>
                                  </div>

                                  <label for="txtApellidosResponsable" class="col-sm-1 control-label">Apellidos</label>
                                  <div class="col-sm-5">
                                    <div class="input-group">
                                      <div class="input-group-addon"><i class="fa fa-user"></i></div>
                                      <input type="text" class="form-control" id="txtApellidosResponsable"  name="txtApellidosResponsable" required=""/>
                                    </div>
                                  </div>
                                </div>

                                <div class="form-group">
                                    <label for="txtParentesco" class="col-sm-1 control-label">Parentesco</label>
                                    <div class="col-sm-2">
                                      <div class="input-group">
                                        <div class="input-group-addon"><i class="fa fa-users"></i></div>
                                        <select class="form-control" id="txtParentesco" name="txtParentesco" required="">

                                        </select>
                                      </div>
                                    </div>
                                

                                    <label for="txtDuiResponsable" class="col-sm-1 control-label">Dui Responsable</label>
                                    <div class="col-sm-2">
                                      <div class="input-group">
                                        <div class="input-group-addon"><i class="fa fa-credit-card"></i></div>
                                        <input type="text" class="form-control" data-inputmask='"mask": "99999999-9"' data-mask name="txtDuiResponsable" id="txtDuiResponsable" >
                                      </div>
                                    </div>


                                    <label for="txtTelefonoContacto" class="col-sm-1 control-label">Telefono</label>
                                    <div class="col-sm-2">
                                      <div class="input-group">
                                        <div class="input-group-addon"><i class="fa fa-phone-square"></i></div>
                                        <input type="text" class="form-control"  data-inputmask='"mask": "9999-9999"' data-mask id="txtTelefonoContacto" name="txtTelefonoContacto" />
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

                              <div class="tab-pane active" id="tab_4">


                                <div class="box box-warning box-solid">                              
                                    <div class="box-header">
                                        <h3 class="box-title"><i class="fa fa-credit-card"></i> Socioeconómico:</h3>

                                        <div class="pull-right">
                                          <label for="cboCategoria" class="col-sm-6 control-label">Categoría:</label>
                                          <div class="col-sm-6">
                                          <select class="form-control" id="cboCategoria" name="cboCategoria" required="">
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
                                        <?php include 'test.php' ?>
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



  $(document).ready(function(){

      $("#cboGeografia").change(function(){

        //alert($("#cboGeografia").val());
        var id = '';
        id = $("#cboGeografia").val();

        $.ajax({
          url: 'Municipios.php',
          type: 'POST',
          dataType: 'json',
          data: { 'IdGeografia': id },
          beforeSend: function() { },
          success: function(data) {
              
              $("#cboMunicipio").empty();
              
              var opcs = "<option value=''></option>";              
              $.each(data, function(i,v){
                  opcs += "<option value='" + v.IdGeografia + "'>" + v.Nombre + "</option>";
              });             
              $("#cboMunicipio").html(opcs).select2().val(null);

          },
          error: function(xhr, textStatus, errorThrown) {
            
          }
        });

      });


      $("#cboMunicipio").change(function(){

        //alert($("#cboGeografia").val());
        var id = '';
        id = $("#cboMunicipio").val();

        $.ajax({
          url: 'Municipios.php',
          type: 'POST',
          dataType: 'json',
          data: { 'IdGeografia': id },
          beforeSend: function() { },
          success: function(data) {
              
              $("#cboCanton").empty();
              $("#cboCanton span.select2-selection__rendered").html("");
              var opcs = "";              
              $.each(data, function(i,v){
                  opcs += "<option value='" + v.IdGeografia + "'>" + v.Nombre + "</option>";
              });             
              $("#cboCanton").html(opcs);

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
