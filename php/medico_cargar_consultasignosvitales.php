  <?php

include '../include/dbconnect.php';
session_start();

    $idconsulta = $_POST["id"];


    $queryexpedientesu = "SELECT CONCAT(p.Nombres,' ', p.Apellidos) As 'Paciente', c.FechaConsulta, CONCAT(u.Nombres,' ', u.Apellidos) As 'Medico', m.NombreModulo As 'Especialidad', c.Diagnostico As 'Diagnostico', e.Nombre As 'Enfermedad',
				c.Comentarios As 'Comentarios', c.Otros As 'Otros', i.Peso As 'Peso', i.UnidadPeso As 'UnidadPeso', i.Altura As 'Altura', i.UnidadAltura As 'UnidadAltura', i.Temperatura As 'Temperatura',
                i.UnidadTemperatura As 'UnidadTemperatura', i.Pulso As 'Pulso', i.PresionMax As 'Max', i.PresionMin  As 'Min', i.Observaciones As 'Observaciones'
                    			FROM consulta c
                    			INNER JOIN usuario u ON c.IdUsuario = u.IdUsuario
                    			INNER JOIN persona p ON c.IdPersona = p.IdPersona
                    			INNER JOIN modulo m ON c.IdModulo = m.IdModulo
                    			INNER JOIN indicador i ON c.IdConsulta = i.IdConsulta
                                INNER JOIN enfermedad e ON c.IdEnfermedad = e.IdEnfermedad
			WHERE c.IdConsulta = $idconsulta";
   $resultadoexpedientesu = $mysqli->query($queryexpedientesu);

   $datos = array();

            while ($test = $resultadoexpedientesu->fetch_assoc())
                  {
                      $datos["Paciente"] = $test['Paciente'];
                      $datos["Medico"] = $test['Medico'];
                      $datos["Especialidad"] = $test['Especialidad'];
                      $datos["FechaConsulta"] = $test['FechaConsulta'];
                      $datos["Diagnostico"] = $test['Diagnostico'];
                      $datos["Enfermedad"] = $test['Enfermedad'];
                      $datos["Comentarios"] = $test['Comentarios'];
                      $datos["Otros"] = $test['Otros'];
                      $datos["Peso"] = $test['Peso'];
                      $datos["UnidadPeso"] = $test['UnidadPeso'];
                      $datos["Altura"] = $test['Altura'];
                      $datos["UnidadAltura"] = $test['UnidadAltura'];
                      $datos["Temperatura"] = $test['Temperatura'];
                      $datos["UnidadTemperatura"] = $test['UnidadTemperatura'];
                      $datos["Pulso"] = $test['Pulso'];
                      $datos["Max"] = $test['Max'];
                      $datos["Min"] = $test['Min'];
                      $datos["Observaciones"] = $test['Observaciones'];
                  }

    header("Content-Type","application/json");

    print_r(json_encode($datos));

?>
