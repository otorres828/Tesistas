<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Escuela | Profesores Jurado </title>
	<?php include_once('../public/Views/componentes/cssadminlte.php'); ?>
	<!-- DATATABLES -->
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.4/css/jquery.dataTables.css">
</head>

<body class="sidebar-mini layout-fixed vsc-initialized layout-navbar-fixed sidebar-closed sidebar-collapse">
	<div class="wrapper">

		<?php include_once('../public/Views/componentes/profesorSidebar.php'); ?>


		<!-- Content Wrapper. Contains page content -->
		<div class="content-wrapper">

			<!-- /.content-header -->

			<!-- Main content -->
			<section class="content">
				<div class="container-fluid">

					<div class="container-fluid">
						<div class="row mb-2">
							<div class="col-sm-6">
								<h1 class="m-0">Profesores - Jurados</h1>
							</div><!-- /.col -->
							<div class="col-sm-6">
								<ol class="breadcrumb float-sm-right">
									<li class="breadcrumb-item"><a href="#">Escuela</a></li>
									<li class="breadcrumb-item active">Listar profesores Jurados </li>
								</ol>
							</div><!-- /.col -->
						</div><!-- /.row -->
					</div>
				</div>
				<!-- /.row -->
				<!-- Main row -->
				<div class="row">
					<!-- Left col -->
					<section class="col-lg-12 connectedSortable">
						<div class="card table-responsive py-4 p-4">
							<div class="card-header">
								<h1>Profesores - Lista de profesores jurados</h1>
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
		</section>
		<!-- /.content -->
	</div>

	<?php include_once('../public/Views/componentes/footer.php'); ?>

	</div>
	<?php include_once('../public/Views/componentes/adminlte.php'); ?>
	<?php include_once('../public/Views/componentes/scripdatatable.php'); ?>

</body>

</html>