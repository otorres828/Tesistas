<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Escuela| Tesistas - Todos los tesistas</title>
	<?php include_once('../public/Views/componentes/cssadminlte.php'); ?>
	<!-- DATATABLES -->
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.4/css/jquery.dataTables.css">
</head>

<body class="sidebar-mini layout-fixed vsc-initialized layout-navbar-fixed sidebar-closed sidebar-collapse">
	<div class="wrapper">

		<?php include_once('../public/Views/componentes/indexSidebar.php'); ?>

		<div class="content-wrapper">
			<div class="row">
				<section class="col-lg-12 connectedSortable p-4">
					<div class="container-fluid">
						<div class="row mb-2">
							<div class="col-sm-6">
								<div class="btn btn-primary " data-bs-toggle="modal" data-bs-target="#creartesista" data-bs-whatever="@mdo">Crear Tesista</div>
								<a class="btn btn-warning " href="escuela-tesistas-cargar">Cargar Tesista</a>

							</div>

							<div class="col-sm-6">
								<h1 class="float-sm-right"><strong>Lista de Tesistas</strong></h1>
							</div>
						</div>
					</div>
					<!-- MODAL CREAR AREA -->
					<div class="modal fade" id="creartesista" tabindex="-1" aria-labelledby="creartesista" aria-hidden="true">
						<div class="modal-dialog">
							<div class="modal-content">
								<div class="modal-header">
									<h5 class="modal-title" id="staticBackdropLabel">Crear Nuevo Tesista</h5>
									<button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
										<span aria-hidden="true">&times;</span>
									</button>

								</div>

								<div class="modal-body">
									<div class="card">
										<div class="card-body">
											<form action="escuela-tesistas-crear" method="POST" enctype="multipart/form-data">
												<div class="form-group">
													<label>Nombre del Bachiller</label>
													<input type="text" name="nombre" placeholder="nombre del bachiller" class="form-control" required>
												</div>
												<div class="form-group">
													<label>Cedula </label>
													<input type="number" name="cedula" placeholder="cedula" class="form-control" required>
												</div>
												<div class="form-group">
													<label>Correo Ucab</label>
													<input type="email" name="correoucab" placeholder="correo ucab" class="form-control" required>
												</div>
												<div class="form-group">
													<label>Correo Particular</label>
													<input type="email" name="correoparticular" placeholder="correo particular" class="form-control" required>
												</div>
												<div class="form-group">
													<label>Telefono</label>
													<input type="number" name="telefono" placeholder="telefono" class="form-control" required>
												</div>
												<div class="form-group">
													<label>Comentario</label>
													<input type="text" name="comentario" placeholder="comentario" class="form-control">
												</div>

												<div class="d-flex justify-content-end align-items-baseline">
													<button name="nuevotesista" type="submit" class="btn btn-success" required>Agregar Bachiller</button>
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
									<th>Correo Ucab</th>
									<th>Correo particular</th>
									<th>Telefono</th>
									<th>Comentario</th>
								</tr>
							</thead>
							<tbody>

								<?php foreach ($tesistas as $tesista) : ?>
									<tr>
										<td><?php echo $tesista['cedula']; ?></td>
										<td><?php echo $tesista['nombre']; ?></td>
										<td><?php echo $tesista['correoucab']; ?></td>
										<td><?php echo $tesista['correoparticular']; ?></td>
										<td><?php echo $tesista['telefono']; ?></td>
										<td><?php echo $tesista['comentario']; ?></td>
									</tr>
								<?php endforeach; ?>

							</tbody>
						</table>
					</div>

					<!-- /.card -->
				</section>
			</div>
		</div>
	</div>

	<?php include_once('../public/Views/componentes/footer.php'); ?>

	</div>
	<?php include_once('../public/Views/componentes/adminlte.php'); ?>
	<?php include_once('../public/Views/componentes/scripdatatable.php'); ?>

</body>

</html>