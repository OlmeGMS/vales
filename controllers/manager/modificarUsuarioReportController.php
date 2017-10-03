<?php
require_once('../models/conexion.php');
require_once('../models/ticket_users.php');

$consulta = new TicketUsers();
$mensaje = null;
$nombre = strtoupper($_POST['nombre']);
$email = $_POST['email'];
$movil = $_POST['movil'];
$idUsuarioReport = $_POST['id_usuario_report'];

$mensajes = $consulta->modificarUsuarioReport($nombre, $email, $movil, $idUsuarioReport);

return $mensaje;



 ?>
