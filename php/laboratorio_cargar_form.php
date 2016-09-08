<?php

include '../include/dbconnect.php';
session_start();

    $idlistaexamen = $_POST["id"];


    $queryexamenesactivos = "SELECT  le.IdListaExamen As 'ListaExamen', c.IdConsulta As 'Consulta', u.IdUsuario As 'Medico', p.IdPersona As 'Paciente',  te.IdTipoExamen As 'Examen'
                          FROM listaexamen le
                          INNER JOIN usuario u ON le.IdUsuario = u.IdUsuario
                          INNER JOIN persona p ON le.IdPersona = p.IdPersona
                          LEFT JOIN consulta c ON le.IdConsulta = c.IdConsulta
                          INNER JOIN tipoexamen te ON le.IdTipoExamen = te.IdTipoExamen
                          WHERE le.IdListaExamen = '$idlistaexamen'
                          order by Paciente ASC
                          ";
    $resultadoexamenesactivos = $mysqli->query($queryexamenesactivos);


   $datos = array();

            while ($test = $resultadoexamenesactivos->fetch_assoc())
                  {
                      $datos["ListaExamen"] = $test['ListaExamen'];
                      $datos["Paciente"] = $test['Paciente'];
                      $datos["Medico"] = $test['Medico'];
                      $datos["Consulta"] = $test['Consulta'];
                      $datos["Examen"] = $test['Examen'];
                  }

    header("Content-Type","application/json");

    print_r(json_encode($datos));

?>
