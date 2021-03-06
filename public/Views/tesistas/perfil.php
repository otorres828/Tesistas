<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Tesista | Perfil</title>
  <?php include_once('../public/Views/componentes/cssadminlte.php'); ?>
  <!-- DATATABLES -->
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.4/css/jquery.dataTables.css">
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

      <div class="sidebar">
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
          <div class="image">
            <img src="../../dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
          </div>
          <div class="info">
            <a href="tesista-perfil" class="d-block"><?php echo $tesista['nombre_usuario']; ?></a>
          </div>
        </div>

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
          </ul>
        </nav>
      </div>
    </aside>

    <div class="content-wrapper">
      <div class="content-header">
        <div class="container-fluid">

          <div class="row">
            <div class="col-12 col-xl-8">
              <?php
              if (isset($_SESSION['mensaje'])) { ?>
                <div class="alert alert-<?= $_SESSION['colorcito'];?> alert-dismissible fade show" role="alert">
                  <?php echo $_SESSION['mensaje']; ?>
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                
              <?php unset($_SESSION['mensaje']); }
              ?>
              <div class="card card-body border-0 shadow mb-4">
                <h2 class="h5 mb-4">Informacion General</h2>
                <div class="row">
                  <div class="col-md-12 mb-3">
                    <div>
                      <label for="first_name">Nombre Completo</label>
                      <input class="form-control" type="text" value="<?php echo $tesista['nombre_usuario']; ?>" disabled>
                    </div>
                  </div>

                </div>
                <div class="row align-items-center">
                  <div class="col-md-6 mb-3">
                    <div class="form-group">
                      <label for="email">Correo Ucab</label>
                      <input class="form-control" value="<?php echo $tesista['correoucab']; ?>" disabled>
                    </div>
                  </div>
                  <div class="col-md-6 mb-3">
                    <div class="form-group">
                      <label for="email">Correo Personal</label>
                      <input class="form-control" type="email" value="<?php echo $tesista['correo']; ?>" disabled>
                    </div>
                  </div>
                  <div class="col-md-6 mb-3">
                    <div class="form-group">
                      <label for="email">Telefono</label>
                      <input class="form-control" value="<?php echo $tesista['telefono']; ?>" disabled>
                    </div>
                  </div>
                  <div class="col-md-6 mb-3">
                    <div class="form-group ">
                      <label>Codigo de Seguridad<i id="copiar_codigo" class="btn fas fa-copy"></i>
                      </label>
                      <input class="form-control" value="<?php echo $tesista['codigo']; ?>" disabled>

                    </div>
                  </div>


                  <div class="col-md-12 mb-3">
                    <div>
                      <label for="last_name">Biografia</label>
                      <p class="form-control h-100" disabled><?php echo $tesista['comentario']; ?></p>
                    </div>
                  </div>
                </div>
                <h2 class="h5">Seguridad</h2>
                <div class="row mx-auto">
                  <div data-bs-toggle="modal" data-bs-target="#modificarCorreo" data-bs-whatever="@mdo" class="btn btn-info m-1">Modificar Correo Personal</div>
                  <div data-bs-toggle="modal" data-bs-target="#modificarClave" data-bs-whatever="@mdo" class="btn btn-info m-1">Modificar Clave</div>
                  <div data-bs-toggle="modal" data-bs-target="#modificarTelefono" data-bs-whatever="@mdo" class="btn btn-info m-1">Modificar Telefono</div>
                  <form action="tesista-perfil-modificarCodigo" method="POST" enctype="multipart/form-data">
                    <button class="btn btn-warning m-1" name="modificarcodigo" type="submit">Generar Codigo</button>
                  </form>

                </div>
              </div>
            </div>
            <div class="col-12 col-xl-4">
              <div class="row">
                <div class="col-12 mb-4">
                  <div class="card shadow border-0 text-center p-0">
                    <div class="card-body pb-5">
                      <img src="../../dist/img/avatar.png" class="avatar-xl rounded-circle mx-auto mt-n7 mb-4" alt="Neil Portrait">
                      <h4 class="h3">
                        <?php echo $tesista['nombre_usuario']; ?>
                      </h4>
                      <h5 class="fw-normal">Tesista</h5>
                      <p class="text-gray">Ucab Guayana</p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <?php include_once('../public/Views/componentes/modificarPerfilTesista.php'); ?>

          </div>
        </div>
      </div>
    </div>
  </div>

  <?php include_once('../public/Views/componentes/footer.php'); ?>


  </div>


  <?php include_once('../public/Views/componentes/adminlte.php'); ?>
  <?php include_once('../public/Views/componentes/scripdatatable.php'); ?>

  <!-- COPIADO AL PORTAPAPELES -->
  <script src="../../dist/js/clipboard.min.js"></script>
  <script>
    var btn = document.querySelector('#copiar_codigo');

    btn.addEventListener('click', () => {
      const textCopied = ClipboardJS.copy('<?php echo $tesista['codigo']; ?>');
      console.log('copied!', textCopied);
    })
  </script>
</body>

</html>