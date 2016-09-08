<?php
session_start();
include '../include/dbconnect.php';


if (!empty($_SESSION['user']))
  {

    $idlistaexamen = $_POST['txtListaExamen'];
    $idpersona = $_POST['txtPersona'];

 $querymedicamentos = "SELECT le.IdListaExamen, CONCAT(u.Nombres,' ', u.Apellidos) As 'Medico', CONCAT(p.Nombres,' ', p.Apellidos) As 'Paciente',
  te.NombreExamen, ehe.Fecha As 'ExamenHemogramaFecha', ehe.GlobulosRojos As 'ExamenHemogramaGlobulosRojos', ehe.Hemoglobina As 'ExamenHemogramaHemoglobina', 
    ehe.Hematocrito As 'ExamenHemogramaHematocrito', ehe.Vgm As 'ExamenHemogramaVgm', ehe.Hcm As 'ExamenHemogramaHcm', ehe.Chcm As 'ExamenHemogramaChcm', 
    ehe.Leucocitos As 'ExamenHemogramaLeucocitos', ehe.NeutrofilosEnBanda As 'ExamenHemogramaNeutrofilos', ehe.Linfocitos As 'ExamenHemogramaLinfocitos', 
    ehe.Monocitos As 'ExamenHemogramaMonocitos', ehe.Eosinofilos As 'ExamenHemogramaEosinofilos', ehe.Basofilos As 'ExamenHemogramaBasofilos', 
    ehe.Plaquetas As 'ExamenHemogramaPlaquetas', ehe.Eritrosedimentacion As 'ExamenHemogramaEritrosedimentacion', ehe.Otros As 'ExamenHemogramaOtros', 
    ehe.NeutrofilosSegmentados As 'ExamenHemogramaNeutrofilosSegmentados'
    FROM listaexamen le
    INNER JOIN usuario u ON le.IdUsuario = u.IdUsuario
    INNER JOIN persona p ON le.IdPersona = p.IdPersona
    LEFT JOIN consulta c ON le.IdConsulta = c.IdConsulta
    INNER JOIN tipoexamen te ON le.IdTipoExamen = te.IdTipoExamen
    LEFT JOIN examenhemograma ehe ON le.IdListaExamen = ehe.IdListaExamen
    WHERE le.IdListaExamen = $idlistaexamen ";
$resultadomedicamentos = $mysqli->query($querymedicamentos);


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
      <div class="content-wrapper">
      
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
              <h3 class="box-title">Resultado de Examen Hemograma</h3>
            </div><!-- /.box-header -->
                <div class="box-body">

                <table class="table table-bordered table-hover" >
                   <?php
                    while ($row = $resultadomedicamentos->fetch_assoc()) {
                    echo "
                  
                  <tr>
                  <td><label>Nombre:</label> </td><td>".$row['Medico']."</td>
                  </tr>
                  <tr>
                  <td><label>Paciente:</label> &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp </td><td>".$row['Paciente']."</td>
                  </tr>
                  <tr>
                  <td><label>Fecha:</label> </td><td>".$row['ExamenHemogramaFecha']."</td>
                  </tr>
                  <tr>
                    <td><label>Globulos Rojos:</label> </td><td>".$row['ExamenHemogramaGlobulosRojos']."</td><td><label>X mm3</label> </td>
                  </tr>
                  <tr>
                    <td><label>Hemoglobina:</label> </td><td>".$row['ExamenHemogramaHemoglobina']."</td><td><label>Gr/dl</label> </td>
                  </tr>
                  <tr>
                    <td><label>Hematocrito:</label> </td><td>".$row['ExamenHemogramaHematocrito']."</td><td><label>%</label> </td>
                  </tr>
                  <tr>
                    <td><label>Vgm:</label> </td><td>".$row['ExamenHemogramaVgm']."</td><td><label>Micras cubicas</label> </td>
                  </tr>
                  <tr>
                    <td><label>Hcm:</label> </td><td>".$row['ExamenHemogramaHcm']."</td><td><label>Micro microgramos</label> </td>
                  </tr>
                  <tr>
                    <td><label>Chcm:</label> </td><td>".$row['ExamenHemogramaChcm']."</td><td><label>%</label> </td>
                  </tr>
                  <tr>
                    <td><label>Leucocitos:</label> </td><td>".$row['ExamenHemogramaLeucocitos']."</td><td><label>Xmm3</label> </td>
                  </tr>
                  <tr>
                    <td><label>Neutrofilos Segmentados:</label> </td><td>".$row['ExamenHemogramaNeutrofilosSegmentados']."</td><td><label>%</label> </td>
                  </tr>
                  <tr>
                    <td><label>Neutrofilos En Banda:</label> </td><td>".$row['ExamenHemogramaNeutrofilos']."</td><td><label>%</label> </td>
                  </tr>
                  <tr>
                    <td><label>Linfocitos:</label> </td><td>".$row['ExamenHemogramaLinfocitos']."</td><td><label>%</label> </td>
                  </tr>
                  <tr>
                    <td><label>Monocitos:</label> </td><td>".$row['ExamenHemogramaMonocitos']."</td><td><label>%</label> </td>
                  </tr>
                  <tr>
                    <td><label>Eosinofilos:</label> </td><td>".$row['ExamenHemogramaEosinofilos']."</td><td><label>%</label> </td>
                  </tr>
                  <tr>
                    <td><label>Basofilos:</label> </td><td>".$row['ExamenHemogramaBasofilos']."</td><td><label>%</label> </td>
                  </tr>
                  <tr>
                    <td><label>Plaquetas:</label> </td><td>".$row['ExamenHemogramaPlaquetas']."</td><td><label>X mm3</label> </td>
                  </tr>
                  <tr>
                    <td><label>Eritrosedimentacion:</label> </td><td>".$row['ExamenHemogramaEritrosedimentacion']."</td><td><label>mm/h</label> </td>
                  </tr>
                  <tr>
                    <td><label>Otros:</label> </td><td>".$row['ExamenHemogramaOtros']."</td>
                  </tr>
                  
                ";
              }
              echo "</table>";?>
                  <div class="col-md-1">
              <form action = 'reporte_examen_hemograma_pdf.php' method = 'POST'>
              <input type = 'hidden' name = 'idlistaexamen' value ="<?php echo $idlistaexamen; ?>" >
              <input type = 'submit' value = 'Imprimir' class = 'btn btn-warning'>
              </form> 
              </div>
              <div class="col-md-1">
              <button class='btn btn-success btn-exp'> Regresar </button>
              </div>
        </div>
        </div>
        </div>

         <form id="frm" action="laboratorio_buscarlistaexamen.php" method="post" class="hidden">
          <input type="text" id="IdPersona" name="IdPersona" value="<?php echo $idpersona; ?>" />
        </form>


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
<script>
function agregar(){


  jQuery.post('operaciones.php', {action: 1}, function(data) {

                var valor = $('#mytabla >tbody >tr').length;
              
                var tabla = "<tr><td><select name='id_medicamento_"+valor+"'>";
                var items = "";

                $.each(data, function(index, med) {

                    // agregamos opciones al combo
                    items = items+'<option value="'+ med.IdMedicamento +'">' + med.NombreMedicamento + '</option>';

                });

                 var total = tabla+items+"</select></td></tr>";

                  $('#medicamentos').append(total);

                  $("#cuenta").val($('#mytabla >tbody >tr').length);

  },'JSON');

 

}

  $(document).ready(function(){

        $(".btn-exp").click(function(){
            $("#frm").submit();
        });
    });

</script>