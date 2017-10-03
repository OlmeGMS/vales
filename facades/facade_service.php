<?php
function listServices(){
  $consulta = new Services();
  $filas = $consulta->todosServiciosCompania();
  foreach ($filas as $fila) {
    echo '<tr>
    <td id="" name ="" class="text-center">'.$fila['ticket'].'</td>
    <td id="" name ="" class="text-center">'.$fila['created_at'].'</td>
    <td id="" name ="" class="text-center">'.$fila['updated_at'].'</td>
    <td id="" name ="" class="text-center">'.$fila['user_name'].'</td>
    <td id="" name ="" class="text-center">'.$fila['placa'].'</td>
    <td id="" name ="" class="text-center">'.$fila['units'].'</td>
    <td id="" name ="" class="text-center">'.$fila['charge1'].'</td>
    <td id="" name ="" class="text-center">'.$fila['charge2'].'</td>
    <td id="" name ="" class="text-center">'.$fila['charge4'].'</td>
    <td id="" name ="" class="text-center">'.$fila['value'].'</td>
    <td id="" name ="" class="text-center">'.$fila['commit'].'</td>
    <td id="" name ="" class="text-center">'.$fila['destination'].'</td>
     </tr>';
  }


}

function listServicesManager($arg_idCc){
  $consulta = new Services();
  $prefijo = $consulta->prefijo($arg_idCc);

  $filas = $consulta->todosServiciosCompania($prefijo);
  foreach ($filas as $fila) {
    echo '<tr>
    <td id="" name ="" class="text-center">'.$fila['ticket'].'</td>
    <td id="" name ="" class="text-center">'.$fila['created_at'].'</td>
    <td id="" name ="" class="text-center">'.$fila['updated_at'].'</td>
    <td id="" name ="" class="text-center">'.$fila['user_name'].'</td>
    <td id="" name ="" class="text-center">'.$fila['placa'].'</td>
    <td id="" name ="" class="text-center">'.$fila['units'].'</td>
    <td id="" name ="" class="text-center">'.$fila['charge1'].'</td>
    <td id="" name ="" class="text-center">'.$fila['charge2'].'</td>
    <td id="" name ="" class="text-center">'.$fila['charge4'].'</td>
    <td id="" name ="" class="text-center">'.$fila['value'].'</td>
    <td id="" name ="" class="text-center">'.$fila['commit'].'</td>
    <td id="" name ="" class="text-center">'.$fila['destination'].'</td>
     </tr>';
  }


}

function listServicesManagerMes($arg_idCc, $arg_mes){
  $consulta = new Services();
  $prefijo = $consulta->prefijo($arg_idCc);
  $mes = $arg_mes;
  $filas = $consulta->todosServiciosMangerMes($prefijo, $mes);
  foreach ($filas as $fila) {
    echo '<tr>
    <td id="" name ="" class="text-center">'.$fila['ticket'].'</td>
    <td id="" name ="" class="text-center">'.$fila['created_at'].'</td>
    <td id="" name ="" class="text-center">'.$fila['updated_at'].'</td>
    <td id="" name ="" class="text-center">'.$fila['user_name'].'</td>
    <td id="" name ="" class="text-center">'.$fila['placa'].'</td>
    <td id="" name ="" class="text-center">'.$fila['units'].'</td>
    <td id="" name ="" class="text-center">'.$fila['charge1'].'</td>
    <td id="" name ="" class="text-center">'.$fila['charge2'].'</td>
    <td id="" name ="" class="text-center">'.$fila['charge4'].'</td>
    <td id="" name ="" class="text-center">'.$fila['value'].'</td>
    <td id="" name ="" class="text-center">'.$fila['commit'].'</td>
    <td id="" name ="" class="text-center">'.$fila['destination'].'</td>
     </tr>';
  }


}

function listValesXDependecia($arg_idDependencia){
  $consulta = new TicketTickets();
  $consultaCompania = new TicketCompanies();
  $idDependencia = $arg_idDependencia;
  $filas = $consulta->todosValesXDependencia($idDependencia);
  foreach ($filas as $fila) {
    $estado = $fila['status'];
    $compania = $consultaCompania->nombreCompania($fila['company_id']);
    echo '<tr>
    <td id="" name ="" class="text-center">'.$compania.'</td>
    <td id="" name ="" class="text-center">'.$fila['ticket'].'</td>';
    switch ($estado) {
      case 0:
        echo '<td class="text-center"><span class="label label-success">Disponible</span></td>';
        break;
        case 1:
          echo '<td class="text-center"><span class="label label-info">Utilizado</span></td>';
          break;
          case 2:
            echo '<td class="text-center"><span class="label label-warning">Solicitado</span></td>';
            break;
            case 3:
              echo '<td class="text-center"><span class="label label-danger">Vencido</span></td>';
              break;
      default:
        # code...
        break;
    }
    echo '
    <td id="" name ="" class="text-center">'.$fila['created_at'].'</td>
    <td id="" name ="" class="text-center">'.$fila['end_at'].'</td>
    <td id="" name ="" class="text-center">'.$fila['cost_center_id'].'</td>
    <td id="" name ="" class="text-center">'.$fila['commit'].'</td>
     </tr>';
  }
}

?>
