<?php

include '../include/dbconnect.php';
session_start();

if (!empty($_SESSION['user']))
  {
  $querylotes = "
<<<<<<< HEAD
SELECT concat(B.NombreMedicamento, ' - ', C.NombrePresentacion) as NOMBRE, A.CodigoLote as CODIGO, A.FechaExpedicion as FECHA_EXPEDICION,
 A.FechaVencimiento as FECHA_VENCIMIENTO, A.Cantidad as CANTIDAD, B.Existencia as EXISTENCIA, B.IdMedicamento as IDMEDICAMENTO
FROM medicamentolote as A
LEFT JOIN medicamentos as B on B.IdMedicamento = A.IdMedicamento
LEFT JOIN presentacion as C on C.IdPresentacion = B.IdPresentacion
=======
SELECT concat(A.NombreMedicamento, ' - ', B.NombrePresentacion) as NOMBRE, A.Codigo as CODIGO, A.Lote as LOTE, 
DATE_FORMAT(A.FechaExpedicion,'%d-%m-%Y') as FECHA_EXPEDICION,
 DATE_FORMAT(A.FechaVencimiento,'%d-%m-%Y') as FECHA_VENCIMIENTO, A.IdMedicamento as IDMEDICAMENTO, A.Existencia as EXISTENCIA,
 alertaVencimiento( datediff(A.FechaVencimiento,now()) ) as  color
FROM medicamentos as A
LEFT JOIN presentacion as B on B.IdPresentacion = A.IdPresentacion
>>>>>>> 8183526251e38fb23b35d74e5226aedd161417a1
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
<<<<<<< HEAD
   <body class="hold-transition skin-blue sidebar-mini">
=======
   <body class="hold-transition skin-blue sidebar-mini sidebar-collapse">
>>>>>>> 8183526251e38fb23b35d74e5226aedd161417a1

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
<<<<<<< HEAD
    <table id="example2" class="table table-bordered table-hover">
    <tr>
      <th>MEDICAMENTO</th><th>CODIGO</th><th>F.EXPEDICION</th>
      <th>F.VENCIMIENTO</th><th>CANTIDAD</th><th>MOTIVO</th><th>ACCION</th>
    </tr>
     <?php
      while ($row = $resultadoquerylotes->fetch_assoc())
        {
          echo "<tbody>";
=======
    <table id="example2" class="table table-bordered table-hover table-striped table-responsive">
    <tr class = "info">
      <th>MEDICAMENTO</th><th>CODIGO</th><th>LOTE</th><th>F.EXPEDICION</th>
      <th>F.VENCIMIENTO</th><th>CANTIDAD</th><th>MOTIVO</th><th>ACCION</th>
    </tr>
    <tbody>
     <?php
      while ($row = $resultadoquerylotes->fetch_assoc())
        {
>>>>>>> 8183526251e38fb23b35d74e5226aedd161417a1
          echo "
          <form action = 'farmacia_guardar_baja_lotes.php' method = 'POST'>
          <tr>
          <td>".$row['NOMBRE']."</td>
          <td>".$row['CODIGO']."</td>
<<<<<<< HEAD
          <td>".$row['FECHA_EXPEDICION']."</td>
          <td>".$row['FECHA_VENCIMIENTO']."</td>
          <td><input type = 'text' name = 'cantidad'></td>
          <td>
            <select class='form-control select2' style='width: 100%;' name = 'ID_MOVIMIENTO'>
              <option value = '3'>Baja por Vencimiento</option>
              <option value = '4'>Baja por Deterioro</option>
=======
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
>>>>>>> 8183526251e38fb23b35d74e5226aedd161417a1
            </select>
          </td>
          <td>
          <input class = 'btn btn-warning' type = 'submit' value = 'Dar de Baja'>
          </td>
          <input type = 'hidden' name = 'codigo' value = ".$row['CODIGO'].">
          <input type = 'hidden' name = 'idmedicamento' value = ".$row['IDMEDICAMENTO'].">
<<<<<<< HEAD
=======
          <input type = 'hidden' name = 'existencia' value = '".$row['EXISTENCIA']."'>
>>>>>>> 8183526251e38fb23b35d74e5226aedd161417a1
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