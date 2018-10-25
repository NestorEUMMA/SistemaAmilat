<?php

include '../include/dbconnect.php';



$idlistaexamen = $_POST['idlistaexamen'];


$querymedicamentos = " SELECT le.IdListaExamen, CONCAT(u.Nombres,' ', u.Apellidos) As 'Medico', CONCAT(p.Nombres,' ', p.Apellidos) As 'Paciente',te.NombreExamen,

   exq.Fecha As 'ExamenQuimicaFecha', exq.Glucosa As 'ExamenQuimicaGlucosa', exq.GlucosaPost As 'ExamenQuimicaGlucosaPost',
    exq.ColesterolTotal As 'ExamenQuimicaColesterolTotal', exq.Triglicerido As 'ExamenQuimicaTriglicerido', 
    exq.AcidoUrico As'ExamenQuimicaAcidoUrico', exq.Creatinina As 'ExamenQuimicaCreatinina',
    exq.NitrogenoUreico As 'ExamenQuimicaNitrogenoUreico', exq.Urea As 'ExamenQuimicaUrea'
            
        FROM listaexamen le
        INNER JOIN usuario u ON le.IdUsuario = u.IdUsuario
        INNER JOIN persona p ON le.IdPersona = p.IdPersona
        LEFT JOIN consulta c ON le.IdConsulta = c.IdConsulta
        INNER JOIN tipoexamen te ON le.IdTipoExamen = te.IdTipoExamen
        LEFT JOIN examenquimica exq ON le.IdListaExamen = exq.IdListaExamen
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
                  <td><label>Medico:</label> </td><td>".$row['Medico']."</td>
                  </tr>
                  <tr>
                  <td><label>Paciente:</label> &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp </td><td>".$row['Paciente']."</td>
                  </tr>
                  <tr>
                  <td><label>Fecha:</label> </td><td>".$row['ExamenQuimicaFecha']."</td>
                  </tr>
                      <tr>
                        <td><label>Glucosa:</label> </td><td>".$row['ExamenQuimicaGlucosa']."</td><td><label>70 - 110 mg/dl</label> </td>
                      </tr>
                      <tr>
                        <td><label>Glucosa Post:</label> </td><td>".$row['ExamenQuimicaGlucosaPost']."</td>
                      </tr>
                      <tr>
                        <td><label>Colesterol Total:</label> </td><td>".$row['ExamenQuimicaColesterolTotal']."</td><td><label>Hasta 200 mg/dl</label> </td>
                      </tr>
                      <tr>
                        <td><label>Triglicerido:</label> </td><td>".$row['ExamenQuimicaTriglicerido']."</td><td><label>Hasta 150 mg/dl</label> </td>
                      </tr>
                      <tr>
                        <td><label>Acido Urico:</label> </td><td>".$row['ExamenQuimicaAcidoUrico']."</td><td><label>M: 2.0 – 6.0 mg/dl, H: 3.4 – 7.0 mg/dl</label> </td>
                      </tr>
                      <tr>
                        <td><label>Creatinina:</label> </td><td>".$row['ExamenQuimicaCreatinina']."</td><td><label>0.6 - 1.2 mg/dl</label> </td>
                      </tr>
                      <tr>
                        <td><label>Nitrogeno Ureico:</label> &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp </td><td>".$row['ExamenQuimicaNitrogenoUreico']."</td><td><label>7.0 - 21.0 mg/dl</label> </td>
                      </tr>
                      <tr>
                        <td><label>Urea:</label> </td><td>".$row['ExamenQuimicaUrea']."</td><td><label>15.0 - 45.0 mg/dl</label> </td>
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

