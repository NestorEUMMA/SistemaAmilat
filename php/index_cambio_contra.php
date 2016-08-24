<html>
<head>
    <script src="../web/plugins/jQuery/jQuery-2.2.0.min.js"></script>

</head>
<body>
 <?php

include '../include/dbconnect.php';
session_start();

    $idusuario = $_POST['txtconsultaID'];
    $pass = $_POST['txtClave'];



       $insertexpediente = "UPDATE usuario SET Clave=MD5('$pass') where IdUsuario=$idusuario ";
       $resultadoinsertmovimiento = $mysqli->query($insertexpediente);

  
?>
        

        <form id="frm" action="app.php" method="post">
        </form>

                <script type="text/javascript">
                        $(document).ready(function(){
                                        $("#frm").submit();
                        });
                </script>

<?php

?>
</body>
</html>