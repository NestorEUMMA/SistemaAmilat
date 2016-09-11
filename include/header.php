<?php
  
        $queryexpedientesu = "SELECT a.IdUsuario, a.InicioSesion, b.IdPuesto, b.Descripcion as NombrePuesto, concat(a.Nombres, ' ', a.Apellidos) as NombreCompleto, a.FechaIngreso as Fecha
          FROM usuario as a 
          inner join puesto as b on b.IdPuesto = a.IdPuesto
          WHERE InicioSesion =  '" . $_SESSION['user'] . "'";
       $resultadoexpedientesu = $mysqli->query($queryexpedientesu);
       while ($test = $resultadoexpedientesu->fetch_assoc())
                  {
                      $puesto = $test['NombrePuesto'];
                      $nombreusuario = $test['NombreCompleto'];
                      $fecha = $test['Fecha'];
  
                  }

 ?>

     <header class="main-header">
        <!-- Logo -->
        <a href="../php/app.php" class="logo">
          <!-- mini logo for sidebar mini 50x50 pixels -->
          <span class="logo-mini"><b>S</b>A</span>
          <!-- logo for regular state and mobile devices -->
          <span class="logo-lg"><b>Sistema</b>Amilat</span>
        </a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </a>
         
          <div class="navbar-custom-menu">

            <ul class="nav navbar-nav">
              <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <span class="hidden-xs"> BIENVENIDO: <?php echo $_SESSION['user'] ?> </span>
                </a>
                <ul class="dropdown-menu">
                 <li class="user-header">
                <img src="../img/Captura.JPG" alt="User Image">

                <p>
                   <?php echo $nombreusuario; ?> - <?php echo $puesto; ?>
                    <small>Miembro desde <?php echo $fecha;  ?></small>
                </p>
              </li>
              <li class="user-body">
                <div class="row">
                  <div class="col-xs-4 text-center">
                    <a href="#"></a>
                  </div>
                  <div class="col-xs-4 text-center">
                    <a href="#"></a>
                  </div>
                  <div class="col-xs-4 text-center">
                    <a href="#"></a>
                  </div>
                </div>
                <!-- /.row -->
              </li>
        

                  <!-- Menu Footer-->
                  <li class="user-footer">
                    <div class="pull-left">
                      <a href="../php/cambiar_contra.php" class="btn btn-default btn-flat">Cambiar Contraseña</a>
                    </div>
                    <div class="pull-right">
                  <a href="../include/logout.php?logout" class="btn btn-default btn-flat">Cerrar Sesion</a>
                    </div>
                  </li>
                </ul>
              </li>
              <!-- Control Sidebar Toggle Button -->

            </ul>
          </div>
        </nav>
      </header>
  