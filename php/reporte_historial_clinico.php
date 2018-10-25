<?php

include '../include/dbconnect.php';
session_start();

if (!empty($_SESSION['user']))
  {
    $idpersona = $_POST['idpersona'];

                  $queryexpedientes = "
                  SELECT A.FechaConsulta as FECHA, CONCAT(B.Nombres, ' ',B.Apellidos) as NOMBRE_PACIENTE, CONCAT(C.Nombres, ' ',C.Apellidos) as NOMBRE_MEDICO, 
                    D.NombreModulo as MODULO, A.Diagnostico as DIAGNOSTICO, A.IdConsulta as idconsulta
                    FROM consulta as A
                    LEFT JOIN persona as B on B.IdPersona = A.IdPersona
                    LEFT JOIN usuario as C on C.IdUsuario = A.IdUsuario
                    LEFT JOIN modulo as D on D.IdModulo = A.IdModulo
                    WHERE A. IdPersona = $idpersona
                    ORDER BY A.FechaConsulta DESC
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
                  <h3 class="box-title">Expediente de Pacientes</h3>
                </div><!-- /.box-header -->
                    <div class="box-body">

                            <?php
          echo "
            <table class = 'table table-bordered table-hover'>
            <tr>
            <td style = 'width: 100px;'>FECHA</td>
            <td style = 'width: 100px;'>PACIENTE</td>
            <td style = 'width: 100px;'>MEDICO</td>
            <td style = 'width: 100px;'>MODULO</td>
            <td style = 'width: 100px;'>DIAGNOSTICO</td>
            <td style = 'width: 100px;'>ACCION</td>
            </tr>
          ";

          while ($row = $resultadoexpedientes->fetch_assoc()) {
           echo "
           <form action = 'reporte_consulta.php' method = 'POST'>
            <tr>
              <td style = 'width: 100px;'>".$row['FECHA']."</td>
              <td style = 'width: 100px;'>".$row['NOMBRE_PACIENTE']."</td>
              <td style = 'width: 100px;'>".$row['NOMBRE_MEDICO']."</td>
              <td style = 'width: 100px;'>".$row['MODULO']."</td>
              <td style = 'width: 100px;'>".$row['DIAGNOSTICO']."</td>
              <td><input class = 'btn btn-warning' type = 'submit' value = 'Ver consulta'></td>
              <input type = 'hidden' name = 'idconsulta' value = '".$row['idconsulta']."'>                        
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
