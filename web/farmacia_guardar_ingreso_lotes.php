<?php
session_start();
include '../include/dbconnect.php';
include '../include/asset.php';

$idusuario = $_SESSION['IdUsuario'];
$idmovimiento = 1;
$idmedicamento = $_POST['ID_MEDICAMENTO'];
$total = $_POST['cantidad'];
$codigolote = $_POST['codigo'];
$costo_unitario = $_POST['costo_unitario'];
$costo_total = $costo_unitario * $total;
$lote = $_POST['lote'];

$fecha_expedicion = $_POST['fecha_expedicion'];
$fecha_vencimiento = $_POST['fecha_vencimiento'];


$insertlote = "
INSERT INTO medicamentolote
(IdMedicamento, CodigoLote, FechaEntrada, FechaVencimiento, CostoUnitario, Cantidad, CostoTotal, Fechaexpedicion, IdUsuario, lote, Activo)
VALUES
($idmedicamento, '$codigolote', now(), '$fecha_vencimiento', $costo_unitario, $total, $costo_total, '$fecha_expedicion', 
$idusuario, '$lote', 1)
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

$inserttransaccion = "
	INSERT INTO transaccion
	(FechaTransaccion, IdUsuario, IdMedicamento, IdMovimiento, CodigoLote, Cantidad, Costo, Venta)
	VALUES
	(now(), $idusuario, $idmedicamento, $idmovimiento, '$codigolote', $total, $costo_total, 0)
			";
$resultadoinserttransaccion = $mysqli->query($inserttransaccion);


if (!$resultadoinsertlote and !$resultadoinsertentradas and !$resultadoupdatemedicamentos and !$resultadoinserttransaccion){
					echo "
						<script>
							alert('Lote No Guardado');
							document.location='farmacia_ingreso_lotes.php';
						</script>
						";
				}else{
					echo "
						<script>
							alert('Lote Guardado');
						document.location='farmacia_ingreso_lotes.php';
						</script>
						";
}
?>