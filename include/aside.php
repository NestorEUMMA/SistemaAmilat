

    <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
              <div class="user-panel">
        <div class="pull-left image">
          </br>
          </br>
        </div>
      <div class="pull-left info">
         <center> <p> Perfil: <?php echo $puesto ?> </p> </center>
          <small><i class="fa fa-circle text-success"></i> Online</small>
          </br>
        </div>
        </br>
      </div>

          <ul class="sidebar-menu">
            <li class="header">MENU DE NAVEGACION</li>

            <?php
              if ($_SESSION['IdPuesto'] == 6){
                ?>
              <li class="treeview">
              <a href="#">
                <i class="fa fa-hospital-o"></i> <span>Ingreso de Pacientes</span> <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="../web/index.php?r=persona"><i class="fa fa-user-plus"></i> Pacientes </a></li>
              </ul>
              </li>
              <li class="treeview">
              <a href="#">
                <i class="fa fa-medkit"></i> <span>Ingreso de Consulta</span> <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="../php/recepcion_buscar_paciente.php"><i class="fa fa-search"></i> Buscar Paciente </a></li>
              </ul>
              </li>
             <li class="treeview">
              <a href="#">
                <i class="fa fa-bar-chart"></i> <span>Reportes</span> <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="../php/reporte_pacientes.php"><i class="fa fa-archive"></i> Expediente  </a></li>
              </ul>
              </li>
                <?php

              }

              if($_SESSION['IdPuesto'] == 1){
                  ?>

              <li class="treeview">
              <a href="#">
                <i class="fa fa-users"></i> <span>Administrador de Usuarios</span> <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                  <li><a href="../web/index.php?r=usuario"><i class="fa fa-user"></i> Usuarios </a></li>
                <li><a href="../web/index.php?r=puesto"><i class="fa fa-institution"></i> Puesto </a></li>
                <li><a href="../web/index.php?r=estadocivil"><i class="fa fa-gears"></i> Estado Civil </a></li>
              </ul>
            </li>

            <li class="treeview">
              <a href="#">
                <i class="fa fa-hospital-o"></i> <span>Administrador de Medicos</span> <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="../web/index.php?r=enfermedad"><i class="fa fa-reorder"></i> Enfermedades </a></li>
                <li><a href="../web/index.php?r=modulo"><i class="fa fa-keyboard-o"></i> Modulos </a></li>
                <li><a href="../web/index.php?r=tipo-diagnostico"><i class="fa fa-line-chart"></i> Tipo de Diagnostico </a></li>
              </ul>
            </li>
            <li class="treeview">
              <a href="#">
                <i class="fa fa-dollar"></i> <span>Socioeconomico</span> <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="../web/index.php?r=pregunta"><i class="fa fa-check-square"></i> Preguntas </a></li>
                <li><a href="../web/index.php?r=respuesta"><i class="fa fa-dot-circle-o"></i> Respuestas </a></li>
                <li><a href="../web/index.php?r=factor"><i class="fa fa-plus-square-o"></i> Factor </a></li>
                <li><a href="../web/index.php?r=geografia"><i class="fa fa-subway"></i> Geografia </a></li>
                <li><a href="../web/index.php?r=pais"><i class="fa fa-map"></i> Pais </a></li>
              </ul>
            </li>

                  <?php
              }

              if($_SESSION['IdPuesto'] == 5){
                  ?>
                    <li class="treeview">
              <a href="#">
                <i class="fa fa-heartbeat"></i> <span>Enfermeria</span> <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                  <li><a href="../php/enfermeria_index.php"><i class="fa fa-heart"></i> Pacientes en Consulta </a></li>
                  <li><a href="../php/enfermeria_index_sinconsulta.php"><i class="fa fa-ambulance"></i> Procedimientos </a></li>
              </ul>
            </li>
                  <?php
              }


              if($_SESSION['IdPuesto'] == 2){
                  ?>
                    <li class="treeview">
              <a href="#">
                <i class="fa fa-user-md"></i> <span>Consultas</span> <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                  <li><a href="../php/medico_index_consulta.php"><i class="fa fa-stethoscope"></i> Consultas Activas </a></li>
                  <!-- <li><a href="../web/farmacia_ingreso_medicamentos.php"><i class="fa fa-circle-o"></i>Existencias de Medicamentos</a> -->
              </ul>
            </li>
                  <?php
              }

            if($_SESSION['IdPuesto'] == 3){
                ?>
          <li class="treeview">
            <a href="#">
              <i class="fa fa-dashboard"></i> <span>Laboratorio</span> <i class="fa fa-angle-left pull-right"></i>
            </a>
            <ul class="treeview-menu">
                <li><a href="../php/laboratorio_index_paciente.php"><i class="fa fa-circle-o"></i> Examenes Pendientes </a></li>
                <li><a href="../php/laboratorio_pacientes_externos.php"><i class="fa fa-circle-o"></i> Pacientes Externos</a></li>
            </ul>
          </li>
          <li class="treeview">
            <a href="#">
              <i class="fa fa-dashboard"></i> <span>Reportes</span> <i class="fa fa-angle-left pull-right"></i>
            </a>
            <ul class="treeview-menu">
                <li><a href="../php/laboratorio_buscarpaciente.php"><i class="fa fa-circle-o"></i> Busqueda de Pacientes </a></li>
            </ul>
          </li>
                <?php
            }

            if($_SESSION['IdPuesto'] == 4){
                ?>
                <li class="treeview">
              <a href="#">
                <i class="fa fa-dashboard"></i> <span>Ver Recetas Activas</span> <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                  <li><a href="../web/farmacia_vista_farmacia.php"><i class="fa fa-circle-o"></i> Farmacia </a></li>

              </ul>
            </li>
              <li class="treeview">
            <a href="#">
              <i class="fa fa-dashboard"></i> <span>Ingreso de Medicamentos</span> <i class="fa fa-angle-left pull-right"></i>
            </a>
            <ul class="treeview-menu">
                <li><a href="../web/farmacia_ingreso_medicamentos.php"><i class="fa fa-circle-o"></i> Ingreso de Medicamentos </a></li>
                <li><a href="../web/index.php?r=laboratorio"><i class="fa fa-circle-o"></i> Ingreso de Laboratorio </a></li>
                <li><a href="../web/index.php?r=categoria"><i class="fa fa-circle-o"></i> Ingreso de Categoria </a></li>
                <li><a href="../web/index.php?r=unidadmedida"><i class="fa fa-circle-o"></i> Ingreso de Unidad de Medida </a></li>
                <li><a href="../web/index.php?r=presentacion"><i class="fa fa-circle-o"></i> Ingreso de Presentacion </a></li>
            </ul>
          </li>
              <li class="treeview">
            <a href="#">
              <i class="fa fa-dashboard"></i> <span>Ingreso de Bajas</span> <i class="fa fa-angle-left pull-right"></i>
            </a>
            <ul class="treeview-menu">
                <li><a href="../web/farmacia_baja_lotes.php"><i class="fa fa-circle-o"></i> Bajas </a></li>
            </ul>
          </li>
          <li class="treeview">
            <a href="#">
              <i class="fa fa-dashboard"></i> <span>Reportes</span> <i class="fa fa-angle-left pull-right"></i>
            </a>
            <ul class="treeview-menu">
                <li><a href="../web/farmacia_vista_kardex.php"><i class="fa fa-circle-o"></i> Entradas y Salidas </a></li>
                <li><a href="../web/farmacia_salidas_diarias.php"><i class="fa fa-circle-o"></i> Salidas Diarias </a></li>
                <li><a href="../web/farmacia_reporte_bajas.php"><i class="fa fa-circle-o"></i> Reporte de Bajas </a></li>
            </ul>
          </li>
             <?php
            }
            if($_SESSION['IdPuesto'] == 7){
                ?>
                <li class="treeview">
              <a href="#">
                <i class="fa fa-dashboard"></i> <span> Expedientes </span> <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                  <li><a href="../web/index.php?r=persona"><i class="fa fa-circle-o"></i> Nuevo Expediente </a></li>
              </ul>
            </li>
              <li class="treeview">
            <a href="#">
              <i class="fa fa-dashboard"></i> <span>Consultas</span> <i class="fa fa-angle-left pull-right"></i>
            </a>
            <ul class="treeview-menu">
                <li><a href="../php/pasante_index_paciente.php"><i class="fa fa-circle-o"></i> Ingreso de Consultas </a></li>
            </ul>
          </li>
                <?php
            }
          ?>

          </ul>

          <?php include_once 'dbconnect.php'; ?>
        </section>
        <!-- /.sidebar -->
      </aside>
