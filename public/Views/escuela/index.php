<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Escuela| Panel de Control</title>
  <?php include_once('../public/Views/componentes/cssadminlte.php'); ?>
  <!-- DATATABLES -->
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.4/css/jquery.dataTables.css">
</head>

<body class="sidebar-mini layout-fixed vsc-initialized layout-navbar-fixed sidebar-closed sidebar-collapse">


  <div class="wrapper">

    <!-- PRECARGA -->
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
						<span class="dropdown-item dropdown-header">USUARIO</span>
						<div class="dropdown-divider"></div>
						<a href="administrador/profile" class="dropdown-item">
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
						<a href="#" class="d-block">Escuela</a>
					</div>
				</div>



				<!-- Sidebar Menu -->
				<nav class="mt-2">
					<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

						<li class="nav-item ">
							<a href="escuela" class="nav-link active">
								<i class="nav-icon fas fa-th"></i>
								<p>
									Panel de Control
								</p>
							</a>
						</li>

						<li class="nav-item ">
							<a href="#" class="nav-link ">
								<i class="nav-icon fas fa-users"></i>
								<p>
									Tesistas

									<i class="fas fa-angle-left right"></i>
								</p>
							</a>
							<ul class="nav nav-treeview">
								<li class="nav-item">
									<a href="escuela-tesistas" class="nav-link ">
										<i class="far fa-circle nav-icon"></i>
										<p>Todos</p>
									</a>
								</li>
								<li class="nav-item">
									<a href="escuela-tesistas-cargar" class="nav-link">
										<i class="far fa-circle nav-icon"></i>
										<p>Cargar Tesistas</p>
									</a>
								</li>
							</ul>
						</li>


						<li class="nav-item">
							<a href="#" class="nav-link ">
								<i class="nav-icon fas fa-table"></i>
								<p>
									Profesores
									<i class="fas fa-angle-left right"></i>
								</p>
							</a>
							<ul class="nav nav-treeview">
								<li class="nav-item">
									<a href="escuela-profesores" class="nav-link">
										<i class="far fa-circle nav-icon"></i>
										<p>Todos</p>
									</a>
								</li>
								<li class="nav-item">
									<a href="escuela-profesor-revisor" class="nav-link">
										<i class="far fa-circle nav-icon"></i>
										<p>Revisor</p>
									</a>
								</li>
								<li class="nav-item">
									<a href="escuela-profesor-tutor" class="nav-link">
										<i class="far fa-circle nav-icon"></i>
										<p>Tutor Academico</p>
									</a>
								</li>
								<li class="nav-item">
									<a href="escuela-profesor-jurado" class="nav-link">
										<i class="far fa-circle nav-icon"></i>
										<p>Jurado</p>
									</a>
								</li>
								<li class="nav-item">
									<a href="escuela-profesores-cargar" class="nav-link">
										<i class="far fa-circle nav-icon"></i>
										<p>Cargar Profesores</p>
									</a>
								</li>

							</ul>
						</li>

						<li class="nav-item">
							<a href="#" class="nav-link">
								<i class="nav-icon fas fa-balance-scale"></i>
								<p>
									Comites
									<i class="fas fa-angle-left right"></i>
								</p>
							</a>
							<ul class="nav nav-treeview">
								<li class="nav-item">
									<a href="escuela-comites" class="nav-link">
										<i class=" far fa-circle nav-icon"></i>
										<p>Todos</p>
									</a>
								</li>
								<li class="nav-item">
									<a href="escuela-comites-up" class="nav-link">
										<i class="far fa-circle nav-icon"></i>
										<p>Cargar Comites</p>
									</a>
								</li>
							</ul>
						</li>

						<li class="nav-header">Criterios</li>

						<li class="nav-item">
							<a href="#" class="nav-link">
								<i class="nav-icon fas fa-search"></i>
								<p>
									Experimental
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
										<p>Cargar Experimental</p>
									</a>
								</li>
							</ul>
						</li>

						<li class="nav-item">
							<a href="#" class="nav-link">
								<i class="nav-icon fas fa-search"></i>
								<p>
									Instrumental
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
										<p>Cargar Instrumental</p>
									</a>
								</li>
							</ul>
						</li>

						<li class="nav-header">Propuestas de TG</li>
						<li class="nav-item">
							<a href="escuela-propuestastg" class="nav-link">
								<i class="nav-icon fab fa-buffer"></i>
								<p>
									Todas
								</p>
							</a>
						</li>
					</ul>
				</nav>
			</div>

		</aside>

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
                    <th>Cedula revisor</th>
                    <th>Cedula tutor</th>
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
                      <td><?php echo $propuestaTG['id_comite']; ?></td>
                      <td><?php echo $propuestaTG['nro_consejo']; ?></td>
                      <td><?php echo $propuestaTG['cedula_revisor']; ?></td>
                      <td><?php echo $propuestaTG['cedula_tutor']; ?></td>
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
              <div class="card-header">
                <h3 class="card-title">
                  <i class="ion ion-clipboard mr-1"></i>
                  AQUI PUEDES METER ALGO
                </h3>


              </div>
              <!-- /.card-header -->
              <div class="card-body">
                CUERPO
              </div>
              <div class="card-footer clearfix">
                BOTONES
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