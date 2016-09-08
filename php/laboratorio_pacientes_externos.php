<?php

include '../include/dbconnect.php';
session_start();

if (!empty($_SESSION['user']))
  {
    $queryexpedientes = "SELECT p.IdPersona, CONCAT(p.Nombres,  ' ', p.Apellidos) as NombreCte, p.FechaNacimiento, p.Genero, p.Direccion , e.NombreEstado as Estado  FROM persona p
    INNER JOIN estado e on p.IdEstado = e.IdEstado 
    WHERE p.IdEstado = 3
    order by Nombres ASC";
    $resultadoexpedientes = $mysqli->query($queryexpedientes);

    $querytipoexamen = "SELECT IdTipoExamen, NombreExamen FROM tipoexamen";
    $resultadotipoexamen = $mysqli->query($querytipoexamen);


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
            Pacientes Externos Activos
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
                  <table id="example2   " class="table table-bordered table-hover">
                    <?php
                            echo"<thead>";
                                echo"<tr>";
                                echo"<th>Nombre del Paciente</th>";
                                echo"<th>Fecha de Nacimiento</th>";
                                echo"<th>Genero</th>";
                                echo"<th>Direccion</th>";
                                echo"<th>Acccion</th>";
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
                                 echo "<td>".
                                          "<span id='btn".$id."' class='btn btn-success btn-mdl'>Ingresar Examenes</span>".
                                          "</td>";
                                 echo"</body>  ";
                            }
                      ?>

                  </table>


    

                </div>

                <!-- MODAL GUARDAR EXAMENES -->
                             <div class="example-modal modal fade" id="modalGuardarExamenes">
                                 <div class="modal">
                                     <div class="modal-dialog modal-md">
                                         <div class="modal-content">
                                             <form class="form-horizontal" method="POST" action="laboratorio_guardar_examen.php"  id="demo-form1" data-parsley-validate="">
                                                 <div class="modal-header">
                                                     <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                         <span aria-hidden="true">&times;</span></button>
                                                     <h4 class="modal-title">Examenes para: <?php echo $row['NombreCte'] ?></h4>
                                                 </div>
                                                 <div class="modal-body ">

                                                     <div class="form-group">
                                                         <label for="inputEmail3" class="col-sm-2 control-label">Examenes</label>
                                                         <div class="col-sm-9">
                                                             <div class="input-group">
                                                                 <div class="input-group-addon">
                                                                     <i class="fa fa-user"></i>
                                                                 </div>
                                                                 <select class="form-control select2" style="width: 100%;"  name="cboTipoExamen">
                                                                     <?php
                                                                     while ($row = $resultadotipoexamen->fetch_assoc()) {
                                                                         echo "<option value = '" . $row['IdTipoExamen'] . "'>" . $row['NombreExamen'] . "</option>";
                                                                     }
                                                                     ?>
                                                                 </select>
                                                             </div>
                                                         </div>
                                                     </div>
                                                     <div class="form-group">
                                                         <label for="inputEmail3" class="col-sm-2 control-label">Indicaciones</label>
                                                         <div class="col-sm-9">
                                                             <div class="input-group">
                                                                 <div class="input-group-addon">
                                                                     <i class="fa fa-user"></i>
                                                                 </div>
                                                                 <textarea  type="text" rows="4" class="form-control"   name="txtIndicacion"></textarea>
                                                             </div>
                                                         </div>
                                                         <div class="hidden">
                                                             <textarea type="text" rows="4" class="form-control"  id="IdPersona" name="txtpersonaID">  </textarea>
                                                         </div>
                                                        <div class="hidden">
                                                             <textarea type="text" rows="4" class="form-control"   name="txtUsuarioID"> <?php echo $_SESSION['IdUsuario'] ?>  </textarea>
                                                         </div>
                                                         <div class="col-sm-9">
                                                         </div>
                                                     </div>
                                                     <div class="form-group">
                                                         <label for="inputEmail3" class="col-sm-2 control-label"></label>
                                                         <div class="col-sm-9">
                                                         </div>
                                                     </div>
                                                     <div class="form-group">
                                                         <label for="inputEmail3" class="col-sm-2 control-label"></label>
                                                         <div class="col-sm-9">
                                                         </div>
                                                     </div>
                                                 </div>
                                                 <div class="modal-footer">
                                                     <div class="col-sm-2">
                                                         <button type="button" class="btn btn-danger pull-left" id="btn-cerrarmodal" data-dismiss="modal" >Cerrar</button>
                                                     </div> 
                                                     <div class="col-sm-3">
                                                     </div>
                                                     <div class="col-sm-3">
                                                         <button type="submit" class="btn btn-primary" name="guardarIndicador" >Guardar Cambios</button>
                                                     </div>
                                                     </form>
                                                    <div class="col-sm-3">
                                                    <form class="form-horizontal" method="POST" action="laboratorio_finalizar_externo.php">
                                                     <div class="hidden">
                                                        <textarea type="text" rows="4" class="form-control"  id="IdPersonas" name="txtpersonaIDs">  </textarea>
                                                         </div>
                                                     <button type="submit" class="btn btn-warning" name="" >Finalizar Consulta</button>
                                                     </form>
                                                     </div>
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

        $(".btn-mdl").click(function(){
            var id = $(this).attr("id").replace("btn","");
            $("#IdPersona").val(id);
            $("#IdPersonas").val(id);
            $("#modalGuardarExamenes").modal("show");
            //$("#frm").submit();
        });
    });

</script>
