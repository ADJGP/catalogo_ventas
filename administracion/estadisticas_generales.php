<?php include '../conexion.php'; ?>


<div class="well well-small">
			<div class="alert alert-info" style="text-align: center;">
			<h4>Estadisticas de Ventas <i class="fa fa-shopping-bag"></i></h4></div>
			<div class="modal-body" style="text-align: center;">
			<form class="form-horizontal loginFrm">
			  <div class="control-group">
			  <label><strong>Productos Activos en la Tienda</strong></label>

                <?php 
                $products=$conexion->query("SELECT * FROM tienda_productos WHERE status=1");
                ?>


				<select id="producto">
					<optgroup>

						<?php while ($v_products=$products->fetch_array()) { ?> 

                        <option value="<?php echo $v_products['id_producto']; ?>"><?php echo $v_products['nombre']; ?></option>

                       <?php } ?>
						
					</optgroup>
				</select>
			  </div>
			</form>		
			<button class="btn btn-success btn-lg" onclick="pro_ven()">Buscar Producto</button>
		  </div>
			
</div>
<div class="well well-small">
			<div class="alert alert-info" style="text-align: center;">
			<h4>Estadisticas del Producto <i class="fa fa-shopping-bag"></i></h4></div>

		<div class="modal-body">
			<button class="btn btn-default" style="display: none;" id="volver" onclick="pro_ven()">< Volver</button>
			<div class="table table-responsive" id="pro">
				

			</div>
		</div>
			
</div>
	<div id="detalles" class="modal hide fade in col-lg-6" tabindex="-1" role="dialog" aria-labelledby="detalles" aria-hidden="false" >
		  <div class="modal-header alert-info">
			<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
			<h5>Detalles de Ventas <i class="fa fa-shopping-bag"></i></h5>
		  </div>
		  <div class="modal-body" id="conten-deta">
		  </div>
	</div>