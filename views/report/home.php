<?php

require_once('../inc/header.php');
if (isset($_SESSION['nombre'])){
require_once('../inc/menu_report.php');
require_once('../inc/cabecera_contenido.php');

?>
<!-- Page content -->
                   <div id="page-content">
                       <!-- Dashboard 2 Header -->
                       <div class="content-header">
                           <ul class="nav-horizontal text-center">
                               <li class="active">
                                   <a href="home.php"><i class="fa fa-university"></i> Inicio</a>
                               </li>

                               <li>
                                   <a href="buscarmes.php"><i class="fa fa-database"></i> Servicios</a>
                               </li>

                           </ul>
                       </div>
                       <!-- END Dashboard 2 Header -->

                       <!-- Dashboard 2 Content -->
                       <div class="row">
                           <div class="col-md-12">
                               <!-- Web Server Block -->
                               <div class="block full">
                                   <!-- Web Server Title -->
                                   <div class="block-title">
                                       <div class="block-options pull-right">
                                           <span id="dash-chart-live-info" class="label label-primary"><script>
                                 var meses = new Array ("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
                                 var f=new Date();
                                 document.write(f.getDate() + " de " + meses[f.getMonth()] + " de " + f.getFullYear());
                               </script></span>
                                           <span class="label label-success animation-pulse">Activo</span>
                                       </div>
                                       <h2><strong>¡ Bienvenidos a TaxisYa!</strong></h2>
                                   </div>
                                   <!-- END Web Server Title -->

                                   <!-- Web Server Content -->
                                   <!-- Flot Charts (initialized in js/pages/index2.js), for more examples you can check out http://www.flotcharts.org/ -->
                                   <div id="dash-chart-live" class="chart">
                                       <center><img align="center" src="../dis/img/taxi.jpg"  class="chart" ></center>
                                   </div>
                                   <!-- END Web Server Content -->
                               </div>
                               <!-- END Web Server Block -->

                               <!-- Mini Sales Charts Block -->
                               <!-- Jquery Sparkline (initialized in js/pages/index2.js), for more examples you can check out http://omnipotent.net/jquery.sparkline/#s-about -->
                               <div class="block full">
                                   <!-- Mini Sales Charts Title -->
                                   <div class="block-title">

                                       <h2><strong><i class="fa fa-car"></i>TaxisYa - </strong>Administración de vales</h2>
                                   </div>
                                   <!-- END Mini Sales Charts Title -->

                                   <!-- Mini Sales Charts Content -->
                                   <div class="row text-justify">
                                       <p>Por medio de este portal usted podra gestionar los vales de su empresa con TaxisYa.</p>
                                   </div>
                                   <!-- END Mini Sales Charts Content -->
                               </div>
                               <!-- END Mini Sales Charts Block -->


                                   <!-- END Mini Earnings Charts Content -->
                               </div>
                               <!-- END Mini Earnings Charts Block -->



                       </div>
                       <!-- END Dashboard 2 Content -->
                   </div>
                   <!-- END Page Content -->
<?php
require_once('../inc/footer.php');
require_once('../inc/script.php');
?>
<!-- Load and execute javascript code used only in this page -->
<script src="../dis/js/pages/index.js"></script>
<script>
   $(function() {
       Index.init();
   });
</script>
<?php
require_once('../inc/fin_template.php');
?>
<?php
} else{
header("Location: ../mensajes/error_autenticacion.html");
}
?>
