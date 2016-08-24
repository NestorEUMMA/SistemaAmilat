<?php
include '../../include/dbconnect.php';
session_start();


			$tipo_examen = 5;
			$usuario = $_SESSION['IdUsuario'];
			$id_persona = $_POST["idpersona"];;
			$id_consulta = $_POST["idconsulta"];
			$resultado = $_POST['resultado'];
			$idlistaexamen = $_POST['idlistaexamen'];


			$insertmovimiento = "INSERT INTO examenesvarios(IdListaExamen, IdTipoExamen, IdConsulta, IdUsuario, IdPersona, Fecha, Resultado, Activo)"
															."VALUES('$idlistaexamen','$tipo_examen', '$id_consulta', '$usuario', '$id_persona', now(), '$resultado',1)";

			$insertmovimiento2 = "UPDATE listaexamen SET Activo=0 WHERE IdListaExamen='$idlistaexamen'";
			$resultadoinsertmovimiento2 = $mysqli->query($insertmovimiento2);

			$resultadoinsertmovimiento = $mysqli->query($insertmovimiento);
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
