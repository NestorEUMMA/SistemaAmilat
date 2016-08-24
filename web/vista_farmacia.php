<?php

include '../include/dbconnect.php';
session_start();


if (!empty($_SESSION['user']))
  {


$query = "
SELECT concat(c. Nombres, ' ', c.Apellidos) as NOMBRE_PACIENTE, concat(b. Nombres, ' ', b.Apellidos) as NOMBRE_MEDICO, a.Fecha as FECHA, a.IdReceta as idreceta
FROM receta as a
LEFT JOIN usuario as b on b.IdUsuario = a.IdUsuario
LEFT JOIN persona as c on c.IdPersona = a.IdPersona
WHERE a.activo = 1
ORDER BY a.Fecha DESC
";
$resultado = $mysqli->query($query);

$query2 = "
SELECT count(IdReceta) idreceta
FROM receta WHERE activo = 1
";
$resultado2 = $mysqli->query($query2);
while ($row2 = $resultado2->fetch_assoc()) {
  $cuentarecetas = $row2['idreceta'];
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
  <h1>LISTADO DE RECETAS ACTIVAS<small></small></h1>
  <ol class="breadcrumb"></ol>
</section>

<section class="content">  
<div id ="row" class="row">
<!-- Ingresar contenido aqui -->
<div id = "asignar">

  <?php
  if (empty($cuentarecetas)){
    echo "
      <script>
      alert('No hay recetas activas para mostrar');
      </script>
    ";
  }else{
  echo "
  <table cellspacing='10' style = 'text-align: center;'>
  <tr>
  <td>PACIENTE</td><td>MEDICO</td><td>FECHA</td><td>ACCION</td>
  </tr>
  ";
  }
  while ($row = $resultado->fetch_assoc()) {
  echo "
  <form action = 'vista_receta.php' method = 'POST'>
  <tr>
  <td>".$row['NOMBRE_PACIENTE']."</td><td>".$row['NOMBRE_MEDICO']."</td><td>".$row['FECHA']."</td><td><input type = 'submit' value = 'Ver Receta'></td><input type = 'hidden' name = 'idreceta' value = '".$row['idreceta']."'>
  </tr>
  </form>
  ";
  }
  echo "</table>";
  ?>
 
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