<?php include '../conexion.php';

$d_ventas=$conexion->query("SELECT * FROM tienda_compras AS c INNER JOIN tienda_compras_productos AS cp ON c.nro_orden=cp.nro_orden WHERE id_producto='$_POST[id]' AND c.status=1");

?>



<table class="table">
	<thead>
		<th>NRO. ORDEN</th><th>FECHA</th>
	</thead>
	<tbody>
		   
		   <?php while ($v_ventas=$d_ventas->fetch_array()) { ?>

		<tr><td><a href="#" onclick="nro_orden('<?php echo $v_ventas['nro_orden']; ?>')"><?php echo $v_ventas['nro_orden']; ?></td><td><?php echo $v_ventas['fec_compra']; ?></a></td></tr>

		   <?php } ?>



	</tbody>
</table>