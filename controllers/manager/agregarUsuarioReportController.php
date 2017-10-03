<?php
require_once('../../models/conexion.php');
require_once('../../models/ticket_users.php');
require_once('../../Util/Cifrado.php');

$idCompania = $_POST['id_compania'];
$idCentroCostos = $_POST['id_centro_costo'];
$idParent = $_POST['id_usuario'];
$rol = $_POST['rol'];
$nombre = strtoupper($_POST['nombre']);
$movil = $_POST['movil'];
$email = $_POST['email'];
$pass = Cifrado($_POST['pass']);

if(strlen($idCompania) > 0 && strlen($idCentroCostos) > 0 && strlen($idParent) > 0 && strlen($rol) > 0 && strlen($nombre) > 0 && strlen($movil) > 0 && strlen($email) > 0 && strlen($pass) > 0){
  $consulta = new TicketUsers();
  $flag = $consulta->verificarCorreo($email);
  if($flag == "true"){
    header("Location: ../../views/mensajes/registro_error.html");
  }else{
    $flagTwo = $consulta->verificarMovil($movil);
    if ($flagTwo == "true") {
      header("Location: ../../views/mensajes/registro_error.html");
    }else{
      $mensaje = $consulta->crearUsuarioReport($idCompania, $idCentroCostos, $idParent, $rol, $nombre, $movil, $email, $pass);

    }
  }


}else{
  header("Location: ../../views/mensajes/error.php");
}



 ?>
