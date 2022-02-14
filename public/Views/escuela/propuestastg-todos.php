<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Escuela| PropuestasTG - Todas las propuestas de trabajo de grado </title>
	<?php

	use App\Models\PropuestaTG;

	include_once('../public/Views/componentes/cssadminlte.php'); ?>
	<!-- DATATABLES -->
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.4/css/jquery.dataTables.css">
</head>

<body class="sidebar-mini layout-fixed vsc-initialized layout-navbar-fixed sidebar-closed ">
	<div class="wrapper">
		<?php include_once('../public/Views/componentes/indexSidebar.php'); ?>
		<div class="content-wrapper">
			<div class="row">
				<!-- Left col -->
				<section class="col-lg-12 connectedSortable p-4">
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
									<th>Comite</th>
									<th>Consejo</th>
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
										<td class="text-center">
											<?php if (is_null($propuestaTG['id_comite'])) { ?>
												<h2 class="badge bg-warning">PENDIENTE</h2>
												<?php } else {
												$num_c = $propuestaTG['num_c'];
												$sql = "SELECT estatus FROM evaluacioncomite  WHERE num_c=$num_c";
												$valor = (new PropuestaTG())->sentenciaObj($sql);
												$valor = $valor['estatus'];
												if ($valor == 'REPROBADO') { ?>
													<h2 class="badge bg-danger">REPROBADO</h2>
												<?php } else { ?>
													<h2 class="badge bg-success">APROBADO</h2>

											<?php }
											} ?>
										</td>
										<td class="text-center">
											<?php if (is_null($propuestaTG['nro_consejo'])) { ?>
												<h2 class="badge bg-warning">PENDIENTE</h2>
												<?php } else {
												$num_c = $propuestaTG['num_c'];
												$sql = "SELECT estatus  FROM evaluacionconsejo  WHERE num_c=$num_c";
												$valor = (new PropuestaTG())->sentenciaObj($sql);
												$valor = $valor['estatus'];
												if ($valor == 'REPROBADO') { ?>
													<h2 class="badge bg-danger">REPROBADO</h2>
												<?php } else { ?>
													<h2 class="badge bg-success">APROBADO</h2>

											<?php }
											} ?>
										</td>
										<td class="text-center">
											<?php if (is_null($propuestaTG['cedula_revisor'])) { ?>
												<h2 class="badge bg-secondary">SIN ASIGNAR</h2>
											<?php  } else {
												echo $propuestaTG['cedula_revisor'];
											} ?>
										</td>
										<td class="text-center">
											<?php if (is_null($propuestaTG['cedula_tutor'])) { ?>
												<h2 class="badge bg-secondary">SIN ASIGNAR</h2>
											<?php  } else {
												echo $propuestaTG['cedula_tutor'];
											} ?>
										</td>

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
		</div>
	</div>

	<?php include_once('../public/Views/componentes/footer.php'); ?>

	</div>
	<?php include_once('../public/Views/componentes/adminlte.php'); ?>
	<?php include_once('../public/Views/componentes/scripdatatable.php'); ?>

</body>

</html>