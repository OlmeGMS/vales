<?php

//Todos los facedes de la tabla de tickets_user

function listUsariosXCentrosCostos($arg_idCompania, $arg_idCc){
    $consulta = new TicketUsers();
    $idCompania = $arg_idCompania;
    $idCc = $arg_idCc;
    $filas = $consulta->todosUsuarioReportXCC($idCompania, $idCc);
    foreach($filas as $fila){
      echo '<tr>
      <td id="" name ="" class="text-center">'.$fila['id'].'</td>
      <td id="" name ="" class="text-center">'.$fila['name'].'</td>
      <td id="" name ="" class="text-center">'.$fila['email'].'</td>
      <td id="" name ="" class="text-center">'.$fila['cellphone'].'</td>
      <td class="text-center">
            <div class="btn-group btn-group-xs">
                <a href="modificarUsuarioReport.php?id_report='.$fila['id'].'" data-toggle="tooltip" title="Editar" class="btn btn-default" ><i class="fa fa-pencil"></i></a>
                <!--<a href="" data-toggle="tooltip" title="Eliminar" class="btn btn-xs btn-danger" id="Eliminar_Curso"><i class="fa fa-times"></i></a>-->
            </div>
        </td>

       </tr>';
    }
}

function modificarUsuarioReportFC($arg_idUsuarioReport){
    if (isset($_GET['id_report'])) {
        $consulta = new TicketUsers();
        $idUsuarioReport = $arg_idUsuarioReport;
        $filas = $consulta->cargarUsuarioReport($idUsuarioReport);
        foreach ($filas as $fila) {
          echo '<form id="form-validation" action="../../controllers/modificarUsuarioReportController.php" method="post" class="form-horizontal form-bordered">
            <fieldset>
              <legend><i class="fa fa-angle-right"></i> Datos del Usuario</legend>
              <div class="form-group">
                <label class="col-md-4 control-label" for="nombre">Nombre</label>
                <div class="col-md-6">
                  <input type="text" id="nombre" name="nombre" class="form-control" value="'.$fila['name'].'">
                </div>
                <div class="col-md-6">
                  <input type="hidden" id="id_usuario_report" name="id_usuario_report" class="form-control" value="'.$fila['id'].'" readonly>
                </div>
              </div>
              <div class="form-group">
                <label class="col-md-4 control-label" for="nombre">Email</label>
                <div class="col-md-6">
                  <input type="email" id="email" name="email" class="form-control" value="'.$fila['email'].'">
                </div>
              </div>
              <div class="form-group">
                <label class="col-md-4 control-label" for="nombre">Teléfono</label>
                <div class="col-md-6">
                  <input type="text" id="movil" name="movil" class="form-control" value="'.$fila['cellphone'].'">
                </div>
              </div>
              <div class="form-group ">
                <div class="col-md-8 col-md-offset-4">
                  <button href="" type="submit" class="btn btn-sm btn-success" id="btn-modificar-curso"><i class="fa fa-arrow-right"></i> Modificar</button>
                  <button id="btn-eliminar" type="reset" class="btn btn-sm btn-warning"><i class="fa fa-repeat"></i> Limpiar</button>
                </div>
              </div>
            </fieldset>
          </form>';

        }

    }else{
      return header("Location: ../views/manager/usuarioReport.php");
    }
}



 ?>
