<?php
include '../../include/dbconnect.php';
session_start();


if (!empty($_SESSION['user']))
  {


$query = "
SELECT IdMedicamento as IDMEDICAMENTO, NombreMedicamento as NOMBRE FROM medicamentos ORDER BY IdMedicamento asc
";
$resultado = $mysqli->query($query);

$query2 = "
SELECT IdLaboratorio as IdLaboratorio, NombreLaboratorio as NombreLaboratorio FROM laboratorio ORDER BY IdLaboratorio asc
";
$resultado2 = $mysqli->query($query2);

$query3 = "
SELECT IdCategoria as IdCategoria, NombreCategoria as NombreCategoria FROM categoria ORDER BY IdCategoria asc
";
$resultado3 = $mysqli->query($query3);

$query4 = "
SELECT IdUnidadMedida as IdUnidadMedida, Nombre as NOMBRE FROM unidadmedida ORDER BY IdUnidadMedida asc
";
$resultado4 = $mysqli->query($query4);
?>

<!DOCTYPE html>
<html>
<head>
</head>
<?php  include '../../include/asset.php'; ?>
<body class="hold-transition skin-blue sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">
<?php include '../../include/header.php'; ?>
<?php include '../../include/aside.php'; ?>
<!-- =============================================== -->
<!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>INGRESO DE LOTES DE MEDICAMENTOS<small></small></h1>
  <ol class="breadcrumb"></ol>
</section>

<section class="content">  
<div id ="row" class="row">
<!-- Ingresar contenido aqui -->
<div id = "asignar">
<form action = "guardar_entradas.php" method = "POST">
  <table>
  <tr>
  <td>MEDICAMENTO</td><td>CODIGO</td><td>FECHA VENCIMIENTO</td><td>CANTIDAD</td><td>COSTO UNITARIO</td>
  </tr>
  <tr>
  <td>
  <select name = "id_medicamento">
  <option value = '' selected>Elija... </option>
        <?php
        while ($row = $resultado->fetch_assoc()) {
        echo "<option value = '".$row['IDMEDICAMENTO']."'>".$row['NOMBRE']."</option>";
                                                              }
        ?>
  </select>
  </td>
  <td><input type = "text" name = "codigo_medicamento"></td>
  <td><input type = "date" name = "fecha_vencimiento" id = "fecha_vencimiento"></td>
  <td><input type = "text" name = "cantidad"></td>
  <td><input type = "text" name = "costo_unitario"></td>
  </tr>
  <tr>
  <td colspan = 5><center><input type = "submit" value = "Ingresar"></center></td>
  </tr>
  </table>
  </form>
  </div>
  <br><br><br><br><br>
  <div id = "listado">
  <section class="content-header">
  <h1>INGRESO DE MEDICAMENTOS NUEVOS<small></small></h1>
  <ol class="breadcrumb"></ol>
</section>
    <form action = "guardar_medicamento.php" method = "POST">
  <table style = "text-align: center;";>
  <tr>
  <td>NOMBRE</td><td>LABORATORIO</td><td>CATEGORIA</td><td>UNIDAD MEDIDA</td><td>PRECIO LAB</td>
  <td>CAT. A</td><td>CAT. B</td><td>CAT. C</td><td>CAT. D</td>
  </tr>
  <tr>
  <td><input type = "text" name = "nombre"></td>
  <td>
  <select name = "id_laboratorio">
  <option value = '' selected>Elija... </option>
        <?php
        while ($row2 = $resultado2->fetch_assoc()) {
        echo "<option value = '".$row2['IdLaboratorio']."'>".$row2['NombreLaboratorio']."</option>";
                                                              }
        ?>
  </select>
  </td>
  <td>
  <select name = "id_categoria">
  <option value = '' selected>Elija... </option>
        <?php
        while ($row3 = $resultado3->fetch_assoc()) {
        echo "<option value = '".$row3['IdCategoria']."'>".$row3['NombreCategoria']."</option>";
                                                              }
        ?>
  </select>
  </td>
  <td>
  <select name = "id_unidadmedida" style = "width: 100%;">
  <option value = '' selected>Elija... </option>
        <?php
        while ($row4 = $resultado4->fetch_assoc()) {
        echo "<option value = '".$row4['IdUnidadMedida']."'>".$row4['NOMBRE']."</option>";
                                                              }
        ?>
  </select>
  </td>
  <td><input type = "text" name = "precio_lab" maxlength = "5" style = "width: 100%;"></td>
  <td><input type = "text" name = "cat_a" size = "5" maxlength = "5"></td>
  <td><input type = "text" name = "cat_b" size = "5" maxlength = "5"></td>
  <td><input type = "text" name = "cat_c" size = "5" maxlength = "5"></td>
  <td><input type = "text" name = "cat_d" size = "5" maxlength = "5"></td>
  </tr>
  <tr>
  <td colspan = 5><center><input type = "submit" value = "Ingresar"></center></td>
  </tr>
  </table>
  </form>
  </div>
  </div>

  <!--Fin de ingreso de contenido -->
  </div>        
  </div><!-- /.content-wrapper -->
  <?php include '../../include/footer.php'; ?>
  </section>
  </body>
  <!-- Main content -->
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