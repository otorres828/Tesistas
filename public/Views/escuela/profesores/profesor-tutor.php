<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Escuela | Profesores tutores </title>
	<?php

use App\Models\Profesores;

 include_once('../public/Views/componentes/cssadminlte.php'); ?>
	<!-- DATATABLES -->
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.4/css/jquery.dataTables.css">
</head>

<body class="sidebar-mini layout-fixed vsc-initialized layout-navbar-fixed sidebar-closed ">
	<div class="wrapper">

	<?php include_once('../public/Views/componentes/indexSidebar.php'); ?>


		<!-- Content Wrapper. Contains page content -->
		<div class="content-wrapper">

			<div class="row">
				<!-- Left col -->
				<section class="col-lg-12 connectedSortable p-4">
					<div class="card table-responsive  p-2">
						<div class="card-header">
							<h1>Profesores - Lista de profesores tutores</h1>
						</div>
						<table class="card-body table table-flush" id="example">
								<thead class="thead-light">
									<tr>
										<th>Cedula</th>
										<th>Nombre</th>
										<th>correo</th>
										<th>telefono</th>
										<th>direccion</th>
										<th>Nº Propuestas</th>
									</tr>
								</thead>
								<tbody>
									<?php foreach ($profesores as $profesor) : ?>
										<tr>
											<td><?php echo $profesor['cedula']; ?></td>
											<td><?php echo $profesor['nombre']; ?></td>
											<td><?php echo $profesor['correoparticular']; ?></td>
											<td><?php echo $profesor['telefono']; ?></td>
											<td><?php echo $profesor['direccion']; ?></td>
											<td><?php  
												$cedula=$profesor['cedula'];
												$sql="SELECT ptg.num_c FROM propuestatg AS ptg, profesores AS p
													WHERE ptg.cedula_tutor=$cedula GROUP BY (ptg.num_c)";
												$propuestas=(New Profesores())->sentenciaAll($sql);?>
												<ul>
													<?php foreach ($propuestas as $propuesta):?>
														<li>
														<?php echo $propuesta['num_c'];?>
														</li>
													<?php endforeach; ?>			
												</ul>
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
		</div><!-- /.container-fluid -->
	</div>

	<?php include_once('../public/Views/componentes/footer.php'); ?>

	</div>
	<?php include_once('../public/Views/componentes/adminlte.php'); ?>
	<?php include_once('../public/Views/componentes/scripdatatable.php'); ?>

</body>

</html>