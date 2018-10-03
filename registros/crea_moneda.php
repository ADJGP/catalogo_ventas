<?php
include '../conexion.php';
session_start();

if (empty($_POST['nom']) || empty($_POST['signo']) ) {

echo 0;


}else{

$conexion->query("INSERT INTO `tienda_monedas` (`nombre_moneda`, `signo`, `status`, `fec_crea`, `usr_crea`) VALUES ('$_POST[nom]', '$_POST[signo]', '0', NOW(),'$_SESSION[id_usr]')");

echo 1;

}
 ?>