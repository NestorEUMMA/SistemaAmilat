<?php
include '../../include/dbconnect.php';

  $queryingresomedicamentos = "
      SELECT a.IdMedicamento as ID, a.NombreMedicamento as NOMBRE_MEDICAMENTO, a.NombreComercial as NOMBRE_COMERCIAL, a.Codigo as CODIGO, 
      a.Lote as LOTE, c.NombreLaboratorio as LABORATORIO, d.NombreCategoria as CATEGORIA, 
      concat(b.NombrePresentacion, ' - ', a.Concentracion, ' ', e.NombreUnidadMedida) as CONCENTRACION, a.PrecioUnitario as PRECIO_UNITARIO, DATE_FORMAT(a.FechaIngreso,'%d-%m-%Y') as FECHA_INGRESO, 
      DATE_FORMAT(a.FechaExpedicion,'%d-%m-%Y') as FECHA_EXPEDICION, DATE_FORMAT(a.FechaVencimiento,'%d-%m-%Y') as FECHA_VENCIMIENTO, a.Existencia as EXISTENCIA, alertaVencimiento( datediff(a.FechaVencimiento,now()) ) as  color
      FROM medicamentos as a
      LEFT JOIN presentacion as b on b.IdPresentacion = a.IdPresentacion
      LEFT JOIN laboratorio as c on c.IdLaboratorio = a.IdLaboratorio
      LEFT JOIN categoria as d on d.IdCategoria = a.IdCategoria
      LEFT JOIN unidadmedida as e on e.IdUnidadMedida = a.IdUnidadMedida
      ORDER BY a.NombreMedicamento ASC
              ";
    $resultadoingresomedicamentos = $mysqli->query($queryingresomedicamentos);


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
      
<STRONG>EXISTENCIA DE MEDICAMENTOS</STRONG>
    <div class="row">
    <div class="col-xs-12">
    <div class="box">
    <div class="box-header with-border">

    <h3 class="box-title">EXISTENCIA DE MEDICAMENTOS</h3>
	 <table class="table table-bordered table-hover table-striped table-responsive">
    <?php
      echo "
      <thead>
      <tr class = 'info'>
      <th>ID</th><th>NOMBRE COMERCIAL</th><th>NOMBRE</th><th>CODIGO</th><th>LOTE</th><th>LAB</th><th>CATEGORIA</th><th>CONCENT.</th><th>F.INGRESO</th><th>F.FAB.</th><th>F.VENC.</th><th>EXISTENCIA</th>
      </tr>
      </thead>
      <tbody>
      ";
      while ($row = $resultadoingresomedicamentos->fetch_assoc())
        {
          echo "
          <tr>
          <td>".$row['ID']."</td>          
          <td>".$row['NOMBRE_COMERCIAL']."</td>
          <td>".$row['NOMBRE_MEDICAMENTO']."</td>
          <td>".$row['CODIGO']."</td>
          <td>".$row['LOTE']."</td>
          <td>".$row['LABORATORIO']."</td>
          <td>".$row['CATEGORIA']."</td>
          <td>".$row['CONCENTRACION']."</td>
          <td>".$row['FECHA_INGRESO']."</td>
          <td>".$row['FECHA_EXPEDICION']."</td>
          <td class='". $row['color'] ."'>".$row['FECHA_VENCIMIENTO']."</td>
          <td>".$row['EXISTENCIA']."</td>
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
<a href="../../web/farmacia_ingreso_medicamentos.php" class="btn btn-success btn-sm btn-tool " role="button">Regresar</a>
</div>
</div>
</section>
</div>
</body>
</html>