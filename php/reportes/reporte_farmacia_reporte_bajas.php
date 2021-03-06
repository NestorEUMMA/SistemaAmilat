<?php

include '../../include/dbconnect.php';
session_start();


      $fecha_desde = $_POST['fecha_desde'];
      $fecha_hasta = $_POST['fecha_hasta'];

  $querykardex = "
    SELECT a.IdTransaccion as ID,  DATE_FORMAT(a.FechaTransaccion,'%d-%m-%Y') as FECHA, concat(b.Nombres, ' ', b.Apellidos) as USUARIO, concat(c.NombreMedicamento, ' - ', e.NombrePresentacion) as MEDICAMENTO, d.NombreMovimiento as MOVIMIENTO, a.CodigoLote as LOTE, a.Cantidad as CANTIDAD, a.Existencia as EXISTENCIA, a.Costo as COSTO, a.Venta as VENTA
    FROM transaccion as a
    LEFT JOIN usuario as b on b.IdUsuario = a.IdUsuario
    LEFT JOIN medicamentos as c on c.IdMedicamento = a.IdMedicamento
    LEFT JOIN movimientos as d on d.IdMovimiento = a.IdMovimiento
    LEFT JOIN presentacion as e on e.IdPresentacion  = c.IdPresentacion
    WHERE ((a.FechaTransaccion >= '$fecha_desde') and (a.FechaTransaccion <= '$fecha_hasta'))
    AND d.IdMovimiento in (3, 4, 5)
    ORDER BY a.FechaTransaccion ASC
              ";
    $resultadokardex = $mysqli->query($querykardex);

?>
<!DOCTYPE html>
<html>
<?php  include '../../include/asset.php'; ?>
<body onload="window.print();">
<div class="wrapper">
  <!-- Main content -->
   <section class="invoice">
      <!-- title row -->
      <div class="row">
        <div class="col-xs-7">
        </div>
        <div class="col-xs-10">
                  <img src="Imagen/logo3.jpg" alt="..." class="margin">
        </div>
        <!-- /.col -->
      </div>
      </br>
      
<STRONG>REPORTE DE BAJAS</STRONG>
   <table class="table table-bordered table-hover table-striped table-responsive">
    <?php
      echo "
      <thead>
      <tr class = 'info'>
      <th>ID</th><th>FECHA</th><th>USUARIO</th><th>MEDICAMENTO</th><th>MOVIMIENTO</th><th>LOTE</th><th>CANTIDAD</th>
      <th>EXISTENCIA</th><th>COSTO</th><th>VENTA</th>
      </tr>
      </thead>
      <tbody>
      ";
      while ($row = $resultadokardex->fetch_assoc())
        {
          echo "
          <tr>
          <td>".$row['ID']."</td>
          <td>".$row['FECHA']."</td>
          <td>".$row['USUARIO']."</td>
          <td>".$row['MEDICAMENTO']."</td>
          <td>".$row['MOVIMIENTO']."</td>
          <td>".$row['LOTE']."</td>
          <td>".$row['CANTIDAD']."</td>
          <td>".$row['EXISTENCIA']."</td>
          <td>".$row['COSTO']."</td>
          <td>".$row['VENTA']."</td>
          </tr>
          ";
          
        }
        echo "</tbody>";
        echo "</table>";
?>
</div>
</div>
<div class="row no-print">
<div class="col-xs-11">
</div>
<div class="col-xs-1">
<a href="../../web/farmacia_reporte_bajas.php" class="btn btn-success btn-sm btn-tool " role="button">Regresar</a>
</div>
</div>
</section>
</div>
</body>
</html>