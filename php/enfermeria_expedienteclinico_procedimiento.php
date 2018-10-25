<?php
include '../include/dbconnect.php';
session_start();

if (!empty($_SESSION['user'])) {

    $id = $_REQUEST['IdPersona'];
    $queryexpedientes = "SELECT * FROM persona WHERE IdPersona  = '$id'";
    $resultadoexpedientes = $mysqli->query($queryexpedientes);
    while ($test = $resultadoexpedientes->fetch_assoc()) {
        $idpersona = $test['IdPersona'];
        $nombres = $test['Nombres'];
        $apellidos = $test['Apellidos'];
        $dui = $test['Dui'];
        $fnacimiento = $test['FechaNacimiento'];
        $geografia = $test['IdGeografia'];
        $direccion = $test['Direccion'];
        $genero = $test['Genero'];
        $estadocivil = $test['IdEstadoCivil'];
          $nombreResponsable = $test['NombresResponsable'];
          $apellidoResponsable = $test['ApellidosResponsable'];
        $parentesco = $test['IdParentesco'];
        $telefono = $test['Telefono'];
        $celular = $test['Celular'];
        $correo = $test['Correo'];
        $alergias = $test['Alergias'];
        $medicinas = $test['Medicamentos'];
        $enfermedad = $test['Enfermedad'];
        $telefonoresponsable = $test['TelefonoResponsable'];
        $date = date("Y-m-d H:i:s");
    }

    $querydepartamentos = "SELECT * from geografia where IdGeografia='$geografia'";
    $resultadodepartamentos = $mysqli->query($querydepartamentos);

    $queryestadocivil = "SELECT * from estadocivil where IdEstadoCivil = '$estadocivil'";
    $resultadoestadocivil = $mysqli->query($queryestadocivil);

    $queryusuario = "SELECT u.IdUsuario as 'IdUsuario', CONCAT(u.Nombres,  ' ', u.Apellidos) as 'NombreCompleto', p.Descripcion
																  from usuario u
																  inner join puesto = p on u.IdPuesto = p.IdPuesto
																  where p.Descripcion = 'Enfermeria' and u.Activo = 1 ";
    $resultadousuario = $mysqli->query($queryusuario);


    $querymodulo = "SELECT * from modulo order by NombreModulo asc";
    $resultadomodulo = $mysqli->query($querymodulo);

    $querytablaconsulta = "SELECT ep.IdEnfermeriaProcedimiento As 'ID', CONCAT(p.Nombres,' ',p.Apellidos) As 'Paciente',
					CONCAT(u.Nombres,' ',u.Apellidos) As 'Medico', m.NombreModulo As 'Modulo', ep.FechaProcedimiento As 'Fecha', 
					  mp.Nombre As 'Motivo', ep.Observaciones As 'Observaciones', ep.Estado As 'Estado'   
					  FROM enfermeriaprocedimiento ep
					  INNER JOIN persona p ON p.IdPersona = ep.IdPersona
					  INNER JOIN usuario u ON u.IdUsuario = ep.IdUsuario
					  INNER JOIN modulo m ON m.IdModulo = ep.IdModulo
					  INNER JOIN motivoprocedimiento mp ON mp.IdMotivoProcedimiento = ep.IdMotivoProcedimiento
					  WHERE p.IdPersona = '$id'
					  order by ep.IdEnfermeriaProcedimiento DESC";

    $resultadotablaconsulta = $mysqli->query($querytablaconsulta);

    $queryselectprocedimiento = "SELECT * FROM motivoprocedimiento";

    $resultadoselectprocedimiento = $mysqli->query($queryselectprocedimiento);
    ?>

    <!DOCTYPE html>
    <html>

        <?php include '../include/asset.php'; ?>
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
                                        <h3 class="box-title"> Expediente de  <h2><?php echo $nombres . " " . $apellidos ?> </h2> </h3>
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
                                                                            echo "<option value = '" . $row['IdGeografia'] . "'>" . $row['Nombre'] . "</option>";
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
                                                                            echo "<option value = '" . $row['IdEstadoCivil'] . "'>" . $row['Nombre'] . "</option>";
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
                                                                    <input type="text" class="form-control" disabled="disabled" name="txtResponsable" required="" value="<?php echo $nombreResponsable. " " .$apellidoResponsable ?>" />
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
                                                            <div class="col-sm-4">
                                                                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modalConsulta"> Nuevo Procedimiento </button>
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
                                                        <form class="form-horizontal" action="enfermeria_guardar_procedimiento.php" role="form" method="POST">
                                                            <div class="modal-header">
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span></button>
                                                                <h4 class="modal-title">Nueva Procedimiento</h4>
                                                            </div>
                                                            <div class="modal-body">

                                                                <div class="form-group">
                                                                    <div class="col-sm-1"></div>
                                                                    <div class="col-sm-3"><label for="inputEmail3" class="control-label">Fecha</label></div>
                                                                    <div class="col-sm-7"><input  value="<?php echo $date ?>" class="form-control" name="txtFecha" disabled="disabled"></div>
                                                                    <div class="col-sm-1"></div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <div class="col-sm-1"></div>
                                                                    <div class="col-sm-3"><label for="inputEmail3" class="control-label">Enfermera</label></div>
                                                                    <div class="col-sm-7">
                                                                    <input type="text" value="<?php echo $nombreusuario; ?>" class="form-control"  disabled="disabled" name="cboUsuario" >
                                                                    </div>
                                                                    <div class="col-sm-1"></div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <div class="col-sm-1"></div>
                                                                    <div class="col-sm-3"><label for="inputEmail3" class="control-label">Paciente</label></div>
                                                                    <div class="col-sm-7"><input type="text" value="<?php echo $nombres . " " . $apellidos ?>" class="form-control"  disabled="disabled" >
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
                                                                                echo "<option value = '" . $row['IdModulo'] . "'>" . $row['NombreModulo'] . "</option>";
                                                                            }
                                                                            ?>
                                                                        </select></div>
                                                                    <div class="col-sm-1"></div>
                                                                </div>

                                                                <div class="form-group">
                                                                    <div class="col-sm-1"></div>
                                                                    <div class="col-sm-3"><label for="inputEmail3" class="control-label">Procedimientos </label></div>
                                                                    <div class="col-sm-7">
                                                                        <select class="form-control select2" style="width: 100%;" name="cboMotivo">
                                                                            <?php
                                                                            while ($row = $resultadoselectprocedimiento->fetch_assoc()) {
                                                                                echo "<option value = '" . $row['IdMotivoProcedimiento'] . "'>" . $row['Nombre'] . "</option>";
                                                                            }
                                                                            ?>
                                                                        </select></div>
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
                                        <h3 class="box-title">Historial de Procedimientos</h3>
                                    </div><!-- /.box-header -->
                                    <div class="box-body">
                                        <table id="example2" class="table table-bordered table-hover">
                                            <?php
                                            echo"<thead>";
                                            echo"<tr>";
                                            echo"<th>ID</th>";
                                            echo"<th>Fecha</th>";
                                            echo"<th>Nombre de Paciente</th>";
                                            echo"<th>Nombre de Medico</th>";
                                            echo"<th>Nombre de Especialidad</th>";
                                            echo"<th>Motivo</th>";
                                            echo"<th>Accion</th>";
                                            echo"</tr>";
                                            echo"</thead>";
                                            echo"<tbody>";
                                            while ($row = $resultadotablaconsulta->fetch_assoc()) {

                                                $idSignosVitales = $row['ID'];
                                                echo"<tr>";
                                                echo"<td>" . $row['ID'] . "</td>";
                                                echo"<td>" . $row['Fecha'] . "</td>";
                                                echo"<td>" . $row['Paciente'] . "</td>";
                                                echo"<td>" . $row['Medico'] . "</td>";
                                                echo"<td>" . $row['Modulo'] . "</td>";
                                                echo"<td>" . $row['Motivo'] . "</td>";
                                                if ($row['Estado'] == 1) {
                                                    echo "<td>" .
                                                    "<span id='btn" . $idSignosVitales . "' class='btn btn-xs btn-success btn-mdl'>Ingresar Consulta</span>" .
                                                    "</td>";
                                                } else {
                                                    echo "<td>" .
                                                    "<span id='btn" . $idSignosVitales . "' class='btn btn-xs btn-warning btn-mdls'>Ver Consulta</span>" .
                                                    "</td>";
                                                }
                                                echo"</tr>";
                                                echo"</body>  ";
                                            }
                                            ?>

                                        </table>
                                    </div>
                                </div>

                                <div class="example-modal modal fade" id="modalConsultaProcedimiento">
                                    <div class="modal">
                                        <div class="modal-dialog modal-lg">
                                            <div class="modal-content">
                                                <form class="form-horizontal" action="enfermeria_finalizarprocedimiento.php"  role="form" method="POST" id="demo-form1" data-parsley-validate="">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span></button>
                                                        <h3><i class="fa fa-globe"></i> Centro Medico Familiar Shalom</h3>
                                                        <h4 class="modal-title">REPORTE DE PROCEDIMIENTOS</h4>
                                                    </div>
                                                    <div class="modal-body ">
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <div class="box box-primary">
                                                                    <div class="box-header with-border">
                                                                        <h3 class="box-title">FICHA DE CONSULTA</h3>
                                                                    </div>
                                                                    <div class="form-group hidden">
                                                                        <div class="col-sm-7"><input type="text"  name="txtid" value="<?php echo $idpersona ?>">  </div>
                                                                        <div class="col-sm-7"><input type="text"  name="txtProcedimiento" id="idprocedimiento">  </div>
                                                                    </div>

                                                                    <div class="form-group">
                                                                        <div class="col-sm-1"></div>
                                                                        <div class="col-sm-3"><label for="inputEmail3" class="control-label">Paciente</label></div>
                                                                        <div class="col-sm-7"><input type="text" class="form-control" name="txtPaciente" id="paciente" disabled="disabled"></div>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <div class="col-sm-1"></div>
                                                                        <div class="col-sm-3"><label for="inputEmail3" class="control-label">Medico</label></div>
                                                                        <div class="col-sm-7"> <input type="text" class="form-control" name="txtMedico" id="medico" disabled="disabled" value=" "></div>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <div class="col-sm-1"></div>
                                                                        <div class="col-sm-3"><label for="inputEmail3" class="control-label">Especialidad</label></div>
                                                                        <div class="col-sm-7"> <input type="text" class="form-control" name="txtMedico" id="modulo" disabled="disabled" value=" "></div>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <div class="col-sm-1"></div>
                                                                        <div class="col-sm-3"><label for="inputEmail3" class="control-label">Fecha</label></div>
                                                                        <div class="col-sm-7"> <input type="text" class="form-control" name="txtFecha" id="fecha" disabled="disabled"></div>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <div class="col-sm-1"></div>
                                                                        <div class="col-sm-3"><label for="inputEmail3" class="control-label">Procedimiento</label></div>
                                                                        <div class="col-sm-7"> <input type="text" class="form-control" name="" id="motivo" disabled="disabled"></div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <div class="box box-primary">
                                                                    <div class="box-header with-border">
                                                                        <h3 class="box-title">OTROS</h3>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <div class="col-sm-1"></div>
                                                                        <div class="col-sm-3"><label for="inputEmail3" class="control-label">Observaciones</label></div>
                                                                        <div class="col-sm-7"> <textarea type="text" rows="8" class="form-control" name="txtObservaciones" data-parsley-maxlength="400" id="observaciones"> </textarea> </div>
                                                                    </div>
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

                                <div class="example-modal modal fade" id="modalCargarProcedimientos">
                                    <div class="modal">
                                        <div class="modal-dialog modal-lg">
                                            <div class="modal-content">
                                                <form class="form-horizontal" action="enfermeria_finalizarprocedimiento.php"  role="form" method="POST" id="demo-form1" data-parsley-validate="">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span></button>
                                                        <h3><i class="fa fa-globe"></i> Centro Medico Familiar Shalom</h3>
                                                        <h4 class="modal-title">REPORTE DE PROCEDIMIENTOS</h4>
                                                    </div>
                                                    <div class="modal-body ">
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <div class="box box-primary">
                                                                    <div class="box-header with-border">
                                                                        <h3 class="box-title">FICHA DE CONSULTA</h3>
                                                                    </div>

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
                                                                        <div class="col-sm-3"><label for="inputEmail3" class="control-label">Procedimiento</label></div>
                                                                        <div class="col-sm-7"> <input type="text" class="form-control" name="" id="motivos" disabled="disabled"></div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <div class="box box-primary">
                                                                    <div class="box-header with-border">
                                                                        <h3 class="box-title">OTROS</h3>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <div class="col-sm-1"></div>
                                                                        <div class="col-sm-3"><label for="inputEmail3" class="control-label">Observaciones</label></div>
                                                                        <div class="col-sm-7"> <textarea disabled="disabled" type="text" rows="8" class="form-control" name="txtObservaciones" data-parsley-maxlength="400" id="observacioness"> </textarea> </div>
                                                                    </div>
                                                                </div>
                                                            </div>
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
                            </div>
                            <div class="col-xs-0">
                            </div>
                        </div>
                    </section>

                </div>

                <?php include '../include/footer.php'; ?>


                <script type="text/javascript">
                    $(document).ready(function () {
                        $(".btn-mdl").click(function () {
                            var id = $(this).attr("id").replace("btn", "");

                            var myData = {"id": id};
                            //alert(myData);
                            $.ajax({
                                url: "enfermeria_cargar_procedimiento.php",
                                type: "POST",
                                data: myData,
                                dataType: "JSON",
                                beforeSend: function () {
                                    $(this).html("Cargando");
                                },
                                success: function (data) {
                                    $("#paciente").val(data.Paciente);
                                    $("#medico").val(data.Medico);
                                    $("#modulo").val(data.Especialidad);
                                    $("#fecha").val(data.FechaConsulta);
                                    $("#motivo").val(data.Motivo);
                                    $("#idprocedimiento").val(data.ID);
                                    $("#modalConsultaProcedimiento").modal("show");
                                }
                            });
                        });

                        $(".btn-mdls").click(function () {
                            var id = $(this).attr("id").replace("btn", "");

                            var myData = {"id": id};
                            //alert(myData);
                            $.ajax({
                                url: "enfermeria_cargar_procedimientoterminado.php",
                                type: "POST",
                                data: myData,
                                dataType: "JSON",
                                beforeSend: function () {
                                    $(this).html("Cargando");
                                },
                                success: function (data) {
                                    $("#pacientes").val(data.Paciente);
                                    $("#medicos").val(data.Medico);
                                    $("#modulos").val(data.Especialidad);
                                    $("#fechas").val(data.FechaConsulta);
                                    $("#motivos").val(data.Motivo);
                                    $("#observacioness").val(data.Observaciones);
                                    $("#modalCargarProcedimientos").modal("show");
                                }
                            });
                        });


                        $('#demo-form1').parsley().on('field:validated', function () {
                            var ok = $('.parsley-error').length === 0;
                            $('.bs-callout-info').toggleClass('hidden', !ok);
                            $('.bs-callout-warning').toggleClass('hidden', ok);
                        })
                                .on('form:submit', function () {
                                    return true;
                                });
                    });
                </script>

        </body>
    </html>

    <?php
} else {
    echo "
  <script>
	alert('No ha iniciado sesion');
	document.location='../index.php';
  </script>
  ";
}
?>
