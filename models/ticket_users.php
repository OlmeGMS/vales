<?php

class TicketUsers{

// Todos los metodo de la creacion de usuarios en los vales

public function todosUsuarioReportXCC($arg_idCompania, $arg_idCc){

$row = null;
$modelo = new Conexion();
$conexion = $modelo->get_conexion();
$sql = "select * from ticket_users where company_id = :idCompania and cost_center_id = :idCentroCostos and role = 'report'";
$statement = $conexion->prepare($sql);
$statement->bindParam(':idCompania', $arg_idCompania);
$statement->bindParam(':idCentroCostos', $arg_idCc);
$statement->execute();
while($result = $statement->fetch()){
  $row[] = $result;
}

return $row;
$conexion = $modelo->close_conexion($statement, $conexion);

}

public function crearUsuarioReport($arg_idCompania, $arg_idCostCenter, $arg_parentId, $arg_rol, $arg_nombre, $arg_movil, $arg_email, $arg_pass){
  $modelo = new Conexion();
  $conexion = $modelo->get_conexion();
  $sql = "insert into ticket_users(company_id, cost_center_id, parent_id, role, name, cellphone, email, pass) values (:idCompania, :idCostCenter, :parentId, :rol, :nombre, :movil, :email, :pass)";
  $statement = $conexion->prepare($sql);
  $statement->bindParam(':idCompania', $arg_idCompania);
  $statement->bindParam(':idCostCenter', $arg_idCostCenter);
  $statement->bindParam(':parentId', $arg_parentId);
  $statement->bindParam(':rol', $arg_rol);
  $statement->bindParam(':nombre', $arg_nombre);
  $statement->bindParam(':movil', $arg_movil);
  $statement->bindParam(':email', $arg_email);
  $statement->bindParam(':pass', $arg_pass);

  if(!$statement){
    return header("Location: ../../views/mensajes/error.php");
  }else{
    $statement->execute();
    return header("Location: ../../views/mensajes/registro_exitoso.php");
  }
  $conexion = $modelo->close_conexion($statement, $conexion);
}

public function cargarUsuarioReport($arg_idUsuarioReport){
  $row = null;
  $modelo = new Conexion();
  $conexion = $modelo->get_conexion();
  $sql = "select * from ticket_users where id = :idUsuarioReport LIMIT 1";
  $statement = $conexion->prepare($sql);
  $statement->bindParam(":idUsuarioReport", $arg_idUsuarioReport);
  $statement->execute();
  while ($result = $statement->fetch()) {
    $row[] = $result;
  }

  return $row;
  $conexion = $modelo->close_conexion($statement, $conexion);

}


public function modificarUsuarioReport($arg_nombre, $arg_email, $arg_movil, $arg_idUsuarioReport){

  $modelo = new Conexion();
  $conexion = $modelo->get_conexion();
  $sql = "update ticket_users set name = :nombre, email = :email, cellphone= :movil where id = :idUsuarioReport";
  $statement = $conexion->prepare($sql);
  $statement->bindParam(":nombre", $arg_nombre);
  $statement->bindParam(":email", $arg_email);
  $statement->bindParam(":movil", $arg_movil);
  $statement->bindParam(":idUsuarioReport", $arg_idUsuarioReport);
  if (!$statement) {
    return header("Location: ../views/mensajes/error.php");

  }else{
    $statement->execute();
    return header("Location: ../views/manager/usuarioReport.php");
  }
  $conexion = $modelo->close_conexion($statement, $conexion);



}

public function verificarCorreo($arg_email){
  $modelo = new Conexion();
  $rows = null;
  $flag = null;
  $conexion = $modelo->get_conexion();
  $sql="select name from ticket_users where email = :correo LIMIT 1";
  $statement = $conexion->prepare($sql);
  $statement->bindParam(':correo', $arg_email);
  $statement->execute();

  $flag = $statement->fetchColumn();

  if ($flag == 0) {
    $flag = FALSE;
  }else{
    $flag = TRUE;
  }
  return $flag;
  $conexion = $modelo->close_conexion($statement, $conexion);

}

public function verificarMovil($arg_movil){
  $modelo = new Conexion();
  $rows = null;
  $flag = null;
  $conexion = $modelo->get_conexion();
  $sql="select name from ticket_users where cellphone = :movil LIMIT 1";
  $statement = $conexion->prepare($sql);
  $statement->bindParam(':movil', $arg_movil);
  $statement->execute();

  $flag = $statement->fetchColumn();

  if ($flag == 0) {
    $flag = FALSE;
  }else{
    $flag = TRUE;
  }
  return $flag;
  $conexion = $modelo->close_conexion($statement, $conexion);

}





}
 ?>
