<?php 

include '../conexion.php';
session_start();

echo $id=$_POST['id'];

$v_est=$conexion->query("SELECT * FROM tienda_productos WHERE id_producto='$id'");
$est=$v_est->fetch_array();


if ($est['status']==0) {
	
mysqli_query($conexion,"UPDATE `tienda_productos` SET `status`='1' WHERE (`id_producto`='$id')");

}else if ($est['status']==1) {

	mysqli_query($conexion,"UPDATE `tienda_productos` SET `status`='0' WHERE (`id_producto`='$id')");
}

 ?>