z<?php

include '../include/dbconnect.php';
session_start();

if (!empty($_SESSION['user']))
  {
  $queryingresomedicamentos = "
      SELECT a.IdMedicamento as ID, a.NombreMedicamento as NOMBRE_MEDICAMENTO, a.NombreComercial as NOMBRE_COMERCIAL, 
      b.NombrePresentacion as PRESENTACION, c.NombreLaboratorio as LABORATORIO, d.NombreCategoria as CATEGORIA, a.Concentracion as CONCENTRACION, 
      e.NombreUnidadMedida as UNIDAD_MEDIDA, a.PrecioLab as PRECIO, a.PrecioVentaA as PRECIOA, a.PrecioVentaB as PRECIOB, a.PrecioVentaC as PRECIOC, 
      a.PrecioVentaD as PRECIOD
      FROM medicamentos as a
      LEFT JOIN presentacion as b on b.IdPresentacion = a.IdPresentacion
      LEFT JOIN laboratorio as c on c.IdLaboratorio = a.IdLaboratorio
      LEFT JOIN categoria as d on d.IdCategoria = a.IdCategoria
      LEFT JOIN unidadmedida as e on e.IdUnidadMedida = a.IdUnidadMedida
      ORDER BY a.NombreMedicamento ASC
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
    <h3 class="box-title">INGRESAR MEDICAMENTO NUEVO</h3>
    </div>
	<!-- /.box-header -->
    <div class="box-body">
    <form action = "farmacia_guardar_ingreso_medicamentos.php" method = "POST">
    <table id="example2" class="table table-bordered table-hover">
    <tr>
      <th>NOMBRE</th><th>NOMBRE COMERCIAL</th><th>PRESENTACION</th><th>LABORATORIO</th>
    </tr>
        <tr>
      <td><input type = "text" name = "nombre"></td>
      <td><input type = "text" name = "nombrecomercial"></td>
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
    <tr>  
      <th>CATEGORIA</th><th>CONCENTRACION</th><th>U. MEDIDA</th><th>PRECIO</th>
    </tr>
    <tr>
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
    </tr>
    <tr>
    <td><input type = "submit" value = "Guardar Medicamento" class = "btn btn-warning"></td>
    </tr>
    </table>
    </form>
    <h3 class="box-title">EXISTENCIA DE MEDICAMENTOS</h3>
	 <table id="example2" class="table table-bordered table-hover">
    <?php
      echo "
      <thead>
      <tr>
      <th>ID</th><th>NOMBRE</th><th>NOMBRE COMERCIAL</th><th>PRESENTACION</th><th>LABORATORIO</th><th>CATEGORIA</th><th>CONCENTRACION</th><th>U. MEDIDA</th><th>PRECIO</th><th>A</th><th>B</th><th>C</th><th>D</th>
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
          <td>".$row['PRESENTACION']."</td>
          <td>".$row['LABORATORIO']."</td>
          <td>".$row['CATEGORIA']."</td>
          <td>".$row['CONCENTRACION']."</td>
          <td>".$row['UNIDAD_MEDIDA']."</td>
          <td>".$row['PRECIO']."</td>
          <td>".$row['PRECIOA']."</td>
          <td>".$row['PRECIOB']."</td>
          <td>".$row['PRECIOC']."</td>
          <td>".$row['PRECIOD']."</td>
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