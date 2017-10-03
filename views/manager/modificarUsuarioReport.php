<?php

require_once('../inc/header.php');
if (isset($_SESSION['nombre'])){
require_once('../inc/menu_manager.php');
require_once('../inc/cabecera_contenido.php');
require_once('../../models/conexion.php');
require_once('../../models/ticket_users.php');
require_once('../../facades/facadeTicketUsers.php');
$consulta = new TicketUsers();
$idCompania = $_SESSION['idCompania'];
$idCc = $_SESSION["idCc"];
$idUsarioReport = $_GET['id_report'];


?>

<!-- Page content -->
<div id="page-content">
  <!-- Dashboard Header -->
  <!-- For an image header add the class 'content-header-media' and an image as in the following example --

  <!-- Mini Top Stats Row -->
  <div class="row">
    <div class="content-header">
      <div class="header-section">
        <h1>
          <i class="fa fa-edit"></i>Modificar Usuario<br><small>Complete el siguiente formulario para Modificar el Usuario</small>
        </h1>
      </div>
    </div>
    <ul class="breadcrumb breadcrumb-top">
      <li><a href="usuarioReport.php">Usuario</a></li>
      <li>Modificar Usuarioa</li>
    </ul>
  </div>
  <!-- END Mini Top Stats Row -->

  <!-- Widgets Row -->
  <div class="row">

    <div class="col-md-12">
      <div class="block">
        <div class="block-title">
          <h2><strong>Modificar Usuario</strong></h2>
        </div>
        <?php echo modificarUsuarioReportFC($idUsarioReport); ?>
      </div>
    </div>
  </div>
  <!-- END Widgets Row -->
</div>
<!-- END Page Content -->





<?php
require_once('../inc/footer.php');
require_once('../inc/script.php');?>





<?php
require_once('../inc/fin_template.php');
} else{
header("Location: ../mensajes/error_autenticacion.html");
}



?>
