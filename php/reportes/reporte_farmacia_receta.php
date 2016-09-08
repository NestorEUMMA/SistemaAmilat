<?php
include '../../include/dbconnect.php';

$idreceta = $_POST['idreceta'];

 $queryencabezado = "
 SELECT concat(b.Nombres, ' ', b.Apellidos) as MEDICO, concat(c.Nombres, ' ', c.Apellidos) as PACIENTE, a.Fecha as FECHA
FROM receta as a
LEFT JOIN usuario as b on b.IdUsuario = a.IdUsuario
LEFT JOIN persona as c on c.IdPersona = a.IdPersona
WHERE a.IdReceta = $idreceta ";
$resultadoencabezado = $mysqli->query($queryencabezado);

 $querydetalle = "
SELECT concat(b.NombreMedicamento, ' - ', e.NombrePresentacion) as MEDICAMENTO, truncate(a.cantidad, 0) as CANTIDAD, 
a.horas as HORAS, a.dias as DIAS, a.total as TOTAL,
CASE 
WHEN d.Categoria = 'A' THEN (b.PrecioUnitario * a.total) * 1
WHEN d.Categoria = 'B' THEN (b.PrecioUnitario * a.total) * 0.7
WHEN d.Categoria = 'C' THEN (b.PrecioUnitario * a.total) * 0.5
WHEN d.Categoria = 'D' THEN 0
END PRECIO
FROM receta_medicamentos as a
LEFT JOIN medicamentos as b on b.IdMedicamento = a.IdMedicamento
LEFT JOIN receta as c on c.IdReceta = a.IdReceta
LEFT JOIN persona as d on d.IdPersona = c.IdReceta
LEFT JOIN presentacion e on e.IdPresentacion = b.IdPresentacion
WHERE a.IdReceta = $idreceta 
";

$resultadodetalle = $mysqli->query($querydetalle);

?>
<!DOCTYPE html>
<html>
<?php  include '../../include/asset.php'; ?>
<body onload="window.print();">
<div class="wrapper">
  <!-- Main content -->
   <section class="invoice">
      <!-- title row -->
      <div class="row">
        <div class="col-xs-7">
        </div>
        <div class="col-xs-10">
                  <img src="Imagen/logo3.jpg" alt="..." class="margin">
        </div>
        <!-- /.col -->
      </div>
      </br>
      
<STRONG>RECETA MEDICA</STRONG>
      
<!-- Table row -->
<div class="row">
<div class="col-xs-12 table-responsive">
<table class="table table-bordered table-hover" >
<?php
while ($row = $resultadoencabezado->fetch_assoc()) {
echo "
<tr>
<td><label>Medico:</label> </td><td>".$row['MEDICO']."</td>
</tr>
<tr>
<td><label>Paciente:</label> &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp </td><td>".$row['PACIENTE']."</td>
</tr>
<tr>
<td><label>Fecha:</label> &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp </td><td>".$row['FECHA']."</td>
</tr>";
}
echo "</table>";

echo "<table class='table table-bordered table-hover' >";
echo "<th>NOMBRE</th><th>CANTIDAD</th><th>HORAS</th><th>DIAS</th><th>TOTAL</th><th>PRECIO</th>";

$t = 0;
while ($row2 = $resultadodetalle->fetch_assoc()){
 echo " 
  <tr>
  <td>".$row2['MEDICAMENTO']."</td><td class = 'text-center'>".$row2['CANTIDAD']."</td><td class = 'text-center'>".$row2['HORAS']."</td><td class = 'text-center'>".$row2['DIAS']."</td><td class = 'text-center'>".$row2['TOTAL']."</td><td class = 'text-right'>".$row2['PRECIO']."</td>
  </tr>
";
$t += $row2['PRECIO'];
}
  echo "
  <tr>
    <th class = 'text-right' colspan = '5'>TOTAL</th>
    <th class = 'text-right'>".$t."</th>
  </tr>  
  ";
echo "</table>";
?>
</div>
</div>
<div class="row no-print">
<div class="col-xs-11">
</div>
<div class="col-xs-1">
<a href="../../web/farmacia_vista_farmacia.php" class="btn btn-success btn-sm btn-tool " role="button">Regresar</a>
</div>
</div>
</section>
</div>
</body>
</html>