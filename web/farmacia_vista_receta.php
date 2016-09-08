<?php

include '../include/dbconnect.php';
session_start();

if (!empty($_SESSION['user']))
  {
$idreceta = $_POST['idreceta'];


$queryreceta = "
<<<<<<< HEAD
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
=======
SELECT concat(b.NombreMedicamento, ' - ', e.NombrePresentacion) as NOMBRE, truncate(a.cantidad, 0) as CANTIDAD, a.horas as HORAS, a.dias as DIAS, a.total as TOTAL, 
a.IdMedicamento as idmedicamento,
CASE 
WHEN d.Categoria = 'A' THEN (b.PrecioUnitario * a.total) * 1
WHEN d.Categoria = 'B' THEN (b.PrecioUnitario * a.total) * 0.7
WHEN d.Categoria = 'C' THEN (b.PrecioUnitario * a.total) * 0.5
WHEN d.Categoria = 'D' THEN 0
END PRECIO,
b.Existencia as existencia
FROM receta_medicamentos as a
LEFT JOIN medicamentos as b on b.IdMedicamento = a.IdMedicamento
LEFT JOIN receta as c on c.IdReceta = a.IdReceta
LEFT JOIN persona as d on d.IdPersona = c.IdReceta
LEFT JOIN presentacion e on e.IdPresentacion = b.IdPresentacion
>>>>>>> 8183526251e38fb23b35d74e5226aedd161417a1
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
<<<<<<< HEAD

=======
>>>>>>> 8183526251e38fb23b35d74e5226aedd161417a1
   <?php  include '../include/asset.php'; ?>
   <link rel="stylesheet" href="../web/dist/parsley.css">
   <script src="../web/dist/parsley.min.js"></script>
   <script src="../web/dist/i18n/es.js"></script>
<<<<<<< HEAD
   <body class="hold-transition skin-blue sidebar-mini">
=======
   <body class="hold-transition skin-blue sidebar-mini sidebar-collapse">
>>>>>>> 8183526251e38fb23b35d74e5226aedd161417a1

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
<<<<<<< HEAD
	
  <form action = "farmacia_guardar_despacho.php" method = "POST">
  <table id="example2" class="table table-bordered table-hover">
  <tr>
=======
  <form action = "../php/reportes/reporte_farmacia_receta.php" method = "POST">
  <input type = "submit" class = "btn btn-warning" value = "Imprimir">
  <input type = "hidden" name = "idreceta" value = "<?php echo $idreceta; ?>">
  </form>
	
  <form action = "farmacia_guardar_despacho.php" method = "POST">
  <table id="example2" class="table table-bordered table-hover table-striped table-responsive">
  <tr class = "info">
>>>>>>> 8183526251e38fb23b35d74e5226aedd161417a1
  <th>NOMBRE</th><th>CANTIDAD</th><th>HORAS</th><th>DIAS</th><th>TOTAL</th><th>PRECIO</th>
  </tr>
  <?php
  $i = 1;
<<<<<<< HEAD
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
=======
  $t = 0;
  while ($row = $resultadoreceta->fetch_assoc()) {
  echo "
  <tr>
  <td>".$row['NOMBRE']."</td><td class = 'text-center'>".$row['CANTIDAD']."</td><td class = 'text-center'>".$row['HORAS']."</td><td class = 'text-center'>".$row['DIAS']."</td><td class = 'text-center'>".$row['TOTAL']."</td><td class = 'text-right'>".$row['PRECIO']."</td>
  <input type='hidden' name = 'idmedicamento".$i."' value='".$row['idmedicamento']."'>
  <input type='hidden' name = 'total".$i."' value='".$row['TOTAL']."'>
  <input type='hidden' name = 'precio".$i."' value='".$row['PRECIO']."'>
  <input type='hidden' name = 'existencia".$i."' value='".$row['existencia']."'>
  </tr>
  ";
  $i = $i + 1;
  $t += $row['PRECIO']; 
  echo "<input type='hidden' name = 'cuenta' value='$cuenta'>";
  echo "<input type='hidden' name = 'idreceta' value='$idreceta'>";
                                            }
  echo "
  <tr class = 'success'>
    <th class = 'text-right' colspan = '5'>TOTAL</th>
    <th class = 'text-right'>".$t."</th>
  </tr>  
  ";
  ?>
  <tr>
  <td colspan = 6><center><input class = "btn btn-warning" type = "submit" value = "Despachar"></center></td>
>>>>>>> 8183526251e38fb23b35d74e5226aedd161417a1
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