<?php  

require_once "model/conexion.php";
require_once 'control/userControl.php';
require_once 'control/navegacion.php';

$plantilla = new navegacion();
$plantilla -> inluir_plantilla();


?>
