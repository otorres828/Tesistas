<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Asignaciones| Evaluacion del consejo </title>
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
                <div class="row ">
                    <section class="col-lg-12  p-4">
                        <div class="text-center">
                            <div class="row mb-2">
                                <div class="col-sm-12">
                                    <h1><strong>Evaluacion del consejo</strong></h1>
                                </div>
                            </div>
                        </div>

                        <div class=" table-responsive p-2 ">
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


                            <?php $esPosibleEvaluar = true; ?>
                            <div class="col-12 col-xl-6  mx-auto">
                                <form action="escuela-evaluar-consejo" method="POST">
                                    <!-- Numero correlativo : num_c -->
                                    <div class="form-group flex">
                                        <label>Numeros correlativo, Trabajo de grado</label></br>
                                        <?php //Verificacion de que contenga almenos un comite 
                                        sizeof($propuestastg) > 0 ? $esPosibleEvaluar = true : $esPosibleEvaluar = false;
                                        if ($esPosibleEvaluar) { ?>
                                            <select class="custom-select" aria-label="" name="num_c" required>
                                                <option value="" selected>Seleccione una opcion</option>
                                            <?php } else {          ?>
                                                <select class="custom-select Disabled" aria-label="" name="num_c" required disabled>
                                                    <option value="" selected>Aun no existen propuestas de trabajo de grado en donde no haya sido evaluado</option>
                                                <?php }            ?>



                                                <?php foreach ($propuestastg as $ptg) { ?>
                                                    <option value="<?php echo $ptg['num_c']; ?>"><?php echo "(" . $ptg['num_c'] . ") - " . $ptg['titulo'] . "- " . $ptg['modalidad']; ?></option>
                                                <?php } ?>

                                                </select>
                                    </div>
                                    <!-- Numero de los consejo : nro_consejo -->
                                    <div class="form-group flex">
                                        <label>Numero del consejo</label></br>
                                        <?php //Verificacion de que contenga almenos un comite 
                                        sizeof($consejos) > 0 ? $esPosibleEvaluar = true : $esPosibleEvaluar = false;
                                        if ($esPosibleEvaluar) { ?>
                                            <select class="custom-select" aria-label="" name="nro_consejo" required>
                                                <option value="" selected>Seleccione una opcion</option>

                                            <?php } else {          ?>
                                                <select class="custom-select Disabled" aria-label="" name="nro_consejo" required disabled>
                                                    <option value="" selected>Aun no existen consejos en donde no haya sido evaluado</option>
                                                <?php }            ?>


                                                <?php foreach ($consejos as $comite) { ?>
                                                    <option value="<?php echo $comite['nro_consejo']; ?>"><?php echo "N: (" . $comite['nro_consejo'] . ") -> " . $comite['fecha']; ?></option>
                                                <?php } ?>
                                                </select>
                                    </div>

                                    <!-- Estatus de la evaluacion del consejo-->
                                    <div class="form-group flex">
                                        <label>Estatus</label></br>
                                        <select class="custom-select" name="estatus" type required>
                                            <option value="REPROBADO" selected>REPROBADO</option>
                                            <option value="APROBADO">APROBADO</option>
                                        </select>
                                    </div>
                                    <!-- Cedula del profesor tutor  -->
                                    <div class="form-group flex">
                                        <label>Cedula del tutor</label></br>

                                        <?php //Verificacion de que contenga almenos un profe
                                        sizeof($internos) > 0 ? $esPosibleEvaluar = true : $esPosibleEvaluar = false;
                                        if ($esPosibleEvaluar) { ?>
                                            <select class="custom-select" aria-label="" name="cedulatutor" required>
                                                <option value="" selected>Seleccione una opcion</option>

                                            <?php } else {          ?>
                                                <select class="custom-select Disabled" aria-label="" name="cedulatutor" required disabled>
                                                    <option value="" selected>No hay profesores internos disponibles (Que no sean tutores)</option>
                                                <?php }            ?>


                                                <?php foreach ($internos as $interno) { ?>
                                                    <option value="<?php echo $interno['cedula']; ?>">(<?php echo $interno['cedula']; ?>)=><?php echo $interno['nombre']; ?></option>
                                                <?php } ?>
                                                </select>

                                    </div>
                                    <!-- Cedula del profesor JURADO 1 -->
                                    <div class="form-group flex">
                                        <label>Cedula del jurado 1</label></br>

                                        <?php //Verificacion de que contenga almenos un profe
                                        sizeof($internos) > 0 ? $esPosibleEvaluar = true : $esPosibleEvaluar = false;
                                        if ($esPosibleEvaluar) { ?>
                                            <select class="custom-select" aria-label="" name="cedulajurado1" required>
                                                <option value="" selected>Seleccione una opcion</option>

                                            <?php } else {          ?>
                                                <select class="custom-select Disabled" aria-label="" name="cedulajurado1" required disabled>
                                                    <option value="" selected>No hay profesores internos disponibles (Que no sean jurado)</option>
                                                <?php }            ?>


                                                <?php foreach ($internos as $interno) { ?>
                                                    <option value="<?php echo $interno['cedula']; ?>">(<?php echo $interno['cedula']; ?>)=><?php echo $interno['nombre']; ?></option>
                                                <?php } ?>
                                                </select>

                                    </div>
                                    <!-- Cedula del profesor Jurado 2   -->
                                    <div class="form-group flex">
                                        <label>Cedula del Jurado 2</label></br>

                                        <?php //Verificacion de que contenga almenos un profe
                                        sizeof($internos) > 0 ? $esPosibleEvaluar = true : $esPosibleEvaluar = false;
                                        if ($esPosibleEvaluar) { ?>
                                            <select class="custom-select" aria-label="" name="cedulajurado2" required>
                                                <option value="" selected>Seleccione una opcion</option>

                                            <?php } else {          ?>
                                                <select class="custom-select Disabled" aria-label="" name="cedulajurado2" required disabled>
                                                    <option value="" selected>No hay profesores internos disponibles (Que no sean tutores)</option>
                                                <?php }            ?>


                                                <?php foreach ($internos as $interno) { ?>
                                                    <option value="<?php echo $interno['cedula']; ?>">(<?php echo $interno['cedula']; ?>)=><?php echo $interno['nombre']; ?></option>
                                                <?php } ?>
                                                </select>

                                    </div>
                                    <?php if (!$esPosibleEvaluar) { ?>
                                        <button type="submit" class="btn btn-success col-12 name" name="evaluarConsejo">Enviar evaluacion</button>
                                    <?php } else {          ?>
                                        <button type="submit" class="btn btn-success col-12 name " name="evaluarConsejo">Enviar evaluacion</button>

                                    <?php }            ?>

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
    <!-- Script para cambiar estado del boton cuando los selects tengan valor  -->

</body>

</html>