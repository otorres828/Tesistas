<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Revisor | Evaluar</title>
    <?php

use App\Models\Criterios;

 include_once('../public/Views/componentes/cssadminlte.php'); ?>
    <!-- DATATABLES -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.4/css/jquery.dataTables.css">
</head>

<body class="sidebar-mini layout-fixed vsc-initialized layout-navbar-fixed sidebar-closed">

    <?php include_once('../public/Views/componentes/sidebarProfesor.php'); ?>
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">

                <div class="container">
                    <div class="col-12 col-xl-12">
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
                            <form action="profesor-tutor-evaluar-enviar" method="POST" enctype="multipart/form-data">
                                <h2 class="h5 mb-4">EVALUAR PROPUESTA DE TRABAJO DE GRADO</h2>
                                <div class="row">
                                    <div class="col-md-2 mb-3">
                                        <div>
                                            <label>Nº Propuesta</label>
                                            <input class="form-control" name="num_c" type="text" value="<?php echo $propuesta['num_c']; ?>" disabled>
                                        </div>
                                    </div>
                                    <div class="col-md-2 mb-3">
                                        <div>
                                            <label>Modalidad</label>
                                            <input class="form-control" name="num_c" type="text" <?php if($modalidad=='I'){ ?>value="INSTRUMENTAL" <?php }else ?> value="EXPERIMENTAL"
                                            disabled>
                                        </div>
                                    </div>
                                    <div class="col-md-8 mb-3">
                                        <div>
                                            <label for="first_name">Titulo de la Propuesta</label>
                                            <input class="form-control" type="text" value="<?php echo $propuesta['titulo']; ?>" disabled>
                                            <input value="<?php echo $propuesta['num_c']; ?>" name="num_c" hidden>
                                        </div>
                                    </div>
                                </div>
                                <?php $numtesista=1; foreach ($tesitas as $tesista) : ?>
                                    <h2 class="h4 mb-4 bg-info p-2 text-center">Tesista <?= $numtesista++ ?></h2>
                                    <div class="row align-items-center">
                                        <?php $i = 1;
                                        foreach ($criterios as $criterio) : ?>
                                            <input type="hidden" name="id" .$i value="<?php echo $criterio['id_criterio']; ?>">
                                            <!-- INPUT CRITERIO -->
                                            <div class="col-md-9 mb-3">
                                                <div class="form-group">
                                                    <label>Criterio <?= $i++ ?></label>
                                                    <input class="form-control" value="<?php echo $criterio['descripcion']; ?>" disabled>
                                                </div>
                                            </div>
                                           
                                            <!-- SELECT DE LA NOTA -->
                                            <div class="col-md-3 mb-3">
                                                <div class="form-group">
                                                    <label>Escoja Una Nota</label>
                                                    <select name="<?php echo $criterio['id_criterio']; ?>" class="form-control">
                                                        <?php for($a=1;$a<=$criterio['notamax'];$a++):?>
                                                            <option value="<?=$a;?>"><?=$a;?></option>
                                                        <?php endfor; ?>
                                                    </select>
                                                </div>
                                            </div>
                                        <?php endforeach; ?>
                                    </div>
                                <?php endforeach; ?>
                                <div class="row">
                                    <div class="col-md-12 mb-3">
                                        <div>
                                            <button type="submit" class="btn btn-warning w-full">ENVIAR EVALUACION</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <?php include_once('../public/Views/componentes/footer.php'); ?>

    <?php include_once('../public/Views/componentes/adminlte.php'); ?>
    <?php include_once('../public/Views/componentes/scripdatatable.php'); ?>
</body>

</html>