<?php
require_once('../../models/conexion.php');
require_once('../../models/ticket_users.php');

$consulta = new TicketUsers();
$mensaje = null;
$idCentroCostos = $_POST['centro_costo'];
$nombre = strtoupper($_POST['nombre']);
$email = $_POST['email'];
$movil = $_POST['movil'];
$idUsuarioManager= $_POST['id_usuario_manager'];

$mensajes = $consulta->modificarUsuarioManager($idCentroCostos, $nombre, $email, $movil, $idUsuarioManager);

return $mensaje;

 ?>
