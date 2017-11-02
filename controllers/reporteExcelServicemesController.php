<?php
require_once('../vendor/dompdf/dompdf_config.inc.php');
require_once('../models/conexion.php');
require_once('../models/services.php');
require_once('../facades/facade_service.php');
header("Content-type: application/vnd.ms-excel");
header("Content-Disposition: attachment; filename=reporte.xls");

session_start();
$idCc = $_SESSION['idCc'];
$mes = $_GET['idmes'];
?>
            <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
            <html xmlns="http://www.w3.org/1999/xhtml">
            <head>
            <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
            <title>Reporte</title>
            </head>
            <body>
            <table width="100%" border="1" cellspacing="0" cellpadding="0">
              <tr>
                <td colspan="12" bgcolor="skyblue"><CENTER><strong>REPORTE DE LA TABLA VALES</strong></CENTER></td>
              </tr>
              <tr>
                  <th class="text-center">Vale</th>
                  <th class="text-center">Fecha inicio</th>
                  <th class="text-center">Fecha fin</th>
                  <th class="text-center">Usuario</th>
                  <th class="text-center">Placa</th>
                  <th class="text-center">Dirección</th>
                  <th class="text-center">Unt</th>
                  <th class="text-center">Aer</th>
                  <th class="text-center">Noct</th>
                  <th class="text-center">PP</th>
                  <th class="text-center">Valor</th>
                  <th class="text-center">Motivo</th>
                  <th class="text-center">Destino</th>

              </tr>
            <?php
            $consulta = new Services();
            $prefijo = $consulta->prefijo($idCc);
            $filas = $consulta->todosServiciosMangerMes($prefijo, $mes);

            foreach ($filas as $fila) {
              ?>
              <tr>
                  <td id="" name ="" class="text-center"><?php echo $fila['ticket']; ?></td>
                  <td id="" name ="" class="text-center"><?php echo $fila['created_at']; ?></td>
                  <td id="" name ="" class="text-center"><?php echo $fila['updated_at']; ?></td>
                  <td id="" name ="" class="text-center"><?php echo $fila['user_name']; ?></td>
                  <td id="" name ="" class="text-center"><?php echo $fila['placa']; ?></td>
                  <td id="" name ="" class="text-center"><?php echo $fila['address']; ?></td>
                  <td id="" name ="" class="text-center"><?php echo $fila['units']; ?></td>
                  <td id="" name ="" class="text-center"><?php echo $fila['charge1']; ?></td>
                  <td id="" name ="" class="text-center"><?php echo $fila['charge2']; ?></td>
                  <td id="" name ="" class="text-center"><?php echo $fila['charge4']; ?></td>
                  <td id="" name ="" class="text-center"><?php echo $fila['value']; ?></td>
                  <td id="" name ="" class="text-center"><?php echo $fila['commit']; ?></td>
                  <td id="" name ="" class="text-center"><?php echo $fila['destination']; ?></td>
               </tr>
            <?php
            }
            ?>

            </table>
            </body>
            </html>
