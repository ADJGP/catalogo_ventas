<?php 
 include '../conexion.php'; 

$id=$_POST['id'];


//Buscar si existe una moneda activa
$money=$conexion->query("SELECT * FROM tienda_monedas WHERE status=1");

$count=$money->num_rows;

if ($count=1) {

$conexion->query("UPDATE `tienda_monedas` SET `status`=0");

$conexion->query("UPDATE `tienda_monedas` SET `status`=1 WHERE (`id_moneda`='$id')");

echo 1;

}

 ?>