<?php
include '../include/dbconnect.php';
session_start();


if (!empty($_SESSION['user']))
  {


$query = "
SELECT B.NombreMedicamento as NOMBRE, A.CodigoLote as CODIGO, A.FechaEntrada as FECHAE,
 A.FechaVencimiento as FECHAV, A.Cantidad as CANTIDAD, B.Existencia as EXISTENCIA, B.IdMedicamento as IDMEDICAMENTO
FROM medicamentolote as A
LEFT JOIN medicamentos as B on B.IdMedicamento = A.IdMedicamento
WHERE A.activo = 1
ORDER BY A.FechaVencimiento DESC
";
$resultado = $mysqli->query($query);

?>

<!DOCTYPE html>
<html>
<head>
</head>
<?php  include '../include/asset.php'; ?>
<body class="hold-transition skin-blue sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">
<?php include '../include/header.php'; ?>
<?php include '../include/aside.php'; ?>
<!-- =============================================== -->
<!-- Content Wrapper. Contains page content -->


      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Baja por Vencimiento
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
              <h3 class="box-title">Baja de Medicamento por Vencimiento</h3>
            </div><!-- /.box-header -->
                <div class="box-body">
                <form action = "guardar_bajas.php" method = "POST">
                
                    <table id="example2" class="table table-bordered table-hover">
                    <tr>
                    <td>NOMBRE</td><td>CODIGO</td><td>FECHA ENTRADA</td><td>FECHA VENCIMIENTO</td><td>CANTIDAD</td><td>ACCION</td>
                    </tr>
                          <?php
                          while ($row = $resultado->fetch_assoc()) {
                          echo "
                            <form action = 'guardar_bajas.php' method = 'POST'>
                              <tr>
                                <td>".$row['NOMBRE']."</td><td>".$row['CODIGO']."</td><td>".$row['FECHAE']."</td><td>".$row['FECHAV']."</td>
                                <td>".$row['CANTIDAD']."</td><td><input class='btn btn-warning' type = 'submit' value = 'Dar de baja'></td>
                                <input type = 'hidden' name = 'codigo' value = ".$row['CODIGO'].">
                                <input type = 'hidden' name = 'cantidad' value = ".$row['CANTIDAD'].">
                                <input type = 'hidden' name = 'existencia' value = ".$row['EXISTENCIA'].">
                                <input type = 'hidden' name = 'idmedicamento' value = ".$row['IDMEDICAMENTO'].">
                              </tr>
                            </form>
                          ";
                                                                                }
                          ?>
                    </table>
                  </form>
                </div>
        </div>
        </div>
        </div>

        <form id="frm" action="pasante_expediente_clinico.php" method="post" class="hidden">
          <input type="text" id="IdPersona" name="IdPersona" />
        </form>


        </section>


        <!-- Main content -->

      </div>



  <?php include '../include/footer.php'; ?>
  </section>
  </body>
  <!-- Main content -->
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