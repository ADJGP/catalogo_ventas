<?php 
include '../conexion.php';

$title=$_POST['title'];

//echo $title;
//echo $descripcion;


$categorias=mysqli_query($conexion,"SELECT * FROM tienda_categoria WHERE titulo='$title'");

$count=mysqli_num_rows($categorias);


if ($count>0) {

echo 1;

} else {
	
echo 2;

}



	





 ?>