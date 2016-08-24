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
        INNER JOIN consulta c ON le.IdConsulta = c.IdConsulta
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
                        <td><label>Glucosa:</label> </td><td>".$row['ExamenQuimicaGlucosa']."</td>
                      </tr>
                      <tr>
                        <td><label>Glucosa Post:</label> </td><td>".$row['ExamenQuimicaGlucosaPost']."</td>
                      </tr>
                      <tr>
                        <td><label>Colesterol Total:</label> </td><td>".$row['ExamenQuimicaColesterolTotal']."</td>
                      </tr>
                      <tr>
                        <td><label>Triglicerido:</label> </td><td>".$row['ExamenQuimicaTriglicerido']."</td>
                      </tr>
                      <tr>
                        <td><label>Acido Urico:</label> </td><td>".$row['ExamenQuimicaAcidoUrico']."</td>
                      </tr>
                      <tr>
                        <td><label>Creatinina:</label> </td><td>".$row['ExamenQuimicaCreatinina']."</td>
                      </tr>
                      <tr>
                        <td><label>Nitrogeno Ureico:</label> &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp </td><td>".$row['ExamenQuimicaNitrogenoUreico']."</td>
                      </tr>
                      <tr>
                        <td><label>Urea:</label> </td><td>".$row['ExamenQuimicaUrea']."</td>
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

