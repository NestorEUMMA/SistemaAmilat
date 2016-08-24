<?php

include '../../include/dbconnect.php';
session_start();


$idusuario = 7;
$idpersona = 1;
$idconsulta = 42;
$dato = $_POST['idreceta'];
echo "dato: ".$dato;

if (!empty($_SESSION['user'])){

    if (empty($dato)){
    $query = "INSERT INTO receta (IdUsuario, IdPersona, IdConsulta, fecha, activo)
                VALUES ($idusuario, $idpersona, $idconsulta, now(), 1)";
    $resultado = $mysqli->query($query);

    $query2 = " SELECT max(IdReceta) as idreceta FROM receta WHERE IdUsuario = $idusuario ";
    $resultado2 = $mysqli->query($query2);

    while ($row = $resultado2->fetch_assoc()) {
          $idreceta = $row['idreceta'];
            }
}else{
    $idreceta = $_POST['idreceta'];
}



$querymedicamentos = "SELECT IdMedicamento, NombreMedicamento FROM medicamentos ORDER BY NombreMedicamento ASC";
$resultadomedicamentos = $mysqli->query($querymedicamentos);

?>

<!DOCTYPE html>
<html>
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
  <h1>Inicio<small></small></h1>
  <ol class="breadcrumb"></ol>
</section>

<section class="content">  
<div id ="row" class="row">
<!-- Ingresar contenido aqui -->
<div id = "asignar">
<form action = "guardar_medico_asignar_medicamento.php" method = "POST">
  <table>
  <tr>
  <td>Medicamento</td><td>Cantidad</td><td>Horas</td><td>Dias</td>
  </tr>
    <tr>
      <td>    
      <select name="idmedicamento">
        <?php
        while ($row = $resultadomedicamentos->fetch_assoc()) {
        echo "<option value = '".$row['IdMedicamento']."'>".$row['NombreMedicamento']."</option>";
                                                              }
        ?>
      </select>
      </td>
      <td>
        <input type="text" name="cantidad" size="3" maxsize="3">
      </td>
      <td>
        <input type="text" name="horas" size="2" maxsize="2">
      </td>
       <td>
        <input type="text" name="dias" size="2" maxsize="2">
      </td>
      </tr>
      <tr>
      <td>
      <input type = "submit" value = "Agregar">
      </td>
      </tr>
  </table>
  <?PHP
  echo "
  <input type = 'hidden' name = 'idreceta' value = '".$idreceta."'>
  ";
  ?>
  </form>
  </div>
  <div id = "listado">

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