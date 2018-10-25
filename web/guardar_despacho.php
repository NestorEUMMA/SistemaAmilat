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
									}

for ($j = 1; $j <= $cuenta; $j ++){
$insertmovimiento = "
		INSERT INTO salidas
		(IdReceta, IdUsuario, IdMedicamento, IdMovimiento, Total, Fecha)
		VALUES
		($idreceta, $idusuario, $idmedicamento[$j], $idmovimiento, $total[$j], now())
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


if (!$resultadoinsertmovimiento and !$resultadoupdatemedicamento and !$resultadoupdatereceta){
	echo "
		<script>
		alert('No Despachado');
		document.location='vista_farmacia.php';
		</script>
		";
		}else{
	echo "
		<script>
		alert('Despachado');
		document.location='vista_farmacia.php';
		</script>
		";
				}
		
?>