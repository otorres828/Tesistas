<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Escuela | Profesores tutores </title>
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

						<li class="nav-item">
							<a href="escuela" class="nav-link">
								<i class="nav-icon fas fa-th"></i>
								<p>
									Panel de Control
								</p>
							</a>
						</li>

						<li class="nav-item menu-open">
							<a href="#" class="nav-link active">
								<i class="nav-icon fas fa-users"></i>
								<p>
									Tesistas

									<i class="fas fa-angle-left right"></i>
								</p>
							</a>
							<ul class="nav nav-treeview">
								<li class="nav-item">
									<a href="escuela/tesistas" class="nav-link active">
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
							<a href="#" class="nav-link">
								<i class="nav-icon fas fa-table"></i>
								<p>
									Profesores
									<i class="fas fa-angle-left right"></i>
								</p>
							</a>
							<ul class="nav nav-treeview">
								<li class="nav-item">
									<a href="pages/tables/simple.html" class="nav-link">
										<i class="far fa-circle nav-icon"></i>
										<p>Revisores</p>
									</a>
								</li>
								<li class="nav-item">
									<a href="pages/tables/data.html" class="nav-link">
										<i class="far fa-circle nav-icon"></i>
										<p>Tutores</p>
									</a>
								</li>
								<li class="nav-item">
									<a href="pages/tables/jsgrid.html" class="nav-link">
										<i class="far fa-circle nav-icon"></i>
										<p>Jurados</p>
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

		<!-- Content Wrapper. Contains page content -->
		<div class="content-wrapper">

			<!-- /.content-header -->

			<!-- Main content -->
			<section class="content">
				<div class="container-fluid">

					<div class="container-fluid">
						<div class="row mb-2">
							<div class="col-sm-6">
								<h1 class="m-0">Profesores - Tutores</h1>
							</div><!-- /.col -->
							<div class="col-sm-6">
								<ol class="breadcrumb float-sm-right">
									<li class="breadcrumb-item"><a href="#">Escuela</a></li>
									<li class="breadcrumb-item active">Listar profesores tutores </li>
								</ol>
							</div><!-- /.col -->
						</div><!-- /.row -->
					</div>
				</div>
				<!-- /.row -->
				<!-- Main row -->
				<div class="row">
					<!-- Left col -->
					<section class="col-lg-12 connectedSortable">
						<div class="card table-responsive py-4 p-4">
							<div class="card-header">
								<h1>Profesores - Lista de profesores tutores</h1>
							</div>
							<table class="card-body table table-flush" id="example">
								<thead class="thead-light">
									<tr>
										<!-- <th>id_usuario</th> -->
										<th>Cedula</th>
										<th>Nombre</th>
										<th>Correo</th>
										<th>Codigo</th>
									</tr>
								</thead>
								<tbody>
									<?php foreach ($profesores as $profesor) : ?>
										<tr>
											<!-- <td><?php echo $profesor['id_usuario']; ?></td> -->
											<td><?php echo $profesor['cedula']; ?></td>
											<td><?php echo $profesor['nombre_usuario']; ?></td>
											<td><?php echo $profesor['correo']; ?></td>
											<td><?php echo $profesor['codigo']; ?></td>
										</tr>
									<?php endforeach; ?>


								</tbody>
							</table>
						</div>

						<!-- /.card -->
					</section>
					<!-- /.Left col -->
					<!-- right col (We are only adding the ID to make the widgets sortable)-->

					<!-- right col -->
				</div>
				<!-- /.row (main row) -->
		</div><!-- /.container-fluid -->
		</section>
		<!-- /.content -->
	</div>

	<?php include_once('../public/Views/componentes/footer.php'); ?>

	</div>
	<?php include_once('../public/Views/componentes/adminlte.php'); ?>
	<?php include_once('../public/Views/componentes/scripdatatable.php'); ?>

</body>

</html>