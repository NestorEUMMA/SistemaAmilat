<?php

include '../include/dbconnect.php';


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
            $responsable = $test['RESPONSABLE'];
            $parentesco = $test['PARENTESCO'];
            $telefono_responsable = $test['TELEFONO_RESPONSABLE'];
            $date = date("Y-m-d ");

          }
?>

<!DOCTYPE html>
<html>
 <?php  include '../include/asset.php'; ?>
<body ">
<div class="wrapper">
  <!-- Main content -->
   <section class="invoice">
      <!-- title row -->
      <div class="row">
        <div class="col-xs-7">
          <h2 class="page-header">
            <i class="fa fa-globe"></i> Centro Medico Familiar Shalom </br>
            <small>Lotificacion Pensilvania, Pol. A, Lot#1,</br>
            Santiago Texacuangos, San Salvador. Tel.:2220-8689 </small> 
          </h2>
        </div>
        <div class="col-xs-5">
                  <img src="reportes/Imagen/logo.png" alt="..." class="margin">
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

      <div class="row">
        <div class="col-xs-12 ">
        <h2 class="page-header">
            <i class="fa fa-credit-card"></i> Socioeconomico
          </h2>
          <div id="test"></div>
        </div>
        <!-- /.col -->
      </div>
       </br>
       </br> 
      <div class="row">
        <div class="col-xs-12 ">
        <h2 class="page-header">
            <i class="fa fa-heartbeat"></i> Historial clinico
          </h2>
          <div id="historialclinico"></div>
        </div>
        <!-- /.col -->
      </div>
      </br>
      </br>
      </br>
      </br>
      </br>
       </br>
        </br>
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
      <div class="col-xs-9">
      </div>
        <div class="col-xs-2">
        <input value = 'Imprimir' onclick="window.print();" class = 'btn btn-warning btn btn-tool'>
        </div>
        <div class="col-xs-1">
        <a href="reporte_pacientes.php" class="btn btn-success btn btn-tool " role="button">Regresar</a>
        </div>
      </div>
    </section>
</div>
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

