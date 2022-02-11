<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Escuela| Tesistas - Cargar Tesistas</title>
	<?php

	use App\Models\Tesistas;

	include_once('../public/Views/componentes/cssadminlte.php'); ?>
	<!-- DATATABLES -->
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.4/css/jquery.dataTables.css">
</head>

<body class="sidebar-mini layout-fixed vsc-initialized layout-navbar-fixed sidebar-closed ">
	<div class="wrapper">
		<?php include_once('../public/Views/componentes/indexSidebar.php'); ?>

		<div class="content-wrapper p-5">
			<div class="container">
				<form action="escuela-tesistas-cargar" method="POST" enctype="multipart/form-data">
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
									$cedula = $datos[0];
									$nombre = $datos[1];
									$correoucab = $datos[2];
									$correoparticular = $datos[3];
									$telefono = $datos[4];
									$comentario = $datos[5];
									$rows++; ?>

									<?php $valor = null;
									if ($rows > 1) {
										$query = "INSERT INTO  tesistas (cedula,nombre,correoucab,correoparticular,telefono,comentario) VALUES($cedula,'$nombre','$correoucab','$correoparticular','$telefono','$comentario')";
										$valor = (new Tesistas())->insertarObj($query);

										if ($valor > 0) {
											$contraseña = password_hash($cedula, PASSWORD_BCRYPT);
        									$sql = "INSERT INTO  usuarios (cedula,nombre_usuario,correo,contraseña,modelo,codigo) VALUES($cedula,'$nombre','$correoucab','$contraseña','Tesistas','$contraseña')";
											(new Tesistas())->insertarObj($sql);
									?>
											<tr>
												<td><?php echo $i; ?></td>
												<td>SE INSERTO CORRECTAMENTE</td>
											<?php } else { ?>
												<td><?php echo $i; ?></td>
												<td class="bg-danger">NO SE INSERTO</td>
											
										<?php } ?></tr>
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