<?php
session_start();
include '../include/dbconnect.php';


if (!empty($_SESSION['user']))
  {

  $idlistaexamen = $_POST['txtListaExamen'];
  $idpersona = $_POST['txtPersona'];

$querymedicamentos = "SELECT le.IdListaExamen, CONCAT(u.Nombres,' ', u.Apellidos) As 'Medico', CONCAT(p.Nombres,' ', p.Apellidos) As 'Paciente',te.NombreExamen,

  eo.Fecha As 'ExamenOrinaFecha', eo.Color As 'ExamenOrinaColor', eo.Olor As 'ExamenOrinaOlor',
    eo.Aspecto As 'ExamenOrinaAspecto', eo.Densidad As 'ExamenOrinaDendisdad', eo.Ph As 'ExamenOrinaPh',
    eo.Proteinas As 'ExamenOrinaProteinas', eo.Glucosa As 'ExamenOrinaGlucosa', eo.SagreOculta As 'ExamenOrinaSangreOculta',
    eo.CuerposCetomicos As 'ExamenOrinaCuerposCetomicos', eo.Urobilinogeno As 'ExamenOrinaUrobilinogeno',
    eo.Bilirrubina As 'ExamenOrinaBilirrubina', eo.EsterasaLeucocitaria As 'ExamenOrinaEsterasaLeucocitaria',
    eo.Cilindros As 'ExamenOrinaCilindros', eo.Hematies As 'ExamenOrinaHematies', eo.Leucocitos As 'ExamenOrinaLeucocitos',
    eo.CelulasEpiteliales As 'ExamenOrinaCelulasEpiteliales', eo.ElementosMinerales As 'ExamenOrinaElementosMinerales',
    eo.Parasitos As 'ExamenOrinaParasitos', eo.Observaciones As 'ExamenOrinaObservaciones'
    
FROM listaexamen le
INNER JOIN usuario u ON le.IdUsuario = u.IdUsuario
INNER JOIN persona p ON le.IdPersona = p.IdPersona
INNER JOIN consulta c ON le.IdConsulta = c.IdConsulta
INNER JOIN tipoexamen te ON le.IdTipoExamen = te.IdTipoExamen
LEFT JOIN examenorina eo ON le.IdListaExamen = eo.IdListaExamen
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
                      <td><label>Medico:</label> </td><td>".$row['Medico']."</td>
                      </tr>
                      <tr>
                      <td><label>Paciente:</label> &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp </td><td>".$row['Paciente']."</td>
                      </tr>
                      <tr>
                      <td><label>Fecha:</label> </td><td>".$row['ExamenOrinaFecha']."</td>
                      </tr>
                      <tr>
                        <td><label>Color:</label> </td><td>".$row['ExamenOrinaColor']."</td>
                      </tr>
                      <tr>
                        <td><label>Olor:</label> </td><td>".$row['ExamenOrinaOlor']."</td>
                      </tr>
                      <tr>
                        <td><label>Aspecto:</label> </td><td>".$row['ExamenOrinaAspecto']."</td>
                      </tr>
                      <tr>
                        <td><label>Densidad:</label> </td><td>".$row['ExamenOrinaDendisdad']."</td>
                      </tr>
                      <tr>
                        <td><label>PH:</label> </td><td>".$row['ExamenOrinaPh']."</td>
                      </tr>
                      <tr>
                        <td><label>Proteinas:</label> </td><td>".$row['ExamenOrinaProteinas']."</td>
                      </tr>
                      <tr>
                        <td><label>Glucosa:</label> </td><td>".$row['ExamenOrinaGlucosa']."</td>
                      </tr>
                      <tr>
                        <td><label>Sangre Oculta:</label> </td><td>".$row['ExamenOrinaSangreOculta']."</td>
                      </tr>
                      <tr>
                        <td><label>Cuerpos cetomicos:</label> </td><td>".$row['ExamenOrinaCuerposCetomicos']."</td>
                      </tr>
                      <tr>
                        <td><label>Urobilinogeno:</label> </td><td>".$row['ExamenOrinaUrobilinogeno']."</td>
                      </tr>
                      <tr>
                        <td><label>Bilirrubina:</label> </td><td>".$row['ExamenOrinaBilirrubina']."</td>
                      </tr>
                      <tr>
                        <td><label>Esterasa Leucocitaria:</label> &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp </td><td>".$row['ExamenOrinaEsterasaLeucocitaria']."</td>
                      </tr>
                      <tr>
                        <td><label>Cilindros:</label> </td><td>".$row['ExamenOrinaCilindros']."</td>
                      </tr>
                      <tr>
                        <td><label>Hematies:</label> </td><td>".$row['ExamenOrinaHematies']."</td>
                      </tr>
                      <tr>
                        <td><label>Leucocitos:</label> </td><td>".$row['ExamenOrinaLeucocitos']."</td>
                      </tr>
                      <tr>
                        <td><label>Celulas Epiteliales:</label> </td><td>".$row['ExamenOrinaCelulasEpiteliales']."</td>
                      </tr>
                      <tr>
                        <td><label>Elementos Minerales:</label> </td><td>".$row['ExamenOrinaElementosMinerales']."</td>
                      </tr>
                      <tr>
                        <td><label>Parasitos:</label> </td><td>".$row['ExamenOrinaParasitos']."</td>
                      </tr>
                      <tr>
                        <td><label>Observaciones:</label> </td><td>".$row['ExamenOrinaObservaciones']."</td>
                      </tr>
                ";
              }
              echo "</table>";?>
                  <div class="col-md-1">
              <form action = 'reporte_examen_orina_pdf.php' method = 'POST'>
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