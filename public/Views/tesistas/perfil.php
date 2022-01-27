<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Tesista | Panel de Control</title>
  <?php include_once('../public/Views/componentes/cssadminlte.php');?>
  <!-- DATATABLES -->
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.4/css/jquery.dataTables.css">
</head>

<body class="sidebar-mini layout-fixed vsc-initialized layout-navbar-fixed sidebar-closed sidebar-collapse">

  <div class="wrapper">
      <!-- Preloader -->
      <!-- <div class="preloader flex-column justify-content-center align-items-center">
        <img class="animation__shake" src="../../dist/img/Ucabg.png" alt="Ucab Guayana" height="30%" width="15%">
      </div> -->

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
            <span class="dropdown-item dropdown-header"><?php echo $tesista['nombre_usuario'];?></span>
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
              <a href="tesista-perfil" class="d-block"><?php echo $tesista['nombre_usuario'];?></a>
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
          
          <div class="row">
              <div class="col-12 col-xl-8">
                  <div class="card card-body border-0 shadow mb-4">
                      <h2 class="h5 mb-4">Informacion General</h2>
                          <div class="row">
                              <div class="col-md-12 mb-3">
                                  <div>
                                      <label for="first_name">Nombre Completo</label>
                                      <input  class="form-control" type="text"
                                          placeholder="Enter your first name" disabled>
                                  </div>
                              </div>
                              
                          </div>
                          <div class="row align-items-center">
                              <div class="col-md-6 mb-3">
                                  <div class="form-group">
                                      <label for="email">Correo Ucab</label>
                                      <input class="form-control" type="email"
                                          placeholder="name@company.com" disabled>
                                  </div>
                              </div>
                              <div class="col-md-6 mb-3">
                                  <div class="form-group">
                                      <label for="email">Correo Personal</label>
                                      <input class="form-control" type="email"
                                          placeholder="name@company.com" disabled>
                                  </div>
                              </div>
                              <div class="col-md-6 mb-3">
                                  <div class="form-group">
                                      <label for="email">Telefono</label>
                                      <input class="form-control" type="email"
                                          placeholder="name@company.com" disabled>
                                  </div>
                              </div>
                              <div class="col-md-6 mb-3">
                                  <div class="form-group">
                                      <label for="email">Codigo de Seguridad</label>
                                      <input class="form-control" type="email"
                                          placeholder="name@company.com" disabled>
                                  </div>
                              </div>
                              <div class="col-md-12 mb-3">
                                  <div>
                                      <label for="last_name">Biografia</label>
                                      <label class="form-control" placeholder="Also your last name" disabled>en el soy indetenible</label>
                                  </div>
                              </div>
                          </div>
                          <h2 class="h5">Seguridad</h2>
                          <div class="row">
                              <div  data-bs-toggle="modal" data-bs-target="#modificarCorreo" data-bs-whatever="@mdo"  class="btn btn-info m-1">Modificar Correo Personal</div>
                              <div  data-bs-toggle="modal" data-bs-target="#modificarClave" data-bs-whatever="@mdo"  class="btn btn-info m-1">Modificar Clave</div>
                              <div  data-bs-toggle="modal" data-bs-target="#modificarTelefono" data-bs-whatever="@mdo"  class="btn btn-info m-1">Modificar Telefono</div>
                              <div  data-bs-toggle="modal" data-bs-target="#modificarCodigoSeguridad" data-bs-whatever="@mdo"  class="btn btn-warning m-1">Generar Codigo Seguridad</div>

                          </div>                          
                  </div>
              </div>
              <div class="col-12 col-xl-4">
                  <div class="row">
                      <div class="col-12 mb-4">
                          <div class="card shadow border-0 text-center p-0">
                              <div wire:ignore.self class="profile-cover rounded-top"
                                  data-background="../../dist/img/user2-160x160.jpg"></div>
                              <div class="card-body pb-5">
                                  <img src="../../dist/img/avatar.png"
                                      class="avatar-xl rounded-circle mx-auto mt-n7 mb-4" alt="Neil Portrait">
                                  <h4 class="h3">
                                        <?php echo $tesista['nombre_usuario'];?>
                                  </h4>
                                  <h5 class="fw-normal">Tesista</h5>
                                  <p class="text-gray">Ucab Guayana</p>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
              <?php include_once ('../public/Views/componentes/modificarPerfilTesista.php'); ?>

            </div>
          </div> 
          </div>
        </div> 
      </div>   
      
      <?php include_once('../public/Views/componentes/footer.php');?>


  </div>

  <?php include_once('../public/Views/componentes/adminlte.php');?>
  <?php include_once('../public/Views/componentes/scripdatatable.php');?>
</body>
</html>
