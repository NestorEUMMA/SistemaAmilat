<html>
<head>
	<script src="../web/plugins/jQuery/jQuery-2.2.0.min.js"></script>



</head>
<body>
 <?php

include '../include/dbconnect.php';
session_start();

    //$user = $_SESSION['IdUsuario'];
    $idpersona = $_POST['txtid'];
    $idconsulta = $_POST['txtIdConsulta'];
    $peso = $_POST['txtPeso'];
    $pesoindicador = $_POST['cboUnidadPeso'];
    $altura = $_POST['txtAltura'];
    $alturaindicador = $_POST['cboUnidadAltura'];
    $temperatura = $_POST['txtTemperatura'];
    $temperaturaindicador = $_POST['cboUnidadTemperatura'];
    $pulso = $_POST['txtPulso'];
    $max = $_POST['txtMax'];
    $min = $_POST['txtMin'];
    $observaciones = $_POST['txtObservaciones'];
    $fr = $_POST['txtFR'];
    $glucotex = $_POST['txtGluco'];
    $ulmenstruacion = $_POST['txtUmestruacion'];
    $ulpap = $_POST['txtUpap'];
    $pc = $_POST['txtpc'];
    $pt = $_POST['txtpt'];
    $pa = $_POST['txtpa'];
    $motivo = $_POST['txtMotivo'];

     $diagnostico = $_POST['txtDiagnostico'];
    $enfermedad = $_POST['cboEnfermedad'];
      $comentarios = $_POST['txtComentarios'];
      $otros = $_POST['txtOtros'];
      $estadonutricional = $_POST['txtEstadoNutriconal'];
      $alergias = $_POST['txtAlergiass'];
      $cirugiasprevias = $_POST['txtCirugiasPrevias'];
      $medicamentosactuales = $_POST['txtMedicamentosTomados'];
      $examenfisica = $_POST['txtExamenFisica'];
      $plantratamiento = $_POST['txtPlanTratamiento'];
      $fechaproxvisita = $_POST['txtFechaProxima'];

    $insertexpediente = "INSERT INTO indicador(IdConsulta,Peso,UnidadPeso,Altura,UnidadAltura,Temperatura,UnidadTemperatura,Pulso,PresionMax,PresionMin,Observaciones,PeriodoMeunstral,Glucotex,PC,PT,PA,FR,PAP,Motivo)
                             VALUES ('$idconsulta','$peso','$pesoindicador','$altura','$alturaindicador','$temperatura','$temperaturaindicador','$pulso','$max','$min','$observaciones','$ulmenstruacion','$glucotex','$pc','$pt','$pa','$fr','$ulpap','$motivo')";
    $resultadoinsertmovimiento = $mysqli->query($insertexpediente);

		//EL IDESTADO DE LA CONSULTA SI ESTA EN 2 SIGNIFICA QUE YA TIENE ALMACENADO LOS SIGNOS VITALES

  	$insertexpediente2 = "UPDATE consulta SET Diagnostico='$diagnostico',IdEnfermedad='$enfermedad',Comentarios='$comentarios',Otros='$otros',Activo=1, IdEstado=2, Status=1,
                          EstadoNutricional='$estadonutricional',CirugiasPrevias='$cirugiasprevias',MedicamentosActuales='$medicamentosactuales',ExamenFisica='$examenfisica',
                          PlanTratamiento='$plantratamiento',FechaProxVisita='$fechaproxvisita',Alergias='$alergias'  WHERE IdConsulta='$idconsulta'";
    $resultadoinsertmovimiento2 = $mysqli->query($insertexpediente2);


		 // echo $insertexpediente;
		 // echo $insertexpediente2;


?>

        <form id="frm" action="pasante_expediente_clinico.php" method="post" class="hidden">
          <input type="hidden" id="IdPersona" name="IdPersona" value="<?php echo $idpersona ?>" />
        </form>

        <script type="text/javascript">
		    $(document).ready(function(){
		            $("#frm").submit();
		    });

				</script>
        </body>
</html>
