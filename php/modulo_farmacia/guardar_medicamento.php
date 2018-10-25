<?php
session_start();
include '../../include/dbconnect.php';
include '../../include/asset.php';


$nombre = $_POST['nombre'];
$idlaboratorio = $_POST['id_laboratorio'];
$idcategoria = $_POST['id_categoria'];
$idunidadmedida = $_POST['id_unidadmedida'];
$preciolab = $_POST['precio_lab'];
$precioventaa = $_POST['cat_a'];
$precioventab = $_POST['cat_b'];
$precioventac = $_POST['cat_c'];
$precioventad = $_POST['cat_d'];




$insertmovimiento = "
INSERT INTO medicamentos
(NombreMedicamento, IdLaboratorio, IdCategoria, IdUnidadMedida, PrecioLab, PrecioVentaA, PrecioVentaB, PrecioVentaC, PrecioVentaD, Activo)
VALUES
('$nombre', $idlaboratorio, $idcategoria, $idunidadmedida, $preciolab, $precioventaa, $precioventab, $precioventac, $precioventad, 1)
			";

$resultadoinsertmovimiento = $mysqli->query($insertmovimiento);
if (!$resultadoinsertmovimiento){
					echo "
						<script>
							alert('Datos no Guardados');
							document.location='entrada_medicamentos.php';
						</script>
						";
				}else{
					echo "
						<script>
							alert('Datos Guardados');
						document.location='entrada_medicamentos.php';
						</script>
						";
}

?>