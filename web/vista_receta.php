<?php

include '../include/dbconnect.php';
session_start();


if (!empty($_SESSION['user']))
  {

$idreceta = $_POST['idreceta'];


$query = "
SELECT b.NombreMedicamento as NOMBRE, truncate(a.cantidad, 0) as CANTIDAD, a.horas as HORAS, a.dias as DIAS, a.total as TOTAL, a.IdMedicamento as idmedicamento, b.Existencia as existencia
FROM receta_medicamentos as a
INNER JOIN medicamentos as b on b.IdMedicamento = a.IdMedicamento
WHERE a.IdReceta = $idreceta
";
$resultado = $mysqli->query($query);


$query2 = "
SELECT count(IdMedicamento) as cuenta FROM receta_medicamentos where IdReceta = $idreceta
";
$resultado2 = $mysqli->query($query2);
while ($row2 = $resultado2->fetch_assoc()) {
  $cuenta = $row2['cuenta'];
}
?>

<!DOCTYPE html>
<html>
<?php  include '../include/asset.php'; ?>
<body class="hold-transition skin-blue sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">
<?php include '../include/header.php'; ?>
<?php include '../include/aside.php'; ?>
<!-- =============================================== -->
<!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>DETALLE DE RECETA<small></small></h1>
  <ol class="breadcrumb"></ol>
</section>

<section class="content">  
<div id ="row" class="row">
<!-- Ingresar contenido aqui -->
<div id = "asignar">
<form action = "guardar_despacho.php" method = "POST">
  <table style = "text-align: center;">
  <tr>
  <td>NOMBRE</td><td>CANTIDAD</td><td>HORAS</td><td>DIAS</td><td>TOTAL</td>
  </tr>
  <?php
  $i = 1;
  while ($row = $resultado->fetch_assoc()) {
  echo "
  <tr>
  <td>".$row['NOMBRE']."</td><td>".$row['CANTIDAD']."</td><td>".$row['HORAS']."</td><td>".$row['DIAS']."</td><td>".$row['TOTAL']."</td>
  <input type='hidden' name = 'idmedicamento".$i."' value='".$row['idmedicamento']."'>
  <input type='hidden' name = 'existencia".$i."' value='".$row['existencia']."'>
  <input type='hidden' name = 'total".$i."' value='".$row['TOTAL']."'>
  </tr>
  ";
  $i = $i + 1;
  echo "<input type='hidden' name = 'cuenta' value='$cuenta'>";
  echo "<input type='hidden' name = 'idreceta' value='$idreceta'>";
                                            }
  ?>
  <tr>
  <td colspan = 5><center><input type = "submit" value = "Despachar"></center></td>
  </tr>
  </table>
  </form>
  </div>
  <div id = "listado">
    
  </div>
  </div>

  <!--Fin de ingreso de contenido -->
  </div>        
  </div><!-- /.content-wrapper -->
  <?php include '../include/footer.php'; ?>
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