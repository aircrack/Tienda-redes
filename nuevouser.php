<?php
session_start();


include("conexion.php");
if(isset($_POST['nombre']) && !empty($_POST['nombre']) && 
	isset($_POST['email']) && !empty($_POST['email']) &&
	isset($_POST['pass1']) && !empty($_POST['pass1']))
{
  $con = mysql_connect($host,$user,$pw) or die("Problema al conectar");

  mysql_select_db($db,$con) or die("Problema al conectar la BD");
// insercion de datos
  mysql_query("INSERT INTO usuarios (nombre,contrasena,email) VALUES (' $_POST[nombre] ','$_POST[pass1] ','$_POST[email] ') " , $con);
} 

$_SESSION['nombre'] = $_POST['nombre'];
//Redireccionar a la pagina de login
	header ("Location: index.php");	 


?>

