<?php
if(!$_POST){header('Location:catalogo.php');}
include('catalogo/conexion.php');

   $cli=mysqli_query($conexion,"SELECT
tienda_compras.ced,
tienda_compras.cliente_nombre,
tienda_compras.cliente_telefono,
tienda_compras.cliente_correo,
tienda_compras.cliente_ubicacion,
DATE_FORMAT(tienda_compras.fec_compra,'%d/%m/%y %h:%m:%s') as fecha,
tienda_compras.ip_compra
FROM
tienda_compras where nro_orden='".$_POST['cdg']."'");


   $rows=mysqli_fetch_array($cli);
?>
<div class="container">
               <div class="row" >
                
<div class="col-md-12 col-sm-12" id="recuadro">
<div class="table-responsive">
<table class="table bordered ">

	<thead >
		<tr style="background: #5f3737;color: #ffffff;">
			<th colspan="5"><center>Información del Cliente</center></th>
		</tr>
		<tr colspan="5">
			<center><b>ORDEN DE COMPRA NRO: #<?php echo $_POST['cdg'];?></b></center>
			
		</tr>
		<tr>
			<th>Cédula:</th>
			<td colspan="4"><?php echo $rows['ced'];?></td>
		</tr>
		<tr>
			<th>Nombres Y Apellidos:</th>
			<td colspan="4"><?php echo strtoupper($rows['cliente_nombre']);?></td>
		</tr>
		<tr>
			<th>Teléfono:</th>
			<td colspan="4"><?php echo strtoupper($rows['cliente_telefono']);?></td>
		</tr>
		<tr>
			<th>Correo Electrónico:</th>
			<td colspan="4"><?php echo strtoupper($rows['cliente_correo']);?></td>
		</tr>
		<tr>
			<th>Domicilio Fiscal:</th>
			<td colspan="4"><?php echo strtoupper($rows['cliente_ubicacion']);?></td>

		</tr>
	</thead>

	
</table>
</div>

<?php

    $art=mysqli_query($conexion,"SELECT
   tienda_productos.nombre,
   tienda_compras_productos.cantidad,
   tienda_compras_productos.costo
   FROM
   tienda_compras_productos
   INNER JOIN tienda_productos ON tienda_compras_productos.id_producto = tienda_productos.id_producto
    WHERE nro_orden='".$_POST['cdg']."'");

    $money=$conexion->query("SELECT * FROM tienda_monedas WHERE status=1");
         $v_money=$money->fetch_array();
     
?>
<div class="table-responsive">
<table class="table bordered ">

	<thead >
		<tr style="background: #5f3737;color: #ffffff;">
			<th colspan="5"><center>Información de La Compra</center></th>
		</tr>
		<tr>
			<th>#</th>
			<th>Producto</th>
			<th>Cantidad</th>
			<th>Precio</th>
			<th>Sub-Total</th>
		</tr>
		
	</thead>

	<tbody>
		<?php
		 $cont=0;
		 $total=0;
      while($fr=mysqli_fetch_array($art)){
      	$cont=$cont+1;
		?>
		
		<tr>
			<td><?php echo $cont;?></td>
			<td><?php echo $fr['nombre'];?></td>
			<td><?php echo $fr['cantidad'];?></td>
			<td><?php echo $v_money['signo'].':'.number_format($fr['costo'],2,',','.');?></td>
			<td><?php echo $v_money['signo'].':'.number_format($fr['cantidad']* $fr['costo'],2,',','.');?></td>
		</tr>


		<?php 
		$total=$total+($fr['cantidad']* $fr['costo']);
	}
	?>
	</tbody>


	<tfoot>
		<tr>
			<td colspan="4"  style="text-align: right;"><b>Total Compra:</b></td>
			<td><?php echo $v_money['signo'].':'.number_format($total,2,',','.');?></td>
		</tr>
	</tfoot>
	
	
</table>
</div>

<center>
	<a href="catalogo.php" class="btn btn-default"><i class="fa fa-chevron-left"></i> Ver Catalogo</a>
	<a href="voucher.php?cdg=<?php echo $_POST['cdg'];?>" class="btn btn-primary"><i class="fa fa-print"></i> Voucher </a>
</center>
</div>
</div>
</div>