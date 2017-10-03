<?php
require_once('../inc/header.php');
if (isset($_SESSION['nombre'])){
require_once('../inc/menu_manager.php');
require_once('../inc/cabecera_contenido.php');

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
          <i class="fa fa-edit"></i>Filtrar servicios por mes<br><small>Complete el siguiente formulario para buscar por mes</small>
        </h1>
      </div>
    </div>
    <ul class="breadcrumb breadcrumb-top">
      <li><a href="home.php">Manager</a></li>
      <li>Filtrar</li>
    </ul>
  </div>
  <!-- END Mini Top Stats Row -->

  <!-- Widgets Row -->
  <div class="row">

    <div class="col-md-12">
      <div class="block">
        <div class="block-title">
          <h2><strong>Filtrar por mes</strong></h2>
        </div>
        <form id="form-validation" class="form-horizontal form-bordered" action="../../controllers/manager/servicesXMesController.php" method="post">
          <fieldset>
          <div class="form-group">
            <div class="col-md-12 control-label">
              <label class="col-md-4 control-label" for="mes">Mes</label>
              <div class="col-md-6">
              <select class="form-control" name="mes" id="mes">
                <option value="disabled "disabled selected>Seleccione Mes</option>';
                <option value="1">Enero</option>
                <option value="2">Febrero</option>
                <option value="3">Marzo</option>
                <option value="4">Abril</option>
                <option value="5">Mayo</option>
                <option value="6">Junio</option>
                <option value="7">Julio</option>
                <option value="8">Agosto</option>
                <option value="9">Septiembre</option>
                <option value="10">Octubre</option>
                <option value="11">Noviembre</option>
                <option value="12">Diciembre</option>
              </select>
            </div>
          </div>
            <div class="form-group ">
              <div class="col-md-8 col-md-offset-4">
                <button href="" type="submit" class="btn btn-sm btn-success"><i class="fa fa-arrow-right"></i>Buscar</button>
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
