<?php

include '../include/dbconnect.php';
session_start();

if (!empty($_SESSION['user']))
  {
$idreceta = $_POST['idreceta'];


$queryreceta = "
SELECT b.NombreMedicamento as NOMBRE, truncate(a.cantidad, 0) as CANTIDAD, a.horas as HORAS, a.dias as DIAS, a.total as TOTAL, 
a.IdMedicamento as idmedicamento, b.Existencia as existencia,
CASE 
WHEN d.Categoria = 'A' THEN b.PrecioVentaA
WHEN d.Categoria = 'B' THEN b.PrecioVentaB
WHEN d.Categoria = 'C' THEN b.PrecioVentaC
WHEN d.Categoria = 'D' THEN b.PrecioVentaD 
END PRECIO
FROM receta_medicamentos as a
INNER JOIN medicamentos as b on b.IdMedicamento = a.IdMedicamento
INNER JOIN receta as c on c.IdReceta = a.IdReceta
INNER JOIN persona as d on d.IdPersona = c.IdReceta
WHERE a.IdReceta = $idreceta
";
$resultadoreceta = $mysqli->query($queryreceta);


$querycuentamedicamentos = "
SELECT count(IdMedicamento) as cuenta FROM receta_medicamentos where IdReceta = $idreceta
";
$resultadocuentamedicamentos = $mysqli->query($querycuentamedicamentos);
while ($row2 = $resultadocuentamedicamentos->fetch_assoc()) {
  $cuenta = $row2['cuenta'];
}

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
    <h3 class="box-title">VISTA DE RECETA</h3>
    </div>
	<!-- /.box-header -->
    <div class="box-body">
	
  <form action = "farmacia_guardar_despacho.php" method = "POST">
  <table id="example2" class="table table-bordered table-hover">
  <tr>
  <th>NOMBRE</th><th>CANTIDAD</th><th>HORAS</th><th>DIAS</th><th>TOTAL</th><th>PRECIO</th>
  </tr>
  <?php
  $i = 1;
  while ($row = $resultadoreceta->fetch_assoc()) {
  echo "
  <tr>
  <td>".$row['NOMBRE']."</td><td>".$row['CANTIDAD']."</td><td>".$row['HORAS']."</td><td>".$row['DIAS']."</td><td>".$row['TOTAL']."</td><td>".$row['PRECIO']."</td>
  <input type='hidden' name = 'idmedicamento".$i."' value='".$row['idmedicamento']."'>
  <input type='hidden' name = 'existencia".$i."' value='".$row['existencia']."'>
  <input type='hidden' name = 'total".$i."' value='".$row['TOTAL']."'>
  <input type='hidden' name = 'precio".$i."' value='".$row['PRECIO']."'>
  </tr>
  ";
  $i = $i + 1;
  echo "<input type='hidden' name = 'cuenta' value='$cuenta'>";
  echo "<input type='hidden' name = 'idreceta' value='$idreceta'>";
                                            }
  ?>
  <tr>
  <td colspan = 5><center><input class = "btn btn-warning" type = "submit" value = "Despachar"></center></td>
  </tr>
  </table>
  </form>
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