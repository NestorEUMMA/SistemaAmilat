
<html>
<head>
	<script src="../web/plugins/jQuery/jQuery-2.2.0.min.js"></script>



</head>
<body>
 <?php

      include '../include/dbconnect.php';
      session_start();

      $id = $_POST['txtconsultaID'];
      $idpersona = $_POST['txtpersonaID'];
      $diagnostico = $_POST['txtDiagnostico'];
			$enfermedad = $_POST['cboEnfermedad'];
      $comentarios = $_POST['txtComentarios'];
      $otros = $_POST['txtOtros'];


      $insertexpediente = "UPDATE consulta SET Diagnostico='$diagnostico',IdEnfermedad='$enfermedad',Comentarios='$comentarios',Otros='$otros',Activo=1 WHERE IdConsulta='$id'";
      $resultadoinsertmovimiento = $mysqli->query($insertexpediente);

?>


        <form id="frm" action="medico_consulta_paciente.php" method="post" class="hidden"  >
          <input type="hidden" id="IdConsulta" name="IdConsulta" value="<?php echo $id ?>" />
        </form>

    <script type="text/javascript">
		    $(document).ready(function(){
		            //alert($("#IdConsulta").val());
		            $("#frm").submit();
		    });
		</script>
</body>
</html>
