<!DOCTYPE html>
<html lang="en">
<head>
<!-- sweetalert-->  
<script src="js/sweetalert/sweetalert.min.js"></script>
<script type="text/javascript" src="funciones.js"></script>
<?php

//include('catalogo/conexion.php');
include('conexion.php');
                    ///configuración articulo por pagina
                    $article=mysqli_query($conexion,"SELECT * FROM `tienda_productos` WHERE `existencia`<>0 and status=1");
                    $num=mysqli_num_rows($article);//total de articulos 
                    $articlePage=60;
                    $pagina=$num/60;//articulos de la bases de datos 
                    $pagina=ceil($pagina);
                   // if(if($_GET['']){header('Location:catalogo.php?page=1');})


                    

 $iniciar=($_GET['page']-1)*$articlePage;/////

if(!$_GET){header('Location:catalogo.php?page=1');}

if($_GET['page']<=0 || $_GET['page']>$pagina){header('Location:catalogo.php?page=1');}
if(is_numeric($_GET['page'])){}else{header('Location:catalogo.php?page=1');}

$money=$conexion->query("SELECT * FROM tienda_monedas WHERE status=1");
$v_money=$money->fetch_array();
?>
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
                    <a href="index.php" class="navbar-brand">SurtiMart <span>.</span> <small>Online Market</small></a>
               </div>

               <!-- MENU LINKS -->
               <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-nav-first">
                         <li><a href="index.php" class="smoothScroll"> Home</a></li>
                         <li><a href="catalogo.php" class="smoothScroll"> Catalogo</a></li>
                         <li><input type="text" class="smoothScroll"></li>
                    </ul>

                    <ul class="nav navbar-nav navbar-right">
                       
                         <a href="cart.php" class="section-btn">
                               <i class="fa fa-shopping-cart"></i> Carrito de Compras</a>
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

                         <div class="item item-third">
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





<!--valores-->
     <section id="team" data-stellar-background-ratio="0.5">
          <div class="container">
               <div class="row">
                      
                    <div class="col-md-12 col-sm-12">

                    <div class="col-md-12 col-sm-12">
                         <div class="section-title wow fadeInUp" data-wow-delay="0.1s">
                              <h2>Nuestros Productos</h2>
                              <span class="title-divider"></span>
                              <hr>
                          
                         </div>
                    </div>
               </div>


               <!-- <div class="col-md-12">
                    <div class="col-md-6">
                    <label for="usr">Buscar  Producto:</label>
                                          <div class="form-group input-group">
                                               <span class="input-group-addon"><i class="fa fa-search"></i></span>
              
                                              <input type="text" class="form-control" name="cedula" id='cedula' onkeypress="return SoloNum(event)">
        
                                        </div>
                                   </div>

                                   <div class="col-md-2"></div>
                                   <div class="col-md-4">
                    <label for="usr">Categorias:</label>
                                          <div class="form-group input-group">
                                               <span class="input-group-addon"><i class="fa fa-check-circle"></i></span>
              
                                              <select class="form-control" name="cat">
                                                  <option value="">-Seleccione-</option>
                                                  <?php
                                                  //include('catalogo/conexion.php');
                                                  include('conexion.php');
                                                   $cat=mysqli_query($conexion,"SELECT tienda_categoria.titulo,tienda_categoria.id_categoria FROM tienda_categoria where  status=1");
                                                   while($dat1=mysqli_fetch_array($cat)){
                                                       ?>

                                                  <option value="<?php echo $dat1['id_categoria'];?>"><?php echo $dat1['titulo'];?></option>
                                                  <?php
                                                   }
                                                   ?>
                                                   
                                              </select>
        
                                        </div>
                                   </div>
                              </div>
          </div>-->
                   <div class="row services">


                                        <br>
                    

                         <?php 
                    


                    $productos=mysqli_query($conexion,"SELECT tienda_productos.id_producto,tienda_productos.nombre,
                     tienda_productos.precio,tienda_categoria.descripcion,tienda_productos.img_1,
                    tienda_productos.destacado,tienda_productos.existencia FROM tienda_productos INNER JOIN tienda_categoria ON tienda_productos.id_categoria = tienda_categoria.id_categoria where tienda_productos.status=1 and tienda_categoria.status=1 limit $iniciar,$articlePage");

                

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
                          
                           <h4 style="text-align:center"><a class="btn btn-default" href="detProduct.php?name=<?php echo $print['nombre'];?>&cdg=<?php echo $print['id_producto'];?>"> <i class="fa fa-search"></i></a>
                            <button onclick="anadir('<?php echo $print["id_producto"]; ?>')" class="btn btn-default" >Añadir<i class="fa fa-shopping-cart"></i></button>
                            
                            <!--<a href="AccionCarta.php?action=addToCart&id=<?php //echo $print["id_producto"]; ?>" class="btn btn-default" >Añadir <i class="fa fa-shopping-cart"></i></a>-->


                            <a class="btn btn-primary" href="#"><?php echo $v_money['signo']." :". number_format($print['precio'],2,',','.');?> </a></h4>
                         </div>
                      </div>
                      </div><!--END DIV MD--->

                    <?php
               }
                    
               ?>




                    </div>
                    <hr>

                    <div class="col-md-12 col-sm-12">
                      <center>
                        <nav aria-label="...">
  <ul class="pagination">
    <?php if($_GET['page']<=$pagina){ ?>
    <li class="page-item disabled">
      <a class="page-link" href="#">Anterior <i class="fa fa-chevron-left"></i></a>
    </li>
    <?php
  }else{
    ?>

<li class="page-item ">
      <a class="page-link" href="catalogo.php?page=<?php echo $_GET['page']+1;?>">Anterior <i class="fa fa-chevron-left"></i></a>
    </li>

    <?php
}
     for($i=0;$i<$pagina;$i++){
      ?>
    <li class="page-item <?php if($_GET['page']==($i+1)){ echo 'active';}else{echo '';}?>"><a class="page-link" href="catalogo.php?page=<?php echo $i+1;?>"><?php echo $i+1;?></a></li>
   <?php
   }
  
///valido que no se vaya mas alla la pagina 
   if($_GET['page']>=$pagina){ ?>
    <li class="page-item disabled">
      <a class="page-link" href="#">Siguente <i class="fa fa-chevron-right"></i></a>
    </li>
    <?php
  }else{
    ?>

<li class="page-item ">
      <a class="page-link" href="catalogo.php?page=<?php echo $_GET['page']+1;?>">Siguente <i class="fa fa-chevron-right"></i></a>
    </li>

    <?php
}
    ?>
  </ul>
</nav>
                      </center>
                      
                    </div>



                    <!--ROW SERVICES -->
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
                              <li><a href="https://www.facebook.com/SURTIMART/" class="fa fa-facebook-square fa-2x" attr="facebook icon"></a></li>
                             <!-- <li><a href="#" class="fa fa-twitter"></a></li>-->
                              <li><a href="https://www.instagram.com/surtimart/?hl=es-la" class="fa fa-instagram fa-2x"></a></li>
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

</body>
</html>