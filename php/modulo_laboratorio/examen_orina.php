<?php

include '../../include/dbconnect.php';
session_start();

if (!empty($_SESSION['user']))
  {

             $idlistaexamen = $_POST["txtListaExamen"];
            $queryexamenesactivos = "SELECT  c.IdConsulta As 'Consulta', u.IdUsuario As 'IdMedico', CONCAT(u.Nombres,' ', u.Apellidos) As 'Medico', p.IdPersona As 'IdPaciente', CONCAT(p.Nombres,' ', p.Apellidos) As 'Paciente',
                                    te.IdTipoExamen As 'Examen'
                                  FROM listaexamen le
                                  INNER JOIN usuario u ON le.IdUsuario = u.IdUsuario
                                  INNER JOIN persona p ON le.IdPersona = p.IdPersona
                                  LEFT JOIN consulta c ON le.IdConsulta = c.IdConsulta
                                  INNER JOIN tipoexamen te ON le.IdTipoExamen = te.IdTipoExamen
                                  WHERE le.IdListaExamen = '$idlistaexamen'";
            $resultadoexamenesactivos = $mysqli->query($queryexamenesactivos);
              while ($test = $resultadoexamenesactivos->fetch_assoc())
              {
                  $idexamentipo = $test['Examen'];
                  $idconsulta = $test['Consulta'];
                  $idusuario = $test['IdMedico'];
                  $idpersona = $test['IdPaciente'];
                  $nombrepaciente = $test['Paciente'];
                  $nombremedico = $test['Medico'];

              }

?>

<!DOCTYPE html>
<html>

   <?php  include '../../include/asset.php'; ?>
   <body class="hold-transition skin-blue sidebar-mini">
    <!-- Site wrapper -->
    <div class="wrapper">



     <?php include '../../include/header.php'; ?>
      <?php include '../../include/aside.php'; ?>

      <!-- =============================================== -->

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">

        </section>

        <section class="content">

 <div class="row">
        <!-- left column -->

        <!--/.col (left) -->
        <!-- right column -->
        <div class="col-md-12">
          <!-- Horizontal Form -->
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Examen de Orina para: <?php echo $nombrepaciente  ?></h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form class="form-horizontal" action = "guardar_examen_orina.php" method = "POST">
              <div class="box-body">
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Color</label>

                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="color" name = "color" placeholder="Color">
                  </div>
                  <div class="col-sm-10 hidden">
                    <input type="text" class="form-control" id="idconsulta" name = "idconsulta" value="<?php echo $idconsulta ?>" placeholder="Globulos Rojos">
                  </div>
                  <div class="col-sm-10 hidden">
                    <input type="text" class="form-control" id="idpersona" name = "idpersona" value="<?php echo $idpersona ?>" placeholder="Globulos Rojos">
                  </div>
                  <div class="col-sm-10 hidden">
                    <input type="text" class="form-control" id="idlistaexamen" name = "idlistaexamen" value="<?php echo $idlistaexamen ?>" placeholder="Globulos Rojos">
                  </div>
                </div>
                     <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Olor</label>

                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="olor" name="olor" placeholder="Olor">
                  </div>
                </div>
                     <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Aspecto</label>

                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="aspecto" name="aspecto" placeholder="Aspecto">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Densidad</label>

                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="densidad" name="densidad" placeholder="Densidad">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">PH</label>

                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="ph" name="ph" placeholder="PH">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Proteinas</label>

                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="proteinas" name="proteinas" placeholder="Proteinas">
                  </div>
                </div>
                     <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Glucosa</label>

                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="glucosa" name="glucosa" placeholder="Glucosa">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Sangre Oculta</label>

                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="sangreoculta" name="sangreoculta" placeholder="Sangre Oculta">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Cuerpos Cetomicos</label>

                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="cuerposcetomicos" name="cuerposcetomicos" placeholder="Cuerpos Cetomicos">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Urobilinogeno</label>

                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="urobilinogeno" name="urobilinogeno" placeholder="Urobilinogeno">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Bilirrubina</label>

                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="bilirrubina" name="bilirrubina" placeholder="Bilirrubina">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Esterasa Leucocitaria</label>

                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="esterasaleucocitaria" name="esterasaleucocitaria" placeholder="Esterasa Leucocitaria">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Cilindros</label>

                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="cilindros" name="cilindros" placeholder="Cilindros">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Hematies</label>

                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="hematies" name="hematies" placeholder="Hematies">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Leucocitos</label>

                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="leucocitos" name="leucocitos" placeholder="Leucocitos">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Celulas Epiteliales</label>

                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="celulasepiteliales" name="celulasepiteliales" placeholder="Celulas Epiteliales">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Elementos Minerales</label>

                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="elementosminerales" name="elementosminerales" placeholder="Elementos Minerales">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Parasitos</label>

                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="parasitos" name="parasitos" placeholder="Parasitos">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Observaciones</label>

                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="observaciones" name="observaciones" placeholder="Observaciones">
                  </div>
                </div>

                <div class="form-group">
                  <div class="col-sm-offset-2 col-sm-10">

                  </div>
                </div>
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <button type="submit" class="btn btn-default">Cancel</button>
                <button type="submit" value = "Guardar" class="btn btn-info pull-right">Guardar</button>
              </div>
              <!-- /.box-footer -->
            </form>
          </div>

        </div>

        </section>


        <!-- Main content -->

      </div><!-- /.content-wrapper -->

    <?php include '../../include/footer.php'; ?>


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
