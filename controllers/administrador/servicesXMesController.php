Administradoradministrador<?php
require_once('../../models/conexion.php');
require_once('../../models/services.php');

$mes = $_POST['mes'];

if(!empty($mes)){
  header("Location: ../../views/administrador/serviciosAdministradorMes.php?idmes=$mes");
}else{
  header("Location: ../../views/administrador/serviciosAdministradorMes.php");
}


 ?>
