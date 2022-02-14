<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Propuesta | Propuesta Aprobadas</title>
  <?php

  use App\Models\PropuestaTG;

  include_once('../public/Views/componentes/cssadminlte.php'); ?>
  <!-- DATATABLES -->
</head>

<body class="sidebar-mini layout-fixed vsc-initialized layout-navbar-fixed sidebar-closed ">

  <div class="wrapper">


    <?php include_once('../public/Views/componentes/indexSidebar.php'); ?>


    <div class="content-wrapper">
      <div class="content-header">
        <div class="container-fluid">
            <div class="row">
              <div class="col-12 col-xl-8">
                <div class="card card-body border-0 shadow mb-4">
                  <h2 class="h5 mb-4">Nro Correlativo: <strong><?php echo $ $trabajodg['num_c']; ?></strong></h2>
                  <div class="row">
                    <div class="col-md-12 mb-3">
                      <div>
                        <label for="first_name">Titulo de la Propuesta</label>
                        <input class="form-control" type="text" value=" <?php echo $ $trabajodg['titulo']; ?>" disabled>
                      </div>
                    </div>

                  </div>
                  <div class="row align-items-center">
                    <div class="col-md-6 mb-3">
                      <div class="form-group">
                        <label>Modalidad</label>
                        <?php if ($ $trabajodg['modalidad'] == 'I') { ?>
                          <input class="form-control" value="INSTRUMENTAL" disabled>
                        <?php } else { ?>
                          <input class="form-control" value="EXPERIMENTAL" disabled>
                        <?php } ?>
                      </div>
                    </div>

                    <div class="col-md-6 mb-3">
                      <div class="form-group ">
                        <label>Fecha de Presentacion</label>
                        <input class="form-control" value="" disabled>

                      </div>
                    </div>

                  </div>
                  <?php
                  $num_c = $trabajodg['num_c'];
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

                      <div class="col-md-6 mb-3">
                        <div class="form-group">
                          <label for="email">Tutor Academico</label>
                          <input class="form-control" type="email" value="" disabled>
                        </div>
                      </div>
                      <div class="col-md-6 mb-3">
                        <div class="form-group">
                          <label>Fecha de Aprobacion</label>
                          <input class="form-control" value="" disabled>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <label>Estatus</label>
                        <input class="form-control w-20 bg-warning" value="PENDIENTE" disabled>
                      </div>
                      <div class="col-md-6">
                        <label>Nota Final</label>
                        <input class="form-control w-20" disabled>
                      </div>
                    </div>
                  <?php } ?>


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
                              <label>Jurado 1</label>
                              <input class="form-control" type="text" value="" disabled>
                            </div>
                            <div>
                              <label>Jurado 2</label>
                              <input class="form-control" type="text" value="" disabled>
                            </div>
                            <div>
                              <label>Jurado 3</label>
                              <input class="form-control" type="text" value="" disabled>
                            </div>
                          </div>
                          <!-- <a href="propuestas-aprobadas-imprimir" class="col-md-6 mt-4 btn btn-success">IMPRIMIR</a> -->

                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
        </div>
      </div>


    </div>
    <?php include_once('../public/Views/componentes/footer.php'); ?>

  </div>

  <?php include_once('../public/Views/componentes/adminlte.php'); ?>
</body>

</html>