<?php 

include '../conexion.php';
session_start();

$cate=$_POST['cate'];
$descrip=$_POST['descrip'];
$id=$_POST['id'];


if (mysqli_query($conexion,"UPDATE `tienda_categoria` SET `titulo`='$cate', `descripcion`='$descrip' WHERE (`id_categoria`='$id')")){

	echo 1;


}else{


echo 2;

}






 ?>