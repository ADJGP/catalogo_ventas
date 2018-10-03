<?php

include '../conexion.php';
session_start();

$ds          = DIRECTORY_SEPARATOR;  //1
 
$storeFolder = 'uploads';   //2
 
if (isset($_FILES['file'])) {
     
    $tempFile = $_FILES['file']['tmp_name'];          //3             
      
    $targetPath = $storeFolder . $ds;  //4
     
    $targetFile =  $targetPath."/".$_FILES['file']['name'];  //5

     move_uploaded_file($tempFile,$targetFile);//6

$targetFile;

$conexion->query("UPDATE administradores SET foto_perfil = '$targetFile' WHERE id_admin='$_SESSION[id_usr]'");

$_SESSION['foto']=$targetFile;
     
} 

?>   