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
              <h3 class="box-title">Examen Heces para: <?php echo $nombrepaciente  ?></h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form class="form-horizontal" action = "guardar_examen_heces.php" method = "POST">
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
                  <label for="inputEmail3" class="col-sm-2 control-label">Consistencia</label>

                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="consistencia" name="consistencia" placeholder="Consistencia">
                  </div>
                </div>
                     <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Mucus</label>

                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="mucus" name="mucus" placeholder="mucus">
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
                  <label for="inputEmail3" class="col-sm-2 control-label">Restosalimenticios</label>

                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="restosalimenticios" name="restosalimenticios" placeholder="Restosalimenticios">
                  </div>
                </div>
                     <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Macroscopicos</label>

                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="macroscopicos" name="macroscopicos" placeholder="macroscopicos">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Microscopicos</label>

                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="microscopicos" name="microscopicos" placeholder="Microscopicos">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Flora Bacteriana</label>

                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="florabacteriana" name="florabacteriana" placeholder="Florabacteriana">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Otros</label>

                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="otros" name="otros" placeholder="Otros">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">pactivos</label>

                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="pactivos" name="pactivos" placeholder="Pactivos">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Pquistes</label>

                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="pquistes" name="pquistes" placeholder="Pquistes">
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
