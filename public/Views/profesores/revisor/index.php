<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Profesor| Revisor</title>
    <?php include_once('../public/Views/componentes/cssadminlte.php'); ?>
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
                            <h1 class="float-lg-right"><strong>Lista de Propuestas que soy Revisor</strong></h1>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <section class="col-lg-12 ">
                        <div class="card">
                            <div class=" table-responsive py-4 p-4">

                                <table class="card-body table table-flush" id="example">
                                    <thead class="thead-light">
                                        <tr>
                                            <th>Nº</th>
                                            <th>Titulo</th>
                                            <th>Evaluar</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($propuestas as $propuesta) : ?>
                                            <tr>
                                                <td><?php echo $propuesta['num_c']; ?></td>
                                                <td><?php echo $propuesta['titulo']; ?></td>
                                                <td>
                                                    <form action="profesor-revisor-evaluar" method="post">
                                                        <input hidden name="modalidad" value="<?php echo $propuesta['modalidad']; ?>">
                                                        <button class="btn btn-warning" value="<?php echo $propuesta['num_c']; ?>" name="evaluar">EVALUAR</button>
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