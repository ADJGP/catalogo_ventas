<?php 
include '../conexion.php';

$id=$_POST['id'];

$b_pro=$conexion->query("SELECT * FROM `tienda_productos`  WHERE `tienda_productos`.`id_producto` = '$id'");
$i_pro=$b_pro->fetch_array();

if ($i_pro['img_1']!=NULL) {
$ruta="../administracion/".$i_pro['img_1'];
unlink($ruta);
}
if ($i_pro['img_2']!=NULL) {
$ruta1="../administracion/".$i_pro['img_2'];
unlink($ruta1);
}
if ($i_pro['img_3']!=NULL) {
$ruta2="../administracion/".$i_pro['img_3'];
unlink($ruta2);
}
if ($i_pro['img_4']!=NULL) {
$ruta3="../administracion/".$i_pro['img_4'];
unlink($ruta3);
}
if ($i_pro['img_5']!=NULL) {
$ruta4="../administracion/".$i_pro['img_5'];
unlink($ruta4);
}

$categorias=mysqli_query($conexion,"DELETE FROM `tienda_productos` WHERE `tienda_productos`.`id_producto` = '$id'");

echo 1;

?>