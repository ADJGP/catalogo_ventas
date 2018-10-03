<?php 
include '../conexion.php';

$id=$_POST['id'];

$categorias=mysqli_query($conexion,"DELETE FROM `tienda_categoria` WHERE `tienda_categoria`.`id_categoria` = '$id'");

echo 1;

?>