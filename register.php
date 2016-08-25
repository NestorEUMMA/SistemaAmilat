<!DOCTYPE html>
<html>
  
  <?php include("include/assetLogin.php"); ?>

  <link href="http://fonts.googleapis.com/css?family=Kotta+One|Cantarell:400,700" rel="stylesheet" type="text/css">
  <link rel="stylesheet" href="web/css/presentational-only/presentational-only.css">
  <link rel="stylesheet" href="web/css/responsive-full-background-image.css">
  <link rel="stylesheet" href="web/dist/parsley.css">
  <script src="web/dist/parsley.min.js"></script>
  <script src="web/dist/i18n/es.js"></script>
  

  <body  >
  <header class="container">

    </br>
    </br>
    </br>
    </br>

    <div class="register-box">

  <div class="register-box-body">
    <h4 class="login-box-msg">Registro de Nuevo Usuario</h4>

          <form action="php/index_guardar_nuevousuario.php" method="post" id="demo-form" data-parsley-validate="">
            <div class="form-group has-feedback">
              <input type="text" class="form-control" id="username" name="txtInicioSesion" placeholder="Inicio de Sesion" required="">
              <span class="glyphicon glyphicon-user form-control-feedback"></span>
              <center><div id="Info"></div></center>
            </div>
            <div class="form-group has-feedback">
              <input type="text" class="form-control" name="txtNombre" placeholder="Nombre" required="">
              <span class="glyphicon glyphicon-user form-control-feedback"></span>
            </div>
              <div class="form-group has-feedback">
              <input type="text" class="form-control" name="txtApellido" placeholder="Apellido" required="">
              <span class="glyphicon glyphicon-user form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
              <input type="email" class="form-control" name="txtCorreo" placeholder="Correo">
              <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
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

    <a href="index.php" class="text-center">Actualmente tengo un Usuario</a>
  </div>

</div>
    <section class="content">
    </section>
  </header>
</body>
</html>

<script type="text/javascript">
$(document).ready(function() {  
  $('#username').blur(function(){
    
    $('#Info').html('<img src="loader.gif" alt="" />').fadeOut(1000);

    var username = $(this).val();   
    var dataString = 'username='+username;
    
    $.ajax({
            type: "POST",
            url: "check.php",
             data: dataString,
            success: function

            (data) {
        $('#Info').fadeIn(1000).html(data);
        //alert(data);
            }
        });
    });              
  

  $('#demo-form').parsley().on('field:validated', function() {
    var ok = $('.parsley-error').length === 0;
    $('.bs-callout-info').toggleClass('hidden', !ok);
    $('.bs-callout-warning').toggleClass('hidden', ok);

  })
  .on('form:submit', function() {
    return true;
  });
});    
</script>
