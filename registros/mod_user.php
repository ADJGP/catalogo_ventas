<?php 

include '../conexion.php';
session_start();

$contra=md5($_POST['contra_cam']);


if (mysqli_query($conexion,"UPDATE `administradores` SET `email`='$_POST[mail_cam]', `password`='$contra', `nombre`='$_POST[nom_cam]', `apellido`='$_POST[ape_cam]', `ubicacion`='$_POST[ubi_cam]' WHERE (`id_admin`='$_SESSION[id_usr]')")){

	echo 1;


}else{


echo 2;

}






 ?>