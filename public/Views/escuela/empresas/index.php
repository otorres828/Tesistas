<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Escuela | Empresas - Todos las Empresas</title>
	<?php include_once('../public/Views/componentes/cssadminlte.php'); ?>
	<!-- DATATABLES -->
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.4/css/jquery.dataTables.css">
</head>

<body class="sidebar-mini layout-fixed vsc-initialized layout-navbar-fixed sidebar-closed ">
	<div class="wrapper">
		<?php include_once('../public/Views/componentes/indexSidebar.php'); ?>
		<div class="content-wrapper">
			<div class="row">
				<section class="col-lg-12  p-4">
					<div class="container-fluid">
						<div class="row mb-2">
							<div class="col-sm-6">
								<div class="btn btn-primary " data-bs-toggle="modal" data-bs-target="#crearempresa" data-bs-whatever="@mdo">Registrar Empresa</div>
								<a class="btn btn-warning " href="escuela-empresas-cargar">Cargar Empresas</a>

							</div>

							<div class="col-sm-6">
								<h1 class="float-sm-right"><strong>Lista de Empresas</strong></h1>
							</div>
						</div>
					</div>
					<!-- MODAL CREAR EMPRESAS -->
					<div class="modal fade" id="crearempresa" tabindex="-1" aria-labelledby="crearempresa" aria-hidden="true">
						<div class="modal-dialog">
							<div class="modal-content">
								<div class="modal-header">
									<h5 class="modal-title">Registrar Empresa</h5>
									<button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
										<span aria-hidden="true">&times;</span>
									</button>
								</div>

								<div class="modal-body">
									<div class="card">
										<div class="card-body">
											<form action="escuela-empresas-crear" method="POST" enctype="multipart/form-data">
												<div class="form-group">
													<label>Nombre de la Empresa</label>
													<input type="text" name="nombreempresa" placeholder="nombre de la empresa" class="form-control" required>
												</div>
												<div class="d-flex justify-content-end align-items-baseline">
													<button name="nuevaempresa" type="submit" class="btn btn-success" required>Registrar Empresa</button>
													<button type="button" class="ml-1 btn btn-danger" data-bs-dismiss="modal">Cerrar</button>
												</div>
											</form>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="card table-responsive  p-2">
						<?php
						if (isset($_SESSION['mensaje'])) { ?>
							<div class="alert alert-<?= $_SESSION['colorcito']; ?> alert-dismissible fade show" role="alert">
								<?php echo $_SESSION['mensaje']; ?>
								<button type="button" class="close" data-dismiss="alert" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>
						<?php unset($_SESSION['mensaje']);
						} ?>
						<table class="card-body table table-flush" id="example">
							<thead class="thead-light">
								<tr>
									<th>Nº</th>
									<th>Nombre</th>
									<th>Acciones</th>
								</tr>
							</thead>
							<tbody>
								<?php $i = 1;
								foreach ($empresas as $empresa) : ?>
									<tr>
										<td><?php echo $i++ ?></td>
										<td><?php echo $empresa['nombre']; ?></td>
										<td class="d-flex">
											<a class="btn btn-primary mr-1" data-bs-toggle="modal" data-bs-target="#<?php echo $empresa['nombre']; ?>" data-bs-whatever="@mdo"><i class="far fa-edit"></i></a>
											<form action="escuela-empresa-eliminar" method="POST">
												<button class="btn btn-danger" value="<?php echo $empresa['nombre']; ?>" name="eliminarempresa"><i class="far fa-trash-alt"></i></button>
											</form>
										</td>
									</tr>
									<!-- MODAL EDITAR EMPRESA -->
									<div class="modal fade" id="<?php echo $empresa['nombre']; ?>" tabindex="-1" aria-labelledby="edit<?php echo $empresa['nombre']; ?>" aria-hidden="true">
										<div class="modal-dialog">
											<div class="modal-content">
												<div class="modal-header">
													<h5 class="modal-title">Actualizar Area</h5>
													<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
												</div>
												<div class="modal-body">
													<div class="card">
														<div class="card-body">
															<form action="escuela-empresas-modificar" method="POST">
																<div class="form-group">
																	<input name="sluganterior" hidden value="<?php echo $empresa['slug']; ?>">

																	<label>Nombre de la Empresa</label>
																	<input type="text" name="nuevonombre" class="form-control" value="<?php echo $empresa['nombre']; ?>" required>
																</div>

																<div class="d-flex justify-content-end align-items-baseline">
																	<button name="modificarempresa" type="submit" class="btn btn-primary" required>Modificar Area</button>
																	<button type="button" class=" ml-1 btn btn-danger" data-bs-dismiss="modal">Cerrar</button>
																</div>
															</form>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								<?php endforeach; ?>

							</tbody>
						</table>
					</div>

				</section>
			</div>
		</div>
	</div>

	<?php include_once('../public/Views/componentes/footer.php'); ?>

	</div>
	<?php include_once('../public/Views/componentes/adminlte.php'); ?>
	<?php include_once('../public/Views/componentes/scripdatatable.php'); ?>

</body>

</html>