<html>
<head>
	<script src="../web/plugins/jQuery/jQuery-2.2.0.min.js"></script>

</head>
<body>
 <?php

include '../include/dbconnect.php';
session_start();

    $idusuario = $_POST['txtUsuarioID'];
    $idpersona = $_POST['txtpersonaID'];
    $idtipoexamen = $_POST['cboTipoExamen'];
	$indicacion = $_POST['txtIndicacion'];


	   $insertexpediente = "INSERT INTO listaexamen(IdUsuario,IdPersona,IdTipoExamen,Activo,FechaExamen,Indicacion)"
		                     . "VALUES ('$idusuario','$idpersona','$idtipoexamen',1,now(),'$indicacion')";
  	 $resultadoinsertmovimiento = $mysqli->query($insertexpediente);

  	// echo $insertexpediente;
?>


        <form id="frm" action="laboratorio_pacientes_externos.php" method="post">
          
        </form>

				<script type="text/javascript">
						$(document).ready(function(){
										//alert($("#IdConsulta").val());
										$("#frm").submit();
						});
				</script>

<?php

?>
</body>
</html>
