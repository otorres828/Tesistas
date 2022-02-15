<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Revisor | Evaluar</title>
    <?php include_once('../public/Views/componentes/cssadminlte.php'); ?>
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
                        <form action="" method="post">
                            <div class="card card-body border-0 shadow mb-4">
                                <h2 class="h5 mb-4">EVALUAR PROPUESTA DE TRABAJO DE GRADO</h2>
                                <div class="row">
                                    <div class="col-md-2 mb-3">
                                        <div>
                                            <label for="first_name">Nº Propuesta</label>
                                            <input class="form-control" type="text" value="<?php echo $propuesta['num_c']; ?>" disabled>
                                        </div>
                                    </div>
                                    <div class="col-md-10 mb-3">
                                        <div>
                                            <label for="first_name">Titulo de la Propuesta</label>
                                            <input class="form-control" type="text" value="<?php echo $propuesta['titulo']; ?>" disabled>
                                        </div>
                                    </div>

                                </div>
                                <div class="row align-items-center">
                                    <?php for ($i = 1; $i < 15; $i++) : ?>
                                        <!-- INPUT CRITERIO -->
                                        <div class="col-md-9 mb-3">
                                            <div class="form-group">
                                                <label>Criterio <?= $i ?></label>
                                                <input class="form-control" value="<?php echo $propuesta['modalidad']; ?>" disabled>
                                            </div>
                                        </div>
                                        <!-- SELECT DE LA NOTA -->
                                        <div class="col-md-3 mb-3">
                                            <div class="form-group">
                                                <label>Nota</label>
                                                <select name="criterio1" class="form-control">
                                                    <option value="">1</option>
                                                    <option value="">2</option>
                                                    <option value="">3</option>
                                                    <option value="">4</option>
                                                    <option value="">5</option>
                                                </select>
                                            </div>
                                        </div>
                                    <?php endfor; ?>
                                </div>

                            </div>

                        </form>
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