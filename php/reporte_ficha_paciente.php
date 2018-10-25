<?php

include '../include/dbconnect.php';
session_start();

if (!empty($_SESSION['user']))
  {
    $idpersona = $_POST['idpersona'];

                  $queryconsultas = "
SELECT CONCAT(A.Nombres, ' ',A.Apellidos) as NOMBRE, A.Genero as GENERO, A.FechaNacimiento as FECHA_NACIMIENTO, A.Dui as DUI, A.Direccion as DIRECCION, 
A.Correo as CORREO, B.Nombre as ESTADO_CIVIL, A.Telefono as TELEFONO, A.Celular as CELULAR
FROM persona as A
LEFT JOIN estadocivil as B on  B.IdEstadoCivil = A.IdEstadoCivil
WHERE A.IdPersona = $idpersona
                                      ";
                    $resultadoconsultas = $mysqli->query($queryconsultas);

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
    <h3 class="box-title">VISTA DE CONSULTA</h3>
    </div>
  <!-- /.box-header -->
    <div class="box-body">
  
  <!-- /.PONER PHP AQUI -->
            <?php

                while ($row = $resultadoconsultas->fetch_assoc()) {
                 echo "
                  <table>
                  <tr>
                  <td><label>Nombre: </label></td><td>&nbsp " .$row['NOMBRE']."</td>
                  </tr>
                  <tr>
                  <td><label>Genero: </label></td><td></td><td>".$row['GENERO']."</td>
                  </tr>
                  <tr>
                  <td><label>Fecha de Nacimiento: </label></td><td></td><td>".$row['FECHA_NACIMIENTO']."</td>
                  </tr>
                  <tr>
                  <td><label>DUI: </label></td><td></td><td>".$row['DUI']."</td>
                  </tr>
                  <tr>
                  <td><label>Direccion: </label></td><td></td><td>".$row['DIRECCION']."</td>
                  </tr>
                  <tr>
                  <td><label>Correo: </label></td><td></td><td>".$row['CORREO']."</td>
                  </tr>
                  <tr>
                  <td><label>Estado civil: </label></td><td></td><td>".$row['ESTADO_CIVIL']."</td>
                  </tr>
                  <tr>
                  <td><label>Telefono: </label></td><td></td><td>".$row['TELEFONO']."</td>
                  </tr>
                  <tr>
                  <td><label>Celular: </label></td><td></td><td>".$row['CELULAR']."</td>
                  </tr>
                  </table>
                 ";
                  }
echo "
<form action = 'reportes/reporte_ficha_paciente_pdf.php' method = 'POST'>
<input type = 'hidden' name = 'idpersona' value = ".$idpersona.">
<input type = 'submit' value = 'imprimir' class = 'btn btn-warning'>
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