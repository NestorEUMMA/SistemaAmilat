<?php
include '../include/dbconnect.php';
session_start();



    //Guardar la geografia correcta
    $geografia = "";
    
    if(isset($_POST['cboGeografia']))
        $geografia = $_POST['cboGeografia'];

    if(isset($_POST['cboMunicipio']))
        $geografia = $_POST['cboMunicipio'];

    if(isset($_POST['cboCanton']))
        $geografia = $_POST['cboCanton'];


    $usuario = $_SESSION['IdUsuario'];
    $nombres = $_POST['txtNombres'];
    $apellidos = $_POST['txtApellidos'];
    $dui = $_POST['txtDui'];
    $fnacimiento = $_POST['txtFNacimiento'];
<<<<<<< HEAD
    



=======
    $geografia = $_POST['z'];
>>>>>>> 6b005de6b121a84db0feecdd311434779ad8a025
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


    //Datos del Responsable
    $NombreResponsable = $_POST['txtNombresResponsable'];
    $ApellidosResponsable = $_POST['txtApellidosResponsable'];
    $DuiResponsable = $_POST['txtDuiResponsable'];
    $Parentesco = $_POST['txtParentesco'];


    $insertexpediente = "INSERT INTO persona 
                        (
                            Nombres,Apellidos,Dui,FechaNacimiento,IdGeografia,Direccion
                            ,Genero,IdEstadoCivil,IdParentesco,Telefono
                            ,Celular,Correo,Alergias,Medicamentos,Enfermedad
                            ,TelefonoResponsable,IdEstado,Categoria
                            ,NombresResponsable,ApellidosResponsable,DuiResponsable,Parentesco
                        )
                        VALUES 
                        (
                            '$nombres','$apellidos','$dui','$fnacimiento','$geografia','$direccion'
                            ,'$genero','$estadocivil','$parentesco','$telefono'
                            ,'$celular','$correo','$alergias','$medicinas','$enfermedad'
                            ,'$telefonoresponsable',1,'$categoria'
                            ,'$NombresResponsable','$ApellidosResponsable','$DuiResponsable','$Parentesco'
                        )";


    $resultadoinsertmovimiento = $mysqli->query($insertexpediente);
    header('Location: ../web/index.php?r=persona');
?>
