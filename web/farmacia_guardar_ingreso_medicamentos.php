<?php
session_start();
include '../include/dbconnect.php';
include '../include/asset.php';

$idusuario = $_SESSION['IdUsuario'];
$idmovimiento = 1;

$nombre = $_POST['nombre'];
$nombrecomercial = $_POST['nombrecomercial'];
$codigo = $_POST['codigo'];
$lote = $_POST['lote'];
$idpresentacion = $_POST['ID_PRESENTACION'];
$idlaboratorio = $_POST['ID_LABORATORIO'];
$idcategoria = $_POST['ID_CATEGORIA'];
$concentracion = $_POST['concentracion'];
$idunidadmedida = $_POST['ID_UNIDAD_MEDIDA'];
$preciounitario = $_POST['precio'];
$existencia = $_POST['existencia'];
$preciolote = $preciounitario * $existencia;
$fechaexpedicion = $_POST['fecha_expedicion'];
$fechavencimiento = $_POST['fecha_vencimiento'];


$insertmedicamentos = "
INSERT INTO medicamentos (NombreMedicamento, NombreComercial, Codigo, Lote, IdPresentacion, IdLaboratorio, IdCategoria, 
Concentracion, IdUnidadMedida, Existencia, PrecioUnitario, PrecioLote, FechaIngreso, FechaExpedicion, FechaVencimiento, Activo) 
VALUES ('$nombre', '$nombrecomercial', '$codigo', '$lote', $idpresentacion, $idlaboratorio, $idcategoria, $concentracion, 
$idunidadmedida, $existencia, $preciounitario, $preciolote, now(), '$fechaexpedicion', '$fechavencimiento', '1')
			";


$resultadoinsertmedicamentos = $mysqli->query($insertmedicamentos);

/*
echo $insertmedicamentos;
echo "<br>";
*/

$idmedicamento = "
SELECT max(IdMedicamento) as idmedicamento from medicamentos
";
$resultadoidmedicamento = $mysqli->query($idmedicamento);
    while ($row = $resultadoidmedicamento->fetch_assoc()) {
    $idmedicamentoguardado = $row['idmedicamento'];
                                  }
                                  /*
echo $idmedicamentoguardado;
echo "<br>";
*/

$insertentradas = "
INSERT INTO entradas
(IdUsuario, IdMedicamento, IdMovimiento, Total, Fecha)
VALUES
($idusuario, $idmedicamentoguardado, $idmovimiento, $existencia, now())
			";

			
$resultadoinsertentradas = $mysqli->query($insertentradas);

/*
echo $insertentradas;
echo "<br>";
*/

$inserttransaccion = "
	INSERT INTO transaccion
	(FechaTransaccion, IdUsuario, IdMedicamento, IdMovimiento, CodigoLote, Cantidad, Existencia, Costo, Venta)
	VALUES
	(now(), $idusuario, $idmedicamentoguardado, $idmovimiento, '$codigo', $existencia, $existencia, $preciolote, 0)
			";
			
$resultadoinserttransaccion = $mysqli->query($inserttransaccion);

/*
echo $inserttransaccion;
*/


if (!$resultadoinsertmedicamentos and !$resultadoinsertentradas and !$resultadoinserttransaccion){
					echo "
						<script>
							alert('Medicamento no Guardado');
							document.location='farmacia_ingreso_medicamentos.php';
						</script>
						";
				}else{
					echo "
						<script>
							alert('Medicamento Guardado');
						document.location='farmacia_ingreso_medicamentos.php';
						</script>
						";
}

?>