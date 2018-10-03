<?php

// Iniciamos la clase de la carta
include 'La-carta.php';
$cart = new Cart;
include 'Configuracion.php';
//$output = new stdClass();

 $jsondata = array();

if(isset($_REQUEST['action']) && !empty($_REQUEST['action'])){
    if($_REQUEST['action'] == 'addToCart' && !empty($_REQUEST['id'])){
        $productID = $_REQUEST['id'];
        // get product details
        $query = $db->query("SELECT * FROM tienda_productos where id_producto= ".$productID);
        $row = $query->fetch_assoc();
        $itemData = array(
            'id' => $row['id_producto'],
            'name' => $row['nombre'],
            'price' => $row['precio'],
            'qty' => 1,
            'img' => $row['img_1']
        );
        
        $insertItem = $cart->insert($itemData);
        $redirectLoc = $insertItem?'cart.php':'index.php';
      header("Location: ".$redirectLoc);
    }elseif($_REQUEST['action'] == 'updateCartItem' && !empty($_REQUEST['id'])){
        $itemData = array(
            'rowid' => $_REQUEST['id'],
            'qty' => $_REQUEST['qty']
        );
        $updateItem = $cart->update($itemData);
        echo $updateItem?'ok':'err';die;
    }elseif($_REQUEST['action'] == 'removeCartItem' && !empty($_REQUEST['id'])){
        $deleteItem = $cart->remove($_REQUEST['id']);
        header("Location: cart.php");
    }elseif($_REQUEST['action'] == 'placeOrder' && $cart->total_items() > 0  && !empty($_POST['cedula']) && !empty($_POST['nombres']) && !empty($_POST['email']) && !empty($_POST['dir_fis']) && !empty($_POST['celular'])){
        // insertan la orden
        //$insertOrder = $db->query("INSERT INTO orden (customer_id, total_price, created, modified) VALUES ('".$_SESSION['sessCustomerID']."', '".$cart->total()."', '".date("Y-m-d H:i:s")."', '".date("Y-m-d H:i:s")."')");
         $maxs=mysqli_query($db,"SELECT max(nro_orden) from tienda_compras");
         $idR = mysqli_fetch_array($maxs);
         $Max=$idR['0']+1;
       $insertOrder = $db->query("INSERT INTO `tienda_compras` (`nro_orden`, `status`, `ced`, `cliente_nombre`, `cliente_telefono`, `cliente_correo`, `cliente_ubicacion`, `fec_compra`, `ip_compra`) VALUES ('".$Max."', '0', '".$_POST['cedula']."', '".$_POST['nombres']."','".$_POST['celular']."','".$_POST['email']."','".$_POST['dir_fis']."',now(),'".$_SERVER['REMOTE_ADDR']."')");

        
        if($insertOrder){
            $orderID = $db->insert_id;
            $sql = '';
            // get cart items
            $cartItems = $cart->contents();
            foreach($cartItems as $item){
                //insertas la cantidad de Marticulos Por Orden
            //actualizo 
            $trae_existencia=mysqli_query($db,"SELECT `existencia` FROM `tienda_productos` WHERE `id_producto`='".$item['id']."'");
            $rowEx=mysqli_fetch_array($trae_existencia);
            $new_cant=$rowEx['existencia']-$item['qty'];
            //
              $sql .= "INSERT INTO `tienda_compras_productos` (`id_producto`, `nro_orden`, `cantidad`, `costo`, `status`, `fec_compra`) VALUES ('".$item['id']."','".$Max."', '".$item['qty']."', '".$item['price']."','0',now());";

              
              $sql.="UPDATE `tienda_productos` SET `existencia` = '".$new_cant."' WHERE `tienda_productos`.`id_producto` = '".$item['id']."';";
                   

            }
            // insert order items into database
            $insertOrderItems = $db->multi_query($sql);
            
            if($insertOrderItems){
                $cart->destroy();
                //header("Location: OrdenExito.php?id=$orderID");
               
             /* $output->success = true;
               $output->mensaje = "Su Orden de Compra Ha Sido Creada de Manera Satisfactoria Bajo El Nro:".$Max;
             $output->codg = $Max;

               
               echo json_encode($output);*/
          $mensaje = "Su Orden de Compra Ha Sido Creada de Manera Satisfactoria Bajo El Nro De Orden:".$Max;    
            echo "Exito!!@@@".$mensaje."@@@success@@@".$Max;
          ///aqui envio el email al cliente ;
               $concepto_mensaje='Sr(a)'.strtoupper($_POST['nombres']). ' Le Informamos que Su compra Fue Procesada De Manera Satisfactoria Ingrese En El Siguiente Enlace Para Obtener Su Comprobante de Compra: www.surtimart.com.ve/voucher.php?cdg='.$Max;
                 $to = $_POST['email'];
                 $subject = "Notificación de Compra.";
                $message = $concepto_mensaje;
                //envio de correo 
                mail($to, $subject, $message);




            }else{
              
              /*  $output->success = false;
                $output->error = "Disculpe Los Articulos los se pudieron Registrar'";
                echo json_encode($output);*/
           $mensaje = "Disculpe Los Articulos los se pudieron Registrar'";    
          echo "Alerta!!@@@".$mensaje."@@@error";

            }
        }else{
       /*
             $output->success = false;
             $output->error = "La Orden No Pudo Ser Creada Por Favor Intente Nuevamente'";

             echo json_encode($output);
             */
            $mensaje = "La Orden No Pudo Ser Creada Por Favor Intente Nuevamente";    
          echo "Alerta!!@@@".$mensaje."@@@error";
        }
    }else{
        //header("Location: index.php");
      

     
          $mensaje = "La Información Suministrada Es Invalida Por Favor Completar Toda La Información de La Compra";    
          echo "Alerta!!@@@".$mensaje."@@@error";


    }
}else{
    header("Location: index.php");
}