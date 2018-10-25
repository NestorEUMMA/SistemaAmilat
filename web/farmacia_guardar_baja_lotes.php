<?php
session_start();
include '../include/dbconnect.php';
include '../include/asset.php';

$idmovimiento = $_POST['ID_MOVIMIENTO'];
$idusuario = $_SESSION['IdUsuario'];
$codigo = $_POST['codigo'];
$cantidad = $_POST['cantidad'];
$idmedicamento = $_POST['idmedicamento'];
$existencia = $_POST['existencia'];
$nuevaexistencia = $existencia - $cantidad;

if($cantidad > $existencia)
{
	$nuevaexistencia = 0;
}


$insertbaja = "
INSERT INTO bajalotes
(CodigoLote, Fecha, IdUsuario, Cantidad)
VALUES
('$codigo', now(), $idusuario, $nuevaexistencia)
			";
$resultadoinsertbaja = $mysqli->query($insertbaja);


$updateexistencias = "
UPDATE medicamentos
set Existencia = Existencia - $cantidad
WHERE IdMedicamento = '$idmedicamento'
				";
$resultadoupdateexistencias= $mysqli->query($updateexistencias);


if ($cantidad > $existencia)
{
$updatelotes = "
UPDATE medicamentos
set activo = 0
WHERE IdMedicamento = '$idmedicamento'
				";
$resultadoupdatelotes = $mysqli->query($updatelotes);
}
 

$inserttransaccion = "
	INSERT INTO transaccion
	(FechaTransaccion, IdUsuario, IdMedicamento, IdMovimiento, CodigoLote, Cantidad, Existencia, Costo, Venta)
	VALUES
	(now(), $idusuario, $idmedicamento, $idmovimiento, '$codigo', $cantidad, $nuevaexistencia, 0, 0)
			";
$resultadoinserttransaccion = $mysqli->query($inserttransaccion);


if (!$resultadoinsertbaja){
					echo "
						<script>
							alert('No se dio de baja');
							document.location='farmacia_baja_lotes.php';
						</script>
						";
				}else{
					echo "
						<script>
							alert('Baja actualizada');
						document.location='farmacia_baja_lotes.php';
						</script>
						";
}
?>