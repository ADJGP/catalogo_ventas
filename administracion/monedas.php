<?php include '../conexion.php'; 

//Configuracion para moneda activa en la tienda
$money=$conexion->query("SELECT * FROM tienda_monedas WHERE status=1");
$count=$money->num_rows;


?>


<div class="well well-small">
			<div class="alert alert-info" style="text-align: center;">
			<h4>Creacion de Monedas <i class="fa fa-money-bill-alt"></i></h4></div>
			<div class="modal-body" style="text-align: center;">
			<form class="form-horizontal loginFrm">
			  <div class="control-group">								
				<input class="span6" type="text" id="nom" placeholder="Nombre de la Moneda">
			  </div>
			  <div class="control-group">								
				<input class="span6" type="text" id="signo" placeholder="Signo de la Moneda. Ej:(USD,MXN).">
			  </div>
			</form>		
			<button class="btn btn-success" onclick="crea_moneda()">Guardar</button>
			<button class="btn btn-danger" data-dismiss="modal" aria-hidden="true" onclick="monedas()">Cancelar</button>
		  </div>
			
</div>

<div class="well well-small">
			<div class="alert alert-info" style="text-align: center;">
			<h4>Listado de Monedas <i class="fa fa-money-bill-alt"></i></h4></div>

			<?php if ($count==0): ?>

				<div class="alert alert-danger">Todas las monedas estas <span class="badge badge-danger">Desactivadas</span>,coloque una moneda en estado <span class="badge badge-success">Activo</span>.</div>

			<?php endif ?>

			

			<table class="table table-bordered">
              <thead>
                <tr style="background-color: #424852; color: white; text-align: center;">
                  <th>Nro.</th>
                  <th>Moneda</th>
                  <th>Signo</th>
                  <th>Estado</th>
                  <th>Acciones</th>
				</tr>
              </thead>
             <tbody>
                 <?php 

                      $monedas=mysqli_query($conexion,"SELECT * FROM tienda_monedas");
                      $n=0; 


                      while ($m_monedas=mysqli_fetch_array($monedas)) { $n=$n+1;?>

                      	<tr>
                      		<td><?php echo $n; ?></td>
                      		<td><span class="label label-info"><?php echo $m_monedas[1]; ?></span></td>
                      		<td><?php echo $m_monedas[2]; ?></td>
                      		<td><?php if ($m_monedas[3]==1) { ?>
                            <span class="label label-success">Activada</span>
                            <?php } ?>
                            <?php if ($m_monedas[3]==0) { ?>
                            <span class="label label-important">Desactivada</span>
                            <?php } ?></td>
                      		<td style="text-align: center;"><button class="btn btn-warning btn-small" title="Cambiar Estado" onclick="cambiar_estado('<?php echo $m_monedas[0]; ?>')"><i class="fa fa-exchange-alt"></i></button> <button class="btn btn-info btn-small" title="Ver Detalles" onclick="detalles_moneda('<?php echo $m_monedas[0]; ?>')"><i class="fa fa-eye"></i></button> <button class="btn btn-danger btn-small" title="Eliminar Categoria" onclick="borrar_moneda('<?php echo $m_monedas[0]; ?>')"><i class="fa fa-times"></i></button></td>
                      	</tr>

      
                     <?php  }  ?>
			</tbody>
            </table>
		  </div>
			
</div>
<div id="detalles" class="modal hide fade in" tabindex="-1" role="dialog" aria-labelledby="detalles" aria-hidden="false" >
		  <div class="modal-header alert-info">
			<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
			<h5>Detalles de la Moneda</h5>
		  </div>
		  <div class="modal-body" id="conten-deta">
		  </div>
</div>

