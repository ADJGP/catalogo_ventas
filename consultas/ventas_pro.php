<?php include '../conexion.php';
//Configuracion para moneda activa en la tienda
$money=$conexion->query("SELECT * FROM tienda_monedas WHERE status=1");
$v_money=$money->fetch_array();

$b_producto=$conexion->query("SELECT * FROM tienda_productos WHERE id_producto='$_POST[id]'");

$v_producto=$b_producto->fetch_array();

?>

<table>
	<tr>
	<td><strong><?php echo $v_producto['nombre']; ?></strong></td><td rowspan="4"><img src="<?php echo $v_producto['img_1']; ?>" width='20%'></td><th>Total de Ventas:</th>	
	</tr>
	<tr>
		<td><?php echo $v_producto['descripcion']; ?></td>

		<td rowspan="3" style="text-align: center;">
        <?php 
            
            $vts=$conexion->query("SELECT SUM(cantidad) AS total FROM tienda_compras_productos WHERE id_producto='$_POST[id]' AND status=1");

            $t_vts=$vts->fetch_array();

         ?>

         <h1><?php echo $t_vts['total']; ?></h1><br>
         <button class="btn btn-primary" onclick="detalles_ventas(<?php echo $v_producto['id_producto']; ?>)">Detalles</button>
		</td>
	</tr>
	<tr>
		<td><strong>Disponibilidad: <?php echo $v_producto['existencia']; ?></strong></td>
	</tr>
	<tr>
		<td><strong>Costo: <?php echo $v_producto['precio'].' '.$v_money['signo'];; ?></strong></td>
	</tr>



</table>