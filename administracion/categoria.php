<?php include '../conexion.php'; ?>


<div class="well well-small">
			<div class="alert alert-info" style="text-align: center;">
			<h4>Creacion de Categorias <i class="fa fa-tags"></i></h4></div>
			<div class="modal-body" style="text-align: center;">
			<form class="form-horizontal loginFrm">
			  <div class="control-group">								
				<input class="span6" type="text" id="title" placeholder="Titulo de la Categoria" onblur="duplicado()" ">
			  </div>
			  <div class="control-group">
				<textarea class="span6" placeholder="Describa las caracteristicas de la categoria" id="descripcion"></textarea>  
			  </div>
			</form>		
			<button class="btn btn-success" onclick="regis_cate()">Guardar</button>
			<button class="btn btn-danger" data-dismiss="modal" aria-hidden="true" onclick="categoria()">Cancelar</button>
		  </div>
			
</div>

<div class="well well-small">
			<div class="alert alert-info" style="text-align: center;">
			<h4>Listado de Categorias <i class="fa fa-tags"></i></h4></div>

			<table class="table table-bordered display" id="example">
              <thead>
                <tr style="background-color: #424852; color: white; text-align: center;">
                  <th>Nro.</th>
                  <th>Categoria</th>
                  <th>Descripcion</th>
                  <th>Acciones</th>
				</tr>
              </thead>
             <tbody>
                 <?php 

                      $categorias=mysqli_query($conexion,"SELECT * FROM tienda_categoria");
                      $n=0; 


                      while ($m_categorias=mysqli_fetch_array($categorias)) { $n=$n+1;?>

                      	<tr>
                      		<td><?php echo $n; ?></td>
                      		<td><span class="label label-info"><?php echo $m_categorias[1]; ?></span></td>
                      		<td><?php echo $m_categorias[2]; ?></td>
                      		<td> <button class="btn btn-info btn-small" title="Ver Detalles" onclick="detalles_cate('<?php echo $m_categorias[0]; ?>')"><i class="fa fa-eye"></i></button> <button class="btn btn-danger btn-small" title="Eliminar Categoria" onclick="borrar('<?php echo $m_categorias[0]; ?>')"><i class="fa fa-times"></i></button></td>
                      	</tr>

      
                     <?php  }  ?>
			</tbody>
            </table>
		  </div>
			
</div>
<div id="detalles" class="modal hide fade in" tabindex="-1" role="dialog" aria-labelledby="detalles" aria-hidden="false" >
		  <div class="modal-header alert-info">
			<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
			<h5>Detalles de la Categoria</h5>
		  </div>
		  <div class="modal-body" id="conten-deta">
		  </div>
	</div>

