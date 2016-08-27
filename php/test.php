<table class="table table-striped table-hover table-bordered" >
	<tr>
		<th class="text-center" style="width: 5%">No.</th>
		<th class="text-center" style="width: 65%">Pregunta</th>
		<th class="text-center" style="width: 30%">Respuesta</th>
	</tr>

<?php

include_once '../include/dbconnect.php';
session_start();

$id = $_POST["IdFactor"];

$query = "select IdPregunta,Nombre from pregunta where IdFactor = $id";
$tblPreguntas = $mysqli->query($query);
$arrPreguntas = array();

while ($f = $tblPreguntas->fetch_assoc())
{
  $arrPreguntas[] = $f;
}


$query = "select
				 b.IdPregunta
				,b.Nombre as Pregunta
				,a.IdRespuesta 
			    ,a.Nombre as Respuesta
			from 
				respuesta a
			left join pregunta b on a.IdPregunta = b.IdPregunta
			where 
				b.idFactor = $id";

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
			echo "<select id='selPregunta". $vP["IdPregunta"] . "' name='selPregunta".$vP["IdPregunta"] . "' class='form-control select2' required  onfocus='inFocus(this)' onfocusout='outFocus(this)' >";
				echo "<option value=''></option>";
				
				foreach ($arrRespuestas as $iR => $vR) {
					if(	$vR["IdPregunta"] == $vP["IdPregunta"] ){
						echo "<option value='". $vR["IdRespuesta"] ."'>". $vR["Respuesta"]."</option>";
					}
				}
	
			echo "</select>";
		echo "</td>";
	echo "<tr>";
}


//header("Content-Type","application/json");
//print_r(json_encode($));

?>
</table>