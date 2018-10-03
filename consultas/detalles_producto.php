	<?php include '../conexion.php'; ?>

	<?php $producto=$conexion->query("SELECT * FROM tienda_productos WHERE id_producto=$_POST[id]");
     
     $m_producto=$producto->fetch_array();


	 ?>

  <div class="control-group">
    <label class="control-label" for="inputEmail">Titulo:</label>
    <div class="controls">
      <input type="text" id="titulo" value="<?php echo $m_producto[1]; ?>" disabled>
    </div>
  </div>
  <div class="control-group">
    <label class="control-label" for="inputPassword">Descripcion:</label>
    <div class="controls">
      <textarea id="descrip" disabled><?php echo $m_producto[2];  ?></textarea>
    </div>
  </div>
  <div class="control-group">
    <label class="control-label" for="inputPassword">Mas Caracteristicas:</label>
    <div class="controls">
      <textarea id="caracte" disabled><?php echo $m_producto[3];  ?></textarea>
    </div>
  </div>
  <div class="control-group">
    <label class="control-label" for="inputPassword">Estado:</label>
    <div class="controls">
      <?php if ($m_producto[13]==1) { ?>
      <span class="label label-success">Activado</span>
      <?php } ?>
      <?php if ($m_producto[13]==0) { ?>
      <span class="label label-important">Desactivado</span>
      <?php } ?>
    </div>
  </div>
    <div class="control-group">
    <label class="control-label" for="inputPassword">Cantidad en Stock:</label>
    <div class="controls">
    	<input type="text" id="stock" value="<?php echo $m_producto[4];  ?>" disabled>
    </div>
    <label class="control-label" for="inputPassword">Precio:</label>
    <div class="controls">
      <input type="text" id="precio"  value="<?php echo $m_producto[5];  ?>" disabled>
    </div>
     <?php 
      
      $categori=$conexion->query("SELECT * FROM tienda_categoria WHERE id_categoria=$m_producto[6]");

      $m_categori=$categori->fetch_array();

      ?>


    <div class="controls" id="cat" style="display: block;">
    <label class="control-label" for="inputPassword">Categoria:</label>
     
    <input type="text" value="<?php echo $m_categori['titulo'];  ?>" disabled>

    </div>

    <div class="controls" id="cate" style="display: none;">
    <label class="control-label" for="inputPassword">Categoria:</label>
    <select id="ncat">
      <?php 
      
      $categoris=$conexion->query("SELECT * FROM tienda_categoria WHERE status=1");

      ?>
      <optgroup>
        <?php while ($m_categoris=$categoris->fetch_array()) { ?>

          <option value="<?php echo $m_categoris[0]; ?>"><?php echo $m_categoris[1]; ?></option>

       <?php } ?>
      </optgroup>
    </select>
    </div>
    <label class="control-label" for="inputPassword">Cantidad Minima de Stock:</label>
    <div class="controls">
      <input type="text" id="min"  value="<?php echo $m_producto[7];  ?>" disabled>
    </div>
  </div>
   <div class="control-group">
    <label class="control-label" for="inputEmail">Fecha de Creacion:</label>
    <div class="controls">
      <input type="text" id="inputEmail" value="<?php echo $m_producto[15]; ?>" disabled>
    </div>
  </div>
  <div class="control-group" style="text-align: center;">
   <button class="btn btn-primary" id="btn_1" onclick="mod_pro()">Modificar</button><br>
   <button class="btn btn-success btn-small" id="mod_1" onclick="guardar_cambios_pro('<?php echo $m_producto[0]; ?>')" style="display: none;">Guardar Cambios</button>
  </div>
 