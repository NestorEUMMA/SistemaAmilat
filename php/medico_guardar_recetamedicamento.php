<html>
<head>
	<script src="../web/plugins/jQuery/jQuery-2.2.0.min.js"></script>

</head>
<body>
 <?php

include '../include/dbconnect.php';
session_start();


    $idconsulta = $_POST['txtconsultaID'];

    $idreceta = $_POST['txtIdReceta'];
    $idmedicamento = $_POST['txtIdMedicamento'];
		$cantidad = $_POST['txtCantidad'];
    $horas = $_POST['txtHoras'];
    $dias = $_POST['txtDias'];
    $total_dec = $dias * ((24 / $horas) * $cantidad);
    $total = round($total_dec);


    $insertmovimiento = "INSERT INTO receta_medicamentos(IdReceta,IdMedicamento,Cantidad,Horas,Dias,Total)"
    		                ."VALUES ('$idreceta','$idmedicamento','$cantidad','$horas','$dias','$total')";
    $resultadoinsertmovimiento = $mysqli->query($insertmovimiento);

?>


        <form id="frm" action="medico_consulta_paciente.php" method="post">
          <input type="hidden" id="IdConsulta" name="IdConsulta" value="<?php echo $idconsulta ?>" />
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
