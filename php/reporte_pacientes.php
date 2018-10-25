<?php

include '../include/dbconnect.php';
session_start();

if (!empty($_SESSION['user']))
  {
    

                  $queryexpedientes = "
            SELECT CONCAT(Nombres, ' ', Apellidos) as NOMBRE, IdPersona as idpersona
            FROM persona
            ORDER BY Nombres ASC
                                      ";
                    $resultadoexpedientes = $mysqli->query($queryexpedientes);

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
                    <h3 class="box-title">REPORTE DE PACIENTES ACTIVOS</h3>
                  </div><!-- /.box-header -->
                      <div class="box-body">        
                        <table id="example2" class ="table table-bordered table-hover" >
                          <?php
                           //echo"<thead>";
                          echo "
                            <tr>
                            <th style = 'width: 100px;'>NOMBRE</th>
                            <th style = 'width: 100px;'>FICHA</th>
                            <th style = 'width: 100px;'>EXPEDIENTE</th>
                            </tr>";
                          echo"</thead>";
                          echo"<tbody>";
                        
                      
                          while ($row = $resultadoexpedientes->fetch_assoc()) {
                           echo "
                           <form method = 'POST'>
                            <tr>
                              <td style = 'width: 100px;'>".$row['NOMBRE']."</td>
                              <td style = 'width: 100px;'><input class = 'btn btn-warning' type = 'submit' value = 'Ver Ficha' formaction = 'reportes_ficha_paciente.php'></td>
                              <td style = 'width: 100px;'><input class = 'btn btn-warning' type = 'submit' value = 'Ver Expediente' formaction = 'reporte_historial_clinico.php'></td>
                              <input type = 'hidden' name = 'idpersona' value = '".$row['idpersona']."'>                        
                            </tr>
                           </form>
                           ";
                            }
                            echo "</table>";

                        ?>

                      </div>
              </div>
              </div>
              </div>

            <div class="row">
                <div class="col-xs-12">

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