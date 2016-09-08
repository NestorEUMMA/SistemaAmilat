<?php

include '../include/dbconnect.php';
session_start();

if (!empty($_SESSION['user']))
  {
<<<<<<< HEAD
  $querykardex = "
    SELECT a.IdTransaccion as ID, a.FechaTransaccion as FECHA, concat(b.Nombres, ' ', b.Apellidos) as USUARIO, concat(c.NombreMedicamento, ' - ', e.NombrePresentacion) as MEDICAMENTO, d.NombreMovimiento as MOVIMIENTO, a.CodigoLote as LOTE, a.Cantidad as CANTIDAD, a.Costo as COSTO, a.Venta as VENTA
=======

    if (isset($_POST['fecha_desde']) and isset($_POST['fecha_hasta']))
    {
      $fecha_desde = $_POST['fecha_desde'];
      $fecha_hasta = $_POST['fecha_hasta'];
  $querykardex = "
    SELECT a.IdTransaccion as ID,  DATE_FORMAT(a.FechaTransaccion,'%d-%m-%Y') as FECHA, concat(b.Nombres, ' ', b.Apellidos) as USUARIO, concat(c.NombreMedicamento, ' - ', e.NombrePresentacion) as MEDICAMENTO, d.NombreMovimiento as MOVIMIENTO, a.CodigoLote as LOTE, a.Cantidad as CANTIDAD, a.Existencia as EXISTENCIA, a.Costo as COSTO, a.Venta as VENTA
    FROM transaccion as a
    LEFT JOIN usuario as b on b.IdUsuario = a.IdUsuario
    LEFT JOIN medicamentos as c on c.IdMedicamento = a.IdMedicamento
    LEFT JOIN movimientos as d on d.IdMovimiento = a.IdMovimiento
    LEFT JOIN presentacion as e on e.IdPresentacion  = c.IdPresentacion
    WHERE (a.FechaTransaccion >= '$fecha_desde') and (a.FechaTransaccion <= '$fecha_hasta')
    ORDER BY a.FechaTransaccion ASC
              ";
    $resultadokardex = $mysqli->query($querykardex);
    }
    else
    {
        $querykardex = "
    SELECT a.IdTransaccion as ID,  DATE_FORMAT(a.FechaTransaccion,'%d-%m-%Y') as FECHA, concat(b.Nombres, ' ', b.Apellidos) as USUARIO, concat(c.NombreMedicamento, ' - ', e.NombrePresentacion) as MEDICAMENTO, d.NombreMovimiento as MOVIMIENTO, a.CodigoLote as LOTE, a.Cantidad as CANTIDAD, a.Existencia as EXISTENCIA, a.Costo as COSTO, a.Venta as VENTA
>>>>>>> 8183526251e38fb23b35d74e5226aedd161417a1
    FROM transaccion as a
    LEFT JOIN usuario as b on b.IdUsuario = a.IdUsuario
    LEFT JOIN medicamentos as c on c.IdMedicamento = a.IdMedicamento
    LEFT JOIN movimientos as d on d.IdMovimiento = a.IdMovimiento
    LEFT JOIN presentacion as e on e.IdPresentacion  = c.IdPresentacion
<<<<<<< HEAD
<<<<<<< HEAD
              ";
    $resultadokardex = $mysqli->query($querykardex);
=======
    ORDER BY a.FechaTransaccion ASC
=======
    ORDER BY a.FechaTransaccion DESC
>>>>>>> de9703f7289601a8d76e06411276d29d5f968e1b
              ";
    $resultadokardex = $mysqli->query($querykardex);
    }
>>>>>>> 8183526251e38fb23b35d74e5226aedd161417a1

?>
<!DOCTYPE html>
<html>

   <?php  include '../include/asset.php'; ?>
   <link rel="stylesheet" href="../web/dist/parsley.css">
   <script src="../web/dist/parsley.min.js"></script>
   <script src="../web/dist/i18n/es.js"></script>
   <body class="hold-transition skin-blue sidebar-mini">

    <div class="wrapper">
<<<<<<< HEAD
	<?php include '../include/header.php'; ?>
=======
	  <?php include '../include/header.php'; ?>
>>>>>>> 8183526251e38fb23b35d74e5226aedd161417a1
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
<<<<<<< HEAD
	 <table id="example2" class="table table-bordered table-hover">
    <?php
      echo "
      <thead>
      <tr>
      <th>ID</th><th>FECHA</th><th>USUARIO</th><th>MEDICAMENTO</th><th>MOVIMIENTO</th><th>LOTE</th><th>CANTIDAD</th>
      <th>COSTO</th><th>VENTA</th>
=======
    <form action = "#" method = "POST">
      <table id="example2" class="table table-bordered table-hover table-striped">
          <tr>
            <td>
                Fecha desde:
            </td>
            <td>
                <input type="text" class="form-control"  data-inputmask="'alias': 'yyyy/mm/dd'" data-mask name="fecha_desde">
            </td>
            <td>
                Fecha hasta:
            </td>
            <td>
                <input type="text" class="form-control"  data-inputmask="'alias': 'yyyy/mm/dd'" data-mask name="fecha_hasta">
            </td>
            <td>
                <input type = "submit" value = "Buscar">
            </td>
          </tr>
      </table>
    </form>
	 <table id="example2" class="table table-bordered table-hover table-striped table-responsive">
    <?php
      echo "
      <thead>
      <tr class = 'info'>
      <th>ID</th><th>FECHA</th><th>USUARIO</th><th>MEDICAMENTO</th><th>MOVIMIENTO</th><th>LOTE</th><th>CANTIDAD</th>
      <th>EXISTENCIA</th><th>COSTO</th><th>VENTA</th>
>>>>>>> 8183526251e38fb23b35d74e5226aedd161417a1
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
<<<<<<< HEAD
=======
          <td>".$row['EXISTENCIA']."</td>
>>>>>>> 8183526251e38fb23b35d74e5226aedd161417a1
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