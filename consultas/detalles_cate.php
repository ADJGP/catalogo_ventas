<?php 
include '../conexion.php';

$id=$_POST['id'];

//echo $title;
//echo $descripcion;


$categories=mysqli_query($conexion,"SELECT * FROM tienda_categoria WHERE id_categoria='$id'");
$m_categories=mysqli_fetch_array($categories);

 ?>
<form class="form-horizontal">
  <div class="control-group">
    <label class="control-label" for="inputEmail">Titulo:</label>
    <div class="controls">
      <input type="text" id="category" placeholder="Email" value="<?php echo $m_categories[1]; ?>" disabled>
    </div>
  </div>
  <div class="control-group">
    <label class="control-label" for="inputPassword">Descripcion:</label>
    <div class="controls">
      <textarea id="descrip" disabled><?php echo $m_categories[2];  ?></textarea>
    </div>
  </div>
  <div class="control-group">
    <label class="control-label" for="inputPassword">Estado:</label>
    <div class="controls">
      <?php if ($m_categories[3]==1) { ?>
      <span class="label label-success">Activada</span>
      <?php } ?>
      <?php if ($m_categories[3]==2) { ?>
      <span class="label label-important">Desactivada</span>
      <?php } ?>
    </div>
  </div>
   <div class="control-group">
    <label class="control-label" for="inputEmail">Fecha de Creacion:</label>
    <div class="controls">
      <input type="text" id="inputEmail" placeholder="Email" value="<?php echo $m_categories[4]; ?>" disabled>
    </div>
  </div>
  <div class="control-group" style="text-align: center;">
   <button class="btn btn-primary" id="btn_1" onclick="mod_cate()">Modificar</button><br>
   <button class="btn btn-success btn-small" id="mod_1" onclick="guardar_cambios_cate('<?php echo $m_categories[0]; ?>')" style="display: none;">Guardar Cambios</button>
  </div>
 </form>
