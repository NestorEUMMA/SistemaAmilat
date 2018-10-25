<?php

include '../include/dbconnect.php';
session_start();

if (!empty($_SESSION['user']))
  {
    $queryexpedientes = "SELECT IdPersona, CONCAT(Nombres,  ' ', Apellidos) as NombreCte FROM persona where IdEstado = 2 order by Nombres ASC";
    $resultadoexpedientes = $mysqli->query($queryexpedientes);

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
              <h3 class="box-title">Expediente de Pacientes</h3>
            </div><!-- /.box-header -->
                <div class="box-body">
                  <table id="example2" class="table table-bordered table-hover">
                    <?php
                            echo"<thead>";
                                echo"<tr>";
                                echo"<th>Nombre Completo del Paciente</th>";
                                echo"<th>Accion</th>";
                                echo"</tr>";
                            echo"</thead>";
                            echo"<tbody>";

                             while ($row = $resultadoexpedientes->fetch_assoc())
                            {
                                 $id = $row['IdPersona'];
                                 echo"<tr>";
                                 echo"<td>".$row['NombreCte']."</td>";
                                 echo"<td><div id='btn$id' class='btn-exp'><span class='btn btn-info'> Ver Expediente <i class='fa fa-search'></i></span></div>
                                            </td>";
                                 echo"</tr>";
                                 echo"</body>  ";
                            }

                              ?>

                  </table>
                </div>
        </div>
        </div>
        </div>

        <form id="frm" action="enfermeria_expediente_clinico.php" method="post" class="hidden">
          <input type="text" id="IdPersona" name="IdPersona" />
        </form>


    </section>


        <!-- Main content -->

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


<script type="text/javascript">
    $(document).ready(function(){

        $(".btn-exp").click(function(){
            var id = $(this).attr("id").replace("btn","");
            $("#IdPersona").val(id);
            $("#frm").submit();
        });
    });

</script>
