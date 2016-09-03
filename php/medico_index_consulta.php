<?php

include '../include/dbconnect.php';
session_start();
$idusuario = $_SESSION['IdUsuario'];

if (!empty($_SESSION['user']))
  {
    $queryexpedientes = "SELECT c.IdPersona as 'IdPersona', c.IdConsulta As 'IdConsulta', CONCAT(u.Nombres,' ',u.Apellidos) as 'Medico', CONCAT(p.Nombres,' ',p.Apellidos) as 'Paciente', c.FechaConsulta as 'Fecha',
      c.Activo, c.IdEstado
      FROM consulta c
      INNER JOIN usuario u ON u.IdUsuario = c.IdUsuario
      INNER JOIN persona p ON p.IdPersona = c.IdPersona
      where u.IdUsuario = ".$idusuario." and c.Activo = 1 and c.IdEstado = 2
      ORDER BY IdConsulta ASC";

    $resultadoexpedientes = $mysqli->query($queryexpedientes);

?>

<!DOCTYPE html
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
                  <h3 class="box-title">Expediente de Pacientes</h3>
                </div><!-- /.box-header -->
                    <div class="box-body">
                      <table id="example2" class="table table-bordered table-hover">
                        <?php
                                echo"<thead>";
                                    echo"<tr>";
                                    echo"<th>ID</th>";
                                    echo"<th>Medico</th>";
                                    echo"<th>Nombre Completo del Paciente</th>";
                                    echo"<th>Fecha</th>";
                                    echo"<th>Accion</th>";
                                    echo"</tr>";
                                echo"</thead>";
                                echo"<tbody>";

                                 while ($row = $resultadoexpedientes->fetch_assoc())
                                {
                                       $id = $row['IdConsulta'];
                                     $idp = $row['IdPersona'];
                                     echo"<tr>";
                                     echo"<td>".$row['IdConsulta']."</td>";
                                     echo"<td>".$row['Medico']."</td>";
                                     echo"<td>".$row['Paciente']."</td>";
                                     echo"<td>".$row['Fecha']."</td>";
                                     echo"<td><div id='btn$id' class='btn-exp'><span class='btn btn-info'> Ingresar Consulta <i  class='fa fa-search'></i></span></div>
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

            <form id="frm" action="medico_consulta_paciente.php" method="post" class="hidden">
              <input type="text" id="IdConsulta" name="IdConsulta" />
            </form>


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


<script type="text/javascript">
    $(document).ready(function(){

        $(".btn-exp").click(function(){
            var id = $(this).attr("id").replace("btn","");
            //var idp = $(this).attr("id").replace("btn","");
            $("#IdConsulta").val(id);
          //  $("#IdPersona").val(idp);
           $("#frm").submit();
        });
    });

</script>
