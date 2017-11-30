<?php
require_once('../../models/conexion.php');
require_once('../../models/ticketCostCenters.php');

$consulta = new TicketCostCenters();
$mensaje = null;
$idCentroCostos = $_POST['id_centro_costo'];
$nombre = strtoupper($_POST['nombre']);
$presupuesto = $_POST['presupuesto'];

if(strlen($idCentroCostos) > 0 && strlen($nombre) > 0 && strlen($presupuesto) > 0){

  $porciento = $presupuesto*10/100;

  $msj = $consulta->actualizarPorcentaje($porciento, $idCentroCostos);
  if ($msj == FALSE) {
    echo "ERROR: No se pudo actualizar el porcentaje";
  }else {
    $mensaje = $consulta->modificarCentroCosto($nombre, $presupuesto, $idCentroCostos);
  }


}else{
  header("Location: ../../views/mensajes/error.php");
}




 ?>
