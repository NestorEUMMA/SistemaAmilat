<?php
session_start();
include '../include/dbconnect.php';


if (!empty($_SESSION['user']))
  {

      $idlistaexamen = $_POST['txtListaExamen'];
      $idpersona = $_POST['txtPersona'];
  

$querymedicamentos = "SELECT le.IdListaExamen, CONCAT(u.Nombres,' ', u.Apellidos) As 'Medico', CONCAT(p.Nombres,' ', p.Apellidos) As 'Paciente',te.NombreExamen,
    eh.Fecha As 'ExamenHecesFecha', eh.Color As 'ExamenHecesColor', eh.Consistencia As 'ExamenHecesConsistencia',
    eh.Mucus As 'ExamenHecesMucus', eh.Hematies As 'ExamenHecesHematies', eh.Leucocitos As 'ExamenHecesLeucocitos',
    eh.RestosAlimenticios As 'ExamenHecesRestosAlimenticios', eh.Macrocopicos As 'ExamenHecesMacrocopios',
    eh.Microscopicos As 'ExamenHecesMicroscopicos', eh.FloraBacteriana As 'ExamenHecesFlora',
    eh.Otros As 'ExamenHecesOtros', eh.PActivos As 'ExamenHecesPActivos', eh.PQuistes As 'ExamenHecesPQuistes'
    
    FROM listaexamen le
    INNER JOIN usuario u ON le.IdUsuario = u.IdUsuario
    INNER JOIN persona p ON le.IdPersona = p.IdPersona
    INNER JOIN consulta c ON le.IdConsulta = c.IdConsulta
    INNER JOIN tipoexamen te ON le.IdTipoExamen = te.IdTipoExamen
    LEFT JOIN examenheces eh ON le.IdListaExamen = eh.IdListaExamen
    WHERE le.IdListaExamen =$idlistaexamen";
    $resultadomedicamentos = $mysqli->query($querymedicamentos);


?>

<!DOCTYPE html>
<html>
<head>
<style>
label{
  font-weight: bold;
}
</style>
</head>

   <?php  include '../include/asset.php'; ?>
   <body class="hold-transition skin-blue sidebar-mini">
    <!-- Site wrapper -->
    <div class="wrapper">

 

     <?php include '../include/header.php'; ?>
      <?php include '../include/aside.php'; ?>

      <!-- =============================================== -->

      <!-- Content Wrapper. Contains page content -->
     
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
              <h3 class="box-title">Resultado de Examen de Heces</h3>
            </div><!-- /.box-header -->
                <div class="box-body">

                <table class="table table-bordered table-hover" >
                   <?php
                    while ($row = $resultadomedicamentos->fetch_assoc()) {
                    echo "
                  
                    <tr>
                  <td><label>Nombre: </label></td><td>".$row['Medico']."</td>
                  </tr>
                  <tr>
                  <td><label>Paciente: </label>:&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp </td> <td>".$row['Paciente']."</td>
                  </tr>
                  <tr>
                  <td><label>Fecha: </label> </td><td>".$row['ExamenHecesFecha']."</td>
                  </tr>
                  <tr>
                    <td><label>Color:</label> </td><td>".$row['ExamenHecesColor']."</td>
                  </tr>
                  <tr>
                    <td><label>Consistencia:</label> </td><td>".$row['ExamenHecesConsistencia']."</td>
                  </tr>
                  <tr>
                    <td><label>Mucus:</label> </td><td>".$row['ExamenHecesMucus']."</td>
                  </tr>
                  <tr>
                    <td><label>Hematies:</label> </td><td>".$row['ExamenHecesHematies']."</td>
                  </tr>
                  <tr>
                    <td><label>Leucocitos:</label> </td><td>".$row['ExamenHecesLeucocitos']."</td>
                  </tr>
                  <tr>
                    <td><label>Restos Alimenticios:</label>&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp </td><td>".$row['ExamenHecesRestosAlimenticios']."</td>
                  </tr>
                  <tr>
                    <td><label>Macrocopicos:</label> </td><td>".$row['ExamenHecesMacrocopios']."</td>
                  </tr>
                  <tr>
                    <td><label>Macricroscopios:</label> </td><td>".$row['ExamenHecesMicroscopicos']."</td>
                  </tr>
                  <tr>
                    <td><label>Flora Bacteriana:</label> </td><td>".$row['ExamenHecesFlora']."</td>
                  </tr>
                  <tr>
                    <td><label>Otros:</label> </td><td>".$row['ExamenHecesOtros']."</td>
                  </tr>
                  <tr>
                    <td><label>PActivos:</label> </td><td>".$row['ExamenHecesPActivos']."</td>
                  </tr>
                  <tr>
                    <td><label>PQuistes:</label> </td><td>".$row['ExamenHecesPQuistes']."</td>
                  </tr>
                ";
              }
              echo "</table>";?>
                  <div class="col-md-1">
              <form action = 'reporte_examen_heces_pdf.php' method = 'POST'>
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