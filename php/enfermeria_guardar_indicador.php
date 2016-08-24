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

    $insertexpediente = "INSERT INTO indicador(IdConsulta,Peso,UnidadPeso,Altura,UnidadAltura,Temperatura,UnidadTemperatura,Pulso,PresionMax,PresionMin,Observaciones)
                             VALUES ('$idconsulta','$peso','$pesoindicador','$altura','$alturaindicador','$temperatura','$temperaturaindicador','$pulso','$max','$min','$observaciones') ";
    $resultadoinsertmovimiento = $mysqli->query($insertexpediente);

		//EL IDESTADO DE LA CONSULTA SI ESTA EN 2 SIGNIFICA QUE YA TIENE ALMACENADO LOS SIGNOS VITALES

  	$insertexpediente2 = "UPDATE consulta SET IdEstado=2, Status=1 WHERE IdConsulta='$idconsulta'";
    $resultadoinsertmovimiento2 = $mysqli->query($insertexpediente2);

		//  echo $insertexpediente;
		//  echo $insertexpediente2;


?>

        <form id="frm" action="enfermeria_expediente_clinico.php" method="post" class="hidden">
          <input type="hidden" id="IdPersona" name="IdPersona" value="<?php echo $idpersona ?>" />
        </form>

        <script type="text/javascript">
		    $(document).ready(function(){
		            $("#frm").submit();
		    });

				</script>
        </body>
</html>
