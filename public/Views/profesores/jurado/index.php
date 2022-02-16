<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Profesor | Jurado</title>
    <?php

use App\Models\RevisaJurado;

    include_once('../public/Views/componentes/cssadminlte.php'); ?>
    <!-- DATATABLES -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.4/css/jquery.dataTables.css">
</head>

<body class="sidebar-mini layout-fixed vsc-initialized layout-navbar-fixed sidebar-closed">

    <div class="wrapper">
        <?php include_once('../public/Views/componentes/sidebarProfesor.php'); ?>
        <div class="content-wrapper">
            <section class="content p-4">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-12 ">
                            <h1 class="float-lg-right"><strong>Lista de Propuestas que soy Jurado</strong></h1>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <section class="col-lg-12 ">
                        <div class="card">
                            <div class=" table-responsive py-4 p-4">
                                <?php if (isset($_SESSION['mensaje'])) : ?>
                                    <div class="alert alert-<?= $_SESSION['colorcito']; ?> alert-dismissible fade show" role="alert">
                                        <?php echo $_SESSION['mensaje']; ?>
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                <?php unset($_SESSION['mensaje']);
                                    unset($_SESSION['colorcito']);
                                endif; ?>
                                <table class="card-body table table-flush" id="example">
                                    <thead class="thead-light">
                                        <tr>
                                            <th>Nº</th>
                                            <th>Titulo</th>
                                            <th>Modalidad</th>
                                            <th>Evaluar</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($propuestasExp as $propuesta) : ?>
                                            <tr>
                                                <td><?php echo $propuesta['num_c']; ?></td>
                                                <td><?php echo $propuesta['titulo']; ?></td>
                                                <td class="text-center">
                                                    <?php if ($propuesta['modalidad'] == 'I') { ?>
                                                        <h2 class="badge bg-primary">Instrumental</h2>
                                                    <?php } else { ?>
                                                        <h2 class="badge bg-success">Experimental</h2>
                                                    <?php } ?>
                                                </td>
                                                <td>
                                                    <form action="profesor-jurado-evaluar" method="post">
                                                        <input hidden name="modalidad" value="<?php echo $propuesta['modalidad']; ?>">
                                                        <button class="btn btn-warning" value="<?php echo $propuesta['num_c']; ?>" name="evaluar" <?php
                                                            if ($propuesta['modalidad'] == 'I') {
                                                                $cantidad = (new RevisaJurado())->validadExistenciaPTG_Ins($propuesta['num_c']);
                                                            } else {
                                                                $cantidad = (new RevisaJurado())->validadExistenciaPTG_Exp($propuesta['num_c']);
                                                            } ?> <?php if ($cantidad) { ?> disabled <?php } ?> 
                                                        >EVALUAR</button>
                                                    </form>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                        <?php foreach ($propuestasIns as $propuesta) : ?>
                                            <tr>
                                                <td><?php echo $propuesta['num_c']; ?></td>
                                                <td><?php echo $propuesta['titulo']; ?></td>
                                                <td class="text-center">
                                                    <?php if ($propuesta['modalidad'] == 'I') { ?>
                                                        <h2 class="badge bg-primary">Instrumental</h2>
                                                    <?php } else { ?>
                                                        <h2 class="badge bg-success">Experimental</h2>
                                                    <?php } ?>
                                                </td>
                                                <td>
                                                    <form action="profesor-tutor-evaluar" method="post">
                                                        <input hidden name="modalidad" value="<?php echo $propuesta['modalidad']; ?>">
                                                        <button class="btn btn-warning" value="<?php echo $propuesta['num_c']; ?>" name="evaluar" <?php
                                                            if ($propuesta['modalidad'] == 'I') {
                                                                $cantidad = (new RevisaJurado())->validadExistenciaPTG_Ins($propuesta['num_c']);
                                                            } else {
                                                                $cantidad = (new RevisaJurado())->validadExistenciaPTG_Exp($propuesta['num_c']);
                                                            } ?> <?php if ($cantidad) { ?> disabled <?php } ?> 
                                                        >EVALUAR</button>
                                                    </form>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </section>
                </div>
            </section>
        </div>
        <?php include_once('../public/Views/componentes/footer.php'); ?>

    </div>

    <?php include_once('../public/Views/componentes/adminlte.php'); ?>
    <?php include_once('../public/Views/componentes/scripdatatable.php'); ?>
</body>

</html>