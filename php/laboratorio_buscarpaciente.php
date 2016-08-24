<?php

include '../include/dbconnect.php';
session_start();

if (!empty($_SESSION['user']))
  {
    $queryexpedientes = "SELECT p.IdPersona, CONCAT(p.Nombres,  ' ', p.Apellidos) as NombreCte, p.FechaNacimiento, p.Genero, p.Direccion , e.NombreEstado as Estado  FROM persona p
    INNER JOIN estado e on p.IdEstado = e.IdEstado order by Nombres ASC";
    $resultadoexpedientes = $mysqli->query($queryexpedientes);

    $queryestado = " SELECT * FROM estado ";
    $resultadoestado = $mysqli->query($queryestado);

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
            Reportes
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
              <h3 class="box-title">Busqueda de Pacientes</h3>
            </div><!-- /.box-header -->
                <div class="box-body">
                  <table id="example1" class="table table-bordered table-hover">
                    <?php
                            echo"<thead>";
                                echo"<tr>";
                                echo"<th>Nombre Completo del Paciente</th>";
                                echo"<th>Fecha de Nacimiento</th>";
                                echo"<th>Genero</th>";
                                echo"<th>Direccion</th>";
                                echo"<th>Accion</th>";
                                echo"</tr>";
                            echo"</thead>";
                            echo"<tbody>";

                             while ($row = $resultadoexpedientes->fetch_assoc())
                            {
                                 $id = $row['IdPersona'];
                                 echo"<tr>";
                                 echo"<td>".$row['NombreCte']."</td>";
                                 echo"<td>".$row['FechaNacimiento']."</td>";
                                 echo"<td>".$row['Genero']."</td>";
                                 echo"<td>".$row['Direccion']."</td>";
                                 echo"<td><div id='btn$id' class='btn-exp'><span class='btn btn-info'> Ver Examenes <i class='fa fa-search'></i></span></div>
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

        <form id="frm" action="laboratorio_buscarlistaexamen.php" method="post" class="hidden">
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