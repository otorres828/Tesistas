<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Escuela | Profesores Jurado </title>
	<?php

use App\Models\Profesores;
use App\Models\PropuestaTG;

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
					<section class="col-lg-12 connectedSortable p-4">
						<div class="card table-responsive p-2">
							<div class="card-header">
								<h1>Profesores - Lista de profesores jurados</h1>
							</div>
							<table class="card-body table table-flush" id="example">
								<thead class="thead-light">
									<tr>
										<!-- <th>id_usuario</th> -->
										<th>Cedula</th>
										<th>Nombre</th>
										<th>correo</th>
										<th>telefono</th>
										<th>direccion</th>
										<th>Nº Propuestas</th>
									</tr>
								</thead>
								<tbody>
									<!-- INSTRUMENTAL -->
									<?php foreach ($profesoresI as $profesor) : ?>
										<tr>
											<td><?php echo $profesor['cedula']; ?></td>
											<td><?php echo $profesor['nombre']; ?></td>
											<td><?php echo $profesor['correoparticular']; ?></td>
											<td><?php echo $profesor['telefono']; ?></td>
											<td><?php echo $profesor['direccion']; ?></td>
											<td><?php  
												$cedula=$profesor['cedula'];
												$sql="SELECT eji.num_c FROM es_jurado_instrumental AS eji, profesores AS p
													WHERE p.cedula=$cedula
													AND eji.cedula=p.cedula GROUP BY (eji.num_c)";
												//EXPERIMENTAL
												$propuestasI=(New Profesores())->sentenciaAll($sql);
												$sql2="SELECT ejE.num_c FROM es_jurado_experimental AS eje, profesores AS p
													WHERE p.cedula=$cedula
													AND eje.cedula=p.cedula GROUP BY (eje.num_c)";
												$propuestasE=(New Profesores())->sentenciaAll($sql2);?>
												
												
												<ul>
													<!-- INSTRUMENTAL -->
													<?php foreach ($propuestasI as $pI):
														$modalidad =(new PropuestaTG())->where('num_c','=',$pI['num_c'])->getOb();
														?>
														<li>
														<?php echo $pI['num_c'];?> ==<h2 class="badge bg-success">Instrumental</h2>
														</li>
													<?php endforeach; ?>
													<!--EXPERIMENTAL  -->
													<?php foreach ($propuestasE as $pE):
														$modalidad =(new PropuestaTG())->where('num_c','=',$pE['num_c'])->getOb();
														?>
														<li>
														<?php echo $pE['num_c'];?> ==<h2 class="badge bg-primary">Experimental</h2>
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
				</div>
		</div><!-- /.container-fluid -->
	</div>

	<?php include_once('../public/Views/componentes/footer.php'); ?>

	</div>
	<?php include_once('../public/Views/componentes/adminlte.php'); ?>
	<?php include_once('../public/Views/componentes/scripdatatable.php'); ?>

</body>

</html>