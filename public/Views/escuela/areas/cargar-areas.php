<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Escuela| Areas - Cargar Areas</title>
	<?php

use App\Controllers\escuela\AreasController;
use App\Models\Areas;

	include_once('../public/Views/componentes/cssadminlte.php'); ?>
	<!-- DATATABLES -->
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.4/css/jquery.dataTables.css">
</head>

<body class="sidebar-mini layout-fixed vsc-initialized layout-navbar-fixed sidebar-closed ">
	<div class="wrapper">

	<?php include_once('../public/Views/componentes/indexSidebar.php'); ?>

		<div class="content-wrapper p-5">
			<div class="container">
				<form action="escuela-areas-cargar" method="POST" enctype="multipart/form-data">
					<input type="file" value="Subir Archivo" name="archivo" required>
					<button type="submit" name="enviar" class="btn btn-primary">Cargar </button>
				</form>
				<?php
				if (isset($_POST['enviar'])) {
					$archivo = $_FILES["archivo"]["name"];
					$archivo_copiado = $_FILES["archivo"]["tmp_name"];
					$archivo_guardado = "copia_" . $archivo;
					if (copy($archivo_copiado, $archivo_guardado)) {
						echo "se copio correctamente " . "</br>";
					} else {
						header('location:error');
					}
					if (file_exists($archivo_guardado)) {
						$fp = fopen($archivo_guardado, "r");
						$i = 0;
				?>
						<table class="card-body table table-flush" id="example">
							<thead class="thead-light">
								<tr>
									<th>Nº Fila</th>
									<th>Resultado</th>
								</tr>
							</thead>
							<tbody>
								<?php $rows = 0;
								while ($datos = fgetcsv($fp, 5000, ";")) {
									$i++;
									$id_area = $datos[0];
									$nombre = $datos[1];

									$rows++; ?>

									<?php $valor = null;
									if ($rows > 1) {
										$slug = str_replace(' ', '-', strtolower(preg_replace('([^A-Za-z0-9 ])', '', trim($nombre))));
										$resultado = (new Areas())->where('slug', '=', $slug)->getOb();
										if($resultado){
											$valor=0;
										}else{
											$count= (new Areas())->sentenciaObj("SELECT COUNT (id_area) as id FROM areas");
											$count=$count['id'];
											if ($count) {
												$count=$count+1;
												$query = "INSERT INTO  areas(id_area,nombre,slug) VALUES($count,'$nombre','$slug')";
												
											} else {

												$query = "INSERT INTO  aareas(id_area,nombre,slug) VALUES(1,'$nombre','$slug')";
											}
											$valor = (new Areas())->insertarObj($query);

										}
										

										if ($valor > 0) {
									?>
											<tr>
												<td><?php echo $i; ?></td>
												<td>SE INSERTO CORRECTAMENTE</td>
											<?php } else { ?>
												<td><?php echo $i; ?></td>
												<td class="bg-danger">NO SE INSERTO </td>
											</tr>
										<?php } ?>
								<?php }
								} ?>

							</tbody>
						</table>
				<?php } else {
						header('location:error');
					}
				}
				if (isset($archivo_guardado)) {
					unlink($archivo_guardado);
				}
				?>
			</div>
		</div>
	</div>

	<?php include_once('../public/Views/componentes/footer.php'); ?>

	</div>
	<?php include_once('../public/Views/componentes/adminlte.php'); ?>
	<?php include_once('../public/Views/componentes/scripdatatable.php'); ?>

</body>

</html>