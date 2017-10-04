<?php
class TicketTickets{

  //Modelo para listar los vales en la vista de crear vales
  public function todosValesXDependencia($arg_idDependencia){
    $rows = null;
    $modelo = new Conexion();
    $conexion = $modelo->get_conexion();
    $sql = "select ticket_tickets.company_id, ticket_tickets.ticket, ticket_tickets.status, ticket_tickets.created_at, ticket_tickets.end_at, ticket_tickets.cost_center_id, ticket_tickets.commit from ticket_tickets where ticket_tickets.ticket_user_id = :idDepartamento";
    $statement = $conexion->prepare($sql);
    $statement->bindParam(':idDepartamento', $arg_idDependencia);
    $statement->execute();
    while ($result = $statement->fetch()) {
      $rows[] = $result;
    }

    return $rows;
    $conexion = $modelo->close_conexion($statement, $conexion);
  }

  public function crearNuevoVale($arg_idCompania, $arg_ticket_user_id, $arg_ticket, $arg_created_at, $arg_end_at, $arg_const_center_id, $arg_commit){
    $modelo = new Conexion();

    $conexion = $modelo->get_conexion();
    $sql = "insert into ticket_tickets (company_id, ticket_user_id, ticket, status, created_at, end_at, cost_center_id, commit, time_expired)values(:idCompania, :ticket_users_id, :ticket, 0, :created_at, :end_at, :cost_center_id, :commit, 0)";
    $statement = $conexion->prepare($sql);
    $statement->bindParam(":idCompania", $arg_idCompania);
    $statement->bindParam(":ticket_users_id", $arg_ticket_user_id);
    $statement->bindParam(":ticket", $arg_ticket);
    $statement->bindParam(":created_at", $arg_created_at);
    $statement->bindParam(":end_at", $arg_end_at);
    $statement->bindParam(":cost_center_id", $arg_const_center_id);
    $statement->bindParam(":commit", $arg_commit);
    if (!$statement) {
      return FALSE;

    }else{
      $statement->execute();
      return TRUE;

    }

  }

  public function todosValesXCompania($arg_idCompania){
    $rows = null;
    $modelo = new Conexion();
    $conexion = $modelo->get_conexion();
    $sql = "select ticket_tickets.company_id, ticket_tickets.ticket, ticket_tickets.status, ticket_tickets.created_at, ticket_tickets.end_at, ticket_tickets.cost_center_id, ticket_tickets.commit from ticket_tickets where ticket_tickets.company_id = :idCompania";
    $statement = $conexion->prepare($sql);
    $statement->bindParam(':idCompania', $arg_idCompania);
    $statement->execute();
    while ($result = $statement->fetch()) {
      $rows[] = $result;
    }

    return $rows;
    $conexion = $modelo->close_conexion($statement, $conexion);
  }


}
 ?>
