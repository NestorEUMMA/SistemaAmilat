<html>
<head>
	<script src="../web/plugins/jQuery/jQuery-2.2.0.min.js"></script>



</head>
<body>
 <?php

include '../include/dbconnect.php';
session_start();

    $username = $_POST['txtInicioSesion'];
    $InicioSesion = $_POST['txtInicioSesion'];
    $Nombre = $_POST['txtNombre'];
    $Apellido = $_POST['txtApellido'];
    $Correo = $_POST['txtCorreo'];
    $Clave = $_POST['txtClave'];

    $query = "select * from usuario where InicioSesion = '".strtolower($username)."'";
    $results = $mysqli->query( $query) or die('ok');
    
    if($results->fetch_assoc() > 0) // not available
    {
        echo '<script type="text/javascript">
            $(document).ready(function(){
                    alert("Este usuario existe, intente ingresar otro Usuario");
                    $("#frm").submit();         
            });

        </script>';
    }
    else
    {
        $insertexpediente = "INSERT INTO usuario(InicioSesion,Nombres,Apellidos,Correo,Clave,Activo,FechaIngreso)"
                       . "VALUES ('$InicioSesion','$Nombre','$Apellido','$Correo',MD5('$Clave'),0,now())";

        $resultadoinsertmovimiento = $mysqli->query($insertexpediente);

        echo '<script type="text/javascript">
            $(document).ready(function(){
                    alert("Datos Guardados");
                    $("#frm2").submit();         
            });

        </script>';
    }

		
    

?>


        <form id="frm" action="../register.php" method="post" class="hidden" >
        </form>
        <form id="frm2" action="../index.php" method="post" class="hidden" >
        </form>

</body>
</html>