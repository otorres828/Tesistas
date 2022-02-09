<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Escuela| Panel de Control</title>
  <?php

  use App\Models\PropuestaTG;

  include_once('../public/Views/componentes/cssadminlte.php'); ?>
  <!-- DATATABLES -->
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.4/css/jquery.dataTables.css">
</head>

<body class="sidebar-mini layout-fixed vsc-initialized layout-navbar-fixed sidebar-closed sidebar-collapse">


  <div class="wrapper">

    <?php include_once('../public/Views/componentes/indexSidebar.php'); ?>

    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0">Panel de Control</h1>
            </div><!-- /.col -->

          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content-header -->

      <!-- Main content -->
      <section class="content">
        <div class="container-fluid">
          <!-- Small boxes (Stat box) -->
          <div class="row">
            <div class="col-lg-4 col-6">
              <!-- small box -->
              <div class="small-box bg-info">
                <div class="inner">
                  <h3><?php echo $estadisticas['cantidad-tesistas']['cantidadtesistas']; ?></h3>

                  <p>Tesistas</p>
                </div>
                <div class="icon">
                  <i class="ion ion-person-add"></i>

                </div>
                <a href="escuela-profesor-revisor" class="small-box-footer">Mas Informacion <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-4 col-6">
              <!-- small box -->
              <div class="small-box bg-success">
                <div class="inner">
                  <h3><?php echo $estadisticas['cantidad-profesores']['cantidadprofesores']; ?><sup style="font-size: 20px"></sup></h3>

                  <p>Profesores</p>
                </div>
                <div class="icon">
                  <i class="ion ion-person-add"></i>
                </div>
                <a href="escuela-profesor-revisor" class="small-box-footer">Mas Informacion <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-4 col-6">
              <!-- small box -->
              <div class="small-box bg-warning">
                <div class="inner">
                  <h3><?php echo $estadisticas['cantidad-propuestasTG']['cantidadpropuestastg']; ?></h3>

                  <p>Propuestas TG</p>
                </div>
                <div class="icon">
                  <i class="ion ion-bag"></i>
                </div>
                <a href="escuela-propuestastg" class="small-box-footer">Mas Informacion <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>

          </div>

        </div>
        <div class="row">
          <section class="col-lg-7 connectedSortable">
            <!-- LISTA DE PROPUESTAS -->
            <div class="card table-responsive p-2">
              <div class="card-header">
                <h1>Lista de Propuestas</h1>
              </div>
              <table class="card-body table table-flush" id="example">
                <thead class="thead-light">
                  <tr>

                    <th>NumC</th>
                    <th>Titulo</th>
                    <th>Observaciones</th>
                    <th>Modalidad</th>
                    <th>id_comite</th>
                    <th>Nro consejo</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($propuestasTG as $propuestaTG) : ?>
                    <tr>
                      <td><?php echo $propuestaTG['num_c']; ?></td>
                      <td><?php echo $propuestaTG['titulo']; ?></td>
                      <td class="text-center">
                        <?php if (is_null($propuestaTG['observaciones'])) { ?>
                          <h2 class="badge bg-warning">PENDIENTE</h2>
                        <?php  } else {
                          echo $propuestaTG['observaciones'];
                        } ?>
                      </td>
                      <td class="text-center">
                        <?php if ($propuestaTG['modalidad'] == 'I') { ?>
                          <h2 class="badge bg-primary">Instrumental</h2>
                        <?php } else { ?>
                          <h2 class="badge bg-success">Experimental</h2>
                        <?php } ?>
                      </td>
                      <td class="text-center">
                        <?php if (is_null($propuestaTG['id_comite'])) { ?>
                          <h2 class="badge bg-warning">PENDIENTE</h2>
                          <?php } else {
                          $num_c = $propuestaTG['num_c'];
                          $sql = "SELECT estatus
                              FROM evaluacioncomite 
                              WHERE num_c=$num_c";
                          $valor = (new PropuestaTG())->sentenciaObj($sql);
                          $valor = $valor['estatus'];
                          if ($valor == 'REPROBADO') { ?>
                            <h2 class="badge bg-danger">REPROBADO</h2>
                          <?php } else { ?>
                            <h2 class="badge bg-success">APROBADO</h2>

                        <?php }
                        } ?>
                      </td>
                      <td class="text-center">
                        <?php if (is_null($propuestaTG['nro_consejo'])) { ?>
                          <h2 class="badge bg-warning">PENDIENTE</h2>
                          <?php } else {
                          $num_c = $propuestaTG['num_c'];
                          $sql = "SELECT estatus
                              FROM evaluacionconsejo 
                              WHERE num_c=$num_c";
                          $valor = (new PropuestaTG())->sentenciaObj($sql);
                          $valor = $valor['estatus'];
                          if ($valor == 'REPROBADO') { ?>
                            <h2 class="badge bg-danger">REPROBADO</h2>
                          <?php } else { ?>
                            <h2 class="badge bg-success">APROBADO</h2>

                        <?php }
                        } ?>
                      </td>

                    </tr>
                  <?php endforeach; ?>


                </tbody>
              </table>
            </div>

            <div class="card bg-gradient-primary">

              <div class="card-footer bg-transparent">
                <div class="row">
                  <div class="col-4 text-center">
                    <div id="sparkline-1"></div>
                    <div class="text-white">Visitors</div>
                  </div>
                  <div class="col-4 text-center">
                    <div id="sparkline-2"></div>
                    <div class="text-white">Online</div>
                  </div>
                  <div class="col-4 text-center">
                    <div id="sparkline-3"></div>
                    <div class="text-white">Sales</div>
                  </div>
                </div>
              </div>
            </div>


          </section>
          <section class="col-lg-5 connectedSortable">

            <div class="card bg-gradient-success">
              <div class="card-header border-0">

                <h3 class="card-title">
                  <i class="far fa-calendar-alt"></i>
                  Calendar
                </h3>
                <div class="card-tools">
                  <div class="btn-group">
                    <button type="button" class="btn btn-success btn-sm dropdown-toggle" data-toggle="dropdown" data-offset="-52">
                      <i class="fas fa-bars"></i>
                    </button>
                    <div class="dropdown-menu" role="menu">
                      <a href="#" class="dropdown-item">Add new event</a>
                      <a href="#" class="dropdown-item">Clear events</a>
                      <div class="dropdown-divider"></div>
                      <a href="#" class="dropdown-item">View calendar</a>
                    </div>
                  </div>
                  <button type="button" class="btn btn-success btn-sm" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-success btn-sm" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
                <!-- /. tools -->
              </div>
              <!-- /.card-header -->
              <div class="card-body pt-0">
                <!--The calendar -->
                <div id="calendar" style="width: 100%"></div>
              </div>
              <!-- /.card-body -->
            </div>
            <div class="card">
              <div class="card-header  bg-warning">
                <h3 class="card-title">
                  <i class="ion ion-clipboard mr-1"></i>
                  CUIDAR EL AMBIENTE ES TRABAJO DE TODOS
                </h3>


              </div>

              <img src="../../dist/img/conservacionambiental.jpg" alt="AdminLTE Logo" class="brand-image elevation-3" style="opacity: .8">
            </div>
            <div class="card">
              <div class="card-header  bg-info">
                <h3 class="card-title">
                  <i class="ion ion-clipboard mr-1"></i>
                  Pongamos nuestro granito de arena
                </h3>


              </div>

              <div class="card">


                <iframe width="w-full" height="315" src="https://www.youtube.com/embed/fQMkX9UU-rY" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
              </div>
            </div>
          </section>
        </div>
    </div>


    <?php include_once('../public/Views/componentes/footer.php'); ?>

  </div>
  <?php include_once('../public/Views/componentes/adminlte.php'); ?>
  <?php include_once('../public/Views/componentes/scripdatatable.php'); ?>


</body>

</html>