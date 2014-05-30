<?php
session_start();
$_SESSION['nombre'] = $_POST['nombre'];
//Redireccionar a la pagina de login
	header ("Location: index.php");	 
?>

