
<body>
    <!-- Page Wrapper -->
    <!-- In the PHP version you can set the following options from inc/config file -->
    <!--
            Available classes:

            'page-loading'      enables page preloader
        -->
    <div id="page-wrapper">
        <!-- Preloader -->
        <!-- Preloader functionality (initialized in js/app.js) - pageLoading() -->
        <!-- Used only if page preloader is enabled from inc/config (PHP version) or the class 'page-loading' is added in #page-wrapper element (HTML version) -->
        <div class="preloader themed-background">
            <h1 class="push-top-bottom text-light text-center"><strong>Taxis</strong>Ya</h1>
            <div class="inner">
                <h3 class="text-light visible-lt-ie9 visible-lt-ie10"><strong>Loading..</strong></h3>
                <div class="preloader-spinner hidden-lt-ie9 hidden-lt-ie10"></div>
            </div>
        </div>
        <!-- END Preloader -->

        <!-- Page Container -->
        <!-- In the PHP version you can set the following options from inc/config file -->
        <!--
                Available #page-container classes:

                '' (None)                                       for a full main and alternative sidebar hidden by default (> 991px)

                'sidebar-visible-lg'                            for a full main sidebar visible by default (> 991px)
                'sidebar-partial'                               for a partial main sidebar which opens on mouse hover, hidden by default (> 991px)
                'sidebar-partial sidebar-visible-lg'            for a partial main sidebar which opens on mouse hover, visible by default (> 991px)
                'sidebar-mini sidebar-visible-lg-mini'          for a mini main sidebar with a flyout menu, enabled by default (> 991px + Best with static layout)
                'sidebar-mini sidebar-visible-lg'               for a mini main sidebar with a flyout menu, disabled by default (> 991px + Best with static layout)

                'sidebar-alt-visible-lg'                        for a full alternative sidebar visible by default (> 991px)
                'sidebar-alt-partial'                           for a partial alternative sidebar which opens on mouse hover, hidden by default (> 991px)
                'sidebar-alt-partial sidebar-alt-visible-lg'    for a partial alternative sidebar which opens on mouse hover, visible by default (> 991px)

                'sidebar-partial sidebar-alt-partial'           for both sidebars partial which open on mouse hover, hidden by default (> 991px)

                'sidebar-no-animations'                         add this as extra for disabling sidebar animations on large screens (> 991px) - Better performance with heavy pages!

                'style-alt'                                     for an alternative main style (without it: the default style)
                'footer-fixed'                                  for a fixed footer (without it: a static footer)

                'disable-menu-autoscroll'                       add this to disable the main menu auto scrolling when opening a submenu

                'header-fixed-top'                              has to be added only if the class 'navbar-fixed-top' was added on header.navbar
                'header-fixed-bottom'                           has to be added only if the class 'navbar-fixed-bottom' was added on header.navbar

                'enable-cookies'                                enables cookies for remembering active color theme when changed from the sidebar links
            -->
        <div id="page-container" class="sidebar-partial sidebar-visible-lg sidebar-no-animations">

            <!-- Main Sidebar -->
            <div id="sidebar">
                <!-- Wrapper for scrolling functionality -->
                <div id="sidebar-scroll">
                    <!-- Sidebar Content -->
                    <div class="sidebar-content">
                        <!-- Brand -->
                        <a href="home.php" class="sidebar-brand">
                            <i class="fa fa-bus"></i><span class="sidebar-nav-mini-hide"><strong>Taxis</strong>Ya</span></a>
                        <!-- END Brand -->

                        <!-- User Info -->
                        <!-- User Info -->
                           <div class="sidebar-section sidebar-user clearfix sidebar-nav-mini-hide">
                               <div class="sidebar-user-avatar">
                                   <a href="perfil.php?id_usuario=<?php //echo $idUsuario; ?>">
                              <img src="../dis/img/placeholders/avatars/<?php //echo$foto?>" alt="avatar">
                                   </a>
                               </div>
                               <div class="sidebar-user-name"><?php //echo $nombre; ?></div>
                               <div class="sidebar-user-links">
                                   <a href="perfil.php?id_usuario=<?php //echo $idUsuario; ?>" data-toggle="tooltip" data-placement="bottom" title="Perfil"><i class="gi gi-user"></i></a>
                                   <a href="javascript:void(0)" class="enable-tooltip" data-placement="bottom" title="Settings" onclick="$('#modal-user-settings').modal('show');"><i class="gi gi-cogwheel"></i></a>
                                   <a href="../../Controllers/cerrarSesionController.php" data-toggle="tooltip" data-placement="bottom" title="Cerrar Sesion"><i class="gi gi-exit"></i></a>
                               </div>
                            </div>
                  <!-- END User Info -->
                        <!-- END User Info -->

                        <!-- Theme Colors -->
                        <!-- Change Color Theme functionality can be found in js/app.js - templateOptions() -->

                        <!-- END Theme Colors -->

                        <!-- Sidebar Navigation -->
                        <ul class="sidebar-nav">
                          <a href="#" class="sidebar-nav-menu"><span class="sidebar-nav-mini-hide">MENU DE NAVEGACIÓN</span></a>

                          <a href="#" class="sidebar-nav-menu"><i class="fa fa-angle-left sidebar-nav-indicator sidebar-nav-mini-hide"></i><i class="fa fa-graduation-cap sidebar-nav-icon"></i><span class="sidebar-nav-mini-hide">Servicios</span></a>
                          <ul>
                            <li>
                                <a href="#" class="sidebar-nav-submenu"><i class="fa fa-edit sidebar-nav-icon "></i><i class="fa fa-angle-left sidebar-nav-indicator"></i><span class="sidebar-nav-mini-hide">Materia</span></a>
                                <ul>
                                  <li>
                                    <a href="crearMateria.php">Servicos</span></a>
                                  </li>
                                  <li>
                                    <a href="gestionar_materia.php">Gestionar</span></a>
                                  </li>

                                </ul>
                            </li>
                            <li>
                                <a href="crearCurso.php" class="sidebar-nav-submenu"><i class="fa fa-users sidebar-nav-icon "></i><i class="fa fa-angle-left sidebar-nav-indicator"></i><span class="sidebar-nav-mini-hide">Curso</span></a>
                                <ul>
                                  <li>
                                    <a href="crearCurso.php">Agregar Curso</span></a>
                                  </li>
                                  <li>
                                    <a href="">Modificar Curso</span></a>
                                  </li>
                                  <li>
                                    <a href="../Administrador/todosCursos.php">Ver Cursos</span></a>
                                  </li>
                                </ul>
                            </li>
                            <li>
                                <a href="#" class="sidebar-nav-submenu"><i class="fa fa-database sidebar-nav-icon "></i><i class="fa fa-angle-left sidebar-nav-indicator"></i><span class="sidebar-nav-mini-hide">Salon</span></a>
                                <ul>
                                  <li>
                                    <a href="crearSalon.php">Agregar</span></a>
                                  </li>
                                  <li>
                                    <a href="">Modificar</span></a>
                                  </li>
                                  <li>
                                    <a href="">Gestionar</span></a>
                                  </li>
                                </ul>
                            </li>
                            <li>
                                <a href="#" class="sidebar-nav-submenu"><i class="fa fa-bank sidebar-nav-icon "></i><i class="fa fa-angle-left sidebar-nav-indicator"></i><span class="sidebar-nav-mini-hide">Banco de Preguntas</span></a>
                                <ul>
                                  <li>
                                    <a href="banco_preguntas.php">Gestionar</span></a>
                                  </li>
                                  <li>
                                    <a href="agregar_pregunta.php">Agregar</span></a>
                                  </li>
                                </ul>
                            </li>
                            <li>
                                <a href="#" class="sidebar-nav-submenu"><i class="fa fa-pencil sidebar-nav-icon "></i><i class="fa fa-angle-left sidebar-nav-indicator"></i><span class="sidebar-nav-mini-hide">Examen</span></a>
                                <ul>
                                  <li>
                                    <a href="gestionar_examenes.php">Gestionar</span></a>
                                  </li>
                                  <li>
                                    <a href="agregar_examen.php">Agregar</span></a>
                                  </li>

                                </ul>
                            </li>
                            <li>
                                <a href="#" class="sidebar-nav-submenu"><i class="fa fa-book sidebar-nav-icon "></i><i class="fa fa-angle-left sidebar-nav-indicator"></i><span class="sidebar-nav-mini-hide">Responder Examen</span></a>
                                <ul>
                                  <li>
                                    <a href="examen_para_responder.php">Examenes</span></a>
                                  </li>
                                  <li>
                                    <a href="responder_examen.php">responder</span></a>
                                  </li>
                                </ul>
                            </li>


                          </ul>
                          <a href="#" class="sidebar-nav-menu"><i class="fa fa-angle-left sidebar-nav-indicator sidebar-nav-mini-hide"></i><i class="fa fa-building-o sidebar-nav-icon"></i><span class="sidebar-nav-mini-hide">Administrativos</span></a>
                          <ul>
                            <li>
                                <a href="crearCurso.php" class=" active"><i class="fa fa-database"></i><span class="sidebar-nav-mini-hide"> Crear Curso</span></a>
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-pencil"></i><span class="sidebar-nav-mini-hide"> Examenes</span></a>
                            </li>

                          </ul>


                        </ul>
                        <!-- END Sidebar Navigation -->

                    </div>
                    <!-- END Sidebar Content -->
                </div>
                <!-- END Wrapper for scrolling functionality -->
            </div>
            <!-- END Main Sidebar -->
