<?php 

include '../conexion.php';
session_start();

$id=$_POST['id'];

$v_dest=$conexion->query("SELECT * FROM tienda_productos WHERE id_producto='$id'");
$dest=$v_dest->fetch_array();


if ($dest['destacado']==0) {
	
mysqli_query($conexion,"UPDATE `tienda_productos` SET `destacado`='1' WHERE (`id_producto`='$id')");

}else if ($dest['destacado']==1) {

	mysqli_query($conexion,"UPDATE `tienda_productos` SET `destacado`='0' WHERE (`id_producto`='$id')");
}

 ?>