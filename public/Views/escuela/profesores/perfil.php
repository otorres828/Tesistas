<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Escuela | Profesor - Informacion</title>
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
                                <h2 class="h5 mb-4">Informacion General del Profesor</h2>
                                <div class="row">
                                    <div class="col-md-12 mb-3">
                                        <div>
                                            <label for="first_name">Nombre Completo</label>
                                            <input class="form-control" type="text" value="<?php echo $profesor['nombre']; ?>" disabled>
                                        </div>
                                    </div>

                                </div>
                                <div class="row align-items-center">
                                    <div class="col-md-6 mb-3">
                                        <div class="form-group">
                                            <label>cedula</label>
                                            <input class="form-control" value="<?php echo $profesor['cedula']; ?>" disabled>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <div class="form-group">
                                            <label>correoparticular</label>
                                            <input class="form-control" type="email" value="<?php echo $profesor['correoparticular']; ?>" disabled>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <div class="form-group">
                                            <label>Telefono</label>
                                            <input class="form-control" value="<?php echo $profesor['telefono']; ?>" disabled>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <div class="form-group ">
                                            <label>Tipo</label>
                                            <?php if ($profesor['tipo'] == 'I') { ?>
                                                <input class="form-control" value="INTERNO" disabled>
                                            <?php } else { ?>
                                                <input class="form-control" value="EXTERNO" disabled>
                                            <?php } ?>

                                        </div>
                                    </div>
                                    <div class="col-md-12 mb-3">
                                        <div>
                                            <label for="last_name">Direccion</label>
                                            <p class="form-control h-100" disabled><?php echo $profesor['direccion']; ?></p>
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
                                                <?php echo $profesor['nombre']; ?>
                                            </h4>
                                            <h5 class="fw-normal">Profesor</h5>
                                            <p class="text-gray">Ucab Guayana</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <?php include_once('../public/Views/componentes/modificarPerfilProfesorEscuela .php'); ?>

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