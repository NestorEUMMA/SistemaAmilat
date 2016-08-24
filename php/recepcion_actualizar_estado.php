<?php

include '../include/dbconnect.php';
session_start();

   //$user = $_SESSION['IdUsuario'];
   $idpersona = $_POST['IdPersona'];
   $estado = $_POST['cboEstado'];


   $actualizarestado = "UPDATE persona SET IdEstado=$estado where IdPersona=$idpersona";

   $resultadoactualizarestado = $mysqli->query($actualizarestado);

   echo $actualizarestado;
   header('Location: ../php/recepcion_buscar_paciente.php');

?>
