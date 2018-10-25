<?php

include '../include/dbconnect.php';
session_start();

if (!empty($_SESSION['user']))
  {
  $querylotes = "
SELECT concat(A.NombreMedicamento, ' - ', B.NombrePresentacion) as NOMBRE, A.Codigo as CODIGO, A.Lote as LOTE, 
DATE_FORMAT(A.FechaExpedicion,'%d-%m-%Y') as FECHA_EXPEDICION,
 DATE_FORMAT(A.FechaVencimiento,'%d-%m-%Y') as FECHA_VENCIMIENTO, A.IdMedicamento as IDMEDICAMENTO, A.Existencia as EXISTENCIA, 
 alertaVencimiento( datediff(a.FechaVencimiento,now()) ) as  color
FROM medicamentos as A
LEFT JOIN presentacion as B on B.IdPresentacion = A.IdPresentacion
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
   <body class="hold-transition skin-blue sidebar-mini sidebar-collapse">

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
    <table id="example1" class="table table-bordered table-hover table-striped table-responsive">
    <tr class = "info">
      <th>MEDICAMENTO</th><th>CODIGO</th><th>LOTE</th><th>F.EXPEDICION</th>
      <th>F.VENCIMIENTO</th><th>CANTIDAD</th><th>MOTIVO</th><th>ACCION</th>
    </tr>
    <tbody>
     <?php
      while ($row = $resultadoquerylotes->fetch_assoc())
        {
          echo "
          <form action = 'farmacia_guardar_baja_lotes.php' method = 'POST'>
          <tr>
          <td>".$row['NOMBRE']."</td>
          <td>".$row['CODIGO']."</td>
          <td>".$row['LOTE']."</td>
          <td>".$row['FECHA_EXPEDICION']."</td>
          <td class='". $row['color'] ."'>".$row['FECHA_VENCIMIENTO']."</td>
          <td><input type = 'text' name = 'cantidad'> / ".$row['EXISTENCIA']."</td>
          <td>
            <select class='form-control select2' style='width: 100%;' name = 'ID_MOVIMIENTO'>
              <option value = '' selected>Elija un motivo</option>
              <option value = '2'>Salida de Medicamento</option>
              <option value = '3'>Baja por Vencimiento</option>
              <option value = '4'>Baja por Deterioro</option>
              <option value = '5'>Baja por Donacion</option>
              <option value = '6'>Salida por Despacho</option>
            </select>
          </td>
          <td>
          <input class = 'btn btn-warning' type = 'submit' value = 'Dar de Baja'>
          </td>
          <input type = 'hidden' name = 'codigo' value = ".$row['CODIGO'].">
          <input type = 'hidden' name = 'idmedicamento' value = ".$row['IDMEDICAMENTO'].">
          <input type = 'hidden' name = 'existencia' value = '".$row['EXISTENCIA']."'>
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