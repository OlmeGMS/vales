<?php
require_once('../models/conexion.php');
require_once('../models/usuario.php');
require_once('../Util/Cifrado.php');

$mensaje = null;
$idCc = null;
$estado = null;
$nombreUser = null;
$historia = null;
$fotoUser = null;

$documento = $_POST['login-usuario'];
$password = Cifrado($_POST['login-password']);

if (strlen($documento) >0 && strlen($password) >0 ) {
  $consulta = new Usuario();
  $mensaje = $consulta->login($documento, $password);
  $idCc = $consulta->ccUsuario($documento);
  $estado = $consulta->iniciarSesion($mensaje);


  $nombreUser = $consulta->nombreUsuario($mensaje);
  $idCompania = $consulta->idCompaniaXUsuario($mensaje);
  //$historia = $consulta->historiaUsuario($mensaje);
  //$foto = $consulta->fotoUsuario($mensaje);


if(isset( $_SESSION["login"])){
  header("Location: ../views/SuperAdministrador/home.php");
}else{

  if (!empty($mensaje)) {
    if (!empty($estado)) {
      switch ($estado) {
        case 'root':
           session_start();
            $_SESSION["login"];
            $_SESSION['nombre'] = $nombreUser;
            $_SESSION['idUsuario'] = $mensaje;
            $_SESSION['idRol'] = $rol;
            $_SESSION['idCc'] = $idCc;
            $_SESSION['estado'] = $estado;
            $_SESSION['idCompania'] = $idCompania;
            //$_SESSION['foto'] = $foto;
            header("Location: ../views/SuperAdministrador/home.php");
          break;
        case 'admin':
          session_start();
           $_SESSION["login"];
           $_SESSION['nombre'] = $nombreUser;
           $_SESSION['idUsuario'] = $mensaje;
           $_SESSION['idRol'] = $rol;
           $_SESSION['idCc'] = $idCc;
           $_SESSION['estado'] = $estado;
           $_SESSION['idCompania'] = $idCompania;
            header("Location: ../views/Administrador/home.php");
            break;
        case 'manager':
          session_start();
           $_SESSION["login"];
           $_SESSION['nombre'] = $nombreUser;
           $_SESSION['idUsuario'] = $mensaje;
           //$_SESSION['idRol'] = $rol;
           $_SESSION['idCc'] = $idCc;
           $_SESSION['estado'] = $estado;
           $_SESSION['idCompania'] = $idCompania;
            header("Location: ../views/manager/home.php");
          break;
        case 'report':
          session_start();
           $_SESSION["login"];
           $_SESSION['nombre'] = $nombreUser;
           $_SESSION['idUsuario'] = $mensaje;
           $_SESSION['idRol'] = $rol;
           $_SESSION['idCc'] = $idCc;
           $_SESSION['estado'] = $estado;
           $_SESSION['idCompania'] = $idCompania;
           header("Location: ../views/report/home.php");
           break;

        default:
          header("Location: ../views/mensajes/error.html");
          break;
      }
    }else{
         header("Location: ../views/mensajes/error_activacion.html");

    }
  }else{
       header("Location: ../views/iniciarsesion.php");
  }
}



}
 ?>
