function anadir(id) {

	action='addToCart';

    //alert(nom+signo);
    $.ajax({url:'AccionCarta.php'//ruta a donde queremos ir 
    ,type:'GET'//metodo 
    ,data:'action=' + action + '&id='+id//variables
    ,success: function(data){
    //alert(data);
    //Lanzamos el alert 
    swal("Producto Añadido!", "se agrego al carrito de compras", "success");
    }
    ,error: function (xhr, ajaxOptions, thrownError) {
            alert(xhr.responseText);
            alert(thrownError);
    }
    });


}