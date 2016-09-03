<?php
session_start();
include '../include/dbconnect.php';
include '../include/asset.php';



$idreceta = $_POST['idreceta'];
$idusuario = $_SESSION['IdUsuario'];
$idmovimiento = 2;
$cuenta = $_POST['cuenta'];


for ($i = 1; $i <= $cuenta; $i ++){
	$idmedicamento[$i] = $_POST['idmedicamento'.$i];
	$existencia[$i] = $_POST['existencia'.$i];
	$total[$i] = $_POST['total'.$i];
	$nuevaexistencia[$i] = $existencia[$i] - $total[$i];
	$precio[$i] = $_POST['precio'.$i];
									}

for ($j = 1; $j <= $cuenta; $j ++){
$insertmovimiento = "
		INSERT INTO salidas
		(IdReceta, IdUsuario, IdMedicamento, IdMovimiento, Total, Fecha, Precio)
		VALUES
		($idreceta, $idusuario, $idmedicamento[$j], $idmovimiento, $total[$j], now(), $precio[$j])
			";
$resultadoinsertmovimiento = $mysqli->query($insertmovimiento);
			/*echo "insert".$j.": ".$insertmovimiento."<br>";*/
									}


for ($k = 1; $k <= $cuenta; $k ++){
$updatemedicamento = "
		UPDATE medicamentos
		set Existencia = $nuevaexistencia[$k]
		WHERE IdMedicamento = $idmedicamento[$k]
			";
			/*echo "update".$k.": ".$updatemedicamento."<br>";*/
$resultadoupdatemedicamento = $mysqli->query($updatemedicamento);
									}

$updatereceta = "
		UPDATE receta
		set activo = 0
		WHERE IdReceta = $idreceta
			";
$resultadoupdatereceta = $mysqli->query($updatereceta);


for ($l = 1; $l <= $cuenta; $l ++){
$inserttransaccion = "
	INSERT INTO transaccion
	(FechaTransaccion, IdUsuario, IdMedicamento, IdMovimiento, CodigoLote, Cantidad, Costo, Venta)
	VALUES
	(now(), $idusuario, $idmedicamento[$l], $idmovimiento, '', $total[$l], '0', $precio[$l])
			";
$resultadoinserttransaccion = $mysqli->query($inserttransaccion);
									}

if (!$resultadoinsertmovimiento and !$resultadoupdatemedicamento and !$resultadoupdatereceta and !$resultadoinserttransaccion){
	echo "
		<script>
		alert('No Despachado');
		document.location='farmacia_vista_farmacia.php';
		</script>
		";
		}else{
	echo "
		<script>
		alert('Despachado');
		document.location='farmacia_vista_farmacia.php';
		</script>
		";
				}

?>