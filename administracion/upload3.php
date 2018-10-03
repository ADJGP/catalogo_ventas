<?php

include '../conexion.php';

$ds          = DIRECTORY_SEPARATOR;  //1
 
$storeFolder = 'uploads';   //2
 
if (isset($_FILES['file'])) {
     
    $tempFile = $_FILES['file']['tmp_name'];          //3             
      
    $targetPath = $storeFolder . $ds;  //4
     
    $targetFile =  $targetPath."/".$_FILES['file']['name'];  //5

     move_uploaded_file($tempFile,$targetFile);//6

     echo $targetFile;

$ultimo=$conexion->query("SELECT max(id_producto) AS ultimo FROM tienda_productos");
 $ult_id=$ultimo->fetch_array();
 
 echo $ult_id['ultimo'];

$conexion->query("UPDATE tienda_productos SET img_3 = '$targetFile' WHERE id_producto=$ult_id[ultimo]");
     
} 

?>   