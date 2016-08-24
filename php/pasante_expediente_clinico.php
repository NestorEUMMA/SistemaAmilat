<?php

include '../include/dbconnect.php';
session_start();

if (!empty($_SESSION['user']))
  {

                  $id =$_REQUEST['IdPersona'];
                  $queryexpedientes = "SELECT * FROM persona WHERE IdPersona  = '$id'";
                  $resultadoexpedientes = $mysqli->query($queryexpedientes);
                  while ($test = $resultadoexpedientes->fetch_assoc())
                  {
                      $idpersona = $test['IdPersona'];
                      $nombres = $test['Nombres'];
                      $apellidos = $test['Apellidos'];
                      $dui = $test['Dui'];
                      $fnacimiento = $test['FechaNacimiento'];
                      $geografia = $test['IdGeografia'];
                      $direccion = $test['Direccion'];
                      $genero = $test['Genero'];
                      $estadocivil = $test['IdEstadoCivil'];
                      $responsable = $test['IdResponsable'];
                      $parentesco = $test['IdParentesco'];
                      $telefono = $test['Telefono'];
                      $celular = $test['Celular'];
                      $correo = $test['Correo'];
                      $alergias = $test['Alergias'];
                      $medicinas = $test['Medicamentos'];
                      $enfermedad = $test['Enfermedad'];
                      $telefonoresponsable = $test['TelefonoResponsable'];
                     
                  }

                   $querydepartamentos = "SELECT * from geografia where IdGeografia='$geografia'";
                   $resultadodepartamentos = $mysqli->query($querydepartamentos);

                   $queryestadocivil = "SELECT * from estadocivil where IdEstadoCivil = '$estadocivil'";
                   $resultadoestadocivil = $mysqli->query($queryestadocivil);


                   $queryusuario = "SELECT u.IdUsuario, CONCAT(u.Nombres,  ' ', u.Apellidos) as 'NombreCompleto'
                                                                  from usuario u
                                                                  inner join puesto = p on u.IdPuesto = p.IdPuesto
                                                                  where p.Descripcion = 'Medico' and u.Activo = 1 ";
                   $resultadousuario = $mysqli->query($queryusuario);


                   $querymodulo = "SELECT * from modulo order by NombreModulo asc";
                   $resultadomodulo = $mysqli->query($querymodulo);


                   $querytablaconsulta = "SELECT c.IdConsulta, c.FechaConsulta, CONCAT(u.Nombres,' ', u.Apellidos) As 'Medico',
                                          CONCAT(p.Nombres,' ', p.Apellidos) As 'Paciente', m.NombreModulo As 'Especialidad', c.IdEstado as 'Estado', c.Status As 'Status'
                                          from consulta c
                                          inner join usuario u on c.IdUsuario = u.IdUsuario
                                          inner join modulo m on c.IdModulo = m.IdModulo
                                          inner join persona p on c.IdPersona = p.IdPersona
                                          where c.IdPersona = $idpersona";
                   $resultadotablaconsulta = $mysqli->query($querytablaconsulta);


                  $querytablaenfermedad = "SELECT IdEnfermedad, Nombre
                                          FROM enfermedad";
                  $resultadotablaenfermedad = $mysqli->query($querytablaenfermedad);

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
        <style>
              .example-modal .modal {
                position: relative;
                top: auto;
                bottom: auto;
                right: auto;
                left: auto;
                display: block;
                z-index: 1;
              }

              .example-modal .modal {
                background: transparent !important;
              }
       </style>
          <h1>
            
            <small></small>
          </h1>
          <ol class="breadcrumb">

          </ol>
        </section>

        <section class="content">
            <div class="row">
                <div class="col-xs-12">
                  <div class="box">
                      <div class="box-header with-border">
                        <h3 class="box-title"> Expediente de  <h2><?php echo $nombres. " " .$apellidos ?> </h2> </h3>
                      </div><!-- /.box-header -->
                          <div class="box-body">

                        <!--    FORMULARIO    -->

                        <form  method="post" id="demo-form" >

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
                                      <input type="text" class="form-control" name="txtNombres" disabled="disabled" required="" value="<?php echo $nombres ?>">
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
                                      <input type="text" class="form-control" name="txtApellidos" disabled="disabled" required="" value="<?php echo $apellidos ?>">
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
                                      <input type="text" class="form-control" data-inputmask='"mask": "99999999-9"' data-mask name="txtDui" disabled="disabled" value="<?php echo $dui ?>" >
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
                                      <input type="text" class="form-control" data-inputmask="'alias': 'yyyy/mm/dd'" data-mask name="txtFNacimiento" required="" disabled="disabled" value="<?php echo $fnacimiento ?>">
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
                                       <select class="form-control select2" style="width: 100%;" disabled="disabled" name="cboGeografia">
                                        <?php
                                          while ($row = $resultadodepartamentos->fetch_assoc()) {
                                            echo "<option value = '".$row['IdGeografia']."'>".$row['Nombre']."</option>";
                                          }
                                        ?>
                                      </select>
                                      </div>
                                    </div>
                                    <label for="inputEmail3" class="col-sm-2 control-label">
                                      Municipio
                                    </label>
                                    <div class="col-sm-4">
                                      <div class="input-group">
                                        <div class="input-group-addon">
                                        <i class="fa fa-flag-o"></i>
                                        </div>
                                      <input type="text" class="form-control"  name="municipio" id="municipio" disabled="disabled">
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
                                    <input type="text" class="form-control" name="txtDireccion" required="" disabled="disabled" value="<?php echo $direccion ?>">
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
                                      Genero
                                    </label>
                                    <div class="col-sm-4">
                                      <div class="input-group">
                                        <div class="input-group-addon">
                                        <i class="fa fa-genderless"></i>
                                        </div>
                                      <select class="form-control select2" style="width: 100%;" disabled="disabled" name="cboGenero" required="">
                                        <option> <?php echo $genero ?> </option>
                                      </select>
                                      </div>
                                    </div>
                                    <label for="inputEmail3" class="col-sm-2 control-label">
                                      Estado Civil
                                    </label>
                                    <div class="col-sm-4">
                                       <div class="input-group">
                                        <div class="input-group-addon">
                                        <i class="fa fa-circle-o"></i>
                                        </div>
                                      <select class="form-control select2" style="width: 100%;" disabled="disabled" name="cboEstadoCivil" required="">
                                       <?php
                                          while ($row = $resultadoestadocivil->fetch_assoc()) {
                                            echo "<option value = '".$row['IdEstadoCivil']."'>".$row['Nombre']."</option>";
                                          }
                                        ?>
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
                                      <input type="email" class="form-control" disabled="disabled" name="txtCorreo"  data-parsley-trigger="change" value="<?php echo $correo ?>">
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
                                      <input type="text" class="form-control"  data-inputmask='"mask": "9999-9999"' data-mask name="txtTelefono" disabled="disabled" value="<?php echo $telefono ?>" />
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
                                      <input type="text" class="form-control" data-inputmask='"mask": "9999-9999"' data-mask name="txtCelular" disabled="disabled" value="<?php echo $celular ?>" />
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
                                      <textarea type="text" rows="1" class="form-control" disabled="disabled"  name="txtEnfermedad" data-parsley-maxlength="100"><?php echo $enfermedad ?></textarea>
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
                                      <textarea type="text" rows="2" class="form-control" disabled="disabled"  name="txtAlergias" data-parsley-maxlength="100"> <?php echo $alergias ?> </textarea>
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
                                      <textarea type="text" rows="2" class="form-control" disabled="disabled" name="txtMedicamentos" data-parsley-maxlength="100"><?php echo $medicinas ?></textarea>
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
                                     <input type="text" class="form-control" disabled="disabled" name="txtResponsable" required="" value="<?php echo $responsable ?>" />
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
                                       <input type="text" class="form-control" name="txtParentesco" required="" disabled="disabled" value="<?php echo $parentesco ?>" />
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
                                      <input type="text" class="form-control" disabled="disabled"  data-inputmask='"mask": "9999-9999"' data-mask name="txtTelefonoContacto" value="<?php echo $telefonoresponsable ?>"  />
                                      </div>
                                    </div>
                                    <div class="col-sm-3">
                                   <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modalConsulta"> Nueva consulta </button>
                                    </div>

                                  </div>
                                </div>
                              </div>

                              <div class="col-md-0">
                              </div>
                            </div>



                        </form>

                        <!--    MODAL Consulta    -->

                        <div class="example-modal modal fade" id="modalConsulta">
                          <div class="modal">
                            <div class="modal-dialog modal-md">
                              <div class="modal-content">

                              <form class="form-horizontal" action="pasante_guardar_consulta.php" role="form" method="POST">
                                    <div class="modal-header">
                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span></button>
                                      <h4 class="modal-title">Nueva Consulta</h4>
                                    </div>
                                    <div class="modal-body">

                                    <div class="form-group">
                                      <div class="col-sm-1"></div>
                                      <div class="col-sm-3"><label for="inputEmail3" class="control-label">Fecha</label></div>
                                      <div class="col-sm-7"><input  data-inputmask="'alias': 'yyyy/mm/dd'" data-mask class="form-control" name="txtFecha" required=""></div>
                                      <div class="col-sm-1"></div>
                                    </div>
                                    <div class="form-group">
                                      <div class="col-sm-1"></div>
                                      <div class="col-sm-3"><label for="inputEmail3" class="control-label">Medico</label></div>
                                      <div class="col-sm-7">
                                              <select class="form-control select2" style="width: 100%;" name="cboUsuario">
                                              <?php
                                                while ($row = $resultadousuario->fetch_assoc()) {
                                                  echo "<option value = '".$row['IdUsuario']."'>".$row['NombreCompleto']."</option>";
                                                }
                                              ?>
                                                </select>
                                      </div>
                                      <div class="col-sm-1"></div>
                                    </div>
                                    <div class="form-group">
                                      <div class="col-sm-1"></div>
                                      <div class="col-sm-3"><label for="inputEmail3" class="control-label">Paciente</label></div>
                                      <div class="col-sm-7"><input type="text" value="<?php echo $nombres. " " .$apellidos ?>" class="form-control"  disabled="disabled" >
                                                            <input type="hidden" name="txtPaciente" value="<?php echo $idpersona ?>">  </div>
                                      <div class="col-sm-1"></div>
                                    </div>
                                      <div class="form-group">
                                      <div class="col-sm-1"></div>
                                      <div class="col-sm-3"><label for="inputEmail3" class="control-label">Modulo</label></div>
                                      <div class="col-sm-7">
                                                <select class="form-control select2" style="width: 100%;" name="cboModulo">
                                                <?php
                                                while ($row = $resultadomodulo->fetch_assoc()) {
                                                  echo "<option value = '".$row['IdModulo']."'>".$row['NombreModulo']."</option>";
                                                }
                                              ?>
                                                </select>
                                      </div>
                                      <div class="col-sm-1"></div>
                                    </div>
                                    </div>
                                    <div class="modal-footer">
                                      <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Close</button>
                                      <button type="submit" class="btn btn-primary" name="guardarConsulta" >Guardar Cambios</button>
                                    </div>
                                </form>
                              </div>
                            </div>
                            </div>
                        </div>



                          </div>
                  </div>

                        <!--    TABLA Consulta    -->

                 <div class="box">
                    <div class="box-header with-border">
                      <h3 class="box-title">Historial de Consultas</h3>
                    </div><!-- /.box-header -->
                    <div class="box-body">
                      <table id="example2" class="table table-bordered table-hover">
                        <?php
                                echo"<thead>";
                                    echo"<tr>";
                                    echo"<th>ID</th>";
                                    echo"<th>Fecha de Consulta</th>";
                                    echo"<th>Nombre de Paciente</th>";
                                    echo"<th>Nombre de Medico</th>";
                                    echo"<th>Nombre de Especialidad</th>";
                                    echo"<th>Accion</th>";
                                    echo"</tr>";
                                echo"</thead>";
                                echo"<tbody>";
                               while ($row = $resultadotablaconsulta->fetch_assoc())
                               {

                                   $idSignosVitales = $row['IdConsulta'];
                                   echo"<tr>";
                                   echo"<td>".$row['IdConsulta']."</td>";
                                   echo"<td>".$row['FechaConsulta']."</td>";
                                   echo"<td>".$row['Paciente']."</td>";
                                   echo"<td>".$row['Medico']."</td>";
                                   echo"<td>".$row['Especialidad']."</td>";
                                   if($row['Status'] == 0){
                                   echo "<td>".
                                          "<span id='btn".$idSignosVitales."' class='btn btn-xs btn-success btn-mdl'>Agregar Datos a Consulta</span>".
                                          "</td>";
                                   }

                                   else{
                                   echo "<td>".
                                          "<span id='btn". $idSignosVitales  ."' class='btn btn-xs btn-warning btn-mdls'>Ver Datos de Consulta</span>".
                                          "</td>";
                                   }
                                   echo"</tr>";
                                   echo"</body>  ";
                                }

                                  ?>

                      </table>
                    </div>
                 </div>

                    <!--    MODAL Signos    -->

                  <div class="example-modal modal fade" id="modalSignosVitales">
                    <div class="modal">
                      <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                        <form class="form-horizontal" action="pasante_guardar_indicador.php"  role="form" method="POST" id="demo-form1" data-parsley-validate="">
                              <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title">Ingreso completa de consulta</h4>
                              </div>
                            <div class="modal-body">
                              <div class="box-header with-border">
                                <h3 class="box-title">Signos Vitales</h3>
                              </div>
                              <div class="box box-primary">
                               <div class="box-body">
                              <div class="form-group hidden">
                                <div class="col-sm-5"><input type="text" name="txtIdConsulta" id="idconsulta"></div>
                              </div>
                              <div class="form-group hidden">
                                <div class="col-sm-5"><input type="text" name="txtid" value="<?php echo $idpersona ?>"></div>
                              </div>
                              <div class="form-group">
                                <div class="col-sm-1"></div>
                                <div class="col-sm-2"><label for="inputEmail3" class="control-label">Paciente</label></div>
                                <div class="col-sm-3"><input type="text" class="form-control" name="txtPaciente" id="paciente" disabled="disabled"></div>
                                <div class="col-sm-1"><label for="inputEmail3" class="control-label">Medico</label></div>
                                <div class="col-sm-3"> <input type="text" class="form-control" name="txtMedico" id="medico" disabled="disabled" value=""></div>
                                <div class="col-sm-2"></div>
                              </div>
                              <div class="form-group">
                                <div class="col-sm-1"></div>
                                <div class="col-sm-2"><label for="inputEmail3" class="control-label">Especialidad</label></div>
                                <div class="col-sm-3"> <input type="text" class="form-control" name="txtMedico" id="modulo" disabled="disabled" value=" "></div>
                                <div class="col-sm-1"><label for="inputEmail3" class="control-label">Fecha</label></div>
                                <div class="col-sm-3"><input type="text" class="form-control" name="txtFecha" id="fecha" disabled="disabled"></div>
                                <div class="col-sm-2"></div>
                              </div>
                              <div class="form-group">
                                <div class="col-sm-1"></div>
                                <div class="col-sm-2"><label for="inputEmail3" class="control-label">Peso</label></div>
                                <div class="col-sm-2"><input type="text" class="form-control" data-inputmask='"mask": "999.9"' data-mask name="txtPeso" id="peso" required=""> </div>
                                <div class="col-sm-2">
                                 <select class="form-control select2" name="cboUnidadPeso" id="unidadpeso">
                                    <option value="1">kg</option>
                                    <option Value="2">lbs</option>
                                  </select>
                                </div>
                              </div>
                              <div class="form-group">
                                <div class="col-sm-1"></div>
                                <div class="col-sm-2"><label for="inputEmail3" class="control-label">Altura</label></div>
                                <div class="col-sm-2"> <input type="text" class="form-control" data-inputmask='"mask": "999.9"' data-mask name="txtAltura" id="altura" required=""> </div>
                                <div class="col-sm-2">
                                 <select class="form-control select2" name="cboUnidadAltura" id="unidadaltura">
                                    <option value="1">Mts</option>
                                    <option Value="2">Pies</option>
                                  </select>
                                </div>
                              </div>
                              <div class="form-group">
                                <div class="col-sm-1"></div>
                                <div class="col-sm-2"><label for="inputEmail3" class="control-label">Temperatura</label></div>
                                <div class="col-sm-2"> <input type="text" class="form-control" data-inputmask='"mask": "99.9"' data-mask name="txtTemperatura" id="temperatura" required=""> </div>
                                <div class="col-sm-2">
                                 <select class="form-control select2" name="cboUnidadTemperatura" id="unidadtemperatura">
                                    <option value="1">C</option>
                                    <option Value="2">F</option>
                                  </select>
                                </div>
                              </div>
                              <div class="form-group">
                                <div class="col-sm-1"></div>
                                <div class="col-sm-2"><label for="inputEmail3" class="control-label">Pulso</label></div>
                                <div class="col-sm-2"> <input type="text" class="form-control" data-inputmask='"mask": "999-999"' data-mask name="txtPulso" id="pulso" required=""> </div>
                                <div class="col-sm-2"> <label for="inputEmail3" class="control-label">lat/min</label></div>
                              </div>
                              <div class="form-group">
                                <div class="col-sm-1"></div>
                                <div class="col-sm-2"><label for="inputEmail3" class="control-label">Presion</label></div>
                                <div class="col-sm-2"> <input type="text" class="form-control" data-inputmask='"mask": "999"' data-mask name="txtMax" placeholder="MAX" id="max" required=""> </div>
                                <div class="col-sm-2"> <input type="text" class="form-control" data-inputmask='"mask": "999"' data-mask name="txtMin" placeholder="MIN" id="min" required=""> </div>
                              </div>
                              <div class="form-group">
                                <div class="col-sm-1"></div>
                                <div class="col-sm-2"><label for="inputEmail3" class="control-label">Observaciones</label></div>
                                <div class="col-sm-7"> <textarea type="text" rows="4" class="form-control" name="txtObservaciones" data-parsley-maxlength="100" id="observaciones" data-parsley-maxlength="100"> </textarea> </div>
                              </div>
                              </div>
                              </div>


                              <div class="box-header with-border">
                                <h3 class="box-title">Diagnostico de Consulta</h3>
                              </div>
                              <div class="box box-primary">
                               <div class="box-body">
                               </br>
                               <div class="form-group">
                               <div class="col-sm-1"></div>
                                <div class="col-sm-2"><label for="inputEmail3" class="control-label">Enfermedad</label></div>
                                 <div class="col-sm-7">
                                                <select class="form-control select2" style="width: 100%;" name="cboEnfermedad">
                                                <?php
                                                while ($row = $resultadotablaenfermedad->fetch_assoc()) {
                                                  echo "<option value = '".$row['IdEnfermedad']."'>".$row['Nombre']."</option>";
                                                }
                                              ?>
                                                </select>
                                </div>
                               </div>
                              <div class="form-group">
                                <div class="col-sm-1"></div>
                                <div class="col-sm-2"><label for="inputEmail3" class="control-label">Diagnostico</label></div>
                                <div class="col-sm-7"> <textarea type="text" rows="4" class="form-control" name="txtDiagnostico" data-parsley-maxlength="100" id="observaciones" data-parsley-maxlength="100"> </textarea> </div>
                              </div>
                              <div class="form-group">
                                <div class="col-sm-1"></div>
                                <div class="col-sm-2"><label for="inputEmail3" class="control-label">Comentarios</label></div>
                                <div class="col-sm-7"> <textarea type="text" rows="4" class="form-control" name="txtComentarios" data-parsley-maxlength="100" id="observaciones" data-parsley-maxlength="100"> </textarea> </div>
                              </div>
                              <div class="form-group">
                                <div class="col-sm-1"></div>
                                <div class="col-sm-2"><label for="inputEmail3" class="control-label">Otros</label></div>
                                <div class="col-sm-7"> <textarea type="text" rows="4" class="form-control" name="txtOtros" data-parsley-maxlength="100" id="observaciones" data-parsley-maxlength="100"> </textarea> </div>
                              </div>

                              </div>
                              </div>
                            </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-danger pull-left" id="btn-cerrarmodal" data-dismiss="modal" >Cerrar</button>
                                <button type="submit" class="btn btn-primary" name="guardarIndicador" >Guardar Cambios</button>
                              </div>
                          </form>
                        </div>
                      </div>
                      </div>
                  </div>

                  <!-- MODAL PARA CARGAR LOS SIGNOS VITALES CON LA SEGUN LA CONSULTA -->
 

                  <div class="example-modal modal fade" id="modalCargarConsulta">
                    <div class="modal">
                      <div class="modal-dialog modal-md">
                        <div class="modal-content">
                        <form class="form-horizontal"  role="form"  id="demo-form1" data-parsley-validate="">
                              <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title">Consulta</h4>
                              </div>
                              <div class="modal-body ">
                              <div class="form-group">
                                <div class="col-sm-1"></div>
                                <div class="col-sm-3"><label for="inputEmail3" class="control-label">Paciente</label></div>
                                <div class="col-sm-7"><input type="text" class="form-control" name="txtPaciente" id="pacientes" disabled="disabled"></div>
                              </div>
                              <div class="form-group">
                                <div class="col-sm-1"></div>
                                <div class="col-sm-3"><label for="inputEmail3" class="control-label">Medico</label></div>
                                <div class="col-sm-7"> <input type="text" class="form-control" name="txtMedico" id="medicos" disabled="disabled" value=" "></div>
                              </div>
                              <div class="form-group">
                                <div class="col-sm-1"></div>
                                <div class="col-sm-3"><label for="inputEmail3" class="control-label">Especialidad</label></div>
                                <div class="col-sm-7"> <input type="text" class="form-control" name="txtMedico" id="modulos" disabled="disabled" value=" "></div>
                              </div>
                              <div class="form-group">
                                <div class="col-sm-1"></div>
                                <div class="col-sm-3"><label for="inputEmail3" class="control-label">Fecha</label></div>
                                <div class="col-sm-7"> <input type="text" class="form-control" name="txtFecha" id="fechas" disabled="disabled"></div>
                              </div>
                              <div class="form-group">
                                <div class="col-sm-1"></div>
                                <div class="col-sm-3"><label for="inputEmail3" class="control-label">Diagnostico</label></div>
                                <div class="col-sm-7"><textarea type="text" rows="4" class="form-control" id="diagnosticos" name="txtDiagnostico" disabled="disabled"> </textarea></div>
                              </div>
                              <div class="form-group">
                                <div class="col-sm-1"></div>
                                <div class="col-sm-3"><label for="inputEmail3" class="control-label">Enfermedad</label></div>
                                <div class="col-sm-7"> <input type="text" class="form-control" name="txtEnfermedad" id="enfermedads" disabled="disabled" value=" "></div>
                              </div>
                              <div class="form-group">
                                <div class="col-sm-1"></div>
                                <div class="col-sm-3"><label for="inputEmail3" class="control-label">Comentarios</label></div>
                                <div class="col-sm-7"><textarea type="text" rows="4" class="form-control" id="comentarioss" name="txtComentarios" disabled="disabled"> </textarea></div>
                              </div>
                              <div class="form-group">
                                <div class="col-sm-1"></div>
                                <div class="col-sm-3"><label for="inputEmail3" class="control-label">Otros</label></div>
                                <div class="col-sm-5"><textarea type="text" rows="4" class="form-control" id="otross" name="txtOtros" disabled="disabled"> </textarea></div>
                              </div>
                              <div class="form-group">
                                <div class="col-sm-1"></div>
                                <div class="col-sm-3"><label for="inputEmail3" class="control-label">Peso</label></div>
                                <div class="col-sm-2"><input type="text" class="form-control"  name="txtPeso" id="pesos" disabled="disabled"> </div>
                                <div class="col-sm-2"><input type="text" class="form-control"  name="txtUnidadPeso" id="unidadpesos" disabled="disabled"> </div>
                              </div>
                              <div class="form-group">
                                <div class="col-sm-1"></div>
                                <div class="col-sm-3"><label for="inputEmail3" class="control-label">Altura</label></div>
                                <div class="col-sm-2"> <input type="text" class="form-control" name="txtAltura" id="alturas" disabled="disabled"> </div>
                                <div class="col-sm-2"> <input type="text" class="form-control" name="txtUnidadAltura" id="unidadalturas" disabled="disabled"> </div>
                              </div>
                              <div class="form-group">
                                <div class="col-sm-1"></div>
                                <div class="col-sm-3"><label for="inputEmail3" class="control-label">Temperatura</label></div>
                                <div class="col-sm-2"><input type="text" class="form-control" name="txtTemperatura" id="temperaturas" disabled="disabled"> </div>
                                <div class="col-sm-2"><input type="text" class="form-control" name="txtTemperatura" id="unidadtemperaturas" disabled="disabled"> </div>
                              </div>
                              <div class="form-group">
                                <div class="col-sm-1"></div>
                                <div class="col-sm-3"><label for="inputEmail3" class="control-label">Pulso</label></div>
                                <div class="col-sm-3"> <input type="text" class="form-control"  name="txtPulso" id="pulsos" disabled="disabled"> </div>
                                <div class="col-sm-2"> <label for="inputEmail3" class="control-label">lat/min</label></div>
                              </div>
                              <div class="form-group">
                                <div class="col-sm-1"></div>
                                <div class="col-sm-3"><label for="inputEmail3" class="control-label">Presion</label></div>
                                <div class="col-sm-2"> <input type="text" class="form-control" name="txtMax"  id="maxs" disabled="disabled"> </div>
                                <div class="col-sm-2"> <input type="text" class="form-control" name="txtMin"  id="mins" disabled="disabled"> </div>
                              </div>
                              <div class="form-group">
                                <div class="col-sm-1"></div>
                                <div class="col-sm-3"><label for="inputEmail3" class="control-label">Observaciones</label></div>
                                <div class="col-sm-7"> <textarea type="text" rows="4" class="form-control" name="txtObservaciones" id="observacioness" disabled="disabled"> </textarea> </div>
                              </div>
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-danger pull-left" id="btn-cerrarmodal" data-dismiss="modal" >Cerrar</button>
                              </div>
                          </form>
                        </div>
                      </div>
                      </div>
                  </div>

                  <!-- MODAL PARA GUARDAR NUEVOS EXAMENES -->

                </div>
              <div class="col-xs-0">
              </div>
              </div>
        </section>

      </div>

    <?php include '../include/footer.php'; ?>


<script type="text/javascript">
    $(document).ready(function(){
        $(".btn-mdl").click(function(){
            var id = $(this).attr("id").replace("btn","");

            var myData  = {"id":id};
            //alert(myData);
            $.ajax({
                url   : "enfermeria_cargar_consulta.php",
                type  :  "POST",
                data  :   myData,
                dataType : "JSON",
                beforeSend : function(){
                    $(this).html("Cargando");
                },
                success : function(data){
                    $("#paciente").val(data.Paciente);
                    $("#medico").val(data.Medico);
                    $("#modulo").val(data.Especialidad);
                    $("#fecha").val(data.FechaConsulta);
                    $("#idconsulta").val(id)
                    $("#modalSignosVitales").modal("show");
                }
            });
        });

        $(".btn-mdls").click(function(){
            var id = $(this).attr("id").replace("btn","");
            var myData  = {"id":id};
            //alert(myData);
            $.ajax({
                url   : "medico_cargar_consultasignosvitales.php",
                type  :  "POST",
                data  :   myData,
                dataType : "JSON",
                beforeSend : function(){
                    $(this).html("Cargando");
                },
                success : function(data){
                    $("#pacientes").val(data.Paciente);
                    $("#medicos").val(data.Medico);
                    $("#modulos").val(data.Especialidad);
                    $("#fechas").val(data.FechaConsulta);
                    $("#diagnosticos").val(data.Diagnostico);
                    $("#enfermedads").val(data.Enfermedad);
                    $("#comentarioss").val(data.Comentarios);
                    $("#otross").val(data.Otros);
                    $("#pesos").val(data.Peso);
                    if (data.UnidadPeso ==1){
                        $("#unidadpesos").val("Kg");
                    }
                    else{
                      $("#unidadpesos").val("Lbs");
                    }
                    $("#alturas").val(data.Altura);
                    if (data.UnidadAltura ==1){
                        $("#unidadalturas").val("Mts");
                    }
                    else{
                      $("#unidadalturas").val("Pies");
                    }
                    $("#temperaturas").val(data.Temperatura)
                    if (data.UnidadTemperatura ==1){
                        $("#unidadtemperaturas").val("C");
                    }
                    else{
                      $("#unidadtemperaturas").val("F");
                    }
                    $("#pulsos").val(data.Pulso)
                    $("#maxs").val(data.Max)
                    $("#mins").val(data.Min)
                    $("#observacioness").val(data.Observaciones)
                    $("#modalCargarConsulta").modal("show");
                }
            });
        });


    $('#demo-form1').parsley().on('field:validated', function() {
    var ok = $('.parsley-error').length === 0;
    $('.bs-callout-info').toggleClass('hidden', !ok);
    $('.bs-callout-warning').toggleClass('hidden', ok);
      })
      .on('form:submit', function() {
        return true;
      });
    });
</script>

</body>
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
