<?php
require_once('../models/conexion.php');
require_once('../models/usuario.php');
require_once('../Util/Cifrado.php');

$mensaje = null;
$idUsuario = $_POST['idUsuario'];
$nuevaClave = Cifrado($_POST['user-settings-password']);

if (strlen($idUsuario) > 0) {
  $consulta = new Usuario();
  $mensaje = $consulta->cambiarContrasena($nuevaClave, $idUsuario);
  return $mensaje;

}

 ?>
