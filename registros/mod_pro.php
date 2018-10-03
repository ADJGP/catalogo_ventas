<?php 

include '../conexion.php';
session_start();

$id=$_POST['id'];


if (mysqli_query($conexion,"UPDATE `tienda_productos` SET `nombre`='$_POST[tit]', `descripcion`='$_POST[desc]', `caracteristicas`='$_POST[carac]' ,`existencia`='$_POST[stock]',`precio`='$_POST[precio]', `id_categoria`='$_POST[ncat]', `cant_min_stock`='$_POST[min]' WHERE (`id_producto`='$id')")){

	echo 1;


}else{


echo 2;

}


 ?>