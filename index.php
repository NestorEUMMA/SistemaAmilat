<?php
session_start();
include 'include/dbconnect.php';

if(isset($_POST['btn-login']))
{
 $InicioSesion = $_POST['InicioSesion'];
 $Clave = $_POST['Clave'];
 $queryusuario = "
SELECT a.IdUsuario, a.InicioSesion, b.IdPuesto, b.Descripcion as NombrePuesto, concat(a.Nombres, ' ', a.Apellidos) as NombreCompleto
FROM usuario as a 
inner join puesto as b on b.IdPuesto = a.IdPuesto
WHERE InicioSesion='$InicioSesion' and Clave = md5('$Clave') and Activo = 1
";
 $resultado_usuario = $mysqli->query($queryusuario);
 while ($row = $resultado_usuario->fetch_assoc()) {
        $_SESSION['IdUsuario'] = $row['IdUsuario']; 
        $_SESSION['user'] = $row['InicioSesion'];
        $_SESSION['IdPuesto'] = $row['IdPuesto'];
        $_SESSION['NombrePuesto'] = $row['NombrePuesto'];
        $_SESSION['IdPuesNombreCompletoto'] = $row['NombreCompleto'];
              }

if(!empty($_SESSION['user']))
{
 header("Location: php/app.php");
}
 else
 {
  ?>
        <script>alert('Usuario y/o contraseña incorrectos');</script>
        <?php
 }
}
?>



<!DOCTYPE html>
<html>
  
  <?php include("include/assetLogin.php"); ?>

  <link href="http://fonts.googleapis.com/css?family=Kotta+One|Cantarell:400,700" rel="stylesheet" type="text/css">
  <link rel="stylesheet" href="web/css/presentational-only/presentational-only.css">
  <link rel="stylesheet" href="web/css/responsive-full-background-image.css">

  <body  >
  <header class="container">

    </br>
    </br>
    </br>
    </br>

    <div class="login-box">
        <div >
          <!-- <center><h1><b>Admin</b>LTE</h1></center> -->
        </div>
          <div class="login-box-body">
              <h4 class="login-box-msg">Inicio de Sesion</h4>
              <form method="POST">
                <div class="form-group has-feedback">
                  <input type="text" class="form-control" placeholder="Usuario" id="InicioSesion" name="InicioSesion">
                  <span class="glyphicon glyphicon-user form-control-feedback"></span>
                </div>
                <div class="form-group has-feedback">
                  <input type="password" class="form-control" placeholder="Contraseña" id="Clave" name="Clave">
                  <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                </div>
                <div class="row">
                  <div class="col-xs-8">
                    <div class="checkbox icheck">
                      <label>             
                      </label>
                    </div>
                  </div>
                  <div class="col-xs-4">
                    <button type="submit" name="btn-login" class="btn btn-primary btn-block btn-flat">Inicio</button>

                  </div>
                </div>
              </form>
            <a href="register.php" class="text-center">Registro de Nuevo Usuario</a>
            </div>
          </div>
    <section class="content">
    </section>
  </header>
</body>
</html>