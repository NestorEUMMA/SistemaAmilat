<?php
include '../include/dbconnect.php';
session_start();


if (!empty($_SESSION['user']))
  {


$query = "
SELECT C.NombreMedicamento as NOMBRE_MEDICAMENTO, B.CodigoLote as CODIGOLOTE, B.Cantidad as CANTIDAD, B.FechaEntrada as FECHA_ENTRADA,
 B.FechaVencimiento as FECHA_VENCIMIENTO, A.Fecha as FECHA, CONCAT(D.Nombres, ' ' , D.Apellidos) as NOMBRE_USUARIO
FROM bajavencimiento as A
LEFT JOIN medicamentolote as B on B.CodigoLote = A.CodigoLote
LEFT JOIN medicamentos as C on C.IdMedicamento = B.IdMedicamento
LEFT JOIN usuario as D on D.IdUsuario = A.IdUsuario
ORDER BY A.Fecha DESC
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
            Historial de Bajas
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
              <h3 class="box-title">Historial de Bajas</h3>
            </div><!-- /.box-header -->
                <div class="box-body">
                  <table id="example2" class="table table-bordered table-hover">
                    <?php
                            echo"<thead>";
                                echo"<tr>";
                                echo"<th>Nombre Medicamento</th>";
                                echo"<th>Codigo Lote</th>";
                                echo"<th>Cantidad</th>";
                                echo"<th>Fecha de Entrada</th>";
                                echo"<th>Fecha de Vencimiento</th>";
                                echo"<th>Fecha de Baja</th>";
                                echo"<th>Nombre de Usuario</th>";
                                echo"</tr>";
                            echo"</thead>";
                            echo"<tbody>";

                            while ($row = $resultado->fetch_assoc()) {
                            echo "
                                <tr>
                                  <td>".$row['NOMBRE_MEDICAMENTO']."</td><td>".$row['CODIGOLOTE']."</td><td>".$row['CANTIDAD']."</td>
                                  <td>".$row['FECHA_ENTRADA']."</td><td>".$row['FECHA_VENCIMIENTO']."</td><td>".$row['FECHA']."</td>
                                  <td>".$row['NOMBRE_USUARIO']."</td>
                                </tr>
                            ";
                                                                                  }
                            ?>

                  </table>
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


<!-- /.content-wrapper -->
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