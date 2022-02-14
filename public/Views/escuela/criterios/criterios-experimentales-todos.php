<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Criterios| Todos los criterios experimentales</title>
	<?php include_once('../public/Views/componentes/cssadminlte.php'); ?>
	<!-- DATATABLES -->
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.4/css/jquery.dataTables.css">
</head>

<body class="sidebar-mini layout-fixed vsc-initialized layout-navbar-fixed sidebar-closed">
	<div class="wrapper">

		<?php include_once('../public/Views/componentes/indexSidebar.php'); ?>


		<!-- Content Wrapper. Contains page content -->
		<div class="content-wrapper">
			<section class="content">
				<div class="row">
					<section class="col-lg-12 connectedSortable p-4">
						<div class="container-fluid">
							<div class="row mb-2">
								<div class="col-sm-6">
									<div class="btn btn-primary " data-bs-toggle="modal" data-bs-target="#crearCriterio" data-bs-whatever="@mdo">Crear Criterio </div>

								</div>

								<div class="col-sm-6">
									<h1 class="float-sm-right"><strong>Lista de Criterios experimentales</strong></h1>
								</div>
							</div>
						</div>
						<!-- MODAL CREAR Criterio -->
						<div class="modal fade" id="crearCriterio" tabindex="-1" aria-labelledby="crearCriterio" aria-hidden="true">
							<div class="modal-dialog">
								<div class="modal-content">
									<div class="modal-header">
										<h5 class="modal-title" id="staticBackdropLabel">Crear nuevo criterio</h5>
										<button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
											<span aria-hidden="true">&times;</span>
										</button>

									</div>

									<div class="modal-body">
										<div class="card">
											<div class="card-body">
												<form action="escuela-criterios-crear" method="POST" enctype="multipart/form-data">
													<div class="form-group">
														<label>Descripcion del criterio</label>
														<input type="text" name="descripcion" placeholder="Escriba la descripcion del criterio" class="form-control" required>
													</div>
													<div class="form-group">
														<label>Nota maxima</label>
														<input type="number" name="notamax" placeholder="Escriba la nota maxima que puede recibir el criterio" class="form-control" required>
													</div>
													<div class="form-group flex">
														<label>Tipo</label></br>
														<select class="custom-select" name="tipo" type required>
															<option value="Revisor" selected>Revisor</option>
															<option value="Tutor">Tutor</option>
															<option value="Jurado">Jurado</option>
														</select>
													</div>
													<!-- Informacion  hidded de modal  -->
													<!-- Modalidad: Experimental/instrumental-->
													<input id="modalidadId" name="modalidad" type="hidden" value="Experimental">

													<div class="d-flex justify-content-end align-items-baseline">
														<button name="nuevoCriterio" type="submit" class="btn btn-success" required>Agregar criterio</button>
														<button type="button" class="ml-1 btn btn-danger" data-bs-dismiss="modal">Cerrar</button>
													</div>
												</form>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="card table-responsive p-2">

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

										<th>id_criterio</th>
										<th>Nota maxima </th>
										<th>Descripcion</th>
										<th>Tipo de profe</th>
										<th>Estatus</th>
										<th>Acciones</th>
									</tr>
								</thead>
								<tbody>
									<!-- CRITERIOS REVISORES -->
									<?php foreach ($criteriosRevisores as $c) : ?>
										<?php
										// Variables para actualizar estatus
										$tipoProfe = "Revisor";
										$modalidad = "Experimental";
										?>
										<tr>
											<td><?php echo $c['id_criterio']; ?></td>
											<td><?php echo $c['notamax']; ?></td>
											<td><?php echo $c['descripcion']; ?></td>
											<td><?php echo $tipoProfe; ?></td>
											<?php if ($c['estatus'] == 'ACTIVO') {
												$accion = 'deshabilitar'; ?>
												<td class="text-center">
													<h2 class="badge bg-success">ACTIVO</h2>
												</td>
												<td class="d-flex justify-content-center">
													<button data-bs-toggle="modal" data-bs-target="#modificarEstatusCriterio_<?php echo $c['id_criterio'] . $tipoProfe; ?>" class="btn btn-danger mr-1" value="<?php echo $c['id_criterio']; ?>" name="eliminarprofesor"><i class="fas fa-power-off" title="Deshabilitar"></i></button>
													<form action="escuela-criterios-eliminar" method="POST">
														<!-- ID del criterio: n -->
														<input id="id_criterioId" name="id_criterio" type="hidden" value="<?php echo $c['id_criterio']; ?>">

														<!-- Modalidad-->
														<input id="modalidadId" name="modalidad" type="hidden" value="<?php echo $modalidad; ?>">
														<!-- Tipo de profe -->
														<input id="tipoProfe" name="tipoprofe" type="hidden" value="<?php echo $tipoProfe; ?>">

														<button class="btn btn-secondary" value="<?php echo $c['id_criterio'] . $tipoProfe; ?>" name="eliminarcriterio">
															<i class="far fa-trash-alt"></i>
														</button>

													</form>
												</td>
											<?php } else {
												$accion = 'habilitar'; ?>
												<td class="text-center">
													<h2 class="badge bg-danger">INACTIVO</h2>
												</td>
												<td class="d-flex justify-content-center">
													<button data-bs-toggle="modal" data-bs-target="#modificarEstatusCriterio_<?php echo $c['id_criterio'] . $tipoProfe; ?>" class="btn btn-danger mr-1" value="<?php echo $c['id_criterio']; ?>" name="eliminarprofesor"><i class="fas fa-power-off" title="Deshabilitar"></i></button>
													<form action="escuela-criterios-eliminar" method="POST">
														<!-- ID del criterio: n -->
														<input id="id_criterioId" name="id_criterio" type="hidden" value="<?php echo $c['id_criterio']; ?>">

														<!-- Modalidad-->
														<input id="modalidadId" name="modalidad" type="hidden" value="<?php echo $modalidad; ?>">
														<!-- Tipo de profe -->
														<input id="tipoProfe" name="tipoprofe" type="hidden" value="<?php echo $tipoProfe; ?>">

														<button class="btn btn-secondary" value="<?php echo $c['id_criterio'] . $tipoProfe; ?>" name="eliminarcriterio">
															<i class="far fa-trash-alt"></i>
														</button>

													</form>
												</td>
											<?php } ?>

										</tr>

										<!-- Modal habilitar/deshabilitar -->
										<!-- MODAL modificar estatus  -->
										<div class="modal fade" id="modificarEstatusCriterio_<?php echo $c['id_criterio'] . $tipoProfe; ?>" tabindex="-1" aria-labelledby="modificarEstatusCriterio_<?php echo $c['id_criterio'] . $tipoProfe; ?>" aria-hidden="true">
											<div class="modal-dialog">
												<div class="modal-content">
													<div class="modal-header">
														<h5 class="modal-title" id="staticBackdropLabel">Confirmacion</h5>
														<button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
															<span aria-hidden="true">&times;</span>
														</button>

													</div>

													<div class="modal-body">
														<div class="card">
															<div class="card-body">
																<p>Esta seguro de <b><?php echo $accion; ?></b> el criterio : <?php echo $c['descripcion']; ?></p>
																<form action="escuela-criterios-modificar-estatus" method="POST" enctype="multipart/form-data">
																	<!-- Informacion  hidded de modal  -->
																	<!-- ID del criterio: n -->
																	<input id="id_criterioId" name="id_criterio" type="hidden" value="<?php echo $c['id_criterio']; ?>">
																	<!-- Estatus del criterio: INACTIVO / ACTIVO -->
																	<input id="estatusId" name="estatus" type="hidden" value="<?php echo $c['estatus']; ?>">
																	<!-- Tipo de profesor: REVISOR / TUTOR / JURADO -->
																	<input id="tipoProfesorId" name="tipoProfesor" type="hidden" value="<?php echo $tipoProfe; ?>">
																	<!-- Tipo de modalidad: Experimental / Instrumental  -->
																	<input id="modalidadId" name="modalidad" type="hidden" value="<?php echo $modalidad; ?>">

																	<div class="d-flex justify-content-end align-items-baseline">
																		<button name="modificarEstatus" type="submit" class="btn btn-success" required>Continuar</button>
																		<button type="button" class="ml-1 btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
																	</div>
																</form>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
									<?php endforeach; ?>
									<!-- Criterios Tutores -->
									<?php foreach ($criteriosTutores as $c) : ?>
										<?php
										// Variables para actualizar estatus
										$tipoProfe = "Tutor";
										$modalidad = "Experimental";
										?>
										<tr>
											<td><?php echo $c['id_criterio']; ?></td>
											<td><?php echo $c['notamax']; ?></td>
											<td><?php echo $c['descripcion']; ?></td>
											<td><?php echo $tipoProfe; ?></td>

											<?php if ($c['estatus'] == 'ACTIVO') {
												$accion = 'deshabilitar'; ?>
												<td class="text-center">
													<h2 class="badge bg-success">ACTIVO</h2>
												</td>
												<td class="d-flex justify-content-center">
													<button data-bs-toggle="modal" data-bs-target="#modificarEstatusCriterio_<?php echo $c['id_criterio'] . $tipoProfe; ?>" class="btn btn-danger mr-1" value="<?php echo $c['id_criterio']; ?>" name="eliminarprofesor"><i class="fas fa-power-off" title="Deshabilitar"></i></button>
													<form action="escuela-criterios-eliminar" method="POST">
														<!-- ID del criterio: n -->
														<input id="id_criterioId" name="id_criterio" type="hidden" value="<?php echo $c['id_criterio']; ?>">

														<!-- Modalidad-->
														<input id="modalidadId" name="modalidad" type="hidden" value="<?php echo $modalidad; ?>">
														<!-- Tipo de profe -->
														<input id="tipoProfe" name="tipoprofe" type="hidden" value="<?php echo $tipoProfe; ?>">

														<button class="btn btn-secondary" value="<?php echo $c['id_criterio'] . $tipoProfe; ?>" name="eliminarcriterio">
															<i class="far fa-trash-alt"></i>
														</button>

													</form>
												</td>
											<?php } else {
												$accion = 'habilitar'; ?>
												<td class="text-center">
													<h2 class="badge bg-danger">INACTIVO</h2>
												</td>
												<td class="d-flex justify-content-center">
													<button data-bs-toggle="modal" data-bs-target="#modificarEstatusCriterio_<?php echo $c['id_criterio'] . $tipoProfe; ?>" class="btn btn-danger mr-1" value="<?php echo $c['id_criterio']; ?>" name="eliminarprofesor"><i class="fas fa-power-off" title="Deshabilitar"></i></button>
													<form action="escuela-criterios-eliminar" method="POST">
														<!-- ID del criterio: n -->
														<input id="id_criterioId" name="id_criterio" type="hidden" value="<?php echo $c['id_criterio']; ?>">

														<!-- Modalidad-->
														<input id="modalidadId" name="modalidad" type="hidden" value="<?php echo $modalidad; ?>">
														<!-- Tipo de profe -->
														<input id="tipoProfe" name="tipoprofe" type="hidden" value="<?php echo $tipoProfe; ?>">

														<button class="btn btn-secondary" value="<?php echo $c['id_criterio'] . $tipoProfe; ?>" name="eliminarcriterio">
															<i class="far fa-trash-alt"></i>
														</button>

													</form>
												</td>
											<?php } ?>

										</tr>

										<!-- Modal habilitar/deshabilitar -->
										<!-- MODAL modificar estatus  -->
										<div class="modal fade" id="modificarEstatusCriterio_<?php echo $c['id_criterio'] . $tipoProfe; ?>" tabindex="-1" aria-labelledby="modificarEstatusCriterio_<?php echo $c['id_criterio'] . $tipoProfe; ?>" aria-hidden="true">
											<div class="modal-dialog">
												<div class="modal-content">
													<div class="modal-header">
														<h5 class="modal-title" id="staticBackdropLabel">Confirmacion</h5>
														<button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
															<span aria-hidden="true">&times;</span>
														</button>

													</div>

													<div class="modal-body">
														<div class="card">
															<div class="card-body">
																<p>Esta seguro de <b><?php echo $accion; ?></b> el criterio : <?php echo $c['descripcion']; ?></p>
																<form action="escuela-criterios-modificar-estatus" method="POST" enctype="multipart/form-data">
																	<!-- Informacion  hidded de modal  -->
																	<!-- ID del criterio: n -->
																	<input id="id_criterioId" name="id_criterio" type="hidden" value="<?php echo $c['id_criterio']; ?>">
																	<!-- Estatus del criterio: INACTIVO / ACTIVO -->
																	<input id="estatusId" name="estatus" type="hidden" value="<?php echo $c['estatus']; ?>">
																	<!-- Tipo de profesor: REVISOR / TUTOR / JURADO -->
																	<input id="tipoProfesorId" name="tipoProfesor" type="hidden" value="<?php echo $tipoProfe; ?>">
																	<!-- Tipo de modalidad: Experimental / Instrumental  -->
																	<input id="modalidadId" name="modalidad" type="hidden" value="<?php echo $modalidad; ?>">

																	<div class="d-flex justify-content-end align-items-baseline">
																		<button name="modificarEstatus" type="submit" class="btn btn-success" required>Continuar</button>
																		<button type="button" class="ml-1 btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
																	</div>
																</form>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
									<?php endforeach; ?>
									<!-- Criterios Jurado -->
									<?php foreach ($criteriosJurados as $c) : ?>
										<?php
										// Variables para actualizar estatus
										$tipoProfe = "Jurado";
										$modalidad = "Experimental";
										?>
										<tr>
											<td><?php echo $c['id_criterio']; ?></td>
											<td><?php echo $c['notamax']; ?></td>
											<td><?php echo $c['descripcion']; ?></td>
											<td><?php echo $tipoProfe; ?></td>

											<?php if ($c['estatus'] == 'ACTIVO') {
												$accion = 'deshabilitar'; ?>
												<td class="text-center">
													<h2 class="badge bg-success">ACTIVO</h2>
												</td>
												<td class="d-flex justify-content-center">
													<button data-bs-toggle="modal" data-bs-target="#modificarEstatusCriterio_<?php echo $c['id_criterio'] . $tipoProfe; ?>" class="btn btn-danger mr-1" value="<?php echo $c['id_criterio']; ?>" name="eliminarprofesor"><i class="fas fa-power-off" title="Deshabilitar"></i></button>
													<form action="escuela-criterios-eliminar" method="POST">
														<!-- ID del criterio: n -->
														<input id="id_criterioId" name="id_criterio" type="hidden" value="<?php echo $c['id_criterio']; ?>">

														<!-- Modalidad-->
														<input id="modalidadId" name="modalidad" type="hidden" value="<?php echo $modalidad; ?>">
														<!-- Tipo de profe -->
														<input id="tipoProfe" name="tipoprofe" type="hidden" value="<?php echo $tipoProfe; ?>">

														<button class="btn btn-secondary" value="<?php echo $c['id_criterio'] . $tipoProfe; ?>" name="eliminarcriterio">
															<i class="far fa-trash-alt"></i>
														</button>

													</form>
												</td>
											<?php } else {
												$accion = 'habilitar'; ?>
												<td class="text-center">
													<h2 class="badge bg-danger">INACTIVO</h2>
												</td>
												<td class="d-flex justify-content-center">
													<button data-bs-toggle="modal" data-bs-target="#modificarEstatusCriterio_<?php echo $c['id_criterio'] . $tipoProfe; ?>" class="btn btn-danger mr-1" value="<?php echo $c['id_criterio']; ?>" name="eliminarprofesor"><i class="fas fa-power-off" title="Deshabilitar"></i></button>
													<form action="escuela-criterios-eliminar" method="POST">
														<!-- ID del criterio: n -->
														<input id="id_criterioId" name="id_criterio" type="hidden" value="<?php echo $c['id_criterio']; ?>">

														<!-- Modalidad-->
														<input id="modalidadId" name="modalidad" type="hidden" value="<?php echo $modalidad; ?>">
														<!-- Tipo de profe -->
														<input id="tipoProfe" name="tipoprofe" type="hidden" value="<?php echo $tipoProfe; ?>">

														<button class="btn btn-secondary" value="<?php echo $c['id_criterio'] . $tipoProfe; ?>" name="eliminarcriterio">
															<i class="far fa-trash-alt"></i>
														</button>

													</form>
												</td>
											<?php } ?>

										</tr>

										<!-- Modal habilitar/deshabilitar -->
										<!-- MODAL modificar estatus  -->
										<div class="modal fade" id="modificarEstatusCriterio_<?php echo $c['id_criterio'] . $tipoProfe; ?>" tabindex="-1" aria-labelledby="modificarEstatusCriterio_<?php echo $c['id_criterio'] . $tipoProfe; ?>" aria-hidden="true">
											<div class="modal-dialog">
												<div class="modal-content">
													<div class="modal-header">
														<h5 class="modal-title" id="staticBackdropLabel">Confirmacion</h5>
														<button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
															<span aria-hidden="true">&times;</span>
														</button>

													</div>

													<div class="modal-body">
														<div class="card">
															<div class="card-body">
																<p>Esta seguro de <b><?php echo $accion; ?></b> el criterio : <?php echo $c['descripcion']; ?></p>
																<form action="escuela-criterios-modificar-estatus" method="POST" enctype="multipart/form-data">
																	<!-- Informacion  hidded de modal  -->
																	<!-- ID del criterio: n -->
																	<input id="id_criterioId" name="id_criterio" type="hidden" value="<?php echo $c['id_criterio']; ?>">
																	<!-- Estatus del criterio: INACTIVO / ACTIVO -->
																	<input id="estatusId" name="estatus" type="hidden" value="<?php echo $c['estatus']; ?>">
																	<!-- Tipo de profesor: REVISOR / TUTOR / JURADO -->
																	<input id="tipoProfesorId" name="tipoProfesor" type="hidden" value="<?php echo $tipoProfe; ?>">
																	<!-- Tipo de modalidad: Experimental / Instrumental  -->
																	<input id="modalidadId" name="modalidad" type="hidden" value="<?php echo $modalidad; ?>">

																	<div class="d-flex justify-content-end align-items-baseline">
																		<button name="modificarEstatus" type="submit" class="btn btn-success" required>Continuar</button>
																		<button type="button" class="ml-1 btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
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
		<!-- /.content -->
	</div>

	<?php include_once('../public/Views/componentes/footer.php'); ?>

	</div>
	<?php include_once('../public/Views/componentes/adminlte.php'); ?>
	<?php include_once('../public/Views/componentes/scripdatatable.php'); ?>

</body>

</html>