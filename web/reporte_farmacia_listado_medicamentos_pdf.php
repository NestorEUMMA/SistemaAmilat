<?php

include '../include/dbconnect.php';


   $querytablamedicamentos = "SELECT IdMedicamento As 'IdMedicamento' ,m.NombreMedicamento As 'Medicamento', u.Nombre As 'Presentacion', c.NombreCategoria As 'Categoria',
                                    l.NombreLaboratorio As 'Laboratorio', m.Existencia As 'Existencia'
                              FROM medicamentos m
                              INNER JOIN laboratorio l on m.IdLaboratorio = l.IdLaboratorio
                              INNER JOIN categoria c on m.IdCategoria = c.IdCategoria
                              INNER JOIN unidadmedida u on m.IdUnidadMedida = u.IdUnidadMedida
                              ORDER BY Medicamento ASC";
      $resultadotablamedicamentos = $mysqli->query($querytablamedicamentos);
   
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

      <STRONG>LISTA DE MEDICAMENTOS</STRONG>
      </br>
      </br>

  
      <!-- /.row -->

      <!-- Table row -->
      <div class="row">
        <div class="col-xs-12 table-responsive">
           <table id="example2" class="table table-bordered table-hover">
                        <?php
                                echo"<thead>";
                                    echo"<tr>";
                                    echo"<th>Medicamento</th>";
                                    echo"<th>Presentacion</th>";
                                    echo"<th>Laboratorio</th>";
                                    echo"<th>Existencia</th>";
                                    echo"</tr>";
                                echo"</thead>";
                                echo"<tbody>";

                                 while ($row = $resultadotablamedicamentos->fetch_assoc())
                                {
                                
                                     echo"<tr>";
                                     echo"<td>".$row['Medicamento']."</td>";
                                     echo"<td>".$row['Presentacion']."</td>";
                                     echo"<td>".$row['Laboratorio']."</td>";
                                     echo"<td>".$row['Existencia']."</td>";
                                     echo"</tr>";
                                     echo"</body>  ";
                                }

              echo "</table>";
              echo"
              <form action = '../php/reportes/reporte_farmacia_listado_medicamentos_pdf.php' method = 'POST'>
              <input type = 'submit' value = 'Imprimir' class = 'btn btn-warning'>
              </form>
              ";
              ?>


        </div>
      </div>
    
      <div class="row no-print">
      <div class="col-xs-11">
      </div>
        <div class="col-xs-1">
        <a href="../web/farmacia_listadomedicamento.php" class="btn btn-success btn-sm btn-tool " role="button">Regresar</a>
        </div>
      </div>
    </section>
</div>
</body>
</html>