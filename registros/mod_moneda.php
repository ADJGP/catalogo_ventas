<?php 

include '../conexion.php';
session_start();

$moneda=$_POST['moneda'];
$sig=$_POST['sig'];
$id=$_POST['id'];


if (mysqli_query($conexion,"UPDATE `tienda_monedas` SET `nombre_moneda`='$moneda', `signo`='$sig' WHERE (`id_moneda`='$id')")){

	echo 1;


}else{


echo 2;

}






 ?>