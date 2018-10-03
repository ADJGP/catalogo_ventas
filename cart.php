<!DOCTYPE html>
<?php

include('La-carta.php');
$cart = new Cart;

?>
<html lang="en">
<head>

     <title>SurtiMart</title>
     <link rel="shortcut icon" href="images/Surtimart.jpg" type="image/x-icon" />

     <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=Edge">
     <meta name="description" content="">
     <meta name="keywords" content="">
     <meta name="author" content="">
     <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
     <link href="catalogo/themes/css/base.css" rel="stylesheet" media="screen"/>
     <link rel="stylesheet" href="css/bootstrap.min.css">
     <link rel="stylesheet" href="css/font-awesome.min.css">
     <link rel="stylesheet" href="css/animate.css">
     <link rel="stylesheet" href="css/owl.carousel.css">
     <link rel="stylesheet" href="css/owl.theme.default.min.css">
     <link rel="stylesheet" href="css/magnific-popup.css">

     <!-- MAIN CSS -->
     <link rel="stylesheet" href="css/templatemo-style.css">
     <script type="text/javascript" src="funciones.js"></script>

<style>
    .container{padding: 20px;}
    input[type="number"]{width: 50%;}
    </style>
    <script>
    function updateCartItem(obj,id){
        $.get("AccionCarta.php", {action:"updateCartItem", id:id, qty:obj.value}, function(data){
            if(data == 'ok'){
            Updatecar();
            }else{
               swal("Ups!", 'Ha Ocurrido Un Error de Actualización ', "error");
            }
        });
    }

    function Updatecar(){

  $.ajax({url:'table_detalle_car.php'
  ,type:'POST'
  ,data:'HomeCart=8'
  ,success: function(data){ 
  $('#car_compras').html(data);
  }
  ,error: function (xhr, ajaxOptions, thrownError) {
          alert(xhr.responseText);
          alert(thrownError);
  }
  });


    }
    </script>
</head>
<body>

   


     <!-- MENU -->
     <section class="navbar custom-navbar navbar-fixed-top" role="navigation">
          <div class="container">

               <div class="navbar-header">
                    <button class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                         <span class="icon icon-bar"></span>
                         <span class="icon icon-bar"></span>
                         <span class="icon icon-bar"></span>
                    </button>

                    <!-- lOGO TEXT HERE -->
                    <a href="index.html" class="navbar-brand">SurtiMart <span>.</span> <small>Online Market</small></a>
               </div>

               <!-- MENU LINKS -->
               <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-nav-first">
                          <li><a href="index.php" class="smoothScroll"> Home</a></li> 
                         <li><a href="catalogo.php" class="smoothScroll"> Catalogo</a></li>                        
                         
                    </ul>

                    <ul class="nav navbar-nav navbar-right">
                        
                       <a href="cart.php" class="section-btn">
                        <i class="fa fa-shopping-cart"></i> Carrito de Compras </a>
                    </ul>
               </div>

          </div>
     </section>


     <!-- HOME -->
    <section id="home" class="slider" data-stellar-background-ratio="0.5">
          <div class="row">
            <div class="row" id="banner">
            

                  <div class="owl-carousel owl-theme"> 
                   
                        <div class="item item-first">
                         
                              <img src="images/slider-image1.jpg">

                         </div>

                         <div class="item item-second">
                         
                              <img src="images/slider-image2.jpg">

                         </div>

                         <div class="item item-second">
                         
                              <img src="images/slider-image3.jpg">

                         </div>

               
                    </div>
                  </div>

          </div>
     </section>

     <section id="team" data-stellar-background-ratio="0.5">
          <div class="container">
               <div class="row">
                       <div class="col-md-12 col-sm-12">
                         <div class="section-title wow fadeInUp" data-wow-delay="0.1s">
                              <h3>SUMARIO DE PRODUCTOS </h3>
                               <span class="title-divider"></span>
                        
                         </div>
                         <div>
                        <div id="car_compras" >
                          <div class="table-responsive">
                        <table class="table  table-bordered ">
                          <thead style="background: #5f3737;color: #ffffff;">
                            <tr>
                              <td><b>#<b></td>
                             <!-- <td></td>-->
                              <td><b>Producto:</b></td>
                              <td><b>Precio:</b></td>
                              <td><b>Cantidad:</b></td>
                              <td><b>Sub-Total:</b></td>
                              <td></td>

                            </tr>
                          </thead>
                          <tbody>
                          
        <?php
        //include('catalogo/conexion.php');
        include('conexion.php');
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
            <!--<td><center><img  src="catalogo/administracion/<?php echo $item["img"]; ?>" style='width: 20%;;' ><center></td>-->
            <td><?php echo $item["name"]; ?></td>
            <td><?php echo $v_money['signo'].' :'.$item["price"]; ?></td>
            <td>
              <center>
              <input type="number" class="form-control text-center" value="<?php echo $item["qty"]; ?>" style='width: 80px;'  onchange="updateCartItem(this, '<?php echo $item["rowid"]; ?>')" >
                </center>
            </td>
            <td><?php echo $v_money['signo'].' :'.$item["subtotal"];?></td>
            <td>
                <button onclick="borrar('<?php echo $item["rowid"]; ?>')" class="btn btn-danger"><i class="fa fa-trash"></i></button>
            </td>
        </tr>
        <?php } }else{ ?>
        <tr><td colspan="7"><p>Usted No Posee Productos</p></td></tr>
        <?php } ?>
 
                          </tbody>

                         <tfoot>
        <tr>
           <!-- <td></td>-->
            <td></td>
            <td></td>
            <td></td>
            <?php if($cart->total_items() > 0){ ?>
            <td class="text-center"><strong>Total:</strong></td>
            <td class="text-center"><strong><?php echo $v_money['signo'].' :'.$cart->total(); ?></strong></td>
            <td></td>
           
            <?php }else{ ?>

            <td class="text-center"><strong></strong></td>
            <td class="text-center"><strong></strong></td>
            <td></td>

              <?php
              }
              ?>
        </tr>
    </tfoot>
                          
                        </table>
                          
                        </div>
                      </div>

                        <center>
                          <a href="catalogo.php" class="btn btn-default"><i class="fa fa-chevron-left"></i>Ver Catalogo</a>
                          <a href="Process.php" class="btn btn-primary ">Confirmar Compra <i class="fa fa-check-circle"></i></a>
                        </center>
                      </div>
                        
                       </div>
                       <hr>
                       <br>
                       <br>

         </div>
      </div>
    </section>


  

    


     <!-- FOOTER -->
     <footer id="footer" data-stellar-background-ratio="0.5">
          <div class="container">
               <div class="row">

                    <div class="col-md-3 col-sm-8">
                         <div class="footer-info">
                              <div class="section-title">
                                   <h2 class="wow fadeInUp" data-wow-delay="0.2s">SurtiMart</h2>
                              </div>
                              <address class="wow fadeInUp" data-wow-delay="0.4s">
                                   <p> La mejor alternativa de compras online</p>
                              </address>
                         </div>
                    </div>

                    <div class="col-md-3 col-sm-8">
                         <div class="footer-info">
                              <div class="section-title">
                                   <h2 class="wow fadeInUp" data-wow-delay="0.2s">Contactanos</h2>
                              </div>
                              <address class="wow fadeInUp" data-wow-delay="0.4s">
                                   <p>0412 683 34 94</p>
                                   <p><a href="mailto:surtimartonline@gmail.com">surtimartonline@gmail</a></p>
                                   
                              </address>
                         </div>
                    </div>

                    <div class="col-md-4 col-sm-8">
                         <div class="footer-info footer-open-hour">
                              <div class="section-title">
                                   <h2 class="wow fadeInUp" data-wow-delay="0.2s">Horario de Atención</h2>
                              </div>
                              <div class="wow fadeInUp" data-wow-delay="0.4s">
                                   
                                   <div>
                                        <strong>Lunes a Sabado</strong>
                                        <p> 9:00 AM - 6:00 PM</p>
                                   </div>
                                   
                              </div>
                         </div>
                    </div>

                    <div class="col-md-2 col-sm-4">
                         <ul class="wow fadeInUp social-icon" data-wow-delay="0.4s">
                              <li><a href="https://www.facebook.com/SURTIMART/" class="fa fa-facebook-square" attr="facebook icon"></a></li>
                             <!-- <li><a href="#" class="fa fa-twitter"></a></li>-->
                              <li><a href="https://www.instagram.com/surtimart/?hl=es-la" class="fa fa-instagram"></a></li>
                              <!--<li><a href="#" class="fa fa-google"></a></li>-->
                         </ul>

                         <div class="wow fadeInUp copyright-text" data-wow-delay="0.8s"> 
                              <p><br>Copyright &copy; 2018 <br> 
                              
                              <br><br>Diseñado Por: <a rel="nofollow" href="" target="_parent">Encode</a></p>
                         </div>
                    </div>
                    
               </div>
          </div>
     </footer>


     <!-- SCRIPTS -->
     <script src="js/jquery.js"></script>
     <script src="js/bootstrap.min.js"></script>
     <script src="js/jquery.stellar.min.js"></script>
     <script src="js/wow.min.js"></script>
     <script src="js/owl.carousel.min.js"></script>
     <script src="js/jquery.magnific-popup.min.js"></script>
     <script src="js/smoothscroll.js"></script>
     <script src="js/custom.js"></script>
     <script src="catalogo/js/sweetalert/sweetalert.min.js"></script>

</body>
</html>