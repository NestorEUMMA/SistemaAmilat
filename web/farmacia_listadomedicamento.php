<?php

include '../include/dbconnect.php';
session_start();
$idusuario = $_SESSION['IdUsuario'];

if (!empty($_SESSION['user']))
  {
    
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
   <body class="hold-transition skin-blue sidebar-mini">
    <!-- Site wrapper -->
    <div class="wrapper">



     <?php include '../include/header.php'; ?>
      <?php include '../include/aside.php'; ?>

      <!-- =============================================== -->

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Inicio
            <small></small>
          </h1>
          <ol class="breadcrumb">


          </ol>
        </section>

        <section class="content">
            <div class="row">
            <div class="col-xs-12">
            <div class="box">
                <div class="box-header with-border">
                  <h3 class="box-title">Listado de Medicamentos</h3>
                </div><!-- /.box-header -->
                    <div class="box-body">
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

              echo "</table>";?>
              <div class="col-xs-10">
              </div>
              <div class="col-xs-2">
              <form action = 'reporte_farmacia_listado_medicamentos_pdf.php' method = 'POST'>
              <input type = 'submit' value = 'Imprimir' class = 'btn btn-warning'>
              </form>
                    </div>
            </div>
            </div>
            </div>



    </section>


      </div><!-- /.content-wrapper -->

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

