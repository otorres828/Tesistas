<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Profesor | Perfil</title>
  <?php include_once('../public/Views/componentes/cssadminlte.php');?>
  <!-- DATATABLES -->
</head>

<body class="sidebar-mini layout-fixed vsc-initialized layout-navbar-fixed sidebar-closed">

  <div class="wrapper">
  <?php include_once('../public/Views/componentes/sidebarProfesor.php');?>

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
                                      <p class="form-control h-100" placeholder="Also your last name" disabled></p>
                                  </div>
                              </div>
                          </div>
                          <h2 class="h5">Seguridad</h2>
                          <div class="row">
                              <div  data-bs-toggle="modal" data-bs-target="#modificarCorreo" data-bs-whatever="@mdo"  class="btn btn-info m-1">Modificar Correo Personal</div>
                              <div  data-bs-toggle="modal" data-bs-target="#modificarClave" data-bs-whatever="@mdo"  class="btn btn-info m-1">Modificar Clave</div>
                              <div  data-bs-toggle="modal" data-bs-target="#modificarTelefono" data-bs-whatever="@mdo"  class="btn btn-info m-1">Modificar Telefono</div>
                              <div  data-bs-toggle="modal" data-bs-target="#modificarDireccion" data-bs-whatever="@mdo"  class="btn btn-info m-1">Modificar Direccion</div>

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
                                        <?php echo $profesor['nombre'];?>
                                  </h4>
                                  <h5 class="fw-normal">Profesor</h5>
                                  <p class="text-gray">Ucab Guayana</p>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
              <?php include_once ('../public/Views/componentes/modificarPerfilProfesor.php'); ?>

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
