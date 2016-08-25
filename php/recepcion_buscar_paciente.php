<?php

include '../include/dbconnect.php';
session_start();

if (!empty($_SESSION['user']))
  {
    $queryexpedientes = "SELECT p.IdPersona, CONCAT(p.Nombres,  ' ', p.Apellidos) as NombreCte, p.FechaNacimiento, p.Genero, p.Direccion , e.NombreEstado as Estado  FROM persona p
    INNER JOIN estado e on p.IdEstado = e.IdEstado 
    order by Nombres ASC";
    $resultadoexpedientes = $mysqli->query($queryexpedientes);

    $queryestado = " SELECT * FROM estado limit 1,2 ";
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
                                echo"<th>Estado</th>";
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
                                 echo"<td>".$row['Estado']."</td>";
                                 if($row['Estado'] == 'Consulta'){
                                  echo"<td><div id='btn$id' class='btn-exp'><span disabled='disabled' class='btn  btn-info' data-toggle='modal' data-target='#modalConsulta'> ESTADO: INICIANDO PROCESO <i class='fa fa-heartbeat  '></i></span></div></td>";

                                 }
                                 elseif ($row['Estado'] == 'Signos Vitales') {
                                   echo"<td><div id='btn$id' class='btn-exp'><span disabled='disabled' class='btn  btn-warning' data-toggle='modal' data-target='#modalConsulta'> ESTADO: SIGNOS VITALES <i class='fa fa-heartbeat  '></i></span></div></td>";

                                 }
                                 elseif ($row['Estado'] == 'Consulta Medica') {
                                   echo"<td><div id='btn$id' class='btn-exp'><span disabled='disabled' class='btn  btn-danger' data-toggle='modal' data-target='#modalConsulta'> ESTADO CONSULTA MEDICA <i class='fa fa-heartbeat  '></i></span></div></td>";

                                 }
                                elseif ($row['Estado'] == 'Examenes Laboratorio') {
                                   echo"<td><div id='btn$id' class='btn-exp'><span disabled='disabled' class='btn  btn-danger' data-toggle='modal' data-target='#modalConsulta'> ESTADO CONSULTA MEDICA <i class='fa fa-heartbeat  '></i></span></div></td>";

                                 }
                                 else{
                                 echo"<td><div id='btn$id' class='btn-exp'><span class='btn  btn-success' data-toggle='modal' data-target='#modalConsulta'> INICIAR CONSULTA <i class='fa fa-heartbeat  '></i></span></div></td>";
                                 echo"</tr>"; 
                                 }
                                 
                                 echo"</body>  ";
                            }
                      ?>

                  </table>


                  <div class="example-modal modal fade" id="modalConsulta">
                    <div class="modal">
                      <div class="modal-dialog modal-md">
                        <div class="modal-content">
                        <form class="form-horizontal" action="recepcion_actualizar_estado.php"  role="form" method="POST" id="demo-form1" data-parsley-validate="">
                              <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title">Asignar Consulta</h4>
                              </div>
                              <div class="modal-body ">
                              <div class="form-group">
                                <div class="col-sm-5"><input type="text" id="IdPersona" hidden="hidden" name="IdPersona"></div>
                              </div>
                              <div class="form-group">
                                <div class="col-sm-1"></div>
                                <div class="col-sm-3"><label for="inputEmail3" class="control-label">Estado</label></div>
                                    <div class="col-sm-5">
                                      <select class="form-control" style="width: 100%;" name="cboEstado" required="">
                                       <?php
                                          while ($row = $resultadoestado->fetch_assoc()) {
                                            echo "<option value = '".$row['IdEstado']."'>".$row['NombreEstado']."</option>";
                                          }
                                        ?>
                                      </select>
                                  </div>
                              </div>
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-danger pull-left" id="btn-cerrarmodal" data-dismiss="modal" >Cerrar</button>
                                <button type="submit" class="btn btn-primary" name="guardarIndicador" >Guardar Cambios</button>
                              </div>
                          </form>
                        </div>
                      </div>
                      </div>
                  </div>

                </div>
        </div>
        </div>
        </div>

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
            //$("#frm").submit();
        });
    });

</script>
