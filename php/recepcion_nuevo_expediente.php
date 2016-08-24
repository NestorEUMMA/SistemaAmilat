<?php

include '../include/dbconnect.php';
session_start();

if (!empty($_SESSION['user']))
  {

                   $querydepartamentos = "SELECT * from geografia where Nivel='1'";
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

   <body class="hold-transition skin-blue sidebar-mini">

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
            <div class="col-xs-0">
            </div>
              <div class="col-xs-12">
                <div class="box">
                    <div class="box-header with-border">
                      <h3 class="box-title">Expedientes</h3>
                    </div><!-- /.box-header -->
                        <div class="box-body">

                          <form  action="recepcion_guardar_expediente.php" method="post" id="demo-form" data-parsley-validate="">

                            <div class="row">
                              <div class="col-md-6">
                                <div class="form-horizontal" role="form">
                                  <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-2 control-label">
                                    Nombre
                                    </label>
                                    <div class="col-sm-4">
                                      <div class="input-group">
                                        <div class="input-group-addon">
                                        <i class="fa fa-user"></i>
                                        </div>
                                      <input type="text" class="form-control" name="txtNombres" required="">
                                      </div>
                                    </div>
                                    <label for="inputEmail3" class="col-sm-2 control-label">
                                    Apellido
                                    </label>
                                    <div class="col-sm-4">
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                        <i class="fa fa-user"></i>
                                        </div>
                                      <input type="text" class="form-control" name="txtApellidos" required="">
                                      </div>
                                    </div>
                                  </div>

                                </div>
                              </div>
                              <div class="col-md-6">
                                <div class="form-horizontal" role="form">
                                  <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-2 control-label">
                                    Dui
                                    </label>
                                    <div class="col-sm-4">
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                        <i class="fa fa-credit-card"></i>
                                        </div>
                                      <input type="text" class="form-control" data-inputmask='"mask": "99999999-9"' data-mask name="txtDui" >
                                    </div>
                                    </div>
                                    <label for="inputEmail3" class="col-sm-2 control-label">
                                    F. Nacimiento
                                    </label>
                                     <div class="col-sm-4">
                                      <div class="input-group">
                                        <div class="input-group-addon">
                                        <i class="fa fa-calendar"></i>
                                        </div>
                                      <input type="text" class="form-control" data-inputmask="'alias': 'yyyy/mm/dd'" data-mask name="txtFNacimiento" required="">
                                    </div>
                                  </div>
                                  </div>
                                </div>
                              </div>
                            </div>

                            <div class="row">
                              <div class="col-md-6">
                                <div class="form-horizontal" role="form">
                                  <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-2 control-label">
                                      Departamento
                                    </label>
                                    <div class="col-sm-4">
                                      <div class="input-group">
                                        <div class="input-group-addon">
                                        <i class="fa fa-flag"></i>
                                        </div>
                                     <select class="form-control select2" style="width: 100%;" name="cboGeografia" required="">
                                        <?php
                                          while ($row = $resultadodepartamentos->fetch_assoc()) {
                                            echo "<option value = '".$row['IdGeografia']."'>".$row['Nombre']."</option>";
                                          }
                                        ?>
                                      </select>
                                      </div>
                                    </div>
                                    <label for="inputEmail3" class="col-sm-2 control-label">
                                      Genero
                                    </label>
                                    <div class="col-sm-4">
                                      <div class="input-group">
                                        <div class="input-group-addon">
                                        <i class="fa fa-genderless"></i>
                                        </div>
                                      <select class="form-control select2" style="width: 100%;" name="cboGenero" required="">
                                        <option>Seleccione..</option>
                                        <option>Masculino</option>
                                        <option>Femenino</option>
                                      </select>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                              <div class="col-md-6">
                                <div class="form-horizontal" role="form">
                                  <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-2 control-label">
                                    Direccion
                                    </label>
                                    <div class="col-sm-10">
                                      <div class="input-group">
                                        <div class="input-group-addon">
                                        <i class="fa fa-arrows"></i>
                                        </div>
                                    <input type="text" class="form-control" name="txtDireccion" required="">
                                    </div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>

                            <div class="row">
                              <div class="col-md-0">
                              </div>
                              <div class="col-md-6">
                                <div class="form-horizontal" role="form">
                                  <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-2 control-label">
                                      Estado Civil
                                    </label>
                                    <div class="col-sm-4">
                                       <div class="input-group">
                                        <div class="input-group-addon">
                                        <i class="fa fa-circle-o"></i>
                                        </div>
                                      <select class="form-control select2" style="width: 100%;" name="cboEstadoCivil" required="">
                                        <?php
                                          while ($row = $resultadoestadocivil->fetch_assoc()) {
                                            echo "<option value = '".$row['IdEstadoCivil']."'>".$row['Nombre']."</option>";
                                          }
                                        ?>
                                      </select>
                                      </div>
                                    </div>
                                     <label for="inputEmail3" class="col-sm-2 control-label">
                                      Categoria
                                    </label>
                                    <div class="col-sm-4">
                                      <div class="input-group">
                                        <div class="input-group-addon">
                                        <i class="fa fa-genderless"></i>
                                        </div>
                                      <select class="form-control select2" style="width: 100%;" name="cboCategoria" required="">
                                        <option>Seleccione..</option>
                                        <option>A</option>
                                        <option>B</option>
                                        <option>C</option>
                                        <option>D</option>
                                      </select>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                              <div class="col-md-6">
                                <div class="form-horizontal" role="form">
                                  <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-2 control-label">
                                    Correo
                                    </label>
                                    <div class="col-sm-10">
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                        <i class="fa fa-envelope"></i>
                                        </div>
                                      <input type="email" class="form-control"  name="txtCorreo"  data-parsley-trigger="change">
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                              <div class="col-md-0">
                              </div>
                            </div>

                            <div class="row">
                              <div class="col-md-0">
                              </div>
                              <div class="col-md-6">
                                <div class="form-horizontal" role="form">
                                  <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-2 control-label">
                                      Telefono
                                    </label>
                                    <div class="col-sm-4">
                                      <div class="input-group">
                                        <div class="input-group-addon">
                                        <i class="fa fa-phone-square"></i>
                                        </div>
                                      <input type="text" class="form-control"  data-inputmask='"mask": "9999-9999"' data-mask name="txtTelefono" />
                                      </div>
                                    </div>
                                    <label for="inputEmail3" class="col-sm-2 control-label">
                                      Celular
                                    </label>
                                    <div class="col-sm-4">
                                      <div class="input-group">
                                        <div class="input-group-addon">
                                        <i class="fa fa-mobile"></i>
                                        </div>
                                      <input type="text" class="form-control" data-inputmask='"mask": "9999-9999"' data-mask name="txtCelular" />
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                              <div class="col-md-6">
                                <div class="form-horizontal" role="form">
                                  <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-2 control-label">
                                      Enfermedad
                                    </label>
                                    <div class="col-sm-10">
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                        <i class="fa fa-check"></i>
                                        </div>
                                      <textarea type="text" rows="1" class="form-control"  name="txtEnfermedad" data-parsley-maxlength="100"></textarea>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                              <div class="col-md-0">
                              </div>
                            </div>

                            <div class="row">
                              <div class="col-md-0">
                              </div>
                              <div class="col-md-6">
                                <div class="form-horizontal" role="form">
                                  <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-2 control-label">
                                      Alergias
                                    </label>
                                    <div class="col-sm-10">
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                        <i class="fa fa-check"></i>
                                        </div>
                                      <textarea type="text" rows="2" class="form-control"  name="txtAlergias" data-parsley-maxlength="100"></textarea>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                              <div class="col-md-6">
                                <div class="form-horizontal" role="form">
                                  <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-2 control-label">
                                      Medicamentos
                                    </label>
                                    <div class="col-sm-10">
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                        <i class="fa fa-check"></i>
                                        </div>
                                      <textarea type="text" rows="2" class="form-control"  name="txtMedicamentos" data-parsley-maxlength="100"></textarea>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </div>

                              <div class="col-md-0">
                              </div>
                            </div>

                            <div class="row">
                              <div class="col-md-0">
                              </div>
                              <div class="col-md-6">
                                <div class="form-horizontal" role="form">
                                  <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-2 control-label">
                                    Responsable
                                    </label>
                                    <div class="col-sm-5">
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                        <i class="fa fa-user"></i>
                                        </div>
                                     <input type="text" class="form-control"  name="txtResponsable" required=""/>
                                     </div>
                                    </div>
                                    <label for="inputEmail3" class="col-sm-2 control-label">
                                    Parentesco
                                    </label>
                                       <div class="col-sm-3">
                                       <div class="input-group">
                                        <div class="input-group-addon">
                                        <i class="fa fa-users"></i>
                                        </div>
                                       <input type="text" class="form-control" name="txtParentesco" required="" />
                                       </div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                              <div class="col-md-0">
                              </div>

                                <div class="col-md-6">
                                <div class="form-horizontal" role="form">
                                  <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-2 control-label">
                                      Telefono
                                    </label>
                                    <div class="col-sm-4">
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                        <i class="fa fa-phone-square"></i>
                                        </div>
                                      <input type="text" class="form-control"  data-inputmask='"mask": "9999-9999"' data-mask name="txtTelefonoContacto" />
                                      </div>
                                    </div>
                                    <div class="col-sm-4">
                                    <button type="submit" class="btn btn-success" name="guardarPaciente">
                                    Guardar
                                    </button>
                                    </div>
                                  </div>
                                </div>
                              </div>

                              <div class="col-md-0">
                              </div>
                            </div>

                          </form>

                        </div>
                </div>
              </div>
            <div class="col-xs-0">
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
