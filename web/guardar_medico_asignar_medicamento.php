<?php
include '../include/dbconnect.php';
include '../include/asset.php';
session_start();


$idreceta = $_POST['idreceta'];
$idmedicamento = $_POST['idmedicamento'];
$cantidad = $_POST['cantidad'];
$horas = $_POST['horas'];
$dias = $_POST['dias'];
$total_dec = $dias * ((24 / $horas) * $cantidad);
$total = round($total_dec);


$insertmovimiento = "
		INSERT INTO receta_medicamentos
		(IdReceta, IdMedicamento, cantidad, horas, dias, total, activo)
		VALUES
		($idreceta, $idmedicamento, $cantidad, $horas, $dias, $total, 1)
			";

echo "
<form id='frm' action='medico_asignar_medicamento.php' method='post' class='hidden'>
          <input type='hidden' id='idreceta' name='idreceta' value = '".$idreceta."'>
</form>
";


echo "hola";

$resultadoinsertmovimiento = $mysqli->query($insertmovimiento);
if (!$resultadoinsertmovimiento){
	echo "
		<script type='text/javascript'>
    		$(document).ready(function(){
			alert('Datos no Guardados');
			$('#frm').submit();  
			});
		</script>
		";
}else{
	echo "
		<script type='text/javascript'>
    		$(document).ready(function(){
			alert('Datos Guardados');
			$('#frm').submit();  
			});
		</script>
		";
}

?>