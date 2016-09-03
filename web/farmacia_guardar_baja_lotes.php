<?php
session_start();
include '../include/dbconnect.php';
include '../include/asset.php';

$idmovimiento = $_POST['ID_MOVIMIENTO'];
$idusuario = $_SESSION['IdUsuario'];
$codigo = $_POST['codigo'];
$cantidad = $_POST['cantidad'];
$idmedicamento = $_POST['idmedicamento'];


$insertbaja = "
INSERT INTO bajalotes
(CodigoLote, Fecha, IdUsuario, Cantidad)
VALUES
('$codigo', now(), $idusuario, $cantidad)
			";
$resultadoinsertbaja = $mysqli->query($insertbaja);


$updatelotes = "
UPDATE medicamentolote
set activo = 0
WHERE CodigoLote = '$codigo'
				";
$resultadoupdatelotes = $mysqli->query($updatelotes);


$updatemedicamentos = "
UPDATE medicamentos
set Existencia = (Existencia - $cantidad)
WHERE IdMedicamento = $idmedicamento
			";
$resultadoupdatemedicamentos = $mysqli->query($updatemedicamentos);

$inserttransaccion = "
	INSERT INTO transaccion
	(FechaTransaccion, IdUsuario, IdMedicamento, IdMovimiento, CodigoLote, Cantidad, Costo, Venta)
	VALUES
	(now(), $idusuario, $idmedicamento, $idmovimiento, '$codigo', $cantidad, 0, 0)
			";
$resultadoinserttransaccion = $mysqli->query($inserttransaccion);

if (!$resultadoinsertbaja and !$resultadoupdatemedicamentos and !$resultadoupdatelotes){
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