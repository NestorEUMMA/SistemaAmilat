
<html>
<head>
	<script src="../web/plugins/jQuery/jQuery-2.2.0.min.js"></script>



</head>
<body>
 <?php

      include '../include/dbconnect.php';
      session_start();

      $idpersona = $_POST['txtpersonaIDs'];


      $insertexpediente2 = "UPDATE persona SET IdEstado=1 WHERE IdPersona='$idpersona'";
      $resultadoinsertmovimiento2 = $mysqli->query($insertexpediente2);

?>


        <form id="frm" action="laboratorio_pacientes_externos.php" method="post" class="hidden"  >

        </form>

    <script type="text/javascript">
		    $(document).ready(function(){
		            //alert($("#IdConsulta").val());
		            $("#frm").submit();
		    });
		</script>
</body>
</html>

