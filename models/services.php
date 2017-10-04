<?php
class Services{

  public function todosServiciosCompania($arg_idCompania){

    $row = null;
    $modelo = new Conexion();
    $conexion = $modelo->get_conexion();
    $sql = "select ticket_tickets.ticket, services.created_at, services.updated_at, services.user_name, cars.placa, services.barrio, services.units, services.charge1, services.charge2, services.charge4, services.value, services.commit, services.destination, services.index_id, services.comp1, services.comp2, services.no, services.obs, services.barrio, services.address, services.qualification from services inner join ticket_tickets on ticket_tickets.ticket = services.user_card_reference inner join cars on services.car_id = cars.id where ticket_tickets.company_id = :idCompania";
    $statement = $conexion->prepare($sql);
    $statement->bindParam(':idCompania', $arg_idCompania);
    $statement->execute();
    while ($result = $statement->fetch()) {
      $rows[] = $result;
    }

    return $rows;
    $conexion = $modelo->close_conexion($statement, $conexion);

  }

  public function prefijo($arg_idCc){
    $row = null;
    $modelo = new Conexion();
    $conexion = $modelo->get_conexion();
    $sql = "select prefix from ticket_cost_centers where id = :idDepartamento LIMIT 1";
    $statement = $conexion->prepare($sql);
    $statement->bindParam(':idDepartamento', $arg_idCc);
    $statement->execute();
    $prefijo = $statement->fetchColumn();
    return $prefijo;
  }

  public function todosServiciosCompaniaXDepartamento($arg_prefijo){

    $rows = null;
    $modelo = new Conexion();
    $conexion = $modelo->get_conexion();
    $sql = "select ticket_tickets.ticket, services.created_at, services.updated_at, services.user_name, cars.placa, services.barrio, services.units, services.charge1, services.charge2, services.charge4, services.value, services.commit, services.destination from services inner join ticket_tickets on ticket_tickets.ticket = services.user_card_reference inner join cars on services.car_id = cars.id where services.pay_type = 3 like services.user_card_reference = :prefijo";
    $statement = $conexion->prepare($sql);
    $statement->bindParam(':prefijo', $arg_prefijo);
    $statement->execute();
    while ($result = $statement->fetch()) {
      $rows[] = $result;
    }

    return $rows;
    $conexion = $modelo->close_conexion($statement, $conexion);

  }

  public function todosServiciosMangerMes($arg_prefijo, $arg_mes){

    $rows = null;
    $modelo = new Conexion();
    $conexion = $modelo->get_conexion();
    $prefijoa = $arg_prefijo."%";
    $sql = "select ticket_tickets.ticket, services.created_at, services.updated_at, services.user_name, cars.placa, services.barrio, services.units, services.charge1, services.charge2, services.charge4, services.value, services.commit, services.destination, services.index_id, services.comp1, services.comp2, services.no, services.obs, services.barrio, services.address, services.qualification from services inner join ticket_tickets on ticket_tickets.ticket = services.user_card_reference inner join cars on services.car_id = cars.id where (MONTH(services.created_at) = :mes) and (services.pay_type = 3) and (services.user_card_reference like :prefijo)";
    $statement = $conexion->prepare($sql);
    $statement->bindParam(':prefijo', $prefijoa);
    $statement->bindParam(':mes', $arg_mes);
    $statement->execute();
    while ($result = $statement->fetch()) {

      $rows[] = $result;
    }
    return $rows;
    $conexion = $modelo->close_conexion($statement, $conexion);

  }

  public function todosServiciosAdministradorMes($arg_idCompania, $arg_mes){

    $rows = null;
    $modelo = new Conexion();
    $conexion = $modelo->get_conexion();
    $sql = "select ticket_tickets.ticket, services.created_at, services.updated_at, services.user_name, cars.placa, services.barrio, services.units, services.charge1, services.charge2, services.charge4, services.value, services.commit, services.destination,services.index_id, services.comp1, services.comp2, services.no, services.obs, services.address, services.qualification from services inner join ticket_tickets on ticket_tickets.ticket = services.user_card_reference inner join cars on services.car_id = cars.id where (MONTH(services.created_at) = :mes) and (services.pay_type = 3) and (ticket_tickets.company_id = :idCompania)";
    $statement = $conexion->prepare($sql);
    $statement->bindParam(':idCompania', $arg_idCompania);
    $statement->bindParam(':mes', $arg_mes);
    $statement->execute();
    while ($result = $statement->fetch()) {

      $rows[] = $result;
    }
    return $rows;
    $conexion = $modelo->close_conexion($statement, $conexion);

  }






  //select ticket_tickets.ticket, services.created_at, services.updated_at, services.user_name, cars.placa, services.barrio, services.units, services.charge1, services.charge2, services.charge4, services.value, services.commit, services.destination from services inner join ticket_tickets on ticket_tickets.ticket = services.user_card_reference inner join cars on services.car_id = cars.id where (MONTH(services.created_at) = 9) and (services.pay_type = 3) like services.user_card_reference = 'FM';




}
?>
