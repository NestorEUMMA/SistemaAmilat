<?php

include '../include/dbconnect.php';


$idlistaexamen = $_POST['idlistaexamen'];

$querymedicamentos = "SELECT le.IdListaExamen, CONCAT(u.Nombres,' ', u.Apellidos) As 'Medico', CONCAT(p.Nombres,' ', p.Apellidos) As 'Paciente',te.NombreExamen,

  eo.Fecha As 'ExamenOrinaFecha', eo.Color As 'ExamenOrinaColor', eo.Olor As 'ExamenOrinaOlor',
    eo.Aspecto As 'ExamenOrinaAspecto', eo.Densidad As 'ExamenOrinaDendisdad', eo.Ph As 'ExamenOrinaPh',
    eo.Proteinas As 'ExamenOrinaProteinas', eo.Glucosa As 'ExamenOrinaGlucosa', eo.SagreOculta As 'ExamenOrinaSangreOculta',
    eo.CuerposCetomicos As 'ExamenOrinaCuerposCetomicos', eo.Urobilinogeno As 'ExamenOrinaUrobilinogeno',
    eo.Bilirrubina As 'ExamenOrinaBilirrubina', eo.EsterasaLeucocitaria As 'ExamenOrinaEsterasaLeucocitaria',
    eo.Cilindros As 'ExamenOrinaCilindros', eo.Hematies As 'ExamenOrinaHematies', eo.Leucocitos As 'ExamenOrinaLeucocitos',
    eo.CelulasEpiteliales As 'ExamenOrinaCelulasEpiteliales', eo.ElementosMinerales As 'ExamenOrinaElementosMinerales',
    eo.Parasitos As 'ExamenOrinaParasitos', eo.Observaciones As 'ExamenOrinaObservaciones'
    
FROM listaexamen le
INNER JOIN usuario u ON le.IdUsuario = u.IdUsuario
INNER JOIN persona p ON le.IdPersona = p.IdPersona
INNER JOIN consulta c ON le.IdConsulta = c.IdConsulta
INNER JOIN tipoexamen te ON le.IdTipoExamen = te.IdTipoExamen
LEFT JOIN examenorina eo ON le.IdListaExamen = eo.IdListaExamen
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
          <h2 class="page-header">
          </br>
          </br>
            <i class="fa fa-globe"></i> Centro Medico Familiar Shalom
          </h2>
        </div>
        <div class="col-xs-5">
                  <img src="reportes/Imagen/logo.png" alt="..." class="margin">
        </div>
        <!-- /.col -->
      </div>
      

      <STRONG>FICHA DE EXAMEN DE ORINA</STRONG>
      </br>
      </br>
      </br>

      <!-- Table row -->
      <div class="row">
        <div class="col-xs-12 table-responsive">
                <table  >
                    <?php
                    while ($row = $resultadomedicamentos->fetch_assoc()) {
                    echo "
                            
                          <tr>
                      <td><label>Medico:</label> </td><td>".$row['Medico']."</td>
                      </tr>
                      <tr>
                      <td><label>Paciente:</label> &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp </td><td>".$row['Paciente']."</td>
                      </tr>
                      <tr>
                      <td><label>Fecha:</label> </td><td>".$row['ExamenOrinaFecha']."</td>
                      </tr>
                      <tr>
                        <td><label>Color:</label> </td><td>".$row['ExamenOrinaColor']."</td>
                      </tr>
                      <tr>
                        <td><label>Olor:</label> </td><td>".$row['ExamenOrinaOlor']."</td>
                      </tr>
                      <tr>
                        <td><label>Aspecto:</label> </td><td>".$row['ExamenOrinaAspecto']."</td>
                      </tr>
                      <tr>
                        <td><label>Densidad:</label> </td><td>".$row['ExamenOrinaDendisdad']."</td>
                      </tr>
                      <tr>
                        <td><label>PH:</label> </td><td>".$row['ExamenOrinaPh']."</td>
                      </tr>
                      <tr>
                        <td><label>Proteinas:</label> </td><td>".$row['ExamenOrinaProteinas']."</td>
                      </tr>
                      <tr>
                        <td><label>Glucosa:</label> </td><td>".$row['ExamenOrinaGlucosa']."</td>
                      </tr>
                      <tr>
                        <td><label>Sangre Oculta:</label> </td><td>".$row['ExamenOrinaSangreOculta']."</td>
                      </tr>
                      <tr>
                        <td><label>Cuerpos cetomicos:</label> </td><td>".$row['ExamenOrinaCuerposCetomicos']."</td>
                      </tr>
                      <tr>
                        <td><label>Urobilinogeno:</label> </td><td>".$row['ExamenOrinaUrobilinogeno']."</td>
                      </tr>
                      <tr>
                        <td><label>Bilirrubina:</label> </td><td>".$row['ExamenOrinaBilirrubina']."</td>
                      </tr>
                      <tr>
                        <td><label>Esterasa Leucocitaria:</label> &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp </td><td>".$row['ExamenOrinaEsterasaLeucocitaria']."</td>
                      </tr>
                      <tr>
                        <td><label>Cilindros:</label> </td><td>".$row['ExamenOrinaCilindros']."</td>
                      </tr>
                      <tr>
                        <td><label>Hematies:</label> </td><td>".$row['ExamenOrinaHematies']."</td>
                      </tr>
                      <tr>
                        <td><label>Leucocitos:</label> </td><td>".$row['ExamenOrinaLeucocitos']."</td>
                      </tr>
                      <tr>
                        <td><label>Celulas Epiteliales:</label> </td><td>".$row['ExamenOrinaCelulasEpiteliales']."</td>
                      </tr>
                      <tr>
                        <td><label>Elementos Minerales:</label> </td><td>".$row['ExamenOrinaElementosMinerales']."</td>
                      </tr>
                      <tr>
                        <td><label>Parasitos:</label> </td><td>".$row['ExamenOrinaParasitos']."</td>
                      </tr>
                      <tr>
                        <td><label>Observaciones:</label> </td><td>".$row['ExamenOrinaObservaciones']."</td>
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

