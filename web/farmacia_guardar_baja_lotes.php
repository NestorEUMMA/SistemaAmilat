<?php
session_start();
include '../include/dbconnect.php';
include '../include/asset.php';

$idmovimiento = $_POST['ID_MOVIMIENTO'];
$idusuario = $_SESSION['IdUsuario'];
$codigo = $_POST['codigo'];
$cantidad = $_POST['cantidad'];
$idmedicamento = $_POST['idmedicamento'];
<<<<<<< HEAD
<<<<<<< HEAD
=======
$exitencia = $_POST['existencia'];
>>>>>>> 8183526251e38fb23b35d74e5226aedd161417a1
=======
$existencia = $_POST['existencia'];
$nuevaexistencia = $existencia - $cantidad;
>>>>>>> de9703f7289601a8d76e06411276d29d5f968e1b


$insertbaja = "
INSERT INTO bajalotes
(CodigoLote, Fecha, IdUsuario, Cantidad)
VALUES
('$codigo', now(), $idusuario, $cantidad)
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
<<<<<<< HEAD
UPDATE medicamentolote
set activo = 0
WHERE CodigoLote = '$codigo'
=======
UPDATE medicamentos
set activo = 0
WHERE IdMedicamento = '$idmedicamento'
>>>>>>> 8183526251e38fb23b35d74e5226aedd161417a1
				";
$resultadoupdatelotes = $mysqli->query($updatelotes);
<<<<<<< HEAD


<<<<<<< HEAD
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
=======
=======
}
 
>>>>>>> de9703f7289601a8d76e06411276d29d5f968e1b

$inserttransaccion = "
	INSERT INTO transaccion
	(FechaTransaccion, IdUsuario, IdMedicamento, IdMovimiento, CodigoLote, Cantidad, Existencia, Costo, Venta)
	VALUES
	(now(), $idusuario, $idmedicamento, $idmovimiento, '$codigo', $cantidad, $nuevaexistencia, 0, 0)
			";
$resultadoinserttransaccion = $mysqli->query($inserttransaccion);

<<<<<<< HEAD
if (!$resultadoinsertbaja and !$resultadoupdatelotes){
>>>>>>> 8183526251e38fb23b35d74e5226aedd161417a1
=======

if (!$resultadoinsertbaja){
>>>>>>> de9703f7289601a8d76e06411276d29d5f968e1b
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