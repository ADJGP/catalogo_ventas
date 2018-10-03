
<?php
// initializ shopping cart class
include 'La-carta.php';
$cart = new Cart;
?>
<div class="table-responsive">
<table class="table table-hover table-bordered ">
                          <thead style="background: #5f3737;color: #ffffff;">
                            <tr>
                              <td><b>#<b></td>
                              <!--<td></td>-->
                              <td><b>Producto:</b></td>
                              <td><b>Precio:</b></td>
                              <td><b>Cantidad:</b></td>
                              <td><b>Sub-Total:</b></td>
                              <td></td>

                            </tr>
                          </thead>
                          <tbody>
                          
        <?php
         include('catalogo/conexion.php');
         $money=$conexion->query("SELECT * FROM tienda_monedas WHERE status=1");
         $v_money=$money->fetch_array();
        if($cart->total_items() > 0){
            //get cart items from session
            $cartItems = $cart->contents();
            $cont=0;
            foreach($cartItems as $item){
            $cont=$cont+1;
        ?>
        <tr>
            <td><?php echo $cont; ?></td>
            <!--<td><center><img class='thumbnail' src="catalogo/administracion/<?php echo $item["img"]; ?>" style='width: 20%; height: 20%;' ><center></td>-->
            <td><?php echo $item["name"]; ?></td>
            <td><?php echo  $v_money['signo'].' :'.$item["price"]; ?></td>
            <td>
              <center>
              <input type="number" class="form-control text-center" value="<?php echo $item["qty"]; ?>" style='width: 80px;'  onchange="updateCartItem(this, '<?php echo $item["rowid"]; ?>')" >
                </center>
            </td>
            <td><?php echo $v_money['signo'].' :'.$item["subtotal"]; ?></td>
            <td>
                <a href="AccionCarta.php?action=removeCartItem&id=<?php echo $item["rowid"]; ?>" class="btn btn-danger" onclick="return confirm('Confirma eliminar?')"><i class="fa fa-trash"></i></a>
            </td>
        </tr>
        <?php } }else{ ?>
        <tr><td colspan="5"><p>Usted No Posee Productos</p></td>
        <?php } ?>
 
                          </tbody>

                         <tfoot>
        <tr>
           <!-- <td></td>-->
            <td colspan="2"></td>
            <?php if($cart->total_items() > 0){ ?>
            <td></td>
           <td></td>
            <td class="text-center"><strong>Total <?php echo $v_money['signo'].' :'.$cart->total(); ?></strong></td>
           
            <td></td>
            <?php } ?>
        </tr>
    </tfoot>
                          
                        </table>
                      </div>