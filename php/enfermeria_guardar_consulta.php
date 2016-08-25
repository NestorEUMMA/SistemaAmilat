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

		//AL MOMENTO DE ALMACENAR LA CONSULTA, EL IDESTADO SE GUARDA EN 1, ESO SIGNIFICA QUE NO TIENE ALMACENADOS SIGNOS VITALES
    $insertexpediente = "INSERT INTO consulta(IdUsuario,IdPersona,IdModulo,FechaConsulta, Activo, IdEstado)"
                       . "VALUES ('$usuario','$persona','$modulo',now(), 1, 1)";
    $resultadoinsertmovimiento = $mysqli->query($insertexpediente);


        $insertexpediente2 = "UPDATE persona SET IdEstado=4  WHERE IdPersona='$persona'";
    $resultadoinsertmovimiento2 = $mysqli->query($insertexpediente2);
    //header('Location: ../php/expediente_clinico.php?IdPersona='.$persona);

?>


        <form id="frm" action="enfermeria_expediente_clinico.php" method="post" class="hidden" >
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
