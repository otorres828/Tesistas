<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Escuela| PropuestasTG - Todas las propuestas de trabajo de grado </title>
	<?php include_once('../public/Views/componentes/cssadminlte.php'); ?>
	<!-- DATATABLES -->
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.4/css/jquery.dataTables.css">
</head>

<body class="sidebar-mini layout-fixed vsc-initialized layout-navbar-fixed sidebar-closed sidebar-collapse">
	<div class="wrapper">

	<?php include_once('../public/Views/componentes/indexSidebar.php'); ?>


		<!-- Content Wrapper. Contains page content -->
		<div class="content-wrapper">

			<!-- /.content-header -->

			<!-- Main content -->
			<section class="content">

				<div class="row">
					<!-- Left col -->
					<section class="col-lg-12 connectedSortable p-2">
						<div class="card table-responsive  p-4">
							<div class="card-header">
								<h1>Lista de propuestas de trabajo de grado </h1>
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
											<td><?php echo $propuestaTG['observaciones']; ?></td>
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