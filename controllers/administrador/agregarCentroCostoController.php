<?php
require_once('../../models/conexion.php');
require_once('../../models/ticketCostCenters.php');

$idCompania = $_POST['id_compania'];
$nombre = strtoupper($_POST['nombre']);
$prefijo = strtoupper($_POST['prefijo']);
$presupuesto = $_POST['presupuesto'];
$disponible = $_POST['presupuesto'];


if (strlen($idCompania) > 0 && strlen($nombre) > 0 && strlen($prefijo) > 0 && strlen($presupuesto) > 0 && strlen($disponible) > 0) {
  $consulta = new TicketCostCenters();
  $flag = $consulta->verificarPrefijo($prefijo);
  if ($flag == "true") {
    header("Location: ../../views/mensajes/error_prefijo.php");
  }else{
    $mensajes = $consulta->crearCentroConsto($idCompania, $nombre, $prefijo, $presupuesto, $disponible );
  }
}else{
  header("Location: ../../views/mensajes/error.php");
}



 ?>
