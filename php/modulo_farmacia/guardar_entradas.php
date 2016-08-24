<?php
session_start();
include '../../include/dbconnect.php';
include '../../include/asset.php';

$idusuario =  $_SESSION['IdUsuario'];
$idmovimiento = 1;
$idmedicamento = $_POST['id_medicamento'];
$total = $_POST['cantidad'];
$codigolote = $_POST['codigo_medicamento'];
$costo = $_POST['costo_unitario'];


$insertlote = "
INSERT INTO medicamentolote
(IdMedicamento, CodigoLote, FechaEntrada, FechaVencimiento, Costo, Cantidad)
VALUES
($idmedicamento, '$codigolote', now(), now(), $costo, $total)
			";
$resultadoinsertlote = $mysqli->query($insertlote);



$insertentradas = "
INSERT INTO entradas
(IdUsuario, IdMedicamento, IdMovimiento, Total, Fecha)
VALUES
($idusuario, $idmedicamento, $idmovimiento, $total, now())
			";
$resultadoinsertentradas = $mysqli->query($insertentradas);

if (!$resultadoinsertlote and !$resultadoinsertentradas){
					echo "
						<script>
							alert('Datos no Guardados');
							document.location='entrada_medicamentos.php';
						</script>
						";
				}else{
					echo "
						<script>
							alert('Datos Guardados');
						document.location='entrada_medicamentos.php';
						</script>
						";
}

?>