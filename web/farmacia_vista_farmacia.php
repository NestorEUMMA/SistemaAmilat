<?php

include '../include/dbconnect.php';
session_start();

if (!empty($_SESSION['user']))
  {
$queryrecetas = "
SELECT concat(c. Nombres, ' ', c.Apellidos) as NOMBRE_PACIENTE, concat(b. Nombres, ' ', b.Apellidos) as NOMBRE_MEDICO, a.Fecha as FECHA, a.IdReceta as idreceta
FROM receta as a
LEFT JOIN usuario as b on b.IdUsuario = a.IdUsuario
LEFT JOIN persona as c on c.IdPersona = a.IdPersona
WHERE a.activo = 1
ORDER BY a.Fecha DESC
";
$resultadorecetas = $mysqli->query($queryrecetas);

$querycuentarecetas = "
SELECT count(IdReceta) idreceta
FROM receta WHERE activo = 1
";
$resultadocuentarecetas = $mysqli->query($querycuentarecetas);
while ($row2 = $resultadocuentarecetas->fetch_assoc()) {
  $cuentarecetas = $row2['idreceta'];
}

?>
<!DOCTYPE html>
<html>
<body class="hold-transition skin-blue sidebar-mini sidebar-collapse">
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
    <h3 class="box-title">LISTADO DE RECETAS ACTIVAS</h3>
    </div>
	<!-- /.box-header -->
    <div class="box-body">

  </div>
  <?php
  if (empty($cuentarecetas)){
    echo "
      <script>
      alert('No hay recetas activas para mostrar');
      </script>
    ";
  }else{
  echo "
  <table id='example2' class='table table-bordered table-hover table-striped table-responsive'>
  <tr class = 'info'>
  <th>PACIENTE</th><th>MEDICO</th><th>FECHA</th><th style='text-align: center;' colspan = 2>ACCION</th>
  </tr>
  ";
  }
  while ($row = $resultadorecetas->fetch_assoc()) {
  echo "
  <form action = 'farmacia_vista_receta.php' method = 'POST'>
  <tr>
  <td>".$row['NOMBRE_PACIENTE']."</td><td>".$row['NOMBRE_MEDICO']."</td><td>".$row['FECHA']."</td><td><center><input class = 'btn btn-warning' type = 'submit' value = 'Ver Receta'></center></td><td><center><input type= 'submit' class = 'btn btn-warning' type = 'submit' value = 'Dar de Baja' formaction='farmacia_baja_recetas.php'></center></td><input type = 'hidden' name = 'idreceta' value = '".$row['idreceta']."'>
  </tr>
  </form>
  ";
  }
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