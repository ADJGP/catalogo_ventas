
$(document).ready(function() {
    $('#example').DataTable( {
        "language": {
            "lengthMenu": "Mostrando _MENU_ registros por pagina",
            "zeroRecords": "No existen registros - Disculpe",
            "info": "Mostrando pagina _PAGE_ de _PAGES_",
            "infoEmpty": "No hay registros disponibles",
            "infoFiltered": "(filtrando dentro _MAX_ registros disponibles)",
            "sSearch": "Busqueda:",
            "paginate": {
                        "previous": "Anterior",
                        "next": "Siguiente",
             }
        }
    } );
} );

 function gestion_user() {

    //$('#principal').css('display','none');
    //$('#terceros').css('display','block');
    //$('#content').load('gestion_user.php');

    setTimeout("location.href='cuenta_usuario.php'",500);

 
 }

  function crea_moneda() {
    
    nom=$('#nom').val();
    signo=$('#signo').val();

    //alert(nom+signo);
    $.ajax({url:'../registros/crea_moneda.php'//ruta a donde queremos ir 
    ,type:'POST'//metodo 
    ,data:'nom=' + nom + '&signo='+signo//variables
    ,success: function(data){
    //alert(data);

     if (data==1) {
     
    //Lanzamos el alert 
    swal("Buen Trabajo!", "La Moneda se ha añadido!", "success");

    //Limpiamos los campos
    //$('#title').val('');
    //$('#descripcion').val('');
    
    //Recargamos la tabla de listado
    $('#content').load('monedas.php');

       }else{

        swal("Ups!", "Algo salio mal, Vuelve a intentarlo!", "error");
       }
    //$('#detalles').modal();
    //$('#conten-deta').html(data);
    }
    ,error: function (xhr, ajaxOptions, thrownError) {
            alert(xhr.responseText);
            alert(thrownError);
    }
    });


  }

  function detalles_ventas(producto) {

  //alert(producto);
  $.ajax({url:'../consultas/detalles_venta.php'//ruta a donde queremos ir 
    ,type:'POST'//metodo 
    ,data:'id=' + producto//variables
    ,success: function(data){
    //alert(data);
    $('#detalles').modal();
    $('#conten-deta').html(data);
    }
    ,error: function (xhr, ajaxOptions, thrownError) {
            alert(xhr.responseText);
            alert(thrownError);
    }
    });

    
  }

  function pro_ven() {
   producto=$('#producto').val();
   //alert(producto);

   $.ajax({url:'../consultas/ventas_pro.php'//ruta a donde queremos ir 
    ,type:'POST'//metodo 
    ,data:'id=' + producto//variables
    ,success: function(data){
    //alert(data);
    
    $('#pro').html(data);
    $('#volver').css('display','none');

    }
    ,error: function (xhr, ajaxOptions, thrownError) {
            alert(xhr.responseText);
            alert(thrownError);
    }
    });




  }

  function cancelar_compra(nro_ord) {

    $('#category').attr("disabled");
       //alert(nro_ord);
       $.ajax({url:'../consultas/cancel_compra.php'//ruta a donde queremos ir 
    ,type:'POST'//metodo 
    ,data:'nro_ord=' + nro_ord//variables
    ,success: function(data){
    //alert(data);
    if (data==1) {

    swal("Compra Cancelada!", "El stock de los productos fue reestablecido", "success");
    $('#content').load('verificacion_compra.php');

    }

    }
    ,error: function (xhr, ajaxOptions, thrownError) {
            alert(xhr.responseText);
            alert(thrownError);
    }
    });

   }

   function aprobar_compra(nro_ord) {

     //alert(nro_ord);
       $.ajax({url:'../consultas/apro_compra.php'//ruta a donde queremos ir 
    ,type:'POST'//metodo 
    ,data:'nro_ord=' + nro_ord//variables
    ,success: function(data){
    //alert(data);
    if (data==1) {
     
    swal("Compra Aprobada!", "esta compra fue finalizada con exito!", "success");
    $('#content').load('verificacion_compra.php');



    }



    }
    ,error: function (xhr, ajaxOptions, thrownError) {
            alert(xhr.responseText);
            alert(thrownError);
    }
    });


   }

   function busc_nro() {
     
   nro_ord=$('#nro_orden').val();
   //alert(nro_ord);

   $.ajax({url:'../consultas/busc_nro_ord.php'//ruta a donde queremos ir 
    ,type:'POST'//metodo 
    ,data:'nro_ord=' + nro_ord//variables
    ,success: function(data){
    //alert(data);
    $('#contenido').html(data);
    }
    ,error: function (xhr, ajaxOptions, thrownError) {
            alert(xhr.responseText);
            alert(thrownError);
    }
    });



   }



    function finalizar() {
    
    //Lanzamos el alert 
    swal("Buen Trabajo!", "Se completo el registro!", "success");
    setTimeout("location.href='list_pro.php'",500);


    }

    function logout() {
    	
    	setTimeout("location.href='index.php'",500);

    }
    function list_pro() {
        
     //$('#content').load('listado_productos.php');
   setTimeout("location.href='list_pro.php'",500);

    }

    function list_pro_inac() {
        
    //$('#content').load('listado_productos_inac.php');
    setTimeout("location.href='list_pro_inac.php'",500);

    }
   
	function categoria() {
		
    $('#content').load('categoria.php');

	}

  function monedas() {
    
    $('#content').load('monedas.php');

  }

	function producto() {
		
    setTimeout("location.href='dashboard.php'",500);

	}

	function index() {

		setTimeout("location.href='dashboard.php'",500);
	}

	function duplicado() {

	title=$('#title').val();

    $.ajax({url:'../consultas/busc_duplicado.php'//ruta a donde queremos ir 
    ,type:'POST'//metodo 
    ,data:'title=' + title//variables
    ,success: function(data){
    //alert(data);
    if (data==1) {
    swal("Ups!", "Ya existe esa Categoria!", "error");
    $('#content').load('categoria.php');	
    }

    

    }
    ,error: function (xhr, ajaxOptions, thrownError) {
            alert(xhr.responseText);
            alert(thrownError);
    }
    });
		

	

	}

	function compras(){

    //Recargamos la tabla de listado
    $('#content').load('verificacion_compra.php');


	}

	function estadis_gen(){

    //Recargamos la tabla de listado
    //$('#content').load('verificacion_compra.php');
    $('#content').load('estadisticas_generales.php');


	}

	function regis_cate(){

     title=$('#title').val();
     descripcion=$('#descripcion').val();

     if (title=='' || descripcion=='') {

         swal("Ups!", "Estos Campos son Requeridos!", "error");

     }else{
 
    $.ajax({url:'../registros/insert_cate.php'//ruta a donde queremos ir 
    ,type:'POST'//metodo 
    ,data:'title=' + title + '&descripcion=' + descripcion //variables
    ,success: function(data){
    //alert(data);
    if (data==1) {
     
    //Lanzamos el alert 
    swal("Buen Trabajo!", "La categoria se ha añadido!", "success");

    //Limpiamos los campos
    $('#title').val('');
    $('#descripcion').val('');
    
    //Recargamos la tabla de listado
    $('#content').load('categoria.php');

       }else{

       	swal("Ups!", "Algo salio mal, Vuelve a intentarlo!", "error");
       }
     
    }
    ,error: function (xhr, ajaxOptions, thrownError) {
            alert(xhr.responseText);
            alert(thrownError);
    }
    });

     }


	}

	function borrar(id){

if (confirm("Realmente desea Borrar esta Categoria?")) {

$.ajax({url:'../registros/elim_cate.php'//ruta a donde queremos ir 
    ,type:'POST'//metodo 
    ,data:'id=' + id//variables
    ,success: function(data){
    //alert(data);
    if (data==1) {
     
    //Lanzamos el alert 
    swal("Buen Trabajo!", "La categoria se ha Eliminado!", "success");
    
    //Recargamos la tabla de listado
    $('#content').load('categoria.php');

       }else{

       	swal("Ups!", "Algo salio mal, Vuelve a intentarlo!", "error");
       }
     
    }
    ,error: function (xhr, ajaxOptions, thrownError) {
            alert(xhr.responseText);
            alert(thrownError);
    }
    });


}
}

function borrar_pro(id){

if (confirm("Realmente desea Borrar este Producto?")) {

$.ajax({url:'../registros/elim_pro.php'//ruta a donde queremos ir 
    ,type:'POST'//metodo 
    ,data:'id=' + id//variables
    ,success: function(data){
    alert(data);
    if (data==1) {
     
    //Lanzamos el alert 
    swal("Buen Trabajo!", "El Producto se ha Eliminado!", "success");
    
    //Recargamos la tabla de listado
    setTimeout("location.href='list_pro.php'",500);

       }else{

        swal("Ups!", "Algo salio mal, Vuelve a intentarlo!", "error");
       }
     
    }
    ,error: function (xhr, ajaxOptions, thrownError) {
            alert(xhr.responseText);
            alert(thrownError);
    }
    });


}
}

  function borrar_moneda(id){

if (confirm("Realmente desea Borrar esta Moneda?")) {

$.ajax({url:'../registros/elim_mon.php'//ruta a donde queremos ir 
    ,type:'POST'//metodo 
    ,data:'id=' + id//variables
    ,success: function(data){
    //alert(data);
    if (data==1) {
     
    //Lanzamos el alert 
    swal("Buen Trabajo!", "La Moneda se ha Eliminado!", "success");
    
    //Recargamos la tabla de listado
    $('#content').load('monedas.php');

       }else{

        swal("Ups!", "Algo salio mal, Vuelve a intentarlo!", "error");
       }
     
    }
    ,error: function (xhr, ajaxOptions, thrownError) {
            alert(xhr.responseText);
            alert(thrownError);
    }
    });


}
}

function detalles_moneda(id) {

$.ajax({url:'../consultas/detalles_moneda.php'//ruta a donde queremos ir 
    ,type:'POST'//metodo 
    ,data:'id=' + id//variables
    ,success: function(data){

    //alert(data);
    $('#detalles').modal();
    $('#conten-deta').html(data);

    
     
    }
    ,error: function (xhr, ajaxOptions, thrownError) {
            alert(xhr.responseText);
            alert(thrownError);
    }
    });




}



function detalles_cate(id) {

$.ajax({url:'../consultas/detalles_cate.php'//ruta a donde queremos ir 
    ,type:'POST'//metodo 
    ,data:'id=' + id//variables
    ,success: function(data){

    //alert(data);
    $('#detalles').modal();
    $('#conten-deta').html(data);

    
     
    }
    ,error: function (xhr, ajaxOptions, thrownError) {
            alert(xhr.responseText);
            alert(thrownError);
    }
    });




}

function destacar(id) {

    $.ajax({url:'../consultas/destacar.php'//ruta a donde queremos ir 
    ,type:'POST'//metodo 
    ,data:'id=' + id//variables
    ,success: function(data){
    //alert(data);

    //Recargamos la tabla de listado
    setTimeout("location.href='list_pro.php'",500);

    }
    ,error: function (xhr, ajaxOptions, thrownError) {
            alert(xhr.responseText);
            alert(thrownError);
    }
    });


}

function activar(id) {

    $.ajax({url:'../consultas/activar.php'//ruta a donde queremos ir 
    ,type:'POST'//metodo 
    ,data:'id=' + id//variables
    ,success: function(data){
    //alert(data);

    //Recargamos la tabla de listado
    setTimeout("location.href='list_pro.php'",500);

    }
    ,error: function (xhr, ajaxOptions, thrownError) {
            alert(xhr.responseText);
            alert(thrownError);
    }
    });


}

function detalles_pro(id) {

$.ajax({url:'../consultas/detalles_producto.php'//ruta a donde queremos ir 
    ,type:'POST'//metodo 
    ,data:'id=' + id//variables
    ,success: function(data){

    //alert(data);
    $('#detalles').modal();
    $('#conten-deta').html(data);

    
     
    }
    ,error: function (xhr, ajaxOptions, thrownError) {
            alert(xhr.responseText);
            alert(thrownError);
    }
    });




}

function subir(){

nombre=$('#nombre_pro').val();
descripcion=$('#desc_pro').val();
caracteristicas=$('#carac_pro').val();
existencia=$('#existencia').val();
cant_min=$('#cant_min').val();
costo=$('#costo').val();
categoria=$('#categoria').val();

//alert(cant_min);

$.ajax({url:'../registros/insertar_producto.php'//ruta a donde queremos ir 
    ,type:'POST'//metodo 
    ,data:'nom=' + nombre + '&desc=' + descripcion + '&carac=' + caracteristicas + '&exists=' + existencia + '&cant_min=' + cant_min + '&costo=' + costo + '&categoria=' + categoria//variables
    ,success: function(data){
         //alert(data);

      if (data==0) {

    //Lanzamos el alert 
    swal("UPss!", "Estos campos son requeridos", "error");

      }
      if (data==1) {

     $('#principal').css('display','none');
     $('#secundario').css('display','block');

      }
      if (data==2) {

    //Lanzamos el alert 
    swal("UPss!", "No se proceso el registro", "error");

      }





        
    }
    ,error: function (xhr, ajaxOptions, thrownError) {
            alert(xhr.responseText);
            alert(thrownError);
    }
    });


}

function mod_moneda(){
  
$('#moneda').removeAttr("disabled");
$('#sig').removeAttr("disabled");
$('#mone').removeAttr("disabled");
$('#mod_1').css('display','block');
$('#btn_1').css('display','none');



}

function mod_cate(){
  
$('#category').removeAttr("disabled");
$('#descrip').removeAttr("disabled");
//$('#mone').removeAttr("disabled");
$('#mod_1').css('display','block');
$('#btn_1').css('display','none');



}

function cambiar_estado(id) {


$.ajax({url:'../consultas/cambio_estado.php'//ruta a donde queremos ir 
    ,type:'POST'//metodo 
    ,data:'id='+id//variables
    ,success: function(data){
    //alert(data);
      if (data==1) {

    //$('#detalles').modal('toggle');    
    //Recargamos la tabla de listado
    $('#content').load('monedas.php');
     //Lanzamos el alert 
    //swal("Cambios Guardados!", "se realizaron los cambios!", "success");

    

      }
     /* if (data==2) {

    //Lanzamos el alert 
    swal("UPss!", "No se procesaron los cambios", "error");


      }*/
    
     
    }
    ,error: function (xhr, ajaxOptions, thrownError) {
            alert(xhr.responseText);
            alert(thrownError);
    }
    });



}

function guardar_cambios_User() {

 nom_cam=$('#nom_cam').val();
 ape_cam=$('#ape_cam').val();
 ubi_cam=$('#ubi_cam').val();
 mail_cam=$('#mail_cam').val();
 contra_cam=$('#contra_cam').val();


 $.ajax({url:'../registros/mod_user.php'//ruta a donde queremos ir 
    ,type:'POST'//metodo 
    ,data:'nom_cam=' + nom_cam + '&ape_cam='+ ape_cam +'&ubi_cam='+ubi_cam+'&mail_cam='+mail_cam+'&contra_cam='+contra_cam//variables
    ,success: function(data){
    //alert(data);
      if (data==1) {

     //Lanzamos el alert 
    swal("Cambios Guardados!", "se realizaron los cambios!", "success");
    setTimeout("location.href='dashboard.php'",500);

    

      }
      if (data==2) {

    //Lanzamos el alert 
    swal("UPss!", "No se procesaron los cambios", "error");


      }
    
     
    }
    ,error: function (xhr, ajaxOptions, thrownError) {
            alert(xhr.responseText);
            alert(thrownError);
    }
    });



}




function guardar_cambios_mon(id) {

 moneda=$('#moneda').val();
 sig=$('#sig').val();

 $.ajax({url:'../registros/mod_moneda.php'//ruta a donde queremos ir 
    ,type:'POST'//metodo 
    ,data:'moneda=' + moneda + '&sig='+ sig +'&id='+id//variables
    ,success: function(data){
    //alert(data);
      if (data==1) {

    $('#detalles').modal('toggle');    
    //Recargamos la tabla de listado
    $('#content').load('monedas.php');
     //Lanzamos el alert 
    swal("Cambios Guardados!", "se realizaron los cambios!", "success");

    

      }
      if (data==2) {

    //Lanzamos el alert 
    swal("UPss!", "No se procesaron los cambios", "error");


      }
    
     
    }
    ,error: function (xhr, ajaxOptions, thrownError) {
            alert(xhr.responseText);
            alert(thrownError);
    }
    });



}

function guardar_cambios_cate(id) {

 cate=$('#category').val();
 descrip=$('#descrip').val();

 $.ajax({url:'../registros/mod_cate.php'//ruta a donde queremos ir 
    ,type:'POST'//metodo 
    ,data:'cate=' + cate + '&descrip='+ descrip +'&id='+id//variables
    ,success: function(data){
    //alert(data);
      if (data==1) {

    $('#detalles').modal('toggle');    
    //Recargamos la tabla de listado
    $('#content').load('categoria.php');
     //Lanzamos el alert 
    swal("Cambios Guardados!", "se realizaron los cambios!", "success");

    

      }
      if (data==2) {

    //Lanzamos el alert 
    swal("UPss!", "No se procesaron los cambios", "error");


      }
    
     
    }
    ,error: function (xhr, ajaxOptions, thrownError) {
            alert(xhr.responseText);
            alert(thrownError);
    }
    });



}
function mod_pro() {
    

$('#titulo').removeAttr("disabled");
$('#descrip').removeAttr("disabled");
$('#caracte').removeAttr("disabled");
$('#stock').removeAttr("disabled");
$('#precio').removeAttr("disabled");
$('#min').removeAttr("disabled");
//$('#mone').removeAttr("disabled");
$('#cate').css('display','block');
$('#cat').css('display','none');
$('#btn_1').css('display','none');
$('#mod_1').css('display','block');



}

function guardar_cambios_pro(id) {

tit=$('#titulo').val();
desc=$('#descrip').val();
carac=$('#carac').val();
stock=$('#stock').val();
precio=$('#precio').val();
min=$('#min').val();
ncat=$('#ncat').val();

$.ajax({url:'../registros/mod_pro.php'//ruta a donde queremos ir 
    ,type:'POST'//metodo 
    ,data:'tit=' + tit + '&desc='+ desc + '&carac='+ carac  +'&stock='+stock +'&precio='+ precio +'&min='+ min +'&ncat='+ncat+'&id='+id//variables
    ,success: function(data){
    //alert(data);
      if (data==1) {

    $('#detalles').modal('toggle');    
    //Recargamos la tabla de listado
    $('#content').load('categoria.php');
     //Lanzamos el alert 
    swal("Cambios Guardados!", "se realizaron los cambios!", "success");
    setTimeout("location.href='list_pro.php'",500);
    

      }
      if (data==2) {

    //Lanzamos el alert 
    swal("UPss!", "No se procesaron los cambios", "error");


      }
    
     
    }
    ,error: function (xhr, ajaxOptions, thrownError) {
            alert(xhr.responseText);
            alert(thrownError);
    }
    });




}
function nro_orden(nro_orden){

//alert(est);
//alert(lapso);
//alert(periodo);
//window.open("reportes/reportes/bfinal.php?lapso="+ lapso +"&periodo="+periodo+"&est="+est);
$('#detalles').modal('toggle');
$('#pro').html('<iframe src="../../pdf/nro_orden.php?nro_orden='+nro_orden+'" style="width:800px; height:600px;" frameborder="0"></iframe>');
$('#volver').css('display','block');
}