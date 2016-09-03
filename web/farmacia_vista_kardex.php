<?php

include '../include/dbconnect.php';
session_start();

if (!empty($_SESSION['user']))
  {
  $querykardex = "
    SELECT a.IdTransaccion as ID, a.FechaTransaccion as FECHA, concat(b.Nombres, ' ', b.Apellidos) as USUARIO, concat(c.NombreMedicamento, ' - ', e.NombrePresentacion) as MEDICAMENTO, d.NombreMovimiento as MOVIMIENTO, a.CodigoLote as LOTE, a.Cantidad as CANTIDAD, a.Costo as COSTO, a.Venta as VENTA
    FROM transaccion as a
    LEFT JOIN usuario as b on b.IdUsuario = a.IdUsuario
    LEFT JOIN medicamentos as c on c.IdMedicamento = a.IdMedicamento
    LEFT JOIN movimientos as d on d.IdMovimiento = a.IdMovimiento
    LEFT JOIN presentacion as e on e.IdPresentacion  = c.IdPresentacion
              ";
    $resultadokardex = $mysqli->query($querykardex);

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
    <h3 class="box-title">VISTA DE MOVIMIENTO DE MEDICAMENTOS</h3>
    </div>
	<!-- /.box-header -->
    <div class="box-body">
	 <table id="example2" class="table table-bordered table-hover">
    <?php
      echo "
      <thead>
      <tr>
      <th>ID</th><th>FECHA</th><th>USUARIO</th><th>MEDICAMENTO</th><th>MOVIMIENTO</th><th>LOTE</th><th>CANTIDAD</th>
      <th>COSTO</th><th>VENTA</th>
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
          <td>".$row['COSTO']."</td>
          <td>".$row['VENTA']."</td>
          </tr>
          ";
          
        }
        echo "</tbody>";
        echo "</table>";
      echo"
      <form action = '../php/reportes/reporte_farmacia_vista_kardex_pdf.php' method = 'POST'>
        <input type = 'submit' value = 'Imprimir' class = 'btn btn-warning'>
      </form>
         ";
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