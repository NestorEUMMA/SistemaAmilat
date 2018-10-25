<?php

include '../include/dbconnect.php';
session_start();

if (!empty($_SESSION['user']))
  {

    $idpersona = $_POST['idpersona'];

          $queryconsultas = " SELECT CONCAT(A.Nombres, ' ',A.Apellidos) as 'NOMBRE', A.Genero as 'GENERO', A.FechaNacimiento as 'FECHA_NACIMIENTO', 
          G.Nombre as 'GEOGRAFIA' ,A.Dui as 'DUI', A.Direccion as 'DIRECCION', A.Correo as 'CORREO', B.Nombre as 'ESTADO_CIVIL', A.Telefono as 'TELEFONO', 
          A.Celular as 'CELULAR', A.Medicamentos as 'MEDICAMENTO', A.Alergias as 'ALERGIAS', A.Enfermedad as 'ENFERMEDAD', 
          CONCAT(A.NombresResponsable,' ',A.ApellidosResponsable) as 'RESPONSABLE', A.Parentesco as 'PARENTESCO', A.TelefonoResponsable as 'TELEFONO_RESPONSABLE'
          FROM persona as A
          INNER JOIN geografia as G on G.IdGeografia = A.IdGeografia
          LEFT JOIN estadocivil as B on  B.IdEstadoCivil = A.IdEstadoCivil
          WHERE A.IdPersona = $idpersona";
          $resultadoconsultas = $mysqli->query($queryconsultas);
          while ($test = $resultadoconsultas->fetch_assoc()) 
          {
            $nombre = $test['NOMBRE'];
            $genero = $test['GENERO'];
            $fNacimiento = $test['FECHA_NACIMIENTO'];
            $dui = $test['DUI'];
            $geografia = $test['GEOGRAFIA'];
            $direccion = $test['DIRECCION'];
            $correo = $test['CORREO'];
            $estadocivil = $test['ESTADO_CIVIL'];
            $telefono = $test['TELEFONO'];
            $celular = $test['CELULAR'];
            $medicamento = $test['MEDICAMENTO'];
            $alergias = $test['ALERGIAS'];
            $enfermedad = $test['ENFERMEDAD'];
            $parentesco = $test['PARENTESCO'];
            $responsable = $test['RESPONSABLE'];
            $telefono_responsable = $test['TELEFONO_RESPONSABLE'];
            $date = date("Y-m-d ");
            $dates = date("Y");

          }


    

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
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Reportes
        <small>Ficha de Expediente</small>
      </h1>
      <ol class="breadcrumb">
        
      </ol>
    </section>

    <div class="pad margin no-print">
      <div class="callout callout-info" style="margin-bottom: 0!important;">
        <h4><i class="fa fa-info"></i> Nota:</h4>
        Dar Click en el boton de Imprimir.
      </div>
    </div>

    <!-- Main content -->
    <section class="invoice">
      <!-- title row -->
      <div class="row">
        <div class="col-xs-12">
          <h2 class="page-header">
            <i class="fa fa-globe"></i> Centro Medico Asistencial Shalom</br></br>
            <i class="fa fa-user"></i> Datos Personales
            <small class="pull-right">Fecha <?php echo $date; ?> </small>
          </h2>
        </div>
        <!-- /.col -->
      </div>
      <!-- info row -->
      <div class="row invoice-info">
        <div class="col-sm-4 invoice-col">
         <strong> DATOS PERSONALES </strong>
          <address>
            <strong>Paciente:</strong> <?php echo $nombre; ?><br>
            <strong>Genero: </strong> <?php echo $genero; ?><br>
           <strong> Fecha de Nacimiento: </strong> <?php echo $fNacimiento; ?><br>
           <strong> Dui: </strong> <?php echo $dui; ?> <br>
           <strong> Estado Civil: </strong> <?php echo $estadocivil; ?> <br>
           <strong> Departamento: </strong> <?php echo $geografia; ?> <br>
           <strong> Direccion: </strong> <?php echo $direccion; ?> <br>
           <strong> Telefono: </strong> <?php echo $telefono; ?> <br>
           <strong> Celular: </strong> <?php echo $celular; ?> <br>
          </address>
        </div>
        <!-- /.col -->
        <div class="col-sm-4 invoice-col">
          <strong> DATOS RESPONSABLE </strong>
          <address>
            <strong>Responsable</strong> <?php echo $responsable; ?><br>
            <strong>Parentesco</strong> <?php echo $parentesco; ?><br>
            <strong>Telefono</strong> <?php echo $telefono_responsable; ?><br>
          </address>
        </div>
        <!-- /.col -->
        <div class="col-sm-4 invoice-col">
          <strong> ANTECEDENTES </strong>
           <address>
            <strong>Enfermedades: </strong> <?php echo $enfermedad; ?><br>
            <strong>Alergias: </strong> <?php echo $alergias; ?><br>
            <strong>Medicamentos: </strong> <?php echo $medicamento; ?><br>
          </address>
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

      <!-- Table row -->
      <div class="row">
        <div class="col-xs-12 ">
        <h2 class="page-header">
            <i class="fa fa-credit-card"></i> Socioeconomico
          </h2>
          <div id="test"></div>
        </div>
        <!-- /.col -->
      </div>
      <div class="row">
        <div class="col-xs-12 ">
        <h2 class="page-header">
            <i class="fa fa-heartbeat"></i> Historial clinico
          </h2>
          <div id="historialclinico"></div>
        </div>
        <!-- /.col -->
      </div>
      <div class="row">
        <div class="col-xs-12 ">
        <h2 class="page-header">
            <i class="fa fa-eyedropper"></i> Esquena de vacunación
          </h2>
          <div id="vacunacion"></div>
        </div>
        <!-- /.col -->
      </div>
    
      <div class="row no-print">
        <div class="col-xs-8">
        </div>
        <div class="col-xs-1">
        <form action = 'reportes_ficha_paciente_pdf.php' method = 'POST'>
          <input type = 'hidden' name = 'idpersona' value = <?php echo $idpersona; ?> >
          <input type = 'submit' value = 'Vista previa' class = 'btn btn-warning'>
          </form>
        </div>
        <div class="col-xs-1">
        <a href="reporte_pacientes.php" class="btn btn-success btn btn-tool " role="button">Regresar</a>
        </div>
      </div>
    </section>
    <!-- /.content -->
    <div class="clearfix"></div>
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer no-print">
    <div class="pull-right hidden-xs">
    </div>
    <strong>Copyright <?php echo $dates; ?> <a href="http://uees.edu.sv">Universidad Evangelica de El Salvador</a>.</strong> All rights
    reserved.
  </footer>



  </body>
</html>

    <script type="text/javascript">
        $(document).ready(function () {

          $.post( "historico.php", { IdFactor: "1", IdPersona: "<?php echo $idpersona; ?>" })
              .done(function( data ) {
                $("#test").html(data);
                
            });

            $.post( "historico.php", { IdFactor: "2", IdPersona: "<?php echo $idpersona; ?>" })
              .done(function( data ) {
                $("#historialclinico").html(data);
                
            });
            $.post( "historico.php", { IdFactor: "3", IdPersona: "<?php echo $idpersona; ?>" })
              .done(function( data ) {
                $("#vacunacion").html(data);
                
            });

        });
    </script>

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
