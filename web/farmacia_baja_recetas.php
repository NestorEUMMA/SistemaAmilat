<?php
session_start();
include '../include/dbconnect.php';
include '../include/asset.php';



$idreceta = $_POST['idreceta'];


$updatereceta = "
		UPDATE receta
		set activo = 0
		WHERE IdReceta = $idreceta
			";
$resultadoupdatereceta = $mysqli->query($updatereceta);


if (!$resultadoupdatereceta){
	echo "
		<script>
		alert('No se dio de Baja');
		document.location='farmacia_vista_farmacia.php';
		</script>
		";
		}else{
	echo "
		<script>
		alert('Se dio de Baja la receta');
		document.location='farmacia_vista_farmacia.php';
		</script>
		";
				}
?>