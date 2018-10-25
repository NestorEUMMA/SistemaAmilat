<?php

include '../include/dbconnect.php';



 $idlistaexamen = $_POST['idlistaexamen'];

 $querymedicamentos = "SELECT le.IdListaExamen, CONCAT(u.Nombres,' ', u.Apellidos) As 'Medico', CONCAT(p.Nombres,' ', p.Apellidos) As 'Paciente',
  te.NombreExamen, ehe.Fecha As 'ExamenHemogramaFecha', ehe.GlobulosRojos As 'ExamenHemogramaGlobulosRojos', ehe.Hemoglobina As 'ExamenHemogramaHemoglobina', 
    ehe.Hematocrito As 'ExamenHemogramaHematocrito', ehe.Vgm As 'ExamenHemogramaVgm', ehe.Hcm As 'ExamenHemogramaHcm', ehe.Chcm As 'ExamenHemogramaChcm', 
    ehe.Leucocitos As 'ExamenHemogramaLeucocitos', ehe.NeutrofilosEnBanda As 'ExamenHemogramaNeutrofilos', ehe.Linfocitos As 'ExamenHemogramaLinfocitos', 
    ehe.Monocitos As 'ExamenHemogramaMonocitos', ehe.Eosinofilos As 'ExamenHemogramaEosinofilos', ehe.Basofilos As 'ExamenHemogramaBasofilos', 
    ehe.Plaquetas As 'ExamenHemogramaPlaquetas', ehe.Eritrosedimentacion As 'ExamenHemogramaEritrosedimentacion', ehe.Otros As 'ExamenHemogramaOtros', 
    ehe.NeutrofilosSegmentados As 'ExamenHemogramaNeutrofilosSegmentados'
    FROM listaexamen le
    INNER JOIN usuario u ON le.IdUsuario = u.IdUsuario
    INNER JOIN persona p ON le.IdPersona = p.IdPersona
    LEFT JOIN consulta c ON le.IdConsulta = c.IdConsulta
    INNER JOIN tipoexamen te ON le.IdTipoExamen = te.IdTipoExamen
    LEFT JOIN examenhemograma ehe ON le.IdListaExamen = ehe.IdListaExamen
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
      

      <STRONG>FICHA DE EXAMEN DE HEMOGRAMA</STRONG>
      


      <!-- Table row -->
      <div class="row">
        <div class="col-xs-12 table-responsive">
          
                <table class="table table-bordered table-hover" >
                    <?php
                    while ($row = $resultadomedicamentos->fetch_assoc()) {
                    echo "
                  
                  <tr>
                  <td><label>Nombre:</label> </td><td>".$row['Medico']."</td>
                  </tr>
                  <tr>
                  <td><label>Paciente:</label> &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp </td><td>".$row['Paciente']."</td>
                  </tr>
                  <tr>
                  <td><label>Fecha:</label> </td><td>".$row['ExamenHemogramaFecha']."</td>
                  </tr>
                  <tr>
                    <td><label>Globulos Rojos:</label> </td><td>".$row['ExamenHemogramaGlobulosRojos']."</td><td><label>X mm3</label> </td>
                  </tr>
                  <tr>
                    <td><label>Hemoglobina:</label> </td><td>".$row['ExamenHemogramaHemoglobina']."</td><td><label>Gr/dl</label> </td>
                  </tr>
                  <tr>
                    <td><label>Hematocrito:</label> </td><td>".$row['ExamenHemogramaHematocrito']."</td><td><label>%</label> </td>
                  </tr>
                  <tr>
                    <td><label>Vgm:</label> </td><td>".$row['ExamenHemogramaVgm']."</td><td><label>Micras cubicas</label> </td>
                  </tr>
                  <tr>
                    <td><label>Hcm:</label> </td><td>".$row['ExamenHemogramaHcm']."</td><td><label>Micro microgramos</label> </td>
                  </tr>
                  <tr>
                    <td><label>Chcm:</label> </td><td>".$row['ExamenHemogramaChcm']."</td><td><label>%</label> </td>
                  </tr>
                  <tr>
                    <td><label>Leucocitos:</label> </td><td>".$row['ExamenHemogramaLeucocitos']."</td><td><label>Xmm3</label> </td>
                  </tr>
                  <tr>
                    <td><label>Neutrofilos Segmentados:</label> </td><td>".$row['ExamenHemogramaNeutrofilosSegmentados']."</td><td><label>%</label> </td>
                  </tr>
                  <tr>
                    <td><label>Neutrofilos En Banda:</label> </td><td>".$row['ExamenHemogramaNeutrofilos']."</td><td><label>%</label> </td>
                  </tr>
                  <tr>
                    <td><label>Linfocitos:</label> </td><td>".$row['ExamenHemogramaLinfocitos']."</td><td><label>%</label> </td>
                  </tr>
                  <tr>
                    <td><label>Monocitos:</label> </td><td>".$row['ExamenHemogramaMonocitos']."</td><td><label>%</label> </td>
                  </tr>
                  <tr>
                    <td><label>Eosinofilos:</label> </td><td>".$row['ExamenHemogramaEosinofilos']."</td><td><label>%</label> </td>
                  </tr>
                  <tr>
                    <td><label>Basofilos:</label> </td><td>".$row['ExamenHemogramaBasofilos']."</td><td><label>%</label> </td>
                  </tr>
                  <tr>
                    <td><label>Plaquetas:</label> </td><td>".$row['ExamenHemogramaPlaquetas']."</td><td><label>X mm3</label> </td>
                  </tr>
                  <tr>
                    <td><label>Eritrosedimentacion:</label> </td><td>".$row['ExamenHemogramaEritrosedimentacion']."</td><td><label>mm/h</label> </td>
                  </tr>
                  <tr>
                    <td><label>Otros:</label> </td><td>".$row['ExamenHemogramaOtros']."</td>
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

