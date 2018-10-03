<?php include '../conexion.php'; ?>


<div class="well well-small">
			<div class="alert alert-info" style="text-align: center;">
			<h4>Verificacion de la Compra<i class="fa fa-shopping-cart"></i></h4></div>
			<div class="modal-body" style="text-align: center;">
			<form class="form-horizontal loginFrm">
			  <div class="control-group">
			  <label><strong>Ingrese el numero de Orden de la Compra</strong></label>								
				<input class="span6" type="text" id="nro_orden" placeholder="Numero de Orden">
			  </div>
			</form>		
			<button class="btn btn-success btn-lg" onclick="busc_nro()">Buscar Compra</button>
		  </div>
			
</div>

<div class="well well-small">
			<div class="alert alert-info" style="text-align: center;">
			      <h4>Detalles de la Compra <i class="fa fa-shopping-cart"></i></h4>
		    </div>
            <div class="table-responsive" id="contenido">
           	
            </div>


</div>
           
			

