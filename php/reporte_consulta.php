<?php

include '../include/dbconnect.php';
session_start();

if (!empty($_SESSION['user']))
  {
    $idconsulta = $_POST['idconsulta'];

                  $queryconsultas = "
SELECT NOMBRE_PACIENTE, NOMBRE_MEDICO, MODULO, DIAGNOSTICO, COMENTARIOS, OTROS, ENFERMEDAD, FECHA_CONSULTA, CONCAT(PESO, ' ', UNIDAD_PESO) as PESO,
CONCAT(ALTURA, ' ', UNIDAD_ALTURA) as ALTURA, CONCAT(TEMPERATURA, ' ', UNIDAD_TEMPERATURA) as TEMPERATURA, PULSO, 
CONCAT(PRESION_MAX, '/',PRESION_MIN) as PRESION, OBSERVACIONES
FROM
(
SELECT CONCAT(B.Nombres, ' '  ,B.Apellidos) as NOMBRE_PACIENTE, CONCAT(F.Nombres, ' '  ,F.Apellidos) as NOMBRE_MEDICO, C.NombreModulo as MODULO, A.Diagnostico as DIAGNOSTICO, A.Comentarios as COMENTARIOS,
 A.Otros as OTROS, D.Nombre as ENFERMEDAD, A.FechaConsulta as FECHA_CONSULTA, E.Peso as PESO,
 CASE WHEN UnidadPeso = 1 THEN 'Kg' 
    WHEN UnidadPeso = 2 THEN 'Lbs' END as UNIDAD_PESO,
        E.Altura as ALTURA,
 CASE WHEN UnidadAltura = 1 THEN 'mts' 
    WHEN UnidadAltura = 2 THEN 'pies' END as UNIDAD_ALTURA,
        E.Temperatura as TEMPERATURA,
 CASE WHEN UnidadTemperatura = 1 THEN 'C' 
    WHEN UnidadTemperatura = 2 THEN 'F' END as UNIDAD_TEMPERATURA,
E.Pulso as PULSO, E.PresionMax as PRESION_MAX, E.PresionMin as PRESION_MIN, E.Observaciones as OBSERVACIONES
FROM consulta as A
LEFT JOIN persona as B on B.IdPersona = A.IdPersona
LEFT JOIN modulo as C on C.IdModulo = A.IdModulo
LEFT JOIN enfermedad as D on D.IdEnfermedad = A.IdEnfermedad
LEFT JOIN indicador as E on E.IdConsulta = A.IdConsulta
LEFT JOIN usuario as F on F.IdUsuario = A.IdUsuario
WHERE A.IdConsulta = $idconsulta
) as A
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

            <?php

                while ($row = $resultadoconsultas->fetch_assoc()) {
                 echo "
                  <table class='table table-bordered table-hover' >
                  <tr>
                  <td><label>Fecha: </label></td> <td>".$row['FECHA_CONSULTA']."</td>
                  </tr>
                  <tr>
                  <td><label>Nombre: </label></td>  <td>".$row['NOMBRE_PACIENTE']."</td>
                  </tr>
                  <tr>
                  <td><label>Enfermedad: </label></td><td>".$row['ENFERMEDAD']."</td>
                  </tr>
                  <tr>
                  <td><label>Medico: </label></td><td>".$row['NOMBRE_MEDICO']."</td>
                  </tr>
                  <tr>
                  <td><label>Modulo: </label></td><td>".$row['MODULO']."</td>
                  </tr>
                  <tr>
                  <td><label>Diagnostico: </label></td><td>".$row['DIAGNOSTICO']."</td>
                  </tr>
                  <tr>
                  <td><label>Comentarios: </label></td><td>".$row['COMENTARIOS']."</td>
                  </tr>
                  <tr>
                  <td><label>Otros Comentarios: </label></td><td>" .$row['OTROS']."</td>
                  </tr>
                  <tr>
                  <td><label>Peso: </label></td><td>".$row['PESO']."</td>
                  </tr>
                  <tr>
                  <td><label>Altura: </label></td><td>".$row['ALTURA']."</td>
                  </tr>
                  <tr>
                  <td><label>Temperatura: </label></td><td>" .$row['TEMPERATURA']."</td>
                  </tr>
                  <tr>
                  <td><label>Pulso: </label></td><td>".$row['PULSO']."</td>
                  </tr>
                  <tr>
                  <td><label>Presion: </label></td><td>".$row['PRESION']."</td>
                  </tr>
                  <tr>
                  <td><label>Observaciones: </label></td><td>".$row['OBSERVACIONES']."</td>
                  </tr>
                  </table>
                 ";
                  } ?>
<div class="col-xs-1">
<?php          
echo "
<form action = 'reporte_vista_consulta_pdf.php' method = 'POST'>
<input type = 'hidden' name = 'idconsulta' value = ".$idconsulta.">
<input type = 'submit' value = 'imprimir' class = 'btn btn-warning'>
</form>";?></div>
        <div class="col-xs-1">
        <a href="reporte_pacientes.php" class="btn btn-success btn btn-tool " role="button">Regresar</a>
        </div>

                   
                        
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