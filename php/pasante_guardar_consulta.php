<html>
<head>
	<script src="../web/plugins/jQuery/jQuery-2.2.0.min.js"></script>



</head>
<body>
 <?php

include '../include/dbconnect.php';
session_start();

    $user = $_SESSION['IdUsuario'];
    $persona = $_POST['txtPaciente'];
    $usuario = $_POST['cboUsuario'];
    $modulo = $_POST['cboModulo'];
    $fecha = $_POST['txtFecha'];

		//AL MOMENTO DE ALMACENAR LA CONSULTA, EL IDESTADO SE GUARDA EN 1, ESO SIGNIFICA QUE NO TIENE ALMACENADOS SIGNOS VITALES
    $insertexpediente = "INSERT INTO consulta(IdUsuario,IdPersona,IdModulo,FechaConsulta, Activo, IdEstado)"
                       . "VALUES ('$usuario','$persona','$modulo','$fecha', 1, 1)";


    $resultadoinsertmovimiento = $mysqli->query($insertexpediente);
    //header('Location: ../php/expediente_clinico.php?IdPersona='.$persona);

?>


        <form id="frm" action="pasante_expediente_clinico.php" method="post" class="hidden" >
          <input type="hidden" id="IdPersona" name="IdPersona" value="<?php echo $persona ?>" />
        </form>

    <script type="text/javascript">
		    $(document).ready(function(){
		            //alert($("#IdPersona").val());
		            $("#frm").submit();
		    });

		</script>
</body>
</html>
