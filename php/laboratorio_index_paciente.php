<?php

include '../include/dbconnect.php';
session_start();

if (!empty($_SESSION['user']))
  {
    $queryexamenesactivos = "SELECT le.IdListaExamen As 'IdListaExamen', c.IdConsulta As 'Consulta', CONCAT(u.Nombres,' ', u.Apellidos) As 'Medico', CONCAT(p.Nombres,' ', p.Apellidos) As 'Paciente', te.IdTipoExamen As IdTipoExamen, te.NombreExamen As 'Examen', le.Activo
                          FROM listaexamen le
                          INNER JOIN usuario u ON le.IdUsuario = u.IdUsuario
                          INNER JOIN persona p ON le.IdPersona = p.IdPersona
                          INNER JOIN consulta c ON le.IdConsulta = c.IdConsulta
                          INNER JOIN tipoexamen te ON le.IdTipoExamen = te.IdTipoExamen
                          WHERE le.Activo = 1
                          order by Paciente ASC
                          ";
    $resultadoexamenesactivos = $mysqli->query($queryexamenesactivos);

    

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
              <h3 class="box-title">Examenes Pendientes a Pacientes</h3>
            </div><!-- /.box-header -->
                <div class="box-body">
                  <table id="example2" class="table table-bordered table-hover">
                    <?php
                            echo"<thead>";
                                echo"<tr>";
                                echo"<th>Medico</th>";
                                echo"<th>Paciente</th>";
                                echo"<th>Examen</th>";
                                echo"<th>Accion</th>";
                                echo"</tr>";
                            echo"</thead>";
                            echo"<tbody>";

                             while ($row = $resultadoexamenesactivos->fetch_assoc())
                            {
                                 $idlistaexamen = $row['IdListaExamen'];
                                 echo"<tr>";
                                 echo"<td>".$row['Medico']."</td>";
                                 echo"<td>".$row['Paciente']."</td>";
                                 echo"<td>".$row['Examen']."</td>";
                                 echo "<td>".
                                        "<span id='btn".$idlistaexamen."' class='btn btn-xs btn-success btn-mdl'>Seleccionar Examen</span>".
                                        "</td>";
                                 echo"</tr>";
                                 echo"</body>  ";
                            }
                              ?>
                  </table>
                </div>
        </div>
        </div>
        </div>

        <form id="frm1" action="modulo_laboratorio/examen_hemograma.php" class='hidden' method="post">
           <!-- <input type="text" id="IdPersona" name="txtPersona"/>
           <input type="text" id="IdUsuario" name="txtUsuario"/>
           <input type="text" id="IdConsulta" name="txtConsulta"/>
           <input type="text" id="IdTipoExamen" name="txtTipoExamen"/> -->
           <input type="text" id="IdListaExamen" name="txtListaExamen"/>
        </form>
        <form id="frm2" action="modulo_laboratorio/examen_heces.php" class='hidden' method="post">
           <!-- <input type="text" id="IdPersona" name="txtPersona"/>
           <input type="text" id="IdUsuario" name="txtUsuario"/>
           <input type="text" id="IdConsulta" name="txtConsulta"/>
           <input type="text" id="IdTipoExamen" name="txtTipoExamen"/> -->
           <input type="text" id="IdListaExamen2" name="txtListaExamen"/>
        </form>
        <form id="frm3" action="modulo_laboratorio/examen_orina.php" class='hidden' method="post">
           <!-- <input type="text" id="IdPersona" name="txtPersona"/>
           <input type="text" id="IdUsuario" name="txtUsuario"/>
           <input type="text" id="IdConsulta" name="txtConsulta"/>
           <input type="text" id="IdTipoExamen" name="txtTipoExamen"/> -->
           <input type="text" id="IdListaExamen3" name="txtListaExamen"/>
        </form>
        <form id="frm4" action="modulo_laboratorio/examen_quimica.php" class='hidden' method="post">
           <!-- <input type="text" id="IdPersona" name="txtPersona"/>
           <input type="text" id="IdUsuario" name="txtUsuario"/>
           <input type="text" id="IdConsulta" name="txtConsulta"/>
           <input type="text" id="IdTipoExamen" name="txtTipoExamen"/> -->
           <input type="text" id="IdListaExamen4" name="txtListaExamen"/>
        </form>
        <form id="frm5" action="modulo_laboratorio/examenes_varios.php" class='hidden' method="post">
           <!-- <input type="text" id="IdPersona" name="txtPersona"/>
           <input type="text" id="IdUsuario" name="txtUsuario"/>
           <input type="text" id="IdConsulta" name="txtConsulta"/>
           <input type="text" id="IdTipoExamen" name="txtTipoExamen"/> -->
           <input type="text" id="IdListaExamen5" name="txtListaExamen"/>
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
    $(".btn-mdl").click(function(){
          var id = $(this).attr("id").replace("btn","");

          var myData  = {"id":id};
          //alert(myData);
          $.ajax({
              url   : "laboratorio_cargar_form.php",
              type  :  "POST",
              data  :   myData,
              dataType : "JSON",
              beforeSend : function(){
                  $(this).html("Cargando");
              },
              success : function(data){
                  //$("#IdPersona").val(data.Paciente);
                  //$("#IdUsuario").val(data.Medico);
                  //$("#IdConsulta").val(data.Consulta);
                  //$("#IdTipoExamen").val(data.Examen);
                  $("#IdListaExamen").val(data.ListaExamen);
                  $("#IdListaExamen2").val(data.ListaExamen);
                  $("#IdListaExamen3").val(data.ListaExamen);
                  $("#IdListaExamen4").val(data.ListaExamen);
                  $("#IdListaExamen5").val(data.ListaExamen);

                  if(data.Examen == 1){
                  //alert('Este es un Examen Hemograma');
                    $("#frm1").submit();
                  }
                  else if (data.Examen == 2) {
                    //alert('Este es un Examen Heces');
                    $("#frm2").submit();
                  }
                  else if (data.Examen == 3) {  
                   //alert('Este es un Examen Orina');
                    $("#frm3").submit();
                  }
                  else if (data.Examen == 4) {
                    //alert('Este es un Examen Quimica');
                    $("#frm4").submit();
                  }
                  else {
                    //alert('Este es un Examen Varios');
                    $("#frm5").submit();
                  }
              }
          });
      });
    });

</script>
