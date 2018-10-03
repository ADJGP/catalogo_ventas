<?php 
include '../conexion.php';

$nombre=$_POST['nom'];
$descripcion=$_POST['desc'];
$caract=$_POST['carac'];
$exists=$_POST['exists'];
$cant_min=$_POST['cant_min'];
$costo=$_POST['costo'];
$categoria=$_POST['categoria'];


if (empty($nombre) || empty($descripcion) || empty($exists) || empty($cant_min) || empty($costo) || empty($categoria) || empty($caract)) {
	
echo 0;

}else{

if (mysqli_query($conexion,"INSERT INTO `tienda_productos` (`id_producto`, `nombre`, `descripcion`,`caracteristicas`, `existencia`, `precio`, `id_categoria`,`cant_min_stock`, `img_1`, `img_2`, `img_3`, `img_4`, `img_5`, `status`,`destacado` ,`fec_crea`) VALUES (NULL, '$nombre', '$descripcion', '$caract','$exists', '$costo', '$categoria','$cant_min', NULL, NULL, NULL, NULL, NULL, 1,0,NOW());")) {
	
	echo 1;
}else{

	echo 2;
}

}

 ?>