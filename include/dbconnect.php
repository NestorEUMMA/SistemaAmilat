<?php


define ('DB_SERVER', 'MYSQL5009.SmarterASP.Net');
define ('DB_USERNAME', '9b35fa_clinica');
define ('DB_PASSWORD', 'clinica2016');
define ('DB_DATABASE', 'db_9b35fa_clinica');

$mysqli = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);

if ($mysqli === false) {
die ("ERROR: No se estableció la conexión. " . mysqli_connect_error());
}

$mysqli->set_charset("utf8");


?>


