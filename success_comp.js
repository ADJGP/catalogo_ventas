       function SoloNum(e) {
    key = e.keyCode || e.which;
    tecla = String.fromCharCode(key).toString();
    letras = "0123456789";//Se define todo el abecedario que se quiere que se muestre.
    especiales = [8, 37, 39, 46, 6]; //Es la validación del KeyCodes, que teclas recibe el campo de texto.

    tecla_especial = false
    for(var i in especiales) {
        if(key == especiales[i]) {
            tecla_especial = true;
            break;
        }
    }

    if(letras.indexOf(tecla) == -1 && !tecla_especial)
        return false;
}

function envio_home(){

fr=$('#contact-form').serialize();
$('#BtnD').attr('disabled',true);
  $.ajax({url:'AccionCarta.php'
  ,type:'POST'
  ,data:'action=placeOrder&'+fr 
  ,success: function(data){ 
      valores = data;
      tablasTmp = valores.split("###");
      tbPersona = tablasTmp[0];
      campos1 = tbPersona.split("@@@");


    swal(campos1['0'],campos1['1'],campos1['2']);
    $('#BtnD').attr('disabled',false);

    if(campos1['2']!='error'){

      //$('#team').html('<iframe src="compra_succes.php?cdg='+campos1['3']+'" style="width:1130px; height:600px;" frameborder="0"></iframe>');
      comp(campos1['3']);
        v_form();
      }
   
  }
  ,error: function (xhr, ajaxOptions, thrownError) {
          alert(xhr.responseText);
          alert(thrownError);
  }
  });


    
}


function comp(obj){

  $.ajax({url:'compra_succes.php'
  ,type:'POST'
  ,data:'cdg='+obj 
  ,success: function(data){ 
     $('#team').html(data);
  }
  ,error: function (xhr, ajaxOptions, thrownError) {
          alert(xhr.responseText);
          alert(thrownError);
  }
  });

}


function emailV(){
  if($("#email").val().indexOf('@', 0) == -1 || $("#email").val().indexOf('.', 0) == -1) {
           // alert('El correo electrónico introducido no es correcto.');
              swal("Error!", "Disculpe El Correo electrónico Es Invalido", "error");
           $('#BtnD').attr('disabled',true);
           $("#mail").addClass("has-error");
        }else{

             $('#BtnD').attr('disabled',false);
             $("#mail").removeClass("has-error");       
      }
}

function phone(){


  if($("#celular").val().length < 11 || $("#celular").val().length >11 ) {  
      
         swal("Error!", "Por Favor Verificar Su Número de Telefono. debe Contener 11 Digitos Númericos Ej. 0424-000-00-00", "error");  
         $('#BtnD').attr('disabled',true);
         $("#phone").addClass("has-error");
     
    } else{

  
        $('#BtnD').attr('disabled',false);
         $("#phone").removeClass("has-error");  
    } 
   

}

function v_form(){

    if($("#celular").val()!="" && $("#email").val()!="" && $("#cedula").val()!="" && $("#nombres").val()!="" && $("#dir_fis").val()!=""){
        envio_home();
    }else{
    swal("Error!", "Es Necesario Completar La Información del Cliente.", "error"); 
  if($("#celular").val()!=""){$("#phone").removeClass("has-error"); }else{$("#phone").addClass("has-error");}
  if($("#email").val()!=""){$("#mail").removeClass("has-error"); }else{$("#mail").addClass("has-error");}
  if($("#cedula").val()!=""){$("#ced").removeClass("has-error"); }else{$("#ced").addClass("has-error");}
  if($("#nombres").val()!=""){$("#name").removeClass("has-error"); }else{$("#name").addClass("has-error");}
  if($("#dir_fis").val()!=""){$("#dir").removeClass("has-error"); }else{$("#dir").addClass("has-error");}
}
}
