<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Asignaciones| Evaluacion del comite </title>
    <?php include_once('../public/Views/componentes/cssadminlte.php'); ?>
    <!-- DATATABLES -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.4/css/jquery.dataTables.css">
</head>

<body class="sidebar-mini layout-fixed vsc-initialized layout-navbar-fixed sidebar-closed sidebar-collapse">
    <div class="wrapper">

        <?php include_once('../public/Views/componentes/indexSidebar.php'); ?>


        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <section class="content ">
                <div class="row ">
                    <section class="col-lg-12 connectedSortable p-4">
                        <div class="container-fluid">
                            <div class="row mb-2">


                                <div class="col-sm-6">
                                    <h1><strong>Evaluacion del comite</strong></h1>
                                </div>
                            </div>
                        </div>

                        <div class="card table-responsive p-2 ">

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
                            <div class="col col-6 align-self-center">
                                <form action="escuela-evaluar-comite" method="POST">
                                    <!-- Numero de los comites -->
                                    <div class="form-group flex">
                                        <label>Numeros de comites</label></br>
                                        <select class="custom-select" name="numeroComite" type required>
                                            <option value="" selected>Seleccione una opcion</option>

                                            <option value="APROBADO">APROBADO</option>
                                        </select>
                                    </div>
                                    <!-- Id de los comites -->
                                    <div class="form-group flex">
                                        <label>Id de comites</label></br>
                                        <select class="custom-select" name="id_comite" type required>
                                            <option value="" selected>Seleccione una opcion</option>

                                            <option value="APROBADO">APROBADO</option>
                                        </select>
                                    </div>
                                    <!-- Numero de las propuestas de trabajo de grado -->
                                    <div class="mb-3">
                                        <label for="numeroPropuestaTG" class="form-label">Numero de propuesta del Trabajo de grado</label>
                                        <input type="number" class="form-control" id="numeroPropuestaTG" placeholder="Ingrese el Numero de propuesta del Trabajo de grado" min="0" required>
                                    </div>
                                    <!-- Estatus de la evaluacion del comite -->
                                    <div class="form-group flex">
                                        <label>Estatus</label></br>
                                        <select class="custom-select" name="estatus" type required>
                                            <option value="REPROBADO" selected>REPROBADO</option>
                                            <option value="APROBADO">APROBADO</option>
                                        </select>
                                    </div>
                                    <!-- Cedula del profesor revisor  -->
                                    <div class="form-group flex">
                                        <label>Cedula del revisor</label></br>
                                        <select class="custom-select" name="cedularevisor" type required>
                                            <option value="" selected>Seleccione una opcion</option>
                                            <option value="APROBADO">APROBADO</option>
                                        </select>
                                    </div>
                                    <button type="submit" class="btn btn-success col-12 name" name="evaluarComite">Enviar evaluacion</button>
                                </form>

                            </div>

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