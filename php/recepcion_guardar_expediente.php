<?php
include '../include/dbconnect.php';
session_start();


    $usuario = $_SESSION['IdUsuario'];
    $nombres = $_POST['txtNombres'];
    $apellidos = $_POST['txtApellidos'];
    $dui = $_POST['txtDui'];
    $fnacimiento = $_POST['txtFNacimiento'];
    $geografia = $_POST['z'];
    $direccion = $_POST['txtDireccion'];
    $genero = $_POST['cboGenero'];
    $estadocivil = $_POST['cboEstadoCivil'];
    $responsable = $_POST['txtResponsable'];
    $parentesco = $_POST['txtParentesco'];
    $telefono = $_POST['txtTelefono'];
    $celular = $_POST['txtCelular'];
    $correo = $_POST['txtCorreo'];
    $alergias = $_POST['txtAlergias'];
    $medicinas = $_POST['txtMedicamentos'];
    $enfermedad = $_POST['txtEnfermedad'];
    $telefonoresponsable = $_POST['txtTelefonoContacto'];
    $categoria = $_POST['cboCategoria'];


    $insertexpediente = "INSERT INTO persona (Nombres,Apellidos,Dui,FechaNacimiento,IdGeografia,Direccion,Genero,IdEstadoCivil,
                                     IdResponsable,IdParentesco,Telefono,Celular,Correo,Alergias,Medicamentos,Enfermedad,TelefonoResponsable,IdEstado,Categoria)
                        VALUES ('$nombres','$apellidos','$dui','$fnacimiento','$geografia','$direccion','$genero','$estadocivil','$responsable',
                        '$parentesco','$telefono','$celular','$correo','$alergias','$medicinas','$enfermedad','$telefonoresponsable',1,'$categoria')";


    $resultadoinsertmovimiento = $mysqli->query($insertexpediente);
    header('Location: ../web/index.php?r=persona');
?>
