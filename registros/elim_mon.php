<?php 
include '../conexion.php';

$id=$_POST['id'];

$categorias=mysqli_query($conexion,"DELETE FROM `tienda_monedas` WHERE `tienda_monedas`.`id_moneda` = '$id'");

echo 1;

?>