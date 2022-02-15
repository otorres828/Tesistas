<!-- <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="../../dist/img/Ucabg.png" alt="Ucab Guayana" height="30%" width="15%">
</div> -->

<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
        <!-- Notifications Dropdown Menu -->
        <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#">
                <i class="fas fa-cog"></i>
            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                <span class="dropdown-item dropdown-header"><?php echo $profesor['nombre']; ?></span>
                <div class="dropdown-divider"></div>
                <a href="profesor-perfil" class="dropdown-item">
                    <i class="fas fa-user"></i> Perfil
                </a>
                <div class="dropdown-divider"></div>
                <a href="login-cerrarsesion" class="dropdown-item">
                    <i class="fas fa-sign-out-alt"></i>Cerrar Sesion
                </a>

            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                <i class="fas fa-expand-arrows-alt"></i>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-widget="control-sidebar" data-controlsidebar-slide="true" href="#" role="button">
                <i class="fas fa-th-large"></i>
            </a>
        </li>
    </ul>
</nav>

<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <a href="profesores" class="brand-link">
        <img src="../../dist/img/ucablogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">UCABG</span>
    </a>

    <div class="sidebar">
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="../../dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="profesor-perfil" class="d-block"><?php echo $profesor['nombre']; ?></a>
            </div>
        </div>
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

                <li class="nav-item">
                    <a href="profesores" class="nav-link">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            Panel de Control
                        </p>
                    </a>
                </li>
                <?php foreach($roles as $rol):
                    if( $rol['id_rol']==1){?>
                <li class="nav-item">
                    <a href="profesor-revisor" class="nav-link ">
                        <i class="nav-icon fas fa-table"></i>
                        <p>
                            Revisor
                        </p>
                    </a>
                    
                </li>
                <?php } endforeach;?>

                <li class="nav-item">
                    <a href="#" class="nav-link ">
                        <i class="nav-icon fas fa-table"></i>
                        <p>
                            Tutor Academico
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link ">
                        <i class="nav-icon fas fa-table"></i>
                        <p>
                            Jurado
                        </p>
                    </a>
                    
                </li>
            </ul>
        </nav>
    </div>
    <!-- /.sidebar -->
</aside>