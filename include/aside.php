

    <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
              <div class="user-panel">
        <div class="pull-left image">
          </br>
          </br>
        </div>
        <div class="pull-left info">
         <center> <p> Perfil: <?php echo $puesto; ?> </p> </center>
          <small><i class="fa fa-circle text-success"></i> Online</small>
        </div>
      </div>

          <ul class="sidebar-menu">
            <li class="header">MENU DE NAVEGACION</li>

            <?php
              if ($_SESSION['IdPuesto'] == 6){
                ?>
              <li class="treeview">
              <a href="#">
                <i class="fa fa-dashboard"></i> <span>Ingreso de Pacientes</span> <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="../web/index.php?r=persona"><i class="fa fa-circle-o"></i> Pacientes </a></li>
                <li><a href="../web/index.php?r=geografia"><i class="fa fa-circle-o"></i> Geografia </a></li>
              </ul>
              </li>
              <li class="treeview">
              <a href="#">
                <i class="fa fa-dashboard"></i> <span>Ingreso de Consulta</span> <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="../php/recepcion_buscar_paciente.php"><i class="fa fa-circle-o"></i> Buscar Paciente </a></li>
              </ul>
              </li>
             <li class="treeview">
              <a href="#">
                <i class="fa fa-dashboard"></i> <span>Reportes</span> <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="../php/reporte_pacientes.php"><i class="fa fa-circle-o"></i> Expediente  </a></li>
              </ul>
              </li>
                <?php

              }

              if($_SESSION['IdPuesto'] == 1){
                  ?>

              <li class="treeview">
              <a href="#">
                <i class="fa fa-dashboard"></i> <span>Administrador de Usuarios</span> <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                  <li><a href="../web/index.php?r=usuario"><i class="fa fa-circle-o"></i> Usuarios </a></li>
                <li><a href="../web/index.php?r=puesto"><i class="fa fa-circle-o"></i> Puesto </a></li>
                <li><a href="../web/index.php?r=estadocivil"><i class="fa fa-circle-o"></i> Estado Civil </a></li>
              </ul>
            </li>

            <li class="treeview">
              <a href="#">
                <i class="fa fa-dashboard"></i> <span>Administrador de Medicos</span> <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="../web/index.php?r=enfermedad"><i class="fa fa-circle-o"></i> Enfermedades </a></li>
                <li><a href="../web/index.php?r=modulo"><i class="fa fa-circle-o"></i> Modulos </a></li>
                <li><a href="../web/index.php?r=tipo-diagnostico"><i class="fa fa-circle-o"></i> Tipo de Diagnostico </a></li>
              </ul>
            </li>

                  <?php
              }

              if($_SESSION['IdPuesto'] == 5){
                  ?>
                    <li class="treeview">
              <a href="#">
                <i class="fa fa-dashboard"></i> <span>Enfermeria</span> <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                  <li><a href="../php/enfermeria_index.php"><i class="fa fa-circle-o"></i> Pacientes con Consulta </a></li>
                  <li><a href="../php/enfermeria_index_sinconsulta.php"><i class="fa fa-circle-o"></i> Procedimientos </a></li>
              </ul>
            </li>
                  <?php
              }


              if($_SESSION['IdPuesto'] == 2){
                  ?>
                    <li class="treeview">
              <a href="#">
                <i class="fa fa-dashboard"></i> <span>Consultas</span> <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                  <li><a href="../php/medico_index_consulta.php"><i class="fa fa-circle-o"></i> Consultas Activas </a></li>
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
                 <li><a href="../php/laboratorio_pacientes_externos.php"><i class="fa fa-circle-o"></i> Pacientes Externos Activos </a></li>
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
                <li><a href="../web/farmacia_ingreso_lotes.php"><i class="fa fa-circle-o"></i> Ingreso de Lotes </a></li>
                <li><a href="../web/index.php?r=laboratorio"><i class="fa fa-circle-o"></i> Ingreso de Laboratorio </a></li>
                <li><a href="../web/index.php?r=categoria"><i class="fa fa-circle-o"></i> Ingreso de Categoria </a></li>
                <li><a href="../web/index.php?r=unidadmedida"><i class="fa fa-circle-o"></i> Ingreso de Unidad de Medida </a></li>
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
