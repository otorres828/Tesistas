<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Profesor| Dashboard</title>
  <?php include_once('../public/Views/componentes/cssadminlte.php'); ?>
  <!-- DATATABLES -->
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.4/css/jquery.dataTables.css">
</head>

<body class="sidebar-mini layout-fixed vsc-initialized layout-navbar-fixed sidebar-closed">

  <div class="wrapper">
    <?php include_once('../public/Views/componentes/sidebarProfesor.php'); ?>
    <div class="content-wrapper">
      <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0">Panel de Control</h1>
            </div><!-- /.col -->

          </div>
        </div>
      </div>

      <section class="content">
     

        <div class="row">
          <section class="col-lg-7 connectedSortable">
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
          <section class="col-lg-5 connectedSortable">

            <div class="card">
              <div class="card-header  bg-warning">
                <h3 class="card-title">
                  <i class="ion ion-clipboard mr-1"></i>
                  CUIDAR EL AMBIENTE ES TRABAJO DE TODOS
                </h3>


              </div>

              <img src="../../dist/img/conservacionambiental.jpg" alt="AdminLTE Logo" class="brand-image elevation-3" style="opacity: .8">
            </div>
           
          </section>
        </div>
    </section>
  </div>


  <?php include_once('../public/Views/componentes/footer.php'); ?>


  </div>

  <?php include_once('../public/Views/componentes/adminlte.php'); ?>
  <?php include_once('../public/Views/componentes/scripdatatable.php'); ?>
</body>

</html>