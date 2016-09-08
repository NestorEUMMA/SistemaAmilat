<?php
include '../include/dbconnect.php';
session_start();



    //Guardar la geografia correcta
    $geografia = "";
    
    if(isset($_POST['txtDepartamento']))
        $geografia = $_POST['txtDepartamento'];

    if(isset($_POST['txtMunicipio']))
        $geografia = $_POST['txtMunicipio'];

    if(isset($_POST['txtCanton']))
        $geografia = $_POST['txtCanton'];


    $usuario = $_SESSION['IdUsuario'];
    $Nombres = $_POST['txtNombres'];
    $Apellidos = $_POST['txtApellidos'];
    $FechaNacimiento = $_POST['txtFechaNacimiento'];
    $Direccion = $_POST['txtDireccion'];
    $Correo = $_POST['txtCorreo'];
    $IdGeografia = $geografia;
    $Genero = $_POST['txtGenero'];
    $IdEstadoCivil = $_POST['txtIdEstadoCivil'];
    $IdParentesco = 1; //$_POST['txt'];
    $Telefono = $_POST['txtTelefono'];
    $Celular = $_POST['txtCelular'];
    $Alergias = $_POST['txtAlergias'];
    $Medicamentos = $_POST['txtMedicamentos'];
    $Enfermedad = $_POST['txtEnfermedad'];
    $Dui = $_POST['txtDui'];
    $TelefonoResponsable = $_POST['txtTelefonoResponsable'];
    $IdEstado = "1";
    $Categoria = $_POST['txtCategoria'];

    //Datos del Responsable
    $NombresResponsable = $_POST['txtNombresResponsable'];
    $ApellidosResponsable = $_POST['txtApellidosResponsable'];
    $DuiResponsable = $_POST['txtDuiResponsable'];
    $Parentesco = $_POST['txtParentesco'];


    $insertexpediente = "INSERT INTO persona 
                        (
                             Nombres,Apellidos,FechaNacimiento,Direccion
                            ,Correo,IdGeografia,Genero,IdEstadoCivil
                            ,IdParentesco,Telefono,Celular,Alergias
                            ,Medicamentos,Enfermedad,Dui,TelefonoResponsable
                            ,IdEstado,Categoria,NombresResponsable
                            ,ApellidosResponsable,Parentesco,DuiResponsable
                        )
                        VALUES 
                        (
                             '$Nombres','$Apellidos','$FechaNacimiento','$Direccion'
                            ,'$Correo','$IdGeografia','$Genero',$IdEstadoCivil
                            ,$IdParentesco,'$Telefono','$Celular','$Alergias'
                            ,'$Medicamentos','$Enfermedad','$Dui','$TelefonoResponsable'
                            ,'$IdEstado','$Categoria','$NombresResponsable'
                            ,'$ApellidosResponsable','$Parentesco','$DuiResponsable'
                        )";


    $resultadoinsertmovimiento = $mysqli->query($insertexpediente);

    $query = "select IdPersona from persona order by 1 desc limit 1";

    $tbl = $mysqli->query($query);
    $arr = array();

    while ($f = $tbl->fetch_assoc())
    {
      $arr[] = $f;
    }

    $IdPersona = $arr[0]["IdPersona"];


    //Insertando el registro para el test de la persona
    $strTest = "insert into test 
                    (IdPersona,IdClase,Fecha,Hora)
                VALUES
                    ($IdPersona,1,NOW(),NOW())
                ";
    $resultTest = $mysqli->query($strTest);


    //Determinando el IdTest
    $query = "select IdTest from test order by 1 desc limit 1";

    $tbl = $mysqli->query($query);
    $arrTest = array();

    while ($f = $tbl->fetch_assoc())
    {
      $arrTest[] = $f;
    }

    $IdTest = $arrTest[0]["IdTest"];


    //echo "<h1>$IdTest</h1>";


    //Barriendo las preguntas 
    $query = "select IdPregunta,Nombre from pregunta where IdFactor = 1;";
    $tblPreguntas = $mysqli->query($query);
    $arrPreguntas = array();

    while ($f = $tblPreguntas->fetch_assoc())
    {
        $IdPregunta = $f["IdPregunta"];
        $IdRespuesta = $_POST["selPregunta". $f["IdPregunta"]];
        $IdFactor = 1;

        $queryInsResp = "insert into testdetalle
                            (IdTest,IdFactor,IdPregunta,IdRespuesta)
                        values 
                            ($IdTest,$IdFactor,$IdPregunta,$IdRespuesta)
                        ";
        $resultInsResp = $mysqli->query($queryInsResp);
    }


    



    header('Location: ../web/index.php?r=persona');
?>
