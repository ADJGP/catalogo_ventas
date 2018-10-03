<!DOCTYPE html>
<html lang="en">
<head>
<?php
  
                 include('catalogo/conexion.php');

                  $title_prod="Nuestros Productos";

                 //valido la declaracion 
              if(isset($_GET['view']) && $_GET['view']!=""){
               $conc="and tienda_productos.nombre LIKE '%".$_GET['view']."%' "; 
               $bp="&view=".$_GET['view'];

             }else{
              $conc="";
              $bp="";
             }


               if(isset($_GET['rcat']) && $_GET['rcat']!=""){
               $conc2="and tienda_productos.id_categoria='".$_GET['rcat']."'"; 
               $bp2="&rcat=".$_GET['rcat'];

               $desc=mysqli_query($conexion,"SELECT titulo FROM `tienda_categoria` WHERE `id_categoria` = '".$_GET['rcat']."'");
               $rowc=mysqli_fetch_array($desc);
               $title_prod="Departamento De ".ucwords(strtolower($rowc['titulo']));

             }else{
              $conc2="";
              $bp2="";
             }
                    
                    ///configuración articulo por pagina
                    $article=mysqli_query($conexion,"SELECT * FROM `tienda_productos` WHERE `existencia`<>0 ".$conc." ".$conc2." and status=1");


                    $num=mysqli_num_rows($article);//total de articulos 
                    $articlePage=60;
                    $pagina=$num/60;//articulos de la bases de datos 
                    $pagina=ceil($pagina);
                   // if(if($_GET['']){header('Location:catalogo.php?page=1');})

                    if($num<1){$pagina=1;}


                    

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
                         <li> 
                          <div class="smoothScroll dropdown" > 
                            <button class="smoothScroll btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true"> Departamentos<span class="caret"></span> </button>


                            <ul class="dropdown-menu" aria-labelledby="dropdownMenu1" style="color: black;"> 
                               
                                <?php 
                        $viw=mysqli_query($conexion,"SELECT tienda_categoria.id_categoria,tienda_categoria.titulo FROM `tienda_categoria` where `status`=1 ");
                         while($ct=mysqli_fetch_array($viw)){         
                     ?>

                         <li><a href="catalogo.php?page=1&rcat=<?php echo $ct['id_categoria'];?>" class="smoothScroll" style="color: #d11947;"><i class="fa fa-chevron-right"></i> <?php echo $ct['titulo'];?></a>                 
                         </li>

                         <?php
                       }

                       ?>
                            </ul> 
                         </div> 
                    </li>
                    </ul>

                    <div class="col-lg-3">
                      <form action="catalogo.php?page=1" action="GET">
                       <div class="input-group">
                       <input type="hidden" name="page" value="1">
                       <input type="text" class="form-control" name="view" value="<?php echo  $_GET['view'];?>"  placeholder="Buscar Productos...." required>
                       <span class="input-group-btn">
                       <button class="btn btn-default" type="submit"> <i class="fa fa-search"></i></button>
                       </span>
                      </div><!-- /input-group -->
                    </form>
                    </div><!-- /.col-lg-6 -->
                   
                     

                     <ul class="nav navbar-nav navbar-right">
                       <a href="cart.php" class="section-btn" title="Carrito de Compras"><i class="fa fa-shopping-cart"></i> Carrito de Compras</a>
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





<!--valores-->
     <section id="team" data-stellar-background-ratio="0.5">
          <div class="container">
               <div class="row">
                      
                    <div class="col-md-12 col-sm-12">

                    <div class="col-md-12 col-sm-12">
                         <div class="section-title wow fadeInUp" data-wow-delay="0.1s">
                              <h2><?php echo $title_prod;?></h2>
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
                                                  include('catalogo/conexion.php');
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
                    

                    /// busco en mi bases de datos 
                    $productos=mysqli_query($conexion,"SELECT tienda_productos.id_producto,tienda_productos.nombre,
                     tienda_productos.precio,tienda_categoria.descripcion,tienda_productos.img_1,
                    tienda_productos.destacado,tienda_productos.existencia FROM tienda_productos INNER JOIN tienda_categoria ON tienda_productos.id_categoria = tienda_categoria.id_categoria where tienda_productos.status=1 and tienda_categoria.status=1 ".$conc." ".$conc2." limit $iniciar,$articlePage");



                    $sum_ejec=mysqli_num_rows($productos);

                

                        if($sum_ejec>0){

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
                          
                           <h4 style="text-align:center"><a class="btn btn-default" href="detProduct.php?name=<?php echo $print['nombre'];?>&cdg=<?php echo $print['id_producto'];?>"> <i class="fa fa-search"></i></a> <button onclick="anadir('<?php echo $print["id_producto"]; ?>')" class="btn btn-default" >Añadir<i class="fa fa-shopping-cart"></i></button> <a class="btn btn-primary" href="#"><?php echo $v_money['signo']." :". number_format($print['precio'],2,',','.');?> </a></h4>
                         </div>
                      </div>
                      </div><!--END DIV MD--->

                    <?php
               }
                    }else{
                      ?>

                      <div class="col-md-12 col-sm-12">
                        <center>
                            <i class="fa fa-warning fa-4x" style="color: #babdbd;"></i>
                           <h4 style="text-align:center">No se Encontraron Productos...</h4>
                        </center>
                      </div>

                    <?php
                    }
               ?>




                    </div>
                    <hr>

                    <div class="col-md-12 col-sm-12">
                      <center>
                        <?php
                        if($sum_ejec>0){
                          ?>
                        <nav aria-label="...">
  <ul class="pagination">
    <?php if($_GET['page']<=$pagina){ ?>
    <li class="page-item disabled">
      <a class="page-link" >Anterior <i class="fa fa-chevron-left"></i></a>
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
    <li class="page-item <?php if($_GET['page']==($i+1)){ echo 'active';}else{echo '';}?>"><a class="page-link" href="catalogo.php?page=<?php echo ($i+1).$bp."".$bp2;?>"><?php echo $i+1;?></a></li>
   <?php
   }
  
///valido que no se vaya mas alla la pagina 
   if($_GET['page']>=$pagina){ ?>
    <li class="page-item disabled">
      <a class="page-link" >Siguente <i class="fa fa-chevron-right"></i></a>
    </li>
    <?php
  }else{
    ?>

<li class="page-item ">
      <a class="page-link" href="catalogo.php?page=<?php echo ($_GET['page']+1).$bp;?>">Siguente <i class="fa fa-chevron-right"></i></a>
    </li>

    <?php
}
    ?>
  </ul>
</nav>

<?php
}
?>
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
     <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>
     <script type="text/javascript" src="funciones.js"></script>

</body>
</html>