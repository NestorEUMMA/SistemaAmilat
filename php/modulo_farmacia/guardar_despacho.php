<?php
session_start();
include '../../include/dbconnect.php';
include '../../include/asset.php';

$idreceta = $_POST['idreceta'];
$idusuario = 7;
$idmovimiento = 2;
$cuenta = $_POST['cuenta'];


for ($i = 1; $i <= $cuenta; $i ++){
	$idmedicamento[$i] = $_POST['idmedicamento'.$i];
	$total[$i] = $_POST['total'.$i];
									}

for ($j = 1; $j <= $cuenta; $j ++){
$insertmovimiento = "
		INSERT INTO salidas
		(IdReceta, IdUsuario, IdMedicamento, IdMovimiento, Total, Fecha)
		VALUES
		($idreceta, $idusuario, $idmedicamento[$j], $idmovimiento, $total[$j], now())
			";
									}

$resultadoinsertmovimiento = $mysqli->query($insertmovimiento);
if (!$resultadoinsertmovimiento){
					echo "
						<script>
							alert('Datos no Guardados');
							document.location='vista_farmacia.php';
						</script>
						";
				}else{
					echo "
						<script>
							alert('Datos Guardados');
						document.location='vista_farmacia.php';
						</script>
						";
}

?>