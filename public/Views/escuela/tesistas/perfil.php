<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Escuela| Tesistas - Informacion</title>
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
            <div class="content-header">
                <div class="container-fluid">

                    <div class="row">
                        <div class="col-12 col-xl-8">
                            <?php
                            if (isset($_SESSION['mensaje'])) { ?>
                                <div class="alert alert-<?= $_SESSION['colorcito']; ?> alert-dismissible fade show" role="alert">
                                    <?php echo $_SESSION['mensaje']; ?>
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>

                            <?php unset($_SESSION['mensaje']);
                            }
                            ?>
                            <div class="card card-body border-0 shadow mb-4">
                                <h2 class="h5 mb-4">Informacion General del Tesista</h2>
                                <div class="row">
                                    <div class="col-md-12 mb-3">
                                        <div>
                                            <label for="first_name">Nombre Completo</label>
                                            <input class="form-control" type="text" value="<?php echo $tesista['nombre_usuario']; ?>" disabled>
                                        </div>
                                    </div>

                                </div>
                                <div class="row align-items-center">
                                    <div class="col-md-6 mb-3">
                                        <div class="form-group">
                                            <label for="email">Correo Ucab</label>
                                            <input class="form-control" value="<?php echo $tesista['correoucab']; ?>" disabled>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <div class="form-group">
                                            <label for="email">Correo Personal</label>
                                            <input class="form-control" type="email" value="<?php echo $tesista['correo']; ?>" disabled>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <div class="form-group">
                                            <label for="email">Telefono</label>
                                            <input class="form-control" value="<?php echo $tesista['telefono']; ?>" disabled>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <div class="form-group ">
                                            <label>Codigo de Seguridad<i id="copiar_codigo" class="btn fas fa-copy"></i>
                                            </label>
                                            <input class="form-control" value="<?php echo $tesista['codigo']; ?>" disabled>

                                        </div>
                                    </div>


                                    <div class="col-md-12 mb-3">
                                        <div>
                                            <label for="last_name">Biografia</label>
                                            <p class="form-control h-100" disabled><?php echo $tesista['comentario']; ?></p>
                                        </div>
                                    </div>
                                </div>
                                <h2 class="h5">Seguridad</h2>
                                <div class="row ">
                                    <div data-bs-toggle="modal" data-bs-target="#modificarClave" data-bs-whatever="@mdo" class="btn btn-info m-1">Modificar Clave</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-xl-4">
                            <div class="row">
                                <div class="col-12 mb-4">
                                    <div class="card shadow border-0 text-center p-0">
                                        <div class="card-body pb-5">
                                            <img src="../../dist/img/avatar.png" class="avatar-xl rounded-circle mx-auto mt-n7 mb-4" alt="Neil Portrait">
                                            <h4 class="h3">
                                                <?php echo $tesista['nombre_usuario']; ?>
                                            </h4>
                                            <h5 class="fw-normal">Tesista</h5>
                                            <p class="text-gray">Ucab Guayana</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="border-0 shadow p-4 card table-responsive p-4">
                            <div class="container-fluid">
                                <div class="row mb-2">
                                    <div class="col-sm-6">
                                        <h1 class=""><strong>Lista de Propuestas del Tesista</strong></h1>
                                    </div>
                                </div>
                            </div>
                            <table class="table table-flush" id="example">
                                <thead class="thead-light">
                                    <tr class="text-center">
                                        <th>Nº </th>
                                        <th>Titulo</th>
                                        <th>Modalidad</th>
                                        <th>Observaciones</th>
                                        <th>E.Comite</th>
                                        <th>E.Consejo</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($propuestastesista as $propuesta) { ?>
                                        <tr>
                                            <td class="text-center"><?php echo $propuesta['num_c']; ?></td>
                                            <td> <?php echo $propuesta['titulo']; ?></td>
                                            <td class="text-center">
                                                <?php if ($propuesta['modalidad'] == 'I') { ?>
                                                    <h2 class="badge bg-primary">Instrumental</h2>
                                                <?php } else { ?>
                                                    <h2 class="badge bg-success">Experimental</h2>
                                                <?php } ?>
                                            </td>
                                            <td class="text-center">
                                                <?php if (is_null($propuesta['observaciones'])) { ?>
                                                    <h2 class="badge bg-warning">PENDIENTE</h2>
                                                <?php  } else {
                                                    echo $propuesta['observaciones'];
                                                } ?>
                                            </td>
                                            <td class="text-center">
                                                <?php if (is_null($propuesta['estatus'])) { ?>
                                                    <h2 class="badge bg-warning">PENDIENTE</h2>
                                                    <?php } else {
                                                    $cedula = $propuesta['cedula'];
                                                    $num_c = $propuesta['num_c'];
                                                    $sql = "SELECT estatus
                              FROM evaluacioncomite 
                              WHERE num_c=$num_c";
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
                                                <?php if (is_null($propuesta['estatusc'])) { ?>
                                                    <h2 class="badge bg-warning">PENDIENTE</h2>
                                                    <?php } else {
                                                    $cedula = $propuesta['cedula'];
                                                    $num_c = $propuesta['num_c'];
                                                    $sql = "SELECT estatus
                              FROM evaluacionconsejo 
                              WHERE num_c=$num_c";
                                                    $valor = (new PropuestaTG())->sentenciaObj($sql);
                                                    $valor = $valor['estatus'];
                                                    if ($valor == 'REPROBADO') { ?>
                                                        <h2 class="badge bg-danger">REPROBADO</h2>
                                                    <?php } else { ?>
                                                        <h2 class="badge bg-success">APROBADO</h2>

                                                <?php }
                                                } ?>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                        <?php include_once('../public/Views/componentes/modificarPerfilTesistaEscuela.php'); ?>

                    </div>
                </div>
            </div>


        </div>

    </div>

    <?php include_once('../public/Views/componentes/footer.php'); ?>

    </div>
    <?php include_once('../public/Views/componentes/adminlte.php'); ?>
    <?php include_once('../public/Views/componentes/scripdatatable.php'); ?>

</body>

</html>