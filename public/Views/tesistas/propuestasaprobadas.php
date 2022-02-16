<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Tesista | Propuestas Aprobadas</title>
  <?php

use App\Models\Profesores;
use App\Models\PropuestaTG;
use App\Models\Tesistas;

  include_once('../public/Views/componentes/cssadminlte.php'); ?>
  <!-- DATATABLES -->
</head>

<body class="sidebar-mini layout-fixed vsc-initialized layout-navbar-fixed sidebar-closed ">

  <div class="wrapper">


    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
      <!-- Left navbar links -->
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
      </ul>

      <!-- Right navbar links -->
      <ul class="navbar-nav ml-auto">
        <!-- Notifications Dropdown Menu -->
        <li class="nav-item dropdown">
          <a class="nav-link" data-toggle="dropdown" href="#">
            <i class="fas fa-cog"></i>
          </a>
          <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
            <span class="dropdown-item dropdown-header"><?php echo $tesista['nombre_usuario']; ?></span>
            <div class="dropdown-divider"></div>
            <a href="tesista-perfil" class="dropdown-item">
              <i class="fas fa-user"></i> Perfil
            </a>
            <div class="dropdown-divider"></div>
            <a href="login-cerrarsesion" class="dropdown-item">
              <i class="fas fa-sign-out-alt"></i>Cerrar Sesion
            </a>

          </div>
        </li>
        <li class="nav-item">
          <a class="nav-link" data-widget="fullscreen" href="#" role="button">
            <i class="fas fa-expand-arrows-alt"></i>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" data-widget="control-sidebar" data-controlsidebar-slide="true" href="#" role="button">
            <i class="fas fa-th-large"></i>
          </a>
        </li>
      </ul>
    </nav>

    <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Brand Logo -->
      <a href="index3.html" class="brand-link">
        <img src="../../dist/img/ucablogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">UCABG</span>
      </a>

      <!-- Sidebar -->
      <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
          <div class="image">
            <img src="../../dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
          </div>
          <div class="info">
            <a href="tesista-perfil" class="d-block"><?php echo $tesista['nombre_usuario']; ?></a>
          </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

            <li class="nav-item">
              <a href="tesistas" class="nav-link">
                <i class="nav-icon fas fa-th"></i>
                <p>
                  Panel de Control
                </p>
              </a>
            </li>


            <li class="nav-item">
              <a href="tesista-propuestas-aprobadas" class="nav-link active">
                <i class="nav-icon fas fa-table"></i>
                <p>
                  Propuestas Aprobadas
                </p>
              </a>

            </li>
          </ul>
        </nav>
      </div>
      <!-- /.sidebar -->
    </aside>
    <div class="content-wrapper">
      <div class="content-header">
        <div class="container-fluid">
          <?php foreach ($propuestasaprobadas as $propuestas) { ?>
            <?php
              $misjurados=(new Tesistas())->misjurados($propuestas['num_c'],$propuestas['modalidad']);
              ?>
            <div class="row">
              <div class="col-12 col-xl-8">
                <div class="card card-body border-0 shadow mb-4">
                  <h2 class="h5 mb-4">Nro Correlativo: <strong><?php echo $propuestas['num_c']; ?></strong></h2>
                  <div class="row">
                    <div class="col-md-12 mb-3">
                      <div>
                        <label for="first_name">Titulo de la Propuesta</label>
                        <input class="form-control" type="text" value=" <?php echo $propuestas['titulo']; ?>" disabled>
                      </div>
                    </div>

                  </div>
                  <div class="row align-items-center">
                    <div class="col-md-6 mb-3">
                      <div class="form-group">
                        <label>Modalidad</label>
                        <?php if ($propuestas['modalidad'] == 'I') { ?>
                          <input class="form-control" value="INSTRUMENTAL" disabled>
                        <?php } else { ?>
                          <input class="form-control" value="EXPERIMENTAL" disabled>
                        <?php } ?>
                      </div>
                    </div>
                    <div class="col-md-6 mb-3">
                      <div class="form-group ">
                        <label>Fecha de Defensa</label>
                        <input class="form-control" value="<?php echo $propuestas['fecha_defensa']; ?>" disabled>

                      </div>
                    </div>
           

                  </div>
                  <?php
                  $num_c = $propuestas['num_c'];
                  $sql = "SELECT COUNT(p.num_c) as cuenta
                          FROM presentan as p, evaluacioncomite as ec,evaluacionconsejo as ecj
                          where p.num_c=$num_c
                            and p.num_c=ecj.num_c
                            and p.num_C=ec.num_c
                            and ec.estatus='APROBADO'
                            and ecj.estatus='APROBADO'
                   ";
                  $valor = (new PropuestaTG())->sentenciaObj($sql);
                  $valor = $valor['cuenta'];
                  if ($valor == 2) {
                    $cedula = $_SESSION['cedula'];
                    $sql = "SELECT (p.cedula)
                              FROM presentan as p, evaluacioncomite as ec,evaluacionconsejo as ecj
                              where p.num_c=$num_c
                                and p.cedula!=$cedula
                                and p.num_c=ecj.num_c
                                and p.num_C=ec.num_c
                                and ec.estatus='APROBADO'
                                and ecj.estatus='APROBADO'";
                    $valor = (new PropuestaTG())->sentenciaObj($sql);
                    $valor = $valor['cedula'];
                    $sql = "SELECT cedula,nombre,correoucab,telefono FROM tesistas WHERE cedula=" . $valor . "";
                    $valor = (new PropuestaTG())->sentenciaObj($sql);
                  ?>
                    <h2 class="h5 mb-4">Datos del Compañero</h2>
                    <div class="row align-items-center">
                      <div class="col-md-6 mb-3">
                        <div class="form-group">
                          <label>Cedula</label>
                          <input class="form-control" value="<?php echo $valor['cedula']; ?>" disabled>
                        </div>
                      </div>
                      <div class="col-md-6 mb-3">
                        <div class="form-group">
                          <label for="email">Nombre</label>
                          <input class="form-control" value="<?php echo $valor['nombre']; ?>" disabled>
                        </div>
                      </div>
                      <div class="col-md-6 mb-3">
                        <div class="form-group">
                          <label>Correo Ucab</label>
                          <input class="form-control" value="<?php echo $valor['correoucab']; ?>" disabled>
                        </div>
                      </div>
                      <div class="col-md-6 mb-3">
                        <div class="form-group">
                          <label for="email">Telefono</label>
                          <input class="form-control" value="<?php echo $valor['telefono']; ?>" disabled>
                        </div>
                      </div>


                    </div>
                  <?php } ?>
                  <div class="row align-items-center">
                    <div class="col-md-12 mb-3">
                      <div class="form-group">
                        <label>Nota Final</label>
                        <?php $nota=(new Tesistas())->notafinal($_SESSION['cedula'],$propuestas['num_c'],$propuestas['modalidad']);?>
                        <input class="form-control w-20  <?php if($nota>10){?>bg-success<?php }else{?>bg-warning<?php }?> " <?php
                              if($nota>0){ ?>value="<?=$nota;}else?>" value="PENDIENTE" disabled>
                      </div>
                    </div>
                  </div>

                </div>
              </div>
              <div class="col-12 col-xl-4">
                <div class="row">
                  <div class="col-12 mb-4">
                    <div class="card shadow border-0 text-center p-0">
                      <div class="card-body pb-5">
                        <div class="row">
                          <div class="col-md-12 mb-3">
                            <div>
                              <label class="mt-1">Tutor Academico</label>
                              <input class="form-control text-center" type="email" value="<?php echo $propuestas['tutor'];?>" disabled>
                            </div>
                            <?php $i=1;
                            foreach($misjurados as $jurado):?>
                            <div>
                              <label class="mt-3">Jurado <?php echo $i;?></label>
                              <input class="form-control text-center" type="text" value="<?php echo $jurado['nombre']?>" disabled>
                            </div>
                            <?php endforeach;?>
                          </div>
                          <!-- <a href="propuestas-aprobadas-imprimir" class="col-md-6 mt-4 btn btn-success">IMPRIMIR</a> -->

                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

            </div>
          <?php } ?>

        </div>
      </div>


    </div>
    <?php include_once('../public/Views/componentes/footer.php'); ?>

  </div>

  <?php include_once('../public/Views/componentes/adminlte.php'); ?>
</body>

</html>