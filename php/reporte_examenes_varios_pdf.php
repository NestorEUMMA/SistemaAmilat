<?php

include '../include/dbconnect.php';


 $idlistaexamen = $_POST['idlistaexamen'];


$querymedicamentos = "SELECT le.IdListaExamen, CONCAT(u.Nombres,' ', u.Apellidos) As 'Medico', CONCAT(p.Nombres,' ', p.Apellidos) As 'Paciente',te.NombreExamen,

  ev.Fecha As 'ExamenesVariosFecha', ev.Resultado As 'ExamenesVariosResultado'
    
FROM listaexamen le
INNER JOIN usuario u ON le.IdUsuario = u.IdUsuario
INNER JOIN persona p ON le.IdPersona = p.IdPersona
LEFT JOIN consulta c ON le.IdConsulta = c.IdConsulta
INNER JOIN tipoexamen te ON le.IdTipoExamen = te.IdTipoExamen
LEFT JOIN examenesvarios ev ON le.IdListaExamen = ev.IdListaExamen
WHERE le.IdListaExamen = $idlistaexamen ";
$resultadomedicamentos = $mysqli->query($querymedicamentos);

?>

<!DOCTYPE html>
<html>
 <?php  include '../include/asset.php'; ?>
<body onload="window.print();">
<div class="wrapper">
  <!-- Main content -->
   <section class="invoice">
      <!-- title row -->
      <div class="row">
        <div class="col-xs-7">
        </div>
        <div class="col-xs-10">
                  <img src="reportes/Imagen/header.png" alt="..." class="margin">
        </div>
        <!-- /.col -->
      </div>
      </br>

      <STRONG>FICHA DE EXAMENES VARIOS</STRONG>
      </br>
      </br>


      <!-- Table row -->
      <div class="row">
        <div class="col-xs-12 table-responsive">
          
                <table class="table table-bordered table-hover" >
                   <?php
                    while ($row = $resultadomedicamentos->fetch_assoc()) {
                    echo "
                  <tr>
                  <td><label>Medico:</label> </td><td>".$row['Medico']."</td>
                  </tr>
                  <tr>
                  <td><label>Paciente:</label></td><td>".$row['Paciente']."</td>
                  </tr>
                  <tr>
                    <td><label>Fecha:</label> </td><td>".$row['ExamenesVariosFecha']."</td>
                  </tr>
                  <tr>
                    <td><label>Resultado:</label></td><td>".$row['ExamenesVariosResultado']."</td>
                  </tr>
                ";
              }
              echo "</table>";
              
              ?>

        </div>
      </div>
    
      <div class="row no-print">
      <div class="col-xs-11">
      </div>
        <div class="col-xs-1">
        <a href="laboratorio_buscarpaciente.php" class="btn btn-success btn-sm btn-tool " role="button">Regresar</a>
        </div>
      </div>
    </section>
</div>
</body>
</html>

