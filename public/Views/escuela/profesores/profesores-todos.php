<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Profesores | Todos los profesores </title>
	<?php include_once('../public/Views/componentes/cssadminlte.php'); ?>
	<!-- DATATABLES -->
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.4/css/jquery.dataTables.css">
</head>

<body class="sidebar-mini layout-fixed vsc-initialized layout-navbar-fixed sidebar-closed ">
	<div class="wrapper">

	<?php include_once('../public/Views/componentes/indexSidebar.php'); ?>

		<!-- Content Wrapper. Contains page content -->
		<div class="content-wrapper">
			<section class="content">
				<div class="row">
					<section class="col-lg-12  p-4">
						<div class="container-fluid">
							<div class="row mb-2">
								<div class="col-sm-6">
									<div class="btn btn-primary " data-bs-toggle="modal" data-bs-target="#crearprofesor" data-bs-whatever="@mdo">Crear Profesor</div>
									<a class="btn btn-warning " href="escuela-profesores-cargar">Cargar Profesores</a>
								</div>
								<div class="col-sm-6">
									<h1 class="float-sm-right"><strong>Lista de Profesores</strong></h1>
								</div>
							</div>
						</div>
						<!-- MODAL CREAR PROFESOR -->
						<div class="modal fade" id="crearprofesor" tabindex="-1" aria-labelledby="crearprofesor" aria-hidden="true">
							<div class="modal-dialog">
								<div class="modal-content">
									<div class="modal-header">
										<h5 class="modal-title" id="staticBackdropLabel">Crear Nuevo Profesor</h5>
										<button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
											<span aria-hidden="true">&times;</span>
										</button>
									</div>

									<div class="modal-body">
										<div class="card">
											<div class="card-body">
												<form action="escuela-profesores-crear" method="POST" enctype="multipart/form-data">
													<div class="form-group">
														<label>Nombre del profesor</label>
														<input type="text" name="nombre" placeholder="nombre del profesor" class="form-control" required>
													</div>
													<div class="form-group">
														<label>Cedula </label>
														<input type="number" name="cedula" placeholder="cedula del profesor" class="form-control" required>
													</div>
													<div class="form-group">
														<label>Direccion</label>
														<input type="text" name="direccion" placeholder="direccion de vivienda" class="form-control" required>
													</div>
													<div class="row align-items-center">
														<div class="col-md-6 mb-3">
															<div class="form-group">
																<label>Correo Particular</label>
																<input class="form-control" type="email" placeholder="correo particular" name="correoparticular" required>
															</div>
														</div>
														<div class="col-md-6 mb-3">
															<div class="form-group">
																<label>Telefono</label>
																<input class="form-control" type="number" placeholder="numero de telefono" name="telefono" required>
															</div>
														</div>
													</div>
													<div class="form-group flex">
														<label>Tipo de Profesor</label></br>
														<select class="custom-select" name="tipo">
															<option value="I">Interno</option>
															<option value="E">Externo</option>
														</select>
													</div>

													<div class="d-flex justify-content-end align-items-baseline">
														<button name="nuevoprofesor" type="submit" class="btn btn-success" required>Agregar Profesor</button>
														<button type="button" class="ml-1 btn btn-danger" data-bs-dismiss="modal">Cerrar</button>
													</div>
												</form>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="card table-responsive p-2">
							<?php
							if (isset($_SESSION['mensaje'])) { ?>
								<div class="alert alert-<?= $_SESSION['colorcito']; ?> alert-dismissible fade show" role="alert">
									<?php echo $_SESSION['mensaje']; ?>
									<button type="button" class="close" data-dismiss="alert" aria-label="Close">
										<span aria-hidden="true">&times;</span>
									</button>
								</div>
							<?php unset($_SESSION['mensaje']);
							} ?>
							<table class="card-body table table-flush" id="example">
								<thead class="thead-light">
									<tr>
										<th>Cedula</th>
										<th>Nombre</th>
										<th>Direccion</th>
										<th>Correo particular</th>
										<th>Telefono</th>
										<th>Tipo</th>
										<th>Acciones</th>
									</tr>
								</thead>
								<tbody>
									<?php foreach ($profesores as $profesor) : ?>
										<tr>
											<form action="escuela-profesores-mostrar-profesor" method="POST">
												<td>
													<button type="submit" name="cedula" value="<?php echo $profesor['cedula']; ?>"><?php echo $profesor['cedula']; ?></button>
												</td>
											</form>
											<td><?php echo $profesor['nombre']; ?></td>
											<td><?php echo $profesor['direccion']; ?></td>
											<td><?php echo $profesor['correoparticular']; ?></td>
											<td><?php echo $profesor['telefono']; ?></td>
											<td class="text-center">
												<?php if ($profesor['tipo'] == 'I') { ?>
													<h2 class="badge bg-primary">INTERNO</h2>
												<?php } else { ?>
													<h2 class="badge bg-success">EXTERNO</h2>
												<?php } ?>
											</td>
											<td class="d-flex">
												<form action="escuela-profesores-eliminar" method="POST">
													<button class="btn btn-danger" value="<?php echo $profesor['cedula']; ?>" name="eliminarprofesor"><i class="far fa-trash-alt"></i></button>
												</form>
											</td>
										</tr>
									<?php endforeach; ?>
								</tbody>
							</table>
						</div>

					</section>
				</div>

		</div>
		<!-- /.content -->
	</div>

	<?php include_once('../public/Views/componentes/footer.php'); ?>

	</div>
	<?php include_once('../public/Views/componentes/adminlte.php'); ?>
	<?php include_once('../public/Views/componentes/scripdatatable.php'); ?>

</body>

</html>