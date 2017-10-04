<?php

  require_once('../inc/header.php');
  if (isset($_SESSION['nombre'])){
  require_once('../inc/menu_administrador.php');
  require_once('../inc/cabecera_contenido.php');
  require_once('../../models/conexion.php');
  require_once('../../models/ticketTickets.php');
  require_once('../../models/ticketCompanies.php');
  require_once('../../facades/facade_service.php');
  require_once('../../vendor/dompdf/dompdf_config.inc.php');


  $consulta = new TicketTickets();
  $idCc = $_SESSION["idCc"];
  //$mes = $_GET['idmes'];

  $idcompanies = $_SESSION['idCompania'];

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
        <table id="example-datatable" class="table table-bordered table-striped table-vcenter">
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
    <script>
      $(document).ready(function(){
        $('tr #Eliminar_Curso').click(function(e){
          e.preventDefault();
          var opcion = confirm("Desea Eliminar");
          if(opcion){
            var fila = $(this).parent().parent().parent();
            var curso = fila.find('#idcurso').text();
            var data = {idCurso: curso};
            $.post("../../Controllers/CursoEliminarController.php", data, function (res, est, jqXHR){
                alert('Se Elimino el curso');
                fila.remove();
            });

          }

        });
      });
    </script>

    <script src="../dis/js/administracion.js"></script>
    <!-- <script src="../dis/js/pages/ecomOrders.js"></script>
    <script>$(function(){ EcomOrders.init(); });</script>-->
    <!-- User Settings, modal which opens from Settings link (found in top right user menu) and the Cog link (found in sidebar user info) -->
    <div id="modal-curso" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header text-center">
                    <h2 class="modal-title"><i class="fa fa-pencil"></i> Configuración</h2>
                </div>
                <!-- END Modal Header -->

                <!-- Modal Body -->
                <div class="modal-body">
                    <form action="../../Controllers/CambiarContrasenaController.php" method="post" class="form-horizontal form-bordered">
                        <fieldset>
                            <legend>Información</legend>
                            <div class="form-group">
                                <label class="col-md-4 control-label">Usuario</label>
                                <div class="col-md-8">
                                    <p class="form-control-static"><?php echo $nombre ?></p>

                                </div>
                            </div>

                        </fieldset>
                        <fieldset>
                            <legend>Actualizar Password</legend>
                            <div class="form-group">
                                <label class="col-md-4 control-label" for="user-settings-password">Nuevo Password</label>
                                <div class="col-md-8">
                                    <input type="hidden" id="idUsuario" name="idUsuario" class="form-control" value="<?php echo $idUsuario ?>">
                                    <input type="password" id="user-settings-password" name="user-settings-password" class="form-control" placeholder="Por favor digite su nuevo password">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label" for="user-settings-repassword">Confirmar Nuevo Password</label>
                                <div class="col-md-8">
                                    <input type="password" id="user-settings-repassword" name="user-settings-repassword" class="form-control" placeholder="Confirme por favor su nuevo password">
                                </div>
                            </div>
                        </fieldset>
                        <div class="form-group form-actions">
                            <div class="col-xs-12 text-right">
                                <button type="button" class="btn btn-sm btn-default" data-dismiss="modal">Cerrar</button>
                                <button type="submit" class="btn btn-sm btn-primary">Guardar Cambio</button>
                            </div>
                        </div>
                    </form>
                </div>
                <!-- END Modal Body -->
            </div>
        </div>
    </div>
    <!-- END User Settings -->
    <?php
    require_once('../inc/footer.php');
    require_once('../inc/script.php');?>
    <script src="../dis/js/pages/tablesDatatables.js"></script>
    <script>$(function(){ TablesDatatables.init(); });</script>
    <!-- Load and execute javascript code used only in this page -->
    <script src="js/pages/uiProgress.js"></script>
    <script>$(function(){ UiProgress.init(); });</script>

    <?php
    require_once('../inc/fin_template.php');
  } else{
    header("Location: ../mensajes/error_autenticacion.html");
  }
     ?>