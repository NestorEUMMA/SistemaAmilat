      <?php

      include '../include/dbconnect.php';
      session_start();

      if (!empty($_SESSION['user']))
        {

                $queryfichaconsulta = "SELECT  count(c.FechaConsulta) as 'Listado', (SELECT count(p.Genero) FROM persona p INNER JOIN consulta c on c.IdPersona = p.IdPersona WHERE p.Genero = 'MASCULINO' and c.FechaConsulta = curdate()) as 'Hombre', 
                  (SELECT count(p.Genero) FROM persona p INNER JOIN consulta c on c.IdPersona = p.IdPersona WHERE p.Genero = 'FEMENINO' and c.FechaConsulta = curdate() ) as 'Mujer'  
                  FROM 
                  consulta c
                  INNER JOIN persona p on c.IdPersona = p.IdPersona
                  WHERE c.FechaConsulta = CURDATE() ";

                  $resultadofichaconsulta = $mysqli->query($queryfichaconsulta);
                  while ($test = $resultadofichaconsulta->fetch_assoc())
                  {
                      $listado = $test['Listado'];
                      $hombres = $test['Hombre'];
                      $mujeres = $test['Mujer'];
                  }

                  $Hresultado = $hombres * 100;

                  $hombresPor = 0; 

                  if($listado != 0)
                    $hombresPor = $Hresultado / $listado;

                  
                  $Mresultado = 0;
                  $Mresultado = $mujeres * 100;
                  
                  $mujeresPor = 0;
                  if($listado != 0)
                    $mujeresPor = $Mresultado / $listado;
                 

                  // QUERY PARA CALCULAR EDAD
                 $queryfichaconsulta2 = "SELECT
                        count(CASE 
                          WHEN TIMESTAMPDIFF(YEAR,p.FechaNacimiento,CURDATE()) = 0 THEN 'nino'
                          WHEN TIMESTAMPDIFF(YEAR,p.FechaNacimiento,CURDATE()) <= 18 THEN 'nino'
                        END) As 'Nino',
                        count(CASE 
                          WHEN TIMESTAMPDIFF(YEAR,p.FechaNacimiento,CURDATE()) > 18 THEN 'adulto'
                        END) As 'Adulto' 
                      FROM consulta c
                      INNER JOIN persona p on c.IdPersona = p.IdPersona
                      WHERE c.FechaConsulta = CURDATE()";

                  $resultadofichaconsulta2 = $mysqli->query($queryfichaconsulta2);
                  while ($test = $resultadofichaconsulta2->fetch_assoc())
                  {
                      $nino = $test['Nino'];
                      $adulto = $test['Adulto'];
                  }



                 $queryfichaconsulta3 = "SELECT count(c.Activo) as Activo
                    FROM 
                    consulta c
                    WHERE c.FechaConsulta = CURDATE() and Activo = 1";

                  $resultadofichaconsulta3 = $mysqli->query($queryfichaconsulta3);
                  while ($test = $resultadofichaconsulta3->fetch_assoc())
                  {
                      $activo = $test['Activo'];
                  }



      ?>

      <!DOCTYPE html>
      <html>

         <?php  include '../include/asset.php'; ?>
         <body class="hold-transition skin-blue sidebar-mini sidebar-collapse">
          <!-- Site wrapper -->
          <div class="wrapper">


           <?php include '../include/header.php'; ?>
            <?php include '../include/aside.php'; ?>


            <div class="content-wrapper">

                <section class="content-header">
                  <h1>
                    Sistema Amilat
                    <small>Adminstración de Inventarios y Farmacia</small>
                  </h1>
                  <ol class="breadcrumb">
                  </ol>
                </section>


                <section class="content">
                <div class="row">
                    <div class="col-lg-3 col-xs-6">
                      <!-- small box -->
                      <div class="small-box bg-aqua">
                        <div class="inner">
                          <h3> <?php echo $listado; ?> </h3>

                          <p>Pacientes atendidos</p>
                        </div>
                        <div class="icon">
                          <i class="ion ion-bag"></i>
                        </div>
                        <a href="#" class="small-box-footer"><i class="fa fa-arrow-circle-right"></i></a>
                      </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-xs-6">
                      <!-- small box -->
                      <div class="small-box bg-green">
                        <div class="inner">
                          <h3 id=""> <?php echo $adulto; ?> </h3>

                          <p>Adultos</p>
                        </div>
                        <div class="icon">
                          <i class="ion ion-stats-bars"></i>
                        </div>
                        <a href="#" class="small-box-footer"> <i class="fa fa-arrow-circle-right"></i></a>
                      </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-xs-6">
                      <!-- small box -->
                      <div class="small-box bg-yellow">
                        <div class="inner">
                          <h3 id=""> <?php echo $nino; ?> </h3>

                          <p>Niños</p>
                        </div>
                        <div class="icon">
                          <i class="ion ion-person-add"></i>
                        </div>
                        <a href="#" class="small-box-footer"> <i class="fa fa-arrow-circle-right"></i></a>
                      </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-xs-6">
                      <!-- small box -->
                      <div class="small-box bg-red">
                        <div class="inner">
                          <h3 id=""> <?php echo $activo; ?></h3>

                          <p>En proceso</p>
                        </div>
                        <div class="icon">
                          <i class="ion ion-pie-graph"></i>
                        </div>
                        <a href="#" class="small-box-footer"> <i class="fa fa-arrow-circle-right"></i></a>
                      </div>
                    </div>
                    <!-- ./col -->
                  </div>


                  <div class="row">
                    <div class="col-lg-3 col-xs-6">
                      <!-- small box -->
                      <div class="small-box bg-maroon">
                        <div class="inner">
                          <h3 id=""> <?php echo $mujeres; ?></h3>

                          <p>Mujeres atendidas</p>
                        </div>
                        <div class="icon">
                          <i class="ion ion-bag"></i>
                        </div>
                        <a href="#" class="small-box-footer"> <i class="fa fa-arrow-circle-right"></i></a>
                      </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-xs-6">
                      <!-- small box -->
                      <div class="small-box bg-blue">
                        <div class="inner">
                          <h3 id=""> <?php echo $hombres ?></h3>

                          <p>Hombres atendidos</p>
                        </div>
                        <div class="icon">
                          <i class="ion ion-stats-bars"></i>
                        </div>
                        <a href="#" class="small-box-footer"> <i class="fa fa-arrow-circle-right"></i></a>
                      </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-xs-6">
                      <!-- small box -->
                      <div class="small-box bg-purple">
                        <div class="inner">
                          <h3 id=""><?php echo $mujeresPor;?>%</h3>

                          <p>Mujeres atendidas</p>
                        </div>
                        <div class="icon">
                          <i class="ion ion-person-add"></i>
                        </div>
                        <a href="#" class="small-box-footer"> <i class="fa fa-arrow-circle-right"></i></a>
                      </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-xs-6">
                      <!-- small box -->
                      <div class="small-box bg-navy">
                        <div class="inner">
                          <h3 id=""> <?php echo $hombresPor;?>% </h3>

                          <p>Hombres atendidos</p>
                        </div>
                        <div class="icon">
                          <i class="ion ion-pie-graph"></i>
                        </div>
                        <a href="#" class="small-box-footer"> <i class="fa fa-arrow-circle-right"></i></a>
                      </div>
                    </div>
                    <!-- ./col -->
                  </div>



                </section>

            </div>

          <?php include '../include/footer.php'; ?>

        </body>
      </html>
      
      <script>

      // request permission on page load
      document.addEventListener('DOMContentLoaded', function () {
        if (Notification.permission !== "granted")
          Notification.requestPermission();
      });

      var date = new Date();
      if(date.getDay() == 4){
         notifyMe("VEA EXISTENCIA DE MEDICAMENTOS AQUÍ");
      }else{
        notifyMe("BIENVENIDO");
      }

      function audioNotification(){
        //var yourSound = new Audio('http://localhost:8080/SistemaAmilat/img/MgsAlert.mp3');
        //var yourSound = new Audio('http://sistema.shalom.org/SistemaAmilat/img/MgsAlert.mp3');
        var yourSound = new Audio('hhttp://localhost/SistemaAmilat/img/MgsAlert.mp3');
        yourSound.play();
      }


      function notifyMe(texto) {
        if (!Notification) {
          alert('Desktop notifications not available in your browser. Try Chromium.');
          return;
        }

        if (Notification.permission !== "granted")
          Notification.requestPermission();
        else {
          var notification = new Notification('Sistema Amilat', {
           // icon: 'http://localhost:8080/SistemaAmilat/img/logo22.png',
          // icon: 'http://sistema.shalom.org/SistemaAmilat/img/logo22.png',
            icon: 'http://localhost/SistemaAmilat/img/logo22.png',

            body: texto,
          });

           audioNotification();
          notification.onclick = function () {
           // window.open("http://stackoverflow.com/a/13328397/1269037");
          };

        }

      }

      </script>


      <?php
      }
      else{
        echo "
        <script>
          alert('No ha iniciado sesion');
          document.location='../index.php';
        </script>
        ";
      }
      ?>

<script type="text/javascript">
$(document).ready(function () {
   //alert("OKK");
   $.ajax({
      type: 'POST',
      url: 'dashboard.json',
      data: {},
      success: function(data){
        $.each(data, function(i,v){
            $("#lblTotalPacientes").html(v.Total);
            $("#lblAdultos").html(v.Adultos);
            $("#lblNinos").html(v.Ninos);
            $("#lblEnProceso").html(v.EnProceso);

            $("#lblHombres").html(v.Hombres);
            $("#lblHombresPor").html(v.PorHombres + "%");
            $("#lblMujeres").html(v.Mujeres);
            $("#lblMujeresPor").html(v.PorMujeres + "%");

        });
      },
      error: function(xhr, type, exception) { 
        // if ajax fails display error alert
        alert("ajax error response type "+type);
      }
    });

});
</script>

