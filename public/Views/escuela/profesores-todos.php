<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Profesores| Todos los profesores </title>
	<?php include_once('../public/Views/componentes/cssadminlte.php'); ?>
	<!-- DATATABLES -->
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.4/css/jquery.dataTables.css">
</head>

<body class="sidebar-mini layout-fixed vsc-initialized layout-navbar-fixed sidebar-closed sidebar-collapse">
	<div class="wrapper">

	<?php include_once('../public/Views/componentes/indexSidebar.php'); ?>


		<!-- Content Wrapper. Contains page content -->
		<div class="content-wrapper">
			<section class="content">
				<div class="row">
					<section class="col-lg-12 connectedSortable p-4">
						<div class="card table-responsive p-2">
							<div class="card-header">
								<h1>Lista de Profesores</h1>
							</div>
							<table class="card-body table table-flush" id="example">
								<thead class="thead-light">

									<tr>

										<th>Cedula</th>
										<th>Nombre</th>
										<th>Direccion</th>
										<th>Correo particular</th>
										<th>Telefono</th>
										<th>Tipo</th>
									</tr>
								</thead>
								<tbody>
									<?php foreach ($profesores as $profesor) : ?>
										<tr>
											<td><?php echo $profesor['cedula']; ?></td>
											<td><?php echo $profesor['nombre']; ?></td>
											<td><?php echo $profesor['direccion']; ?></td>
											<td><?php echo $profesor['correoparticular']; ?></td>
											<td><?php echo $profesor['telefono']; ?></td>
											<td><?php echo $profesor['tipo']; ?></td>
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