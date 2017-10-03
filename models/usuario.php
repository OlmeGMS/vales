<?php

class Usuario{

  public function login($arg_email, $arg_password){
    $modelo = new Conexion();
    $idUsuario = null;
    $conexion = $modelo->get_conexion();
    $sql = "select id from ticket_users where email = :email and pass = :password LIMIT 1";
    $statement = $conexion->prepare($sql);
    $statement->bindParam(':email', $arg_email);
    $statement->bindParam(':password', $arg_password);
    $statement->execute();
    $idUsuario = $statement->fetchColumn();
    return $idUsuario;
    $conexion = $modelo->close_conexion($statement, $conexion);

  }

  public function ccUsuario($arg_email){
    $modelo = new Conexion();
    $idCc = null;
    $conexion = $modelo->get_conexion();
    $sql = "select cost_center_id from ticket_users where email = :email LIMIT 1";
    $statement = $conexion->prepare($sql);
    $statement->bindParam(':email', $arg_email);
    $statement->execute();
    $idCc = $statement->fetchColumn();
    return $idCc;
    $conexion = $modelo->close_conexion($statement, $conexion);

  }

  public function iniciarSesion($arg_idUsuario){
    $modelo = new Conexion();
    $rol = null;
    $conexion = $modelo->get_conexion();
    $sql = "select role from ticket_users where id = :idUsuario LIMIT 1";
    $statement = $conexion->prepare($sql);
    //$id[] = (string) $arg_idUsuario;
    $statement->bindParam(':idUsuario', $arg_idUsuario);
    $statement->execute();
    $rol = $statement->fetchColumn();
    return $rol;
    $conexion = $modelo->close_conexion($statement, $conexion);
  }

  public function nombreUsuario($arg_idUsuario){
    $modelo = new Conexion();
    $nombreUser = null;
    $conexion = $modelo->get_conexion();
    $sql = "select name from ticket_users where id = :idUsuario LIMIT 1";
    $statement = $conexion->prepare($sql);
    //$id[] = (string) $arg_idUsuario;
    $statement->bindParam(':idUsuario', $arg_idUsuario);
    $statement->execute();
    $nombreUser = $statement->fetchColumn();
    return $nombreUser;
    $conexion = $modelo->close_conexion($statement, $conexion);

  }

  public function cambiarContrasena($arg_password, $arg_idUsuario){
    $modelo = new Conexion();
    $conexion = $modelo->get_conexion();
    $sql = "update ticket_users set pass = :password where id = :idUsuario";
    $statement = $conexion->prepare($sql);
    $statement->bindParam(':password', $arg_password);
    $statement->bindParam(':idUsuario', $arg_idUsuario);
    if (!$statement) {
      return header("Location: ../views/mensajes/errorContrasena.php");
    }else{
      $statement->execute();
      return header("Location: ../views/mensajes/cambiarContrasena.php");
    }
    $conexion = $modelo->close_conexion($statement, $conexion);

  }

  public function idCompaniaXUsuario($arg_idUsuario){
    $modelo = new Conexion();
    $conexion = $modelo->get_conexion();
    $sql = "select company_id from ticket_users where id = :idUsuario";
    $statement = $conexion->prepare($sql);
    $statement->bindParam(':idUsuario', $arg_idUsuario);
    $statement->execute();
    $idCompania = $statement->fetchColumn();
    return $idCompania;
    $conexion = $modelo->close_conexion($statement, $conexion);
  }








}


 ?>
