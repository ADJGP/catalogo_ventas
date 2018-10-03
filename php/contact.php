<?php
error_reporting(0);
$output = new stdClass();
//print_r($_POST);



$email_to = "surtimartonline@gmail";
$email_subject = "SurtiMart web";

// Aquí se deberían validar los datos ingresados por el usuario
if($_POST['name']!="" && $_POST['subject']!="" && $_POST['message']!="" && $_POST['email']!=""){



$email_message = "Detalles del Mensaje:\n\n";
$email_message .= "Nombre: " . $_POST['name'] . "\n";
$email_message .= "Detalle: " . $_POST['subject'] . "\n";
$email_message .= "E-mail: " . $_POST['email'] . "\n";
$email_message .= "Comentarios: " . $_POST['message'] . "\n\n";


// Ahora se envía el e-mail usando la función mail() de PHP
$headers = 'From: '.Surtimart."\r\n".
'Reply-To: '.$email_from."\r\n" .
'X-Mailer: PHP/' . phpversion();
@mail($email_to, $email_subject, $email_message, $headers);

  echo 1;//envio
}else{


echo 2;//info


}



?>