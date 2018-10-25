<?php
session_start();
include '../include/dbconnect.php';
include '../include/asset.php';

$idusuario = $_SESSION['IdUsuario'];
$codigo = $_POST['codigo'];
$cantidad = $_POST['cantidad'];
$existencia = $_POST['existencia'];
$idmedicamento = $_POST['idmedicamento'];


$insertbaja = "
INSERT INTO bajavencimiento
(CodigoLote, Fecha, IdUsuario)
VALUES
('$codigo', now(), $idusuario)
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

if (!$resultadoinsertbaja and !$resultadoupdatemedicamentos and !$resultadoupdatelotes){
					echo "
						<script>
							alert('No se dio de baja');
							document.location='baja_vencimiento.php';
						</script>
						";
				}else{
					echo "
						<script>
							alert('Baja actualizada');
						document.location='baja_vencimiento.php';
						</script>
						";
}

?>