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
            <span class="dropdown-item dropdown-header"><?php echo $profesor['nombre_usuario']; ?></span>
            <div class="dropdown-divider"></div>
            <a href="profesor-perfil" class="dropdown-item">
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
            <a href="profesor-perfil" class="d-block"><?php echo $profesor['nombre_usuario']; ?></a>
          </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

            <li class="nav-item">
              <a href="profesores" class="nav-link">
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
                <i class="nav-icon fas fa-table"></i>
                <p>
                  Entregas
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
          <div class="form-check">
            <input class="form-check-input" type="radio" name="flexRadioDefault">
            <label class="form-check-label">
              interno
            </label>
          </div>
          <div class="form-check">
            <input class="form-check-input" type="radio" name="flexRadioDefault" >
            <label class="form-check-label">
              externo
            </label>
          </div>

          <div class="row mb-2">
            <div class="col-sm-6">
              <div class="btn btn-primary " data-bs-toggle="modal" data-bs-target="#crearpropuesta" data-bs-whatever="@mdo">Crear Propuesta</div>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <h1 class="float-sm-right"><strong>SOY PROFESOR</strong></h1>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div>
        <!-- MODAL CREAR PROPUESTA -->
        <div class="modal fade" id="crearpropuesta" tabindex="-1" aria-labelledby="crearpropuesta" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Crear Propuesta</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
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
                        <label>Tipo de Propuesta</label>
                        <div class="form-check ">
                          <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                          <label class="form-check-label" for="flexRadioDefault1">
                            Instrumental
                          </label>
                        </div>
                        <div class="form-check">
                          <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" checked>
                          <label class="form-check-label" for="flexRadioDefault2">
                            Experimental
                          </label>
                        </div>
                      </div>
                      <div class="form-group">
                        <label>Descripcion</label>
                        <input type="textarea" name="descripcion" placeholder="descripcion" class="form-control" required>
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
          <table class="table table-flush" id="example">
            <thead class="thead-light">
              <tr>

                <th>Name</th>
                <th>Position</th>
                <th>Office</th>
                <th>Age</th>
                <th>Start date</th>
                <th>Salary</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>Tiger Nixon</td>
                <td>System Architect</td>
                <td>Edinburgh</td>
                <td>61</td>
                <td>2011/04/25</td>
                <td>$320,800</td>
              </tr>
              <tr>
                <td>Garrett Winters</td>
                <td>Accountant</td>
                <td>Tokyo</td>
                <td>63</td>
                <td>2011/07/25</td>
                <td>$170,750</td>
              </tr>

            </tbody>
          </table>

        </div>
      </section>
    </div>


    <footer class="main-footer">
      <strong>Copyright &copy; 2022 <a href="#">Oliver Torres / Jesus Alfonzo / Cesar Sotillo / Ricardo Colina</a>.</strong>
      Todos los derechos reservados
      <div class="float-right d-none d-sm-inline-block">
        <b>Version</b> 1.00
      </div>
    </footer>

  </div>

  <?php include_once('../public/Views/componentes/adminlte.php'); ?>
  <?php include_once('../public/Views/componentes/scripdatatable.php'); ?>
</body>

</html>