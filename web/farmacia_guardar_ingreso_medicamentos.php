<?php
session_start();
include '../include/dbconnect.php';
include '../include/asset.php';

$nombre = $_POST['nombre'];
$nombrecomercial = $_POST['nombrecomercial'];
$idpresentacion = $_POST['ID_PRESENTACION'];
$idlaboratorio = $_POST['ID_LABORATORIO'];
$idcategoria = $_POST['ID_CATEGORIA'];
$concentracion = $_POST['concentracion'];
$idunidadmedida = $_POST['ID_UNIDAD_MEDIDA'];
$precio = $_POST['precio'];
$precioa = $precio * 1;
$preciob = $precio * 0.7;
$precioc = $precio * 0.5;
$preciod = 0;


$insermedicamentos = "
INSERT INTO medicamentos
(NombreMedicamento, NombreComercial, IdPresentacion, IdLaboratorio, IdCategoria, Concentracion, IdUnidadMedida, PrecioLab, PrecioVentaA, PrecioVentaB, 
PrecioVentaC, PrecioVentaD, Activo)
VALUES
('$nombre', '$nombrecomercial', $idpresentacion, $idlaboratorio, $idcategoria, $concentracion, $idunidadmedida, 
	$precio, $precioa, $preciob, $precioc, $preciod, 1)
			";

$resultadoinsermedicamentos = $mysqli->query($insermedicamentos);


if (!$resultadoinsermedicamentos){
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