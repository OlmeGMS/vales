<?php
require_once('../models/conexion.php');
require_once('../models/services.php');
require_once('../models/ticketCostCenters.php');
require_once('../models/ticket_users.php');
require_once('../vendor/autoload.php');
require_once('../views/mensajes/template_correo_presupuesto.php');




$consulta = new Services();
$consultaTicketCost = new TicketCostCenters();
$consultaUsuario = new TicketUsers();

$idCompania = $_POST['idCompania'];
$idUsuario = $_POST['id_usuario'];



//$idCompania = 9;

//$porciento = 5400000*10/100;


//echo "la cantidad de servicios son: $cantidad y la suma de ellos es: $ $suma  el id del centro de costos es: $idCentroCosto y el porcentaje es: $porcentaje ";


$prefijos = $consultaTicketCost->listaPrefijos($idCompania);

$nombreUsuario = $consultaUsuario->obtnerNombreUserTicket($idUsuario);
$email = $consultaUsuario-> obtnerEmailUserTicket($idUsuario);



foreach($prefijos as $prefijo){

    $prefijo = $prefijo['prefix'];

    $idCentroCosto = $consultaTicketCost->obtnerIDCentroXPrefijo($prefijo);

    $porcentaje = $consultaTicketCost->obtnerPorcentaje($idCentroCosto);

    $facturado = $consultaTicketCost->obtenerAvaliableCentroCosto($idCentroCosto);

    $presupuesto = $consultaTicketCost->obtnerPresupuestoCentroCosto($idCentroCosto);

    $filas = $consulta->estadoServicioFacturadoXCC($prefijo);

    $nombre = $consultaTicketCost->nombrePrefijoXPrefijo($prefijo);

    $cantidad = count($filas);

    $suma = 0;

        foreach($filas as $fila){
          $item = $fila['value'];
          $suma = $suma + $item;
        }

        $mensaje = $consultaTicketCost->actualizarGasto($suma, $idCentroCosto);


        if ($mensaje == FALSE) {
          echo "ERRO: No se puedo actualizar el gasto";
        }else {
            $saldo = $presupuesto - $facturado - $suma;
            $resultado = $facturado + $suma;

            $msj = $consultaTicketCost->actualizarUsed($saldo, $idCentroCosto);

            if ($msj == FALSE) {
              echo "ERROR: No se puedo actualizar el saldo";
            }else {
                if ($resultado >= $presupuesto){

                  echo "
                    <script> alert('Su presupuesto para $nombre ha finalizado : $$saldo');</script>
                  ";
                  //echo "Su presupuesto para $nombre esta pronto a llegar a su fin le quedan : $$saldo";
                }elseif  ($resultado <= $porcentaje){
                  echo "
                    <script> alert('Su presupuesto para $nombre esta pronto a llegar a su fin. Le quedan : $$saldo');</script>
                  ";

                }
            }




        }


}





 ?>
