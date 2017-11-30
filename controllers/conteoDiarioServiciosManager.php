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
$idCentroCosto = $_POST['idCC'];

//$idCompania = 9;

//$porciento = 5400000*10/100;


//echo "la cantidad de servicios son: $cantidad y la suma de ellos es: $ $suma  el id del centro de costos es: $idCentroCosto y el porcentaje es: $porcentaje ";

$prefijo = $consultaTicketCost->obtnerPrefijoXIdCentroCostos($idCentroCosto);

$nombreUsuario = $consultaUsuario->obtnerNombreUserTicket($idUsuario);
$email = $consultaUsuario-> obtnerEmailUserTicket($idUsuario);

$correosAdmin = $consultaUsuario->obtnerUsuarioAdminXIdCompania($idCompania);




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
$suma;
        $mensaje = $consultaTicketCost->actualizarGasto($suma, $idCentroCosto);

        if ($mensaje == FALSE) {
          echo "ERRO: No se puedo actualizar el gasto";
        }else {
            $saldo = $presupuesto - $facturado - $suma;
            $resultado = $facturado + $suma;

            $msj = $consultaTicketCost->actualizarUsed($saldo, $idCentroCosto);

            if($msj == FALSE){

              echo "ERROR: No se puedo actualizar el saldo";
            }else {
              if ($resultado >= $presupuesto){

                $opc = 2;
                        $mail = new PHPMailer;
                        $mail->CharSet = "UTF-8";
                        $mail->Encoding = "quoted-printable";
                        $mail->isSMTP();
                        $mail->Host = 'smtp.gmail.com';
                        $mail->SMTPAuth = true;
                        $mail->Username ='taxisya.cms@gmail.com';
                        $mail->Password = 't4x1sy42015';
                        $mail->SMTPSecure = 'tls';
                        $mail->SMTPOptions = array(
                            'tls' => array(
                                'verify_peer' => false,
                                'verify_peer_name' => false,
                                'allow_self_signed' => true
                          ));

                        $mail->Port = 587;
                        $mail->setFrom('taxisya.cms@gmail.com', 'TaxisYa');
                        $mail->addAddress($email, $nombreUsuario);
                        $mail->isHTML(true);
                        $mail->Subject = 'Taxisya Información del presupuesto';
                        $mail->Body    = EmailTemplatePresupuesto($nombre, $saldo, $opc);
                        $mail->AltBody = 'Hola'. $nombreUsuario . ': Su presupuesto para '.$nombre.' ha finalizado: $'.$saldo;

                        if(!$mail->send()){
                          $HTML = '<div class="alert alert-dismissible alert-danger">
                          <button type="button" class="close" data-dismiss="alert">x</button>
                          <strong>ERROR:</strong> ' . $mail->ErrorInfo . ' </div>';

                        }else{
                          $HTML = 1;
                        }

                        foreach($correosAdmin as $correo){
                          $name = $correo['name'];
                          $flecha = $correo['email'];
                          $opc = 2;
                                  $mail = new PHPMailer;
                                  $mail->CharSet = "UTF-8";
                                  $mail->Encoding = "quoted-printable";
                                  $mail->isSMTP();
                                  $mail->Host = 'smtp.gmail.com';
                                  $mail->SMTPAuth = true;
                                  $mail->Username ='taxisya.cms@gmail.com';
                                  $mail->Password = 't4x1sy42015';
                                  $mail->SMTPSecure = 'tls';
                                  $mail->SMTPOptions = array(
                                      'tls' => array(
                                          'verify_peer' => false,
                                          'verify_peer_name' => false,
                                          'allow_self_signed' => true
                                    ));

                                  $mail->Port = 587;
                                  $mail->setFrom('taxisya.cms@gmail.com', 'TaxisYa');
                                  $mail->addAddress($flecha, $name);
                                  $mail->isHTML(true);
                                  $mail->Subject = 'Taxisya Información del presupuesto';
                                  $mail->Body    = EmailTemplatePresupuesto($nombre, $saldo, $opc);
                                  $mail->AltBody = 'Hola'. $name . ': Su presupuesto para '.$nombre.' ha finalizado: $'.$saldo;

                                  if(!$mail->send()){
                                    $HTML = '<div class="alert alert-dismissible alert-danger">
                                    <button type="button" class="close" data-dismiss="alert">x</button>
                                    <strong>ERROR:</strong> ' . $mail->ErrorInfo . ' </div>';

                                  }else{
                                    $HTML = 1;
                                  }
                        }

                echo "
                  <script> alert('Su presupuesto para $nombre ha finalizado : $$saldo');</script>
                ";


                //echo "Su presupuesto para $nombre esta pronto a llegar a su fin le quedan : $$saldo";
              }elseif  ($resultado <= $porcentaje){
                $opc = 1;
                        $mail = new PHPMailer;
                        $mail->CharSet = "UTF-8";
                        $mail->Encoding = "quoted-printable";
                        $mail->isSMTP();
                        $mail->Host = 'smtp.gmail.com';
                        $mail->SMTPAuth = true;
                        $mail->Username ='taxisya.cms@gmail.com';
                        $mail->Password = 't4x1sy42015';
                        $mail->SMTPSecure = 'tls';
                        $mail->SMTPOptions = array(
                            'tls' => array(
                                'verify_peer' => false,
                                'verify_peer_name' => false,
                                'allow_self_signed' => true
                          ));

                        $mail->Port = 587;
                        $mail->setFrom('taxisya.cms@gmail.com', 'TaxisYa');
                        $mail->addAddress($email, $nombreUsuario);
                        $mail->isHTML(true);
                        $mail->Subject = 'Recuper contraseña de Taxisya';
                        $mail->Body    = EmailTemplatePresupuesto($nombre, $saldo, $opc);
                        $mail->AltBody = 'Hola'. $nombreUsuario . ': Su presupuesto para '.$nombre.' esta por vencerse su saldo es de: $'.$saldo;

                        if(!$mail->send()){
                          $HTML = '<div class="alert alert-dismissible alert-danger">
                          <button type="button" class="close" data-dismiss="alert">x</button>
                          <strong>ERROR:</strong> ' . $mail->ErrorInfo . ' </div>';

                        }else{
                          $HTML = 1;
                        }

                        foreach($correosAdmin as $correo){

                          $name = $correo['name'];
                          $flecha = $correo['email'];
                          $opc = 1;
                                  $mail = new PHPMailer;
                                  $mail->CharSet = "UTF-8";
                                  $mail->Encoding = "quoted-printable";
                                  $mail->isSMTP();
                                  $mail->Host = 'smtp.gmail.com';
                                  $mail->SMTPAuth = true;
                                  $mail->Username ='taxisya.cms@gmail.com';
                                  $mail->Password = 't4x1sy42015';
                                  $mail->SMTPSecure = 'tls';
                                  $mail->SMTPOptions = array(
                                      'tls' => array(
                                          'verify_peer' => false,
                                          'verify_peer_name' => false,
                                          'allow_self_signed' => true
                                    ));

                                  $mail->Port = 587;
                                  $mail->setFrom('taxisya.cms@gmail.com', 'TaxisYa');
                                  $mail->addAddress($flecha, $name);
                                  $mail->isHTML(true);
                                  $mail->Subject = 'Recuper contraseña de Taxisya';
                                  $mail->Body    = EmailTemplatePresupuesto($nombre, $saldo, $opc);
                                  $mail->AltBody = 'Hola'. $name . ': Su presupuesto para '.$nombre.' esta por vencerse su saldo es de: $'.$saldo;

                                  if(!$mail->send()){
                                    $HTML = '<div class="alert alert-dismissible alert-danger">
                                    <button type="button" class="close" data-dismiss="alert">x</button>
                                    <strong>ERROR:</strong> ' . $mail->ErrorInfo . ' </div>';

                                  }else{
                                    $HTML = 1;
                                  }

                        }


                echo "
                  <script> alert('Su presupuesto para $nombre esta pronto a llegar a su fin. Le quedan : $$saldo');</script>
                ";



              }
            }




        }








 ?>
