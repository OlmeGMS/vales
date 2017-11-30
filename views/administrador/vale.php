<?php

  require_once('../inc/header.php');
  if (isset($_SESSION['nombre'])){
  require_once('../inc/menu_administrador.php');
  require_once('../inc/cabecera_contenido.php');
  require_once('../../models/conexion.php');
  require_once('../../models/ticketTickets.php');
  require_once('../../models/ticketCompanies.php');
  require_once('../../models/ticketCostCenters.php');
  require_once('../../facades/facade_service.php');
  require_once('../../vendor/dompdf/dompdf_config.inc.php');


  $consulta = new TicketTickets();
  $consultaTicketCost = new TicketCostCenters();
  $idCc = $_SESSION["idCc"];
  //$mes = $_GET['idmes'];

  $idcompanies = $_SESSION['idCompania'];

  $presupuesto = $consultaTicketCost->obtnerPresupuestoCentroCosto($idCc);
  $porcentaje = $consultaTicketCost->obtnerPorcentaje($idCc);
  $facturado = $consultaTicketCost->obtenerAvaliableCentroCosto($idCc);
  $gasto = $consultaTicketCost->obtnerGastoXCentroCosto($idCc)


  ?>
<!-- Page content -->
<div id="page-content">
    <!-- Table Responsive Header -->
    <div class="content-header">
        <div class="header-section">
            <h1>
                <i class="gi gi-iphone"></i>Vales<br><small>Aquí podras ver los vales en el sistema!</small>
            </h1>
        </div>
    </div>
    <ul class="breadcrumb breadcrumb-top">
        <li>Tabla</li>
        <li><a href="">Consulta de Vales</a></li>
    </ul>
    <!-- END Table Responsive Header -->
    <!-- Responsive Full Block -->
    <div class="block full">
        <!-- All Orders Title -->
        <div class="block-title">
          <!--  <div class="block-options pull-right">
                <a href="javascript:void(0)" class="btn btn-alt btn-sm btn-default" data-toggle="tooltip" title="Configuración"><i class="fa fa-cog"></i></a>
            </div> -->
            <h2><strong>Todos</strong> Los Vales</h2>
        </div>
        <!-- END All Orders Title -->
<div class="table-responsive remove-margin-bottom">
        <!-- All Orders Content -->
        <table id="tabla-vales" class="table table-bordered table-striped table-vcenter">
            <thead>
                <tr>
                    <th class="text-center">Empresa</th>
                    <th class="text-center">Vale</th>
                    <th class="text-center">Estado</th>
                    <th class="text-center">Fecha inicio</th>
                    <th class="text-center">Fecha fin</th>
                    <th class="text-center">Gerente</th>
                    <th class="text-center">Dependencia</th>
                </tr>
            </thead>
            <tbody>
                <?php echo listValesXCompania($idcompanies); ?>
    <!-- END Responsive Full Block -->
  </tbody>
</table>
</div>
<!-- END All Orders Content -->



<!-- button export PFD -->
<!--<div class="form-group">
  <a href="../../controllers/reportePdfServicemesController.php?idmes=<?php echo$mes ?>" data-toggle="tooltip" title="pdf" class="btn btn-default" ><i class="fa fa-file-pdf-o"></i></a>
  <a href="../../controllers/reporteExcelServicemesController.php?idmes=<?php echo$mes ?>" data-toggle="tooltip" title="excel" class="btn btn-default" ><i class="fa fa-file-excel-o"></i></a>
</div>-->

</div>
<!-- END All Orders Block -->
</div>
<!-- END Page Content -->

    <?php
    require_once('../inc/footer.php');
    require_once('../inc/script.php');?>

    <script src="../dis/js/pages/tablaVales.js"></script>
    <script>$(function(){ TablesDataVales.init(); });</script>
    <!-- Load and execute javascript code used only in this page -->
    <script src="js/pages/uiProgress.js"></script>
    <script>$(function(){ UiProgress.init(); });</script>
    <!-- User Settings, modal which opens from Settings link (found in top right user menu) and the Cog link (found in sidebar user info) -->

    <?php
    require_once('../inc/fin_template.php');
  } else{
    header("Location: ../mensajes/error_autenticacion.html");
  }
     ?>
