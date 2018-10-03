<?php 

include '../conexion.php'; 
session_start();
if (!isset($_SESSION['username'])) {

header('Location: index.php');

}
//Comprobamos si esta definida la sesión 'tiempo'.
if(isset($_SESSION['tiempo']) ) {

    //Tiempo en segundos para dar vida a la sesión.
    $inactivo = 1200;//20min en este caso.

    //Calculamos tiempo de vida inactivo.
    $vida_session = time() - $_SESSION['tiempo'];

        //Compraración para redirigir página, si la vida de sesión sea mayor a el tiempo insertado en inactivo.
        if($vida_session > $inactivo)
        {
            //Removemos sesión.
            session_unset();
            //Destruimos sesión.
            session_destroy();              
            //Redirigimos pagina.
            header("Location: index.php");

            //exit();
        }
} else {
    //Activamos sesion tiempo.
    $_SESSION['tiempo'] = time();
}

//Configuracion para moneda activa en la tienda
$money=$conexion->query("SELECT * FROM tienda_monedas WHERE status=1");
$v_money=$money->fetch_array();


//Comprobacion de stock por articulo
$pro_stock=$conexion->query("SELECT * FROM tienda_productos");

$a=0;

while ($v_stock=$pro_stock->fetch_array()) {

if ($v_stock['existencia']<=$v_stock['cant_min_stock']) {

$a=$a+1;

mysqli_query($conexion,"UPDATE `tienda_productos` SET `status`='0' WHERE (`id_producto`='$v_stock[id_producto]')");

}  
  

}


 ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>SurtiMart-Online Market</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Surtimart Compras Online">
    <meta name="author" content="encode">
    <link rel="icon" type="image/png" href="uploads/Surtimart.jpg"/>

   <script src="../themes/js/jquery.js" type="text/javascript"></script>
  <link rel="stylesheet" href="../js/datatable/jquery.dataTables.min.css">
  <script src="../js/datatable/jquery.dataTables.min.js"></script>

<!-- Bootstrap style --> 
    <link id="callCss" rel="stylesheet" href="../bootstrap/css/bootstrap.min.css" media="screen"/>
    <link href="../themes/css/base.css" rel="stylesheet" media="screen"/>
<!-- Bootstrap style responsive -->	
	<link href="../themes/css/bootstrap-responsive.min.css" rel="stylesheet"/>
	<link href="../themes/css/font-awesome.css" rel="stylesheet" type="text/css">
<!-- Google-code-prettify -->	
  <link href="../themes/js/google-code-prettify/prettify.css" rel="stylesheet"/>
<!-- sweetalert-->	
	<script src="../js/sweetalert/sweetalert.min.js"></script>
<!-- dropzone	
	<link href="js/dropzone/basic.css" rel="stylesheet"/>-->
	<link href="../js/dropzone/dropzone.css" rel="stylesheet" />
	<script type="text/javascript" src="dropzone.js"></script>
<!-- fontawesome-->	
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
<!-- fav and touch icons -->
    <link rel="shortcut icon" href="themes/images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="../themes/images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="../themes/images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="../themes/images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="../themes/images/ico/apple-touch-icon-57-precomposed.png">
	<style type="text/css" id="enject"></style>
  </head>
<body style="background:linear-gradient(30deg, crimson,sienna, royalblue, indianred, purple);
             ">
<div id="header">


<!-- Navbar ================================================== -->
<div id="logoArea" class="navbar navbar-static-top navbar-inverse">

<a id="smallScreen" data-target="#topMenu" data-toggle="collapse" class="btn btn-navbar">
	<span class="icon-bar"></span>
	<span class="icon-bar"></span>
	<span class="icon-bar"></span>
</a>

  <div class="navbar-inner"><img src="../img/logos/PNG/logo_principal.png" width="15%" alt="SurtiMart" onclick="index()" style="margin-top: 1%; margin-left: 5%"/>
    <a class="brand" href="index.html"></a>
    <ul id="topMenu" class="nav pull-right" style="margin-right: 6%;">
	 <li class="subMenu"><a href="#" onclick="logout()"  title="Salir de la Sesion"><i class="fa fa-power-off"></i></a></li>
    </ul>
  </div>
</div>




</div>
<!-- Header End====================================================================== -->
<div id="mainBody">
	<div class="container">
	<div class="row">
<!-- Sidebar ================================================== -->
	<div id="sidebar" class="span3">
		<div class="well well-small" style="text-align: center;"><img src="<?php echo $_SESSION['foto']; ?>" class="img-polaroid" width="50%" style="/*border-radius: 50%*/"><a id="myCart" href="#">
			<br><?php echo $_SESSION['username']; ?></a><button class="btn btn-primary btn-small" onclick="gestion_user()">Gestionar Cuenta</button></div>
		<ul id="sideManu" class="nav nav-tabs nav-stacked">
			<li class="subMenu open"><a> PRODUCTOS <i class="fa fa-boxes"></i></a>
                <ul>
                <li><a class="active" href="#" onclick="producto()"><i class="fa fa-plus-square"></i> Crear Producto </a></li>
                <li><a class="active" href="#" onclick="list_pro()"><i class="fa fa-plus-square"></i> Listado de Productos Activos</a></li>
                <li><a class="active" href="#" onclick="list_pro_inac()"><i class="fa fa-plus-square"></i> Listado de Productos Inactivos</a></li>
                </ul>
            </li>
            <li class="subMenu open"><a> CATEGORIAS <i class="fa fa-tags"></i></a>
				<ul>
				<li><a  href="#" onclick="categoria()"><i class="fa fa-plus-square"></i> Gestionar Categorias</a></li>
				</ul>
			</li>
      <li class="subMenu open"><a> MONEDAS <i class="fa fa-money-bill-alt"></i></a>
        <ul>
        <li><a class="active" href="#" onclick="monedas()"><i class="fa fa-plus-square"></i> Gestionar Monedas</a></li>
        </ul>
      </li>
            <li class="subMenu open"><a> COMPRAS <i class="fa fa-shopping-cart"></i></a>
                <ul>
                <li><a class="active" href="#" onclick="compras()"><i class="fa fa-plus-square"></i> Verificacion de Compra </a></li>
                </ul>
            </li>
            <li class="subMenu open"><a> VENTAS <i class="fa fa-shopping-bag"></i></a>
                <ul>
                <li><a class="active" href="#" onclick="estadis_gen()"><i class="fa fa-plus-square"></i> Ventas Por Producto</a></li>
                </ul>
            </li>
		</ul>
		<br/>
	</div>


<!-- Sidebar end=============================================== -->
		<div class="span9" id="content">
      <?php if ($a>0): ?>
        <div class="alert alert-danger">
          Hay productos con el STOCK al minimo, por favor para recargar vaya a <a href="#" onclick="list_pro_inac()">Listado de Productos inactivos</a>
        </div>
      <?php endif ?>
			<div class="well well-small" id="principal" >
			<div class="alert alert-info" style="text-align: center;">
			<h4>Registro de Productos<i class="fa fa-boxes"></i></h4>
			</div>
			
            <div class="controls" style="text-align: center;">
                <input class="span6" type="text" placeholder=".Ingresa el nombre del producto" title="Nombre del producto" id="nombre_pro">
            </div>


            <div class="controls" style="text-align: center;">
                <textarea class="span6" placeholder="Descripcion del producto" title="Caracteristicas del producto" id="desc_pro"></textarea><br>

                <textarea class="span6" placeholder="Especifique mas caracteristicas del producto" title="Caracteristicas" id="carac_pro"></textarea><br>

                <input type="number" class="span3" min="1" placeholder="Existencia" title="Cantidad Disponible" id="existencia">
                <input type="number" class="span3" min="1" placeholder="Cantidad Minima" title="Cantidad minima a la que puede llegar el producto" id="cant_min"><br>
                <input type="number" class="span3" min="1" placeholder="Ingrese el costo del producto" title="costo del producto" id="costo">
                <input type="text" class="span3 success" value="<?php echo $v_money['signo']; ?>" title="Configuracion de Moneda Activa Actualmente" id="costo" disabled>
                <br>
                <select title="Categoria del producto" class="span6" id="categoria">
                	<optgroup>
                		<option>Seleccione una Categoria</option>
                		<?php 
                         
                         $cat=mysqli_query($conexion,'SELECT * FROM tienda_categoria WHERE status=1');

                         while ($v_cat=mysqli_fetch_array($cat)) { ?>

                             

                             <option value="<?php echo $v_cat['id_categoria']; ?>"><?php echo $v_cat['titulo']; ?></option>
                         	
                     <?php     }
                		 ?>
                	</optgroup>
                </select><br>
                <button class="btn btn-success" onclick="subir()">Guardar Informacion del Producto</button>
		</div>
		</div>
    <div class="well well-small" id="secundario" style="display: none;">
      <div class="alert alert-warning" style="text-align: center;">
      <h5>Carga de 1 hasta 5 Fotos del producto, recuerda mantener un mismo tamaño y resolucion para brindar una mejor experiencia al cliente</h5>
      </div>
      <form action="upload5.php" class="dropzone" style="width: 20%; float: right;" title="1"></form> 
      <form action="upload4.php" class="dropzone" style="width: 20%; float: right;" title="2"></form> 
      <form action="upload3.php" class="dropzone" style="width: 20%; float: right;" title="3"></form> 
      <form action="upload2.php" class="dropzone" style="width: 20%; float: right;" title="4"></form> 
      <form action="upload.php" class="dropzone" style="width: 20%; float: right;" title="5"></form> 
      <div class="container" style="text-align: center;"></div>
       <button class="btn btn-success" onclick="finalizar()">Terminar Publicación</button>    
      </div>
         
	</div>
</div>
</div>
<div id="detalles" class="modal hide fade in col-lg-6" tabindex="-1" role="dialog" aria-labelledby="detalles" aria-hidden="false" >
      <div class="modal-header alert-info">
      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
      <h5>Detalles del Producto</h5>
      </div>
      <div class="modal-body" id="conten-deta">
      </div>
  </div>

<!-- Footer ================================================================== -->
	<div  id="footerSection">
	<div class="container">
		<div class="row">
			<div class="span2">
				<h5>PRODUCTOS</h5>
				<a href="#" onclick="producto()">CREAR PRODUCTO</a> 
				<a href="#" onclick="list_pro()">LISTADO DE PRODUCTOS ACTIVOS</a> 
				<a href="#" onclick="list_pro_inac()">LISTADO DE PRODUCTOS INACTIVOS</a>  
			</div>
      <div class="span2">
        <h5>CATEGORIAS</h5>
        <a href="#" onclick="categoria()">GESTIONAR CATEGORIAS</a> 
      </div>
      <div class="span2">
        <h5>MONEDAS</h5>
        <a href="#" onclick="monedas()">GESTIONAR MONEDAS</a> 
      </div>
      <div class="span2">
        <h5>COMPRAS</h5>
        <a href="#" onclick="compras()">VERIFICAR COMPRAS</a> 
      </div>
      <div class="span2">
        <h5>VENTAS</h5>
        <a href="#" onclick="estadis_gen()">VENTAS POR PRODUCTO</a> 
      </div>     
		 </div>
		<p class="pull-right">&copy; SurtiMart 2018</p>
	</div><!-- Container End -->
	</div>
<!-- Placed at the end of the document so the pages load faster ============================================= -->
	<script src="../themes/js/bootstrap.min.js" type="text/javascript"></script>
	<script src="../themes/js/google-code-prettify/prettify.js"></script>
	
	<script src="../themes/js/bootshop.js"></script>
  <script src="../themes/js/jquery.lightbox-0.5.js"></script>
  <script type="text/javascript" src="funciones.js"></script>
	
<span id="themesBtn"></span>
</body>


</html>