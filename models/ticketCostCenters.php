<?php
class TicketCostCenters{

public function nombreCostCenter($arg_idCostCenter){
  $modelo = new Conexion();
  $nombreCostCenter = null;
  $conexion = $modelo->get_conexion();
  $sql = "select name from ticket_cost_centers where id = :idCostCenter LIMIT 1";
  $statement = $conexion->prepare($sql);
  $statement->bindParam(':idCostCenter', $arg_idCostCenter);
  $statement->execute();
  $nombreCostCenter = $statement->fetchColumn();

  return $nombreCostCenter;

  $conexion = $modelo->close_conexion($statement, $conexion);
}

public function ultimoNumeroVale($arg_idCostCenter){
  $modelo = new Conexion();
  $nombreCostCenter = null;
  $conexion = $modelo->get_conexion();
  $sql = "select numerator from ticket_cost_centers where id = :idCostCenter LIMIT 1";
  $statement = $conexion->prepare($sql);
  $statement->bindParam(':idCostCenter', $arg_idCostCenter);
  $statement->execute();
  $numero = $statement->fetchColumn();

  return $numero;

  $conexion = $modelo->close_conexion($statement, $conexion);
}

public function actualizarNumeroVale($arg_nuevoNumero, $arg_idCostCenter){
  $modelo = new Conexion();
  $conexion =  $modelo->get_conexion();
  $sql = "update ticket_cost_centers set numerator = :nuevoNumero where id = :idCostCenter";
  $statement = $conexion->prepare($sql);
  $statement->bindParam(':nuevoNumero', $arg_nuevoNumero);
  $statement->bindParam(':idCostCenter', $arg_idCostCenter);

  if (!$statement) {
    return FALSE;
  }else{
    $statement->execute();
    return TRUE;
  }

  $conexion = $modelo->close_conexion($statement, $conexion);

}


}

 ?>
