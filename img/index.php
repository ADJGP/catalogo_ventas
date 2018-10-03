<!DOCTYPE html>
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
     <script src="js/sweetalert/sweetalert.min.js"></script>
     <script type="text/javascript" src="funciones.js"></script>

</head>
<body>

     <!-- PRE LOADER 
     <section class="preloader">
          <div class="spinner">

               <span class="spinner-rotate"></span>
               
          </div>
     </section>-->


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
                    <a href="index.php" class="navbar-brand">SurtiMart <span>.</span> <small>Online Market</small></a>
               </div>

               <!-- MENU LINKS -->
               <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-nav-first">
                         <li><a href="#home" class="smoothScroll"> Home</a></li>
                       
                         <li><a href="#team" class="smoothScroll">Destacados</a></li>
                         <li><a href="catalogo.php" class="smoothScroll">Catalogo</a></li>
                         <li><a href="#about" class="smoothScroll">Nosotros</a></li>
                         <li><a href="#contact" class="smoothScroll">Contacto</a></li>
                    </ul>

                     <ul class="nav navbar-nav navbar-right">
                        
                       <a href="cart.php" class="section-btn"><i class="fa fa-shopping-cart"></i> Carrito de Compras</a>
                    </ul>
               </div>

          </div>
     </section>


     <!-- HOME -->
    <section id="home" class="slider" data-stellar-background-ratio="0.5">
          <div class="row">

                    <div class="owl-carousel owl-theme">
                         <div class="item item-first">
                              <div class="caption">
                                   <div class="container">
                                        <!--<div class="col-md-8 col-sm-12">
                                             <h3>Presentamos</h3>
                                             <h1> La mejor alternativa de compras online</h1>
                                             <a href="#about" class="section-btn btn btn-default smoothScroll">Conocenos</a>
                                        </div>-->
                                   </div>
                              </div>
                         </div>

                         <div class="item item-second">
                              <div class="caption">
                                   <div class="container">
                                       <!-- <div class="col-md-8 col-sm-12">
                                             <h3>Con La Mejor</h3>
                                             <h1>Filosofía de Mercado</h1>
                                             <a href="#testimonial" class="section-btn btn btn-default smoothScroll">Ver</a>
                                        </div>-->
                                   </div>
                              </div>
                         </div>

                         <div class="item item-third img-fluid">
                              <div class="caption">
                                   <div class="container">
                                       <!-- <div class="col-md-8 col-sm-12">
                                             <h3></h3>
                                             <h1>Atención las 24 horas del dia</h1>
                                             <a href="#contact" class="section-btn btn btn-default smoothScroll">Contactanos</a>
                                        </div>-->
                                   </div>
                              </div>
                         </div>
                    </div>

          </div>
     </section>

<!--productos destacados-->
     <section id="team" data-stellar-background-ratio="0.5">
          <div class="container">
               <div class="row">
                       <div class="col-md-12 col-sm-12">
                         <?php

                         ?>
                       </div>


                    <div class="col-md-12 col-sm-12">
                         <div class="section-title wow fadeInUp" data-wow-delay="0.1s">
                              <h2>Productos Destacados</h2>
                           <span class="title-divider"></span>
                         </div>
                    </div>
                   <div class="row services">
                         <?php 
                      //include('catalogo/conexion.php');
                      include('conexion.php');

                      $money=$conexion->query("SELECT * FROM tienda_monedas WHERE status=1");
                      $v_money=$money->fetch_array();
                    $productos=mysqli_query($conexion,"SELECT tienda_productos.id_producto,tienda_productos.nombre, tienda_productos.precio,tienda_categoria.descripcion,tienda_productos.img_1, tienda_productos.destacado,tienda_productos.existencia,tienda_productos.fec_crea FROM tienda_productos INNER JOIN tienda_categoria ON tienda_productos.id_categoria = tienda_categoria.id_categoria where tienda_categoria.status=1 and tienda_productos.status=1 and tienda_productos.destacado=1 ORDER by tienda_productos.fec_crea desc Limit 4");

                         while($print=mysqli_fetch_array($productos)){
                         
                  ?>
                    <div class="col-md-3 col-sm-3">

                          <div class="thumbnail">
                         <img src="administracion/<?php echo $print['img_1'];?>"/>
                         <div class="caption">
                           <h5 style="color: #d11947;"><?php echo $print['nombre'];?></h5>
                           <p> 
                              <?php echo $print['descripcion'];?>
                           </p>
                           <p> 
                              Stock: <?php echo $print['existencia'];?>
                           </p>
                          
                           <h5 style="text-align:center"><a class="btn btn-default" href="detProduct.php?name=<?php echo $print['nombre'];?>&cdg=<?php echo $print['id_producto'];?>"> <i class="fa fa-search"></i></a> <button onclick="anadir('<?php echo $print["id_producto"]; ?>')" class="btn btn-default" >Añadir<i class="fa fa-shopping-cart"></i></button> <a class="btn btn-primary" href="#"><?php echo $v_money['signo'].": ".number_format($print['precio'],2,',','.');?> </a></h5>
                         </div>
                      </div>
                      </div><!--END DIV MD--->

                    <?php
                    }
               ?>




                    </div>



                    <!--ROW SERVICES -->
                 </div>
          
               </div>
          </div>
            
     </section>
     <!-- ABOUT -->
     <section id="about" data-stellar-background-ratio="0.5">
          <div class="container">
               <div class="row">
  
                    <div class="col-md-6 col-sm-12">
                         <div class="about-info">
                              <div class="section-title wow fadeInUp" data-wow-delay="0.2s">
                                   <h4>Nuestra</h4>
                                   <h2>Misión</h2>
                              </div>

                              <div class="wow fadeInUp" data-wow-delay="0.5s">
                                   <p ALIGN="justify">Ofrecer la mejor alternativa de compras online a través de nuestro portafolio de productos y/o misceláneos, con atención especializada, para brindar a nuestros clientes el mejor acceso y confianza en su elección, desde cualquier rincón dónde se encuentren.</p>
                                   <p ALIGN="justify"><b>Surtimart</b> se presenta al mercado venezolano como la solución rápida para la adquisición de productos y servicios, dónde encontraras desde el suplemento más mínimo hasta productos masivos para tú hogar, generando sensación de confort a todo el público en general.</p>
                              </div>
                         </div>
                    </div>

                    <div class="col-md-6 col-sm-12">
                         <div class="wow fadeInUp Surtimart" data-wow-delay="0.6s">
                              <img src="images/Surtimart.jpg" class="img-responsive" alt="">
                         </div>
                    </div>

                    
               </div>
          </div>
     </section>

    
      <!-- <section id="about" data-stellar-background-ratio="0.5">
          <div class="container">
               <div class="row">


               	 <div class="col-md-6 col-sm-12">
                         <div class="wow fadeInUp compras-on-line" data-wow-delay="0.6s">
                              <img src="images/compras-on-line.jpg" class="img-responsive" alt="">
                         </div>
                    </div>

                    <div class="col-md-6 col-sm-12">
                         <div class="about-info">
                              <div class="section-title wow fadeInUp" data-wow-delay="0.2s">
                                   <h4>Nuestra</h4>
                                   <h2>Visión</h2>
                              </div>

                              <div class="wow fadeInUp" data-wow-delay="0.5s">
                                   <p ALIGN="justify">Consolidarnos y ser reconocidos por el profesionalismo en la presentación de productos, servicios y modalidades de pago, alcanzando la preferencia de nuestros clientes y la expansión hacia otros mercado, poniendo en marcha la rapidez de entrega, confort, y accesibilidad de los mismos.</p>
                                   <p ALIGN="justify">Queremos convertirnos en la mejor opción de ecommerce en Venezuela, generando tranquilidad al momento de comprar, ofreciendo alternativas y todas las herramientas necesarias para su adquisición masiva.</p>
                              </div>
                         </div>
                    </div>

                   

                    
               </div>
          </div>
     </section>-->


     <!--valores-->
    <!-- <section id="team" data-stellar-background-ratio="0.5">
          <div class="container">
               <div class="row">

                    <div class="col-md-12 col-sm-12">
                         <div class="section-title wow fadeInUp" data-wow-delay="0.1s">
                              <h2>Nuestros Valores</h2>
                              <h4>Surtimart  guarda en sí valores que forman parte de las necesidades del mercado en función a: </h4>
                         </div>
                    </div>
<div class="row services">
				<div class="col-md-4 col-sm-4">
                         <div class="team-thumb wow fadeInUp" data-wow-delay="0.2s">
                              <img src="images/team-image1.jpg" class="img-responsive" alt="">
                                   <div class="team-hover">
                                        <div class="team-item">
						
						<h4 class="heading">Libertad</h4>
						<p align="justify">Se encarga de gestionar todos los perfiles del sistema, registro de alumnos y docentes, control de asistencias, además administra la correspondencia interna del sistema.</p>
					</div>
				</div>
			</div>
	<div class="team-info">
        <h3>Libertad</h3>
                             
        </div>
		</div>
				<div class="col-md-4 col-sm-4">
                         <div class="team-thumb wow fadeInUp" data-wow-delay="0.4s">
                              <img src="images/team-image2.jpg" class="img-responsive" alt="">
                                   <div class="team-hover">
                                        <div class="team-item">
						
						<h4 class="heading">Empatia</h4>
						<p align="justify">Entender las necesidades de los clientes, conocer sus preferencias y adaptar los servicios y opciones a la vanguardia de sus gustos, aficiones, manías y detalles que sean diferenciador en el mercado.</p>
					</div>
				</div>
				</div>
	 <div class="team-info">
        <h3>Empatia</h3>
                             
        </div>
			</div>

				<div class="col-md-4 col-sm-4">
                         <div class="team-thumb wow fadeInUp" data-wow-delay="0.6s">
                              <img src="images/team-image3.jpg" class="img-responsive" alt="">
                                   <div class="team-hover">
                                        <div class="team-item">
						
						<h4 class="heading">Creatividad</h4>
						<p align="justify">En los detalles está la diferencia, y combinar las tendencias actuales a través de la Paquetización de nuestros productos en pro de surtir a todos los hogares venezolanos es la meta.</p>
					</div>
				</div>
			</div>
			<div class="team-info">
        <h3>Creatividad</h3>
                             
        </div>
		</div>
		
			</div>
            
     </section>-->


     


     <!-- TESTIMONIAL -->
     <section id="testimonial" data-stellar-background-ratio="0.5">
          <div class="overlay"></div>
          <div class="container">
               <div class="row">

                    <div class="col-md-12 col-sm-12">
                         <div class="section-title wow fadeInUp" data-wow-delay="0.1s">
                              <h2>Filosofía del mercado</h2>
                              <h4>Surtimart guarda en sí tres filosofías que atendiendo a las necesidades del mercado se establecen en: </h4>
                         </div>
                    </div>  

                    <div class="col-md-offset-2 col-md-8 col-sm-12">
                         <div class="owl-carousel owl-theme">
                              <div class="item">
                                   <p><b>Explorador:</b> otorgamos libertad, aventura e independencia en los productos y servicios ofrecidos adaptados a la elección y preferencias de los clientes.</p>
                                       
                              </div>

                              <div class="item">
                                   <p><b>Cuidador:</b> entregar una calidad de servicio rápido, responsable, eficiente con respuestas acertadas bajos las exigencias y necesidades presentadas.</p>
                                       
                              </div>

                              <div class="item">
                                   <p><b>Creador:</b> nuestro mayor propósito  es inspirarnos y apoyar a sacar lo mejor de nosotros mismos para convertirlo en realidad. Surtimart siempre dando un paso adelante a las necesidades actuales del mercado venezolano, te ofrece gran variedad de opciones adaptables a cada tipo de público. ¡Siempre pensamos en ti! Y apostamos a lo hecho en casa.</p>
                                       
                              </div>

                         </div>
                    </div>

               </div>
          </div>
     </section>  




     <!-- MENU
  <section id="menu" data-stellar-background-ratio="0.5">
          <div class="container">
               <div class="row">

                    <div class="col-md-12 col-sm-12">
                         <div class="section-title wow fadeInUp" data-wow-delay="0.1s">
                              <h2>Galeria</h2>
                              <h4>Tea Time &amp; Dining</h4>
                         </div>
                    </div>

                    <div class="col-md-4 col-sm-6">
                       
                        <div class="menu-thumb">
                              <a href="images/menu-image1.jpg" class="image-popup" title="American Breakfast">
                                   <img src="images/menu-image1.jpg" class="img-responsive" alt="">

                                   <div class="menu-info">
                                        <div class="menu-item">
                                             <h3>American Breakfast</h3>
                                             <p>Tomato / Eggs / Sausage</p>
                                        </div>
                                        <div class="menu-price">
                                             <span>$25</span>
                                        </div>
                                   </div>
                              </a>
                         </div>
                    </div>  <!--
 
                    <div class="col-md-4 col-sm-6">
                         <!-- MENU THUMB -->
                        <!--  <div class="menu-thumb">
                              <a href="images/menu-image2.jpg" class="image-popup" title="Self-made Salad">
                                   <img src="images/menu-image2.jpg" class="img-responsive" alt="">

                                   <div class="menu-info">
                                        <div class="menu-item">
                                             <h3>Self-made Salad</h3>
                                             <p>Green / Fruits / Healthy</p>
                                        </div>
                                        <div class="menu-price">
                                             <span>$18</span>
                                        </div>
                                   </div>
                              </a>
                         </div>
                    </div>

                    <div class="col-md-4 col-sm-6">
                         <!-- MENU THUMB -->
                      <!--    <div class="menu-thumb">
                              <a href="images/menu-image3.jpg" class="image-popup" title="Chinese Noodle">
                                   <img src="images/menu-image3.jpg" class="img-responsive" alt="">

                                   <div class="menu-info">
                                        <div class="menu-item">
                                             <h3>Chinese Noodle</h3>
                                             <p>Pepper / Chicken / Vegetables</p>
                                        </div>
                                        <div class="menu-price">
                                             <span>$34</span>
                                        </div>
                                   </div>
                              </a>
                         </div>
                    </div>

                    <div class="col-md-4 col-sm-6">
                         <!-- MENU THUMB -->
                       <!--   <div class="menu-thumb">
                              <a href="images/menu-image4.jpg" class="image-popup" title="Rice Soup">
                                   <img src="images/menu-image4.jpg" class="img-responsive" alt="">

                                   <div class="menu-info">
                                        <div class="menu-item">
                                             <h3>Rice Soup</h3>
                                             <p>Green / Chicken</p>
                                        </div>
                                        <div class="menu-price">
                                             <span>$28</span>
                                        </div>
                                   </div>
                              </a>
                         </div>
                    </div>

                    <div class="col-md-4 col-sm-6">
                         <!-- MENU THUMB -->
                        <!--  <div class="menu-thumb">
                              <a href="images/menu-image5.jpg" class="image-popup" title="Project title">
                                   <img src="images/menu-image5.jpg" class="img-responsive" alt="">

                                   <div class="menu-info">
                                        <div class="menu-item">
                                             <h3>Deli Burger</h3>
                                             <p>Beef / Fried Potatoes</p>
                                        </div>
                                        <div class="menu-price">
                                             <span>$46</span>
                                        </div>
                                   </div>
                              </a>
                         </div>
                    </div>

                    <div class="col-md-4 col-sm-6">
                         <!-- MENU THUMB -->
                        <!--  <div class="menu-thumb">
                              <a href="images/menu-image6.jpg" class="image-popup" title="Project title">
                                   <img src="images/menu-image6.jpg" class="img-responsive" alt="">

                                   <div class="menu-info">
                                        <div class="menu-item">
                                             <h3>Big Flat Fried</h3>
                                             <p>Pepper / Crispy</p>
                                        </div>
                                        <div class="menu-price">
                                             <span>$30</span>
                                        </div>
                                   </div>
                              </a>
                         </div>
                    </div>


               </div>
          </div>
     </section>-->


      <!-- CONTACT -->
     <section id="contact" data-stellar-background-ratio="0.5">
          <div class="container">
               <div class="row">
     <!-- How to change your own map point
            1. Go to Google Maps
            2. Click on your location point
            3. Click "Share" and choose "Embed map" tab
            4. Copy only URL and paste it within the src="" field below
     -->
                    <div class="wow fadeInUp col-md-6 col-sm-12" data-wow-delay="0.4s">
                         <div id="google-map">
                              <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d62509.27324041713!2d-70.2196516124731!3d11.706480120794113!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8e85ed24b8524353%3A0x18abea72d12fd565!2sPunto+Fijo%2C+Falc%C3%B3n!5e0!3m2!1ses-419!2sve!4v1536347294932"  allowfullscreen></iframe>
                         </div>
                    </div>    

                    <div class="col-md-6 col-sm-12">

                         <div class="col-md-12 col-sm-12">
                              <div class="section-title wow fadeInUp" data-wow-delay="0.1s">
                                   <h2>Escribenos</h2>
                              </div>
                         </div>

                         <!-- CONTACT FORM -->
                         <form  class="wow fadeInUp" id="contact-form" role="form" data-wow-delay="0.8s">

                              <!-- IF MAIL SENT SUCCESSFUL  // connect this with custom JS -->
                              <h6 class="text-success">Your message has been sent successfully.</h6>
                              
                              <!-- IF MAIL NOT SENT -->
                              <h6 class="text-danger">E-mail must be valid and message must be longer than 1 character.</h6>

                              <div class="col-md-6 col-sm-6">
                                   <input type="text" class="form-control" id="cf-name" name="name" placeholder="Nombre">
                              </div>

                              <div class="col-md-6 col-sm-6">
                                   <input type="email" class="form-control" id="cf-email" name="email" placeholder="Email">
                              </div>

                              <div class="col-md-12 col-sm-12">
                                   <input type="text" class="form-control" id="cf-subject" name="subject" placeholder="Titulo">

                                   <textarea class="form-control" rows="6" id="cf-message" name="message" placeholder="Escribenos Tu Mensaje"></textarea>

                                   <button type="button" class="form-control" id="cf-submit" name="submit" onclick="send()">Enviar</button>
                              </div>
                         </form>
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
     <script src="js/wow.min.js"></script>
     <script src="js/owl.carousel.min.js"></script>
     <script src="js/jquery.magnific-popup.min.js"></script>
     <script src="js/smoothscroll.js"></script>
     <script src="js/custom.js"></script>
        <script type="text/javascript"></script>
        <script src="catalogo/js/sweetalert/sweetalert.min.js"></script>

          <script>
function send(){

dat=$('#contact-form').serialize();

  $.ajax({url:'php/contact.php'
  ,type:'POST'
  ,data:dat 
  ,success: function(resp){
  if(resp!=1){
  swal("Ups!", 'Disculpe Usted Debe Completar El Formulario De Contacto', "error");
  }else{
    swal("Exito!",'Correo Enviado De Manera Satisfactoria Pronto te Contactaremos.', "success");
       $("#contact-form")[0].reset();
  }
}
  ,error: function (xhr, ajaxOptions, thrownError) {
          alert(xhr.responseText);
          alert(thrownError);
  }
  });




}



</script>

</body>
</html>