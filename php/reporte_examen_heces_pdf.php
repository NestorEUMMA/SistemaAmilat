<?php

include '../include/dbconnect.php';



$idlistaexamen = $_POST['idlistaexamen'];


$querymedicamentos = "SELECT le.IdListaExamen, CONCAT(u.Nombres,' ', u.Apellidos) As 'Medico', CONCAT(p.Nombres,' ', p.Apellidos) As 'Paciente',te.NombreExamen,
    eh.Fecha As 'ExamenHecesFecha', eh.Color As 'ExamenHecesColor', eh.Consistencia As 'ExamenHecesConsistencia',
    eh.Mucus As 'ExamenHecesMucus', eh.Hematies As 'ExamenHecesHematies', eh.Leucocitos As 'ExamenHecesLeucocitos',
    eh.RestosAlimenticios As 'ExamenHecesRestosAlimenticios', eh.Macrocopicos As 'ExamenHecesMacrocopios',
    eh.Microscopicos As 'ExamenHecesMicroscopicos', eh.FloraBacteriana As 'ExamenHecesFlora',
    eh.Otros As 'ExamenHecesOtros', eh.PActivos As 'ExamenHecesPActivos', eh.PQuistes As 'ExamenHecesPQuistes'
    
    FROM listaexamen le
    INNER JOIN usuario u ON le.IdUsuario = u.IdUsuario
    INNER JOIN persona p ON le.IdPersona = p.IdPersona
    INNER JOIN consulta c ON le.IdConsulta = c.IdConsulta
    INNER JOIN tipoexamen te ON le.IdTipoExamen = te.IdTipoExamen
    LEFT JOIN examenheces eh ON le.IdListaExamen = eh.IdListaExamen
    WHERE le.IdListaExamen =$idlistaexamen";
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
            </br></br>
            <i class="fa fa-globe"></i> Centro Medico Familiar Shalom
          </h2>
        </div>
        <div class="col-xs-5">
                  <img src="reportes/Imagen/logo.png" alt="..." class="margin">
        </div>
        <!-- /.col -->
      </div>
      </br>

      <STRONG>FICHA DE EXAMEN DE HECES</STRONG>
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
                  <td><label>Nombre: </label></td><td>".$row['Medico']."</td>
                  </tr>
                  <tr>
                  <td><label>Paciente: </label>:&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp </td> <td>".$row['Paciente']."</td>
                  </tr>
                  <tr>
                  <td><label>Fecha: </label> </td><td>".$row['ExamenHecesFecha']."</td>
                  </tr>
                  <tr>
                    <td><label>Color:</label> </td><td>".$row['ExamenHecesColor']."</td>
                  </tr>
                  <tr>
                    <td><label>Consistencia:</label> </td><td>".$row['ExamenHecesConsistencia']."</td>
                  </tr>
                  <tr>
                    <td><label>Mucus:</label> </td><td>".$row['ExamenHecesMucus']."</td>
                  </tr>
                  <tr>
                    <td><label>Hematies:</label> </td><td>".$row['ExamenHecesHematies']."</td>
                  </tr>
                  <tr>
                    <td><label>Leucocitos:</label> </td><td>".$row['ExamenHecesLeucocitos']."</td>
                  </tr>
                  <tr>
                    <td><label>Restos Alimenticios:</label>&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp </td><td>".$row['ExamenHecesRestosAlimenticios']."</td>
                  </tr>
                  <tr>
                    <td><label>Macrocopicos:</label> </td><td>".$row['ExamenHecesMacrocopios']."</td>
                  </tr>
                  <tr>
                    <td><label>Macricroscopios:</label> </td><td>".$row['ExamenHecesMicroscopicos']."</td>
                  </tr>
                  <tr>
                    <td><label>Flora Bacteriana:</label> </td><td>".$row['ExamenHecesFlora']."</td>
                  </tr>
                  <tr>
                    <td><label>Otros:</label> </td><td>".$row['ExamenHecesOtros']."</td>
                  </tr>
                  <tr>
                    <td><label>PActivos:</label> </td><td>".$row['ExamenHecesPActivos']."</td>
                  </tr>
                  <tr>
                    <td><label>PQuistes:</label> </td><td>".$row['ExamenHecesPQuistes']."</td>
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

