<!DOCTYPE html>
<?php
// include database configuration file
include 'Configuracion.php';

// initializ shopping cart class
include 'La-carta.php';
$cart = new Cart;

// redirect to home if cart is empty
if($cart->total_items() <= 0){
    header("Location: catalogo.php");
}



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
     <style type="text/css">
       #recuadro{
        display: block;
padding: 4px;
margin-bottom: 20px;
line-height: 1.42857143;
background-color: #fff;
border: 1px solid #ddd;
border-radius: 4px;
-webkit-transition: border .2s ease-in-out;
-o-transition: border .2s ease-in-out;
transition: border .2s ease-in-out;
       }
     </style>

</head>
<body>

     <!-- PRE LOADER -->
     <section class="preloader">
          <div class="spinner">

               <span class="spinner-rotate"></span>
               
          </div>
     </section>


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
                        
                          <a href="cart.php" class="section-btn"><i class="fa fa-shopping-cart"></i> Carrito de Compras</a>
                    </ul>
               </div>

          </div>
     </section>


   <section id="home" class="slider" data-stellar-background-ratio="0.5">
       
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

         
     </section>

     <section id="team" data-stellar-background-ratio="0.5" >
          <div class="container">
               <div class="row" >
                <div>


                       <div class="col-md-12 col-sm-12">
                         <div class="section-title wow fadeInUp" data-wow-delay="0.1s">
                              <h3>CONFIRMACIÓN DE COMPRA</h3>
                              <span class="title-divider"></span>
                        
                         </div>
                         <div>
                          <div class="col-md-12 col-sm-12">
                         <div class="section-title wow fadeInUp" data-wow-delay="0.1s">
                              <h5><i class='fa fa-user'></i> Información del Cliente</h5>
                              <span class="title-divider"></span>   


                         </div>
                       </div>
                          </div>
                           <div class="col-md-12 col-sm-12" id="recuadro" >
                          <form id="contact-form">
                           <div class="col-md-2">
                                   <label for="usr">Cédula de Identidad:</label>
                                          <div class="form-group input-group" id="ced">
                                               <span class="input-group-addon"><i class="fa fa-pencil"></i></span>
              
                                              <input type="text" class="form-control" name="cedula" id='cedula' onkeypress="return SoloNum(event)">
        
                                        </div>
                            </div>
                            
                            <div class="col-md-6">
                                   <label for="usr">Nombre Y Apellido:</label>
                                          <div class="form-group input-group" id="name">
                                               <span class="input-group-addon"><i class="fa fa-pencil"></i></span>
              
                                              <input type="text" class="form-control text-uppercase" name="nombres" id='nombres' >
        
                                        </div>
                            </div>

                             <div class="col-md-4">
                                   <label for="usr">Teléfono :</label>
                                          <div class="form-group input-group" id="phone">
                                               <span class="input-group-addon"><i class="fa fa-phone"></i></span>
              
                                  <input type="text" class="form-control text-uppercase" name="celular" id='celular' onkeypress="return SoloNum(event)" onchange="phone()" >
        
                                        </div>
                            </div>

                            <div class="col-md-12">
                                   <label for="usr">Correo Electrónico:</label>
                                          <div class="form-group input-group " id="mail">
                                               <span class="input-group-addon">@</span>
              
                                         <input type="email" class="form-control text-uppercase " name="email" id='email' onchange="emailV()">
        
                                        </div>
                            </div>
                              <!--
                             <div class="col-md-6">
                                   <label for="usr">Confirmación de Correo:</label>
                                          <div class="form-group input-group">
                                               <span class="input-group-addon">@</span>
              
                                  <input type="emaiil" class="form-control text-uppercase" name="email1" id='email1' >
        
                                        </div>
                            </div>-->
                             <div class="col-md-12">
                                   <label for="usr">Dirección de Habitación:</label>
                                          <div class="form-group input-group" id="dir">
                                               <span class="input-group-addon"><i class="fa fa-home"></i></span>
              
                                              <textarea class="form-control text-uppercase" placeholder="Domicilio Fiscal del cliente"  name="dir_fis" id="dir_fis"></textarea>
        
                                        </div>
                            </div>
  
</form> 
</div>
                       </div>

                         <div class="col-md-12 col-sm-12">
                         <div class="section-title wow fadeInUp" data-wow-delay="0.1s">
                              <h5><i class='fa fa-check-circle'></i> Información de La Compra</h5>
                              <span class="title-divider"></span>   


                         </div>
                       </div>
                          </div> 
                         <div class="col-md-12 col-sm-12" id="recuadro" >

                        <div class="table-responsive">
                        <table class="table  table-bordered ">
                          <thead style="background: #5f3737;color: #ffffff;">
                            <tr>
                              <td><b>#<b></td>
                            
                              <td><b>Producto:</b></td>
                              <td><b>Precio:</b></td>
                              <td><b>Cantidad:</b></td>
                              <td><b>Sub-Total:</b></td>                            

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
           
            <td><?php echo $item["name"]; ?></td>
            <td><?php echo $v_money['signo'].' :'.$item["price"]; ?></td>
            <td>
              <center>
               <?php echo $item["qty"]; ?> 
                </center>
            </td>
            <td><?php echo $v_money['signo'].' :'.$item["subtotal"];?></td>
           
        </tr>
        <?php } }else{ ?>
        <tr><td colspan="5"><p>Usted No Posee Productos</p></td></tr>
        <?php } ?>
 
                          </tbody>

                         <tfoot>
       
            <td></td>
            <td></td>
            <td></td>
            
            <?php if($cart->total_items() > 0){ ?>
            <td class="text-center"><strong>Total:</strong></td>
            <td class="text-center"><strong><?php echo $v_money['signo'].' :'.$cart->total(); ?></strong></td>
          
           
            <?php } ?>
        </tr>
    </tfoot>
                          
                        </table>
                      </div>
                    </div>

                        <center>
                          <a href="index.php" class="btn btn-default"><i class="fa fa-chevron-left"></i> Ver Catalogo</a>
                           <a href="cart.php" class="btn btn-default"><i class="fa fa-shopping-cart"></i> Ver Carrito</a>
                         <button class="btn btn-primary orderBtn" id='BtnD'  onclick="v_form()">Realizar pedido <i class="fa fa-check-circle"></i></button>
                        </center>
                      </div>
                        
                       </div>


         </div>
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
      <script src="success_comp.js"></script>
     <script src="js/wow.min.js"></script>
     <script src="js/owl.carousel.min.js"></script>
     <script src="js/jquery.magnific-popup.min.js"></script>
     <script src="js/smoothscroll.js"></script>
     <script src="js/custom.js"></script>
     <!-- sweetalert--> 
  <script src="catalogo/js/sweetalert/sweetalert.min.js"></script>

    
</body>
</html>