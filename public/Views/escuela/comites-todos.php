<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Escuela | Comites - Todos los Comites</title>
	<?php include_once('../public/Views/componentes/cssadminlte.php'); ?>
	<!-- DATATABLES -->
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.4/css/jquery.dataTables.css">
</head>

<body class="sidebar-mini layout-fixed vsc-initialized layout-navbar-fixed sidebar-closed sidebar-collapse">
	<div class="wrapper">

	<?php include_once('../public/Views/componentes/indexSidebar.php'); ?>

		<div class="content-wrapper">
			<div class="row">
				<!-- Left col -->
				<section class="col-lg-12 connectedSortable p-4">
					<div class="card table-responsive  p-2">
						<div class="card-header">
							<h1>Lista de Comites</h1>
						</div>
						<table class="card-body table table-flush" id="example">
							<thead class="thead-light">
								<tr>

									<th>id_comite</th>
									<th>Fecha de comite</th>

								</tr>
							</thead>
							<tbody>

								<?php foreach ($comites as $comite) : ?>
									<tr>
										<td><?php echo $comite['id_comite']; ?></td>
										<td><?php echo $comite['fecha']; ?></td>
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