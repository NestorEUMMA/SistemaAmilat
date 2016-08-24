  <?php

include '../include/dbconnect.php';
session_start();


    $queryexpedientesu = "SELECT  count(c.FechaConsulta) as 'Listado' FROM 
              consulta c
              where c.FechaConsulta = CURDATE();";
   $resultadoexpedientesu = $mysqli->query($queryexpedientesu);

   $datos = array();

            while ($test = $resultadoexpedientesu->fetch_assoc())
                  {
                      $datos["Listado"] = $test['Listado'];

    header("Content-Type","application/json");

    print_r(json_encode($datos));

?>
