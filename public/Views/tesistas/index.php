<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Tesista | Panel de Control</title>
  <?php include_once('../public/Views/componentes/cssadminlte.php'); ?>
  <!-- DATATABLES -->
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.4/css/jquery.dataTables.css">
</head>

<body class="sidebar-mini layout-fixed vsc-initialized layout-navbar-fixed sidebar-closed sidebar-collapse">

  <div class="wrapper">
    <!-- Preloader -->
    <div class="preloader flex-column justify-content-center align-items-center">
      <img class="animation__shake" src="../../dist/img/Ucabg.png" alt="Ucab Guayana" height="30%" width="15%">
    </div>

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
        <img src="../../dist/img/Ucabg.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
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
              <a href="tesista-propuestas-aprobadas" class="nav-link">
                <i class="nav-icon fas fa-table"></i>
                <p>
                  Propuestas Aprobadas
                </p>
              </a>

            </li>

            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="fas fa-balance-scale"></i>
                <p>
                  Perfil
                  <i class="fas fa-angle-left right"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="pages/search/simple.html" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Todos</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="pages/search/enhanced.html" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Cargar Comites</p>
                  </a>
                </li>
              </ul>
            </li>

          </ul>
        </nav>
      </div>
      <!-- /.sidebar -->
    </aside>

    <div class="content-wrapper">
      <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0">Panel de Control</h1>
            </div><!-- /.col -->

          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>

      <section class="content">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <div class="btn btn-primary " data-bs-toggle="modal" data-bs-target="#crearpropuesta" data-bs-whatever="@mdo">Crear Propuesta</div>
            </div>
            <div class="col-sm-6">
              <h1 class="float-sm-right"><strong>Mis Propuestas</strong></h1>
            </div>
          </div>
        </div>
        <!-- MODAL CREAR PROPUESTA -->
        <div class="modal fade" id="crearpropuesta" tabindex="-1" aria-labelledby="crearpropuesta" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Crear Propuesta</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <div class="card">
                  <div class="card-body">
                    <form action="tesistas-guardar-propuesta" method="POST" enctype="multipart/form-data">
                      <div class="form-group">
                        <label>Nombre de la propuesta</label>
                        <input type="text" name="nombrepropuesta" placeholder="nombre de la propuesta" class="form-control" required>
                      </div>
                      <div class="form-group flex">
                        <label>Tipo de Propuesta</label></br>
                        <select class="custom-select" name="modalidad">
                          <option value="instrumental">Instrumental</option>
                          <option value="experimental">Experimental</option>
                        </select>
                      </div>
                      <div class="row align-items-center">
                        <div class="col-md-6 mb-3">
                          <div class="form-group">
                            <label>Cedula del Compañero</label>
                            <input class="form-control" type="number" placeholder="cedula del compañero" name="cedula">
                          </div>
                        </div>
                        <div class="col-md-6 mb-3">
                          <div class="form-group">
                            <label>Codigo de Seguridad</label>
                            <input class="form-control" type="text" placeholder="Codigo de seguridad" name="codigo">
                          </div>
                        </div>
                      </div>
                      <div class="d-flex justify-content-end align-items-baseline">
                        <button name="nuevapropuesta" type="submit" class="btn btn-success" required>Crear Propuesta</button>
                        <button type="button" class="ml-1 btn btn-danger" data-bs-dismiss="modal">Cerrar</button>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="p-4 card table-responsive py-4">
          <?php
          if (isset($_SESSION['mensaje'])) { ?>
            <div class="alert alert-<?= $_SESSION['colorcito']; ?> alert-dismissible fade show" role="alert">
              <?php echo $_SESSION['mensaje']; ?>
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>

          <?php unset($_SESSION['mensaje']);
          }
          ?>
          <table class="table table-flush" id="example">
            <thead class="thead-light">
              <tr class="text-center">
                <th>Nº </th>
                <th>Titulo</th>
                <th>Modalidad</th>
                <th>Observaciones</th>
                <th>E.Comite</th>
                <th>E.Consejo</th>

              </tr>
            </thead>
            <tbody>
              <?php foreach ($mispropuestas as $propuesta) { ?>
                <tr>
                  <td><?php echo $propuesta['num_c']; ?></td>
                  <td><?php echo $propuesta['titulo']; ?></td>
                  <td><?php echo $propuesta['modalidad']; ?></td>
                  <td><?php echo $propuesta['observaciones']; ?></td>
                </tr>
              <?php } ?>
            </tbody>
          </table>
        </div>
      </section>
    </div>

    <?php include_once('../public/Views/componentes/footer.php'); ?>

  </div>

  <?php include_once('../public/Views/componentes/adminlte.php'); ?>
  <?php include_once('../public/Views/componentes/scripdatatable.php'); ?>
</body>

</html>