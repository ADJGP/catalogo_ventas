<?php 
include '../conexion.php';

$id=$_POST['id'];

//echo $title;
//echo $descripcion;


$monedas=mysqli_query($conexion,"SELECT * FROM tienda_monedas WHERE id_moneda='$id'");
$m_monedas=mysqli_fetch_array($monedas);

 ?>
<form class="form-horizontal">
  <div class="control-group">
    <label class="control-label" for="inputEmail">Moneda:</label>
    <div class="controls">
      <input type="text" id="moneda" placeholder="Email" value="<?php echo $m_monedas[1]; ?>" disabled>
    </div>
  </div>
  <div class="control-group">
    <label class="control-label" for="inputPassword">Signo:</label>
    <div class="controls">
      <textarea id="sig" disabled><?php echo $m_monedas[2];  ?></textarea>
    </div>
  </div>
  <div class="control-group" >
    <label class="control-label" for="inputPassword">Estado:</label>
    <div class="controls">
      <?php if ($m_monedas[3]==1) { ?>
      <span class="label label-success">Activada</span>
      <?php } ?>
      <?php if ($m_monedas[3]==0) { ?>
      <span class="label label-important">Desactivada</span>
      <?php } ?>
    </div>
  </div>
   <div class="control-group">
    <label class="control-label" for="inputEmail">Fecha de Creacion:</label>
    <div class="controls">
      <input type="text" id="inputEmail" placeholder="Email" value="<?php echo $m_monedas[4]; ?>" disabled>
    </div>
  </div>
   <div class="control-group" style="text-align: center;">
   <button class="btn btn-primary" id="btn_1" onclick="mod_moneda()">Modificar</button><br>
   <button class="btn btn-success btn-small" id="mod_1" onclick="guardar_cambios_mon('<?php echo $m_monedas[0]; ?>')" style="display: none;">Guardar Cambios</button>
  </div>
 </form>


