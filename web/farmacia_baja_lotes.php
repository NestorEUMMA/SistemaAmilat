<?php

include '../include/dbconnect.php';
session_start();

if (!empty($_SESSION['user']))
  {
  $querylotes = "
SELECT concat(B.NombreMedicamento, ' - ', C.NombrePresentacion) as NOMBRE, A.CodigoLote as CODIGO, A.FechaExpedicion as FECHA_EXPEDICION,
 A.FechaVencimiento as FECHA_VENCIMIENTO, A.Cantidad as CANTIDAD, B.Existencia as EXISTENCIA, B.IdMedicamento as IDMEDICAMENTO
FROM medicamentolote as A
LEFT JOIN medicamentos as B on B.IdMedicamento = A.IdMedicamento
LEFT JOIN presentacion as C on C.IdPresentacion = B.IdPresentacion
WHERE A.activo = 1
ORDER BY A.FechaVencimiento DESC
              ";
    $resultadoquerylotes = $mysqli->query($querylotes);

  $querymovimientos = "
    SELECT IdMovimiento as ID_MOVIMIENTO, NombreMovimiento as NOMBRE_MOVIMIENTO
      FROM movimientos
    WHERE IdMovimiento in (3, 4)
      ORDER BY IdMovimiento ASC
                ";
  $resultadoquerymovimientos = $mysqli->query($querymovimientos);

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
    <!-- Content Header (Page header) -->
    <section class="content-header">
    <ol class="breadcrumb">
    </ol>
    </section>

    <section class="content">
    <div class="row">
    <div class="col-xs-12">
    <div class="box">
    <div class="box-header with-border">
    <h3 class="box-title">BAJA DE MEDICAMENTOS</h3>
    </div>
  <!-- /.box-header -->
    <div class="box-body">
    <table id="example2" class="table table-bordered table-hover">
    <tr>
      <th>MEDICAMENTO</th><th>CODIGO</th><th>F.EXPEDICION</th>
      <th>F.VENCIMIENTO</th><th>CANTIDAD</th><th>MOTIVO</th><th>ACCION</th>
    </tr>
     <?php
      while ($row = $resultadoquerylotes->fetch_assoc())
        {
          echo "<tbody>";
          echo "
          <form action = 'farmacia_guardar_baja_lotes.php' method = 'POST'>
          <tr>
          <td>".$row['NOMBRE']."</td>
          <td>".$row['CODIGO']."</td>
          <td>".$row['FECHA_EXPEDICION']."</td>
          <td>".$row['FECHA_VENCIMIENTO']."</td>
          <td><input type = 'text' name = 'cantidad'></td>
          <td>
            <select class='form-control select2' style='width: 100%;' name = 'ID_MOVIMIENTO'>
              <option value = '3'>Baja por Vencimiento</option>
              <option value = '4'>Baja por Deterioro</option>
            </select>
          </td>
          <td>
          <input class = 'btn btn-warning' type = 'submit' value = 'Dar de Baja'>
          </td>
          <input type = 'hidden' name = 'codigo' value = ".$row['CODIGO'].">
          <input type = 'hidden' name = 'idmedicamento' value = ".$row['IDMEDICAMENTO'].">
          </tr>
          ";
          echo "</form>";
        }
        
        echo "</tbody>";
        echo "</table>";
        ?>


    </div>
    </div>
    </div>
    </div>
    </section>
  </div>
    <?php include '../include/footer.php'; ?>
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