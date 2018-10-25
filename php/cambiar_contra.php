<?php 
session_start();
include("../include/assetLogin.php"); 
$idusuario = $_SESSION['IdUsuario'];
?>
<!DOCTYPE html>
<html>
  

  <link href="http://fonts.googleapis.com/css?family=Kotta+One|Cantarell:400,700" rel="stylesheet" type="text/css">
  <link rel="stylesheet" href="../web/css/presentational-only/presentational-only.css">
  <link rel="stylesheet" href="../web/css/responsive-full-background-image.css">
  <link rel="stylesheet" href="../web/dist/parsley.css">
  <script src="../web/dist/parsley.min.js"></script>
  <script src="../web/dist/i18n/es.js"></script>
  

  <body  >
  <header class="container">

    </br>
    </br>
    </br>
    </br>

    <div class="register-box">

  <div class="register-box-body">
    <h4 class="login-box-msg">Cambio de Contraseña</h4>

          <form action="index_cambio_contra.php" method="post" id="demo-form" data-parsley-validate="">
 
            <div class="form-group has-feedback">
               <div class="hidden">
                <textarea  type="text" rows="4" class="form-control"   name="txtconsultaID"> <?php echo $idusuario ?> </textarea>
              </div>
              <input type="password" class="form-control" id="password" placeholder="Contraseña" required="" >
              <span class="glyphicon glyphicon-lock form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
              <input type="password" class="form-control" name="txtClave" placeholder="Reingrese Contraseña" required="" data-parsley-equalto="#password">
              <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
            </div>
            <div class="row">
              <div class="col-xs-8">
              </div>
              <!-- /.col -->
              <div class="col-xs-4">
                <button type="submit" class="btn btn-primary btn-block btn-flat">Registrar</button>
              </div>
              <!-- /.col -->
            </div>
          </form>

    <a href="app.php" class="text-center">Regresar</a>
  </div>

</div>
    <section class="content">
    </section>
  </header>
</body>
</html>

