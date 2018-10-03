<?php include '../conexion.php'; ?>

<div class="well well-small">
			<div class="alert alert-info" style="text-align: center;">
			<h4>Listado de Productos <i class="fa fa-boxes"></i></h4></div>

			<table class="table table-bordered">
              <thead>
                <tr style="background-color: #424852; color: white; text-align: center;">
                  <th>Nro.</th>
                  <th>Categoria</th>
                  <th>Descripcion</th>
                  <th>Estado</th>
                  <th>Destacado</th>
                  <th>Acciones</th>
				</tr>
              </thead>
             <tbody>
                 <?php 

                      $productos=mysqli_query($conexion,"SELECT * FROM tienda_productos WHERE status=0");
                      $n=0; 


                      while ($m_productos=mysqli_fetch_array($productos)) { $n=$n+1;?>

                      	<tr>
                      		<td><?php echo $n; ?></td>
                      		<td><?php echo $m_productos[1]; ?></td>
                          <td><?php $caracteres=15;
                          
                          echo substr($m_productos[2], 0, $caracteres).'...';

                          ?></td>
                            <td><?php if ($m_productos[12]==1) { ?>
                            <span class="label label-success">Activado</span>
                            <?php } ?>
                            <?php if ($m_productos[12]==0) { ?>
                            <span class="label label-important">Desactivado</span>
                            <?php } ?></td>
                          <td style="text-align: center;"><?php if ($m_productos[13]==1) { ?>
                            <i class="fa fa-star"></i>
                            <?php } ?>
                            <?php if ($m_productos[13]==0) { ?>
                            <?php echo $var=' '; ?>
                            <?php } ?></td>
                  
                      		<td><button class="btn btn-success btn-small" title="Activar" onclick="activar('<?php echo $m_productos[0]; ?>')"><i class="fa fa-exchange-alt"></i></button> <button class="btn btn-info btn-small" title="Ver Detalles" onclick="detalles_pro('<?php echo $m_productos[0]; ?>')"><i class="fa fa-eye"></i></button> <button class="btn btn-danger btn-small" title="Eliminar Producto" onclick="borrar_pro('<?php echo $m_productos[0]; ?>')"><i class="fa fa-times"></i></button></td>
                      	</tr>

      
                     <?php  }  ?>
			</tbody>
            </table>
		  </div>
	<div id="detalles" class="modal hide fade in col-lg-6" tabindex="-1" role="dialog" aria-labelledby="detalles" aria-hidden="false" >
		  <div class="modal-header alert-info">
			<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
			<h5>Detalles del Producto</h5>
		  </div>
		  <div class="modal-body" id="conten-deta">
		  </div>
	</div>