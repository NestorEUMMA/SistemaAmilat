<?php
session_start();
include '../include/dbconnect.php';
include '../include/asset.php';

$idusuario = $_POST['txtid'];
$idmovimiento = 1;
$idmedicamento = $_POST['id_medicamento'];
$total = $_POST['cantidad'];
$codigolote = $_POST['codigo_medicamento'];
$costo = $_POST['costo_unitario'];
$fecha_vencimiento = $_POST['fecha_vencimiento'];


$insertlote = "
INSERT INTO medicamentolote
(IdMedicamento, CodigoLote, FechaEntrada, FechaVencimiento, Costo, Cantidad, Activo)
VALUES
($idmedicamento, '$codigolote', now(), '$fecha_vencimiento', $costo, $total, 1)
			";
$resultadoinsertlote = $mysqli->query($insertlote);


$updatemedicamentos = "
UPDATE medicamentos
set Existencia = (Existencia + $total)
WHERE IdMedicamento = $idmedicamento
				";
$resultadoupdatemedicamentos = $mysqli->query($updatemedicamentos);


$insertentradas = "
INSERT INTO entradas
(IdUsuario, IdMedicamento, IdMovimiento, Total, Fecha)
VALUES
($idusuario, $idmedicamento, $idmovimiento, $total, now())
			";
$resultadoinsertentradas = $mysqli->query($insertentradas);

if (!$resultadoinsertlote and !$resultadoinsertentradas and !$resultadoupdatemedicamentos){
					echo "
						<script>
							alert('Lote No Guardado');
							document.location='entrada_medicamentos.php';
						</script>
						";
				}else{
					echo "
						<script>
							alert('Lote Guardado');
						document.location='entrada_medicamentos.php';
						</script>
						";
}

?>