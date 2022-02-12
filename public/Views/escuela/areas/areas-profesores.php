<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Escuela | Areas - Todos las Areas</title>
	<?php

	use App\Models\Areas;

	include_once('../public/Views/componentes/cssadminlte.php'); ?>
	<!-- DATATABLES -->
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.4/css/jquery.dataTables.css">
</head>

<body class="sidebar-mini layout-fixed vsc-initialized layout-navbar-fixed sidebar-closed ">
	<div class="wrapper">

		<?php include_once('../public/Views/componentes/indexSidebar.php'); ?>
		<div class="content-wrapper">
			<div class="row">
				<section class="col-lg-12 connectedSortable p-4">
					<div class="container-fluid">
						<div class="row mb-2">
							<div class="col-sm-6">
								<div class="btn btn-primary " data-bs-toggle="modal" data-bs-target="#creararea" data-bs-whatever="@mdo">Crear Especializacion</div>
								<a class="btn btn-warning " href="escuela-areas-profesores-cargar">Cargar Especializacion</a>

							</div>

							<div class="col-sm-6">
								<h1 class="float-sm-right"><strong>Lista de Especializaciones</strong></h1>
							</div>
						</div>
					</div>
					<!-- MODAL CREAR AREA -->
					<div class="modal fade" id="creararea" tabindex="-1" aria-labelledby="creararea" aria-hidden="true">
						<div class="modal-dialog">
							<div class="modal-content">
								<div class="modal-header">
									<h5 class="modal-title" id="staticBackdropLabel">Crear Area</h5>
									<button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
										<span aria-hidden="true">&times;</span>
									</button>

								</div>

								<div class="modal-body">
									<div class="card">
										<div class="card-body">
											<form action="escuela-areas-crear" method="POST" enctype="multipart/form-data">
												<div class="form-group">
													<label>Nombre del Area</label>
													<input type="text" name="nombrearea" placeholder="nombre de la propuesta" class="form-control" required>
												</div>

												<div class="d-flex justify-content-end align-items-baseline">
													<button name="nuevaarea" type="submit" class="btn btn-success" required>Crear Area</button>
													<button type="button" class="ml-1 btn btn-danger" data-bs-dismiss="modal">Cerrar</button>
												</div>
											</form>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="card table-responsive  p-2">
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
									<th>Nombre Profesor</th>
									<th>Especializacion</th>
									<th>Accion</th>
								</tr>
							</thead>
							<tbody>

								<?php foreach ($profesores as $profesor) : ?>
									<tr>
										<td><?php echo $profesor['cedula']; ?></td>
										<td><?php echo $profesor['nombre']; ?></td>
										<td>
											<?php
											$cedula = $profesor['cedula'];
											$sql = "SELECT a.nombre FROM se_especializan AS se, profesores AS p,areas AS a
												WHERE p.cedula=se.cedula
												AND a.id_area=se.id_area
												AND p.cedula=$cedula";
											$areas = (new Areas())->sentenciaAll($sql);
											?>
											<ul>
												<?php foreach ($areas as $area) : ?>
													<li><?php echo $area['nombre']; ?>
													</li>
												<?php endforeach; ?>
											</ul>
										</td>
										<td class="d-flex">
											<a class="btn btn-primary mr-1" data-bs-toggle="modal" data-bs-target="#edit<?php echo $profesor['cedula']; ?>" data-bs-whatever="@mdo"><i class="far fa-edit"></i></a>
											<form action="escuela-areas-eliminar" method="POST">
												<button class="btn btn-danger" value="<?php echo $profesor['cedula']; ?>" name="eliminararea"><i class="far fa-trash-alt"></i></button>
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
	</div>

	<?php include_once('../public/Views/componentes/footer.php'); ?>

	</div>
	<?php include_once('../public/Views/componentes/adminlte.php'); ?>
	<?php include_once('../public/Views/componentes/scripdatatable.php'); ?>

</body>

</html>