<?php
  session_start();
  $rol = $_SESSION['idRol'];
   ?>
   <!DOCTYPE html>
   <!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
   <!--[if IE 9]>         <html class="no-js lt-ie10"> <![endif]-->
   <!--[if gt IE 9]><!-->
   <html class="no-js"> <!--<![endif]-->
       <head>
           <meta charset="utf-8">

           <title>University Test</title>

           <meta name="description" content="Sigte">
           <meta name="author" content="Integer-Soft">
           <meta name="robots" content="noindex, nofollow">

           <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1.0">

           <!-- Icons -->
           <!-- The following icons can be replaced with your own, they are used by desktop and mobile browsers -->
           <!-- END Icons -->

           <!-- Stylesheets -->
           <!-- Bootstrap is included in its original form, unaltered -->
           <link rel="stylesheet" href="../dis/css/bootstrap.min.css">

           <!-- Related styles of various icon packs and plugins -->
           <link rel="stylesheet" href="../dis/css/plugins.css">

           <!-- The main stylesheet of this template. All Bootstrap overwrites are defined in here -->
           <link rel="stylesheet" href="../dis/css/main.css">

           <!-- Include a specific file here from css/themes/ folder to alter the default theme of the template -->

           <!-- The themes stylesheet of this template (for using specific theme color in individual elements - must included last) -->
           <link rel="stylesheet" href="../dis/css/themes.css">
           <!-- END Stylesheets -->

           <!-- Modernizr (browser feature detection library) & Respond.js (enables responsive CSS code on browsers that don't support it, eg IE8) -->
           <script src="../dis/js/vendor/modernizr-respond.min.js"></script>
       </head>

   <body>
       <!-- Error Container -->
       <div id="error-container">
           <div class="error-options">
               <h3><i class="fa fa-chevron-circle-left text-muted"></i>
                 <?php switch ($rol) {
                 case '1':
                    echo '<a href="../SuperAdministrador/home.php">Regresar</a></h3>';
                   break;
                   case '2':
                      echo '<a href="../Administrador/home.php">Regresar</a></h3>';
                     break;
                     case '3':
                        echo '<a href="../Rector/home.php">Regresar</a></h3>';
                       break;
                       case '4':
                          echo '<a href="../Coordinador/home.php">Regresar</a></h3>';
                         break;
                         case '5':
                            echo '<a href="../JefeArea/home.php">Regresar</a></h3>';
                           break;
                           case '6':
                              echo '<a href="../Docente/home.php">Regresar</a></h3>';
                             break;
                             case '7':
                                echo '<a href="../Estudiante/consultar_notas_examen.php">Consultar Nota</a></h3>';
                               break;

                 default:
                     echo '<a href="error.html">Regresar</a></h3>';
                   break;
               } ?>
           </div>
           <div class="row">
               <div class="col-sm-8 col-sm-offset-2 text-center">
                   <h1 class="animation-pulse"><i class="fa fa-check text-success"></i></h1>
                   <h2 class="h3">¡Su examen ha sido enviado! <br>Consulte su calificación.</h2>
               </div>
           </div>
       </div>
       <!-- END Error Container -->
   </body>
</html>
