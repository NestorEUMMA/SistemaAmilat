<?php



define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_DATABASE', 'db_clinica');
define('DB_PASSWORD', 'nest2015');


$mysqli = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);

if ($mysqli === false) {
die ("ERROR: No se estableció la conexión. " . mysqli_connect_error());
}

$mysqli->set_charset("utf8");


?>


