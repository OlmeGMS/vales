<?php
require_once('../../models/conexion.php');
require_once('../../models/ticketCostCenters.php');
require_once('../../models/ticketCompanies.php');

$consulta = new TicketCostCenters();
$consultaCompania = new TicketCompanies();
$mensaje = null;
$idCentroCostos = $_POST['id_centro_costo'];
$nombre = strtoupper($_POST['nombre']);
$presupuesto = $_POST['presupuesto'];
$usado = $consulta->obtenerUsed($idCentroCostos);
$idCompania = $consulta->obtnerIDCompaniaXCC($idCentroCostos);
$tipoBloqueo = $consultaCompania->obtenerTipoBloqueo($idCompania);




if(strlen($idCentroCostos) > 0 && strlen($nombre) > 0 && strlen($presupuesto) > 0){

  $porciento = $presupuesto*10/100;

  $msj = $consulta->actualizarPorcentaje($porciento, $idCentroCostos);
  if ($msj == FALSE) {
    echo "ERROR: No se pudo actualizar el porcentaje";
  }else {
    if($tipoBloqueo == 1){
        if($porciento > $usado){
          $arg_bloqueo = 0;
          $bloqueo = $consulta->modificarBloqueo($arg_bloqueo, $idCentroCostos);
        }
    }
    $mensaje = $consulta->modificarCentroCosto($nombre, $presupuesto, $idCentroCostos);
  }


}else{
  header("Location: ../../views/mensajes/error.php");
}




 ?>
