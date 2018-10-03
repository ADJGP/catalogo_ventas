<?php 

include '../conexion.php';
session_start();

$nro_ord=$_POST['nro_ord'];

$act=$conexion->query("UPDATE `tienda_compras` SET `status`='2',`fec_apro_compra`=NOW(),`user_apro`='$_SESSION[id_usr]' WHERE (`nro_orden`='$nro_ord')");


//busco los productos que pertenecen a la compra
$b_productos=$conexion->query("SELECT * FROM tienda_compras_productos WHERE nro_orden='$nro_ord'");

while ($m_productos=$b_productos->fetch_array()) {

	$pro_com=$conexion->query("SELECT * FROM tienda_productos WHERE id_producto='$m_productos[id_producto]'");
	$v_pro_com=$pro_com->fetch_array();

	$exi=$v_pro_com['existencia']+$m_productos['cantidad'];

	$susti=$conexion->query("UPDATE `tienda_productos` SET `existencia`='$exi' WHERE (`id_producto`='$m_productos[id_producto]')");

}

echo 1;
 ?>