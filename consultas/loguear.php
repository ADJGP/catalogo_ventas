<?php 
include '../conexion.php';

$user=$_POST['user'];
$pass=$_POST['pass'];

if (empty($user) || empty($pass)) {

echo 3;

}else{

$encrip=md5($pass);

$verificar=$conexion->query("SELECT * FROM administradores WHERE email = '$user' AND password = '$encrip'");

$count=$verificar->num_rows;

if ($count==1) {
	
echo 1;

session_start();

$ver_datos=$verificar->fetch_array();

$_SESSION['id_usr']=$ver_datos['id_admin'];
$_SESSION['username']=$ver_datos['email'];
$_SESSION['nombre']=$ver_datos['nombre'];
$_SESSION['apellido']=$ver_datos['apellido'];
$_SESSION['foto']=$ver_datos['foto_perfil'];
$_SESSION['tiempo']=time();

}else{

echo 0;


}

}

 ?>