z<?php

include '../include/dbconnect.php';
session_start();

if (!empty($_SESSION['user']))
  {
  $queryingresomedicamentos = "
      SELECT a.IdMedicamento as ID, a.NombreMedicamento as NOMBRE_MEDICAMENTO, a.NombreComercial as NOMBRE_COMERCIAL, a.Codigo as CODIGO, 
      a.Lote as LOTE, b.NombrePresentacion as PRESENTACION, c.NombreLaboratorio as LABORATORIO, d.NombreCategoria as CATEGORIA, 
      concat(a.Concentracion, ' ', e.NombreUnidadMedida) as CONCENTRACION, a.PrecioUnitario as PRECIO_UNITARIO, DATE_FORMAT(a.FechaIngreso,'%d-%m-%Y') as FECHA_INGRESO, 
      DATE_FORMAT(a.FechaExpedicion,'%d-%m-%Y') as FECHA_EXPEDICION, DATE_FORMAT(a.FechaVencimiento,'%d-%m-%Y') as FECHA_VENCIMIENTO, a.Existencia as EXISTENCIA
      , alertaVencimiento( datediff(a.FechaVencimiento,now()) ) as  color
      FROM medicamentos as a
      LEFT JOIN presentacion as b on b.IdPresentacion = a.IdPresentacion
      LEFT JOIN laboratorio as c on c.IdLaboratorio = a.IdLaboratorio
      LEFT JOIN categoria as d on d.IdCategoria = a.IdCategoria
      LEFT JOIN unidadmedida as e on e.IdUnidadMedida = a.IdUnidadMedida
      ORDER BY a.IdMedicamento DESC
              ";
    $resultadoingresomedicamentos = $mysqli->query($queryingresomedicamentos);

  $querypresentacion = "
      SELECT IdPresentacion as ID_PRESENTACION, NombrePresentacion as NOMBRE_PRESENTACION
      FROM presentacion
      ORDER BY NombrePresentacion ASC
              ";
    $resultadopresentacion = $mysqli->query($querypresentacion);

  $querylaboratorio = "
      SELECT IdLaboratorio as ID_LABORATORIO, NombreLaboratorio as NOMBRE_LABORATORIO
      FROM laboratorio
      ORDER BY NombreLaboratorio ASC
              ";
    $resultadolaboratorio = $mysqli->query($querylaboratorio);

  $querycategoria = "
      SELECT IdCategoria as ID_CATEGORIA, NombreCategoria as NOMBRE_CATEGORIA
      FROM categoria
      ORDER BY NombreCategoria ASC
              ";
    $resultadocategoria = $mysqli->query($querycategoria);

  $queryunidadmedida = "
      SELECT IdUnidadMedida as ID_UNIDAD_MEDIDA, NombreUnidadMedida as NOMBRE_UNIDAD_MEDIDA
      FROM unidadmedida
      ORDER BY NombreUnidadMedida ASC
              ";
    $resultadounidadmedida = $mysqli->query($queryunidadmedida);

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
    <?php
    if ($_SESSION['IdPuesto'] == 4)
    {
    ?>
    <h3 class="box-title">INGRESAR MEDICAMENTO NUEVO</h3>
    </div>
	<!-- /.box-header -->
    <div class="box-body">
    <form action = "farmacia_guardar_ingreso_medicamentos.php" method = "POST">
    <table id="example2" class="table table-bordered table-hover">
    <tr class = "fila">
      <th>NOMBRE</th><th>NOMBRE COMERCIAL</th><th>CODIGO</th><th>LOTE</th><th>PRESENTACION</th><th>LABORATORIO</th>
    </tr>
        <tr class = "fila">
      <td><input type = "text" name = "nombre"></td>
      <td><input type = "text" name = "nombrecomercial"></td>
      <td><input type = "text" name = "codigo"></td>
      <td><input type = "text" name = "lote"></td>
      <td>
        <select class="form-control select2" style="width: 100%;" name = "ID_PRESENTACION">
          <option value = '' selected>Elija... </option>
            <?php
              while ($row = $resultadopresentacion->fetch_assoc()) {
              echo "<option value = '".$row['ID_PRESENTACION']."'>".$row['NOMBRE_PRESENTACION']."</option>";
                                                 }
                                     ?>
        </select>
      </td>
      <td>
        <select class="form-control select2" style="width: 100%;" name = "ID_LABORATORIO">
          <option value = '' selected>Elija... </option>
            <?php
              while ($row = $resultadolaboratorio->fetch_assoc()) {
              echo "<option value = '".$row['ID_LABORATORIO']."'>".$row['NOMBRE_LABORATORIO']."</option>";
                                                 }
                                     ?>
        </select>
      </td>
    </tr>
    <tr class = "fila">  
      <th>CATEGORIA</th><th>CONCENTRACION</th><th>U. MEDIDA</th><th>PRECIO U.</th><th>EXISTENCIA</th>
    </tr>
    <tr class = "fila">
      <td>
        <select class="form-control select2" style="width: 100%;" name = "ID_CATEGORIA">
          <option value = '' selected>Elija... </option>
            <?php
              while ($row = $resultadocategoria->fetch_assoc()) {
              echo "<option value = '".$row['ID_CATEGORIA']."'>".$row['NOMBRE_CATEGORIA']."</option>";
                                                 }
                                     ?>
        </select>
      </td>
      <td><input type = "text" name = "concentracion"></td>
      <td>
        <select class="form-control select2" style="width: 100%;" name = "ID_UNIDAD_MEDIDA">
          <option value = '' selected>Elija... </option>
            <?php
              while ($row = $resultadounidadmedida->fetch_assoc()) {
              echo "<option value = '".$row['ID_UNIDAD_MEDIDA']."'>".$row['NOMBRE_UNIDAD_MEDIDA']."</option>";
                                                 }
                                     ?>
        </select>
      </td>
      <td><input type = "text" name = "precio"></td>
      <td><input type = "text" name = "existencia"></td>
      </tr>
    <tr class = "fila">
      <th>F.Exp.</th><th>F.Venc.</th>
    </tr>
    <tr class = "fila">
      <td><input type="text" class="form-control"  data-inputmask="'alias': 'yyyy/mm/dd'" data-mask name="fecha_expedicion"></td>
      <td><input type="text" class="form-control"  data-inputmask="'alias': 'yyyy/mm/dd'" data-mask name="fecha_vencimiento"></td>
    </tr>
    <tr>
    <td><span id = "btn_nuevo" class = "btn btn-info">Nuevo Medicamento</span></td>
    <td><input id = "btn_guardar" type = "submit" value = "Guardar Medicamento" class = "btn btn-warning"></td>
    </tr>
    </table>
    </form>
    <?php
    }
    ?>
    <h3 class="box-title">EXISTENCIA DE MEDICAMENTOS</h3>
	 <table id="example2" class="table table-bordered table-hover table-striped table-responsive">
    <?php
      echo "
      <thead>
      <tr class = 'info'>
      <th>ID</th><th>NOMBRE</th><th>NOMBRE COMERCIAL</th><th>CODIGO</th><th>LOTE</th><th>PRESENTACION</th><th>LAB</th><th>CATEGORIA</th><th>CONCENT.</th><th>F.INGRESO</th><th>F.EXP.</th><th>F.VENC.</th><th>EXISTENCIA</th>
      </tr>
      </thead>
      <tbody>
      ";
      while ($row = $resultadoingresomedicamentos->fetch_assoc())
        {
          echo "
          <tr>
          <td>".$row['ID']."</td>
          <td>".$row['NOMBRE_MEDICAMENTO']."</td>
          <td>".$row['NOMBRE_COMERCIAL']."</td>
          <td>".$row['CODIGO']."</td>
          <td>".$row['LOTE']."</td>
          <td>".$row['PRESENTACION']."</td>
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
      echo"
      <form action = '../php/reportes/reporte_farmacia_medicamentos_pdf.php' method = 'POST'>
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
    <script type = "text/javascript">
  //  $(document).ready(function(){
      $(".fila").hide();
      $("#btn_guardar").hide();

      $("#btn_nuevo").click(function(){
        $(".fila").show("fadeIn");
        $("#btn_guardar").show("fadeIn");
        $("#btn_nuevo").hide();
      })
   // });
    </script>
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