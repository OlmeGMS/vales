<?php
class TicketCompanies{

public function nombreCompania($arg_idCompania){
  $modelo = new Conexion();
  $nombreCompania = null;
  $conexion = $modelo->get_conexion();
  $sql = "select name from ticket_companies where id = :idCompania LIMIT 1";
  $statement = $conexion->prepare($sql);
  $statement->bindParam(':idCompania', $arg_idCompania);
  $statement->execute();
  $nombreCompania = $statement->fetchColumn();

  return $nombreCompania;

  $conexion = $modelo->close_conexion($statement, $conexion);
}


}

 ?>
