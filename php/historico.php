<table class="table table-striped table-hover table-bordered" >
	<tr>
		<th class="text-center" style="width: 5%">No.</th>
		<th class="text-center" style="width: 55%">Pregunta</th>
		<th class="text-center" style="width: 40%">Valor</th>
	</tr>

<?php

include_once '../include/dbconnect.php';
session_start();

$id = $_POST["IdFactor"];
$IdPersona = $_POST["IdPersona"];

$query = "select IdPregunta,Nombre,Ponderacion from pregunta where IdFactor = $id";
$tblPreguntas = $mysqli->query($query);
$arrPreguntas = array();

while ($f = $tblPreguntas->fetch_assoc())
{
  $arrPreguntas[] = $f;
}


$query = "select 
			 a.IdTest
		    ,b.IdFactor
		    ,b.IdPregunta
		    ,c.Ponderacion
		    ,c.Nombre as Pregunta
		    ,b.IdRespuesta
		    ,b.Detalle
		    , (case 
				when IdRespuesta is null then b.Detalle
		        else (select Nombre from respuesta where IdRespuesta = b.IdRespuesta)
			  end) as Respuesta
		from 
			test a
		left join testdetalle b on a.IdTest = b.IdTest
		left join pregunta c on b.IdPregunta = c.IdPregunta
		where 
			a.IdPersona=$IdPersona and b.IdFactor=$id";

$tblRespuestas = $mysqli->query($query);
$arrRespuestas = array();

while ($f = $tblRespuestas->fetch_assoc())
{
  $arrRespuestas[] = $f;
}

$i=0;
foreach ($arrPreguntas as $iP => $vP) {
	echo "<tr>";
		echo "<td class='text-center'>". ++$i . "</td>";
		echo "<td>";
			//echo "<label for='selPregunta". $vP["IdPregunta"] ."' class='form-label'>". $vP["Nombre"]. "<label>";
			echo $vP["Nombre"];
		echo "</td>";
		echo "<td>";

			switch ($vP["Ponderacion"]) {
				case "0":
				{
						
					foreach ($arrRespuestas as $iR => $vR) {
						if(	$vR["IdPregunta"] == $vP["IdPregunta"] ){
							echo $vR["Respuesta"];
						}
					}
					break;
				}
				case "1":
				{
					foreach ($arrRespuestas as $iR => $vR) {
						if(	$vR["IdPregunta"] == $vP["IdPregunta"] ){
							echo $vR["Respuesta"];
						}
					}
					break;
				}
				case "2":
				{
					
					foreach ($arrRespuestas as $iR => $vR) {
						if(	$vR["IdPregunta"] == $vP["IdPregunta"] ){
							$r = $vR["Respuesta"];
							//echo "<span class='bagde bagde-info'>$r</span>";
							echo "<small class='label bg-yellow'>$r</small>&nbsp;";
						}
					}
					break;
				}
				default:
					
					break;
			}
			
		echo "</td>";
	echo "<tr>";
}


//header("Content-Type","text/html");
//print_r(json_encode($));

?>
</table>