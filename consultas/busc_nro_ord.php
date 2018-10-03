<?php 

include '../conexion.php';

//Configuracion para moneda activa en la tienda
$money=$conexion->query("SELECT * FROM tienda_monedas WHERE status=1");
$v_money=$money->fetch_array();

//echo $_POST['nro_ord'];

$busc_compra=$conexion->query("SELECT * FROM tienda_compras WHERE nro_orden='$_POST[nro_ord]'");

$count=$busc_compra->num_rows;

$compra=$busc_compra->fetch_array();
?>

<?php if ($count>=1): ?>

<?php if ($compra['status']==1): ?>

<div class="alert alert-success"><h4>Compra Aprobada <i class="fa fa-check"></i></h4><small><?php 
   
    $ver=$conexion->query("SELECT * FROM administradores WHERE id_admin='$compra[user_apro]'");
    $user_ap=$ver->fetch_array();

    echo $compra['fec_apro_compra'].' Responsable:'.$user_ap['nombre'].' '.$user_ap['apellido'];
 ?></small>
</div>
	
<?php endif ?>
<?php if ($compra['status']==2): ?>

<div class="alert alert-danger"><h4>Compra Cancelada <i class="fa fa-danger"></i></h4><small><?php 
   
    $ver=$conexion->query("SELECT * FROM administradores WHERE id_admin='$compra[user_apro]'");
    $user_ap=$ver->fetch_array();

    echo $compra['fec_apro_compra'].' Responsable:'.$user_ap['nombre'].' '.$user_ap['apellido'];
 ?></small></div>
	
<?php endif ?>








	<table class="table table-hover" >
              <thead>
                <tr style="background-color: #424852; color: white; text-align: center;">
                  <th>Numero de Orden</th>
                  <th>Cedula</th>
                  <th>Cliente</th>
                  <th>Telefono</th>
                  <th>Correo</th>
                  <th>Ubicacion</th>
				</tr>
              </thead>
                     <tbody>
                           <tr>
                	          <td><?php echo $compra[2]; ?></td>
                	          <td><?php echo $compra[4]; ?></td>
                	          <td><?php echo $compra[5]; ?></td>
                	          <td><?php echo $compra[6]; ?></td>
                	          <td><?php echo $compra[7]; ?></td>
                	          <td><?php echo $compra[8]; ?></td>
                           </tr>
			         </tbody>
  </table>
  <?php 

   $busc_productos=$conexion->query("SELECT * FROM tienda_compras_productos WHERE nro_orden='$compra[2]'");

   ?>

   	<table class="table table-hover" >
   		             <thead>
                <tr style="background-color: #424852; color: white; text-align: center;">
                  <th>#</th>
                  <th>Producto</th>
                  <th style="text-align: center;">Cantidad</th>
                  <th style="text-align: center;">Costo</th>
                  <th style="text-align: center;">Total</th>
				</tr>
              </thead>
           
                     <tbody>
                           <?php 

                           //contamos
                           $i=0;

                           //Obtenemos los productos que pertenecen a la compra
                           while ($productos=$busc_productos->fetch_array()) { $i=$i+1; ?>

                           	<tr class="success">
                           		<?php 
                                
                                //Identificamos al producto
                           		$v_producto=$conexion->query("SELECT * FROM tienda_productos WHERE id_producto='$productos[id_producto]'");

                           		$d_producto=$v_producto->fetch_array(); 

                           		?>

                                <td><?php echo $i; ?></td>
                           		<td><?php echo $d_producto[1]; ?></td>
                           		<td style="text-align: center;"><?php echo $productos[3]; ?></td>
                           		<td style="text-align: center;"><?php echo number_format($productos[4],2,',','.').' '.$v_money['signo'];  ?></td>

                              <td style="text-align: center;"><?php $t=$productos[3]*$productos[4]; echo number_format($t,2,',','.').' '.$v_money['signo']; $costos[$i]=$t;?></td>
                           	</tr>
                           	
                          <?php } ?>
                          <tr>
                          	<th colspan="4" style="text-align: right; background-color: #424852; color: white;">Monto a Pagar:</th><td style="background-color: lightyellow; text-align: center;"><?php echo number_format(array_sum($costos),2,',','.').' '.$v_money['signo'];

                          	 ?></td>
                          </tr>

			         </tbody>
			         <?php if ($compra['status']<1): ?>

                      <tfoot>
			         	<tr><td colspan="5" style="text-align: center;"><button class="btn btn-primary" onclick="aprobar_compra('<?php echo $compra[2]; ?>')">Aprobar Compra</button> <button class="btn btn-danger" onclick="cancelar_compra('<?php echo $compra[2]; ?>')"> Cancelar Compra</button></td></tr>
			         </tfoot>
	
<?php endif ?>
			         
  </table>
  
<?php endif ?>
<?php if ($count<1): ?>
<div class="alert alert-danger"><h5><i class="fa fa-file-excel"></i> Disculpa, no hay registro con ese nro de orden en el sistema, verifica si estas ingresando los datos correctamente.</h5></div>	
<?php endif ?>


