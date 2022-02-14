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
							<h1>Lista de Trabajo de Grado </h1>
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
								<?php foreach ($propuestas as $propuestaTG) : ?>
									<tr>
										<!-- Numero correlativo: Num_c  -->
										<td><?php echo $propuestaTG['num_c']; ?></td>
										<!-- Titulo de la propuesta: titulo  -->
										<td><?php echo $propuestaTG['titulo']; ?></td>
										<!-- Observaciones : observaciones-->
										<td class="text-center">
											<?php if (is_null($propuestaTG['observaciones'])) { ?>
												<h2 class="badge bg-warning">PENDIENTE</h2>
											<?php  } else {
												echo $propuestaTG['observaciones'];
											} ?>
										</td>
										<!-- Modalidad : modalidad -->
										<td class="text-center">
											<?php if ($propuestaTG['modalidad'] == 'I') { ?>
												<h2 class="badge bg-primary">Instrumental</h2>
											<?php } else { ?>
												<h2 class="badge bg-success">Experimental</h2>
											<?php } ?>
										</td>
										<!-- id del Comite : id_comite -->
										<td class="text-center">
											<?php if (is_null($propuestaTG['id_comite'])) { ?>
												<h2 class="badge bg-warning">PENDIENTE</h2>
												<?php } else {
												$num_c = $propuestaTG['num_c'];
												$sql = "SELECT estatus FROM evaluacioncomite  WHERE num_c=$num_c";
												$valorcomite = (new PropuestaTG())->sentenciaObj($sql);
												$valorcomite = $valorcomite['estatus'];
												if ($valorcomite == 'REPROBADO') { ?>
													<h2 class="badge bg-danger">REPROBADO</h2>
												<?php } else { ?>
													<h2 class="badge bg-success">APROBADO</h2>

											<?php }
											} ?>
										</td>
										<!-- Numero del consejo : nro_consejo -->
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
										<!-- id del Comite : id_comite -->
										<td class="text-center">
											<?php if (is_null($propuestaTG['id_comite'])) { ?>
												<h2 class="badge bg-warning">PENDIENTE</h2>
												<?php  } else {
												if ($valorcomite == 'REPROBADO') { ?>
													<h2 class="badge bg-secondary"> X </h2>
												<?php } else { ?>
													<form action="escuela-profesores-mostrar-profesor" method="POST">
														<button type="submit" name="cedula" value="<?php echo $propuestaTG['cedula_revisor']; ?>">

															<?php echo $propuestaTG['cedula_revisor']; ?>
														</button>
													</form>
											<?php }
											} ?>
										</td>
										<td class="text-center">
											<?php if (is_null($propuestaTG['nro_consejo'])) { ?>
												<h2 class="badge bg-warning">PENDIENTE</h2>
												<?php  } else {
												if ($valor == 'REPROBADO') { ?>
													X
												<?php } else { ?>
													<form action="escuela-profesores-mostrar-profesor" method="POST">
														<button type="submit" name="cedula" value="<?php echo $propuestaTG['cedula_tutor']; ?>"><?php echo $propuestaTG['cedula_tutor']; ?></button>
													</form>
											<?php }
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