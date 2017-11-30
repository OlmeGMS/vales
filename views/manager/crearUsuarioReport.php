<?php
require_once('../inc/header.php');
if (isset($_SESSION['nombre'])){
require_once('../inc/menu_manager.php');
require_once('../inc/cabecera_contenido.php');
require_once('../../models/conexion.php');
require_once('../../models/ticket_users.php');


$consulta = new TicketTickets();
$consultaTicketCost = new TicketCostCenters();
$idCc = $_SESSION["idCc"];
//$mes = $_GET['idmes'];

$idcompanies = $_SESSION['idCompania'];

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
          <i class="fa fa-edit"></i>Agregar Usuario<br><small>Complete el siguiente formulario para agregar un nuevo usuario</small>
        </h1>
      </div>
    </div>
    <ul class="breadcrumb breadcrumb-top">
      <li><a href="home.php">Incio</a></li>
      <li>Crear Usuario</li>
    </ul>
  </div>
  <!-- END Mini Top Stats Row -->

  <!-- Widgets Row -->
  <div class="row">

    <div class="col-md-12">
      <div class="block">
        <div class="block-title">
          <h2><strong>Agregar Nuevo Usuario</strong></h2>
        </div>
        <form id="form-validation" action="../../controllers/manager/agregarUsuarioReportController.php" method="post" class="form-horizontal form-bordered">
          <fieldset>
            <legend><i class="fa fa-angle-right"></i> Datos del usuario</legend>
            <div class="form-group">
              <label class="col-md-4 control-label" for="nombre">Nombre<span class="text-danger">*</span></label>
              <div class="col-md-6">
                <input type="text" id="nombre" name="nombre" class="form-control" placeholder="Digite el nombre" >
              </div>
              <div class="col-md-6">
                <input type="hidden" id="id_compania" name="id_compania" class="form-control" value="<?php echo $idCompania; ?>" >
              </div>
              <div class="col-md-6">
                <input type="hidden" id="id_centro_costo" name="id_centro_costo" class="form-control" value="<?php echo $idCentroCostos; ?>" >
              </div>
              <div class="col-md-6">
                <input type="hidden" id="id_usuario" name="id_usuario" class="form-control" value="<?php echo $idUsuario; ?>" >
              </div>
              <div class="col-md-6">
                <input type="hidden" id="rol" name="rol" class="form-control" value="report" >
              </div>
            </div>
            <div class="form-group">
              <label class="col-md-4 control-label" for="movil">Móvil<span class="text-danger">*</span></label>
              <div class="col-md-6">
                <input type="text" id="movil" name="movil" class="form-control" placeholder="Digite el número de contacto" >
              </div>
            </div>
            <div class="form-group">
              <label class="col-md-4 control-label" for="email">Email<span class="text-danger">*</span></label>
              <div class="col-md-6">
                <input type="email" id="email" name="email" class="form-control" placeholder="Digite el email" >
              </div>
            </div>
            <div class="form-group">
              <label class="col-md-4 control-label" for="pass">Password<span class="text-danger">*</span></label>
              <div class="col-md-6">
                <input type="password" id="pass" name="pass" class="form-control" placeholder="Digite el password" >
              </div>
            </div>
            <div class="form-group ">
              <div class="col-md-8 col-md-offset-4">
                <button href="" type="submit" class="btn btn-sm btn-success"><i class="fa fa-arrow-right"></i> Agregar usuario</button>
                <button id="btn-eliminar" type="reset" class="btn btn-sm btn-warning"><i class="fa fa-repeat"></i> Limpiar</button>
              </div>
            </div>
          </fieldset>
        </form>
      </div>
    </div>
  </div>
  <!-- END Widgets Row -->
</div>
<!-- END Page Content -->



<?php
require_once('../inc/footer.php');
require_once('../inc/script.php');?>
<script src="../dis/js/pages/formsValidation.js"></script>
<script>$(function(){ FormsValidation.init(); });</script>

<?php
require_once('../inc/fin_template.php');
 ?>
 <?php
} else{
header("Location: ../mensajes/error_autenticacion.html");
}
?>
