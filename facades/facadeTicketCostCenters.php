<?php
//Todos los facades de la tabla ticket_cost_centers

function listaCentrosCostosFacade($arg_idCompania){
  $consulta = new TicketCostCenters();
  $idCompania = $arg_idCompania;
  $filas = $consulta->listaCentrosCostos($idCompania);
  foreach ($filas as $fila) {
    echo '<tr>
              <td class="text-center">'.$fila['id'].'</td>
              <td class="text-center">'.$fila['name'].'</td>
              <td class="text-center">'.$fila['prefix'].'</td>
              <td class="text-center">$'.$fila['budget'].'</td>
              <td class="text-center">$'.$fila['available'].'</td>
              <td class="text-center">$'.$fila['used'].'</td>
              <td class="text-center">
                    <div class="btn-group btn-group-xs">
                        <a href="modificarCentroCosto.php?id_cc='.$fila['id'].'" data-toggle="tooltip" title="Editar" class="btn btn-default" ><i class="fa fa-pencil"></i></a>
                        <!--<a href="" data-toggle="tooltip" title="Eliminar" class="btn btn-xs btn-danger" id="Eliminar_Curso"><i class="fa fa-times"></i></a>-->
                    </div>
                </td>
     </tr>';
  }
}

function selectCentroCostosXIdCompania($arg_idCompania){
  $consulta = new TicketCostCenters();
  $idCompania = $arg_idCompania;
  $filas = $consulta->listaCentrosCostos($idCompania);
  foreach ($filas as $fila) {
     echo '<option value="'.$fila['id'].'">'.$fila['name'].'</option>';
  }
}

function modificarCentroCostofacade($arg_idCostCenter){
  if(isset($_GET['id_cc'])){
    $consulta = new TicketCostCenters();
    $idCentroCosto = $arg_idCostCenter;
    $filas = $consulta->cargarCentroCosto($idCentroCosto);
    foreach($filas as $fila){
      echo '<form id="form-validation" action="../../controllers/administrador/modificarCentroCostoController.php" method="post" class="form-horizontal form-bordered">
        <fieldset>
          <legend><i class="fa fa-angle-right"></i> Datos del Centro de costos</legend>
          <div class="form-group">
            <label class="col-md-4 control-label" for="nombre">Nombre<span class="text-danger">*</span></label>
            <div class="col-md-6">
              <input type="text" id="nombre" name="nombre" class="form-control" value="'.$fila['name'].'">
            </div>
            <div class="col-md-6">
              <input type="hidden" id="id_compania" name="id_compania" class="form-control" value="<?php echo $idCompania; ?>" >
            </div>
            <div class="col-md-6">
              <input type="hidden" id="id_centro_costo" name="id_centro_costo" class="form-control" value="'.$fila['id'].'" >
            </div>
          </div>
          <div class="form-group">
            <label class="col-md-4 control-label" for="prefijo">Prefijo<span class="text-danger">*</span></label>
            <div class="col-md-6">
              <input type="text" id="prefijo" name="prefijo" class="form-control" value="'.$fila['prefix'].'"readonly>
            </div>
          </div>
          <div class="form-group">
            <label class="col-md-4 control-label" for="email">Presupuesto<span class="text-danger">*</span></label>
            <div class="col-md-6">
              <input type="text" id="presupuesto" name="presupuesto" class="form-control" value="'.$fila['budget'].'" >
            </div>
          </div>
          <div class="form-group ">
            <div class="col-md-8 col-md-offset-4">
              <button href="" type="submit" class="btn btn-sm btn-success"><i class="fa fa-arrow-right"></i> Agregar Centro</button>
              <button id="btn-eliminar" type="reset" class="btn btn-sm btn-warning"><i class="fa fa-repeat"></i> Limpiar</button>
            </div>
          </div>
        </fieldset>
      </form>';
    }
  }else{
    return header("Location: ../views/administrador/centroCostos.php");
  }
}







 ?>
