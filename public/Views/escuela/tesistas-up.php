<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Escuela| Tesistas - Cargar tesistas </title>
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
					<div class="card table-responsive p-2">
						<div class="card-header">
							<h1>Lista de Tesistas</h1>
						</div>
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
		</div>>
	</div>

	<?php include_once('../public/Views/componentes/footer.php'); ?>

	</div>
	<?php include_once('../public/Views/componentes/adminlte.php'); ?>
	<?php include_once('../public/Views/componentes/scripdatatable.php'); ?>

</body>

</html>