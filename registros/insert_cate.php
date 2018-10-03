<?php 
include '../conexion.php';

$title=$_POST['title'];
$descripcion=$_POST['descripcion'];


//echo $title;
//echo $descripcion;


if (mysqli_query($conexion,"INSERT INTO `tienda_categoria` (`id_categoria`, `titulo`, `descripcion`, `status`, `fec_crea`) VALUES (NULL, '$title', '$descripcion', '1',NOW())")) {
	
echo 1;

} else {

echo 2;

}







 ?>