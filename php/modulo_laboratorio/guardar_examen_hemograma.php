<?php
include '../../include/dbconnect.php';
session_start();


			$tipo_examen = 1;
			$usuario = $_SESSION['IdUsuario'];
			$id_persona = $_POST["idpersona"];;
			$id_consulta = $_POST["idconsulta"];
			$globulosrojos = $_POST['globulosrojos'];
			$hemoglobina = $_POST['hemoglobina'];
			$hematocrito = $_POST['hematocrito'];
			$vgm = $_POST['vgm'];
			$hcm = $_POST['hcm'];
			$chcm = $_POST['chcm'];
			$leucocitos= $_POST['leucocitos'];
			$neutrofilosenbanda = $_POST['neutrofilosenbanda'];
			$linfocitos = $_POST['linfocitos'];
			$monocitos = $_POST['monocitos'];
			$eosinofilos = $_POST['eosinofilos'];
			$basofilos = $_POST['basofilos'];
			$plaquetas = $_POST['plaquetas'];
			$eritrosedimentacion = $_POST['eritrosedimentacion'];
			$otros = $_POST['otros'];
			$neutrofilossegmentados = $_POST['neutrofilossegmentados'];
			$idlistaexamen = $_POST['idlistaexamen'];

			// echo "con: ".$id_consulta.'<br>';
			if(empty($id_consulta)){


			$insertmovimiento = " INSERT INTO examenhemograma (IdListaExamen, IdTipoExamen, IdUsuario, IdPersona, Fecha, GlobulosRojos, Hemoglobina, Hematocrito, Vgm, Hcm, Chcm, Leucocitos,
				NeutrofilosEnBanda, Linfocitos, Monocitos, Eosinofilos, Basofilos, Plaquetas, Eritrosedimentacion, Otros, NeutrofilosSegmentados,Activo)"
													 . "VALUES('$idlistaexamen','$tipo_examen', '$usuario', '$id_persona', now(), '$globulosrojos', '$hemoglobina', '$hematocrito', '$vgm', '$hcm', '$chcm',
													 				'$leucocitos', '$neutrofilosenbanda', '$linfocitos', '$monocitos', '$eosinofilos', '$basofilos', '$plaquetas',
																	'$eritrosedimentacion', '$otros', '$neutrofilossegmentados',1)";
			 $resultadoinsertmovimiento = $mysqli->query($insertmovimiento);



			$insertmovimiento2 = "UPDATE listaexamen SET Activo=0 WHERE IdListaExamen='$idlistaexamen'";
			$resultadoinsertmovimiento2 = $mysqli->query($insertmovimiento2);
				//echo "no hay consulta";

			}
			else{
				//echo 'hay consulta';
				$insertmovimiento = " INSERT INTO examenhemograma (IdListaExamen, IdTipoExamen, IdConsulta, IdUsuario, IdPersona, Fecha, GlobulosRojos, Hemoglobina, Hematocrito, Vgm, Hcm, Chcm, Leucocitos,
																				NeutrofilosEnBanda, Linfocitos, Monocitos, Eosinofilos, Basofilos, Plaquetas, Eritrosedimentacion, Otros, NeutrofilosSegmentados,Activo)"
													 . "VALUES('$idlistaexamen','$tipo_examen', '$id_consulta', '$usuario', '$id_persona', now(), '$globulosrojos', '$hemoglobina', '$hematocrito', '$vgm', '$hcm', '$chcm',
													 				'$leucocitos', '$neutrofilosenbanda', '$linfocitos', '$monocitos', '$eosinofilos', '$basofilos', '$plaquetas',
																	'$eritrosedimentacion', '$otros', '$neutrofilossegmentados',1)";
			 $resultadoinsertmovimiento = $mysqli->query($insertmovimiento);

			$insertmovimiento2 = "UPDATE listaexamen SET Activo=0 WHERE IdListaExamen='$idlistaexamen'";
			$resultadoinsertmovimiento2 = $mysqli->query($insertmovimiento2);

			}


			if (!$resultadoinsertmovimiento){
				echo "
					<script>
						alert('Datos no Guardados');
						document.location='../laboratorio_index_paciente.php';
					</script>
					";
			}else{
				echo "
					<script>
						alert('Datos Guardados');
					document.location='../laboratorio_index_paciente.php';
					</script>
					";
			}

?>
