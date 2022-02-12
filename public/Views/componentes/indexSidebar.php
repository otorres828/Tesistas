  <!-- PRECARGA -->
  <!-- <div class="preloader flex-column justify-content-center align-items-center">
      <img class="animation__shake" src="../../dist/img/Ucabg.png" alt="Ucab Guayana" height="30%" width="15%">
  </div> -->

  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
      <ul class="navbar-nav">
          <li class="nav-item">
              <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
          </li>

      </ul>

      <ul class="navbar-nav ml-auto">

          <li class="nav-item dropdown">
              <a class="nav-link" data-toggle="dropdown" href="#">
                  <i class="fas fa-cog"></i>
              </a>
              <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                  <span class="dropdown-item dropdown-header">USUARIO</span>
                  <div class="dropdown-divider"></div>
                  <a href="administrador/profile" class="dropdown-item">
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
      <!-- Brand Logo -->
      <a href="index3.html" class="brand-link">
          <img src="../../dist/img/ucablogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
          <span class="brand-text font-weight-light">UCABG</span>
      </a>

      <!-- Sidebar -->
      <div class="sidebar">
          <!-- Sidebar user panel (optional) -->
          <div class="user-panel mt-3 pb-3 mb-3 d-flex">
              <div class="image">
                  <img src="../../dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
              </div>
              <div class="info">
                  <a href="#" class="d-block">Escuela</a>
              </div>
          </div>



          <!-- Sidebar Menu -->
          <nav class="mt-2">
              <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

                  <li class="nav-item ">
                      <a href="escuela" class="nav-link active">
                          <i class="nav-icon fas fa-th"></i>
                          <p>
                              Panel de Control
                          </p>
                      </a>
                  </li>

                  <li class="nav-item ">
                      <a href="#" class="nav-link ">
                          <i class="nav-icon fas fa-users"></i>
                          <p>
                              Tesistas

                              <i class="fas fa-angle-left right"></i>
                          </p>
                      </a>
                      <ul class="nav nav-treeview">
                          <li class="nav-item">
                              <a href="escuela-tesistas" class="nav-link ">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>Todos</p>
                              </a>
                          </li>
                          <li class="nav-item">
                              <a href="escuela-tesistas-cargar" class="nav-link">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>Cargar Tesistas</p>
                              </a>
                          </li>
                      </ul>
                  </li>


                  <li class="nav-item">
                      <a href="#" class="nav-link ">
                          <i class="nav-icon fas fa-table"></i>
                          <p>
                              Profesores
                              <i class="fas fa-angle-left right"></i>
                          </p>
                      </a>
                      <ul class="nav nav-treeview">
                          <li class="nav-item">
                              <a href="escuela-profesores" class="nav-link">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>Todos</p>
                              </a>
                          </li>
                          <li class="nav-item">
                              <a href="escuela-profesor-revisor" class="nav-link">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>Revisor</p>
                              </a>
                          </li>
                          <li class="nav-item">
                              <a href="escuela-profesor-tutor" class="nav-link">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>Tutor Academico</p>
                              </a>
                          </li>
                          <li class="nav-item">
                              <a href="escuela-profesor-jurado" class="nav-link">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>Jurado</p>
                              </a>
                          </li>
                          <li class="nav-item">
                              <a href="escuela-profesores-cargar" class="nav-link">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>Cargar Profesores</p>
                              </a>
                          </li>

                      </ul>
                  </li>

                  <li class="nav-item">
                      <a href="#" class="nav-link">
                          <i class="nav-icon fas fa-balance-scale"></i>
                          <p>
                              Consejos y Comites
                              <i class="right fas fa-angle-left"></i>
                          </p>
                      </a>
                      <ul class="nav nav-treeview" style="display: none">
                          <li class="nav-item">
                              <a href="#" class="nav-link">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>
                                      Consejos
                                      <i class="right fas fa-angle-left"></i>
                                  </p>
                              </a>
                              <ul class="nav nav-treeview" style="display: none">
                                  <li class="nav-item">
                                      <a href="escuela-consejos" class="nav-link">
                                          <i class="far fa-dot-circle nav-icon"></i>
                                          <p>Todos</p>
                                      </a>
                                  </li>
                                  <li class="nav-item">
                                      <a href="escuela-consejos-cargar" class="nav-link">
                                          <i class="far fa-dot-circle nav-icon"></i>
                                          <p>Cargar Consejo</p>
                                      </a>
                                  </li>
                              </ul>
                          </li>
                          <li class="nav-item">
                              <a href="#" class="nav-link">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>
                                      Comites
                                      <i class="right fas fa-angle-left"></i>
                                  </p>
                              </a>
                              <ul class="nav nav-treeview" style="display: none">
                                  <li class="nav-item">
                                      <a href="escuela-comites" class="nav-link">
                                          <i class="far fa-dot-circle nav-icon"></i>
                                          <p>Todos</p>
                                      </a>
                                  </li>
                                  <li class="nav-item">
                                      <a href="escuela-comites-up" class="nav-link">
                                          <i class="far fa-dot-circle nav-icon"></i>
                                          <p>Cargar Comite</p>
                                      </a>
                                  </li>
                              </ul>
                          </li>
                      </ul>
                  </li>


                  <li class="nav-header">Asignaciones </li>
                  <li class="nav-item">
                      <a href="escuela-evaluacion-comite" class="nav-link">
                          <i class="nav-icon  fas fa-search"></i>
                          <p>
                              Evaluacion comite
                          </p>
                      </a>
                  </li>
                  <li class="nav-item">
                      <a href="escuela-evaluacion-consejo" class="nav-link">
                          <i class="nav-icon  fas fa-search"></i>
                          <p>
                              Evaluacion consejo
                          </p>
                      </a>
                  </li>



                  <li class="nav-header">Criterios </li>
                  <li class="nav-item">
                      <a href="escuela-criterios-experimentales-todos" class="nav-link">
                          <i class="nav-icon  fas fa-search"></i>
                          <p>
                              Experimentales
                          </p>
                      </a>
                  </li>
                  <li class="nav-item">
                      <a href="escuela-criterios-instrumentales-todos" class="nav-link">
                          <i class="nav-icon  fas fa-search"></i>
                          <p>
                              Instrumentales
                          </p>
                      </a>
                  </li>


                  <li class="nav-header">Propuestas de TG</li>
                  <li class="nav-item">
                      <a href="escuela-propuestastg" class="nav-link">
                          <i class="nav-icon fab fa-buffer"></i>
                          <p>
                              Todas
                          </p>
                      </a>
                  </li>
                  <li class="nav-header">Extras</li>

                  <li class="nav-item ">
                      <a href="#" class="nav-link ">
                          <i class="nav-icon fas fa-users"></i>
                          <p>
                              Especializacion
                              <i class="fas fa-angle-left right"></i>
                          </p>
                      </a>
                      <ul class="nav nav-treeview">
                          <li class="nav-item">
                              <a href="escuela-areas" class="nav-link ">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>Areas</p>
                              </a>
                          </li>
                          <li class="nav-item">
                              <a href="escuela-tesistas-cargar" class="nav-link">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>Cargar Areas</p>
                              </a>
                          </li>
                      </ul>
                  </li>
              </ul>
          </nav>
      </div>

  </aside>