<!DOCTYPE html>
<html lang="en">
<?php
if(!isset($_GET['cdg'])){

  header('Location:catalogo.php');
}


?>
<head>
     <title>SurtiMart</title>
     <link rel="shortcut icon" href="images/Surtimart.jpg" type="image/x-icon" />


     <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=Edge">
     <meta name="description" content="">
     <meta name="keywords" content="">
     <meta name="author" content="">
     <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
   
     <link rel="stylesheet" href="css/bootstrap.min.css">
     <link rel="stylesheet" href="css/font-awesome.min.css">
     <link rel="stylesheet" href="css/animate.css">
     <link rel="stylesheet" href="css/owl.carousel.css">
     <link rel="stylesheet" href="css/owl.theme.default.min.css">
     <link rel="stylesheet" href="css/magnific-popup.css">

     
    <!--<link id="callCss" rel="stylesheet" href="catalogo/themes/bootshop/bootstrap.min.css" media="screen"/>-->

     <link href="catalogo/themes/css/base.css" rel="stylesheet" media="screen"/>
     <!-- MAIN CSS -->
     <link rel="stylesheet" href="css/templatemo-style.css">
<!-- MAIN CSS 
     <link href="catalogo/themes/css/bootstrap-responsive.min.css" rel="stylesheet"/>
     -->
  <link href="catalogo/themes/css/font-awesome.css" rel="stylesheet" type="text/css">
<!-- Google-code-prettify --> 
  <link href="catalogo/themes/js/google-code-prettify/prettify.css" rel="stylesheet"/>
<!-- fav and touch icons -->
    
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="catalogo/themes/images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="catalogo/themes/images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="themes/images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="catalogo/themes/images/ico/apple-touch-icon-57-precomposed.png">
  <style type="text/css" id="enject"></style>

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
                        
                    </ul>

                    <ul class="nav navbar-nav navbar-right">
                       
                          <a href="cart.php" class="section-btn"><i class="fa fa-shopping-cart"></i> Carrito de Compras</a>
                    </ul>
               </div>

          </div>
     </section>

  <!-- HOME -->
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

     

<!--valores-->
     <section id="team" data-stellar-background-ratio="0.5">
          <div class="container">
               <div class="row">
                      

                    <div class="col-md-12 col-sm-12">
                         <div class="section-title wow fadeInUp" data-wow-delay="0.1s">
                              <h3>DETALLE DEL PRODUCTO</h3>
                               <span class="title-divider"></span>
                        
                         </div>
                    </div>
                   <div class="row services">
                     
                    <div class="col-md-12 col-sm-12">
                        <div id="mainBody">
  <div class="container">
  <div class="row">

  </div>
<!-- Sidebar end=============================================== -->

    <?php //include('banner_dest.php');?>
      
   
    <div class="contenedor_front" id="contenedor_front">
       <div class="span12">
    <ul class="breadcrumb">
    <li><a href="index.php">Inico</a> <span class="divider"></span></li>
    <li><a href="products.html">Productos</a> <span class="divider"></span></li>
    <li class="active">Especificaciónes del Producto</li>
    </ul> 

  <div class="row ">   

      <div id="gallery" class="col-md-3 col-sm-3">
       <?php
       include('conexion.php');

         $money=$conexion->query("SELECT * FROM tienda_monedas WHERE status=1");
         $v_money=$money->fetch_array();


      $article=mysqli_query($conexion,"SELECT
tienda_productos.id_producto,        
tienda_productos.nombre,
tienda_productos.descripcion,
tienda_productos.precio,
tienda_productos.id_categoria,
tienda_productos.img_1,
tienda_productos.img_2,
tienda_productos.img_3,
tienda_productos.img_4,
tienda_productos.img_5,
tienda_productos.destacado,
tienda_categoria.titulo,
tienda_productos.existencia,
tienda_productos.caracteristicas,
tienda_categoria.descripcion as desc_categoria
FROM
tienda_productos
INNER JOIN tienda_categoria ON tienda_productos.id_categoria = tienda_categoria.id_categoria
WHERE `id_producto` = '".$_GET['cdg']."'");

        $row=mysqli_fetch_array($article);
      ?>
            <a href="catalogo/administracion/<?php echo $row['img_1'];?>" title="<?php echo $row['nombre'];?>">
        <img class="img-thumbnail" style="border: 2px solid #b91f5a" src="catalogo/administracion/<?php echo $row['img_1'];?>" style="width:29%" alt="<?php echo $row['nombre'];?>"/>
            </a>

       
      <div id="differentview" class="moreOptopm carousel slide">
        <br>
                <div class="carousel-inner">


                  <div class="item active">
                    <?php if($row['img_2']!=""){ ?>
                      <center>
                   <a  href="catalogo/administracion/<?php echo $row['img_2'];?>"> <img style="width:29%" src="catalogo/administracion/<?php echo $row['img_2'];?>" alt="" class="img-thumbnail"/></a>
                  
                 </center>
                 <?php } ?>
                  <?php if($row['img_3']!=""){ ?>
                    <center>
                  <a href="../administracion/<?php echo $row['img_3'];?>"> <img style="width:29%" src="catalogo/administracion/<?php echo $row['img_3'];?>" alt=""/></a>
                </center>
                  <?php } ?>
                   <?php if($row['img_4']!=""){ ?>
                    <center>
                   <a href="catalogo/administracion/<?php echo $row['img_4'];?>"> <img style="width:29%" src="catalogo/administracion/<?php echo $row['img_4'];?>" alt=""/></a>
                 </center>
                    <?php } ?>
                  </div>
                 
                </div>
            <!--
        <a class="left carousel-control" href="#myCarousel" data-slide="prev">‹</a>
              <a class="right carousel-control" href="#myCarousel" data-slide="next">›</a> 
      -->
              </div>
               <div class="btn-toolbar">
                <center>
                  <!--
        <div class="btn-group">
        <span class="btn btn-default"><i class="icon-envelope"></i></span>
        <span class="btn btn-default" ><i class="icon-print"></i></span>
        <span class="btn btn-default" ><i class="icon-zoom-in"></i></span>
        <span class="btn btn-default" ><i class="icon-star"></i></span>
        <span class="btn btn-default" ><i class=" icon-thumbs-up"></i></span>
        <span class="btn btn-default" ><i class="icon-thumbs-down"></i></span>

        </div>
      -->
      </center>
      </div>
      </div>
    
      <div class="col-md-9 col-sm-9">
        <h3><?php echo $row['nombre'];?></h3>
         <span class="title-divider"></span>
        <p align="justify"><?php echo $row['descripcion'];?></p>
        <hr class="soft"/>
        <form class="form-horizontal qtyFrm">
          <div class="control-group">
          <label class="control-label"></label>
          <div class="controls">
          <b> Precio : <?php echo $v_money['signo'].": ".number_format($row['precio'],2,',','.');?>  </b>
          
            <br>
             <b> Stock: <?php echo $row['existencia'];?></b>
             <br>
               <span onclick="anadir('<?php echo $row["id_producto"];?>')" class="btn btn-primary" >Añadir al Carrito<i class="fa fa-shopping-cart"></i></span>
          </div>
          </div>
        </form>
        <?php
        $query1=mysqli_query($conexion,"SELECT sum(cantidad) as cant FROM tienda_compras_productos where id_producto='".$_GET['cdg']."' and status <> 2");
        $dat=mysqli_fetch_array($query1);

        ?>
        <hr class="soft"/>
        <h4>Características del Producto:</h4>
          <span class="title-divider"></span>
          <div class="col-md-12 col-sm-12" style="text-align: justify;">
           <p>
             <?php echo $row['caracteristicas'];?>
           </p>
            
          </div>
        
        <hr class="soft clr"/>
        <h4>Departamento:</h4> <h5><?php echo $row['titulo']." (".$row['desc_categoria'].")";?> </h5>
         <span class="title-divider"></span>
        <p><!--aqui va algo mas etenso -->      
        </p>
    

        </div><!--cierro rows>-->
      </div><!--aqui cierra -->

                         
                      </div>
                      <!--END DIV MD--->
                       </div>
                              </div>
                    <!--ROW SERVICES -->
                 </div>           
               </div>
          </div>

            
     </section>

              <section id="team" data-stellar-background-ratio="0.5">
          <div class="container">
               <div class="row">
                 <div class="col-md-12 col-sm-12">
                         <div class="section-title wow fadeInUp" data-wow-delay="0.1s">
                              <h2>Productos Relacionados</h2>
                           <span class="title-divider"></span>
                         </div>
                    </div>
                   <div class="row services">
                         <?php                   

                    
                    $productos=mysqli_query($conexion,"SELECT tienda_productos.id_producto,tienda_productos.nombre, tienda_productos.precio,tienda_categoria.descripcion,tienda_productos.img_1, tienda_productos.destacado,tienda_productos.existencia,tienda_productos.fec_crea FROM tienda_productos INNER JOIN tienda_categoria ON tienda_productos.id_categoria = tienda_categoria.id_categoria where tienda_categoria.status=1 and existencia>0 ANd tienda_productos.id_categoria='".$row['id_categoria']."' and tienda_productos.id_producto<>".$_GET['cdg']." ORDER by tienda_productos.fec_crea desc Limit 16");

                         while($print=mysqli_fetch_array($productos)){
                         
                  ?>
                    <div class="col-md-3 col-sm-3">

                          <div class="thumbnail">
                         <img src="catalogo/administracion/<?php echo $print['img_1'];?>"/>
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
     <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>
     <script type="text/javascript" src="funciones.js"></script>
<!--
  <script src="catalogo/themes/js/jquery.js" type="text/javascript"></script>
  <script src="catalogo/themes/js/bootstrap.min.js" type="text/javascript"></script>-->
  <script src="catalogo/themes/js/google-code-prettify/prettify.js"></script>
  
  <script src="catalogo/themes/js/bootshop.js"></script>
  <script src="js/jquery.lightbox-0.5.js"></script>

</body>
</html>