<?php

include '../include/dbconnect.php';
session_start();

if (!empty($_SESSION['user']))
  {
  $querymedicamentos = "
      SELECT a.IdMedicamento as ID_MEDICAMENTO, concat(a.NombreMedicamento, ' - ', b.NombrePresentacion) as NOMBRE_MEDICAMENTO
      FROM medicamentos as a
      LEFT JOIN presentacion as b on b.IdPresentacion = a.IdPresentacion
      ORDER BY a.NombreMedicamento ASC
              ";
    $resultadomedicamentos = $mysqli->query($querymedicamentos);



  $querylotes = "
      SELECT concat(b.NombreMedicamento, ' - ', c.NombrePresentacion) as NOMBRE_MEDICAMENTO, a.CodigoLote as CODIGO_LOTE, a.lote as LOTE, a.FechaEntrada as FECHA_ENTRADA,
        a.FechaExpedicion as FECHA_EXPEDICION, a.FechaVencimiento as FECHA_VENCIMIENTO, a.CostoUnitario as COSTO_UNITARIO, a.CostoTotal as COSTO_TOTAL, 
          a.Cantidad as CANTIDAD, concat(d.Nombres, ' ', d.Apellidos) as USUARIO
      FROM medicamentolote as a
      LEFT JOIN medicamentos as b on b.IdMedicamento = a.IdMedicamento
      LEFT JOIN presentacion as c on c.IdPresentacion = b.IdPresentacion
      LEFT JOIN usuario as d on d.IdUsuario = a.IdUsuario
                ";
    $resultadoquerylotes = $mysqli->query($querylotes);

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
    <h3 class="box-title">Ingreso de Lotes</h3>
    </div>
	<!-- /.box-header -->
    <div class="box-body">
	 <form action = "farmacia_guardar_ingreso_lotes.php" method = "POST">
    <table id="example2" class="table table-bordered table-hover">
    <tr>
      <th>MEDICAMENTO</th><th>CODIGO</th><th>LOTE</th><th>F. EXPEDICION</th>
      <th>F. VENCIMIENTO</th><th>CANTIDAD</th><th>COSTO UNITARIO</th>
    </tr>
        <tr>
      <td>
        <select class="form-control select2" style="width: 100%;" name = "ID_MEDICAMENTO">
          <option value = '' selected>Elija... </option>
            <?php
              while ($row = $resultadomedicamentos->fetch_assoc()) {
              echo "<option value = '".$row['ID_MEDICAMENTO']."'>".$row['NOMBRE_MEDICAMENTO']."</option>";
                                                 }
                                     ?>
        </select>
      </td>
      <td><input type = "text" name = "codigo"></td>
      <td><input type = "text" name = "lote"></td>
      <td><input type="text" class="form-control"  data-inputmask="'alias': 'yyyy/mm/dd'" data-mask name="fecha_expedicion"></td>
      <td><input type="text" class="form-control"  data-inputmask="'alias': 'yyyy/mm/dd'" data-mask name="fecha_vencimiento"></td>
      <td><input type = "text" name = "cantidad"></td>
      <td><input type = "text" name = "costo_unitario"></td>
    </tr>
    <tr>
    <td><input type = "submit" value = "Guardar Lote" class = "btn btn-warning"></td>
    </tr>
    </table>
    </form>
    <table id="example2" class="table table-bordered table-hover">
     <?php
      echo "
      <thead>
      <tr>
      <th>MEDICAMENTO</th><th>CODIGO</th><th>LOTE</th><th>F.ENTRADA</th><th>F.EXPEDICION</th><th>F.VENCIMIENTO</th><th>C.UNITARIO</th><th>C.TOTAL</th><th>CANTIDAD</th><th>USUARIO</th>
      </tr>
      </thead>
      <tbody>
      ";
      while ($row = $resultadoquerylotes->fetch_assoc())
        {
          echo "
          <tr>
          <td>".$row['NOMBRE_MEDICAMENTO']."</td>
          <td>".$row['CODIGO_LOTE']."</td>
          <td>".$row['LOTE']."</td>
          <td>".$row['FECHA_ENTRADA']."</td>
          <td>".$row['FECHA_EXPEDICION']."</td>
          <td>".$row['FECHA_VENCIMIENTO']."</td>
          <td>".$row['COSTO_UNITARIO']."</td>
          <td>".$row['COSTO_TOTAL']."</td>
          <td>".$row['CANTIDAD']."</td>
          <td>".$row['USUARIO']."</td>
          </tr>
          ";
          
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