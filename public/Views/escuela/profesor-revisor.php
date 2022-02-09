<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Escuela | Profesores revisores </title>
	<?php include_once('../public/Views/componentes/cssadminlte.php'); ?>
	<!-- DATATABLES -->
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.4/css/jquery.dataTables.css">
</head>

<body class="sidebar-mini layout-fixed vsc-initialized layout-navbar-fixed sidebar-closed sidebar-collapse">
	<div class="wrapper">

		<?php include_once('../public/Views/componentes/profesorSidebar.php'); ?>

		<div class="content-wrapper">

			
				<div class="row">
					<!-- Left col -->
					<section class="col-lg-12 connectedSortable p-4">
						<div class="card table-responsive  p-2">
							<div class="card-header">
								<h1>Profesores - Lista de profesores revisores</h1>
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
		<!-- /.content -->
	</div>

	<?php include_once('../public/Views/componentes/footer.php'); ?>

	</div>
	<?php include_once('../public/Views/componentes/adminlte.php'); ?>
	<?php include_once('../public/Views/componentes/scripdatatable.php'); ?>

</body>

</html>